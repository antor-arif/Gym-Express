<?php
/**
 * Gym ExpressWidget Areas Initializations.
 *
 * @package Gym Express
 */

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function gym_express_widgets_init() {
  register_sidebar( array(
    'name'          => __( 'Sidebar', 'gym-express' ),
    'id'            => 'sidebar-1',
    'description'   => __( 'Add widgets here.', 'gym-express' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );
}
add_action( 'widgets_init', 'gym_express_widgets_init' );

/*------------------------------------*\
  #WOOCOMMERCE WIDGET AREA
\*------------------------------------*/

function gym_express_woo_widgets_init() {

  register_sidebar( array(
    'name'          => __( 'WooCommerce Shop Sidebar', 'gym-express' ),
    'id'            => 'woocommerce_sidebar',
    'description'   => __( 'Show widgets on shop pages only.', 'gym-express' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>',
  ) );

}
add_action( 'widgets_init', 'gym_express_woo_widgets_init', 700);


/*------------------------------------*\
  #HOMEPAGE CONTACT WIDGET AREAS
\*------------------------------------*/

function gym_express_contact_widgets_init() {

  register_sidebar( array(
    'name'          => __( 'Homepage contact widget area', 'gym-express' ),
    'id'            => 'gym_express_contact_single_widgets',
    'description'   => __( 'Widget area split into half screen width for contact info on homepage.', 'gym-express' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
  ) );

}
add_action( 'widgets_init', 'gym_express_contact_widgets_init', 800);


/*------------------------------------*\
  #FOOTER WIDGET AREAS
\*------------------------------------*/

function gym_express_footer_widgets_init() {

  /* #FOOTER WIDGETS */
  register_sidebar( array(
    'name'          => __( 'Footer Column 1', 'gym-express' ),
    'id'            => 'gym_express_footer_col1',
    'description'   => __( 'First column of widgets for footer.', 'gym-express' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
  ) );
  register_sidebar( array(
    'name'          => __( 'Footer Column 2', 'gym-express' ),
    'id'            => 'gym_express_footer_col2',
    'description'   => __( 'Second column of widgets for footer.', 'gym-express' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
  ) );
  register_sidebar( array(
    'name'          => __( 'Footer Column 3', 'gym-express' ),
    'id'            => 'gym_express_footer_col3',
    'description'   => __( 'Third column of widgets for footer.', 'gym-express' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
  ) );

}
add_action( 'widgets_init', 'gym_express_footer_widgets_init', 1000);
