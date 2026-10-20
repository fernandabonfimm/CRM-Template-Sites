<?php

declare(strict_types=1);

require dirname(__DIR__) . '/app/Controllers/HomeController.php';

$controller = new App\Controllers\HomeController();
$controller->index();
