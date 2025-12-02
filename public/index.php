<?php
/**
 * Point d'entrée principal du Portfolio
 * Architecture : PHP natif + JSON Data
 */

// 1. Configuration & Debug (A désactiver en prod)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 2. Chargement du "Cerveau" (Fonctions & Données)
require_once __DIR__ . '/../src/functions.php';

// 3. Récupération des données du site
// Si le fichier config n'existe pas, on charge des valeurs par défaut pour éviter le crash
$data = getSiteData();
?>

<!DOCTYPE html>
<html lang="fr" class="no-js">

<!-- Inclusion du <head> (Méta-données, CSS, Fonts) -->
<?php require_once __DIR__ . '/../src/templates/_head.php'; ?>

<body class="bg-dark text-white antialiased selection:bg-accent selection:text-black">

    <!-- ARRIÈRE-PLAN ANIMÉ (La base du Glassmorphism) -->
    <!-- Ces éléments fixes créent la profondeur sous les cartes en verre -->
    <div class="fixed inset-0 z-[-1] overflow-hidden pointer-events-none">
        <!-- Bruit granuleux pour la texture -->
        <div class="absolute inset-0 bg-noise opacity-[0.04]"></div>
        
        <!-- Orbes de couleur (Blobs) qui bougent lentement -->
        <div class="blob blob-1 top-[-10%] left-[-10%] bg-purple-500 blur-[100px] opacity-40 w-[500px] h-[500px] rounded-full absolute mix-blend-screen animate-float-slow"></div>
        <div class="blob blob-2 bottom-[-10%] right-[-10%] bg-green-500 blur-[120px] opacity-30 w-[600px] h-[600px] rounded-full absolute mix-blend-screen animate-float-slower"></div>
    </div>

    <!-- BARRE DE NAVIGATION (Glass) -->
    <?php require_once __DIR__ . '/../src/templates/nav.php'; ?>

    <!-- WRAPPER SCROLL FLUIDE (Pour Lenis.js) -->
    <main id="smooth-wrapper">
        
        <!-- 1. HERO SECTION (Parallaxe) -->
        <?php require_once __DIR__ . '/../src/templates/hero.php'; ?>

        <!-- 2. À PROPOS (Texte simple) -->
        <?php require_once __DIR__ . '/../src/templates/about.php'; ?>

        <!-- 3. GALERIE PROJETS (Cartes Glassmorphism) -->
        <?php require_once __DIR__ . '/../src/templates/gallery.php'; ?>

        <!-- 4. FOOTER / CONTACT -->
        <?php require_once __DIR__ . '/../src/templates/footer.php'; ?>

    </main>

    <!-- SCRIPTS JS (Lenis, Animations, etc.) -->
    <?php require_once __DIR__ . '/../src/templates/_scripts.php'; ?>

</body>
</html>