<?php
/**
 * General functions used to integrate this theme homepage
 *
 * @package Gym Express
 */

 function gym_express_homepage_testimonials() {

     get_template_part( 'template-parts/homepage', 'testimonials' );

 }
 function gym_express_featured_products() {

     get_template_part( 'template-parts/homepage', 'featured-products' );

 }
 function gym_express_popular_products() {

     get_template_part( 'template-parts/homepage', 'popular-products' );

 }
 function gym_express_homepage_recent() {

     get_template_part( 'template-parts/homepage', 'recent' );

 }
 function gym_express_homepage_menu() {

     get_template_part( 'template-parts/homepage', 'menu' );

 }
function gym_express_homepage_block_1() {

    get_template_part( 'template-parts/homepage', 'block1' );

}
function gym_express_homepage_cta() {

    get_template_part( 'template-parts/homepage', 'cta' );

}
function gym_express_recent_products() {

    get_template_part( 'template-parts/homepage', 'recent-products' );

}
function gym_express_homepage_gallery() {

    get_template_part( 'template-parts/homepage', 'gallery' );

}
function gym_express_homepage_contact() {

    get_template_part( 'template-parts/homepage', 'contact' );

}

function gym_express_homepage_map() {

    get_template_part( 'template-parts/homepage', 'map' );

}

function gym_express_homepage_content() {
  while ( have_posts() ) : the_post();

    get_template_part( 'template-parts/content', 'homepage' );

  endwhile; // End of the loop.
}
