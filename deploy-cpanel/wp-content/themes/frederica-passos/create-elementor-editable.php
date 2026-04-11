<?php
/**
 * Script para criar template Elementor completamente editável
 */

require_once('/var/www/html/wp-load.php');

if (!class_exists('Elementor\Plugin')) {
    die("Elementor não está ativo!\n");
}

echo "🎨 CRIANDO TEMPLATE ELEMENTOR TOTALMENTE EDITÁVEL...\n";

$page_id = 11;

// Template Elementor completo e editável
$elementor_data = [
    [
        'id' => 'hero-section',
        'elType' => 'section',
        'settings' => [
            'background_background' => 'classic',
            'background_color' => '#70309e',
            'padding' => [
                'unit' => 'px',
                'top' => '120',
                'right' => '0',
                'bottom' => '120',
                'left' => '0',
                'isLinked' => false
            ],
            'margin' => [
                'unit' => 'px',
                'top' => '0',
                'right' => '0',
                'bottom' => '0',
                'left' => '0',
                'isLinked' => false
            ]
        ],
        'elements' => [
            [
                'id' => 'hero-container',
                'elType' => 'widget',
                'widgetType' => 'inner-section',
                'settings' => [],
                'elements' => [
                    [
                        'id' => 'hero-left',
                        'elType' => 'column',
                        'settings' => [
                            '_column_size' => 50,
                            '_inline_size' => null
                        ],
                        'elements' => [
                            [
                                'id' => 'hero-image-1',
                                'elType' => 'widget',
                                'widgetType' => 'image',
                                'settings' => [
                                    'image' => [
                                        'url' => get_template_directory_uri() . '/images/banner01.jpg',
                                        'id' => '',
                                        'alt' => 'Banner Hero 1'
                                    ],
                                    'image_size' => 'full',
                                    'align' => 'center',
                                    'css_classes' => 'hidden md:block'
                                ]
                            ],
                            [
                                'id' => 'hero-image-1-mobile',
                                'elType' => 'widget',
                                'widgetType' => 'image',
                                'settings' => [
                                    'image' => [
                                        'url' => get_template_directory_uri() . '/images/banner01mob.jpg',
                                        'id' => '',
                                        'alt' => 'Banner Hero 1 Mobile'
                                    ],
                                    'image_size' => 'full',
                                    'align' => 'center',
                                    'css_classes' => 'block md:hidden'
                                ]
                            ]
                        ]
                    ],
                    [
                        'id' => 'hero-right',
                        'elType' => 'column',
                        'settings' => [
                            '_column_size' => 50,
                            '_inline_size' => null
                        ],
                        'elements' => [
                            [
                                'id' => 'hero-image-2',
                                'elType' => 'widget',
                                'widgetType' => 'image',
                                'settings' => [
                                    'image' => [
                                        'url' => get_template_directory_uri() . '/images/banner02.jpg',
                                        'id' => '',
                                        'alt' => 'Banner Hero 2'
                                    ],
                                    'image_size' => 'full',
                                    'align' => 'center',
                                    'css_classes' => 'hidden md:block'
                                ]
                            ],
                            [
                                'id' => 'hero-image-2-mobile',
                                'elType' => 'widget',
                                'widgetType' => 'image',
                                'settings' => [
                                    'image' => [
                                        'url' => get_template_directory_uri() . '/images/banner02mob.jpg',
                                        'id' => '',
                                        'alt' => 'Banner Hero 2 Mobile'
                                    ],
                                    'image_size' => 'full',
                                    'align' => 'center',
                                    'css_classes' => 'block md:hidden'
                                ]
                            ]
                        ]
                    ]
                ]
            ],
            [
                'id' => 'hero-overlay',
                'elType' => 'widget',
                'widgetType' => 'inner-section',
                'settings' => [
                    'css_classes' => 'absolute inset-0 flex items-center justify-center md:justify-end pr-4 md:pr-8 lg:pr-16 xl:pr-24'
                ],
                'elements' => [
                    [
                        'id' => 'hero-content-col',
                        'elType' => 'column',
                        'settings' => [
                            '_column_size' => 50,
                            '_inline_size' => null
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
                                        'size' => 48,
                                        'sizes' => []
                                    ],
                                    'typography_font_size_tablet' => [
                                        'unit' => 'px',
                                        'size' => 64,
                                        'sizes' => []
                                    ],
                                    'typography_font_size_mobile' => [
                                        'unit' => 'px',
                                        'size' => 36,
                                        'sizes' => []
                                    ],
                                    'typography_font_weight' => '500',
                                    'typography_line_height' => [
                                        'unit' => 'em',
                                        'size' => 1.1,
                                        'sizes' => []
                                    ],
                                    'margin' => [
                                        'unit' => 'px',
                                        'top' => '0',
                                        'right' => '0',
                                        'bottom' => '16',
                                        'left' => '0',
                                        'isLinked' => false
                                    ]
                                ]
                            ],
                            [
                                'id' => 'hero-subtitle',
                                'elType' => 'widget',
                                'widgetType' => 'text-editor',
                                'settings' => [
                                    'editor' => 'Psiquiatria Perinatal e Sexualidade Humana.<br />Consultas presenciais e online.',
                                    'align' => 'left',
                                    'text_color' => '#ffffff',
                                    'typography_typography' => 'custom',
                                    'typography_font_family' => 'Neue Montreal',
                                    'typography_font_size' => [
                                        'unit' => 'px',
                                        'size' => 16,
                                        'sizes' => []
                                    ],
                                    'typography_font_size_tablet' => [
                                        'unit' => 'px',
                                        'size' => 18,
                                        'sizes' => []
                                    ],
                                    'typography_font_weight' => '400',
                                    'typography_line_height' => [
                                        'unit' => 'em',
                                        'size' => 1.4,
                                        'sizes' => []
                                    ],
                                    'margin' => [
                                        'unit' => 'px',
                                        'top' => '0',
                                        'right' => '0',
                                        'bottom' => '32',
                                        'left' => '0',
                                        'isLinked' => false
                                    ]
                                ]
                            ],
                            [
                                'id' => 'hero-button',
                                'elType' => 'widget',
                                'widgetType' => 'button',
                                'settings' => [
                                    'text' => 'Contrate',
                                    'align' => 'left',
                                    'size' => 'md',
                                    'background_color' => '#f56428',
                                    'text_color' => '#ffffff',
                                    'button_text_color' => '#ffffff',
                                    'typography_typography' => 'custom',
                                    'typography_font_family' => 'Neue Montreal',
                                    'typography_font_weight' => '500',
                                    'border_radius' => [
                                        'unit' => 'px',
                                        'size' => 8,
                                        'sizes' => []
                                    ],
                                    'padding' => [
                                        'unit' => 'px',
                                        'top' => '16',
                                        'right' => '32',
                                        'bottom' => '16',
                                        'left' => '32',
                                        'isLinked' => false
                                    ],
                                    'margin' => [
                                        'unit' => 'px',
                                        'top' => '0',
                                        'right' => '0',
                                        'bottom' => '0',
                                        'left' => '0',
                                        'isLinked' => false
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ],
        'isInner' => false
    ],

    // Scrolling Text Section
    [
        'id' => 'scrolling-text-section',
        'elType' => 'section',
        'settings' => [
            'background_background' => 'classic',
            'background_color' => '#161616',
            'padding' => [
                'unit' => 'px',
                'top' => '16',
                'right' => '0',
                'bottom' => '16',
                'left' => '0',
                'isLinked' => false
            ]
        ],
        'elements' => [
            [
                'id' => 'scrolling-text',
                'elType' => 'widget',
                'widgetType' => 'text-editor',
                'settings' => [
                    'editor' => '<div style="overflow: hidden; white-space: nowrap;"><div style="display: inline-block; animation: scroll 120s linear infinite; font-family: JH Caudemars; font-size: 24px; color: white; font-weight: 500;">' . str_repeat('Psiquiatria Contemporânea para Mentes que não cabem em Rótulos. ', 20) . '</div></div>',
                    'align' => 'center'
                ]
            ]
        ],
        'isInner' => false
    ],

    // About Section
    [
        'id' => 'about-section',
        'elType' => 'section',
        'settings' => [
            'background_background' => 'classic',
            'background_color' => '#f2ede7',
            'padding' => [
                'unit' => 'px',
                'top' => '96',
                'right' => '0',
                'bottom' => '96',
                'left' => '0',
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
                            '_column_size' => 50,
                            '_inline_size' => null
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
                                        'size' => 48,
                                        'sizes' => []
                                    ],
                                    'typography_font_size_tablet' => [
                                        'unit' => 'px',
                                        'size' => 56,
                                        'sizes' => []
                                    ],
                                    'typography_font_size_mobile' => [
                                        'unit' => 'px',
                                        'size' => 36,
                                        'sizes' => []
                                    ],
                                    'typography_font_weight' => '500',
                                    'margin' => [
                                        'unit' => 'px',
                                        'top' => '0',
                                        'right' => '0',
                                        'bottom' => '32',
                                        'left' => '0',
                                        'isLinked' => false
                                    ]
                                ]
                            ],
                            [
                                'id' => 'about-text',
                                'elType' => 'widget',
                                'widgetType' => 'text-editor',
                                'settings' => [
                                    'editor' => '<p style="font-family: Neue Montreal; font-size: 18px; line-height: 1.6; color: #6b7280; margin-bottom: 24px;"><strong>Dra Frederica Passos Barbizani</strong> é psiquiatra especializada em Saúde Mental da Mulher. Com foco no universo feminino, acredita que toda mulher merece cuidados de saúde mental que respeitem suas particularidades biológicas, psicológicas e sociais.</p><p style="font-family: Neue Montreal; font-size: 18px; line-height: 1.6; color: #6b7280;">Especializou-se em Psiquiatria no Hospital Beatriz Ângelo, com foco em Psiquiatria da Mulher e Psiquiatria Perinatal. Sua prática clínica baseia-se em pilares fundamentais: cuidado humanizado, evidência científica, abordagem integral e empoderamento da paciente. Dedica-se também à investigação científica, com interesse particular em perturbações do humor no período perinatal, impacto hormonal na saúde mental, sexualidade, identidade de género, competências parentais e dinâmicas familiares.</p>',
                                    'align' => 'left'
                                ]
                            ]
                        ]
                    ],
                    [
                        'id' => 'about-right',
                        'elType' => 'column',
                        'settings' => [
                            '_column_size' => 50,
                            '_inline_size' => null
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
                                        'alt' => 'Dra Frederica Passos Barbizani'
                                    ],
                                    'image_size' => 'full',
                                    'align' => 'center',
                                    'image_border_radius' => [
                                        'unit' => 'px',
                                        'size' => 8,
                                        'sizes' => []
                                    ],
                                    'css_classes' => 'w-full max-w-md mx-auto'
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ],
        'isInner' => false
    ],

    // Orange Strip
    [
        'id' => 'orange-strip',
        'elType' => 'section',
        'settings' => [
            'background_background' => 'classic',
            'background_color' => '#f56428',
            'padding' => [
                'unit' => 'px',
                'top' => '32',
                'right' => '0',
                'bottom' => '32',
                'left' => '0',
                'isLinked' => false
            ],
            'background_image' => [
                'url' => get_template_directory_uri() . '/images/patternroxo.svg',
                'id' => '',
                'size' => 'custom'
            ],
            'background_position' => 'center center',
            'background_repeat' => 'repeat',
            'background_size' => '3000px 3000px'
        ],
        'elements' => [],
        'isInner' => false
    ],

    // Areas Section
    [
        'id' => 'areas-section',
        'elType' => 'section',
        'settings' => [
            'background_background' => 'classic',
            'background_color' => '#fce7f3',
            'padding' => [
                'unit' => 'px',
                'top' => '96',
                'right' => '0',
                'bottom' => '96',
                'left' => '0',
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
                        'size' => 48,
                        'sizes' => []
                    ],
                    'typography_font_size_tablet' => [
                        'unit' => 'px',
                        'size' => 56,
                        'sizes' => []
                    ],
                    'typography_font_size_mobile' => [
                        'unit' => 'px',
                        'size' => 36,
                        'sizes' => []
                    ],
                    'typography_font_weight' => '500',
                    'margin' => [
                        'unit' => 'px',
                        'top' => '0',
                        'right' => '0',
                        'bottom' => '64',
                        'left' => '0',
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
                            '_column_size' => 25,
                            '_inline_size' => null
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
                                    'image_size' => 'full',
                                    'image_border_radius' => [
                                        'unit' => 'px',
                                        'size' => 8,
                                        'sizes' => []
                                    ],
                                    'background_background' => 'classic',
                                    'background_color' => 'rgba(0,0,0,0.8)',
                                    'padding' => [
                                        'unit' => 'px',
                                        'top' => '24',
                                        'right' => '24',
                                        'bottom' => '24',
                                        'left' => '24',
                                        'isLinked' => true
                                    ],
                                    'hover_animation' => 'grow',
                                    'title_typography_typography' => 'custom',
                                    'title_typography_font_family' => 'JH Caudemars',
                                    'title_typography_font_size' => [
                                        'unit' => 'px',
                                        'size' => 24,
                                        'sizes' => []
                                    ],
                                    'description_typography_typography' => 'custom',
                                    'description_typography_font_family' => 'Neue Montreal',
                                    'description_typography_font_size' => [
                                        'unit' => 'px',
                                        'size' => 14,
                                        'sizes' => []
                                    ]
                                ]
                            ]
                        ]
                    ],
                    [
                        'id' => 'area-2-col',
                        'elType' => 'column',
                        'settings' => [
                            '_column_size' => 25,
                            '_inline_size' => null
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
                                    'image_size' => 'full',
                                    'image_border_radius' => [
                                        'unit' => 'px',
                                        'size' => 8,
                                        'sizes' => []
                                    ],
                                    'background_background' => 'classic',
                                    'background_color' => 'rgba(0,0,0,0.8)',
                                    'padding' => [
                                        'unit' => 'px',
                                        'top' => '24',
                                        'right' => '24',
                                        'bottom' => '24',
                                        'left' => '24',
                                        'isLinked' => true
                                    ],
                                    'hover_animation' => 'grow',
                                    'title_typography_typography' => 'custom',
                                    'title_typography_font_family' => 'JH Caudemars',
                                    'title_typography_font_size' => [
                                        'unit' => 'px',
                                        'size' => 24,
                                        'sizes' => []
                                    ],
                                    'description_typography_typography' => 'custom',
                                    'description_typography_font_family' => 'Neue Montreal',
                                    'description_typography_font_size' => [
                                        'unit' => 'px',
                                        'size' => 14,
                                        'sizes' => []
                                    ]
                                ]
                            ]
                        ]
                    ],
                    [
                        'id' => 'area-3-col',
                        'elType' => 'column',
                        'settings' => [
                            '_column_size' => 25,
                            '_inline_size' => null
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
                                    'image_size' => 'full',
                                    'image_border_radius' => [
                                        'unit' => 'px',
                                        'size' => 8,
                                        'sizes' => []
                                    ],
                                    'background_background' => 'classic',
                                    'background_color' => 'rgba(0,0,0,0.8)',
                                    'padding' => [
                                        'unit' => 'px',
                                        'top' => '24',
                                        'right' => '24',
                                        'bottom' => '24',
                                        'left' => '24',
                                        'isLinked' => true
                                    ],
                                    'hover_animation' => 'grow',
                                    'title_typography_typography' => 'custom',
                                    'title_typography_font_family' => 'JH Caudemars',
                                    'title_typography_font_size' => [
                                        'unit' => 'px',
                                        'size' => 24,
                                        'sizes' => []
                                    ],
                                    'description_typography_typography' => 'custom',
                                    'description_typography_font_family' => 'Neue Montreal',
                                    'description_typography_font_size' => [
                                        'unit' => 'px',
                                        'size' => 14,
                                        'sizes' => []
                                    ]
                                ]
                            ]
                        ]
                    ],
                    [
                        'id' => 'area-4-col',
                        'elType' => 'column',
                        'settings' => [
                            '_column_size' => 25,
                            '_inline_size' => null
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
                                    'image_size' => 'full',
                                    'image_border_radius' => [
                                        'unit' => 'px',
                                        'size' => 8,
                                        'sizes' => []
                                    ],
                                    'background_background' => 'classic',
                                    'background_color' => 'rgba(0,0,0,0.8)',
                                    'padding' => [
                                        'unit' => 'px',
                                        'top' => '24',
                                        'right' => '24',
                                        'bottom' => '24',
                                        'left' => '24',
                                        'isLinked' => true
                                    ],
                                    'hover_animation' => 'grow',
                                    'title_typography_typography' => 'custom',
                                    'title_typography_font_family' => 'JH Caudemars',
                                    'title_typography_font_size' => [
                                        'unit' => 'px',
                                        'size' => 24,
                                        'sizes' => []
                                    ],
                                    'description_typography_typography' => 'custom',
                                    'description_typography_font_family' => 'Neue Montreal',
                                    'description_typography_font_size' => [
                                        'unit' => 'px',
                                        'size' => 14,
                                        'sizes' => []
                                    ]
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

    // Limpar conteúdo da página para usar apenas Elementor
    wp_update_post([
        'ID' => $page_id,
        'post_content' => ''
    ]);

    // Regenerar CSS
    if (class_exists('Elementor\Plugin')) {
        Elementor\Plugin::$instance->files_manager->clear_cache();
    }

    echo "✅ TEMPLATE ELEMENTOR CRIADO COM SUCESSO!\n";
    echo "📄 Página ID: $page_id\n";
    echo "🎨 TOTALMENTE EDITÁVEL NO ELEMENTOR\n";
    echo "📊 Seções criadas: " . count($elementor_data) . "\n";
    echo "🖼️ Banners Hero: INCLUÍDOS\n";
    echo "🔤 Fontes: JH CAUDEMARS + NEUE MONTREAL\n";
    echo "🎨 Cores: #70309e (roxo), #f56428 (laranja), #6b7280 (cinza)\n";
    echo "\n🌐 URL: " . get_permalink($page_id) . "\n";
    echo "\n📝 PARA EDITAR:\n";
    echo "1. Acesse http://localhost:8000/wp-admin\n";
    echo "2. Vá para Páginas → Todas as Páginas\n";
    echo "3. Clique em 'Home'\n";
    echo "4. Clique em 'Editar com Elementor'\n";
    echo "5. Agora tudo é 100% editável!\n";

} catch (Exception $e) {
    echo "❌ Erro: " . $e->getMessage() . "\n";
}

echo "🎉 TEMPLATE PRONTO PARA EDIÇÃO NO ELEMENTOR!\n";
?>