<?php
/**
 * Debug script for Elementor
 */

require_once('/var/www/html/wp-load.php');

$page_id = 11;

echo "🔍 DIAGNÓSTICO ELEMENTOR\n";
echo "========================\n\n";

// Check if Elementor is active
echo "1. Elementor ativo: " . (class_exists('Elementor\Plugin') ? "✅ SIM" : "❌ NÃO") . "\n";

// Check if page is built with Elementor
$is_built_with_elementor = class_exists('Elementor\Plugin') && \Elementor\Plugin::$instance->db->is_built_with_elementor($page_id);
echo "2. Página construída com Elementor: " . ($is_built_with_elementor ? "✅ SIM" : "❌ NÃO") . "\n";

// Check Elementor data
$elementor_data = get_post_meta($page_id, '_elementor_data', true);
echo "3. Dados Elementor existem: " . (!empty($elementor_data) ? "✅ SIM (" . strlen($elementor_data) . " chars)" : "❌ NÃO") . "\n";

// Check edit mode
$edit_mode = get_post_meta($page_id, '_elementor_edit_mode', true);
echo "4. Modo de edição: " . ($edit_mode ? "✅ $edit_mode" : "❌ NÃO DEFINIDO") . "\n";

// Try to render content
if ($is_built_with_elementor) {
    echo "\n🎨 TENTANDO RENDERIZAR CONTEÚDO...\n";

    try {
        ob_start();
        $content = \Elementor\Plugin::$instance->frontend->get_builder_content_for_display($page_id);
        $output = ob_get_clean();

        echo "5. Renderização bem-sucedida: ✅\n";
        echo "6. Tamanho do conteúdo: " . strlen($content) . " caracteres\n";

        if (strlen($content) > 100) {
            echo "7. Preview do conteúdo: " . substr(strip_tags($content), 0, 100) . "...\n";
        }

    } catch (Exception $e) {
        echo "5. Erro na renderização: ❌ " . $e->getMessage() . "\n";
    }
}

echo "\n🔧 RECOMENDAÇÕES:\n";
if (!$is_built_with_elementor) {
    echo "- Página não foi construída com Elementor\n";
    echo "- Verificar se o template está correto\n";
}
if (empty($elementor_data)) {
    echo "- Dados do Elementor não foram salvos\n";
    echo "- Recriar o template\n";
}
if (!$edit_mode) {
    echo "- Modo de edição não definido\n";
    echo "- Definir _elementor_edit_mode como 'builder'\n";
}

echo "\n✅ Diagnóstico concluído!\n";
?>