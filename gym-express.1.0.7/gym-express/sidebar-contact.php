<?php
/**
 * The widget area to be used for contact form and opening hours on homepage.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Gym Express
 */

if ( ! is_active_sidebar( 'gym_express_contact_single_widgets' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area row" role="complementary">
	<?php dynamic_sidebar( 'gym_express_contact_single_widgets' ); ?>
</aside><!-- #secondary -->
