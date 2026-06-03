<?php
declare(strict_types=1);
require __DIR__ . '/includes/bootstrap.php';
maco_page([
  'current_slug' => 'index',
  'i18n_title' => 'titles.index',
  'extra_scripts' => ['assets/js/client-logos.js'],
]);
require __DIR__ . '/includes/layout-start.php';
?>
<section id="hero" class="hero">
    <div class="hero__bg" aria-hidden="true"></div>
    <div class="hero__glow hero__glow--green" aria-hidden="true"></div>
    <div class="hero__glow hero__glow--blue" aria-hidden="true"></div>
    <div class="container relative z-10">
      <div class="hero__content max-w-3xl">
        <p class="hero__badge">
          <i class="fa-solid fa-shield-halved" aria-hidden="true"></i>
          <span data-i18n="pages.index.heroBadge">Más de 25 años en transporte especializado</span>
        </p>
        <h1 class="hero__title" data-i18n="pages.index.heroTitle">
          Movilidad segura en todo Colombia
        </h1>
        <p class="hero__lead" data-i18n="pages.index.heroText">
          Transporte empresarial, escolar y turístico con cobertura nacional, incluso en zonas de difícil acceso.
        </p>
        <div class="hero__actions">
          <a href="contacto" data-route="contacto" class="btn-primary hero__cta-primary" data-i18n="pages.index.heroCta">Solicitar cotización</a>
          <a href="servicios" data-route="servicios" class="hero__cta-secondary">
            <span data-i18n="pages.index.heroServices">Ver servicios</span>
            <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
          </a>
        </div>
      </div>
      <div class="hero__stats" data-aos="fade-up" data-aos-delay="200">
        <div class="hero__stat">
          <span class="hero__stat-value">25+</span>
          <span class="hero__stat-label">Años de experiencia</span>
        </div>
        <div class="hero__stat">
          <span class="hero__stat-value">100%</span>
          <span class="hero__stat-label">Cobertura nacional</span>
        </div>
        <div class="hero__stat">
          <span class="hero__stat-value">3</span>
          <span class="hero__stat-label">Líneas de servicio</span>
        </div>
      </div>
    </div>
  </section>

  <main id="main">

    <section id="featured-services" class="featured-services">
      <div class="container">
        <div class="maco-grid maco-grid--3">
          <article class="group maco-feature-card" data-aos="fade-up">
            <div class="maco-feature-card__icon">
              <i class="fa-solid fa-road" aria-hidden="true"></i>
            </div>
            <h3 class="maco-feature-card__title" data-i18n="pages.index.feat1Title">Experiencia y trayectoria</h3>
            <p class="maco-feature-card__text" data-i18n="pages.index.feat1Text">Más de 25 años liderando el transporte especial y superando desafíos logísticos con éxito.</p>
            <a href="nuestro_equipo" data-route="nuestro_equipo" class="maco-feature-card__link">
              <span data-i18n="common.readMore">Saber más</span>
              <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
            </a>
          </article>

          <article class="group maco-feature-card" data-aos="fade-up" data-aos-delay="80">
            <div class="maco-feature-card__icon maco-feature-card__icon--blue">
              <i class="fa-solid fa-user-shield" aria-hidden="true"></i>
            </div>
            <h3 class="maco-feature-card__title" data-i18n="pages.index.feat2Title">Personal altamente calificado</h3>
            <p class="maco-feature-card__text" data-i18n="pages.index.feat2Text">Profesionales altamente capacitados y comprometidos con su seguridad y eficiencia en cada viaje.</p>
            <a href="nuestro_equipo" data-route="nuestro_equipo" class="maco-feature-card__link">
              <span data-i18n="common.readMore">Saber más</span>
              <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
            </a>
          </article>

          <article class="group maco-feature-card" data-aos="fade-up" data-aos-delay="160">
            <div class="maco-feature-card__icon">
              <i class="fa-solid fa-route" aria-hidden="true"></i>
            </div>
            <h3 class="maco-feature-card__title" data-i18n="pages.index.feat3Title">Servicios adaptados y personalizados</h3>
            <p class="maco-feature-card__text" data-i18n="pages.index.feat3Text">Entendemos sus necesidades específicas y ofrecemos soluciones de transporte a medida.</p>
            <a href="nuestro_equipo" data-route="nuestro_equipo" class="maco-feature-card__link">
              <span data-i18n="common.readMore">Saber más</span>
              <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
            </a>
          </article>
        </div>
      </div>
    </section>

    <section id="about" class="about section-about">
      <div class="container" data-aos="fade-up">
        <div class="about__grid">
          <div class="about__media order-lg-last">
            <img src="assets/img/Antioquia06.jpeg" class="about__img" alt="Flota Maco Tours">
            <a href="https://youtu.be/odbA1Sz1sCE" class="glightbox about__play" aria-label="Ver video">
              <i class="fa-solid fa-play" aria-hidden="true"></i>
            </a>
          </div>
          <div class="about__copy">
            <p class="section-eyebrow">Maco Tours</p>
            <h2 class="about__heading" data-i18n="pages.index.aboutTitle">Nosotros</h2>
            <div class="about__prose" data-i18n-html="pages.index.aboutHtml">
              Somos la principal opción en transporte especial en Colombia. Nos especializamos en soluciones de movilidad a áreas de difícil acceso, brindando un servicio confiable y seguro en todo el territorio nacional.
              <br><br>
              Nuestro equipo comprometido y altamente calificado se enfoca en satisfacer las necesidades únicas de cada cliente, superando expectativas con seguridad y calidad excepcional.
              <br><br>
              ¡Únete a nosotros en el viaje hacia una experiencia de transporte superior!
            </div>
            <a href="nosotros" data-route="nosotros" class="maco-feature-card__link mt-6 inline-flex">
              <span>Conocer más</span>
              <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
            </a>
          </div>
        </div>
      </div>
    </section>

    <section id="service" class="services section-services">
      <div class="container" data-aos="fade-up">
        <div class="section-header section-header--modern">
          <p class="section-eyebrow">Servicios</p>
          <h2 data-i18n="pages.index.servicesTitle">Nuestros servicios</h2>
        </div>
        <div class="maco-grid maco-grid--3">
          <article class="group maco-service-card" data-aos="fade-up" data-aos-delay="100">
            <a href="servicio_empresarial" data-route="servicio_empresarial" class="maco-service-card__media">
              <img src="assets/img/Guajira05.jpeg" alt="">
              <span class="maco-service-card__tag">Empresarial</span>
            </a>
            <div class="maco-service-card__body">
              <h3><a href="servicio_empresarial" data-route="servicio_empresarial" data-i18n="pages.index.svc1Title">Transporte empresarial</a></h3>
              <p data-i18n="pages.index.svc1Text">Transporte de personal corporativo, turnos y directivos. Vehículos modernos y conductores responsables para su movilidad empresarial.</p>
            </div>
          </article>
          <article class="group maco-service-card" data-aos="fade-up" data-aos-delay="200">
            <a href="servicio_escolar" data-route="servicio_escolar" class="maco-service-card__media">
              <img src="assets/img/turistico_0.jpg" alt="">
              <span class="maco-service-card__tag">Escolar</span>
            </a>
            <div class="maco-service-card__body">
              <h3><a href="servicio_escolar" data-route="servicio_escolar" data-i18n="pages.index.svc2Title">Transporte escolar</a></h3>
              <p data-i18n="pages.index.svc2Text">Parque automotor moderno y seguro. Vehículos con tecnología y conductores capacitados para la tranquilidad de padres y estudiantes.</p>
            </div>
          </article>
          <article class="group maco-service-card" data-aos="fade-up" data-aos-delay="300">
            <a href="servicio_turistico" data-route="servicio_turistico" class="maco-service-card__media">
              <img src="assets/img/Antioquia14.jpeg" alt="">
              <span class="maco-service-card__tag">Turístico</span>
            </a>
            <div class="maco-service-card__body">
              <h3><a href="servicio_turistico" data-route="servicio_turistico" data-i18n="pages.index.svc3Title">Transporte turístico</a></h3>
              <p data-i18n="pages.index.svc3Text">Vehículos de última generación para viajes familiares y recreativos, con confort, seguridad y puntualidad.</p>
            </div>
          </article>
        </div>
      </div>
    </section>

    <section id="clientes" class="section-clients">
      <div class="container" data-aos="fade-up">
        <div class="section-header section-header--modern">
          <p class="section-eyebrow">Confianza</p>
          <h2 data-i18n="pages.index.clientsTitle">Nuestros clientes</h2>
          <p class="section-lead" data-i18n="pages.index.clientsText">Empresas que confían en Maco Tours en todo el país</p>
        </div>
        <div class="clients-panel">
          <div class="swiper clients-swiper">
            <div class="swiper-wrapper"></div>
            <div class="swiper-pagination"></div>
          </div>
        </div>
      </div>
    </section>

    <section id="call-to-action" class="call-to-action">
      <div class="container" data-aos="zoom-out">
        <div class="cta-panel">
          <h3 data-i18n="pages.index.ctaTitle">¿Listo para moverse con Maco Tours?</h3>
          <p data-i18n="pages.index.ctaText">Descubre cómo facilitamos tus desplazamientos con seguridad, confiabilidad y calidad en todo el territorio.</p>
          <a class="cta-btn" href="contacto" data-route="contacto" data-i18n="pages.index.ctaBtn">Contacta con nosotros</a>
        </div>
      </div>
    </section>

    <section id="features" class="features section-benefits">
      <div class="container" data-aos="fade-up">
        <div class="section-header section-header--modern">
          <p class="section-eyebrow">Ventajas</p>
          <h2 data-i18n="pages.index.benefitsTitle">Beneficios para nuestros clientes</h2>
        </div>
        <div class="benefits-grid">
          <article class="benefit-card" data-aos="fade-up">
            <div class="benefit-card__num">01</div>
            <h3 data-i18n="pages.index.ben1Title">Acceso a áreas de difícil acceso</h3>
            <p data-i18n="pages.index.ben1Text">Llegamos a zonas remotas con transporte confiable donde más se necesita.</p>
          </article>
          <article class="benefit-card benefit-card--accent" data-aos="fade-up" data-aos-delay="80">
            <div class="benefit-card__num">02</div>
            <h3 data-i18n="pages.index.ben2Title">Soluciones personalizadas</h3>
            <p data-i18n="pages.index.ben2Text">Adaptamos el servicio a sus requisitos para una experiencia única.</p>
          </article>
          <article class="benefit-card" data-aos="fade-up" data-aos-delay="160">
            <div class="benefit-card__num">03</div>
            <h3 data-i18n="pages.index.ben3Title">Seguridad y confiabilidad</h3>
            <p data-i18n="pages.index.ben3Text">Priorizamos la seguridad para que cada viaje sea puntual y sin contratiempos.</p>
          </article>
          <article class="benefit-card benefit-card--wide" data-aos="fade-up" data-aos-delay="240">
            <div class="benefit-card__num">04</div>
            <h3 data-i18n="pages.index.ben4Title">Excelencia en el servicio</h3>
            <p data-i18n="pages.index.ben4Text">Calidad que supera expectativas y garantiza satisfacción total.</p>
          </article>
        </div>
      </div>
    </section>

    <section id="faq" class="faq section-faq">
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
