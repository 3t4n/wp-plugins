(function ($) {

	'use strict';

	if ( $('.wpas-review-switch input').is(':checked') ) {

		$('.wpas-review-comment-box').show();
	} else {

		$('.wpas-review-comment-box').hide();
	}

	$('.wpas-review-switch input').change(function() {

		if ( $(this).is(':checked') ) {

			$('.wpas-review-comment-box').show(500);
		} else {

			$('.wpas-review-comment-box').hide(500);
		}
	});

	$('.wpas--rating-wrap-com input[type=range]').on('input', function () {

		var wpasRate = $(this).val();
		$(this).parent().prev().find('.wpas-com-score').text(wpasRate);

		var wpasUserRate = 0;
		var wpasTotalCat = $('.wpas--rating-score-math').data('categories');
		$('.wpas-com-score').each(function() {

			var wpasUserRateSum = wpasUserRate+= +($(this).text())
			$('.wpas-final-user-rate').html((wpasUserRateSum / wpasTotalCat).toFixed(1));
		});
	});

})(jQuery);