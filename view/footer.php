<?php
/*
 * FICHIER : footer.php
 * DESCRIPTION : Pied de page commun de toutes les pages + scripts JavaScript
 * AUTEUR : Équipe SkillHub
 * DATE : Février 2026
 */
?>

    <!-- ============================================ -->
    <!-- PIED DE PAGE -->
    <!-- ============================================ -->
    <footer class="footer">
        <!-- Section supérieure : Liens organisés en colonnes -->
        <div class="footer-top">
            <!-- Colonne 1 : Liens de navigation -->
            <div class="footer-section">
                <h4>Liens utiles</h4>
                <ul>
                    <li><a href="<?= URL ?>">Accueil</a></li>
                    <li><a href="#">À propos</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>

            <!-- Colonne 2 : Réseaux sociaux -->
            <div class="footer-section">
                <h4>Suivez-nous</h4>
                <ul class="social-links">
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">LinkedIn</a></li>
                </ul>
            </div>

            <!-- Colonne 3 : Mentions légales -->
            <div class="footer-section">
                <h4>Légal</h4>
                <ul>
                    <li><a href="#">Mentions légales</a></li>
                    <li><a href="#">Politique RGPD</a></li>
                </ul>
            </div>
        </div>

        <!-- Section inférieure : Copyright -->
        <!-- Utilisation de la fonction PHP date() pour afficher l'année courante -->
        <div class="footer-bottom">
            <p>&copy; <?= date('Y') ?> Skill Hub. Tous droits réservés.</p>
        </div>
    </footer>

    <!-- ============================================ -->
    <!-- INCLUSION DE LA MODALE D'AUTHENTIFICATION -->
    <!-- ============================================ -->
    <!-- La modale est présente sur toutes les pages pour permettre la connexion/inscription -->
    <?php require_once "view/modale-auth.php"; ?>

    <!-- ============================================ -->
    <!-- SCRIPTS JAVASCRIPT -->
    <!-- ============================================ -->
    
    <!-- Bibliothèque jQuery (requis pour les requêtes AJAX) -->
    <script src="<?= URL ?>public/js/jquery.js"></script>
    
    <!-- Configuration de l'URL de base pour AJAX -->
    <script src="<?= URL ?>public/js/url.js"></script>
    
    <!-- Gestion du menu burger et de la modale -->
    <script src="<?= URL ?>public/js/script.js"></script>
    
    <!-- Scripts JavaScript additionnels (optionnels) -->
    <!-- Si le contrôleur définit la variable $additionalJS, les fichiers seront inclus -->
    <!-- Exemple d'utilisation dans un contrôleur :
         $additionalJS = ['formations.js'];
    -->
    <?php if(isset($additionalJS)): ?>
        <?php foreach($additionalJS as $jsFile): ?>
            <script src="<?= URL ?>public/js/<?= $jsFile ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>

</body>
</html>