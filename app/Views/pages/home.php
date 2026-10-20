<?php

$title = 'Formação em estética, cursos e tecnologia';
$description = 'Aprenda técnicas, conheça cursos de estética e explore soluções profissionais em formação e tecnologia com a Ràmaga.';

$coursesUrl = 'https://www.ramagaproestetica.com.br/cursos/';
$postgraduateUrl = 'https://www.ramagaproestetica.com.br/pos-graduacao/';
$rentalsUrl = 'https://www.ramagaproestetica.com.br/locacoes-de-equipamentos/';
$shopUrl = 'https://www.ramagaproestetica.com.br/categoria-produto/produtos/';
$blogUrl = 'https://www.ramagaproestetica.com.br/blog/';
$contactUrl = 'https://www.ramagaproestetica.com.br/contato/';
$whatsappUrl = 'https://wa.me/5516981960027';
$imageDirectory = dirname(__DIR__, 3) . '/public/assets/images/home/';
$hasBeforeAfter = is_file($imageDirectory . 'hero-antes.jpg')
    && is_file($imageDirectory . 'hero-depois.jpg');

$quickLinks = [
    [
        'eyebrow' => 'Formação presencial e on-line',
        'title' => 'Cursos livres',
        'description' => 'Aprenda técnicas faciais e corporais com formação prática e orientação especializada.',
        'label' => 'Explorar cursos',
        'url' => $coursesUrl,
        'image' => '/assets/images/home/RAFA.jpg',
        'alt' => 'Retrato institucional disponibilizado pela Ràmaga',
        'class' => 'quick-card--courses',
    ],
    [
        'eyebrow' => 'Especialização',
        'title' => 'Pós-graduação',
        'description' => 'Amplie seus conhecimentos e desenvolva novas competências para sua trajetória profissional.',
        'label' => 'Conhecer programas',
        'url' => $postgraduateUrl,
        'image' => '/assets/images/home/recepcao-para-banner-principal.jpeg',
        'alt' => 'Ambiente da Ràmaga Pró-Estética',
        'class' => 'quick-card--postgraduate',
    ],
    [
        'eyebrow' => 'Tecnologia para clínicas',
        'title' => 'Locação de equipamentos',
        'description' => 'Acesse tecnologias para ampliar as possibilidades de atendimento da sua clínica.',
        'label' => 'Ver equipamentos',
        'url' => $rentalsUrl,
        'image' => '/assets/images/home/ADRIANA.jpg',
        'alt' => 'Retrato institucional disponibilizado pela Ràmaga',
        'class' => 'quick-card--rentals',
    ],
    [
        'eyebrow' => 'Produtos profissionais',
        'title' => 'Loja profissional',
        'description' => 'Encontre equipamentos, produtos e mobiliário para estruturar seu espaço de estética.',
        'label' => 'Conhecer a loja',
        'url' => $shopUrl,
        'image' => '/assets/images/home/recepcao.jpeg',
        'alt' => 'Espaço de recepção da Ràmaga',
        'class' => 'quick-card--shop',
    ],
];

$onlineCourses = [
    ['name' => 'Massagem Lipo Modeladora', 'price' => 'R$ 480,00'],
    ['name' => 'Bambuterapia Completo', 'price' => 'R$ 270,00'],
    ['name' => 'Massagem Relaxante', 'price' => 'R$ 390,00'],
    ['name' => 'Limpeza de Pele Avançado', 'price' => 'R$ 350,00'],
];

$testimonials = [
    [
        'name' => 'Nayane de C. Fernandes',
        'profession' => 'Biomédica',
        'quote' => 'A Ràmaga é um lugar que te transforma como profissional! Você sai de lá com outra mente, outra visão, outro posicionamento sobre tudo na estética! Já fiz dois cursos com a Dra. Gabriela e agora estou cursando a Pós-Graduação! Tudo perfeito!',
    ],
    [
        'name' => 'Thifany D. Pereira',
        'profession' => 'Enfermeira',
        'quote' => 'Acabei de me formar na Pós-Graduação da Ràmaga, estou muito feliz porque é a minha primeira experiência na estética avançada. A Ràmaga teve a função de me acolher e me ensinar cada vez mais. Todas as minhas dúvidas foram tiradas, foram muitos aprendizados. Foi um sonho realizado!',
    ],
];

$teamImages = [
    ['name' => 'Gabriela', 'src' => '/assets/images/home/GABRIELA.jpg'],
    ['name' => 'Adriana', 'src' => '/assets/images/home/ADRIANA.jpg'],
    ['name' => 'Rafa', 'src' => '/assets/images/home/RAFA.jpg'],
];
?>

