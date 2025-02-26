jQuery(document).ready(function() { 

	
	"use strict";

	jQuery('.bst-panel').hide();

	if ( document.cookie.indexOf("bst_dsgvo_cookie") === -1 ) {
		
		jQuery(".bst-panel").prependTo('body').delay(600).slideDown(500);
		
		//jQuery(".bst-accept-btn").on('click', function(event)  {
		jQuery(".bst-accept-btn").click(function() {
			
			//event.preventDefault();
	    	jQuery(".bst-panel").slideUp(500);
			var d = new Date();
			d.setTime(d.getTime()+(365*24*60*60*1000));
			var expires = d.toGMTString();
			document.cookie = 'bst_dsgvo_cookie = 1; expires=' + expires + ';' + "domain=." + document.domain + "; path=/;";
					
		});


		//jQuery(".bst-accept").on('click', function(event)  {
		jQuery(".bst-accept").click(function() {
			
			//event.preventDefault();
			jQuery(".bst-panel").slideUp(500);
			
			var d = new Date();
			d.setTime(d.getTime()+(365*24*60*60*1000));
			var expires = d.toGMTString();
			document.cookie = 'bst_dsgvo_cookie = 1; expires=' + expires + ';' + "domain=." + document.domain + "; path=/;";
					
		});
		
		
		
		
	
	
	}
		
});