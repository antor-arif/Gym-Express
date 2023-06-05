<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Gym Express
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body id="top" <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'gym-express' ); ?></a>

	<?php
		$useHeaderImg = get_theme_mod('gym_express_use_header_image');
		$hidehero = get_theme_mod('gym_express_hide_hero', true );
		$displayImgWoo = get_theme_mod('gym_express_woo_header_image', false );
		$heroPageID = get_theme_mod( 'gym_express_hero_page_id' );
		$showbackgroundColor = get_theme_mod( 'gym_express_only_bg_color' );
		$postthumb = get_the_post_thumbnail_url();
		$showHeadImgWoo = false;
		$heroBGImg = false;

		//IF STATIC PAGE AND IS HOMEPAGE

		if ( $heroPageID && ! $hidehero) {
			$heroBGImg = get_the_post_thumbnail_url( $heroPageID );
		}

		if( gym_express_is_woocommerce_activated()){
			$showHeadImgWoo = ( is_product() && $displayImgWoo ) ? true : false;
		}

		if( $showbackgroundColor ){
				echo '<header id="masthead" class="site-header no-image" role="banner">';
		}else{

			if( $showHeadImgWoo && has_header_image()){

				/* IF WOOCOMMERCE PRODUCT PAGE AND SET TO SHOW HEADER IMAGE INSTEAD OF PRODUCT IMG */
				echo '<header id="masthead" class="site-header parallax-window has-header-image" data-parallax="scroll" data-image-src="'. esc_url(get_header_image()) . '" role="banner">';

			}elseif( is_page_template( 'page-templates/homepage.php' ) ){
				/* IF CUSTOM HOMEPAGE TEMPLATE */

				if( $heroBGImg ){

					/* IF HOMEPAGE AND SHOWING HERO SECTION */
					echo '<header id="masthead" class="site-header parallax-window hero-image featured-image" data-parallax="scroll" data-image-src="'. esc_url( $heroBGImg ) . '" role="banner">';

				}elseif( has_header_image() ){

					/* IF HAS HEADER IMAGE */
					echo '<header id="masthead" class="site-header parallax-window has-header-image" data-parallax="scroll" data-image-src="'. esc_url(get_header_image()) . '" role="banner">';

				}else{

					/* NO IMAGE JUST SHOW COLOR */
					echo '<header id="masthead" class="site-header default-header-color">';

				}

			}elseif( has_post_thumbnail() && ! $useHeaderImg ){

				/* IF HAS FEATURED IMAGE AND NOT SET TO SHOW HEADER IMAGE */
				echo '<header id="masthead" class="site-header parallax-window has-header-image featured-image" data-parallax="scroll" data-image-src="'. esc_url( $postthumb ) . '" role="banner">';

			}elseif( has_header_image() ){

				/* IF HAS HEADER IMAGE */
				echo '<header id="masthead" class="site-header parallax-window has-header-image" data-parallax="scroll" data-image-src="'. esc_url(get_header_image()) . '" role="banner">';

			}else{

				/* NO IMAGE JUST SHOW COLOR */
				echo '<header id="masthead" class="site-header default-header-color">';

			}
		}

 		$container_class_header = get_theme_mod( 'gym_express_header_container_class', false ) ? 'container' : 'fluid';

	?>
		<div class="site-header__content <?php echo esc_attr( $container_class_header ); ?>">

<?php
		if( has_nav_menu( 'social' ) || has_nav_menu( 'contact' ) ){

			echo '<div class="row pre-head">';

					if ( has_nav_menu( 'contact' ) ) {
						gym_express_get_contact_menu();
					}

					if ( has_nav_menu( 'social' ) ) {
						gym_express_get_social_menu();
					}

					if( gym_express_is_woocommerce_activated() ){
						echo '<div class="top-bar-mini-cart two columns">';
							do_action( 'gym_express_header_cart' );
						echo '</div>';
					}


			echo '</div>';

		}
?>


		<div class="row">
			<?php
					echo '<div class="site-branding">';

					if ( function_exists( 'the_custom_logo' ) ) {
						the_custom_logo();
					}

					if ( (is_front_page() && is_home()) ||  is_front_page() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<h2 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
					<?php endif;

					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
					<?php
					endif;

					?>
				</div><!-- .site-branding -->

				<nav id="site-navigation" class="main-navigation" role="navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
						<span class="bars"></span>
						<span class="bars"></span>
						<span class="bars"></span>
					</button>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
				</nav><!-- #site-navigation -->

		</div><!-- .row -->

		<?php
			// If hero not set to hide and is custom homepage
			$hideHero = esc_attr( get_theme_mod( 'gym_express_hide_hero' ), false );
			if ( is_page_template( 'page-templates/homepage.php' ) && ! $hideHero ){
				get_template_part( 'template-parts/homepage', 'hero' );
			}
		?>

	</div><!-- .site-header__content -->


	</header><!-- #masthead -->
<?php $container_class_content = get_theme_mod( 'gym_express_content_container_class', true ) ? 'container' : 'fluid' ?>
<?php if ( is_page_template( 'page-templates/homepage.php' ) ) : ?>
	<div id="content" class="site-content">
<?php else: ?>
	<div id="content" class="site-content <?php echo esc_attr( $container_class_content ); ?>">
<?php endif; ?>
