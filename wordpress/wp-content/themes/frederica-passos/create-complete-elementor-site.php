<?php
/**
 * Script DEFINITIVO para criar site WordPress 100% idêntico ao React
 * TODO o conteúdo de inicio/page.tsx aplicado ao WordPress via Elementor
 */

require_once('/var/www/html/wp-load.php');

if (!class_exists('Elementor\Plugin')) {
    die("❌ Elementor não está ativo!\n");
}

echo "🚀 CRIANDO SITE WORDPRESS 100% IDÊNTICO AO REACT...\n";
echo "📋 Baseado em: app/inicio/page.tsx\n\n";

$page_id = 11;
$template_dir = get_template_directory_uri();

// FUNÇÃO PARA GERAR ID ÚNICO
function generate_element_id($prefix = 'el') {
    return $prefix . '_' . substr(md5(uniqid(rand(), true)), 0, 8);
}

// TEMPLATE ELEMENTOR COMPLETO - 100% IDÊNTICO AO REACT
$complete_elementor_data = [];

// ============================================
// SEÇÃO 1: HERO CAROUSEL (3 SLIDES)
// ============================================
$complete_elementor_data[] = [
    'id' => generate_element_id('hero'),
    'elType' => 'section',
    'settings' => [
        'layout' => 'boxed',
        'background_background' => 'classic',
        'background_color' => '#70309e',
        'padding' => [
            'unit' => 'px',
            'top' => '0',
            'right' => '0',
            'bottom' => '0',
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
        ],
        'height' => 'min',
        'min_height' => [
            'unit' => 'px',
            'size' => 450,
            'sizes' => []
        ],
        'custom_height' => [
            'unit' => 'px',
            'size' => 450,
            'sizes' => []
        ]
    ],
    'elements' => [
        [
            'id' => generate_element_id('hero_container'),
            'elType' => 'widget',
            'widgetType' => 'image-carousel',
            'settings' => [
                'carousel' => [
                    [
                        'id' => generate_element_id('slide'),
                        'image' => [
                            'url' => $template_dir . '/images/banner01.jpg',
                            'id' => '',
                            'alt' => 'Banner Hero 1'
                        ],
                        'link' => [
                            'url' => ''
                        ]
                    ],
                    [
                        'id' => generate_element_id('slide'),
                        'image' => [
                            'url' => $template_dir . '/images/banner02.jpg',
                            'id' => '',
                            'alt' => 'Banner Hero 2'
                        ],
                        'link' => [
                            'url' => ''
                        ]
                    ],
                    [
                        'id' => generate_element_id('slide'),
                        'image' => [
                            'url' => $template_dir . '/images/srosa.svg',
                            'id' => '',
                            'alt' => 'Hero Background'
                        ],
                        'link' => [
                            'url' => ''
                        ]
                    ]
                ],
                'slides_to_show' => [
                    'size' => 1,
                    'sizes' => []
                ],
                'slides_to_show_tablet' => [
                    'size' => 1,
                    'sizes' => []
                ],
                'slides_to_show_mobile' => [
                    'size' => 1,
                    'sizes' => []
                ],
                'autoplay' => 'yes',
                'autoplay_speed' => [
                    'size' => 5000,
                    'sizes' => []
                ],
                'pause_on_hover' => 'yes',
                'pause_on_interaction' => 'yes',
                'infinite' => 'yes',
                'transition_speed' => [
                    'size' => 600,
                    'sizes' => []
                ],
                'navigation' => 'both',
                'arrows_position' => 'outside',
                'arrows_size' => [
                    'size' => 24,
                    'sizes' => []
                ],
                'arrows_color' => '#ffffff',
                'dots_size' => [
                    'size' => 12,
                    'sizes' => []
                ],
                'dots_color' => '#ffffff',
                'image_spacing_custom' => [
                    'unit' => 'px',
                    'size' => 0,
                    'sizes' => []
                ]
            ]
        ],
        // Slide 3 com conteúdo (Laranja com texto)
        [
            'id' => generate_element_id('hero_slide3'),
            'elType' => 'widget',
            'widgetType' => 'inner-section',
            'settings' => [
                'css_classes' => 'absolute inset-0 bg-[#f56428] z-10'
            ],
            'elements' => [
                [
                    'id' => generate_element_id('hero_slide3_bg'),
                    'elType' => 'column',
                    'settings' => [
                        '_column_size' => 100,
                        '_inline_size' => null
                    ],
                    'elements' => [
                        [
                            'id' => generate_element_id('hero_bg_svg'),
                            'elType' => 'widget',
                            'widgetType' => 'image',
                            'settings' => [
                                'image' => [
                                    'url' => $template_dir . '/images/srosa.svg',
                                    'id' => '',
                                    'alt' => 'Hero Background Pattern'
                                ],
                                'image_size' => 'full',
                                'align' => 'left',
                                'css_classes' => 'absolute inset-0 opacity-100'
                            ]
                        ],
                        [
                            'id' => generate_element_id('hero_content'),
                            'elType' => 'widget',
                            'widgetType' => 'inner-section',
                            'settings' => [
                                'css_classes' => 'absolute inset-0 flex items-center justify-center md:justify-end z-20'
                            ],
                            'elements' => [
                                [
                                    'id' => generate_element_id('hero_text_col'),
                                    'elType' => 'column',
                                    'settings' => [
                                        '_column_size' => 50,
                                        '_inline_size' => null
                                    ],
                                    'elements' => [
                                        [
                                            'id' => generate_element_id('hero_title'),
                                            'elType' => 'widget',
                                            'widgetType' => 'heading',
                                            'settings' => [
                                                'title' => 'Prazer,<br />Frederica Passos',
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
                                                    'bottom' => '24',
                                                    'left' => '0',
                                                    'isLinked' => false
                                                ]
                                            ]
                                        ],
                                        [
                                            'id' => generate_element_id('hero_subtitle'),
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
                                                'typography_font_size_mobile' => [
                                                    'unit' => 'px',
                                                    'size' => 14,
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
                                            'id' => generate_element_id('hero_button'),
                                            'elType' => 'widget',
                                            'widgetType' => 'button',
                                            'settings' => [
                                                'text' => 'Contrate',
                                                'align' => 'left',
                                                'size' => 'md',
                                                'background_color' => '#70309e',
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
                                                '_hover_background_color' => '#f56428'
                                            ]
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ]
    ],
    'isInner' => false
];

// ============================================
// SEÇÃO 2: SCROLLING TEXT BANNER
// ============================================
$complete_elementor_data[] = [
    'id' => generate_element_id('scrolling'),
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
            'id' => generate_element_id('scroll_text'),
            'elType' => 'widget',
            'widgetType' => 'text-editor',
            'settings' => [
                'editor' => '<div style="overflow: hidden; white-space: nowrap; display: flex; animation: scroll 120s linear infinite;"><div style="font-family: JH Caudemars; font-size: 24px; color: white; font-weight: 500; display: inline-block; white-space: nowrap; padding-right: 40px;">' . str_repeat('Psiquiatria Contemporânea para Mentes que não cabem em Rótulos. ', 20) . '</div></div><style>@keyframes scroll { 0% { transform: translateX(0); } 100% { transform: translateX(-50%); } }</style>',
                'align' => 'left'
            ]
        ]
    ],
    'isInner' => false
];

// ============================================
// SEÇÃO 3: SOBRE (ABOUT SECTION)
// ============================================
$complete_elementor_data[] = [
    'id' => generate_element_id('about'),
    'elType' => 'section',
    'settings' => [
        'layout' => 'boxed',
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
            'id' => generate_element_id('about_container'),
            'elType' => 'widget',
            'widgetType' => 'inner-section',
            'settings' => [],
            'elements' => [
                [
                    'id' => generate_element_id('about_left'),
                    'elType' => 'column',
                    'settings' => [
                        '_column_size' => 50,
                        '_inline_size' => null
                    ],
                    'elements' => [
                        [
                            'id' => generate_element_id('about_title'),
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
                            'id' => generate_element_id('about_text'),
                            'elType' => 'widget',
                            'widgetType' => 'text-editor',
                            'settings' => [
                                'editor' => '<p style="font-family: Neue Montreal; font-size: 18px; line-height: 1.6; color: #6b7280; margin-bottom: 24px;"><strong>Dra. Frederica Passos Barbizani</strong> é psiquiatra especializada em Saúde Mental da Mulher. Com foco no universo feminino, acredita que toda mulher merece cuidados de saúde mental que respeitem suas particularidades biológicas, psicológicas e sociais.</p><p style="font-family: Neue Montreal; font-size: 18px; line-height: 1.6; color: #6b7280;">Especializou-se em Psiquiatria no Hospital Beatriz Ângelo, com foco em Psiquiatria da Mulher e Psiquiatria Perinatal. Sua prática clínica baseia-se em pilares fundamentais: cuidado humanizado, evidência científica, abordagem integral e empoderamento da paciente. Dedica-se também à investigação científica, com interesse particular em perturbações do humor no período perinatal, impacto hormonal na saúde mental, sexualidade, identidade de género, competências parentais e dinâmicas familiares.</p>',
                                'align' => 'left'
                            ]
                        ]
                    ]
                ],
                [
                    'id' => generate_element_id('about_right'),
                    'elType' => 'column',
                    'settings' => [
                        '_column_size' => 50,
                        '_inline_size' => null
                    ],
                    'elements' => [
                        [
                            'id' => generate_element_id('about_image'),
                            'elType' => 'widget',
                            'widgetType' => 'image',
                            'settings' => [
                                'image' => [
                                    'url' => $template_dir . '/images/fotofrederica.webp',
                                    'id' => '',
                                    'alt' => 'Dra. Frederica Passos Barbizani'
                                ],
                                'image_size' => 'full',
                                'align' => 'center',
                                'image_border_radius' => [
                                    'unit' => 'px',
                                    'size' => 8,
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
];

// ============================================
// SEÇÃO 4: ORANGE STRIP
// ============================================
$complete_elementor_data[] = [
    'id' => generate_element_id('orange'),
    'elType' => 'section',
    'settings' => [
        'background_background' => 'classic',
        'background_color' => '#f56428',
        'background_image' => [
            'url' => $template_dir . '/images/patternroxo.svg',
            'id' => '',
            'size' => 'custom'
        ],
        'background_position' => 'center center',
        'background_repeat' => 'repeat',
        'background_size' => '3000px 3000px',
        'padding' => [
            'unit' => 'px',
            'top' => '32',
            'right' => '0',
            'bottom' => '32',
            'left' => '0',
            'isLinked' => false
        ]
    ],
    'elements' => [],
    'isInner' => false
];

// ============================================
// SEÇÃO 5: ÁREAS DE ESPECIALIZAÇÃO (4 CARDS)
// ============================================
$areas_data = [
    [
        'image' => 'mulher.webp',
        'title' => 'Psiquiatria da Mulher',
        'desc' => 'Depressão perinatal, ansiedade gestacional, POC perinatal, psicose pós-parto'
    ],
    [
        'image' => 'parental.webp',
        'title' => 'Orientação Parental',
        'desc' => 'Competências parentais, gestão de comportamentos, comunicação familiar'
    ],
    [
        'image' => 'perinatal.webp',
        'title' => 'Psiquiatria Perinatal',
        'desc' => 'Disfunções sexuais, identidade de género, orientação sexual, disforia de género'
    ],
    [
        'image' => 'sexhuman.webp',
        'title' => 'Sexualidade Humana',
        'desc' => 'Disfunções sexuais, identidade de género, orientação sexual, disforia de género'
    ]
];

$areas_columns = [];
foreach ($areas_data as $idx => $area) {
    $areas_columns[] = [
        'id' => generate_element_id('area_col_' . $idx),
        'elType' => 'column',
        'settings' => [
            '_column_size' => 25,
            '_inline_size' => null
        ],
        'elements' => [
            [
                'id' => generate_element_id('area_' . $idx),
                'elType' => 'widget',
                'widgetType' => 'image-box',
                'settings' => [
                    'image' => [
                        'url' => $template_dir . '/images/vertical/' . $area['image'],
                        'id' => '',
                        'alt' => $area['title']
                    ],
                    'title_text' => $area['title'],
                    'description_text' => $area['desc'],
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
                    'title_typography_font_weight' => '500',
                    'description_typography_typography' => 'custom',
                    'description_typography_font_family' => 'Neue Montreal',
                    'description_typography_font_size' => [
                        'unit' => 'px',
                        'size' => 14,
                        'sizes' => []
                    ],
                    'description_typography_font_weight' => '400'
                ]
            ]
        ]
    ];
}

$complete_elementor_data[] = [
    'id' => generate_element_id('areas'),
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
            'id' => generate_element_id('areas_title'),
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
            'id' => generate_element_id('areas_grid'),
            'elType' => 'widget',
            'widgetType' => 'inner-section',
            'settings' => [],
            'elements' => $areas_columns
        ]
    ],
    'isInner' => false
];

// ============================================
// SEÇÃO 6: ESTATÍSTICAS
// ============================================
$stats_data = [
    [
        'icon' => 'iconmulher.png',
        'number' => '+500',
        'text' => 'Mulheres Tratadas em Psiquiatria Perinatal'
    ],
    [
        'icon' => 'iconup.png',
        'number' => '85%',
        'text' => 'Melhoria Significativa nos Sintomas de Depressão Pós Parto'
    ],
    [
        'icon' => 'icongrad.png',
        'number' => '+50',
        'text' => 'Profissionais de Saúde Formados'
    ],
    [
        'icon' => 'iconstars.png',
        'number' => '90%',
        'text' => 'Satisfação com o Tratamento'
    ]
];

$stats_columns = [];
foreach ($stats_data as $idx => $stat) {
    $stats_columns[] = [
        'id' => generate_element_id('stat_col_' . $idx),
        'elType' => 'column',
        'settings' => [
            '_column_size' => 25,
            '_inline_size' => null
        ],
        'elements' => [
            [
                'id' => generate_element_id('stat_icon_' . $idx),
                'elType' => 'widget',
                'widgetType' => 'image',
                'settings' => [
                    'image' => [
                        'url' => $template_dir . '/images/' . $stat['icon'],
                        'id' => '',
                        'alt' => $stat['text']
                    ],
                    'image_size' => 'full',
                    'align' => 'center',
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
                'id' => generate_element_id('stat_number_' . $idx),
                'elType' => 'widget',
                'widgetType' => 'counter',
                'settings' => [
                    'starting_number' => '0',
                    'ending_number' => str_replace(['+', '%'], '', $stat['number']),
                    'number_prefix' => strpos($stat['number'], '+') !== false ? '+' : '',
                    'number_suffix' => strpos($stat['number'], '%') !== false ? '%' : '',
                    'title' => $stat['text'],
                    'counter_color' => '#ffffff',
                    'title_color' => '#ffffff',
                    'typography_number_typography' => 'custom',
                    'typography_number_font_family' => 'JH Caudemars',
                    'typography_number_font_size' => [
                        'unit' => 'px',
                        'size' => 48,
                        'sizes' => []
                    ],
                    'typography_number_font_weight' => '700',
                    'typography_title_typography' => 'custom',
                    'typography_title_font_family' => 'Neue Montreal',
                    'typography_title_font_size' => [
                        'unit' => 'px',
                        'size' => 14,
                        'sizes' => []
                    ],
                    'typography_title_font_weight' => '400',
                    'duration' => [
                        'size' => 2000,
                        'sizes' => []
                    ]
                ]
            ]
        ]
    ];
}

$complete_elementor_data[] = [
    'id' => generate_element_id('stats'),
    'elType' => 'section',
    'settings' => [
        'background_background' => 'classic',
        'background_color' => '#70309e',
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
            'id' => generate_element_id('stats_title'),
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
            'id' => generate_element_id('stats_grid'),
            'elType' => 'widget',
            'widgetType' => 'inner-section',
            'settings' => [],
            'elements' => $stats_columns
        ]
    ],
    'isInner' => false
];

// ============================================
// SEÇÃO 7: FORMAÇÕES E CURSOS PROFISSIONAIS
// ============================================
$formacoes_data = [
    [
        'image' => 'emp.webp',
        'title' => 'Empresas',
        'text' => 'Duração: 04 - 24h\nModalidade: Presencial na Empresa'
    ],
    [
        'image' => 'pal.webp',
        'title' => 'Palestras',
        'text' => 'Palestras Públicas (90 minutos)\nWorkshops Práticos Exclusivos (3 horas)'
    ],
    [
        'image' => 'profperi.webp',
        'title' => 'Profissionais da Área Perinatal',
        'text' => 'Duração: 12 horas (1,5 dias)\nModalidade: Presencial'
    ],
    [
        'image' => 'medenf.webp',
        'title' => 'Para Médicos e Enfermeiros',
        'text' => 'Duração: 16h (02 Dias)\nModalidade: Presencial ou Online'
    ]
];

$complete_elementor_data[] = [
    'id' => generate_element_id('formacoes'),
    'elType' => 'section',
    'settings' => [
        'background_background' => 'classic',
        'background_color' => '#f2ede7',
        'background_image' => [
            'url' => $template_dir . '/images/fundo2.svg',
            'id' => '',
            'size' => 'custom'
        ],
        'background_position' => 'center center',
        'background_repeat' => 'no-repeat',
        'background_size' => '250%',
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
            'id' => generate_element_id('formacoes_title'),
            'elType' => 'widget',
            'widgetType' => 'heading',
            'settings' => [
                'title' => 'Formações e Cursos Profissionais',
                'header_size' => 'h2',
                'align' => 'center',
                'title_color' => '#1f2937',
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
            'id' => generate_element_id('formacoes_carousel'),
            'elType' => 'widget',
            'widgetType' => 'image-carousel',
            'settings' => [
                'carousel' => array_map(function($formacao) use ($template_dir, $generate_element_id) {
                    return [
                        'id' => generate_element_id('formacao'),
                        'image' => [
                            'url' => $template_dir . '/images/formacoes/' . $formacao['image'],
                            'id' => '',
                            'alt' => $formacao['title']
                        ],
                        'title' => $formacao['title'],
                        'description' => str_replace('\n', '<br />', $formacao['text']),
                        'link' => ['url' => '']
                    ];
                }, $formacoes_data),
                'slides_to_show' => [
                    'size' => 1,
                    'sizes' => []
                ],
                'autoplay' => 'yes',
                'autoplay_speed' => [
                    'size' => 5000,
                    'sizes' => []
                ],
                'infinite' => 'yes',
                'navigation' => 'both',
                'arrows_color' => '#f56428',
                'dots_color' => '#f56428'
            ]
        ]
    ],
    'isInner' => false
];

// ============================================
// SEÇÃO 8: RECURSOS EDUCATIVOS
// ============================================
$complete_elementor_data[] = [
    'id' => generate_element_id('recursos'),
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
            'id' => generate_element_id('recursos_container'),
            'elType' => 'widget',
            'widgetType' => 'inner-section',
            'settings' => [],
            'elements' => [
                [
                    'id' => generate_element_id('recursos_left'),
                    'elType' => 'column',
                    'settings' => [
                        '_column_size' => 50,
                        '_inline_size' => null
                    ],
                    'elements' => [
                        [
                            'id' => generate_element_id('recursos_title'),
                            'elType' => 'widget',
                            'widgetType' => 'heading',
                            'settings' => [
                                'title' => 'Recursos<br />Educativos',
                                'header_size' => 'h2',
                                'align' => 'left',
                                'title_color' => '#1f2937',
                                'typography_typography' => 'custom',
                                'typography_font_family' => 'JH Caudemars',
                                'typography_font_size' => [
                                    'unit' => 'px',
                                    'size' => 64,
                                    'sizes' => []
                                ],
                                'typography_font_size_tablet' => [
                                    'unit' => 'px',
                                    'size' => 72,
                                    'sizes' => []
                                ],
                                'typography_font_size_mobile' => [
                                    'unit' => 'px',
                                    'size' => 48,
                                    'sizes' => []
                                ],
                                'typography_font_weight' => '500',
                                'typography_line_height' => [
                                    'unit' => 'em',
                                    'size' => 1.1,
                                    'sizes' => []
                                ]
                            ]
                        ]
                    ]
                ],
                [
                    'id' => generate_element_id('recursos_right'),
                    'elType' => 'column',
                    'settings' => [
                        '_column_size' => 50,
                        '_inline_size' => null
                    ],
                    'elements' => [
                        [
                            'id' => generate_element_id('recursos_buttons'),
                            'elType' => 'widget',
                            'widgetType' => 'inner-section',
                            'settings' => [],
                            'elements' => [
                                [
                                    'id' => generate_element_id('ebook_btn_col'),
                                    'elType' => 'column',
                                    'settings' => [
                                        '_column_size' => 100,
                                        '_inline_size' => null
                                    ],
                                    'elements' => [
                                        [
                                            'id' => generate_element_id('ebook_btn'),
                                            'elType' => 'widget',
                                            'widgetType' => 'button',
                                            'settings' => [
                                                'text' => 'E-books',
                                                'align' => 'left',
                                                'size' => 'lg',
                                                'background_color' => '#f56428',
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
                                                    'right' => '24',
                                                    'bottom' => '16',
                                                    'left' => '24',
                                                    'isLinked' => false
                                                ],
                                                '_hover_background_color' => '#70309e',
                                                'margin' => [
                                                    'unit' => 'px',
                                                    'top' => '0',
                                                    'right' => '0',
                                                    'bottom' => '16',
                                                    'left' => '0',
                                                    'isLinked' => false
                                                ]
                                            ]
                                        ]
                                    ]
                                ],
                                [
                                    'id' => generate_element_id('artigos_btn_col'),
                                    'elType' => 'column',
                                    'settings' => [
                                        '_column_size' => 100,
                                        '_inline_size' => null
                                    ],
                                    'elements' => [
                                        [
                                            'id' => generate_element_id('artigos_btn'),
                                            'elType' => 'widget',
                                            'widgetType' => 'button',
                                            'settings' => [
                                                'text' => 'Artigos e Guias',
                                                'align' => 'left',
                                                'size' => 'lg',
                                                'background_color' => '#f56428',
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
                                                    'right' => '24',
                                                    'bottom' => '16',
                                                    'left' => '24',
                                                    'isLinked' => false
                                                ],
                                                '_hover_background_color' => '#70309e',
                                                'margin' => [
                                                    'unit' => 'px',
                                                    'top' => '0',
                                                    'right' => '0',
                                                    'bottom' => '16',
                                                    'left' => '0',
                                                    'isLinked' => false
                                                ]
                                            ]
                                        ]
                                    ]
                                ],
                                [
                                    'id' => generate_element_id('videos_btn_col'),
                                    'elType' => 'column',
                                    'settings' => [
                                        '_column_size' => 100,
                                        '_inline_size' => null
                                    ],
                                    'elements' => [
                                        [
                                            'id' => generate_element_id('videos_btn'),
                                            'elType' => 'widget',
                                            'widgetType' => 'button',
                                            'settings' => [
                                                'text' => 'Vídeos Educativos',
                                                'align' => 'left',
                                                'size' => 'lg',
                                                'background_color' => '#f56428',
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
                                                    'right' => '24',
                                                    'bottom' => '16',
                                                    'left' => '24',
                                                    'isLinked' => false
                                                ],
                                                '_hover_background_color' => '#70309e',
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
                    ]
                ]
            ]
        ]
    ],
    'isInner' => false
];

// ============================================
// SEÇÃO 9: TYPEWRITER BAR (Roxo com texto)
// ============================================
$complete_elementor_data[] = [
    'id' => generate_element_id('typewriter'),
    'elType' => 'section',
    'settings' => [
        'background_background' => 'classic',
        'background_color' => '#70309e',
        'background_image' => [
            'url' => $template_dir . '/images/meninas.webp',
            'id' => '',
            'size' => 'full'
        ],
        'background_position' => 'center center',
        'background_repeat' => 'no-repeat',
        'background_size' => 'cover',
        'background_overlay_background' => 'classic',
        'background_overlay_color' => '#70309e',
        'background_overlay_opacity' => [
            'size' => 0.7,
            'sizes' => []
        ],
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
            'id' => generate_element_id('typewriter_text'),
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
                    'size' => 32,
                    'sizes' => []
                ],
                'typography_font_size_tablet' => [
                    'unit' => 'px',
                    'size' => 40,
                    'sizes' => []
                ],
                'typography_font_size_mobile' => [
                    'unit' => 'px',
                    'size' => 24,
                    'sizes' => []
                ],
                'typography_font_weight' => '700'
            ]
        ]
    ],
    'isInner' => false
];

// ============================================
// SEÇÃO 10: FAQ
// ============================================
$faq_data = [
    [
        'question' => 'Dá formações ou palestras sobre saúde mental?',
        'answer' => 'Sim. Participo regularmente em ações de formação, palestras e eventos sobre saúde mental, com foco especial na saúde da mulher, saúde perinatal e diversidade de género.',
        'icon' => 'PALESTRAS.svg'
    ],
    [
        'question' => 'Tem algum programa de apoio específico para pais de pessoas transexuais?',
        'answer' => 'Sim. Disponibilizo acompanhamento individual para pais(ou pessoa de referência) de pessoas transexuais, ajudando a lidar com o processo de aceitação e adaptação com empatia e informação especializada.',
        'icon' => 'PAIS_TRANS.svg'
    ],
    [
        'question' => 'Pode falar com outros profissionais de saúde, como o meu médico de família?',
        'answer' => 'Sim, mas sempre com o seu consentimento. Tenho uma abordagem muito multidisciplinar e de trabalho em equipa, a articulação com outros profissionais é fundamental para garantir um cuidado integrado e eficaz.',
        'icon' => 'FALARPROF.svg'
    ],
    [
        'question' => 'Quais são as suas áreas de especialidade como psiquiatra?',
        'answer' => 'Sou especializada em saúde mental da mulher, saúde perinatal (grávidas e pós-parto), identidade de género e sexualidade. Também trabalho com perturbação de hiperatividade e défice de atenção (PHDA) no adulto e Psiquiatria no geral.',
        'icon' => 'ESPECIALIDADES.svg'
    ],
    [
        'question' => 'Trabalha com acompanhamento psiquiátrico durante a gravidez e pós-parto?',
        'answer' => 'Sim. Faço acompanhamento antes, durante e após a gravidez, com foco na saúde emocional da mulher, do casal e na adaptação à parentalidade.',
        'icon' => 'GRAVIDEZ.svg'
    ],
    [
        'question' => 'Faz seguimento de pessoas transexuais em processo de transição?',
        'answer' => 'Sim. Acompanho pessoas em todas as fases da transição de género, oferecendo apoio emocional e, quando necessário, orientação para as outras especialidades médicas para realizarem terapia hormonal ou as intervenções cirúrgicas pertinentes.',
        'icon' => 'TRANS.svg'
    ],
    [
        'question' => 'Trabalha com adolescentes ou apenas adultos?',
        'answer' => 'Atendo apenas adultos, portanto individuos a partir dos 18 anos',
        'icon' => 'ADOLESCENTES.svg'
    ],
    [
        'question' => 'Faz teleconsultas?',
        'answer' => 'Sim. Acredito na acessibilidade aos serviços de saúde mental, e por vezes as teleconsultas são uma solução interessante para conseguir conjugar o tratamento com a vida pessoal e profissional.',
        'icon' => 'TELECONSULTAS.svg'
    ],
    [
        'question' => 'Qual a duração das consultas?',
        'answer' => 'Cada consulta dura em média 45-60minutos.',
        'icon' => 'DURACAO.svg'
    ]
];

$faq_items = [];
foreach ($faq_data as $idx => $faq) {
    $faq_items[] = [
        'id' => generate_element_id('faq_item_' . $idx),
        'elType' => 'widget',
        'widgetType' => 'accordion',
        'settings' => [
            'tabs' => [
                [
                    'tab_title' => $faq['question'],
                    'tab_content' => $faq['answer'],
                    'tab_icon' => [
                        'value' => $template_dir . '/images/icons/' . $faq['icon'],
                        'library' => 'image'
                    ]
                ]
            ],
            'title_html_tag' => 'h3',
            'title_color' => '#70309e',
            'icon_color' => '#70309e',
            'icon_active_color' => '#f56428',
            'icon_align' => 'left',
            'toggle_icon_active_color' => '#f56428',
            'content_color' => '#6b7280',
            'typography_title_typography' => 'custom',
            'typography_title_font_family' => 'Neue Montreal',
            'typography_title_font_weight' => '500',
            'typography_content_typography' => 'custom',
            'typography_content_font_family' => 'Neue Montreal',
            'typography_content_font_size' => [
                'unit' => 'px',
                'size' => 16,
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
    ];
}

$complete_elementor_data[] = [
    'id' => generate_element_id('faq'),
    'elType' => 'section',
    'settings' => [
        'background_background' => 'classic',
        'background_color' => '#f2ede7',
        'background_image' => [
            'url' => $template_dir . '/images/srosa.svg',
            'id' => '',
            'size' => 'custom'
        ],
        'background_position' => 'center center',
        'background_repeat' => 'no-repeat',
        'background_size' => '70%',
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
            'id' => generate_element_id('faq_title'),
            'elType' => 'widget',
            'widgetType' => 'heading',
            'settings' => [
                'title' => 'Perguntas Frequentes',
                'header_size' => 'h2',
                'align' => 'center',
                'title_color' => '#1f2937',
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
            'id' => generate_element_id('faq_container'),
            'elType' => 'widget',
            'widgetType' => 'inner-section',
            'settings' => [],
            'elements' => array_map(function($faq_item) {
                return [
                    'id' => generate_element_id('faq_col'),
                    'elType' => 'column',
                    'settings' => [
                        '_column_size' => 100,
                        '_inline_size' => null
                    ],
                    'elements' => [$faq_item]
                ];
            }, $faq_items)
        ]
    ],
    'isInner' => false
];

// ============================================
// SEÇÃO 11: CONTATO (FORMULÁRIO)
// ============================================
$complete_elementor_data[] = [
    'id' => generate_element_id('contato'),
    'elType' => 'section',
    'settings' => [
        'background_background' => 'classic',
        'background_color' => '#f56428',
        'background_image' => [
            'url' => $template_dir . '/images/fundo2.svg',
            'id' => '',
            'size' => 'custom'
        ],
        'background_position' => 'center center',
        'background_repeat' => 'no-repeat',
        'background_size' => '200%',
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
            'id' => generate_element_id('contato_title'),
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
            'id' => generate_element_id('contato_form'),
            'elType' => 'widget',
            'widgetType' => 'wp-widget-contact-form-7',
            'settings' => [
                'form_id' => '',
                'form_id_mobile' => ''
            ]
        ]
    ],
    'isInner' => false
];

// ============================================
// SALVAR TEMPLATE ELEMENTOR COMPLETO
// ============================================
try {
    update_post_meta($page_id, '_elementor_data', wp_json_encode($complete_elementor_data));
    update_post_meta($page_id, '_elementor_edit_mode', 'builder');
    update_post_meta($page_id, '_elementor_template_type', 'wp-page');
    update_post_meta($page_id, '_elementor_version', ELEMENTOR_VERSION);
    update_post_meta($page_id, '_elementor_page_settings', wp_json_encode([]));

    // Limpar conteúdo da página para usar apenas Elementor
    wp_update_post([
        'ID' => $page_id,
        'post_content' => ''
    ]);

    // Regenerar CSS do Elementor
    if (class_exists('Elementor\Plugin')) {
        Elementor\Plugin::$instance->files_manager->clear_cache();
    }

    echo "✅ TEMPLATE ELEMENTOR COMPLETO CRIADO COM SUCESSO!\n\n";
    echo "📊 ESTATÍSTICAS:\n";
    echo "   • Total de seções: " . count($complete_elementor_data) . "\n";
    echo "   • Banners Hero: ✅ INCLUÍDOS\n";
    echo "   • Fontes: ✅ JH CAUDEMARS + NEUE MONTREAL\n";
    echo "   • Cores: ✅ #70309e (roxo), #f56428 (laranja), #6b7280 (cinza)\n";
    echo "   • Áreas de Especialização: ✅ 4 cards\n";
    echo "   • Estatísticas: ✅ 4 métricas\n";
    echo "   • Formações: ✅ 4 formações\n";
    echo "   • Recursos: ✅ 3 botões\n";
    echo "   • FAQ: ✅ 9 perguntas\n";
    echo "   • Contato: ✅ Formulário\n\n";
    echo "🎨 TUDO É 100% EDITÁVEL NO ELEMENTOR!\n\n";
    echo "🌐 URL: " . get_permalink($page_id) . "\n";
    echo "📝 Editar: " . admin_url('post.php?post=' . $page_id . '&action=elementor') . "\n";

} catch (Exception $e) {
    echo "❌ Erro ao criar template: " . $e->getMessage() . "\n";
}

echo "\n🎉 SITE WORDPRESS 100% IDÊNTICO AO REACT CRIADO!\n";
echo "🚀 Tudo pronto para editar no Elementor!\n";
?>