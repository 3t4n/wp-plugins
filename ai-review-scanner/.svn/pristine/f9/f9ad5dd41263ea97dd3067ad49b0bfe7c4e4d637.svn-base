jQuery(document).ready(function ($) {
    $(document).on('click', '.ai-scan-btn', function (event) {
        event.preventDefault(); // Prevent the default form submission

        const commentId = $(this).data('comment-id');
        const button = $(this); // Preserve the button reference
        button.buttonLoader('start'); // Start the button loader animation

        $.ajax({
            url: aiScanParams.ajaxUrl,
            type: 'POST',
            data: {
                action: 'ai_scan_review',
                comment_ID: commentId,
                _ajax_nonce: aiScanParams.nonce,
            },
            success: function (response) {
                console.log(response);
                if (response.success) {
                    const td = button.closest('.ai_review_scan');
                    // Update the rating and score
                    td.find('.rating-value').text(response.data.rating);
                    td.find('.score-value').text(response.data.score); // Format score to 2 decimal places
                    let message = td.find('.message-string');
                    message.text(response.data.message); // Format score to 2 decimal places
                    message.css('color', response.data.color); // Correctly set the color using jQuery
                    if (response.data.status == 'success') {
                        const tr = td.parent();
                        tr.removeClass('unapproved');
                    }
                } else {
                    alert(response.data);
                }
            },
            error: function (error) {
                alert('AI Scan failed.');
            },
            complete: function () {
                button.buttonLoader('stop'); // Stop the button loader animation
            }
        });
    });
});
