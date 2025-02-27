jQuery(document).ready(function($) {
	
	let boricaOldButtonName;
	
	if ($('#borica_direct').length > 0 && parseInt($('#borica_direct').val()) === 1) {
		const boricaHandlePaymentMethodChange = () => {
			console.log('change');
			const selectedPaymentMethod = $('input[name="payment_method"]:checked').val();
			if (selectedPaymentMethod === 'borica_woo_payment_gateway') {
				boricaOldButtonName = $('#place_order').val();
				$('#place_order').text($('#borica_btn_pay_text').val());
			}else{
				$('#place_order').text(boricaOldButtonName);
			}
		}

		$('form.checkout').on('change', 'input[name="payment_method"]', function() {
			boricaHandlePaymentMethodChange();
		});

		$(document.body).on('updated_checkout', function() {
			boricaHandlePaymentMethodChange();
		});
	}

	setTimeout(function() {
		if ($('#borica_testmode').length > 0 && parseInt($('#borica_testmode').val()) === 1) {
			if ($('label[for="payment_method_borica_woo_payment_gateway"]').length > 0) {
				$('label[for="payment_method_borica_woo_payment_gateway"]').addClass('borica_red');
			}
		}else{
			if ($('label[for="payment_method_borica_woo_payment_gateway"]').length > 0) {
				$('label[for="payment_method_borica_woo_payment_gateway"]').removeClass('borica_red');
			}
		}
	}, 1000);

});
