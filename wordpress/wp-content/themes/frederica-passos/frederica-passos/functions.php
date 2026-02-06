<?php
/**
 * Frederica Passos Theme functions and definitions
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Define theme constants
define('THEME_DIR', get_template_directory());
define('THEME_URI', get_template_directory_uri());

// Remove default styles and enqueue our styles
function frederica_passos_scripts() {
    // Remove all default WordPress styles that might conflict
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('global-styles');
    wp_dequeue_style('classic-theme-styles');

    // Force remove any other styles
    global $wp_styles;
    if (isset($wp_styles->registered)) {
        foreach ($wp_styles->registered as $handle => $style) {
            if (strpos($handle, 'wp-') === 0 && $handle !== 'wp-admin-bar') {
                wp_dequeue_style($handle);
            }
        }
    }

    // Enqueue our main stylesheet with high priority
    wp_enqueue_style('frederica-passos-style', THEME_URI . '/style.css', array(), filemtime(THEME_DIR . '/style.css'));

    // Enqueue Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap', array(), null);

    // Enqueue jQuery
    wp_enqueue_script('jquery');

    // Enqueue main JavaScript with high priority
    wp_enqueue_script('frederica-passos-main', THEME_URI . '/js/main.js', array('jquery'), filemtime(THEME_DIR . '/js/main.js'), true);
}
add_action('wp_enqueue_scripts', 'frederica_passos_scripts', 1);

// Add font loading
function frederica_passos_load_fonts() {
    ?>
    <style>
        /* Font loading - High priority */
        @font-face {
            font-family: 'NeueMontreal';
            src: url('<?php echo get_template_directory_uri(); ?>/images/NeueMontreal-Regular.otf') format('opentype');
            font-weight: 400;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'NeueMontreal';
            src: url('<?php echo get_template_directory_uri(); ?>/images/NeueMontreal-Medium.otf') format('opentype');
            font-weight: 500;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'NeueMontreal';
            src: url('<?php echo get_template_directory_uri(); ?>/images/NeueMontreal-Bold.otf') format('opentype');
            font-weight: 700;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'JhCaudemars';
            src: url('<?php echo get_template_directory_uri(); ?>/images/jhcaudemars-medium.otf') format('opentype');
            font-weight: 500;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'Chreed';
            src: url('<?php echo get_template_directory_uri(); ?>/images/Chreed-Regular.otf') format('opentype');
            font-weight: 400;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'Chreed';
            src: url('<?php echo get_template_directory_uri(); ?>/images/Chreed-Bold.otf') format('opentype');
            font-weight: 700;
            font-style: normal;
            font-display: swap;
        }
    </style>
    <?php
}
add_action('wp_head', 'frederica_passos_load_fonts', 1);

// Theme setup
function frederica_passos_setup() {
    // Add theme support
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list'));
    add_theme_support('wp-block-styles');
    add_theme_support('responsive-embeds');

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'frederica-passos'),
    ));

    // Add custom image sizes
    add_image_size('hero-large', 1920, 1080, true);
    add_image_size('hero-mobile', 768, 1024, true);
    add_image_size('card-image', 600, 400, true);
}
add_action('after_setup_theme', 'frederica_passos_setup');

