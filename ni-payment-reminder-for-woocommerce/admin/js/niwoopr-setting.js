jQuery(document).ready(function ($) {
	//alert(niwoopr_ajax_object.niwoopr_ajax_url)
	jQuery(".alert").hide();
	//frm_setting
	jQuery("#frm_setting").submit(function (event) {
		 event.preventDefault(); 
		 
		 if (!IsValidate()){
		 	jQuery(".alert").show();
			jQuery(".alert").removeClass('alert-success').addClass('alert-danger').html('Marked fields are <strong> required </strong>')
			return false;
		 }
		 
		 var ni_editor_type = 'html-active';
		 if(jQuery("#wp-email_content-wrap").hasClass('html-active')){		 
		 	 jQuery("#ni_editor_type").val('html-active');
			 ni_editor_type = 'html-active';
		 }else{
		 	jQuery("#ni_editor_type").val('tmce-active');
			 ni_editor_type = 'tmce-active';
		 }
		 
		 if(ni_editor_type == 'tmce-active'){
		 	jQuery("#email_content-html").trigger("click");
		 }
		 
		 var form_data = jQuery(this).serialize();
		 
		 if(ni_editor_type == 'tmce-active'){
			jQuery("#email_content-tmce").trigger("click");
		 }	
		 
		jQuery.ajax({
			url:niwoopr_ajax_object.niwoopr_ajax_url,
			data: form_data,
			success: function (response) {
					jQuery(".alert").show();
					  jQuery(".alert").removeClass('alert-danger').addClass('alert-success').html('Record <strong>  saved </strong> successfully');
					jQuery('.alert').delay(5000).fadeOut(400);
			},
			error: function (response) {
					alert(JSON.stringify(response));
				//alert("e");
			}
		});
		 
		 return false;
	});
	
	
	 var ni_editor_type =  jQuery("#ni_editor_type").val();
	 if(ni_editor_type == 'tmce-active'){
		jQuery("#email_content-tmce").trigger("click");
	 }
	
})

function IsValidate(){
	var isValid = true;
	var from_name = jQuery.trim(jQuery("#from_name").val());
	var from_email_address = jQuery.trim(jQuery("#from_email_address").val());
	var email_subject_line = jQuery.trim(jQuery("#email_subject_line").val());
	
	if (from_name ===""){
		isValid = false;
		jQuery("#from_name").addClass("is-invalid").removeClass("is-valid");
	}else{
		jQuery("#from_name").addClass("is-valid").removeClass("is-invalid");
	}
	if (from_email_address ===""){
		isValid = false;
		jQuery("#from_email_address").addClass("is-invalid").removeClass("is-valid");
	}else{
		if (!isEmail(from_email_address)){
			isValid = false;
			jQuery("#from_email_address").addClass("is-invalid").removeClass("is-valid");
		}else{
			jQuery("#from_email_address").addClass("is-valid").removeClass("is-invalid");
		}
	}
	if (email_subject_line ===""){
		isValid = false;
		jQuery("#email_subject_line").addClass("is-invalid").removeClass("is-valid");
	}else{
		jQuery("#email_subject_line").addClass("is-valid").removeClass("is-invalid");
	}
	return isValid;
}
function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}