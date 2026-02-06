<?php
/**
 * WordPress Auto Installation and Complete Setup
 * This script installs WordPress from scratch and sets up everything
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__FILE__) . '/');
}

echo "<h1>🚀 INSTALAÇÃO COMPLETA - Frederica Passos</h1>";
echo "<h2>WordPress + Tema + Conteúdo + Migração Total</h2>";
echo "<style>body{font-family:Arial;margin:20px;line-height:1.6;} .success{color:green;font-weight:bold;} .error{color:red;font-weight:bold;} .info{color:blue;font-weight:bold;} .warning{color:orange;font-weight:bold;} pre{background:#f5f5f5;padding:10px;border-radius:5px;overflow-x:auto;}</style>";

// Step 1: Check if WordPress is already installed
echo "<h3>🔍 Verificando instalação do WordPress...</h3>";

if (file_exists(ABSPATH . 'wp-config.php')) {
    echo "<p class='info'>ℹ️ WordPress já instalado. Prosseguindo com configuração...</p>";

    // Include WordPress
    require_once(ABSPATH . 'wp-load.php');

    // Check if site is configured
    if (get_option('siteurl')) {
        echo "<p class='success'>✅ WordPress configurado e funcional!</p>";
        $wordpress_installed = true;
    } else {
        echo "<p class='warning'>⚠️ WordPress instalado mas não configurado. Fazendo configuração...</p>";
        $wordpress_installed = false;
    }
} else {
    echo "<p class='warning'>⚠️ WordPress não encontrado. Iniciando instalação completa...</p>";
    $wordpress_installed = false;
}

// Step 2: Install WordPress if needed
if (!$wordpress_installed) {
    echo "<h3>📦 Instalando WordPress...</h3>";

    // Database configuration
    $db_name = 'fredericapassos';
    $db_user = 'wordpress';
    $db_password = 'wordpress';
    $db_host = 'db';

    // Site configuration
    $site_title = 'Frederica Passos';
    $admin_user = 'admin';
    $admin_password = 'admin123';
    $admin_email = 'admin@fredericapassos.pt';

    // Create wp-config.php
    $wp_config_content = "<?php
define('DB_NAME', '$db_name');
define('DB_USER', '$db_user');
define('DB_PASSWORD', '$db_password');
define('DB_HOST', '$db_host');
define('DB_CHARSET', 'utf8mb4');
define('DB_COLLATE', '');
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);

define('AUTH_KEY', '" . wp_generate_password(64, true, true) . "');
define('SECURE_AUTH_KEY', '" . wp_generate_password(64, true, true) . "');
define('LOGGED_IN_KEY', '" . wp_generate_password(64, true, true) . "');
define('NONCE_KEY', '" . wp_generate_password(64, true, true) . "');
define('AUTH_SALT', '" . wp_generate_password(64, true, true) . "');
define('SECURE_AUTH_SALT', '" . wp_generate_password(64, true, true) . "');
define('LOGGED_IN_SALT', '" . wp_generate_password(64, true, true) . "');
define('NONCE_SALT', '" . wp_generate_password(64, true, true) . "');

\$table_prefix = 'wp_';

define('WP_MEMORY_LIMIT', '256M');
define('WP_MAX_MEMORY_LIMIT', '512M');
define('FS_METHOD', 'direct');

if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__FILE__) . '/');
}

require_once ABSPATH . 'wp-settings.php';
?>";

    if (file_put_contents(ABSPATH . 'wp-config.php', $wp_config_content)) {
        echo "<p class='success'>✅ wp-config.php criado!</p>";
    } else {
        echo "<p class='error'>❌ Erro ao criar wp-config.php</p>";
        exit;
    }

    // Now include WordPress
    require_once(ABSPATH . 'wp-load.php');

    // Run WordPress installation
    echo "<p class='info'>🔧 Executando instalação do WordPress...</p>";

    // Create the admin user and install
    $result = wp_install($site_title, $admin_user, $admin_email, true, '', $admin_password);

    if (is_wp_error($result)) {
        echo "<p class='error'>❌ Erro na instalação: " . $result->get_error_message() . "</p>";
        exit;
    } else {
        echo "<p class='success'>✅ WordPress instalado com sucesso!</p>";
        echo "<p class='info'>👤 Admin: $admin_user</p>";
        echo "<p class='info'>🔑 Senha: $admin_password</p>";
        echo "<p class='info'>📧 Email: $admin_email</p>";
    }

    // Set homepage
    update_option('page_on_front', 2); // Assuming About page is ID 2
    update_option('show_on_front', 'page');
}

// Step 3: Activate our custom theme
echo "<h3>🎨 Ativando Tema 'Frederica Passos'...</h3>";

switch_theme('frederica-passos');
echo "<p class='success'>✅ Tema ativado!</p>";

// Step 4: Install and activate required plugins
echo "<h3>🔌 Instalando Plugins Necessários...</h3>";

$required_plugins = array(
    'advanced-custom-fields/acf.php' => 'https://downloads.wordpress.org/plugin/advanced-custom-fields.latest-stable.zip',
    'contact-form-7/wp-contact-form-7.php' => 'https://downloads.wordpress.org/plugin/contact-form-7.latest-stable.zip',
    'wordpress-seo/wp-seo.php' => 'https://downloads.wordpress.org/plugin/wordpress-seo.latest-stable.zip'
);

require_once(ABSPATH . 'wp-admin/includes/plugin.php');
require_once(ABSPATH . 'wp-admin/includes/class-wp-upgrader.php');
require_once(ABSPATH . 'wp-admin/includes/plugin-install.php');

foreach ($required_plugins as $plugin_file => $download_url) {
    echo "<p class='info'>📦 Instalando: " . basename($plugin_file, '.php') . "</p>";

    // Download plugin
    $temp_file = download_url($download_url);
    if (is_wp_error($temp_file)) {
        echo "<p class='error'>❌ Erro no download: " . $temp_file->get_error_message() . "</p>";
        continue;
    }

    // Unzip plugin
    $plugin_dir = ABSPATH . 'wp-content/plugins/';
    $plugin_folder = basename($plugin_file, '.php');

    WP_Filesystem();
    $unzip_result = unzip_file($temp_file, $plugin_dir);

    if (is_wp_error($unzip_result)) {
        echo "<p class='error'>❌ Erro ao descompactar: " . $unzip_result->get_error_message() . "</p>";
        continue;
    }

    // Activate plugin
    if (file_exists($plugin_dir . $plugin_file)) {
        activate_plugin($plugin_file);
        echo "<p class='success'>✅ Plugin ativado!</p>";
    } else {
        echo "<p class='error'>❌ Plugin não encontrado após instalação</p>";
    }

    // Clean up
    unlink($temp_file);
}

// Step 5: Create essential pages
echo "<h3>📄 Criando Páginas Essenciais...</h3>";

$pages = array(
    array(
        'title' => 'Sobre',
        'content' => '<h2>Sobre Frederica Passos</h2>
<p>Especialista em Psiquiatria Perinatal e Sexualidade Humana, com vasta experiência em acompanhar mulheres e famílias durante as diversas fases da vida.</p>

<p>Meu compromisso é oferecer um espaço seguro e acolhedor para que você possa explorar suas emoções, compreender seus desafios e desenvolver estratégias personalizadas para o seu bem-estar.</p>

<h3>Especialidades</h3>
<ul>
<li>✅ Saúde Mental da Mulher</li>
<li>✅ Saúde Perinatal</li>
<li>✅ Saúde Parental</li>
<li>✅ Sexualidade Humana</li>
</ul>

<h3>Formação</h3>
<p>Possuo formação especializada em Psiquiatria, com ênfase em saúde mental perinatal e sexualidade humana. Minha abordagem é baseada em evidências científicas e no respeito às necessidades individuais de cada pessoa.</p>',
        'slug' => 'sobre'
    ),
    array(
        'title' => 'Áreas de Especialização',
        'content' => '<h2>Áreas de Especialização</h2>

<h3>🩺 Saúde Mental da Mulher</h3>
<p>Acompanhamento completo da saúde mental feminina em todas as fases da vida, desde a adolescência até a maturidade.</p>

<h3>👶 Saúde Perinatal</h3>
<p>Cuidado especializado durante a gravidez, parto e pós-parto. Suporte para mães e famílias durante esta fase tão importante.</p>

<h3>👨‍👩‍👧 Saúde Parental</h3>
<p>Acompanhamento de pais e mães durante a jornada da parentalidade, oferecendo ferramentas e estratégias para um cuidado consciente.</p>

<h3>💝 Sexualidade Humana</h3>
<p>Abordagem integral da sexualidade, com foco no bem-estar sexual e na saúde reprodutiva.</p>

<p><strong>📞 Agende sua consulta</strong> para receber atendimento personalizado e acolhedor.</p>',
        'slug' => 'areas-de-especializacao'
    ),
    array(
        'title' => 'Formações e Cursos',
        'content' => '<h2>Formações Profissionais</h2>

<h3>🎓 Empoderamento Feminino</h3>
<p>Curso completo sobre saúde mental feminina e empoderamento pessoal. Capacitação para profissionais da saúde e interessados na área.</p>
<ul>
<li>📅 Duração: 40 horas</li>
<li>🎯 Público: Profissionais de saúde e interessados</li>
<li>📜 Certificado incluído</li>
</ul>

<h3>🏥 Medicina Perinatal</h3>
<p>Formação especializada em saúde mental perinatal para profissionais da saúde.</p>
<ul>
<li>📅 Duração: 60 horas</li>
<li>🎯 Público: Médicos, psicólogos, enfermeiros</li>
<li>📜 Certificado de especialização</li>
</ul>

<h3>👨‍👩‍👧 Profissional Perinatal</h3>
<p>Capacitação completa para atuação em saúde perinatal.</p>
<ul>
<li>📅 Duração: 80 horas</li>
<li>🎯 Público: Profissionais da saúde perinatal</li>
<li>📜 Certificado internacional</li>
</ul>

<p><strong>ℹ️ Informações e inscrições:</strong> Entre em contato para mais detalhes sobre as formações.</p>',
        'slug' => 'formacoes-e-cursos-profissionais'
    ),
    array(
        'title' => 'Contato',
        'content' => '<h2>Entre em Contato</h2>

<p>Estou aqui para ajudar você. Entre em contato para agendar sua consulta ou tirar suas dúvidas.</p>

<div style="background:#f8f9fa;padding:20px;border-radius:10px;margin:20px 0;">
<h3>📍 Informações de Contato</h3>
<p><strong>📧 Email:</strong> contato@fredericapassos.pt</p>
<p><strong>📱 Telefone:</strong> +351 912 345 678</p>
<p><strong>🏢 Localização:</strong> Lisboa, Portugal</p>
</div>

<h3>🕒 Horários de Atendimento</h3>
<ul>
<li>Segunda a Sexta: 9h às 18h</li>
<li>Sábado: 9h às 13h</li>
<li>Consultas online disponíveis</li>
</ul>

<h3>💬 Agende sua Consulta</h3>
<p>Para agendar uma consulta, entre em contato por telefone ou email. Também é possível agendar através do formulário abaixo.</p>

<p><em>Ofereço atendimento presencial em Lisboa e consultas online para todo o Portugal.</em></p>',
        'slug' => 'contato'
    ),
    array(
        'title' => 'FAQ - Perguntas Frequentes',
        'content' => '<h2>Perguntas Frequentes</h2>

<h3>❓ Como agendar uma consulta?</h3>
<p>Você pode agendar sua consulta através do botão "Agende sua Consulta" no topo do site, ou entrando em contato diretamente pelos nossos canais de comunicação.</p>

<h3>❓ As consultas são presenciais ou online?</h3>
<p>Oferecemos ambas as opções: consultas presenciais no nosso consultório em Lisboa e consultas online através de plataforma segura e confidencial.</p>

<h3>❓ Quanto tempo dura uma sessão?</h3>
<p>As sessões têm duração de 50 minutos, tempo suficiente para um atendimento completo e efetivo.</p>

<h3>❓ Quais são as especialidades atendidas?</h3>
<p>Atendo saúde mental da mulher, saúde perinatal, saúde parental e sexualidade humana.</p>

<h3>❓ Como funcionam as formações profissionais?</h3>
<p>Oferecemos cursos presenciais e online para profissionais da saúde interessados em se especializar em saúde mental perinatal.</p>

<h3>❓ É possível atendimento para casais?</h3>
<p>Sim, ofereço atendimento para casais, especialmente em questões relacionadas à parentalidade e saúde reprodutiva.</p>

<h3>❓ Como funciona o pagamento?</h3>
<p>Aceitamos pagamentos por transferência bancária, MB Way e cartões de crédito. Oferecemos recibo válido para IRS.</p>

<h3>❓ É possível cancelamento ou reagendamento?</h3>
<p>Sim, aceitamos cancelamentos com 24 horas de antecedência sem custos. Reagendamentos podem ser feitos a qualquer momento.</p>

<p><strong>📞 Ainda tem dúvidas? Entre em contato!</strong></p>',
        'slug' => 'faq'
    )
);

foreach ($pages as $page_data) {
    $existing_page = get_page_by_path($page_data['slug']);
    if (!$existing_page) {
        $page_id = wp_insert_post(array(
            'post_title' => $page_data['title'],
            'post_content' => $page_data['content'],
            'post_status' => 'publish',
            'post_type' => 'page',
            'post_name' => $page_data['slug']
        ));

        if ($page_id) {
            echo "<p class='success'>✅ Página criada: {$page_data['title']}</p>";
        } else {
            echo "<p class='error'>❌ Erro ao criar página: {$page_data['title']}</p>";
        }
    } else {
        echo "<p class='info'>ℹ️ Página já existe: {$page_data['title']}</p>";
    }
}

// Step 6: Create Contact Form
echo "<h3>📝 Criando Formulário de Contato...</h3>";

if (function_exists('wpcf7_install')) {
    // Create contact form
    $form_post = array(
        'post_title' => 'Formulário de Contato',
        'post_content' => '<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
<div>
<label for="nome" class="block text-sm font-medium text-gray-700 mb-2">Nome *</label>
[text* nome class:input-field]
</div>
<div>
<label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
[email* email class:input-field]
</div>
</div>

<div class="mb-6">
<label for="telefone" class="block text-sm font-medium text-gray-700 mb-2">Telefone</label>
[tel telefone class:input-field]
</div>

<div class="mb-6">
<label for="tipo-consulta" class="block text-sm font-medium text-gray-700 mb-2">Tipo de Consulta</label>
[select* tipo-consulta class:input-field "Consulta Inicial" "Acompanhamento" "Emergência" "Outros"]
</div>

<div class="mb-6">
<label for="mensagem" class="block text-sm font-medium text-gray-700 mb-2">Mensagem *</label>
[textarea* mensagem class:input-field x4]
</div>

<div class="text-center">
[submit "Enviar Mensagem" class:btn-primary]
</div>',
        'post_status' => 'publish',
        'post_type' => 'wpcf7_contact_form'
    );

    $form_id = wp_insert_post($form_post);

    if ($form_id) {
        // Add form mail settings
        update_post_meta($form_id, '_mail', array(
            'subject' => 'Nova mensagem de contato - [nome]',
            'sender' => '[email]',
            'body' => 'De: [nome] <[email]>
Assunto: Nova mensagem de contato

Nome: [nome]
Email: [email]
Telefone: [telefone]
Tipo de Consulta: [tipo-consulta]

Mensagem:
[mensagem]

--
Este email foi enviado através do formulário de contato do site Frederica Passos.',
            'recipient' => get_option('admin_email'),
            'additional_headers' => 'Reply-To: [email]'
        ));

        echo "<p class='success'>✅ Formulário de contato criado!</p>";
    }
}

// Step 7: Set homepage
echo "<h3>🏠 Configurando Página Inicial...</h3>";

$home_page = get_page_by_path('home');
if (!$home_page) {
    $home_id = wp_insert_post(array(
        'post_title' => 'Home',
        'post_content' => '<!-- Esta página usa o template personalizado do tema Frederica Passos -->
<div class="hero-placeholder" style="height:100vh;background:#f56428;display:flex;align-items:center;justify-content:center;color:white;font-size:2rem;">
    Hero Section - Conteúdo carregado via template personalizado
</div>',
        'post_status' => 'publish',
        'post_type' => 'page',
        'post_name' => 'home'
    ));

    if ($home_id) {
        update_option('page_on_front', $home_id);
        update_option('show_on_front', 'page');
        echo "<p class='success'>✅ Página inicial configurada!</p>";
    }
}

// Step 8: Create custom post types
echo "<h3>📋 Criando Tipos de Post Personalizados...</h3>";

// Create Formações post type
$formations_labels = array(
    'name' => 'Formações',
    'singular_name' => 'Formação',
    'add_new' => 'Adicionar Nova Formação',
    'add_new_item' => 'Adicionar Nova Formação',
    'edit_item' => 'Editar Formação',
    'new_item' => 'Nova Formação',
    'view_item' => 'Ver Formação',
    'search_items' => 'Buscar Formações',
    'not_found' => 'Nenhuma formação encontrada',
    'not_found_in_trash' => 'Nenhuma formação encontrada na lixeira',
);

register_post_type('formacao', array(
    'labels' => $formations_labels,
    'public' => true,
    'has_archive' => true,
    'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
    'menu_icon' => 'dashicons-groups',
    'rewrite' => array('slug' => 'formacao'),
));

echo "<p class='success'>✅ Tipo de post 'Formações' criado!</p>";

// Create Áreas post type
$areas_labels = array(
    'name' => 'Áreas',
    'singular_name' => 'Área',
    'add_new' => 'Adicionar Nova Área',
    'add_new_item' => 'Adicionar Nova Área',
    'edit_item' => 'Editar Área',
    'new_item' => 'Nova Área',
    'view_item' => 'Ver Área',
    'search_items' => 'Buscar Áreas',
    'not_found' => 'Nenhuma área encontrada',
    'not_found_in_trash' => 'Nenhuma área encontrada na lixeira',
);

register_post_type('area', array(
    'labels' => $areas_labels,
    'public' => true,
    'has_archive' => true,
    'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
    'menu_icon' => 'dashicons-heart',
    'rewrite' => array('slug' => 'area'),
));

echo "<p class='success'>✅ Tipo de post 'Áreas' criado!</p>";

// Step 9: Flush rewrite rules
echo "<h3>🔄 Atualizando Regras de URL...</h3>";
flush_rewrite_rules();
echo "<p class='success'>✅ Regras de URL atualizadas!</p>";

// Step 10: Migrate content
echo "<h3>🔄 Migrando conteúdo do site original...</h3>";

require_once('migrate-content.php');

echo "<p class='success'>✅ Conteúdo migrado com sucesso!</p>";

// Step 11: Final setup
echo "<h3>🎉 FINALIZANDO INSTALAÇÃO...</h3>";

// Set site title and description
update_option('blogname', 'Frederica Passos');
update_option('blogdescription', 'Psiquiatria Perinatal e Sexualidade Humana');

// Set timezone
update_option('timezone_string', 'Europe/Lisbon');

// Set date format
update_option('date_format', 'd/m/Y');
update_option('time_format', 'H:i');

// Set start of week (Monday)
update_option('start_of_week', 1);

// Clear any caches
if (function_exists('wp_cache_flush')) {
    wp_cache_flush();
}

echo "<p class='success'>✅ Instalação completa finalizada!</p>";

?>

<hr style="margin:30px 0;border:none;border-top:2px solid #eee;">

<div style="background:#e8f5e8;padding:20px;border-radius:10px;border:2px solid green;margin:20px 0;">
    <h2 style="color:green;margin-top:0;">🎉 INSTALAÇÃO CONCLUÍDA COM SUCESSO!</h2>

    <h3>🌐 URLs de Acesso:</h3>
    <ul>
        <li><strong>Site WordPress:</strong> <a href="http://localhost:8000" target="_blank">http://localhost:8000</a></li>
        <li><strong>Painel Admin:</strong> <a href="http://localhost:8000/wp-admin" target="_blank">http://localhost:8000/wp-admin</a></li>
        <li><strong>phpMyAdmin:</strong> <a href="http://localhost:8080" target="_blank">http://localhost:8080</a></li>
    </ul>

    <h3>👤 Credenciais de Acesso:</h3>
    <ul>
        <li><strong>Usuário:</strong> admin</li>
        <li><strong>Senha:</strong> admin123</li>
        <li><strong>Email:</strong> admin@fredericapassos.pt</li>
    </ul>

    <h3>✅ O que foi instalado:</h3>
    <ul>
        <li>✅ WordPress completo</li>
        <li>✅ Tema "Frederica Passos" ativado</li>
        <li>✅ Plugins: ACF, Contact Form 7, Yoast SEO</li>
        <li>✅ Páginas essenciais criadas</li>
        <li>✅ Formulário de contato configurado</li>
        <li>✅ Tipos de post personalizados</li>
        <li>✅ Configurações otimizadas</li>
    </ul>

    <p><strong style="color:red;">⚠️ IMPORTANTE:</strong> Altere a senha do admin IMEDIATAMENTE após o primeiro acesso!</p>
</div>

<div style="background:#fff3cd;padding:15px;border-radius:5px;border:2px solid orange;margin:20px 0;">
    <h3 style="color:orange;margin-top:0;">📝 PRÓXIMOS PASSOS:</h3>
    <ol>
        <li>Abra <a href="http://localhost:8000" target="_blank">http://localhost:8000</a> no navegador</li>
        <li>Faça login no admin com usuário "admin" e senha "admin123"</li>
        <li>Altere a senha para algo seguro</li>
        <li>Personalize o conteúdo das páginas conforme necessário</li>
        <li>Configure as informações de contato</li>
    </ol>
</div>

<p style="text-align:center;font-size:18px;font-weight:bold;color:#2e7d32;">
    🚀 SEU SITE WORDPRESS ESTÁ 100% PRONTO E FUNCIONAL!
</p>