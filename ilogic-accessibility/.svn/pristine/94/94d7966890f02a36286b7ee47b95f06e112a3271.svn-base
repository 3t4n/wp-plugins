jQuery(document).ready(function () {
// ==== Start: Remember previous for checkboxes
	jQuery("input[type='checkbox'].inpt-ila").each(function() {
	    var mycookie = jQuery.cookie(jQuery(this).attr('id'));
	    if (mycookie && mycookie == "true") {
	        //jQuery(this).prop('checked', true);
	        jQuery(this).click();
	        //jQuery(this).change();
	        // Start: adding all the effects
	         // Underline
		     if((jQuery(this).attr('id') == "aunderline-layout-ila") && (mycookie == "true")) {
		      		jQuery("body").addClass("aunderline-effect-ila");
		     }
		     // Magnify
		     if((jQuery(this).attr('id') == "magnify-layout-ila") && (mycookie == "true")) {
	    		jQuery("body").addClass("magnify-effect-ila");
	      	 }
	      	 // Headline underline 
	      	 if((jQuery(this).attr('id') == "hunderline-layout-ila") && (mycookie == "true")) {
	      		jQuery("body").addClass("hunderline-effect-ila");
	      	 }
	      	 // Animation block
	      	 if((jQuery(this).attr('id') == "aniblock-layout-ila") && (mycookie == "true")) {
	      		jQuery("*").css("-webkit-animation-play-state", "paused");
	     		jQuery("*").css("-moz-animation-play-state", "paused");
	     		jQuery("*").css("-ms-animation-play-state", "paused");
	     		jQuery("*").css("animation-play-state", "paused");
	      	 }
	      	 // Image tooltip
	      	 if((jQuery(this).attr('id') == "imagetooltip-layout-ila") && (mycookie == "true")) {
	      	 	jQuery(".tooltip-ila").css("visibility", "visible");
			     jQuery('img').hover(function () {
			         // Hover over code
			         var title = jQuery(this).attr('alt');
			         jQuery(this).data('tipText', title);
			         jQuery('.tooltip-ila').text(title).fadeIn('slow');
			     }, function () {
			         // Hover out code
			         jQuery(this).attr('alt', jQuery(this).data('tipText'));
			         jQuery('.tooltip-ila').hide();
			     }).mousemove(function (e) {
			         var mousex = e.pageX + 20;
			         //Get X coordinates
			         var mousey = e.pageY + 10;
			         //Get Y coordinates
			         jQuery('.tooltip-ila').css({
			             top: mousey,
			             left: mousex
			         })
			     });
	      	 }
	      	 // Key Navigation
	      	 if((jQuery(this).attr('id') == "keyboard-layout-ila") && (mycookie == "true")) {
	      	 	jQuery("#keynav-menu-ila").show();
		      	if(!jQuery("body").hasClass("tab-highlight-ila")){jQuery("body").addClass("tab-highlight-ila");}
		      	jQuery('.kccont-ila').focus();
				//3 menu controls highlit
				jQuery( "#keynav-menu-ila a" ).click(function() {
				    jQuery("#keynav-menu-ila a").removeClass("selected");
				    jQuery(this).addClass("selected");
				});
				// content focus
				jQuery( "a.kccont-ila" ).click(function() {
					jQuery('h1').find('a').focus();
				});
				// menu focus
				jQuery( "a.kcmenu-ila" ).click(function() {
					jQuery('ul li.menu-item:first-child()').find('a').focus();
				});
				// accessability panel
				jQuery( "a.kcpanel-ila" ).click(function() {
					jQuery('#settings-btn-ila').prop('checked', true).change();
					jQuery('.ac-label-ila').focus();
				});
				//universal enter key handle label
			    jQuery('label').keypress(function(event){
					var keycode = (event.keyCode ? event.keyCode : event.which);
					if(keycode == '13'){
						//alert('You pressed a "enter" key in button');
						this.click();
					}
					//event.stopPropagation();
				});
				//universal enter key handle link
			    jQuery('a').keypress(function(event){
					var keycode = (event.keyCode ? event.keyCode : event.which);
					if(keycode == '13'){
						//alert('You pressed a "enter" key in button');
						this.click();
					}
					//event.stopPropagation();
				});
				//
	      	 }
	      	 //
	        //- End: adding all the effects
	    }
	});
	// write new choice of checkbox
	jQuery("input[type='checkbox'].inpt-ila").change(function() {
	    jQuery.cookie(jQuery(this).attr("id"), jQuery(this).prop('checked'), {
	        path: '/',
	        expires: 365
	    });
	});
// ==== End: Remember previous for checkboxes
// ==== Start: Remember previous for radio
	jQuery(function(){
	    // overwrite radio ':checked' property there (if exists in localStorage) :
	    jQuery('input[type=radio].inpt-ila').each(function(){
	        var ila_ls_state = JSON.parse( localStorage.getItem('radio_'  + this.id) );
	        if (ila_ls_state) this.checked = ila_ls_state.checked;
	        // Start: adding all the effects
	         // GreyScale
	         if ((this.id == 'grey-layout-ila') && (ila_ls_state.checked == true)) {
	         	jQuery("body").removeClass("inverse-effect-ila");
	      		jQuery("body").addClass("grey-effect-ila");
	         }
	         // Inverse
	         if ((this.id == 'inverse-layout-ila') && (ila_ls_state.checked == true)) {
	         	jQuery("body").removeClass("grey-effect-ila");
	      		jQuery("body").addClass("inverse-effect-ila");
	         }
	         // Black Cursor
	         if ((this.id == 'bbcur-layout-ila') && (ila_ls_state.checked == true)) {
	         	jQuery("body").removeClass("bwcur-effect-ila");
	      		jQuery("body").addClass("bbcur-effect-ila");
	         }
	         // White cursor
	         if ((this.id == 'bwcur-layout-ila') && (ila_ls_state.checked == true)) {
	         	jQuery("body").removeClass("bbcur-effect-ila");
	      		jQuery("body").addClass("bwcur-effect-ila");
	         }
	        //- End: adding all the effects
	    });
	});
	// write new choice of radio
	jQuery(window).bind('unload', function(){
	    jQuery('input[type=radio].inpt-ila').each(function(){
	        localStorage.setItem(
	            'radio_' + this.id, JSON.stringify({checked: this.checked})
	        );
	    });
	});
// ==== End: Remember previous for radio

// ==== Start: Dynamic controls
// -----------------------------

	// Greyscale Dynamic
	jQuery("#grey-layout-ila").change(function() {
	    	if(this.checked) {
	    		jQuery("body").removeClass("inverse-effect-ila");
	      		jQuery("body").addClass("grey-effect-ila");
	      	}
	      	if(!this.checked) {
	      		jQuery("body").removeClass("grey-effect-ila");
	      	}
	});
	// -- Greyscale Dynamic
	// Inverse color Dynamic
	jQuery("#inverse-layout-ila").change(function() {
	    	if(this.checked) {
	    		jQuery("body").removeClass("grey-effect-ila");
	      		jQuery("body").addClass("inverse-effect-ila");
	      	}
	      	if(!this.checked) {
	      		jQuery("body").removeClass("inverse-effect-ila");
	      	}
	});
	// -- Inverse color Dynamic
	// Underline Dynamic
	jQuery("#aunderline-layout-ila").change(function() {
	    	if(this.checked) {
	      		jQuery("body").addClass("aunderline-effect-ila");
	      	}
	      	if(!this.checked) {
	      		jQuery("body").removeClass("aunderline-effect-ila");
	      	}
	});
	// -- Underline Dynamic
	// Magnify Dynamic
	jQuery("#magnify-layout-ila").change(function() {
	    	if(this.checked) {
	      		jQuery("body").addClass("magnify-effect-ila");
	      	}
	      	if(!this.checked) {
	      		jQuery("body").removeClass("magnify-effect-ila");
	      	}
	});
	// -- Magnify Dynamic
	// Black Cursor Dynamic
	jQuery("#bbcur-layout-ila").change(function() {
	    	if(this.checked) {
	    		jQuery("body").removeClass("bwcur-effect-ila");
	      		jQuery("body").addClass("bbcur-effect-ila");
	      	}
	      	if(!this.checked) {
	      		jQuery("body").removeClass("bbcur-effect-ila");
	      	}
	});
	// -- Black Cursor Dynamic
	// White Cursor Dynamic
	jQuery("#bwcur-layout-ila").change(function() {
	    	if(this.checked) {
	    		jQuery("body").removeClass("bbcur-effect-ila");
	      		jQuery("body").addClass("bwcur-effect-ila");
	      	}
	      	if(!this.checked) {
	      		jQuery("body").removeClass("bwcur-effect-ila");
	      	}
	});
	// -- White Cursor Dynamic
	// Headline Underline Dynamic
	jQuery("#hunderline-layout-ila").change(function() {
	    	if(this.checked) {
	      		jQuery("body").addClass("hunderline-effect-ila");
	      	}
	      	if(!this.checked) {
	      		jQuery("body").removeClass("hunderline-effect-ila");
	      	}
	});
	// -- Headline underline Dynamic
	// Image tooltip dynamic
		jQuery("#imagetooltip-layout-ila").change(function() {
	    	if(this.checked) {
	    		jQuery(".tooltip-ila").css("visibility", "visible");
			     jQuery('img').hover(function () {
			         // Hover over code
			         var title = jQuery(this).attr('alt');
			         jQuery(this).data('tipText', title);
			         jQuery('.tooltip-ila').text(title).fadeIn('slow');
			     }, function () {
			         // Hover out code
			         jQuery(this).attr('alt', jQuery(this).data('tipText'));
			         jQuery('.tooltip-ila').hide();
			     }).mousemove(function (e) {
			         var mousex = e.pageX + 20;
			         //Get X coordinates
			         var mousey = e.pageY + 10;
			         //Get Y coordinates
			         jQuery('.tooltip-ila').css({
			             top: mousey,
			             left: mousex
			         })
			     });
		  	}
		  	if(!this.checked) {
		  		jQuery(".tooltip-ila").css("visibility", "hidden");
		  	}
		});
	//-- Image tooltip dynamic
	// Animation blocker dynamic
		jQuery("#aniblock-layout-ila").change(function() {
	    	if(this.checked) {
	      		jQuery("*").css("-webkit-animation-play-state", "paused");
	     		jQuery("*").css("-moz-animation-play-state", "paused");
	     		jQuery("*").css("-ms-animation-play-state", "paused");
	     		jQuery("*").css("animation-play-state", "paused");
	      	}
	      	if(!this.checked) {
	      		jQuery("*").css("-webkit-animation-play-state", "running");
	     		jQuery("*").css("-moz-animation-play-state", "running");
	     		jQuery("*").css("-ms-animation-play-state", "running");
	     		jQuery("*").css("animation-play-state", "running");
	      	}
		});
	//-- Animation blocker dynamic
	// Keyboard Navigation dynamic
		jQuery("#keyboard-layout-ila").change(function() {
		  //show navigator
	      if(this.checked) {
	      	jQuery("#keynav-menu-ila").show();
	      	if(!jQuery("body").hasClass("tab-highlight-ila")){jQuery("body").addClass("tab-highlight-ila");}
	      	jQuery('.kccont-ila').focus();
			//3 menu controls highlit
			jQuery( "#keynav-menu-ila a" ).click(function() {
			    jQuery("#keynav-menu-ila a").removeClass("selected");
			    jQuery(this).addClass("selected");
			});
			// content focus
			jQuery( "a.kccont-ila" ).click(function() {
				jQuery('h1').find('a').focus();
			});
			// menu focus
			jQuery( "a.kcmenu-ila" ).click(function() {
				jQuery('ul li.menu-item:first-child()').find('a').focus();
			});
			// accessability panel
			jQuery( "a.kcpanel-ila" ).click(function() {
				jQuery('#settings-btn-ila').prop('checked', true).change();
				jQuery('.ac-label-ila').focus();
			});
			//universal enter key handle label
		    jQuery('label').keypress(function(event){
				var keycode = (event.keyCode ? event.keyCode : event.which);
				if(keycode == '13'){
					//alert('You pressed a "enter" key in button');
					this.click();
				}
				//event.stopPropagation();
			});
			//universal enter key handle link
		    jQuery('a').keypress(function(event){
				var keycode = (event.keyCode ? event.keyCode : event.which);
				if(keycode == '13'){
					//alert('You pressed a "enter" key in button');
					this.click();
				}
				//event.stopPropagation();
			});
			//
		  }
		  //hide navigator
		  if(!this.checked) {
		  	jQuery("#keynav-menu-ila").hide();
		  	jQuery("body").removeClass("tab-highlight-ila");
		  }
		});
	//-- Keyboard Navigation dynamic

// ==== End: Dynamic controls
// -----------------------------

	
	// Font control nondynamic
	jQuery(".fsmall-ila").click(function(event){
	    event.preventDefault();
	    jQuery("h1, h2, h3, h4, h5, h6, p").removeClass("fzsmall-ila fzmedium-ila fzlarge-ila");
	    jQuery("h1, h2, h3, h4, h5, h6, p").addClass("fzsmall-ila");
	});
	  
	jQuery(".fmedium-ila").click(function(event){
	    event.preventDefault();
	    jQuery("h1, h2, h3, h4, h5, h6, p").removeClass("fzsmall-ila fzmedium-ila fzlarge-ila");
	    jQuery("h1, h2, h3, h4, h5, h6, p").addClass("fzmedium-ila");
	});
	  
	jQuery(".flarge-ila").click(function(event){
	    event.preventDefault();
	    jQuery("h1, h2, h3, h4, h5, h6, p").removeClass("fzsmall-ila fzmedium-ila fzlarge-ila");
	    jQuery("h1, h2, h3, h4, h5, h6, p").addClass("fzlarge-ila");
	});
	//reset all
	jQuery(".freset-ila").click(function(event){
	    event.preventDefault();
	    jQuery("h1, h2, h3, h4, h5, h6, p").removeClass("fzsmall-ila fzmedium-ila fzlarge-ila");
	});
	//highlit font choice
	jQuery( "#font-size-ila a" ).click(function() {
	    jQuery("#font-size-ila a").removeClass("selected");
	    jQuery(this).addClass("selected");
	});
	//-- Font control nondynamic
	
	
// Reset all controls
	jQuery( "#reset-layout-ila" ).click(function() {
	    // clear all radio and checkbox
	    jQuery("*[class$='-layout-ila']").prop('checked', false).change();
	    // clear font control
	    jQuery("h1, h2, h3, h4, h5, h6, p").removeClass("fzsmall-ila fzmedium-ila fzlarge-ila");
	    jQuery("#font-size-ila a").removeClass("selected");
	    // clear image tooltip
	    jQuery(".tooltip-ila").css("visibility", "hidden");
	    // clear ani blocker
	    jQuery("*").css("-webkit-animation-play-state", "running");
     	jQuery("*").css("-moz-animation-play-state", "running");
     	jQuery("*").css("-ms-animation-play-state", "running");
     	jQuery("*").css("animation-play-state", "running");
	});
//-- Reset All Controls
// Extra close button and icon toggle
	jQuery("#settings-btn-ila").change(function() {
	    	if(this.checked) {
	      		jQuery(".settings-box-element-ila.ac-label-ila i.fa").removeClass("fa-wheelchair");
	      		jQuery(".settings-box-element-ila.ac-label-ila i.fa").addClass("fa-close");
	      	}
	      	if(!this.checked) {
	      		jQuery(".settings-box-element-ila.ac-label-ila i.fa").removeClass("fa-close");
	      		jQuery(".settings-box-element-ila.ac-label-ila i.fa").addClass("fa-wheelchair");
	      	}
	});
	jQuery( ".ila-extra-close" ).click(function() {
	    // clear all radio and checkbox
	    jQuery("#settings-btn-ila").prop('checked', false).change();
	});
//-- Extra close button
});