<?php
/*
 * FICHIER : index.php
 * DESCRIPTION : Point d'entrée principal de l'application SkillHub
 * AUTEUR : Équipe SkillHub
 * DATE : Février 2026
 */

// ============================================
// DÉMARRAGE DE LA SESSION
// ============================================
// Indispensable pour gérer la connexion des utilisateurs
session_start();

// ============================================
// CONFIGURATION DE BASE
// ============================================
// Définition de l'URL racine de l'application
// Cette constante est utilisée dans toute l'application pour générer les liens
define("URL", "http://localhost/skillhub/");

// ============================================
// CHARGEMENT DU QUERY BUILDER
// ============================================
// Inclusion du Query Builder pour la gestion de la base de données
require_once "core/query.php";

// ============================================
// CHARGEMENT DU ROUTEUR
// ============================================
// Inclusion de la classe Root qui gère le système de routage
require_once "core/Root.php";

// ============================================
// GESTION DES ROUTES
// ============================================
// Vérification de la présence du paramètre 'action' dans l'URL
if(isset($_GET['action'])){
  // Si le paramètre existe, on délègue le traitement au routeur
  // Exemple : formation/filtrer sera traité par formationControl->filtrer()
  Root::executer($_GET['action']);
} else {
  // Pas de paramètre action, on affiche la page d'accueil par défaut
  require_once "control/accueilControl.php";
  $accueil = new accueilControl();
  $accueil->index();
}