<aside class="admin-sidebar" data-admin-sidebar>
    <div class="admin-sidebar__brand-row">
        <a class="admin-sidebar__brand" href="/" aria-label="Ràmaga — voltar ao site">
            <img src="/assets/images/logo.png" alt="Ràmaga Pró-Estética" width="213" height="96">
        </a>
        <button class="admin-sidebar__close" type="button" aria-label="Fechar navegação" data-sidebar-close>×</button>
    </div>
    <p class="admin-sidebar__caption">PAINEL ADMINISTRATIVO</p>
    <nav aria-label="Navegação do painel">
        <p class="admin-nav__group-label">Workspace</p>
        <a class="admin-nav__link" href="/painel/#overview">
            <span class="admin-nav__icon" aria-hidden="true">⌂</span>
            Visão geral
        </a>
        <a class="admin-nav__link<?= in_array(($title ?? ''), ['Páginas de vendas', 'Editor visual'], true) ? ' is-active' : '' ?>" href="/painel/#pages-list"<?= in_array(($title ?? ''), ['Páginas de vendas', 'Editor visual'], true) ? ' aria-current="page"' : '' ?>>
            <span class="admin-nav__icon" aria-hidden="true">▤</span>
            Páginas de vendas
            <span class="admin-nav__count">5</span>
        </a>
        <button class="admin-nav__link admin-nav__link--disabled" type="button" aria-disabled="true" data-pending-area="Cursos e produtos">
            <span class="admin-nav__icon" aria-hidden="true">◇</span>
            Cursos e produtos
            <span class="admin-nav__soon">Em breve</span>
        </button>
        <button class="admin-nav__link admin-nav__link--disabled" type="button" aria-disabled="true" data-pending-area="Biblioteca de imagens">
            <span class="admin-nav__icon" aria-hidden="true">▧</span>
            Biblioteca de imagens
            <span class="admin-nav__soon">Em breve</span>
        </button>
        <p class="admin-nav__group-label admin-nav__group-label--spaced">Preferências</p>
        <button class="admin-nav__link admin-nav__link--disabled" type="button" aria-disabled="true" data-pending-area="Configurações">
            <span class="admin-nav__icon" aria-hidden="true">⚙</span>
            Configurações
            <span class="admin-nav__soon">Em breve</span>
        </button>
    </nav>
    <div class="admin-sidebar__bottom">
        <div class="prototype-help">
            <span class="prototype-help__icon" aria-hidden="true">i</span>
            <div>
                <strong>Ambiente de demonstração</strong>
                <p>Dados e ações não são salvos.</p>
            </div>
        </div>
        <a class="admin-sidebar__site-link" href="/">
            <span aria-hidden="true">↗</span> Voltar ao site
        </a>
    </div>
</aside>
