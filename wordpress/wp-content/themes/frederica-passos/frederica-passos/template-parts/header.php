<?php
/**
 * Header template part
 */
?>

<header id="header" class="fixed top-0 left-0 right-0 z-50 bg-[#f2ede7] shadow-sm transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 md:h-20 relative">
            <!-- Logo -->
            <div class="flex-shrink-0 z-10">
                <a href="<?php echo home_url(); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/logohoriz.svg"
                         alt="Logo Dra. Frederica Passos"
                         class="h-10 md:h-12 w-auto object-contain">
                </a>
            </div>

            <!-- Menu Items - Desktop - Centralizado na página -->
            <nav class="hidden md:flex items-center justify-center absolute left-1/2 transform -translate-x-1/2 space-x-6 lg:space-x-8">
                <button class="nav-item font-neue-montreal text-sm lg:text-base relative px-2 py-1 transition-all duration-200 text-center"
                        style="color: #6b7280; font-weight: 400;"
                        data-section="Início">
                    Início
                    <!-- Linha laranja animada -->
                    <div class="menu-line absolute bottom-0 left-1/2 h-0.5 bg-[#f56428] transition-all duration-300"
                         style="transform-origin: center; width: 0%; transform: translateX(-50%);"></div>
                </button>
                <button class="nav-item font-neue-montreal text-sm lg:text-base relative px-2 py-1 transition-all duration-200 text-center"
                        style="color: #6b7280; font-weight: 400;"
                        data-section="Sobre">
                    Sobre
                    <!-- Linha laranja animada -->
                    <div class="menu-line absolute bottom-0 left-1/2 h-0.5 bg-[#f56428] transition-all duration-300"
                         style="transform-origin: center; width: 0%; transform: translateX(-50%);"></div>
                </button>
                <button class="nav-item font-neue-montreal text-sm lg:text-base relative px-2 py-1 transition-all duration-200 text-center"
                        style="color: #6b7280; font-weight: 400;"
                        data-section="Áreas de Atuação">
                    Áreas de Atuação
                    <!-- Linha laranja animada -->
                    <div class="menu-line absolute bottom-0 left-1/2 h-0.5 bg-[#f56428] transition-all duration-300"
                         style="transform-origin: center; width: 0%; transform: translateX(-50%);"></div>
                </button>
                <button class="nav-item font-neue-montreal text-sm lg:text-base relative px-2 py-1 transition-all duration-200 text-center"
                        style="color: #6b7280; font-weight: 400;"
                        data-section="Serviços">
                    Serviços
                    <!-- Linha laranja animada -->
                    <div class="menu-line absolute bottom-0 left-1/2 h-0.5 bg-[#f56428] transition-all duration-300"
                         style="transform-origin: center; width: 0%; transform: translateX(-50%);"></div>
                </button>
                <button class="nav-item font-neue-montreal text-sm lg:text-base relative px-2 py-1 transition-all duration-200 text-center"
                        style="color: #6b7280; font-weight: 400;"
                        data-section="Contato">
                    Contato
                    <!-- Linha laranja animada -->
                    <div class="menu-line absolute bottom-0 left-1/2 h-0.5 bg-[#f56428] transition-all duration-300"
                         style="transform-origin: center; width: 0%; transform: translateX(-50%);"></div>
                </button>
            </nav>

            <!-- Botão Agende Agora -->
            <div class="flex-shrink-0 z-10 hidden sm:block">
                <button class="cta-button font-neue-montreal text-white px-4 md:px-6 py-2 md:py-3 rounded-lg text-xs sm:text-sm md:text-base font-medium relative overflow-hidden"
                        style="background-color: #f56428; border-radius: 8px;">
                    <!-- Gradiente animado no hover -->
                    <div class="gradient-overlay absolute inset-0 rounded-lg opacity-0 transition-opacity duration-400"
                         style="background: linear-gradient(135deg, #f56428 0%, #70309e 100%);"></div>
                    <span class="relative z-10">Agende Agora</span>
                </button>
            </div>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-btn" class="md:hidden p-2 text-gray-700 hover:text-orange-500 transition-colors duration-300">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden mt-4 pb-4 border-t border-gray-200 pt-4">
            <nav class="flex flex-col space-y-4">
                <a href="#inicio" class="nav-link font-medium transition-colors duration-300 text-gray-700 hover:text-orange-500">Início</a>
                <a href="#sobre" class="nav-link font-medium transition-colors duration-300 text-gray-700 hover:text-orange-500">Sobre</a>
                <a href="#areas" class="nav-link font-medium transition-colors duration-300 text-gray-700 hover:text-orange-500">Áreas de Atuação</a>
                <a href="#servicos" class="nav-link font-medium transition-colors duration-300 text-gray-700 hover:text-orange-500">Serviços</a>
                <a href="#contato" class="nav-link font-medium transition-colors duration-300 text-gray-700 hover:text-orange-500">Contato</a>
            </nav>

            <div class="flex flex-col space-y-3 mt-6">
                <button class="cta-button text-center px-6 py-3 bg-orange-500 text-white rounded-lg font-medium hover:bg-orange-600 transition-colors duration-300">
                    Agende sua Consulta
                </button>
            </div>
        </div>
    </div>
