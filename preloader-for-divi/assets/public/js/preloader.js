jQuery(window).on('load',function() {
	/* // will first fade out the loading animation
	jQuery("#status").delay(1000).fadeOut();
	// will fade out the whole DIV that covers the website.
	jQuery("#preloader").fadeOut(); */			var preLoader = jQuery("#preloader"), preLoaderStatus = jQuery("#status"); 	if( "fade_in" == preLoaderObj.fadeEffect ){			preLoader.fadeIn( preLoaderObj.speed, fadeInCallback );		preLoaderStatus.fadeIn( preLoaderObj.speed, fadeInCallback );	}		if( "fade_out" == preLoaderObj.fadeEffect ){			preLoaderStatus.fadeOut( preLoaderObj.speed );		preLoader.fadeOut( preLoaderObj.speed );	}			function fadeInCallback(){		jQuery('#preloader').hide();	}
});