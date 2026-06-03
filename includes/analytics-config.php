<?php
declare(strict_types=1);

if (!defined('MACO_ROOT')) {
    define('MACO_ROOT', dirname(__DIR__));
}

require_once MACO_ROOT . '/config/load-env.php';
loadEnv(MACO_ROOT . '/.env');

$gaId = trim((string) (env('GOOGLE_ANALYTICS_ID', '') ?? ''));
if ($gaId !== ''): ?>
<script>window.MACO_GA_ID = <?= json_encode($gaId, JSON_UNESCAPED_UNICODE) ?>;</script>
<?php endif; ?>
