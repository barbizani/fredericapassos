<?php
require_once('/var/www/html/wp-load.php');

echo "🔧 CORRIGINDO RENDERIZAÇÃO DO ELEMENTOR...\n\n";

if (!class_exists('Elementor\Plugin')) {
    die("❌ Elementor não está instalado!\n");
}

$page_id = 11;

echo "🔄 Limpando todos os caches e dados do Elementor...\n";

delete_post_meta($page_id, '_elementor_css');
delete_post_meta($page_id, '_elementor_page_assets');
Elementor\Plugin::$instance->files_manager->clear_cache();
Elementor\Plugin::$instance->posts_css_manager->clear_cache();

echo "✅ Cache limpo\n";

echo "🔄 Verificando dados do Elementor...\n";
$elementor_data = get_post_meta($page_id, '_elementor_data', true);

if ($elementor_data) {
    $data = json_decode($elementor_data, true);
    
    if (json_last_error() !== JSON_ERROR_NONE) {
        echo "❌ Erro ao decodificar JSON: " . json_last_error_msg() . "\n";
        echo "🔧 Recriando dados...\n";
        require_once('/var/www/html/wp-content/themes/frederica-passos/final-complete-elementor-template.php');
        exit;
    }
    
    echo "✅ JSON válido\n";
    echo "📊 Número de seções: " . (is_array($data) ? count($data) : 0) . "\n";
    
    if (empty($data) || !is_array($data)) {
        echo "❌ Dados vazios ou inválidos!\n";
        echo "🔧 Recriando dados...\n";
        require_once('/var/www/html/wp-content/themes/frederica-passos/final-complete-elementor-template.php');
        exit;
    }
} else {
    echo "❌ Nenhum dado do Elementor encontrado!\n";
    echo "🔧 Criando dados...\n";
    require_once('/var/www/html/wp-content/themes/frederica-passos/final-complete-elementor-template.php');
    exit;
}

echo "\n🔧 Forçando marcação da página como Elementor...\n";
update_post_meta($page_id, '_elementor_edit_mode', 'builder');
update_post_meta($page_id, '_elementor_template_type', 'wp-page');

try {
    Elementor\Plugin::$instance->db->mark_elementor_as_built_with_elementor($page_id);
    echo "✅ Página marcada como Elementor\n";
} catch (Exception $e) {
    echo "⚠️ Erro ao marcar: " . $e->getMessage() . "\n";
}

echo "\n🔄 Testando renderização novamente...\n";
$content = Elementor\Plugin::$instance->frontend->get_builder_content_for_display($page_id);
$content_length = strlen($content);

echo "📏 Conteúdo renderizado: " . $content_length . " caracteres\n";

if ($content_length < 100) {
    echo "⚠️ Ainda não renderiza. Usando abordagem alternativa...\n";
    
    update_post_meta($page_id, '_elementor_edit_mode', '');
    delete_post_meta($page_id, '_elementor_edit_mode');
    
    wp_update_post([
        'ID' => $page_id,
        'post_content' => '<div class="elementor">Conteúdo será editado no Elementor</div>'
    ]);
    
    echo "✅ Página resetada. Agora acesse o Elementor manualmente.\n";
    echo "🌐 URL: http://localhost:8000/wp-admin/post.php?post=11&action=elementor\n";
} else {
    echo "✅ Renderização funcionando!\n";
}

echo "\n✅ Processo concluído!\n";
?>
