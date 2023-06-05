<?php
/**
 * Template part for displaying gallery section on homepage.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Gym Express
 */

 // check for Enjoy Plugin for Instagram
if (! class_exists( 'Settings_enjoyinstagram_Plugin' ) ) {
   //End if no active plugin
   return;
 }

$galleryTitle = get_theme_mod('gym_express_instagram_title');
$galleryShortcode = get_theme_mod('gym_express_instagram_shortcode');

?>

<section id="gallery" class="home-gallery fullwidth">
  <?php
    if($galleryTitle){
      echo '<h2 class="text-center">' . esc_html( $galleryTitle ) . '</h2>';
    }
    echo wp_kses( do_shortcode( $galleryShortcode ), 'post');
  ?>
</section>
