<?php
/**
 * Welcome screen add-ons template
 */
?>
<div id="add_ons" class="gym-express-add-ons panel" style="padding-top: 1.618em; clear: both;">
	<h2><?php echo sprintf( esc_html__( 'Go further with %1$sGym Express Pro%2$s', 'gym-express' ), '<strong>', '</strong>'); ?></h2>

	<p class="tagline">
		<?php echo sprintf( esc_html__( 'Below is a selection of all the wonderful features you can enjoy with %1$sGym Express Pro%2$s', 'gym-express' ), '<strong>', '</strong>'); ?>
	</p>

	<div class="add-on">
		<h4><?php esc_html( _e( 'Premium Support Access', 'gym-express' ) ); ?></h4>
		<div class="content">
			<ul>
				<li><?php esc_html( _e('<span class="dashicons dashicons-plus"></span> Fast and in-depth Support Access', 'gym-express') ); ?></li>
				<li><?php esc_html( _e('<span class="dashicons dashicons-plus"></span> More theme options', 'gym-express') ); ?></li>
				<li><?php esc_html( _e('<span class="dashicons dashicons-plus"></span> Free Future updates', 'gym-express') ); ?></li>
				<li><?php esc_html( _e('<span class="dashicons dashicons-plus"></span> Simple updates', 'gym-express') ); ?></li>
			</ul>
			<p><?php  esc_html( _e( 'Template Express prides itself on its quick and comprehensive support network. With the pro version you have access to our support forums.' , 'gym-express' ) );?></p>
			<p><?php echo sprintf( esc_html__( '%1$sMore Info%2$s', 'gym-express' ), '<a target="_blank" href="https://www.templateexpress.com/gym-express-pro-theme" class="button button-primary">', '</a>'); ?></p>
		</div>
	</div>

	<hr style="clear: both;" />

	<p style="font-size: 1.2em; margin: 2.618em 0;">
		<?php echo sprintf( esc_html__( 'Don\'t forget that when you purchase Gym Express Pro you will recieve automatic updates and premium support for 12 months. You can also use the theme on as many sites as you need. %1$sFind out More%2$s.', 'gym-express' ), '<a target="_blank" href="http://www.templateexpress.com/gym-express-pro-theme">', '</a>' ); ?>
	</p>
</div>
