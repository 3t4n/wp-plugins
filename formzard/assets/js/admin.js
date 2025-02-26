jQuery(document).ready(function ($) {
    // Function to show toast notifications
    function showToast(message, type = 'formzard-toast-success') {
        const toastContainer = document.getElementById('formzard-toast-container');
        if (!toastContainer) {
            // Create toast container if it doesn't exist
            $('body').append('<div id="formzard-toast-container" style="position: fixed; bottom: 20px; right: 20px; z-index: 1000;"></div>');
        }

        const icon = type === 'formzard-toast-success' 
            ? '<span class="dashicons dashicons-yes-alt formzard-toast-icon"></span>' 
            : '<span class="dashicons dashicons-dismiss formzard-toast-icon"></span>';

        const toast = $('<div>')
            .addClass(`formzard-toast ${type}`)
            .html(`${icon} <span class="formzard-toast-message">${message}</span>`);

        $('#formzard-toast-container').append(toast);

        // Remove the toast after 5 seconds
        setTimeout(function () {
            toast.fadeOut(500, function () {
                $(this).remove();
            });
        }, 5000); // Matches the animation time (5 seconds)
    }

    $('.formzard-import-template').on('click', function () {
        var templateId = $(this).data('template-id');
        var nonce = formzard.nonce;

        $.ajax({
            url: formzard.ajax_url,
            type: 'POST',
            data: {
                action: 'formzard_import_template',
                template_id: templateId,
                nonce: nonce
            },
            success: function (response) {
                if (response.success) {
                    showToast(response.data.message, 'formzard-toast-success');
                } else {
                    showToast(response.data.message, 'formzard-toast-error');
                }
            },
            error: function () {
                showToast('An unexpected error occurred. Please try again.', 'formzard-toast-error');
            }
        });
    });
});