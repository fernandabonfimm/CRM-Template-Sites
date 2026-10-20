<header class="admin-topbar">
    <button class="admin-topbar__menu" type="button" aria-label="Abrir navegação do painel" aria-expanded="false" data-sidebar-toggle>☰</button>
    <div class="admin-topbar__context">
        <span class="admin-topbar__section">Painel administrativo</span>
        <span class="admin-topbar__separator">/</span>
        <span><?= htmlspecialchars($title ?? 'Painel', ENT_QUOTES, 'UTF-8') ?></span>
    </div>
    <div class="admin-topbar__actions">
        <a class="admin-topbar__view-site" href="/" target="_blank" rel="noopener noreferrer">Visualizar site <span aria-hidden="true">↗</span></a>
        <span class="admin-topbar__divider" aria-hidden="true"></span>
        <button class="admin-account" type="button" data-demo-action="Conta demonstrativa — acesso de demonstração, sem perfil autenticado." aria-label="Conta demonstrativa">
            <span class="admin-account__avatar">R</span>
            <span class="admin-account__details"><strong>Equipe Ràmaga</strong><small>Demonstração</small></span>
            <span aria-hidden="true">⌄</span>
        </button>
        <a class="admin-topbar__exit" href="/" aria-label="Sair do protótipo e voltar ao site">Sair</a>
    </div>
</header>
