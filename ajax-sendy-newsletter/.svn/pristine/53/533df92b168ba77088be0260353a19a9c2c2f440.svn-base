( function ( $ ) {
	$( document ).on( 'submit', '.swp-form', function ( ev ) {
		ev.preventDefault();
		var form = $( this );

		form.find( '.swp-error, .swp-success' ).hide();
		form.find('#swp_email').removeClass('swp-email-valid-error');

		// Name check
		var subscribe_name = form.find( '.field-name' ).val();
		if ( subscribe_name == '' ) {
			form.find( '.swp-email-valid-error' ).show();
			form.find('#swp_name').addClass('swp-email-valid-error');
			return false;
		} else {
			form.find('#swp_name').removeClass('swp-email-valid-error');
		}

		// Email check
		var subscribe_email = form.find( '.field-email' ).val();
		var filter = /^\s*[\w\-\+_]+(\.[\w\-\+_]+)*\@[\w\-\+_]+\.[\w\-\+_]+(\.[\w\-\+_]+)*\s*$/;
		valid = String( subscribe_email ).search( filter ) != -1;
		if ( subscribe_email == '' || !valid ) {
			form.find( '.swp-email-valid-error' ).show();
			form.find('#swp_email').addClass('swp-email-valid-error');
			return false;
		} else {
			form.find('#swp_email').removeClass('swp-email-valid-error');
		}

		// Validation
		var validationFailed = false;
		form.find( '.swp-field' ).each(function(){
			var required =  $(this).data('required');
			var value = $.trim($(this).val());
			var fieldname = $(this).attr('name');
			var type = $(this).attr('type');
			if( ( type == 'checkbox' ||  type == 'radio') &&  required == '1'){

				var fieldChecked = false;
				form.find('input[name="'+fieldname+'"]').each(function(){
					if( $(this).is(':checked') ){
						fieldChecked = true;
					}
				})

				validationFailed =  ! fieldChecked ? true : validationFailed;
				if(validationFailed ){
					$(this).parent().css('border', '1px solid red');
				}
			}
			else if( required == '1' && ! value.length ) {
				validationFailed = true;
			}
		});
		if( validationFailed ){
			return false;
		}

		//Terms Check
		$terms = form.find( '.swp-terms' )
		if ( $terms.length > 0 ) {
			if ( !$terms.prop( 'checked' ) ) {
				alert( 'Please check checkbox' );
				return false;
			}
		}
		// remove red validation borders
		form.find( '.swp-field' ).each(function(){
			var required =  $(this).data('required');
			var fieldname = $(this).attr('name');
			var type = $(this).attr('type');
			if( type == 'checkbox' ||  type == 'radio'){
				$(this).parent().css('border', '0px solid green');
			}else if(required == '1'){
				$(this).css('border-bottom-color', '#4e842a');
			}
		})

		form.find( '.swp-spinner' ).fadeIn();

		var form_data = form.serialize();

		data = {
			'action': 'swp_form_submit',
			'swp_name' : $('#swp_name').val(),
			'swp_email' : $('#swp_email').val(),
		}

		$.post( ajax_object.ajax_url, data, function ( result, textStatus, xhr ) {
			form.find( '.swp-spinner' ).fadeOut();
			response = $.trim( result );
			if ( response == '1' ) {
				form.find( '.swp-error' ).hide();
				form.find( '.swp-success' ).show();
				form.find( '.swp-success' ).html('Successfully Subscribed.');
				form.find('#swp_email').removeClass('swp-email-valid-error');
				form.find( '.field-name' ).val('');
				form.find( '.field-email' ).val('');
			} else if ( response == 'Already subscribed.' ) {
				form.find( '.swp-success' ).hide();
				form.find('#swp_email').addClass('swp-email-valid-error');
				form.find( '.swp-error' ).show();
				form.find( '.swp-error' ).html('Already Subscribed.');
				form.find( '.field-email' ).val('');
			} else {
				form.find( '.swp-error' ).show();
				form.find( '.swp-error' ).html(response);
			}
		} );

	} );
} )( jQuery )