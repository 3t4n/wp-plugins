jQuery(document).ready(function($) {
	
	function renderResponse(data) {
		
		$("#mail365_import + .import-result").html('');
		$("#mail365_import + .import-result").html(data.added + "<br>" + data.duplicate);
		$("#mail365_import + .import-result").slideDown(1500);
	}

	$("#mail365_save_api_key").submit(function (e) {
		e.preventDefault();
		var apiKey = $("#mail365_save_api_key #api_key").val();
		if (/^[A-Za-z0-9-]{3}-[A-Za-z0-9-]{12}$/.test(apiKey)) {
			$("#mail365_save_api_key #api_key").css("border", "none");
			$("#mail365_save_api_key .vendosoft-error-field").html("");
			$.post(self.location, $(this).serialize(), function(response) {
				var responseObj = JSON.parse(response);
				if (responseObj.error == 0) {
					self.location = responseObj.redirectURL;
				}
			});
		} else {
			$("#mail365_save_api_key #api_key").css("border", "1px solid red");
			$("#mail365_save_api_key .vendosoft-error-field").slideDown(500);
		}
	});

	$("#api_key").focus(function (e) {
		$("#mail365_save_api_key #api_key").css("border", "none");
		$("#mail365_save_api_key .vendosoft-error-field").slideUp(500);
	});
	
	$("#mail365_import").submit(function (e) {
		e.preventDefault();
		$.post(self.location, $(this).serialize(), function(response) {
			var responseObj = JSON.parse(response);
			renderResponse(responseObj);
		});
	});
});

