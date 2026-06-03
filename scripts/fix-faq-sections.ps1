$files = @(
  "servicios.html",
  "nuestro_equipo.html",
  "nosotros.html"
)

$faqBlock = @'
    <section id="faq" class="faq">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Preguntas frecuentes</h2>
        </div>
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div id="faq-container"></div>
          </div>
        </div>
      </div>
    </section><!-- End Frequently Asked Questions Section -->
'@

foreach ($name in $files) {
  $path = Join-Path "c:\xampp\htdocs\MacoTours" $name
  $content = Get-Content -Path $path -Raw -Encoding UTF8
  $content = $content -replace '(?s)<section id="faq" class="faq">.*?</section><!-- End Frequently Asked Questions Section -->', $faqBlock
  [System.IO.File]::WriteAllText($path, $content, [System.Text.UTF8Encoding]::new($false))
  Write-Host "Fixed FAQ: $name"
}
