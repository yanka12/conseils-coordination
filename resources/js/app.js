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

/**
 * Menu mobile : panneau plein écran glissant depuis la droite.
 */
function initMobileNav() {
    const panel = document.querySelector('[data-nav-panel]');
    const toggle = document.querySelector('[data-nav-toggle]');

    if (!panel || !toggle) {
        return;
    }

    const bars = toggle.querySelectorAll('[data-nav-bar]');

    function setOpen(open) {
        panel.dataset.open = String(open);
        panel.classList.toggle('translate-x-full', !open);
        toggle.setAttribute('aria-expanded', String(open));
        toggle.setAttribute('aria-label', open ? 'Fermer le menu' : 'Ouvrir le menu');

        // Les deux barres du hamburger se croisent au centre.
        bars[0].style.transform = open ? 'translateY(6px) rotate(45deg)' : '';
        bars[1].style.transform = open ? 'translateY(-6px) rotate(-45deg)' : '';

        // Sans ce verrou, la page continue de défiler derrière le panneau.
        document.body.style.overflow = open ? 'hidden' : '';
    }

    toggle.addEventListener('click', () => setOpen(panel.dataset.open !== 'true'));

    panel.querySelector('[data-nav-close]').addEventListener('click', () => setOpen(false));

    // Une ancre ne recharge pas la page : il faut refermer le panneau à la main,
    // sinon il masque la section vers laquelle on vient de sauter.
    //
    // Le défilement est piloté ici plutôt que laissé au navigateur : le verrou posé
    // sur le body n'est pas toujours levé à temps, et iOS ignore alors le saut.
    panel.querySelectorAll('[data-nav-link]').forEach((link) => {
        link.addEventListener('click', (event) => {
            const href = link.getAttribute('href') || '';
            const target = href.startsWith('#') ? document.querySelector(href) : null;

            setOpen(false);

            if (!target) {
                return;
            }

            event.preventDefault();

            // Une frame d'attente : le temps que le verrou soit effectivement levé.
            requestAnimationFrame(() => {
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                history.replaceState(null, '', href);
            });
        });
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && panel.dataset.open === 'true') {
            setOpen(false);
            toggle.focus();
        }
    });

    // Le panneau est masqué au-delà de lg : s'il restait « ouvert », le verrou de
    // défilement survivrait au passage en écran large.
    window.matchMedia('(min-width: 1024px)').addEventListener('change', (event) => {
        if (event.matches) {
            setOpen(false);
        }
    });
}

initHeroParallax();
initMobileNav();
