<?php
/*
 * FICHIER : utilisateurModel.php
 * DESCRIPTION : Modèle pour la gestion des utilisateurs (inscription, connexion)
 * AUTEUR : Équipe SkillHub
 * DATE : Février 2026
 */

class utilisateurModel {
    
    private $connexion;
    
    public function __construct() {
        // Connexion PDO directe avec les mêmes paramètres que le Query Builder
        // (Voir core/query.php ligne 89 : Query::connect("localhost", "skillhubdb", "root", ""))
        try {
            $this->connexion = new PDO(
                'mysql:host=localhost;dbname=skillhubdb;charset=utf8', 
                'root', 
                ''
            );
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            throw new Exception("Erreur de connexion : " . $e->getMessage());
        }
    }
    
    /**
     * Inscription d'un nouvel utilisateur
     */
    public function inscrire($nom, $prenom, $email, $mdp, $role, $telephone = null) {
        // Vérifier si l'email existe déjà
        if($this->emailExiste($email)) {
            return ['success' => false, 'message' => 'Cet email est déjà utilisé'];
        }
        
        // Hashage du mot de passe pour la sécurité
        $mdpHash = password_hash($mdp, PASSWORD_DEFAULT);
        
        // Insertion en base de données avec les bons noms de colonnes
        $sql = "INSERT INTO utilisateur (nom, prenom, email, telephone, mdp, role, dateCreation) 
                VALUES (:nom, :prenom, :email, :telephone, :mdp, :role, NOW())";
        
        $stmt = $this->connexion->prepare($sql);
        $result = $stmt->execute([
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
            'telephone' => $telephone,
            'mdp' => $mdpHash,
            'role' => $role
        ]);
        
        if($result) {
            return ['success' => true, 'message' => 'Inscription réussie ! Vous pouvez maintenant vous connecter.'];
        }
        
        return ['success' => false, 'message' => 'Erreur lors de l\'inscription'];
    }
    
    /**
     * Connexion d'un utilisateur
     */
    public function connecter($email, $mdp) {
        // Récupération de l'utilisateur par email
        $sql = "SELECT * FROM utilisateur WHERE email = :email";
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Vérification du mot de passe
        if($user && password_verify($mdp, $user['mdp'])) {
            // Création de la session utilisateur
            $_SESSION['user'] = [
                'id' => $user['id'],
                'nom' => $user['nom'],
                'prenom' => $user['prenom'],
                'email' => $user['email'],
                'role' => $user['role']
            ];
            
            return ['success' => true, 'message' => 'Connexion réussie'];
        }
        
        return ['success' => false, 'message' => 'Email ou mot de passe incorrect'];
    }
    
    /**
     * Vérifier si un email existe déjà dans la base
     */
    private function emailExiste($email) {
        $sql = "SELECT COUNT(*) FROM utilisateur WHERE email = :email";
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute(['email' => $email]);
        return $stmt->fetchColumn() > 0;
    }
}