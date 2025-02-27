<?php 
add_action('admin_init', 'caspers_flyin_cta_settings'); //registers settings for admin page
function caspers_flyin_cta_settings() {
	register_setting('caspers-flyin-cta-settings-group','cpcta-enabled');
	
    //content
	register_setting('caspers-flyin-cta-settings-group','cpcta-top-bar-text');
	register_setting('caspers-flyin-cta-settings-group','cpcta-slider-body-content');
	
    //color options
	register_setting('caspers-flyin-cta-settings-group','cpcta-top-bar-bkg-color');
	register_setting('caspers-flyin-cta-settings-group','cpcta-top-bar-font-color');
	register_setting('caspers-flyin-cta-settings-group','cpcta-body-content-bkg-color');
	register_setting('caspers-flyin-cta-settings-group','cpcta-body-content-font-color');
	register_setting('caspers-flyin-cta-settings-group','cpcta-close-btn-color');
    
    //other styling options
    register_setting('caspers-flyin-cta-settings-group','cpcta-width-percent');
    register_setting('caspers-flyin-cta-settings-group','cpcta-width-pixel');
	register_setting('caspers-flyin-cta-settings-group','cpcta-zindex');
	register_setting('caspers-flyin-cta-settings-group','cpcta-mobile-hidden');
	register_setting('caspers-flyin-cta-settings-group','cpcta-mobile-width');
	
    
	//position of cta
	register_setting('caspers-flyin-cta-settings-group','cpcta-slider-type');
	register_setting('caspers-flyin-cta-settings-group','cpcta-vert-slider-position'); //when comes out from bottom, where on screen does it sit?
	register_setting('caspers-flyin-cta-settings-group','cpcta-hori-slider-position'); //when comes out from the side, which side does it come out of?
	
		//options for when slider-type = horizontal (i.e. when coming out from side).
			//have top bar vertical or horizontal?
			register_setting('caspers-flyin-cta-settings-group','cpcta-hori-slider-topbar-angle'); //have it stick straight out (i.e. vertical) or flush to the edge of the screen (i.e. horizontal)?
//			register_setting('caspers-flyin-cta-settings-group','cpcta-hori-slider-position');
	
    //what pages to display on
	register_setting('caspers-flyin-cta-settings-group','cpcta-display-on');
	register_setting('caspers-flyin-cta-settings-group','cpcta-display-page');
	register_setting('caspers-flyin-cta-settings-group','cpcta-display-post');
    
    //auto pop out controls
    register_setting('caspers-flyin-cta-settings-group','cpcta-enable-autopop');
    register_setting('caspers-flyin-cta-settings-group','cpcta-autopop-timer');
    
 } //end settings()