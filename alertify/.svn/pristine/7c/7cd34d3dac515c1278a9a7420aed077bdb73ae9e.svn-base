jQuery(document).ready(function($) {
    // Open modal when button is clicked
    $('.alertify-notify-button').click(function() {
        var productId = $(this).data('product-id');
        $('#alertify-product-id').val(productId);
        $('#alertify-modal').fadeIn(300);
    });

    // Close modal when X is clicked
    $('.alertify-close').click(function() {
        $('#alertify-modal').fadeOut(300);
    });

    // Close modal when clicking outside
    $(window).click(function(e) {
        if ($(e.target).is('#alertify-modal')) {
            $('#alertify-modal').fadeOut(300);
        }
    });

    // Handle form submission
    $('#alertify-notification-form').submit(function(e) {
        e.preventDefault();
        
        var form = $(this);
        var submitButton = form.find('button[type="submit"]');
        var originalButtonText = submitButton.text();
        
        // Disable submit button and show loading state
        submitButton.prop('disabled', true).text('Processing...');
        
        $.ajax({
            url: alertifyAjax.ajaxurl,
            type: 'POST',
            data: form.serialize(),
            success: function(response) {
                if (response.success) {
                    showNotification('success', response.data);
                    setTimeout(function() {
                        $('#alertify-modal').fadeOut(300);
                        form[0].reset();
                    }, 7000);
                } else {
                    showNotification('error', response.data);
                }
            },
            error: function() {
                showNotification('error', 'An error occurred. Please try again.');
            },
            complete: function() {
                // Restore button state
                submitButton.prop('disabled', false).text(originalButtonText);
            }
        });
    });

    // Helper function to show notifications
    function showNotification(type, message) {
        // Remove any existing notification
        $('.alertify-notification').remove();
        
        // Create and show new notification
        var notification = $('<div>', {
            class: 'alertify-notification alertify-notification-' + type
        }).html(
            message + 
            '<span class="alertify-notification-close">&times;</span>'
        ).appendTo('.alertify-modal-content');

        // Handle close button click
        notification.find('.alertify-notification-close').click(function() {
            notification.fadeOut(300, function() {
                $(this).remove();
            });
        });

        if (type === 'success') {
            // For success messages, auto-hide after 7 seconds
            setTimeout(function() {
                $('#alertify-modal').fadeOut(300);
                $('#alertify-notification-form')[0].reset();
            }, 7000);
        }
    }

    // Phone number validation
    $('#alertify-phone').on('input', function() {
        var input = $(this);
        var value = input.val();
        
        // Remove any characters that aren't numbers, +, -, (, ), or spaces
        value = value.replace(/[^\d+\-\s()]/g, '');
        
        input.val(value);
    });
}); 