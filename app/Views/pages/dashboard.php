<?php

$publishedCount = count(array_filter($pages, static fn (array $page): bool => $page['status_key'] === 'publicada'));
$draftCount = count(array_filter($pages, static fn (array $page): bool => $page['status_key'] === 'rascunho'));
$escape = static fn (string $value): string => htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
?>
<section class="dashboard-page" id="overview" aria-labelledby="dashboard-title">
    <div class="demo-banner">
        <span class="demo-banner__dot" aria-hidden="true"></span>
        <span><strong>Protótipo de apresentação</strong> · Conteúdo ilustrativo. Ainda não conectado ao banco de dados.</span>
        <button type="button" class="demo-banner__dismiss" aria-label="Dispensar aviso" data-dismiss-demo>×</button>
    </div>

    <div class="dashboard-heading">
        <div>
            <p class="panel-eyebrow">Workspace / páginas</p>
            <h1 id="dashboard-title">Páginas de vendas</h1>
            <p class="dashboard-heading__description">Crie, personalize e publique páginas para seus cursos.</p>
        </div>
        <button class="panel-button panel-button--primary" type="button" data-open-wizard>
            <span aria-hidden="true">＋</span> Criar nova página
        </button>
    </div>

    <div class="metric-grid" aria-label="Indicadores demonstrativos">
        <article class="metric-card">
            <span class="metric-card__label">Total de páginas <span class="metric-card__icon" aria-hidden="true">▤</span></span>
            <strong class="metric-card__value" data-metric-total><?= count($pages) ?></strong>
            <span class="metric-card__note">Em demonstração</span>
        </article>
        <article class="metric-card">
            <span class="metric-card__label">Publicadas <span class="metric-card__icon metric-card__icon--teal" aria-hidden="true">↗</span></span>
            <strong class="metric-card__value" data-metric-published><?= $publishedCount ?></strong>
            <span class="metric-card__note"><span class="status-dot status-dot--published"></span> Disponíveis no exemplo</span>
        </article>
        <article class="metric-card">
            <span class="metric-card__label">Rascunhos <span class="metric-card__icon metric-card__icon--gold" aria-hidden="true">◷</span></span>
            <strong class="metric-card__value" data-metric-drafts><?= $draftCount ?></strong>
            <span class="metric-card__note"><span class="status-dot status-dot--draft"></span> Em edição no exemplo</span>
        </article>
    </div>

    <section class="pages-panel" aria-labelledby="recent-pages-title">
        <div class="pages-panel__heading">
            <div>
                <h2 id="recent-pages-title">Páginas recentes</h2>
                <p>Acompanhe as páginas de cursos neste protótipo.</p>
            </div>
            <a class="panel-link" href="#pages-list">Ver todas <span aria-hidden="true">→</span></a>
        </div>

        <div class="pages-toolbar">
            <label class="search-field">
                <span class="sr-only">Buscar página por nome ou curso</span>
                <span aria-hidden="true">⌕</span>
                <input type="search" placeholder="Buscar por nome ou curso..." data-page-search>
                <kbd>⌘ K</kbd>
            </label>
            <label class="filter-select">
                <span class="sr-only">Filtrar por status</span>
                <select data-status-filter>
                    <option value="todos">Todos os status</option>
                    <option value="publicada">Publicadas</option>
                    <option value="rascunho">Rascunhos</option>
                </select>
            </label>
            <button class="panel-button panel-button--quiet" type="button" data-demo-action="A lista já está ordenada pela atualização mais recente.">
                <span aria-hidden="true">☷</span> Mais recentes
            </button>
        </div>

        <div class="pages-table-wrap" id="pages-list">
            <table class="pages-table">
                <thead>
                    <tr>
                        <th scope="col">Página / curso</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">Status</th>
                        <th scope="col">Atualizada</th>
                        <th scope="col"><span class="sr-only">Ações</span></th>
                    </tr>
                </thead>
                <tbody data-pages-body>
                    <?php foreach ($pages as $page): ?>
                        <tr data-page-row data-page-id="<?= $page['id'] ?>" data-page-name="<?= $escape($page['name']) ?>" data-page-course="<?= $escape($page['course']) ?>" data-page-status="<?= $escape($page['status_key']) ?>">
                            <td>
                                <div class="page-name-cell">
                                    <span class="page-name-cell__thumbnail page-name-cell__thumbnail--<?= $escape($page['template_key']) ?>" aria-hidden="true">
                                        <span>R.</span>
                                    </span>
                                    <span class="page-name-cell__copy">
                                        <strong><?= $escape($page['name']) ?></strong>
                                        <small><?= $escape($page['course']) ?></small>
                                    </span>
                                </div>
                            </td>
                            <td><span class="template-label"><?= $escape($page['template']) ?></span></td>
                            <td><span class="status-pill status-pill--<?= $escape($page['status_key']) ?>"><span class="status-dot"></span><?= $escape($page['status']) ?></span></td>
                            <td><span class="updated-label"><?= $escape($page['updated']) ?></span></td>
                            <td>
                                <div class="row-actions">
                                    <a class="icon-button" href="/painel/editor/?page=<?= $page['id'] ?>" aria-label="Editar <?= $escape($page['name']) ?>" title="Editar"><span aria-hidden="true">↗</span></a>
                                    <button class="icon-button" type="button" aria-label="Mais ações para <?= $escape($page['name']) ?>" title="Mais ações" data-row-menu-toggle><span aria-hidden="true">···</span></button>
                                    <div class="row-menu" hidden>
                                        <button type="button" data-demo-action="Prévia demonstrativa: esta página ainda não tem uma versão pública conectada.">Visualizar prévia</button>
                                        <button type="button" data-demo-action="Link ilustrativo: a página ainda não foi publicada pelo sistema.">Copiar link</button>
                                        <button type="button" data-demo-action="A duplicação será habilitada quando o painel estiver conectado aos dados.">Duplicar</button>
                                        <button type="button" data-demo-action="Publicação indisponível: esta é apenas uma demonstração visual.">Publicar / despublicar</button>
                                        <button type="button" data-demo-action="Exclusão indisponível no protótipo demonstrativo.">Excluir página</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="empty-state" data-empty-state hidden>
                <span aria-hidden="true">⌕</span>
                <strong>Nenhuma página encontrada</strong>
                <p>Tente ajustar a busca ou o filtro de status.</p>
            </div>
        </div>
        <div class="pages-panel__footer">
            <span>Exibindo <strong data-visible-count><?= count($pages) ?></strong> de <?= count($pages) ?> páginas demonstrativas</span>
            <span>Dados de exemplo · sem persistência</span>
        </div>
    </section>

    <footer class="admin-page-footer">
        <span>Ràmaga · Painel administrativo</span>
        <span>Prévia de interface · <?= date('Y') ?></span>
    </footer>
