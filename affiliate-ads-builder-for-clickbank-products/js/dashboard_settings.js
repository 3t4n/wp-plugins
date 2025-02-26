jQuery(document).ready(function () {



		jQuery('#mycbgenie_label_top_ad_show').on('click', function(){
			jQuery('#mycbgenie_ad_top_sub_div').toggle(300);
			
		    var radio_clicked=jQuery('[name="mycbgenie_ad_format_top_single_post"]:checked','#mycbgenie_ad_form_id').val()	;			
			mycbgenie_ad_top_shortcode_hide_show(radio_clicked);			
			
		});

		jQuery('#mycbgenie_label_bottom_ad_show').on('click', function(){
			jQuery('#mycbgenie_ad_bottom_sub_div').toggle(300);
			
		    var radio_clicked=jQuery('[name="mycbgenie_ad_format_bottom_single_post"]:checked','#mycbgenie_ad_form_id').val()	;			
			mycbgenie_ad_bottom_shortcode_hide_show(radio_clicked);
		});

/*
		jQuery('#mycbgenie_btm_arrow_label_bottom_ad_show').on('click', function(){
			jQuery('#mycbgenie_ad_bottom_sub_div').toggle();
		});

*/

		
		jQuery('#mycbgenie_show_ads_on_top_single_posts').on('click', function(){

				if (jQuery('#mycbgenie_show_ads_on_top_single_posts').prop('checked')){
					jQuery('#mycbgenie_ad_top_sub_div').show(300);
				}else{
					jQuery('#mycbgenie_ad_top_sub_div').hide(300);
				}
				
				var radio_clicked=jQuery('[name="mycbgenie_ad_format_top_single_post"]:checked','#mycbgenie_ad_form_id').val()	;			
				mycbgenie_ad_top_shortcode_hide_show(radio_clicked);
		});

			
		jQuery('#mycbgenie_show_ads_on_bottom_single_posts').on('click', function(){
									
				if (jQuery('#mycbgenie_show_ads_on_bottom_single_posts').prop('checked')){
					jQuery('#mycbgenie_ad_bottom_sub_div').show(300);
				}else{
					jQuery('#mycbgenie_ad_bottom_sub_div').hide(300);
				}
				
				
				var radio_clicked=jQuery('[name="mycbgenie_ad_format_bottom_single_post"]:checked','#mycbgenie_ad_form_id').val()	;			
				mycbgenie_ad_bottom_shortcode_hide_show(radio_clicked);
		});
		
	jQuery('[name="mycbgenie_ad_format_top_single_post"]').on('change', function() {
			

			
			var radio_clicked;
		   radio_clicked=jQuery('[name="mycbgenie_ad_format_top_single_post"]:checked','#mycbgenie_ad_form_id').val()	;
			
			jQuery('#mycbgenie_short_code_info').show(300);
			mycbgenie_ad_top_shortcode_hide_show(radio_clicked);
   });



	jQuery('[name="mycbgenie_ad_format_bottom_single_post"]').on('change', function() {
			

			
			var radio_clicked;
		   radio_clicked=jQuery('[name="mycbgenie_ad_format_bottom_single_post"]:checked','#mycbgenie_ad_form_id').val()	;
			
			jQuery('#mycbgenie_short_code_info').show(300);
			mycbgenie_ad_bottom_shortcode_hide_show(radio_clicked);
			
   });
				
	return false;
	

});

function mycbgenie_ad_top_shortcode_hide_show(radio_clicked){
	
			if (radio_clicked=="BANNER") {
				
				jQuery('[name="mycbgenie_ad_top_banner_short_code"]').show(300);
				
				jQuery('[name="mycbgenie_ad_top_carousel_short_code"]').hide(300);				
				jQuery('[name="mycbgenie_ad_top_image_short_code"]').hide(300);				
				jQuery('[name="mycbgenie_ad_top_text_short_code"]').hide(300);								
			}
			
			if (radio_clicked=="TEXT") {
				
				jQuery('[name="mycbgenie_ad_top_text_short_code"]').show(300);
				
				jQuery('[name="mycbgenie_ad_top_carousel_short_code"]').hide(300);				
				jQuery('[name="mycbgenie_ad_top_image_short_code"]').hide(300);				
				jQuery('[name="mycbgenie_ad_top_banner_short_code"]').hide(300);								
			}
			
			if (radio_clicked=="IMAGE") {
				
				jQuery('[name="mycbgenie_ad_top_image_short_code"]').show(300);
				
				jQuery('[name="mycbgenie_ad_top_carousel_short_code"]').hide(300);				
				jQuery('[name="mycbgenie_ad_top_text_short_code"]').hide(300);				
				jQuery('[name="mycbgenie_ad_top_banner_short_code"]').hide(300);								
			}
			
			
			if (radio_clicked=="CAROUSEL") {
				
				jQuery('[name="mycbgenie_ad_top_carousel_short_code"]').show(300);
				
				jQuery('[name="mycbgenie_ad_top_text_short_code"]').hide(300);				
				jQuery('[name="mycbgenie_ad_top_image_short_code"]').hide(300);				
				jQuery('[name="mycbgenie_ad_top_banner_short_code"]').hide(300);								
			}
}


function mycbgenie_ad_bottom_shortcode_hide_show(radio_clicked){
	
			if (radio_clicked=="BANNER") {
				
				jQuery('[name="mycbgenie_ad_bottom_banner_short_code"]').show(300);
				
				jQuery('[name="mycbgenie_ad_bottom_carousel_short_code"]').hide(300);				
				jQuery('[name="mycbgenie_ad_bottom_image_short_code"]').hide(300);				
				jQuery('[name="mycbgenie_ad_bottom_text_short_code"]').hide(300);								
			}
			
			if (radio_clicked=="TEXT") {
				
				jQuery('[name="mycbgenie_ad_bottom_text_short_code"]').show(300);
				
				jQuery('[name="mycbgenie_ad_bottom_carousel_short_code"]').hide(300);				
				jQuery('[name="mycbgenie_ad_bottom_image_short_code"]').hide(300);				
				jQuery('[name="mycbgenie_ad_bottom_banner_short_code"]').hide(300);								
			}
			
			if (radio_clicked=="IMAGE") {
				
				jQuery('[name="mycbgenie_ad_bottom_image_short_code"]').show(300);
				
				jQuery('[name="mycbgenie_ad_bottom_carousel_short_code"]').hide(300);				
				jQuery('[name="mycbgenie_ad_bottom_text_short_code"]').hide(300);				
				jQuery('[name="mycbgenie_ad_bottom_banner_short_code"]').hide(300);								
			}
			
			
			if (radio_clicked=="CAROUSEL") {
				

				jQuery('[name="mycbgenie_ad_bottom_carousel_short_code"]').show(1000);				
	
				jQuery('[name="mycbgenie_ad_bottom_text_short_code"]').hide(500);				
				jQuery('[name="mycbgenie_ad_bottom_image_short_code"]').hide(500);				
				jQuery('[name="mycbgenie_ad_bottom_banner_short_code"]').hide(500);								
			}
}