( function( api ) {
    // Deep linking for pro images
    wp.customize.bind('ready', function() {

		jQuery('li#customize-control-yuma_theme_options-theme_color').prepend('<a class="features-added color-mode" title="'+ yuma_companion_l10n.notice +'" href="'+ yuma_companion_l10n.link +'" target="_blank"><img src="'+ yuma_companion_l10n.plugin_link +'assets/images/theme_color_mode.jpg"></a>');

        jQuery('li#customize-control-yuma_theme_options-header_area').prepend('<a class="features-added header-area-alignment" title="'+ yuma_companion_l10n.notice +'" href="'+ yuma_companion_l10n.link +'" target="_blank"><img src="'+ yuma_companion_l10n.plugin_link +'assets/images/header_area_alignment.jpg"></a>');

        jQuery.each( jQuery('li.customize-control-toggle_switch[id*="_style"]'), function( i, val ) {
        	if ( jQuery(this).find('input').attr('checked') ) {
        		jQuery(this).addClass('features-active');
        	}

        	trim_id = jQuery(this).attr('id').split('-');
        	trim_id = trim_id.at(-1);
    		jQuery(this).append('<a class="features-added" title="'+ yuma_companion_l10n.notice +'" href="'+ yuma_companion_l10n.link +'" target="_blank"><img src="'+ yuma_companion_l10n.plugin_link +'assets/images/'+ trim_id +'.jpg"></a>');

    		jQuery(this).on('change',function(){
    			jQuery(this).toggleClass('features-active');
    		});
    	});

    });
} )( wp.customize );