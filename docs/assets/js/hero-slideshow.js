(() => {
  "use strict";

  const stage = document.querySelector("[data-hero-slideshow]");
  const control = document.querySelector("[data-hero-motion]");
  if (!stage || !control) return;

  const slides = [...stage.querySelectorAll(".hero-slide")];
  const motion = window.matchMedia("(prefers-reduced-motion: reduce)");
  const interval = 8000;
  const fade = 1600;
  const requestedZoom = 1.28; // Fixed visual effect, independent of display density.
  let current = 0;
  let timer;
  let paused = false;
  let ready = false;
  let zoom;
  let geometry = "";

  function coverWidth(image) {
    const aspect = Number(image.getAttribute("width")) / Number(image.getAttribute("height"));
    return Math.max(stage.clientWidth, stage.clientHeight * aspect);
  }

  function updateResolution() {
    slides.forEach((slide) => {
      const image = slide.querySelector("img");
      // sizes describes the full covered image, including the maximum zoom.
      // The browser applies devicePixelRatio when selecting a srcset candidate.
      image.sizes = `${Math.ceil(coverWidth(image) * requestedZoom)}px`;
    });
  }

  function running() {
    return ready && !paused && !motion.matches && !document.hidden;
  }

  function startZoom() {
    const image = slides[current].querySelector("img");
    image.getAnimations().forEach((animation) => animation.cancel());
    zoom = image.animate(
      [{ transform: `scale(${requestedZoom})` }, { transform: "scale(1)" }],
      { duration: interval + fade, easing: "linear", fill: "forwards" },
    );
  }

  function sync() {
    clearTimeout(timer);
    control.hidden = !ready || motion.matches;
    control.textContent = paused ? "Reanudar animación" : "Pausar animación";
    if (!running()) {
      // Include the crossfade so pausing freezes the whole photograph.
      stage.getAnimations({ subtree: true }).forEach((animation) => animation.pause());
      if (motion.matches) {
        slides.forEach((slide) =>
          slide
            .querySelector("img")
            .getAnimations()
            .forEach((animation) => animation.cancel()),
        );
        zoom = null;
      }
      return;
    }
    if (!zoom) startZoom();
    stage.getAnimations({ subtree: true }).forEach((animation) => animation.play());
    timer = setTimeout(advance, interval);
  }

  function advance() {
    if (!running()) return;
    const previous = slides[current];
    current = (current + 1) % slides.length;
    // Reset the incoming image while it is still hidden; let the outgoing zoom finish behind the fade.
    startZoom();
    slides[current].classList.add("is-active");
    previous.classList.remove("is-active");
    timer = setTimeout(advance, interval);
  }

  control.addEventListener("click", () => {
    paused = !paused;
    sync();
  });
  motion.addEventListener("change", sync);
  document.addEventListener("visibilitychange", sync);

  function resize() {
    const next = `${stage.clientWidth}:${stage.clientHeight}:${window.devicePixelRatio}`;
    if (next === geometry) return;
    geometry = next;
    updateResolution();
    if (ready) {
      slides.forEach((slide) => slide.querySelector("img").getAnimations().forEach((animation) => animation.cancel()));
      zoom = null;
      sync();
    }
  }
  window.addEventListener("resize", resize);
  if ("ResizeObserver" in window) new ResizeObserver(resize).observe(stage);
  resize();

  function imageReady(image) {
    return new Promise((resolve, reject) => {
      function cleanup() {
        image.removeEventListener("load", loaded);
        image.removeEventListener("error", failed);
      }
      function loaded() { cleanup(); resolve(); }
      function failed() { cleanup(); reject(new Error("Hero image could not be loaded")); }
      image.addEventListener("load", loaded);
      image.addEventListener("error", failed);
      if (image.complete) {
        if (image.naturalWidth > 0) loaded();
        else failed();
      }
    });
  }

  // Responsive source changes can interrupt decode(); wait for load instead.
  // Keep the first image visible if the second image cannot be loaded.
  Promise.all(slides.map((slide) => imageReady(slide.querySelector("img"))))
    .then(() => {
      ready = true;
      sync();
    })
    .catch(() => {});
})();
