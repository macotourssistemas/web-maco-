<?php
declare(strict_types=1);
require __DIR__ . '/includes/bootstrap.php';
maco_page([
  'current_slug' => 'nosotros',
  'i18n_title' => 'titles.nosotros',
  'hero' => [
    'header_class' => 'page-header-about',
    'i18n_title' => 'pages.nosotros.title',
    'i18n_crumb' => 'pages.nosotros.breadcrumb',
  ],
]);
require __DIR__ . '/includes/layout-start.php';
?>
<main id="main"><!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">
        <div class="row gy-4">
          <div class="col-lg-12 content order-last  order-lg-first">
            <h3 data-i18n="pages.nosotros.aboutTitle">Nosotros</h3>
            <p class="text-justify" data-i18n-html="pages.nosotros.aboutHtml">Transportes Especiales Maco Tours SAS, una empresa colombiana líder en el ámbito del transporte público.</p>
            <ul>
              <li data-aos="fade-up" data-aos-delay="100">
                <i class="fas fa-bullseye"></i>
                <div>
                  <h5 data-i18n="pages.nosotros.visionTitle">Visión:</h5>
                  <p class="text-justify" data-i18n="pages.nosotros.visionText">En Transportes Especiales Maco Tours SAS, aspiramos a ser la principal referencia en el ámbito del transporte público.</p>
                </div>
              </li>
              <li data-aos="fade-up" data-aos-delay="200">
                <i class="fas fa-lightbulb"></i>
                <div>
                  <h5 data-i18n="pages.nosotros.missionTitle">Misión:</h5>
                  <p class="text-justify" data-i18n="pages.nosotros.missionText">En el corazón de nuestra misión está el compromiso de proporcionar soluciones de transporte público que trasciendan las expectativas.</p>
                </div>
              </li>

              <li data-aos="fade-up" data-aos-delay="200">
                <i class="fas fa-thumbtack"></i>
                <div>
                  <h5 data-i18n="pages.nosotros.valuesTitle">Valores:</h5>
                  <div class="text-justify" data-i18n-html="pages.nosotros.valuesHtml"></div>
                </div>
              </li>

            </ul>
          </div>
          <div class="col-lg-12 position-relative align-self-start order-lg-last order-first">
            <img src="assets/img/Antioquia09.jpeg" class="img-fluid" alt="">
            <a href="https://www.youtube.com/watch?v=_HrO3JPrDRY&ab_channel=TransportesMacotours"
              class="glightbox play-btn"></a>
          </div>
        </div>
      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Stats Counter Section ======= -->
    <section id="stats-counter" class="stats-counter pt-0">
      <div class="container" data-aos="fade-up">


      </div>
    </section><!-- End Stats Counter Section -->

    <!-- ======= Certificaciones ======= -->
    <section id="certifications" class="team pt-0">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2 data-i18n="pages.nosotros.certTitle">Certificaciones que nos acreditan</h2>
        </div>

        <div class="cert-grid" data-aos="fade-up" data-aos-delay="100">
          <article class="member cert-card cursor-pointer transition hover:shadow-lg" data-modal-open="iso_modal_45001" role="button" tabindex="0">
            <img src="assets/img/team/iso45001.png" class="cert-card__thumb" width="143" height="243" alt="ISO 45001">
            <div class="member-content">
              <h4 data-i18n="pages.nosotros.certified">Certificado</h4>
              <span>ISO 45001</span>
              <p class="text-justify" data-i18n="pages.nosotros.iso45001Text">Sistema de gestión de seguridad y salud en el trabajo.</p>
            </div>
          </article>

          <article class="member cert-card cursor-pointer transition hover:shadow-lg" data-modal-open="iso_modal_14001" role="button" tabindex="0">
            <img src="assets/img/team/iso14001.png" class="cert-card__thumb" width="144" height="236" alt="ISO 14001">
            <div class="member-content">
              <h4 data-i18n="pages.nosotros.certified">Certificado</h4>
              <span>ISO 14001</span>
              <p class="text-justify" data-i18n="pages.nosotros.iso14001Text">Sistema de gestión ambiental.</p>
            </div>
          </article>

          <article class="member cert-card cursor-pointer transition hover:shadow-lg" data-modal-open="iso_modal_9001" role="button" tabindex="0">
            <img src="assets/img/team/iso9001.png" class="cert-card__thumb" width="142" height="231" alt="ISO 9001">
            <div class="member-content">
              <h4 data-i18n="pages.nosotros.certified">Certificado</h4>
              <span>ISO 9001</span>
              <p class="text-justify" data-i18n="pages.nosotros.iso9001Text">Sistema de gestión de calidad.</p>
            </div>
          </article>
        </div>
      </div>
    </section>




    <!-- ======= Documentos ======= -->
    <section id="documents" class="team pt-0">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2 data-i18n="pages.nosotros.docsTitle">Habilitación</h2>
        </div>

        <div class="cert-grid" data-aos="fade-up" data-aos-delay="100">
          <article class="member">
            <img src="assets/img/pdf.png" alt="" class="pdf-image" width="120" height="120" data-pdf="documentos/HABILITACION.pdf">
            <div class="member-content">
              <h4 data-i18n="pages.nosotros.docHabilitacion">Habilitación</h4>
              <span data-i18n="pages.nosotros.ministry">Ministerio de Transporte</span>
              <span class="text-brand-600 underline" data-i18n="pages.nosotros.clickHere">Clic aquí</span>
            </div>
          </article>

          <article class="member">
            <img src="assets/img/pdf.png" alt="" class="pdf-image" width="120" height="120" data-pdf="documentos/REHABILITACION.pdf">
            <div class="member-content">
              <h4 data-i18n="pages.nosotros.docRehabilitacion">Rehabilitación</h4>
              <span data-i18n="pages.nosotros.ministry">Ministerio de Transporte</span>
              <span class="text-brand-600 underline" data-i18n="pages.nosotros.clickHere">Clic aquí</span>
            </div>
          </article>

          <article class="member">
            <img src="assets/img/pdf.png" alt="" class="pdf-image" width="120" height="120" data-pdf="documentos/CARTA.pdf">
            <div class="member-content">
              <h4 data-i18n="pages.nosotros.docPesv">Plan estratégico de seguridad vial</h4>
              <span data-i18n="pages.nosotros.ministry">Ministerio de Transporte</span>
              <span class="text-brand-600 underline" data-i18n="pages.nosotros.clickHere">Clic aquí</span>
            </div>
          </article>
        </div>
      </div>
    </section>



        <section id="faq" class="faq">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2 data-i18n="common.faqTitle">Preguntas frecuentes</h2>
        </div>
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <?php require __DIR__ . '/includes/faq.php'; ?>
          </div>
        </div>
      </div>
    </section><!-- End Frequently Asked Questions Section -->

  </main><!-- End #main -->

  <!-- Modales ISO (fuera del grid para no romper el layout) -->
  <div id="iso_modal_45001" class="modal-backdrop">
    <div class="modal-panel" role="dialog" aria-labelledby="iso_modal_45001Label">
      <div class="modal-header">
        <h5 class="text-lg font-bold text-brand-900" id="iso_modal_45001Label">Certificación ISO 45001</h5>
        <button type="button" data-modal-close aria-label="Cerrar" class="text-2xl leading-none text-slate-400 hover:text-slate-700">&times;</button>
      </div>
      <div class="modal-body">
        <img src="assets/img/imagen_iso_45001.png" width="612" height="791" alt="Certificación ISO 45001">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-modal-close>Cerrar</button>
      </div>
    </div>
  </div>

  <div id="iso_modal_14001" class="modal-backdrop">
    <div class="modal-panel" role="dialog" aria-labelledby="iso_modal_14001Label">
      <div class="modal-header">
        <h5 class="text-lg font-bold text-brand-900" id="iso_modal_14001Label">Certificación ISO 14001</h5>
        <button type="button" data-modal-close aria-label="Cerrar" class="text-2xl leading-none text-slate-400 hover:text-slate-700">&times;</button>
      </div>
      <div class="modal-body">
        <img src="assets/img/imagen_iso_140001.png" width="612" height="791" alt="Certificación ISO 14001">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-modal-close>Cerrar</button>
      </div>
    </div>
  </div>

  <div id="iso_modal_9001" class="modal-backdrop">
    <div class="modal-panel" role="dialog" aria-labelledby="iso_modal_9001Label">
      <div class="modal-header">
        <h5 class="text-lg font-bold text-brand-900" id="iso_modal_9001Label">Certificación ISO 9001</h5>
        <button type="button" data-modal-close aria-label="Cerrar" class="text-2xl leading-none text-slate-400 hover:text-slate-700">&times;</button>
      </div>
      <div class="modal-body">
        <img src="assets/img/imagen_iso_9001.png" width="612" height="791" alt="Certificación ISO 9001">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-modal-close>Cerrar</button>
      </div>
    </div>
  </div>
<script>
  document.querySelectorAll('.pdf-image').forEach(function (img) {
    img.addEventListener('click', function () {
      window.open(this.getAttribute('data-pdf'), '_blank');
    });
  });
</script>
<?php require __DIR__ . '/includes/layout-end.php'; ?>
