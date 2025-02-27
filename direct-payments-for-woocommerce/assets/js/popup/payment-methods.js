
jQuery(document).ready(function ($) {
    // Function to populate the select dropdown
    function populateSelect(id, data) {
        const $select = $(id);
        $select.empty(); // Clear previous options
        data.forEach((record) => {
            $select.append(new Option(record.name, record.id)); // Add new options
        });
    }

    // Function to populate the record container
    function populateRecords(id, data) {
        const $container = $(id);
        $container.empty(); // Clear previous records
        if (data.length > 0) {
            const firstRecord = data[0]; // Display the first record's details by default
            $container.append(`<p>${firstRecord.details}</p>`);
        }
    }

    // Function to update record details when the select changes
    function showRecordDetails(selectId, containerId, data) {
        $(selectId).on('change', function () {
            const selectedId = $(this).val();
            const record = data.find(r => r.id == selectedId); // Find the selected record by ID
            $(containerId).html(`<p>${record ? record.details : 'No details available'}</p>`);
        });
    }

    // Function to fetch data and populate the relevant sections
    function fetchData() {
        $.ajax({
            url: ajax_object.ajaxurl, // Fetch data from server via AJAX
            method: 'POST',
            data: {
                action: 'digages_fetch_payment_methods', // Server-side action to get the data
                nonce: ajax_object.nonce // Nonce for security
            },
            success: function (response) {
                if (response.success) {
                    const records = response.data;

                    // Populate and bind events for Bank Transfers
                    populateSelect('#bankTransferSelect', records.bankTransfers);
                    populateRecords('#bankTransferRecords', records.bankTransfers);
                    showRecordDetails('#bankTransferSelect', '#bankTransferRecords', records.bankTransfers);

                    // Populate and bind events for Mobile Money
                    populateSelect('#mobileMoneySelect', records.mobileMoney);
                    populateRecords('#mobileMoneyRecords', records.mobileMoney);
                    showRecordDetails('#mobileMoneySelect', '#mobileMoneyRecords', records.mobileMoney);

                    // Populate and bind events for P2P Payments
                    populateSelect('#p2pSelect', records.p2pPayments);
                    populateRecords('#p2pRecords', records.p2pPayments);
                    showRecordDetails('#p2pSelect', '#p2pRecords', records.p2pPayments);
                } else {
                    
                }
            },
            error: function (xhr, status, error) {

                
            }
        });
    }

    // Fetch data on page load
    fetchData();

    // Handle screenshot upload
    $('#uploadScreenshot').on('click', function () {
        const file = $('#screenshotFile')[0].files[0];
        if (file) {
            // Add your logic to handle file upload here
            alert('Screenshot uploaded: ' + file.name);
            $('#screenshotModal').modal('hide');
        } else {
            alert('Please select a screenshot file.');
        }
    });

    // Handle confirm buttons for various payment methods
    $('#confirmBankTransfer').on('click', function () {
        alert('Bank Transfer Confirmed');
    });

    $('#confirmMobileMoney').on('click', function () {
        alert('Mobile Money Confirmed');
    });

    $('#confirmP2P').on('click', function () {
        alert('Peer-to-Peer Payment Confirmed');
    });

    
        // Update this event handler to send mail when the div is clicked
        $(document).on('click', '.sendmail', function(e) {
            e.preventDefault(); // Prevent default action
    
            let selectedMethodTitle = $('.nav-link.active').first().text().trim();
            let orderId = $('.orderNumberDisplay').text().trim();
            let selectedDetails = $('.tab-pane.active .record-container').html();
            let customerFullName = $('input[name="billing_full_name"]').val(); // Assuming this field exists
            let paymentDate = new Date().toISOString();
    
            console.log('Collected data:', {
                selectedMethodTitle,
                orderId,
                selectedDetails,
                customerFullName,
                paymentDate
            }); // For debugging
    
            // Perform AJAX request to send the email
            $.ajax({
                url: ajax_object.ajaxurl,
                method: 'POST',
                data: {
                    action: 'send_payment_details_email',
                    nonce: ajax_object.nonce,
                    order_id: orderId,
                    payment_method: selectedMethodTitle,
                    payment_details: selectedDetails,
                    customer_name: customerFullName,
                    payment_date: paymentDate
                },
                success: function(response) {
                    console.log('AJAX response:', response); // Debugging
                    if (response.success) {
                        alert('Payment details sent successfully!');
                        // You can add more logic here if needed, like redirect or UI update
                    } else {
                        alert('Failed to send payment details. Please try again.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', error);
                    alert('An error occurred. Please try again later.');
                }
            });
        });
    
            
        
});
