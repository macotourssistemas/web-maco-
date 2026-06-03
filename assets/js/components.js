/**

 * Component Loader — layout shell, header, footer, WhatsApp, FAQ, page hero

 */



function onDocumentReady(fn) {

  if (document.readyState === "loading") {

    document.addEventListener("DOMContentLoaded", fn);

  } else {

    fn();

  }

}



onDocumentReady(function () {

  const whenI18n = window.I18n?.ready

    ? Promise.resolve()

    : new Promise((resolve) => {

        if (window.I18n) {

          window.I18n.init().then(resolve).catch(resolve);

        } else {

          resolve();

        }

      });



  whenI18n.then(() => {

    Promise.all([

      injectShell("layout-shell-top", "componentes/layout-shell-top.html"),

      injectShell("layout-shell-bottom", "componentes/layout-shell-bottom.html"),

    ]).then(() => {

      renderPageHero();

      loadComponent("componentes/header.html", "header-container", initHeader);

      loadComponent("componentes/footer.html", "footer-container", applyI18n);

      loadComponent("componentes/whatsapp.html", "whatsapp-container", applyI18n);



      const faqContainer = document.getElementById("faq-container");

      if (faqContainer) {

        loadComponent("componentes/faq.html", "faq-container", applyI18n);

      }

    });

  });

});



function injectShell(containerId, url) {

  const host = document.getElementById(containerId);

  if (!host) return Promise.resolve();



  return fetch(componentUrl(url))

    .then((response) => {

      if (!response.ok) throw new Error(`Failed to load ${url}`);

      return response.text();

    })

    .then((html) => {

      host.innerHTML = html.trim();

      if (window.MacoRoutes?.patchLinks) {

        window.MacoRoutes.patchLinks(host);

      }

    })

    .catch((error) => console.error("Error loading shell:", error));

}



/** Cabecera de página interna: un solo bloque data-* en lugar de ~25 líneas HTML */

function renderPageHero() {

  const mount = document.getElementById("page-hero");

  if (!mount) return;



  const headerClass = mount.dataset.headerClass || "";

  const titleKey = mount.dataset.i18nTitle;

  const introKey = mount.dataset.i18nIntro;

  const crumbKey = mount.dataset.i18nCrumb;

  const introHtml = introKey

    ? `<p class="text-justify" data-i18n="${introKey}"></p>`

    : "";



  mount.className = "breadcrumbs";

  mount.innerHTML = `

    <div class="page-header d-flex align-items-center ${headerClass}">

      <div class="container position-relative">

        <div class="row d-flex justify-content-center">

          <div class="col-lg-6 text-center">

            <h2 data-i18n="${titleKey || ""}"></h2>

            ${introHtml}

          </div>

        </div>

      </div>

    </div>

    <nav>

      <div class="container">

        <ol>

          <li><a href="./" data-route="index" data-i18n="common.home">Inicio</a></li>

          <li data-i18n="${crumbKey || ""}"></li>

        </ol>

      </div>

    </nav>

  `;



  if (window.MacoRoutes?.patchLinks) {

    window.MacoRoutes.patchLinks(mount);

  }

  applyI18n(mount);

}



function applyI18n(container) {

  if (window.I18n?.ready && container) {

    window.I18n.apply(container);

  }

}



function componentUrl(path) {

  const base = window.MacoRoutes?.base?.() || "";

  return `${base}/${path.replace(/^\//, "")}`;

}



function loadComponent(url, containerId, callback) {

  fetch(componentUrl(url))

    .then((response) => {

      if (!response.ok) {

        throw new Error(`Failed to load ${url}: ${response.statusText}`);

      }

      return response.text();

    })

    .then((html) => {

      const container = document.getElementById(containerId);

      if (!container) return;



      if (containerId === "header-container") {

        const doc = new DOMParser().parseFromString(html.trim(), "text/html");

        const header = doc.querySelector("#header");

        if (header) {

          container.replaceWith(header);

          if (callback) callback(header);

          applyI18n(header);

          return;

        }

      }



      container.innerHTML = html;

      if (window.MacoRoutes?.patchLinks) {

        window.MacoRoutes.patchLinks(container);

      }

      if (callback) callback(container);

      applyI18n(container);

    })

    .catch((error) => console.error("Error loading component:", error));

}



function initHeader(headerEl) {

  const root = headerEl || document.getElementById("header");

  if (window.MacoRoutes?.patchLinks) {

    window.MacoRoutes.patchLinks(root || document);

    const footer = document.getElementById("footer-container");

    if (footer) window.MacoRoutes.patchLinks(footer);

  }



  document.querySelectorAll("#navbar ul li a").forEach((link) => {

    const isActive = window.MacoRoutes?.isNavActive

      ? window.MacoRoutes.isNavActive(link.getAttribute("href"))

      : link.getAttribute("href") === window.location.pathname.split("/").pop();

    if (isActive) {

      link.classList.add("active");

    }

  });



  syncLangSelects();

  bindMobileLangSelect();



  if (typeof window.initHeaderBehavior === "function") {

    window.initHeaderBehavior();

  }

}



function syncLangSelects() {

  const lang = window.I18n?.lang || "es";

  document.querySelectorAll("#lang-select, #lang-select-mobile").forEach((sel) => {

    if (!sel) return;

    if (!sel.dataset.i18nBound && window.I18n) {

      window.I18n.bindSelector();

    }

    sel.value = lang;

  });

}



function bindMobileLangSelect() {

  const mobile = document.getElementById("lang-select-mobile");

  const desktop = document.getElementById("lang-select");

  if (!mobile || mobile.dataset.synced === "1") return;



  mobile.dataset.synced = "1";

  if (desktop) {

    mobile.innerHTML = desktop.innerHTML;

    mobile.value = desktop.value;

  }



  mobile.addEventListener("change", (e) => {

    window.I18n?.setLanguage(e.target.value);

    if (desktop) desktop.value = e.target.value;

  });

}



document.addEventListener("maco:languagechange", () => {

  applyI18n(document.getElementById("header"));

  applyI18n(document.getElementById("page-hero"));

  applyI18n(document.getElementById("footer-container"));

  applyI18n(document.getElementById("whatsapp-container"));

  applyI18n(document.getElementById("faq-container"));

  if (window.I18n?.ready) {

    window.I18n.apply();

  }

  syncLangSelects();

});


