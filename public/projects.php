<?php
// 1. Initialisation
require_once '../src/functions.php';
$data = getSiteData();

// On écrase le titre pour le SEO de cette page spécifique
$data['meta']['title'] = "Tous mes projets | " . explode('|', $data['meta']['title'])[0];
?>

<!DOCTYPE html>
<html lang="fr">
<?php require_once '../src/templates/_head.php'; ?>
<body class="bg-dark text-white">

    <!-- NAV (On réutilise la même) -->
    <?php require_once '../src/templates/nav.php'; ?>

    <!-- HEADER SIMPLE POUR LA PAGE PROJET -->
    <section style="padding-top: 180px; padding-bottom: 60px; text-align: center;">
        <div class="container">
            <span class="text-accent reveal-item" style="text-transform: uppercase; letter-spacing: 2px; font-weight: 700; font-size: 0.9rem;">
                Archives
            </span>
            <h1 class="reveal-item" style="font-size: 4rem; margin-top: 10px; margin-bottom: 20px;">
                Tous mes travaux
            </h1>
            <p class="reveal-item text-muted" style="max-width: 500px; margin: 0 auto;">
                Une collection complète de mes designs, expérimentations et collaborations récentes.
            </p>
        </div>
    </section>

    <!-- GRILLE COMPLÈTE -->
    <section style="padding-bottom: 100px;">
        <div class="container">
            <div class="bento-grid">
                <?php 
                // ICI ON NE FILTRE PAS -> On affiche tout
                $projects = $data['projects'] ?? [];

                foreach ($projects as $index => $project): 
                    // On peut forcer une grille plus régulière ici si on veut, 
                    // ou garder le layout "span-2" du JSON. Gardons le layout.
                    $sizeClass = ($project['size'] === 'large') ? 'span-2' : 'span-1';
                    
                    $imgSrc = $project['image'];
                    if (strpos($imgSrc, 'http') !== 0) { $imgSrc = 'assets/images/' . $imgSrc; }
                    
                    // Petit délai d'animation progressif
                    $delay = ($index % 4) * 100;
                ?>
                    <article class="project-item <?= $sizeClass ?> reveal-item" style="transition-delay: <?= $delay ?>ms;">
                        <a href="<?= $project['link'] ?>" style="display: block; width: 100%; height: 100%;">
                            <div class="img-wrapper">
                                <img src="<?= $imgSrc ?>" alt="<?= $project['title'] ?>" loading="lazy">
                                <div style="position: absolute; inset:0; background: linear-gradient(to top, rgba(0,0,0,0.9), transparent);"></div>
                            </div>
                            <div class="project-info">
                                <div class="glass-panel" style="padding: 15px; border-radius: 12px; background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.1);">
                                    <span class="text-accent" style="font-size: 0.75rem; text-transform: uppercase; font-weight: 700;">
                                        <?= $project['category'] ?>
                                    </span>
                                    <h3 style="font-size: 1.25rem; margin: 4px 0 0 0; color: white;">
                                        <?= $project['title'] ?>
                                    </h3>
                                </div>
                            </div>
                        </a>
                    </article>
                <?php endforeach; ?>
            </div>
            
            <!-- Retour Accueil -->
            <div style="text-align: center; margin-top: 80px;">
                <a href="index.php" style="color: #888; border-bottom: 1px solid #444; padding-bottom: 4px;">← Retour à l'accueil</a>
            </div>
        </div>
    </section>

    <?php require_once '../src/templates/footer.php'; ?>
    <?php require_once '../src/templates/_scripts.php'; ?>

</body>
</html>