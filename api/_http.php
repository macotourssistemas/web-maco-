<?php
declare(strict_types=1);

if (!defined('MACO_ROOT')) {
    define('MACO_ROOT', dirname(__DIR__));
}
require_once MACO_ROOT . '/config/errorlog.php';
errorlog_init();

/**
 * Respuestas API: códigos fijos, sin reflejar entrada del cliente.
 */
function api_security_headers(bool $readOnly): void
{
    header('X-Content-Type-Options: nosniff');
    header('X-Robots-Tag: noindex, nofollow');
    header($readOnly ? 'Cache-Control: public, max-age=3600' : 'Cache-Control: no-store');
}

function api_reject_query_string(): void
{
    $qs = $_SERVER['QUERY_STRING'] ?? '';
    if ($qs !== '') {
        api_json_error(false, 'invalid_request', 400);
    }
}

/** @param list<string> $allowed */
function api_require_method(array $allowed): void
{
    $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
    if (!in_array($method, $allowed, true)) {
        header('Allow: ' . implode(', ', $allowed));
        api_json_error(false, 'method_not_allowed', 405);
    }
}

function api_json_error(bool $okField, string $code, int $status): void
{
    http_response_code($status);
    header('Content-Type: application/json; charset=UTF-8');
    $payload = $okField ? ['ok' => false, 'error' => $code] : ['error' => $code];
    echo json_encode($payload, JSON_UNESCAPED_UNICODE);
    exit;
}
