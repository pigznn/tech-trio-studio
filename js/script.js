$('.banner').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 1200,
  arrows: false,
  dots: true,
});

$('.slideEvento').slick({
  slidesToShow: 4,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 1500,
  arrows: false,
    responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});

$('.slideGaleria').slick({
  slidesToShow: 6,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 1500,
  arrows: false,
     responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});

$('.itensDepo').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 3000,
  arrows:false,
});

if (document.querySelector('.accordion-container')) {
  new Accordion('.accordion-container');
}

/*
new WOW().init();
*/

// MENU FLUTUANTE: pílula animada que segue o link em foco e a seção visível
(function () {
  var menu = document.querySelector('.menu');
  if (!menu) return;
  var indicador = menu.querySelector('.menu-indicador');
  var links = [].slice.call(menu.querySelectorAll('ul a'));
  var ativo = links[0];

  function moverPara(link) {
    links.forEach(function (l) { l.classList.toggle('foco', l === link); });
    indicador.style.width = link.offsetWidth + 'px';
    indicador.style.transform = 'translateX(' + link.offsetLeft + 'px)';
    indicador.style.opacity = 1;
  }

  function marcarAtivo(link) {
    ativo = link;
    moverPara(link);
  }

  links.forEach(function (link) {
    link.addEventListener('mouseenter', function () { moverPara(link); });
    link.addEventListener('click', function () { marcarAtivo(link); });
  });
  menu.addEventListener('mouseleave', function () { moverPara(ativo); });

  // destaca o link da seção que está na tela
  var secoes = links.map(function (l) { return document.querySelector(l.getAttribute('href')); });
  function atualizarAtivo() {
    var limite = window.innerHeight * 0.4;
    var atual = links[0];
    secoes.forEach(function (sec, i) {
      if (sec && sec.getBoundingClientRect().top <= limite) atual = links[i];
    });
    if (atual !== ativo && !menu.matches(':hover')) marcarAtivo(atual);
  }
  window.addEventListener('scroll', atualizarAtivo, { passive: true });
  window.addEventListener('resize', function () { moverPara(ativo); });
  window.addEventListener('load', function () { moverPara(ativo); });
  atualizarAtivo();
  moverPara(ativo);
})();

// LOCOMOTIVE SCROLL: rolagem suave da página inteira
// anchors: faz os links do menu (#sobre, #servicos...) rolarem suavemente;
// offset -90 = para abaixo do topo fixo (mesmo valor do scroll-padding-top no CSS)
if (typeof LocomotiveScroll !== 'undefined') {
  new LocomotiveScroll({
    lenisOptions: {
      anchors: { offset: -90 }
    }
  });
}