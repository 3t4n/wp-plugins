jQuery(document).ready(function($){
	/* BIG BUTTON ANIMATION */
	$('a.bigbutton').mouseenter(function(){
		$(this).stop(true, false).animate({ opacity: 1, marginLeft: "7px", marginRight: "0px" }, 200)
	})
	$('a.bigbutton').mouseleave(function(){
			$(this).stop(true, true).animate({ opacity: .85, marginLeft: "0px", marginRight: "7px" }, 100, fix);
			function fix() {
				if ($('a.bigbutton').mouseleave) {
					$(this).animate({ opacity: .85 }, "fast")
				}
			}
	})
});
