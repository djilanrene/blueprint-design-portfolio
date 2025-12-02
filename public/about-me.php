<?php
require_once '../src/functions.php';
$data = getSiteData();
// On sécurise ici aussi : si 'about_page' n'existe pas, on prend un tableau vide
$pageData = $data['about_page'] ?? [];

// SEO Spécifique
// On sécurise le titre aussi
$siteTitle = $data['meta']['title'] ?? 'Portfolio';
$data['meta']['title'] = "À propos de moi | " . explode('|', $siteTitle)[0];
?>

<!DOCTYPE html>
<html lang="fr">
<?php require_once '../src/templates/_head.php'; ?>
<body class="bg-dark text-white">

    <?php require_once '../src/templates/nav.php'; ?>

    <section style="padding-top: 140px; padding-bottom: 100px;">
        <div class="container">
            
            <div class="about-split-layout">
                
                <!-- COLONNE GAUCHE : IMAGE (Sticky) -->
                <div class="about-visual reveal-item">
                    <div class="img-frame">
                        <!-- AJOUT SÉCURITÉ : ?? '' -->
                        <img src="<?= e($pageData['image'] ?? '') ?>" alt="Portrait" loading="lazy">
                        <!-- Effet de cadre décoratif -->
                        <div class="frame-decor"></div>
                    </div>
                </div>

                <!-- COLONNE DROITE : HISTOIRE -->
                <div class="about-story reveal-item" style="transition-delay: 200ms;">
                    
                    <!-- C'EST ICI QUE L'ERREUR SE PRODUISAIT (Ligne 34 environ) -->
                    <span class="text-accent" style="text-transform: uppercase; letter-spacing: 2px; font-weight: 700; font-size: 0.9rem; display: block; margin-bottom: 20px;">
                        <!-- AJOUT SÉCURITÉ : ?? '' -->
                        <?= e($pageData['title'] ?? 'Mon Parcours') ?>
                    </span>
                    
                    <!-- Titre avec formatage magique -->
                    <h1 style="font-size: 3rem; line-height: 1.1; margin-bottom: 40px;">
                        <!-- AJOUT SÉCURITÉ : ?? '' -->
                        <?= renderText($pageData['headline'] ?? '') ?>
                    </h1>

                    <div class="story-content text-muted" style="font-size: 1.1rem; line-height: 1.8; margin-bottom: 50px;">
                        <?php 
                        // AJOUT SÉCURITÉ : On vérifie si 'story' existe et est un tableau
                        $story = $pageData['story'] ?? [];
                        if (is_array($story)) {
                            foreach($story as $paragraph): 
                        ?>
                            <!-- Paragraphe avec formatage magique -->
                            <p style="margin-bottom: 24px;"><?= renderText($paragraph) ?></p>
                        <?php 
                            endforeach; 
                        }
                        ?>
                    </div>

                    <!-- Compétences / Skills -->
                    <div style="border-top: 1px solid rgba(255,255,255,0.1); padding-top: 30px;">
                        <h4 style="margin-bottom: 20px; font-size: 1rem;">Compétences clés</h4>
                        <div style="display: flex; flex-wrap: wrap; gap: 10px;">
                            <?php 
                            // AJOUT SÉCURITÉ : On vérifie si 'skills' existe
                            $skills = $pageData['skills'] ?? [];
                            if (is_array($skills)) {
                                foreach($skills as $skill): 
                            ?>
                                <span style="padding: 8px 16px; border-radius: 50px; border: 1px solid rgba(255,255,255,0.1); font-size: 0.9rem; background: rgba(255,255,255,0.02);">
                                    <?= e($skill) ?>
                                </span>
                            <?php 
                                endforeach;
                            }
                            ?>
                        </div>
                    </div>

                    <!-- Signature / Contact Rapide -->
                    <div style="margin-top: 60px;">
                        <a href="mailto:<?= e($data['contact']['email'] ?? '') ?>" class="btn-primary">
                            Travailler avec moi
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <?php require_once '../src/templates/footer.php'; ?>
    <?php require_once '../src/templates/_scripts.php'; ?>

</body>
</html>

<!-- CSS SPÉCIFIQUE À CETTE PAGE -->
<style>
    .about-split-layout {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 80px;
        align-items: start; /* Important pour le sticky */
    }

    .about-visual {
        position: sticky;
        top: 120px; /* Colle l'image en haut quand on scroll */
    }

    .img-frame {
        position: relative;
        border-radius: 20px;
        overflow: hidden;
        aspect-ratio: 3/4; /* Format Portrait */
        background: #111; /* Fond gris si pas d'image */
    }
    
    /* Si pas d'image, on s'assure que le cadre a une taille */
    .img-frame img {
        min-height: 100%;
        width: 100%;
        display: block;
    }

    .frame-decor {
        position: absolute;
        inset: 0;
        border: 1px solid rgba(255,255,255,0.1);
        border-radius: 20px;
        z-index: 10;
    }

    /* RESPONSIVE */
    @media (max-width: 900px) {
        .about-split-layout {
            grid-template-columns: 1fr;
            gap: 50px;
        }
        
        .about-visual {
            position: relative; /* On désactive le sticky sur mobile */
            top: 0;
            max-width: 500px;
            margin: 0 auto;
        }

        h1 { font-size: 2.5rem !important; }
    }
</style>