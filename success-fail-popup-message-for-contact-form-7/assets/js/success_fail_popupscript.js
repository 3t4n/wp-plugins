/*  Display Popup when Contact Form 7 successfully submitted  */

// Submit form after popup show
document.addEventListener( 'wpcf7submit', function( event ) {
	var currentformid = event.detail.contactFormId;

	var popup_id = event.detail.apiResponse.popup_id;
	var failure_popup_id = event.detail.apiResponse.failure_popup_id;
	var failurestatus = event.detail.apiResponse.status;
	var failuremessage = event.detail.apiResponse.message;

	if( event.detail.apiResponse.sfpmcf7_failure_popup_background_option == "bg_color"){
    	var color_code = event.detail.apiResponse.sfpmcf7_failure_popup_background_color;    	
    }

    if(event.detail.apiResponse.sfpmcf7_failure_popup_background_option  === "gradient_color"){
		var color_code = 'linear-gradient('+ event.detail.apiResponse.sfpmcf7_failure_popup_gradient_color +','+ event.detail.apiResponse.sfpmcf7_failure_popup_gradient_color1 +')';
	}

    if(event.detail.apiResponse.sfpmcf7_failure_popup_background_option  === "image"){
    	var color_code = '  url("' + event.detail.apiResponse.sfpmcf7_failure_popup_image_color + '")right center / cover no-repeat';
    }

	if ((failure_popup_id != null && failure_popup_id != '') && (failurestatus == 'validation_failed' || failurestatus == 'acceptance_missing' || failurestatus == 'spam' || failurestatus == 'aborted' || failurestatus == 'mail_failed')) {
		swal({

			// set popup background color and image	
			background: color_code,

			// set popup message
			title: '<span style="color:' + event.detail.apiResponse.sfpmcf7_failure_popup_text_color +'">'+failuremessage+'</span>',
			confirmButtonColor: event.detail.apiResponse.sfpmcf7_failure_popup_button_background_color,
			confirmButtonText: '<span style="color:' + event.detail.apiResponse.sfpmcf7_failure_popup_text_color +'">'+event.detail.apiResponse.sfpmcf7_failure_popup_button_text+'</span>',

			// set popup width
			width: event.detail.apiResponse.sfpmcf7_failure_popup_width,

			//set popup duration time in seconds 
			timer: event.detail.apiResponse.sfpmcf7_failure_popup_duration,
		})
		
		jQuery('.swal2-modal').css('border-radius', event.detail.apiResponse.sfpmcf7_failure_popup_radius+"px");
	 }	
}, false );


// Submit form after send email
document.addEventListener( 'wpcf7mailsent', function( event ) {

	var currentformid = event.detail.contactFormId;
	var popup_id = event.detail.apiResponse.popup_id;

	//Store popup background color and search , is aveliable or not if not aveliable then it is normal color or gradient color
    if( event.detail.apiResponse.sfpmcf7_popup_background_option == "bg_color"){
    	var color_code = event.detail.apiResponse.sfpmcf7_popup_background_color;    	
    }

    if(event.detail.apiResponse.sfpmcf7_popup_background_option  === "gradient_color"){
		var color_code = 'linear-gradient('+ event.detail.apiResponse.sfpmcf7_popup_gradient_color +','+ event.detail.apiResponse.sfpmcf7_popup_gradient_color1 +')';
	}

    if(event.detail.apiResponse.sfpmcf7_popup_background_option  === "image"){
    	var color_code = '  url("' + event.detail.apiResponse.sfpmcf7_popup_image_color + '")right center / cover no-repeat';
    }

 	if (popup_id != null && popup_id != '') {  
		//popup box
		swal({

			// set popup background color and image	
			background: color_code,

			// set popup message
			title: '<span style="color:' + event.detail.apiResponse.sfpmcf7_popup_text_color +'">'+event.detail.apiResponse.sfpmcf7_popup_message+'</span>',
			confirmButtonColor: event.detail.apiResponse.sfpmcf7_popup_button_background_color,
			confirmButtonText: '<span style="color:' + event.detail.apiResponse.sfpmcf7_popup_text_color +'">'+event.detail.apiResponse.sfpmcf7_popup_button_text+'</span>',

			// set popup width
			width: event.detail.apiResponse.sfpmcf7_m_popup_width,

			//set popup duration time in seconds 
			timer: event.detail.apiResponse.sfpmcf7_m_popup_duration,

		})
		jQuery('.swal2-modal').css('border-radius', event.detail.apiResponse.sfpmcf7_m_popup_radius+"px");
 	}
}, false );



