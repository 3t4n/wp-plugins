(function( $ ) {

    var gamipress_multimedia_content_counters = [];

    // Listen for media events
    $('.wp-audio-shortcode, .wp-video-shortcode').on('play pause ended', function(e) {

        // Get the MediaElement object
        var player = $(this)[0].player;

        // Check player vars
        if( player === undefined ) {
            return;
        }

        if( player.duration === undefined ) {
            return;
        }

        if( player.src === undefined ) {
            return;
        }

        var id = $(this).attr('id');

        if( e.type === 'play' ) {
            // Check for first time played
            if( gamipress_multimedia_content_counters[id] === undefined ) {
                gamipress_multimedia_content_counters[id] = e.timeStamp;
            }
        } else if( e.type === 'ended' ) {
            // Update counter
            var time = ( e.timeStamp - gamipress_multimedia_content_counters[id] ) / 1000;

            // If user has played the full video/audio, then trigger the event
            if( time >= player.duration ) {

                // Reset the counter to just trigger this event again if user play it again
                gamipress_multimedia_content_counters[id] = undefined;

                $.ajax({
                    url: gamipress_multimedia_content.ajaxurl,
                    data: {
                        action: 'gamipress_multimedia_content_listener',
                        src: player.src,
                        post_id: gamipress_multimedia_content.post_id
                    },
                    success: function( response ) {
                        //alert("Thanks for play it!");
                    }
                });
            }
        }

    });

    // Listen for media events on blocks
    $('.wp-block-video video, .wp-block-audio audio').on('play ended',function( e ){

        var id = this.src;

        if( e.type === 'play' ) {
            // Check for first time played
            if( gamipress_multimedia_content_counters[id] === undefined ) {
                gamipress_multimedia_content_counters[id] = e.timeStamp;
            }
        } else if( e.type === 'ended' ) {
            // Update counter
            var time = ( e.timeStamp - gamipress_multimedia_content_counters[id] ) / 1000;

            // If user has played the full video/audio, then trigger the event
            if( time >= this.duration ) {

                // Reset the counter to just trigger this event again if user play it again
                gamipress_multimedia_content_counters[id] = undefined;

                $.ajax({
                    url: gamipress_multimedia_content.ajaxurl,
                    data: {
                        action: 'gamipress_multimedia_content_listener',
                        src: this.src,
                        post_id: gamipress_multimedia_content.post_id
                    },
                    success: function( response ) {
                    }
                });
            }
        }
    });

})( jQuery );