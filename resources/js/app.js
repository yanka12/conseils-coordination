/**
 * Parallaxe du hero : l'image de fond se décale à l'inverse du curseur.
 *
 * L'image est légèrement agrandie en CSS (scale) afin que le décalage ne
 * découvre jamais ses bords. Le déplacement est lissé image par image plutôt
 * qu'appliqué directement au mousemove, sinon le mouvement paraît saccadé.
 */
const AMPLITUDE = 8; // décalage maximal en pixels
const SMOOTHING = 0.08; // plus la valeur est basse, plus le suivi est doux

function initHeroParallax() {
    const image = document.querySelector('[data-parallax]');

    if (!image) {
        return;
    }

    // Respecte le réglage système « réduire les animations ».
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        return;
    }

    let targetX = 0;
    let targetY = 0;
    let currentX = 0;
    let currentY = 0;

    window.addEventListener('mousemove', (event) => {
        // Position du curseur ramenée dans l'intervalle [-1, 1] depuis le centre de la fenêtre.
        const ratioX = event.clientX / window.innerWidth - 0.5;
        const ratioY = event.clientY / window.innerHeight - 0.5;

        // Signe négatif : l'image part à l'opposé du curseur.
        targetX = -ratioX * AMPLITUDE * 2;
        targetY = -ratioY * AMPLITUDE * 2;
    });

    function render() {
        currentX += (targetX - currentX) * SMOOTHING;
        currentY += (targetY - currentY) * SMOOTHING;

        image.style.transform = `scale(1.08) translate3d(${currentX}px, ${currentY}px, 0)`;

        requestAnimationFrame(render);
    }

    render();
}

initHeroParallax();
