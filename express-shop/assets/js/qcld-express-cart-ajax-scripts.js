(function($) {
    'use strict';

    jQuery(document).ready(function() {

        // Added to cart JS
        $(document.body).on('added_to_cart', function() {            
            
            $('#qcld-express-toggler').addClass( 'hascart' );

            if(qcld_express_cart_mode == 'wooinstants'){
            
                if ( wiCartTotal > 0 ) {
                    $('#qcld-express-toggler').addClass( 'hascart');
                } else {
                    $('#qcld-express-toggler').removeClass( 'hascart' );
                } 
            } 
            
            // Update Cart on added to card
            jQuery("[name='update_cart']").removeAttr('disabled');
            jQuery('[name="update_cart"]').trigger( 'click' );
        });

        // Update cart total JS
        $(document.body).on('updated_cart_totals', function() {
            jQuery('.woocommerce-cart-form:not(:last)').remove();
            jQuery('.cart_totals:not(:last)').remove();

        });

        // Applied Coupon JS
        $(document.body).on('applied_coupon', function() {
            setTimeout(
                function() {
                    jQuery('.woocommerce-cart-form:not(:last)').remove();
                }, 1000);
        });

        // Remove Coupon JS
        $(document.body).on('removed_coupon', function() {
            jQuery('.woocommerce-cart-form:not(:last)').remove();
        });

        // Update shipping method JS
        $(document.body).on('updated_shipping_method', function() {
            jQuery('.woocommerce-cart-form:not(:last)').remove();
        });

        // Checkout area toggle JS
        $(document).on('click', '#qcld-express-cart-area .checkout-button', function(e) {
            e.preventDefault();

            jQuery('#qcld-express-cart-area').fadeOut();
            jQuery('#qcld-express-checkout-area').fadeIn();


            // Update checkout on country changing JS
            $('#billing_country, #shipping_country, .country_to_state, .state_select').select2({
                width: '100%'               
            });
        });

        // Back to cart from checkout JS
        $(document).on('click', '#back_to_cart', function() {
            jQuery('#qcld-express-cart-area').fadeIn();
            jQuery('#qcld-express-checkout-area').fadeOut();
        });

        // Update checkout on country changing JS
        $(document).on('change', '#billing_country, #shipping_country, .country_to_state', function() {
            jQuery(document.body).trigger('update_checkout');
        });

        // Payment method clicking JS
        $(document).on('click', '.payment_methods input.input-radio', function() {

            if ($('.payment_methods input.input-radio').length > 1) {
                var target_payment_box = $('div.payment_box.' + $(this).attr('ID')),
                    is_checked = $(this).is(':checked');

                if (is_checked && !target_payment_box.is(':visible')) {
                    $('div.payment_box').filter(':visible').slideUp(230);

                    if (is_checked) {
                        target_payment_box.slideDown(230);
                    }
                }

            } else {
                $('div.payment_box').show();
            }

            if ($(this).data('order_button_text')) {
                $('#place_order').text($(this).data('order_button_text'));
            } else {
                $('#place_order').text($('#place_order').data('value'));
            }

        });

        $(document).on('change', '#ship-to-different-address input', function() {
            jQuery(document.body).trigger('update_checkout');

            $('.shipping_address').hide();
            if ($(this).is(':checked')) {
                $('.shipping_address').slideDown();
            }
        });

        // Single Product Ajax Cart
        $(document).on('click', '.single_add_to_cart_button:not(.disabled)', function (e) {
            e.preventDefault();

            var $thisbutton = $(this),
                $form = $thisbutton.closest('form.cart'),
                id = $thisbutton.val(),
                product_qty = $form.find('input[name=quantity]').val() || 1,
                product_id = $form.find('input[name=product_id]').val() || id,
                variation_id = $form.find('input[name=variation_id]').val() || 0;

            var data = {
                action: 'qcld_express_single_ajax_add_to_cart',
                product_id: product_id,
                product_sku: '',
                quantity: product_qty,
                variation_id: variation_id,
                security: qcld_express_security_nonce
            };

            $(document.body).trigger('adding_to_cart', [$thisbutton, data]);

            $.ajax({
                type: 'post',
                url: ajaxurl,
                data: data,
                beforeSend: function (response) {
                    $thisbutton.removeClass('added').addClass('loading');
                },
                complete: function (response) {
                    $thisbutton.addClass('added').removeClass('loading');
                },
                success: function (response) {
                    if (response.error & response.product_url) {
                        window.location = response.product_url;
                        return;
                    } else {
                        $(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash, $thisbutton]);
                    }
                },
            });

            return false;
        });


        $('.wc-variation-selection-needed').click(function(){
            $(this).prop('disabled', true);
        });



        $(document).on("click", ".product-remove a, input[name=update_cart], body", function (e) {

                if(qcld_express_cart_mode == 'wooinstants'){
                    setTimeout(function () {

                        var data = {
                            action: 'qcld_express_car_count_update',
                            security: qcld_express_security_nonce
                        };

                        $.ajax({
                            type: 'post',
                            url: ajaxurl,
                            data: data,
                            beforeSend: function (response) {
                            },
                            complete: function (response) {
                            },
                            success: function (response) {
                                
                                //console.log(response );

                                $('.qcld_express_cart_total').text(response);
                                //jQuery("[name='update_cart']").removeAttr('disabled');
                                //jQuery('[name="update_cart"]').trigger('click');
                            },
                        });

                        return false;

                    }, 3000);
                    
                }


        });



    });
    
})(jQuery);

