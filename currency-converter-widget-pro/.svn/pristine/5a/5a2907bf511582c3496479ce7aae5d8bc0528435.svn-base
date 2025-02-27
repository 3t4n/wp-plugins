/**
 * Admin code for dismissing notifications.
 *
 */
/**
 * @version 1.0.7
 */
(function ($) {
    'use strict';
    $(function () {
        $('#currency-converter-widget-pro-notice').on('click', '.notice-dismiss', function() {
            $.ajax({
                url: currencyConverterWidgetProWidgetAjax.ajaxurl,
                type: 'post',
                data: {
                    action: 'CCWP_admin_hide_notice',
                    security: currencyConverterWidgetProWidgetAjax.nonce
                },
                success: function(response) {
                    console.log(response);
                }
            });
        });
    });
  })(jQuery);
  