jQuery(document).ready(function(){

    jQuery("#mcg_thumb").hide();
    jQuery("#mcg_back_to_parent").hide();
	
   

	//jQuery(".show_hide").show();
	
	jQuery('.mcg_image').click(function(){
			



		var cs_pluginURL = mycbgenie_sf_url.pluginsUrl+'images/';
	
		jQuery("#mcg_thumb").slideToggle("fast");
 		
		jQuery(this).css('background-color', 'transparent');
		jQuery('#mcg_div_thumb').css('background-color', 'lightyellow');

			jQuery(this).html(function(i,html) {
									   
				if (html.indexOf('collapse.png') != -1 ){
					jQuery('#mcg_div_thumb').css('background-color', 'transparent');
					jQuery('.mcg_image').css('background-color', '#EBEBEB');
					jQuery("#mcg_back_to_parent").hide();
					
				}
				else{
					jQuery("#mcg_back_to_parent").show();
				}
				
				if (html.indexOf('View') != -1 ){
					html = html.replace('View','Hide');
				}
				else{
					html = html.replace('Hide','View');
				}
				//else{
	
				//}
			   //    html = html.replace('Show','Hide');
			  //  } else {
			   //    html = html.replace('Hide','Show');
			  //  }
					return html;
				}).find('img').attr('src',function(i,src){
				return (src.indexOf('expand.png') != -1)? cs_pluginURL+'collapse.png' 	: cs_pluginURL+'expand.png';
			});
	
 });






});