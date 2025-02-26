jQuery(document).ready(function($) {
    // Open modal on button click
    $('.view-shipment-btn').on('click', function(e) {
        e.preventDefault();
        console.log('order-clicked');
        let orderId = $(this).data('order-id');
        
        // AJAX call to fetch shipment data
        $.ajax({
            url: shipmentModalData.ajax_url,
            type: 'POST',
            data: {
                action: 'fetch_shipment_data',
                order_id: orderId,
                security: shipmentModalData.nonce,
            },
            success: function(response) {
        
                if (response.success) {
                    console.log(response.data);
                    $('#shipment-order-number').text(response.data.order_number);
                    $('#shipment-internal-id').text(response.data.internal_id);
                    $('#shipment-price').text(response.data.price);
                    $('#shipment-weight').text(response.data.weight);
                    $('#shipment-service-type').text(response.data.service_type);
                    $('#shipment-item-value').text(response.data.item_value);
                    $('#shipment-tracking-number').text(response.data.tracking_number);
                    $('#shipment-service').text(response.data.service);
                    $('#shipment-carrier').text(response.data.carrier);
                    $('#shipment-carrier-tracking-number').text(response.data.carrier_tracking_number);
                    $('#shipment-tracking-url').attr('href', response.data.tracking_url);

                    if (response.data.pdf_url) {
                        $('#shipment-pdf-link').attr('href', response.data.pdf_url).show();
                    } else {
                        $('#shipment-pdf-link').hide();
                    }

                    $('#shipment-modal').fadeIn();
                } else {
                    alert(response.data || 'Could not retrieve shipment details.');
                }
            }
        });
    });

    // Close modal when 'x' is clicked
    $('.close-modal').on('click', function() {
        $('#shipment-modal').fadeOut();
    });

    // Close modal on outside click
    $(window).on('click', function(e) {
        if ($(e.target).is('#shipment-modal')) {
            $('#shipment-modal').fadeOut();
        }
    });
});
