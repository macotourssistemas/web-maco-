# Quita el fondo blanco rectangular fuera del óvalo (flood fill desde bordes)
Add-Type -AssemblyName System.Drawing

$srcPath = Join-Path $PSScriptRoot "..\assets\img\Logo.png"
$outPath = Join-Path $PSScriptRoot "..\assets\img\logo-transparent.png"
$headerPath = Join-Path $PSScriptRoot "..\assets\img\logo-header.png"

$src = [System.Drawing.Image]::FromFile($srcPath)
$w = $src.Width
$h = $src.Height

$bmp = New-Object System.Drawing.Bitmap $w, $h, ([System.Drawing.Imaging.PixelFormat]::Format32bppArgb)
$g0 = [System.Drawing.Graphics]::FromImage($bmp)
$g0.CompositingMode = [System.Drawing.Drawing2D.CompositingMode]::SourceCopy
$g0.DrawImage($src, 0, 0, $w, $h)
$g0.Dispose()
$src.Dispose()

$tolerance = 38
$visited = New-Object bool[] ($w * $h)
$queue = [System.Collections.Generic.Queue[System.Drawing.Point]]::new()

function Test-White([System.Drawing.Color]$c) {
  return $c.A -gt 0 -and $c.R -ge (255 - $tolerance) -and $c.G -ge (255 - $tolerance) -and $c.B -ge (255 - $tolerance)
}

function Try-Enqueue([int]$x, [int]$y) {
  if ($x -lt 0 -or $y -lt 0 -or $x -ge $w -or $y -ge $h) { return }
  $i = $y * $w + $x
  if ($visited[$i]) { return }
  $c = $bmp.GetPixel($x, $y)
  if (-not (Test-White $c)) { return }
  $visited[$i] = $true
  $null = $queue.Enqueue([System.Drawing.Point]::new($x, $y))
}

for ($x = 0; $x -lt $w; $x++) {
  Try-Enqueue $x 0
  Try-Enqueue $x ($h - 1)
}
for ($y = 0; $y -lt $h; $y++) {
  Try-Enqueue 0 $y
  Try-Enqueue ($w - 1) $y
}

while ($queue.Count -gt 0) {
  $p = $queue.Dequeue()
  $bmp.SetPixel($p.X, $p.Y, [System.Drawing.Color]::FromArgb(0, 0, 0, 0))
  Try-Enqueue ($p.X + 1) $p.Y
  Try-Enqueue ($p.X - 1) $p.Y
  Try-Enqueue $p.X ($p.Y + 1)
  Try-Enqueue $p.X ($p.Y - 1)
}

$bmp.Save($outPath, [System.Drawing.Imaging.ImageFormat]::Png)
Write-Host "Saved $outPath"

$targetW = 800
$targetH = [int][Math]::Round($h * ($targetW / $w))
$out = New-Object System.Drawing.Bitmap $targetW, $targetH, ([System.Drawing.Imaging.PixelFormat]::Format32bppArgb)
$g = [System.Drawing.Graphics]::FromImage($out)
$g.InterpolationMode = [System.Drawing.Drawing2D.InterpolationMode]::HighQualityBicubic
$g.SmoothingMode = [System.Drawing.Drawing2D.SmoothingMode]::HighQuality
$g.CompositingMode = [System.Drawing.Drawing2D.CompositingMode]::SourceOver
$g.Clear([System.Drawing.Color]::Transparent)
$g.DrawImage($bmp, 0, 0, $targetW, $targetH)
$out.Save($headerPath, [System.Drawing.Imaging.ImageFormat]::Png)
$g.Dispose()
$out.Dispose()
$bmp.Dispose()
Write-Host "Saved $headerPath (${targetW}x${targetH})"
