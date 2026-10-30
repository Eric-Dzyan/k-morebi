(() => {
  'use strict';

  const toggle = document.querySelector('[data-menu-toggle]');
  const navigation = document.querySelector('#navigation');
  const mobile = window.matchMedia('(max-width: 760px)');

  function setMenu(open, returnFocus = false) {
    navigation.classList.toggle('open', open);
    navigation.inert = mobile.matches && !open;
    toggle.setAttribute('aria-expanded', String(open));
    toggle.setAttribute('aria-label', open ? 'Cerrar menú' : 'Abrir menú');
    if (returnFocus) toggle.focus();
  }

  if (toggle && navigation) {
    document.body.classList.add('menu-ready');
    setMenu(false);
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

  // Keep native details semantics and no-JS behavior; animate only a person's action.
  const disclosureStates = new Map();
  document.querySelectorAll('.faq details').forEach(details => {
    const summary = details.querySelector('summary');
    const state = { expanded: details.open, animation: null };
    disclosureStates.set(details, state);
    function settle() {
      state.animation = null;
      details.open = state.expanded;
      details.style.removeProperty('overflow');
    }
    state.settle = settle;
    summary.addEventListener('click', event => {
      if (reducedMotion.matches || !details.animate) return;
      event.preventDefault();
      const start = details.getBoundingClientRect().height;
      state.animation?.cancel();
      state.expanded = !state.expanded;
      details.open = true;
      const style = getComputedStyle(details);
      const closedHeight = summary.getBoundingClientRect().height
        + parseFloat(style.paddingTop) + parseFloat(style.paddingBottom)
        + parseFloat(style.borderTopWidth) + parseFloat(style.borderBottomWidth);
      const end = state.expanded ? details.getBoundingClientRect().height : closedHeight;
      details.style.overflow = 'hidden';
      state.animation = details.animate(
        [{ height: `${start}px` }, { height: `${end}px` }],
        { duration: 280, easing: 'cubic-bezier(0.22, 1, 0.36, 1)' }
      );
      state.animation.onfinish = settle;
    });
    details.addEventListener('toggle', () => {
      if (!state.animation) state.expanded = details.open;
    });
  });
  reducedMotion.addEventListener('change', event => {
    if (!event.matches) return;
    disclosureStates.forEach(state => {
      state.animation?.cancel();
      state.settle();
    });
  });
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
      // Keep text readable even before the entrance is triggered.
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
