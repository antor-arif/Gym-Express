<?php
/**
 * Template part for displaying map section on homepage.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Gym Express
 */

 // check for WP Google Maps
 if ( ! function_exists( 'wpgmaps_activate' ) ) {
   //End if no active plugin
   return;
 }

  $showMap = get_theme_mod('map_show');
  $mapShortcode = get_theme_mod('map_section_shortcode');

  if(! empty($showMap)){

    // Show Google Map if shortcode exists
    if( ! empty($mapShortcode)){
      echo '<div class="map-section" id="map">';
        echo wp_kses( do_shortcode( $mapShortcode ), 'post');
      echo '</div>';
    }else{
      echo '<div class="map-section no-shortcode" id="map">';
        echo '<h2 class="error">' . __('Add map Shortcode to customizer', 'gym-express') . '</h2>';
      echo '</div>';
    }

  }

?>
