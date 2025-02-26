/* global ffwp_plugins_params
 *
 * Modal is adapted from w3schools.
 *
 * @link https://www.w3schools.com/howto/howto_css_modals.asp
*/
jQuery(document).ready(function( $ ){

	  // Deactivation feedback.
 	$( document.body ).on( 'click' ,'tr[data-plugin="fancy-fields-for-wpforms/fancy-fields-for-wpforms.php"] span.deactivate a', function( e ) {

		e.preventDefault();

		var data = {
			action: 'fancy_fields_for_wpforms_deactivation_notice',
			security: ffwp_plugins_params.deactivation_nonce
		};

		$.post( ffwp_plugins_params.ajax_url, data, function( response ) {
			jQuery('#wpbody-content .wrap').append( response );
			var modal = document.getElementById('fancy-fields-for-wpforms-modal');

	  		// Open the modal.
	  		modal.style.display = "block";

	  		// On click on send email button on the modal.
		    $("#ffwp-send-deactivation-email").click( function( e ) {
		    	e.preventDefault();

		    	this.value 		= ffwp_plugins_params.deactivating;
		    	var form 		= $("#fancy-fields-for-wpforms-send-deactivation-email");

				var message		= form.find( ".row .col-75 textarea#message" ).val();
				var nonce 		= form.find( ".row #fancy_fields_for_wpforms_send_deactivation_email").val();

				var data = {
					action: 'fancy_fields_for_wpforms_send_deactivation_email',
					security: nonce,
					message: message,
				}

				$.post( ffwp_plugins_params.ajax_url, data, function( response ) {

					if( response.success === false ) {
						swal( ffwp_plugins_params.error, response.data.message, "error" );
					} else {
						swal( {title: ffwp_plugins_params.deactivated, text: ffwp_plugins_params.sad_to_see, icon: "success", allowOutsideClick: false, closeOnClickOutside: false });
						$('.swal-button--confirm').click( function (e) {
							location.reload();
						});
					}

					modal.remove();
				}).fail( function( xhr ) {
					swal( ffwp_plugins_params.error, ffwp_plugins_params.wrong, "error" );
				});

		    });

		}).fail( function( xhr ) {
			window.console.log( xhr.responseText );
		});
   });
});
