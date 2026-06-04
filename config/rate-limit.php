<?php
declare(strict_types=1);

/**
 * Rate limiting básico por IP basado en archivos (sin base de datos).
 * Almacena marcas de tiempo en var/ratelimit/<hash>.json
 *
 * @return array{allowed:bool, reason:?string, retry_after:int}
 */
function maco_rate_limit(
    string $ip,
    int $maxPerWindow = 5,
    int $windowSeconds = 3600,
    int $minIntervalSeconds = 20,
): array {
    $root = defined('MACO_ROOT') ? MACO_ROOT : dirname(__DIR__);
    $dir = $root . '/var/ratelimit';

    if (!is_dir($dir)) {
        @mkdir($dir, 0750, true);
    }

    $ip = $ip !== '' ? $ip : 'desconocida';
    $file = $dir . '/' . sha1($ip) . '.json';
    $now = time();

    $timestamps = [];
    if (is_file($file)) {
        $raw = @file_get_contents($file);
        if ($raw !== false && $raw !== '') {
            $decoded = json_decode($raw, true);
            if (is_array($decoded)) {
                $timestamps = array_filter(
                    $decoded,
                    static fn ($t): bool => is_int($t) && ($now - $t) < $windowSeconds
                );
            }
        }
    }

    if ($timestamps !== []) {
        $last = max($timestamps);
        if (($now - $last) < $minIntervalSeconds) {
            return [
                'allowed' => false,
                'reason' => 'too_fast',
                'retry_after' => $minIntervalSeconds - ($now - $last),
            ];
        }
    }

    if (count($timestamps) >= $maxPerWindow) {
        $oldest = min($timestamps);
        return [
            'allowed' => false,
            'reason' => 'too_many',
            'retry_after' => $windowSeconds - ($now - $oldest),
        ];
    }

    $timestamps[] = $now;
    @file_put_contents($file, json_encode(array_values($timestamps)), LOCK_EX);

    return ['allowed' => true, 'reason' => null, 'retry_after' => 0];
}
