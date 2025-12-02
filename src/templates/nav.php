<?php $links = $data['nav'] ?? []; ?>
<nav id="main-nav">
    <div class="container">
        <div class="nav-inner">
            <a href="index.php" style="font-size: 1.2rem; font-weight: 700; font-family: 'Outfit'; display: flex; align-items: center; gap: 10px; color: white;">
                <div style="background: rgba(255,255,255,0.1); width: 32px; height: 32px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 12px; color: white;"><?= e($data['config']['logo_initial'] ?? 'A') ?></div>
                <?= e($data['config']['logo_text'] ?? 'Alex') ?>.
            </a>
            <ul class="nav-links">
                <?php foreach ($links as $link): ?>
                <li><a href="<?= e($link['link']) ?>"><?= e($link['label']) ?></a></li>
                <?php endforeach; ?>
            </ul>
            <div class="nav-actions">
                <div style="color: #4ade80; font-size: 0.8rem; font-weight: 600; display: flex; align-items: center; gap: 6px; background: rgba(74, 222, 128, 0.1); padding: 4px 10px; border-radius: 20px;">
                    <span style="width: 6px; height: 6px; background: #4ade80; border-radius: 50%; display: inline-block; box-shadow: 0 0 8px #4ade80;"></span>
                    <?= e($data['config']['status_text'] ?? 'Dispo') ?>
                </div>
                <a href="<?= e($data['config']['cta_nav_link'] ?? 'projects.php') ?>" class="btn-primary"><?= e($data['config']['cta_nav'] ?? 'Projet ?') ?></a>
            </div>
            <button id="menu-toggle" class="mobile-toggle"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></button>
        </div>
    </div>
    <div id="mobile-menu" class="mobile-menu-overlay">
        <button id="menu-close" style="position: absolute; top: 30px; right: 30px; color: white; padding: 10px;"><svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6L6 18M6 6l12 12"/></svg></button>
        <nav style="position: static; padding: 0;">
            <?php foreach ($links as $link): ?><a href="<?= e($link['link']) ?>" class="mobile-link"><?= e($link['label']) ?></a><?php endforeach; ?>
        </nav>
        <div style="margin-top: 40px;"><a href="mailto:<?= e($data['contact']['email'] ?? '') ?>" style="font-size: 1.1rem; color: #888; border-bottom: 1px solid #444;"><?= e($data['contact']['email'] ?? '') ?></a></div>
    </div>
</nav>