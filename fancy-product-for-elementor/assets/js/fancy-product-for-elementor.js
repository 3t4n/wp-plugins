( function( $ ) {
	/**
 	 * @param $scope The Widget wrapper element as a jQuery element
	 * @param $ The jQuery alias
	 */

	var WidgetFancyProductForElementorboxHandler = function( $scope, $ ) {

		$('.tp-few__wrapper').masonry({
			itemSelector: '.tp-few_item',
			percentPosition: true
		}).masonry('reload');
	

			function init() {
				var speed = 330,
					//easing = mina.backout;
					easing = mina.elastic();

				[].slice.call ( document.querySelectorAll( '.tp-few__wrapper > .tp-few_item' ) ).forEach( function( el ) {
					var s = Snap( el.querySelector( 'svg' ) ), path = s.select( 'path' ),
						pathConfig = {
							from : path.attr( 'd' ),
							to : el.getAttribute( 'data-path-hover' )
						};

					el.addEventListener( 'mouseenter', function() {
						path.animate( { 'path' : pathConfig.to }, speed, easing );
					} );

					el.addEventListener( 'mouseleave', function() {
						path.animate( { 'path' : pathConfig.from }, speed, easing );
					} );
				} );
			}

			init();


	};

	// Make sure you run this code under Elementor.
	$( window ).on( 'elementor/frontend/init', function() {
		elementorFrontend.hooks.addAction( 'frontend/element_ready/fancy-product-for-elementor.default', WidgetFancyProductForElementorboxHandler );
	} );
} )( jQuery );