<section class="hero" aria-labelledby="hero-title">
    <div class="hero-copy">
        <p class="eyebrow">Formação que transforma</p>
        <h1 id="hero-title">A ciência por trás de cada transformação.</h1>
        <p class="hero-description">
            Aprenda técnicas, domine tecnologias e evolua na estética com conhecimento que transforma sua carreira.
        </p>
        <div class="hero-actions">
            <a class="button button--dark" href="<?= htmlspecialchars($coursesUrl, ENT_QUOTES, 'UTF-8') ?>">
                Conheça nossos cursos <span aria-hidden="true">↗</span>
            </a>
            <a class="text-link" href="https://www.ramagaproestetica.com.br/sobre-nos/">
                Conheça a Ràmaga <span aria-hidden="true">→</span>
            </a>
        </div>
        <div class="hero-note">
            <span class="hero-note__line" aria-hidden="true"></span>
            Formação profissional em estética, pessoas e tecnologia.
        </div>
    </div>

    <div class="hero-visual">
        <img
            class="hero-visual__image"
            src="/assets/images/home/recepcao-para-banner-principal.jpeg"
            alt="Recepção da Ràmaga Pró-Estética"
            fetchpriority="high"
        >
        <?php if ($hasBeforeAfter): ?>
            <div class="comparison" data-comparison>
                <img class="comparison__image comparison__image--before" src="/assets/images/home/hero-antes.jpg" alt="Imagem anterior autorizada para comparação" data-comparison-before>
                <img class="comparison__image comparison__image--after" src="/assets/images/home/hero-depois.jpg" alt="Imagem posterior autorizada para comparação">
                <span class="comparison__label comparison__label--before">Antes</span>
                <span class="comparison__label comparison__label--after">Depois</span>
                <input
                    class="comparison__range"
                    type="range"
                    min="0"
                    max="100"
                    value="50"
                    aria-label="Arraste para comparar as imagens de antes e depois"
                    aria-valuetext="Comparação em 50 por cento"
                    data-comparison-range
                >
                <span class="comparison__handle" aria-hidden="true">↔</span>
            </div>
        <?php else: ?>
            <div class="comparison-placeholder" aria-label="Espaço reservado para o comparador de antes e depois">
                <span class="comparison-placeholder__icon" aria-hidden="true">↔</span>
                <p class="comparison-placeholder__eyebrow">Comparação antes e depois</p>
                <h2>Imagens oficiais em breve</h2>
                <p>O comparador será ativado quando as duas fotografias autorizadas do mesmo caso forem adicionadas.</p>
                <span class="comparison-placeholder__caption">Sem imagens clínicas ilustrativas</span>
            </div>
        <?php endif; ?>
        <span class="hero-visual__caption">Um espaço pensado para aprender e evoluir</span>
    </div>
</section>

<section class="quick-links section-shell" aria-label="Explore as áreas da Ràmaga">
    <?php foreach ($quickLinks as $card): ?>
        <a class="quick-card <?= htmlspecialchars($card['class'], ENT_QUOTES, 'UTF-8') ?>" href="<?= htmlspecialchars($card['url'], ENT_QUOTES, 'UTF-8') ?>">
            <img src="<?= htmlspecialchars($card['image'], ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($card['alt'], ENT_QUOTES, 'UTF-8') ?>" loading="lazy">
            <span class="quick-card__shade" aria-hidden="true"></span>
            <span class="quick-card__content">
                <span class="quick-card__eyebrow"><?= htmlspecialchars($card['eyebrow'], ENT_QUOTES, 'UTF-8') ?></span>
                <span class="quick-card__title"><?= htmlspecialchars($card['title'], ENT_QUOTES, 'UTF-8') ?></span>
                <span class="quick-card__description"><?= htmlspecialchars($card['description'], ENT_QUOTES, 'UTF-8') ?></span>
                <span class="quick-card__link"><?= htmlspecialchars($card['label'], ENT_QUOTES, 'UTF-8') ?> <span aria-hidden="true">↗</span></span>
            </span>
        </a>
    <?php endforeach; ?>
</section>

