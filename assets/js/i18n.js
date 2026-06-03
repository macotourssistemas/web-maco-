/**
 * Maco Tours — multi-language (ES default: EN, PT, IT, FR)
 */
(function () {
  "use strict";

  const STORAGE_KEY = "maco-lang";
  const DEFAULT_LANG = "es";
  const SUPPORTED = ["es", "en", "pt", "it", "fr"];

  const LANG_LABELS = {
    es: "Español",
    en: "English",
    pt: "Português",
    it: "Italiano",
    fr: "Français",
  };

  let initPromise = null;

  const I18n = {
    lang: DEFAULT_LANG,
    strings: {},
    ready: false,

    t(key) {
      if (!key) return null;
      const parts = key.split(".");
      let value = this.strings;
      for (const part of parts) {
        value = value?.[part];
        if (value === undefined) return null;
      }
      return value;
    },

    getPreferredLang() {
      const stored = localStorage.getItem(STORAGE_KEY);
      if (stored && SUPPORTED.includes(stored)) return stored;

      const browser = (navigator.language || navigator.userLanguage || "es")
        .slice(0, 2)
        .toLowerCase();
      return SUPPORTED.includes(browser) ? browser : DEFAULT_LANG;
    },

    localeUrl(code) {
      const base =
        window.MacoRoutes && typeof MacoRoutes.base === "function"
          ? MacoRoutes.base()
          : "";
      const prefix = base.endsWith("/") ? base.slice(0, -1) : base;
      return `${prefix}/assets/i18n/${code}.json`;
    },

    async load(lang) {
      const code = SUPPORTED.includes(lang) ? lang : DEFAULT_LANG;
      const response = await fetch(this.localeUrl(code));
      if (!response.ok) {
        throw new Error(`No se pudo cargar idioma: ${code}`);
      }
      this.strings = await response.json();
      this.lang = code;
      document.documentElement.lang = code;
    },

    apply(root) {
      const scope = root && root.querySelectorAll ? root : document;

      scope.querySelectorAll("[data-i18n]").forEach((el) => {
        const key = el.getAttribute("data-i18n");
        const value = this.t(key);
        if (value == null) return;

        if (el.hasAttribute("data-i18n-placeholder") || (el.matches("input, textarea") && el.hasAttribute("placeholder"))) {
          el.placeholder = value;
        } else {
          el.textContent = value;
        }
      });

      scope.querySelectorAll("[data-i18n-html]").forEach((el) => {
        const value = this.t(el.getAttribute("data-i18n-html"));
        if (value != null) el.innerHTML = value;
      });

      scope.querySelectorAll("[data-i18n-aria]").forEach((el) => {
        const value = this.t(el.getAttribute("data-i18n-aria"));
        if (value != null) el.setAttribute("aria-label", value);
      });

      if (!root || root === document) {
        const titleKey =
          document.body.getAttribute("data-i18n-title") ||
          document.querySelector("[data-i18n-title]")?.getAttribute("data-i18n-title");
        if (titleKey) {
          const title = this.t(titleKey);
          if (title) document.title = title;
        }
      }

      const select = document.getElementById("lang-select");
      if (select) select.value = this.lang;
    },

    bindSelector() {
      const optionsHtml = SUPPORTED.map(
        (code) => `<option value="${code}">${LANG_LABELS[code]}</option>`
      ).join("");

      document.querySelectorAll("#lang-select, #lang-select-mobile").forEach((select) => {
        if (!select || select.dataset.i18nBound === "1") return;
        select.dataset.i18nBound = "1";
        select.innerHTML = optionsHtml;
        select.value = this.lang;
        select.addEventListener("change", (e) => {
          this.setLanguage(e.target.value);
          document.querySelectorAll("#lang-select, #lang-select-mobile").forEach((s) => {
            if (s !== e.target) s.value = e.target.value;
          });
        });
      });
    },

    async setLanguage(lang) {
      if (!SUPPORTED.includes(lang)) return;
      localStorage.setItem(STORAGE_KEY, lang);
      await this.load(lang);
      this.apply();
      document.dispatchEvent(
        new CustomEvent("maco:languagechange", { detail: { lang } })
      );
    },

    async init() {
      if (this.ready) return;
      if (!initPromise) {
        initPromise = (async () => {
          const lang = this.getPreferredLang();
          await this.load(lang);
          this.apply();
          this.bindSelector();
          this.ready = true;
        })();
      }
      return initPromise;
    },
  };

  window.I18n = I18n;

  function bootI18n() {
    I18n.init().catch((err) => console.error("i18n:", err));
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", bootI18n);
  } else {
    bootI18n();
  }
})();
