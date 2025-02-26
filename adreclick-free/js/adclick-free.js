(function( $ ) {
	"use strict";
	var jQuery;
	
	if (window.jQuery === undefined) {

	} else {
	    jQuery = window.jQuery;
	    
	    jQueryLoaded();
	}

	function jQueryLoaded(){

		jQuery( document ).ready(function() {

			var scriptTags = document.getElementsByTagName('iframe');
			
			for(var i = 0; i < scriptTags.length; i++) {
				
				var scriptTag = scriptTags[i];
				
                if (scriptTag.src.match(/(youtube|youtu|vimeo|dailymotion)\.(com|be)\/((watch\?v=([-\w]+))|(video\/([-\w]+))|(projects\/([-\w]+)\/([-\w]+))|([-\w]+))/)) { 

					addVideoAdClickFreeAds(scriptTag);
		
				}
			}

			jQuery( ".video-AdClickFree-dismiss-btn" ).on( "click", function(e) {
				
				e.preventDefault();
				if( jQuery(this).parent().hasClass('video-AdClickFree-front') ){
					jQuery(this).parent().remove();
				}else if( jQuery(this).parent().parent().hasClass('video-AdClickFree-front') ){
					jQuery(this).parent().parent().remove();
				}
			});

		});
	}

	function addVideoAdClickFreeAds(scriptTag){
		jQuery(scriptTag).wrap( "<div class='video-AdClickFree-wrapper'></div>" );

		var videoAdClickFreeInnerContent = '<div class="video-AdClickFree-front">';

		if( VideoAdClickFreeAds.AdClickFree_close_button == 1 || VideoAdClickFreeAds.AdClickFree_close_button == 'on' )
			videoAdClickFreeInnerContent += '<a href="#" class="video-AdClickFree-dismiss-btn video-AdClickFree-dismiss">&times;</a>';

		videoAdClickFreeInnerContent += '<div class="video-AdClickFree-content-holder">';

		videoAdClickFreeInnerContent += VideoAdClickFreeAds.AdClickFree_inner_html + '</div></div>';					

		jQuery('.video-AdClickFree-wrapper').append(videoAdClickFreeInnerContent);
	}
	
})( jQuery );