<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Gym Express
 */

if ( ! function_exists( 'gym_express_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function gym_express_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( 'Posted on %s', 'post date', 'gym-express' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'gym-express' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'gym_express_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function gym_express_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'gym-express' ) );
		if ( $categories_list && gym_express_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'gym-express' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'gym-express' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'gym-express' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'gym-express' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'gym-express' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function gym_express_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'gym_express_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'gym_express_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so gym_express_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so gym_express_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in gym_express_categorized_blog.
 */
function gym_express_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'gym_express_categories' );
}
add_action( 'edit_category', 'gym_express_category_transient_flusher' );
add_action( 'save_post',     'gym_express_category_transient_flusher' );


/**
 * Display Header Cart
 * @since  0.8
 * @uses  gym_express_is_woocommerce_activated() check if WooCommerce is activated
 * @return void
 */
if ( ! function_exists( 'gym_express_header_cart' ) ) {
	function gym_express_header_cart() {
		if ( gym_express_is_woocommerce_activated() ) {
			if ( is_cart() ) {
				$class = 'current-menu-item';
			} else {
				$class = '';
			}
		?>
		<ul class="site-header-cart menu">
			<li class="<?php echo esc_attr( $class ); ?>">
				<?php gym_express_cart_link(); ?>
			</li>
		</ul>
		<?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
		<?php
		}
	}
}
/**
 * Display Header Cart
 * @since  0.8
 * @uses  gym_express_is_woocommerce_activated() check if WooCommerce is activated
 * @return void
 */
if ( ! function_exists( 'gym_express_mini_cart' ) ) {
	function gym_express_mini_cart() {
		if( gym_express_is_woocommerce_activated() ){
		?>
			<div class="cart-link">
				<?php
						gym_express_cart_link();
						the_widget( 'WC_Widget_Cart', 'title=' );
				?>
			</div>
		<?php
		}
	}
}

/**
 * Display html
 * @since  0.8
 * @uses  gym_express_is_woocommerce_activated() check if WooCommerce is activated
 * @return void
 */
if ( ! function_exists( 'gym_express_header_add_to_cart_fragment' ) ) {
	function gym_express_header_add_to_cart_fragment( $fragments ) {
		if( gym_express_is_woocommerce_activated() ){
			global $woocommerce;
			ob_start();
			?>
			<a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'gym-express' ); ?>">
				<?php echo sprintf( _n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'gym-express'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?>
				<i class="fa fa-shopping-cart"></i>
			</a>
			<?php

			$fragments['a.cart-contents'] = ob_get_clean();

			return $fragments;

		}
	}
}


/**
 * Cart Link
 * Displayed a link to the cart including the number of items present and the cart total
 * @param  array $settings Settings
 * @return array           Settings
 * @since  0.8
 */
if ( ! function_exists( 'gym_express_cart_link' ) ) {
	function gym_express_cart_link() {
		?>
			<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php echo esc_attr( __('View your shopping cart', 'gym-express') ); ?>">
				<?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?> <span class="amount"><?php echo wp_kses_data( sprintf( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'gym-express' ), WC()->cart->get_cart_contents_count() ) );?></span>
				<i class="fa fa-shopping-cart"></i>
			</a>
		<?php
	}
}
