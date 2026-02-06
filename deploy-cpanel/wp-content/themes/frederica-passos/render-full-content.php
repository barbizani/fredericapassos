<?php
/**
 * Renderizar conteúdo completo do React como HTML estático
 * Depois pode ser editado com Elementor
 */

require_once('/var/www/html/wp-load.php');

$uploads_url = content_url('/uploads/');
$template_url = get_template_directory_uri();

// Injetar todo o HTML/CSS/JS do React diretamente na página
$full_content = '
<!-- HERO CAROUSEL -->
<section class="hero-carousel" style="position: relative; width: 100%; height: 450px; overflow: hidden; background: #70309e;">
    <div id="hero-slides" style="position: relative; width: 100%; height: 100%;">
        <!-- Slide 1 - Roxo -->
        <div class="hero-slide active" data-slide="0" style="position: absolute; inset: 0; background: #70309e;">
            <img src="' . $uploads_url . 'banner01.jpg" alt="" style="width: 100%; height: 100%; object-fit: cover; transform: scale(1.1);" class="desktop-only" />
            <img src="' . $uploads_url . 'banner01mob.jpg" alt="" style="width: 100%; height: 100%; object-fit: cover; display: none;" class="mobile-only" />
        </div>
        <!-- Slide 2 - Cinza -->
        <div class="hero-slide" data-slide="1" style="position: absolute; inset: 0; background: #6b7280; transform: translateX(100%);">
            <img src="' . $uploads_url . 'banner02.jpg" alt="" style="width: 100%; height: 100%; object-fit: cover;" class="desktop-only" />
            <img src="' . $uploads_url . 'banner02mob.jpg" alt="" style="width: 100%; height: 100%; object-fit: cover; display: none;" class="mobile-only" />
        </div>
        <!-- Slide 3 - Laranja -->
        <div class="hero-slide" data-slide="2" style="position: absolute; inset: 0; background: #f56428; transform: translateX(100%);">
            <div style="position: absolute; inset: 0; background-image: url(' . $uploads_url . 'srosa.svg); background-size: clamp(35%, 50vw, 60%); background-position: 5% center; background-repeat: no-repeat;"></div>
            <div style="position: absolute; inset: 0; display: flex; align-items: center; justify-content: flex-end; padding: 0 10%;">
                <div style="text-align: left; max-width: 50%;">
                    <h1 style="font-family: \'JH Caudemars\', serif; font-size: 48px; font-weight: 500; color: #ffffff; margin-bottom: 24px; line-height: 1.1;">Prazer,<br />Frederica Passos</h1>
                    <p style="font-family: \'Neue Montreal\', sans-serif; font-size: 16px; color: #ffffff; margin-bottom: 32px; line-height: 1.4;">Psiquiatria Perinatal e Sexualidade Humana.<br />Consultas presenciais e online.</p>
                    <button style="font-family: \'Neue Montreal\', sans-serif; background-color: #70309e; color: white; padding: 16px 32px; border: none; border-radius: 8px; font-weight: 500; cursor: pointer; transition: all 0.3s;">Contrate</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Navigation Arrows -->
    <button class="hero-prev" style="position: absolute; left: 20px; top: 50%; transform: translateY(-50%); background: rgba(255,255,255,0.9); border: none; border-radius: 50%; width: 48px; height: 48px; cursor: pointer; z-index: 10;">‹</button>
    <button class="hero-next" style="position: absolute; right: 20px; top: 50%; transform: translateY(-50%); background: rgba(255,255,255,0.9); border: none; border-radius: 50%; width: 48px; height: 48px; cursor: pointer; z-index: 10;">›</button>
    
    <!-- Dots -->
    <div style="position: absolute; bottom: 20px; left: 50%; transform: translateX(-50%); display: flex; gap: 12px; z-index: 10;">
        <button class="hero-dot active" data-slide="0" style="width: 12px; height: 12px; border-radius: 50%; background: white; border: none; cursor: pointer;"></button>
        <button class="hero-dot" data-slide="1" style="width: 12px; height: 12px; border-radius: 50%; background: rgba(255,255,255,0.5); border: none; cursor: pointer;"></button>
        <button class="hero-dot" data-slide="2" style="width: 12px; height: 12px; border-radius: 50%; background: rgba(255,255,255,0.5); border: none; cursor: pointer;"></button>
    </div>
</section>

<!-- SCROLLING TEXT -->
<section style="background: #161616; padding: 16px 0; overflow: hidden; white-space: nowrap;">
    <div style="display: flex; animation: scroll 120s linear infinite;">
        <div style="font-family: \'JH Caudemars\', serif; font-size: 24px; color: white; font-weight: 500; display: inline-block; white-space: nowrap; padding-right: 40px;">' . str_repeat('Psiquiatria Contemporânea para Mentes que não cabem em Rótulos. ', 20) . '</div>
    </div>
</section>

<style>
@keyframes scroll {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}

@media (max-width: 640px) {
    .desktop-only { display: none !important; }
    .mobile-only { display: block !important; }
}

@media (min-width: 641px) {
    .desktop-only { display: block !important; }
    .mobile-only { display: none !important; }
}
</style>

<script>
// Hero Carousel
let currentSlide = 0;
const slides = document.querySelectorAll(\'.hero-slide\');
const dots = document.querySelectorAll(\'.hero-dot\');

function showSlide(index) {
    slides.forEach((slide, i) => {
        if (i === index) {
            slide.style.transform = \'translateX(0)\';
            slide.style.zIndex = \'1\';
            slide.classList.add(\'active\');
        } else if (i < index) {
            slide.style.transform = \'translateX(-100%)\';
            slide.style.zIndex = \'0\';
            slide.classList.remove(\'active\');
        } else {
            slide.style.transform = \'translateX(100%)\';
            slide.style.zIndex = \'0\';
            slide.classList.remove(\'active\');
        }
    });
    
    dots.forEach((dot, i) => {
        if (i === index) {
            dot.style.background = \'white\';
            dot.classList.add(\'active\');
        } else {
            dot.style.background = \'rgba(255,255,255,0.5)\';
            dot.classList.remove(\'active\');
        }
    });
}

document.querySelector(\'.hero-next\')?.addEventListener(\'click\', () => {
    currentSlide = (currentSlide + 1) % slides.length;
    showSlide(currentSlide);
});

document.querySelector(\'.hero-prev\')?.addEventListener(\'click\', () => {
    currentSlide = (currentSlide - 1 + slides.length) % slides.length;
    showSlide(currentSlide);
});

dots.forEach((dot, i) => {
    dot.addEventListener(\'click\', () => {
        currentSlide = i;
        showSlide(currentSlide);
    });
});

// Auto-play
setInterval(() => {
    currentSlide = (currentSlide + 1) % slides.length;
    showSlide(currentSlide);
}, 5000);
</script>
';

// Salvar como conteúdo da página temporariamente
$page_id = 11;
wp_update_post([
    'ID' => $page_id,
    'post_content' => $full_content
]);

// Desmarcar como Elementor temporariamente
update_post_meta($page_id, '_elementor_edit_mode', '');

echo "✅ Conteúdo HTML completo renderizado na página!\n";
echo "🌐 Ver: http://localhost:8000/\n";
echo "📝 Depois você pode editar com Elementor\n";
