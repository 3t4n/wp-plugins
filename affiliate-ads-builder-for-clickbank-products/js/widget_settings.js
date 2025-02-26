
jQuery(document).on('widget-updated', function(e, widget){
    // do your awesome stuff here
    // "widget" represents jQuery object of the affected widget's DOM element
	//console.log(widget);
	jscolor.installByClassName("jscolor");		
	var widget_id = jQuery(widget).attr('id');
	//alert(widget_id);
	//console.log(widget_id);
//	alert(	jQuery(".widefat").(this).val()			);
	//mycbgenie_widget_init_test(28,2);
	jQuery(".widefat_format").trigger('click');
});


jQuery(document).ajaxSuccess(function(e, xhr, settings) {
									  console.log(xhr);
									  		
  //alert(e+'my widget just saved');
  //jQuery(".widefat").click();
  // you may put your own action here
});


jQuery(document).ready(function() {				

		 			var widget_id;
 
	//jQuery(".widefat").click();  
	//	jQuery(".widefat").live('click',function(){
 // console.log('clicked');


	
					//jQuery(".widefat_format").live('click', function(evt){
					jQuery('body').on('click', '.widefat_format',function(evt){
															  
//console.log('tar id : '+ evt.target.id  + ', this :  '+this.id);


								format_val=	jQuery(this).val();						  
								wid_id=this.id;			
											wid_id   = wid_id.replace("-format", ""); 
								wid_id   = wid_id.replace("widget-mycbgenie_ads_plugin-", ""); 		
								//console.log(this.id + ', value : '+format_val);	
								 if (format_val=="automatic") {

					
 									 wid_id_kws   = wid_id.replace("-automatic_keywords", ""); 		
									 jQuery('#widget-mycbgenie_ads_plugin-'+wid_id_kws+'-keywords').slideUp('slow');
									 
									 
								 }else if (format_val=="keywords") {

				//	console.log('some one clicked on me keyword');
					
										wid_id_kws   = wid_id.replace("-automatic_keywords", ""); 		
		   							   jQuery('#widget-mycbgenie_ads_plugin-'+wid_id_kws+'-keywords').slideDown('slow');;
								 }


									  if (    (format_val=="text" )   ) {
									 
	
											jQuery('#widget-mycbgenie_ads_plugin-'+wid_id+'-mycbgenie_general_div').fadeIn('slow');
											jQuery('#widget-mycbgenie_ads_plugin-'+wid_id+'-mycbgenie_keywords_div').fadeIn('slow');
											jQuery('#widget-mycbgenie_ads_plugin-'+wid_id+'-mycbgenie_image_carousel_text_ads_common_div').fadeIn('slow');								
											jQuery('#widget-mycbgenie_ads_plugin-'+wid_id+'-mycbgenie_show_read_more_btn_div').fadeIn('slow');										
											jQuery('#widget-mycbgenie_ads_plugin-'+wid_id+'-mycbgenie_rows_cols_div').fadeIn('slow');

											jQuery('#widget-mycbgenie_ads_plugin-'+wid_id+'-mycbgenie_image_width_div').fadeOut('slow');	
											jQuery('#widget-mycbgenie_ads_plugin-'+wid_id+'-mycbgenie_carousel_ads_div').fadeOut('slow');									
											jQuery('#widget-mycbgenie_ads_plugin-'+wid_id+'-mycbgenie_orientation_div').fadeOut('slow');
											jQuery('#widget-mycbgenie_ads_plugin-'+wid_id+'-mycbgenie_banner_ads_div').fadeOut('slow');									
											//jQuery('#widget-mycbgenie_ads_plugin-'+wid_id+'-mycbgenie_show_read_more_btn_div').fadeOut('slow');										  
	
									 }
									 
									  if (    (format_val=="carousel" )    ) {
									 
	
											jQuery('#widget-mycbgenie_ads_plugin-'+wid_id+'-mycbgenie_general_div').fadeIn('slow');
											jQuery('#widget-mycbgenie_ads_plugin-'+wid_id+'-mycbgenie_keywords_div').fadeIn('slow');
											jQuery('#widget-mycbgenie_ads_plugin-'+wid_id+'-mycbgenie_image_carousel_text_ads_common_div').fadeIn('slow');								
											jQuery('#widget-mycbgenie_ads_plugin-'+wid_id+'-mycbgenie_carousel_ads_div').fadeIn('slow');									
											jQuery('#widget-mycbgenie_ads_plugin-'+wid_id+'-mycbgenie_image_width_div').fadeIn('slow');	
											jQuery('#widget-mycbgenie_ads_plugin-'+wid_id+'-mycbgenie_orientation_div').fadeIn('slow');
	
	
											jQuery('#widget-mycbgenie_ads_plugin-'+wid_id+'-mycbgenie_rows_cols_div').fadeOut('slow');
											jQuery('#widget-mycbgenie_ads_plugin-'+wid_id+'-mycbgenie_show_read_more_btn_div').fadeOut('slow');																				
											jQuery('#widget-mycbgenie_ads_plugin-'+wid_id+'-mycbgenie_banner_ads_div').fadeOut('slow');									
											jQuery('#widget-mycbgenie_ads_plugin-'+wid_id+'-mycbgenie_show_read_more_btn_div').fadeOut('slow');										  
	
									 }
	
									 if (format_val=="load") {
												 mycbgenie_widget_init(wid_id);									 
									 }
	
														   
									 if (format_val=="image_ads") {
									 
	
											jQuery('#widget-mycbgenie_ads_plugin-'+wid_id+'-mycbgenie_general_div').fadeIn('slow');
											jQuery('#widget-mycbgenie_ads_plugin-'+wid_id+'-mycbgenie_keywords_div').fadeIn('slow');
											jQuery('#widget-mycbgenie_ads_plugin-'+wid_id+'-mycbgenie_image_carousel_text_ads_common_div').fadeIn('slow');								
											jQuery('#widget-mycbgenie_ads_plugin-'+wid_id+'-mycbgenie_rows_cols_div').fadeIn('slow');									
											jQuery('#widget-mycbgenie_ads_plugin-'+wid_id+'-mycbgenie_image_width_div').fadeIn('slow');	
											jQuery('#widget-mycbgenie_ads_plugin-'+wid_id+'-mycbgenie_show_read_more_btn_div').fadeIn('slow');																				

											jQuery('#widget-mycbgenie_ads_plugin-'+wid_id+'-mycbgenie_orientation_div').fadeOut('slow');
											jQuery('#widget-mycbgenie_ads_plugin-'+wid_id+'-mycbgenie_carousel_ads_div').fadeOut('slow');
											jQuery('#widget-mycbgenie_ads_plugin-'+wid_id+'-mycbgenie_banner_ads_div').fadeOut('slow');									


									 }
									 
									 if (format_val=="banner") {
	
	
											jQuery('#widget-mycbgenie_ads_plugin-'+wid_id+'-mycbgenie_general_div').fadeIn('slow');
											jQuery('#widget-mycbgenie_ads_plugin-'+wid_id+'-mycbgenie_keywords_div').fadeIn('slow');
											jQuery('#widget-mycbgenie_ads_plugin-'+wid_id+'-mycbgenie_image_carousel_text_ads_common_div').fadeIn('slow');								
											jQuery('#widget-mycbgenie_ads_plugin-'+wid_id+'-mycbgenie_banner_ads_div').fadeIn('slow');									
	
	
											jQuery('#widget-mycbgenie_ads_plugin-'+wid_id+'-mycbgenie_image_carousel_text_ads_common_div').fadeOut('slow');								
											jQuery('#widget-mycbgenie_ads_plugin-'+wid_id+'-mycbgenie_show_read_more_btn_div').fadeOut('slow');																				
											jQuery('#widget-mycbgenie_ads_plugin-'+wid_id+'-mycbgenie_orientation_div').fadeOut('slow');
											jQuery('#widget-mycbgenie_ads_plugin-'+wid_id+'-mycbgenie_rows_cols_div').fadeOut('slow');
											jQuery('#widget-mycbgenie_ads_plugin-'+wid_id+'-mycbgenie_carousel_ads_div').fadeOut('slow');									
											jQuery('#widget-mycbgenie_ads_plugin-'+wid_id+'-mycbgenie_show_read_more_btn_div').fadeOut('slow');
											jQuery('#widget-mycbgenie_ads_plugin-'+wid_id+'-mycbgenie_image_width_div').fadeOut('slow');	
											
											
											jQuery('#widget-mycbgenie_ads_plugin-'+wid_id+'-mycbgenie_image_width_div').fadeOut('slow');											
											
									 }
								

					}).trigger('click');;					  
			
				
 return false;
});
		
