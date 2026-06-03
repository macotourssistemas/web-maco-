/**
 * Envío del formulario de contacto vía api/contact.php (SMTP MXroute + .env)
 */
(function () {
  "use strict";

  const form = document.getElementById("contact-form");
  if (!form) return;

  function apiUrl(path) {
    const base =
      window.MacoRoutes && typeof MacoRoutes.base === "function"
        ? MacoRoutes.base()
        : "";
    const prefix = base.endsWith("/") ? base.slice(0, -1) : base;
    return `${prefix}/${path.replace(/^\//, "")}`;
  }

  const statusEl = document.getElementById("contact-form-status");
  const submitBtn = form.querySelector('button[type="submit"]');

  function msg(key, fallback) {
    if (window.I18n && typeof window.I18n.t === "function") {
      const value = window.I18n.t(key);
      if (value != null) return value;
    }
    return fallback;
  }

  function setStatus(type, text) {
    if (!statusEl) return;
    statusEl.classList.remove("hidden");
    statusEl.hidden = false;
    statusEl.className =
      "contact-form__status " +
      (type === "success"
        ? "bg-emerald-50 text-emerald-800 border-emerald-200"
        : type === "error"
          ? "bg-red-50 text-red-800 border-red-200"
          : "bg-slate-50 text-slate-700 border-slate-200");
    statusEl.textContent = text;
  }

  form.addEventListener("submit", async function (e) {
    e.preventDefault();

    if (submitBtn) {
      submitBtn.disabled = true;
    }

    setStatus(
      "info",
      msg("pages.contacto.formSending", "Enviando mensaje…")
    );

    const body = new FormData(form);

    try {
      const response = await fetch(apiUrl("api/contact.php"), {
        method: "POST",
        body,
        headers: { Accept: "application/json" },
      });

      const data = await response.json().catch(() => ({}));

      if (response.ok && data.ok) {
        form.reset();
        setStatus(
          "success",
          msg(
            "pages.contacto.formSuccess",
            "¡Gracias! Su mensaje fue enviado correctamente."
          )
        );
        return;
      }

      setStatus(
        "error",
        msg(
          "pages.contacto.formError",
          "No se pudo enviar el mensaje. Intente de nuevo o escríbanos por correo."
        )
      );
    } catch (_err) {
      setStatus(
        "error",
        msg(
          "pages.contacto.formError",
          "No se pudo enviar el mensaje. Intente de nuevo o escríbanos por correo."
        )
      );
    } finally {
      if (submitBtn) {
        submitBtn.disabled = false;
      }
    }
  });
})();
