<?php

$config = require dirname(__DIR__, 3) . '/config/app.php';
$pageTitle = ($title ?? $config['name']) . ' | Painel Ràmaga';
$pageStylesheet = $stylesheet ?? '/assets/css/panel.css';
$pageScript = $script ?? '/assets/js/panel.js';
$isEditor = ($title ?? '') === 'Editor visual';
?>
<!doctype html>
<html lang="<?= htmlspecialchars($config['locale'], ENT_QUOTES, 'UTF-8') ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#f8f8f6">
    <meta name="description" content="<?= htmlspecialchars($description ?? '', ENT_QUOTES, 'UTF-8') ?>">
    <title><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?></title>
    <link rel="icon" type="image/png" href="/assets/images/FAVICON.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/global.css">
    <link rel="stylesheet" href="<?= htmlspecialchars($pageStylesheet, ENT_QUOTES, 'UTF-8') ?>">
</head>
<body class="admin-body<?= $isEditor ? ' admin-body--editor' : '' ?>">
    <a class="skip-link" href="#painel-conteudo">Pular para o conteúdo</a>
    <div class="admin-shell">
        <?php require dirname(__DIR__) . '/components/admin-sidebar.php'; ?>
        <div class="admin-main">
            <?php require dirname(__DIR__) . '/components/admin-topbar.php'; ?>
            <main id="painel-conteudo" class="admin-content">
                <?= $content ?>
            </main>
        </div>
    </div>
    <div class="admin-toast" role="status" aria-live="polite" data-admin-toast></div>
    <script src="<?= htmlspecialchars($pageScript, ENT_QUOTES, 'UTF-8') ?>" defer></script>
</body>
</html>
