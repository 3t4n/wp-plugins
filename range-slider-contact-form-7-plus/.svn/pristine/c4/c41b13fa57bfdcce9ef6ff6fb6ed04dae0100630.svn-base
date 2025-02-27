jQuery(document).ready(function() {
	

	jQuery(".esrscfcf7caloc_slider_div").each(function() {
	     	var step=jQuery(this).attr("step");
		    var min=jQuery(this).attr("min");
		    var max=jQuery(this).attr("max");
		    var istep = parseInt(step);
		    var imin = parseInt(min);
		    var imax = parseInt(max);
		    var prefixx=jQuery(this).attr("prefix");
		    var prefixpos=jQuery(this).attr("prefixpos");
		    var color=jQuery(this).attr("color");
		    var tooltipcolor=jQuery(this).attr("tooltip-color");
		    // console.log(tooltipcolor);

		   
		

		  
		    var esrstoltip=jQuery(this).attr("esrstoltip");

		    var current_attr = jQuery(this);
		    if(esrstoltip == "left"){
		    	var esrscf7tooltip = jQuery('<div id="esrstooltip" class="esrscf7left"/>').css({
			        right: 35,
			        background:tooltipcolor
			    })
			    jQuery(".esrscf7left:after").css({'border-color':tooltipcolor })
		    }

		    if(esrstoltip == "top"){
		    	var esrscf7tooltip = jQuery('<div id="esrstooltip" class="esrscf7top"/>').css({
			        top: -35,
			        background:tooltipcolor
			    })
			    jQuery(".esrscf7top:after").css({'border-color':tooltipcolor })
		    }
		    if(esrstoltip == "right"){
		    	var esrscf7tooltip = jQuery('<div id="esrstooltip" class="esrscf7right"/>').css({ 
			        left: 35,
			        background:tooltipcolor		    
			    })
			    jQuery(".esrscf7right:after").css({'border-color':tooltipcolor })
		    }
		    if(esrstoltip == "bottom"){
		    	var esrscf7tooltip = jQuery('<div id="esrstooltip" class="esrscf7bottom"/>').css({
			        bottom: -35,
			        background:tooltipcolor
			    })
			    jQuery(".esrscf7bottom:after").css({'border-color':tooltipcolor })
		    }
		 
		    
		    

		    if(prefixx == null){

		    	prefix = " ";

		    }else{

		    	prefix = prefixx;

		    }

		    if(prefixpos == "left") {
		        esrscf7tooltip.text(prefix + min);
		    }else {  
		        esrscf7tooltip.text(min + prefix);        
		    }
		   
		

		   

		    jQuery(this).slider({
				
		        step:istep,
		        min:imin,
		        max:imax,
		        values: imin,
		        create: attachSlider,
		         
		        slide: function( event, ui ) {

		        	current_attr.find(".esrscf7caloc_slider").val(ui.value);

		        	var clr = jQuery(this).attr("color");

		        	var pre = jQuery(this).attr("prefix");

		        	if(pre == null){

				    	prefix = " ";

				    }else{

				    	prefix = pre;

				    }
		        	

			    	if(prefixpos == "left"){
		                current_attr.find("#esrstooltip").text(prefix  + ui.value);  
		            }else {
		               current_attr.find("#esrstooltip").text(ui.value + prefix);
		            }

				   	current_attr.find(".ui-state-default").css("background-color",clr); 
		        }     

			}).find(".ui-slider-handle").append(esrscf7tooltip).hover(function() {

		    	esrscf7tooltip.show()

		    })

		

		    function attachSlider() {

		        jQuery(this).find(".ui-slider-handle").css("background-color",color);
		      
		        	
		        
		        



		    }
	});

});
	