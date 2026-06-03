<?php
declare(strict_types=1);
require __DIR__ . '/includes/bootstrap.php';
maco_page([
  'current_slug' => 'servicio_turistico',
  'i18n_title' => 'titles.turistico',
  'hero' => [
    'header_class' => 'page-header-tourism',
    'i18n_title' => 'pages.turistico.title',
    'i18n_crumb' => 'pages.turistico.breadcrumb',
    'i18n_intro' => 'pages.turistico.intro',
  ],
]);
require __DIR__ . '/includes/layout-start.php';
?>
<main id="main"><!-- ======= Service Details Section ======= -->
    <section id="service-details" class="service-details">
      <div class="container" data-aos="fade-up">
        <div class="row gy-4">
          <div class="col-lg-4">
            <h4 data-i18n="pages.turistico.procedureTitle">Procedimiento de transporte turístico</h4>
            <div class="services-list">
              <a href="#" class="active" data-i18n="pages.turistico.step1">Exploración inicial</a>
              <a href="#" data-i18n="pages.turistico.step2">Planificación y propuesta</a>
              <a href="#" data-i18n="pages.turistico.step3">Reserva y confirmación</a>
              <a href="#" data-i18n="pages.turistico.step4">Preparación del itinerario</a>
              <a href="#" data-i18n="pages.turistico.step5">Implementación del servicio</a>
              <a href="#" data-i18n="pages.turistico.step6">Seguimiento y atención al cliente</a>
              <a href="#" data-i18n="pages.turistico.step7">Evaluación y mejora continua</a>
            </div>
          </div>
          <div class="col-lg-8">
            <img src="assets/img/service-details.jpg" alt="" class="img-fluid services-img">
            <h3 data-i18n="pages.turistico.processTitle">Proceso de transporte turístico</h3>
            <p data-i18n="pages.turistico.processIntro">
              En el proceso de transporte turístico, nos dedicamos a ofrecer experiencias de viaje memorables para que
              pueda disfrutar al máximo de sus destinos favoritos. Comenzamos con una exploración inicial para entender
              sus intereses y luego procedemos a:
            </p>
            <ul>
              <li><i class="fa-solid fa-circle-check text-brand-500"></i> <span data-i18n="pages.turistico.processLi1">Planificar y proponer itinerarios personalizados que se ajusten a sus preferencias.</span></li>
              <li><i class="fa-solid fa-circle-check text-brand-500"></i> <span data-i18n="pages.turistico.processLi2">Gestionar las reservas y confirmaciones de manera eficiente para garantizar una experiencia sin contratiempos.</span></li>
              <li><i class="fa-solid fa-circle-check text-brand-500"></i> <span data-i18n="pages.turistico.processLi3">Preparar un itinerario detallado que incluya las actividades y lugares a visitar durante su viaje.</span></li>
              <li><i class="fa-solid fa-circle-check text-brand-500"></i> <span data-i18n="pages.turistico.processLi4">Implementar el servicio de acuerdo con lo planificado, asegurando su comodidad y seguridad en todo momento.</span></li>
              <li><i class="fa-solid fa-circle-check text-brand-500"></i> <span data-i18n="pages.turistico.processLi5">Brindar seguimiento y atención continua para asegurarnos de que su experiencia sea satisfactoria.</span></li>
              <li><i class="fa-solid fa-circle-check text-brand-500"></i> <span data-i18n="pages.turistico.processLi6">Evaluar regularmente nuestro servicio y buscar formas de mejorarlo para ofrecerle experiencias aún más enriquecedoras.</span></li>
            </ul>
            <p data-i18n="pages.turistico.processOutro">
              Nuestro objetivo es proporcionarle un transporte turístico de calidad que le permita explorar nuevos
              lugares y crear recuerdos inolvidables. No dude en ponerse en contacto con nosotros para obtener más
              información o para comenzar a planificar su próximo viaje.
            </p>
            <h4 data-i18n="pages.turistico.regsTitle">Normativas y requisitos para el transporte turístico</h4>
            <ul>
              <li data-i18n="pages.turistico.reg1">Licencia de tránsito y/o tarjeta de operación vigente.</li>
              <li data-i18n="pages.turistico.reg2">RNT - Registro Nacional de Turismo.</li>
              <li data-i18n="pages.turistico.reg3">Certificado de revisión técnico-mecánica y de gases vigente.</li>
              <li data-i18n="pages.turistico.reg4">Formato Único del Contrato (FUEC).</li>
              <li data-i18n="pages.turistico.reg5">Licencia de conducción para vehículo de servicio público en las categorías C1 o C2.</li>
              <li data-i18n="pages.turistico.reg6">Seguro Obligatorio de Accidentes de Tránsito (SOAT) vigente.</li>
              <li data-i18n="pages.turistico.reg7">Documento de identidad del conductor vinculado en el FUEC.</li>
              <li data-i18n="pages.turistico.reg8">Pólizas de responsabilidad civil extracontractual y contractual vigentes.</li>
            </ul>
          </div>
        </div>
      </div>
    </section><!-- End Service Details Section -->


  </main><!-- End #main -->
<?php require __DIR__ . '/includes/layout-end.php'; ?>
