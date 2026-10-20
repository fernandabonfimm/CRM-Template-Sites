<?php

$navigation = [
    ['label' => 'Sobre nós', 'url' => 'https://www.ramagaproestetica.com.br/sobre-nos/'],
    ['label' => 'Locações', 'url' => 'https://www.ramagaproestetica.com.br/locacoes-de-equipamentos/'],
    ['label' => 'Pós-graduação', 'url' => 'https://www.ramagaproestetica.com.br/pos-graduacao/'],
];
$courseCategories = [
    ['label' => 'Terapias capilares', 'url' => 'https://www.ramagaproestetica.com.br/categoria-produto/terapias-capilares/'],
    ['label' => 'Micropigmentação', 'url' => 'https://www.ramagaproestetica.com.br/categoria-produto/cursos-presenciais/curso-micropigmentacao/'],
    ['label' => 'Faciais', 'url' => 'https://www.ramagaproestetica.com.br/categoria-produto/cursos-presenciais/cursos-faciais/'],
    ['label' => 'Corporais', 'url' => 'https://www.ramagaproestetica.com.br/categoria-produto/cursos-presenciais/curso-corporal/'],
    ['label' => 'Saúde e estética', 'url' => 'https://www.ramagaproestetica.com.br/categoria-produto/cursos-presenciais/saude-e-estetica/'],
    ['label' => 'Embelezamento do olhar', 'url' => 'https://www.ramagaproestetica.com.br/categoria-produto/cursos-presenciais/embelezamento-do-olhar-cursos-presenciais/'],
    ['label' => 'Tecnologia avançada', 'url' => 'https://www.ramagaproestetica.com.br/categoria-produto/cursos-presenciais/tecnologia-avancada/'],
    ['label' => 'Workshops', 'url' => 'https://www.ramagaproestetica.com.br/categoria-produto/cursos-presenciais/workshops/'],
    ['label' => 'Cursos on-line', 'url' => 'https://www.ramagaproestetica.com.br/categoria-produto/cursos-ao-vivo/'],
];
?>
<header class="site-header" data-site-header>
    <div class="site-header__inner">
        <a class="brand" href="/" aria-label="Ràmaga Pró-Estética — página inicial">
            <img src="/assets/images/logo.png" alt="Ràmaga Pró-Estética" width="213" height="96">
        </a>
        <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="primary-navigation" data-menu-toggle>
            <span class="menu-toggle__icon" aria-hidden="true"></span>
            <span class="menu-toggle__label">Menu</span>
        </button>
        <nav class="primary-navigation" id="primary-navigation" aria-label="Navegação principal" data-primary-navigation>
            <ul class="navigation-list">
                <?php foreach ($navigation as $item): ?>
                    <li><a href="<?= htmlspecialchars($item['url'], ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($item['label'], ENT_QUOTES, 'UTF-8') ?></a></li>
                <?php endforeach; ?>
                <li class="navigation-courses" data-navigation-courses>
                    <div class="navigation-courses__top">
                        <a href="https://www.ramagaproestetica.com.br/cursos/">Cursos</a>
                        <button type="button" aria-expanded="false" aria-controls="courses-menu" aria-label="Abrir categorias de cursos" data-courses-toggle>
                            <span aria-hidden="true">⌄</span>
                        </button>
                    </div>
                    <div class="mega-menu" id="courses-menu" data-courses-menu hidden>
                        <p class="mega-menu__heading">Encontre sua próxima formação</p>
                        <div class="mega-menu__grid">
                            <?php foreach ($courseCategories as $category): ?>
                                <a href="<?= htmlspecialchars($category['url'], ENT_QUOTES, 'UTF-8') ?>">
                                    <?= htmlspecialchars($category['label'], ENT_QUOTES, 'UTF-8') ?><span aria-hidden="true">↗</span>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </li>
                <li><a href="https://www.ramagaproestetica.com.br/blog/">Blog</a></li>
                <li><a href="https://www.ramagaproestetica.com.br/contato/">Contato</a></li>
                <li><a href="https://www.ramagaproestetica.com.br/categoria-produto/produtos/">Loja virtual</a></li>
                <li class="navigation-mobile-actions">
                    <a class="button button--dark" href="https://wa.me/5516981960027" target="_blank" rel="noopener noreferrer">Fale conosco <span aria-hidden="true">↗</span></a>
                    <a class="button button--outline" href="/login/">Login do painel <span aria-hidden="true">↗</span></a>
                </li>
            </ul>
        </nav>
        <div class="header-actions">
            <a class="header-login" href="/login/">Login <span aria-hidden="true">↗</span></a>
            <a class="header-contact" href="https://wa.me/5516981960027" target="_blank" rel="noopener noreferrer">
                Fale conosco <span aria-hidden="true">↗</span>
            </a>
        </div>
    </div>
</header>
