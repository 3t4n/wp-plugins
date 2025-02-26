jQuery(document).ready(function () {					

				jQuery("#ylwm_txtName").keyup(function (event) {

					jQuery.ajax({

						type: "POST",

						url: location.protocol + "//" + location.host + "/wp-content/plugins/simple-stock-quotes/proxy.php",

						dataType: "text",

						data: {'symbol': jQuery('#ylwm_txtName').val()},

						success: processSuccess,

						error: processError,

						beforeSend: function(){jQuery('#ylwm_loader').show()},

						complete: function(){jQuery('#ylwm_loader').hide()}

		});

	

	});

});

function processSuccess(data, status, req) {

	if (status == "success")

		jQuery("#ylwm_response").html(

		'<div class="ylwm_results"><div class="ylwm_results_name">'+jQuery(data).find("Name").text() + '</div>' +

		'<div class="ylwm_results_current">'+jQuery(data).find("Last").text() + ' <small class="ylwm_change_val">' +jQuery(data).find("Change").text() + '</small></div>' + 

		'</div>'

	);

}

function processError(data, status, req) {

//	alert(req.responseText + " " + status);

alert('SOAP must be enabled on your server in order for this plugin to work!');

}