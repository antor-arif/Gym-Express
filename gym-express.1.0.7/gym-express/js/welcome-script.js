/**
 * File navigation.js.
 *
 * @since 0.8.2
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
 
( function($) {

	$( 'div.panel' ).hide();
	$( 'div#getting_started' ).show();

	$( '.nav-tab-wrapper a' ).click( function() {

		var tab = $( this );
		var	tabs_wrapper = tab.closest( '.about-wrap' );

		$( '.nav-tab-wrapper a', tabs_wrapper ).removeClass( 'nav-tab-active' );
		$( 'div.panel', tabs_wrapper ).hide();
		$( 'div' + tab.attr( 'href' ), tabs_wrapper ).show();
		tab.addClass( 'nav-tab-active' );

		return false;
	});

} )( jQuery );
