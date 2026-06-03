<?php
declare(strict_types=1);
require __DIR__ . '/includes/bootstrap.php';
maco_page([
  'current_slug' => 'servicios',
  'i18n_title' => 'titles.servicios',
  'body_class' => 'page-servicios',
  'hero' => [
    'header_class' => 'page-header-services',
    'i18n_title' => 'pages.servicios.title',
    'i18n_crumb' => 'pages.servicios.breadcrumb',
    'i18n_intro' => 'pages.servicios.intro',
  ],
]);
require __DIR__ . '/includes/layout-start.php';
?>
<main id="main">

  <section id="service" class="section-services">
    <div class="container" data-aos="fade-up">
      <div class="section-header section-header--modern">
        <p class="section-eyebrow">Maco Tours</p>
        <h2 data-i18n="pages.servicios.sectionTitle">Nuestros servicios</h2>
      </div>

      <div class="maco-grid maco-grid--3">
        <article class="maco-service-card" data-aos="fade-up" data-aos-delay="100">
          <a href="<?= maco_h(maco_href('servicio_empresarial')) ?>" class="maco-service-card__media">
            <img src="assets/img/empresarial.jpg" alt="" width="800" height="600" loading="lazy" decoding="async">
            <span class="maco-service-card__tag">Empresarial</span>
          </a>
          <div class="maco-service-card__body">
            <h3><a href="<?= maco_h(maco_href('servicio_empresarial')) ?>" data-i18n="pages.servicios.card1Title">Transporte empresarial</a></h3>
            <p data-i18n="pages.servicios.card1Text">El transporte empresarial ofrece soluciones eficientes para las necesidades de movilidad de tu empresa.</p>
            <a href="<?= maco_h(maco_href('servicio_empresarial')) ?>" class="maco-feature-card__link mt-auto">
              <span data-i18n="common.readMore">Saber más</span>
              <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
            </a>
          </div>
        </article>

        <article class="maco-service-card" data-aos="fade-up" data-aos-delay="200">
          <a href="<?= maco_h(maco_href('servicio_escolar')) ?>" class="maco-service-card__media">
            <img src="assets/img/escolar_1.jpg" alt="" width="800" height="600" loading="lazy" decoding="async">
            <span class="maco-service-card__tag">Escolar</span>
          </a>
          <div class="maco-service-card__body">
            <h3><a href="<?= maco_h(maco_href('servicio_escolar')) ?>" data-i18n="pages.servicios.card2Title">Transporte escolar</a></h3>
            <p data-i18n="pages.servicios.card2Text">Nuestro servicio de transporte escolar está diseñado pensando en la seguridad y bienestar de los estudiantes.</p>
            <a href="<?= maco_h(maco_href('servicio_escolar')) ?>" class="maco-feature-card__link mt-auto">
              <span data-i18n="common.readMore">Saber más</span>
              <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
            </a>
          </div>
        </article>

        <article class="maco-service-card" data-aos="fade-up" data-aos-delay="300">
          <a href="<?= maco_h(maco_href('servicio_turistico')) ?>" class="maco-service-card__media">
            <img src="assets/img/turistico_1.jpg" alt="" width="800" height="600" loading="lazy" decoding="async">
            <span class="maco-service-card__tag">Turístico</span>
          </a>
          <div class="maco-service-card__body">
            <h3><a href="<?= maco_h(maco_href('servicio_turistico')) ?>" data-i18n="pages.servicios.card3Title">Transporte turístico</a></h3>
            <p data-i18n="pages.servicios.card3Text">Descubre los destinos más fascinantes con nuestro servicio de transporte turístico.</p>
            <a href="<?= maco_h(maco_href('servicio_turistico')) ?>" class="maco-feature-card__link mt-auto">
              <span data-i18n="common.readMore">Saber más</span>
              <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
            </a>
          </div>
        </article>
      </div>
    </div>
  </section>

  <section id="features" class="section-servicios-detail">
    <div class="container">
      <div class="section-header section-header--modern" data-aos="fade-up">
        <p class="section-eyebrow">Detalle</p>
        <h2 data-i18n="pages.servicios.whyTitle">¿Por qué elegirnos?</h2>
      </div>

      <article class="servicios-feature" data-aos="fade-up">
        <div class="servicios-feature__media">
          <img src="assets/img/empresarial_2.jpg" alt="" width="800" height="600" loading="lazy" decoding="async">
        </div>
        <div class="servicios-feature__copy">
          <h3 data-i18n="pages.servicios.feat1Title">Transporte empresarial: eficiencia para tu negocio</h3>
          <p data-i18n="pages.servicios.feat1Text">Nuestro servicio de transporte empresarial ofrece eficiencia y comodidad para tu empresa.</p>
          <a href="<?= maco_h(maco_href('servicio_empresarial')) ?>" class="maco-feature-card__link">
            <span data-i18n="common.readMore">Saber más</span>
            <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
          </a>
        </div>
      </article>

      <article class="servicios-feature servicios-feature--reverse" data-aos="fade-up">
        <div class="servicios-feature__media">
          <img src="assets/img/escolar_2.jpg" alt="" width="800" height="600" loading="lazy" decoding="async">
        </div>
        <div class="servicios-feature__copy">
          <h3 data-i18n="pages.servicios.feat2Title">Transporte escolar: tranquilidad para padres y estudiantes</h3>
          <p data-i18n="pages.servicios.feat2Text">Con nuestro servicio de transporte escolar, proporcionamos tranquilidad a los padres y seguridad a los estudiantes.</p>
          <a href="<?= maco_h(maco_href('servicio_escolar')) ?>" class="maco-feature-card__link">
            <span data-i18n="common.readMore">Saber más</span>
            <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
          </a>
        </div>
      </article>

      <article class="servicios-feature" data-aos="fade-up">
        <div class="servicios-feature__media">
          <img src="assets/img/turistico_2.jpg" alt="" width="800" height="600" loading="lazy" decoding="async">
        </div>
        <div class="servicios-feature__copy">
          <h3 data-i18n="pages.servicios.feat3Title">Transporte turístico: descubre y disfruta sin preocupaciones</h3>
          <p data-i18n="pages.servicios.feat3Text">Explora nuevos destinos y vive experiencias inolvidables con nuestro servicio de transporte turístico.</p>
          <a href="<?= maco_h(maco_href('servicio_turistico')) ?>" class="maco-feature-card__link">
            <span data-i18n="common.readMore">Saber más</span>
            <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
          </a>
        </div>
      </article>

      <div class="servicios-why" data-aos="fade-up">
        <p data-i18n="pages.servicios.whyText">Nuestros servicios de transporte están diseñados para ofrecerte beneficios tangibles en cada viaje.</p>
        <a href="<?= maco_h(maco_href('contacto')) ?>" class="btn-primary inline-flex mt-6" data-i18n="nav.contact">Contáctanos</a>
      </div>
    </div>
  </section>

  <section id="faq" class="section-faq">
    <div class="container" data-aos="fade-up">
      <div class="section-header section-header--modern">
        <p class="section-eyebrow">Ayuda</p>
        <h2 data-i18n="common.faqTitle">Preguntas frecuentes</h2>
      </div>
      <div class="faq-panel">
        <?php require __DIR__ . '/includes/faq.php'; ?>
      </div>
    </div>
  </section>

</main>
<?php require __DIR__ . '/includes/layout-end.php'; ?>
