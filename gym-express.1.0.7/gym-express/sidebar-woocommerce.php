<?php
/**
 * The Woocomerce Sidebar containing the main widget areas.
 *
 * @package gym-express
 * @since gym-express 0.7
 */

 $isWoocommerce = false;
 if( ! is_checkout() || ! is_cart() ){
 		$isWoocommerce = true;
 }

?>
<aside id="secondary" class="sidebar widget-area three columns" role="complementary">
		<?php do_action( 'before_sidebar' ); ?>
		<?php if ( ! dynamic_sidebar( 'woocommerce_sidebar' ) ) : ?>

			<aside id="search" class="widget widget_search">
				<?php get_search_form(); ?>
			</aside>

			<aside id="archives" class="widget">
				<h2 class="widget-title"><?php _e( 'Archives', 'gym-express' ); ?></h2>
				<ul>
					<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
				</ul>
			</aside>

			<aside id="meta" class="widget">
				<h2 class="widget-title"><?php _e( 'Meta', 'gym-express' ); ?></h2>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</aside>

		<?php endif; // end sidebar widget area ?>
</aside><!-- #secondary .widget-area -->
