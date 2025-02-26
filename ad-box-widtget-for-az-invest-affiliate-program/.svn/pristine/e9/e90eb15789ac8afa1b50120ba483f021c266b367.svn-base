;(function($){

	function slidePix() {
		var curPic = $("#flipPix div.active");
		var nextPic = curPic.next();
		if (nextPic.length == 0) nextPic = $("#flipPix div:first");
		curPic.removeClass("active").addClass("prev");
		nextPic.removeClass("prev").addClass("active");
		nextPic.css({opacity:0.0}).animate({opacity:1.0}, 1000);
	};

	$(document).ready(function(){ 
		$("#az-invest-ad").css("text-align","center"); 
		setInterval(function(){slidePix()},3000); 
	});
 

})(jQuery);
