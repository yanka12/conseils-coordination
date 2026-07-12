/**
 * Parallaxe au scroll du hero.
 *
 * L'image défile moins vite que la page : on la décale vers le bas d'une
 * fraction du scroll, ce qui annule d'autant son déplacement naturel vers le
 * haut. Elle semble alors se trouver en retrait, derrière le contenu.
 *
 * L'image déborde volontairement du cadre (voir sa hauteur dans le Blade) :
 * sans cette marge, son décalage vers le bas laisserait un vide en haut.
 */
const DEPTH = 0.3; // 0 = solidaire de la page, 1 = totalement immobile

function initHeroParallax() {
    const image = document.querySelector('[data-parallax]');

    if (!image) {
        return;
    }

    // Respecte le réglage système « réduire les animations ».
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        return;
    }

    const hero = image.closest('section');
    let ticking = false;

    function update() {
        const scrolled = window.scrollY;

        // Une fois le hero dépassé, l'image est hors champ : inutile de la déplacer.
        if (scrolled <= hero.offsetHeight) {
            image.style.transform = `translate3d(0, ${scrolled * DEPTH}px, 0)`;
        }

        ticking = false;
    }

    // Le scroll se déclenche bien plus souvent que le rafraîchissement de
    // l'écran : on ne recalcule qu'une fois par image affichée.
    window.addEventListener(
        'scroll',
        () => {
            if (!ticking) {
                ticking = true;
                requestAnimationFrame(update);
            }
        },
        { passive: true },
    );

    update();
}

initHeroParallax();
