jQuery(function ($) {
    $(document).on('keyup', '#limit_woo_max_qty', function () {
        const regex = new RegExp('[^\\-0-9%\\.]+', 'gi');
        const error = 'i18n_decimal_error';

        const value = $(this).val();
        const newValue = value.replace(regex, '');

        if (value !== newValue) {
            $(document.body).triggerHandler('wc_add_error_tip', [$(this), error]);
        } else {
            $(document.body).triggerHandler('wc_remove_error_tip', [$(this), error]);
        }
    });
});
