//Lock Google Analytics
jQuery(document).ready(function($) {
	$('#rankology-google-analytics-lock').on('click', function() {
		$.ajax({
			method : 'POST',
			url : rankologyAjaxLockGoogleAnalytics.rankology_google_analytics_lock,
			data : {
				action: 'rankology_google_analytics_lock',
				_ajax_nonce: rankologyAjaxLockGoogleAnalytics.rankology_nonce,
			},
			success : function() {
				window.location.reload(true);
			},
		});
	});
	$('#rankology-google-analytics-lock').on('click', function() {
		$(this).attr("disabled", "disabled");
		$( '.spinner' ).css( "visibility", "visible" );
		$( '.spinner' ).css( "float", "none" );
	});
});