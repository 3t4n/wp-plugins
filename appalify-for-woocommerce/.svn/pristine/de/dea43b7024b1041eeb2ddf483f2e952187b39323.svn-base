jQuery(document).ready(function($) {
    $('.quick-view-button').on('click', function(e) {
        e.preventDefault();

        var productID = $(this).data('product-id');

        // Make AJAX request to fetch product data
        $.ajax({
            url: quickview_ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'load_quick_view_content',
                product_id: productID
            },
            success: function(response) {
                // Append the modal content to body
                $('body').append('<div class="quick-view-overlay"></div>');
                $('body').append('<div class="quick-view-modal">' + response + '</div>');
                $('.quick-view-overlay, .quick-view-modal').fadeIn();

                // Close modal when clicking on overlay
                $('.quick-view-overlay').on('click', function() {
                    $('.quick-view-modal, .quick-view-overlay').fadeOut(function() {
                        $(this).remove(); // Remove modal and overlay after fade out
                    });
                });
            }
        });
    });
});
