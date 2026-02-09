<?php

require_once "model/formationModel.php";
require_once "model/categorieModel.php";

class formationControl
{
  /**
   * Page principale : Afficher toutes les formations
   */
  public function index()
  {
    // Titre de la page
    $pageTitle = "Skill Hub - Formations";
    
    // Récupérer toutes les formations depuis la BDD
    $formations = formationModel::getAllFormations();
    
    // JavaScript additionnel pour cette page
    $additionalJS = ['formations.js'];
    
    // Chargement de la vue
    require_once "view/formations.php";
  }

  /**
   * Méthode AJAX : Filtrer les formations
   * Appelée via AJAX depuis formations.js
   */
  public function filtrer()
  {
    // Vérifier que c'est bien une requête AJAX
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      
      // Récupérer les paramètres envoyés par AJAX
      $niveau = isset($_POST['niveau']) ? trim($_POST['niveau']) : "";
      $format = isset($_POST['format']) ? trim($_POST['format']) : "";
      $recherche = isset($_POST['recherche']) ? trim($_POST['recherche']) : "";
      
      // Appeler le modèle pour filtrer
      $formations = formationModel::getFormationsFiltered($niveau, $format, $recherche);
      
      // Retourner les résultats en JSON
      header('Content-Type: application/json');
      echo json_encode($formations);
      exit;
      
    } else {
      // Si ce n'est pas une requête POST, rediriger vers la page formations
      header('Location: ' . URL . 'formation');
      exit;
    }
  }
}