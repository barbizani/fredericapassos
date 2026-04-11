    <!-- Scroll to Top Button -->
    <button id="scroll-to-top" class="fixed bottom-8 right-8 bg-[#f56428] text-white p-3 rounded-full shadow-lg hover:bg-[#70309e] transition-all duration-300 opacity-0 invisible transform translate-y-4">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
        </svg>
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
                         alt="Logo Dra Frederica Passos"
                         class="h-16 md:h-20 lg:h-24 w-auto object-contain">
                </div>

                <!-- Menu Items -->
                <nav class="flex items-center justify-center flex-wrap gap-4 sm:gap-6 lg:gap-8">
                    <button class="font-neue-montreal text-sm lg:text-base relative px-2 py-1 transition-all duration-200 text-center text-white/80 hover:text-white">
                        Início
                    </button>
                    <button class="font-neue-montreal text-sm lg:text-base relative px-2 py-1 transition-all duration-200 text-center text-white/80 hover:text-white">
                        Sobre
                    </button>
                    <button class="font-neue-montreal text-sm lg:text-base relative px-2 py-1 transition-all duration-200 text-center text-white/80 hover:text-white">
                        Áreas de Atuação
                    </button>
                    <button class="font-neue-montreal text-sm lg:text-base relative px-2 py-1 transition-all duration-200 text-center text-white/80 hover:text-white">
                        Serviços
                    </button>
                    <button class="font-neue-montreal text-sm lg:text-base relative px-2 py-1 transition-all duration-200 text-center text-white/80 hover:text-white">
                        Contato
                    </button>
                </nav>

                <!-- Botão Agende Agora -->
                <div class="flex-shrink-0">
                    <button class="font-neue-montreal text-white px-6 md:px-8 py-3 md:py-4 rounded-lg text-sm md:text-base font-medium relative overflow-hidden bg-[#f56428] hover:bg-[#f56428]/80 transition-colors">
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
        document.querySelectorAll('[data-section]').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const sectionId = this.getAttribute('data-section');
                const element = document.getElementById(sectionId.toLowerCase().replace(' ', '-'));

                if (element) {
                    const offset = 80;
                    const elementPosition = element.getBoundingClientRect().top;
                    const offsetPosition = elementPosition + window.pageYOffset - offset;

                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });
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
        const scrollTopBtn = document.getElementById('scroll-to-top');

        if (scrollTopBtn) {
            window.addEventListener('scroll', function() {
                if (window.scrollY > 300) {
                    scrollTopBtn.classList.remove('opacity-0', 'invisible');
                    scrollTopBtn.classList.add('opacity-100', 'visible');
                    scrollTopBtn.style.transform = 'translateY(0)';
                } else {
                    scrollTopBtn.classList.add('opacity-0', 'invisible');
                    scrollTopBtn.classList.remove('opacity-100', 'visible');
                    scrollTopBtn.style.transform = 'translateY(1rem)';
                }
            });

            scrollTopBtn.addEventListener('click', function() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        }

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