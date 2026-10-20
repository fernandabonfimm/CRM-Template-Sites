<?php

declare(strict_types=1);

namespace App\Controllers;

final class HomeController
{
    public function index(): void
    {
        ob_start();
        require dirname(__DIR__) . '/Views/pages/home.php';
        $content = ob_get_clean();

        if ($content === false) {
            throw new \RuntimeException('Não foi possível renderizar a página inicial.');
        }

        require dirname(__DIR__) . '/Views/layouts/main.php';
    }
}
