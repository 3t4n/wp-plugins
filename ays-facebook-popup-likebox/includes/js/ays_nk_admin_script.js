function ays_nk_func(){
	if(document.getElementById("ays_nk_settings[dac]").checked == true){
		document.getElementById("ays_nk_settings[aucl]").value = null;
		document.getElementById("ays_nk_settings[aucl]").readOnly = true;
		document.getElementById("a_u_c_l").readOnly = true;
	}
	else{                                    
		document.getElementById("ays_nk_settings[aucl]").readOnly = false;
		document.getElementById("a_u_c_l").readOnly = false;
	}
}
jQuery(document).ready(function() {
	jQuery('.tabs .tab-liays_nks a').on('click', function(e)  {
		var currentAttrValue = jQuery(this).attr('href');
 
		// Show/Hide Tabs
		jQuery('.tabs ' + currentAttrValue).slideDown(400).siblings().slideUp(400);
		jQuery(currentAttrValue).css("border-bottom","1px solid white");
		// Change/remove current tab to active
		jQuery(this).parent('li').addClass('active').siblings().removeClass('active');
		e.preventDefault();
	});
});