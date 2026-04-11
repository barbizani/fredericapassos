<?php
/**
 * Main content template part
 */
?>

<main class="w-full relative">
    <!-- Hero Section - Carrossel -->
    <section id="hero-section" class="relative w-full h-screen overflow-hidden">
        <div class="relative w-full h-full">
            <!-- Slide 1: Roxo -->
            <div id="slide-1" class="slide absolute inset-0 bg-purple-600">
                <div class="absolute inset-0 w-full h-full overflow-hidden">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/banner01.jpg"
                         alt="Banner Frederica Passos"
                         class="w-full h-full object-cover hidden sm:block">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/banner01mob.jpg"
                         alt="Banner Frederica Passos Mobile"
                         class="w-full h-full object-cover block sm:hidden">
                </div>
            </div>

            <!-- Slide 2: Laranja -->
            <div id="slide-2" class="slide absolute inset-0 bg-orange-500">
                <div class="absolute inset-0 w-full h-full overflow-hidden">
                    <div class="absolute inset-0 bg-no-repeat bg-contain opacity-20 parallax-bg"
                         style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/srosa.svg');"></div>

                    <div class="absolute left-0 top-0 bottom-0 w-full flex items-center z-10">
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full flex items-center justify-center sm:justify-end pr-4 sm:pr-8 md:pr-16 lg:pr-24">
                            <div class="flex flex-col gap-3 sm:gap-4 md:gap-6 text-white text-center sm:text-left">
                                <h1 class="font-jh-caudemars text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl 2xl:text-8xl leading-tight">
                                    Prazer,<br />
                                    Frederica Passos
                                </h1>

                                <p class="font-neue-montreal text-sm sm:text-base md:text-lg lg:text-xl text-white/90 max-w-lg">
                                    Psiquiatria Perinatal e Sexualidade Humana.<br />
                                    Consultas presenciais e online.
                                </p>

                                <button class="hero-cta-button font-neue-montreal text-white px-6 sm:px-8 py-3 sm:py-4 rounded-lg text-sm sm:text-base md:text-lg font-medium relative overflow-hidden w-fit self-center sm:self-start"
                                        style="background-color: #70309e; border-radius: 8px;">
                                    <!-- Gradiente animado no hover -->
                                    <div class="hero-gradient-overlay absolute inset-0 rounded-lg opacity-0 transition-opacity duration-400"
                                         style="background: linear-gradient(135deg, #70309e 0%, #f56428 100%);"></div>
                                    <span class="relative z-10">Contrate</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 3: Cinza -->
            <div id="slide-3" class="slide absolute inset-0 bg-gray-500">
                <div class="absolute inset-0 w-full h-full overflow-hidden">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/banner02.jpg"
                         alt="Banner Serviços"
                         class="w-full h-full object-cover hidden sm:block">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/banner02mob.jpg"
                         alt="Banner Serviços Mobile"
                         class="w-full h-full object-cover block sm:hidden">
                </div>
            </div>
        </div>

        <!-- Navigation Arrows -->
        <button id="prev-slide" class="slide-nav-btn absolute left-2 sm:left-4 top-1/2 -translate-y-1/2 z-20 bg-white/20 hover:bg-white/30 backdrop-blur-sm rounded-full p-2 sm:p-3 transition-all duration-200" aria-label="Slide anterior">
            <svg class="w-4 h-4 sm:w-6 sm:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>

        <button id="next-slide" class="slide-nav-btn absolute right-2 sm:right-4 top-1/2 -translate-y-1/2 z-20 bg-white/20 hover:bg-white/30 backdrop-blur-sm rounded-full p-2 sm:p-3 transition-all duration-200" aria-label="Próximo slide">
            <svg class="w-4 h-4 sm:w-6 sm:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </button>

        <!-- Slide Indicators -->
        <div class="absolute bottom-4 left-1/2 -translate-x-1/2 z-20 flex space-x-2">
            <button class="slide-indicator w-3 h-3 rounded-full bg-white/50 hover:bg-white/80 transition-colors duration-200 active" data-slide="0"></button>
            <button class="slide-indicator w-3 h-3 rounded-full bg-white/50 hover:bg-white/80 transition-colors duration-200" data-slide="1"></button>
            <button class="slide-indicator w-3 h-3 rounded-full bg-white/50 hover:bg-white/80 transition-colors duration-200" data-slide="2"></button>
        </div>
    </section>

    <!-- Typewriter Section -->
    <section class="relative py-16 bg-gradient-to-br from-purple-600 to-orange-500 overflow-hidden">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="relative max-w-4xl mx-auto px-4 text-center">
            <div id="typewriter-text" class="text-white text-2xl md:text-4xl font-chreed font-bold min-h-[4rem] flex items-center justify-center">
                Diagnóstico: Ser Humano.
            </div>
        </div>
    </section>

    <!-- Sobre Section -->
    <section id="sobre" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="order-2 lg:order-1">
                    <h2 class="text-4xl md:text-5xl font-chreed text-gray-800 mb-6">
                        Sobre Frederica Passos
                    </h2>
                    <p class="text-lg text-gray-600 mb-6 leading-relaxed">
                        Especialista em Psiquiatria Perinatal e Sexualidade Humana, com vasta experiência
                        em acompanhar mulheres e famílias durante as diversas fases da vida.
                    </p>
                    <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                        Meu compromisso é oferecer um espaço seguro e acolhedor para que você possa
                        explorar suas emoções, compreender seus desafios e desenvolver estratégias
                        personalizadas para o seu bem-estar.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="#contato" class="btn-primary text-center px-8 py-4">
                            Agende sua Consulta
                        </a>
                        <a href="#sobre" class="btn-outline text-center px-8 py-4">
                            Saiba Mais
                        </a>
                    </div>
                </div>
                <div class="order-1 lg:order-2">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/fotofrederica.webp"
                         alt="Dra Frederica Passos"
                         class="w-full h-auto rounded-lg shadow-2xl">
                </div>
            </div>
        </div>
    </section>

    <!-- Estatísticas Section -->
    <section class="py-16 bg-gradient-to-r from-purple-50 to-pink-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div class="stat-item">
                    <div class="text-4xl md:text-5xl font-bold text-purple-600 mb-2" data-target="500">0</div>
                    <p class="text-gray-600 font-medium">Mulheres Acompanhadas</p>
                </div>
                <div class="stat-item">
                    <div class="text-4xl md:text-5xl font-bold text-orange-500 mb-2" data-target="85">0</div>
                    <p class="text-gray-600 font-medium">Taxa de Melhoria</p>
                </div>
                <div class="stat-item">
                    <div class="text-4xl md:text-5xl font-bold text-purple-600 mb-2" data-target="50">0</div>
                    <p class="text-gray-600 font-medium">Profissionais Formados</p>
                </div>
                <div class="stat-item">
                    <div class="text-4xl md:text-5xl font-bold text-orange-500 mb-2" data-target="90">0</div>
                    <p class="text-gray-600 font-medium">Satisfação dos Clientes</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Áreas de Atuação -->
    <section id="areas" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-chreed text-gray-800 mb-6">
                    Áreas de Especialização
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Ofereço atendimento especializado para diversas fases da vida da mulher
                    e situações específicas que impactam a saúde mental.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="area-card bg-gradient-to-br from-purple-50 to-purple-100 p-8 rounded-xl text-center hover:shadow-xl transition-all duration-300">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/vertical/mulher.webp"
                         alt="Saúde Mental da Mulher"
                         class="w-full h-48 object-cover rounded-lg mb-6">
                    <h3 class="text-xl font-bold text-purple-800 mb-4">Saúde Mental da Mulher</h3>
                    <p class="text-gray-600">Acompanhamento completo da saúde mental feminina em todas as fases da vida.</p>
                </div>

                <div class="area-card bg-gradient-to-br from-pink-50 to-pink-100 p-8 rounded-xl text-center hover:shadow-xl transition-all duration-300">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/vertical/parental.webp"
                         alt="Saúde Parental"
                         class="w-full h-48 object-cover rounded-lg mb-6">
                    <h3 class="text-xl font-bold text-pink-800 mb-4">Saúde Parental</h3>
                    <p class="text-gray-600">Suporte para pais e mães durante a jornada da parentalidade.</p>
                </div>

                <div class="area-card bg-gradient-to-br from-orange-50 to-orange-100 p-8 rounded-xl text-center hover:shadow-xl transition-all duration-300">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/vertical/perinatal.webp"
                         alt="Saúde Perinatal"
                         class="w-full h-48 object-cover rounded-lg mb-6">
                    <h3 class="text-xl font-bold text-orange-800 mb-4">Saúde Perinatal</h3>
                    <p class="text-gray-600">Cuidado especializado durante a gravidez, parto e pós-parto.</p>
                </div>

                <div class="area-card bg-gradient-to-br from-purple-50 to-purple-100 p-8 rounded-xl text-center hover:shadow-xl transition-all duration-300">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/vertical/sexhuman.webp"
                         alt="Sexualidade Humana"
                         class="w-full h-48 object-cover rounded-lg mb-6">
                    <h3 class="text-xl font-bold text-purple-800 mb-4">Sexualidade Humana</h3>
                    <p class="text-gray-600">Abordagem integral da sexualidade e saúde sexual.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Serviços/Formações -->
    <section id="servicos" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-chreed text-gray-800 mb-6">
                    Formações e Cursos Profissionais
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Capacitação especializada para profissionais da saúde mental e perinatal.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="formacao-card bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/formacoes/emp.webp"
                         alt="Empoderamento Feminino"
                         class="w-full h-48 object-cover rounded-lg mb-6">
                    <h3 class="text-2xl font-bold text-purple-800 mb-4">Empoderamento Feminino</h3>
                    <p class="text-gray-600 mb-6">Curso completo sobre saúde mental feminina e empoderamento pessoal.</p>
                    <button class="btn-secondary w-full text-center">Saiba Mais</button>
                </div>

                <div class="formacao-card bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/formacoes/medenf.webp"
                         alt="Medicina Perinatal"
                         class="w-full h-48 object-cover rounded-lg mb-6">
                    <h3 class="text-2xl font-bold text-orange-800 mb-4">Medicina Perinatal</h3>
                    <p class="text-gray-600 mb-6">Formação especializada em saúde mental perinatal para profissionais.</p>
                    <button class="btn-secondary w-full text-center">Saiba Mais</button>
                </div>

                <div class="formacao-card bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/formacoes/profperi.webp"
                         alt="Profissional Perinatal"
                         class="w-full h-48 object-cover rounded-lg mb-6">
                    <h3 class="text-2xl font-bold text-purple-800 mb-4">Profissional Perinatal</h3>
                    <p class="text-gray-600 mb-6">Capacitação completa para atuação em saúde perinatal.</p>
                    <button class="btn-secondary w-full text-center">Saiba Mais</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Recursos Educativos -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-chreed text-gray-800 mb-6">
                    Recursos Educativos
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Conteúdo gratuito para orientação e informação sobre saúde mental perinatal.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="recurso-card bg-gradient-to-br from-purple-50 to-purple-100 p-8 rounded-xl text-center hover:shadow-xl transition-all duration-300">
                    <div class="bg-purple-600 text-white w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 20 20 20">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-purple-800 mb-4">E-books</h3>
                    <p class="text-gray-600 mb-6">Guias completos sobre saúde mental perinatal e sexualidade.</p>
                    <button class="btn-primary">Baixar E-books</button>
                </div>

                <div class="recurso-card bg-gradient-to-br from-orange-50 to-orange-100 p-8 rounded-xl text-center hover:shadow-xl transition-all duration-300">
                    <div class="bg-orange-600 text-white w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-orange-800 mb-4">Vídeos</h3>
                    <p class="text-gray-600 mb-6">Conteúdo em vídeo sobre temas relevantes da saúde mental.</p>
                    <button class="btn-primary">Assistir Vídeos</button>
                </div>

                <div class="recurso-card bg-gradient-to-br from-pink-50 to-pink-100 p-8 rounded-xl text-center hover:shadow-xl transition-all duration-300">
                    <div class="bg-pink-600 text-white w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-pink-800 mb-4">Artigos</h3>
                    <p class="text-gray-600 mb-6">Artigos científicos e informativos sobre saúde mental.</p>
                    <button class="btn-primary">Ler Artigos</button>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-chreed text-gray-800 mb-6">
                    Perguntas Frequentes
                </h2>
                <p class="text-xl text-gray-600">
                    Esclareça suas dúvidas sobre consultas e serviços.
                </p>
            </div>

            <div class="space-y-4">
                <div class="faq-item bg-white rounded-lg shadow-md">
                    <button class="faq-toggle w-full text-left p-6 focus:outline-none">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-gray-800">Como agendar uma consulta?</h3>
                            <svg class="w-6 h-6 text-gray-500 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </button>
                    <div class="faq-content overflow-hidden max-h-0 transition-all duration-300">
                        <div class="p-6 pt-0">
                            <p class="text-gray-600">Você pode agendar sua consulta através do botão "Agende sua Consulta" no topo do site, ou entrando em contato diretamente pelos nossos canais de comunicação.</p>
                        </div>
                    </div>
                </div>

                <div class="faq-item bg-white rounded-lg shadow-md">
                    <button class="faq-toggle w-full text-left p-6 focus:outline-none">
                        <div class="faq-header flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-gray-800">As consultas são presenciais ou online?</h3>
                            <svg class="w-6 h-6 text-gray-500 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </button>
                    <div class="faq-content overflow-hidden max-h-0 transition-all duration-300">
                        <div class="p-6 pt-0">
                            <p class="text-gray-600">Oferecemos ambas as opções: consultas presenciais no nosso consultório e consultas online através de plataforma segura e confidencial.</p>
                        </div>
                    </div>
                </div>

                <div class="faq-item bg-white rounded-lg shadow-md">
                    <button class="faq-toggle w-full text-left p-6 focus:outline-none">
                        <div class="faq-header flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-gray-800">Quanto tempo dura uma sessão?</h3>
                            <svg class="w-6 h-6 text-gray-500 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </button>
                    <div class="faq-content overflow-hidden max-h-0 transition-all duration-300">
                        <div class="p-6 pt-0">
                            <p class="text-gray-600">As sessões têm duração de 50 minutos, tempo suficiente para um atendimento completo e efetivo.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contato Section -->
    <section id="contato" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <div>
                    <h2 class="text-4xl md:text-5xl font-chreed text-gray-800 mb-6">
                        Entre em Contato
                    </h2>
                    <p class="text-lg text-gray-600 mb-8">
                        Estou aqui para ajudar você. Entre em contato para agendar sua consulta
                        ou tirar suas dúvidas sobre nossos serviços.
                    </p>

                    <div class="space-y-6">
                        <div class="flex items-center">
                            <div class="bg-purple-100 p-3 rounded-full mr-4">
                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800">Email</h3>
                                <p class="text-gray-600">contato@fredericapassos.pt</p>
                            </div>
                        </div>

                        <div class="flex items-center">
                            <div class="bg-orange-100 p-3 rounded-full mr-4">
                                <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800">Telefone</h3>
                                <p class="text-gray-600">+351 912 345 678</p>
                            </div>
                        </div>

                        <div class="flex items-center">
                            <div class="bg-pink-100 p-3 rounded-full mr-4">
                                <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800">Localização</h3>
                                <p class="text-gray-600">Lisboa, Portugal</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <form class="bg-gray-50 p-8 rounded-xl">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="nome" class="block text-sm font-medium text-gray-700 mb-2">Nome *</label>
                                <input type="text" id="nome" name="nome" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                                <input type="email" id="email" name="email" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                            </div>
                        </div>

                        <div class="mb-6">
                            <label for="telefone" class="block text-sm font-medium text-gray-700 mb-2">Telefone</label>
                            <input type="tel" id="telefone" name="telefone"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                        </div>

                        <div class="mb-6">
                            <label for="tipo_consulta" class="block text-sm font-medium text-gray-700 mb-2">Tipo de Consulta</label>
                            <select id="tipo_consulta" name="tipo_consulta"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                                <option value="">Selecione uma opção</option>
                                <option value="Consulta Inicial">Consulta Inicial</option>
                                <option value="Acompanhamento">Acompanhamento</option>
                                <option value="Emergência">Emergência</option>
                                <option value="Outros">Outros</option>
                            </select>
                        </div>

                        <div class="mb-6">
                            <label for="mensagem" class="block text-sm font-medium text-gray-700 mb-2">Mensagem *</label>
                            <textarea id="mensagem" name="mensagem" rows="4" required
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                      placeholder="Descreva como posso ajudar você..."></textarea>
                        </div>

                        <button type="submit" class="w-full btn-primary py-4 text-lg font-semibold">
                            <span class="submit-text">Enviar Mensagem</span>
                            <span class="loading-text hidden">Enviando...</span>
                        </button>

                        <div id="form-message" class="mt-4 text-center hidden"></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
