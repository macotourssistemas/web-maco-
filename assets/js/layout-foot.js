/**
 * Carga scripts del sitio en orden (sustituye repetir <script> en cada HTML).
 * Scripts extra: data-extra-scripts="assets/js/foo.js,assets/js/bar.js"
 */
(function () {
  "use strict";

  function assetUrl(path) {
    const base =
      window.MacoRoutes && typeof window.MacoRoutes.base === "function"
        ? window.MacoRoutes.base()
        : "";
    const clean = path.replace(/^\//, "");
    return base ? `${base}/${clean}` : clean;
  }

  function loadScript(src) {
    return new Promise((resolve, reject) => {
      const el = document.createElement("script");
      el.src = assetUrl(src);
      el.onload = () => resolve();
      el.onerror = () => reject(new Error(`No se pudo cargar: ${src}`));
      document.body.appendChild(el);
    });
  }

  const extra = (document.body.getAttribute("data-extra-scripts") || "")
    .split(",")
    .map((s) => s.trim())
    .filter(Boolean);

  const scripts = [
    "assets/vendor/purecounter/purecounter_vanilla.js",
    "assets/vendor/glightbox/js/glightbox.min.js",
    "assets/vendor/swiper/swiper-bundle.min.js",
    "assets/vendor/aos/aos.js",
    "assets/js/i18n.js",
    ...extra,
    "assets/js/ui.js",
    "assets/js/main.js",
    "assets/js/components.js",
  ];

  (async function () {
    for (const src of scripts) {
      await loadScript(src);
    }
  })().catch((err) => console.error("layout-foot:", err));
})();
