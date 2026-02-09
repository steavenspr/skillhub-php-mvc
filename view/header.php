<?php
/*
 * FICHIER : header.php
 * DESCRIPTION : En-tête commun de toutes les pages (HTML head + navigation)
 * AUTEUR : Équipe SkillHub
 * DATE : Février 2026
 */
?>
<!doctype html>
<html lang="fr">
<head>
    <!-- Encodage et viewport -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!-- Métadonnées SEO -->
    <meta name="description" content="Skill Hub - Plateforme de formations en ligne pour apprendre, collaborer et évoluer avec des experts." />
    <meta name="keywords" content="formation en ligne, Skill Hub, apprentissage, mentors, cours" />
    <meta name="author" content="Skill Hub" />
    
    <!-- Titre dynamique de la page -->
    <!-- Si $pageTitle est défini dans le contrôleur, il sera utilisé, sinon "Skill Hub" par défaut -->
    <title><?= isset($pageTitle) ? $pageTitle : 'Skill Hub' ?></title>
    
    <!-- Feuille de style principale -->
    <!-- Utilisation de la constante URL définie dans index.php -->
    <link rel="stylesheet" href="<?= URL ?>public/css/style.css" />
</head>

<body>
    <!-- ============================================ -->
    <!-- NAVIGATION PRINCIPALE -->
    <!-- ============================================ -->
    <header>
        <!-- Logo cliquable ramenant à l'accueil -->
        <div id="logo">
            <a class="logo-brand" href="<?= URL ?>">
                <img src="<?= URL ?>public/img/logo5.webp" alt="Logo SkillHub" />
            </a>
        </div>

        <!-- Icône menu burger pour mobile -->
        <!-- Géré par script.js via la classe .burger -->
        <div class="burger">
            <img src="<?= URL ?>public/img/leftburger.svg" alt="Menu burger" />
        </div>

        <!-- Menu de navigation -->
        <!-- Sur mobile, le menu est masqué et s'affiche au clic sur le burger -->
        <nav>
            <ul>
                <li><a href="<?= URL ?>">Accueil</a></li>
                <li><a href="<?= URL ?>formation">Formations</a></li>
                <li><a href="#">A propos</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">Utilisateurs</a></li>
            </ul>
        </nav>

        <!-- Bouton d'ouverture de la modale d'authentification -->
        <!-- Déclenche l'affichage de la modale via script.js -->
        <div class="connecter">
            <button id="btn-open-modal">S'inscrire / Se connecter</button>
        </div>
    </header>