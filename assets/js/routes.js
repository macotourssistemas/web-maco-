/**
 * Maco Tours — rutas limpias (sin .html / .php en la barra de direcciones)
 */
(function () {
  "use strict";

  const PAGES = {
    index: { file: "index.php", slug: "" },
    nosotros: { file: "nosotros.php", slug: "nosotros" },
    servicios: { file: "servicios.php", slug: "servicios" },
    contacto: { file: "contacto.php", slug: "contacto" },
    nuestro_equipo: { file: "nuestro_equipo.php", slug: "nuestro_equipo" },
    servicio_empresarial: { file: "servicio_empresarial.php", slug: "servicio_empresarial" },
    servicio_escolar: { file: "servicio_escolar.php", slug: "servicio_escolar" },
    servicio_turistico: { file: "servicio_turistico.php", slug: "servicio_turistico" },
    politicas_Privacidad: { file: "politicas_Privacidad.php", slug: "politicas_Privacidad" },
  };

  function getBasePath() {
    const { pathname } = window.location;
    const marker = "/MacoTours";
    const idx = pathname.toLowerCase().indexOf(marker.toLowerCase());
    if (idx !== -1) {
      return pathname.slice(0, idx + marker.length);
    }
    const parts = pathname.split("/").filter(Boolean);
    const last = parts[parts.length - 1] || "";
    if (!last || last.includes(".") === false || /\.(html|php)$/i.test(last)) {
      return pathname.replace(/\/[^/]*$/, "") || "";
    }
    return "";
  }

  function slugFromPathname(pathname) {
    let segment = pathname.split("/").filter(Boolean).pop() || "";
    if (segment.toLowerCase() === "macotours") {
      return "index";
    }
    if (/\.(html|php)$/i.test(segment)) {
      segment = segment.replace(/\.(html|php)$/i, "");
    }
    if (!segment || segment === "index") {
      return "index";
    }
    return segment;
  }

  function getCurrentSlug() {
    return slugFromPathname(window.location.pathname);
  }

  function href(pageKey) {
    const base = getBasePath();
    const entry = PAGES[pageKey];
    const slug = entry ? entry.slug : pageKey;
    if (!slug || pageKey === "index") {
      return `${base}/`;
    }
    return `${base}/${slug}`;
  }

  function slugFromHref(hrefAttr) {
    if (!hrefAttr) return null;
    const raw = hrefAttr.split("#")[0].split("?")[0];
    if (/^(https?:|mailto:|tel:|\/\/)/i.test(raw)) return null;

    const base = getBasePath();
    let path = raw;
    if (path.startsWith(base)) {
      path = path.slice(base.length);
    }
    path = path.replace(/^\.\//, "").replace(/^\//, "").replace(/\/$/, "");
    if (!path || path === "index") return "index";
    if (/\.(html|php)$/i.test(path)) {
      path = path.replace(/\.(html|php)$/i, "");
    }
    return path;
  }

  function patchLinks(root) {
    const scope = root && root.querySelectorAll ? root : document;
    scope.querySelectorAll("a[href]").forEach((anchor) => {
      const value = anchor.getAttribute("href");
      if (!value || /^(https?:|mailto:|tel:|#|\/\/)/i.test(value)) return;

      const slug = slugFromHref(value);
      if (slug == null) return;

      if (PAGES[slug] || slug === "index") {
        anchor.setAttribute("href", href(slug));
      } else if (/\.(html|php)$/i.test(value)) {
        anchor.setAttribute("href", href(slug));
      }
    });
  }

  function redirectIfExtensionInUrl() {
    const { pathname, search, hash } = window.location;
    if (!/\.(html|php)$/i.test(pathname)) return;

    const base = getBasePath();
    const slug = slugFromPathname(pathname);
    const target = slug === "index" ? `${base}/` : `${base}/${slug}`;
    window.location.replace(target + search + hash);
  }

  function isNavActive(linkHref) {
    const linkSlug = slugFromHref(linkHref);
    const current = getCurrentSlug();
    return linkSlug != null && linkSlug === current;
  }

  redirectIfExtensionInUrl();

  window.MacoRoutes = {
    pages: PAGES,
    base: getBasePath,
    current: getCurrentSlug,
    href,
    patchLinks,
    isNavActive,
    slugFromHref,
  };
})();
