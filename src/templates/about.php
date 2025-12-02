<section id="about">
    <div class="container">
        <div class="about-container">
            <div class="reveal-item">
                <span class="section-label">À Propos</span>
                <h2 style="margin-bottom: 24px; line-height: 1.2;"><?= renderText($data['about']['title'] ?? 'À propos') ?></h2>
                <div style="color: #888; margin-bottom: 32px; font-size: 1rem; line-height: 1.8;"><?= renderText($data['about']['text'] ?? '') ?></div>
                <a href="about-me.php" style="display: inline-flex; align-items: center; gap: 10px; border-bottom: 1px solid var(--accent); padding-bottom: 5px; color: white; font-weight: 600; font-size: 0.9rem;">Découvrir mon parcours complet →</a>
            </div>
            <div class="stats-grid">
                <?php $stats = $data['about']['stats'] ?? []; foreach($stats as $stat): ?>
                <div class="stat-card reveal-item">
                    <div style="font-size: 2.5rem; font-weight: 700; color: white; margin-bottom: 4px; font-family: var(--font-heading);"><?= e($stat['value']) ?></div>
                    <div style="font-size: 0.85rem; color: #666; text-transform: uppercase; font-weight: 600; letter-spacing: 1px;"><?= e($stat['label']) ?></div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>