// Animação de surgimento ao rolar a página: elementos [data-reveal] aparecem quando entram na tela.
export function initReveal() {
    const items = [...document.querySelectorAll('[data-reveal]')];
    if (!items.length) return;

    const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (reduceMotion || !('IntersectionObserver' in window)) {
        items.forEach((el) => el.classList.add('in'));
        return;
    }

    // Atraso escalonado entre irmãos (cards de uma mesma grade aparecem em sequência).
    const groups = new Map();
    items.forEach((el) => {
        const list = groups.get(el.parentElement) ?? [];
        list.push(el);
        groups.set(el.parentElement, list);
    });
    groups.forEach((list) => {
        list.forEach((el, i) => el.style.setProperty('--d', `${Math.min(i, 6) * 90}ms`));
    });

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('in');
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.12, rootMargin: '0px 0px -6% 0px' }
    );
    items.forEach((el) => observer.observe(el));
}
