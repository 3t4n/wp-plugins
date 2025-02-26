jQuery(function ($) {
    //console.log('lazy_bg');
    if (!(window.Waypoint)) {
        // if Waypoint is not available, then we MUST remove our class from all elements because otherwise BGs will never show
        jQuery('.e_lazy_bg').removeClass('e_lazy_bg');
        if (window.console && console.warn) {
            console.warn('Waypoint library is not loaded so backgrounds lazy loading is turned OFF');
        }
        return;
    }
    
    jQuery('.e_lazy_bg').each(function () {
        var $element = jQuery(this);
        new Waypoint({
            element: $element.get(0),
            handler: function (direction) {
                //console.log( [ 'waypoint hit', $element.get( 0 ), $(window).scrollTop(), $element.offset() ] );
                $element.removeClass('e_lazy_bg');
            },
            offset: jQuery(window).height() * 1.5 // when item is within 1.5x the viewport size, start loading it
        });
    });

});