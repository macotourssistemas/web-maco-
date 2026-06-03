<?php
declare(strict_types=1);

$gtmId = maco_gtm_id();
if ($gtmId === null) {
    return;
}
?>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?= maco_h($gtmId) ?>"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
