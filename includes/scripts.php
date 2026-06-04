<?php
global $macoPage;

$core = [
    'assets/vendor/purecounter/purecounter_vanilla.js',
    'assets/vendor/glightbox/js/glightbox.min.js',
    'assets/vendor/swiper/swiper-bundle.min.js',
    'assets/vendor/aos/aos.js',
    'assets/js/i18n.js',
];

$extra = $macoPage['extra_scripts'] ?? [];
if (!is_array($extra)) {
    $extra = [];
}

$tail = [
    'assets/js/ui.js',
    'assets/js/main.js',
    'assets/js/site-init.js',
    'assets/js/cookie-consent.js',
];

foreach (array_merge($core, $extra, $tail) as $src):
    $version = '';
    $file = MACO_ROOT . '/' . ltrim($src, '/');
    if (is_file($file)) {
        $version = '?v=' . filemtime($file);
    }
    ?>
<script src="<?= maco_h($src . $version) ?>"></script>
<?php endforeach; ?>
