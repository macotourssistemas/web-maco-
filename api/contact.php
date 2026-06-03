<?php
declare(strict_types=1);

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['ok' => false, 'error' => 'method_not_allowed']);
    exit;
}

$root = dirname(__DIR__);
require $root . '/config/load-env.php';
require $root . '/lib/SmtpMailer.php';

loadEnv($root . '/.env');

$debug = strtolower(env('APP_DEBUG', 'false') ?? 'false') === 'true';

function jsonError(string $code, int $status = 400, bool $debug = false, ?string $detail = null): void
{
    http_response_code($status);
    $payload = ['ok' => false, 'error' => $code];
    if ($debug && $detail) {
        $payload['detail'] = $detail;
    }
    echo json_encode($payload, JSON_UNESCAPED_UNICODE);
    exit;
}

// Campo trampa (bots)
if (!empty($_POST['website'] ?? '')) {
    echo json_encode(['ok' => true]);
    exit;
}

$name = trim((string) ($_POST['name'] ?? ''));
$email = trim((string) ($_POST['email'] ?? ''));
$message = trim((string) ($_POST['message'] ?? ''));

if ($name === '' || $email === '' || $message === '') {
    jsonError('missing_fields');
}

if (mb_strlen($name) > 120 || mb_strlen($email) > 254 || mb_strlen($message) > 8000) {
    jsonError('invalid_fields');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    jsonError('invalid_email');
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
    jsonError('server_not_configured', 503, $debug, 'Revise el archivo .env (SMTP_* y MAIL_*).');
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
    jsonError('send_failed', 500, $debug, $e->getMessage());
}
