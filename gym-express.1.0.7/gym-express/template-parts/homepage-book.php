<?php
/**
 * Template part for displaying book a table section on homepage.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Gym Express
 */

  $promoBarTitle = get_theme_mod( 'gym_express_promo_bar_title', __( 'Challenge your tastebuds', 'gym-express') );
  $promoBarSubTitle = get_theme_mod( 'gym_express_promo_bar_subtitle', __( 'Our tables fill up fast so book early to avoid dissapointment.', 'gym-express') );
  $promoBarLabel = get_theme_mod( 'gym_express_promo_bar_label', __( 'Book a Table', 'gym-express' ) );
  $promoBarImg = get_theme_mod( 'gym_express_promo_bar_img');
  $promoBarURL = get_theme_mod( 'gym_express_promo_bar_url' );
  $container_class_content = get_theme_mod( 'gym_express_homepage_container_class', true ) ? 'container' : 'fluid';
?>
    <section id="book" class="book-a-table-section parallax-window" data-parallax="scroll" data-image-src="<?php echo esc_attr( $promoBarImg ); ?>">
      <div class="content-wrap  <?php echo esc_attr( $container_class_content ); ?>">
        <div class="cta">
          <?php
            if( $promoBarTitle ){
              echo '<h2>' . esc_html( $promoBarTitle ) . '</h2>';
            }
            if( $promoBarSubTitle ){
              echo '<p class="sub-title">' . esc_html( $promoBarSubTitle ) . '</p>';
            }
            if($promoBarLabel){
              echo '<a class="btn" href="' . esc_url( $promoBarURL ) . '" >' . esc_html( $promoBarLabel ) . '</a>';
            }
          ?>
        </div>
      </div>
    </section>
