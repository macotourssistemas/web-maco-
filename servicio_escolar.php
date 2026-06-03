<?php
declare(strict_types=1);
require __DIR__ . '/includes/bootstrap.php';
maco_page([
  'current_slug' => 'servicio_escolar',
  'i18n_title' => 'titles.escolar',
  'hero' => [
    'header_class' => 'page-header-school',
    'i18n_title' => 'pages.escolar.title',
    'i18n_crumb' => 'pages.escolar.breadcrumb',
    'i18n_intro' => 'pages.escolar.intro',
  ],
]);
require __DIR__ . '/includes/layout-start.php';
?>
<main id="main"><!-- ======= Service Details Section ======= -->
    <section id="service-details" class="service-details">
      <div class="container" data-aos="fade-up">
        <div class="row gy-4">
          <div class="col-lg-4">
            <h4 data-i18n="pages.escolar.procedureTitle">Procedimiento de transporte escolar</h4>
            <div class="services-list">
              <a href="#" class="active" data-i18n="pages.escolar.step1">Consulta inicial</a>
              <a href="#" data-i18n="pages.escolar.step2">Análisis de rutas y horarios</a>
              <a href="#" data-i18n="pages.escolar.step3">Acuerdo de servicios y tarifas</a>
              <a href="#" data-i18n="pages.escolar.step4">Firma del contrato y documentos requeridos</a>
              <a href="#" data-i18n="pages.escolar.step5">Implementación del servicio</a>
              <a href="#" data-i18n="pages.escolar.step6">Comunicación y seguimiento con padres y colegio</a>
              <a href="#" data-i18n="pages.escolar.step7">Evaluación continua del servicio</a>
            </div>
          </div>
          <div class="col-lg-8">
            <img src="assets/img/service-school.jpg" alt="" class="img-fluid services-img">
            <h3 data-i18n="pages.escolar.processTitle">Proceso de transporte escolar</h3>
            <p data-i18n="pages.escolar.processIntro">
              En nuestro servicio de transporte escolar, nos comprometemos a proporcionar un entorno seguro y confiable
              para los estudiantes en su viaje hacia y desde la escuela. Nuestro proceso incluye los siguientes pasos:
            </p>
            <ul>
              <li><i class="fa-solid fa-circle-check text-brand-500"></i> <span data-i18n="pages.escolar.processLi1">Realizamos una consulta inicial para entender las necesidades específicas de su institución educativa.</span></li>
              <li><i class="fa-solid fa-circle-check text-brand-500"></i> <span data-i18n="pages.escolar.processLi2">Llevamos a cabo un análisis detallado de las rutas y horarios más adecuados para los estudiantes.</span></li>
              <li><i class="fa-solid fa-circle-check text-brand-500"></i> <span data-i18n="pages.escolar.processLi3">Acordamos los servicios y tarifas que mejor se adapten a sus requerimientos y presupuesto.</span></li>
              <li><i class="fa-solid fa-circle-check text-brand-500"></i> <span data-i18n="pages.escolar.processLi4">Firmamos el contrato y completamos los documentos requeridos para formalizar el servicio.</span></li>
              <li><i class="fa-solid fa-circle-check text-brand-500"></i> <span data-i18n="pages.escolar.processLi5">Implementamos el servicio de acuerdo con los términos acordados, asegurando puntualidad y seguridad en cada trayecto.</span></li>
              <li><i class="fa-solid fa-circle-check text-brand-500"></i> <span data-i18n="pages.escolar.processLi6">Mantenemos una comunicación abierta y constante con los padres y la institución educativa.</span></li>
              <li><i class="fa-solid fa-circle-check text-brand-500"></i> <span data-i18n="pages.escolar.processLi7">Evaluamos continuamente nuestro servicio para identificar áreas de mejora y asegurar los más altos estándares de calidad y seguridad.</span></li>
            </ul>
            <p data-i18n="pages.escolar.processOutro">
              Nuestro objetivo es proporcionar un servicio de transporte escolar confiable y de calidad que brinde
              tranquilidad a los padres y garantice la puntualidad y seguridad de los estudiantes en su trayecto hacia
              la escuela.
            </p>
            <h4 data-i18n="pages.escolar.regsTitle">Normativas y obligaciones para el transporte escolar</h4>
            <ol>
              <li data-i18n="pages.escolar.reg1">Contratos para transporte de estudiantes.</li>
              <li data-i18n="pages.escolar.reg2">Condiciones técnicas y operativas en la prestación del servicio.</li>
              <li data-i18n="pages.escolar.reg3">Obligaciones de los establecimientos educativos.</li>
              <li data-i18n="pages.escolar.reg4">Obligaciones del Ministerio de Educación y Secretarías de Educación.</li>
              <li data-i18n="pages.escolar.reg5">Registrar los vehículos ante la autoridad de tránsito de la jurisdicción donde preste el servicio.</li>
              <li data-i18n="pages.escolar.reg6">Cumplir con los distintivos y requisitos especiales establecidos en el Decreto 1079 de 2015.</li>
              <li data-i18n="pages.escolar.reg7">Contar con póliza de seguros de responsabilidad civil contractual y extracontractual vigentes.</li>
              <li data-i18n="pages.escolar.reg8">Mantener los vehículos en óptimas condiciones mecánicas y de seguridad.</li>
            </ol>
          </div>
        </div>
      </div>
    </section><!-- End Service Details Section -->



  </main><!-- End #main -->
<?php require __DIR__ . '/includes/layout-end.php'; ?>
