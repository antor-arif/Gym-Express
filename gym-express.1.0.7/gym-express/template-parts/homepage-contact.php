<?php
/**
 * Template part for displaying the contact section on the homepage.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Gym Express
 */

  $container_class_contact = get_theme_mod( 'gym_express_homepage_container_class', true ) ? 'container' : 'fluid';

?>

<section id="contact" class="home-contact">
  <div class="content-wrap <?php echo esc_attr( $container_class_contact ); ?>">
    <?php
      get_sidebar('contact');
    ?>
  </div>
</section>
