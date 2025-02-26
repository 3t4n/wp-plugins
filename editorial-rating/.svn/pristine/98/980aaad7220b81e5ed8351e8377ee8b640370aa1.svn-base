(function ($) {
	'use strict';

	$(document).ready(function(){

		var wpasHasBarAnimation = $(".wpas--rating-wrap").data("baranim");

		// Editorial Rating Progress Bar Animation
		if ( wpasHasBarAnimation ) {
			
			$(".wpas--rating-categories").find(".wpas--rating-bar").each(function() {
				
				var ewrBarWidth = $(this).css("width");
				$(this).css("width", "0");
				$(this).animate({width: ewrBarWidth}, 1200 );
			});
		}

		// Editorial Rating Circle Animation. (Theme 3)
		$(".frhd-er-progress").each(function () {

			var wpasPercent = $(this).data('percentage')
			var wpasDegrees = (360/100)*wpasPercent;

			var wpasLeft = $(this).children('.frhd-er-progress-left').first().children().first();
			var wpasRight = $(this).children('.frhd-er-progress-right').first().children().first();

			if ( wpasPercent <= 50 ) {

				// wpasRight.css({ transform: 'rotate('+wpasDegrees+'deg)' });
				wpasRight.animate({ deg: wpasDegrees }, { duration: 1200,
					step: function(wpasDegrees) {

						$(this).css({ transform: 'rotate(' + wpasDegrees + 'deg)' });
					}
				});
				wpasLeft.css({ transform: 'rotate(0deg)' });
			} else {

				// wpasRight.css({ transform: 'rotate(180deg)' });
				// wpasLeft.css({ transform: 'rotate('+wpasDegrees/2+'deg)' });

				wpasRight.animate({ deg: 180 }, { duration: 1200,
					step: function(now) {

						$(this).css({ transform: 'rotate(' + now + 'deg)' });
					}
				});

				wpasLeft.delay(1100).animate({ deg: wpasDegrees }, { duration: 1200,
					step: function(wpasDegrees) {

						$(this).css({ transform: 'rotate(' + (wpasDegrees / 2) + 'deg)' });
					}
				});
			}
		});
	});

})(jQuery);
