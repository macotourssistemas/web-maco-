<?php
declare(strict_types=1);

require __DIR__ . '/_http.php';

api_require_method(['POST']);
api_security_headers(false);

header('Content-Type: application/json; charset=utf-8');

$root = dirname(__DIR__);
require $root . '/config/load-env.php';
require $root . '/lib/SmtpMailer.php';

loadEnv($root . '/.env');

// Solo se procesan estos campos; cualquier extra (Cloudflare, extensiones,
// utm_*, etc.) se ignora en lugar de rechazar la petición.

// Campo trampa (bots)
if (!empty($_POST['website'] ?? '')) {
    echo json_encode(['ok' => true], JSON_UNESCAPED_UNICODE);
    exit;
}

$name = trim((string) ($_POST['name'] ?? ''));
$email = trim((string) ($_POST['email'] ?? ''));
$message = trim((string) ($_POST['message'] ?? ''));

$reasons = [
    'general' => 'Información general',
    'cotizar' => 'Cotización de servicio',
    'empresarial' => 'Servicio empresarial',
    'escolar' => 'Servicio escolar',
    'turistico' => 'Servicio turístico',
    'conductor' => 'Quiero ser conductor',
    'pqr' => 'Peticiones, quejas o reclamos',
];
$reasonKey = (string) ($_POST['reason'] ?? 'general');
$reasonLabel = $reasons[$reasonKey] ?? $reasons['general'];

if ($name === '' || $email === '' || $message === '') {
    api_json_error(true, 'missing_fields', 400);
}

if (mb_strlen($name) > 120 || mb_strlen($email) > 254 || mb_strlen($message) > 8000) {
    api_json_error(true, 'invalid_fields', 400);
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    api_json_error(true, 'invalid_email', 400);
}

$host = env('SMTP_HOST');
$port = (int) (env('SMTP_PORT', '587') ?? '587');
$user = env('SMTP_USER');
$pass = env('SMTP_PASS');
$encryption = strtolower(env('SMTP_ENCRYPTION', 'tls') ?? 'tls');
$mailTo = env('MAIL_TO');
$mailFrom = env('MAIL_FROM', $user);
$mailFromName = env('MAIL_FROM_NAME', 'Maco Tours - Formulario web');

if (!$host || !$user || $pass === null || $pass === '' || !$mailTo || !$mailFrom) {
    $missing = [];
    if (!$host) {
        $missing[] = 'SMTP_HOST';
    }
    if (!$user) {
        $missing[] = 'SMTP_USER';
    }
    if ($pass === null || $pass === '') {
        $missing[] = 'SMTP_PASS';
    }
    if (!$mailTo) {
        $missing[] = 'MAIL_TO';
    }
    if (!$mailFrom) {
        $missing[] = 'MAIL_FROM';
    }
    errorlog('error', 'contact server_not_configured', [
        'missing' => $missing,
        'env_readable' => is_readable($root . '/.env'),
    ]);
    api_json_error(true, 'server_not_configured', 503);
}

try {
    $mailer = new SmtpMailer($host, $port, $user, $pass, $encryption);

    $subject = 'Contacto web - ' . $reasonLabel . ' - ' . $name;
    $body = implode("\n", [
        'Nuevo mensaje desde el formulario de contacto',
        '-------------------------------------------',
        'Motivo: ' . $reasonLabel,
        'Nombre: ' . $name,
        'Correo: ' . $email,
        '',
        'Mensaje:',
        $message,
        '',
        'Enviado: ' . gmdate('Y-m-d H:i:s') . ' UTC',
        'IP: ' . ($_SERVER['REMOTE_ADDR'] ?? 'desconocida'),
    ]);

    $mailer->send(
        $mailTo,
        $subject,
        $body,
        $mailFrom,
        $mailFromName,
        $email,
    );

    echo json_encode(['ok' => true], JSON_UNESCAPED_UNICODE);
} catch (Throwable $e) {
    $debug = filter_var(env('APP_DEBUG', 'false'), FILTER_VALIDATE_BOOLEAN);
    $context = [
        'detail' => $e->getMessage(),
        'exception' => $e::class,
        'file' => $e->getFile() . ':' . $e->getLine(),
    ];
    if (isset($mailer) && $mailer instanceof SmtpMailer) {
        $context['smtp_step'] = $mailer->getLastStep();
    }
    if ($debug) {
        $context['smtp'] = [
            'host' => $host,
            'port' => $port,
            'encryption' => $encryption,
            'user' => $user,
            'mail_to' => $mailTo,
            'mail_from' => $mailFrom,
        ];
        $context['trace'] = $e->getTraceAsString();
    }
    errorlog($debug ? 'debug' : 'error', 'contact send_failed', $context);

    if ($debug) {
        http_response_code(500);
        echo json_encode([
            'ok' => false,
            'error' => 'send_failed',
            'debug' => [
                'message' => $e->getMessage(),
                'smtp_step' => $context['smtp_step'] ?? null,
                'smtp' => $context['smtp'] ?? null,
            ],
        ], JSON_UNESCAPED_UNICODE);
        exit;
    }

    api_json_error(true, 'send_failed', 500);
}
