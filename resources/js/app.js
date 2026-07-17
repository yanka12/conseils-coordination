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

/**
 * Hauteur du header exposée en variable CSS.
 *
 * Le header est collant, donc en flux : le hero placé en dessous doit mesurer
 * « fenêtre moins header » pour tenir en entier sans défiler en desktop. Sa
 * hauteur varie (une barre sur mobile, deux en desktop ; les polices peuvent
 * aussi la modifier au chargement), d'où une mesure vivante plutôt qu'en dur.
 */
function initHeaderHeightVar() {
    const header = document.querySelector('[data-site-header]');

    if (!header) {
        return;
    }

    const apply = () => {
        document.documentElement.style.setProperty('--header-height', `${header.offsetHeight}px`);
    };

    apply();

    // Réagit au changement de largeur (bascule 1 ↔ 2 barres) comme au chargement
    // tardif des polices, tous deux capturés par la taille de l'élément observé.
    if (window.ResizeObserver) {
        new ResizeObserver(apply).observe(header);
    } else {
        window.addEventListener('resize', apply, { passive: true });
    }
}

/**
 * Header escamotable : il disparaît vers le haut quand on descend, revient dès
 * qu'on remonte.
 */
function initHeaderAutoHide() {
    const header = document.querySelector('[data-site-header]');
    const panel = document.querySelector('[data-nav-panel]');

    if (!header) {
        return;
    }

    // En deçà, un simple tremblement du doigt ferait clignoter le header.
    const THRESHOLD = 6;

    let lastY = window.scrollY;
    let ticking = false;

    function update() {
        const y = window.scrollY;
        const delta = y - lastY;

        // Tant que le menu est ouvert, le header doit rester visible : c'est là que
        // se trouve la croix de fermeture.
        const menuOpen = panel && panel.dataset.open === 'true';

        // Près du sommet, on l'affiche toujours : l'escamoter là n'aurait aucun sens.
        if (menuOpen || y <= header.offsetHeight) {
            header.classList.remove('-translate-y-full');
        } else if (Math.abs(delta) > THRESHOLD) {
            header.classList.toggle('-translate-y-full', delta > 0);
        }

        lastY = y;
        ticking = false;
    }

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
}

/**
 * Boutons « copier dans le presse-papier ».
 *
 * Chaque bouton porte la valeur à copier dans data-copy. Après copie, l'icône
 * bascule en coche et une bulle « Copié ! » apparaît deux secondes.
 * navigator.clipboard suffit : le site est servi en https, contexte sécurisé.
 */
function initCopyToClipboard() {
    document.querySelectorAll('[data-copy]').forEach((button) => {
        const icon = button.querySelector('[data-copy-icon]');
        const done = button.querySelector('[data-copy-done]');
        const toast = button.querySelector('[data-copy-toast]');
        let timer;

        button.addEventListener('click', async () => {
            await navigator.clipboard.writeText(button.dataset.copy);

            icon.classList.add('hidden');
            done.classList.remove('hidden');
            toast.style.opacity = '1';

            clearTimeout(timer);
            timer = setTimeout(() => {
                icon.classList.remove('hidden');
                done.classList.add('hidden');
                toast.style.opacity = '0';
            }, 2000);
        });
    });
}

initHeroParallax();
initMobileNav();
initHeaderHeightVar();
initHeaderAutoHide();
initCopyToClipboard();
