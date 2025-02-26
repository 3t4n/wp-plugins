(function ($) {
    'use strict';

    $(function () {
        $("#ad-ink-admin [ads-txt-modal-button]").click(function () {
            $("#ad-ink-admin [ads-txt-modal]").removeClass("hidden");
        });
        $("#ad-ink-admin [ads-txt-modal] [ads-txt-modal-close]").click(function () {
            $("#ad-ink-admin [ads-txt-modal]").addClass("hidden");
        });
    });
})(jQuery);