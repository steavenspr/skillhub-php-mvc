/*
 * FICHIER : script.js
 * DESCRIPTION : Gestion de l'interface utilisateur (menu burger, modale d'authentification)
 * AUTEUR : Équipe SkillHub
 * DATE : Février 2026
 */

// ============================================
// MENU BURGER (Responsive Mobile)
// ============================================
// Récupération des éléments DOM du menu burger
const burger = document.querySelector(".burger");
const navUl = document.querySelector("nav ul");

// Ajout de l'écouteur d'événement au clic sur l'icône burger
// Bascule la classe 'active' pour afficher/masquer le menu sur mobile
burger.addEventListener("click", () => {
  navUl.classList.toggle("active");
});

// ============================================
// GESTION MODALE D'AUTHENTIFICATION
// ============================================
// Récupération des éléments DOM de la modale
const modal = document.getElementById("modal-auth");
const btnOpenModal = document.getElementById("btn-open-modal");
const btnCloseModal = document.getElementById("btn-close-modal");
const modalOverlay = document.querySelector(".modal-overlay");

// Récupération des éléments pour les onglets et formulaires
const tabBtns = document.querySelectorAll(".tab-btn");
const formInscription = document.getElementById("form-inscription");
const formConnexion = document.getElementById("form-connexion");

// --------------------------------------------
// Ouverture de la modale
// --------------------------------------------
// Écouteur d'événement sur le bouton "S'inscrire / Se connecter"
btnOpenModal.addEventListener("click", () => {
  // Ajout de la classe 'active' pour afficher la modale
  modal.classList.add("active");

  // Désactivation du scroll de la page en arrière-plan
  document.body.style.overflow = "hidden";

  // Activation du piège de focus pour l'accessibilité
  trapFocus();
});

// --------------------------------------------
// Fermeture de la modale
// --------------------------------------------
// Écouteur sur le bouton de fermeture (X)
btnCloseModal.addEventListener("click", closeModal);

// Écouteur sur le fond sombre (overlay) pour fermer en cliquant à l'extérieur
modalOverlay.addEventListener("click", closeModal);

// Écouteur sur la touche Échap pour fermer la modale
document.addEventListener("keydown", (e) => {
  if (e.key === "Escape" && modal.classList.contains("active")) {
    closeModal();
  }
});

/**
 * Fonction de fermeture de la modale
 * Retire la classe 'active' et réactive le scroll de la page
 */
function closeModal() {
  modal.classList.remove("active");
  document.body.style.overflow = "";
}

// ============================================
// GESTION DES ONGLETS (Inscription / Connexion)
// ============================================
// Parcours de tous les boutons d'onglet
tabBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    // Retrait de la classe 'active' de tous les onglets et formulaires
    tabBtns.forEach((b) => b.classList.remove("active"));
    formInscription.classList.remove("active");
    formConnexion.classList.remove("active");

    // Activation de l'onglet cliqué
    btn.classList.add("active");

    // Récupération du nom de l'onglet via l'attribut data-tab
    const tabName = btn.getAttribute("data-tab");

    // Affichage du formulaire correspondant
    if (tabName === "inscription") {
      formInscription.classList.add("active");
    } else {
      formConnexion.classList.add("active");
    }
  });
});

// ============================================
// PIÈGE DE FOCUS (Accessibilité)
// ============================================
/**
 * Fonction qui piège le focus dans la modale
 * Empêche la navigation au clavier de sortir de la modale
 * Améliore l'accessibilité pour les utilisateurs de lecteurs d'écran
 */
function trapFocus() {
  // Sélection de tous les éléments focusables dans la modale
  const focusableElements = modal.querySelectorAll(
    'button, input, select, textarea, [tabindex]:not([tabindex="-1"])',
  );

  // Récupération du premier et dernier élément focusable
  const firstElement = focusableElements[0];
  const lastElement = focusableElements[focusableElements.length - 1];

  // Écouteur sur la touche Tab
  modal.addEventListener("keydown", (e) => {
    if (e.key === "Tab") {
      // Tab + Shift : navigation arrière
      if (e.shiftKey) {
        if (document.activeElement === firstElement) {
          e.preventDefault();
          lastElement.focus();
        }
      } else {
        // Tab seul : navigation avant
        if (document.activeElement === lastElement) {
          e.preventDefault();
          firstElement.focus();
        }
      }
    }
  });

  // Placement du focus sur le premier élément à l'ouverture
  firstElement.focus();
}

// ============================================
// SOUMISSION DES FORMULAIRES (Version statique)
// ============================================
// Note : Ces gestionnaires sont temporaires
// Ils seront remplacés par des requêtes AJAX lors de l'implémentation
// de la fonctionnalité d'authentification côté serveur

// Gestion du formulaire d'inscription
formInscription.addEventListener("submit", (e) => {
  // Empêche l'envoi du formulaire par défaut
  e.preventDefault();

  // Affichage d'un message temporaire
  alert("Formulaire d'inscription soumis ! (Version statique)");

  // Fermeture de la modale
  closeModal();
});

// Gestion du formulaire de connexion
formConnexion.addEventListener("submit", (e) => {
  // Empêche l'envoi du formulaire par défaut
  e.preventDefault();

  // Affichage d'un message temporaire
  alert("Formulaire de connexion soumis ! (Version statique)");

  // Fermeture de la modale
  closeModal();
});
