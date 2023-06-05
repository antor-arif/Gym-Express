<?php
/**
 * The template for displaying woocommerce pages.
 *
 * This is the template that displays woocommerce pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Gym Express
 */

$noSidebar = esc_attr( get_theme_mod( 'gym_express_sidebar_hide_page' ) );

get_header();

?>

<div class="row">

		<?php
			if( ! $noSidebar){
				echo '<div id="primary" class="content-area nine columns">';
			}else{
				echo '<div id="primary" class="content-area">';
			}
		 ?>
			<main id="main" class="site-main" role="main">
				<?php if ( have_posts() ) : ?>

					<?php
						if( is_product() ){
							do_action( 'gym_express_before_shop_loop_single' );
						}else{
							do_action( 'gym_express_before_shop_loop' );
						}
						/**
						 * woocommerce_before_shop_loop hook
						 *
						 * @hooked woocommerce_result_count - 20
						 * @hooked woocommerce_catalog_ordering - 30
						 */
						//do_action( 'woocommerce_before_shop_loop' );
					?>

					<?php woocommerce_product_loop_start(); ?>

						<?php woocommerce_product_subcategories(); ?>

						<?php while ( have_posts() ) : the_post(); ?>

							<?php
								if( is_product() ){
									wc_get_template_part( 'content', 'single-product' );
								}else{
									wc_get_template_part( 'content', 'product' );
								}
							?>

						<?php endwhile; // end of the loop. ?>

					<?php woocommerce_product_loop_end(); ?>

					<?php
						/**
						 * woocommerce_after_shop_loop hook
						 *
						 * @hooked woocommerce_pagination - 10
						 */
						do_action( 'woocommerce_after_shop_loop' );
					?>

				<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

					<?php wc_get_template( 'loop/no-products-found.php' ); ?>

				<?php endif; ?>

      </main><!-- #main -->
    </div><!-- #primary -->


    <?php
      if( ! $noSidebar ){
        get_sidebar('woocommerce');
      }
    ?>

</div> <!-- .row -->

<?php
get_footer();
