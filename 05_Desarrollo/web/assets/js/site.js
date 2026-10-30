(() => {
  'use strict';

  const toggle = document.querySelector('[data-menu-toggle]');
  const navigation = document.querySelector('#navigation');
  const mobile = window.matchMedia('(max-width: 760px)');

  function setMenu(open, returnFocus = false) {
    navigation.classList.toggle('open', open);
    toggle.setAttribute('aria-expanded', String(open));
    toggle.setAttribute('aria-label', open ? 'Cerrar menú' : 'Abrir menú');
    if (returnFocus) toggle.focus();
  }

  if (toggle && navigation) {
    document.body.classList.add('menu-ready');
    toggle.addEventListener('click', () => setMenu(toggle.getAttribute('aria-expanded') !== 'true'));
    navigation.addEventListener('click', event => {
      if (event.target.closest('a')) setMenu(false);
    });
    document.addEventListener('keydown', event => {
      if (event.key === 'Escape' && toggle.getAttribute('aria-expanded') === 'true') setMenu(false, true);
    });
    document.addEventListener('click', event => {
      if (!event.target.closest('.header')) setMenu(false);
    });
    document.querySelector('.header').addEventListener('focusout', event => {
      if (event.relatedTarget && !event.currentTarget.contains(event.relatedTarget)) setMenu(false);
    });
    mobile.addEventListener('change', () => setMenu(false));
  }

  // A layout-only form: suppress implicit Enter submission as well as clicks.
  document.querySelectorAll('form[novalidate]').forEach(form => {
    form.addEventListener('submit', event => event.preventDefault());
    form.addEventListener('keydown', event => {
      if (event.key === 'Enter' && event.target.tagName !== 'TEXTAREA') event.preventDefault();
    });
  });

  const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
  const pending = new Map();
  function revealAll() {
    pending.forEach((timer, element) => {
      clearTimeout(timer);
      element.classList.remove('reveal-pending');
    });
    pending.clear();
  }

  if (!reducedMotion.matches && 'IntersectionObserver' in window) {
    // Fail open: no invisible content if observation or scripting is interrupted.
    const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (!entry.isIntersecting) return;
        clearTimeout(pending.get(entry.target));
        pending.delete(entry.target);
        entry.target.classList.remove('reveal-pending');
        observer.unobserve(entry.target);
      });
    }, { threshold: 0.04 });
    document.querySelectorAll('[data-reveal]').forEach(element => {
      if (element.getBoundingClientRect().top < window.innerHeight) return;
      // Subtle opacity only, so text remains readable even before observation.
      element.classList.add('reveal-pending');
      pending.set(element, setTimeout(() => element.classList.remove('reveal-pending'), 6000));
      observer.observe(element);
    });
    document.body.classList.add('motion-ready');
    reducedMotion.addEventListener('change', event => {
      if (event.matches) {
        revealAll();
        observer.disconnect();
        document.body.classList.remove('motion-ready');
      }
    });
  }
})();
