<?php
/**
 * Gym Express Color Customizer.
 *
 * @package Gym Express
 */

/*------------------------------------*\
  #SETTINGS
\*------------------------------------*/
function gym_express_colors_customizer( $wp_customize ) {

    // ======== Google Font Setup

  	$list_fonts        		= array(); // 1
  	$webfonts_array    		= file( get_template_directory() . '/inc/fonts.json');
  	$webfonts          		= implode( '', $webfonts_array );
  	$list_fonts_decode 		= json_decode( $webfonts, true );
  	$priority 						= 10;

  	foreach ( $list_fonts_decode['items'] as $key => $value ) {
  		$item_family                     = $list_fonts_decode['items'][$key]['family'];
  		$list_fonts[$item_family]        = $item_family;
  	}

  	$wp_customize->add_section( 'google_font_section', array(
  		'title'			=> __('Font Settings', 'gym-express'),
  		'priority'	=> 50,
  	));

    $wp_customize->add_setting( 'body_font', array(
        'default'     			=> 'Roboto',
        'sanitize_callback'	=> 'gym_express_sanitize_text',
    ));
    $wp_customize->add_control( 'body_font_control', array(
      'type'     		=> 'select',
      'label'    		=> __( 'Body Font', 'gym-express' ),
      'description'	=> __( 'Ordered by popularity - Default = Roboto', 'gym-express'),
      'section'  		=> 'google_font_section',
      'settings'   	=> 'body_font',
      'priority' 		=> $priority++,
      'choices'  		=> $list_fonts,
    ));

  	$wp_customize->add_setting( 'header_font', array(
  			'default'     			=> 'Montserrat',
  			'sanitize_callback'	=> 'gym_express_sanitize_text',
  	));
  	$wp_customize->add_control( 'header_font_control', array(
  		'type'     		=> 'select',
  		'label'    		=> __( 'Headings Font', 'gym-express' ),
  		'description'	=> __( 'Change the titles of your website h1 - h6. Default = Montserrat', 'gym-express'),
  		'section'  		=> 'google_font_section',
  		'settings'   	=> 'header_font',
  		'priority' 		=> $priority++,
  		'choices'  		=> $list_fonts,
  	));

    /* SETTING: Dark Background Color */
    $wp_customize->add_setting( 'gym_express_dark_bg_color', array(
        'default'       => '#232a35',
        'type'          => 'theme_mod',
        'capability'    => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize,
        'gym_express_dark_bg_color',
        array(
            'label'     => __( 'Dark Background Color', 'gym-express' ),
            'section'   => 'colors',
            'settings'  => 'gym_express_dark_bg_color',
            'priority'	=> $priority++,
    )));

    /* SETTING: HIGHLIGHT COLOR */
    $wp_customize->add_setting( 'gym_express_highlight_color', array(
        'default'       => '#86AF44',
        'type'          => 'theme_mod',
        'capability'    => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize,
        'gym_express_highlight_color',
        array(
            'label'     => __( 'Highlight color', 'gym-express' ),
            'section'   => 'colors',
            'settings'  => 'gym_express_highlight_color',
            'priority'	=> $priority++,
    )));

    /* SEPARATOR: Footer Widget Area */
    $wp_customize->add_setting( 'gym_express_light_bg_separator', array(
        'type'          => 'theme_mod',
        'capability'    => 'edit_theme_options',
        'sanitize_callback'    => 'sanitize_text_field',
    ));
    $wp_customize->add_control( new Gym_Express_Customize_Separator_Control(
      $wp_customize,
      'gym_express_light_bg_separator',
      array(
          'label'     => __( 'Text Color On Light Background', 'gym-express' ),
          'section'   => 'colors',
          'priority'	=> $priority++,
          'settings'  => 'gym_express_light_bg_separator',
    )));




    /* SETTING: Title Color on light BG */
    $wp_customize->add_setting( 'gym_express_title_color_on_light', array(
        'default'       => '#232a35',
        'type'          => 'theme_mod',
        'capability'    => 'edit_theme_options',
        'transport'     => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
        ));
    $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize,
        'gym_express_title_color_on_light',
        array(
            'label'     => __( 'Title Color', 'gym-express' ),
            'section'   => 'colors',
            'priority'	=> $priority++,
    )));

    /* SETTING: Text Color on light BG */
    $wp_customize->add_setting( 'gym_express_color_on_light', array(
        'default'       => '#2e323f',
        'type'          => 'theme_mod',
        'capability'    => 'edit_theme_options',
        'transport'     => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
        ));
    $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize,
        'gym_express_color_on_light',
        array(
            'label'     => __( 'Text Color', 'gym-express' ),
            'section'   => 'colors',
            'settings'  => 'gym_express_color_on_light',
            'priority'	=> $priority++,
    )));

    /* SEPARATOR: Text on Dark Background seperator */
    $wp_customize->add_setting( 'gym_express_dark_bg_separator', array(
        'type'          => 'theme_mod',
        'capability'    => 'edit_theme_options',
        'sanitize_callback'    => 'sanitize_text_field',
    ));
    $wp_customize->add_control( new Gym_Express_Customize_Separator_Control(
      $wp_customize,
      'gym_express_dark_bg_separator',
      array(
          'label'     => __( 'Text Color On Dark Background', 'gym-express' ),
          'section'   => 'colors',
          'priority'	=> $priority++,
          'settings'  => 'gym_express_dark_bg_separator',
    )));

    /* SETTING: Title color on Dark Background */
    $wp_customize->add_setting( 'gym_express_title_color_on_dark', array(
        'default'       => '#fff',
        'type'          => 'theme_mod',
        'capability'    => 'edit_theme_options',
        'transport'     => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize,
        'gym_express_title_color_on_dark',
        array(
            'label'     => __( 'Title Color', 'gym-express' ),
            'section'   => 'colors',
            'settings'  => 'gym_express_title_color_on_dark',
            'priority'	=> $priority++,
    )));

    /* SETTING: Text Color on Dark Background */
    $wp_customize->add_setting( 'gym_express_text_color_on_dark', array(
        'default'       => '#aaabae',
        'type'          => 'theme_mod',
        'capability'    => 'edit_theme_options',
        'transport'     => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize,
        'gym_express_text_color_on_dark',
        array(
            'label'     => __( 'Text Color', 'gym-express' ),
            'section'   => 'colors',
            'settings'  => 'gym_express_text_color_on_dark',
            'priority'	=> $priority++,
    )));

}
add_action('customize_register', 'gym_express_colors_customizer');


