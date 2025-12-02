<?php
require_once '../src/functions.php';
$data = getSiteData();

// 1. RÉCUPÉRATION DE L'ID
$projectId = $_GET['id'] ?? null;
$currentProject = null;
$nextProject = null;
$prevProject = null;

// 2. RECHERCHE DU PROJET
foreach ($data['projects'] as $index => $p) {
    if ($p['id'] == $projectId) {
        $currentProject = $p;
        // Navigation circulaire (Suivant / Précédent)
        $nextProject = $data['projects'][$index + 1] ?? $data['projects'][0]; 
        $prevProject = $data['projects'][$index - 1] ?? end($data['projects']);
        break;
    }
}

// Si pas de projet trouvé, retour accueil
if (!$currentProject) {
    header('Location: index.php');
    exit;
}

// SEO
$data['meta']['title'] = $currentProject['title'] . " | Étude de cas";

// Fallback sécurisé pour les détails
$details = $currentProject['details'] ?? [];

// Gestion Image (Local vs Http)
$heroImg = $currentProject['image'];
if (strpos($heroImg, 'http') !== 0) { $heroImg = 'assets/images/' . $heroImg; }
?>

<!DOCTYPE html>
<html lang="fr">
<?php require_once '../src/templates/_head.php'; ?>
<body class="bg-dark text-white">

    <?php require_once '../src/templates/nav.php'; ?>

    <!-- HERO PROJET -->
    <header style="padding-top: 150px; padding-bottom: 80px; position: relative; overflow: hidden;">
        <!-- Fond d'ambiance flouté -->
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: -1; opacity: 0.2;">
            <img src="<?= $heroImg ?>" style="width: 100%; height: 100%; object-fit: cover; filter: blur(100px);">
        </div>

        <div class="container text-center">
            <span class="text-accent reveal-item" style="text-transform: uppercase; letter-spacing: 2px; font-weight: 700;">
                <!-- renderText non nécessaire ici, e() suffit -->
                <?= e($currentProject['category']) ?>
            </span>
            <!-- TITRE AVEC FORMATAGE MAGIQUE ACTIVÉ -->
            <h1 class="reveal-item" style="font-size: 4rem; margin: 20px 0; line-height: 1.1;">
                <?= renderText($currentProject['title']) ?>
            </h1>
        </div>
    </header>

    <!-- GRANDE IMAGE DE COUVERTURE -->
    <div class="container reveal-item">
        <div style="border-radius: 20px; overflow: hidden; border: 1px solid rgba(255,255,255,0.1);">
            <img src="<?= $heroImg ?>" alt="Cover" style="width: 100%; max-height: 600px; object-fit: cover;">
        </div>
    </div>

    <!-- INFO DATA (Barre de Stats) -->
    <section>
        <div class="container">
            <div class="project-meta-grid reveal-item">
                <div class="meta-item">
                    <span class="label">Client</span>
                    <span class="value"><?= e($details['client'] ?? 'Non spécifié') ?></span>
                </div>
                <div class="meta-item">
                    <span class="label">Année</span>
                    <span class="value"><?= e($details['year'] ?? date('Y')) ?></span>
                </div>
                <div class="meta-item">
                    <span class="label">Mon Rôle</span>
                    <span class="value"><?= e($details['role'] ?? 'Designer') ?></span>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTEXTE & PROCESS -->
    <section>
        <div class="container">
            <div class="project-story-grid">
                
                <!-- Le Challenge (Avec RenderText pour les sauts de ligne) -->
                <div class="reveal-item">
                    <h3 style="font-size: 2rem; margin-bottom: 20px;">Le Challenge</h3>
                    <div class="text-muted" style="font-size: 1.1rem; line-height: 1.8;">
                        <?= renderText($details['challenge'] ?? 'Description à venir...') ?>
                    </div>
                </div>

                <!-- La Solution (Avec RenderText) -->
                <div class="reveal-item" style="transition-delay: 200ms;">
                    <h3 style="font-size: 2rem; margin-bottom: 20px; color: var(--accent);">La Solution</h3>
                    <div class="text-muted" style="font-size: 1.1rem; line-height: 1.8;">
                        <?= renderText($details['solution'] ?? 'Détails à venir...') ?>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- GALERIE SECONDAIRE -->
    <?php if (!empty($details['gallery']) && is_array($details['gallery'])): ?>
    <section style="padding-top: 0;">
        <div class="container">
            <h3 class="reveal-item" style="margin-bottom: 40px;">Aperçu du résultat</h3>
            <div class="gallery-grid">
                <?php foreach($details['gallery'] as $img): 
                     if (empty($img)) continue; // Saute les lignes vides
                     if (strpos($img, 'http') !== 0) { $img = 'assets/images/' . $img; }
                ?>
                <div class="reveal-item" style="border-radius: 16px; overflow: hidden; border: 1px solid rgba(255,255,255,0.05);">
                    <img src="<?= $img ?>" loading="lazy" style="transition: transform 0.5s ease;">
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- NAVIGATION PROJET -->
    <section style="border-top: 1px solid rgba(255,255,255,0.05); padding: 100px 0;">
        <div class="container reveal-item">
            <div class="project-nav-grid">
                
                <!-- PROJET PRÉCÉDENT -->
                <div class="nav-item prev">
                    <span class="text-muted">Projet précédent</span>
                    <a href="project.php?id=<?= $prevProject['id'] ?>">
                        ← <?= e($prevProject['title']) ?>
                    </a>
                </div>
                
                <!-- PROJET SUIVANT -->
                <div class="nav-item next">
                    <span class="text-muted">Projet suivant</span>
                    <a href="project.php?id=<?= $nextProject['id'] ?>">
                        <?= e($nextProject['title']) ?> →
                    </a>
                </div>

            </div>
        </div>
    </section>

    <?php require_once '../src/templates/footer.php'; ?>
    <?php require_once '../src/templates/_scripts.php'; ?>

</body>
</html>

<!-- CSS LOCAL -->
<style>
    .project-meta-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.05); border-radius: 16px; padding: 40px; margin-top: 60px; }
    .meta-item { display: flex; flex-direction: column; gap: 8px; }
    .meta-item .label { color: var(--accent); font-size: 0.8rem; text-transform: uppercase; font-weight: 700; letter-spacing: 1px; }
    .meta-item .value { font-size: 1.2rem; font-weight: 600; }

    .project-story-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 80px; margin-top: 40px; }
    .gallery-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 30px; }
    
    .project-nav-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 40px; }
    .nav-item a { display: block; font-size: 2rem; font-weight: 700; margin-top: 10px; transition: color 0.3s; }
    .nav-item a:hover { color: var(--accent); }
    .nav-item.next { text-align: right; }

    @media (max-width: 900px) {
        h1 { font-size: 2.5rem !important; }
        .project-meta-grid { grid-template-columns: 1fr; gap: 30px; text-align: center; }
        .project-story-grid { grid-template-columns: 1fr; gap: 50px; }
        .gallery-grid { grid-template-columns: 1fr; }
        .project-nav-grid { grid-template-columns: 1fr; gap: 50px; text-align: center !important; }
        .nav-item.next { text-align: center; }
    }
</style>