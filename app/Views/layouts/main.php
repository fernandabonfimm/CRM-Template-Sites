<?php

$config = require dirname(__DIR__, 3) . '/config/app.php';
$pageTitle = isset($title) ? $title . ' | Ràmaga Pró-Estética' : $config['name'];
$pageDescription = $description ?? 'Formação profissional em estética, cursos presenciais e on-line, pós-graduação e tecnologia com a Ràmaga.';
$pageStylesheet = $stylesheet ?? null;
?>
<!doctype html>
<html lang="<?= htmlspecialchars($config['locale'], ENT_QUOTES, 'UTF-8') ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#f8f8f6">
    <meta name="description" content="<?= htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8') ?>">
    <title><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?></title>
    <link rel="icon" type="image/png" href="/assets/images/FAVICON.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Open+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/global.css">
    <link rel="stylesheet" href="/assets/css/home.css">
    <?php if ($pageStylesheet !== null): ?>
        <link rel="stylesheet" href="<?= htmlspecialchars($pageStylesheet, ENT_QUOTES, 'UTF-8') ?>">
    <?php endif; ?>
</head>
<body>
    <a class="skip-link" href="#conteudo">Pular para o conteúdo</a>
    <?php require dirname(__DIR__) . '/components/header.php'; ?>
    <main id="conteudo">
        <?= $content ?>
    </main>
    <?php require dirname(__DIR__) . '/components/footer.php'; ?>
    <script src="/assets/js/home.js" defer></script>
</body>
</html>
