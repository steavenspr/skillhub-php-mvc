<?php

class accueilControl
{
  /**
   * Affiche la page d'accueil
   */
  public function index()
  {
    // Titre de la page
    $pageTitle = "Skill Hub - Accueil";
    
    // Chargement de la vue
    require_once "view/accueil.php";
  }
}