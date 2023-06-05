<?php
/**
 * Template part for displaying hero section on homepage.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Gym Express
 */

  $pageID = get_theme_mod( 'gym_express_hero_page_id' );
  if( did_action( 'pll_init' ) && PLL() instanceof PLL_Frontend ){
    $translatedPageID = pll_get_post($pageID);
    if( $translatedPageID ){
      // if there is a translated page then use this instead.
      $pageID = $translatedPageID;
    }
  }
  $primaryBtnID = get_theme_mod( 'gym_express_hero_btn_one' );
  $hidehero = get_theme_mod('gym_express_hide_hero', true );

  if(! $hidehero ){

    echo '<div id="hero" class="hero-section">';
      // Only show if checkbox to show is checked.
      if( get_theme_mod( 'gym_express_show_hero_title') ){
        echo '<div class="hero-txt">';
        echo '<h2>' . esc_html( get_the_title( $pageID ) ) . '</h2>';
        echo '<h3>' . esc_html( get_the_excerpt( $pageID ) ) . '</h3>';
        echo '</div>';
      }
      if( intval( $primaryBtnID ) ){
        echo '<div class="cta-btns">';
            echo '<a class="btn btn-sm animated-button victoria-one" href="' . esc_url( get_the_permalink( $primaryBtnID ) ) . '">' . esc_html( get_the_title( $primaryBtnID ) ) . '</a>';
        echo '</div>';
      }

    echo '</div>';

  }

?>
