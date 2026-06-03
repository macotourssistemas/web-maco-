<?php
declare(strict_types=1);

final class SmtpMailer
{
    public function __construct(
        private readonly string $host,
        private readonly int $port,
        private readonly string $username,
        private readonly string $password,
        private readonly string $encryption = 'tls',
    ) {
    }

    public function send(
        string $to,
        string $subject,
        string $textBody,
        string $fromEmail,
        string $fromName,
        ?string $replyTo = null,
    ): void {
        $socket = $this->connect();

        try {
            $this->expect($socket, 220);
            $ehlo = $this->getHostname();
            $this->dialog($socket, "EHLO $ehlo", 250);

            if ($this->encryption === 'tls' && $this->port !== 465) {
                $this->dialog($socket, 'STARTTLS', 220);
                if (!stream_socket_enable_crypto($socket, true, STREAM_CRYPTO_METHOD_TLS_CLIENT)) {
                    throw new RuntimeException('No se pudo establecer TLS con el servidor SMTP.');
                }
                $this->dialog($socket, "EHLO $ehlo", 250);
            }

            $this->authenticate($socket);
            $from = $this->sanitizeEmail($fromEmail);
            $recipient = $this->sanitizeEmail($to);

            $this->dialog($socket, "MAIL FROM:<$from>", 250);
            $this->dialog($socket, "RCPT TO:<$recipient>", 250);
            $this->dialog($socket, 'DATA', 354);

            $payload = $this->buildMessage($fromEmail, $fromName, $to, $subject, $textBody, $replyTo);
            $this->dialog($socket, $payload, 250);
            $this->dialog($socket, 'QUIT', 221);
        } finally {
            fclose($socket);
        }
    }

    private function connect()
    {
        $target = $this->encryption === 'ssl'
            ? "ssl://{$this->host}:{$this->port}"
            : "tcp://{$this->host}:{$this->port}";

        $errno = 0;
        $errstr = '';
        $socket = @stream_socket_client($target, $errno, $errstr, 30, STREAM_CLIENT_CONNECT);

        if ($socket === false) {
            throw new RuntimeException("No se pudo conectar al SMTP ($errno): $errstr");
        }

        stream_set_timeout($socket, 30);
        return $socket;
    }

    private function authenticate($socket): void
    {
        $this->dialog($socket, 'AUTH LOGIN', 334);
        $this->dialog($socket, base64_encode($this->username), 334);
        $this->dialog($socket, base64_encode($this->password), 235);
    }

    private function dialog($socket, string $command, int $expectedCode): void
    {
        fwrite($socket, $command . "\r\n");
        $this->expect($socket, $expectedCode);
    }

    private function expect($socket, int $expectedCode): void
    {
        $response = $this->readResponse($socket);
        $code = (int) substr($response, 0, 3);

        if ($code !== $expectedCode) {
            throw new RuntimeException('SMTP: ' . trim(preg_replace('/\s+/', ' ', $response)));
        }
    }

    private function readResponse($socket): string
    {
        $response = '';
        while (($line = fgets($socket, 515)) !== false) {
            $response .= $line;
            if (isset($line[3]) && $line[3] === ' ') {
                break;
            }
        }
        return $response;
    }

    private function buildMessage(
        string $fromEmail,
        string $fromName,
        string $to,
        string $subject,
        string $textBody,
        ?string $replyTo,
    ): string {
        $fromHeader = $this->formatAddress($fromEmail, $fromName);
        $toHeader = $this->formatAddress($to, $to);
        $encodedSubject = $this->encodeHeader($subject);
        $date = gmdate('D, d M Y H:i:s') . ' +0000';

        $headers = [
            "Date: $date",
            "From: $fromHeader",
            "To: $toHeader",
            "Subject: $encodedSubject",
            'MIME-Version: 1.0',
            'Content-Type: text/plain; charset=UTF-8',
            'Content-Transfer-Encoding: 8bit',
        ];

        if ($replyTo) {
            $headers[] = 'Reply-To: ' . $this->sanitizeEmail($replyTo);
        }

        $body = $this->dotStuff($textBody);
        return implode("\r\n", $headers) . "\r\n\r\n" . $body . "\r\n.";
    }

    private function formatAddress(string $email, string $name): string
    {
        $email = $this->sanitizeEmail($email);
        $safeName = str_replace(['"', "\r", "\n"], '', $name);
        if ($safeName === '' || $safeName === $email) {
            return "<$email>";
        }
        return $this->encodeHeader($safeName) . " <$email>";
    }

    private function encodeHeader(string $value): string
    {
        if (preg_match('/^[\x20-\x7E]+$/', $value)) {
            return $value;
        }
        return '=?UTF-8?B?' . base64_encode($value) . '?=';
    }

    private function dotStuff(string $body): string
    {
        $lines = preg_split("/\r\n|\n|\r/", $body) ?: [];
        $out = [];
        foreach ($lines as $line) {
            if (str_starts_with($line, '.')) {
                $line = '.' . $line;
            }
            $out[] = $line;
        }
        return implode("\r\n", $out);
    }

    private function sanitizeEmail(string $email): string
    {
        $email = trim($email);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('Correo inválido.');
        }
        return $email;
    }

    private function getHostname(): string
    {
        $host = gethostname();
        return $host !== false && $host !== '' ? $host : 'localhost';
    }
}
