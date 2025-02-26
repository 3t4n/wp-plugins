jQuery(document).ready(function(){
	var changeAdminEmailbtn = "<div style='display:flex;align-items:center;'><input type='submit' class='button button-primary' name='changeAdminEmailbtn' id='changeAdminEmailbtn' value='"+cae_adminjs_object.change_admin_email_button_text+"' /><div style='margin-left:10px;' class='admin-email-change-error'></div></div>";
    jQuery(changeAdminEmailbtn).insertAfter("#new-admin-email-description");
    var insertInput = "<input type='hidden' name='change-admin-email-nonce' class='change-admin-email-nonce' value='"+cae_adminjs_object.change_admin_email_nonce+"' />";
    jQuery(insertInput).insertAfter("#new-admin-email-description");
    
    jQuery( "tr" ).on("click", "#changeAdminEmailbtn", function( event ) {
    	jQuery('.admin-email-change-error span').remove();
        event.preventDefault();
        var changeEmailData = {
	        action: "cea_update_admin_email",
	        change_admin_email_nonce: jQuery('.change-admin-email-nonce').val(),
	        new_admin_email: jQuery('#new_admin_email').val()
	    };
	    jQuery.ajax({
	        url: cae_adminjs_object.ajaxurl,
	        data: changeEmailData,
	        type: 'POST',
	        success: function (response) {
	            let data = JSON.parse(response);
	            let message = data.message;
	            if(data.status){
	            	jQuery('.admin-email-change-error').html("<span class='notice notice-success'>"+message+"</span>");
	            }else{
	            	jQuery('.admin-email-change-error').html("<span class='notice notice-error'>"+message+"</span>");
	            }
	            setTimeout(function(){
	            	jQuery('.admin-email-change-error span').remove();
	            }, 10000);
	        }
	    });
	});
});