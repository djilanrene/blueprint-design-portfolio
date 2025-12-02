<!-- 1. LENIS (Smooth Scroll Engine) -->
<!-- C'est la librairie standard actuelle pour le scroll "luxe" -->
<script src="https://cdn.jsdelivr.net/gh/studio-freight/lenis@1.0.29/bundled/lenis.min.js"></script>

<script>
(function() {
    "use strict";

    // --- A. INITIALISATION DU SMOOTH SCROLL ---
    // On ne l'active que si on n'est PAS sur mobile (pour la batterie et l'UX native)
    const isMobile = window.matchMedia("(max-width: 768px)").matches;

    if (!isMobile) {
        const lenis = new Lenis({
            duration: 1.2,
            easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)), // Easing exponentiel doux
            direction: 'vertical',
            gestureDirection: 'vertical',
            smooth: true,
            mouseMultiplier: 1,
            smoothTouch: false, // On laisse le natif sur tactile
            touchMultiplier: 2,
        });

        // La boucle d'animation (Game Loop)
        function raf(time) {
            lenis.raf(time);
            requestAnimationFrame(raf);
        }
        requestAnimationFrame(raf);

        // Intégration du Parallaxe avec Lenis
        lenis.on('scroll', (e) => {
            updateParallax(e.scroll);
        });
    }

    // --- B. MOTEUR PARALLAXE MAISON (Vanilla JS ultra-léger) ---
    // On récupère tous les éléments avec data-speed="-1", "0.5", etc.
    const parallaxElements = document.querySelectorAll('[data-speed]');
    
    function updateParallax(scrollY) {
        // Si on est sur mobile, on arrête tout (économie batterie)
        if (isMobile) return;

        parallaxElements.forEach(el => {
            const speed = parseFloat(el.getAttribute('data-speed'));
            // Calcul de la position : on déplace l'élément moins vite (ou plus vite) que le scroll
            const yPos = scrollY * speed * 0.1; 
            
            // On applique la transfo GPU-friendly
            el.style.transform = `translate3d(0, ${yPos}px, 0)`;
        });
    }

    // --- C. OBSERVER D'APPARITION (Reveal on Scroll) ---
    // Pour déclencher les animations CSS quand les éléments entrent dans l'écran
    const observerOptions = {
        threshold: 0.1, // Déclenche quand 10% de l'élément est visible
        rootMargin: "0px 0px -50px 0px" // Un peu avant le bas de l'écran
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                // On arrête d'observer une fois apparu (performance)
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // On observe tous les titres et les cartes projets
    document.querySelectorAll('h2, .project-item, .glass-panel').forEach(el => {
        // On ajoute une petite classe CSS via JS pour préparer l'anim
        el.style.opacity = '0'; 
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'opacity 0.8s ease-out, transform 0.8s ease-out';
        
        observer.observe(el);
    });

    // CSS injecté dynamiquement pour la classe .is-visible
    const style = document.createElement('style');
    style.innerHTML = `
        .is-visible {
            opacity: 1 !important;
            transform: translateY(0) !important;
        }
    `;
    document.head.appendChild(style);

    // --- D. FIX DU SCROLL BAR ---
    // Lenis cache parfois la scrollbar, on force le style
    if (!isMobile) {
        document.documentElement.classList.add('lenis-active');
    }

})();
</script>

<style>
    /* CSS nécessaire pour Lenis */
    html.lenis { height: auto; }
    .lenis.lenis-smooth { scroll-behavior: auto; }
    .lenis.lenis-smooth [data-lenis-prevent] { overscroll-behavior: contain; }
    .lenis.lenis-stopped { overflow: hidden; }
    .lenis.lenis-scrolling iframe { pointer-events: none; }
</style>