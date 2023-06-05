<?php
/**
 * Gym Express Theme Customizer.
 *
 * @package Gym Express
 */

/*------------------------------------*\
  #CUSTOM SANITIZERS
\*------------------------------------*/
function gym_express_sanitize_checkbox( $checked ) {
    // Boolean check.
    return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
// Sanitize Text
function gym_express_sanitize_text( $input ) {
    return sanitize_text_field( $input );
}
// Sanitize Email
function gym_express_santitize_email( $input ){
	return sanitize_email( $input );
}
// Sanitize website address
function gym_express_sanitize_url($input){
	return esc_url_raw($input);
}

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function gym_express_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
  $wp_customize->get_section( 'colors' )->priority = 55;
  $wp_customize->get_section( 'colors' )->title = __('Color Settings', 'gym-express');


  if (class_exists('WP_Customize_Control')) {

    if ( ! class_exists( 'Gym_Express_Customize_Control' ) ) {
			class Gym_Express_Customize_Control extends WP_Customize_Control {
				public $content = '';

				/**
				 * Constructor
				 */
				function __construct( $manager, $id, $args ) {
					// Just calling the parent constructor here
					parent::__construct( $manager, $id, $args );
				}

				/**
				 * This function renders the control's content.
				 */
				public function render_content() {
					echo $this->content;
				}
			}
		}

  }
}
add_action( 'customize_register', 'gym_express_customize_register' );

/**
 * Customizer - Add Custom Styling
 */
function gym_express_customizer_style()
{
	wp_enqueue_style('gym_express-customizer', get_template_directory_uri() . '/css/customizer.min.css');
}
add_action('customize_controls_print_styles', 'gym_express_customizer_style');


/**
 * Pro Link
 */
 function gym_express_get_pro_link( $content ) {
	return esc_url( 'https://www.templateexpress.com/gym-express-pro-theme' );
}

