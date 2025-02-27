jQuery(document).ready(function($) {
	
	$('#wpadminbar').append('<div title="Show/Hide Toolbar" id="adminbar_tab">Show</div>');

	$('#adminbar_tab').click(function () {
		var cssTop = parseInt( $("#wpadminbar").css("top") );

		if (! $('body').is('.wp-admin')) { // only do this for the front end, not admin
			if (cssTop >= 0) {
				$("#wpadminbar").animate({"top": "-=32px"}, "slow");
				$("#adminbar_tab").text("Show");

				$("html").css("cssText", "margin-top: 0px !important;");
			}
			else {
				$("#wpadminbar").animate({"top": "+=32px"}, "slow");
				$("#adminbar_tab").text("Hide");

				$("html").css("cssText", "margin-top: 32px !important;");
			}
		}
	});

});
