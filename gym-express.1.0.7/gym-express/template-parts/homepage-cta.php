<?php
/**
 * Template part for displaying the Call to action section on homepage.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Gym Express
 */

  $pageID = get_theme_mod( 'gym_express_highlight_page' );
  if( did_action( 'pll_init' ) && PLL() instanceof PLL_Frontend ){
    $translatedPageID = pll_get_post($pageID);
    if( $translatedPageID ){
      // if there is a translated page then use this instead.
      $pageID = $translatedPageID;
    }
  }
  $pageImg = get_the_post_thumbnail_url( $pageID );
  $btnLabel = get_theme_mod( 'gym_express_highlight_btn_label', __( 'Book a table', 'gym-express') );
  $alignTxt = get_theme_mod( 'gym_express_highlight_txt_align', 'right');
  $container_class_content = get_theme_mod( 'gym_express_homepage_container_class', true ) ? 'container' : 'fluid';

  // stop if no valid page id.
  if(! intval($pageID) ){
    return;
  }
?>
    <section id="cta" class="book-a-table-section parallax-window" data-parallax="scroll" data-image-src="<?php echo esc_attr( $pageImg ); ?>">
      <div class="content-wrap  <?php echo esc_attr( $container_class_content ); ?>">
        <div class="cta <?php echo esc_attr($alignTxt); ?>">
          <?php
            if( get_the_title( $pageID ) ){
              echo '<h2>' . esc_html( get_the_title( $pageID ) ) . '</h2>';
            }
            if(  get_the_excerpt( $pageID ) ){
              echo '<p class="sub-title">' . esc_html( get_the_excerpt( $pageID ) ) . '</p>';
            }
            if( isset($btnLabel) ){
              echo '<a class="btn btn-sm animated-button thar-three inverted" href="' . esc_url( get_the_permalink( $pageID ) ) . '" >' . esc_html( $btnLabel ) . '</a>';
            }
          ?>
        </div>
      </div>
    </section>