</section>

<div class="wizard-backdrop" data-wizard-backdrop hidden>
    <section class="page-wizard" role="dialog" aria-modal="true" aria-labelledby="wizard-title" aria-describedby="wizard-description" data-page-wizard>
        <div class="page-wizard__header">
            <div>
                <p class="panel-eyebrow">Nova página de vendas</p>
                <h2 id="wizard-title">Vamos começar</h2>
                <p id="wizard-description">Configure a apresentação da sua nova página.</p>
            </div>
            <button class="icon-button wizard-close" type="button" aria-label="Fechar criação de página" data-close-wizard>×</button>
        </div>
        <div class="wizard-progress" aria-label="Etapas da criação">
            <span class="wizard-progress__step is-current" data-wizard-progress="1"><span>1</span> Informações</span>
            <span class="wizard-progress__line"></span>
            <span class="wizard-progress__step" data-wizard-progress="2"><span>2</span> Modelo</span>
            <span class="wizard-progress__line"></span>
            <span class="wizard-progress__step" data-wizard-progress="3"><span>3</span> Personalização</span>
            <span class="wizard-progress__line"></span>
            <span class="wizard-progress__step" data-wizard-progress="4"><span>4</span> Revisão</span>
        </div>
        <form class="wizard-form" data-wizard-form>
            <section class="wizard-step is-active" data-wizard-step="1">
                <h3>Informações básicas</h3>
                <p>Defina como a página será identificada no painel e apresentada ao público.</p>
                <div class="wizard-form__grid">
                    <label class="panel-field panel-field--full">
                        <span>Nome interno da página <i>*</i></span>
                        <input name="page-name" required placeholder="Ex.: Curso de Limpeza de Pele Avançado">
                    </label>
                    <label class="panel-field panel-field--full">
                        <span>Título principal</span>
                        <input name="page-title" placeholder="O título que aparece na página">
                    </label>
                    <label class="panel-field">
                        <span>Curso relacionado</span>
                        <input name="course-name" placeholder="Nome do curso">
                    </label>
                    <label class="panel-field">
                        <span>Slug da página</span>
                        <div class="slug-field"><span>/p/</span><input name="page-slug" placeholder="nome-do-curso"></div>
                    </label>
                    <label class="panel-field panel-field--full">
                        <span>Descrição curta</span>
                        <textarea name="page-description" rows="3" placeholder="Uma breve apresentação da formação"></textarea>
                    </label>
                </div>
                <p class="field-note">Os dados serão usados somente nesta demonstração e não serão salvos.</p>
            </section>
            <section class="wizard-step" data-wizard-step="2" hidden>
                <h3>Escolha um modelo</h3>
                <p>Selecione um ponto de partida. O conteúdo poderá ser ajustado no editor visual.</p>
                <div class="template-choice-grid">
                    <label class="template-choice is-selected" data-template-choice="moderno">
                        <input type="radio" name="template" value="moderno" checked>
                        <span class="template-choice__preview template-choice__preview--modern">
                            <span class="template-choice__preview-bar"></span>
                            <span class="template-choice__preview-hero"><i></i><b></b></span>
                            <span class="template-choice__preview-video">Vídeo de apresentação</span>
                        </span>
                        <span class="template-choice__details"><strong>Moderno com VSL</strong><span>Banner, vídeo de vendas e seções de conteúdo em destaque.</span><b>Escolher modelo <span aria-hidden="true">→</span></b></span>
                    </label>
                    <label class="template-choice" data-template-choice="classico">
                        <input type="radio" name="template" value="classico">
                        <span class="template-choice__preview template-choice__preview--classic">
                            <span class="template-choice__preview-bar"></span>
                            <span class="template-choice__preview-hero"><i></i><b></b></span>
                            <span class="template-choice__preview-cards"><i></i><i></i><i></i></span>
                        </span>
                        <span class="template-choice__details"><strong>Clássico com banner</strong><span>Uma apresentação direta com banner e informações do curso.</span><b>Escolher modelo <span aria-hidden="true">→</span></b></span>
                    </label>
                </div>
            </section>
            <section class="wizard-step" data-wizard-step="3" hidden>
                <h3>Personalize a apresentação</h3>
                <p>Edite o texto e acompanhe a prévia ilustrativa ao lado.</p>
                <div class="wizard-customize">
                    <div class="wizard-form__grid">
                        <label class="panel-field panel-field--full">
                            <span>Texto de abertura</span>
                            <input name="hero-eyebrow" value="FORMAÇÃO QUE TRANSFORMA" data-live-field="eyebrow">
                        </label>
                        <label class="panel-field panel-field--full">
                            <span>Título principal</span>
                            <textarea name="hero-title" rows="3" data-live-field="title">Aprenda técnicas e evolua na estética.</textarea>
                        </label>
                        <label class="panel-field panel-field--full">
                            <span>Texto de apresentação</span>
                            <textarea name="hero-description" rows="3" data-live-field="description">Conhecimento, prática e tecnologia para acompanhar sua trajetória profissional.</textarea>
                        </label>
                        <label class="panel-field panel-field--full">
                            <span>Cor de destaque</span>
                            <div class="color-field"><input type="color" name="accent-color" value="#695e49" data-live-field="color"><span>#695E49</span></div>
                        </label>
                    </div>
                    <div class="wizard-mini-preview" data-wizard-preview>
                        <span class="wizard-mini-preview__eyebrow" data-preview-eyebrow>FORMAÇÃO QUE TRANSFORMA</span>
                        <strong data-preview-title>Aprenda técnicas e evolua na estética.</strong>
                        <span data-preview-description>Conhecimento, prática e tecnologia para acompanhar sua trajetória profissional.</span>
                        <span class="wizard-mini-preview__cta">Conheça o curso <span aria-hidden="true">↗</span></span>
                    </div>
                </div>
            </section>
            <section class="wizard-step" data-wizard-step="4" hidden>
                <h3>Revise os dados</h3>
                <p>Confira as informações antes de concluir esta etapa de demonstração.</p>
                <dl class="wizard-review">
                    <div><dt>Nome da página</dt><dd data-review-name>—</dd></div>
                    <div><dt>Curso</dt><dd data-review-course>—</dd></div>
                    <div><dt>Slug ilustrativo</dt><dd data-review-slug>—</dd></div>
                    <div><dt>Modelo selecionado</dt><dd data-review-template>Moderno com VSL</dd></div>
                </dl>
                <div class="wizard-disclaimer"><strong>Importante</strong><span>Este protótipo não cria, salva ou publica páginas. O fluxo demonstra a experiência visual planejada para o painel.</span></div>
            </section>
            <div class="wizard-actions">
                <button class="panel-button panel-button--quiet" type="button" data-wizard-back hidden>Voltar</button>
                <span class="wizard-actions__spacer"></span>
                <button class="panel-button panel-button--quiet" type="button" data-close-wizard>Cancelar</button>
                <button class="panel-button panel-button--primary" type="button" data-wizard-next>Continuar <span aria-hidden="true">→</span></button>
                <button class="panel-button panel-button--primary" type="button" data-wizard-done hidden>Concluir demonstração <span aria-hidden="true">→</span></button>
            </div>
        </form>
    </section>
</div>
