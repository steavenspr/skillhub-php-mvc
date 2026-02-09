<?php
/*
 * FICHIER : modale-auth.php
 * DESCRIPTION : Modale d'inscription et de connexion des utilisateurs
 * AUTEUR : Équipe SkillHub
 * DATE : Février 2026
 */
?>

<!-- ============================================ -->
<!-- MODALE D'INSCRIPTION / CONNEXION -->
<!-- ============================================ -->
<!-- Cette modale est masquée par défaut et s'affiche au clic sur le bouton du header -->
<!-- Gestion de l'ouverture/fermeture dans public/js/script.js -->
<div class="modal" id="modal-auth">
    <!-- Overlay semi-transparent pour fermer la modale au clic -->
    <div class="modal-overlay"></div>

    <!-- Contenu de la modale -->
    <div class="modal-content">
        <!-- Bouton de fermeture (croix) -->
        <button class="modal-close" id="btn-close-modal" aria-label="Fermer la modale">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>

        <!-- Onglets de navigation entre Inscription et Connexion -->
        <!-- L'onglet actif a la classe 'active' -->
        <div class="modal-tabs">
            <button class="tab-btn" data-tab="inscription">Inscription</button>
            <button class="tab-btn active" data-tab="connexion">Connexion</button>
        </div>

        <!-- ============================================ -->
        <!-- FORMULAIRE D'INSCRIPTION -->
        <!-- ============================================ -->
        <!-- Par défaut masqué, s'affiche au clic sur l'onglet Inscription -->
        <form class="modal-form" id="form-inscription">
            <h2>Créez votre compte</h2>

            <!-- Champ Nom -->
            <div class="form-group">
                <label for="nom">Nom *</label>
                <input type="text" id="nom" name="nom" required />
            </div>

            <!-- Champ Prénom -->
            <div class="form-group">
                <label for="prenom">Prénom *</label>
                <input type="text" id="prenom" name="prenom" required />
            </div>

            <!-- Champ Email -->
            <div class="form-group">
                <label for="email-inscription">Email *</label>
                <input type="email" id="email-inscription" name="email" required />
            </div>

            <!-- Champ Téléphone (optionnel) -->
            <div class="form-group">
                <label for="telephone">Téléphone</label>
                <input type="tel" id="telephone" name="telephone" />
            </div>

            <!-- Champ Mot de passe -->
            <div class="form-group">
                <label for="password-inscription">Mot de passe *</label>
                <input type="password" id="password-inscription" name="password" required />
            </div>

            <!-- Sélection du rôle (Apprenant ou Formateur) -->
            <!-- Les valeurs correspondent aux valeurs ENUM de la table utilisateur -->
            <div class="form-group">
                <label for="role">Je suis *</label>
                <select id="role" name="role" required>
                    <option value="">Sélectionnez...</option>
                    <option value="apprenant">Apprenant</option>
                    <option value="formateur">Formateur</option>
                </select>
            </div>

            <!-- Bouton de soumission -->
            <!-- La soumission sera gérée par AJAX dans une future version -->
            <button type="submit" class="btn-submit">S'inscrire</button>
        </form>

        <!-- ============================================ -->
        <!-- FORMULAIRE DE CONNEXION -->
        <!-- ============================================ -->
        <!-- Affiché par défaut grâce à la classe 'active' -->
        <form class="modal-form active" id="form-connexion">
            <h2>Connectez-vous</h2>

            <!-- Champ Email -->
            <div class="form-group">
                <label for="email-connexion">Email *</label>
                <input type="email" id="email-connexion" name="email" required />
            </div>

            <!-- Champ Mot de passe -->
            <div class="form-group">
                <label for="password-connexion">Mot de passe *</label>
                <input type="password" id="password-connexion" name="password" required />
            </div>

            <!-- Bouton de soumission -->
            <!-- La soumission sera gérée par AJAX dans une future version -->
            <button type="submit" class="btn-submit">Se connecter</button>

            <!-- Lien mot de passe oublié -->
            <p class="forgot-password"><a href="#">Mot de passe oublié ?</a></p>
        </form>
    </div>
</div>