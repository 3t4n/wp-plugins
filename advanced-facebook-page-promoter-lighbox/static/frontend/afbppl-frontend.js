 $.noConflict();
 $(document).ready(function(){
		function createCookie(name,value,days,hours) {
		if (days) {
			var date = new Date();
			date.setTime(date.getTime()+(days*hours*60*1000));
			var expires = "; expires="+date.toGMTString();
		}
		else var expires = "";
		document.cookie = name+"="+value+expires+"; path=/";
		}

	function readCookie(name) {
		var nameEQ = name + "=";
		var ca = document.cookie.split(';');
		for(var i=0;i < ca.length;i++) {
			var c = ca[i];
			while (c.charAt(0)==' ') c = c.substring(1,c.length);
			if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
		}
		return null;
	}
    
if(readCookie("itfbappl_popupShown_in_day") == null) {
    // Create cookie for 1 day
	var delay = $("#itfbppl_overlay").data('delay');
	var frequency = $("#itfbppl_overlay").data('show-once');
	var overlay_close = $("#itfbppl_overlay").data('close-overlay');
    setTimeout(function(){
	if(frequency == 1){
	createCookie("itfbappl_popupShown_in_day", 1, 1,24);
	}else{
	createCookie("itfbappl_popupShown_in_day", 1, 1,0);
	}
	$("#itfbppl_overlay").show();
	$(".itfbppl_lightbox").toggleClass('afbppl-effect-zoomout-normal');
	$(".itfbppl_lightbox").removeClass("afbppl-effect-zoomout-reverse");
	$(".itfbppl_lightbox").css({
                    "-webkit-animation-play-state": "running",
                    "-moz-animation-play-state": "running",
                    "-o-animation-play-state": "running",
                    "-ms-animation-play-state": "running",
                    "animation-play-state": "running"
                });
	$(".itfbppl_overlay_close").click(function(){
	setTimeout(function(){
	$("#itfbppl_overlay").hide();
	},650);
	$(".itfbppl_lightbox").removeClass("afbppl-effect-zoomout-normal");
	$(".itfbppl_lightbox").addClass("afbppl-effect-zoomout-reverse");
	});
	
	if(overlay_close == '1'){
	$(".itfbppl_overlay").click(function(){
	setTimeout(function(){
	$("#itfbppl_overlay").hide();
	},650);
	$(".itfbppl_lightbox").removeClass("afbppl-effect-zoomout-normal");
	$(".itfbppl_lightbox").addClass("afbppl-effect-zoomout-reverse");
	});
	}
	
   },delay);
 }  
});


