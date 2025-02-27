

(function($) {
	
	"use strict";



jQuery(function ($) {
    
  
    $('.wps_default_addtocart .cart-btn button').on('click', function (e) {
        e.preventDefault();

        var product_id = $(this).val(); // Use the button value as product_id
        var quantity = $(this).closest('.cart').find('.qty').val(); // Get the quantity from the input field

        // AJAX request to add the item to the cart
        $.ajax({
            type: 'POST',
            url: ajax_add_to_cart_params.ajax_url,
            data: {
                action: 'add_to_cart',
                security: ajax_add_to_cart_params.nonce,
                product_id: product_id,
                quantity: quantity,
            },
            success: function (response) {
                // Display the notice
                showNotice(response);
            },
        });
    });

    // Function to display the notice
    function showNotice(response) {
        var noticeText, thumbnail, itemCount;

        if (response.success) {
            var productName = response.title || 'Your Product';
            noticeText = productName + ' has been added to the cart';
            thumbnail = response.thumbnail || '';
            itemCount = response.itemCount || 1;
        } else {
            noticeText = 'Check the Product Select or Not Available ';
            thumbnail = '';
            itemCount = 0;
        }

        var noticeContent = '<div class="wps_notice_addtocart wps_cart_notice ajax-notice">' +
            '<div class="wps_notice_content">' +
            (thumbnail ? '<div class="wps_cart_thumbnail">' + thumbnail + '</div>' : '') +
            '<div class="wps_add_cart_notice">' +
            '<p class="wps_add_cart_text_notice">' + noticeText + '</p>' +
            '<p class="wps_add_cart_item">Items in Cart: ' + itemCount + '</p>' +
            '<button class="wps_view_cart_notice"><a href="' + ajax_add_to_cart_params.site_url + '/cart">View Cart</a></button>' +
            '<button class="wps_checkout_notice"><a href="' + ajax_add_to_cart_params.site_url + '/checkout">View Checkout</a></button>' +
            '</div>' +
            '</div>' +
            '<button class="close-notice"><i class="eicon-close-circle"></i></button>' +
            '</div>';

        $('body').append(noticeContent);

        // Attach click event to close button
        $('.close-notice').on('click', function () {
            hideNotice();
        });
    }

    // Function to hide the notice
    function hideNotice() {
        $('.ajax-notice').fadeOut('slow', function () {
            $(this).remove();
        });
    }
});


})(window.jQuery);