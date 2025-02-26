( function( $ ) {
	/**
 	 * @param $scope The Widget wrapper element as a jQuery element
	 * @param $ The jQuery alias
	 */ 
	
	// Make sure you run this code under Elementor.
	$( window ).on( 'elementor/frontend/init', function() {
		elementorFrontend.hooks.addAction( 'frontend/element_ready/elementor-testimonial-post-list.default', function($scope, $){
			jQuery('.testimonial-layout-1').owlCarousel({
				loop:true,
				nav:false,
				items: 1,
				dots: true
			})
		
			jQuery('.testimonial-layout-2').owlCarousel({
				loop:false,
				nav:false,
				margin:40,
				dots: true,
				responsive:{
					0:{
						items:1
					},
					768:{
						items:2
					}
				}
			})
	
		});} );
} )( jQuery );
