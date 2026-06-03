# Convierte *.html de la raíz a *.php con includes centralizados
$root = "c:\xampp\htdocs\MacoTours"

$pageConfigs = @{
  'index.html' = @'
maco_page([
  'current_slug' => 'index',
  'i18n_title' => 'titles.index',
  'extra_scripts' => ['assets/js/client-logos.js'],
]);
'@
  'contacto.html' = @'
maco_page([
  'current_slug' => 'contacto',
  'i18n_title' => 'titles.contacto',
  'extra_scripts' => ['assets/js/contact-form.js'],
  'hero' => [
    'header_class' => 'page-header-contact',
    'i18n_title' => 'pages.contacto.title',
    'i18n_crumb' => 'pages.contacto.breadcrumb',
    'i18n_intro' => 'pages.contacto.intro',
  ],
]);
'@
  'nosotros.html' = @'
maco_page([
  'current_slug' => 'nosotros',
  'i18n_title' => 'titles.nosotros',
  'hero' => [
    'header_class' => 'page-header-about',
    'i18n_title' => 'pages.nosotros.title',
    'i18n_crumb' => 'pages.nosotros.breadcrumb',
  ],
]);
'@
  'servicios.html' = @'
maco_page([
  'current_slug' => 'servicios',
  'i18n_title' => 'titles.servicios',
  'hero' => [
    'header_class' => 'page-header-services',
    'i18n_title' => 'pages.servicios.title',
    'i18n_crumb' => 'pages.servicios.breadcrumb',
  ],
]);
'@
  'nuestro_equipo.html' = @'
maco_page([
  'current_slug' => 'nuestro_equipo',
  'i18n_title' => 'titles.equipo',
  'hero' => [
    'header_class' => 'page-header-team',
    'i18n_title' => 'pages.equipo.title',
    'i18n_crumb' => 'pages.equipo.breadcrumb',
  ],
]);
'@
  'servicio_empresarial.html' = @'
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
'@
  'servicio_escolar.html' = @'
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
'@
  'servicio_turistico.html' = @'
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
'@
  'politicas_Privacidad.html' = @'
maco_page([
  'current_slug' => 'politicas_Privacidad',
  'i18n_title' => 'titles.privacidad',
  'hero' => [
    'header_class' => 'page-header-privacy',
    'i18n_title' => 'pages.privacidad.pageHeader',
    'i18n_crumb' => 'pages.privacidad.breadcrumb',
  ],
]);
'@
}

function Get-PageBodyContent([string]$html) {
  $c = $html
  $c = $c -replace '(?s)^.*?<div id="layout-shell-top"></div>\s*', ''
  $c = $c -replace '(?s)\s*<div id="page-hero"[^>]*></div>\s*', ''
  $c = $c -replace '(?s)\s*<div id="layout-shell-bottom"></div>.*$', ''
  return $c.Trim()
}

foreach ($entry in $pageConfigs.GetEnumerator()) {
  $htmlName = $entry.Key
  $phpName = $htmlName -replace '\.html$', '.php'
  $htmlPath = Join-Path $root $htmlName
  if (-not (Test-Path $htmlPath)) {
    Write-Warning "Skip missing: $htmlName"
    continue
  }

  $html = Get-Content -Path $htmlPath -Raw -Encoding UTF8
  $body = Get-PageBodyContent $html

  if ($htmlName -eq 'index.html') {
    $body = $body -replace '<div id="faq-container"></div>', '<?php require __DIR__ . ''/includes/faq.php''; ?>'
  }

  $php = @"
<?php
declare(strict_types=1);
require __DIR__ . '/includes/bootstrap.php';
$($entry.Value)
require __DIR__ . '/includes/layout-start.php';
?>
$body
<?php require __DIR__ . '/includes/layout-end.php'; ?>

"@

  $phpPath = Join-Path $root $phpName
  [System.IO.File]::WriteAllText($phpPath, $php, [System.Text.UTF8Encoding]::new($false))
  Write-Host "Created: $phpName"
}

Write-Host "Conversion complete."
