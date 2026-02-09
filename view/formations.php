<?php
/*
 * FICHIER : formations.php
 * DESCRIPTION : Page de liste des formations avec système de filtrage AJAX
 * AUTEUR : Équipe SkillHub
 * DATE : Février 2026
 */

// Inclusion de l'en-tête commun (HTML head + navigation)
require_once "view/header.php";
?>

<!-- ============================================ -->
<!-- SECTION HERO -->
<!-- ============================================ -->
<!-- Bannière de présentation de la page formations -->
<section class="formations-hero">
    <h1>Nos formations SkillHub</h1>
    <p>Découvrez des ateliers pratiques pour booster vos compétences.</p>
</section>

<!-- ============================================ -->
<!-- SECTION FILTRES -->
<!-- ============================================ -->
<!-- Système de filtrage dynamique des formations -->
<!-- Les filtres déclenchent des requêtes AJAX gérées par formations.js -->
<section class="formations-filtres">
    <!-- Filtre par niveau de difficulté -->
    <div class="filter-group">
        <label for="niveau-filter">Niveau de la formation</label>
        <select id="niveau-filter">
            <option value="">Tous les niveaux</option>
            <option value="debutant">Débutant</option>
            <option value="intermediaire">Intermédiaire</option>
            <option value="avance">Avancé</option>
        </select>
    </div>

    <!-- Filtre par format de formation -->
    <div class="filter-group">
        <label for="format-filter">Format de la formation</label>
        <select id="format-filter">
            <option value="">Tous les formats</option>
            <option value="presentiel">Présentiel</option>
            <option value="visio">Visio</option>
        </select>
    </div>

    <!-- Champ de recherche textuelle -->
    <!-- Utilise un système de debounce (délai de 500ms) pour limiter les requêtes -->
    <div class="filter-group">
        <label for="recherche-filter">Recherche par mot-clé</label>
        <input
            type="text"
            id="recherche-filter"
            placeholder="Rechercher une formation..."
        />
    </div>
</section>

<!-- ============================================ -->
<!-- SECTION LISTE DES FORMATIONS -->
<!-- ============================================ -->
<!-- Conteneur des cartes de formation -->
<!-- Ce conteneur est rechargé dynamiquement via AJAX lors du filtrage -->
<section class="formations-list" id="formations-container">
    <?php if (!empty($formations)): ?>
        <!-- Boucle sur toutes les formations passées par le contrôleur -->
        <?php foreach ($formations as $formation): ?>
            <article class="formation-card" 
                     data-niveau="<?= htmlspecialchars($formation->niveau) ?>" 
                     data-format="<?= htmlspecialchars($formation->format) ?>">
                
                <!-- Image de la formation -->
                <!-- htmlspecialchars() protège contre les injections XSS -->
                <img src="<?= URL ?>public/<?= htmlspecialchars($formation->image) ?>" 
                     alt="Formation <?= htmlspecialchars($formation->titre) ?>" />
                
                <!-- Titre de la formation -->
                <h3><?= htmlspecialchars($formation->titre) ?></h3>
                
                <!-- Description de la formation -->
                <p><?= htmlspecialchars($formation->description) ?></p>
                
                <!-- Informations sur le niveau et le format -->
                <div class="formation-info">
                    <!-- Niveau avec traduction en français -->
                    <span class="formation-niveau">
                        <strong>Niveau :</strong> 
                        <?php
                        // Tableau de correspondance pour afficher le niveau en français
                        $niveauTexte = [
                            'debutant' => 'Débutant',
                            'intermediaire' => 'Intermédiaire',
                            'avance' => 'Avancé'
                        ];
                        echo $niveauTexte[$formation->niveau] ?? $formation->niveau;
                        ?>
                    </span>
                    
                    <!-- Format avec traduction en français -->
                    <span class="formation-format">
                        <strong>Format :</strong> 
                        <?php
                        // Tableau de correspondance pour afficher le format en français
                        $formatTexte = [
                            'presentiel' => 'Présentiel',
                            'visio' => 'Visio'
                        ];
                        echo $formatTexte[$formation->format] ?? $formation->format;
                        ?>
                    </span>
                </div>
                
                <!-- Détails complémentaires : durée, prix, catégorie -->
                <div class="formation-details">
                    <!-- Durée de la formation en heures -->
                    <span class="formation-duree"><?= htmlspecialchars($formation->duree) ?>h</span>
                    
                    <!-- Prix formaté en français (virgule comme séparateur décimal) -->
                    <!-- number_format(valeur, nb_decimales, separateur_decimal, separateur_milliers) -->
                    <span class="formation-prix"><?= number_format($formation->prix, 2, ',', ' ') ?> EUR</span>
                    
                    <!-- Catégorie de la formation -->
                    <span class="formation-categorie"><?= htmlspecialchars($formation->categorie) ?></span>
                </div>
                
                <!-- Bouton pour voir le détail -->
                <!-- Fonctionnalité non encore implémentée -->
                <button class="btn-detail" onclick="alert('Fonctionnalité en cours de développement')">
                    Voir détail
                </button>
            </article>
        <?php endforeach; ?>
    <?php else: ?>
        <!-- Message affiché si aucune formation n'est disponible -->
        <p class="no-formations">Aucune formation disponible pour le moment.</p>
    <?php endif; ?>
</section>

<!-- ============================================ -->
<!-- MESSAGES D'ÉTAT -->
<!-- ============================================ -->

<!-- Message de chargement affiché pendant les requêtes AJAX -->
<!-- Masqué par défaut, affiché via JavaScript -->
<div id="loading-message" style="display:none; text-align:center; padding:40px;">
    <p>Chargement des formations...</p>
</div>

<!-- Message affiché quand aucune formation ne correspond aux critères de filtrage -->
<!-- Masqué par défaut, affiché via JavaScript -->
<div id="no-results-message" style="display:none; text-align:center; padding:40px;">
    <p>Aucune formation ne correspond à vos critères.</p>
</div>

<?php
// Inclusion du pied de page commun (footer + scripts JS)
require_once "view/footer.php";
?>