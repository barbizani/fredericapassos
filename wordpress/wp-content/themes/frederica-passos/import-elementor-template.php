<?php
/**
 * Script para importar template Elementor automaticamente
 */

// Caminho correto para wp-load.php
$wp_load_path = '/var/www/html/wp-load.php';
if (!file_exists($wp_load_path)) {
    die("WordPress não encontrado em: $wp_load_path\n");
}

require_once($wp_load_path);

// Verificar se Elementor está ativo
if (!class_exists('Elementor\Plugin')) {
    die("Elementor não está ativo!\n");
}

echo "🚀 Iniciando importação do template Elementor...\n";

// ID da página Home
$page_id = 11;

// Template Elementor completo com todas as seções
$elementor_data = [
    [
        'id' => 'hero-section',
        'elType' => 'section',
        'settings' => [
            'background_background' => 'classic',
            'background_color' => '#70309e',
            'padding' => [
                'unit' => 'px',
                'top' => 450,
                'right' => 0,
                'bottom' => 450,
                'left' => 0,
                'isLinked' => false
            ]
        ],
        'elements' => [
            [
                'id' => 'hero-title',
                'elType' => 'widget',
                'widgetType' => 'heading',
                'settings' => [
                    'title' => 'Prazer, Frederica Passos',
                    'header_size' => 'h1',
                    'align' => 'left',
                    'title_color' => '#ffffff',
                    'typography_typography' => 'custom',
                    'typography_font_family' => 'JH Caudemars',
                    'typography_font_size' => [
                        'unit' => 'px',
                        'size' => 72
                    ],
                    'typography_font_weight' => '600'
                ]
            ],
            [
                'id' => 'hero-subtitle',
                'elType' => 'widget',
                'widgetType' => 'text-editor',
                'settings' => [
                    'editor' => 'Psiquiatria Perinatal e Sexualidade Humana.<br />Consultas presenciais e online.',
                    'text_color' => '#ffffff',
                    'typography_typography' => 'custom',
                    'typography_font_family' => 'Neue Montreal',
                    'typography_font_size' => [
                        'unit' => 'px',
                        'size' => 18
                    ]
                ]
            ],
            [
                'id' => 'hero-button',
                'elType' => 'widget',
                'widgetType' => 'button',
                'settings' => [
                    'text' => 'Contrate',
                    'background_color' => '#f56428',
                    'text_color' => '#ffffff',
                    'border_radius' => [
                        'unit' => 'px',
                        'size' => 8
                    ],
                    'padding' => [
                        'unit' => 'px',
                        'top' => 16,
                        'right' => 32,
                        'bottom' => 16,
                        'left' => 32,
                        'isLinked' => false
                    ]
                ]
            ]
        ],
        'isInner' => false
    ],
    [
        'id' => 'scrolling-text-section',
        'elType' => 'section',
        'settings' => [
            'background_background' => 'classic',
            'background_color' => '#161616',
            'padding' => [
                'unit' => 'px',
                'top' => 16,
                'right' => 0,
                'bottom' => 16,
                'left' => 0,
                'isLinked' => false
            ]
        ],
        'elements' => [
            [
                'id' => 'scrolling-text',
                'elType' => 'widget',
                'widgetType' => 'text-editor',
                'settings' => [
                    'editor' => '<div style="overflow: hidden; white-space: nowrap;"><div style="display: inline-block; animation: scroll 120s linear infinite; font-family: JH Caudemars; font-size: 24px; color: white;">' . str_repeat('Psiquiatria Contemporânea para Mentes que não cabem em Rótulos. ', 20) . '</div></div>',
                    'text_color' => '#ffffff'
                ]
            ]
        ],
        'isInner' => false
    ],
    [
        'id' => 'about-section',
        'elType' => 'section',
        'settings' => [
            'background_background' => 'classic',
            'background_color' => '#f2ede7',
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
                'id' => 'about-container',
                'elType' => 'widget',
                'widgetType' => 'inner-section',
                'settings' => [],
                'elements' => [
                    [
                        'id' => 'about-left',
                        'elType' => 'column',
                        'settings' => [
                            '_column_size' => 50
                        ],
                        'elements' => [
                            [
                                'id' => 'about-title',
                                'elType' => 'widget',
                                'widgetType' => 'heading',
                                'settings' => [
                                    'title' => 'Uma Carreira Dedicada à Saúde Mental da Mulher',
                                    'header_size' => 'h2',
                                    'align' => 'left',
                                    'title_color' => '#70309e',
                                    'typography_typography' => 'custom',
                                    'typography_font_family' => 'JH Caudemars',
                                    'typography_font_size' => [
                                        'unit' => 'px',
                                        'size' => 64
                                    ],
                                    'typography_font_weight' => '600',
                                    'margin' => [
                                        'unit' => 'px',
                                        'top' => 0,
                                        'right' => 0,
                                        'bottom' => 32,
                                        'left' => 0,
                                        'isLinked' => false
                                    ]
                                ]
                            ],
                            [
                                'id' => 'about-text',
                                'elType' => 'widget',
                                'widgetType' => 'text-editor',
                                'settings' => [
                                    'editor' => '<p style="font-family: Neue Montreal; font-size: 18px; line-height: 1.6; color: #6b7280; margin-bottom: 24px;"><strong>Dra. Frederica Passos Barbizani</strong> é psiquiatra especializada em Saúde Mental da Mulher. Com foco no universo feminino, acredita que toda mulher merece cuidados de saúde mental que respeitem suas particularidades biológicas, psicológicas e sociais.</p><p style="font-family: Neue Montreal; font-size: 18px; line-height: 1.6; color: #6b7280;">Especializou-se em Psiquiatria no Hospital Beatriz Ângelo, com foco em Psiquiatria da Mulher e Psiquiatria Perinatal. Sua prática clínica baseia-se em pilares fundamentais: cuidado humanizado, evidência científica, abordagem integral e empoderamento da paciente. Dedica-se também à investigação científica, com interesse particular em perturbações do humor no período perinatal, impacto hormonal na saúde mental, sexualidade, identidade de género, competências parentais e dinâmicas familiares.</p>',
                                    'text_color' => '#6b7280'
                                ]
                            ]
                        ]
                    ],
                    [
                        'id' => 'about-right',
                        'elType' => 'column',
                        'settings' => [
                            '_column_size' => 50
                        ],
                        'elements' => [
                            [
                                'id' => 'about-image',
                                'elType' => 'widget',
                                'widgetType' => 'image',
                                'settings' => [
                                    'image' => [
                                        'url' => get_template_directory_uri() . '/images/fotofrederica.webp',
                                        'id' => '',
                                        'alt' => 'Dra. Frederica Passos Barbizani'
                                    ],
                                    'image_border_radius' => [
                                        'unit' => 'px',
                                        'size' => 8
                                    ],
                                    'align' => 'center'
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ],
        'isInner' => false
    ],
    [
        'id' => 'orange-strip',
        'elType' => 'section',
        'settings' => [
            'background_background' => 'classic',
            'background_color' => '#f56428',
            'padding' => [
                'unit' => 'px',
                'top' => 32,
                'right' => 0,
                'bottom' => 32,
                'left' => 0,
                'isLinked' => false
            ],
            'background_image' => [
                'url' => get_template_directory_uri() . '/images/patternroxo.svg'
            ],
            'background_position' => 'center center',
            'background_repeat' => 'repeat',
            'background_size' => '3000px 3000px'
        ],
        'elements' => [],
        'isInner' => false
    ],
    [
        'id' => 'areas-section',
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
                        'size' => 64
                    ],
                    'typography_font_weight' => '600',
                    'margin' => [
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
                'widgetType' => 'inner-section',
                'settings' => [],
                'elements' => [
                    [
                        'id' => 'area-1-col',
                        'elType' => 'column',
                        'settings' => [
                            '_column_size' => 25
                        ],
                        'elements' => [
                            [
                                'id' => 'area-1',
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
                                    'position' => 'below',
                                    'title_color' => '#ffffff',
                                    'description_color' => '#ffffff',
                                    'image_border_radius' => [
                                        'unit' => 'px',
                                        'size' => 8
                                    ],
                                    'background_background' => 'classic',
                                    'background_color' => 'rgba(0,0,0,0.8)',
                                    'padding' => [
                                        'unit' => 'px',
                                        'top' => 24,
                                        'right' => 24,
                                        'bottom' => 24,
                                        'left' => 24,
                                        'isLinked' => true
                                    ],
                                    'hover_animation' => 'grow'
                                ]
                            ]
                        ]
                    ],
                    [
                        'id' => 'area-2-col',
                        'elType' => 'column',
                        'settings' => [
                            '_column_size' => 25
                        ],
                        'elements' => [
                            [
                                'id' => 'area-2',
                                'elType' => 'widget',
                                'widgetType' => 'image-box',
                                'settings' => [
                                    'image' => [
                                        'url' => get_template_directory_uri() . '/images/vertical/parental.webp',
                                        'id' => '',
                                        'alt' => 'Orientação Parental'
                                    ],
                                    'title_text' => 'Orientação Parental',
                                    'description_text' => 'Competências parentais, gestão de comportamentos, comunicação familiar',
                                    'position' => 'below',
                                    'title_color' => '#ffffff',
                                    'description_color' => '#ffffff',
                                    'image_border_radius' => [
                                        'unit' => 'px',
                                        'size' => 8
                                    ],
                                    'background_background' => 'classic',
                                    'background_color' => 'rgba(0,0,0,0.8)',
                                    'padding' => [
                                        'unit' => 'px',
                                        'top' => 24,
                                        'right' => 24,
                                        'bottom' => 24,
                                        'left' => 24,
                                        'isLinked' => true
                                    ],
                                    'hover_animation' => 'grow'
                                ]
                            ]
                        ]
                    ],
                    [
                        'id' => 'area-3-col',
                        'elType' => 'column',
                        'settings' => [
                            '_column_size' => 25
                        ],
                        'elements' => [
                            [
                                'id' => 'area-3',
                                'elType' => 'widget',
                                'widgetType' => 'image-box',
                                'settings' => [
                                    'image' => [
                                        'url' => get_template_directory_uri() . '/images/vertical/perinatal.webp',
                                        'id' => '',
                                        'alt' => 'Psiquiatria Perinatal'
                                    ],
                                    'title_text' => 'Psiquiatria Perinatal',
                                    'description_text' => 'Disfunções sexuais, identidade de género, orientação sexual, disforia de género',
                                    'position' => 'below',
                                    'title_color' => '#ffffff',
                                    'description_color' => '#ffffff',
                                    'image_border_radius' => [
                                        'unit' => 'px',
                                        'size' => 8
                                    ],
                                    'background_background' => 'classic',
                                    'background_color' => 'rgba(0,0,0,0.8)',
                                    'padding' => [
                                        'unit' => 'px',
                                        'top' => 24,
                                        'right' => 24,
                                        'bottom' => 24,
                                        'left' => 24,
                                        'isLinked' => true
                                    ],
                                    'hover_animation' => 'grow'
                                ]
                            ]
                        ]
                    ],
                    [
                        'id' => 'area-4-col',
                        'elType' => 'column',
                        'settings' => [
                            '_column_size' => 25
                        ],
                        'elements' => [
                            [
                                'id' => 'area-4',
                                'elType' => 'widget',
                                'widgetType' => 'image-box',
                                'settings' => [
                                    'image' => [
                                        'url' => get_template_directory_uri() . '/images/vertical/sexhuman.webp',
                                        'id' => '',
                                        'alt' => 'Sexualidade Humana'
                                    ],
                                    'title_text' => 'Sexualidade Humana',
                                    'description_text' => 'Disfunções sexuais, identidade de género, orientação sexual, disforia de género',
                                    'position' => 'below',
                                    'title_color' => '#ffffff',
                                    'description_color' => '#ffffff',
                                    'image_border_radius' => [
                                        'unit' => 'px',
                                        'size' => 8
                                    ],
                                    'background_background' => 'classic',
                                    'background_color' => 'rgba(0,0,0,0.8)',
                                    'padding' => [
                                        'unit' => 'px',
                                        'top' => 24,
                                        'right' => 24,
                                        'bottom' => 24,
                                        'left' => 24,
                                        'isLinked' => true
                                    ],
                                    'hover_animation' => 'grow'
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ],
        'isInner' => false
    ]
];

// Salvar dados do Elementor
try {
    update_post_meta($page_id, '_elementor_data', wp_json_encode($elementor_data));
    update_post_meta($page_id, '_elementor_edit_mode', 'builder');
    update_post_meta($page_id, '_elementor_template_type', 'wp-page');
    update_post_meta($page_id, '_elementor_version', ELEMENTOR_VERSION);

    // Regenerar CSS do Elementor
    if (class_exists('Elementor\Plugin')) {
        Elementor\Plugin::$instance->files_manager->clear_cache();
    }

    echo "✅ Template Elementor importado com sucesso!\n";
    echo "📄 Página ID: $page_id\n";
    echo "🌐 URL: " . get_permalink($page_id) . "\n";

} catch (Exception $e) {
    echo "❌ Erro ao importar template: " . $e->getMessage() . "\n";
}

echo "🎉 Importação concluída!\n";
?>