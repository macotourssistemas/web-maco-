<header id="header" class="header">
  <div class="container-fluid container-xl d-flex align-items-center justify-content-between gap-4">
    <a href="<?= maco_h(maco_href('index')) ?>" class="logo d-flex align-items-center shrink-0">
      <span class="logo__frame">
        <img
          src="<?= maco_h('assets/img/logo-header.png?v=2') ?>"
          srcset="<?= maco_h('assets/img/logo-header.png?v=2') ?> 800w, <?= maco_h('assets/img/logo-transparent.png?v=2') ?> 1981w"
          sizes="(max-width: 640px) 200px, (max-width: 1024px) 260px, 300px"
          alt="Maco Tours"
          class="logo__wordmark"
          width="1981"
          height="794"
          decoding="async"
          fetchpriority="high"
        />
      </span>
    </a>

    <div class="flex items-center gap-3">
      <label class="lang-select-wrap hidden lg:block">
        <span class="sr-only" data-i18n="nav.language">Idioma</span>
        <select id="lang-select" class="lang-select" aria-label="Idioma"></select>
      </label>

      <nav id="navbar" class="navbar" data-i18n-aria="nav.mainNav" aria-label="Principal">
        <label class="lang-select-wrap mb-4 block w-full lg:hidden">
          <span class="mb-2 block text-sm font-medium text-white/70" data-i18n="nav.language">Idioma</span>
          <select id="lang-select-mobile" class="lang-select w-full"></select>
        </label>
        <ul>
          <li><a href="<?= maco_h(maco_href('index')) ?>" class="<?= trim(maco_nav_active('index')) ?>" data-i18n="nav.home">Inicio</a></li>
          <li><a href="<?= maco_h(maco_href('nosotros')) ?>" class="<?= trim(maco_nav_active('nosotros')) ?>" data-i18n="nav.about">Nosotros</a></li>
          <li><a href="<?= maco_h(maco_href('servicios')) ?>" class="<?= trim(maco_nav_active('servicios')) ?>" data-i18n="nav.services">Servicios</a></li>
          <li><a href="<?= maco_h(maco_href('contacto')) ?>" class="nav-cta<?= maco_nav_active('contacto') ?>" data-i18n="nav.contact">Contáctanos</a></li>
        </ul>
      </nav>

      <button type="button" id="mobile-nav-toggle" class="lg:!hidden" data-i18n-aria="nav.openMenu" aria-expanded="false">
        <i class="fa-solid fa-bars" id="nav-icon-open"></i>
        <i class="fa-solid fa-xmark hidden" id="nav-icon-close"></i>
      </button>
    </div>
  </div>
</header>
