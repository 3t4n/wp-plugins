(function($) {
    "use strict";
$('.add_to_cart_button:not(.product_type_variable)').on('click', function () {
	var cart = $('#finest-count');
	var imgtodrag = $(this).parents('li.product').find("img");
	if (imgtodrag) {
		var imgclone = imgtodrag.clone()
			.offset({
			top: imgtodrag.offset().top,
			left: imgtodrag.offset().left
		})
			.css({
			'opacity': '1',
				'position': 'absolute',
				'height': '150px',
				'width': '150px',
				'z-index': '100'
			})
			.appendTo($('body'))
			.animate({
			'top': cart.offset().top + 10,
				'left': cart.offset().left + 10,
				'width': 75,
				'height': 75
		}, 1800, 'easeInOutExpo');

		setTimeout(function () {
			cart.effect("shake", {
				times: 2
			}, 600);
		}, 1000);

		imgclone.animate({
			'width': 0,
				'height': 0
		}, function () {
			$(this).detach()
		});
	}
});


})(jQuery);