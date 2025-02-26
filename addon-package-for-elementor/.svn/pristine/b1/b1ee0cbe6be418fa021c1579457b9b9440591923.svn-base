( function( $ ) {

	var APFE_HANDLER = function( $scope, $ ) {

		let selector = `.elementor-element-${$scope[0].dataset.id}`;
		var animation = "",
		slideshow = "",
		loop = "",
		speed = "",
		controlnnav = "";
		
		if ($(window.document.querySelector(`${selector} .apfe_slider_settings`)).attr("data-slidertype") != null) {
			if ($(window.document.querySelector(`${selector} .apfe_slider_settings`)).attr("data-slidertype") == "slide") {
				animation = "slide";
			} else {
				animation = "fade";
			}				
		} else {
			animation = "fade";
		}
		
		if ($(window.document.querySelector(`${selector} .apfe_slider_settings`)).attr("data-slideshow") != null) {
			if ($(window.document.querySelector(`${selector} .apfe_slider_settings`)).attr("data-slideshow") == "true") {
				slideshow = true;
			} else {
				slideshow = false;
			}
		} else {
			slideshow = false;
		}
	
		if ($(window.document.querySelector(`${selector} .apfe_slider_settings`)).attr("data-loop") != null) {
			if ($(window.document.querySelector(`${selector} .apfe_slider_settings`)).attr("data-loop") == "true") {
				loop = true;
			} else {
				loop = false;
			}			
		} else {
			loop = false;
		}
		if ($(window.document.querySelector(`${selector} .apfe_slider_settings`)).attr("data-touch") != null) {
			if ($(window.document.querySelector(`${selector} .apfe_slider_settings`)).attr("data-touch") == "true") {
				touch = true;
			} else {
				touch = false;
			}			
		} else {
			touch = false;
		}	
		if ($(window.document.querySelector(`${selector} .apfe_slider_settings`)).attr("data-controlnav") != null) {
			if ($(window.document.querySelector(`${selector} .apfe_slider_settings`)).attr("data-controlnav") == "true") {
				controlnav = true;
			} else {
				controlnav = false;
			}			
		} else {
			controlnnav = false;
		}			
		if ($(window.document.querySelector(`${selector} .apfe_slider_settings`)).attr("data-sliderspeed") != null) {
			if ($(window.document.querySelector(`${selector} .apfe_slider_settings`)).attr("data-sliderspeed") == "") {
				speed = 600;
			} else {
				speed = $(window.document.querySelector(`${selector} .apfe_slider_settings`)).attr("data-sliderspeed");
			}				
		} else {
			speed = 600;
		}	
		if ($(window.document.querySelector(`${selector} .apfe_slider_settings`)).attr("data-slideshowspeed") != null) {
			if ($(window.document.querySelector(`${selector} .apfe_slider_settings`)).attr("data-slideshowspeed") == "") {
				slideshowspeed = 7000;
			} else {
				slideshowspeed = $(window.document.querySelector(`${selector} .apfe_slider_settings`)).attr("data-slideshowspeed");
			}				
		} else {
			slideshowspeed = 7000;
		}			
		
		if (window.document.querySelector(`${selector} .flexslider.carousel`) != null) {
			jQuery(`${selector} .flexslider`).flexslider({
				animation: "slide",//??? FADE
				animationLoop: loop,
				slideshow: slideshow,
				itemWidth: 210,
				itemMargin: 5,
				animationSpeed: speed,
				slideshowSpeed: slideshowspeed,
				touch: touch,
				controlNav: controlnav,
				useCSS: false
			});	
		} else if (window.document.querySelector(`${selector} .flexslider.wt`) != null) {
			jQuery(`${selector} #apfe_carousel`).flexslider({
				animation: "slide",
				controlNav: false,
				animationLoop: false,
				slideshow: false,
				itemWidth: 210,
				itemMargin: 5,
				asNavFor: `${selector} #apfe_slider`,
				animationSpeed: speed,
				slideshowSpeed: slideshowspeed,
				touch: touch,
				useCSS: false
			});
			jQuery(`${selector} #apfe_slider`).flexslider({
				animation: animation,
				controlNav: false,
				animationLoop: loop,
				slideshow: slideshow,
				sync: `${selector} #apfe_carousel`,
				animationSpeed: speed,
				slideshowSpeed: slideshowspeed,
				touch: touch,
				useCSS: false
			});	
		} else {
			$(`${selector} .flexslider`).flexslider({
				animation: animation,
				slideshow: slideshow,
				animationLoop: loop,
				animationSpeed: speed,
				slideshowSpeed: slideshowspeed,
				touch: touch,
				controlNav: controlnav,
				useCSS: false
			});	
		}
	};
	
	var APFE_HANDLER_WOOSLIDER = function( $scope, $ ) {
		
		let selector = `.elementor-element-${$scope[0].dataset.id}`;
		var animation = "",
		slideshow = "",
		loop = "",
		speed = "",
		controlnnav = "",
		items = "";


		if ($(window.document.querySelector(`${selector} .apfe_slider_settings`)).attr("data-slidertype") != null) {
			if ($(window.document.querySelector(`${selector} .apfe_slider_settings`)).attr("data-slidertype") == "slide") {
				animation = "slide";
			} else {
				animation = "fade";
			}				
		} else {
			animation = "fade";
		}
		
		if ($(window.document.querySelector(`${selector} .apfe_slider_settings`)).attr("data-slideshow") != null) {
			if ($(window.document.querySelector(`${selector} .apfe_slider_settings`)).attr("data-slideshow") == "true") {
				slideshow = true;
			} else {
				slideshow = false;
			}
		} else {
			slideshow = false;
		}
	
		if ($(window.document.querySelector(`${selector} .apfe_slider_settings`)).attr("data-loop") != null) {
			if ($(window.document.querySelector(`${selector} .apfe_slider_settings`)).attr("data-loop") == "true") {
				loop = true;
			} else {
				loop = false;
			}			
		} else {
			loop = false;
		}
		if ($(window.document.querySelector(`${selector} .apfe_slider_settings`)).attr("data-touch") != null) {
			if ($(window.document.querySelector(`${selector} .apfe_slider_settings`)).attr("data-touch") == "true") {
				touch = true;
			} else {
				touch = false;
			}			
		} else {
			touch = false;
		}	
		if ($(window.document.querySelector(`${selector} .apfe_slider_settings`)).attr("data-controlnav") != null) {
			if ($(window.document.querySelector(`${selector} .apfe_slider_settings`)).attr("data-controlnav") == "true") {
				controlnav = true;
			} else {
				controlnav = false;
			}			
		} else {
			controlnnav = false;
		}			
		if ($(window.document.querySelector(`${selector} .apfe_slider_settings`)).attr("data-sliderspeed") != null) {
			if ($(window.document.querySelector(`${selector} .apfe_slider_settings`)).attr("data-sliderspeed") == "") {
				speed = 600;
			} else {
				speed = $(window.document.querySelector(`${selector} .apfe_slider_settings`)).attr("data-sliderspeed");
			}				
		} else {
			speed = 600;
		}	
		if ($(window.document.querySelector(`${selector} .apfe_slider_settings`)).attr("data-slideshowspeed") != null) {
			if ($(window.document.querySelector(`${selector} .apfe_slider_settings`)).attr("data-slideshowspeed") == "") {
				slideshowspeed = 7000;
			} else {
				slideshowspeed = $(window.document.querySelector(`${selector} .apfe_slider_settings`)).attr("data-slideshowspeed");
			}				
		} else {
			slideshowspeed = 7000;
		}

		if ($(window.document.querySelector(`${selector} .apfe_slider_settings`)).attr("data-items") != null) {
			if ($(window.document.querySelector(`${selector} .apfe_slider_settings`)).attr("data-items") == "") {
				items = 6;
			} else {
				items = $(window.document.querySelector(`${selector} .apfe_slider_settings`)).attr("data-items");
			}				
		} else {
			items = 6;
		}			
		
		if (window.document.querySelector(`${selector} .flexslider.carousel.woocarousel`) != null) {
			jQuery(`${selector} .flexslider`).flexslider({
				animation: "slide",//??? FADE
				animationLoop: loop,
				slideshow: slideshow,
				itemWidth: 210,
				itemMargin: 5,
				animationSpeed: speed,
				slideshowSpeed: slideshowspeed,
				touch: touch,
				controlNav: controlnav,
				useCSS: false,
				maxItems: items
			});		
		}
	};


	var APFE_HANDLER_POSTCAROUSEL = function( $scope, $ ) {
		
		let selector = `.elementor-element-${$scope[0].dataset.id}`;
		var animation = "",
		slideshow = "",
		loop = "",
		speed = "",
		controlnnav = "",
		items = "";

		if ($(window.document.querySelector(`${selector} .apfe_slider_settings`)).attr("data-slidertype") != null) {
			if ($(window.document.querySelector(`${selector} .apfe_slider_settings`)).attr("data-slidertype") == "slide") {
				animation = "slide";
			} else {
				animation = "fade";
			}				
		} else {
			animation = "fade";
		}
		
		if ($(window.document.querySelector(`${selector} .apfe_slider_settings`)).attr("data-slideshow") != null) {
			if ($(window.document.querySelector(`${selector} .apfe_slider_settings`)).attr("data-slideshow") == "true") {
				slideshow = true;
			} else {
				slideshow = false;
			}
		} else {
			slideshow = false;
		}
	
		if ($(window.document.querySelector(`${selector} .apfe_slider_settings`)).attr("data-loop") != null) {
			if ($(window.document.querySelector(`${selector} .apfe_slider_settings`)).attr("data-loop") == "true") {
				loop = true;
			} else {
				loop = false;
			}			
		} else {
			loop = false;
		}
		if ($(window.document.querySelector(`${selector} .apfe_slider_settings`)).attr("data-touch") != null) {
			if ($(window.document.querySelector(`${selector} .apfe_slider_settings`)).attr("data-touch") == "true") {
				touch = true;
			} else {
				touch = false;
			}			
		} else {
			touch = false;
		}	
		if ($(window.document.querySelector(`${selector} .apfe_slider_settings`)).attr("data-controlnav") != null) {
			if ($(window.document.querySelector(`${selector} .apfe_slider_settings`)).attr("data-controlnav") == "true") {
				controlnav = true;
			} else {
				controlnav = false;
			}			
		} else {
			controlnnav = false;
		}			
		if ($(window.document.querySelector(`${selector} .apfe_slider_settings`)).attr("data-sliderspeed") != null) {
			if ($(window.document.querySelector(`${selector} .apfe_slider_settings`)).attr("data-sliderspeed") == "") {
				speed = 600;
			} else {
				speed = $(window.document.querySelector(`${selector} .apfe_slider_settings`)).attr("data-sliderspeed");
			}				
		} else {
			speed = 600;
		}	
		if ($(window.document.querySelector(`${selector} .apfe_slider_settings`)).attr("data-slideshowspeed") != null) {
			if ($(window.document.querySelector(`${selector} .apfe_slider_settings`)).attr("data-slideshowspeed") == "") {
				slideshowspeed = 7000;
			} else {
				slideshowspeed = $(window.document.querySelector(`${selector} .apfe_slider_settings`)).attr("data-slideshowspeed");
			}				
		} else {
			slideshowspeed = 7000;
		}

		if ($(window.document.querySelector(`${selector} .apfe_slider_settings`)).attr("data-items") != null) {
			if ($(window.document.querySelector(`${selector} .apfe_slider_settings`)).attr("data-items") == "") {
				items = 6;
			} else {
				items = $(window.document.querySelector(`${selector} .apfe_slider_settings`)).attr("data-items");
			}				
		} else {
			items = 6;
		}			
		
		if (window.document.querySelector(`${selector} .flexslider.carousel.postcarousel`) != null) {
			jQuery(`${selector} .flexslider`).flexslider({
				animation: "slide",//??? FADE
				animationLoop: loop,
				slideshow: slideshow,
				itemWidth: 210,
				itemMargin: 5,
				animationSpeed: speed,
				slideshowSpeed: slideshowspeed,
				touch: touch,
				controlNav: controlnav,
				useCSS: false,
				maxItems: items,
			});		
		} else if (window.document.querySelector(`${selector} .flexslider.wt`) != null) {
			jQuery(`${selector} #apfe_carousel`).flexslider({
				animation: "slide",
				controlNav: false,
				animationLoop: false,
				slideshow: false,
				itemWidth: 210,
				itemMargin: 5,
				asNavFor: `${selector} #apfe_slider`,
				animationSpeed: speed,
				slideshowSpeed: slideshowspeed,
				touch: touch,
				useCSS: false,
				maxItems: items
			});
			jQuery(`${selector} #apfe_slider`).flexslider({
				animation: animation,
				controlNav: false,
				animationLoop: loop,
				slideshow: slideshow,
				sync: `${selector} #apfe_carousel`,
				animationSpeed: speed,
				slideshowSpeed: slideshowspeed,
				touch: touch,
				useCSS: false
			});	
		}
	};	
	
	$( window ).on( 'elementor/frontend/init', () => {
	  const addHandler = ( $element ) => {
		elementorFrontend.elementsHandler.addHandler( WidgetHandlerClass, { $element, } );
	  };
	  elementorFrontend.hooks.addAction( 'frontend/element_ready/hello-world.default', APFE_HANDLER );
	  elementorFrontend.hooks.addAction( 'frontend/element_ready/apfe-woo-flexslider.default', APFE_HANDLER_WOOSLIDER );
	  elementorFrontend.hooks.addAction( 'frontend/element_ready/apfe-postcarousel-flexslider.default', APFE_HANDLER_POSTCAROUSEL );
	  
	});

} )( jQuery );

