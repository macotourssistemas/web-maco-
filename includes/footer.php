<footer id="footer" class="footer">
  <div class="container">
    <div class="footer__grid">
      <div class="footer__brand">
        <a href="<?= maco_h(maco_href('index')) ?>" class="footer__brand-link">
          <img
            src="<?= maco_h('assets/img/logo-transparent.png?v=2') ?>"
            alt="Maco Tours"
            class="footer__logo-img"
            width="800"
            height="321"
          />
        </a>
        <p class="footer__tagline" data-i18n="footer.description">
          Transporte especializado en Colombia. Más de 25 años conectando personas y empresas con seguridad.
        </p>
        <div class="footer__social" aria-label="Redes sociales">
          <a href="https://twitter.com/transmacotours" aria-label="Twitter"><i class="fa-brands fa-x-twitter"></i></a>
          <a href="https://www.facebook.com/transportesespecialesmacotours?locale=es_LA" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
          <a href="https://www.instagram.com/transportesmacotours/" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
          <a href="https://www.linkedin.com/company/transportes-especiales-macotours-sas/" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
        </div>
      </div>

      <div class="footer__offices">
        <div class="footer__office">
          <h4 data-i18n="footer.headOffice">Sede principal</h4>
          <p class="footer__place">Santa Marta, Magdalena</p>
          <p class="footer__address">Calle 12 # 10 - 71, Barrio Gaira</p>
          <ul class="footer__meta">
            <li>
              <span data-i18n="footer.phone">Teléfono</span>
              <a href="tel:+576054299214">(605) 429 - 9214</a>
            </li>
            <li>
              <span data-i18n="footer.email">Correo</span>
              <?php maco_render_email_links('footer__phones'); ?>
            </li>
          </ul>
        </div>

        <div class="footer__office">
          <h4 data-i18n="footer.foundation">Fundación</h4>
          <p class="footer__place">Fundación, Magdalena</p>
          <p class="footer__address">Calle 25 # 8 - 17</p>
          <ul class="footer__meta">
            <li>
              <span data-i18n="footer.phone">Teléfono</span>
              <span class="footer__phones">
                <a href="tel:+573045946776">+57 304 594 6776</a>
                <span class="footer__sep" aria-hidden="true">/</span>
                <a href="tel:+573015963042">+57 301 596 3042</a>
              </span>
            </li>
          </ul>
        </div>

        <div class="footer__office">
          <h4 data-i18n="footer.antioquia">Antioquia</h4>
          <p class="footer__place">Maceo, Antioquia</p>
          <p class="footer__address">Calle 27 # 26-03, Calle Vélez</p>
          <ul class="footer__meta">
            <li>
              <span data-i18n="footer.phone">Teléfono</span>
              <a href="tel:+573146052489">+57 314 605 2489</a>
            </li>
          </ul>
        </div>

        <div class="footer__office">
          <h4 data-i18n="footer.guajira">Guajira</h4>
          <p class="footer__place">Riohacha, La Guajira</p>
          <p class="footer__address">Calle 15 # 17-53</p>
          <ul class="footer__meta">
            <li>
              <span data-i18n="footer.phone">Teléfono</span>
              <a href="tel:+573045946776">+57 304 594 6776</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="footer__bottom">
      <p class="footer__copyright">
        &copy; <strong class="text-white">Maco Tours</strong>.
        <span data-i18n="footer.rights">Todos los derechos reservados.</span>
      </p>
      <a href="<?= maco_h(maco_href('politicas_Privacidad')) ?>" class="footer__privacy" data-i18n="footer.privacy">Política de privacidad</a>
    </div>
  </div>
</footer>
