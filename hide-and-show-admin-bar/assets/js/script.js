(function ($) {
    $(document).ready(function () {

    	$("#wpadminbar").addClass("move-hsabar");

        $("html").addClass("html-margin-top");

        $("#wpadminbar").append('<div id="hsabar" class="dashicons dashicons-arrow-up"></div>');

        $("#wpadminbar #hsabar").on("click", function () {

            $("#wpadminbar").toggleClass("move-hsabar");

            $("html").toggleClass("html-margin-top");

            $(this).toggleClass("dashicons-arrow-up dashicons-arrow-down");

        });

    });
})(jQuery);
