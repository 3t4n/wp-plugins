(function ($) {
	"use strict";

	/*------------------------------------
	Advance Food Filter
	-------------------------------------- */	
	$('.grid').imagesLoaded( function() {
		$('.menu-list').on( 'click', 'button', function() {
			var filterValue = $(this).attr('data-filter');
			$(this).addClass('active').siblings().removeClass('active');
			$grid.isotope({ filter: filterValue });
		});	
		var $grid = $('.grid').isotope({
			itemSelector: $grid,
			percentPosition: true,
			masonry: {
				columnWidth: $grid
			}
		});
	});
	
	/*------------------------------------
		Lightbox
	-------------------------------------- */
	$(window).on('load', function() {
        lightbox.option({
		  'resizeDuration': 200,
		  'wrapAround': true
		});
    });

	
	
    
}(jQuery));	