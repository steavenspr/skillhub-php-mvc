<?php
/*
 * FICHIER : categorieModel.php
 * DESCRIPTION : Modèle pour la gestion des catégories de formation
 * AUTEUR : Équipe SkillHub
 * DATE : Février 2026
 */

// Inclusion du Query Builder pour interagir avec la base de données
require_once "core/query.php";

/**
 * Classe categorieModel
 * Gère toutes les opérations liées aux catégories de formation
 */
class categorieModel
{
  /**
   * Récupère toutes les catégories depuis la base de données
   * 
   * Requête SQL générée :
   * SELECT * FROM categorieformation ORDER BY type ASC
   * 
   * @return array Tableau d'objets contenant les catégories triées alphabétiquement
   */
  public static function getAllCategories()
  {
    // Instanciation du Query Builder
    $db = new Query();
    
    // Construction et exécution de la requête
    // select() : sélectionne toutes les colonnes de la table categorieformation
    // order_by() : trie les résultats par nom de catégorie (type) en ordre croissant
    // execute() : exécute la requête et retourne un tableau d'objets
    $result = $db->select("*", "categorieformation")
                 ->order_by("type", "ASC")
                 ->execute();
    
    return $result;
  }

  /**
   * Récupère une catégorie spécifique par son identifiant
   * 
   * Requête SQL générée :
   * SELECT * FROM categorieformation WHERE id = ?
   * 
   * @param int $id Identifiant unique de la catégorie recherchée
   * @return object|null Objet catégorie si trouvé, null sinon
   */
  public static function getCategorieById($id)
  {
    // Instanciation du Query Builder
    $db = new Query();
    
    // Construction et exécution de la requête avec condition WHERE
    // where() : ajoute une clause WHERE id = ?
    // execute([$id]) : exécute avec le paramètre sécurisé (protection contre injection SQL)
    $result = $db->select("*", "categorieformation")
                 ->where("", "id", "=")
                 ->execute([$id]);
    
    // Retourne le premier résultat s'il existe, sinon null
    return !empty($result) ? $result[0] : null;
  }
}