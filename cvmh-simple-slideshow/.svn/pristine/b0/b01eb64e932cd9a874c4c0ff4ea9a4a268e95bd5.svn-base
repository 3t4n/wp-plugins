jQuery( document ).ready( function( $ ) {
    
    var t = 0;
        
    function prevSlide() {
        var _current = $( '.cvmh-slideshow li.active' );
        var _prev = parseInt( _current.data('item').substr(5) ) - 1;
        if( _prev === 0 ) _prev = $( '.cvmh-slideshow li' ).length;
        $( '.cvmh-slideshow li.slide' ).removeClass( 'active' );
        $( '.cvmh-slideshow li.item-'+_prev ).addClass( 'active' );
        $( '.cvmh-slideshow-dot' ).removeClass( 'active' );
        $( '.cvmh-slideshow-dot.dot-'+_prev ).addClass( 'active' );
    }
    
    function nextSlide() {
        var _current = $( '.cvmh-slideshow li.active' );
        var _next = parseInt( _current.data('item').substr(5) ) + 1;
        if( _next > $( '.cvmh-slideshow li' ).length ) _next = 1;
        $( '.cvmh-slideshow li.slide' ).removeClass( 'active' );
        $( '.cvmh-slideshow li.item-'+_next ).addClass( 'active' );
        $( '.cvmh-slideshow-dot' ).removeClass( 'active' );
        $( '.cvmh-slideshow-dot.dot-'+_next ).addClass( 'active' );
    }
    
    function goToSlide( destination ) {
        $( '.cvmh-slideshow li.slide' ).removeClass( 'active' );
        $( '.cvmh-slideshow li.item-'+destination ).addClass( 'active' );
        $( '.cvmh-slideshow-dot' ).removeClass( 'active' );
        $( '.cvmh-slideshow-dot.dot-'+destination ).addClass( 'active' );
    }
        
    function initSlideshow() {
        var slideshow_height = cvmhSlideshow.height;
        if ( cvmhSlideshow.background == 1 ) {
            $( '.cvmh-slideshow' ).height( slideshow_height );
        } else {
            $( window ).on( 'load', function() {
                $( '.cvmh-slideshow' ).height( $( '.cvmh-slideshow .slide-img' ).first().height() );
            }); 
        }
        var t = setInterval( function(){
            nextSlide();
        }, cvmhSlideshow.duration );
    }
        
    // Start slideshow
    if( $( '.cvmh-slideshow li' ).length > 0 ) {
        initSlideshow();
    }
    
    // Init again on resize
    $( window ).resize(function() {
        initSlideshow();
    });
    
    // Navigation
    $( '.cvmh-slideshow-prev' ).on( 'click', function() {
        clearInterval( t );
        prevSlide();
    });
    $( '.cvmh-slideshow-next' ).on( 'click', function() {
        clearInterval( t );
        nextSlide();
    });
    $( '.cvmh-slideshow-dot' ).on( 'click', function() {
        clearInterval( t );
        goToSlide( parseInt( $( this ).data( 'destination' ) ) );
    });

} );