(function($) {
    $(window).on('load mobileinit', function() {
        var custom_adminbar = $("#asimplebackend-admin-bar");

        custom_adminbar.show();
    });

    $(document).ready(function() {
        var custom_adminbar = $("#asimplebackend-admin-bar");
        var toggle = $(".asimplebackend-admin-bar-toggle", custom_adminbar);

        var t = null;
        toggle.on(window.interact.touchEnd, function(e) {
            e.stopPropagation();
            t = clearTimeout(t);
            t = setTimeout(function() {
                custom_adminbar.toggleClass('minimize');
            }, 200);
        });

         $(".asimplebackend-admin-bar-menu-instruction span", custom_adminbar).tooltip({
             tooltipClass: 'asimplebackend-tooltip',
             position: {
                 at: "right top",
                 my: "right top",
                 collision: "flipfit flipfit"
             },
             hide: false,
             show: false,
             open: function(event, ui) {
                 ui.tooltip.css({
                     top: parseFloat(ui.tooltip.css('top')) - ui.tooltip.outerHeight()
                 });
             },
             close: function(event, ui) {
                 //ensure class is removed
                 $(".asimplebackend-admin-bar-menu-instruction", custom_adminbar).removeClass('asimplebackend-tooltip-open');
             }
         }).unbind('mouseover');

        $(".asimplebackend-admin-bar-menu-instruction", custom_adminbar).each(function() {
            var that = $(this);

            that.click(function(e) {
                e.stopPropagation();
                e.preventDefault();
            }).on(window.interact.touchEnd, function(e) {
                var that = $(this);
                var tooltip = $("span", that);

                if(that.hasClass('asimplebackend-tooltip-open')) {
                    tooltip.tooltip('close');
                } else {
                    that.addClass('asimplebackend-tooltip-open');
                    tooltip.tooltip('open');
                }
            });
        });
    });
})(jQuery);