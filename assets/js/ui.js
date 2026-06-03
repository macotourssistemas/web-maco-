/**
 * UI interactions (modals, mobile nav, FAQ)
 */
(function () {
  "use strict";

  function initMobileNav() {
    const toggle = document.getElementById("mobile-nav-toggle");
    const openIcon = document.getElementById("nav-icon-open");
    const closeIcon = document.getElementById("nav-icon-close");

    if (!toggle) return;

    const menuLabel = (key) =>
      (window.I18n?.t(key) ?? (key === "nav.closeMenu" ? "Cerrar menú" : "Abrir menú"));

    const setOpen = (open) => {
      document.body.classList.toggle("mobile-nav-active", open);
      toggle.setAttribute("aria-expanded", open ? "true" : "false");
      toggle.setAttribute(
        "aria-label",
        open ? menuLabel("nav.closeMenu") : menuLabel("nav.openMenu")
      );
      openIcon?.classList.toggle("hidden", open);
      closeIcon?.classList.toggle("hidden", !open);
    };

    toggle.addEventListener("click", () => {
      setOpen(!document.body.classList.contains("mobile-nav-active"));
    });

    document.querySelectorAll("#navbar a").forEach((link) => {
      link.addEventListener("click", () => setOpen(false));
    });
  }

  function initModals() {
    document.querySelectorAll("[data-modal-open]").forEach((trigger) => {
      const id = trigger.getAttribute("data-modal-open");
      const backdrop = document.getElementById(id);
      if (!backdrop) return;

      const close = () => backdrop.classList.remove("is-open");

      trigger.addEventListener("click", (e) => {
        e.preventDefault();
        backdrop.classList.add("is-open");
      });

      backdrop.querySelectorAll("[data-modal-close]").forEach((btn) => {
        btn.addEventListener("click", close);
      });

      backdrop.addEventListener("click", (e) => {
        if (e.target === backdrop) close();
      });
    });

    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape") {
        document.querySelectorAll(".modal-backdrop.is-open").forEach((m) => {
          m.classList.remove("is-open");
        });
      }
    });
  }

  let initialized = false;

  window.initSiteUI = function () {
    if (initialized) return;
    initialized = true;
    initMobileNav();
    initModals();
  };

  document.addEventListener("DOMContentLoaded", window.initSiteUI);
})();
