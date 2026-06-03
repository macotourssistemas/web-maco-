$path = "c:\xampp\htdocs\MacoTours\index.html"
$content = Get-Content -Path $path -Raw -Encoding UTF8

$clientsSection = @'
    <section id="clientes" class="bg-slate-50 py-16">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Nuestros clientes</h2>
          <p class="text-slate-600">Empresas que confían en Maco Tours en todo el país</p>
        </div>
        <div class="swiper clients-swiper mt-8">
          <div class="swiper-wrapper"></div>
          <div class="swiper-pagination !relative !mt-8"></div>
        </div>
      </div>
    </section>

'@

$faqSection = @'
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
    </section>

'@

$content = $content -replace '(?s)    <section id="faq" class="faq"></section>.*?</section><!-- End Our Team Section -->', $clientsSection

$content = $content -replace '(?s)    <!-- ======= Frequently Asked Questions Section ======= -->.*?</section><!-- End Frequently Asked Questions Section -->', $faqSection

$content = $content -replace '(?s)  <!-- Vendor JS Files -->.*?</script>\r?\n</body>', @'
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/js/client-logos.js"></script>
  <script src="assets/js/ui.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/components.js"></script>
</body>
'@

$content = $content -replace 'class="bi bi-arrow-up-short"', 'class="fa-solid fa-arrow-up"'

Set-Content -Path $path -Value $content -Encoding UTF8 -NoNewline
Write-Host "index.html patched"