</header>

<!-- Scroll to Top Button -->
<button id="scroll-to-top" class="fixed bottom-4 right-4 sm:bottom-8 sm:right-8 bg-[#f56428] text-white rounded-full p-3 sm:p-4 shadow-lg z-50 hover:bg-[#70309e] transition-all duration-300 opacity-0 invisible transform translate-y-4 scale-0" aria-label="Voltar ao topo">
    <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
    </svg>
</button>

<script>
// Header behavior - Exactly like the original React version
document.addEventListener('DOMContentLoaded', function() {
    const header = document.getElementById('header');
    const scrollToTopBtn = document.getElementById('scroll-to-top');
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const ctaButton = document.querySelector('.cta-button');
    const gradientOverlay = document.querySelector('.gradient-overlay');
    let lastScrollY = window.scrollY;
    let isHeaderVisible = true;
    let hoveredItem = null;

    // Menu items hover effect
    document.querySelectorAll('.nav-item').forEach(item => {
        const line = item.querySelector('.menu-line');

        item.addEventListener('mouseenter', function() {
            hoveredItem = this.dataset.section;
            line.style.width = '100%';
            line.style.transform = 'translateX(-50%)';
            this.style.color = '#70309e';
            this.style.fontWeight = '600';
        });

        item.addEventListener('mouseleave', function() {
            hoveredItem = null;
            const isActive = this.classList.contains('active');
            if (!isActive) {
                line.style.width = '0';
                this.style.color = '#6b7280';
                this.style.fontWeight = '400';
            }
        });

        // Click to scroll to section
        item.addEventListener('click', function(e) {
            e.preventDefault();
            const sectionName = this.dataset.section;
            const sectionMap = {
                'Início': 'inicio',
                'Sobre': 'sobre',
                'Áreas de Atuação': 'areas',
                'Serviços': 'servicos',
                'Contato': 'contato'
            };

            const sectionId = sectionMap[sectionName];

            if (sectionId) {
                const element = document.getElementById(sectionId);
                if (element) {
                    const offset = 80;
                    const elementPosition = element.getBoundingClientRect().top;
                    const offsetPosition = elementPosition + window.pageYOffset - offset;

                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });
                }
            }

            // Close mobile menu if open
            if (mobileMenu && !mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.add('hidden');
            }
        });
    });

    // CTA Button hover effect
    if (ctaButton && gradientOverlay) {
        let isHovered = false;

        ctaButton.addEventListener('mouseenter', function() {
            isHovered = true;
            gradientOverlay.style.opacity = '1';
            ctaButton.style.transform = 'scale(1.05)';
        });

        ctaButton.addEventListener('mouseleave', function() {
            isHovered = false;
            gradientOverlay.style.opacity = '0';
            ctaButton.style.transform = 'scale(1)';
        });
    }

    // Mobile menu toggle
    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });
    }

    // Scroll behavior - exactly like original
    window.addEventListener('scroll', function() {
        const currentScrollY = window.scrollY;

        // Show/hide scroll to top button
        if (currentScrollY > 300) {
            scrollToTopBtn.classList.remove('opacity-0', 'invisible', 'scale-0');
            scrollToTopBtn.classList.add('opacity-100', 'visible', 'scale-100');
            scrollToTopBtn.style.transform = 'translateY(0) scale(1)';
        } else {
            scrollToTopBtn.classList.add('opacity-0', 'invisible', 'scale-0');
            scrollToTopBtn.classList.remove('opacity-100', 'visible', 'scale-100');
            scrollToTopBtn.style.transform = 'translateY(1rem) scale(0)';
        }

        // Header hide/show on scroll - exactly like original
        if (currentScrollY < 100) {
            header.style.transform = 'translateY(0)';
            isHeaderVisible = true;
        } else if (currentScrollY > lastScrollY && currentScrollY > 100) {
            // Scrolling down
            if (isHeaderVisible) {
                header.style.transform = 'translateY(-100%)';
                isHeaderVisible = false;
            }
        } else if (currentScrollY < lastScrollY) {
            // Scrolling up
            if (!isHeaderVisible) {
                header.style.transform = 'translateY(0)';
                isHeaderVisible = true;
            }
        }

        lastScrollY = currentScrollY;
    });

    // Scroll to top functionality
    if (scrollToTopBtn) {
        scrollToTopBtn.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(0) scale(1.1)';
        });
        
        scrollToTopBtn.addEventListener('mouseleave', function() {
            if (window.scrollY > 300) {
                this.style.transform = 'translateY(0) scale(1)';
            }
        });
        
        scrollToTopBtn.addEventListener('mousedown', function() {
            this.style.transform = 'translateY(0) scale(0.9)';
        });
        
        scrollToTopBtn.addEventListener('mouseup', function() {
            this.style.transform = 'translateY(0) scale(1.1)';
        });
        
        scrollToTopBtn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
});
</script>