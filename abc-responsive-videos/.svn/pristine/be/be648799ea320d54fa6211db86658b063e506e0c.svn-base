( function( $ ) {
	// Responsive videos
	var $all_videos = $( abc_responsive_video.selector ).find( '
		iframe[src*="player.vimeo.com"],
		iframe[src*="youtube.com"],
		iframe[src*="youtube-nocookie.com"],
		iframe[src*="dailymotion.com"],
		iframe[src*="kickstarter.com"][src*="video.html"],
		object,
		embed
	' );

	$all_videos.not( 'object object' ).each( function() {
		var $video = $(this);

		if ( $video.parents( 'object' ).length || $video.parents( '.responsiveignore' ).length ) {
			return;
		}

		if ( ! $video.prop( 'id' ) ) {
			$video.attr( 'id', 'rvw' + Math.floor( Math.random() * 999999 ) );
		}

		$video
			.wrap( '<div class="responsive-video-wrapper" style="padding-top: ' + ( $video.attr( 'height' ) / $video.attr( 'width' ) * 100 ) + '%" />' )
			.removeAttr( 'height' )
			.removeAttr( 'width' );
	} );
} )( jQuery );