<?php
declare(strict_types=1);

if (!defined('MACO_ROOT')) {
    define('MACO_ROOT', dirname(__DIR__));
}

/** @var array<string, mixed> $macoPage */
$macoPage = [
    'current_slug' => '',
    'i18n_title' => '',
    'extra_scripts' => [],
    'hero' => null,
    'body_class' => '',
];

function maco_page(array $options): void
{
    global $macoPage;
    $macoPage = array_merge($macoPage, $options);
}

function maco_h(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function maco_base(): string
{
    static $base = null;
    if ($base !== null) {
        return $base;
    }

    $script = $_SERVER['SCRIPT_NAME'] ?? '/';
    $dir = str_replace('\\', '/', dirname($script));
    if ($dir === '/' || $dir === '.') {
        $base = '';
    } else {
        $base = rtrim($dir, '/');
    }

    return $base;
}

function maco_href(string $slug = 'index'): string
{
    $base = maco_base();
    if ($slug === '' || $slug === 'index') {
        return $base === '' ? '/' : $base . '/';
    }
    return ($base === '' ? '' : $base) . '/' . $slug;
}

function maco_nav_active(string $slug): string
{
    global $macoPage;
    $current = $macoPage['current_slug'] ?? '';
    return $current === $slug ? ' active' : '';
}

function maco_body_attrs(): string
{
    global $macoPage;
    $parts = [];

    if (!empty($macoPage['body_class'])) {
        $parts[] = 'class="' . maco_h($macoPage['body_class']) . '"';
    }
    if (!empty($macoPage['i18n_title'])) {
        $parts[] = 'data-i18n-title="' . maco_h($macoPage['i18n_title']) . '"';
    }

    return implode(' ', $parts);
}

function maco_page_hero(): void
{
    global $macoPage;
    if (empty($macoPage['hero']) || !is_array($macoPage['hero'])) {
        return;
    }
    require __DIR__ . '/page-hero.php';
}

/** Correos de contacto oficiales del sitio */
function maco_contact_emails(): array
{
    return [
        'contacto@transportesmacotours.com',
        'maco.tours@hotmail.com',
    ];
}

function maco_render_email_links(string $wrapperClass = 'footer__phones'): void
{
    $emails = maco_contact_emails();
    echo '<span class="' . maco_h($wrapperClass) . '">';
    foreach ($emails as $index => $email) {
        if ($index > 0) {
            echo '<span class="footer__sep" aria-hidden="true"> / </span>';
        }
        echo '<a href="mailto:' . maco_h($email) . '">' . maco_h($email) . '</a>';
    }
    echo '</span>';
}

function maco_gtm_id(): ?string
{
    static $cached = null;
    if ($cached !== null) {
        return $cached === '' ? null : $cached;
    }

    if (!function_exists('env')) {
        require_once MACO_ROOT . '/config/load-env.php';
        loadEnv(MACO_ROOT . '/.env');
    }

    $cached = trim((string) (env('GTM_CONTAINER_ID', 'GTM-TNRLBG4W') ?? ''));
    if ($cached === '' || !preg_match('/^GTM-[A-Z0-9]+$/i', $cached)) {
        $cached = '';
        return null;
    }

    return $cached;
}
