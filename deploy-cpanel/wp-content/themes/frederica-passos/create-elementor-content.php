<?php
/**
 * Script para criar conteúdo completo no Elementor automaticamente
 * Executar via: docker-compose exec wordpress php wp-content/themes/frederica-passos/create-elementor-content.php
 */

require_once('/var/www/html/wp-load.php');

// Verificar se Elementor está ativo
if (!class_exists('Elementor\Plugin')) {
    die('Elementor não está ativo!');
}

// ID da página Home
$page_id = 11;

// Dados das seções
$elementor_data = [
    [
        'id' => 'areas-especializacao',
        'elType' => 'section',
        'settings' => [
            'background_background' => 'classic',
            'background_color' => '#fce7f3',
            'padding' => [
                'unit' => 'px',
                'top' => 96,
                'right' => 0,
                'bottom' => 96,
                'left' => 0,
                'isLinked' => false
            ]
        ],
        'elements' => [
            [
                'id' => 'areas-title',
                'elType' => 'widget',
                'widgetType' => 'heading',
                'settings' => [
                    'title' => 'Áreas de Especialização',
                    'header_size' => 'h2',
                    'align' => 'center',
                    'title_color' => '#70309e',
                    'typography_typography' => 'custom',
                    'typography_font_family' => 'JH Caudemars',
                    'typography_font_size' => [
                        'unit' => 'px',
                        'size' => 64,
                        'sizes' => []
                    ],
                    'typography_font_weight' => '600',
                    'typography_line_height' => [
                        'unit' => 'em',
                        'size' => 1.2,
                        'sizes' => []
                    ],
                    '_margin' => [
                        'unit' => 'px',
                        'top' => 0,
                        'right' => 0,
                        'bottom' => 64,
                        'left' => 0,
                        'isLinked' => false
                    ]
                ]
            ],
            [
                'id' => 'areas-grid',
                'elType' => 'widget',
                'widgetType' => 'image-box',
                'settings' => [
                    'image' => [
                        'url' => get_template_directory_uri() . '/images/vertical/mulher.webp',
                        'id' => '',
                        'alt' => 'Psiquiatria da Mulher'
                    ],
                    'title_text' => 'Psiquiatria da Mulher',
                    'description_text' => 'Depressão perinatal, ansiedade gestacional, POC perinatal, psicose pós-parto',
                    'link' => [
                        'url' => '',
                        'is_external' => '',
                        'nofollow' => ''
                    ],
                    'position' => 'below',
                    'title_color' => '#ffffff',
                    'description_color' => '#ffffff',
                    'image_border_radius' => [
                        'unit' => 'px',
                        'top' => 8,
                        'right' => 8,
                        'bottom' => 8,
                        'left' => 8,
                        'isLinked' => true
                    ],
                    '_background_background' => 'classic',
                    '_background_color' => 'rgba(0,0,0,0.8)',
                    '_padding' => [
                        'unit' => 'px',
                        'top' => 24,
                        'right' => 24,
                        'bottom' => 24,
                        'left' => 24,
                        'isLinked' => true
                    ]
                ]
            ]
        ],
        'isInner' => false
    ]
];

// Função para criar estrutura Elementor
function create_elementor_structure($page_id, $data) {
    // Salvar dados do Elementor
    update_post_meta($page_id, '_elementor_data', wp_json_encode($data));
    update_post_meta($page_id, '_elementor_edit_mode', 'builder');
    update_post_meta($page_id, '_elementor_template_type', 'wp-page');
    update_post_meta($page_id, '_elementor_version', ELEMENTOR_VERSION);

    // Regenerar CSS do Elementor
    if (class_exists('Elementor\Plugin')) {
        Elementor\Plugin::$instance->files_manager->clear_cache();
    }

    return true;
}

// Executar criação do conteúdo
try {
    echo "🔄 Iniciando criação do conteúdo Elementor...\n";

    if (create_elementor_structure($page_id, $elementor_data)) {
        echo "✅ Estrutura Elementor criada com sucesso!\n";
    } else {
        echo "❌ Erro ao criar estrutura Elementor\n";
    }

} catch (Exception $e) {
    echo "❌ Erro: " . $e->getMessage() . "\n";
}

echo "🎉 Processo concluído!\n";
?>