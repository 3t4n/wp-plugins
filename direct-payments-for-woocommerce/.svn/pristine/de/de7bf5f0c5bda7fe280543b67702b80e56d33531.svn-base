jQuery(function($) {
    let orderCreated = false;
    let createdOrderId = null; // Store the order ID

    $(document.body).on('click', '#place_order', function(e) {

        if ($('input[name="payment_method"]:checked').val() === 'digages_direct_payments' && !orderCreated) {
 
            
            e.preventDefault();
            e.stopImmediatePropagation();

            showLoading();

            $.ajax({
                type: 'POST',
                url: wc_checkout_params.checkout_url,
                data: $('form.checkout').serialize() + '&order_status=wc-checkout-draft',
                dataType: 'json',
                success: function(result) {

                    if (result.result === 'success') {
                        createdOrderId = result.order_id;  // Capture the created order ID

                    // Get the form data for the billing details
                    var billingFirstName = $('input[name="billing_first_name"]').val();
                    var billingLastName = $('input[name="billing_last_name"]').val();
                    var billingEmail = $('input[name="billing_email"]').val();

                    // Update the placeholders with the billing details
                    $('.tumaz_displayFirstName').text(billingFirstName);
                    $('.tumaz_displayLastName').text(billingLastName);
                    $('.tumaz_displayEmail').text(billingEmail);

                    
                        // Update the order number in the HTML dynamically
                        $('.orderNumberDisplay').text(createdOrderId);

                        orderCreated = true;

                        // Wait 3 seconds before showing the modal
                        setTimeout(function() {
                            hideLoading();
                            showModal(createdOrderId);  // Pass order ID to the modal
                        }, 3000);
                    } else {

                        hideLoading();
                        if (result.messages) {
                            $(".woocommerce-error, .woocommerce-message").remove();
                            $('form.checkout').prepend(result.messages);
                        }
                        $('form.checkout').removeClass('processing').unblock();
                        $('form.checkout').find('.input-text, select, input:checkbox').trigger('validate').blur();
                        $(document.body).trigger('checkout_error');
                    }
                },
                error: function(xhr, status, error) {
                    hideLoading();
                    $('form.checkout').removeClass('processing').unblock();
                    $(document.body).trigger('checkout_error');
                }
            });
        }
    });

    function showModal(orderId) {

        $('#exampleModal').modal('show');
    }

    function showLoading() {

        $('body').append('<div id="loading-overlay" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(255,255,255,0.8); display: flex; justify-content: center; align-items: center; z-index: 9999;"><div><i class="bi bi-hourglass-split"></i></div></div>');
    }

    function hideLoading() {
        $('#loading-overlay').remove();
    }

    // Confirm button logic for modal
    $('#confirmOrder').on('click', function () {

        $('#exampleModal').modal('hide');
        if (orderCreated) {

            window.location = wc_checkout_params.checkout_url + '?order-received=' + createdOrderId;
        } else {

            
        }
    });

    $('#exampleModal').on('hidden.bs.modal', function () {

        if (!orderCreated) {

            $('form.checkout').removeClass('processing').unblock();
        }
    });

    $(document.body).on('checkout_error', function () {

        orderCreated = false;
    });

    // Debug: Log when payment method changes
    $('form.checkout').on('change', 'input[name="payment_method"]', function() {

    });

});