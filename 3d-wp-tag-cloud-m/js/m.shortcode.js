// 3D WP Tag Cloud-M: Shortcode Info Function			
jQuery(function(){ 
	var m_inactive_html = jQuery('#wp_inactive_widgets').html();
	var mcookie = document.cookie.search('wptagcanvaswidgetm'+mshortcode.mshortcode_id);
	if(m_inactive_html.search('wptagcanvaswidgetm-'+mshortcode.mshortcode_id)!=-1){ 
		if(mcookie == -1){  	
			jQuery('#wpbody-content div.wrap h1').after('<div class="updated"><p style="font-size: 14px;"><b>'+mshortcode.mplugin_name+'</b>: Click on following Shortcode, then copy and paste it in a page or in a post where you want your cloud to appear: <input value="[tc-m id=&#34;'+mshortcode.mshortcode_id+'&#34;]" style="line-height: 12px; border-radius: 4px; padding: 0; width: 90px; text-align: center;" onclick="select()"  title="Click, copy & paste where you want me to appear."></p></div>')
			document.cookie = "wptagcanvaswidgetm"+mshortcode.mshortcode_id+"=1";
		}
	}
	else {document.cookie = 'wptagcanvaswidgetm'+mshortcode.mshortcode_id+'=; expires=Thu, 01 Jan 1970 00:00:00 UTC';}	
});