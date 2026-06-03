<?php
declare(strict_types=1);
require __DIR__ . '/includes/bootstrap.php';
maco_page([
  'current_slug' => 'servicio_empresarial',
  'i18n_title' => 'titles.empresarial',
  'hero' => [
    'header_class' => 'page-header-corporate',
    'i18n_title' => 'pages.empresarial.title',
    'i18n_crumb' => 'pages.empresarial.breadcrumb',
    'i18n_intro' => 'pages.empresarial.intro',
  ],
]);
require __DIR__ . '/includes/layout-start.php';
?>
<main id="main"><!-- ======= Service Details Section ======= -->
    <section id="service-details" class="service-details">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4">

          <div class="col-lg-4">
            <h4 data-i18n="pages.empresarial.procedureTitle">Procedimiento de transporte empresarial</h4>
            <div class="services-list">
              <a href="#" class="active" data-i18n="pages.empresarial.step1">Consulta inicial</a>
              <a href="#" data-i18n="pages.empresarial.step2">Análisis y propuesta</a>
              <a href="#" data-i18n="pages.empresarial.step3">Negociación y acuerdo</a>
              <a href="#" data-i18n="pages.empresarial.step4">Firma del contrato</a>
              <a href="#" data-i18n="pages.empresarial.step5">Implementación del servicio</a>
              <a href="#" data-i18n="pages.empresarial.step6">Seguimiento y atención al cliente</a>
              <a href="#" data-i18n="pages.empresarial.step7">Evaluación y mejora continua</a>
            </div>
          </div>

          <div class="col-lg-8">
            <img src="assets/img/service-details.jpg" alt="" class="img-fluid services-img">
            <h3 data-i18n="pages.empresarial.processTitle">Proceso de transporte empresarial</h3>
            <p data-i18n="pages.empresarial.processIntro">
              En el proceso de transporte empresarial, nos encargamos de proporcionar soluciones de movilidad
              personalizadas para satisfacer las necesidades específicas de su empresa. Comenzamos con una consulta
              inicial para comprender sus requisitos y luego procedemos a:
            </p>
            <ul>
              <li><i class="fa-solid fa-circle-check text-brand-500"></i> <span data-i18n="pages.empresarial.processLi1">Realizar un análisis detallado de las opciones disponibles.</span></li>
              <li><i class="fa-solid fa-circle-check text-brand-500"></i> <span data-i18n="pages.empresarial.processLi2">Negociar los términos del contrato de manera transparente y justa.</span></li>
              <li><i class="fa-solid fa-circle-check text-brand-500"></i> <span data-i18n="pages.empresarial.processLi3">Firmar un contrato que establezca claramente las responsabilidades de ambas partes.</span></li>
              <li><i class="fa-solid fa-circle-check text-brand-500"></i> <span data-i18n="pages.empresarial.processLi4">Implementar el servicio de acuerdo con lo acordado.</span></li>
              <li><i class="fa-solid fa-circle-check text-brand-500"></i> <span data-i18n="pages.empresarial.processLi5">Brindar seguimiento y atención continua para garantizar su satisfacción.</span></li>
              <li><i class="fa-solid fa-circle-check text-brand-500"></i> <span data-i18n="pages.empresarial.processLi6">Evaluar regularmente el servicio y buscar oportunidades de mejora.</span></li>
            </ul>
            <p data-i18n="pages.empresarial.processOutro">
              Nuestro objetivo es proporcionarle un servicio de transporte empresarial confiable y eficiente que
              contribuya al éxito de su negocio. No dude en ponerse en contacto con nosotros para más información o para
              comenzar con el proceso de contratación.
            </p>
          </div>

        </div>

      </div>

      </div>
    </section><!-- End Service Details Section -->

  </main><!-- End #main -->
<?php require __DIR__ . '/includes/layout-end.php'; ?>
