jQuery( document ).ready( function ($) {

    /**
     * AZO Ads Front-End Functions
     */
    function azo_ads_front_end_get_nonce_key() {
        var nonce_key = $( '#_azoadsnonce' ).val();
        if ( nonce_key.length > 0 ) return nonce_key;
        else return '';
    }

    // declare some global variables
    var windowWidth = $( window ).width(),
        windowHeight = $( window ).height();

    // close btn sticky ads
    $( '.azoads-sticky-ads.close-btn' ).on( 'click', function() {
        $( this ).parent().parent().hide();
    } );

    // close btn popup/floating ads
    $( '.azoads-popup-close, .azoads-floating-close' ).on( 'click', function() {
        $( this ).parent().parent().parent().hide();
    });

    // random ad from the list of ads
    // Math.floor(Math.random() * (max - min + 1) + min);
    $( '.azoads-random' ).each( function( index, element ) {
        var num = $( element ).find( '.azoads' ).length,
            min = 1;
        if ( num > 0 ) {
            var numRanded = Math.floor( Math.random() * ( num - min + 1 ) + min );
            $( element ).find( '.azoads:nth-child(' + numRanded + ')' ).show();
        }
    });

    // show ad in group insertion ad
    $( '.azoads-group-insertion' ).each( function( index, element ) {
        var num_ad = $( element ).find( '.azoads' ).length;
        $( element ).find( '.azoads:nth-child(' + ( ( index % num_ad ) + 1 ) + ')' ).show();
    });

    // carousel ad
	var slideCount = $( '.azoads-slider ul li' ).length,
        slideWidth = $( '.azoads-slider ul li' ).width(),
        slideHeight = $( '.azoads-slider ul li' ).height(),
        sliderUlWidth = slideCount * slideWidth;

    if ( slideCount > 0 ) {
        setInterval( function() {
            slideMoveRight();
        }, ( carousel_speed * 1000 ) );

        // set height again on mobile
        if ( windowWidth <= 767 ) {
            slideHeight = ( ( slideWidth * carousel_height ) / carousel_width );
            $( '.azoads-slider ul li' ).css( { width: slideWidth, height: slideHeight } );
        }

        // show slider navigation arrows
        if ( carousel_arrows == 1 ) $( '.nav-prev, .nav-next' ).show();
        
        $( '.azoads-slider' ).css( { width: slideWidth, height: slideHeight } );
        $( '.azoads-slider ul' ).css( { width: sliderUlWidth, marginLeft: - slideWidth, height: 'unset' } );
        $( '.azoads-slider ul li:last-child' ).prependTo( '.azoads-slider ul' );
    
        function slideMoveLeft() {
            $( '.azoads-slider ul' ).animate({
                left: + slideWidth
            }, 200, function () {
                $( '.azoads-slider ul li:last-child' ).prependTo( '.azoads-slider ul' );
                $( '.azoads-slider ul' ).css( 'left', '' );
            } );
        };
        function slideMoveRight() {
            $( '.azoads-slider ul' ).animate({
                left: - slideWidth
            }, 200, function () {
                $( '.azoads-slider ul li:first-child' ).appendTo( '.azoads-slider ul' );
                $( '.azoads-slider ul' ).css( 'left', '' );
            } );
        };
        $( 'a.nav-prev' ).on( 'click', function (e) {
            e.preventDefault();
            slideMoveLeft();
        } );
        $( 'a.nav-next' ).on( 'click', function (e) {
            e.preventDefault();
            slideMoveRight();
        } );

    }

    // rotator ad
    var numAdRotator = $( '.azoads-rotator .azoads' ).length;
    if ( numAdRotator > 0 ) {
        if ( rotator_type == 'auto-timer' ) {
            // declare show ad rotator function
            function azoads_rotator_timer( timerIndex ) {
                $( '.azoads-rotator .azoads' ).hide();
                $( '.azoads-rotator .azoads:nth-child(' + ( timerIndex + 1 ) + ')' ).fadeIn();
            }
            var timerIndex = 0;
            azoads_rotator_timer( ( timerIndex % numAdRotator ) );
            setInterval( function() {
                timerIndex ++;
                azoads_rotator_timer( ( timerIndex % numAdRotator ) );
            }, ( rotator_speed * 1000 ) );
        }
        else if ( rotator_type == 'on-reload' ) {
            var timeRotator = 5, // after every 5 seconds, we reload the ad once page refreshed
                adTimeIndexShow = ( Math.floor( Date.now() / 1000 ) % ( numAdRotator * timeRotator ) ),
                adIndexShow = ( Math.floor( adTimeIndexShow / timeRotator ) + 1 );
            $( '.azoads-rotator .azoads:nth-child(' + adIndexShow + ')' ).show();
        }
    }

    // half screen ad
    function azoads_half_screen_process( type ) {
        if ( type == 'mobile' ) {
            var hsHeight = Math.ceil( ( windowHeight / 2 ) );
            $( '.azoads-half-screen-inner' ).toggleClass( 'mobile' );
            $( '.azoads-half-screen-inner' ).css( { height: hsHeight } );

            // toggle nav half screen
            $( '.azoads-half-screen-nav' ).on( 'click', function() {
                $( this ).find( 'svg' ).toggleClass( 'active' );
                var hs_container = $( '.azoads-half-screen-inner' ),
                    hs_position = 0;
                if ( hs_container.hasClass( 'active' ) ) hs_position = -hsHeight;
                $( '.azoads-half-screen-inner' ).animate( { 'bottom': hs_position + 'px' }, 'slow' );
                hs_container.toggleClass( 'active' );
            });
        }
        else {
            var hsWidth = Math.ceil( ( windowWidth / 2 ) );
            $( '.azoads-half-screen-inner' ).css( { width: hsWidth } );

            // toggle nav half screen
            $( '.azoads-half-screen-nav' ).on( 'click', function() {
                $( this ).find( 'svg' ).toggleClass( 'active' );
                var hs_container = $( '.azoads-half-screen-inner' ),
                    hs_position = 0;
                if ( hs_container.hasClass( 'active' ) ) hs_position = -hsWidth;
                $( '.azoads-half-screen-inner' ).animate( { 'left': hs_position + 'px' }, 'slow' );
                hs_container.toggleClass( 'active' );
            });
        }
    }
    var numAdHalfScreen = $( '.azoads-half-screen-inner' ).length;
    if ( numAdHalfScreen > 0 ) {
        // for mobile screen
        if ( windowWidth <= 767 ) {
            azoads_half_screen_process( 'mobile' );
        }
        else {
            azoads_half_screen_process( 'desktop' );
        }
        
        // waiting time until show ad
        if ( half_screen_time > 0 ) {
            $( '.azoads-half-screen-inner' ).css( 'opacity', '0' );
            $( '.azoads-half-screen-nav' ).click();
            setTimeout( function() {
                $( '.azoads-half-screen-inner' ).css( 'opacity', '1' );
                $( '.azoads-half-screen-nav' ).click();
            }, ( half_screen_time * 1000 ) );
        }
    }

    // skip ad
    var numAdSkip = $( '.azoads-skip-inner' ).length;
    if ( numAdSkip > 0 ) {
        if ( skip_time > 0 ) {
            setTimeout( function() {
                $( '.azoads-skip-inner' ).addClass( 'active' );
                $( 'body' ).css( { overflow: 'hidden' } );
                var timeCountDown = 0;
                var skipCountDown = setInterval( function() {
                    $( '.azoads-skip-nav' ).html( ( skip_waiting_time - timeCountDown ) + ' seconds remaining...' );
                    if ( timeCountDown > skip_waiting_time ) {
                        clearInterval( skipCountDown );
                        $( '.azoads-skip-nav' ).addClass( 'open' ).html( 'Skip Ad <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M52.5 440.6c-9.5 7.9-22.8 9.7-34.1 4.4S0 428.4 0 416V96C0 83.6 7.2 72.3 18.4 67s24.5-3.6 34.1 4.4l192 160L256 241V96c0-17.7 14.3-32 32-32s32 14.3 32 32V416c0 17.7-14.3 32-32 32s-32-14.3-32-32V271l-11.5 9.6-192 160z"/></svg>' );
                    }
                    timeCountDown ++;
                }, ( 1000 ) );
            }, ( skip_time * 1000 ) );

            $( '.azoads-skip-inner' ).on( 'click', '.azoads-skip-nav.open', function() {
                $( '.azoads-skip-inner' ).removeClass( 'active' );
                $( 'body' ).css( { overflow: 'visible' } );
            });
        }
    }

    // mobile parallax fullscreen
    var numAdParallaxFullscreen = $( '.azoads-parallax-fullscreen-container' ).length;
    if ( numAdParallaxFullscreen > 0 ) {
        if ( windowWidth <= 767 && windowHeight > 0 ) {
            $( '.azoads-parallax-fullscreen-container' ).show();
            $( '.azoads-parallax-fullscreen-container' ).css( { 'min-height': windowHeight + 'px' } );
            $( '.azoads-parallax-fullscreen-container' ).parallax({
                iosDisabled: false,
                androidDisabled: false,
                naturalHeight: windowHeight,
                zIndex: 1,
                bleed: 10,
            });
        }
    }

    // browser width reponsive ad
    function azoads_process_bw( type ) {
        $( '.azoads' ).each( function( index, element ) {
            var data_bw = $( element ).data( type + '-bw' );
            if ( data_bw !== undefined && data_bw.length > 0 ) {
                
                // hide/show all ad
                if ( type == 'ti' ) $( element ).hide();
                else $( element ).show();

                var data_bw_arr = data_bw.toString().split( ';' );
                $.each( data_bw_arr, function( key, value ) {
                    var bw_breakpoint_arr = value.split( '-' );
                    windowWidth = $( window ).width();
                    if ( bw_breakpoint_arr.length == 1 ) { // only 1 breakpoint
                        if ( windowWidth >= bw_breakpoint_arr[0] ) {
                            if ( type == 'ti' ) $( element ).show();
                            else $( element ).hide();
                        }
                    }
                    else {
                        if ( windowWidth >= parseInt( bw_breakpoint_arr[0] ) && windowWidth <= parseInt( bw_breakpoint_arr[1] ) ) {
                            if ( type == 'ti' ) $( element ).show();
                            else $( element ).hide();
                        }
                    }
                });
            }
        });
    }
    // init
    azoads_process_bw( 'ti' );
    azoads_process_bw( 'te' );
    // on resize
    $( window ).on( 'resize', function() {
        azoads_process_bw( 'ti' );
        azoads_process_bw( 'te' );
    } );

    // IMPRESSION
    const adids = [];
    $( '.azoads' ).each( function( index, element ) {
        // need to check if element has attribute display: none
        if ( $( element ).css( 'display' ) != 'none' ) {
            var adid = parseInt( $( element ).data( 'adid' ) );
            if ( adid > 0 ) adids.push( { id: adid, ww: $( window ).width() } );
        }
    });
    if ( adids.length > 0 ) {
        $.ajax({
            type: "post",
            dataType: "json",
            url: azoads_ajax.ajaxurl,
            data: {
                'action': "azoads_report",
                'type': 1,
                'adids': adids,
                'url': window.location.href,
                'referrer': document.referrer,
                '_azoadsnonce': azo_ads_front_end_get_nonce_key()
            },
            success: function( res ) {
                // console.log(res);
            }
        });
    }
    // CLICKS
    $( '.azoads' ).on( 'click', 'a', function(e) {
        $.ajax({
            type: "post",
            dataType: "json",
            url: azoads_ajax.ajaxurl,
            data: {
                'action': "azoads_report",
                'type': 2,
                'adids': adids,
                'url': window.location.href,
                'referrer': document.referrer,
                '_azoadsnonce': azo_ads_front_end_get_nonce_key()
            },
            success: function( res ) {
                // console.log(res);
            }
        });
    });

});