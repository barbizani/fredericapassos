<?php
require_once('/var/www/html/wp-load.php');

$page_id = 11;
$page = get_post($page_id);

echo "🔍 TESTE DE RENDERIZAÇÃO DE CONTEÚDO\n\n";
echo "📄 Conteúdo da página: " . strlen($page->post_content) . " caracteres\n";

$html_content = get_post_field('post_content', $page_id);
echo "📋 get_post_field: " . strlen($html_content) . " caracteres\n\n";

echo "🔍 Primeiros 200 caracteres:\n";
echo substr($html_content, 0, 200) . "...\n\n";

if (class_exists('Elementor\Plugin')) {
    $el = Elementor\Plugin::$instance;
    $is_elementor = $el->db->is_built_with_elementor($page_id);
    echo "🎨 É Elementor: " . ($is_elementor ? 'SIM' : 'NÃO') . "\n";
    
    if ($is_elementor) {
        $el_content = $el->frontend->get_builder_content_for_display($page_id);
        echo "📏 Conteúdo Elementor: " . strlen($el_content) . " caracteres\n";
        
        if (strlen($el_content) < 100) {
            echo "✅ Vai usar HTML estático (Elementor não tem conteúdo)\n";
        } else {
            echo "✅ Vai usar Elementor\n";
        }
    } else {
        echo "✅ Vai usar HTML estático (não é Elementor)\n";
    }
}

echo "\n✅ Teste completo!\n";
?>
