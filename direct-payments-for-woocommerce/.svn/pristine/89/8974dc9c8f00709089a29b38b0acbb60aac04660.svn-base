// Create this file as js/payment-method-handler.js in your plugin directory
jQuery(document).ready(function($) {
    // When any payment method checkbox is clicked
    $('.payment-method-checkbox').on('change', function() {
        if ($(this).is(':checked')) {
            // Uncheck all other payment method checkboxes
            $('.payment-method-checkbox').not(this).prop('checked', false);
            
            // Trigger the save button to become active (if using WooCommerce settings)
            $('.woocommerce-save-button').prop('disabled', false);
        }
    });

    // Initialize on page load - ensure only one checkbox is checked
    function initializeCheckboxes() {
        let checkedCount = $('.payment-method-checkbox:checked').length;
        if (checkedCount > 1) {
            // Keep only the first checked checkbox
            $('.payment-method-checkbox:checked').not(':first').prop('checked', false);
        }
    }

    initializeCheckboxes();
});