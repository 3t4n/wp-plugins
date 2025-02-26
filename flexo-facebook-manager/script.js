	jQuery(document).ready(function() {
	
	
	
	jQuery('#widgets-right ').delegate("div", "click", function(){
				if 		  (jQuery(this).is('.weight-arrows1')){ jQuery('.togg1').slideToggle();}
				else if (jQuery(this).is('.weight-arrows2')){ jQuery('.togg2').slideToggle();}
				else if (jQuery(this).is('.weight-arrows3')){ jQuery('.togg3').slideToggle();}
				else if (jQuery(this).is('.weight-arrows4')){ jQuery('.togg4').slideToggle();}
				else if (jQuery(this).is('.weight-arrows5')){ jQuery('.togg5').slideToggle();}
	});
	
	
});