(() => {
  "use strict";

  const stage = document.querySelector("[data-hero-zoom]");
  const image = stage?.querySelector("img");
  if (!image) return;

  const duration = 9600;
  const initialScale = 1.28;
  const motion = window.matchMedia("(prefers-reduced-motion: reduce)");
  let zoom;

  function updateResolution() {
    const aspect = Number(image.getAttribute("width")) / Number(image.getAttribute("height"));
    const coveredWidth = Math.max(stage.clientWidth, stage.clientHeight * aspect);
    image.sizes = `${Math.ceil(coveredWidth * initialScale)}px`;
  }

  function sync() {
    if (motion.matches) {
      zoom?.cancel();
      zoom = null;
      return;
    }
    if (!image.complete || !image.naturalWidth) return;
    if (!zoom) {
      // One zoom-out on entry, ending at natural scale without a repeating jump.
      zoom = image.animate(
        [{ transform: `scale(${initialScale})` }, { transform: "scale(1)" }],
        { duration, easing: "linear", fill: "forwards" }
      );
    }
    if (document.hidden && zoom.playState === "running") zoom.pause();
    else if (!document.hidden && zoom.playState === "paused") zoom.play();
  }

  image.addEventListener("load", sync);
  motion.addEventListener("change", sync);
  document.addEventListener("visibilitychange", sync);
  window.addEventListener("resize", updateResolution);
  if ("ResizeObserver" in window) new ResizeObserver(updateResolution).observe(stage);
  updateResolution();
  sync();
})();
