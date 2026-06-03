<?php
declare(strict_types=1);
require __DIR__ . '/includes/bootstrap.php';
maco_page([
  'current_slug' => 'politicas_Privacidad',
  'i18n_title' => 'titles.privacidad',
  'body_class' => 'page-privacy',
  'hero' => [
    'header_class' => 'page-header-privacy',
    'i18n_title' => 'pages.privacidad.pageHeader',
    'i18n_crumb' => 'pages.privacidad.breadcrumb',
    'i18n_intro' => 'pages.privacidad.introHero',
  ],
]);
require __DIR__ . '/includes/layout-start.php';
?>
<main id="main">
  <section class="section-privacy">
    <div class="container" data-aos="fade-up">
      <article class="legal-document">
        <p class="legal-document__meta" data-i18n="pages.privacidad.lastUpdate">Última actualización: junio de 2026</p>
        <p class="legal-document__intro" data-i18n="pages.privacidad.intro"></p>

        <section class="legal-document__section">
          <h2 data-i18n="pages.privacidad.responsibleTitle">1. Responsable del tratamiento</h2>
          <p data-i18n-html="pages.privacidad.responsibleText"></p>
        </section>

        <section class="legal-document__section">
          <h2 data-i18n="pages.privacidad.scopeTitle">2. Ámbito de aplicación</h2>
          <p data-i18n="pages.privacidad.scopeText"></p>
        </section>

        <section class="legal-document__section">
          <h2 data-i18n="pages.privacidad.legalTitle">3. Marco normativo</h2>
          <p data-i18n-html="pages.privacidad.legalText"></p>
        </section>

        <section class="legal-document__section">
          <h2 data-i18n="pages.privacidad.collectTitle">4. Datos que recopilamos</h2>
          <p data-i18n="pages.privacidad.collectIntro"></p>
          <ul class="legal-document__list">
            <li data-i18n="pages.privacidad.collect1"></li>
            <li data-i18n="pages.privacidad.collect2"></li>
            <li data-i18n="pages.privacidad.collect3"></li>
            <li data-i18n="pages.privacidad.collect4"></li>
            <li data-i18n="pages.privacidad.collect5"></li>
            <li data-i18n="pages.privacidad.collect6"></li>
          </ul>
        </section>

        <section class="legal-document__section" id="cookies">
          <h2 data-i18n="pages.privacidad.cookiesTitle">5. Cookies y tecnologías similares</h2>
          <p data-i18n="pages.privacidad.cookiesIntro"></p>
          <ul class="legal-document__list">
            <li data-i18n="pages.privacidad.cookies1"></li>
            <li data-i18n="pages.privacidad.cookies2"></li>
            <li data-i18n="pages.privacidad.cookies3"></li>
            <li data-i18n="pages.privacidad.cookies4"></li>
          </ul>
          <p data-i18n="pages.privacidad.cookiesManage"></p>
        </section>

        <section class="legal-document__section" id="analytics">
          <h2 data-i18n="pages.privacidad.analyticsTitle">6. Google Analytics y medición web</h2>
          <p data-i18n-html="pages.privacidad.analyticsText"></p>
        </section>

        <section class="legal-document__section">
          <h2 data-i18n="pages.privacidad.purposesTitle">7. Finalidades del tratamiento</h2>
          <p data-i18n="pages.privacidad.purposesIntro"></p>
          <ul class="legal-document__list">
            <li data-i18n="pages.privacidad.purpose1"></li>
            <li data-i18n="pages.privacidad.purpose2"></li>
            <li data-i18n="pages.privacidad.purpose3"></li>
            <li data-i18n="pages.privacidad.purpose4"></li>
            <li data-i18n="pages.privacidad.purpose5"></li>
            <li data-i18n="pages.privacidad.purpose6"></li>
          </ul>
        </section>

        <section class="legal-document__section">
          <h2 data-i18n="pages.privacidad.legalBasisTitle">8. Base legal y autorización</h2>
          <p data-i18n="pages.privacidad.legalBasisText"></p>
        </section>

        <section class="legal-document__section">
          <h2 data-i18n="pages.privacidad.rightsTitle">9. Derechos de los titulares</h2>
          <p data-i18n="pages.privacidad.rightsIntro"></p>
          <ul class="legal-document__list">
            <li data-i18n="pages.privacidad.right1"></li>
            <li data-i18n="pages.privacidad.right2"></li>
            <li data-i18n="pages.privacidad.right3"></li>
            <li data-i18n="pages.privacidad.right4"></li>
            <li data-i18n="pages.privacidad.right5"></li>
            <li data-i18n="pages.privacidad.right6"></li>
            <li data-i18n="pages.privacidad.right7"></li>
          </ul>
          <p data-i18n-html="pages.privacidad.rightsHow"></p>
        </section>

        <section class="legal-document__section">
          <h2 data-i18n="pages.privacidad.transferTitle">10. Transferencia y encargados</h2>
          <p data-i18n-html="pages.privacidad.transferText"></p>
        </section>

        <section class="legal-document__section">
          <h2 data-i18n="pages.privacidad.retentionTitle">11. Conservación de los datos</h2>
          <p data-i18n="pages.privacidad.retentionText"></p>
        </section>

        <section class="legal-document__section">
          <h2 data-i18n="pages.privacidad.securityTitle">12. Seguridad de la información</h2>
          <p data-i18n="pages.privacidad.securityText"></p>
        </section>

        <section class="legal-document__section">
          <h2 data-i18n="pages.privacidad.thirdTitle">13. Enlaces a terceros</h2>
          <p data-i18n="pages.privacidad.thirdText"></p>
        </section>

        <section class="legal-document__section">
          <h2 data-i18n="pages.privacidad.changesTitle">14. Cambios a esta política</h2>
          <p data-i18n="pages.privacidad.changesText"></p>
        </section>

        <section class="legal-document__section">
          <h2 data-i18n="pages.privacidad.contactTitle">15. Contacto y consultas</h2>
          <p data-i18n-html="pages.privacidad.contactText"></p>
        </section>
      </article>
    </div>
  </section>
</main>
<?php require __DIR__ . '/includes/layout-end.php'; ?>
