jQuery(document).ready(function($) {
	$("li").click(function(){
		$(this).toggleClass("active");
		$(this).next("div").stop('true','true').slideToggle("fast");
	});
});