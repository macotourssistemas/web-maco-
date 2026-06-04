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

  const statusEl = document.getElementById("contact-form-status");
  const submitBtn = form.querySelector('button[type="submit"]');

  // Mensajes de validación en español por campo.
  const FIELD_LABELS = {
    name: "el nombre",
    email: "el correo electrónico",
    message: "el mensaje",
  };
  const FIELD_MESSAGES = {
    name: {
      missing: "Por favor ingresa tu nombre completo.",
      invalid: "El nombre supera el máximo permitido (120 caracteres).",
    },
    email: {
      missing: "Por favor ingresa tu correo electrónico.",
      invalid: "Ingresa un correo electrónico válido (ej: nombre@dominio.com).",
    },
    message: {
      missing: "Por favor escribe tu mensaje.",
      invalid: "El mensaje supera el máximo permitido (8000 caracteres).",
    },
  };

  function apiUrl(path) {
    const base =
      window.MacoRoutes && typeof MacoRoutes.base === "function"
        ? MacoRoutes.base()
        : "";
    const prefix = base.endsWith("/") ? base.slice(0, -1) : base;
    return `${prefix}/${path.replace(/^\//, "")}`;
  }

  function msg(key, fallback) {
    if (window.I18n && typeof window.I18n.t === "function") {
      const value = window.I18n.t(key);
      if (value != null) return value;
    }
    return fallback;
  }

  function fieldEl(nameAttr) {
    return form.querySelector('[name="' + nameAttr + '"]');
  }

  function clearFieldErrors() {
    form.querySelectorAll(".contact-form__error").forEach((el) => el.remove());
    form
      .querySelectorAll(".contact-form__input--error")
      .forEach((el) => el.classList.remove("contact-form__input--error"));
  }

  function showFieldError(nameAttr, text) {
    const input = fieldEl(nameAttr);
    if (!input) return;
    input.classList.add("contact-form__input--error");

    let err = input.parentNode.querySelector(".contact-form__error");
    if (!err) {
      err = document.createElement("span");
      err.className = "contact-form__error";
      input.parentNode.appendChild(err);
    }
    err.textContent = text;
  }

  // Validación en cliente; devuelve true si todo está correcto.
  function validateClient() {
    clearFieldErrors();
    const values = {
      name: (fieldEl("name") || {}).value || "",
      email: (fieldEl("email") || {}).value || "",
      message: (fieldEl("message") || {}).value || "",
    };
    let firstInvalid = null;

    if (values.name.trim() === "") {
      showFieldError("name", FIELD_MESSAGES.name.missing);
      firstInvalid = firstInvalid || "name";
    }
    if (values.email.trim() === "") {
      showFieldError("email", FIELD_MESSAGES.email.missing);
      firstInvalid = firstInvalid || "email";
    } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(values.email.trim())) {
      showFieldError("email", FIELD_MESSAGES.email.invalid);
      firstInvalid = firstInvalid || "email";
    }
    if (values.message.trim() === "") {
      showFieldError("message", FIELD_MESSAGES.message.missing);
      firstInvalid = firstInvalid || "message";
    }

    if (firstInvalid) {
      const el = fieldEl(firstInvalid);
      if (el && typeof el.focus === "function") el.focus();
    }
    return firstInvalid === null;
  }

  // Pinta errores que devuelve el servidor (missing_fields / invalid_fields / invalid_email).
  function showServerFieldErrors(code, fields) {
    if (!Array.isArray(fields) || fields.length === 0) return;
    const kind = code === "missing_fields" ? "missing" : "invalid";
    fields.forEach((f) => {
      if (FIELD_MESSAGES[f]) showFieldError(f, FIELD_MESSAGES[f][kind]);
    });
    const first = fieldEl(fields[0]);
    if (first && typeof first.focus === "function") first.focus();
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

  function humanRetry(seconds) {
    const s = Number(seconds) || 0;
    if (s >= 60) {
      const m = Math.ceil(s / 60);
      return m + (m === 1 ? " minuto" : " minutos");
    }
    return Math.max(1, s) + " segundos";
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
      }
    }
    if ((!data || Object.keys(data).length === 0) && raw) {
      const snippet = raw.replace(/\s+/g, " ").trim().slice(0, 300);
      if (snippet) lines.push("respuesta (no-JSON): " + snippet);
    }
    return lines.join("\n");
  }

  form.addEventListener("submit", async function (e) {
    e.preventDefault();
    console.info(TAG, "submit interceptado");

    if (!validateClient()) {
      console.warn(TAG, "validación en cliente falló");
      setStatus(
        "error",
        "Revisa los campos marcados antes de enviar."
      );
      return;
    }

    if (submitBtn) submitBtn.disabled = true;
    setStatus("info", msg("pages.contacto.formSending", "Enviando mensaje…"));

    const body = new FormData(form);
    const url = apiUrl("api/contact.php");

    try {
      const response = await fetch(url, {
        method: "POST",
        body,
        headers: { Accept: "application/json" },
      });

      const raw = await response.text();
      console.info(TAG, "respuesta HTTP", response.status, "| cuerpo:", raw);

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
        clearFieldErrors();
        setStatus(
          "success",
          msg(
            "pages.contacto.formSuccess",
            "¡Gracias! Tu solicitud fue enviada. Te enviamos una confirmación a tu correo."
          )
        );
        return;
      }

      // Errores por campo (en español, marcados en cada input).
      if (
        data.error === "missing_fields" ||
        data.error === "invalid_fields" ||
        data.error === "invalid_email"
      ) {
        showServerFieldErrors(data.error, data.fields || []);
        setStatus("error", "Revisa los campos marcados antes de enviar.");
        return;
      }

      // Límite anti-spam.
      if (data.error === "rate_limited") {
        setStatus(
          "error",
          "Has enviado varios mensajes en poco tiempo. Inténtalo de nuevo en " +
            humanRetry(data.retry_after) +
            "."
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
      if (submitBtn) submitBtn.disabled = false;
    }
  });
})();
