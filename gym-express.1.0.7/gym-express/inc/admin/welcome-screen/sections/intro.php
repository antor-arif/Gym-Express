<?php
/**
 * Welcome screen intro template
 */
?>
<?php
	$my_theme = wp_get_theme();
	$version = $my_theme->get( 'Version' );
	$authorURI = $my_theme->get( 'AuthorURI' );
 ?>
<div class="col two-col" style="margin-bottom: 1.618em; overflow: hidden;">
	<div class="col-1">
		<h1 style="margin-right: 0;"><?php echo '<strong>Gym Express</strong> <sup style="font-weight: bold; font-size: 50%; padding: 5px 10px; color: #666; background: #fff;">' . esc_attr( $version ) . '</sup>'; ?></h1>

		<p style="font-size: 1.2em;"><?php esc_html( _e('Excellent! You\'ve activated Gym Express, we hope you enjoy the theme.', 'gym-express' ) ); ?></p>
		</p><?php _e( 'If you would like to see any features added or want to report bug with this theme, send us an email at <a href="mailto:support@templateexpress.com">support@templateexpress.com</a>.', 'gym-express' ); ?>

		<!-- DOCUMENTATION -->
		<h4><?php esc_html( _e( 'View documentation <span class="dashicons dashicons-welcome-learn-more"></span>', 'gym-express' ) ); ?></h4>
		<p><?php esc_html( _e( 'You can read detailed information on Gym Express\'s features and how to develop on top of it in the documentation.', 'gym-express' ) ); ?></p>
		<p><?php echo sprintf( esc_html('%1$sView documentation%2$s', 'gym-express'), '<a href="' . $authorURI . '/docs/gym-express" target="_blank" class="button">', '</a>'); ?></p>

	</div>

	<div class="col-2 last-feature">
		<img src="<?php echo esc_url( get_template_directory_uri() ) . '/screenshot.png'; ?>" alt="<?php esc_attr_e('Gym Express Screenshot', 'gym-express'); ?>" class="image-50" width="440" />
	</div>
</div>
