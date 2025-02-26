jQuery(document).ready(function($) {

    $("body").on("click",".order-summary-toggle__text--show", function() {
        $('.order-summary-toggle__text--hide').removeClass('order-summary-toggle__text--hide').addClass('order-summary-toggle__text--show');
        $(this).removeClass('order-summary-toggle__text--show').addClass('order-summary-toggle__text--hide');

        if($('.order-summary').hasClass('order-summary--is-collapsed')) {
            $('.order-summary').removeClass('order-summary--is-collapsed').addClass('order-summary--is-expanded');
        } else {
            $('.order-summary').addClass('order-summary--is-collapsed').removeClass('order-summary--is-expanded');
        }
    });

    $("body").on("click",".change-first-page", function() {
        $('.breadcrumb__item').removeClass('breadcrumb__item--current');
        $('.breadcrumb__item.one').addClass('breadcrumb__item--current');
        $('.main__content .step').hide();
        $('#contact_information').show();
    });
    $("body").on("click",".change-two-page", function() {
        $('.breadcrumb__item').removeClass('breadcrumb__item--current');
        $('.breadcrumb__item.two').addClass('breadcrumb__item--current');
        $('.main__content .step').hide();
        $('#shipping_method').show();
    });
    $("body").on("click",".change-three-page", function() {
        $('.breadcrumb__item').removeClass('breadcrumb__item--current');
        $('.breadcrumb__item.three').addClass('breadcrumb__item--current');
        $('.main__content .step').hide();
        $('#select_payment_method').show();
    });

    $("body").on("change", 'input[name="different_billing_address"]', function() {
        if($(this).val() == 'true' && !$('#ship-to-different-address-checkbox').is(':checked')) {
            $('#ship-to-different-address-checkbox').trigger("click");
        } else if($('#ship-to-different-address-checkbox').is(':checked')) {
            $('#ship-to-different-address-checkbox').trigger("click");
        }
    });


    if($('#billing_phone').length) {
        $("img").each(function(index) {
            if($(this).attr('alt') === 'WAAVE Compliance') {
                $(this).remove();
            }
        });
        setInterval(function () {
            if($('#checkout_email').val().length === 0) {
                $('#checkout_email').val($('#billing_email').val());
            }
            $('#billing_email').val($('#checkout_email').val());
            $('#email-method').html($('#checkout_email').val());
            $('#email-method-2').html($('#checkout_email').val());
            var full_address = $('#billing_address_1').val()+', '+$('#billing_city').val()+' '+$('#billing_postcode').val()+', '+$('#billing_country').val();
            $('#total-address').html(full_address);
            $('#total-address-2').html(full_address);

            $('#shipping-fields-here').html($('#customer_details .woocommerce-shipping-fields').html());
            $('#customer_details .woocommerce-shipping-fields').remove();

            if($('#billing-same-as-shipping').is(':checked')) {
                $('#shipping_first_name').val($('#billing_first_name').val());
                $('#shipping_last_name').val($('#billing_last_name').val());
                $('#shipping_address_1').val($('#billing_address_1').val());
                $('#shipping_city').val($('#billing_city').val());
                $('#shipping_state').val($('#billing_state').val());
                $('#shipping_postcode').val($('#billing_postcode').val());
                $('#shipping_phone').val($('#billing_phone').val());
            }

            $("#select-method-shipping .content-box__row").each(function( index ) {
                if($("#select-method-shipping .content-box__row").length > 1) {
                    if($(this).find('input').is(':checked')) {
                        var pay_method = $(this).find('input').closest('.radio-wrapper').find('.radio__label__primary').html();
                        $('#selected-payment-method').html(pay_method);
                    }
                } else {
                    var pay_method = $(this).find('.radio__label__primary').html();
                    $('#selected-payment-method').html(pay_method);
                }
            });
        }, 1000);
    }
});