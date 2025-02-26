jQuery.noConflict();
jQuery(document).ready(function(){
	
		
		if( jQuery( "#pcp_is_button option:selected" ).text() =='Button'){
		
			jQuery('.pcpp_button_in_image_row').show();
		
		}else{
			
			jQuery('.pcpp_button_in_image_row').hide();
			
		}
});

jQuery(document).on('change','#pcp_is_button',is_button_func);
function is_button_func(){
	
	if( jQuery( "#pcp_is_button option:selected" ).text() =='Button')
	{ 
		jQuery('.pcpp_button_in_image_row').show();
	
	}else{
		jQuery('.pcpp_button_in_image_row').hide();
	}
}