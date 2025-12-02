<?php
/**
 * HEAD HTML GLOBAL
 * Inclus sur toutes les pages du site (index.php, projects.php, etc.)
 */

// SÉCURITÉ : Si le site n'est pas encore installé (pas de config-site.php),
// on redirige de force vers l'assistant d'installation.
if (!file_exists(__DIR__ . '/../../config-site.php')) {
    header('Location: install.php');
    exit;
}

// On charge la configuration pour récupérer la couleur personnalisée.
require_once __DIR__ . '/../../config-site.php';
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- SEO Dynamique -->
    <title><?= e($data['meta']['title'] ?? 'Portfolio') ?></title>
    <meta name="description" content="<?= e($data['meta']['description'] ?? '') ?>">
    <meta name="author" content="<?= e($data['config']['logo_text'] ?? 'Designer') ?>">

    <!-- Partage Réseaux Sociaux -->
    <meta property="og:title" content="<?= e($data['meta']['title'] ?? '') ?>">
    <meta property="og:description" content="<?= e($data['meta']['description'] ?? '') ?>">
    <meta property="og:image" content="<?= e($data['meta']['og_image'] ?? '') ?>">

    <!-- Favicon Dynamique -->
    <?php
        $fav = $data['meta']['favicon'] ?? 'favicon.png';
        if (strpos($fav, 'http') !== 0) $fav = 'assets/images/' . $fav;
    ?>
    <link rel="icon" type="image/png" href="<?= e($fav) ?>">

    <!-- Polices de caractères (Google Fonts) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Outfit:wght@700;800&display=swap" rel="stylesheet">

    <!-- MAGIE : Injection de la couleur choisie par l'utilisateur -->
    <style>
        :root {
            --accent: <?= defined('ACCENT_COLOR') ? ACCENT_COLOR : '#ccff00'; ?>;
        }
    </style>
    
    <!-- Fichier CSS Principal -->
    <link rel="stylesheet" href="assets/css/main.css?v=<?= filemtime(__DIR__ . '/../../public/assets/css/main.css') ?>">
    
    <!-- Script Anti-Flash au chargement -->
    <script>
        document.documentElement.classList.add('js-loading');
        window.addEventListener('load', () => { document.documentElement.classList.remove('js-loading'); });
    </script>
    <style>html.js-loading { opacity: 0; transition: opacity 0.5s ease; } html { opacity: 1; }</style>
</head>