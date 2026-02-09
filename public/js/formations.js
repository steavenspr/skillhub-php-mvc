/*
 * FICHIER : formations.js
 * DESCRIPTION : Gestion du filtrage dynamique des formations via AJAX
 * AUTEUR : Équipe SkillHub
 * DATE : Février 2026
 */

// ============================================
// RÉCUPÉRATION DES ÉLÉMENTS DOM
// ============================================
// Sélecteurs de filtres
const niveauFilter = document.getElementById("niveau-filter");
const formatFilter = document.getElementById("format-filter");
const rechercheFilter = document.getElementById("recherche-filter");

// Conteneur d'affichage des résultats
const formationsContainer = document.getElementById("formations-container");

// Messages d'état
const loadingMessage = document.getElementById("loading-message");
const noResultsMessage = document.getElementById("no-results-message");

// ============================================
// FONCTION PRINCIPALE DE FILTRAGE
// ============================================
/**
 * Envoie une requête AJAX au serveur pour filtrer les formations
 * selon les critères sélectionnés par l'utilisateur
 *
 * Les trois filtres peuvent être combinés :
 * - Niveau (débutant, intermédiaire, avancé)
 * - Format (présentiel, visio)
 * - Recherche textuelle (dans le titre)
 */
function filtrerFormations() {
  // Récupération des valeurs actuelles des filtres
  const niveau = niveauFilter.value;
  const format = formatFilter.value;
  const recherche = rechercheFilter.value;

  // Affichage du message de chargement
  loadingMessage.style.display = "block";
  formationsContainer.style.display = "none";
  noResultsMessage.style.display = "none";

  // Envoi de la requête AJAX au serveur
  $.ajax({
    // URL du contrôleur et de la méthode
    url: url + "formation/filtrer",

    // Méthode HTTP POST
    type: "POST",

    // Données envoyées au serveur
    data: {
      niveau: niveau,
      format: format,
      recherche: recherche,
    },

    // Format de réponse attendu
    dataType: "json",

    // Fonction exécutée en cas de succès
    success: function (formations) {
      // Masquage du message de chargement
      loadingMessage.style.display = "none";
      formationsContainer.style.display = "grid";
      formationsContainer.innerHTML = "";

      // Vérification si aucun résultat n'est retourné
      if (formations.length === 0) {
        noResultsMessage.style.display = "block";
        formationsContainer.style.display = "none";
        return;
      }

      // Parcours des formations retournées et création des cartes
      formations.forEach(function (formation) {
        const card = creerCarteFormation(formation);
        formationsContainer.innerHTML += card;
      });
    },

    // Fonction exécutée en cas d'erreur
    error: function (xhr, status, error) {
      // Affichage de l'erreur dans la console du navigateur
      console.error("Erreur AJAX:", error);

      // Masquage du message de chargement
      loadingMessage.style.display = "none";

      // Affichage d'un message d'erreur à l'utilisateur
      formationsContainer.innerHTML =
        "<p style='color:red; text-align:center;'>Erreur lors du chargement des formations.</p>";
      formationsContainer.style.display = "block";
    },
  });
}

// ============================================
// FONCTION DE CRÉATION DE CARTE FORMATION
// ============================================
/**
 * Génère le HTML d'une carte de formation
 *
 * @param {object} formation Objet contenant les données d'une formation
 * @return {string} Code HTML de la carte
 */
function creerCarteFormation(formation) {
  // Tableaux de correspondance pour l'affichage en français
  const niveauTexte = {
    debutant: "Débutant",
    intermediaire: "Intermédiaire",
    avance: "Avancé",
  };

  const formatTexte = {
    presentiel: "Présentiel",
    visio: "Visio",
  };

  // Formatage du prix : conversion en nombre décimal puis formatage français
  // Exemple : 499.00 devient "499,00"
  const prixFormate = parseFloat(formation.prix)
    .toFixed(2)
    .replace(".", ",")
    .replace(/\B(?=(\d{3})+(?!\d))/g, " ");

  // Construction du HTML de la carte
  // Les attributs data-niveau et data-format permettent le filtrage côté client si nécessaire
  return `
    <article class="formation-card" 
             data-niveau="${formation.niveau}" 
             data-format="${formation.format}">
      
      <img src="${url}public/${formation.image}" 
           alt="Formation ${formation.titre}" />
      
      <h3>${formation.titre}</h3>
      
      <p>${formation.description}</p>
      
      <div class="formation-info">
        <span class="formation-niveau">
          <strong>Niveau :</strong> ${niveauTexte[formation.niveau] || formation.niveau}
        </span>
        
        <span class="formation-format">
          <strong>Format :</strong> ${formatTexte[formation.format] || formation.format}
        </span>
      </div>
      
      <div class="formation-details">
        <span class="formation-duree">${formation.duree}h</span>
        <span class="formation-prix">${prixFormate} EUR</span>
        <span class="formation-categorie">${formation.categorie}</span>
      </div>
      
      <button class="btn-detail" onclick="alert('Fonctionnalité en cours de développement')">
        Voir détail
      </button>
    </article>
  `;
}

// ============================================
// ÉCOUTEURS D'ÉVÉNEMENTS
// ============================================
// Filtre de niveau : déclenche le filtrage lors du changement de sélection
niveauFilter.addEventListener("change", filtrerFormations);

// Filtre de format : déclenche le filtrage lors du changement de sélection
formatFilter.addEventListener("change", filtrerFormations);

// Filtre de recherche : déclenche le filtrage avec un délai (debounce)
// pour éviter trop de requêtes lors de la saisie
let rechercheTimeout;
rechercheFilter.addEventListener("input", function () {
  // Annulation du timer précédent si l'utilisateur continue de taper
  clearTimeout(rechercheTimeout);

  // Déclenchement du filtrage après 500ms d'inactivité
  // Cela évite de surcharger le serveur avec trop de requêtes
  rechercheTimeout = setTimeout(filtrerFormations, 500);
});