/*------------------------------------*\
  #COLORS OUTPUT
\*------------------------------------*/
function gym_express_colors_customizer_get_output() {

    // Start output buffering
    ob_start();

    ?>

        /* Custom Google fonts */
        body { font-family: <?php echo esc_attr( get_theme_mod( 'body_font', '"Roboto", Georgia, serif' ) ); ?>; }
        h1,h2,h3,h4,h5,h6 { font-family: <?php echo esc_attr( get_theme_mod( 'header_font', '"Montserrat", Helvetica, sans-serif' ) ); ?>; }

        /* default text color */
        body {
          color: <?php echo esc_attr( get_theme_mod( 'gym_express_color_on_light', '#2e323f' ) ); ?>;
        }
        /* Headings */
        h1, h2, h3, h4, h5, h6 {
          color: <?php echo esc_attr( get_theme_mod( 'gym_express_title_color_on_light', '#232a35' ) ); ?>;
        }
        h1:after, h2:after, h3:after, h4:after, h5:after, h6:after{
          border-color: <?php echo esc_attr( get_theme_mod( 'gym_express_title_color_on_light', '#86AF44' ) ); ?>;
        }

        /* HEADER AREA */
        header.site-header:before{
          background-color: <?php echo esc_attr( get_theme_mod( 'gym_express_dark_bg_color', '#232a35' ) ); ?>;
          <?php if( get_theme_mod('gym_express_only_bg_color') ): ?>
            opacity: 1;
          <?php endif; ?>
        }
        .site-branding .site-title{
          color: <?php echo esc_attr( get_theme_mod( 'gym_express_title_color_on_dark', '#ffffff' ) ); ?>;
        }
        .site-branding .site-description{
          color: <?php echo esc_attr( get_theme_mod( 'gym_express_text_color_on_dark', '#aaabae' ) ); ?>;
        }
        .site-header a{
          color: <?php echo esc_attr( get_theme_mod( 'gym_express_title_color_on_dark', '#ffffff' ) ); ?>;
        }
        .site-header a:hover, .site-header a:focus, .site-header a:active,
        .site-header li.current_page_item > a{
          color: <?php echo esc_attr( get_theme_mod( 'gym_express_highlight_color', '#86AF44' ) ); ?>;
        }
        .main-navigation ul.nav-menu > li.current_page_item > a:before{
          background-color: <?php echo esc_attr( get_theme_mod( 'gym_express_title_color_on_dark', '#ffffff' ) ); ?>;
        }


        /* HIGHLIGHTS */
        .site-content a,
        .back-to-top,
        .home-block .text-area .sub-title,
        .site-info a,
        .home-recent-posts .section-main .recent-post-content h1:hover,
        .testimonial-section h5,
        .main-navigation ul.nav-menu .current-menu-parent > a,
        .main-navigation ul.nav-menu .current-menu-parent .current-menu-item a{
          color: <?php echo esc_attr( get_theme_mod( 'gym_express_highlight_color', '#86AF44' ) ); ?>;
        }
        .site-content a:hover,
        .site-content a:focus,
        .site-content a:active,
        .site-info a:hover, .site-info a:focus, .site-info:active{
          color: <?php echo esc_attr( gym_express_adjust_brightness( esc_attr( get_theme_mod( 'gym_express_highlight_color', '#86AF44' ) ), -25 ) . (is_customize_preview() ? ' !important' : '') ); ?>;
        }
        .home-block .text-area .sub-title:before,
        .home-block .text-area .sub-title:after,
        .home-recent-posts h2:after,
        .home-recent-posts .section-main .recent-post-content h1:after,
        #pirate-forms-contact-submit,
        .back-to-top:hover,
        a.btn,
        .page-template-homepage .btn,
        .book-a-table-section .cta a,
        .book-a-table-section .cta.right h2:before,
        .site-footer .widget h4:before,
        a.animated-button.victoria-one:after,
        .home-block .text-area h2:before,
        a.animated-button.thar-three,
        .pirate-forms-submit-button,
        .product-section h2.section-title:before,
        .product-section .woocommerce .products .product .onsale,
        .product-section h2.section-title:before,
        .testimonial-section .lSSlideOuter .lSPager.lSpg > li.active a,
        .testimonial-section .lSSlideOuter .lSPager.lSpg > li:hover a,
        .widget_widget_op_overview h4:before,
        .pirate-forms-contact-widget h4:before,
        .product-section h2.section-title:before,
        .owl-theme .owl-controls .owl-page.active span,
        .owl-theme .owl-controls.clickable .owl-page:hover span,
        .woocommerce #respond input#submit.alt,
        .woocommerce a.button.alt,
        .woocommerce button.button.alt,
        .woocommerce input.button.alt,
        .woocommerce span.onsale,
        .woocommerce .related.products h2:before,
        .woocommerce .related.products .product .onsale,
        a.animated-button.thar-three.inverted:before,
        .home-recent-posts h2:before,
        .mc4wp-form input[type=submit]:hover {
          background-color: <?php echo esc_attr( get_theme_mod( 'gym_express_highlight_color', '#86AF44' ) ); ?>;
        }
        .back-to-top,
        .page-template-homepage .btn:before,
        .hero-section .hero-txt,
        .hero-section .cta-btns a,
        a.animated-button.thar-three,
        .pirate-forms-submit-button,
        .mc4wp-form input[type=submit]{
          border-color: <?php echo esc_attr( get_theme_mod( 'gym_express_highlight_color', '#86AF44' ) ); ?>;
        }

        /* Default Buttons */
        .button,
        button,
        input[type=submit],
        input[type=reset],
        input[type=button],
        a.btn,
        .page-template-homepage .btn {
            color: <?php echo esc_attr( get_theme_mod( 'gym_express_title_color_on_dark', '#ffffff' ) ); ?>;
        }
        a.btn:hover, a.btn:focus, a.btn:active,
        .page-template-homepage .btn:hover,
        .page-template-homepage .btn:visited,
        .page-template-homepage .btn:active,
        .button:hover, button:hover, input[type=submit]:hover, input[type=reset]:hover, input[type=button]:hover,
        .button:focus, button:focus, input[type=submit]:focus, input[type=reset]:focus, input[type=button]:focus,
        .button:active, button:active, input[type=submit]:active, input[type=reset]:active, input[type=button]:active,
        #pirate-forms-contact-submit {
            color: <?php echo esc_attr( get_theme_mod( 'gym_express_title_color_on_dark', '#ffffff' ) ); ?>;
        }

        /* Footer colors */

        .site-footer{ background-color: <?php echo esc_attr( get_theme_mod( 'gym_express_dark_bg_color', '#232a35' ) ); ?>; }
        .site-footer{ color:<?php echo esc_attr( get_theme_mod( 'gym_express_text_color_on_dark', '#aaabae' ) ); ?>;}
        .site-footer h2, .site-footer h3, .site-footer h4, .site-footer h5, .site-footer h6 { color: <?php echo esc_attr( get_theme_mod( 'gym_express_title_color_on_dark', '#ffffff' ) ); ?>;}
        .site-footer a{ color: <?php echo esc_attr( get_theme_mod( 'gym_express_highlight_color', '#86AF44' ) ); ?>;}
        .site-footer a:hover, .site-footer a:active, .site-footer a:focus{ color: <?php echo esc_attr( get_theme_mod( 'gym_express_title_color_on_dark', '#ffffff' ) ); ?>;}



    <?php

    // Release output buffering
    return ob_get_clean();
}

/* Front-end custom styles */
function gym_express_colors_customizer_wp_head() {
    echo '<style type="text/css">' . gym_express_colors_customizer_get_output() . '</style>';
}
add_action('wp_head', 'gym_express_colors_customizer_wp_head', 20);