<section class="about-section section-shell" id="sobre">
    <div class="about-copy">
        <p class="eyebrow">Por que escolher a Ràmaga</p>
        <h2>Conhecimento que vai além da teoria.</h2>
        <p class="section-copy">
            Na Ràmaga, você desenvolve suas habilidades com professores especializados, contato com tecnologias profissionais e experiências de aprendizado voltadas à prática.
        </p>
        <ul class="feature-list">
            <li>Professores especializados.</li>
            <li>Formação com atividades práticas, conforme o curso.</li>
            <li>Material didático, quando incluído na formação.</li>
            <li>Certificado conforme as condições de cada curso.</li>
        </ul>
        <a class="text-link" href="https://www.ramagaproestetica.com.br/sobre-nos/">
            Descubra nossos diferenciais <span aria-hidden="true">→</span>
        </a>
    </div>
    <figure class="about-image">
        <img src="/assets/images/home/rafa-foto-para-banner-secao.jpeg" alt="Retrato institucional disponibilizado pela Ràmaga" loading="lazy">
        <figcaption>Conhecimento, prática e troca profissional.</figcaption>
    </figure>
</section>

<section class="courses-section section-pad" id="cursos">
    <div class="section-shell">
        <div class="section-heading section-heading--split">
            <div>
                <p class="eyebrow">Cursos presenciais e workshops</p>
                <h2>Sua próxima evolução profissional começa aqui.</h2>
            </div>
            <div class="section-heading__aside">
                <p class="section-copy">
                    Explore cursos e workshops para aprofundar seus conhecimentos, aprender novas técnicas e ampliar suas possibilidades na estética.
                </p>
                <a class="text-link" href="<?= htmlspecialchars($coursesUrl, ENT_QUOTES, 'UTF-8') ?>">
                    Ver todos os cursos <span aria-hidden="true">→</span>
                </a>
            </div>
        </div>
        <div class="category-grid">
            <a href="https://www.ramagaproestetica.com.br/categoria-produto/terapias-capilares/" class="category-item">
                <span class="category-item__number">01</span><span>Terapias capilares</span><span aria-hidden="true">↗</span>
            </a>
            <a href="https://www.ramagaproestetica.com.br/categoria-produto/cursos-presenciais/cursos-faciais/" class="category-item">
                <span class="category-item__number">02</span><span>Faciais</span><span aria-hidden="true">↗</span>
            </a>
            <a href="https://www.ramagaproestetica.com.br/categoria-produto/cursos-presenciais/curso-corporal/" class="category-item">
                <span class="category-item__number">03</span><span>Corporais</span><span aria-hidden="true">↗</span>
            </a>
            <a href="https://www.ramagaproestetica.com.br/categoria-produto/cursos-presenciais/saude-e-estetica/" class="category-item">
                <span class="category-item__number">04</span><span>Saúde e estética</span><span aria-hidden="true">↗</span>
            </a>
            <a href="https://www.ramagaproestetica.com.br/categoria-produto/cursos-presenciais/curso-micropigmentacao/" class="category-item">
                <span class="category-item__number">05</span><span>Micropigmentação</span><span aria-hidden="true">↗</span>
            </a>
            <a href="https://www.ramagaproestetica.com.br/categoria-produto/cursos-presenciais/tecnologia-avancada/" class="category-item">
                <span class="category-item__number">06</span><span>Tecnologia avançada</span><span aria-hidden="true">↗</span>
            </a>
            <a href="https://www.ramagaproestetica.com.br/categoria-produto/cursos-presenciais/workshops/" class="category-item">
                <span class="category-item__number">07</span><span>Workshops</span><span aria-hidden="true">↗</span>
            </a>
            <a href="https://www.ramagaproestetica.com.br/categoria-produto/cursos-ao-vivo/" class="category-item">
                <span class="category-item__number">08</span><span>Cursos on-line</span><span aria-hidden="true">↗</span>
            </a>
        </div>
        <p class="availability-note">Consulte no catálogo oficial os cursos disponíveis, turmas, datas e condições atuais.</p>
    </div>
</section>

<section class="postgraduate-section section-shell" id="pos-graduacao">
    <div class="postgraduate-image">
        <img src="/assets/images/home/recepcao.jpeg" alt="Ambiente da Ràmaga Pró-Estética" loading="lazy">
        <span class="image-index">Formação · prática · conhecimento</span>
    </div>
    <div class="postgraduate-copy">
        <p class="eyebrow">Pós-graduação</p>
        <h2>Uma formação para ampliar seus horizontes.</h2>
        <p class="section-copy">
            Aprofunde seus conhecimentos, desenvolva novas competências e construa uma trajetória profissional com uma formação alinhada aos seus objetivos.
        </p>
        <ul class="postgraduate-points">
            <li>Metodologia e grade curricular</li>
            <li>Corpo docente e infraestrutura</li>
            <li>Informações sobre as turmas</li>
        </ul>
        <a class="button button--light" href="<?= htmlspecialchars($postgraduateUrl, ENT_QUOTES, 'UTF-8') ?>">
            Conheça a pós-graduação <span aria-hidden="true">↗</span>
        </a>
    </div>
