/**
 * Inicialización del sitio (idioma, menú móvil). Header/footer vienen del servidor (PHP).
 */
(function () {
  "use strict";

  function onReady(fn) {
    if (document.readyState === "loading") {
      document.addEventListener("DOMContentLoaded", fn);
    } else {
      fn();
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

  onReady(function () {
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
      syncLangSelects();
      bindMobileLangSelect();
      if (typeof window.initHeaderBehavior === "function") {
        window.initHeaderBehavior();
      }
      if (window.MacoRoutes?.patchLinks) {
        window.MacoRoutes.patchLinks(document);
      }
    });
  });

  document.addEventListener("maco:languagechange", () => {
    if (window.I18n?.ready) {
      window.I18n.apply();
    }
    syncLangSelects();
  });
})();
