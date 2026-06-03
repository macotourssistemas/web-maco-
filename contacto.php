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

        <div class="row gy-4 mt-4">

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
            <div class="container">
              <form id="contact-form" class="contact-form" action="api/contact.php" method="post" novalidate>
                <div id="contact-form-status" class="mb-4 hidden" role="status" aria-live="polite"></div>
                <div class="form-group">
                  <div class="form-row">
                    <div class="col">
                      <input type="text" name="name" class="form-control" autocomplete="name" data-i18n="pages.contacto.namePlaceholder" data-i18n-placeholder placeholder="Nombre completo" required>
                    </div>
                    <div class="col">
                      <input type="email" name="email" class="form-control" autocomplete="email" data-i18n="pages.contacto.emailPlaceholder" data-i18n-placeholder placeholder="Correo electrónico" required>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="10" autocomplete="off" data-i18n="pages.contacto.messagePlaceholder" data-i18n-placeholder placeholder="Mensaje" required></textarea>
                </div>
                <input type="text" name="website" value="" tabindex="-1" autocomplete="off" aria-hidden="true" class="sr-only" style="position:absolute;left:-9999px;width:1px;height:1px;opacity:0">
                <button type="submit" class="btn btn-lg btn-dark btn-block" data-i18n="common.send">Enviar</button>
              </form>
            </div>

          </div><!-- End Contact Form -->
        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
<?php require __DIR__ . '/includes/layout-end.php'; ?>