function gym_express_customizer_setup( $wp_customize ) {

  // Start our customize panels below the Page Settings Panel.
  $priority = 50;


  /*
	* //////////////////// Pro Panel ////////////////////////////
	*/
		$wp_customize->add_section( 'gym_express_pro', array(
			'title' => __( 'Pro Version Now Available', 'gym-express' ),
			'priority' => 1
		) );

		$wp_customize->add_setting(
			'gym_express_pro', // IDs can have nested array keys
			array(
				'default' => false,
				'type' => 'gym_express_pro',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);

		$wp_customize->add_control(
			new Gym_Express_Customize_Control(
				$wp_customize,
				'gym_express_pro',
				array(
					'content'  => sprintf(
						__( '
            <h3>Some benefits of going with the pro extension plugin</h3>
            <ul>
              <li>Fast and in-depth support</li>
              <li>Slider Revolution Support</li>
              <li>Homepage additional slider support</li>
              <li>New Promo Section for homepage</li>
              <li>More features to come soon.</li>
            </ul>
            <h4>%s</h4>', 'gym-express' ),
						sprintf(
							'<a href="%1$s" target="_blank">%2$s</a>',
							esc_url( gym_express_get_pro_link( 'customizer' ) ),
							__( 'Check out the pro version now', 'gym-express' )
						)
					),
					'section' => 'gym_express_pro',
				)
			)
		);



/*------------------------------------*\
  #PAGE SETTINGS
\*------------------------------------*/
  $wp_customize->add_section( 'gym_express_page_settings_section' , array(
      'title'       => __( 'Page settings', 'gym-express' ),
      'description' => __( 'Max-width of container is 1184px or 80%', 'gym-express' ),
      'priority'	 	=> $priority++,
  ));

  /* make the header sticky */
  $wp_customize->add_setting( 'gym_express_sticky_head', array(
      'default'   => false,
      'transport' => 'refresh',
      'sanitize_callback' => 'gym_express_sanitize_checkbox',
  ));
  $wp_customize->add_control( 'gym_express_sticky_head', array(
      'label'     => __( 'Check the box to make the header stick to the top of the screen on larger screens', 'gym-express' ),
      'section'   => 'gym_express_page_settings_section',
      'type'      => 'checkbox',
      'priority'	=> $priority++,
      'default'   => false
  ));

  /* SETTING: LIMIT HEADER TO CONTAINER */
  $wp_customize->add_setting( 'gym_express_header_container_class', array(
      'default'   => false,
      'transport' => 'refresh',
      'sanitize_callback' => 'gym_express_sanitize_checkbox',
  ));
  $wp_customize->add_control( 'gym_express_header_container_class', array(
      'label'     => __( 'Limit header content to container', 'gym-express' ),
      'section'   => 'gym_express_page_settings_section',
      'type'      => 'checkbox',
      'priority'	=> $priority++,
      'default'   => false
  ));

  /* SETTING: LIMIT HOMEPAGE CONTENT TO CONTAINER */
  $wp_customize->add_setting( 'gym_express_homepage_container_class', array(
      'default'   => true,
      'transport' => 'refresh',
      'sanitize_callback' => 'gym_express_sanitize_checkbox',
  ));
  $wp_customize->add_control( 'gym_express_homepage_container_class', array(
      'label'     => __( 'Limit homepage content to container', 'gym-express' ),
      'section'   => 'gym_express_page_settings_section',
      'type'      => 'checkbox',
      'priority'	=> $priority++,
      'default'   => true
  ));

  /* SETTING: LIMIT CONTENT TO CONTAINER */
  $wp_customize->add_setting( 'gym_express_content_container_class', array(
      'default'   => true,
      'transport' => 'refresh',
      'sanitize_callback' => 'gym_express_sanitize_checkbox',
  ));
  $wp_customize->add_control( 'gym_express_content_container_class', array(
      'label'     => __( 'Limit other content to container', 'gym-express' ),
      'section'   => 'gym_express_page_settings_section',
      'type'      => 'checkbox',
      'priority'	=> $priority++,
      'default'   => true
  ));

  /* SETTING: LIMIT FOOTER TO CONTAINER */
  $wp_customize->add_setting( 'gym_express_footer_container_class', array(
      'default'   => true,
      'transport' => 'refresh',
      'sanitize_callback' => 'gym_express_sanitize_checkbox',
  ));
  $wp_customize->add_control( 'gym_express_footer_container_class', array(
      'label'     => __( 'Limit footer content to container', 'gym-express' ),
      'section'   => 'gym_express_page_settings_section',
      'type'      => 'checkbox',
      'priority'	=> $priority++,
      'default'   => true
  ));

  /* SETTING: SHOW OR HIDE SIDEBAR ON POST */
  $wp_customize->add_setting( 'gym_express_sidebar_hide_post', array(
      'default'   => false,
      'transport' => 'refresh',
      'sanitize_callback' => 'gym_express_sanitize_checkbox',
  ));
  $wp_customize->add_control( 'gym_express_sidebar_hide_post', array(
      'label'     => __( 'Hide sidebar on single post', 'gym-express' ),
      'section'   => 'gym_express_page_settings_section',
      'type'      => 'checkbox',
      'priority'	=> $priority++,
      'default'   => false
  ));

  /* SETTING: SHOW OR HIDE SIDEBAR ON POST */
  $wp_customize->add_setting( 'gym_express_sidebar_hide_page', array(
      'default'   => false,
      'transport' => 'refresh',
      'sanitize_callback' => 'gym_express_sanitize_checkbox',
  ));
  $wp_customize->add_control( 'gym_express_sidebar_hide_page', array(
      'label'     => __( 'Hide sidebar on pages', 'gym-express' ),
      'section'   => 'gym_express_page_settings_section',
      'type'      => 'checkbox',
      'priority'	=> $priority++,
      'default'   => false
  ));



  /*------------------------------------*\
    #HOMEPAGE PANEL
  \*------------------------------------*/
    $wp_customize->add_panel( 'gym_express_homepage_panel', array(
      'priority'       => $priority,
      'title'          => __('Homepage Settings', 'gym-express'),
      'description'    => __('Add and remove homepage sections', 'gym-express'),
    ) );
    /*------------------------------------*\
      #HERO SECTION
    \*------------------------------------*/
    $wp_customize->add_section( 'gym_express_hero_section' , array(
      'title'       => __( 'Hero settings', 'gym-express' ),
      'description' => __( 'Add some wow factor to your homepage with this Hero area', 'gym-express' ),
      'panel'       => 'gym_express_homepage_panel',
      'priority'	 	=> $priority++,
    ));
    $wp_customize->add_setting( 'gym_express_hero_page_id', array(
      'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control( 'gym_express_hero_page_id', array(
      'label' 		        => __( 'Select Page', 'gym-express' ),
      'description'       => __( 'Make sure the page has a featured image, a snappy title and excerpt.', 'gym-express'),
      'type'              => 'dropdown-pages',
      'section' 		      => 'gym_express_hero_section',
      'priority'	 	      => $priority++,
    ));
    //Show Hero Title & SubTitle
    $wp_customize->add_setting( 'gym_express_show_hero_title', array(
      'default'						=> false,
      'sanitize_callback' => 'gym_express_sanitize_checkbox',
    ));
    $wp_customize->add_control( 'gym_express_show_hero_title', array(
      'label'      				=> __('Show title and excerpt', 'gym-express'),
      'section'    				=> 'gym_express_hero_section',
      'type'		 					=> 'checkbox',
      'default'						=> false,
      'priority'	 				=> $priority++,
    ));
    // Show Hero
    $wp_customize->add_setting( 'gym_express_hide_hero', array(
    	'default'						=> true,
    	'sanitize_callback' => 'gym_express_sanitize_checkbox',
    ));
    $wp_customize->add_control( 'gym_express_hide_hero', array(
    	'label'      				=> __('Hide Hero Section', 'gym-express'),
    	'section'    				=> 'gym_express_hero_section',
    	'type'		 					=> 'checkbox',
      'default'						=> true,
    	'priority'	 				=> $priority++,
    ));

    $wp_customize->add_setting( 'gym_express_hero_btn_one', array(
      'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control( 'gym_express_hero_btn_one', array(
      'label' 		        => __( 'Add Button', 'gym-express' ),
      'description'       => __( 'Select a page to display a button that links to it. Short titles work best!', 'gym-express'),
      'type'              => 'dropdown-pages',
      'section' 		      => 'gym_express_hero_section',
      'priority'	 	      => $priority++,
    ));

    /*------------------------------------*\
      #HOMEPAGE CONTENT BLOCK ONE
    \*------------------------------------*/
    $wp_customize->add_section( 'gym_express_content_block_one' , array(
      'title'       => __( 'Content block 1', 'gym-express' ),
      'description' => __( 'show off your specials, newest chef or even an upcoming event', 'gym-express' ),
      'panel'       => 'gym_express_homepage_panel',
      'priority'	 	=> $priority++,
    ));
    // link to page for title, image and description.
    $wp_customize->add_setting( 'gym_express_block1_page', array(
      'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control( 'gym_express_block1_page', array(
      'label' 		        => __( 'Select Page', 'gym-express' ),
      'description'       => __( 'Make sure the page has a featured image, a snappy title and excerpt.', 'gym-express'),
      'type'              => 'dropdown-pages',
      'section' 		      => 'gym_express_content_block_one',
      'priority'	 	      => $priority++,
    ));
    // link to page for button
    $wp_customize->add_setting( 'gym_express_block_1_btn_url', array(
      'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control( 'gym_express_block_1_btn_url', array(
      'label' 		        => __( 'Link for Button', 'gym-express' ),
      'description'       => __( 'Leave blank if you dont want a button.', 'gym-express'),
      'type'              => 'dropdown-pages',
      'section' 		      => 'gym_express_content_block_one',
      'priority'	 	      => $priority++,
    ));
    // Image left or right
    $wp_customize->add_setting( 'gym_express_block_1_img_left', array(
      'default'   => false,
      'transport' => 'refresh',
      'sanitize_callback' => 'gym_express_sanitize_checkbox',
    ));
    $wp_customize->add_control( 'gym_express_block_1_img_left', array(
      'label'     => __( 'Show Image on the left', 'gym-express' ),
      'section'   => 'gym_express_content_block_one',
      'type'      => 'checkbox',
      'priority'	=> $priority++,
      'default'   => false
    ));


    /*------------------------------------*\
      #HOMEPAGE CALL TO ACTION
    \*------------------------------------*/
    $wp_customize->add_section( 'gym_express_highlight_section' , array(
      'title'       => __( 'Call to Action', 'gym-express' ),
      'description' => __( 'Highlight a page on your site with this section.', 'gym-express' ),
      'panel'       => 'gym_express_homepage_panel',
      'priority'	 	=> $priority++,
    ));

    $wp_customize->add_setting('gym_express_highlight_page', array(
      'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control( 'gym_express_highlight_page', array(
      'label' 		        => __( 'Select Page', 'gym-express' ),
      'description'       => __( 'Select the page you want to highlight. Make sure it has a featured image and a snappy title.', 'gym-express'),
      'type'              => 'dropdown-pages',
      'section' 		      => 'gym_express_highlight_section',
      'priority'	 	      => $priority++,
    ));
    // button label
    $wp_customize->add_setting( 'gym_express_highlight_btn_label', array(
      'default'   => __( 'Book a table', 'gym-express'),
      'transport' => 'postMessage',
      'sanitize_callback' => 'gym_express_sanitize_text',
    ));
    $wp_customize->add_control( 'gym_express_highlight_btn_label', array(
      'label'             => __( 'Button Label', 'gym-express' ),
      'section'           => 'gym_express_highlight_section',
      'priority'	 				=> $priority++,
    ));
    // Align txt
    $wp_customize->add_setting( 'gym_express_highlight_txt_align', array(
      'default'   => 'right',
      'sanitize_callback' => 'gym_express_sanitize_text',
    ));
    $wp_customize->add_control( 'gym_express_highlight_txt_align', array(
      'label'             => __( 'Align Text', 'gym-express' ),
      'section'           => 'gym_express_highlight_section',
      'type'              => 'radio',
  		'choices'           => array(
    			'left'   => __('left', 'gym-express'),
          'center' => __('center', 'gym-express'),
    			'right'  => __('right', 'gym-express'),

  		),
      'priority'	 				=> $priority++,
    ));

    /*------------------------------------*\
      #Homepage Recent posts
    \*------------------------------------*/
    $wp_customize->add_section( 'gym_express_recent_section' , array(
      'title'       => __( 'Recent News', 'gym-express' ),
      'description' => __( 'Configure the recent news section on the homepage.', 'gym-express' ),
      'panel'       => 'gym_express_homepage_panel',
      'priority'	 	=> $priority++,
    ));
    // Title
    $wp_customize->add_setting( 'gym_express_recent_title', array(
      'default'   => __( 'Blog & News', 'gym-express'),
      'transport' => 'postMessage',
      'sanitize_callback' => 'gym_express_sanitize_text',
    ));
    $wp_customize->add_control( 'gym_express_recent_title', array(
      'label'             => __( 'Title', 'gym-express' ),
      'section'           => 'gym_express_recent_section',
      'priority'	 				=> $priority++,
    ));
    // Sub-Title
    $wp_customize->add_setting( 'gym_express_recent_section_subtitle', array(
      'default'   => __( 'Keep up to date with all the goings on at Gym Express', 'gym-express'),
      'transport' => 'postMessage',
      'sanitize_callback' => 'gym_express_sanitize_text',
    ));
    $wp_customize->add_control( 'gym_express_recent_section_subtitle', array(
      'label'             => __( 'Sub Title', 'gym-express' ),
      'section'           => 'gym_express_recent_section',
      'priority'	 				=> $priority++,
    ));
    foreach ( get_categories() as $categories => $category ){
        $cats[$category->term_id] = $category->name;
    }
    $wp_customize->add_setting( 'gym_express_recent_cat', array(
        'default' => 1,
        'sanitize_callback' => 'absint'
    ) );
    $wp_customize->add_control( 'cat_contlr', array(
        'label'   => __('Select Category', 'gym-express'),
        'settings' => 'gym_express_recent_cat',
        'type' => 'select',
        'choices' => $cats,
        'section' => 'gym_express_recent_section',
        'priority'	 				=> $priority++,
    ) );


    /*------------------------------------*\
      #TESTIMONIAL SECTION
    \*------------------------------------*/
    if ( class_exists('grfwpInit') ) {

      $wp_customize->add_section( 'gym_express_testimonial_section' , array(
        'title'       => __( 'Testimonial Section', 'gym-express' ),
        'description' => __( 'Configure the Testimonial section on the homepage.', 'gym-express' ),
        'panel'       => 'gym_express_homepage_panel',
        'priority'	 	=> $priority++,
      ));

      // Title
      $wp_customize->add_setting( 'gym_express_testimonial_title', array(
        'default'   => __( 'Our Happy Customers', 'gym-express'),
        'transport' => 'postMessage',
        'sanitize_callback' => 'gym_express_sanitize_text',
      ));
      $wp_customize->add_control( 'gym_express_testimonial_title', array(
        'label'             => __( 'Title', 'gym-express' ),
        'section'           => 'gym_express_testimonial_section',
        'priority'	 				=> $priority++,
      ));

      // Sub Title
      $wp_customize->add_setting( 'gym_express_testimonial_sub_title', array(
        'default'   => __( 'read testimonials', 'gym-express'),
        'transport' => 'postMessage',
        'sanitize_callback' => 'gym_express_sanitize_text',
      ));
      $wp_customize->add_control( 'gym_express_testimonial_sub_title', array(
        'label'             => __( 'Sub Title', 'gym-express' ),
        'section'           => 'gym_express_testimonial_section',
        'priority'	 				=> $priority++,
      ));

      // Testimonial Background Image
      $wp_customize->add_setting( 'gym_express_testimonial_bg_img', array(
        'sanitize_callback' => 'gym_express_sanitize_url',
      ));
      $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'gym_express_testimonial_bg_img', array(
        'label'    		=> __( 'Background Image', 'gym-express' ),
        'description' => __( 'Add a background image for a richer look', 'gym-express'),
        'section'  		=> 'gym_express_testimonial_section',
        'priority'	 	=> $priority++,
      )));

      // Parallax Effect
      $wp_customize->add_setting('testimonial_bg_parallax', array(
        'default'						=> false,
        'sanitize_callback'	=> 'gym_express_sanitize_checkbox',
      ));
      $wp_customize->add_control( 'testimonial_bg_parallax', array(
        'type' 					=> 'checkbox',
        'label' 				=> __('Turn on Parallax Effect for background image','gym-express'),
        'section' 			=> 'gym_express_testimonial_section',
        'priority' 			=> $priority++,
      ));

      // Shortcode
      $wp_customize->add_setting( 'gym_express_testimonial_shortcode', array(
        'default'   => __('[good-reviews limit=5]', 'gym-express'),
        'transport' => 'refresh',
        'sanitize_callback' => 'gym_express_sanitize_text',
      ));
      $wp_customize->add_control( 'gym_express_testimonial_shortcode', array(
        'label'             => __( 'Shortcode', 'gym-express' ),
        'description'       => sprintf(
          __( 'Shortcode help: %s', 'gym-express' ),
          sprintf(
            '<a href="%1$s" target="_blank">%2$s</a>',
            esc_url('http://doc.themeofthecrop.com/plugins/good-reviews-wp/user/faq#shortcode'),
            __( 'Documentation', 'gym-express' )
          )
        ),
        'type'              => 'textarea',
        'section'           => 'gym_express_testimonial_section',
        'priority'	 				=> $priority++,
      ));

    }

    /*------------------------------------*\
      #HOMEPAGE CONTENT INSTAGRAM SECTION
    \*------------------------------------*/

    if ( class_exists( 'Settings_enjoyinstagram_Plugin' ) ) {

      $wp_customize->add_section( 'gym_express_instagram_section' , array(
        'title'       => __( 'Instgram Gallery', 'gym-express' ),
        'description' => __( 'Show your customers the atmosphere, interior and whats on offer using this great looking gallery.', 'gym-express' ),
        'panel'       => 'gym_express_homepage_panel',
        'priority'	 	=> $priority++,
      ));

      // Instagram Title
      $wp_customize->add_setting( 'gym_express_instagram_title', array(
        'default' => __('Instagram', 'gym-express'),
        'transport' => 'postMessage',
        'sanitize_callback' => 'gym_express_sanitize_text',
      ));
      $wp_customize->add_control( 'gym_express_instagram_title', array(
        'label'             => __( 'Title', 'gym-express' ),
        'description'       => __('Clear this field if you want to hide the title.', 'gym-express'),
        'section'           => 'gym_express_instagram_section',
        'priority'	 				=> $priority++,
      ));
      // Gallery Type
      $wp_customize->add_setting( 'gym_express_instagram_shortcode', array(
        'sanitize_callback' => 'gym_express_sanitize_text',
      ));
      $wp_customize->add_control( 'gym_express_instagram_shortcode', array(
        'label'             => __( 'Type of gallery', 'gym-express' ),
        'type'              => 'select',
        'choices'           => array(
            '[enjoyinstagram_mb]' => __('Carousel View', 'gym-express'),
            '[enjoyinstagram_mb_grid]' => __('Grid View', 'gym-express'),
        ),
        'section'           => 'gym_express_instagram_section',
        'priority'	 				=> $priority++,
      ));

    }


    /*------------------------------------*\
      #MAP SECTION
    \*------------------------------------*/
    if ( function_exists( 'wpgmaps_activate' ) ) {

      $wp_customize->add_section( 'map_section', array(
      	'title'							=>	__('MAP Settings', 'gym-express'),
      	'description'				=> __('Options for displaying a map on the homepage. Make sure you have WP Google Maps installed and activated', 'gym-express'),
        'panel'            => 'gym_express_homepage_panel',
      	'priority'					=> $priority++,
      ));

        $wp_customize->add_setting('map_show', array(
        	'default'						=> false,
        	'sanitize_callback'	=> 'gym_express_sanitize_checkbox',
        ));
        $wp_customize->add_control( 'map_show', array(
        	'type' 					=> 'checkbox',
        	'label' 				=> __('Show Map','gym-express'),
        	'section' 			=> 'map_section',
        	'priority' 			=> $priority++,
        ));
        $wp_customize->add_setting('map_section_shortcode', array(
        	'sanitize_callback'	=> 'gym_express_sanitize_text',
        ));
        $wp_customize->add_control( 'map_section_shortcode', array(
        	'label' 		        => __( 'Map Shortcode', 'gym-express' ),
          'description'       => __('Paste in your map shortcode. WP Google Maps plugin provides the needed shortcode', 'gym-express'),
        	'section' 		      => 'map_section',
        	'priority'	 	      => $priority++,
        ));

      }

    /*------------------------------------*\
      HEADER IMAGE
    \*------------------------------------*/

    /* SETTING: SHOW OR HIDE SIDEBAR ON POST */
    $wp_customize->add_setting( 'gym_express_use_header_image', array(
        'default'   => false,
        'transport' => 'refresh',
        'sanitize_callback' => 'gym_express_sanitize_checkbox',
        ));
    $wp_customize->add_control( 'gym_express_use_header_image', array(
        'label'     => __( 'Use this header image instead of featured images', 'gym-express' ),
        'section'   => 'header_image',
        'type'      => 'checkbox',
        'priority'	=> $priority++,
        'default'   => false
        ));

    /* SETTING: OPTION TO SHOW HEADER IMAGE ON PRODUCT PAGES */
    if(gym_express_is_woocommerce_activated()){

      $wp_customize->add_setting( 'gym_express_woo_header_image', array(
          'default'   => false,
          'transport' => 'refresh',
          'sanitize_callback' => 'gym_express_sanitize_checkbox',
          ));
      $wp_customize->add_control( 'gym_express_woo_header_image', array(
          'label'     => __( 'Use this header image on WooCommerce Pages', 'gym-express' ),
          'section'   => 'header_image',
          'type'      => 'checkbox',
          'priority'	=> $priority++,
          'default'   => false
          ));

    }

    $wp_customize->add_setting( 'gym_express_only_bg_color', array(
        'default'   => false,
        'transport' => 'refresh',
        'sanitize_callback' => 'gym_express_sanitize_checkbox',
        ));
    $wp_customize->add_control( 'gym_express_only_bg_color', array(
        'label'     => __( 'show only background color for header area', 'gym-express' ),
        'section'   => 'header_image',
        'type'      => 'checkbox',
        'priority'	=> $priority++,
        'default'   => false
        ));



    /* Darken the image */
    $wp_customize->add_setting( 'gym_express_header_overlay', array(
      'default'           => 0.3,
      'sanitize_callback' => 'gym_express_sanitize_text',
    ));
    $wp_customize->add_control( 'gym_express_header_overlay_control', array(
        'label'       => __( 'Pull background color through image.', 'gym-express' ),
        'description' => __( 'You can have the background color bleed through the image with this setting.', 'gym-express' ),
        'section'     => 'header_image',
        'settings'    => 'gym_express_header_overlay',
        'type'        => 'range',
        'priority'	  => $priority++,
        'input_attrs' => array(
          'min'   => 0,
          'max'   => 1,
          'step'  => 0.01,
          )
      ));

}
add_action('customize_register', 'gym_express_customizer_setup');


