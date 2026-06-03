<?php
declare(strict_types=1);

/**
 * Único punto de registro del sitio → var/logs/error.log
 * Inicializar con errorlog_init() (bootstrap y api/_http.php).
 */
function errorlog_root(): string
{
    return defined('MACO_ROOT') ? MACO_ROOT : dirname(__DIR__);
}

function errorlog_file(): string
{
    return errorlog_root() . '/var/logs/error.log';
}

function errorlog_init(): void
{
    static $initialized = false;
    if ($initialized) {
        return;
    }
    $initialized = true;

    $dir = errorlog_root() . '/var/logs';
    if (!is_dir($dir)) {
        @mkdir($dir, 0750, true);
    }

    $file = errorlog_file();
    ini_set('log_errors', '1');
    ini_set('error_log', $file);

    set_error_handler(static function (int $severity, string $message, string $file, int $line): bool {
        if (!(error_reporting() & $severity)) {
            return false;
        }
        errorlog('php', $message, [
            'severity' => $severity,
            'file' => $file,
            'line' => $line,
        ]);

        return true;
    });

    set_exception_handler(static function (Throwable $e): void {
        errorlog('exception', $e->getMessage(), [
            'type' => $e::class,
            'file' => $e->getFile(),
            'line' => $e->getLine(),
        ]);
    });

    register_shutdown_function(static function (): void {
        $last = error_get_last();
        if ($last === null) {
            return;
        }
        $fatals = [E_ERROR, E_PARSE, E_CORE_ERROR, E_COMPILE_ERROR];
        if (!in_array($last['type'], $fatals, true)) {
            return;
        }
        errorlog('fatal', $last['message'], [
            'file' => $last['file'],
            'line' => $last['line'],
        ]);
    });
}

/** @param array<string, mixed> $context */
function errorlog(string $level, string $message, array $context = []): void
{
    $dir = errorlog_root() . '/var/logs';
    if (!is_dir($dir)) {
        @mkdir($dir, 0750, true);
    }

    $contextJson = $context !== [] ? ' ' . json_encode($context, JSON_UNESCAPED_UNICODE) : '';
    $line = sprintf('[%s] %s %s%s', gmdate('Y-m-d H:i:s'), strtoupper($level), $message, $contextJson);

    @file_put_contents(errorlog_file(), $line . PHP_EOL, FILE_APPEND | LOCK_EX);
}
