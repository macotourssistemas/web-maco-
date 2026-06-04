/**
 * Envío del formulario de contacto vía api/contact.php (SMTP MXroute + .env)
 */
(function () {
  "use strict";

  const TAG = "[contacto]";
  console.info(TAG, "script cargado");

  const form = document.getElementById("contact-form");
  if (!form) {
    console.error(
      TAG,
      "NO se encontró #contact-form en la página: el envío no se activará."
    );
    return;
  }
  console.info(TAG, "formulario detectado, listener activo");

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

  function setStatus(type, text, detail) {
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
    statusEl.textContent = "";

    const msgEl = document.createElement("div");
    msgEl.textContent = text;
    statusEl.appendChild(msgEl);

    if (detail) {
      const pre = document.createElement("pre");
      pre.style.cssText =
        "margin-top:.5rem;padding:.5rem;background:rgba(0,0,0,.06);" +
        "border-radius:.375rem;font-size:.75rem;line-height:1.35;" +
        "white-space:pre-wrap;word-break:break-word;overflow:auto;max-height:14rem;";
      pre.textContent = detail;
      statusEl.appendChild(pre);
    }
  }

  function buildDebug(status, statusText, raw, data) {
    const lines = [];
    lines.push("HTTP " + status + (statusText ? " " + statusText : ""));

    if (data && typeof data === "object") {
      if (data.error) lines.push("error: " + data.error);
      if (data.debug) {
        const d = data.debug;
        if (d.message) lines.push("detalle: " + d.message);
        if (d.smtp_step) lines.push("paso SMTP: " + d.smtp_step);
        if (d.smtp) {
          lines.push(
            "smtp: " +
              [d.smtp.host, d.smtp.port, d.smtp.encryption]
                .filter(Boolean)
                .join(":")
          );
          if (d.smtp.mail_to) lines.push("mail_to: " + d.smtp.mail_to);
          if (d.smtp.mail_from) lines.push("mail_from: " + d.smtp.mail_from);
        }
      }
    }

    // Respuesta que NO es JSON (Cloudflare, 403/500 de Apache, HTML, etc.)
    if ((!data || Object.keys(data).length === 0) && raw) {
      const snippet = raw.replace(/\s+/g, " ").trim().slice(0, 300);
      if (snippet) lines.push("respuesta (no-JSON): " + snippet);
    }

    return lines.join("\n");
  }

  form.addEventListener("submit", async function (e) {
    e.preventDefault();
    console.info(TAG, "submit interceptado");

    if (submitBtn) {
      submitBtn.disabled = true;
    }

    setStatus(
      "info",
      msg("pages.contacto.formSending", "Enviando mensaje…")
    );

    const body = new FormData(form);
    const enviado = {};
    body.forEach(function (value, key) {
      enviado[key] = typeof value === "string" ? value : "[archivo]";
    });
    const url = apiUrl("api/contact.php");
    console.info(TAG, "POST a:", url, "campos:", enviado);

    try {
      const response = await fetch(url, {
        method: "POST",
        body,
        headers: { Accept: "application/json" },
      });

      const raw = await response.text();
      console.info(
        TAG,
        "respuesta HTTP",
        response.status,
        response.statusText,
        "| cuerpo:",
        raw
      );

      let data = {};
      try {
        data = JSON.parse(raw);
      } catch (_e) {
        data = {};
        console.warn(TAG, "la respuesta NO es JSON (¿Cloudflare/Apache?)");
      }

      if (response.ok && data.ok) {
        console.info(TAG, "envío correcto");
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

      console.error(TAG, "envío fallido:", data.error || "(sin código)");
      setStatus(
        "error",
        msg(
          "pages.contacto.formError",
          "No se pudo enviar el mensaje. Intente de nuevo o escríbanos por correo."
        ),
        buildDebug(response.status, response.statusText, raw, data)
      );
    } catch (err) {
      console.error(TAG, "excepción durante el envío:", err);
      setStatus(
        "error",
        msg(
          "pages.contacto.formError",
          "No se pudo enviar el mensaje. Intente de nuevo o escríbanos por correo."
        ),
        "Error de red/navegador: " + (err && err.message ? err.message : err)
      );
    } finally {
      if (submitBtn) {
        submitBtn.disabled = false;
      }
    }
  });
})();