</section>

<section class="testimonials-section section-pad" aria-labelledby="testimonials-title">
    <div class="section-shell">
        <div class="section-heading section-heading--split">
            <div>
                <p class="eyebrow">Depoimentos</p>
                <h2 id="testimonials-title">Histórias de quem escolheu evoluir.</h2>
            </div>
            <div class="carousel-controls" aria-label="Controles dos depoimentos">
                <button class="carousel-control" type="button" data-testimonial-prev aria-label="Depoimento anterior">←</button>
                <span class="carousel-count"><span data-testimonial-current>01</span> / 02</span>
                <button class="carousel-control" type="button" data-testimonial-next aria-label="Próximo depoimento">→</button>
            </div>
        </div>
        <div class="testimonial-track" data-testimonial-track aria-live="polite">
            <?php foreach ($testimonials as $index => $testimonial): ?>
                <figure class="testimonial-card<?= $index === 0 ? ' is-active' : '' ?>" data-testimonial="<?= $index ?>"<?= $index === 0 ? '' : ' hidden' ?>>
                    <blockquote>“<?= htmlspecialchars($testimonial['quote'], ENT_QUOTES, 'UTF-8') ?>”</blockquote>
                    <figcaption>
                        <span class="testimonial-card__name"><?= htmlspecialchars($testimonial['name'], ENT_QUOTES, 'UTF-8') ?></span>
                        <span><?= htmlspecialchars($testimonial['profession'], ENT_QUOTES, 'UTF-8') ?></span>
                    </figcaption>
                </figure>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="online-section section-pad" id="cursos-online">
    <div class="section-shell">
        <div class="section-heading section-heading--split">
            <div>
                <p class="eyebrow">Cursos on-line EAD</p>
                <h2>Seu próximo aprendizado, no seu ritmo.</h2>
            </div>
            <div class="section-heading__aside">
                <p class="section-copy">
                    Estude de onde estiver, com acesso às aulas em vídeo e aos recursos previstos em cada formação.
                </p>
                <a class="text-link" href="https://www.ramagaproestetica.com.br/categoria-produto/cursos-ao-vivo/">
                    Conhecer todos os cursos EAD <span aria-hidden="true">→</span>
                </a>
            </div>
        </div>
        <div class="online-grid">
            <?php foreach ($onlineCourses as $index => $course): ?>
                <article class="online-card">
                    <span class="online-card__number">0<?= $index + 1 ?></span>
                    <span class="online-card__format">Formação on-line</span>
                    <h3><?= htmlspecialchars($course['name'], ENT_QUOTES, 'UTF-8') ?></h3>
                    <p class="online-card__price"><?= htmlspecialchars($course['price'], ENT_QUOTES, 'UTF-8') ?></p>
                    <a href="https://www.ramagaproestetica.com.br/categoria-produto/cursos-ao-vivo/" class="text-link">
                        Ver detalhes <span aria-hidden="true">↗</span>
                    </a>
                </article>
            <?php endforeach; ?>
        </div>
        <p class="availability-note">Valores informados no conteúdo fornecido. Confirme preço e condições na página oficial de cada formação.</p>
    </div>
</section>

<section class="technology-section section-shell" id="equipamentos">
    <div class="technology-copy">
        <p class="eyebrow">Tecnologia e equipamentos</p>
        <h2>Tecnologia para ampliar suas possibilidades.</h2>
        <p class="section-copy">
            Conheça soluções para profissionais e clínicas que buscam ampliar seus recursos de atendimento, com opções de locação e aquisição de equipamentos.
        </p>
        <div class="technology-actions">
            <a class="text-link" href="<?= htmlspecialchars($rentalsUrl, ENT_QUOTES, 'UTF-8') ?>">Consultar locações <span aria-hidden="true">→</span></a>
            <a class="text-link" href="<?= htmlspecialchars($shopUrl, ENT_QUOTES, 'UTF-8') ?>">Explorar a loja <span aria-hidden="true">→</span></a>
        </div>
    </div>
    <div class="technology-image">
        <img src="/assets/images/home/recepcao-para-banner-principal.jpeg" alt="Espaço profissional da Ràmaga Pró-Estética" loading="lazy">
        <div class="technology-image__caption">
            <span>Para profissionais e clínicas</span>
            <span>Locação · aquisição</span>
        </div>
    </div>
</section>

