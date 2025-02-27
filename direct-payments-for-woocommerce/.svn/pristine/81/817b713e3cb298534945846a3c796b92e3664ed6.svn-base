jQuery(function ($) {
    let orderCreated = false;
    let createdOrderId = null; // Store the order ID

    /**
     * Function to populate a select dropdown with data
     */
// Declare in the global scope
window.populateSelect = function (id, data) {
    const $select = jQuery(id);
    $select.empty(); // Clear previous options to prevent duplication

    // Append options from the data records
    data.forEach((record) => {
        $select.append(new Option(record.name, record.id));
    });

    // Auto-select the first valid option
    if (data.length > 0) {
        $select.prop('selectedIndex', 0);
        $select.trigger('change');
    } else {
        $select.append(new Option('No options available', ''));
    }
};


    /**
     * Function to populate a container with records
     */
    function populateRecords(id, data) {
        const $container = $(id);
        $container.empty();
        if (data.length > 0) {
            const firstRecord = data[0];
            $container.append(`<p>${firstRecord.details}</p>`);
        }
    }

    /**
     * Function to update record details dynamically on dropdown change
     */
    function showRecordDetails(selectId, containerId, data) {
        $(selectId).on('change', function () {
            const selectedId = $(this).val();
            const selectedOption = data.find((r) => r.id == selectedId);
            $(containerId).html(`<p>${selectedOption ? selectedOption.details : 'No details available'}</p>`);
        });
    }

    /**
     * Function to fetch payment methods via AJAX
     */
    function fetchData(callback) {
        $.ajax({
            url: ajax_object.ajaxurl,
            method: 'POST',
            data: {
                action: 'digages_fetch_payment_methods',
                nonce: ajax_object.nonce,
            },
            success: function (response) {
                //console.log('Fetch data loaded now');
                if (response.success) {
                    const records = response.data; 
                     
                    // Populate bank transfer details 
                     // Store data globally
                    
                // Save data globally for Step 4
                window.bankTransfersData = records.bankTransfers;
                window.mobileMoneyData = records.mobileMoney;
                window.cryptoMoneyData = records.cryptoMoney;
                window.p2pPaymentsData = records.p2pPayments;


                    // Populate bank transfer details
                    populateSelect('#bankTransferSelect', records.bankTransfers);
                    populateRecords('#bankTransferRecords', records.bankTransfers);
                    showRecordDetails('#bankTransferSelect', '#bankTransferRecords', records.bankTransfers);

                    // Populate mobile money details
                    populateSelect('#mobileMoneySelect', records.mobileMoney);
                    populateRecords('#mobileMoneyRecords', records.mobileMoney);
                    showRecordDetails('#mobileMoneySelect', '#mobileMoneyRecords', records.mobileMoney);

                    // Populate crypto money details
                    populateSelect('#cryptoMoneySelect', records.cryptoMoney);
                    populateRecords('#cryptoMoneyRecords', records.cryptoMoney);
                    showRecordDetails('#cryptoMoneySelect', '#cryptoMoneyRecords', records.cryptoMoney);

                    // Populate P2P payment details
                    populateSelect('#p2pSelect', records.p2pPayments);
                    populateRecords('#p2pRecords', records.p2pPayments);
                    showRecordDetails('#p2pSelect', '#p2pRecords', records.p2pPayments);

                    // Call the callback function after data is fully loaded
                    if (typeof callback === 'function') {
                        callback();
                    }
                }
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error:', error, xhr.responseText);
            },
        });
    }

    

    /**
     * Function to display the modal after fetching data
     */
    function showModal(orderId) {
        //console.log('Fetching data for Order ID:', orderId);
        fetchData(function () {
           // console.log('Data loaded. Displaying modal...');
            $('#exampleModal').modal('show'); // Show the modal after data is ready
            $('.orderNumberDisplay').text(orderId); // Update modal with order ID
        });
    }

    /**
     * Logic for handling order creation and displaying the modal
     */
    $(document.body).on('click', '#place_order', function (e) {
        if ($('input[name="payment_method"]:checked').val() === 'digages_direct_payments' && !orderCreated) {
            e.preventDefault();
            e.stopImmediatePropagation();

            showLoading();

            digagesaddzindex();
            $.ajax({
                type: 'POST',
                url: wc_checkout_params.checkout_url,
                data: $('form.checkout').serialize() + '&order_status=wc-checkout-draft',
                dataType: 'json',
                success: function (result) {
                    if (result.result === 'success') {
                        createdOrderId = result.order_id; // Capture the created order ID 

                    // Get the form data for the billing details
                    var billingFirstName = $('input[name="billing_first_name"]').val();
                    var billingLastName = $('input[name="billing_last_name"]').val();
                    var billingEmail = $('input[name="billing_email"]').val();

                    // Update the placeholders with the billing details
                    $('.tumaz_displayFirstName').text(billingFirstName);
                    $('.tumaz_displayLastName').text(billingLastName);
                    $('.tumaz_displayEmail').text(billingEmail); 

                        $('.orderNumberDisplay').text(createdOrderId); // Update the HTML with the order ID
                        

                        orderCreated = true;

                        // Wait 3 seconds before showing the modal
                        setTimeout(function () {
                            hideLoading();
                            showModal(createdOrderId); // Call showModal with the order ID
                        }, 3000);
                    } else {
                        hideLoading();
                        if (result.messages) {
                            $(".woocommerce-error, .woocommerce-message").remove();
                            $('form.checkout').prepend(result.messages);
                        }
                        $('form.checkout').removeClass('processing').unblock();
                        $('form.checkout')
                            .find('.input-text, select, input:checkbox')
                            .trigger('validate')
                            .blur();
                        $(document.body).trigger('checkout_error');
                    }
                },
                error: function (xhr, status, error) {
                    hideLoading();
                    $('form.checkout').removeClass('processing').unblock();
                    $(document.body).trigger('checkout_error');
                },
            });
        }
    });

    function showLoading() {
        $('body').append('<div id="loading-overlay" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(255,255,255,0.8); display: flex; justify-content: center; align-items: center; z-index: 9999;"><div><img src="' + loadersvg.svgPath + '" width="30px" height="30px" /></div></div>');
    }

    function hideLoading() {
        $('#loading-overlay').remove();
    }
    

    function digagesaddzindex()
    { 
                $('#hw-footer').attr('style', 'z-index:-10 !important;'); 
                $('hw-header').attr('style', 'z-index:-10 !important;');
                $('header[class*="hw-bar"]').attr('style', 'z-index:-10 !important;');  
    }
});
