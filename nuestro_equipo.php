<?php
declare(strict_types=1);
require __DIR__ . '/includes/bootstrap.php';
maco_page([
  'current_slug' => 'nuestro_equipo',
  'i18n_title' => 'titles.equipo',
  'hero' => [
    'header_class' => 'page-header-team',
    'i18n_title' => 'pages.equipo.title',
    'i18n_crumb' => 'pages.equipo.breadcrumb',
  ],
]);
require __DIR__ . '/includes/layout-start.php';
?>
<main id="main"><!-- ======= Services Section ======= -->
    <section id="service" class="services pt-0">
      <div class="container" data-aos="fade-up">

        <div class="section-header">

          <p class="description text-justify" data-i18n="pages.equipo.intro">En Transportes Especiales Macotours, creemos firmemente en
            la importancia de cultivar una cultura
            organizacional basada en valores sólidos que guíen nuestras acciones y decisiones diarias. Nuestro equipo
            multidisciplinario, compuesto por talentosos profesionales administrativos y operativos, así como dedicados
            conductores, comparten y promueven los siguientes valores fundamentales:</p>
        </div>
      </div>
    </section><!-- End Services Section -->

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
      <div class="container">

        <!-- Transporte Empresarial -->
        <div class="row gy-4 align-items-center features-item" data-aos="fade-up">
          <div class="col-md-5 order-1 order-md-2">
            <img src="assets/img/equipo_0.jpg" class="img-fluid" alt="Transporte Empresarial">
          </div>
          <div class="col-md-7 order-2 order-md-1">
            <h3 data-i18n="pages.equipo.profTitle">Profesionalismo</h3>
            <p class="text-justify" data-i18n="pages.equipo.profText"> En Transportes Especiales Macotours, entendemos que el profesionalismo va
              más allá de simplemente cumplir con nuestras tareas asignadas. Significa mantener altos estándares de
              conducta en todo lo que hacemos, desde cómo nos comunicamos con los clientes hasta cómo tratamos a
              nuestros compañeros de equipo. Nos esforzamos por ser modelos a seguir en nuestra industria, demostrando
              un compromiso inquebrantable con la excelencia en cada aspecto de nuestro trabajo.
            </p>
          </div>
        </div><!-- Features Item -->

        <!-- Transporte Escolar -->
        <div class="row gy-4 align-items-center features-item" data-aos="fade-up">
          <div class="col-md-5">
            <img src="assets/img/equipo_1.jpg" class="img-fluid" alt="Transporte Escolar">
          </div>
          <div class="col-md-7">
            <h3 data-i18n="pages.equipo.collabTitle">Colaboración</h3>
            <p class="text-justify" data-i18n="pages.equipo.collabText">En Transportes Especiales Macotours, entendemos que los mejores resultados
              surgen cuando trabajamos juntos como un equipo unificado. Fomentamos una cultura de colaboración donde
              cada voz es escuchada y cada contribución es valorada. Creemos en el poder de la diversidad de pensamiento
              y experiencias, y nos esforzamos por crear un entorno donde todos se sientan inspirados a compartir ideas
              y trabajar juntos hacia metas comunes.</p>
          </div>
        </div><!-- Features Item -->

        <!-- Transporte Turístico -->
        <div class="row gy-4 align-items-center features-item" data-aos="fade-up">
          <div class="col-md-5 order-1 order-md-2">
            <img src="assets/img/equipo_2.jpg" class="img-fluid" alt="Transporte Turístico">
          </div>
          <div class="col-md-7 order-2 order-md-1">
            <h3 data-i18n="pages.equipo.safetyTitle">Seguridad</h3>
            <p data-i18n="pages.equipo.safetyText">En Transportes Especiales Macotours, la seguridad es más que una prioridad: es un compromiso
              inquebrantable. Nos tomamos muy en serio la responsabilidad de transportar a nuestros pasajeros de manera
              segura y confiable. Por eso, nos aseguramos de que nuestros conductores estén capacitados y certificados,
              nuestros vehículos estén bien mantenidos y nuestras operaciones cumplan con los más rigurosos estándares
              de seguridad. Estamos comprometidos a hacer todo lo posible para garantizar que cada viaje con nosotros
              sea seguro y sin incidentes.</p>
          </div>
        </div><!-- Features Item -->



        <!-- Transporte Escolar -->
        <div class="row gy-4 align-items-center features-item" data-aos="fade-up">
          <div class="col-md-5">
            <img src="assets/img/equipo_3.jpg" class="img-fluid" alt="Transporte Escolar">
          </div>
          <div class="col-md-7">
            <h3 data-i18n="pages.equipo.clientTitle">Compromiso con el Cliente</h3>
            <p class="text-justify" data-i18n="pages.equipo.clientText">En Transportes Especiales Macotours, entendemos que nuestros clientes son la
              piedra angular de nuestro negocio. Por eso, nos comprometemos a superar constantemente sus expectativas,
              brindando un servicio excepcional que no solo cumpla, sino que supere sus necesidades y deseos. Nos
              esforzamos por crear experiencias de transporte memorables y personalizadas para cada cliente,
              construyendo relaciones sólidas y duraderas basadas en la confianza y la satisfacción.</p>
          </div>
        </div><!-- Features Item -->

        <!-- Transporte Turístico -->
        <div class="row gy-4 align-items-center features-item" data-aos="fade-up">
          <div class="col-md-5 order-1 order-md-2">
            <img src="assets/img/equipo_4.jpg" class="img-fluid" alt="Transporte Turístico">
          </div>
          <div class="col-md-7 order-2 order-md-1">
            <h3 data-i18n="pages.equipo.innovTitle">Innovación</h3>
            <p class="text-justify" data-i18n="pages.equipo.innovText">En Transportes Especiales Macotours, creemos que la innovación es la clave
              para mantenernos a la vanguardia en nuestra industria en constante evolución. Nos comprometemos a buscar
              constantemente nuevas formas de mejorar y optimizar nuestras operaciones, desde la implementación de
              tecnologías de vanguardia hasta la exploración de nuevas estrategias y enfoques. Fomentamos un ambiente
              donde la creatividad y la innovación son bienvenidas y recompensadas, animando a todos los miembros del
              equipo a pensar de manera creativa y a proponer nuevas ideas para mejorar nuestro servici</p>
          </div>
        </div><!-- Features Item -->



        <!-- Transporte Escolar -->
        <div class="row gy-4 align-items-center features-item" data-aos="fade-up">
          <div class="col-md-5">
            <img src="assets/img/equipo-10.jpg" class="img-fluid" alt="Transporte Escolar">
          </div>
          <div class="col-md-7">
            <h3 data-i18n="pages.equipo.respectTitle">Respeto y Diversidad</h3>
            <p class="text-justify" data-i18n="pages.equipo.respectText">En Transportes Especiales Macotours, creemos que la diversidad es nuestra
              fortaleza. Valoramos y respetamos las diferencias individuales de nuestros empleados y clientes,
              reconociendo que cada persona aporta una perspectiva única y valiosa a nuestro equipo. Nos comprometemos a
              crear un entorno inclusivo donde todas las personas se sientan bienvenidas, respetadas y valoradas por
              quienes son. Promovemos el respeto mutuo y la tolerancia, celebrando la diversidad en todas sus formas y
              trabajando juntos para construir un mundo más inclusivo y equitativo.</p>
          </div>
        </div><!-- Features Item -->




    <!-- ======= Frequently Asked Questions Section ======= -->
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
<?php require __DIR__ . '/includes/layout-end.php'; ?>
