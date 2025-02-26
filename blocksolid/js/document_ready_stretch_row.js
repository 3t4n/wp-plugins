(function ($) {

	$(document).ready(function(){

		function blocksolid_stretch_row() {

			var vw = $(window).width();
			var $elements = $('.stretch-row');
			$.each($elements, function() {
				var $el = $(this);
				var row_width = $el.width();

				var max_width = 0;
				var calc_width = 0;

				var max_width_raw = $el.css("max-width"); // In pixels or % - vw calced as pixels by browser

				if (max_width_raw.indexOf('px') !== -1){
					max_width = max_width_raw.replace('px', '');
					calc_width = ((vw - max_width) / 2);
				}else if (max_width_raw.indexOf('%') !== -1){
					max_width = max_width_raw.replace('%', '');
					calc_width = ((vw - (vw * (max_width/100))) / 2);
				}else if (max_width_raw.indexOf('vw') !== -1){
					max_width = max_width_raw.replace('%', '');
					calc_width = ((vw - (vw * (max_width/100))) / 2);
				}else{
					max_width = parseInt($el.css("max-width"));
					calc_width = ((vw - max_width) / 2);
				}

				if (vw > max_width){
					/* Set inline styles */
					$el.css({"padding-left": calc_width});
					$el.css({"padding-right": calc_width});
				}else{
					/* Unset inline styles */
					$el.css({"padding-left": ''});
					$el.css({"padding-right": ''});
				}

			})
		}

		blocksolid_stretch_row();

		$(window).on("resize", function(event){
			blocksolid_stretch_row();
		});


	}
	);
})(jQuery);