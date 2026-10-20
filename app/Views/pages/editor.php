<section class="editor-page">
    <div class="editor-toolbar">
        <a class="editor-back" href="/painel/"><span aria-hidden="true">←</span> Todas as páginas</a>
        <div class="editor-toolbar__title">
            <strong><?= htmlspecialchars($pageName, ENT_QUOTES, 'UTF-8') ?></strong>
            <span class="status-pill status-pill--rascunho"><span class="status-dot"></span>Rascunho demonstrativo</span>
        </div>
        <div class="editor-toolbar__actions">
            <span class="save-indicator"><span aria-hidden="true">●</span> Protótipo</span>
            <button class="panel-button panel-button--quiet editor-preview-new" type="button" data-demo-action="A visualização pública será habilitada quando a página estiver conectada ao sistema.">Visualizar</button>
            <button class="panel-button panel-button--quiet" type="button" data-demo-action="Demonstração: não há alterações salvas no servidor.">Salvar rascunho</button>
            <button class="panel-button panel-button--primary" type="button" data-demo-action="Demonstração: publicação não executada. Nenhuma URL pública foi criada.">Publicar</button>
        </div>
    </div>

    <div class="editor-subtoolbar">
        <span>EDITOR VISUAL <span aria-hidden="true">/</span> PÁGINA DE VENDAS</span>
        <div class="device-switch" role="group" aria-label="Tamanho da prévia">
            <button class="is-active" type="button" aria-pressed="true" data-preview-device="desktop"><span aria-hidden="true">▰</span><span>Desktop</span></button>
            <button type="button" aria-pressed="false" data-preview-device="tablet"><span aria-hidden="true">▣</span><span>Tablet</span></button>
            <button type="button" aria-pressed="false" data-preview-device="mobile"><span aria-hidden="true">▯</span><span>Mobile</span></button>
        </div>
    </div>

    <div class="editor-layout">
        <aside class="editor-settings" aria-label="Configurações da página">
            <div class="editor-settings__heading">
                <h1>Personalização</h1>
                <p>Configure os elementos da página.</p>
            </div>
            <details class="settings-group" open>
                <summary>Informações gerais <span aria-hidden="true">⌄</span></summary>
                <div class="settings-group__body">
                    <label class="panel-field"><span>Nome interno</span><input value="<?= htmlspecialchars($pageName, ENT_QUOTES, 'UTF-8') ?>" data-editor-field="name"></label>
                    <label class="panel-field"><span>Modelo da página</span><select data-editor-template><option value="moderno"<?= $editorPage['template'] === 'moderno' ? ' selected' : '' ?>>Moderno com VSL</option><option value="classico"<?= $editorPage['template'] === 'classico' ? ' selected' : '' ?>>Clássico com banner</option></select></label>
                    <label class="panel-field"><span>Slug</span><div class="slug-field"><span>/p/</span><input value="<?= htmlspecialchars($editorPage['slug'], ENT_QUOTES, 'UTF-8') ?>"></div></label>
                </div>
            </details>
            <details class="settings-group" open>
                <summary>Banner principal <span aria-hidden="true">⌄</span></summary>
                <div class="settings-group__body">
                    <label class="panel-field"><span>Texto superior</span><input value="FORMAÇÃO QUE TRANSFORMA" data-editor-field="eyebrow"></label>
                    <label class="panel-field"><span>Título principal</span><textarea rows="3" data-editor-field="title">A ciência por trás de cada transformação.</textarea></label>
                    <label class="panel-field"><span>Subtítulo</span><textarea rows="3" data-editor-field="description">Aprenda técnicas, domine tecnologias e evolua na estética com conhecimento que transforma sua carreira.</textarea></label>
                    <label class="panel-field"><span>Botão principal</span><input value="Conheça o curso" data-editor-field="button"></label>
                    <button class="image-picker" type="button" data-demo-action="A biblioteca de imagens estará disponível quando for conectada ao servidor."><span aria-hidden="true">▧</span> Selecionar imagem <span>Biblioteca</span></button>
                </div>
            </details>
            <details class="settings-group" data-vsl-settings hidden>
                <summary>Vídeo de vendas <span aria-hidden="true">⌄</span></summary>
                <div class="settings-group__body">
                    <label class="panel-field"><span>Título da seção</span><input value="Conheça a formação"></label>
                    <label class="panel-field"><span>Link do vídeo</span><input type="url" placeholder="https://youtube.com/..."></label>
                    <p class="field-note">Prévia visual. URLs de vídeo ainda não são validadas.</p>
                </div>
            </details>
            <details class="settings-group">
                <summary>Cores e tipografia <span aria-hidden="true">⌄</span></summary>
                <div class="settings-group__body">
                    <label class="panel-field"><span>Cor de destaque</span><div class="color-field"><input type="color" value="#695e49" data-editor-field="color"><span>#695E49</span></div></label>
                    <label class="panel-field"><span>Tipografia</span><select><option>Open Sans</option><option>Cormorant Garamond nos títulos</option></select></label>
                    <button class="panel-link-button" type="button" data-demo-action="As cores padrão foram preservadas nesta demonstração.">Restaurar padrão do modelo</button>
                </div>
            </details>
            <details class="settings-group">
                <summary>Seções da página <span aria-hidden="true">⌄</span></summary>
                <div class="settings-group__body section-order-list" data-section-list>
                    <div class="section-order-item"><span class="section-drag" aria-hidden="true">⠿</span><label><input type="checkbox" checked> Apresentação do curso</label><button type="button" aria-label="Mover apresentação para cima" data-section-up>↑</button><button type="button" aria-label="Mover apresentação para baixo" data-section-down>↓</button></div>
                    <div class="section-order-item"><span class="section-drag" aria-hidden="true">⠿</span><label><input type="checkbox" checked> Benefícios</label><button type="button" aria-label="Mover benefícios para cima" data-section-up>↑</button><button type="button" aria-label="Mover benefícios para baixo" data-section-down>↓</button></div>
                    <div class="section-order-item"><span class="section-drag" aria-hidden="true">⠿</span><label><input type="checkbox" checked> Conteúdo programático</label><button type="button" aria-label="Mover conteúdo programático para cima" data-section-up>↑</button><button type="button" aria-label="Mover conteúdo programático para baixo" data-section-down>↓</button></div>
                    <div class="section-order-item"><span class="section-drag" aria-hidden="true">⠿</span><label><input type="checkbox" checked> Investimento</label><button type="button" aria-label="Mover investimento para cima" data-section-up>↑</button><button type="button" aria-label="Mover investimento para baixo" data-section-down>↓</button></div>
                    <button class="panel-link-button" type="button" data-demo-action="Este protótipo demonstra seções predefinidas; a inclusão e edição ainda não são persistidas.">+ Adicionar seção predefinida</button>
                </div>
            </details>
            <details class="settings-group">
                <summary>Card de investimento <span aria-hidden="true">⌄</span></summary>
                <div class="settings-group__body">
                    <label class="panel-field"><span>Nome da oferta</span><input value="Formação completa"></label>
                    <label class="panel-field"><span>Preço atual</span><input placeholder="Informe o preço oficial"></label>
                    <p class="field-note">Preço, parcelamento e benefícios dependem do cadastro oficial do curso.</p>
                </div>
            </details>
            <details class="settings-group">
                <summary>Botões, links e SEO <span aria-hidden="true">⌄</span></summary>
                <div class="settings-group__body">
                    <label class="panel-field"><span>Link do checkout</span><input type="url" placeholder="https://"></label>
                    <label class="panel-field"><span>Título para mecanismos de busca</span><input value="<?= htmlspecialchars($pageName, ENT_QUOTES, 'UTF-8') ?>"></label>
                </div>
            </details>
        </aside>

        <section class="editor-preview-area" aria-label="Prévia da página">
            <div class="editor-preview-area__top"><span>Prévia não publicada</span><span class="preview-width" data-preview-width>100%</span></div>
            <div class="editor-preview-frame" data-preview-frame>
                <article class="sales-preview" data-sales-preview>
                    <header class="sales-preview__header"><span class="sales-preview__logo">ràmaga</span><span>Formação profissional</span><span>Sobre&nbsp;&nbsp;&nbsp; Cursos&nbsp;&nbsp;&nbsp; Contato</span></header>
                    <section class="sales-preview__hero">
                        <div class="sales-preview__copy">
                            <span class="sales-preview__eyebrow" data-preview-text="eyebrow">FORMAÇÃO QUE TRANSFORMA</span>
                            <h2 data-preview-text="title">A ciência por trás de cada transformação.</h2>
                            <p data-preview-text="description">Aprenda técnicas, domine tecnologias e evolua na estética com conhecimento que transforma sua carreira.</p>
                            <button type="button" data-preview-text="button">Conheça o curso <span aria-hidden="true">↗</span></button>
                        </div>
                        <div class="sales-preview__image"><img src="/assets/images/home/recepcao-para-banner-principal.jpeg" alt=""></div>
                    </section>
                    <section class="sales-preview__vsl" data-preview-vsl hidden>
                        <span>VÍDEO DE APRESENTAÇÃO</span>
                        <div aria-hidden="true">▶</div>
                        <strong>Conheça a formação</strong>
                    </section>
                    <section class="sales-preview__sections" data-preview-section="Apresentação do curso">
                        <span>FORMAÇÃO RÀMAGA</span>
                        <h3>Conhecimento que vai além da teoria.</h3>
                        <div><i></i><i></i><i></i></div>
                    </section>
                    <section class="sales-preview__sections" data-preview-section="Benefícios">
                        <span>BENEFÍCIOS</span>
                        <h3>Aprendizado para a prática profissional.</h3>
                        <div><i></i><i></i><i></i></div>
                    </section>
                    <section class="sales-preview__sections" data-preview-section="Conteúdo programático">
                        <span>CONTEÚDO PROGRAMÁTICO</span>
                        <h3>Uma jornada de conhecimento.</h3>
                        <div><i></i><i></i><i></i></div>
                    </section>
                    <section class="sales-preview__price" data-preview-section="Investimento"><span>INVESTIMENTO</span><h3>Uma formação para seu próximo passo.</h3><button type="button">Saiba mais</button></section>
                    <footer class="sales-preview__footer">RÀMAGA · ESTÉTICA · CURSOS · TECNOLOGIA</footer>
                </article>
            </div>
            <div class="preview-disclaimer"><span aria-hidden="true">i</span> Prévia ilustrativa. Esta página ainda não está publicada e não está vinculada aos dados reais do curso.</div>
        </section>
    </div>
</section>
