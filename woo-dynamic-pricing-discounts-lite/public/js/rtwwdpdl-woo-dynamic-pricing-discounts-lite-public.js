(function ($) {
	'use strict';
	$(document).ready(function () {
		// $(document).on('change', '.wc-block-components-radio-control__input', function () {
		// 	// alert($(this).val())
		// 	var cod = $(this).val();
		// 	$.blockUI({ message: "" });
		// 	var data = {
		// 		action: 'rtwwdpdl_selected_payment_method',
		// 		selected_mode: cod,
		// 		security_check: rtwwdpdl_ajax.rtwwdpdl_nonce
		// 	}
		// 	// console.log(data);
		// 	$.ajax({
		// 		url: rtwwdpdl_ajax.ajax_url,
		// 		type: "POST",
		// 		data: data,
		// 		dataType: 'json',
		// 		success: function (response) {
		// 			console.log(response);
		// 			window.location.reload();
		// 			$.unblockUI();
		// 		}
		// 	});
		// });
		$('.rtwwdpdl-carousel-slider').owlCarousel({
			loop: false,
			margin: 15,
			nav: false,
			navText: false,
			responsiveClass: true,
			responsive: {
				0: {
					items: 1,
					nav: true
				},
				600: {
					items: 2,
					nav: false
				},
				1000: {
					items: 4,
					nav: true,
					loop: false
				}
			}
		});
		//  =========================== update 1.6.2 (payment rule)=========================== //
		$(document).on('change', 'input[name="payment_method"]', function () {
			// Trigger the update of the order review
			$('body').trigger('update_checkout');
		});
		// Listen for updated_checkout event
		$(document.body).on('updated_checkout', function () {
			// Recalculate the cart totals
			$.ajax({
				type: 'POST',
				url: rtwwdpdl_ajax.ajax_url,
				data: {
					action: 'recalculate_cart_totals'
				},
				success: function (response) {
					// Update the cart totals in the summary
					$('.woocommerce-checkout-review-order-table').html(response);
				}
			});
		});
		//  =========================== update =========================== //
	})
})(jQuery);
