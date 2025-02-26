jQuery(document).ready(function($) {
    function updateApiUrlField() {
        var environment = $('#woocommerce_dime_payment_environment').val();
        var apiUrlField = $('#woocommerce_dime_payment_api_url');
        var apiUrl = '';

        switch (environment) {
            case 'production':
                apiUrl = 'https://api.dimepay.app/api/v1/order/wordpress';
                break;
            case 'staging':
                apiUrl = 'https://dev.backend.dimepay.app/api/v1/order/wordpress';
                break;
            case 'development':
                apiUrl = 'http://localhost:2025/api/v1/order/wordpress';
                break;
            default:
                apiUrl = '';
                break;
        }

        apiUrlField.val(apiUrl); // Update the API URL field value
    }

    // Initial update
    updateApiUrlField();

    // Update on environment change
    $(document).on('change', '#woocommerce_dime_payment_environment', function() {
        updateApiUrlField();
    });
});

