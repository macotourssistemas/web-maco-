<?php
declare(strict_types=1);
require __DIR__ . '/includes/bootstrap.php';
maco_page([
  'current_slug' => 'contacto',
  'i18n_title' => 'titles.contacto',
  'extra_scripts' => ['assets/js/contact-form.js'],
  'hero' => [
    'header_class' => 'page-header-contact',
    'i18n_title' => 'pages.contacto.title',
    'i18n_crumb' => 'pages.contacto.breadcrumb',
    'i18n_intro' => 'pages.contacto.intro',
  ],
]);
require __DIR__ . '/includes/layout-start.php';
?>
<main id="main"><!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div>
          <iframe style="border:0; width: 100%; height: 340px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3913.959930758603!2d-74.22152932426069!3d11.190600551416221!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8ef45f5542fa0461%3A0xdc4dd0547e6a2613!2sCl.%2012%20%2310-70%2C%20Gaira%2C%20Santa%20Marta%2C%20Magdalena!5e0!3m2!1ses-419!2sco!4v1707488646408!5m2!1ses-419!2sco" frameborder="0" allowfullscreen></iframe>
        </div><!-- End Google Maps -->

        <div class="row gy-4 mt-8">

          <div class="col-lg-4">

            <div class="info-item d-flex">
              <i class="fa-solid fa-location-dot flex-shrink-0"></i>
              <div>
                <h4 data-i18n="common.location">Ubicación</h4>
                <p data-i18n="pages.contacto.address">Calle 12 #10-70, Gaira, Santa Marta, Magdalena.</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex">
              <i class="fa-solid fa-envelope flex-shrink-0"></i>
              <div>
                <h4 data-i18n="common.email">Correo</h4>
                <p class="contact__emails"><?php maco_render_email_links('contact__email-list'); ?></p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex">
              <i class="fa-solid fa-phone flex-shrink-0"></i>
              <div>
                <h4 data-i18n="common.phone">Teléfono</h4>
                <p>(605) 429 - 9214</p>
              </div>
            </div><!-- End Info Item -->

          </div>

          <div class="col-lg-8">
              <form id="contact-form" class="contact-form" action="api/contact.php" method="post" novalidate>
                <div id="contact-form-status" class="contact-form__status hidden" role="status" aria-live="polite"></div>
                <div class="contact-form__fields">
                  <label class="contact-form__label">
                    <span class="sr-only" data-i18n="pages.contacto.namePlaceholder">Nombre completo</span>
                    <input type="text" name="name" class="contact-form__input" autocomplete="name" data-i18n="pages.contacto.namePlaceholder" data-i18n-placeholder placeholder="Nombre completo" required>
                  </label>
                  <label class="contact-form__label">
                    <span class="sr-only" data-i18n="pages.contacto.emailPlaceholder">Correo electrónico</span>
                    <input type="email" name="email" class="contact-form__input" autocomplete="email" data-i18n="pages.contacto.emailPlaceholder" data-i18n-placeholder placeholder="Correo electrónico" required>
                  </label>
                </div>
                <label class="contact-form__label contact-form__label--full">
                  <span class="sr-only" data-i18n="pages.contacto.messagePlaceholder">Mensaje</span>
                  <textarea class="contact-form__input contact-form__textarea" name="message" rows="8" autocomplete="off" data-i18n="pages.contacto.messagePlaceholder" data-i18n-placeholder placeholder="Mensaje" required></textarea>
                </label>
                <input type="text" name="website" value="" tabindex="-1" autocomplete="off" aria-hidden="true" class="sr-only absolute -left-[9999px] h-px w-px opacity-0">
                <button type="submit" class="btn-primary contact-form__submit" data-i18n="common.send">Enviar</button>
              </form>

          </div><!-- End Contact Form -->
        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
<?php require __DIR__ . '/includes/layout-end.php'; ?>
