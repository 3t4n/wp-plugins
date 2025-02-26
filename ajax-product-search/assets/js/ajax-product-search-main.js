(function($) {
    "use strict";

    $(document).mouseup(function(e) {

        var searchresuls = $(".ajax-product-search");

        // if the target of the click isn't the container nor a descendant of the container
        if (!searchresuls.is(e.target) && searchresuls.has(e.target).length === 0) {
            $("#productDataFetch").hide();
        }

    });

})(jQuery);