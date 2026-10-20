<?php

declare(strict_types=1);

namespace App\Controllers;

final class LoginController
{
    public function index(): void
    {
        $title = 'Login do painel';
        $description = 'Prévia visual da área administrativa da Ràmaga.';
        $stylesheet = '/assets/css/login.css';

        ob_start();
        require dirname(__DIR__) . '/Views/pages/login.php';
        $content = ob_get_clean();

        if ($content === false) {
            throw new \RuntimeException('Não foi possível renderizar a prévia do login.');
        }

        require dirname(__DIR__) . '/Views/layouts/main.php';
    }
}
