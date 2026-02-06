<?php
/**
 * The template for displaying all pages
 *
 * @package Frederica_Passos
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
                    // Lógica simplificada: sempre tentar HTML estático primeiro
                    $html_content = get_post_field('post_content', get_the_ID());
                    $html_length = strlen($html_content);
                    
                    // Se tem HTML estático substancial (> 1000 chars), usar ele
                    if ($html_length > 1000) {
                        echo $html_content;
                    } else if (class_exists('Elementor\Plugin')) {
                        // Tentar Elementor se HTML estático não tiver conteúdo
                        $elementor_instance = Elementor\Plugin::$instance;
                        $elementor_content = $elementor_instance->frontend->get_builder_content_for_display(get_the_ID());
                        
                        if (!empty($elementor_content) && strlen($elementor_content) > 100) {
                            echo $elementor_content;
                        } else {
                            // Fallback: usar the_content()
                            remove_filter('the_content', 'wpautop');
                            remove_filter('the_content', 'wptexturize');
                            the_content();
                            add_filter('the_content', 'wpautop');
                            add_filter('the_content', 'wptexturize');
                        }
                    } else {
                        // Sem Elementor, usar the_content()
                        remove_filter('the_content', 'wpautop');
                        remove_filter('the_content', 'wptexturize');
                        the_content();
                        add_filter('the_content', 'wpautop');
                        add_filter('the_content', 'wptexturize');
                    }
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
