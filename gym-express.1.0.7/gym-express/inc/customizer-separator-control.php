<?php

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function gym_express_separator_customize_register( $wp_customize ) {

  class Gym_Express_Customize_Separator_Control extends WP_Customize_Control {
    public $type = 'sepatator_control';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
      <h2><?php echo esc_html( $this->label ); ?></h2>
    <?php
    }
  }


  if ( ! class_exists( 'Gym_Express_Customize_Control' ) ) {
		class Gym_Express_Customize_Control extends WP_Customize_Control {
			public $content = '';

			/**
			 * Constructor
			 */
			function __construct( $manager, $id, $args ) {
				// Just calling the parent constructor here
				parent::__construct( $manager, $id, $args );
			}

			/**
			 * This function renders the control's content.
			 */
			public function render_content() {
				echo $this->content;
			}
		}
	}


}
add_action( 'customize_register', 'gym_express_separator_customize_register' );
