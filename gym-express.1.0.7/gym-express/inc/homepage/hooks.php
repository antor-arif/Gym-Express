<?php
/**
 * Gym Express homepage hooks
 *
 * @package Gym Express
 */

 /*
 * HOMEPAGE
 */

add_action( 'homepage', 'gym_express_homepage_block_1', 		      10 );
add_action( 'homepage', 'gym_express_featured_products', 	        15 );
add_action( 'homepage', 'gym_express_homepage_cta', 		          20 );
add_action( 'homepage', 'gym_express_homepage_content', 		      40 );
add_action( 'homepage', 'gym_express_homepage_testimonials',      50);
add_action( 'homepage', 'gym_express_homepage_recent', 	          60 );
add_action( 'homepage', 'gym_express_recent_products', 	          70 );

add_action( 'homepage', 'gym_express_homepage_contact', 		      90 );
add_action( 'homepage', 'gym_express_homepage_map', 		          100 );
add_action( 'homepage', 'gym_express_homepage_gallery', 		      110 );
add_action( 'homepage', 'gym_express_popular_products', 	        115 );
