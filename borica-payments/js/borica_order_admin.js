jQuery(document).ready(function ($) {
	let borica_btn_check_payment_text = $('#borica_btn_check_payment').text();
	let borica_btn_cancell_payment_text = $('#borica_btn_cancell_payment').text();

	if (parseInt($('#is_bcps').val()) === 0) {
		$('#borica_btn_check_payment').prop('disabled', true);
	}

	if (parseInt($('#is_bdp').val()) === 0) {
		$('#borica_btn_cancell_payment').prop('disabled', true);
	}

	$('#borica_btn_default_amount').click((event) => {
		event.preventDefault();
		$('#current_amount').val($('#boricaOrderTotal').val());
	});

	$('#borica_btn_check_payment').click((event) => {
		event.preventDefault();
		$.ajax({
			url: borica_order_admin.ajax_url + '?action=borica_check_payment',
			type: 'post',
			dataType: 'json',
			data: {
				BORICA_URL: $('#boricaUrl').val(),
				TERMINAL: $('#boricaTerminal').val(),
				TRTYPE: $('#boricaCheckPaymentTrtype').val(),
				ORDER: $('#borica_order').val(),
				TRAN_TRTYPE: $('#boricaTranTrtype').val(),
				NONCE: $('#boricaNonce').val(),
				BORICA_CURRENCY_CODE: $('#boricaCurrency').val(),
				ACTION: $('#boricaAction').val(),
				RC: $('#boricaRc').text(),
				STATUSMSG: $('#boricaStatus').text(),
				INCREMENT_ID: $('#boricaIncrementId').val(),
				security: borica_order_admin.nonce,
			},
			beforeSend: function() {
				$('#borica_btn_check_payment').text('loading...');
				$('#borica_btn_check_payment').prop('disabled', true);
			},
			complete: function() {
				$('#borica_btn_check_payment').text(borica_btn_check_payment_text);
				$('#borica_btn_check_payment').prop('disabled', false);
			},
			success: function (json) {
				if (parseInt(json.resultChange) === 0) {
					Swal.fire({
						title: json.resultChangeTitle,
						text: json.resultChangeText,
						confirmButtonColor: '#1E91CF',
						confirmButtonText: $('#text_enabled').val(),
						allowOutsideClick: false
					}).then((result) => {
						$('#boricaRc').text(json.responseRc);
						$('#boricaStatus').text(json.responseStatus);
						const boricaAllowedTag = /<span[^>]*style="[^"]*"[^>]*>(.*?)<\/span>/i;
						const boricaResponseText = json.responseActionTxt.match(boricaAllowedTag);
						if (boricaResponseText !== null) {
							$('#boricaOrderAction').html(json.responseActionTxt);
						} else {
							$('#boricaOrderAction').text(json.responseActionTxt);
						}
					});
				} else if (parseInt(json.resultChange) === 0) {
					Swal.fire({
						title: json.resultChangeTitle,
						text: json.resultChangeText,
						confirmButtonColor: '#1E91CF',
						confirmButtonText: $('#text_enabled').val(),
						allowOutsideClick: false
					});
				} else {
					Swal.fire({
						title: json.resultChangeTitle,
						text: json.resultChangeText,
						confirmButtonColor: '#1E91CF',
						confirmButtonText: $('#text_enabled').val(),
						allowOutsideClick: false
					});
				}
			},
		})
	});

	$('#borica_btn_cancell_payment').click((event) => {
		event.preventDefault();
		Swal.fire({
			title: $('#info_title_alert').val(),
			text: $('#info_text_alert').val(),
			showCancelButton: true,
			allowOutsideClick: false,
			confirmButtonColor: '#1E91CF',
			cancelButtonColor: '#E3503E',
			confirmButtonText: $('#text_enabled').val(),
			cancelButtonText: $('#text_disabled').val(),
		}).then((result) => {
			if (result.isConfirmed) {
				if (parseFloat($('#current_amount').val()) <= parseFloat($('#boricaOrderTotal').val())) {
					$.ajax({
						url: borica_order_admin.ajax_url + '?action=borica_drop_payment',
						type: 'post',
						dataType: 'json',
						data: {
							BORICA_URL: $('#boricaUrl').val(),
							TERMINAL: $('#boricaTerminal').val(),
							TRTYPE: $('#boricaDropPaymentTrtype').val(),
							AMOUNT: $('#boricaOrderTotal').val(),
							CURRENT_AMOUNT: $('#current_amount').val(),
							CURRENCY: $('#boricaCurrency').val(),
							ORDER: $('#borica_order').val(),
							DESC: $('#info_desc').val() + " " + $('#baseUrl').val(),
							MERCHANT: $('#boricaMerchant').val(),
							MERCH_NAME: $('#boricaMname').val(),
							MERCH_URL: $('#baseUrl').val(),
							EMAIL: $('#boricaEmail').val(),
							COUNTRY: $('#boricaCountry').val(),
							MERCH_GMT: $('#boricaTimezone').val(),
							LANG: $('#boricaLang').val(),
							ADDENDUM: $('#boricaAddendum').val(),
							AD_CUST_BOR_ORDER_ID: $('#boricaOrderInternal').text(),
							RRN: $('#boricaRrn').text(),
							INT_REF: $('#boricaIntRef').text(),
							TIMESTAMP: $('#boricaTimestamp').val(),
							NONCE: $('#boricaNonce').val(),
							INCREMENT_ID: $('#boricaIncrementId').val(),
							security: borica_order_admin.nonce,
						},
						beforeSend: function() {
							$('#borica_btn_cancell_payment').text('loading...');
							$('#borica_btn_cancell_payment').prop('disabled', true);
						},
						complete: function() {
							$('#current_amount').val($('#boricaOrderTotal').val());
							$('#borica_btn_cancell_payment').text(borica_btn_cancell_payment_text);
							$('#borica_btn_cancell_payment').prop('disabled', false);
						},
						success: function (json) {
							if (parseInt(json.resultChange) === 1) {
								Swal.fire({
									title: json.resultChangeTitle,
									text: json.resultChangeText,
									confirmButtonColor: '#1E91CF',
									confirmButtonText: $('#text_enabled').val(),
									allowOutsideClick: false
								}).then((result) => {
									const boricaAllowedTag = /<span[^>]*style="[^"]*"[^>]*>(.*?)<\/span>/i;
									const boricaResponseText = json.requestCancelTxt.match(boricaAllowedTag);
									if (boricaResponseText !== null) {
										$('#boricaRequestCancel').html(json.requestCancelTxt);
									} else {
										$('#boricaRequestCancel').text(json.requestCancelTxt);
									}
									$('#borica_btn_cancell_payment').prop('disabled', true);
									$('#is_bdp').val(0);
								});
							}
						},
					})
				} else {
					Swal.fire({
						title: $('#info_title_info').val(),
						text: $('#info_text_info').val(),
						confirmButtonColor: '#1E91CF',
						confirmButtonText: $('#text_enabled').val(),
						allowOutsideClick: false
					}).then((result) => {
						$('#current_amount').val($('#boricaOrderTotal').val());
					});
				}
			}else{
				return false
			}
		});
	});
	
});
