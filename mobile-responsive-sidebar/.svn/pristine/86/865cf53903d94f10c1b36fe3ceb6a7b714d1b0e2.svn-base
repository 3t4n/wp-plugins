// ready functions
jQuery(function() {
	// finds any sidebars and hides them with .closed-sidebar
	var element = document.querySelectorAll("aside");

	// actually checks if there is a sidebar
	if (element.length > 0){

	    for (var i = element.length - 1; i >= 0; i--) {
			element[i].classList.add("closed-sidebar");
		}

	}
	
	// add/remove classes to sidebar trigger button and sidebars
	jQuery("#revolver-icon").click(function() {
		
		// toggle button classes .dashicons-menu and dashicons-no-alt
  		jQuery(this).toggleClass("dashicons-menu");
  		jQuery(this).toggleClass("dashicons-no-alt");

  		// toggle aside classes .closed-sidebar and .open-sidebar
  		jQuery("aside").toggleClass("closed-sidebar");
  		jQuery("aside").toggleClass("open-sidebar");

	});
});