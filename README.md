# SkillHub — PHP MVC + AJAX (Architecture MVC sans framework)

SkillHub est un mini-projet académique servant de **vitrine technique** pour démontrer mes compétences en développement web full-stack sans framework.  
La plateforme met en relation des **apprenants en reconversion** et des **formateurs indépendants** via des ateliers courts et pratiques (2h à 8h).

Cette version repose sur **PHP natif**, une **architecture MVC**, et des échanges asynchrones via **AJAX**.

---

## Objectifs du projet

Ce projet a pour but de mettre en pratique et valoriser :

- la structuration d’une application PHP en MVC,
- la communication front / back avec AJAX (Fetch),
- la gestion de l’authentification et des rôles,
- les opérations CRUD,
- l’organisation d’un projet réel orienté production.

Il sert également de **support portfolio pour des recruteurs**.

---

## Fonctionnalités

- Inscription et connexion sécurisées
- Gestion de session utilisateur
- Rôles :
  - Apprenant : consultation et suivi d’ateliers
  - Formateur : création et gestion d’ateliers
- Listing d’ateliers sous forme de cartes
- Requêtes dynamiques sans rechargement (AJAX)
- Validation côté client et serveur
- Architecture MVC :
  - Models : logique métier
  - Views : rendu
  - Controllers : traitement des requêtes
- Interface responsive

---

## Stack technique

- PHP natif (sans framework)
- MySQL
- HTML5
- CSS3
- JavaScript (Fetch / AJAX)
- Architecture MVC

---

## Architecture du projet

```text
/app
  /controllers
  /models
  /views
/public
/config
/index.php


Logique MVC
Model : accès aux données, règles métier

View : affichage HTML

Controller : réception des requêtes, appels aux models, retour des vues ou JSON

Les actions AJAX communiquent avec les controllers et retournent des réponses JSON.

Installation locale
Cloner le projet

git clone https://github.com/USERNAME/skillhub-php-mvc.git
Importer la base de données MySQL

Configurer la connexion :

/config/database.php
Lancer via WAMP / XAMPP / serveur local

Workflow de développement
Le projet suit un workflow proche du monde professionnel :

Création d’issues

Branches par fonctionnalité

Commits explicites

Pull Requests

Code review

Merge vers main

Compétences mises en œuvre
Conception d’architecture MVC

Développement PHP backend

Communication AJAX

Gestion des sessions et sécurité

Organisation de projet Git

Travail par features

État du projet
Projet académique en évolution servant de base portfolio.

Auteur
Stea SO
Étudiant en systèmes d’information et développement web


---

Si tu veux, je peux ajouter une section plus technique du type :

- Endpoints AJAX
- Sécurité (password_hash, tokens, etc.)
- Exemple de requête Fetch

Tu me dis et je l’améliore.
```