function mycbgenie_widget_init(wid_id){
	
										//jQuery('#widget-mycbgenie_ads_plugin-'+wid_id+'-mycbgenie_general_div').fadeOut('slow');;
									 	jQuery('#widget-mycbgenie_ads_plugin-'+wid_id+'-mycbgenie_keywords_div').fadeOut('slow');;
									 	jQuery('#widget-mycbgenie_ads_plugin-'+wid_id+'-mycbgenie_image_carousel_text_ads_common_div').fadeOut('slow');								
									 	jQuery('#widget-mycbgenie_ads_plugin-'+wid_id+'-mycbgenie_banner_ads_div').fadeOut('slow');									
									 	jQuery('#widget-mycbgenie_ads_plugin-'+wid_id+'-mycbgenie_orientation_div').fadeOut('slow');;


									 	jQuery('#widget-mycbgenie_ads_plugin-'+wid_id+'-mycbgenie_image_carousel_text_ads_common_div').fadeOut('slow');								
									 	jQuery('#widget-mycbgenie_ads_plugin-'+wid_id+'-mycbgenie_rows_cols_div').fadeOut('slow');
									 	jQuery('#widget-mycbgenie_ads_plugin-'+wid_id+'-mycbgenie_carousel_ads_div').fadeOut('slow');									
									 	jQuery('#widget-mycbgenie_ads_plugin-'+wid_id+'-mycbgenie_show_read_more_btn_div').fadeOut('slow');	
										
										jQuery('#widget-mycbgenie_ads_plugin-'+wid_id+'-mycbgenie_image_width_div').fadeOut('slow');	
	
}
			
				
function mycbgenie_widget_init_test(wid_id,format_val){

	
				
												
}