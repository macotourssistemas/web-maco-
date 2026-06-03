<?php
/** @var array<string, mixed> $macoPage */
$hero = $macoPage['hero'] ?? [];
$headerClass = maco_h($hero['header_class'] ?? '');
$titleKey = maco_h($hero['i18n_title'] ?? '');
$crumbKey = maco_h($hero['i18n_crumb'] ?? '');
$introKey = $hero['i18n_intro'] ?? null;
?>
<div class="breadcrumbs">
  <div class="page-header d-flex align-items-center <?= $headerClass ?>">
    <div class="container position-relative">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-6 text-center">
          <h2 data-i18n="<?= $titleKey ?>"></h2>
          <?php if ($introKey): ?>
          <p class="text-justify" data-i18n="<?= maco_h($introKey) ?>"></p>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <nav>
    <div class="container">
      <ol>
        <li><a href="<?= maco_h(maco_href('index')) ?>" data-i18n="common.home">Inicio</a></li>
        <li data-i18n="<?= $crumbKey ?>"></li>
      </ol>
    </div>
  </nav>
</div>
