(function($) {
    'use strict';

    window.acimaConfig = {
        init: function() {
            // Initialize the table and section title to make them visible
            jQuery('.form-table, .acima-login-section').addClass('initialized');

            // Check if configuration exists by looking for merchant_id
            const locationId = jQuery('#woocommerce_acima_credit_merchant_id').val();
            const hasConfig = locationId && locationId.trim().length > 0;

            // Reset visibility of all fields first
            jQuery('.acima-login-field, .acima-config-field').closest('tr').hide();
            jQuery('.download-config').closest('tr').hide();
            jQuery('.acima-login-section').hide();

            if (hasConfig) {
                // Show configuration fields when config exists
                jQuery('.acima-config-field').closest('tr').show();
            } else {
                // Show login form when no config exists
                jQuery('.acima-login-field').closest('tr').show();
                jQuery('.download-config').closest('tr').show();
                jQuery('.acima-login-section').show();
            }

            // Initialize error/success message containers
            this.initializeMessages();

            // Add event listeners
            this.initializeEventListeners();

            // Ensure enabled checkbox is always visible
            jQuery('#woocommerce_acima_credit_enabled').closest('tr').show();

            // Debug logging
            console.log('Location ID:', locationId);
            console.log('Has Config:', hasConfig);
            console.log('Login Fields Visible:', jQuery('.acima-login-field').closest('tr').is(':visible'));
            console.log('Config Fields Visible:', jQuery('.acima-config-field').closest('tr').is(':visible'));
        },

        initializeMessages: function() {
            if ($('#acima-config-error').length === 0) {
                $('<div id="acima-config-error" class="error-message"></div>')
                    .insertAfter('.download-config');
            }
            if ($('#acima-config-success').length === 0) {
                $('<div id="acima-config-success" class="message-success"></div>')
                    .insertAfter('.download-config');
            }
        },

        initializeEventListeners: function() {
            $('#woocommerce_acima_credit_base_url, #woocommerce_acima_credit_location_id')
                .on('change keyup', this.updateConfigUrl);
        },

        showLoginForm: function() {
            // Show login fields and title
            jQuery('.acima-login-field').closest('tr').show();
            jQuery('.download-config').closest('tr').show();
            jQuery('.acima-login-section').show();

            const base_url = jQuery('#woocommerce_acima_credit_api_url').val();
            const location_id = jQuery('#woocommerce_acima_credit_merchant_id').val();
            const client_id = jQuery('#woocommerce_acima_credit_acima_client_id').val();
            const client_secret = jQuery('#woocommerce_acima_credit_acima_client_secret').val();

            // Set login field values
            jQuery('#woocommerce_acima_credit_base_url').val(base_url);
            jQuery('#woocommerce_acima_credit_location_id').val(location_id);
            jQuery('#woocommerce_acima_credit_acima_login_client_id').val(client_id);
            jQuery('#woocommerce_acima_credit_acima_login_client_secret').val(client_secret);

            // Hide configuration fields except enabled
            jQuery('.acima-config-field').closest('tr').hide();
            jQuery('#woocommerce_acima_credit_enabled').closest('tr').show();

            // Clear any existing messages
            jQuery('#acima-config-error, #acima-config-success').hide();
        },

        downloadConfig: function(nonce) {
            const baseUrl = jQuery('#woocommerce_acima_credit_base_url').val().trim();
            console.log('Base URL value:', baseUrl);
            const locationId = jQuery('#woocommerce_acima_credit_location_id').val();
            const clientId = jQuery('#woocommerce_acima_credit_acima_login_client_id').val();
            const clientSecret = jQuery('#woocommerce_acima_credit_acima_login_client_secret').val();
            const errorDiv = jQuery('#acima-config-error');
            const successDiv = jQuery('#acima-config-success');

            // Clear previous messages
            errorDiv.hide();
            successDiv.hide();

            // Validate required fields
            if (!baseUrl) {
                console.log('Base URL is falsy:', baseUrl);
                errorDiv.text('Base URL is required').show();
                return;
            }
            if (!locationId) {
                errorDiv.text('Location ID is required').show();
                return;
            }
            if (!clientId) {
                errorDiv.text('Client ID is required').show();
                return;
            }
            if (!clientSecret) {
                errorDiv.text('Client Secret is required').show();
                return;
            }

            // Proceed with AJAX call if validation passes
            jQuery.ajax({
                url: ajaxurl,
                type: 'POST',
                data: {
                    action: 'download_acima_config',
                    nonce: nonce,
                    base_url: baseUrl,
                    location_id: locationId,
                    client_id: clientId,
                    client_secret: clientSecret,
                },
                success: function(response) {
                    if (response.success) {
                        successDiv.text('Configuration downloaded successfully').show();

                        setTimeout(() => {
                            jQuery('.acima-config-field').closest('tr').show();
                            jQuery('.acima-login-field').closest('tr').hide();
                            jQuery('.acima-login-section').hide();
                            jQuery('.download-config').closest('tr').hide();

                            if (response.data && response.data.fields) {
                                Object.entries(response.data.fields).forEach(([key, value]) => {
                                    const field = jQuery(`#${key}`);
                                    if (field.length) {
                                        if (field.attr('type') === 'checkbox') {
                                            field.prop('checked', value === 'yes');
                                            const hiddenInput = jQuery('<input>', {
                                                type: 'hidden',
                                                name: field.attr('name'),
                                                value: value === 'yes' ? '1' : '0'
                                            });
                                            field.after(hiddenInput);
                                        } else {
                                            field.val(value);
                                        }
                                    }
                                });
                            }

                            setTimeout(() => successDiv.hide(), 1000);
                        }, 1000);
                    } else {
                        errorDiv.text(response.data.message || 'Failed to update configuration').show();
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Ajax error:', status, error);
                    errorDiv.text('Error connecting to server').show();
                }
            });
        },

        updateConfigUrl: function() {
            const baseUrl = $('#woocommerce_acima_credit_base_url').val();
            const locationId = $('#woocommerce_acima_credit_location_id').val();

            if (baseUrl && locationId) {
                const configUrl = `${baseUrl}/api/merchant-integration/${locationId}/woo_commerce/configuration`;
                $('#woocommerce_acima_credit_config_url').val(configUrl);
            }
        }
    };

    // Initialize when document is ready
    $(document).ready(function() {
        window.acimaConfig.init();
    });

})(jQuery);