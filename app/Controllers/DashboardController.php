<?php

declare(strict_types=1);

namespace App\Controllers;

final class DashboardController
{
    public function index(): void
    {
        $title = 'Páginas de vendas';
        $description = 'Protótipo demonstrativo do painel administrativo da Ràmaga.';
        $stylesheet = '/assets/css/panel.css';
        $script = '/assets/js/panel.js';
        $pages = [
            [
                'id' => 1,
                'name' => 'Curso de Limpeza de Pele Avançado',
                'course' => 'Limpeza de Pele Avançado',
                'template' => 'Clássico com banner',
                'template_key' => 'classico',
                'status' => 'Publicada',
                'status_key' => 'publicada',
                'updated' => 'Hoje, 14:32',
                'slug' => 'limpeza-de-pele-avancado',
            ],
            [
                'id' => 2,
                'name' => 'Massagem Lipo Modeladora',
                'course' => 'Massagem Lipo Modeladora',
                'template' => 'Moderno com VSL',
                'template_key' => 'moderno',
                'status' => 'Rascunho',
                'status_key' => 'rascunho',
                'updated' => 'Hoje, 11:08',
                'slug' => 'massagem-lipo-modeladora',
            ],
            [
                'id' => 3,
                'name' => 'Pós-graduação em Estética Avançada',
                'course' => 'Pós-graduação',
                'template' => 'Clássico com banner',
                'template_key' => 'classico',
                'status' => 'Publicada',
                'status_key' => 'publicada',
                'updated' => 'Ontem, 16:45',
                'slug' => 'pos-graduacao-estetica-avancada',
            ],
            [
                'id' => 4,
                'name' => 'Terapias Capilares',
                'course' => 'Terapias Capilares',
                'template' => 'Moderno com VSL',
                'template_key' => 'moderno',
                'status' => 'Rascunho',
                'status_key' => 'rascunho',
                'updated' => '20 out, 10:12',
                'slug' => 'terapias-capilares',
            ],
            [
                'id' => 5,
                'name' => 'Workshop de Tecnologias Faciais',
                'course' => 'Workshop',
                'template' => 'Clássico com banner',
                'template_key' => 'classico',
                'status' => 'Rascunho',
                'status_key' => 'rascunho',
                'updated' => '19 out, 09:26',
                'slug' => 'workshop-tecnologias-faciais',
            ],
        ];

        ob_start();
        require dirname(__DIR__) . '/Views/pages/dashboard.php';
        $content = ob_get_clean();

        if ($content === false) {
            throw new \RuntimeException('Não foi possível renderizar o protótipo do painel.');
        }

        require dirname(__DIR__) . '/Views/layouts/admin.php';
    }

    public function editor(): void
    {
        $title = 'Editor visual';
        $description = 'Protótipo do editor visual de páginas de vendas da Ràmaga.';
        $stylesheet = '/assets/css/panel.css';
        $script = '/assets/js/panel.js';
        $editorPages = [
            1 => ['name' => 'Curso de Limpeza de Pele Avançado', 'slug' => 'limpeza-de-pele-avancado', 'template' => 'classico'],
            2 => ['name' => 'Massagem Lipo Modeladora', 'slug' => 'massagem-lipo-modeladora', 'template' => 'moderno'],
            3 => ['name' => 'Pós-graduação em Estética Avançada', 'slug' => 'pos-graduacao-estetica-avancada', 'template' => 'classico'],
            4 => ['name' => 'Terapias Capilares', 'slug' => 'terapias-capilares', 'template' => 'moderno'],
            5 => ['name' => 'Workshop de Tecnologias Faciais', 'slug' => 'workshop-tecnologias-faciais', 'template' => 'classico'],
        ];
        $requestedPage = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT);
        $editorPage = $editorPages[$requestedPage ?: 1] ?? $editorPages[1];
        $pageName = $editorPage['name'];

        ob_start();
        require dirname(__DIR__) . '/Views/pages/editor.php';
        $content = ob_get_clean();

        if ($content === false) {
            throw new \RuntimeException('Não foi possível renderizar o protótipo do editor.');
        }

        require dirname(__DIR__) . '/Views/layouts/admin.php';
    }
}
