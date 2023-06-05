<?php
/**
 * Gym Express Theme Enqueue scripts and styles.
 *
 * @package Gym Express
 */

/**
 * Enqueue scripts and styles.
 */
function gym_express_scripts() {

	// Styles
	wp_enqueue_style('gym-express-styles', get_stylesheet_uri() );

	// Google fonts
	wp_enqueue_style( 'gym-express-default-google-fonts', '//fonts.googleapis.com/css?family=Roboto|Montserrat:400,800');

	// Icon font
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.7.0');

	// Parallax
	wp_enqueue_script( 'jquery-parallax', get_template_directory_uri() . '/js/parallax.min.js', array('jquery'), '1.4.2', true);

	// Match Heights Library
	wp_enqueue_script( 'jquery-match-height', get_template_directory_uri() . '/js/jquery-match-height.min.js', array('jquery'), '0.7.2', true);


	// Swiper Slider library
	wp_enqueue_script( 'jquery-lightslider', get_template_directory_uri() . '/js/lightslider.min.js', array('jquery'), '1.1.3', true);
	wp_enqueue_style('lightslider-styles', get_template_directory_uri() . '/css/lightslider.min.css', array(), '1.1.3');

	// Masonry
	wp_enqueue_script( 'masonry');

	// Scripts
	wp_enqueue_script( 'gym-express-scripts', get_template_directory_uri() . '/js/theme.min.js', array('jquery', 'masonry', 'jquery-parallax', 'jquery-lightslider', 'jquery-match-height'), '', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'gym_express_scripts' );


function gym_express_welcome_script( $hook ) {
    if ( 'appearance_page_gym-express-welcome' != $hook ) {
        return;
    }
    wp_enqueue_script( 'gym_express_welcome_script', get_template_directory_uri() . '/js/welcome-script.js', array('jquery'), '0.8.2', true );
}
add_action( 'admin_enqueue_scripts', 'gym_express_welcome_script' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function gym_express_customize_preview_js() {
  wp_enqueue_script( 'gym_express_customizer', get_template_directory_uri() . '/js/customizer.min.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'gym_express_customize_preview_js' );



/**
 * Registers an editor stylesheet for the current theme.
 *
 * @global WP_Post $post Global post object.
 */
function gym_express_add_editor_styles() {
  // Load 'theme.min.css' as most of it is necessary for editor as well.
  add_editor_style( array( 'css/editor-style.min.css', 'style.css' ) );
}
add_action( 'admin_init', 'gym_express_add_editor_styles' );



/**
 * Activate Google Fonts
 */
 function gym_express_google_fonts() {

 	$fonts          = '';
  $enqueueFonts   = 0;
	$bodyFont = esc_attr( get_theme_mod( 'body_font' ) );
	$headingFont = esc_attr( get_theme_mod( 'header_font' ) );

	if($bodyFont && $bodyFont != 'Roboto' ){
		$fonts .= '|' . $bodyFont;
		$enqueueFonts = 1;
	}
	if($headingFont && $headingFont != 'Montserrat' ){
		$fonts .= '|' . $headingFont;
		$enqueueFonts = 1;
	}

	if($enqueueFonts == 1){
	 $fonts = ltrim($fonts, '|');
	 $url = add_query_arg('family', urlencode($fonts), "//fonts.googleapis.com/css" );
	 wp_enqueue_style('gym-express-custom-google-fonts', $url);

	} else {
	   // Return nothing if google fonts have not been selected from the customizer or are the same as default.
	   return;
	}

 }
 add_action('wp_enqueue_scripts', 'gym_express_google_fonts');
