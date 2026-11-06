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

// Kintsugi's homepage Festival of Light experience.
const createDiwaliFireworks = canvas => {
  if (!canvas) return null;

  const context = canvas.getContext('2d');
  const colors = ['#f6d477', '#fff7c8', '#d99b34', '#b82c55', '#8e1238'];
  const particles = [];
  let frame = 0;
  let width = 0;
  let height = 0;
  let running = false;

  const resize = () => {
    const ratio = Math.min(window.devicePixelRatio || 1, 2);
    width = window.innerWidth;
    height = window.innerHeight;
    canvas.width = Math.round(width * ratio);
    canvas.height = Math.round(height * ratio);
    context.setTransform(ratio, 0, 0, ratio, 0, 0);
  };

  const draw = () => {
    context.clearRect(0, 0, width, height);

    for (let index = particles.length - 1; index >= 0; index -= 1) {
      const particle = particles[index];
      particle.life -= 1;
      if (particle.life <= 0) {
        particles.splice(index, 1);
        continue;
      }

      particle.previousX = particle.x;
      particle.previousY = particle.y;
      particle.vx *= .986;
      particle.vy = particle.vy * .986 + particle.gravity;
      particle.x += particle.vx;
      particle.y += particle.vy;

      const opacity = Math.min(1, particle.life / 20);
      context.beginPath();
      context.moveTo(particle.previousX, particle.previousY);
      context.lineTo(particle.x, particle.y);
      context.strokeStyle = `${particle.color}${Math.round(opacity * 255).toString(16).padStart(2, '0')}`;
      context.lineWidth = particle.size;
      context.lineCap = 'round';
      context.stroke();

      if (particle.life % 4 === 0) {
        context.beginPath();
        context.arc(particle.x, particle.y, particle.size * 1.25, 0, Math.PI * 2);
        context.fillStyle = `rgba(255,248,210,${opacity * .7})`;
        context.fill();
      }
    }

    if (particles.length) {
      frame = window.requestAnimationFrame(draw);
    } else {
      running = false;
    }
  };

  const burst = (x, y, amount = 54, scale = 1) => {
    const spokes = Math.max(24, amount);
    const rotation = Math.random() * Math.PI;
    for (let index = 0; index < spokes; index += 1) {
      const angle = rotation + (Math.PI * 2 * index / spokes) + (Math.random() - .5) * .08;
      const speed = (2.1 + Math.random() * 3.7) * scale;
      particles.push({
        x,
        y,
        previousX: x,
        previousY: y,
        vx: Math.cos(angle) * speed,
        vy: Math.sin(angle) * speed,
        gravity: .025 + Math.random() * .018,
        life: 42 + Math.floor(Math.random() * 28),
        size: .8 + Math.random() * 1.5,
        color: colors[index % colors.length]
      });
    }

    if (!running) {
      running = true;
      frame = window.requestAnimationFrame(draw);
    }
  };

  const destroy = () => {
    window.cancelAnimationFrame(frame);
    window.removeEventListener('resize', resize);
    particles.length = 0;
    context.clearRect(0, 0, width, height);
  };

  resize();
  window.addEventListener('resize', resize, { passive: true });
  return { burst, destroy };
};

const reducedDiwaliMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
const diwaliOpening = document.querySelector('[data-diwali-opening]');

if (diwaliOpening) {
  const enterButton = diwaliOpening.querySelector('[data-diwali-enter]');
    const pageContent = document.querySelector('main');
    const pageFooter = document.querySelector('.site-footer');
    const openingFireworks = reducedDiwaliMotion
      ? null
      : createDiwaliFireworks(diwaliOpening.querySelector('[data-diwali-opening-canvas]'));
    const openingTimers = [];
    let closing = false;

    document.body.classList.add('diwali-open');
    if (siteHeader) siteHeader.inert = true;
    if (pageContent) pageContent.inert = true;
    if (pageFooter) pageFooter.inert = true;
    window.setTimeout(() => enterButton?.focus(), 120);

    if (openingFireworks) {
      const launch = (x, y, delay, amount = 62, scale = 1) => {
        openingTimers.push(window.setTimeout(() => openingFireworks.burst(
          window.innerWidth * x,
          window.innerHeight * y,
          amount,
          scale
        ), delay));
      };
      launch(.2, .23, 120, 56, .9);
      launch(.79, .2, 520, 64, 1);
      launch(.5, .15, 1050, 72, 1.05);
      launch(.12, .55, 1680, 48, .78);
      launch(.88, .56, 2050, 48, .78);
      launch(.5, .68, 2850, 64, .94);
      const recurring = window.setInterval(() => {
        openingFireworks.burst(
          window.innerWidth * (.12 + Math.random() * .76),
          window.innerHeight * (.12 + Math.random() * .48),
          46 + Math.floor(Math.random() * 18),
          .75 + Math.random() * .25
        );
      }, 1450);
      openingTimers.push(recurring);
    }

    const closeWelcome = () => {
      if (closing) return;
      closing = true;
      openingTimers.forEach(timer => {
        window.clearTimeout(timer);
        window.clearInterval(timer);
      });
      document.body.classList.remove('diwali-open');
      if (siteHeader) siteHeader.inert = false;
      if (pageContent) pageContent.inert = false;
      if (pageFooter) pageFooter.inert = false;
      diwaliOpening.classList.add('is-closing');
      window.setTimeout(() => {
        openingFireworks?.destroy();
        diwaliOpening.classList.add('is-complete');
        document.documentElement.classList.add('diwali-welcome-seen');
      }, reducedDiwaliMotion ? 10 : 680);
    };

    enterButton?.addEventListener('click', closeWelcome);
    document.addEventListener('keydown', event => {
      if (closing) return;
      if (event.key === 'Escape') closeWelcome();
      if (event.key === 'Tab') {
        event.preventDefault();
        enterButton?.focus();
      }
    });
}

const diwaliSections = [...document.querySelectorAll('[data-diwali-section]')];
const pageFireworks = !reducedDiwaliMotion && diwaliSections.length
  ? createDiwaliFireworks(document.querySelector('[data-diwali-page-canvas]'))
  : null;

if (diwaliSections.length && 'IntersectionObserver' in window) {
  const diwaliObserver = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (!entry.isIntersecting) {
        entry.target.classList.remove('diwali-in-view');
        return;
      }
      if (entry.target.classList.contains('diwali-in-view')) return;

      entry.target.classList.add('diwali-in-view', 'diwali-sparked');
      window.setTimeout(() => entry.target.classList.remove('diwali-sparked'), 900);

      if (!pageFireworks) return;
      const box = entry.target.getBoundingClientRect();
      const y = Math.max(100, Math.min(window.innerHeight - 120, box.top + Math.min(box.height * .24, 180)));
      pageFireworks.burst(window.innerWidth * .09, y, 34, .62);
      window.setTimeout(() => pageFireworks.burst(window.innerWidth * .91, y + 35, 34, .62), 240);
    });
  }, { threshold: .16 });

  diwaliSections.forEach(section => diwaliObserver.observe(section));
}
