jQuery(document).ready(function(){

	jQuery('body').on('click','.form_option_billing',function() {
		jQuery('body').addClass("dsabafw_billing_popup_body");
		jQuery('body').append('<div class="dsabafw_loading"><img src="'+ DSABAFWscript.object_name +'/assets/img/loader.gif" class="dsabafw_loader"></div>');
		var loading = jQuery('.dsabafw_loading');
		loading.show();

		var id = jQuery(this).data("id");
		var current = jQuery(this);
		jQuery.ajax({
			url: DSABAFWscript.ajax_url,
			type:'POST',
			data:'action=productscommentsbilling&popup_id_pro='+id,
			success : function(response) {
				var loading = jQuery('.dsabafw_loading');
				loading.remove(); 
				jQuery("#dsabafw_billing_popup").css("display","block");
				jQuery("#dsabafw_billing_popup").html(response);
			},
			error: function() {
				alert('Error occured');
			}
		});
	  jQuery('html, body').animate({ scrollTop: 0 }, 'slow');
	   return false; 
    });

	jQuery('body').on('click','.dsabafw_close',function(){
		jQuery("#dsabafw_billing_popup").css("display","none");
		jQuery('body').removeClass("dsabafw_billing_popup_body");
	});
	
	jQuery('body').on('click','.form_option_edit',function(){
		
		jQuery('body').addClass("dsabafw_billing_popup_body");
		jQuery('body').append('<div class="dsabafw_loading"><img src="'+ DSABAFWscript.object_name +'/assets/img/loader.gif" class="dsabafw_loader"></div>');
		var loading = jQuery('.dsabafw_loading');
		loading.show();

		var id = jQuery(this).data("id");
		var eid = jQuery(this).data("eid-bil");
		var current = jQuery(this);
		jQuery.ajax({
			url: DSABAFWscript.ajax_url,
			type:'POST',
			data:'action=productscommentsbilling&popup_id_pro='+id+'&eid-bil='+eid,
			dataType: 'JSON',
			success : function(response) {
				var loading = jQuery('.dsabafw_loading');
				var html = response[0].html;
				loading.remove();
				jQuery("#dsabafw_billing_popup").css("display","block");
				jQuery("#dsabafw_billing_popup").html(html);
				jQuery( '#billing_country' ).trigger( 'change' );
				jQuery( '#billing_state' ).trigger( 'change' );
			},
			error: function() {
				alert('Error occured');
			}
		});
	   jQuery('html, body').animate({ scrollTop: 0 }, 'slow');
	   return false; 
   	});

	jQuery('body').on('click','.dsabafw_close',function(){
		jQuery("#dsabafw_billing_popup").css("display","none");
		jQuery('body').removeClass("dsabafw_billing_popup_body");
	});

	/* fill form select address */

	function populateBillingFields(data) {
		console.log("data",data);
		jQuery("#billing_first_name").val(data.firstName);
		jQuery("#billing_last_name").val(data.lastName);
		jQuery("#billing_company").val(data.company);
		jQuery("#billing_country").val(data.country).change();
		jQuery("#billing_address_1").val(data.address1);
		jQuery("#billing_address_2").val(data.address2);
		jQuery("#billing_city").val(data.city);
		jQuery("#billing_state").val(data.state).change();
		jQuery("#billing_postcode").val(data.postcode);
		jQuery("#billing_phone").val(data.phone);
		jQuery("#billing_email").val(data.email);
	}

	jQuery('.dsabafw_select').change(function() {
		var selectedOption = jQuery(this).find('option:selected');
	

		var addressName = selectedOption.text().trim(); 

		var billingData = {
			firstName: selectedOption.data('first-name'),
			lastName: selectedOption.data('last-name'),
			company: selectedOption.data('company'),
			country: selectedOption.data('country'),
			address1: selectedOption.data('address1'),
			address2: selectedOption.data('address2'),
			city: selectedOption.data('city'),
			state: selectedOption.data('state'),
			postcode: selectedOption.data('postcode'),
			phone: selectedOption.data('phone'),
			email: selectedOption.data('email'),
			// addressName: addressName 
		};
	

		populateBillingFields(billingData);
		console.log("billingData", billingData); 
	});
	
	var select_defaultbil = jQuery('.dsabafw_select').val();
	if (select_defaultbil != "" && select_defaultbil != undefined) {
		jQuery('.dsabafw_select').change();
	}

	function populateshippingFields(data) {
		console.log("data",data);
		jQuery("#shipping_first_name").val(data.firstName);
		jQuery("#shipping_last_name").val(data.lastName);
		jQuery("#shipping_company").val(data.company);
		jQuery("#shipping_country").val(data.country).change();
		jQuery("#shipping_address_1").val(data.address1);
		jQuery("#shipping_address_2").val(data.address2);
		jQuery("#shipping_city").val(data.city);
		jQuery("#shipping_state").val(data.state).change();
		jQuery("#shipping_postcode").val(data.postcode);
	}


	jQuery('.dsabafw_select_shipping').change(function() {
		var selectedOption = jQuery(this).find('option:selected');
	
		var addressName = selectedOption.text().trim(); 

		var shippingDataa = {
			firstName: selectedOption.data('first-name'),
			lastName: selectedOption.data('last-name'),
			company: selectedOption.data('company'),
			country: selectedOption.data('country'),
			address1: selectedOption.data('address1'),
			address2: selectedOption.data('address2'),
			city: selectedOption.data('city'),
			state: selectedOption.data('state'),
			postcode: selectedOption.data('postcode'),
			// addressName: addressName 
		};

		populateshippingFields(shippingDataa);
		console.log("shippingDataa", shippingDataa); 
	});
	

	var select_defaultbil = jQuery('.dsabafw_select_shipping').val();
	if (select_defaultbil != "" && select_defaultbil != undefined) {
		jQuery('.dsabafw_select_shipping').change(); 
	}
	


	/* fill form select address end */

	jQuery('body').on('click','.form_option_shipping',function(){
		jQuery('body').addClass("dsabafw_shipping_popup_body");
		jQuery('body').append('<div class="dsabafw_loading"><img src="'+ DSABAFWscript.object_name +'/assets/img/loader.gif" class="dsabafw_loader"></div>');
		var loading = jQuery('.dsabafw_loading');
		loading.show();

		var id = jQuery(this).data("id");

		var current = jQuery(this);
		jQuery.ajax({
			url: DSABAFWscript.ajax_url,
			type:'POST',
			data:'action=productscommentsshipping&popup_id_pro='+id,
			success : function(response) {
				var loading = jQuery('.dsabafw_loading');
				loading.remove(); 
				jQuery("#dsabafw_shipping_popup").css("display","block");
				jQuery("#dsabafw_shipping_popup").html(response);

			},
			error: function() {
				alert('Error occured');
			}
		});
	   jQuery('html, body').animate({ scrollTop: 0 }, 'slow');
	   return false; 
    });

	jQuery('body').on('click','.dsabafw_close',function(){
		jQuery("#dsabafw_shipping_popup").css("display","none");
		jQuery('body').removeClass("dsabafw_shipping_popup_body");
	});

	jQuery(".defalut_address").on("click", function () {  
	
			var selectedValue = jQuery(this).data("value");  
			var defalteaddd_id = jQuery(this).data("add_id");
		   	var defalteaddd_type = jQuery(this).data("type");
		     // alert(defalteaddd_type);
		    var current = jQuery(this);
			jQuery.ajax({
				url: DSABAFWscript.ajax_url,
				type:'POST',
				data:'action=dsabafw_default_address&defalteaddd_id='+defalteaddd_id+'&dealteadd_type='+defalteaddd_type,
				success : function(response) {
				
					 location.reload();
				},

   			});
   	});

   	jQuery(".defalt_addd_shipping").on("click", function () {  
  
		    var selectedValue = jQuery(this).data("value");  
			var defalteaddd_id = jQuery(this).data("add_id");
		   	var defalteaddd_type = jQuery(this).data("type");
		     // alert(defalteaddd_type);
		    var current = jQuery(this);
			jQuery.ajax({
				url: DSABAFWscript.ajax_url,
				type:'POST',
				data:'action=dsabafw_default_address_shipping&defalteaddd_id='+defalteaddd_id+'&dealteadd_type='+defalteaddd_type,
				success : function(response) {
				location.reload();

				},

   			});
   	});

	jQuery('body').on('click','.form_option_ship_edit',function(){
		jQuery('body').addClass("dsabafw_shipping_popup_body");
		jQuery('body').append('<div class="dsabafw_loading"><img src="'+ DSABAFWscript.object_name +'/assets/img/loader.gif" class="dsabafw_loader"></div>');
		var loading = jQuery('.dsabafw_loading');
		loading.show();
	    var id = jQuery(this).data("id");
	    var eid = jQuery(this).data("eid-ship");
		var current = jQuery(this);
		jQuery.ajax({
			url: DSABAFWscript.ajax_url,
			type:'POST',
			data:'action=productscommentsshipping&popup_id_pro='+id+'&eid-ship='+eid,
			success : function(response) {
				var loading = jQuery('.dsabafw_loading');
				loading.remove(); 
				jQuery("#dsabafw_shipping_popup").css("display","block");
				jQuery("#dsabafw_shipping_popup").html(response);
				jQuery( '#shipping_country' ).trigger( 'change' );
				jQuery( '#shipping_state' ).trigger( 'change' );

			},
			error: function() {
				alert('Error occured');
			}
		});
		jQuery('html, body').animate({ scrollTop: 0 }, 'slow');
	   return false; 
    });

	jQuery('body').on('click','.dsabafw_close',function(){
		jQuery("#dsabafw_shipping_popup").css("display","none");
		jQuery('body').removeClass("dsabafw_shipping_popup_body");
	});

	jQuery('body').on('click','#dsabafw_add_billing_form_submit',function() {
		jQuery('#dsabafw_add_billing_form').attr('onsubmit','return false;');
		jQuery('#dsabafw_add_billing_form input').removeClass('dsabafw_inerror');
		jQuery('#dsabafw_add_billing_form select').removeClass('dsabafw_inerror');

		jQuery.ajax({
			url: DSABAFWscript.ajax_url,
			type:'POST',
			data: jQuery('#dsabafw_add_billing_form').serialize() + "&action=dsabafw_validate_billing_form_fields",
			dataType: 'JSON',
			success : function(response) {
				var added = response['added'];
				var field_errors = response.field_errors;
				if( added == 'false' ) {
					jQuery.each(field_errors, function(i, item) {
					    jQuery("#dsabafw_add_billing_form #"+i).addClass('dsabafw_inerror');
					});
				} else {
					location.reload();	
				}
			},
			error: function() {
				alert('Error occured');
			}
		});
	});

	jQuery('body').on('click','#dsabafw_edit_billing_form_submit',function() {
		jQuery('#dsabafw_edit_billing_form').attr('onsubmit','return false;');
		jQuery('#dsabafw_edit_billing_form input').removeClass('dsabafw_inerror');
		jQuery('#dsabafw_edit_billing_form select').removeClass('dsabafw_inerror');

		jQuery.ajax({
			url: DSABAFWscript.ajax_url,
			type:'POST',
			data: jQuery('#dsabafw_edit_billing_form').serialize() + "&action=dsabafw_validate_edit_billing_form_fields",
			dataType: 'JSON',
			success : function(response) {
				var added = response['added'];
				var field_errors = response.field_errors;
				
				if( added == 'false' ) {
					jQuery.each(field_errors, function(i, item) {
					    jQuery("#dsabafw_edit_billing_form #"+i).addClass('dsabafw_inerror');
					});
				} else {
					location.reload();
				}
			},
			error: function() {
				alert('Error occured');
			}
		});
	});

	jQuery('body').on('click','#dsabafw_edit_shipping_form_submit',function() {
		jQuery('#dsabafw_edit_shipping_form').attr('onsubmit','return false;');
		jQuery('#dsabafw_edit_shipping_form input').removeClass('dsabafw_inerror');
		jQuery('#dsabafw_edit_shipping_form select').removeClass('dsabafw_inerror');

		jQuery.ajax({
			url: DSABAFWscript.ajax_url,
			type:'POST',
			data: jQuery('#dsabafw_edit_shipping_form').serialize() + "&action=dsabafw_validate_edit_shipping_form_fields",
			dataType: 'JSON',
			success : function(response) {
				var added = response['added'];
				var field_errors = response.field_errors;
				
				if( added == 'false' ) {
					jQuery.each(field_errors, function(i, item) {
					    jQuery("#dsabafw_edit_shipping_form #"+i).addClass('dsabafw_inerror');
					});
				} else {
					location.reload();
				}
			},
			error: function() {
				alert('Error occured');
			}
		});
	});

	jQuery('body').on('click','#dsabafw_add_shipping_form_submit',function() {
		jQuery('#dsabafw_add_shipping_form').attr('onsubmit','return false;');
		jQuery('#dsabafw_add_shipping_form input').removeClass('dsabafw_inerror');
		jQuery('#dsabafw_add_shipping_form select').removeClass('dsabafw_inerror');

		jQuery.ajax({
			url: DSABAFWscript.ajax_url,
			type:'POST',
			data: jQuery('#dsabafw_add_shipping_form').serialize() + "&action=dsabafw_validate_shipping_form_fields",
			dataType: 'JSON',
			success : function(response) {
				var added = response['added'];
				var field_errors = response.field_errors;
				if( added == 'false' ) {
					jQuery.each(field_errors, function(i, item) {
					    jQuery("#dsabafw_add_shipping_form #"+i).addClass('dsabafw_inerror');
					});
				} else {
					location.reload();
				}
			},
			error: function() {
				alert('Error occured');
			}
		});
	});
	


	jQuery('body').on('click','.shipping_dsabafw_close_choice_section',function(){
		jQuery(".shipping_address_selection_popup_main").fadeOut(400);
		jQuery('body').removeClass("dsabafw_choice_ship_address");
	});

	

});

