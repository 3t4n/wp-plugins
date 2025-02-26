jQuery(document).ready(function ($) {
    // Show or hide custom amount field when 'Other' is selected
    $('input[name="donation_amount"]').on('change', function () {
        const isOtherSelected = $(this).val() === 'other';
        $('#custom-amount-container').toggle(isOtherSelected);
        if (!isOtherSelected) {
            $('#custom_amount').val(''); // Clear custom amount if not selected
        }
    });

    // Handle form submission
    $('#bkash-donation-form').on('submit', function (e) {
        e.preventDefault();

        const selectedAmount = $('input[name="donation_amount"]:checked').val();
        const amount = selectedAmount === 'other' ? $('#custom_amount').val() : selectedAmount;
        const nonce = $('#donation_nonce').val();

        $('#donation-result').text('Processing...');

        // AJAX request to process the donation
        $.ajax({
            url: adbkp_ajax.ajax_url, // Use the localized ajax_url
            method: 'POST',
            data: {
                action: 'adbkp_process_donation',
                amount: amount,
                donation_nonce: nonce,
            },
            success: function (response) {
                if (response.success) {
                    window.location.href = response.data.redirect_url;
                } else {
                    $('#donation-result').text(response.data.message);
                }
            },
            error: function () {
                $('#donation-result').text('An error occurred. Please try again.');
            },
        });
    });
});
