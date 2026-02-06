<?php
/**
 * Header template part
 */
?>

<!-- Tailwind CSS CDN -->
<script src="https://cdn.tailwindcss.com"></script>
<script>
    tailwind.config = {
        theme: {
            extend: {
                fontFamily: {
                    'jh-caudemars': ['JH Caudemars', 'serif'],
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
</style>

<!-- Font loading -->
<style>
    @font-face {
        font-family: 'JH Caudemars';
        src: url('<?php echo get_template_directory_uri(); ?>/images/jhcaudemars-medium.otf') format('opentype');
        font-weight: 500;
        font-style: normal;
    }

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
</style>

<header id="header" class="fixed top-0 left-0 right-0 z-50 bg-[#f2ede7] shadow-sm transition-all duration-300">