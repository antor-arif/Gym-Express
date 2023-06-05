<?php

  if ( gym_express_is_woocommerce_activated() ) {
    $args = array(
      'limit' 			=> 4,
      'columns' 			=> 4,
      'orderby'			=> 'date',
      'order'				=> 'desc'
    );

  echo '<section id="recent-products" class="product-section">';

      echo '<div class="content-wrap container">';

         echo '<h2 class="section-title">' . __('New <span>Products</span>', 'gym-express') . '</h2>';

         echo '<div id="recent_products">';
          	do_action( 'gym_express_homepage_before_recent_products' );
              echo gym_express_do_shortcode_func( 'recent_products',
                array(
                  'per_page' 	  => intval( $args['limit'] ),
                  'columns'	    => intval( $args['columns'] ),
                )
              );
          	do_action( 'gym_express_homepage_after_recent_products' );
          echo '</div>';

      echo '<div>';

    echo '</section>';
  }
