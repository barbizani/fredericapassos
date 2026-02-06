<?php
require_once('/var/www/html/wp-load.php');

echo "🔍 DIAGNOSTICANDO PÁGINA EM BRANCO...\n\n";

$page_id = 11;

if (!class_exists('Elementor\Plugin')) {
    die("❌ Elementor não está instalado!\n");
}

echo "✅ Elementor está ativo\n";

$edit_mode = get_post_meta($page_id, '_elementor_edit_mode', true);
echo "📝 Modo de edição: " . ($edit_mode ? $edit_mode : 'não definido') . "\n";

$elementor_data = get_post_meta($page_id, '_elementor_data', true);
$data_length = $elementor_data ? strlen($elementor_data) : 0;
echo "📊 Tamanho dos dados: " . $data_length . " bytes\n";

if (!$elementor_data || $data_length < 100) {
    echo "❌ Dados do Elementor não encontrados ou muito pequenos!\n";
    echo "🔧 Recriando dados...\n";
    
    require_once('/var/www/html/wp-content/themes/frederica-passos/final-complete-elementor-template.php');
    exit;
}

$is_built = Elementor\Plugin::$instance->db->is_built_with_elementor($page_id);
echo "🏗️ Construída com Elementor: " . ($is_built ? 'SIM' : 'NÃO') . "\n";

if (!$is_built) {
    echo "🔧 Marcando página como construída com Elementor...\n";
    update_post_meta($page_id, '_elementor_edit_mode', 'builder');
    Elementor\Plugin::$instance->db->mark_elementor_as_built_with_elementor($page_id);
}

echo "\n🧪 Testando renderização...\n";
try {
    $content = Elementor\Plugin::$instance->frontend->get_builder_content_for_display($page_id);
    $content_length = strlen($content);
    echo "📏 Conteúdo renderizado: " . $content_length . " caracteres\n";
    
    if ($content_length < 100) {
        echo "⚠️ Conteúdo muito pequeno! Pode estar vazio.\n";
        echo "🔧 Tentando forçar renderização...\n";
        
        Elementor\Plugin::$instance->db->mark_elementor_as_built_with_elementor($page_id);
        Elementor\Plugin::$instance->files_manager->clear_cache();
        
        update_post_meta($page_id, '_elementor_css', '');
        delete_post_meta($page_id, '_elementor_css');
        
        $content = Elementor\Plugin::$instance->frontend->get_builder_content_for_display($page_id);
        echo "📏 Conteúdo após limpeza: " . strlen($content) . " caracteres\n";
    }
} catch (Exception $e) {
    echo "❌ Erro ao renderizar: " . $e->getMessage() . "\n";
}

echo "\n🔄 Limpando cache do Elementor...\n";
Elementor\Plugin::$instance->files_manager->clear_cache();

echo "\n✅ Diagnóstico completo!\n";
echo "🌐 Teste a página: http://localhost:8000/\n";
?>
