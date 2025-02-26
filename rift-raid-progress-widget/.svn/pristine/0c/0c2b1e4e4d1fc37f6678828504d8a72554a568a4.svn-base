jQuery(document).ready(function() {
	tooltipElement = ".tooltip";
	distanceFromMouse = 20;
	tooltipId = "tooltip";

	var tip;
	jQuery(tooltipElement).hover(function(){ 
		this.t = this.title;
		this.title = "";	
		var c = (this.t != "") ? "" + this.t : "";
		jQuery("body").append("<p id='"+tooltipId+"'>"+ c +"</p>");								 
		tip = jQuery("#" + tooltipId);
		tip.fadeIn("fast");	
	}, function() {
		this.title = this.t;	
		jQuery("#" + tooltipId).hide().remove();
	}).mousemove(function(e) {
		  tip = jQuery("#" + tooltipId);
		  var mousex = e.pageX + distanceFromMouse;
		  var mousey = e.pageY + distanceFromMouse;
		  var tipWidth = tip.width();
		  var tipHeight = tip.height(); 
		  var tipVisX = jQuery(window).width() - (mousex + tipWidth);
		  var tipVisY = jQuery(window).height() - (mousey + tipHeight);

		if ( tipVisX < distanceFromMouse ) {
			mousex = e.pageX - tipWidth - distanceFromMouse;
			tip.css({  top: mousey, left: mousex });
		} if ( tipVisY < distanceFromMouse ) {
			mousey = e.pageY - tipHeight - distanceFromMouse;
			tip.css({  top: mousey, left: mousex });
		} else {
			tip.css({  top: mousey, left: mousex });
		}
	});

});