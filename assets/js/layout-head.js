/**
 * Inyecta CSS, fuentes y favicon comunes (una sola definición para todas las páginas).
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

  function appendLink(rel, href, opts) {
    const link = document.createElement("link");
    link.rel = rel;
    link.href = href;
    if (opts) {
      if (opts.crossOrigin) link.crossOrigin = opts.crossOrigin;
    }
    document.head.appendChild(link);
  }

  appendLink("icon", assetUrl("assets/img/Logo.png"));
  appendLink("apple-touch-icon", assetUrl("assets/img/Logo.png"));

  appendLink("preconnect", "https://fonts.googleapis.com");
  appendLink("preconnect", "https://fonts.gstatic.com", { crossOrigin: "anonymous" });
  appendLink(
    "stylesheet",
    "https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&display=swap"
  );

  [
    "assets/vendor/fontawesome-free/css/all.min.css",
    "assets/vendor/glightbox/css/glightbox.min.css",
    "assets/vendor/swiper/swiper-bundle.min.css",
    "assets/vendor/aos/aos.css",
    "assets/css/main.css",
    "assets/css/tailwind.css",
  ].forEach((path) => appendLink("stylesheet", assetUrl(path)));
})();
