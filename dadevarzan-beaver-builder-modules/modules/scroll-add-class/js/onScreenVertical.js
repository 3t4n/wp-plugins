jQuery(function($) {
    $( document ).ready(function() {
        $.fn.isOnScreenVertical = function() {
            var viewport = {};
            viewport.top = $(window).scrollTop();
            viewport.bottom = viewport.top + $(window).height();
            var bounds = {};
            bounds.top = this.offset().top;
            bounds.bottom = bounds.top + this.outerHeight();
            return ((bounds.top <= viewport.bottom) && (bounds.bottom >= viewport.bottom));
        };
    });
});
