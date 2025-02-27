jQuery(document).ready( function($) {
	function resizeVideo() {                 
                var iframe = jQuery('#loginstyle_yt'),
                    width = jQuery('#loginstyle_yt_container').outerWidth(),
                    height = jQuery('#loginstyle_yt_container').outerHeight(),
                    ratio = parseFloat(loginstyle_vars.iframe_ratio);

                if ( width / height <= ratio ) {
                        iframe.css({height: height, width: height * ratio});
                } else {
                        iframe.css({width: width, height: width / ratio});
                }
	}

	resizeVideo();

	jQuery(window).resize(function() {
		resizeVideo();
	});
});

var tag = document.createElement('script');

tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

var player;
function onYouTubeIframeAPIReady() {
	player = new YT.Player('loginstyle_yt', {
	 	playerVars: {
	                autoplay: 1,
	                showinfo: 0,
	                controls: 0,
	                modestbranding: 1,
	                rel: 0,
	                loop: 1,
	                div_load_policy: 3,
	                playlist: document.getElementById("loginstyle_yt").getAttribute('data-videoid'),
	                wmode: 'transparent',
	                origin: document.location.origin
	        },
	        allowfullscreen: 0,
	        videoId: document.getElementById("loginstyle_yt").getAttribute('data-videoid'),
	        events: {
	            'onReady': onPlayerReady
	        }
	});
}

// 4. The API will call this function when the video player is ready.
function onPlayerReady(event) {
        event.target.mute();
        event.target.playVideo();
}