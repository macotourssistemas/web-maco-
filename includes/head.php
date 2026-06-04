<head>
<?php require __DIR__ . '/gtm-head.php'; ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Maco Tours</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <link href="<?= maco_h('assets/img/Logo.png') ?>" rel="icon">
  <link href="<?= maco_h('assets/img/Logo.png') ?>" rel="apple-touch-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">
  <link href="<?= maco_h('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet">
  <link href="<?= maco_h('assets/vendor/glightbox/css/glightbox.min.css') ?>" rel="stylesheet">
  <link href="<?= maco_h('assets/vendor/swiper/swiper-bundle.min.css') ?>" rel="stylesheet">
  <link href="<?= maco_h('assets/vendor/aos/aos.css') ?>" rel="stylesheet">
<?php
  foreach (['assets/css/main.css', 'assets/css/tailwind.css'] as $cssFile):
      $cssVer = is_file(MACO_ROOT . '/' . $cssFile) ? '?v=' . filemtime(MACO_ROOT . '/' . $cssFile) : '';
  ?>
  <link href="<?= maco_h($cssFile . $cssVer) ?>" rel="stylesheet">
<?php endforeach; ?>
<?php $routesVer = is_file(MACO_ROOT . '/assets/js/routes.js') ? '?v=' . filemtime(MACO_ROOT . '/assets/js/routes.js') : ''; ?>
  <script src="<?= maco_h('assets/js/routes.js' . $routesVer) ?>"></script>
</head>
