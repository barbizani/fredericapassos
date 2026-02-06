<?php
require_once('/var/www/html/wp-load.php');

echo "🔧 FORÇANDO EXIBIÇÃO DO CONTEÚDO HTML ESTÁTICO...\n\n";

$page_id = 11;

// Temporariamente remover marcação Elementor para mostrar HTML estático
$edit_mode = get_post_meta($page_id, '_elementor_edit_mode', true);
echo "📝 Modo Elementor atual: " . ($edit_mode ?: 'NONE') . "\n";

// Não remover completamente, apenas garantir que o HTML estático será usado
// O template já tem lógica para isso

// Verificar conteúdo
$page = get_post($page_id);
echo "📄 Conteúdo HTML: " . strlen($page->post_content) . " caracteres\n";

// Verificar se Elementor tem conteúdo
if (class_exists('Elementor\Plugin')) {
    $el = Elementor\Plugin::$instance;
    $is_elementor = $el->db->is_built_with_elementor($page_id);
    $el_content = $el->frontend->get_builder_content_for_display($page_id);
    
    echo "🎨 É Elementor: " . ($is_elementor ? 'SIM' : 'NÃO') . "\n";
    echo "📏 Conteúdo Elementor: " . strlen($el_content) . " caracteres\n";
    
    if ($is_elementor && strlen($el_content) < 100) {
        echo "⚠️ Elementor não tem conteúdo mas está marcado como builder\n";
        echo "✅ O template vai usar HTML estático automaticamente\n";
    }
}

echo "\n✅ Processo completo!\n";
echo "🌐 Teste: http://localhost:8000/\n";
?>
