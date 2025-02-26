(function ($) {
"use strict";

    var MaanAddonsGlobal = function ($scope, $) {

        // Js Start
        $('[data-background]').each(function() {
            $(this).css('background-image', 'url('+ $(this).attr('data-background') + ')');
        });
        // Js End

    };

    $(window).on('elementor/frontend/init', function () {
        if (elementorFrontend.isEditMode()) {
            elementorFrontend.hooks.addAction('frontend/element_ready/global', MaanAddonsGlobal);
            //elementorFrontend.hooks.addAction('frontend/element_ready/mann_addons_service.default', Services);
        }
        else {
            elementorFrontend.hooks.addAction('frontend/element_ready/global', MaanAddonsGlobal);
            //elementorFrontend.hooks.addAction('frontend/element_ready/mann_addons_service.default', Services);
        }
    });
})(jQuery);