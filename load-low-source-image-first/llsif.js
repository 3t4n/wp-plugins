jQuery(document).ready(function($) {
	$("img").each(function(i, ele) {
		 var src = $(this).attr("highsrc");
	     $(this).attr("src", src);
	});
});