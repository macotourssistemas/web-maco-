$root = "c:\xampp\htdocs\MacoTours"
$files = Get-ChildItem -Path $root -Filter "*.html" -File | Where-Object { $_.Name -ne "index.html" }

foreach ($file in $files) {
  $content = [System.IO.File]::ReadAllText($file.FullName)
  if ($content -match 'assets/js/i18n\.js') { continue }

  $content = $content -replace '(<script src="assets/js/ui\.js"></script>)', "<script src=`"assets/js/i18n.js`"></script>`n  `$1"
  if ($content -notmatch 'assets/js/i18n\.js') {
    $content = $content -replace '(<script src="assets/js/main\.js"></script>)', "<script src=`"assets/js/i18n.js`"></script>`n  `$1"
  }

  [System.IO.File]::WriteAllText($file.FullName, $content, [System.Text.UTF8Encoding]::new($false))
  Write-Host "Added i18n.js to $($file.Name)"
}

Write-Host "Done."
