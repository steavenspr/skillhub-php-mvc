<?php
/*
 * FICHIER : accueil.php
 * DESCRIPTION : Page d'accueil de la plateforme SkillHub
 * AUTEUR : Équipe SkillHub
 * DATE : Février 2026
 */

// Inclusion de l'en-tête commun (HTML head + navigation)
require_once "view/header.php";
?>

<!-- ============================================ -->
<!-- SECTION HERO (Bannière principale) -->
<!-- ============================================ -->
<section class="hero">
    <!-- Bloc de texte avec titre, sous-titre et bouton d'action -->
    <div class="hero-card">
        <h1>
            Apprenez, collaborez et évoluez avec des formateurs experts sur SkillHub
        </h1>
        <h2>
            Accédez à des formations pratiques et collaborez avec des professionnels pour booster votre carrière
        </h2>
        <!-- Bouton d'action principal -->
        <!-- Redirige vers la page des formations en utilisant la constante URL -->
        <button class="cta btn btn-primary" onclick="window.location.href = '<?= URL ?>formation'">
            Commencez maintenant !
        </button>
    </div>

    <!-- Image illustrative de la section hero -->
    <div class="hero-image">
        <img src="<?= URL ?>public/img/home5.JPG" alt="Image de l'Accueil" />
    </div>
</section>

<!-- ============================================ -->
<!-- SECTION COMMENT ÇA MARCHE -->
<!-- ============================================ -->
<!-- Présentation du processus d'inscription et d'utilisation en 3 étapes -->
<section class="commentcamarche">
    <h2>Comment ça marche ?</h2>

    <div class="steps">
        <!-- Étape 1 : Inscription -->
        <article class="etape">
            <!-- Icône SVG représentant un utilisateur -->
            <svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
            <h3>Inscrivez-vous gratuitement</h3>
            <p>
                Créez votre compte en quelques clics pour accéder aux formations et à la communauté.
            </p>
        </article>

        <!-- Étape 2 : Choix de la formation -->
        <article class="etape">
            <!-- Icône SVG représentant un livre -->
            <svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
            </svg>
            <h3>Choisissez votre formation</h3>
            <p>
                Parcourez les thématiques et sélectionnez un parcours adapté à vos objectifs.
            </p>
        </article>

        <!-- Étape 3 : Apprentissage -->
        <article class="etape">
            <!-- Icône SVG représentant un diplôme -->
            <svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
            </svg>
            <h3>Apprenez et progressez</h3>
            <p>
                Suivez les modules, échangez avec des mentors, et validez vos compétences avec un certificat.
            </p>
        </article>
    </div>
</section>

<!-- ============================================ -->
<!-- SECTION NOS VALEURS -->
<!-- ============================================ -->
<!-- Présentation des 3 valeurs principales de la plateforme -->
<section class="nosvaleurs">
    <h2>Nos valeurs</h2>

    <div class="valeurs">
        <!-- Valeur 1 : Accessibilité -->
        <article class="valeur">
            <!-- Icône SVG représentant l'accessibilité -->
            <svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <h3>Accessibilité</h3>
            <p>
                Nous croyons que la connaissance doit être accessible à chacun, partout et à tout moment.
            </p>
        </article>

        <!-- Valeur 2 : Collaboration -->
        <article class="valeur">
            <!-- Icône SVG représentant un groupe -->
            <svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            <h3>Collaboration</h3>
            <p>
                Apprendre ensemble, partager des idées et progresser grâce à la force du collectif.
            </p>
        </article>

        <!-- Valeur 3 : Excellence -->
        <article class="valeur">
            <!-- Icône SVG représentant une étoile -->
            <svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
            </svg>
            <h3>Excellence</h3>
            <p>
                Nous nous engageons à offrir des contenus de qualité et à accompagner chaque apprenant vers l'excellence.
            </p>
        </article>
    </div>
</section>

<!-- ============================================ -->
<!-- SECTION ESPACES (Apprenant / Formateur) -->
<!-- ============================================ -->
<!-- Présentation des deux espaces de la plateforme -->
<!-- Fonctionnalité non encore implémentée -->
<section class="espace" aria-labelledby="espace-title">
    <!-- Espace Apprenants -->
    <article class="carte-espace">
        <img src="<?= URL ?>public/img/student2.png" alt="logo etudiant" />
        <button type="button">Espace apprenants</button>
    </article>

    <!-- Espace Formateurs -->
    <article class="carte-espace">
        <img src="<?= URL ?>public/img/prof1.png" alt="logo formateur" />
        <button type="button">Espace formateurs</button>
    </article>
</section>

<!-- ============================================ -->
<!-- SECTION TÉMOIGNAGES -->
<!-- ============================================ -->
<!-- Affichage de 3 témoignages d'utilisateurs -->
<!-- Ces données sont actuellement statiques (non issues de la base de données) -->
<section class="temoignes">
    <h2>Témoignages</h2>

    <div class="temoignages-container">
        <!-- Témoignage 1 -->
        <article class="temoin">
            <img src="<?= URL ?>public/img/temoin1.webp" alt="Photo de Franck Dupont" />
            <h3>Franck Dupont</h3>
            <p class="role">Développeur Web</p>
            <p class="citation">
                "Super plateforme, j'ai appris rapidement et les formateurs sont très pédagogues !"
            </p>
        </article>

        <!-- Témoignage 2 -->
        <article class="temoin">
            <img src="<?= URL ?>public/img/temoin2.webp" alt="Photo de Shayma Jay" />
            <h3>Shayma Jay</h3>
            <p class="role">Designer UX/UI</p>
            <p class="citation">
                "Les ateliers sont vraiment pratiques et m'ont permis de monter en compétences."
            </p>
        </article>

        <!-- Témoignage 3 -->
        <article class="temoin">
            <img src="<?= URL ?>public/img/temoin3.jpg" alt="Photo de Jarrel Leroy" />
            <h3>Jarrel Leroy</h3>
            <p class="role">Chef de projet digital</p>
            <p class="citation">
                "Une communauté bienveillante et des formations de qualité. Je recommande !"
            </p>
        </article>
    </div>
</section>

<?php
// Inclusion du pied de page commun (footer + scripts JS)
require_once "view/footer.php";
?>