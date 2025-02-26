(function( $ ) {
	'use strict';
//Custom js for promotional widgets CTA button
	var isEditMode = false;
	$(window).on('elementor/frontend/init', function () {
	    if( elementorFrontend.isEditMode() ) { 
	        isEditMode = true;    
		}
		if (isEditMode) {
			parent.document.addEventListener("mousedown", function(e) {
				var widgets = parent.document.querySelectorAll(".elementor-element--promotion");
				if (widgets.length > 0) {
					for (var i = 0; i < widgets.length; i++) {
						if ( widgets[i].contains( e.target ) ) {
							var icon = widgets[i].querySelector( ".icon > i" );
							var dialog = parent.document.querySelector( "#elementor-element--promotion__dialog" );
							if ( icon.classList.toString().indexOf( "aew" ) >= 0 ) {
								dialog.querySelector(".dialog-buttons-action").style.display = "none";
								if ( dialog.querySelector(".aew-dialog-cta") === null ) {
									var aewBtn = document.createElement("button");
									aewBtn.textContent = "Upgrade To Pro";
									aewBtn.setAttribute( "class", "aew-dialog-cta dialog-button dialog-action dialog-buttons-action elementor-button elementor-button-success" );
									aewBtn.setAttribute( "onclick", "window.open('https://alleythemes.com/pricing/')" );
									dialog.querySelector( ".dialog-buttons-wrapper" ).appendChild( aewBtn );
								} else {
									dialog.querySelector( ".aew-dialog-cta" ).style.display = "";
								}
							} else {
								dialog.querySelector( ".dialog-buttons-action" ).style.display = "";

								if (dialog.querySelector( ".aew-dialog-cta" ) !== null) {
									dialog.querySelector( ".aew-dialog-cta" ).style.display = "none";
								}
							}
						}
					}
				}
			});
		}
 	});

})( jQuery );