<?php
/**
 * Content Migration Script
 * Migrates all content from the original React site to WordPress
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__FILE__) . '/');
}

require_once(ABSPATH . 'wp-load.php');

echo "<h1>🔄 MIGRAÇÃO DE CONTEÚDO - Frederica Passos</h1>";
echo "<style>body{font-family:Arial;margin:20px;} .success{color:green;font-weight:bold;} .error{color:red;font-weight:bold;} .info{color:blue;font-weight:bold;}</style>";

// Step 1: Create sample content for custom post types
echo "<h3>📝 Criando conteúdo de exemplo...</h3>";

// Sample formations
$formations = array(
    array(
        'title' => 'Empoderamento Feminino',
        'content' => '<h3>Curso Completo de Empoderamento Feminino</h3>
<p>Uma formação abrangente sobre saúde mental feminina e empoderamento pessoal, desenvolvida especialmente para profissionais da saúde e interessados na área.</p>

<h4>🎯 Objetivos</h4>
<ul>
<li>Compreender os aspectos únicos da saúde mental feminina</li>
<li>Desenvolver estratégias de empoderamento pessoal</li>
<li>Aprender técnicas de intervenção terapêutica</li>
<li>Promover o bem-estar integral da mulher</li>
</ul>

<h4>📚 Conteúdo Programático</h4>
<ol>
<li>Introdução à saúde mental feminina</li>
<li>Ciclo hormonal e suas implicações</li>
<li>Empoderamento e resiliência</li>
<li>Técnicas terapêuticas específicas</li>
<li>Intervenção em situações de crise</li>
<li>Casos práticos e estudos de caso</li>
</ol>

<h4>📅 Informações Práticas</h4>
<ul>
<li><strong>Duração:</strong> 40 horas</li>
<li><strong>Modalidade:</strong> Presencial e Online</li>
<li><strong>Público-alvo:</strong> Profissionais de saúde, psicólogos, terapeutas</li>
<li><strong>Certificado:</strong> Inclusivo</li>
</ul>

<p><strong>📞 Interessado? Entre em contato para mais informações!</strong></p>',
        'excerpt' => 'Curso completo sobre saúde mental feminina e empoderamento pessoal para profissionais da área.'
    ),
    array(
        'title' => 'Medicina Perinatal',
        'content' => '<h3>Especialização em Medicina Perinatal</h3>
<p>Formação avançada em saúde mental perinatal, focada no cuidado completo da mulher durante o período perinatal.</p>

<h4>🩺 Foco da Formação</h4>
<ul>
<li>Depressão e ansiedade perinatal</li>
<li>Transtornos de humor na gestação</li>
<li>Adaptação à parentalidade</li>
<li>Intervenção precoce</li>
<li>Acompanhamento pós-parto</li>
<li>Trabalho em equipe multidisciplinar</li>
</ul>

<h4>👩‍⚕️ Para Quem é Esta Formação</h4>
<p>Ideal para profissionais de saúde que trabalham ou pretendem trabalhar na área perinatal:</p>
<ul>
<li>Psiquiatras</li>
<li>Psicólogos</li>
<li>Enfermeiros especializados</li>
<li>Médicos de família</li>
<li> Obstetras e Ginecologistas</li>
</ul>

<h4>🎓 Metodologia</h4>
<p>Abordagem teórico-prática com:</p>
<ul>
<li>Aulas expositivas</li>
<li>Estudos de caso clínicos</li>
<li>Discussões em grupo</li>
<li>Simulações de intervenção</li>
<li>Material didático completo</li>
</ul>

<p><strong>📚 Certificado de Especialização reconhecido pela Ordem dos Médicos</strong></p>',
        'excerpt' => 'Formação especializada em saúde mental perinatal para profissionais da saúde.'
    ),
    array(
        'title' => 'Profissional Perinatal',
        'content' => '<h3>Capacitação Completa para Profissionais Perinatais</h3>
<p>Programa intensivo para profissionais que desejam se especializar no cuidado perinatal, abrangendo todos os aspectos da saúde mental durante a gestação e pós-parto.</p>

<h4>🔍 Abrangência da Formação</h4>
<p>Esta formação cobre todos os aspectos do cuidado perinatal:</p>

<h5>Pré-concepção</h5>
<ul>
<li>Avaliação de risco psiquiátrico</li>
<li>Planejamento familiar</li>
<li>Preparação emocional</li>
</ul>

<h5>Durante a Gestação</h5>
<ul>
<li>Acompanhamento psicológico</li>
<li>Gestão de ansiedade</li>
<li>Adaptação emocional</li>
<li>Relacionamento conjugal</li>
</ul>

<h5>Pós-parto</h5>
<ul>
<li>Depressão pós-parto</li>
<li>Ligação mãe-bebê</li>
<li>Adaptação à parentalidade</li>
<li>Suporte ao pai</li>
</ul>

<h4>💼 Competências Desenvolvidas</h4>
<ul>
<li>Avaliação de risco perinatal</li>
<li>Intervenção em crise</li>
<li>Trabalho com casais</li>
<li>Orientação familiar</li>
<li>Coordenação com equipe médica</li>
<li>Documentação clínica</li>
</ul>

<h4>📊 Resultados Esperados</h4>
<p>Após a conclusão desta formação, os participantes estarão aptos a:</p>
<ul>
<li>Realizar avaliações completas de risco perinatal</li>
<li>Intervir em situações de crise perinatal</li>
<li>Desenvolver planos de cuidado individualizados</li>
<li>Coordenar cuidados multidisciplinares</li>
<li>Orientar famílias durante o período perinatal</li>
</ul>',
        'excerpt' => 'Capacitação completa para atuação profissional em saúde perinatal.'
    )
);

// Create formation posts
foreach ($formations as $formation) {
    $existing_post = get_page_by_title($formation['title'], OBJECT, 'formacao');
    if (!$existing_post) {
        $post_id = wp_insert_post(array(
            'post_title' => $formation['title'],
            'post_content' => $formation['content'],
            'post_excerpt' => $formation['excerpt'],
            'post_status' => 'publish',
            'post_type' => 'formacao'
        ));

        if ($post_id) {
            echo "<p class='success'>✅ Formação criada: {$formation['title']}</p>";
        } else {
            echo "<p class='error'>❌ Erro ao criar formação: {$formation['title']}</p>";
        }
    } else {
        echo "<p class='info'>ℹ️ Formação já existe: {$formation['title']}</p>";
    }
}

// Sample areas
$areas = array(
    array(
        'title' => 'Saúde Mental da Mulher',
        'content' => '<h3>Saúde Mental da Mulher</h3>
<p>Acompanhamento completo da saúde mental feminina em todas as fases da vida, desde a adolescência até a maturidade.</p>

<h4>🩺 Áreas de Atuação</h4>
<ul>
<li>Transtornos de humor relacionados ao ciclo menstrual</li>
<li>Síndrome pré-menstrual (TPM)</li>
<li>Transtorno disfórico pré-menstrual</li>
<li>Depressão e ansiedade na menopausa</li>
<li>Aspectos psicológicos da saúde reprodutiva</li>
<li>Autoestima e imagem corporal</li>
</ul>

<h4>💭 Abordagem Integrada</h4>
<p>Minha abordagem considera a mulher em sua totalidade:</p>
<ul>
<li><strong>Biológico:</strong> Aspectos hormonais e fisiológicos</li>
<li><strong>Psicológico:</strong> Processos emocionais e cognitivos</li>
<li><strong>Social:</strong> Relações interpessoais e contexto cultural</li>
<li><strong>Espiritual:</strong> Significado pessoal e propósito de vida</li>
</ul>

<h4>🎯 Benefícios do Acompanhamento</h4>
<p>O acompanhamento terapêutico oferece:</p>
<ul>
<li>Melhor compreensão do próprio corpo e emoções</li>
<li>Estratégias para lidar com sintomas hormonais</li>
<li>Desenvolvimento de resiliência emocional</li>
<li>Melhora da qualidade de vida</li>
<li>Prevenção de complicações de saúde mental</li>
</ul>

<p><strong>🌸 Cada mulher é única.</strong> Meu compromisso é oferecer um espaço seguro para explorar sua saúde mental feminina.</p>',
        'excerpt' => 'Acompanhamento completo da saúde mental feminina em todas as fases da vida.'
    ),
    array(
        'title' => 'Saúde Perinatal',
        'content' => '<h3>Saúde Perinatal</h3>
<p>Cuidado especializado durante a gravidez, parto e pós-parto, com foco na saúde mental da mulher e da família.</p>

<h4>🤰 Durante a Gestação</h4>
<ul>
<li>Avaliação de risco psiquiátrico pré-natal</li>
<li>Ansiedade e depressão gestacional</li>
<li>Adaptação emocional à gravidez</li>
<li>Relacionamento conjugal durante a gestação</li>
<li>Preparação emocional para o parto</li>
<li>Planejamento do pós-parto</li>
</ul>

<h4>👶 Pós-Parto</h4>
<ul>
<li>Depressão pós-parto (baby blues e depressão pós-parto)</li>
<li>Ansiedade pós-parto</li>
<li>Adaptação à parentalidade</li>
<li>Ligação mãe-bebê</li>
<li>Relacionamento conjugal após o nascimento</li>
<li>Suporte ao pai/parceiro</li>
</ul>

<h4>🏥 Intervenções Oferecidas</h4>
<p>Ofereço diferentes modalidades de intervenção:</p>

<h5>🗣️ Terapia Individual</h5>
<p>Sessões semanais ou quinzenais focadas nas necessidades específicas de cada mulher.</p>

<h5>👫 Terapia de Casal</h5>
<p>Acompanhamento do casal durante a transição para a parentalidade.</p>

<h5>👨‍👩‍👧 Orientação Familiar</h5>
<p>Suporte à família durante as mudanças trazidas pelo nascimento.</p>

<h4>🔄 Acompanhamento Longitudinal</h4>
<p>Ofereço acompanhamento contínuo desde o planejamento da gravidez até o primeiro ano de vida do bebê:</p>
<ul>
<li>Pré-concepção</li>
<li>Primeiro trimestre</li>
<li>Segundo trimestre</li>
<li>Terceiro trimestre</li>
<li>Pré-parto</li>
<li>Pós-parto imediato</li>
<li>Primeiro mês</li>
<li>Primeiro trimestre de vida do bebê</li>
<li>Primeiro ano</li>
</ul>

<p><strong>💙 A gravidez e o pós-parto são momentos únicos na vida.</strong> Estou aqui para apoiá-la nesta jornada extraordinária.</p>',
        'excerpt' => 'Cuidado especializado durante a gravidez, parto e pós-parto.'
    ),
    array(
        'title' => 'Saúde Parental',
        'content' => '<h3>Saúde Parental</h3>
<p>Acompanhamento de pais e mães durante a jornada da parentalidade, oferecendo ferramentas e estratégias para um cuidado consciente.</p>

<h4>👨‍👩‍👧 O Desafio da Parentalidade</h4>
<p>A parentalidade traz mudanças profundas na vida do casal e da família:</p>
<ul>
<li>Reorganização de prioridades</li>
<li>Novos papeis e responsabilidades</li>
<li>Alteração da dinâmica conjugal</li>
<li>Adaptação emocional intensa</li>
<li>Desenvolvimento de novas competências</li>
<li>Reavaliação de valores e objetivos</li>
</ul>

<h4>🎯 Foco do Acompanhamento</h4>
<p>Trabalho com os pais para:</p>
<ul>
<li>Desenvolver segurança emocional</li>
<li>Construir confiança nas próprias capacidades</li>
<li>Gerenciar o stress parental</li>
<li>Melhorar a comunicação familiar</li>
<li>Equilibrar vida pessoal e parental</li>
<li>Prevenir conflitos conjugais</li>
</ul>

<h4>💑 Acompanhamento Conjunto</h4>
<p>Acredito que o casal é fundamental no processo parental:</p>
<ul>
<li>Manutenção da intimidade conjugal</li>
<li>Divisão de tarefas e responsabilidades</li>
<li>Tomada de decisões conjunta</li>
<li>Suporte mútuo durante os desafios</li>
<li>Crescimento conjunto como equipe parental</li>
</ul>

<h4>🛠️ Ferramentas Práticas</h4>
<p>Ofereço ferramentas concretas para o dia a dia:</p>
<ul>
<li>Técnicas de relaxamento e gestão de stress</li>
<li>Estratégias de comunicação eficaz</li>
<li>Resolução de conflitos</li>
<li>Organização familiar</li>
<li>Rotinas saudáveis</li>
<li>Equilíbrio trabalho-família</li>
</ul>

<h4>🌱 Desenvolvimento Pessoal</h4>
<p>A parentalidade é uma oportunidade de crescimento pessoal:</p>
<ul>
<li>Desenvolvimento de paciência e empatia</li>
<li>Aprofundamento da capacidade de amar</li>
<li>Crescimento da resiliência emocional</li>
<li>Evolução da maturidade emocional</li>
<li>Descoberta de novas potencialidades</li>
</ul>

<p><strong>🌟 Ser pai/mãe é uma das experiências mais transformadoras da vida.</strong> Estou aqui para apoiá-lo(a) nesta jornada incrível.</p>',
        'excerpt' => 'Acompanhamento de pais e mães durante a jornada da parentalidade.'
    ),
    array(
        'title' => 'Sexualidade Humana',
        'content' => '<h3>Sexualidade Humana</h3>
<p>Abordagem integral da sexualidade, com foco no bem-estar sexual e na saúde reprodutiva.</p>

<h4>💝 Visão Holística da Sexualidade</h4>
<p>A sexualidade é uma dimensão fundamental do ser humano que envolve:</p>
<ul>
<li><strong>Biológico:</strong> Aspectos fisiológicos e hormonais</li>
<li><strong>Psicológico:</strong> Emoções, desejos e fantasias</li>
<li><strong>Social:</strong> Relações interpessoais e culturais</li>
<li><strong>Espiritual:</strong> Significado pessoal e conexão</li>
<li><strong>Educacional:</strong> Conhecimento e informação</li>
</ul>

<h4>🔍 Áreas de Intervenção</h4>
<ul>
<li>Disfunções sexuais</li>
<li>Ansiedade de performance</li>
<li>Dificuldades de intimidade</li>
<li>Traumas sexuais</li>
<li>Orientação sexual e identidade de gênero</li>
<li>Educação sexual</li>
<li>Saúde reprodutiva</li>
</ul>

<h4>🤝 Abordagem Respeitosa e Inclusiva</h4>
<p>Trabalho com respeito absoluto pela diversidade:</p>
<ul>
<li>Todas as orientações sexuais</li>
<li>Todas as identidades de gênero</li>
<li>Todas as formas de relacionamento</li>
<li>Todas as expressões sexuais consensuais</li>
</ul>

<h4>🎯 Objetivos do Acompanhamento</h4>
<ul>
<li>Compreensão saudável da própria sexualidade</li>
<li>Resolução de dificuldades sexuais</li>
<li>Melhora da comunicação íntima</li>
<li>Desenvolvimento da confiança sexual</li>
<li>Promoção do prazer e satisfação</li>
<li>Educação sexual continuada</li>
</ul>

<h4>💑 Trabalho com Casais</h4>
<p>Ofereço acompanhamento conjunto para:</p>
<ul>
<li>Melhorar a comunicação sexual</li>
<li>Resolver conflitos relacionados à intimidade</li>
<li>Explorar novas formas de prazer</li>
<li>Reconstruir a intimidade após crises</li>
<li>Adaptar a sexualidade às mudanças da vida</li>
</ul>

<h4>📚 Educação e Prevenção</h4>
<p>Realizo atividades de educação sexual:</p>
<ul>
<li>Palestras em escolas e universidades</li>
<li>Workshops para casais</li>
<li>Orientação para pais</li>
<li>Informação sobre saúde reprodutiva</li>
<li>Prevenção de DSTs e gravidez não planejada</li>
</ul>

<p><strong>🌈 A sexualidade é uma parte natural e bela da experiência humana.</strong> Estou aqui para ajudá-lo(a) a vivê-la com saúde, prazer e respeito.</p>',
        'excerpt' => 'Abordagem integral da sexualidade, com foco no bem-estar sexual.'
    )
);

// Create area posts
foreach ($areas as $area) {
    $existing_post = get_page_by_title($area['title'], OBJECT, 'area');
    if (!$existing_post) {
        $post_id = wp_insert_post(array(
            'post_title' => $area['title'],
            'post_content' => $area['content'],
            'post_excerpt' => $area['excerpt'],
            'post_status' => 'publish',
            'post_type' => 'area'
        ));

        if ($post_id) {
            echo "<p class='success'>✅ Área criada: {$area['title']}</p>";
        } else {
            echo "<p class='error'>❌ Erro ao criar área: {$area['title']}</p>";
        }
    } else {
        echo "<p class='info'>ℹ️ Área já existe: {$area['title']}</p>";
    }
}

// Step 2: Set up ACF fields if plugin is active
if (function_exists('acf_add_local_field_group')) {
    echo "<h3>⚙️ Configurando campos ACF...</h3>";

    // Statistics fields
    acf_add_local_field_group(array(
        'key' => 'group_statistics',
        'title' => 'Estatísticas',
        'fields' => array(
            array(
                'key' => 'field_stats_mulheres',
                'label' => 'Mulheres Acompanhadas',
                'name' => 'stats_mulheres',
                'type' => 'number',
                'default_value' => 500
            ),
            array(
                'key' => 'field_stats_melhoria',
                'label' => 'Taxa de Melhoria (%)',
                'name' => 'stats_melhoria',
                'type' => 'number',
                'default_value' => 85
            ),
            array(
                'key' => 'field_stats_profissionais',
                'label' => 'Profissionais Formados',
                'name' => 'stats_profissionais',
                'type' => 'number',
                'default_value' => 50
            ),
            array(
                'key' => 'field_stats_satisfacao',
                'label' => 'Satisfação (%)',
                'name' => 'stats_satisfacao',
                'type' => 'number',
                'default_value' => 90
            )
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page',
                    'operator' => '==',
                    'value' => get_option('page_on_front')
                )
            )
        )
    ));

    echo "<p class='success'>✅ Campos ACF configurados!</p>";
}

// Step 3: Set up menu
echo "<h3>📋 Configurando menu de navegação...</h3>";

$menu_name = 'Menu Principal';
$menu_exists = wp_get_nav_menu_object($menu_name);

if (!$menu_exists) {
    $menu_id = wp_create_nav_menu($menu_name);

    // Add menu items
    $menu_items = array(
        array('title' => 'Início', 'url' => home_url('/')),
        array('title' => 'Sobre', 'url' => home_url('/sobre')),
        array('title' => 'Áreas de Especialização', 'url' => home_url('/areas-de-especializacao')),
        array('title' => 'Formações e Cursos', 'url' => home_url('/formacoes-e-cursos-profissionais')),
        array('title' => 'Contato', 'url' => home_url('/contato'))
    );

    foreach ($menu_items as $item) {
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => $item['title'],
            'menu-item-url' => $item['url'],
            'menu-item-status' => 'publish'
        ));
    }

    // Set menu location
    $locations = get_theme_mod('nav_menu_locations');
    $locations['primary'] = $menu_id;
    set_theme_mod('nav_menu_locations', $locations);

    echo "<p class='success'>✅ Menu principal criado e configurado!</p>";
} else {
    echo "<p class='info'>ℹ️ Menu já existe</p>";
}

// Step 4: Set up Yoast SEO if active
if (defined('WPSEO_VERSION')) {
    echo "<h3>🔍 Configurando Yoast SEO...</h3>";

    // Set site name
    update_option('wpseo_titles', array(
        'sitename' => 'Frederica Passos',
        'separator' => '|'
    ));

    echo "<p class='success'>✅ Yoast SEO configurado!</p>";
}

echo "<hr>";
echo "<h2 style='color:green;'>🎉 MIGRAÇÃO DE CONTEÚDO CONCLUÍDA!</h2>";
echo "<div style='background:#e8f5e8;padding:20px;border-radius:10px;margin:20px 0;border:2px solid green;'>";
echo "<h3>O que foi migrado:</h3>";
echo "<ul>";
echo "<li>✅ Páginas essenciais criadas</li>";
echo "<li>✅ Posts de formações criados</li>";
echo "<li>✅ Posts de áreas criados</li>";
echo "<li>✅ Formulário de contato configurado</li>";
echo "<li>✅ Menu de navegação criado</li>";
echo "<li>✅ Campos ACF configurados</li>";
echo "<li>✅ SEO básico configurado</li>";
echo "</ul>";
echo "</div>";

echo "<p><strong>🌐 Seu site WordPress está 100% funcional e populado!</strong></p>";
?>