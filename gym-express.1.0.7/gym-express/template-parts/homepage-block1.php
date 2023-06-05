<?php
/**
 * Template part for displaying Block 1 section on homepage.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Gym Express
 */

  $pageID = get_theme_mod( 'gym_express_block1_page' );
  if( did_action( 'pll_init' ) && PLL() instanceof PLL_Frontend ){
    $translatedPageID = pll_get_post($pageID);
    if( $translatedPageID ){
      // if there is a translated page then use this instead.
      $pageID = $translatedPageID;
    }
  }
  $block1_image = get_the_post_thumbnail_url( $pageID );
  $block1_url = get_theme_mod( 'gym_express_block_1_btn_url' );
  $showLeft = get_theme_mod( 'gym_express_block_1_img_left' );
  $container_class_block1 = get_theme_mod( 'gym_express_homepage_container_class', true ) ? 'container' : 'fluid';

  if(! intval($pageID) ){
    return;
  }

?>

<section id="block-1" class="home-block homepage-block-1">
  <div class="content-wrap  <?php echo  esc_attr( $container_class_block1 ); ?>">
    <?php // user chose to show image on left of text.
    $showLeft = get_theme_mod('gym_express_block_1_img_left');

    if( $showLeft ){
      echo '<div class="six columns image"> <img src="' . esc_url( $block1_image ) . '" alt="' . esc_attr( get_the_title( $pageID ) ) . __(' featured image', 'gym-express') . '"/> </div>';
    } ?>

    <div class="six columns text-area">
      <?php

        $h2Class = '';
        $block1_subtitle = "";
        $readMore = __( 'Read more', 'gym-express' );

        if ( function_exists( 'gym_express_pro_customize_register' ) ) {
          $block1_subtitle = get_theme_mod('gym_express_pro_block1_sub-title');
          $readMore = get_theme_mod('gym_express_pro_block1_btn_txt', __( 'Read more', 'gym-express' ));
          $h2Class = 'hasPro';
        }

        if( intval($pageID) ){

          echo '<h2 class="' . $h2Class . '">' . esc_html( get_the_title( $pageID ) ) . '</h2>';
          if( $block1_subtitle ){
            echo '<p class="sub-title">' . esc_html( $block1_subtitle ) . '</p>';
          }

          if( has_excerpt( $pageID ) ){
            echo '<p class="description">' . esc_html( get_the_excerpt( $pageID ) ) . '</p>';
          }

        }
        if( intval($block1_url) ){
          echo '<a class="btn btn-sm animated-button thar-three" href="' . esc_url( get_the_permalink( $block1_url ) ) . '">' . esc_html( $readMore ) . '</a>';
        }
      ?>
    </div>

    <?php // default show image to the right of the text.
    if(! $showLeft ){
      echo '<div class="six columns image"> <img src="' . esc_url( $block1_image ) . '" alt="' . esc_attr( get_the_title( $pageID ) ) . __('featured image', 'gym-express') . '"/> </div>';
    }?>
  </div>
</section>
