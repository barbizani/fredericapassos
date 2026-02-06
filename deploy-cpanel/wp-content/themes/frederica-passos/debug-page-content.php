<?php
/**
 * Debug: Ver o que está sendo renderizado
 */

require_once('/var/www/html/wp-load.php');

$page_id = 11;

echo "🔍 DEBUG PÁGINA $page_id\n\n";

$page = get_post($page_id);
echo "📄 Título: " . $page->post_title . "\n";
echo "📝 Status: " . $page->post_status . "\n";
echo "📊 Conteúdo: " . strlen($page->post_content) . " caracteres\n\n";

echo "📋 Primeiros 200 caracteres do conteúdo:\n";
echo substr($page->post_content, 0, 200) . "...\n\n";

$edit_mode = get_post_meta($page_id, '_elementor_edit_mode', true);
echo "🎨 Modo Elementor: " . ($edit_mode ?: 'NONE') . "\n";

$template = get_page_template_slug($page_id);
echo "📄 Template: " . ($template ?: 'default') . "\n\n";

if (class_exists('Elementor\Plugin')) {
    $el = Elementor\Plugin::$instance;
    $is_elementor = $el->db->is_built_with_elementor($page_id);
    echo "🏗️ Construída com Elementor: " . ($is_elementor ? 'SIM' : 'NÃO') . "\n";
    
    if ($is_elementor) {
        $content = $el->frontend->get_builder_content_for_display($page_id);
        echo "📏 Conteúdo renderizado Elementor: " . strlen($content) . " caracteres\n";
    }
}

echo "\n✅ Debug completo!\n";
?>
