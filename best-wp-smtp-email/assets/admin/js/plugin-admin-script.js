/**
 *
 * Custom JS code for plugin admin panel
 *
 */

(function($) {

	$(document).ready(function() {

		/* SMTP Authentication fields display condition */
		$( '#smtp_auth input[type="radio"]' ).click( function () {
	        if ( $(this).attr('value') == 1 ) {
	            $('#auth-fields').slideDown();
	        } else {
	        	$('#auth-fields').slideUp();
	        }
	    });

		/* SMTP Override Defaults fields display condition */
	    $( '#smtp_override_defaults input[type="radio"]' ).click( function () {
	        if ( $(this).attr('value') == 1 ) {
	            $('#override_defaults_fields').slideDown();
	        } else {
	        	$('#override_defaults_fields').slideUp();
	        }
	    });

	    /* Stay on same tab on form submit or page refresh */
	    $('#myTab a').click(function(e) {
  			e.preventDefault();
  			$(this).tab('show');
		});

		$("ul.nav-tabs > li > a").on("shown.bs.tab", function(e) {
  			var id = $(e.target).attr("href").substr(1);
  			window.location.hash = id;
		});

		var hash = window.location.hash;
		$('#myTab a[href="' + hash + '"]').tab('show');

	});

})( jQuery );
