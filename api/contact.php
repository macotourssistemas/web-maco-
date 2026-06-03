<?php
declare(strict_types=1);

require __DIR__ . '/_http.php';

api_require_method(['POST']);
api_reject_query_string();
api_security_headers(false);

header('Content-Type: application/json; charset=utf-8');

$root = dirname(__DIR__);
require $root . '/config/load-env.php';
require $root . '/lib/SmtpMailer.php';

loadEnv($root . '/.env');

$allowedFields = ['name', 'email', 'message', 'website'];

foreach (array_keys($_POST) as $key) {
    if (!in_array($key, $allowedFields, true)) {
        api_json_error(true, 'invalid_request', 400);
    }
}

// Campo trampa (bots)
if (!empty($_POST['website'] ?? '')) {
    echo json_encode(['ok' => true], JSON_UNESCAPED_UNICODE);
    exit;
}

$name = trim((string) ($_POST['name'] ?? ''));
$email = trim((string) ($_POST['email'] ?? ''));
$message = trim((string) ($_POST['message'] ?? ''));

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

    $subject = 'Contacto web - ' . $name;
    $body = implode("\n", [
        'Nuevo mensaje desde el formulario de contacto',
        '-------------------------------------------',
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
    errorlog('error', 'contact send_failed', ['detail' => $e->getMessage()]);
    api_json_error(true, 'send_failed', 500);
}
