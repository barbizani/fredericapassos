<?php
/**
 * Script para adicionar mais seções Elementor automaticamente
 */

require_once('/var/www/html/wp-load.php');

if (!class_exists('Elementor\Plugin')) {
    die("Elementor não está ativo!\n");
}

echo "🔄 Adicionando seções adicionais...\n";

$page_id = 11;

// Buscar dados existentes do Elementor
$existing_data = get_post_meta($page_id, '_elementor_data', true);
if (!$existing_data) {
    $existing_data = [];
} else {
    $existing_data = json_decode($existing_data, true);
}

// Novas seções a adicionar
$new_sections = [
    [
        'id' => 'stats-section',
        'elType' => 'section',
        'settings' => [
            'background_background' => 'classic',
            'background_color' => '#70309e',
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
                'id' => 'stats-title',
                'elType' => 'widget',
                'widgetType' => 'heading',
                'settings' => [
                    'title' => 'Estatísticas da Prática Clínica',
                    'header_size' => 'h2',
                    'align' => 'center',
                    'title_color' => '#ffffff',
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
                'id' => 'stats-grid',
                'elType' => 'widget',
                'widgetType' => 'inner-section',
                'settings' => [],
                'elements' => [
                    [
                        'id' => 'stat-1-col',
                        'elType' => 'column',
                        'settings' => ['_column_size' => 25],
                        'elements' => [
                            [
                                'id' => 'stat-1',
                                'elType' => 'widget',
                                'widgetType' => 'counter',
                                'settings' => [
                                    'starting_number' => '0',
                                    'ending_number' => '500',
                                    'number_prefix' => '+',
                                    'title' => 'Mulheres Tratadas em Psiquiatria Perinatal',
                                    'counter_color' => '#ffffff',
                                    'title_color' => '#ffffff',
                                    'typography_number_typography' => 'custom',
                                    'typography_number_font_family' => 'JH Caudemars',
                                    'typography_number_font_size' => ['unit' => 'px', 'size' => 48],
                                    'typography_title_typography' => 'custom',
                                    'typography_title_font_family' => 'Neue Montreal'
                                ]
                            ]
                        ]
                    ],
                    [
                        'id' => 'stat-2-col',
                        'elType' => 'column',
                        'settings' => ['_column_size' => 25],
                        'elements' => [
                            [
                                'id' => 'stat-2',
                                'elType' => 'widget',
                                'widgetType' => 'counter',
                                'settings' => [
                                    'starting_number' => '0',
                                    'ending_number' => '85',
                                    'number_suffix' => '%',
                                    'title' => 'Melhoria Significativa nos Sintomas de Depressão Pós Parto',
                                    'counter_color' => '#ffffff',
                                    'title_color' => '#ffffff',
                                    'typography_number_typography' => 'custom',
                                    'typography_number_font_family' => 'JH Caudemars',
                                    'typography_number_font_size' => ['unit' => 'px', 'size' => 48],
                                    'typography_title_typography' => 'custom',
                                    'typography_title_font_family' => 'Neue Montreal'
                                ]
                            ]
                        ]
                    ],
                    [
                        'id' => 'stat-3-col',
                        'elType' => 'column',
                        'settings' => ['_column_size' => 25],
                        'elements' => [
                            [
                                'id' => 'stat-3',
                                'elType' => 'widget',
                                'widgetType' => 'counter',
                                'settings' => [
                                    'starting_number' => '0',
                                    'ending_number' => '50',
                                    'number_prefix' => '+',
                                    'title' => 'Profissionais de Saúde Formados',
                                    'counter_color' => '#ffffff',
                                    'title_color' => '#ffffff',
                                    'typography_number_typography' => 'custom',
                                    'typography_number_font_family' => 'JH Caudemars',
                                    'typography_number_font_size' => ['unit' => 'px', 'size' => 48],
                                    'typography_title_typography' => 'custom',
                                    'typography_title_font_family' => 'Neue Montreal'
                                ]
                            ]
                        ]
                    ],
                    [
                        'id' => 'stat-4-col',
                        'elType' => 'column',
                        'settings' => ['_column_size' => 25],
                        'elements' => [
                            [
                                'id' => 'stat-4',
                                'elType' => 'widget',
                                'widgetType' => 'counter',
                                'settings' => [
                                    'starting_number' => '0',
                                    'ending_number' => '90',
                                    'number_suffix' => '%',
                                    'title' => 'Satisfação com o Tratamento',
                                    'counter_color' => '#ffffff',
                                    'title_color' => '#ffffff',
                                    'typography_number_typography' => 'custom',
                                    'typography_number_font_family' => 'JH Caudemars',
                                    'typography_number_font_size' => ['unit' => 'px', 'size' => 48],
                                    'typography_title_typography' => 'custom',
                                    'typography_title_font_family' => 'Neue Montreal'
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
        'id' => 'formations-section',
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
                'id' => 'formations-title',
                'elType' => 'widget',
                'widgetType' => 'heading',
                'settings' => [
                    'title' => 'Formações e Cursos Profissionais',
                    'header_size' => 'h2',
                    'align' => 'center',
                    'title_color' => '#70309e',
                    'typography_typography' => 'custom',
                    'typography_font_family' => 'JH Caudemars',
                    'typography_font_size' => [
                        'unit' => 'px',
                        'size' => 64
                    ]
                ]
            ],
            [
                'id' => 'formations-text',
                'elType' => 'widget',
                'widgetType' => 'text-editor',
                'settings' => [
                    'editor' => '<p style="text-align: center; font-family: Neue Montreal; font-size: 18px; color: #6b7280;">Aqui você encontrará informações sobre formações e cursos profissionais oferecidos.</p>',
                    'align' => 'center'
                ]
            ]
        ],
        'isInner' => false
    ],
    [
        'id' => 'resources-section',
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
                'id' => 'resources-title',
                'elType' => 'widget',
                'widgetType' => 'heading',
                'settings' => [
                    'title' => 'Recursos Educativos',
                    'header_size' => 'h2',
                    'align' => 'center',
                    'title_color' => '#70309e',
                    'typography_typography' => 'custom',
                    'typography_font_family' => 'JH Caudemars',
                    'typography_font_size' => [
                        'unit' => 'px',
                        'size' => 64
                    ]
                ]
            ],
            [
                'id' => 'resources-buttons',
                'elType' => 'widget',
                'widgetType' => 'inner-section',
                'settings' => [],
                'elements' => [
                    [
                        'id' => 'ebook-col',
                        'elType' => 'column',
                        'settings' => ['_column_size' => 33.333],
                        'elements' => [
                            [
                                'id' => 'ebook-btn',
                                'elType' => 'widget',
                                'widgetType' => 'button',
                                'settings' => [
                                    'text' => 'E-books',
                                    'background_color' => '#f56428',
                                    'text_color' => '#ffffff',
                                    'align' => 'center'
                                ]
                            ]
                        ]
                    ],
                    [
                        'id' => 'articles-col',
                        'elType' => 'column',
                        'settings' => ['_column_size' => 33.333],
                        'elements' => [
                            [
                                'id' => 'articles-btn',
                                'elType' => 'widget',
                                'widgetType' => 'button',
                                'settings' => [
                                    'text' => 'Artigos e Guias',
                                    'background_color' => '#f56428',
                                    'text_color' => '#ffffff',
                                    'align' => 'center'
                                ]
                            ]
                        ]
                    ],
                    [
                        'id' => 'videos-col',
                        'elType' => 'column',
                        'settings' => ['_column_size' => 33.333],
                        'elements' => [
                            [
                                'id' => 'videos-btn',
                                'elType' => 'widget',
                                'widgetType' => 'button',
                                'settings' => [
                                    'text' => 'Vídeos Educativos',
                                    'background_color' => '#f56428',
                                    'text_color' => '#ffffff',
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
        'id' => 'typewriter-section',
        'elType' => 'section',
        'settings' => [
            'background_background' => 'classic',
            'background_color' => '#70309e',
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
                'id' => 'typewriter-text',
                'elType' => 'widget',
                'widgetType' => 'heading',
                'settings' => [
                    'title' => 'Diagnóstico: Ser Humano. Tá Tudo Bem não Estar Bem. Cuidar da Mente é Revolucionário.',
                    'header_size' => 'h2',
                    'align' => 'center',
                    'title_color' => '#ffffff',
                    'typography_typography' => 'custom',
                    'typography_font_family' => 'JH Caudemars',
                    'typography_font_size' => [
                        'unit' => 'px',
                        'size' => 32
                    ]
                ]
            ]
        ],
        'isInner' => false
    ],
    [
        'id' => 'faq-section',
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
                'id' => 'faq-title',
                'elType' => 'widget',
                'widgetType' => 'heading',
                'settings' => [
                    'title' => 'Perguntas Frequentes',
                    'header_size' => 'h2',
                    'align' => 'center',
                    'title_color' => '#70309e',
                    'typography_typography' => 'custom',
                    'typography_font_family' => 'JH Caudemars',
                    'typography_font_size' => [
                        'unit' => 'px',
                        'size' => 64
                    ]
                ]
            ],
            [
                'id' => 'faq-accordion',
                'elType' => 'widget',
                'widgetType' => 'accordion',
                'settings' => [
                    'faq_schema' => 'yes',
                    'title_color' => '#70309e',
                    'tab_active_color' => '#f56428'
                ]
            ]
        ],
        'isInner' => false
    ],
    [
        'id' => 'contact-section',
        'elType' => 'section',
        'settings' => [
            'background_background' => 'classic',
            'background_color' => '#f56428',
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
                'id' => 'contact-title',
                'elType' => 'widget',
                'widgetType' => 'heading',
                'settings' => [
                    'title' => 'Contato',
                    'header_size' => 'h2',
                    'align' => 'center',
                    'title_color' => '#ffffff',
                    'typography_typography' => 'custom',
                    'typography_font_family' => 'JH Caudemars',
                    'typography_font_size' => [
                        'unit' => 'px',
                        'size' => 64
                    ]
                ]
            ],
            [
                'id' => 'contact-form',
                'elType' => 'widget',
                'widgetType' => 'wp-widget-contact-form-7',
                'settings' => []
            ]
        ],
        'isInner' => false
    ]
];

// Combinar dados existentes com novas seções
$combined_data = array_merge($existing_data, $new_sections);

// Salvar dados atualizados
try {
    update_post_meta($page_id, '_elementor_data', wp_json_encode($combined_data));

    // Regenerar CSS
    if (class_exists('Elementor\Plugin')) {
        Elementor\Plugin::$instance->files_manager->clear_cache();
    }

    echo "✅ Seções adicionais importadas com sucesso!\n";
    echo "📄 Seções adicionadas: " . count($new_sections) . "\n";
    echo "🌐 URL: " . get_permalink($page_id) . "\n";

} catch (Exception $e) {
    echo "❌ Erro ao adicionar seções: " . $e->getMessage() . "\n";
}

echo "🎉 Processo concluído!\n";
?>