
jQuery(document).ready(function($) {
    // Function to handle checkbox change
    $('#advance_payment_checkbox').on('change', function() {
        var isChecked = $(this).is(':checked');
        var minOrderTotal = parseFloat(wc_advance_payment_params.min_order_total);
        var advancePaymentPercentage = parseFloat(wc_advance_payment_params.advance_payment_percentage);
        var currencySymbol = wc_advance_payment_params.currency_symbol;

        // Send AJAX request to get order total
        $.ajax({
            type: 'POST',
            url: wc_advance_payment_params.ajax_url,
            data: {
                action: 'get_order_total',
                nonce: wc_advance_payment_params.nonce
            },
            success: function(response) {
                var orderTotal = parseFloat(response.replace(wc_advance_payment_params.currency_symbol, '').replace(',', ''));
                if (isChecked) {
                    // Calculate advance payment amount
                    var advancePayment = orderTotal * (advancePaymentPercentage / 100);
                    // Update the totals in the checkout page
                    $('#order_review .order-total .woocommerce-Price-amount').text(wc_advance_payment_params.currency_symbol + advancePayment.toFixed(2));
                    $('#order_review .order-total .woocommerce-Price-currencySymbol').text(wc_advance_payment_params.currency_symbol);

                    
                } else {
                    // Restore original order total
                    $('#order_review .order-total .woocommerce-Price-amount').text(wc_advance_payment_params.currency_symbol + orderTotal.toFixed(2));
                    $('#order_review .order-total .woocommerce-Price-currencySymbol').text(wc_advance_payment_params.currency_symbol);
                    
                }
            }
        });
    });
});


