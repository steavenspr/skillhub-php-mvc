<?php
/*
 * FICHIER : formationModel.php
 * DESCRIPTION : Modèle pour la gestion des formations
 * AUTEUR : Équipe SkillHub
 * DATE : Février 2026
 */

// Inclusion du Query Builder pour interagir avec la base de données
require_once "core/query.php";

/**
 * Classe formationModel
 * Gère toutes les opérations liées aux formations (SELECT, filtrage, etc.)
 */
class formationModel
{
  /**
   * Récupère toutes les formations avec leurs catégories associées
   * 
   * Requête SQL générée :
   * SELECT f.titre, f.description, f.duree, f.prix, f.niveau, f.format, f.image, c.type AS categorie
   * FROM formation f
   * INNER JOIN categorieformation c ON f.idCategorie = c.id
   * ORDER BY f.dateCreation DESC
   * 
   * @return array Tableau d'objets contenant les formations avec leur catégorie
   */
  public static function getAllFormations()
  {
    // Instanciation du Query Builder
    $db = new Query();
    
    // Construction de la requête avec jointure
    // select() : sélectionne les colonnes nécessaires avec alias de table (f pour formation)
    // inner_join() : jointure avec la table categorieformation
    // where2() : condition de jointure personnalisée
    // order_by() : tri par date de création décroissante (les plus récentes en premier)
    $result = $db->select(
                    "f.titre, f.description, f.duree, f.prix, f.niveau, f.format, f.image, c.type AS categorie",
                    "formation f"
                  )
                 ->inner_join("categorieformation c")
                 ->where2("f.idCategorie", "= c.id")
                 ->order_by("f.dateCreation", "DESC")
                 ->execute();
    
    return $result;
  }

  /**
   * Filtre les formations selon plusieurs critères combinables
   * 
   * Requête SQL générée (exemple avec tous les filtres) :
   * SELECT f.titre, f.description, ... FROM formation f
   * INNER JOIN categorieformation c ON f.idCategorie = c.id
   * AND f.niveau = ?
   * AND f.format = ?
   * AND f.titre LIKE ?
   * ORDER BY f.dateCreation DESC
   * 
   * @param string $niveau Filtre par niveau (debutant, intermediaire, avance) ou chaîne vide
   * @param string $format Filtre par format (presentiel, visio) ou chaîne vide
   * @param string $recherche Mot-clé pour rechercher dans les titres ou chaîne vide
   * @return array Tableau d'objets contenant les formations filtrées
   */
  public static function getFormationsFiltered($niveau = "", $format = "", $recherche = "")
  {
    // Instanciation du Query Builder
    $db = new Query();
    
    // Construction de la requête de base avec jointure
    $query = $db->select(
                    "f.titre, f.description, f.duree, f.prix, f.niveau, f.format, f.image, c.type AS categorie",
                    "formation f"
                  )
                 ->inner_join("categorieformation c")
                 ->where2("f.idCategorie", "= c.id");
    
    // Tableau pour stocker les paramètres de la requête préparée
    // Ces valeurs seront échappées automatiquement par PDO
    $params = [];
    
    // Variable pour suivre si des conditions ont déjà été ajoutées
    $hasCondition = false;
    
    // FILTRE PAR NIVEAU
    // Si le niveau est spécifié, on ajoute une condition AND niveau = ?
    if (!empty($niveau)) {
      if (!$hasCondition) {
        $query->andCondition("f.niveau", "=");
        $hasCondition = true;
      } else {
        $query->andCondition("f.niveau", "=");
      }
      // Ajout du paramètre dans le tableau
      $params[] = $niveau;
    }
    
    // FILTRE PAR FORMAT
    // Si le format est spécifié, on ajoute une condition AND format = ?
    if (!empty($format)) {
      $query->andCondition("f.format", "=");
      // Ajout du paramètre dans le tableau
      $params[] = $format;
    }
    
    // FILTRE PAR RECHERCHE
    // Recherche par mot-clé dans le titre avec l'opérateur LIKE
    if (!empty($recherche)) {
      $query->andCondition("f.titre", "LIKE");
      // Ajout des caractères % pour rechercher n'importe où dans le titre
      $params[] = "%" . $recherche . "%";
    }
    
    // Tri par date de création (les plus récentes en premier)
    $query->order_by("f.dateCreation", "DESC");
    
    // Exécution de la requête avec les paramètres collectés
    $result = $query->execute($params);
    
    return $result;
  }

  /**
   * Récupère une formation spécifique par son identifiant
   * 
   * Cette méthode est prévue pour afficher le détail d'une formation
   * (fonctionnalité non encore implémentée)
   * 
   * Requête SQL générée :
   * SELECT f.*, c.type AS categorie FROM formation f
   * INNER JOIN categorieformation c ON f.idCategorie = c.id
   * AND f.id = ?
   * 
   * @param int $id Identifiant unique de la formation
   * @return object|null Objet formation avec sa catégorie si trouvé, null sinon
   */
  public static function getFormationById($id)
  {
    // Instanciation du Query Builder
    $db = new Query();
    
    // Construction de la requête avec jointure et condition WHERE
    // select() : sélectionne toutes les colonnes de formation (f.*) et le type de catégorie
    // inner_join() : jointure avec categorieformation
    // where2() : condition de jointure
    // andCondition() : condition pour filtrer par ID
    $result = $db->select(
                    "f.*, c.type AS categorie",
                    "formation f"
                  )
                 ->inner_join("categorieformation c")
                 ->where2("f.idCategorie", "= c.id")
                 ->andCondition("f.id", "=")
                 ->execute([$id]);
    
    // Retourne le premier résultat s'il existe, sinon null
    return !empty($result) ? $result[0] : null;
  }
}