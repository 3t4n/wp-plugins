(function ($) {
    'use strict';

    $(function () {
        $("#ad-ink-admin [position-wrapper] [position-tabs] [position]").click(function () {
            $("#ad-ink-admin [position-wrapper] [position-tabs] [position]").removeClass("text-green-500 border-green-500");
            $("#ad-ink-admin [position-wrapper] [position-tabs] [position]").addClass("cursor-pointer hover:border-gray-500");
            $(this).removeClass("cursor-pointer hover:border-gray-500");
            $(this).addClass("text-green-500 border-green-500");

            var position = $(this).attr("position");
            $("#ad-ink-admin [position-wrapper] input[name='position']").val(position);
            $("#ad-ink-admin [position-wrapper] [position-content]").addClass("hidden");
            $("#ad-ink-admin [position-wrapper] [position-content='" + position + "']").removeClass("hidden");
        })
    });
})(jQuery);