// Hero Slider
document.addEventListener('DOMContentLoaded', function() {
    let currentSlide = 0;
    const slides = document.querySelectorAll('.slide');
    const indicators = document.querySelectorAll('.slide-indicator');

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.style.transform = i === index ? 'translateX(0)' : (i < index ? 'translateX(-100%)' : 'translateX(100%)');
            slide.style.zIndex = i === index ? '1' : '0';
            slide.style.opacity = i === index ? '1' : '0';
        });

        indicators.forEach((indicator, i) => {
            indicator.classList.toggle('active', i === index);
        });
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }

    function prevSlide() {
        currentSlide = (currentSlide - 1 + slides.length) % slides.length;
        showSlide(currentSlide);
    }

    // Auto slide every 5 seconds
    setInterval(nextSlide, 5000);

    // Event listeners
    document.getElementById('next-slide')?.addEventListener('click', nextSlide);
    document.getElementById('prev-slide')?.addEventListener('click', prevSlide);

    indicators.forEach((indicator, index) => {
        indicator.addEventListener('click', () => {
            currentSlide = index;
            showSlide(currentSlide);
        });
    });

    // Initialize first slide
    showSlide(0);
});

// Typewriter Effect
document.addEventListener('DOMContentLoaded', function() {
    const typewriterElement = document.getElementById('typewriter-text');
    if (!typewriterElement) return;

    const phrases = [
        'Diagnóstico: Ser Humano.',
        'Tá Tudo Bem não Estar Bem.',
        'Cuidar da Mente é Revolucionário.'
    ];

    let currentPhraseIndex = 0;
    let currentCharIndex = 0;
    let isDeleting = false;
    let typingSpeed = 100;

    function typeWriter() {
        const currentPhrase = phrases[currentPhraseIndex];

        if (!isDeleting) {
            // Typing
            typewriterElement.textContent = currentPhrase.substring(0, currentCharIndex + 1);
            currentCharIndex++;

            if (currentCharIndex === currentPhrase.length) {
                // Pause at end of phrase
                isDeleting = true;
                setTimeout(typeWriter, 3000);
                return;
            }
        } else {
            // Deleting
            typewriterElement.textContent = currentPhrase.substring(0, currentCharIndex - 1);
            currentCharIndex--;

            if (currentCharIndex === 0) {
                // Move to next phrase
                isDeleting = false;
                currentPhraseIndex = (currentPhraseIndex + 1) % phrases.length;
            }
        }

        setTimeout(typeWriter, isDeleting ? 50 : typingSpeed);
    }

    // Start typewriter
    setTimeout(typeWriter, 1000);
});

