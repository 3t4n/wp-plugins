/*
 * Quick view product
 */

; (function ($) {
    "use strict";

    $(document).on('click', '.spcquickview', function (event) {
        event.preventDefault();

        var $this = $(this);
        var productID = $this.data('product-id');

        $('.spc-modal-quickview-body').html(''); /*clear content*/
        $('#spc-viewmodal').addClass('spcquickview-open wlloading');
        $('#spc-viewmodal .spc-close-btn').hide();
        $('.spc-modal-quickview-body').html('<div class="spc-loading"><div class="wlds-css"><div style="width:100%;height:100%" class="wlds-ripple"><div></div><div></div></div>');

        var data = {
            id: productID,
            action: "spc_quickview",
        };
        $.ajax({
            url: spc_localize_ajax.ajax_url,
            data: data,
            method: 'POST',
            beforeSend: function () {
                $('#spc-viewmodal').find('.spc-modal-loading').addClass('active');
            },
            success: function (response) {
                setTimeout(function () {
                    $('.spc-modal-quickview-body').html(response);
                    $('#spc-viewmodal .spc-close-btn').show();
                }, 300);

            },
            complete: function () {
                $('#spc-viewmodal').find('.spc-modal-loading').removeClass('active');
                $('#spc-viewmodal').removeClass('wlloading');
                $('.spc-modal-quickview-dialog').css("background-color", "#ffffff");
            },
            error: function (xhr) {
                console.log("Quick View Not Loaded" + xhr.statusText + xhr.responseText);
            },

        });

    });
    $('.spc-close-btn').on('click', function (event) {
        $('#spc-viewmodal').removeClass('spcquickview-open');
        $('body').removeClass('spcquickview');
        $('.spc-modal-quickview-dialog').css("background-color", "transparent");
    });

})(jQuery);