jQuery(document).ready(function(){
	
		
		jQuery("#show-box .ss-toggler-open").click(function(){
			jQuery("#show-box .ss-show-advanced").slideToggle(1200);
			jQuery(this).hide();
			return false;
		  
		});
		
		jQuery("#show-box .ss-toggler-close").click(function(){
			jQuery("#show-box .ss-show-advanced").slideToggle("slow");
			jQuery("#show-box .ss-toggler-open").show();
			return false;
		  
		});
	
		
});