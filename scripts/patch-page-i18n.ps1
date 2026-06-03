$pages = @{
  "servicios.html" = @{
    title = "titles.servicios"
    h2 = "pages.servicios.title"
    breadcrumb = "pages.servicios.breadcrumb"
    section = "pages.servicios.sectionTitle"
    whyTitle = "pages.servicios.whyTitle"
    whyText = "pages.servicios.whyText"
  }
  "nosotros.html" = @{
    title = "titles.nosotros"
    h2 = "pages.nosotros.title"
    breadcrumb = "pages.nosotros.breadcrumb"
    cert = "pages.nosotros.certTitle"
    docs = "pages.nosotros.docsTitle"
  }
  "nuestro_equipo.html" = @{
    title = "titles.equipo"
    h2 = "pages.equipo.title"
    breadcrumb = "pages.equipo.breadcrumb"
  }
  "servicio_empresarial.html" = @{
    title = "titles.empresarial"
    h2 = "pages.empresarial.title"
    breadcrumb = "pages.empresarial.breadcrumb"
  }
  "servicio_escolar.html" = @{
    title = "titles.escolar"
    h2 = "pages.escolar.title"
    breadcrumb = "pages.escolar.breadcrumb"
  }
  "servicio_turistico.html" = @{
    title = "titles.turistico"
    h2 = "pages.turistico.title"
    breadcrumb = "pages.turistico.breadcrumb"
  }
  "politicas_Privacidad.html" = @{
    title = "titles.privacidad"
    h2 = "pages.privacidad.title"
    breadcrumb = "pages.privacidad.breadcrumb"
  }
}

$root = "c:\xampp\htdocs\MacoTours"

foreach ($file in $pages.Keys) {
  $path = Join-Path $root $file
  $cfg = $pages[$file]
  $c = [System.IO.File]::ReadAllText($path)

  if ($c -notmatch 'data-i18n-title') {
    $c = $c -replace '<body>', "<body data-i18n-title=`"$($cfg.title)`">"
  }

  $c = $c -replace '<h2>Preguntas frecuentes</h2>', '<h2 data-i18n="common.faqTitle">Preguntas frecuentes</h2>'
  $c = $c -replace '<h2>Preguntas Frecuentes</h2>', '<h2 data-i18n="common.faqTitle">Preguntas frecuentes</h2>'
  $c = $c -replace '<li><a href="index.html">Inicio</a></li>', '<li><a href="index.html" data-i18n="common.home">Inicio</a></li>'

  if ($cfg.h2) {
    $c = $c -replace '(<div class="page-header[^"]*">[\s\S]*?<h2)>[^<]*(</h2>)', "`$1 data-i18n=`"$($cfg.h2)`">$([char]0)"
    # fallback: first h2 in page-header area
  }

  [System.IO.File]::WriteAllText($path, $c, [System.Text.UTF8Encoding]::new($false))
  Write-Host "Patched $file"
}

Write-Host "Done (manual h2 keys may need verification)"
