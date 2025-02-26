jQuery(document).ready(function(){
	profilepro_ajax_upload();
	jQuery(document).on('click', '.profilepro_secondary_button', function(e){
		window.location = jQuery(this).data('href');
	});
	
	jQuery(document).on('click', '.profilepro_profile_edit', function(e){
		jQuery.ajax({
			url: profilepro_ajax_url,
			data:'action=profilepro_form_change&id='+jQuery('.profilepro-profile-container').data('form_id')+'&mode='+jQuery('.profilepro-profile-container').data('mode'),
			dataType: 'JSON',
			type: 'POST',
			success:function(res){
				if( res.html ){
					
					if(jQuery('.profilepro-profile-container').data('mode') == 'view'){
						jQuery('.profilepro-profile-container').parent().html(res.html);
						jQuery('.profilepro-profile-container').data('mode','profile');
						jQuery('.profilepro-profile-container .profilepro_profile_edit').html('View Profile');
					}else{
						
						jQuery('.profilepro-profile-container').parent().html(res.html);
						jQuery('.profilepro-profile-container').data('mode','view');
					}
					profilepro_ajax_upload();
				}
			}
		})
	});
	jQuery(document).on('submit', '.profilepro form', function(e){
		var form = jQuery(this);
		form.find('input,textarea').each(function(){
			jQuery(this).trigger('blur');
		});
			
		form.find('select').each(function(){
			jQuery(this).trigger('change');
		});
		
		form.find('select[data-is_required=1],textarea[data-is_required=1]').each(function(){
			if ( !jQuery(this).val() ) {
				profilepro_client_error_irregular( jQuery(this), jQuery(this).parents('.profilepro-element'), 'This field is required' );
			} else {
				profilepro_client_valid( jQuery(this).find("select"), jQuery(this).parents('.profilepro-element') );
			}
		});
		
		form.find('.profilepro-radio-container[data-is_required=1]').each(function(){
				if ( !jQuery(this).find("input:radio").is(":checked") ) {
					profilepro_client_error_irregular( '', jQuery(this).parents('.profilepro-element'), 'This field is required' );
				} else {
					profilepro_client_valid( jQuery(this).find("input:radio"), jQuery(this).parents('.plugin_name-element') );
				}
		});
		
		form.find('.profilepro-checkbox-container[data-is_required=1]').each(function(){
				if ( !jQuery(this).find("input:checkbox").is(":checked") ) {
					profilepro_client_error_irregular( '', jQuery(this).parents('.profilepro-element'), 'This field is required' );
				} else {
					profilepro_client_valid( jQuery(this).find("input:checkbox"), jQuery(this).parents('.profilepro-element') );
				}
		});
		if (form.find('.profilepro-warning-message').length > 0 || form.find('.warning').length > 0){
			form.find('.profilepro-field').each(function(){
					//jQuery(this).find('.profilepro-warning-message').remove();
					if (jQuery(this).nextUntil('div.profilepro-field').find('.profilepro-warning-message').length > 0) {
						jQuery(this).css({'display': 'block'});
						jQuery(this).append('<ins class="profilepro-warning-message">Please correct fields</ins>');
						jQuery(this).find('.profilepro-warning-message').fadeIn();
					}
		});
			form.find('.profilepro-warning-message').parents('.profilepro-element').find('input').focus();
				return false;
		}
		else {
				form.find('.profilepro-field').each(function(){
					jQuery(this).find('.profilepro-warning-message').remove();
				});
			}
		jQuery('#profilepro-loader').css({'display':'inline-block'});
		jQuery.ajax({
			url: profilepro_ajax_url,
			data:form.serialize()+'&action=profilepro_form_actions&id='+jQuery('.profilepro').data('mode'),
			dataType: 'JSON',
			type: 'POST',
			success:function(data){
				
				if (data && data.error){
					var i = 0;
					
					jQuery.each( data.error, function(key, value) {
						element = form.find('.profilepro-field[data-key="'+key+'"]').find('input');
						console.log(element.parents('.profilepro-element'));
						profilepro_client_error( element, element.parents('.profilepro-element'), value );
						
					})	
				}
				else{
					if( data.msg ){
						jQuery('#profilepro-ajax-msg').html(data.msg);
						jQuery('#profilepro-ajax-msg').css({'display':'inline-block'});
					}
				}	
				jQuery('#profilepro-loader').hide();
				if(  data.redirect ){
					if( data.redirect == 'refresh' ){
						window.location = data.redirect = '';
					}else{
						window.location = data.redirect;
					}
				}
				if(data.html){
					jQuery('.profilepro').parent().html(data.html);
				}
			}
		});
	});
	
	jQuery(document).on('blur', '.profilepro input', function(e){
	var element = jQuery(this);
	var parent = element.parents('.profilepro-element');
	var required = element.data('is_required');
	var original_elem = element.parents('.profilepro').find('input[type=password]:first');
	var original = element.parents('.profilepro').find('input[type=password]:first').val();
	
	if (required == 1 ) {
		if ( element.val().replace(/^\s+|\s+$/g, "").length == 0) {
				profilepro_client_error( element, parent, 'This field is required' );
			} else {
				profilepro_client_valid(element, parent);
			}
			
			if ( jQuery(this).attr('type') == 'password') { // only if field is password
				if ( element.val().replace(/^\s+|\s+$/g, "").length == 0) {
					profilepro_client_error_irregular( element, parent, 'This field is required' );
				} 
				else if ( original != element.val() ) {
				profilepro_client_error( element, parent, 'Password does not match' );
			}
				 else {
					profilepro_client_valid(element, parent);
				}
			}
	}
});

});


