# Reduce HTML duplicado: cabecera, scripts y breadcrumbs → layout compartido
$root = "c:\xampp\htdocs\MacoTours"
$minimalHead = @'
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Maco Tours</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <script src="assets/js/routes.js"></script>
  <script src="assets/js/layout-head.js"></script>
</head>
'@

$layoutFoot = '  <script src="assets/js/layout-foot.js"></script>'

$heroMap = @{
  'contacto.html' = @{
    headerClass = 'page-header-contact'
    title = 'pages.contacto.title'
    intro = 'pages.contacto.intro'
    crumb = 'pages.contacto.breadcrumb'
  }
  'nosotros.html' = @{
    headerClass = 'page-header-about'
    title = 'pages.nosotros.title'
    intro = $null
    crumb = 'pages.nosotros.breadcrumb'
  }
  'servicios.html' = @{
    headerClass = 'page-header-services'
    title = 'pages.servicios.title'
    intro = $null
    crumb = 'pages.servicios.breadcrumb'
  }
  'nuestro_equipo.html' = @{
    headerClass = 'page-header-team'
    title = 'pages.equipo.title'
    intro = $null
    crumb = 'pages.equipo.breadcrumb'
  }
  'servicio_empresarial.html' = @{
    headerClass = 'page-header-corporate'
    title = 'pages.empresarial.title'
    intro = 'pages.empresarial.intro'
    crumb = 'pages.empresarial.breadcrumb'
  }
  'servicio_escolar.html' = @{
    headerClass = 'page-header-school'
    title = 'pages.escolar.title'
    intro = 'pages.escolar.intro'
    crumb = 'pages.escolar.breadcrumb'
  }
  'servicio_turistico.html' = @{
    headerClass = 'page-header-tourism'
    title = 'pages.turistico.title'
    intro = 'pages.turistico.intro'
    crumb = 'pages.turistico.breadcrumb'
  }
  'politicas_Privacidad.html' = @{
    headerClass = 'page-header-privacy'
    title = 'pages.privacidad.pageHeader'
    intro = $null
    crumb = 'pages.privacidad.breadcrumb'
  }
}

function Get-PageHeroMarkup($cfg) {
  $attrs = "data-header-class=`"$($cfg.headerClass)`" data-i18n-title=`"$($cfg.title)`" data-i18n-crumb=`"$($cfg.crumb)`""
  if ($cfg.intro) { $attrs += " data-i18n-intro=`"$($cfg.intro)`"" }
  return "    <div id=`"page-hero`" $attrs></div>"
}

Get-ChildItem -Path $root -Filter "*.html" -File | ForEach-Object {
  $name = $_.Name
  $content = Get-Content -Path $_.FullName -Raw -Encoding UTF8
  $original = $content

  # Cabecera común
  $content = $content -replace '(?s)<head>.*?</head>', $minimalHead

  # Quitar fuentes Open Sans / Poppins legacy
  $content = $content -replace '(?s)<link[^>]*Open\+Sans[^>]*>\s*', ''

  # Shell superior e inferior
  $content = $content -replace '(?s)\s*<div id="whatsapp-container"></div>\s*<!--.*?Header.*?-->\s*<div id="header-container"></div>\s*<!--.*?End Header.*?-->\s*', "`n  <div id=`"layout-shell-top`"></div>`n`n"
  $content = $content -replace '(?s)\s*<div id="whatsapp-container"></div>\s*<div id="header-container"></div>\s*', "`n  <div id=`"layout-shell-top`"></div>`n`n"

  # Breadcrumbs → page-hero
  if ($heroMap.ContainsKey($name)) {
    $hero = Get-PageHeroMarkup $heroMap[$name]
    $content = $content -replace '(?s)\s*<!-- =+ Breadcrumbs =+ -->.*?</div><!-- End Breadcrumbs -->\s*', "`n$hero`n`n"
    $content = $content -replace '(?s)\s*<div class="breadcrumbs">.*?</div><!-- End Breadcrumbs -->\s*', "`n$hero`n`n"
    $content = $content -replace '(?s)\s*<div class="breadcrumbs">.*?</div>\s*(?=<section)', "`n$hero`n`n"
  }

  # Pie común
  $content = $content -replace '(?s)\s*<!-- =+ Footer =+ -->.*?</a>\s*', "`n  <div id=`"layout-shell-bottom`"></div>`n`n"
  $content = $content -replace '(?s)\s*<div id="footer-container"></div>.*?</a>\s*', "`n  <div id=`"layout-shell-bottom`"></div>`n`n"

  # Scripts duplicados
  $content = $content -replace '(?s)\s*<!-- Vendor JS Files -->.*?</body>', "`n$layoutFoot`n</body>"
  $content = $content -replace '(?s)\s*<script src="assets/vendor/purecounter/.*?</body>', "`n$layoutFoot`n</body>"

  # index: logos en inicio
  if ($name -eq 'index.html') {
    if ($content -notmatch 'data-extra-scripts') {
      $content = $content -replace '(<body[^>]*)(>)', '$1 data-extra-scripts="assets/js/client-logos.js"$2'
    }
  }

  if ($name -eq 'contacto.html') {
    $content = $content -replace '(<body[^>]*)(>)', '$1 data-extra-scripts="assets/js/contact-form.js"$2'
  }

  if ($content -ne $original) {
    [System.IO.File]::WriteAllText($_.FullName, $content, [System.Text.UTF8Encoding]::new($false))
    Write-Host "Layout applied: $name"
  }
}

Write-Host "Done."
