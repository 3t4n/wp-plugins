jQuery(document).ready(function(){
	jQuery("#aBgColorSubmit").click(function(){
		var titleBgColor    = jQuery("#titleBgColor").val();
		var panelBgColor    = jQuery("#panelBgColor").val();
		var ImageSize	 	= jQuery("#ImageSize").val();
		var titleFontSize 	= jQuery("#titleFontSize").val();
		var contentFontSize = jQuery("#contentFontSize").val();
		var titlePadding 	= jQuery("#titlePadding").val();
		var titleFontColor 	= jQuery("#titleFontColor").val();
		var panelFontColor 	= jQuery("#panelFontColor").val();
		
		jQuery.ajax({
			type: 'POST',
			url: ajaxurl,
			data:{"action":"aTables_general_settings_save","titleBgColor":titleBgColor,"panelBgColor":panelBgColor,
			"ImageSize":ImageSize,"titleFontSize":titleFontSize,"contentFontSize":contentFontSize,"titlePadding":titlePadding,
			"titleFontColor":titleFontColor,"panelFontColor":panelFontColor},
			success:function(data){
				jQuery("#neww").html(data);
			}
		});
	});
	jQuery("#resetSettings").click(function(){
		var titleBgColor    = '#6bd0e2';
		var panelBgColor    = '#49c5dc';
		var ImageSize	 	= '320';
		var titleFontSize 	= '35';
		var contentFontSize = '20';
		var titlePadding 	= '10';
		var titleFontColor 	= '#363636';
		var panelFontColor 	= '#363636';
		
		jQuery.ajax({
			type: 'POST',
			url: ajaxurl,
			data:{"action":"aTables_general_settings_save","titleBgColor":titleBgColor,"panelBgColor":panelBgColor,
			"ImageSize":ImageSize,"titleFontSize":titleFontSize,"contentFontSize":contentFontSize,"titlePadding":titlePadding,
			"titleFontColor":titleFontColor,"panelFontColor":panelFontColor},
			success:function(data){
				
			}
		});
	});
});