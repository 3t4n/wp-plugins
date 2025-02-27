jQuery(function(){

	var li_id;
	var li_id_div;
	jQuery(document).on('click','.GPV-single-li-div',function(){		
		li_id=jQuery(this).attr('id');		
		li_id_div=jQuery('#'+li_id);
		jQuery('.GPV-single-li-div').removeClass('GPV_active');
		li_id_div.addClass('GPV_active');
	});	

	jQuery(document).on('change','.GPV_select_option',function(){
		var GPV_type=jQuery(this).val();		
		li_id_div.find('.js-hide').hide();
		if(GPV_type=='Image'){
			li_id_div.find('.video-url-div').add(li_id_div.find('.video-link-div')).fadeOut('slow');
		}else if(GPV_type=='Video'){			
			li_id_div.find('.video-url-div').fadeIn('slow');			
		}else if(GPV_type=='Link'){			
			li_id_div.find('.video-link-div').fadeIn('slow');
		}
	});	

	jQuery('.GPV_dafult_button').click(function(e){
		e.preventDefault();
		jQuery('input[name=GPV_setting_button_text]').val('Load');
	});

	jQuery('.GPV_dafult_char').click(function(e){
		e.preventDefault();
		jQuery('input[name=GPV_setting_description_char]').val('400');
	});
});