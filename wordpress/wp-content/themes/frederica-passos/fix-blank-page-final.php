<?php
require_once('/var/www/html/wp-load.php');

echo "🔍 DIAGNOSTICANDO PÁGINA EM BRANCO...\n\n";

$page_id = 11;

$page = get_post($page_id);
echo "📄 Conteúdo da página: " . strlen($page->post_content) . " caracteres\n";

$edit_mode = get_post_meta($page_id, '_elementor_edit_mode', true);
echo "📝 Modo Elementor: " . ($edit_mode ?: 'NONE') . "\n";

// Problema: Se está marcado como builder mas Elementor não renderiza, vamos limpar
if ($edit_mode === 'builder') {
    echo "⚠️ Página marcada como Elementor, mas pode não estar renderizando\n";
    
    if (class_exists('Elementor\Plugin')) {
        $el = Elementor\Plugin::$instance;
        $content = $el->frontend->get_builder_content_for_display($page_id);
        
        echo "🔍 Conteúdo renderizado pelo Elementor: " . strlen($content) . " caracteres\n";
        
        if (strlen($content) < 100) {
            echo "❌ Elementor não está renderizando conteúdo!\n";
            echo "🔧 Removendo marcação Elementor e usando conteúdo HTML estático...\n";
            
            // Remover marcação Elementor
            delete_post_meta($page_id, '_elementor_edit_mode');
            delete_post_meta($page_id, '_elementor_template_type');
            
            // Garantir que o conteúdo HTML está na página
            if (empty($page->post_content) || strlen($page->post_content) < 1000) {
                echo "⚠️ Conteúdo da página muito pequeno. Recriando...\n";
                
                require_once('/var/www/html/wp-content/themes/frederica-passos/complete-rebuild.php');
            } else {
                echo "✅ Conteúdo HTML já existe na página\n";
            }
        } else {
            echo "✅ Elementor está renderizando conteúdo!\n";
        }
    }
} else {
    echo "ℹ️ Página NÃO está marcada como Elementor\n";
    
    if (empty($page->post_content) || strlen($page->post_content) < 1000) {
        echo "⚠️ Conteúdo da página muito pequeno. Recriando...\n";
        require_once('/var/www/html/wp-content/themes/frederica-passos/complete-rebuild.php');
    } else {
        echo "✅ Conteúdo HTML existe na página\n";
    }
}

echo "\n✅ Diagnóstico completo!\n";
echo "🌐 Teste: http://localhost:8000/\n";
?>
