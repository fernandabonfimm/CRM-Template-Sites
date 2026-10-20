<?php

declare(strict_types=1);

require dirname(__DIR__, 3) . '/app/Controllers/DashboardController.php';

$controller = new App\Controllers\DashboardController();
$controller->editor();
