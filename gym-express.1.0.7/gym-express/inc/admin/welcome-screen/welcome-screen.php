<?php
/**
 * Welcome Screen Class
 * Sets up the welcome screen page, hides the menu item
 * and contains the screen content.
 */
class gym_express_Welcome {

	/**
	 * Constructor
	 * Sets up the welcome screen
	 */
	public function __construct() {

		add_action( 'admin_menu', array( $this, 'gym_express_welcome_register_menu' ) );
		add_action( 'load-themes.php', array( $this, 'gym_express_activation_admin_notice' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'gym_express_welcome_style' ) );

		add_action( 'gym_express_welcome', array( $this, 'gym_express_welcome_intro' ), 			10 );
		add_action( 'gym_express_welcome', array( $this, 'gym_express_welcome_tabs' ), 				20 );
		add_action( 'gym_express_welcome', array( $this, 'gym_express_welcome_getting_started' ), 	30 );
		add_action( 'gym_express_welcome', array( $this, 'gym_express_welcome_pro' ), 				40 );
		add_action( 'gym_express_welcome', array( $this, 'gym_express_welcome_who' ), 				60 );

	} // end constructor

	/**
	 * Adds an admin notice upon successful activation.
	 * @since 0.1
	 */
	public function gym_express_activation_admin_notice() {
		global $pagenow;

		if ( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) { // input var okay
			add_action( 'admin_notices', array( $this, 'gym_express_welcome_admin_notice' ), 99 );
		}
	}

	/**
	 * Display an admin notice linking to the welcome screen
	 * @since 0.1
	 */
	public function gym_express_welcome_admin_notice() {
		?>
			<div class="updated notice is-dismissible">
				<p><?php echo sprintf( esc_html__( 'Thanks for choosing Gym Express! Learn how to get the most out of your new theme on the %1$swelcome screen%2$s.', 'gym-express' ), '<a href="' . esc_url( admin_url( 'themes.php?page=gym-express-welcome' ) ) . '">', '</a>' ); ?></p>
				<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=gym-express-welcome' ) ); ?>" class="button" style="text-decoration: none;"><?php _e( 'Get started with Gym Express', 'gym-express' ); ?></a></p>
			</div>
		<?php
	}

	/**
	 * Load welcome screen css
	 * @return void
	 * @since  0.1
	 */
	public function gym_express_welcome_style() {
		global $gym_express_version;
		wp_enqueue_style( 'gym-express-welcome-screen', get_template_directory_uri() . '/inc/admin/css/welcome.css', $gym_express_version );
	}

	/**
	 * Creates the dashboard page
	 * @see  add_theme_page()
	 * @since 1.0.0
	 */
	public function gym_express_welcome_register_menu() {
		add_theme_page( __('Gym Express Theme', 'gym-express'), __('Gym Express Theme', 'gym-express'), 'read', 'gym-express-welcome', array( $this, 'gym_express_welcome_screen' ) );
	}

	/**
	 * The welcome screen
	 * @since 1.0.0
	 */
	public function gym_express_welcome_screen() {
		?>
		<div class="wrap about-wrap">

			<?php
			/**
			 * @hooked gym_express_welcome_intro - 10
			 * @hooked gym_express_welcome_getting_started - 20
			 * @hooked gym_express_welcome_pro - 30
			 * @hooked gym_express_welcome_who - 40
			 */
			do_action( 'gym_express_welcome' ); ?>

		</div>
		<?php
	}

	/**
	 * Welcome screen intro
	 * @since 1.0.0
	 */
	public function gym_express_welcome_intro() {
		get_template_part( 'inc/admin/welcome-screen/sections/intro' );
	}

	/**
	 * Welcome screen intro
	 * @since 1.4.4
	 */
	 public function gym_express_welcome_tabs() {
	 	get_template_part( 'inc/admin/welcome-screen/sections/tabs' );
	 }

	/**
	 * Welcome screen about section
	 * @since 1.0.0
	 */
	public function gym_express_welcome_who() {
		get_template_part( 'inc/admin/welcome-screen/sections/who' );
	}

	/**
	 * Welcome screen getting started section
	 * @since 1.0.0
	 */
	public function gym_express_welcome_getting_started() {
		get_template_part( 'inc/admin/welcome-screen/sections/getting-started' );
	}

	/**
	 * Welcome screen add ons
	 * @since 1.0.0
	 */
	public function gym_express_welcome_pro() {
		get_template_part( 'inc/admin/welcome-screen/sections/pro' );
	}

}

$GLOBALS['gym_express_Welcome'] = new gym_express_Welcome();
