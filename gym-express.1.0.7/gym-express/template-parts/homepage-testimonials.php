<?php

  // check for Good Reviews WP
  if ( ! class_exists('grfwpInit') ) {
    //End if no active plugin
    return;
  }

  $testimonialTitle = get_theme_mod('gym_express_testimonial_title', __('Our Happy Customers', 'gym-express'));
  $testimonialSubTitle = get_theme_mod('gym_express_testimonial_sub_title', __('read testimonials', 'gym-express'));
  $testShortcode = get_theme_mod('gym_express_testimonial_shortcode', __( '[good-reviews limit=5]', 'gym-express') );
  $container_class_testimonials = get_theme_mod( 'gym_express_homepage_container_class', true ) ? 'container' : 'fluid';
  $backgroundImg = get_theme_mod('gym_express_testimonial_bg_img');
  $asParallax = get_theme_mod( 'testimonial_bg_parallax', false );
?>

<section id="testimonials" class="testimonial-section <?php if($backgroundImg){ echo 'hasImg'; } ?>">

<?php

  if($backgroundImg){
    if( $asParallax ){
      echo '<div class="testimonial-bg parallax-window" data-parallax="scroll" data-image-src="' . $backgroundImg . '">';
    }else{
      echo '<div class="testimonial-bg" style="background-image:url(' . $backgroundImg . ')!important;">';
    }
  }else{
    echo '<div class="testimonial-bg">';
  }

?>
    <div class="content-wrap <?php echo esc_attr( $container_class_testimonials ); ?>">

      <h5><?php echo esc_html( $testimonialSubTitle ); ?></h5>
      <h2><?php echo esc_html( $testimonialTitle ); ?></h2>

      <div class="<?php if($backgroundImg){ echo 'four'; }else{ echo 'six';} ?> columns slides">
        <?php echo wp_kses( do_shortcode( $testShortcode ), 'post'); ?>
      </div>


    </div>

  </div>

</section>
