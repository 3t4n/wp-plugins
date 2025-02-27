
(function( $ ) {
	
	"use strict";
	
	$( document ).ready(function() {
		
	}); // document ready end
	
	/* Image Compare Handler */
	var wptd_imgc_handler = function( $scope, $ ) {
		$scope.find('.wptd-imgc-wrap').each(function() {
			wptd_image_compare( this );
		});	
	};
	
	// Make sure you run this code under Elementor.
	$( window ).on( 'elementor/frontend/init', function() {
		elementorFrontend.hooks.addAction( 'frontend/element_ready/wptdimgc.default', wptd_imgc_handler );
	} );
	
	function wptd_image_compare( c_imgc ){
		
		var c_imgc = $( c_imgc );		
	
		var _offset = c_imgc.attr("data-offset") ? c_imgc.attr("data-offset") : 0.5;
		var _orientation = c_imgc.attr("data-orientation") ? c_imgc.attr("data-orientation") : 'horizontal';
		var _before = c_imgc.attr("data-before") ? c_imgc.attr("data-before") : '';
		var _after = c_imgc.attr("data-after") ? c_imgc.attr("data-after") : '';
		var _noverlay = c_imgc.attr("data-noverlay") ? c_imgc.attr("data-noverlay") : false;
		var _hover = c_imgc.attr("data-hover") ? c_imgc.attr("data-hover") : false;
		var _swipe = c_imgc.attr("data-swipe") ? c_imgc.attr("data-swipe") : false;
		var _move = c_imgc.attr("data-move") ? c_imgc.attr("data-move") : false;
		
		c_imgc.wptdimgc({
			default_offset_pct: _offset, // How much of the before image is visible when the page loads
			orientation: _orientation, // Orientation of the before and after images ('horizontal' or 'vertical')
			before_label: _before, // Set a custom before label
			after_label: _after, // Set a custom after label
			no_overlay: _noverlay, //Do not show the overlay with before and after
			move_slider_on_hover: _hover, // Move slider on mouse hover?
			move_with_handle_only: _swipe, // Allow a user to swipe anywhere on the image to control slider movement. 
			click_to_move: _move // Allow a user to click (or tap) anywhere on the image to move the slider to that location.
		});
		
	}
				
})( jQuery );

