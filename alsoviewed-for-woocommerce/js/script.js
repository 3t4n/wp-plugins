var Extension;

;(function(window, document, $, undefined)
{

	'use strict';
	
	
	Extension = Extension || {
		alsoviewed: {},
	};
	
	
		// Initialize functions
	Extension.alsoviewed.init = function()
	{
		Extension.alsoviewed
			.bxSlider()
			 
		;
	};
	
	
		// Add Listeners
	Extension.alsoviewed.bxSlider = function()
	{
		 
  	$("#also-viewed-slider .slider-items").owlCarousel({
		items : 4, //10 items above 1000px browser width
		itemsDesktop : [1024,4], //5 items between 1024px and 901px
		itemsDesktopSmall : [900,3], // 3 items betweem 900px and 601px
		itemsTablet: [600,2], //2 items between 600 and 0;
		itemsMobile : [320,1],
		navigation : true,
		navigationText : ["<a class=\"flex-prev\"></a>","<a class=\"flex-next\"></a>"],
		slideSpeed : 500,
		pagination : false
	});
 

		return this;
	};


	// Job done, lets run.
	Extension.alsoviewed.init();

})(window, document, jQuery);