(function($){
	
	var bdy = jQuery("body:not('.elementor-editor-active')");
	var value = wsp_obj.loader,		
	duration = ( wsp_obj.hasOwnProperty('fadeout') && wsp_obj.fadeout!="" )?wsp_obj.fadeout:2500,
	delay = ( wsp_obj.hasOwnProperty('delay') && wsp_obj.delay!="" )?wsp_obj.delay:1500;

    // Determine if preloader should appear only on the homepage
    if (wsp_obj.homepage === "1" && $body.hasClass('home')) {
        add_block_after_body();
    } else if (!wsp_obj.homepage) {
        add_block_after_body();
    }

	function add_block_after_body() {
		if (!$('.smart-page-loader').length) {
			$('body:not(".elementor-editor-active")').prepend('<div class="smart-page-loader"></div>');
			$('body:not(".elementor-editor-active")').removeClass('wp-smart-body');
		}
	}
		
	setTimeout(wsp_front_loader(),1000);

	function wsp_front_loader() {
		var block = '';
		if( value != "" ){
			switch (value){
				case "Loader 1":
					block += '<div class="wp-smart-loader smart-loader-one">Loading...</div>';
					break;
				case "Loader 2":
					block += '<div class="wp-smart-loader smart-loader-two"> <span></span> <span></span> <span></span> <span></span> </div>';
					break;
				case "Loader 3":
					block += ' <div class="wp-smart-loader smart-loader-three"> <span></span> <span></span> <span></span> <span></span> <span></span> </div>';
					break;
				case "Loader 4":
					block += ' <div class="wp-smart-loader smart-loader-four"> <span class="spinner-cube spinner-cube1"></span> <span class="spinner-cube spinner-cube2"></span> <span class="spinner-cube spinner-cube3"></span> <span class="spinner-cube spinner-cube4"></span> <span class="spinner-cube spinner-cube5"></span> <span class="spinner-cube spinner-cube6"></span> <span class="spinner-cube spinner-cube7"></span> <span class="spinner-cube spinner-cube8"></span> <span class="spinner-cube spinner-cube9"></span> </div>';
					break;
				case "Loader 5":
					block += ' <div class="wp-smart-loader smart-loader-five"> <span class="spinner-cube-1 spinner-cube"></span> <span class="spinner-cube-2 spinner-cube"></span> <span class="spinner-cube-4 spinner-cube"></span> <span class="spinner-cube-3 spinner-cube"></span> </div>';
					break;
				case "Loader 6":
					block += ' <div class="wp-smart-loader smart-loader-six"> <span class=" spinner-cube-1 spinner-cube"></span> <span class=" spinner-cube-2 spinner-cube"></span> </div>';
					break;
				case "Custom Animation":
					block += wsp_obj.custom_animation;
					break;
			}
				
			if( wsp_obj.homepage === "1"){
				if ($('body.home:not(".elementor-editor-active")').length) {
					$('body.home:not(".elementor-editor-active") .smart-page-loader').prepend(block);
				}				
			} else {
				// all pages
				jQuery('.smart-page-loader').prepend(block);
			}	

		}
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     
	}

	window.onload = function() {
		add_block_after_body();
		wsp_front_loader();
		setTimeout(function() {
			fade_away();
		}, delay);
	};

	function fade_away() {
		$('.smart-page-loader').fadeOut(duration, function() {
			$('body:not(".elementor-editor-active")').removeClass('wp-smart-body');
			$('.smart-page-loader').removeClass('loading-animation');
		});
	}
	
}(jQuery));

