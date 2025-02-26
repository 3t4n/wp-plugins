jQuery(document).ready(function ($) {
    $("#billing_city").on("change", function () {
        $("body").trigger("update_checkout");
    });

    (function ($) {
        $("form.checkout").on(
            "change",
            'input[name^="payment_method"]',
            function () {
                $("body").trigger("update_checkout");
            }
        );
    })(jQuery);
});
