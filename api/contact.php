<?php
declare(strict_types=1);

require __DIR__ . '/_http.php';

api_require_method(['POST']);
api_security_headers(false);

header('Content-Type: application/json; charset=utf-8');

$root = dirname(__DIR__);
require $root . '/config/load-env.php';
require $root . '/config/rate-limit.php';
require $root . '/lib/SmtpMailer.php';
require $root . '/lib/mail_templates.php';

loadEnv($root . '/.env');

$clientIp = (string) ($_SERVER['HTTP_CF_CONNECTING_IP'] ?? $_SERVER['REMOTE_ADDR'] ?? '');

/**
 * Error JSON con detalle de campos para la UI.
 * @param list<string> $fields
 */
function contact_field_error(string $code, array $fields, int $status = 400): never
{
    http_response_code($status);
    header('Content-Type: application/json; charset=UTF-8');
    echo json_encode(['ok' => false, 'error' => $code, 'fields' => $fields], JSON_UNESCAPED_UNICODE);
    exit;
}

// Solo se procesan estos campos; cualquier extra (Cloudflare, extensiones,
// utm_*, etc.) se ignora en lugar de rechazar la petición.

// Campo trampa (bots): respondemos OK sin enviar nada.
if (!empty($_POST['website'] ?? '')) {
    errorlog('warning', 'contact honeypot', ['ip' => $clientIp]);
    echo json_encode(['ok' => true], JSON_UNESCAPED_UNICODE);
    exit;
}

// Política anti-abuso: límite por IP (5/hora y 20s entre envíos).
$rate = maco_rate_limit($clientIp);
if (!$rate['allowed']) {
    errorlog('warning', 'contact rate_limited', [
        'ip' => $clientIp,
        'reason' => $rate['reason'],
        'retry_after' => $rate['retry_after'],
    ]);
    http_response_code(429);
    header('Retry-After: ' . max(1, $rate['retry_after']));
    echo json_encode([
        'ok' => false,
        'error' => 'rate_limited',
        'reason' => $rate['reason'],
        'retry_after' => $rate['retry_after'],
    ], JSON_UNESCAPED_UNICODE);
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

$missing = [];
if ($name === '') {
    $missing[] = 'name';
}
if ($email === '') {
    $missing[] = 'email';
}
if ($message === '') {
    $missing[] = 'message';
}
if ($missing !== []) {
    contact_field_error('missing_fields', $missing);
}

$tooLong = [];
if (mb_strlen($name) > 120) {
    $tooLong[] = 'name';
}
if (mb_strlen($email) > 254) {
    $tooLong[] = 'email';
}
if (mb_strlen($message) > 8000) {
    $tooLong[] = 'message';
}
if ($tooLong !== []) {
    contact_field_error('invalid_fields', $tooLong);
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    contact_field_error('invalid_email', ['email']);
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

    // 1) Aviso interno a la empresa
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
        'IP: ' . $clientIp,
    ]);
    $bodyHtml = maco_mail_admin_html($reasonLabel, $name, $email, $message, $clientIp !== '' ? $clientIp : 'desconocida');

    $mailer->send(
        $mailTo,
        $subject,
        $body,
        $mailFrom,
        $mailFromName,
        $email,
        $bodyHtml,
    );

    // 2) Confirmación al usuario (no debe romper la respuesta si falla)
    try {
        $confirmSubject = 'Recibimos tu solicitud - Maco Tours';
        $confirmText = implode("\n", [
            'Hola ' . $name . ',',
            '',
            'Hemos recibido tu solicitud y te responderemos lo antes posible.',
            'Motivo: ' . $reasonLabel,
            '',
            'Tu mensaje:',
            $message,
            '',
            'Maco Tours S.A.S. - Transportes Especiales',
            'contacto@transportesmacotours.com - (605) 429 - 9214',
        ]);
        $confirmHtml = maco_mail_confirmation_html($reasonLabel, $name, $message);

        $mailer->send(
            $email,
            $confirmSubject,
            $confirmText,
            $mailFrom,
            'Maco Tours',
            $mailTo,
            $confirmHtml,
        );
    } catch (Throwable $confirmError) {
        errorlog('warning', 'contact confirmation_failed', [
            'detail' => $confirmError->getMessage(),
            'to' => $email,
        ]);
    }

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
