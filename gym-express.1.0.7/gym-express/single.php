<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Gym Express
 */

get_header();
$noSidebar = esc_attr( get_theme_mod( 'gym_express_sidebar_hide_post' ) );
?>

<div class="row">

	<div class="content-wrap">

		<?php
			if( ! $noSidebar){
				echo '<div id="primary" class="content-area nine columns">';
			}else{
				echo '<div id="primary" class="content-area">';
			}
		 ?>
			<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content' );

				the_post_navigation(array(
	        'prev_text'	=> __( '&laquo; %title', 'gym-express' ),
	        'next_text' => __( '%title &raquo;', 'gym-express' ),
	        ));

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

			</main><!-- #main -->
		</div><!-- #primary -->

		<?php

			if( ! $noSidebar ){
				get_sidebar();
			}

		?>

	</div><!-- .content-wrap -->

</div> <!-- .row -->

<?php
get_footer();
