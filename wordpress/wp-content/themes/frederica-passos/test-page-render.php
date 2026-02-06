<?php
/**
 * Testar renderização da página
 */

require_once('/var/www/html/wp-load.php');

$page_id = 11;
$page = get_post($page_id);

echo "🔍 TESTE DE RENDERIZAÇÃO\n\n";
echo "📄 Título: " . $page->post_title . "\n";
echo "📊 Conteúdo: " . strlen($page->post_content) . " caracteres\n\n";

// Simular o que o template faz
$content = get_post_field('post_content', $page_id);
echo "📏 Conteúdo obtido: " . strlen($content) . " caracteres\n";
echo "🔍 Primeiros 500 caracteres:\n";
echo substr($content, 0, 500) . "...\n\n";

// Verificar se Elementor está interferindo
if (class_exists('Elementor\Plugin')) {
    $el = Elementor\Plugin::$instance;
    $is_elementor = $el->db->is_built_with_elementor($page_id);
    echo "🎨 É Elementor: " . ($is_elementor ? 'SIM' : 'NÃO') . "\n";
    
    if ($is_elementor) {
        $el_content = $el->frontend->get_builder_content_for_display($page_id);
        echo "📏 Conteúdo Elementor: " . strlen($el_content) . " caracteres\n";
    }
}

echo "\n✅ Teste completo!\n";
?>
