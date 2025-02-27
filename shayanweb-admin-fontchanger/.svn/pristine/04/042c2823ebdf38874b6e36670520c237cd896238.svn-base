jQuery(document).ready(function($) {
    $('#shayanweb-save-button').on('click', function(event) {
        event.preventDefault();

        $('#message-container').removeClass('sherror shsuccess').addClass('shwait').text(shweb_wait_message);

        var formData = $('#shayanweb_fontchanger_options').serialize();

        $.ajax({
            type: 'POST',
            url: ajaxurl,
            data: formData + '&action=shayanweb_fontchanger_ajax_options_save', // Updated action name
            success: function(response) {
                if (response.success) {
                    $('#message-container').removeClass('sherror shwait').addClass('shsuccess').text(shweb_success_message);
                } else {
                    $('#message-container').removeClass('shsuccess shwait').addClass('sherror').text(shweb_error_message);
                }
            },
            error: function() {
                $('#message-container').removeClass('shsuccess shwait').addClass('sherror').text(shweb_error_message);
            }
        });
    });
});
