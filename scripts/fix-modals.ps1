$path = "c:\xampp\htdocs\MacoTours\nosotros.html"
$content = Get-Content -Path $path -Raw -Encoding UTF8

$content = $content -replace '(?s)<div class="modal fade" id="iso_modal_45001"[^>]*>.*?</div>\s*</div>\s*</div>', @'
<div id="iso_modal_45001" class="modal-backdrop">
  <div class="modal-panel" role="dialog" aria-labelledby="iso_modal_45001Label">
    <div class="modal-header">
      <h5 class="text-lg font-bold text-brand-900" id="iso_modal_45001Label">Certificación ISO 45001</h5>
      <button type="button" data-modal-close aria-label="Cerrar" class="text-2xl leading-none text-slate-400 hover:text-slate-700">&times;</button>
    </div>
    <div class="modal-body">
      <img src="assets/img/imagen_iso_45001.png" class="img-fluid w-100 rounded-xl" alt="Certificación ISO 45001">
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-modal-close>Cerrar</button>
    </div>
  </div>
</div>
'@

$content = $content -replace '(?s)<div class="modal fade" id="iso_modal_14001"[^>]*>.*?</div>\s*</div>\s*</div>', @'
<div id="iso_modal_14001" class="modal-backdrop">
  <div class="modal-panel" role="dialog" aria-labelledby="iso_modal_14001Label">
    <div class="modal-header">
      <h5 class="text-lg font-bold text-brand-900" id="iso_modal_14001Label">Certificación ISO 14001</h5>
      <button type="button" data-modal-close aria-label="Cerrar" class="text-2xl leading-none text-slate-400 hover:text-slate-700">&times;</button>
    </div>
    <div class="modal-body">
      <img src="assets/img/imagen_iso_140001.png" class="img-fluid w-100 rounded-xl" alt="Certificación ISO 14001">
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-modal-close>Cerrar</button>
    </div>
  </div>
</div>
'@

$content = $content -replace '(?s)<div class="modal fade" id="iso_modal_9001"[^>]*>.*?</div>\s*</div>\s*</div>', @'
<div id="iso_modal_9001" class="modal-backdrop">
  <div class="modal-panel" role="dialog" aria-labelledby="iso_modal_9001Label">
    <div class="modal-header">
      <h5 class="text-lg font-bold text-brand-900" id="iso_modal_9001Label">Certificación ISO 9001</h5>
      <button type="button" data-modal-close aria-label="Cerrar" class="text-2xl leading-none text-slate-400 hover:text-slate-700">&times;</button>
    </div>
    <div class="modal-body">
      <img src="assets/img/imagen_iso_9001.png" class="img-fluid w-100 rounded-xl" alt="Certificación ISO 9001">
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-modal-close>Cerrar</button>
    </div>
  </div>
</div>
'@

[System.IO.File]::WriteAllText($path, $content, [System.Text.UTF8Encoding]::new($false))
Write-Host "Modals updated"
