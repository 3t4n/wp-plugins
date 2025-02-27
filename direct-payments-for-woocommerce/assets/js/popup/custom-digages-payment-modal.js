jQuery(document).ready(function ($) {
    let formSubmitted = false;

    // Use the localized bank_transfer_details data 
    let bank_transfer_details = window.bank_transfer_details.accounts || [];

    // Intercept the "Place Order" button click
    $(document).on('click', '#place_order', function (e) {
        if ($('input[name="payment_method"]:checked').val() === 'digages_direct_payments' && !formSubmitted) {
            e.preventDefault(); // Prevent default submission
            e.stopImmediatePropagation(); // Stop other WooCommerce event handlers

            // Populate modal with selected bank account details
            let tableBody = $('#bank-account-table-body');
            tableBody.empty(); // Clear previous data

            if (bank_transfer_details.length > 0) {
                // Add bank account details to the table
                bank_transfer_details.forEach(function (account) {
                    tableBody.append(
                        '<tr>' +
                        '<td>' + account.bank_name + '</td>' +
                        '<td>' + account.account_name + '</td>' +
                        '<td>' + account.account_number + '</td>' +
                        '<td>' + account.sort_code + '</td>' +
                        '<td>' + account.iban + '</td>' +
                        '<td>' + account.bic_swift + '</td>' +
                        '</tr>'
                    );
                });
            } else {
                tableBody.append('<tr><td colspan="6">No enabled bank accounts available.</td></tr>');
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
