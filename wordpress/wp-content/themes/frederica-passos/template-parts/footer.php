<?php
/**
 * Footer template part
 */
?>

<footer class="bg-gray-900 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
            <!-- Sobre -->
            <div>
                <h3 class="text-2xl font-chreed text-white mb-6">Frederica Passos</h3>
                <p class="text-gray-300 mb-6 leading-relaxed">
                    Especialista em Psiquiatria Perinatal e Sexualidade Humana.
                    Oferecendo cuidados especializados para mulheres em todas as fases da vida.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="social-link bg-orange-500 hover:bg-orange-600 p-3 rounded-lg transition-colors duration-300" aria-label="LinkedIn">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/LINKEDIN.svg"
                             alt="LinkedIn"
                             class="w-6 h-6">
                    </a>
                    <a href="#" class="social-link bg-pink-500 hover:bg-pink-600 p-3 rounded-lg transition-colors duration-300" aria-label="Instagram">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/INSTAGRAM.svg"
                             alt="Instagram"
                             class="w-6 h-6">
                    </a>
                </div>
            </div>

            <!-- Links Rápidos -->
            <div>
                <h4 class="text-lg font-semibold text-white mb-6">Links Rápidos</h4>
                <ul class="space-y-3">
                    <li><a href="#sobre" class="nav-link-footer text-gray-300 hover:text-orange-400 transition-colors duration-300">Sobre</a></li>
                    <li><a href="#areas" class="nav-link-footer text-gray-300 hover:text-orange-400 transition-colors duration-300">Áreas de Atuação</a></li>
                    <li><a href="#servicos" class="nav-link-footer text-gray-300 hover:text-orange-400 transition-colors duration-300">Formações</a></li>
                    <li><a href="#contato" class="nav-link-footer text-gray-300 hover:text-orange-400 transition-colors duration-300">Contato</a></li>
                </ul>
            </div>

            <!-- Serviços -->
            <div>
                <h4 class="text-lg font-semibold text-white mb-6">Serviços</h4>
                <ul class="space-y-3">
                    <li><a href="#contato" class="text-gray-300 hover:text-orange-400 transition-colors duration-300">Consulta Individual</a></li>
                    <li><a href="#contato" class="text-gray-300 hover:text-orange-400 transition-colors duration-300">Formações Profissionais</a></li>
                    <li><a href="#contato" class="text-gray-300 hover:text-orange-400 transition-colors duration-300">Palestras e Workshops</a></li>
                    <li><a href="#contato" class="text-gray-300 hover:text-orange-400 transition-colors duration-300">Consultoria Empresarial</a></li>
                </ul>
            </div>

            <!-- Contato -->
            <div>
                <h4 class="text-lg font-semibold text-white mb-6">Contato</h4>
                <div class="space-y-4">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-orange-400 mt-1 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <div>
                            <p class="text-gray-300">contato@fredericapassos.pt</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-orange-400 mt-1 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <div>
                            <p class="text-gray-300">+351 912 345 678</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-orange-400 mt-1 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <div>
                            <p class="text-gray-300">Lisboa, Portugal</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Newsletter -->
        <div class="border-t border-gray-700 pt-8 mb-8">
            <div class="max-w-md mx-auto text-center">
                <h4 class="text-lg font-semibold text-white mb-4">Receba nossas novidades</h4>
                <p class="text-gray-300 mb-6">Inscreva-se para receber conteúdos exclusivos sobre saúde mental perinatal.</p>
                <form class="flex flex-col sm:flex-row gap-3">
                    <input type="email"
                           placeholder="Seu email"
                           class="flex-1 px-4 py-3 bg-gray-800 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                    <button type="submit" class="btn-primary px-6 py-3 whitespace-nowrap">
                        Inscrever-se
                    </button>
                </form>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="border-t border-gray-700 pt-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm mb-4 md:mb-0">
                    © <?php echo date('Y'); ?> Frederica Passos. Todos os direitos reservados.
                </p>
                <div class="flex space-x-6 text-sm">
                    <a href="#" class="text-gray-400 hover:text-orange-400 transition-colors duration-300">Política de Privacidade</a>
                    <a href="#" class="text-gray-400 hover:text-orange-400 transition-colors duration-300">Termos de Uso</a>
                    <a href="#" class="text-gray-400 hover:text-orange-400 transition-colors duration-300">Cookies</a>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Scroll to Top Button (backup if not in header) -->
<button id="scroll-to-top-footer" class="fixed bottom-4 right-4 sm:bottom-8 sm:right-8 bg-[#f56428] text-white rounded-full p-3 sm:p-4 shadow-lg z-50 hover:bg-[#70309e] transition-all duration-300 opacity-0 invisible transform translate-y-4 scale-0" aria-label="Voltar ao topo" style="z-index: 9999; display: none;">
    <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
    </svg>
</button>

<!-- Mouse Follow Effect -->
<div id="cursor-follow" class="fixed pointer-events-none z-50 transition-transform duration-100 ease-out">
    <div class="w-8 h-8 bg-orange-500 rounded-full opacity-20"></div>
</div>

<script>
// Mouse follow effect for footer
document.addEventListener('DOMContentLoaded', function() {
    const footer = document.querySelector('footer');
    const cursorFollow = document.getElementById('cursor-follow');

    if (footer && cursorFollow) {
        footer.addEventListener('mousemove', function(e) {
            const rect = footer.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;

            cursorFollow.style.left = x + 'px';
            cursorFollow.style.top = y + 'px';
            cursorFollow.style.opacity = '0.3';
        });

        footer.addEventListener('mouseleave', function() {
            cursorFollow.style.opacity = '0';
        });
    }

    const scrollToTopBtn = document.getElementById('scroll-to-top') || document.getElementById('scroll-to-top-footer');
    
    if (scrollToTopBtn && !document.getElementById('scroll-to-top')) {
        scrollToTopBtn.style.display = 'block';
    }

    if (scrollToTopBtn) {
        window.addEventListener('scroll', function() {
            const currentScrollY = window.scrollY;
            
            if (currentScrollY > 300) {
                scrollToTopBtn.classList.remove('opacity-0', 'invisible', 'scale-0');
                scrollToTopBtn.classList.add('opacity-100', 'visible', 'scale-100');
                scrollToTopBtn.style.transform = 'translateY(0) scale(1)';
            } else {
                scrollToTopBtn.classList.add('opacity-0', 'invisible', 'scale-0');
                scrollToTopBtn.classList.remove('opacity-100', 'visible', 'scale-100');
                scrollToTopBtn.style.transform = 'translateY(1rem) scale(0)';
            }
        });

        scrollToTopBtn.addEventListener('mouseenter', function() {
            if (window.scrollY > 300) {
                this.style.transform = 'translateY(0) scale(1.1)';
            }
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
            if (window.scrollY > 300) {
                this.style.transform = 'translateY(0) scale(1.1)';
            }
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