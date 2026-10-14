// PARALLAX DO HERO
// Cada camada (.hero-camada) se move com o mouse e com a rolagem, em velocidades diferentes.
// data-depth: 0 = parada (fundo) ... 1 = move o máximo (frente)
// data-rolagem (opcional): profundidade usada só na rolagem (montanha e personagens rolam juntos)
(function () {
    const hero = document.querySelector('.hero');
    const topo = document.getElementById('topo');
    if (!hero) return;

    const camadas = [...hero.querySelectorAll('.hero-camada')];
    const reduzirMovimento = window.matchMedia('(prefers-reduced-motion: reduce)');

    const FORCA_MOUSE = 28;      // px que a camada da frente anda com o mouse
    const FORCA_ROLAGEM = 0.3;   // quanto as camadas de trás "ficam para trás" ao rolar

    let alvoX = 0, alvoY = 0, x = 0, y = 0;
    let visivel = true, rodando = false;

    function atualizarTopo() {
        if (topo) topo.classList.toggle('rolou', window.scrollY > 40);
    }

    function ativar() {
        if (rodando || !visivel || reduzirMovimento.matches) return;
        rodando = true;
        requestAnimationFrame(quadro);
    }

    function quadro() {
        // suaviza o movimento do mouse
        x += (alvoX - x) * 0.08;
        y += (alvoY - y) * 0.08;

        const rolagem = Math.min(window.scrollY, hero.offsetHeight);
        // escala um pouco maior que 1 para as bordas nunca aparecerem
        const escala = 1 + (FORCA_MOUSE * 2.4) / hero.offsetWidth;

        camadas.forEach(function (camada) {
            const d = parseFloat(camada.dataset.depth);
            const dRolagem = parseFloat(camada.dataset.rolagem || camada.dataset.depth);
            const dx = -x * FORCA_MOUSE * d;
            const dy = -y * FORCA_MOUSE * d * 0.55 + rolagem * (1 - dRolagem) * FORCA_ROLAGEM;
            camada.style.transform = 'translate3d(' + dx.toFixed(2) + 'px, ' + dy.toFixed(2) + 'px, 0) scale(' + escala + ')';
        });

        const parado = Math.abs(alvoX - x) < 0.001 && Math.abs(alvoY - y) < 0.001;
        if (parado) { rodando = false; return; }
        requestAnimationFrame(quadro);
    }

    window.addEventListener('mousemove', function (e) {
        alvoX = (e.clientX / window.innerWidth) * 2 - 1;
        alvoY = (e.clientY / window.innerHeight) * 2 - 1;
        ativar();
    });

    document.documentElement.addEventListener('mouseleave', function () {
        alvoX = 0;
        alvoY = 0;
        ativar();
    });

    window.addEventListener('scroll', function () {
        atualizarTopo();
        ativar();
    }, { passive: true });

    window.addEventListener('resize', ativar);

    // só anima enquanto o hero está na tela
    new IntersectionObserver(function (entradas) {
        visivel = entradas[0].isIntersecting;
        if (visivel) ativar();
    }).observe(hero);

    atualizarTopo();
    if (!reduzirMovimento.matches) { rodando = true; quadro(); }
})();
