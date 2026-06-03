$root = "c:\xampp\htdocs\MacoTours"
$htmlFiles = Get-ChildItem -Path $root -Filter "*.html" -File

$oldFonts = @'
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet">
'@

$newFonts = @'
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">
'@

$oldVendor = @'
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
'@

$newVendor = @'
  <!-- Vendor CSS -->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
'@

$oldMainCss = '  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">'

$newMainCss = @'
  <link href="assets/css/tailwind.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">
'@

$oldScripts = @'
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
'@

$newScripts = @'
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
'@

$insertUi = '  <script src="assets/js/ui.js"></script>
  <script src="assets/js/main.js"></script>'

foreach ($file in $htmlFiles) {
  $content = Get-Content -Path $file.FullName -Raw -Encoding UTF8
  $original = $content

  $content = $content.Replace($oldFonts, $newFonts)
  $content = $content.Replace($oldVendor, $newVendor)
  if ($content -notmatch 'tailwind\.css') {
    $content = $content.Replace($oldMainCss, $newMainCss)
  }
  $content = $content.Replace($oldScripts, $newScripts)
  if ($content -notmatch 'assets/js/ui\.js') {
    $content = $content.Replace('  <script src="assets/js/main.js"></script>', $insertUi)
  }
  $content = $content -replace '<html lang="en">', '<html lang="es">'

  if ($content -ne $original) {
    Set-Content -Path $file.FullName -Value $content -Encoding UTF8 -NoNewline
    Write-Host "Updated: $($file.Name)"
  }
}

Write-Host "Done."
