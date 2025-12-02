<section id="works" style="padding: 100px 0;">
    <div class="container">
        <div style="margin-bottom: 60px; display: flex; justify-content: space-between; align-items: flex-end; flex-wrap: wrap; gap: 20px;">
            <div><span class="text-accent" style="text-transform: uppercase; letter-spacing: 2px; font-size: 0.8rem; font-weight: 700;">Portfolio</span><h2 style="font-size: 3rem; margin-top: 10px; line-height: 1;"><?= renderText($data['config']['home_projects_title'] ?? 'Sélection') ?></h2></div>
            <a href="projects.php" class="hidden-mobile" style="color: #888; border-bottom: 1px solid #333; padding-bottom: 2px; font-size: 0.9rem;">Voir tous les projets →</a>
        </div>
        <div class="bento-grid">
            <?php 
            $projects = $data['projects'] ?? [];
            $featuredProjects = array_filter($projects, fn($p) => !empty($p['featured']));
            foreach ($featuredProjects as $project): 
                $sizeClass = ($project['size'] === 'large') ? 'span-2' : 'span-1';
                $imgSrc = $project['image'] ?? '';
                if (strpos($imgSrc, 'http') !== 0) $imgSrc = 'assets/images/' . $imgSrc;
            ?>
            <article class="project-item <?= $sizeClass ?> reveal-item">
                <a href="<?= e($project['link'] ?? '#') ?>" style="display: block; width: 100%; height: 100%;">
                    <div class="img-wrapper"><img src="<?= $imgSrc ?>" alt="<?= e($project['title'] ?? '') ?>"><div style="position: absolute; inset:0; background: linear-gradient(to top, rgba(0,0,0,0.9), transparent);"></div></div>
                    <div class="project-info"><div class="glass-panel" style="padding: 15px; border-radius: 12px; background: rgba(255,255,255,0.1); backdrop-filter: blur(10px);"><span class="text-accent" style="font-size: 0.75rem; text-transform: uppercase; font-weight: 700;"><?= e($project['category'] ?? '') ?></span><h3 style="font-size: 1.25rem; margin: 4px 0 0 0; color: white;"><?= e($project['title'] ?? '') ?></h3></div></div>
                </a>
            </article>
            <?php endforeach; ?>
        </div>
        <div style="margin-top: 60px; text-align: center;"><a href="projects.php" class="btn-primary" style="background: transparent; border: 1px solid rgba(255,255,255,0.3); color: white;">Découvrir tous les projets</a></div>
    </div>
</section>
<style> @media (max-width: 768px) { .hidden-mobile { display: none; } } </style>