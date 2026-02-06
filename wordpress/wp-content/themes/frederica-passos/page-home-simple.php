<?php
/**
 * Template Name: Home Page Simple
 * Description: Template for Elementor editing
 */

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php
        while (have_posts()) :
            the_post();
        ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="entry-content">
                    <?php
                    // CRÍTICO: Elementor precisa que the_content() seja chamado no loop
                    // Remover wpautop para não quebrar HTML estático
                    remove_filter('the_content', 'wpautop');
                    remove_filter('the_content', 'wptexturize');
                    
                    the_content();
                    
                    // Re-adicionar filtros
                    add_filter('the_content', 'wpautop');
                    add_filter('the_content', 'wptexturize');
                    ?>
                </div>
            </article>
        <?php
        endwhile;
        ?>
    </main>
</div>

<?php
get_footer();
?>
