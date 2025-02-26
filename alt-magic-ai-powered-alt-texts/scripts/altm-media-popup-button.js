jQuery(document).ready(function ($) {
    // Add CSS for loader
    $('<style>')
        .prop('type', 'text/css')
        .html(`
            .loader {
                width: 20px;
                height: 20px;
                border: 3px solid #ec7b4e;
                border-bottom-color: transparent;
                border-radius: 50%;
                display: inline-block;
                box-sizing: border-box;
                animation: rotation 1s linear infinite;
                float: right;
                margin-top: 13px;
                margin-right: 10px;
            }

            @keyframes rotation {
                0% {
                    transform: rotate(0deg);
                }
                100% {
                    transform: rotate(360deg);
                }
            }

            .attachment-details{
                overflow-x: clip;
            }
        `)
        .appendTo('head');

    // Create a MutationObserver to watch for changes in the DOM
    //console.log('ready');
    var observer = new MutationObserver(function (mutations) {
        //console.log('mutations: ', mutations);
        //console.log('finding alt text element');
        mutations.forEach(function (mutation) {
            // Check if the element with data-setting="alt" exists
            //console.log('for mutation: ', mutation);
            var altTextElement = $('[data-setting="alt"]');


            if (altTextElement.length && !$('#customAltButton').length) {

                //console.log('Alt text element found, adding button');

                // Add a custom button below the element with data-setting="alt"
                var $button = $('<button id="customAltButton" class="button button-primary generate-alt-text-button">Generate Alt Text</button>');
                altTextElement.after($button);

                // Modify the spinner creation to use the new loader class
                var $spinner = $('<span id="altSpinner" class="loader" aria-hidden="true" style="display: none;"></span>');
                $button.after($spinner);

                // Add message element (hidden by default)
                var $message = $('<div id="altMessage" style="display: none; color: green; margin-top: 12px; float: right; margin-right: 14px; font-weight: bold;" aria-live="polite">Alt text updated successfully</div>');
                $button.after($message);

                // Remove the element with id="alt-text-description" if it exists
                $('#alt-text-description').remove();

                // Function to extract query parameters from the URL
                function getQueryParam(param) {
                    param = param.replace(/[[]/, "\\[").replace(/[\]]/, "\\]");
                    let regex = new RegExp("[\\?&]" + param + "=([^&#]*)");
                    let results = regex.exec(window.location.search);
                    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));

                }

                // Variable to store the attachment ID
                let attachmentId = getQueryParam('item');
                ////console.log('Attachment ID from URL:', attachmentId);

                // Add click event for the custom button
                $('#customAltButton').on('click', function () {
                    if (!attachmentId) {
                        alert('No attachment selected.');
                        return;
                    }
                    ////console.log('Final Attachment ID:', attachmentId);

                    $spinner.show();
                    $message.hide();

                    // Use the attachmentId for further processing
                    generateAltText({ id: attachmentId });
                });

                // Fallback: Fetch attachment ID from clicked element if not found in URL
                jQuery(document).on("click", "ul.attachments li.attachment", function () {
                    let e = jQuery(this);
                    if (e.attr("data-id")) {
                        attachmentId = parseInt(e.attr("data-id"), 10);
                        //console.log('Attachment ID from clicked element:', attachmentId);

                        // Optionally, you can trigger any necessary actions here
                    }
                });
            }
        });
    });

    // Start observing the media modal wrapper for changes
    // var target = document.querySelector('.media-modal');
    // if (target) {
    //     observer.observe(target, { childList: true, subtree: true });
    // }

    observer.observe(document.body, { childList: true, subtree: true });

    function generateAltText(attachment) {
        var attachmentId = attachment.id;

        // Disable button, change text, and reduce opacity
        $('#customAltButton').prop('disabled', true)
            .text('Generating...');

        $.ajax({
            url: ajax_object.ajaxurl,
            type: 'POST',
            dataType: 'json',
            data: {
                action: 'altm_generate_alt_text_ajax',
                attachment_id: attachmentId,
                nonce: ajax_object.generate_alt_text_nonce
            },
            success: function (response) {
                // Hide spinner
                $('#altSpinner').hide();
                // Re-enable button, revert text, and restore opacity
                $('#customAltButton').prop('disabled', false)
                    .text('Generate Alt Text')
                    .css('opacity', '1');

                if (response.success) {
                    var altText = response.data.alt_text;
                    var moreOptions = response.data.more_options;
                    var page_type = 'media_library';

                    if (document.getElementById('attachment-details-alt-text')) {
                        page_type = 'product_page';
                    }

                    //console.log('page_type: ', page_type);

                    function updateField(fieldType, altText) {
                        const fieldId = page_type === 'media_library'
                            ? `attachment-details-two-column-${fieldType}`
                            : `attachment-details-${fieldType}`;
                        document.getElementById(fieldId).value = altText;
                    }

                    // Update alt text
                    updateField('alt-text', altText);

                    // Check and update title if option is set
                    if (moreOptions.alt_magic_use_for_title == '1') {
                        updateField('title', altText);
                    }

                    // Check and update caption if option is set
                    if (moreOptions.alt_magic_use_for_caption == '1') {
                        updateField('caption', altText);
                    }

                    // Check and update description if option is set
                    if (moreOptions.alt_magic_use_for_description == '1') {
                        updateField('description', altText);
                    }

                    // Show success message
                    $('#altMessage').fadeIn();
                    // Hide the message after 3 seconds
                    setTimeout(function () {
                        $('#altMessage').fadeOut();
                    }, 3000);
                } else {
                    console.error('Error:', response.data || 'Unknown error');
                    alert('Failed to generate alt text. Please try again or contact chat support on app.altmagic.pro');
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                // Hide spinner
                $('#altSpinner').hide();
                // Re-enable button, revert text, and restore opacity
                $('#customAltButton').prop('disabled', false)
                    .text('Generate Alt Text')
                    .css('opacity', '1');

                console.error('AJAX Error:', textStatus, errorThrown);
                alert('An error occurred while generating alt text. Please try again. Error: ' + textStatus);
            }
        });
    }
});
