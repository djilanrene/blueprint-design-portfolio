document.addEventListener("DOMContentLoaded", () => {
    // MENU MOBILE
    const menuToggle = document.getElementById('menu-toggle');
    const menuClose = document.getElementById('menu-close');
    const mobileMenu = document.getElementById('mobile-menu');
    const mobileLinks = document.querySelectorAll('.mobile-link');

    function toggleMenu() {
        if (!mobileMenu) return;
        mobileMenu.classList.toggle('active');
        document.body.style.overflow = mobileMenu.classList.contains('active') ? 'hidden' : '';
    }

    if (menuToggle) menuToggle.addEventListener('click', (e) => { e.preventDefault(); toggleMenu(); });
    if (menuClose) menuClose.addEventListener('click', (e) => { e.preventDefault(); toggleMenu(); });
    
    mobileLinks.forEach(link => {
        link.addEventListener('click', () => {
            if (mobileMenu.classList.contains('active')) toggleMenu();
        });
    });

    // LENIS SCROLL
    const isMobile = window.matchMedia("(max-width: 768px)").matches;
    if (!isMobile && typeof Lenis !== 'undefined') {
        const lenis = new Lenis({ duration: 1.2, easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)), direction: 'vertical', smooth: true });
        function raf(time) { lenis.raf(time); requestAnimationFrame(raf); }
        requestAnimationFrame(raf);
    }

    // ANIMATION HELPER
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => { if (entry.isIntersecting) { entry.target.classList.add('is-visible'); observer.unobserve(entry.target); } });
    }, { threshold: 0.1 });

    document.querySelectorAll('.reveal-item, .project-item, .stat-card').forEach((el, index) => {
        if (el.classList.contains('project-item') || el.classList.contains('stat-card')) {
            const delay = (index % 3) * 100; 
            el.style.transitionDelay = `${delay}ms`;
        }
        observer.observe(el);
    });
});