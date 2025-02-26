; (function ($) {
    "use strict";
    $ = jQuery;

    // woo products js starts
    var wrap = $('.wp-block-spc-woo-product');
    var btn = wrap.find(".spc-woo-product-loadmore-btn")
    var productWrapper = wrap.find(".spc-woo-product-items")

    var btnText = btn.text();
    var attributes = [];
    attributes = btn.data('attributes');
    var page = 2;

    // *************************************
    // Filter
    // *************************************
    $('.spc-product-filters-wrapper li').on('click', function (e) {
        e.preventDefault();

        if ($(this).closest('li').hasClass('filter-item')) {
            let that = $(this),
                parents = that.closest('.spc-product-filters-wrapper .spc-filterable-menu'),
                wrap = that.closest('.spc-woo-product-wrapper');

            parents.find('li').removeClass('filter-active');
            that.addClass('filter-active');

            $.ajax({
                url: spc_localize_ajax.ajax_url,
                type: 'POST',
                data: {
                    action: 'spc_filter_post_grid_callback',
                    taxtype: parents.data('filtertype'),
                    taxonomy: that.data('taxonomy'),
                    blockId: parents.data('blockid'),
                    postId: parents.data('pageid'),

                    nonce: spc_localize_ajax.security
                },
                beforeSend: function () {

                    wrap.addClass('spc-loading-active');

                },
                success: function (data) {

                    wrap.find('.spc-woo-product-items').html(data);
                },
                complete: function () {
                    wrap.removeClass('spc-loading-active');
                },
                error: function (xhr) {
                    console.log('Error occured.please try again' + xhr.statusText + xhr.responseText);
                    wrap.removeClass('spc-loading-active');
                },
            });
        }
    });

})(jQuery)