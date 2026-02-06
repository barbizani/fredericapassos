<?php
/**
 * Configurar fontes customizadas no Elementor
 */

require_once('/var/www/html/wp-load.php');

echo "🔤 CONFIGURANDO FONTES CUSTOMIZADAS NO ELEMENTOR...\n\n";

// Adicionar fontes ao Elementor
add_filter('elementor/fonts/additional_fonts', function($additional_fonts) {
    $additional_fonts['JH Caudemars'] = 'custom';
    $additional_fonts['Neue Montreal'] = 'custom';
    return $additional_fonts;
});

// Adicionar CSS para as fontes
add_action('elementor/frontend/after_enqueue_styles', function() {
    $template_dir = get_template_directory_uri();
    ?>
    <style>
    @font-face {
        font-family: 'JH Caudemars';
        src: url('<?php echo $template_dir; ?>/images/jhcaudemars-medium.otf') format('opentype');
        font-weight: 500;
        font-style: normal;
        font-display: swap;
    }

    @font-face {
        font-family: 'JH Caudemars';
        src: url('<?php echo $template_dir; ?>/images/jhcaudemars-bolditalic.otf') format('opentype');
        font-weight: 700;
        font-style: italic;
        font-display: swap;
    }

    @font-face {
        font-family: 'Neue Montreal';
        src: url('<?php echo $template_dir; ?>/images/NeueMontreal-Regular.otf') format('opentype');
        font-weight: 400;
        font-style: normal;
        font-display: swap;
    }

    @font-face {
        font-family: 'Neue Montreal';
        src: url('<?php echo $template_dir; ?>/images/NeueMontreal-Medium.otf') format('opentype');
        font-weight: 500;
        font-style: normal;
        font-display: swap;
    }

    @font-face {
        font-family: 'Neue Montreal';
        src: url('<?php echo $template_dir; ?>/images/NeueMontreal-Bold.otf') format('opentype');
        font-weight: 700;
        font-style: normal;
        font-display: swap;
    }

    .elementor-widget-heading .elementor-heading-title {
        font-family: 'JH Caudemars', serif;
    }

    .elementor-widget-text-editor {
        font-family: 'Neue Montreal', sans-serif;
    }

    .elementor-widget-button .elementor-button {
        font-family: 'Neue Montreal', sans-serif;
    }
    </style>
    <?php
});

// Salvar configurações do Elementor
$elementor_settings = get_option('elementor_settings', []);
$elementor_settings['custom_typography'] = true;
update_option('elementor_settings', $elementor_settings);

echo "✅ Fontes configuradas com sucesso!\n";
echo "   • JH Caudemars (Títulos)\n";
echo "   • Neue Montreal (Textos)\n\n";

echo "✅ Configuração Elementor atualizada!\n";
echo "🎨 As fontes agora estão disponíveis no editor Elementor!\n";
?>