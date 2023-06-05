/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

 $('input[data-input-type]').on('input change', function () {
		 var val = $(this).val();
		 $(this).prev('.cs-range-value').html(val);
		 $(this).val(val);
 });

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	// Hero Title.
	wp.customize( 'gym_express_hero_title', function( value ) {
		value.bind( function( to ) {
			$( '.hero-section h2' ).text( to );
		} );
	} );
	// Hero sub-title
	wp.customize( 'gym_express_hero_sub_title', function( value ) {
		value.bind( function( to ) {
			$( '.hero-section h3' ).text( to );
		} );
	} );
	// Hero primary button Label
	wp.customize( 'gym_express_hero_primary_btn_label', function( value ) {
		value.bind( function( to ) {
			$( '.primary-label' ).text( to );
		} );
	} );
	// Hero secondary button label
	wp.customize( 'gym_express_hero_secondary_btn_label', function( value ) {
		value.bind( function( to ) {
			$( '.secondary-label' ).text( to );
		} );
	} );

	// Homepage Gym Menu Title
	wp.customize( 'gym_express_menu_title', function( value ) {
		value.bind( function( to ) {
			$( '.homepage-menu h2' ).text( to );
		} );
	} );
	// Homepage Gym Menu Sub-Title
	wp.customize( 'gym_express_menu_subtitle', function( value ) {
		value.bind( function( to ) {
			$( '.homepage-menu .sub-title' ).text( to );
		} );
	} );
	// Homepage Gym Menu tagline
	wp.customize( 'gym_express_menu_tagline', function( value ) {
		value.bind( function( to ) {
			$( '.homepage-menu .tagline' ).text( to );
		} );
	} );
	// Homepage Gym Menu link Label
	wp.customize( 'gym_express_menu_label', function( value ) {
		value.bind( function( to ) {
			$( '.homepage-menu .btn' ).text( to );
		} );
	} );


	// Homepage Block 1 title
	wp.customize( 'gym_express_block_1_title', function( value ) {
		value.bind( function( to ) {
			$( '.homepage-block-1 h2' ).text( to );
		} );
	} );
	// Homepage Block 1 sub-title
	wp.customize( 'gym_express_block_1_subtitle', function( value ) {
		value.bind( function( to ) {
			$( '.homepage-block-1 .sub-title' ).text( to );
		} );
	} );
	// Homepage Block 1 description
	wp.customize( 'gym_express_block_1_description', function( value ) {
		value.bind( function( to ) {
			$( '.homepage-block-1 .description' ).text( to );
		} );
	} );
	// Homepage Block 1 button label
	wp.customize( 'gym_express_block_1_label', function( value ) {
		value.bind( function( to ) {
			$( '.homepage-block-1 .btn' ).text( to );
		} );
	} );
	// Homepage Testimonial Title
	wp.customize( 'gym_express_testimonial_title', function( value ) {
		value.bind( function( to ) {
			$( '.testimonial-section h2' ).text( to );
		} );
	} );
  // Homepage Testimonial Sunb Title
	wp.customize( 'gym_express_testimonial_sub_title', function( value ) {
		value.bind( function( to ) {
			$( '.testimonial-section h5' ).text( to );
		} );
	} );

	// Homepage Recent posts Title
	wp.customize( 'gym_express_recent_title', function( value ) {
		value.bind( function( to ) {
			$( '.home-recent-posts h2' ).text( to );
		} );
	} );
	// Homepage Recent posts Sub-Title
	wp.customize( 'gym_express_recent_section_subtitle', function( value ) {
		value.bind( function( to ) {
			$( '.home-recent-posts .sub-title' ).text( to );
		} );
	} );

  // Homepage Promo Bar Title
	wp.customize( 'gym_express_promo_bar_title', function( value ) {
		value.bind( function( to ) {
			$( '.book-a-table-section h2' ).text( to );
		} );
	} );
	// Homepage Promo Bar button Label
	wp.customize( 'gym_express_promo_bar_label', function( value ) {
		value.bind( function( to ) {
			$( '.book-a-table-section .btn' ).text( to );
		} );
	} );

	// Homepage Instagram Title
	wp.customize( 'gym_express_instagram_title', function( value ) {
		value.bind( function( to ) {
			$( '.home-gallery h2' ).text( to );
		} );
	} );

	// Homepage Contact Section Title
	wp.customize( 'contact_section_title', function( value ) {
		value.bind( function( to ) {
			$( '.home-contact h2' ).text( to );
		} );
	} );
	// Homepage Contact Section Title
	wp.customize( 'contact_section_opening_hours', function( value ) {
		value.bind( function( to ) {
			$( '.home-contact .opening-hours' ).html( to );
		} );
	} );


  //Header image overlay.
  wp.customize( 'gym_express_only_bg_color', function( value ){
    if(! value){

      $( '.site-header:before' ).css( {
        'opacity': 1
      } );

      wp.customize( 'gym_express_header_overlay', function( value ) {
    		value.bind( function( to ) {
    			$( 'header.site-header:before' ).css( {
    				'opacity': to
    			} );
    		} );
    	} );

    }
  });


 /*
  * CUSTOMIZER colors
 */
  var handleHoverStyles, adjustBrightness;

  handleHoverStyles = function(style_id, selector, property, value ){
    var style, el;

    style = '<style class="' + style_id + '">' + selector + ' { ' + property + ': ' + value + ' !important; }</style>'; // build the style element
    el = $( '.' + style_id ); // look for a matching style element that might already be there

    if ( el.length ) {
      el.replaceWith( style ); // style element already exists, so replace it
    } else {
      $( 'head' ).append( style ); // style element doesn't exist so add it
    }
  };

  adjustBrightness = function adjustBrightness(color, steps) {
    var usePound = false;

    if (color[0] == "#") {
      color = color.slice(1);
      usePound = true;
    }

    var R = parseInt(color.substring(0,2),16);
    var G = parseInt(color.substring(2,4),16);
    var B = parseInt(color.substring(4,6),16);

    R = R + steps;
    G = G + steps;
    B = B + steps;

    if (R > 255) R = 255;
    else if (R < 0) R = 0;

    if (G > 255) G = 255;
    else if (G < 0) G = 0;

    if (B > 255) B = 255;
    else if (B < 0) B = 0;

    var RR = ((R.toString(16).length==1)?"0"+R.toString(16):R.toString(16));
    var GG = ((G.toString(16).length==1)?"0"+G.toString(16):G.toString(16));
    var BB = ((B.toString(16).length==1)?"0"+B.toString(16):B.toString(16));

    return (usePound?"#":"") + RR + GG + BB;
  }

  // Header txt color
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-header .site-branding .site-title, .site-header .site-branding .site-title a, .site-branding .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );


  // Text color
  wp.customize( 'gym_express_color_on_light', function( value ) {
    value.bind( function( to ) {
      $( 'body' ).css( { 'color': to } );
    } );
  } );

  // Headings color
  wp.customize( 'gym_express_title_color_on_light', function( value ) {
    value.bind( function( to ) {
      $( 'h1, h2, h3, h4, h5, h6' ).css( { 'color': to } );
      $('h1:after, h2:after, h3:after, h4:after, h5:after, h6:after').css({
        'border-color': to
      });
    } );
  } );

  // Title color on Dark
  wp.customize( 'gym_express_title_color_on_dark', function( value ) {
    value.bind( function( to ) {
      $( 'a.btn, .page-template-homepage .btn, .book-a-table-section .cta a, a.btn:hover, a.btn:focus, a.btn:active, .button, button, input[type=submit], input[type=reset], input[type=button], #pirate-forms-contact-submit' ).css( { 'color': to } );
    } );
  } );

  // Text color on Dark
  wp.customize( 'gym_express_text_color_on_dark', function( value ) {
    value.bind( function( to ) {
      $( '.site-footer, .site-footer h2, .site-footer h3, .site-footer h4' ).css( { 'color': to } );
    } );
  } );




} )( jQuery );