function gym_express_customizer_scripts(){

  $stickyHead = get_theme_mod( 'gym_express_sticky_head', false);

  if( $stickyHead ){
    // stickyhead
    wp_enqueue_script( 'headhesive', get_template_directory_uri() . '/js/headhesive.min.js', '', '1.2.3', true);
    wp_enqueue_script( 'headhesive-call', get_template_directory_uri() . '/js/theme-head-script.min.js', array( 'headhesive' ), '', true);
  }

}
add_action( 'wp_enqueue_scripts', 'gym_express_customizer_scripts' );
/*------------------------------------*\
  #COLORS OUTPUT
\*------------------------------------*/
function gym_express_customizer_styles_output() {

  // Start output buffering
  ob_start();

  if(get_theme_mod('gym_express_only_bg_color')){
    ?>
      /* remove overlay if set to background color
      .site-header:before { opacity:1;}
    <?php
  }else{
    ?>
    /* header image overlay */
    .site-header:before { opacity: <?php echo esc_attr( get_theme_mod( 'gym_express_header_overlay', '0.3' ) ); ?>; }
    <?php
  }
  
  // Release output buffering
  return ob_get_clean();

}

  /* Front-end custom styles */
  function gym_express_styles_customizer_wp_head() {
      echo '<style type="text/css">' . gym_express_customizer_styles_output() . '</style>';
  }
  add_action('wp_head', 'gym_express_styles_customizer_wp_head', 20);