function profilepro_client_error_irregular( element, parent, error) {
	if ( element != '' && element.data('custom-error')) {
		error = element.data('custom-error');
	}
	
	if (parent.find('.profilepro-warning-message').length == 0) {
		parent.append( '<div class="profilepro-warning-message"><i class="profilepro-icon-caret-up"></i>' + error + '</div>' );
		parent.find('.profilepro-warning-message').css({'top' : '0px', 'opacity' : '1'});
	}
	

}

function profilepro_client_error( element, parent, error) {
	if (element.data('custom-error')) {
		error = element.data('custom-error');
	}
	
	if ( element.attr('type') ) {
	
		if (element.attr('type') == 'hidden') {
			
			parent.find('.icon-ok').remove();
			if (parent.find('.profilepro-warning-message').length==0) {
				element.addClass('warning').removeClass('ok');
				parent.append('<div class="profilepro-warning-message"><i class="profilepro-icon-caret-up"></i>' + error + '</div>');
				parent.find('.profilepro-warning-message').css({'top' : '0px', 'opacity' : '1'});
			} else {
				parent.find('.profilepro-warning-message').html('<i class="profilepro-icon-caret-up"></i>' + error );
				parent.find('.profilepro-warning-message').css({'top' : '0px', 'opacity' : '1'});
			}
			
		} else {
		
			parent.find('.icon-ok').remove();
			if (parent.find('.profilepro-warning-message').length==0) {
				element.addClass('warning').removeClass('ok');
				element.after('<div class="profilepro-warning-message"><i class="profilepro-icon-caret-up"></i>' + error + '</div>');
				parent.find('.profilepro-warning-message').css({'top' : '0px', 'opacity' : '1'});
			} else {
				parent.find('.profilepro-warning-message').html('<i class="profilepro-icon-caret-up"></i>' + error );
				parent.find('.profilepro-warning-message').css({'top' : '0px', 'opacity' : '1'});
			}
		
		}

	} else {
	
		// select
		if (parent.find('.profilepro-warning-message').length == 0) {
		parent.find('.chosen-container').after( '<div class="profilepro-warning-message"><i class="profilepro-icon-caret-up"></i>' + error + '</div>' );
		parent.find('.profilepro-warning-message').css({'top' : '0px', 'opacity' : '1'});
		} else {
		parent.find('.profilepro-warning-message').html('<i class="profilepro-icon-caret-up"></i>' + error );
		parent.find('.profilepro-warning-message').css({'top' : '0px', 'opacity' : '1'});
		}
		
	}
}
function profilepro_clear_input( element ) {
	element.parents('.profilepro-input').find('.profilepro-warning').remove();
	element.removeClass('warning');
}
function profilepro_client_valid( element, parent) {
	
	if ( element.attr('type') ) {
	
		if (element.attr('type') == 'radio' || element.attr('type') == 'checkbox') {
		
			parent.find('.profilepro-warning-message').remove();
			element.removeClass('warning').addClass('ok');
			
		} else {
		
			parent.find('.profilepro-warning-message').remove();
			element.removeClass('warning').addClass('ok');
			if (parent.find('.icon-ok').length==0){
				if (element.val() != '') {
				parent.append('<div class="icon-ok"><i class="profilepro-icon-ok"></i></div>');
				} else {
				parent.find('.icon-ok').remove();
				}
			}
	
		}
		
	} else {
		
		parent.find('.profilepro-warning-message').remove();
		
	}
}

jQuery(document).on('submit', '.profilepro form', function(e){
		e.preventDefault();
		return false;
});

function profilepro_ajax_upload(){
	jQuery(".profilepro-image-upload").each(function(){
	var allowed = jQuery(this).data('allowed_extensions');
	var filetype = jQuery(this).data('filetype');
	var form = jQuery(this).parents('.profilepro').find('form');
	jQuery(this).uploadFile({
			url: profilepro_ajax_url+'?action=profilepro_ajax_upload',
			allowedTypes: allowed,
			onSubmit:function(files){
				var statusbar = jQuery('.ajax-file-upload-statusbar:visible');
				statusbar.parents('.profilepro-element').find('.remove_image').hide();
			},
			onSuccess:function(files,data,xhr){
			var statusbar = jQuery('.ajax-file-upload-statusbar:visible');
			data = jQuery.parseJSON(data);
			if(data.status==2){
				alert('File size exceeds allowed file size limit.');
				statusbar.hide();
				return;
			}
			if(data.status==0)
			{
				alert('Invalid file type.');
				statusbar.hide();
				return;
			}
			var src = data.target_file_uri;
			statusbar.parents('.profilepro-element').find('img').attr('src', src );
			statusbar.parents('.profilepro-element').find('input[type=hidden]').val( src );
			statusbar.parents('.profilepro-element').find('.remove_image').show();
			statusbar.remove();
			}
		});
	});
}
