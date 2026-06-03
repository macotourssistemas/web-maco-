$root = "c:\xampp\htdocs\MacoTours"
$htmlFiles = Get-ChildItem -Path $root -Filter "*.html" -File

foreach ($file in $htmlFiles) {
  $content = Get-Content -Path $file.FullName -Raw -Encoding UTF8
  $original = $content

  $content = $content -replace '(?s)<link\s+href="https://fonts\.googleapis\.com/css2\?family=Open\+Sans.*?</link>\s*', ''
  $content = $content -replace '<link href="https://fonts\.googleapis\.com/css2\?family=Open\+Sans[^"]+" rel="stylesheet">\s*', ''

  if ($content -notmatch 'Plus\+Jakarta') {
    $content = $content -replace '(<link rel="preconnect" href="https://fonts\.gstatic\.com" crossorigin>\s*)', "`$1  <link href=`"https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&display=swap`" rel=`"stylesheet`">`n"
  }

  if ($content -notmatch 'tailwind\.css') {
    $content = $content -replace '(<link href="assets/vendor/aos/aos\.css" rel="stylesheet">)', "`$1`n  <link href=`"assets/css/tailwind.css`" rel=`"stylesheet`">"
  }

  $content = $content -replace '(?s)\s*<script src="https://code\.jquery\.com[^<]+</script>\s*', "`n"
  $content = $content -replace '(?s)\s*<script src="https://cdn\.jsdelivr\.net/npm/[^"]+"></script>\s*', "`n"
  $content = $content -replace '(?s)<!-- jQuery.*?</script>\s*', "`n"
  $content = $content -replace '(?s)<!-- Keeping this block.*?</script>\s*', "`n"

  if ($content -notmatch 'assets/js/ui\.js') {
    $content = $content -replace '<script src="assets/js/main\.js"></script>', "  <script src=`"assets/js/ui.js`"></script>`n  <script src=`"assets/js/main.js`"></script>"
  }

  $content = $content -replace 'class="bi bi-arrow-up-short"', 'class="fa-solid fa-arrow-up"'
  $content = $content -replace 'class="bi bi-geo-alt', 'class="fa-solid fa-location-dot'
  $content = $content -replace 'class="bi bi-envelope', 'class="fa-solid fa-envelope'
  $content = $content -replace 'class="bi bi-phone', 'class="fa-solid fa-phone'
  $content = $content -replace 'class="bi bi-check-circle"', 'class="fa-solid fa-circle-check text-brand-500"'

  $faqReplacement = @'
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div id="faq-container"></div>
          </div>
        </div>
'@

  if ($content -match 'accordion accordion-flush') {
    $content = $content -replace '(?s)<div class="row justify-content-center"[^>]*data-aos[^>]*>\s*<div class="col-lg-10">\s*<div class="accordion accordion-flush" id="faqlist">.*?</div>\s*</div>\s*</div>', $faqReplacement
  }

  if ($content -ne $original) {
    [System.IO.File]::WriteAllText($file.FullName, $content, [System.Text.UTF8Encoding]::new($false))
    Write-Host "Patched: $($file.Name)"
  }
}

Write-Host "All HTML files processed."
