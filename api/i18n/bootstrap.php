<?php
declare(strict_types=1);

require dirname(__DIR__) . '/_http.php';

api_require_method(['GET', 'HEAD']);
api_reject_query_string();
api_security_headers(true);

$supported = ['es', 'en', 'pt', 'it', 'fr'];
$lang = defined('MACO_I18N_LANG') ? (string) MACO_I18N_LANG : '';

if (!in_array($lang, $supported, true)) {
    api_json_error(false, 'not_found', 404);
}

$root = dirname(__DIR__, 2);
$file = $root . '/assets/i18n/' . $lang . '.json';

if (!is_readable($file)) {
    api_json_error(false, 'not_found', 404);
}

header('Content-Type: application/json; charset=UTF-8');

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'HEAD') {
    http_response_code(200);
    exit;
}

$raw = file_get_contents($file);
if ($raw === false) {
    api_json_error(false, 'read_failed', 500);
}

echo $raw;
