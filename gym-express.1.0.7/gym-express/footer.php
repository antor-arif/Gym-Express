<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Gym Express
 */

?>

	</div><!-- #content -->


</div><!-- #page -->

<footer id="colophon" class="site-footer" role="contentinfo">
  <?php $container_class = get_theme_mod( 'gym_express_footer_container_class', true ) ? 'container' : 'fluid' ?>
  <div class="site-footer__content <?php echo esc_attr( $container_class ); ?>">
		<?php
			if ( function_exists( 'the_custom_logo' ) ) {
				echo '<div class="footer-logo">';
				the_custom_logo();
				echo '</div>';
			}
		?>
		<h2 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html(get_option('blogname')); ?></a></h2>
		<?php
			if ( has_nav_menu( 'social' ) ) {
				gym_express_get_social_menu();
			}
		?>
		<?php

			$show_pre_head 		= false;
			$contact_phone    = get_theme_mod('contact_section_phone');
			$contact_email    = get_theme_mod('contact_section_email');
			$contact_address  = get_theme_mod('contact_section_address');

			if( !empty($contact_address) || !empty( $contact_phone ) || !empty($contact_email) ){
				$show_pre_head = true;
			}

			if( $show_pre_head == true ){

				echo '<div class="contact-info">';

					if( !empty( $contact_address ) ){
							echo '<span class="ce-address"><i class="fa fa-map-marker" aria-hidden="true"></i> ' . esc_html( $contact_address ) . '</span>';
					}

					if( !empty( $contact_phone ) ){
							echo '<span class="ce-phone"><i class="fa fa-phone" aria-hidden="true"></i> ' . esc_html( $contact_phone ) . '</span>';
					}

					if( !empty( $contact_email ) ){
							echo '<span class="ce-email"><a href="mailto:' . esc_attr( $contact_email ) . '"><i class="fa fa-envelope" aria-hidden="true"></i> ' . esc_html( $contact_email ) . '</a></span>';
					}

				echo '</div>';

			}



		?>
		<?php
		get_sidebar('footer');
		?>

  </div>

</footer><!-- #colophon -->


<?php
	$my_theme = wp_get_theme();
	$authorURI = $my_theme->get( 'AuthorURI' );
	$themeURI = $my_theme->get( 'ThemeURI' );
 ?>

<a href="#top" class="back-to-top">&#8593;</a>
	<!-- Copyright bar -->
	<div class="site-info  <?php echo esc_attr( $container_class ); ?>">
		<div class="row">
			<div class="six columns">
				<p><?php printf( esc_html( '%1$s - Free Fitness WordPress Theme is developed by %2$s.', 'gym-express' ), '<a href="' . esc_url( $themeURI ) . '">Gym Express</a>', '<a href="' . esc_url( $authorURI ) . '" rel="designer">Template Express</a>' ); ?></p>
			</div>
			<div class="six columns text-right">
				<p><?php esc_html_e('Proudly powered by', 'gym-express');?> <a href="<?php echo esc_url( 'https://wordpress.org/' ); ?>"><?php esc_html_e('WordPress', 'gym-express'); ?></a>
			</div>
		</div>
	</div>


<?php wp_footer(); ?>

</body>
</html>
