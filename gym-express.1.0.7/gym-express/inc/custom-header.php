<?php
/**
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Gym Express
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses gym_express_header_style()
 */
function gym_express_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'gym_express_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => 'ffffff',
		'width'                  => 2048,
		'height'                 => 900,
		'flex-height'            => true,
		'wp-head-callback'       => 'gym_express_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'gym_express_custom_header_setup' );



if ( ! function_exists( 'gym_express_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog.
 *
 * @see gym_express_custom_header_setup().
 */
function gym_express_header_style() {
	$header_text_color = get_header_textcolor();
	/*
	 * If no custom options for text are set, let's bail.
	 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: HEADER_TEXTCOLOR.
	 */
	if ( 'ffffff' === $header_text_color ) {
		return;
	}
	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that.
		else :
	?>
		.site-header .site-branding .site-title,
		.site-header .site-branding .site-title a,
		.site-header .site-branding .site-description {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif;
