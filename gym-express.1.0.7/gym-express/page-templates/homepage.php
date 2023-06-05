<?php
/**
 * Template Name: Homepage
 *
 * Template for displaying the homepage.
 *
 * @package Gym Express
 */

get_header(); ?>

<?php
  if ( is_active_sidebar( 'gym_express_homepage_before' ) ) {
    dynamic_sidebar( 'gym_express_homepage_before' );
  }
?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
      <?php
        do_action('homepage');
      ?>
    </main><!-- #main -->
  </div><!-- #primary -->

<?php
  if ( is_active_sidebar( 'gym_express_homepage_after' ) ) {
    dynamic_sidebar( 'gym_express_homepage_after' );
  }
?>

<?php get_footer(); ?>
