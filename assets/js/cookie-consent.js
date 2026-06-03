/**
 * Consentimiento de cookies y carga condicional de Google Analytics.
 */
(function () {
  "use strict";

  const STORAGE_KEY = "maco-cookie-consent";
  const CONSENT_ANALYTICS = "analytics";

  function getConsent() {
    try {
      return localStorage.getItem(STORAGE_KEY);
    } catch (_e) {
      return null;
    }
  }

  function setConsent(value) {
    try {
      localStorage.setItem(STORAGE_KEY, value);
    } catch (_e) {
      /* ignore */
    }
  }

  function hideBanner() {
    const banner = document.getElementById("cookie-banner");
    if (banner) {
      banner.hidden = true;
      banner.classList.remove("cookie-banner--visible");
    }
  }

  function showBanner() {
    const banner = document.getElementById("cookie-banner");
    if (banner) {
      banner.hidden = false;
      banner.classList.add("cookie-banner--visible");
      if (window.I18n?.ready) {
        window.I18n.apply(banner);
      }
    }
  }

  function loadGoogleAnalytics() {
    const id = window.MACO_GA_ID;
    if (!id || window.__MACO_GA_LOADED__) return;

    window.__MACO_GA_LOADED__ = true;
    window.dataLayer = window.dataLayer || [];
    function gtag() {
      window.dataLayer.push(arguments);
    }
    window.gtag = gtag;
    gtag("js", new Date());
    gtag("config", id, { anonymize_ip: true });

    const script = document.createElement("script");
    script.async = true;
    script.src = "https://www.googletagmanager.com/gtag/js?id=" + encodeURIComponent(id);
    document.head.appendChild(script);
  }

  function initBanner() {
    const acceptBtn = document.getElementById("cookie-accept");
    const rejectBtn = document.getElementById("cookie-reject");
    if (!acceptBtn || !rejectBtn) return;

    acceptBtn.addEventListener("click", function () {
      setConsent(CONSENT_ANALYTICS);
      hideBanner();
      loadGoogleAnalytics();
    });

    rejectBtn.addEventListener("click", function () {
      setConsent("necessary");
      hideBanner();
    });
  }

  function boot() {
    initBanner();
    const consent = getConsent();
    if (consent === CONSENT_ANALYTICS) {
      loadGoogleAnalytics();
      hideBanner();
      return;
    }
    if (consent === "necessary") {
      hideBanner();
      return;
    }
    showBanner();
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", boot);
  } else {
    boot();
  }

  document.addEventListener("maco:languagechange", function () {
    const banner = document.getElementById("cookie-banner");
    if (banner && window.I18n?.ready) {
      window.I18n.apply(banner);
    }
  });
})();
