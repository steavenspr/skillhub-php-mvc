<?php
/*
 * FICHIER : authControl.php
 * DESCRIPTION : Contrôleur pour gérer l'inscription et la connexion
 * AUTEUR : Équipe SkillHub
 * DATE : Février 2026
 */

require_once 'model/utilisateurModel.php';

class authControl {
    
    private $model;
    
    public function __construct() {
        $this->model = new utilisateurModel();
    }
    
    /**
     * Inscription AJAX
     */
    public function inscription() {
        // Définir le type de réponse en JSON
        header('Content-Type: application/json');
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupération et nettoyage des données du formulaire
            $nom = trim($_POST['nom'] ?? '');
            $prenom = trim($_POST['prenom'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $telephone = trim($_POST['telephone'] ?? '');
            $mdp = $_POST['password'] ?? '';
            $role = $_POST['role'] ?? '';
            
            // Validation des champs obligatoires
            if(empty($nom) || empty($prenom) || empty($email) || empty($mdp) || empty($role)) {
                echo json_encode(['success' => false, 'message' => 'Tous les champs obligatoires doivent être remplis']);
                return;
            }
            
            // Validation du format email
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo json_encode(['success' => false, 'message' => 'Email invalide']);
                return;
            }
            
            // Validation de la longueur du mot de passe
            if(strlen($mdp) < 6) {
                echo json_encode(['success' => false, 'message' => 'Le mot de passe doit contenir au moins 6 caractères']);
                return;
            }
            
            // Appel du modèle pour l'inscription
            $result = $this->model->inscrire($nom, $prenom, $email, $mdp, $role, $telephone);
            echo json_encode($result);
        }
    }
    
    /**
     * Connexion AJAX
     */
    public function connexion() {
        // Définir le type de réponse en JSON
        header('Content-Type: application/json');
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupération des données
            $email = trim($_POST['email'] ?? '');
            $mdp = $_POST['password'] ?? '';
            
            // Validation basique
            if(empty($email) || empty($mdp)) {
                echo json_encode(['success' => false, 'message' => 'Email et mot de passe requis']);
                return;
            }
            
            // Appel du modèle pour la connexion
            $result = $this->model->connecter($email, $mdp);
            echo json_encode($result);
        }
    }
    
    /**
     * Déconnexion
     */
    public function deconnexion() {
        // Destruction de la session
        session_destroy();
        // Redirection vers l'accueil
        header('Location: ' . URL);
        exit;
    }
}