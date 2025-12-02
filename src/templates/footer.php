<footer id="contact">
    <div class="container">
        <div class="footer-main">
            
            <!-- COLONNE 1 : LE CTA (Gauche) -->
            <div class="cta-box">
                <span class="section-label">Contact</span>
                <!-- Titre DYNAMIQUE -->
                <h3><?= renderText($data['contact']['cta_title'] ?? 'On démarre un projet ?') ?></h3>
                
                <a href="mailto:<?= e($data['contact']['email'] ?? '') ?>" class="email-link">
                    <?= e($data['contact']['email'] ?? '') ?>
                </a>
                
                <p class="whatsapp-link">
                    Ou sur WhatsApp: <a href="<?= e($data['contact']['whatsapp_link'] ?? '#') ?>" target="_blank">Discuter</a>
                </p>
            </div>

            <!-- COLONNE 2 : LES LIENS (Droite - Groupés) -->
            <div class="footer-links-wrapper">
                
                <!-- Bloc Menu -->
                <div class="links-col">
                    <h4><?= e($data['config']['footer_menu_title'] ?? 'Menu') ?></h4>
                    <ul>
                        <?php foreach ($data['nav'] as $link): ?>
                        <li><a href="<?= e($link['link']) ?>"><?= e($link['label']) ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <!-- Bloc Réseaux -->
                <div class="links-col">
                    <h4><?= e($data['config']['footer_social_title'] ?? 'Réseaux') ?></h4>
                    <ul>
                        <?php foreach ($data['contact']['socials'] ?? [] as $social): 
                            if(empty($social['url'])) continue; ?>
                        <li><a href="<?= e($social['url']) ?>" target="_blank"><?= e($social['name']) ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

            </div>

        </div>

        <!-- BAS DE PAGE DYNAMIQUE -->
        <div class="footer-bottom">
            <!-- Copyright -->
            <span>
                <?= e($data['config']['footer_copyright'] ?? '© ' . date('Y') . ' Alex.') ?>
            </span>
            
            <!-- Localisation -->
            <span>
                <?= e($data['config']['footer_location'] ?? 'Lomé, Togo.') ?>
            </span>
        </div>
    </div>
</footer>