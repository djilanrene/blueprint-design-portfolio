<?php $hero = $data['hero'] ?? []; ?>
<section id="top">
    <div class="container">
        <div class="hero-content">
            <div style="margin-bottom: 24px; display: inline-block;">
                <span style="background: rgba(204, 255, 0, 0.1); color: #ccff00; padding: 6px 16px; border-radius: 20px; font-size: 0.8rem; font-weight: 600; border: 1px solid rgba(204, 255, 0, 0.2);">👋 <?= e($hero['greeting'] ?? '') ?></span>
            </div>
            <h1><?= renderText($hero['headline'] ?? '') ?></h1>
            <p class="hero-subtitle"><?= renderText($hero['subtitle'] ?? '') ?></p>
            <div style="display: flex; gap: 16px; justify-content: center; margin-top: 30px;">
                <a href="<?= e($hero['cta_link'] ?? 'projects.php') ?>" class="btn-primary"><?= e($hero['cta_text'] ?? 'Voir mes projets') ?> <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17l9.2-9.2M17 8v9"/></svg></a>
                <a href="#contact">Me contacter</a>
            </div>
        </div>
    </div>
</section>