<section class="team-section section-pad" id="equipe">
    <div class="section-shell">
        <div class="section-heading section-heading--split">
            <div>
                <p class="eyebrow">Pessoas que compartilham conhecimento</p>
                <h2>Aprenda com quem compartilha conhecimento.</h2>
            </div>
            <div class="section-heading__aside">
                <p class="section-copy">Conheça a equipe e consulte os perfis, especialidades e informações oficiais na página da Ràmaga.</p>
                <a class="text-link" href="https://www.ramagaproestetica.com.br/sobre-nos/">Conheça nossos professores <span aria-hidden="true">→</span></a>
            </div>
        </div>
        <div class="team-grid">
            <?php foreach ($teamImages as $member): ?>
                <figure class="team-card">
                    <img src="<?= htmlspecialchars($member['src'], ENT_QUOTES, 'UTF-8') ?>" alt="Retrato de <?= htmlspecialchars($member['name'], ENT_QUOTES, 'UTF-8') ?>" loading="lazy">
                    <figcaption>
                        <span><?= htmlspecialchars($member['name'], ENT_QUOTES, 'UTF-8') ?></span>
                        <span>Equipe Ràmaga</span>
                    </figcaption>
                </figure>
            <?php endforeach; ?>
        </div>
        <p class="availability-note">Perfis e especialidades devem ser confirmados com as informações oficiais da equipe.</p>
    </div>
</section>

<section class="blog-section section-shell" id="blog">
    <div class="blog-mark" aria-hidden="true">R.</div>
    <div>
        <p class="eyebrow">Conteúdo e atualização</p>
        <h2>Conhecimento que continua depois da aula.</h2>
        <p class="section-copy">Explore conteúdos sobre técnicas, tendências, equipamentos e formação profissional em estética.</p>
    </div>
    <a class="button button--outline" href="<?= htmlspecialchars($blogUrl, ENT_QUOTES, 'UTF-8') ?>">Acessar o blog <span aria-hidden="true">↗</span></a>
</section>

<section class="final-cta section-pad">
    <div class="final-cta__image" aria-hidden="true">
        <img src="/assets/images/home/recepcao.jpeg" alt="" loading="lazy">
    </div>
    <div class="final-cta__content section-shell">
        <p class="eyebrow">Seu próximo capítulo</p>
        <h2>O próximo passo da sua carreira começa aqui.</h2>
        <p>Encontre a formação, a tecnologia ou a solução ideal para o seu momento profissional. A equipe da Ràmaga está pronta para ajudar você a conhecer as possibilidades.</p>
        <div class="final-cta__actions">
            <a class="button button--light" href="<?= htmlspecialchars($postgraduateUrl, ENT_QUOTES, 'UTF-8') ?>">Quero me especializar <span aria-hidden="true">↗</span></a>
            <a class="button button--outline-light" href="<?= htmlspecialchars($rentalsUrl, ENT_QUOTES, 'UTF-8') ?>">Quero equipar minha clínica <span aria-hidden="true">↗</span></a>
            <a class="text-link text-link--light" href="<?= htmlspecialchars($whatsappUrl, ENT_QUOTES, 'UTF-8') ?>" target="_blank" rel="noopener noreferrer">Fale pelo WhatsApp <span aria-hidden="true">↗</span></a>
        </div>
    </div>
</section>

<a class="floating-whatsapp" href="<?= htmlspecialchars($whatsappUrl, ENT_QUOTES, 'UTF-8') ?>" target="_blank" rel="noopener noreferrer" aria-label="Fale com a Ràmaga pelo WhatsApp">
    <span class="floating-whatsapp__pulse" aria-hidden="true"></span>
    <svg aria-hidden="true" viewBox="0 0 24 24">
        <path d="M20.2 11.7a8.2 8.2 0 0 1-12.1 7.2L4 20l1.1-4a8.2 8.2 0 1 1 15.1-4.3Z"></path>
        <path d="M8.8 8.1c.2-.4.4-.4.7-.4h.4c.2 0 .4.1.5.4l.7 1.7c.1.2.1.4 0 .6l-.5.6c-.2.2-.2.4 0 .6.6 1 1.4 1.8 2.5 2.3.2.1.4.1.6-.1l.7-.8c.2-.2.4-.2.6-.1l1.6.8c.2.1.3.3.3.5 0 .4-.2 1.2-.7 1.6-.5.5-1.2.7-2 .6-1.1-.1-2.4-.7-3.9-2-1.5-1.3-2.4-2.9-2.7-4-.2-.9 0-1.6.4-2.1.3-.4.6-.5.8-.5Z"></path>
    </svg>
</a>
<button class="back-to-top" type="button" data-back-to-top aria-label="Voltar ao início">
    <span aria-hidden="true">↑</span>
</button>
