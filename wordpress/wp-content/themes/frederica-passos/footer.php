    <!-- Scroll to Top Button -->
    <style>
        #scrollToTop {
            position: fixed;
            bottom: 32px;
            right: 32px;
            z-index: 99999;
            background: #f56428;
            color: #fff;
            border: none;
            border-radius: 50%;
            width: 48px;
            height: 48px;
            padding: 0;
            box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1), 0 4px 6px -2px rgba(0,0,0,0.05);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s, transform 0.3s;
        }
        #scrollToTop:hover {
            background: #70309e;
            transform: scale(1.05);
        }
        @media (max-width: 640px) {
            #scrollToTop {
                bottom: 16px;
                right: 16px;
                width: 40px;
                height: 40px;
                font-size: 20px;
            }
        }
    </style>
    <button id="scrollToTop" type="button" aria-label="Voltar ao topo">
        ↑
    </button>

    <!-- Footer -->
    <footer class="relative w-full bg-[#70309e] py-12 sm:py-16 md:py-20 overflow-hidden">
        <div class="absolute inset-0" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/patternrosa.svg); background-size: 800%; background-repeat: no-repeat; background-position: center;">
        </div>
        <div class="absolute inset-0 bg-[#70309e]/70"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-10">
            <div class="flex flex-col items-center space-y-8 sm:space-y-10">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/logoclara.svg"
                         alt="Logo Dra. Frederica Passos"
                         class="h-16 md:h-20 lg:h-24 w-auto object-contain">
                </div>

                <!-- Menu Items -->
                <nav class="flex items-center justify-center flex-wrap gap-4 sm:gap-6 lg:gap-8">
                    <button class="footer-nav-btn font-neue-montreal text-sm lg:text-base relative px-2 py-1 transition-all duration-200 text-center text-white/80 hover:text-white" data-section="inicio">
                        Início
                    </button>
                    <button class="footer-nav-btn font-neue-montreal text-sm lg:text-base relative px-2 py-1 transition-all duration-200 text-center text-white/80 hover:text-white" data-section="sobre">
                        Sobre
                    </button>
                    <button class="footer-nav-btn font-neue-montreal text-sm lg:text-base relative px-2 py-1 transition-all duration-200 text-center text-white/80 hover:text-white" data-section="areas">
                        Áreas de Atuação
                    </button>
                    <button class="footer-nav-btn font-neue-montreal text-sm lg:text-base relative px-2 py-1 transition-all duration-200 text-center text-white/80 hover:text-white" data-section="formacoes">
                        Serviços
                    </button>
                    <button class="footer-nav-btn font-neue-montreal text-sm lg:text-base relative px-2 py-1 transition-all duration-200 text-center text-white/80 hover:text-white" data-section="contato">
                        Contato
                    </button>
                </nav>

                <!-- Botão Agende Agora -->
                <div class="flex-shrink-0">
                    <button class="footer-nav-btn font-neue-montreal text-white px-6 md:px-8 py-3 md:py-4 rounded-lg text-sm md:text-base font-medium relative overflow-hidden bg-[#f56428] hover:bg-[#f56428]/80 transition-colors" data-section="contato">
                        Agende Agora
                    </button>
                </div>

                <!-- Botões Sociais -->
                <div class="flex items-center gap-4 sm:gap-6">
                    <button class="relative p-2 hover:bg-[#f56428] rounded-lg transition-colors">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/LINKEDIN.svg" alt="LinkedIn" class="w-6 h-6" />
                    </button>
                    <button class="relative p-2 hover:bg-[#f56428] rounded-lg transition-colors">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/INSTAGRAM.svg" alt="Instagram" class="w-6 h-6" />
                    </button>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log('🚀 Site Frederica Passos - JavaScript carregado!');

        // Scroll to section functionality
        function scrollToSection(sectionId) {
            let target = document.getElementById(sectionId);
            
            if (!target) {
                const all = document.querySelectorAll('[id]');
                for (let i = 0; i < all.length; i++) {
                    if (all[i].id && all[i].id.indexOf(sectionId) !== -1) {
                        target = all[i];
                        break;
                    }
                }
            }
            
            if (target) {
                const headerOffset = 80;
                const elementPosition = target.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset - headerOffset;
                
                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });
                return true;
            }
            return false;
        }

        window.fpScrollToSection = scrollToSection;

        document.querySelectorAll('[data-section]').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const sectionId = this.getAttribute('data-section');
                scrollToSection(sectionId);
            });
        });

        document.querySelectorAll('a[href^="#"]').forEach(link => {
            link.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href && href !== '#' && href.length > 1) {
                    const sectionId = href.substring(1);
                    if (sectionId) {
                        e.preventDefault();
                        scrollToSection(sectionId);
                    }
                }
            });
        });

        document.querySelectorAll('.header-nav a, .mobile-menu-nav a').forEach(link => {
            link.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href && href.startsWith('#')) {
                    const sectionId = href.substring(1);
                    if (sectionId) {
                        e.preventDefault();
                        scrollToSection(sectionId);
                    }
                }
            });
        });

        // Header scroll effect
        let lastScrollY = window.scrollY;
        let isHeaderVisible = true;

        window.addEventListener('scroll', function() {
            const currentScrollY = window.scrollY;
            const header = document.querySelector('header');

            if (currentScrollY < 100) {
                if (header) header.style.transform = 'translateY(0)';
                isHeaderVisible = true;
            } else if (currentScrollY > lastScrollY && currentScrollY > 100) {
                if (isHeaderVisible && header) {
                    header.style.transform = 'translateY(-100%)';
                    isHeaderVisible = false;
                }
            } else if (currentScrollY < lastScrollY) {
                if (!isHeaderVisible && header) {
                    header.style.transform = 'translateY(0)';
                    isHeaderVisible = true;
                }
            }

            lastScrollY = currentScrollY;
        });

        // Scroll to top button
        const btn = document.getElementById('scrollToTop');
        if (!btn) return;

        btn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        window.addEventListener('scroll', function() {
            if (window.scrollY > 300) {
                btn.style.opacity = '1';
                btn.style.pointerEvents = 'auto';
            } else {
                btn.style.opacity = '0';
                btn.style.pointerEvents = 'none';
            }
        });

        // CTA Button hover effects
        document.querySelectorAll('.cta-button, [class*="bg-[#f56428]"]').forEach(button => {
            button.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.05)';
            });

            button.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1)';
            });
        });

        console.log('✅ Todas as funcionalidades ativadas!');
    });
    </script>

    <?php wp_footer(); ?>
</body>
</html>