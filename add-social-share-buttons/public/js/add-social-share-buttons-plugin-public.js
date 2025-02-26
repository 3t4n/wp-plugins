(function( $ ) {
    "use strict";
	$(document).ready(function() {
	    $(document).on("click", '.woo_shre_whatsapp_btn', function() {
	        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
	            var text = $(this).attr("data-text");
	            var url = $(this).attr("data-link");
	            var message = encodeURIComponent(text) + " - " + encodeURIComponent(url);
	            var whatsapp_url = "whatsapp://send?text=" + message;
	            window.location.href = whatsapp_url;
	        } else {
	            alert("Please use an Mobile Device to Share this Article");
	        }
	    });
	    
	     $(document).on("click", '.woo_shre_viber_btn', function() {
	     	
	     	if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
	            var text = $(this).attr("data-text");
	            var url = $(this).attr("data-link");
	            var message = encodeURIComponent(text) + " - " + encodeURIComponent(url);
	            var whatsapp_url = "viber://forward?text=" + message;
	            window.location.href = whatsapp_url;
	        } else {
	            alert("Please use an Mobile Device to Share this Article");
	        }
	        
	     });
	});

	
	(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_EN/sdk.js";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
	
	  jQuery('form').each(function () {
       var cmdcode = jQuery(this).find('input[name="cmd"]').val();
       var bncode = jQuery(this).find('input[name="bn"]').val();

       if (cmdcode && bncode) {
           jQuery('input[name="bn"]').val("Multidots_SP");
       } else if ((cmdcode) && (!bncode)) {
           jQuery(this).find('input[name="cmd"]').after("<input type='hidden' name='bn' value='Multidots_SP' />");
       }
   });
	

})( jQuery );