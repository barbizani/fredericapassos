<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'jh-caudemars': ['JhCaudemars', 'serif'],
                        'neue-montreal': ['NeueMontreal', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <!-- CSS crítico para layout imediato -->
    <style>
    /* Layout crítico - carrega antes do Tailwind */
    body { margin: 0; padding: 0; font-family: Arial, sans-serif; }
    .w-full { width: 100% !important; }
    .relative { position: relative !important; }
    .absolute { position: absolute !important; }
    .fixed { position: fixed !important; }
    .top-0 { top: 0 !important; }
    .left-0 { left: 0 !important; }
    .right-0 { right: 0 !important; }
    .z-50 { z-index: 50 !important; }
    .bg-\[#f2ede7\] { background-color: #f2ede7 !important; }
    .shadow-sm { box-shadow: 0 1px 2px 0 rgb(0 0 0 / 0.05) !important; }
    .max-w-7xl { max-width: 80rem !important; }
    .mx-auto { margin-left: auto !important; margin-right: auto !important; }
    .px-4 { padding-left: 1rem !important; padding-right: 1rem !important; }
    .flex { display: flex !important; }
    .items-center { align-items: center !important; }
    .justify-between { justify-content: space-between !important; }
    .h-16 { height: 4rem !important; }
    .bg-\[#70309e\] { background-color: #70309e !important; }
    .h-\[450px\] { height: 450px !important; }
    .overflow-hidden { overflow: hidden !important; }
    .inset-0 { top: 0 !important; right: 0 !important; bottom: 0 !important; left: 0 !important; }
    .text-white { color: white !important; }
    .py-12 { padding-top: 3rem !important; padding-bottom: 3rem !important; }
    .bg-\[#f2ede7\] { background-color: #f2ede7 !important; }
    .text-center { text-align: center !important; }
    .font-jh-caudemars { font-family: 'JhCaudemars', serif !important; }
    .font-neue-montreal { font-family: 'NeueMontreal', sans-serif !important; }
    .text-3xl { font-size: 1.875rem !important; }
    .leading-tight { line-height: 1.25 !important; }
    .hidden { display: none !important; }
    .md\:hidden { display: none !important; }
    .md\:flex { display: flex !important; }
    .sm\:text-base { font-size: 1rem !important; }
    .md\:text-lg { font-size: 1.125rem !important; }
    .lg\:text-xl { font-size: 1.25rem !important; }
    .xl\:text-7xl { font-size: 4.5rem !important; }
    .text-\[#70309e\] { color: #70309e !important; }
    .bg-\[#f56428\] { background-color: #f56428 !important; }
    .text-\[#f56428\] { color: #f56428 !important; }
    .text-\[#6b7280\] { color: #6b7280 !important; }
    </style>

    <!-- Font loading -->
    <style>
        @font-face {
            font-family: 'NeueMontreal';
            src: url('<?php echo get_template_directory_uri(); ?>/images/NeueMontreal-Regular.otf') format('opentype');
            font-weight: 400;
            font-style: normal;
        }
        @font-face {
            font-family: 'NeueMontreal';
            src: url('<?php echo get_template_directory_uri(); ?>/images/NeueMontreal-Medium.otf') format('opentype');
            font-weight: 500;
            font-style: normal;
        }
        @font-face {
            font-family: 'JhCaudemars';
            src: url('<?php echo get_template_directory_uri(); ?>/images/jhcaudemars-medium.otf') format('opentype');
            font-weight: 500;
            font-style: normal;
        }
    </style>