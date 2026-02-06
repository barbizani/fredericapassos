<?php
/**
 * Template Name: Home Page
 * Description: Template for the home page - renders Elementor content
 */

get_header();

if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="entry-content">
				<?php
				if ( class_exists( '\Elementor\Plugin' ) ) {
					$page_id = get_the_ID();
					$elementor_instance = \Elementor\Plugin::$instance;
					
					if ( $elementor_instance->db->is_built_with_elementor( $page_id ) ) {
						$elementor_content = $elementor_instance->frontend->get_builder_content_for_display( $page_id );
						if ( ! empty( $elementor_content ) && strlen( $elementor_content ) > 100 ) {
							echo $elementor_content;
						} else {
							the_content();
						}
					} else {
						the_content();
					}
				} else {
					the_content();
				}
				?>
			</div>
		</article>
		<?php
	endwhile;
endif;

get_footer();
