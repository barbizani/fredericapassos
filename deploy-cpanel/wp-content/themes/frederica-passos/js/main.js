/**
 * Main JavaScript file for Frederica Passos theme
 */

(function($) {
    'use strict';

    // Document ready
    $(document).ready(function() {
        initHeroSlider();
        initTypewriter();
        initStatsCounter();
        initFAQAccordion();
        initContactForm();
        initSmoothScroll();
        initAnimations();
        initHeroCTA();
    });

    // Hero Slider
    function initHeroSlider() {
        let currentSlide = 0;
        const slides = $('.slide');
        const indicators = $('.slide-indicator');

        function showSlide(index) {
            slides.removeClass('active').css({
                'transform': 'translateX(100%)',
                'z-index': '0',
                'opacity': '0'
            });

            slides.eq(index).addClass('active').css({
                'transform': 'translateX(0)',
                'z-index': '1',
                'opacity': '1'
            });

            indicators.removeClass('active');
            indicators.eq(index).addClass('active');
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        }

        function prevSlide() {
            currentSlide = (currentSlide - 1 + slides.length) % slides.length;
            showSlide(currentSlide);
        }

        function goToSlide(index) {
            currentSlide = index;
            showSlide(currentSlide);
        }

        // Event listeners
        $('#next-slide').click(nextSlide);
        $('#prev-slide').click(prevSlide);

        indicators.each(function(index) {
            $(this).click(function() {
                goToSlide(index);
            });
        });

        // Auto slide
        setInterval(nextSlide, 5000);

        // Initialize first slide
        showSlide(0);
    }

    // Typewriter Effect
    function initTypewriter() {
        const typewriterElement = $('#typewriter-text');
        if (!typewriterElement.length) return;

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
                typewriterElement.text(currentPhrase.substring(0, currentCharIndex + 1));
                currentCharIndex++;

                if (currentCharIndex === currentPhrase.length) {
                    // Pause at end of phrase
                    isDeleting = true;
                    setTimeout(typeWriter, 3000);
                    return;
                }
            } else {
                // Deleting
                typewriterElement.text(currentPhrase.substring(0, currentCharIndex - 1));
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
    }

    // Statistics Counter Animation
    function initStatsCounter() {
        const statsSection = $('.py-16.bg-gradient-to-r.from-purple-50.to-pink-50');
        if (!statsSection.length) return;

        let hasAnimated = false;

        function animateCounters() {
            if (hasAnimated) return;

            $('.stat-item').each(function() {
                const $stat = $(this);
                const target = parseInt($stat.find('[data-target]').data('target'));
                const $counter = $stat.find('[data-target]');
                let current = 0;
                const duration = 2000;
                const steps = 60;
                const increment = target / steps;

                const timer = setInterval(function() {
                    current += increment;
                    if (current >= target) {
                        current = target;
                        clearInterval(timer);
                    }
                    $counter.text(Math.floor(current));
                }, duration / steps);
            });

            hasAnimated = true;
        }

        // Intersection Observer
        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    animateCounters();
                }
            });
        }, { threshold: 0.3 });

        observer.observe(statsSection[0]);
    }

    // FAQ Accordion
    function initFAQAccordion() {
        $('.faq-toggle').click(function() {
            const $faqItem = $(this).closest('.faq-item');
            const $content = $faqItem.find('.faq-content');
            const $icon = $(this).find('svg');

            // Close other FAQs
            $('.faq-content').not($content).slideUp(300);
            $('.faq-toggle').not(this).find('svg').removeClass('rotate-180');

            // Toggle current FAQ
            $content.slideToggle(300);
            $icon.toggleClass('rotate-180');
        });
    }

    // Contact Form
    function initContactForm() {
        const $form = $('#contact-form');
        if (!$form.length) return;

        $form.submit(function(e) {
            e.preventDefault();

            const $submitBtn = $('#submit-btn');
            const $submitText = $('.submit-text');
            const $loadingText = $('.loading-text');
            const $message = $('#form-message');

            // Show loading state
            $submitBtn.prop('disabled', true);
            $submitText.addClass('hidden');
            $loadingText.removeClass('hidden');

            // Get form data
            const formData = {
                action: 'contact_form',
                nome: $('#nome').val(),
                email: $('#email').val(),
                telefone: $('#telefone').val(),
                tipo_consulta: $('#tipo_consulta').val(),
                mensagem: $('#mensagem').val()
            };

            // Simulate form submission (you can implement actual AJAX here)
            setTimeout(function() {
                // Reset loading state
                $submitBtn.prop('disabled', false);
                $submitText.removeClass('hidden');
                $loadingText.addClass('hidden');

                // Show success message
                $message.removeClass('hidden').addClass('text-green-600').text('Mensagem enviada com sucesso! Entraremos em contato em breve.');
                $form[0].reset();
            }, 2000);
        });
    }

    // Smooth Scroll
    function initSmoothScroll() {
        $('a[href^="#"]').click(function(e) {
            const target = $(this).attr('href');
            if (target === '#') return;

            const $target = $(target);
            if ($target.length) {
                e.preventDefault();

                const offset = 80; // Header height
                const targetPosition = $target.offset().top - offset;

                $('html, body').animate({
                    scrollTop: targetPosition
                }, 1000, 'easeInOutCubic');
            }
        });
    }

    // Hero CTA Button Animation
    function initHeroCTA() {
        const heroButton = $('.hero-cta-button');
        const gradientOverlay = $('.hero-gradient-overlay');

        if (heroButton.length && gradientOverlay.length) {
            heroButton.hover(
                function() {
                    gradientOverlay.css('opacity', '1');
                    heroButton.css('transform', 'scale(1.05)');
                },
                function() {
                    gradientOverlay.css('opacity', '0');
                    heroButton.css('transform', 'scale(1)');
                }
            );
        }
    }

    // Animations
    function initAnimations() {
        // Fade in animation for sections
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    $(entry.target).addClass('fade-in');
                }
            });
        }, observerOptions);

        // Observe sections
        $('section[id]').each(function() {
            observer.observe(this);
        });

        // Hover effects for cards
        $('.area-card, .formacao-card, .recurso-card').hover(
            function() {
                $(this).addClass('transform scale-105 shadow-xl');
            },
            function() {
                $(this).removeClass('transform scale-105 shadow-xl');
            }
        );
    }

    // Parallax effect for hero
    $(window).scroll(function() {
        const scrolled = $(window).scrollTop();
        const rate = scrolled * -0.5;

        $('.parallax-bg').css({
            'transform': 'translateY(' + rate + 'px)'
        });
    });

})(jQuery);