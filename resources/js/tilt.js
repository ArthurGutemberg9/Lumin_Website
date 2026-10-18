// Interações com o mouse: cards inclinados e telas do topo que seguem o cursor.
const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
const hasHover = window.matchMedia('(hover: hover) and (pointer: fine)').matches;

/** Inclina elementos [data-tilt="graus"] na direção do mouse, com brilho que acompanha o cursor. */
export function initTilt() {
    if (reduceMotion || !hasHover) return;

    document.querySelectorAll('[data-tilt]').forEach((el) => {
        const max = parseFloat(el.dataset.tilt) || 8;
        let frame = null;

        el.addEventListener('pointerenter', () => el.classList.add('is-active'));

        el.addEventListener('pointermove', (e) => {
            const r = el.getBoundingClientRect();
            const x = (e.clientX - r.left) / r.width;
            const y = (e.clientY - r.top) / r.height;
            cancelAnimationFrame(frame);
            frame = requestAnimationFrame(() => {
                const rx = ((0.5 - y) * 2 * max).toFixed(2);
                const ry = ((x - 0.5) * 2 * max).toFixed(2);
                el.style.transform = `perspective(900px) rotateX(${rx}deg) rotateY(${ry}deg) scale3d(1.03, 1.03, 1.03)`;
                el.style.setProperty('--mx', `${x * 100}%`);
                el.style.setProperty('--my', `${y * 100}%`);
            });
        });

        el.addEventListener('pointerleave', () => {
            cancelAnimationFrame(frame);
            el.classList.remove('is-active');
            el.style.transform = '';
        });
    });
}

/** As telas dentro de [data-follow] acompanham o mouse quando ele passa ao redor delas. */
export function initFollow() {
    const stage = document.querySelector('[data-follow]');
    if (!stage || reduceMotion || !hasHover) return;

    const layers = [...stage.querySelectorAll('[data-depth]')];
    const reach = 280; // distância (px) em volta do palco em que o mouse ainda é seguido
    let tx = 0, ty = 0, cx = 0, cy = 0, running = false;

    const tick = () => {
        cx += (tx - cx) * 0.08;
        cy += (ty - cy) * 0.08;
        layers.forEach((layer) => {
            const d = parseFloat(layer.dataset.depth) || 1;
            layer.style.transform =
                `translate3d(${(cx * 18 * d).toFixed(2)}px, ${(cy * 14 * d).toFixed(2)}px, 0) ` +
                `rotateY(${(cx * 16 * d).toFixed(2)}deg) rotateX(${(-cy * 12 * d).toFixed(2)}deg)`;
        });
        if (Math.abs(tx - cx) > 0.001 || Math.abs(ty - cy) > 0.001) {
            requestAnimationFrame(tick);
        } else {
            running = false;
        }
    };
    const kick = () => {
        if (!running) {
            running = true;
            requestAnimationFrame(tick);
        }
    };
    const clamp = (v) => Math.max(-1, Math.min(1, v));

    window.addEventListener('pointermove', (e) => {
        const r = stage.getBoundingClientRect();
        const inside =
            e.clientX > r.left - reach && e.clientX < r.right + reach &&
            e.clientY > r.top - reach && e.clientY < r.bottom + reach;
        if (inside) {
            tx = clamp((e.clientX - (r.left + r.width / 2)) / (r.width / 2 + reach / 2));
            ty = clamp((e.clientY - (r.top + r.height / 2)) / (r.height / 2 + reach / 2));
        } else {
            tx = 0;
            ty = 0;
        }
        kick();
    });
    document.documentElement.addEventListener('pointerleave', () => { tx = 0; ty = 0; kick(); });
}
