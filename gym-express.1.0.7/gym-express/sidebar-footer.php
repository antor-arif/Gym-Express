<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Gym Express
 */

if ( ! is_active_sidebar( 'gym_express_footer_col1' ) && ! is_active_sidebar( 'gym_express_footer_col2' ) && ! is_active_sidebar( 'gym_express_footer_col3' ) ) {
	return;
}
?>

<aside id="secondary" class="footer-widgets widget-area row" role="complementary">
	<div class="four columns">
		<?php dynamic_sidebar( 'gym_express_footer_col1' ); ?>
	</div>
	<div class="four columns">
		<?php dynamic_sidebar( 'gym_express_footer_col2' ); ?>
	</div>
	<div class="four columns">
		<?php dynamic_sidebar( 'gym_express_footer_col3' ); ?>
	</div>
</aside><!-- #secondary -->
