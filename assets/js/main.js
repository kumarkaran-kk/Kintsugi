const toggle = document.querySelector('.menu-toggle');
const menu = document.querySelector('.nav-left');

toggle?.addEventListener('click', () => {
  const open = toggle.getAttribute('aria-expanded') === 'true';
  toggle.setAttribute('aria-expanded', String(!open));
  menu.classList.toggle('active', !open);
  document.body.classList.toggle('menu-open', !open);
});

menu?.querySelectorAll('a').forEach(link => link.addEventListener('click', () => {
  toggle.setAttribute('aria-expanded', 'false');
  menu.classList.remove('active');
  document.body.classList.remove('menu-open');
}));

document.querySelectorAll('[data-plate-carousel]').forEach(carousel => {
  const slides = JSON.parse(carousel.dataset.slides || '[]');
  const large = carousel.querySelector('.plate-viewport-large');
  const small = carousel.querySelector('.plate-viewport-small');
  const dots = [...carousel.querySelectorAll('[data-plate-dot]')];
  const arrows = [...carousel.querySelectorAll('.plate-arrow')];
  const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  let index = 0;
  let animating = false;

  large.querySelector('.plate-current').dataset.slideIndex = '0';
  large.querySelector('.plate-incoming').dataset.slideIndex = '1';
  small.querySelector('.plate-current').dataset.slideIndex = '1';
  small.querySelector('.plate-incoming').dataset.slideIndex = '2';

  slides.forEach(source => {
    const image = new Image();
    image.src = source;
  });

  const updateState = nextIndex => {
    dots.forEach((dot, dotIndex) => {
      const active = dotIndex === nextIndex;
      dot.classList.toggle('active', active);
      dot.setAttribute('aria-current', String(active));
      const image = dot.querySelector('img');
      if (image) image.src = `assets/figma/${active ? 'spectrum-dot-active.svg' : 'spectrum-dot.svg'}`;
    });
    index = nextIndex;
  };

  const setPair = nextIndex => {
    const largeCurrent = large.querySelector('.plate-current');
    const smallCurrent = small.querySelector('.plate-current');
    largeCurrent.src = slides[nextIndex];
    largeCurrent.dataset.slideIndex = String(nextIndex);
    smallCurrent.src = slides[(nextIndex + 1) % slides.length];
    smallCurrent.dataset.slideIndex = String((nextIndex + 1) % slides.length);
    updateState(nextIndex);
  };

  const moveTo = (nextIndex, direction = 1) => {
    if (animating || nextIndex === index || !slides.length) return;
    const normalized = (nextIndex + slides.length) % slides.length;

    if (reducedMotion) {
      setPair(normalized);
      return;
    }

    animating = true;
    arrows.forEach(button => { button.disabled = true; });

    const offset = direction > 0 ? 130 : -130;
    const duration = 720;
    const easing = 'cubic-bezier(.65,0,.35,1)';
    const animations = [];

    [[large, normalized], [small, (normalized + 1) % slides.length]].forEach(([viewport, slideIndex]) => {
      const current = viewport.querySelector('.plate-current');
      const incoming = viewport.querySelector('.plate-incoming');
      incoming.src = slides[slideIndex];
      incoming.dataset.slideIndex = String(slideIndex);
      incoming.style.transform = `translateY(${offset}%)`;
      animations.push(current.animate(
        [{ transform: 'translateY(0)' }, { transform: `translateY(${-offset}%)` }],
        { duration, easing, fill: 'forwards' }
      ));
      animations.push(incoming.animate(
        [{ transform: `translateY(${offset}%)` }, { transform: 'translateY(0)' }],
        { duration, easing, fill: 'forwards' }
      ));
    });

    Promise.all(animations.map(animation => animation.finished)).then(() => {
      [large, small].forEach(viewport => {
        const outgoing = viewport.querySelector('.plate-current');
        const arrived = viewport.querySelector('.plate-incoming');
        outgoing.classList.remove('plate-current');
        outgoing.classList.add('plate-incoming');
        outgoing.style.transform = `translateY(${offset}%)`;
        outgoing.setAttribute('aria-hidden', 'true');
        outgoing.alt = '';
        arrived.classList.remove('plate-incoming');
        arrived.classList.add('plate-current');
        arrived.style.transform = '';
        arrived.removeAttribute('aria-hidden');
        arrived.alt = viewport === large ? 'Spectrum Luxe dinner plate' : 'Spectrum Luxe side plate';
      });
      animations.forEach(animation => animation.cancel());
      updateState(normalized);
      arrows.forEach(button => { button.disabled = false; });
      animating = false;
    });
  };

  carousel.querySelector('[data-plate-next]')?.addEventListener('click', () => moveTo(index + 1, 1));
  carousel.querySelector('[data-plate-prev]')?.addEventListener('click', () => moveTo(index - 1, -1));
  dots.forEach(dot => dot.addEventListener('click', () => {
    const target = Number(dot.dataset.plateDot);
    moveTo(target, target > index ? 1 : -1);
  }));
});

document.querySelectorAll('[data-shop-look]').forEach(section => {
  const hotspots = [...section.querySelectorAll('[data-look-index]')];
  const card = section.querySelector('.look-product');
  const productImage = section.querySelector('[data-look-image]');
  const productName = section.querySelector('[data-look-name]');
  const productPrice = section.querySelector('[data-look-price]');
  let changeTimer;

  hotspots.forEach(hotspot => {
    const preload = new Image();
    preload.src = hotspot.dataset.image;

    hotspot.addEventListener('click', () => {
      if (hotspot.classList.contains('active')) return;

      hotspots.forEach(item => {
        const active = item === hotspot;
        item.classList.toggle('active', active);
        item.setAttribute('aria-pressed', String(active));
      });

      card.classList.add('is-changing');
      window.clearTimeout(changeTimer);
      changeTimer = window.setTimeout(() => {
        productImage.src = hotspot.dataset.image;
        productImage.alt = hotspot.dataset.name;
        productName.textContent = hotspot.dataset.name;
        productPrice.textContent = hotspot.dataset.price;
        card.classList.remove('is-changing');
      }, 180);
    });
  });
});

document.querySelectorAll('.footer-tableware').forEach(ornaments => {
  if (window.matchMedia('(prefers-reduced-motion: reduce)').matches || !('IntersectionObserver' in window)) {
    ornaments.classList.add('is-visible');
    return;
  }

  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      entry.target.classList.toggle('is-visible', entry.isIntersecting);
    });
  }, { threshold: 0.18 });

  observer.observe(ornaments);
});
