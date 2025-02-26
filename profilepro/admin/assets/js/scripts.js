jQuery(document).ready(function(){
	jQuery(document).on('click', '.profilepro-admin-delete-field', function(e){
		e.preventDefault();
		jQuery(this).parents('.profilepro-admin-drag-drop-field').remove();
	})
	
	jQuery(document).on('click', 'a[data-popup^="profilepro_"]', function(e){
		
		e.preventDefault();
		if( jQuery(this).data('content') ){
			profilepro_add_new_admin_popup();
			profilepro_admin_ajax_function(jQuery(this).data('content'),jQuery(this).data('arg1'), jQuery(this).data('arg2'), jQuery(this).data('arg3'));
		}
		return false;
	});
	
	jQuery(document).on('click','a[data-action^="profilepro_admin_popup"]', function(e){
		
		e.preventDefault();
		var elm = jQuery(this);
		if( jQuery(this).data('action') == 'profilepro_admin_popup_edit_field' ){
			profilepro_add_new_admin_popup();
		}
		profilepro_add_admin_field( elm.data('action'), elm.data('arg1'), elm.data('arg2'), elm.data('arg3'));
		return false;
	});
	
	jQuery(document).on('click','.profilepro-admin-close',function(){
		profilepro_close_admin_popup();
	});
	
	jQuery(".profilepro-form-builder-wrapper").sortable();
	
	jQuery(document).on('click','.profilepro-form-type input[type=radio]',function(){
		if(jQuery(this).val()=='register'){
			
			jQuery('#profilepro-admin-form-role').show();
			jQuery('#profilepro-admin-form-autologin').show();
		}else{
			jQuery('#profilepro-admin-form-role').hide();
			jQuery('#profilepro-admin-form-autologin').hide();
		}
	});
	
});


function profilepro_add_new_admin_popup(){
	
	var url = data.url;
	jQuery('body').append('<div id="profilepro_admin_modal" class="profilepro-admin-modal-popup"></div>');
	jQuery('#profilepro_admin_modal').append('<div class="profilepro-admin-modal-content"><div class="profilepro-admin-modal-popup-header"><div class="titletxt">Fields Setup<div class="profilepro-admin-close">x</div></div></div><div id="profilepro-popup_content"></div><div class="profilepro-admin-popup-footer"></div></div>');
	jQuery('#profilepro-popup_content').html("<div class='profilepro-loader-img'><img src='"+url+"assets/images/loader.gif'></div>");
}

function profilepro_close_admin_popup(){
	jQuery('#profilepro_admin_modal').remove();
	jQuery('#profilepro-admin-modal-content').remove();
}

function profilepro_admin_ajax_function(act_id , arg1, arg2, arg3){
	
	jQuery.ajax({
		url:profilepro_ajax_url,
		type:'POST',
		data:{action:'profilepro_get_popup_contents', act_id:act_id, arg1:arg1, arg2:arg2, arg3:arg3},
		success: function(data){
			jQuery('#profilepro-popup_content').html(data);
		}
	});
}

function profilepro_add_admin_field(act_id , arg1, arg2, arg3){
	jQuery.ajax({
		url:profilepro_ajax_url,
		type:'POST',
		data:{action:'profilepro_admin_add_field', act_id:act_id, arg1:arg1, arg2:arg2, arg3:arg3},
		success: function(data){ 
			if( act_id == 'profilepro_admin_popup_add_builtin_field' || act_id == 'profilepro_admin_popup_add_custom_field' ){
				
				jQuery('.profilepro-admin-add-field').before(data);
				profilepro_close_admin_popup();
				
			}
			
			else if( act_id == 'profilepro_admin_popup_create_field' ){
				jQuery('#profilepro-popup_content').html(data);
				jQuery('#profilepro_admin_add_custom_field').on('click',function(){
				  profilepro_admin_add_custom_field( this )
				});
			}
			
			else if( act_id == 'profilepro_admin_popup_edit_field' ){
				jQuery('#profilepro-popup_content').html(data);
				jQuery('#profilepro_admin_update_field').on('click',function(){
				  profilepro_admin_update_field( this )
				});
			}
		}
	});
}

function profilepro_admin_update_field( elm ){
	var form = jQuery(elm).closest("form");
	var arg2 = jQuery(elm).data("arg2");
	jQuery.ajax({
		url:profilepro_ajax_url,
		type:'POST',
		data:form.serialize()+"&action=profilepro_admin_update_field&arg2="+arg2,
		success: function(data){
			profilepro_close_admin_popup();
		}
	});
}

function profilepro_admin_add_custom_field( elm  ){
	var form = jQuery(elm).closest("form");
	var arg2 = jQuery(elm).data("arg2");
	jQuery.ajax({
		url:profilepro_ajax_url,
		type:'POST',
		data:form.serialize()+"&action=profilepro_admin_add_custom_field&arg2="+arg2,
		success: function(data){
			
			jQuery('.profilepro-admin-add-field').before(data);
			profilepro_close_admin_popup();
		}
	});
}
