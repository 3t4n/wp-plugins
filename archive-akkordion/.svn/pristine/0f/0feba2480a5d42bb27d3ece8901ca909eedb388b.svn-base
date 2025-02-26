(function($) {
    'use strict';

    /**
     * Handle accordion animation duration and click effects
     */
    $(function() {
        /* Retrieve the animation duration set from the widgets settings. */
        var duration = parseFloat( $( '.widget-archive-akkordion ul:eq(0)' ).data( 'animation' ) );

        /* On click event toggle lists */
        $( 'li.archive-year>a' ).on( 'click', function() {
            var _t = $(this);
            $( 'li.archive-year' ).not(_t).children( 'ul' ).stop().slideUp(duration);
            _t.parent().children( 'ul' ).stop().slideToggle(duration);
        });

    });
})(jQuery);
