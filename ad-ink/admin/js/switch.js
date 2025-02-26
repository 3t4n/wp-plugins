(function ($) {
    'use strict';

    $(function () {
        $('#ad-ink-admin [switch]').click(function () {
            $(this).toggleClass("active");
            var val = parseInt($(this).find("[switch-input]").val());
            $(this).find("[switch-input]").val(val === 1 ? 0 : 1).trigger('change');
        });
    });
})(jQuery);