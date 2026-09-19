const toggle = document.querySelector('.menu-toggle');
const menu = document.querySelector('.nav-left');
const siteHeader = document.querySelector('.site-header');

const updateHeaderState = () => {
  siteHeader?.classList.toggle('is-scrolled', window.scrollY > 24);
};

updateHeaderState();
window.addEventListener('scroll', updateHeaderState, { passive: true });

const setMenuOpen = (open) => {
  if (!toggle || !menu) return;
  toggle.setAttribute('aria-expanded', String(open));
  toggle.setAttribute('aria-label', open ? 'Close navigation' : 'Open navigation');
  menu.classList.toggle('active', open);
  document.body.classList.toggle('menu-open', open);
};

toggle?.addEventListener('click', () => {
  setMenuOpen(toggle.getAttribute('aria-expanded') !== 'true');
});

menu?.querySelectorAll('a').forEach(link => link.addEventListener('click', () => {
  setMenuOpen(false);
}));

document.addEventListener('keydown', event => {
  if (event.key === 'Escape') setMenuOpen(false);
});

window.addEventListener('resize', () => {
  if (window.innerWidth > 900) setMenuOpen(false);
});

// Keep in-page navigation smooth and clear of the fixed header on every page.
document.addEventListener('click', event => {
  const link = event.target.closest('a[href*="#"]');
  if (!link) return;

  const href = link.getAttribute('href');
  if (!href || href === '#') return;

  const destination = new URL(link.href, window.location.href);
  const currentPath = `${window.location.origin}${window.location.pathname}`;
  const destinationPath = `${destination.origin}${destination.pathname}`;
  if (destinationPath !== currentPath || !destination.hash) return;

  let target;
  try {
    target = document.querySelector(destination.hash);
  } catch {
    return;
  }

  if (!target) return;
  event.preventDefault();
  setMenuOpen(false);
  target.scrollIntoView({
    behavior: window.matchMedia('(prefers-reduced-motion: reduce)').matches ? 'auto' : 'smooth',
    block: 'start'
  });
  window.history.pushState(null, '', destination.hash);

  if (!target.matches('a, button, input, select, textarea, [tabindex]')) {
    target.setAttribute('tabindex', '-1');
    target.addEventListener('blur', () => target.removeAttribute('tabindex'), { once: true });
  }
  target.focus({ preventScroll: true });
});

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

  const preloadRemainingSlides = () => {
    slides.slice(3).forEach(source => {
      const image = new Image();
      image.src = source;
    });
  };

  if ('requestIdleCallback' in window) {
    window.requestIdleCallback(preloadRemainingSlides, { timeout: 1800 });
  } else {
    window.setTimeout(preloadRemainingSlides, 500);
  }

  const updateState = nextIndex => {
    dots.forEach((dot, dotIndex) => {
      const active = dotIndex === nextIndex;
      dot.classList.toggle('active', active);
      dot.setAttribute('aria-current', String(active));
      const image = dot.querySelector('img');
      if (image) image.src = `assets/images/ui/${active ? 'spectrum-dot-active.svg' : 'spectrum-dot.svg'}`;
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
  const productLink = section.querySelector('[data-look-link]');
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
        if (productLink && hotspot.dataset.url) productLink.href = hotspot.dataset.url;
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

const revealSections = document.querySelectorAll('.intro, .feature-luxe, .story-grid, .category-section, .look, .new, .editorial, .reveal-block');

if (window.matchMedia('(prefers-reduced-motion: reduce)').matches || !('IntersectionObserver' in window)) {
  revealSections.forEach(section => section.classList.add('is-visible'));
} else {
  revealSections.forEach(section => section.classList.add('reveal-ready'));

  const revealObserver = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      entry.target.classList.toggle('is-visible', entry.isIntersecting);
    });
  }, { threshold: 0.06 });

  revealSections.forEach(section => revealObserver.observe(section));
}

document.querySelectorAll('[data-contact-form]').forEach(form => {
  form.addEventListener('submit', event => {
    event.preventDefault();
    if (!form.reportValidity()) return;

    const data = new FormData(form);
    const subject = `Kintsugi enquiry: ${data.get('interest')}`;
    const body = [
      `Name: ${data.get('name')}`,
      `Email: ${data.get('email')}`,
      `Interest: ${data.get('interest')}`,
      '',
      String(data.get('message'))
    ].join('\n');

    window.location.href = `mailto:hello@kintsugi.in?subject=${encodeURIComponent(subject)}&body=${encodeURIComponent(body)}`;
  });
});

document.querySelectorAll('.pdp-gallery').forEach(gallery => {
  const mainImage = gallery.querySelector('[data-product-main]');
  const thumbnails = [...gallery.querySelectorAll('[data-product-thumb]')];
  const counter = gallery.querySelector('[data-gallery-current]');
  const nextButton = gallery.querySelector('[data-gallery-next]');
  let switchTimer;

  const selectImage = thumbnail => {
      if (!mainImage || thumbnail.classList.contains('active')) return;

      thumbnails.forEach(item => {
        const active = item === thumbnail;
        item.classList.toggle('active', active);
        item.setAttribute('aria-pressed', String(active));
      });

      window.clearTimeout(switchTimer);
      mainImage.classList.add('is-switching');
      switchTimer = window.setTimeout(() => {
        mainImage.src = thumbnail.dataset.productThumb;
        mainImage.alt = thumbnail.dataset.productAlt || mainImage.alt;
        mainImage.style.objectPosition = thumbnail.dataset.productPosition || 'center';
        mainImage.classList.remove('is-switching');
      }, 140);

      if (counter) {
        counter.textContent = String(thumbnails.indexOf(thumbnail) + 1).padStart(2, '0');
      }
  };

  thumbnails.forEach(thumbnail => {
    thumbnail.addEventListener('click', () => selectImage(thumbnail));
  });

  nextButton?.addEventListener('click', () => {
    const activeIndex = Math.max(0, thumbnails.findIndex(item => item.classList.contains('active')));
    selectImage(thumbnails[(activeIndex + 1) % thumbnails.length]);
  });
});
