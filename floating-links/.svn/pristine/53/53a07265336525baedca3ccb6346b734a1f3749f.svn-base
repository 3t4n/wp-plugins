jQuery( document ).ready(function($) {
	/**
	 * Show notification at the screen bottom
	 * @since 3.6.2
	 * @param text
	 * @param delay
	 */
	function flShowNotification(text, delay = 4000){

		if ( ! text) {

			text = fta.copied;
		}

		jQuery( ".fl-notification-holder" ).html( ' ' ).html( text ).css( 'opacity', 1 ).animate( {bottom: '0'} );

		setTimeout( function(){ jQuery( ".fl-notification-holder" ).animate( {bottom: '-=100%'} ) }, delay );
	}
	/**
	 * Remove any notification at the screen bottom
	 * @since 3.6.2
	 */
	function flRemoveNotification(){
		jQuery( ".fl-notification-holder" ).animate( {bottom: '-=100%'} );
	}

	jQuery( document ).tooltip({
		selector: ".fl-tooltip",
		position: {
			my: "center top",
			at: "center bottom"
		}
	});

	jQuery('.fl-select2').select2();

	/**
	 * Display the modal
	 *
	 * @param id
	 */
	function flModal(id){

		const opened_modal = document.getElementsByClassName( "fl-modal open" );

		if ( opened_modal.length ) {
			opened_modal.style.display = "none";
		}

		const modal         = document.getElementById( id );
		modal.style.display = "block";
		modal.classList.add( "open" );

	}

	window.onclick = function(event) {
		let opened_modal_id = document.getElementsByClassName( "fl-modal open" );

		if ( opened_modal_id.length ) {
			opened_modal_id = document.getElementsByClassName( "fl-modal open" )[0].id;
		}
		const modal = document.getElementById( opened_modal_id );

		if (event.target === modal) {
			modal.style.display = "none";
			modal.classList.remove( "open" );
			var additionalData = {
				modal: modal,
				modalID: opened_modal_id
			};
			// Dispatch a custom event when the modal is closed
			var closeModalEvent = new CustomEvent('eiModalClosed', {
				detail: additionalData
			});
			document.dispatchEvent(closeModalEvent);
		}
	}

	// Close modal
	jQuery( document ).on(
			'click',
			'.fl-modal-close',
			function() {
				const modal = jQuery( this ).closest( '.fl-modal' );
				const modalID = modal.attr( 'id' );

				jQuery( this ).closest( '.fl-modal' ).removeClass( 'open' ).css( 'display', 'none' );

				var additionalData = {
					modal: modal,
					modalID: modalID
				};
				// Dispatch a custom event when the modal is closed
				var closeModalEvent = new CustomEvent('eiModalClosed', {
					detail: additionalData
				});
				document.dispatchEvent(closeModalEvent);
			}
	);

	jQuery( '#floating-links' ).on(
			'click',
			'.fl-modal-trigger',
			function(e) {
				e.preventDefault();
				let id = jQuery( this ).attr( 'href' ).replace( '#', '' );

				if ( ! id) {
					id = jQuery( this ).attr( 'id' );
				}

				flModal( id );
			}
	);


	/**
	 * Save the settings
	 */
	jQuery(document).on("click", ".fl_options", function() {

		flShowNotification( fl.notification_string, 30000 );
		const fl_option = jQuery(this).data('option');

		// Checking clicked option status.
		if( jQuery( this ).is(":checked") ) {
			fl_value = true;
		}
		else{
			fl_value = false;
		}

		const data = { action : 'fl_save_values',
			fl_option : fl_option,
			fl_value : fl_value,
			nonce: fl.nonce,
		}

		jQuery.ajax({
			url : fl.ajax_url,
			type : 'post',
			data : data,
			dataType: 'json',
			success : function( response ) {
				flRemoveNotification();
				flShowNotification( response.data, 3000 );
			}

		});
	});

	jQuery(document).on("click", "#fl_post_data", function() {
		if( $(this).is(':checked') ) {
			$('.fl-setting.fl-post-data-setting').slideDown('slow');
		}
		else {
			$('.fl-setting.fl-post-data-setting').slideUp('slow');
		}
	});

	jQuery(document).on("click", "#fl_scroll", function() {
		if( $(this).is(':checked') ) {
			$('.fl-setting.fl-scroll-setting').slideDown('slow');
		}
		else {
			$('.fl-setting.fl-scroll-setting').slideUp('slow');
		}
	});

	jQuery(document).on("click", "#fl_pages_enable", function() {
		if( $(this).is(':checked') ) {
			$('.fl-setting.fl-pages-setting').slideDown('slow');
		}
		else {
			$('.fl-setting.fl-pages-setting').slideUp('slow');
		}
	});

	jQuery(document).on("click", "#fl_posts_enable", function() {
		if( $(this).is(':checked') ) {
			$('.fl-setting.fl-posts-setting').slideDown('slow');
		}
		else {
			$('.fl-setting.fl-posts-setting').slideUp('slow');
		}
	});

/*
* Save Social Icons
*/
jQuery(document).on("click", ".fl_social_options", function() {

	flShowNotification( fl.notification_string, 30000 );

	const option = jQuery(this).data('option');

	let value = null;

	if( jQuery(this).is(":checked") ) {
		value = 'on';
	}
	else{
		value = false;
	}

	const data = { action : 'fl_save_social_settings',
		fl_option : option,
		fl_value : value,
		nonce: fl.nonce,
	}

	jQuery.ajax({
		url : fl.ajax_url,
		type : 'post',
		data : data,
		dataType: 'json',
		success : function( response ) {
			flRemoveNotification();
			flShowNotification( response.data, 3000 );
		}

	});

 });

function fl_update_social_icons(){

	const form = $('#fl_social_icons_form').serialize();
	flShowNotification( fl.notification_string, 30000 );

		const data = { action : 'fl_save_social_icons',
			fl_form : form,
			nonce: fl.nonce,
		}

		jQuery.ajax({
			url : fl.ajax_url,
			type : 'post',
			data : data,
			dataType: 'json',
			success : function( response ) {
				flRemoveNotification();
				flShowNotification( response.data, 3000 );
			}

	});

}

jQuery("#fl-social-icons.fl-pro").sortable({
		update: function() {
			fl_update_social_icons();
		}
});

/*
* Save Social networks values
*/
jQuery(document).on("click", ".fl_social_network_options", function($) {

	fl_update_social_icons();

 });

	jQuery("#fl-main-bar.fl-free, #fl-social-icons.fl-free").sortable({
		update: function() {
			flModal( 'fl-drag-drop-upgrade');
			return false;
		}
	});

 
 });