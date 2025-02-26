jQuery(document).ready(function($) {
    function manageRemoteRows() {
        if ($('#aieo_activate_utm_stats').is(':checked')) {
            $('.google-settings-row').show();
        } else {
            $('.google-settings-row').hide();
        }

        if ($('#aieo_activate_remote_connection').is(':checked')) {
            $('.remote-settings-row').show();
        } else {
            $('.remote-settings-row').hide();
        }
    }

    function manageAccountRows() {
        if ($('#aieo_activate_account').is(':checked')) {
            $('.account-settings-row').show();
        } else {
            $('.account-settings-row').hide();
        }
    }

    // Call on page load
    manageRemoteRows();
    manageAccountRows();

    // Call on checkbox change
    $('#aieo_activate_utm_stats, #aieo_activate_remote_connection').on('change', function() {
        manageRemoteRows();
    });

    $('#aieo_activate_account').on('change', function() {
        manageAccountRows();
    });
});