// Custom post types
function frederica_passos_custom_post_types() {
    // Register Formações post type
    register_post_type('formacao', array(
        'labels' => array(
            'name' => __('Formações', 'frederica-passos'),
            'singular_name' => __('Formação', 'frederica-passos'),
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-groups',
    ));

    // Register Áreas post type
    register_post_type('area', array(
        'labels' => array(
            'name' => __('Áreas', 'frederica-passos'),
            'singular_name' => __('Área', 'frederica-passos'),
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-heart',
    ));
}
add_action('init', 'frederica_passos_custom_post_types');

// Add comprehensive custom CSS
function frederica_passos_custom_css() {
    ?>
    <style>
        /* FORCE OVERRIDE - Highest specificity */
        body.frederica-passos,
        body.page-template-default {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', sans-serif !important;
            margin: 0 !important;
            padding: 0 !important;
            line-height: 1.6 !important;
            color: #1f2937 !important;
            overflow-x: hidden !important;
        }

        /* Header - Exact match to original */
        header#header {
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;
            right: 0 !important;
            z-index: 50 !important;
            background-color: #f2ede7 !important;
            box-shadow: 0 1px 2px 0 rgb(0 0 0 / 0.05) !important;
            transition: transform 0.3s ease-in-out !important;
        }

        /* Logo */
        header .flex-shrink-0 img {
            height: 3rem !important;
        }

        @media (min-width: 768px) {
            header .flex-shrink-0 img {
                height: 3.75rem !important;
            }
        }

        /* Menu container - Centered */
        .absolute.left-1\/2.transform.-translate-x-1\/2 {
            position: absolute !important;
            left: 50% !important;
            transform: translateX(-50%) !important;
            display: none !important;
        }

        @media (min-width: 768px) {
            .absolute.left-1\/2.transform.-translate-x-1\/2 {
                display: flex !important;
            }
        }

        /* Menu items */
        .nav-item {
            font-family: 'NeueMontreal', sans-serif !important;
            font-size: 0.875rem !important;
            line-height: 1.25rem !important;
            color: #6b7280 !important;
            font-weight: 400 !important;
            transition: all 0.2s ease !important;
            cursor: pointer !important;
            position: relative !important;
            padding: 0.5rem 0.5rem !important;
        }

        @media (min-width: 1024px) {
            .nav-item {
                font-size: 1rem !important;
                line-height: 1.5rem !important;
            }
        }

        .nav-item:hover {
            color: #70309e !important;
            font-weight: 600 !important;
        }

        .menu-line {
            position: absolute !important;
            bottom: 0 !important;
            left: 50% !important;
            height: 2px !important;
            background-color: #f56428 !important;
            transform-origin: center !important;
            transition: all 0.3s ease-in-out !important;
            width: 0% !important;
            transform: translateX(-50%) !important;
        }

        /* CTA Button */
        .cta-button {
            font-family: 'NeueMontreal', sans-serif !important;
            background-color: #f56428 !important;
            color: white !important;
            border-radius: 8px !important;
            padding: 0.5rem 1.5rem !important;
            font-size: 0.75rem !important;
            font-weight: 600 !important;
            transition: all 0.3s ease-in-out !important;
            position: relative !important;
            overflow: hidden !important;
            display: none !important;
        }

        @media (min-width: 640px) {
            .cta-button {
                display: block !important;
                padding: 0.75rem 1.5rem !important;
                font-size: 0.875rem !important;
            }
        }

        @media (min-width: 768px) {
            .cta-button {
                padding: 0.75rem 2rem !important;
                font-size: 1rem !important;
            }
        }

        .cta-button:hover {
            transform: scale(1.05) !important;
        }

        .gradient-overlay {
            position: absolute !important;
            inset: 0 !important;
            border-radius: 8px !important;
            background: linear-gradient(135deg, #f56428 0%, #70309e 100%) !important;
            opacity: 0 !important;
            transition: opacity 0.4s ease-in-out !important;
        }

        /* Hero Section */
        #hero-section {
            position: relative !important;
            width: 100% !important;
            height: 100vh !important;
            overflow: hidden !important;
        }

        .slide {
            position: absolute !important;
            inset: 0 !important;
            transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1) !important;
        }

        .slide.active {
            z-index: 1 !important;
            opacity: 1 !important;
            transform: translateX(0) !important;
        }

        .slide:not(.active) {
            z-index: 0 !important;
            opacity: 0 !important;
        }

        /* Hero content positioning */
        #hero-section .max-w-7xl {
            position: absolute !important;
            left: 0 !important;
            top: 0 !important;
            bottom: 0 !important;
            width: 100% !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            padding-left: 1rem !important;
            padding-right: 1rem !important;
        }

        @media (min-width: 640px) {
            #hero-section .max-w-7xl {
                justify-content: flex-end !important;
                padding-right: 2rem !important;
            }
        }

        @media (min-width: 768px) {
            #hero-section .max-w-7xl {
                padding-right: 4rem !important;
            }
        }

        @media (min-width: 1024px) {
            #hero-section .max-w-7xl {
                padding-right: 6rem !important;
            }
        }

        @media (min-width: 1280px) {
            #hero-section .max-w-7xl {
                padding-right: 8rem !important;
            }
        }

        /* Hero text */
        .font-jh-caudemars {
            font-family: 'JhCaudemars', serif !important;
            font-weight: 500 !important;
        }

        .font-neue-montreal {
            font-family: 'NeueMontreal', sans-serif !important;
        }

        /* Hero CTA button */
        .hero-cta-button {
            background-color: #70309e !important;
            color: white !important;
            border-radius: 8px !important;
            padding: 0.75rem 1.5rem !important;
            font-size: 0.875rem !important;
            font-weight: 600 !important;
            transition: all 0.3s ease-in-out !important;
            position: relative !important;
            overflow: hidden !important;
            align-self: center !important;
        }

        @media (min-width: 640px) {
            .hero-cta-button {
                align-self: flex-start !important;
                padding: 0.875rem 1.875rem !important;
                font-size: 1rem !important;
            }
        }

        @media (min-width: 768px) {
            .hero-cta-button {
                padding: 1rem 2rem !important;
                font-size: 1.125rem !important;
            }
        }

        .hero-cta-button:hover {
            transform: scale(1.05) !important;
        }

        .hero-gradient-overlay {
            position: absolute !important;
            inset: 0 !important;
            border-radius: 8px !important;
            background: linear-gradient(135deg, #70309e 0%, #f56428 100%) !important;
            opacity: 0 !important;
            transition: opacity 0.4s ease-in-out !important;
        }

        /* Hide WordPress default elements */
        #wpadminbar,
        .wp-block-library,
        .wp-block-library-theme,
        .global-styles {
            display: none !important;
        }

        /* Force body background */
        body {
            background-color: #ffffff !important;
        }
    </style>
    <?php
}
add_action('wp_head', 'frederica_passos_custom_css', 999);