//Validate cats and terms July 26 2024
jQuery(function($){
	
	//alert('ready');
	
	$("#eazy_ad_unblocker_disable_cats_none").click(function(){
		
		$("input[name='eazy_ad_unblocker_disable_cats[]']").prop("checked", false);
	});
	
	$("#eazy_ad_unblocker_disable_cats_all").click(function(){
		
		$("input[name='eazy_ad_unblocker_disable_cats[]']").prop("checked", true);
		
	});
	
	$("#eazy_ad_unblocker_disable_tags_none").click(function(){
		
		//Aug 7 2024
		$("input[name='eazy_ad_unblocker_disable_tags[]']").prop("checked", false);
	});
	
	$("#eazy_ad_unblocker_disable_tags_all").click(function(){
		
		//Aug 7 2024
		
		$("input[name='eazy_ad_unblocker_disable_tags[]']").prop("checked", true);
		
	});
	
	
});