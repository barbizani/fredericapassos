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
    .bottom-4 { bottom: 1rem !important; }
    .right-4 { right: 1rem !important; }
    @media (min-width: 640px) {
        .sm\:bottom-8 { bottom: 2rem !important; }
        .sm\:right-8 { right: 2rem !important; }
        .sm\:p-4 { padding: 1rem !important; }
        .sm\:w-6 { width: 1.5rem !important; }
        .sm\:h-6 { height: 1.5rem !important; }
    }
    .rounded-full { border-radius: 9999px !important; }
    .p-3 { padding: 0.75rem !important; }
    .shadow-lg { box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1) !important; }
    .opacity-0 { opacity: 0 !important; }
    .invisible { visibility: hidden !important; }
    .opacity-100 { opacity: 1 !important; }
    .visible { visibility: visible !important; }
    .scale-0 { transform: scale(0) !important; }
    .scale-100 { transform: scale(1) !important; }
    .transition-all { transition-property: all !important; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1) !important; transition-duration: 150ms !important; }
    .duration-300 { transition-duration: 300ms !important; }
    .w-5 { width: 1.25rem !important; }
    .h-5 { height: 1.25rem !important; }
    .hover\:bg-\[#70309e\]:hover { background-color: #70309e !important; }
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

<!-- Scroll to Top Button -->
<button id="scroll-to-top" style="position: fixed; bottom: 1rem; right: 1rem; background-color: #f56428; color: white; border-radius: 9999px; padding: 0.75rem; box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1); z-index: 9999; opacity: 0; visibility: hidden; transform: translateY(1rem) scale(0); transition: all 0.3s ease; border: none; cursor: pointer; width: 3rem; height: 3rem; display: flex; align-items: center; justify-content: center;" aria-label="Voltar ao topo">
    <svg style="width: 1.25rem; height: 1.25rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
    </svg>
</button>

<script>
(function() {
    function initScrollToTop() {
        const scrollToTopBtn = document.getElementById('scroll-to-top');
        if (!scrollToTopBtn) {
            setTimeout(initScrollToTop, 100);
            return;
        }

        function updateButtonVisibility() {
            const scrollY = window.pageYOffset || document.documentElement.scrollTop;
            
            if (scrollY > 300) {
                scrollToTopBtn.style.opacity = '1';
                scrollToTopBtn.style.visibility = 'visible';
                scrollToTopBtn.style.transform = 'translateY(0) scale(1)';
            } else {
                scrollToTopBtn.style.opacity = '0';
                scrollToTopBtn.style.visibility = 'hidden';
                scrollToTopBtn.style.transform = 'translateY(1rem) scale(0)';
            }
        }

        scrollToTopBtn.addEventListener('mouseenter', function() {
            if (window.pageYOffset > 300) {
                this.style.transform = 'translateY(0) scale(1.1)';
                this.style.backgroundColor = '#70309e';
            }
        });
        
        scrollToTopBtn.addEventListener('mouseleave', function() {
            if (window.pageYOffset > 300) {
                this.style.transform = 'translateY(0) scale(1)';
                this.style.backgroundColor = '#f56428';
            }
        });
        
        scrollToTopBtn.addEventListener('mousedown', function() {
            this.style.transform = 'translateY(0) scale(0.9)';
        });
        
        scrollToTopBtn.addEventListener('mouseup', function() {
            if (window.pageYOffset > 300) {
                this.style.transform = 'translateY(0) scale(1.1)';
            }
        });
        
        scrollToTopBtn.addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        window.addEventListener('scroll', updateButtonVisibility);
        updateButtonVisibility();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initScrollToTop);
    } else {
        initScrollToTop();
    }
})();
</script>