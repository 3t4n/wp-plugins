jQuery(document).ready(function($) {
    $('#bdcourier-search-form').on('submit', function(e) {
        e.preventDefault();
        
        var phone = $('#phone').val();
        var button = $(this).find('button');

        // Validate that the phone number is 11 digits and numeric
        if (!/^\d{11}$/.test(phone)) {
            alert('Please enter a valid 11-digit phone number.');
            return; // Stop the form from submitting
        }

        button.prop('disabled', true).text('Searching...');

        $.ajax({
            url: bdcourierSearchAjax.ajaxurl, // Using localized ajaxurl
            type: 'POST',
            data: {
                action: 'search_courier_data',
                phone: phone,
                nonce: bdcourierSearchAjax.nonce // Correctly passing nonce as 'nonce'
            },
            success: function(response) {
                if (response.success) {
                    $('#courier-search-result').html(response.data.table);
                } else {
                    alert('Error: ' + response.data);
                }
                button.prop('disabled', false).text('Search');
            },
            error: function(xhr, status, error) {
                alert('Ajax error: ' + error);
                button.prop('disabled', false).text('Search');
            }
        });
    });
});