// Statistics Counter Animation
document.addEventListener('DOMContentLoaded', function() {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                const statItems = entry.target.querySelectorAll('.stat-item [data-target]');
                statItems.forEach(stat => {
                    const target = parseInt(stat.getAttribute('data-target'));
                    let current = 0;
                    const increment = target / 60;
                    const timer = setInterval(() => {
                        current += increment;
                        if (current >= target) {
                            current = target;
                            clearInterval(timer);
                        }
                        stat.textContent = Math.floor(current);
                    }, 50);
                });
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.3 });

    const statsSection = document.querySelector('.py-16.bg-gradient-to-r.from-purple-50.to-pink-50');
    if (statsSection) {
        observer.observe(statsSection);
    }
});

// FAQ Accordion
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.faq-toggle').forEach(button => {
        button.addEventListener('click', function() {
            const content = this.nextElementSibling;
            const icon = this.querySelector('svg');

            // Close other FAQs
            document.querySelectorAll('.faq-content').forEach(otherContent => {
                if (otherContent !== content) {
                    otherContent.style.maxHeight = '0';
                    otherContent.previousElementSibling.querySelector('svg').style.transform = 'rotate(0deg)';
                }
            });

            // Toggle current FAQ
            if (content.style.maxHeight === '0px' || !content.style.maxHeight) {
                content.style.maxHeight = content.scrollHeight + 'px';
                icon.style.transform = 'rotate(180deg)';
            } else {
                content.style.maxHeight = '0';
                icon.style.transform = 'rotate(0deg)';
            }
        });
    });
});

// Hero CTA Button Animation
document.addEventListener('DOMContentLoaded', function() {
    const heroButton = document.querySelector('.hero-cta-button');
    const gradientOverlay = document.querySelector('.hero-gradient-overlay');

    if (heroButton && gradientOverlay) {
        heroButton.addEventListener('mouseenter', function() {
            gradientOverlay.style.opacity = '1';
            heroButton.style.transform = 'scale(1.05)';
        });

        heroButton.addEventListener('mouseleave', function() {
            gradientOverlay.style.opacity = '0';
            heroButton.style.transform = 'scale(1)';
        });
    }
});

// Card Hover Effects
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.area-card, .formacao-card, .recurso-card').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-10px)';
            this.style.boxShadow = '0 20px 40px rgba(0, 0, 0, 0.1)';
        });

        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = '';
        });
    });
});

// Parallax effect for hero
document.addEventListener('scroll', function() {
    const scrolled = window.pageYOffset;
    const rate = scrolled * -0.5;

    const parallaxBg = document.querySelector('.parallax-bg');
    if (parallaxBg) {
        parallaxBg.style.transform = `translateY(${rate}px)`;
    }
});
</script>