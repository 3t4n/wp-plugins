jQuery(function ($) {

    $('.wcr-authorization').hide();

    // Initialize the API URLs based on the selected mode
    populateUrls();

    // Enable or disable the API URL input based on mode selection
    $('#reachowc_mode').on('change', function () {
        const mode = $('#reachowc_mode').val();
        if (mode === 'local') {
            $('#reachowc_api_url').val('');
            $('#reachowc_api_url').prop('disabled', false);
        } else {
            populateUrls();
        }
    });

    // Populate URLs based on the selected environment mode
    function populateUrls() {
        const mode = $('#reachowc_mode').val();

        if (mode === 'local') {
            $('#reachowc_api_url').prop('disabled', false);
        } else {
            let url;
            switch (mode) {
                case 'sandbox':
                    url = 'https://sandbox.reacho.com';
                    break;
                case 'qa':
                    url = 'https://qa.reacho.com';
                    break;
                case 'app':
                    url = 'https://app.reacho.com';
                    break;
                default:
                    url = '';
            }
            $('#reachowc_api_url').val(url).prop('disabled', true);
        }
    }

    // Show or hide the subscription list ID dropdown if it is visible
    $('#reachowc_subscribe_list_id').toggle($('#reachowc_subscribe_list_id').is(':visible'));

    // Submit the settings form with AJAX
    $('#reacho_settings_submit').on('click', function (e) {
        e.preventDefault(); // Prevent the form from submitting normally
        $('#reacho_settings_submit').val('Connecting to Reacho...');
        $('#reacho_settings_submit').attr('disabled', true);
        const privateApiKey = $('#reachowc_private_api_key').val();
        const publicApiKey = $('#reachowc_public_api_key').val();
        const mode = $('#reachowc_mode').val();
        const listId = $('#reachowc_subscribe_list_id').val();

        $.ajax({
            url: jsObject.url,
            type: 'POST',
            dataType: 'json',
            data: {
                action: 'reachowc_validate_private_api_key',
                _wpnonce: jsObject.nonce,
                privateApiKey: privateApiKey,
                publicApiKey: publicApiKey,
                mode: mode,
                listId: listId
            },
            success: function (response) {
                if (!response.success) {
                    console.log(response.data.message);
                    $('.wcr-authorization').hide();
                    $('.wcr-authorization-error').show();
                    $('.wcr-authorization-error').text("Unauthorized access. Please verify and provide valid Public and Private API keys to continue.");
                    $('#reacho_settings_submit').val('Save Changes');
                    $('#reacho_settings_submit').attr('disabled', false);
                } else {
                    $('.wcr-authorization').hide();
                    $('.wcr-authorization-success').show();
                    let reachoIntegrationsUrl
                    if ($('#reachowc_api_url').val() !== undefined) {
                        reachoIntegrationsUrl = $('#reachowc_api_url').val() + '/apps/integrations';
                    } else {
                        reachoIntegrationsUrl = 'https://app.reacho.com/apps/integrations';
                    }
                    let successMessage = '<p>Your WooCommerce integration has been completed successfully. <a href=' + reachoIntegrationsUrl + ' target="_blank">Visit your Reacho portal</a> to begin managing your store.</p>';
                    $('.wcr-authorization-success').html(successMessage);
                    $('#reacho_settings_submit').val('Save Changes');
                    $('#reacho_settings_submit').attr('disabled', false);
                }
            },
            error: function (xhr, status, error) {
                console.error('AJAX error:', status, error);
                $('.wcr-authorization').hide();
                $('.wcr-authorization-error').show();
                $('.wcr-authorization-error').text("Something went wrong");
                $('#reacho_settings_submit').val('Save Changes');
                $('#reacho_settings_submit').attr('disabled', false);
            }
        });
    });
});
