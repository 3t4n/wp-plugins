jQuery(document).ready(function ($) {
	if (parseInt($('#borica_saved').val()) == 1) {
		$('#borica_basic_setting_body').show();
		$('#borica_bgn_body').show();
		$('#borica_eur_body').show();
		$('#borica_additional_setting_body').show();
		$('#borica_help_body').show();
	}

	$('#borica_basic_setting_title').on('click', () => {
		$('#borica_basic_setting_body').slideToggle();
	});

	$('#borica_bgn_title').on('click', () => {
		$('#borica_bgn_body').slideToggle();
	});

	$('#borica_eur_title').on('click', () => {
		$('#borica_eur_body').slideToggle();
	});

	$('#borica_help_title').on('click', () => {
		$('#borica_help_body').slideToggle();
	});

	$('#borica_additional_setting_title').on('click', () => {
		$('#borica_additional_setting_body').slideToggle();
	});

	$('#borica_form').submit(function(event) {
		$('#borica_basic_setting_body').show();
		$('#borica_bgn_body').show();
		$('#borica_eur_body').show();
		$('#borica_additional_setting_body').show();
		$('#borica_help_body').show();
		event.preventDefault();
		$('.borica_error').text('');
		$('#borica_mname').removeClass('error');
		$('#borica_unsuccess_message').removeClass('error');
		$('#borica_success_message').removeClass('error');
		$('#borica_email').removeClass('error');
		$('#borica_test_password_bgn').removeClass('error');
		let isValid = true;
		const borica_mname = $('#borica_mname').val().trim();
		const borica_unsuccess_message = $('#borica_unsuccess_message').val().trim();
		const borica_success_message = $('#borica_success_message').val().trim();
		const borica_email = $('#borica_email').val().trim();
		const borica_production_key_bgn = $('#borica_production_key_bgn').val().trim();
		const borica_production_password_bgn = $('#borica_production_password_bgn').val().trim();
		const borica_production_key_eur = $('#borica_production_key_eur').val().trim();
		const borica_production_password_eur = $('#borica_production_password_eur').val().trim();
		if (borica_mname.length == 0) {
			$('#borica_mname_error').text($('#borica_mandatory_error_text').val());
			$('#borica_mname').addClass('error');
			isValid = false;
		}
		if (borica_unsuccess_message.length == 0) {
			$('#borica_unsuccess_message_error').text($('#borica_mandatory_error_text').val());
			$('#borica_unsuccess_message').addClass('error');
			isValid = false;
		}
		if (borica_success_message.length == 0) {
			$('#borica_success_message_error').text($('#borica_mandatory_error_text').val());
			$('#borica_success_message').addClass('error');
			isValid = false;
		}
		const re = /^[a-zA-Z0-9.!#$%&'*+/=?^_'{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
		const position = parseInt(String(borica_email).toLowerCase().indexOf('@')) + 1;
		const ostatak = String(borica_email).toLowerCase().substr(position);
		const isdot = ostatak.indexOf('.');
		if(borica_email == '' || (!re.test(String(borica_email).toLowerCase())) || (isdot == -1)) {
			$('#borica_email_error').text($('#borica_incorrect_error_text').val());
			$('#borica_email').addClass('error');
			isValid = false;
		}
		if (borica_production_key_bgn.length > 0 && borica_production_password_bgn.length == 0) {
			$('#borica_production_password_bgn_error').text($('#borica_mandatory_error_text').val());
			$('#borica_production_key_bgn').addClass('error');
			isValid = false;
		}
		if (borica_production_key_eur.length > 0 && borica_production_password_eur.length == 0) {
			$('#borica_production_password_eur_error').text($('#borica_mandatory_error_text').val());
			$('#borica_production_password_eur').addClass('error');
			isValid = false;
		}
		
		if (isValid) {
			this.submit();
		}else{
			$('#borica_error').text($('#borica_error_text').val());
		}
	});
	
	$('#borica_mname').on('click', () => {
		$('#borica_mname').removeClass('error');
		$('#borica_mname_error').text('');
	});
	
	$('#borica_unsuccess_message').on('click', () => {
		$('#borica_unsuccess_message').removeClass('error');
		$('#borica_unsuccess_message_error').text('');
	});
	
	$('#borica_success_message').on('click', () => {
		$('#borica_success_message').removeClass('error');
		$('#borica_success_message_error').text('');
	});
	
	$('#borica_email').on('click', () => {
		$('#borica_email').removeClass('error');
		$('#borica_email_error').text('');
	});
	
	$('#borica_button_bgn_test').click((e) => {
		e.preventDefault();
		const fileDialogTestBgn = $('<input id="test_keys_file_bgn" type="file" accept="application/pkix-cert">');
		fileDialogTestBgn.click();
		fileDialogTestBgn.on('change', onFileSelectedTestBgn);
		return false;
	});
	
	const onFileSelectedTestBgn = (e) => {
		const reader = new FileReader();
		reader.addEventListener('load', (event) => {
			const content_key = event.target.result;
			$.ajax({
				url: borica_admin.ajax_url + '?action=borica_testkeysbgn',
				type: 'post',
				dataType: 'json',
				data: {
					security: borica_admin.nonce,
					PUBLIC_CERTIFICATE: content_key
				},
				success: (json) => {
					Swal.fire({
						title: json.checkCertTitle,
						text: json.checkCertText,
						confirmButtonColor: '#1E91CF',
						confirmButtonText: json.confirmButtonText,
						allowOutsideClick: false
					});
				},
			});
		});
		if (e.target.files.length > 0) {
			reader.readAsDataURL(e.target.files[0]);
		}
	};
	
	$('#borica_button_bgn_production').click((e) => {
		e.preventDefault();
		const fileDialogProductionBgn = $('<input id="production_keys_file_bgn" type="file" accept="application/pkix-cert">');
		fileDialogProductionBgn.click();
		fileDialogProductionBgn.on('change', onFileSelectedProductionBgn);
		return false;
	});
	
	const onFileSelectedProductionBgn = (e) => {
		const reader = new FileReader();
		reader.addEventListener('load', (event) => {
			const content_key = event.target.result;
			$.ajax({
				url: borica_admin.ajax_url + '?action=borica_productionkeysbgn',
				type: 'post',
				dataType: 'json',
				data: {
					security: borica_admin.nonce,
					PUBLIC_CERTIFICATE: content_key
				},
				success: (json) => {
					Swal.fire({
						title: json.checkCertTitle,
						text: json.checkCertText,
						confirmButtonColor: '#1E91CF',
						confirmButtonText: json.confirmButtonText,
						allowOutsideClick: false
					});
				},
			});
		});
		if (e.target.files.length > 0) {
			reader.readAsDataURL(e.target.files[0]);
		}
	};
	
	$('#borica_button_eur_test').click((e) => {
		e.preventDefault();
		const fileDialogTestEur = $('<input id="test_keys_file_eur" type="file" accept="application/pkix-cert">');
		fileDialogTestEur.click();
		fileDialogTestEur.on('change', onFileSelectedTestEur);
		return false;
	});
	
	const onFileSelectedTestEur = (e) => {
		const reader = new FileReader();
		reader.addEventListener('load', (event) => {
			const content_key = event.target.result;
			$.ajax({
				url: borica_admin.ajax_url + '?action=borica_testkeyseur',
				type: 'post',
				dataType: 'json',
				data: {
					security: borica_admin.nonce,
					PUBLIC_CERTIFICATE: content_key
				},
				success: (json) => {
					Swal.fire({
						title: json.checkCertTitle,
						text: json.checkCertText,
						confirmButtonColor: '#1E91CF',
						confirmButtonText: json.confirmButtonText,
						allowOutsideClick: false
					});
				},
			});
		});
		if (e.target.files.length > 0) {
			reader.readAsDataURL(e.target.files[0]);
		}
	};
	
	$('#borica_button_eur_production').click((e) => {
		e.preventDefault();
		const fileDialogProductionEur = $('<input id="production_keys_file_eur" type="file" accept="application/pkix-cert">');
		fileDialogProductionEur.click();
		fileDialogProductionEur.on('change', onFileSelectedProductionEur);
		return false;
	});
	
	$('#borica_button_log').click((e) => {
		e.preventDefault();
		$.ajax({
			url: borica_admin.ajax_url + '?action=borica_log',
			type: 'post',
			dataType: 'json',
			data: {
				security: borica_admin.nonce
			},
			success: (json) => {
				const boricaPlainTextData = boricaConvertArrayToPlainText(json);
				const boricaBlob = new Blob([boricaPlainTextData], { type: 'text/plain' });
				const boricaUrl = window.URL.createObjectURL(boricaBlob);
				const boricaA = document.createElement('a');
				boricaA.href = boricaUrl;
				boricaA.download = 'borica_logs.txt';
				document.body.appendChild(boricaA);
				boricaA.click();
				boricaA.remove();
			},
		});
	});
	
	const boricaConvertArrayToPlainText = (dataArray) => {
		return dataArray.map(obj => Object.values(obj).join(' | ')).join('\n');
	}
	
	const onFileSelectedProductionEur = (e) => {
		const reader = new FileReader();
		reader.addEventListener('load', (event) => {
			const content_key = event.target.result;
			$.ajax({
				url: borica_admin.ajax_url + '?action=borica_productionkeyseur',
				type: 'post',
				dataType: 'json',
				data: {
					security: borica_admin.nonce,
					PUBLIC_CERTIFICATE: content_key
				},
				success: (json) => {
					Swal.fire({
						title: json.checkCertTitle,
						text: json.checkCertText,
						confirmButtonColor: '#1E91CF',
						confirmButtonText: json.confirmButtonText,
						allowOutsideClick: false
					});
				},
			});
		});
		if (e.target.files.length > 0) {
			reader.readAsDataURL(e.target.files[0]);
		}
	};
	
});