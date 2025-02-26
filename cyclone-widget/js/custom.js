jQuery(document).ready(function(){

	jQuery("#profile, #messages").hide();

	jQuery("#popular_tab").click(function(){
		jQuery("#profile, #messages").hide();
		jQuery("#home").show();
	});

	jQuery("#recent_tab").click(function(){
		jQuery("#profile").show();
		jQuery("#home, #messages").hide();
	});

	jQuery("#comment_tab").click(function(){
		jQuery("#messages").show();
		jQuery("#home, #profile").hide();
	});

});
