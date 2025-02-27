jQuery(document).ready(function ($) {
    let formSubmitted = false;

    // Use the localized p2p_transfer_details data 
    let p2p_transfer_details = window.p2p_transfer_details.accounts || [];

    // Intercept the "Place Order" button click
    $(document).on('click', '#place_order', function (e) {
        if ($('input[name="payment_method"]:checked').val() === 'digages_direct_payments' && !formSubmitted) {
            e.preventDefault(); // Prevent default submission
            e.stopImmediatePropagation(); // Stop other WooCommerce event handlers

            // Populate modal with selected p2p account details
            let tableBody = $('#p2p-account-table-body');
            tableBody.empty(); // Clear previous data

            if (p2p_transfer_details.length > 0) {
                // Add p2p account details to the table
                p2p_transfer_details.forEach(function (account) {
                    tableBody.append(
                        '<tr>' +
                        '<td>' + account.p2p_name + '</td>' +
                        '<td>' + account.account_name + '</td>' +
                        '<td>' + account.p2p_id + '</td>' +
                        '<td>' + account.p2p_idtype + '</td>' + 
                        '</tr>'
                    );
                });
            } else {
                tableBody.append('<tr><td colspan="6">No enabled p2p accounts available.</td></tr>');
            }

            // Show the modal
            $('#exampleModal').modal('show');
        }
    });

    // Handle "Confirm Payment" button click in modal
    $('#confirmOrder').on('click', function () {
        formSubmitted = true;
        $('#exampleModal').modal('hide'); // Hide the modal

        // Programmatically trigger form submission after modal confirmation
        $('form.checkout').submit();
    });

    // Reset formSubmitted flag if modal is closed without confirmation
    $('#exampleModal').on('hidden.bs.modal', function () {
        if (!formSubmitted) {
            formSubmitted = false;
        }
    });

    // Reset form submission flag on WooCommerce checkout error
    $(document.body).on('checkout_error', function () {
        formSubmitted = false;
    });
});
