(function ($) {
    'use strict';

    $(function () {

        if ($("#ad-ink-admin #auth").length > 0) {

            $("#ad-ink-admin [register-handler]").click(function () {
                $("#ad-ink-admin [login-section]").addClass("hidden");
                $("#ad-ink-admin [register-section]").removeClass("hidden");
            })
            $("#ad-ink-admin [login-handler]").click(function () {
                $("#ad-ink-admin [login-section]").removeClass("hidden");
                $("#ad-ink-admin [register-section]").addClass("hidden");
            })
        }

    });
})(jQuery);