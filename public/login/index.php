<?php

declare(strict_types=1);

require dirname(__DIR__, 2) . '/app/Controllers/LoginController.php';

$controller = new App\Controllers\LoginController();
$controller->index();
