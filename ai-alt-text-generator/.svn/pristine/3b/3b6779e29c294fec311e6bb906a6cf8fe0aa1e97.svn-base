jQuery(document).ready(function($) {
    // Function to insert the button
    function insertAltTextButton() {
        if (!$('#generate-alt-text-btn').length) {
            $('.attachment-alt-text, .alt-text, .setting.alt-text.has-description').append(
                '<br></b><p class="alt-generate-alt-text-wrapper" style="display:inline-block;width:100%;">' +
                '<input type="button" id="generate-alt-text-btn" class="button" value="Generate Alt Text">' +
                '<span class="spinner"></span>' +
                '<span class="error-message" style="color: red; margin-left: 10px;"></span>' +
                '<span class="success-message" style="color: green; margin-left: 10px;"></span>' +
                '</p><br><br>'
            );
        }
    }

    // Mutation observer to detect when media details are opened
    var observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.addedNodes.length) {
                insertAltTextButton();
            }
        });
    });

    // Start observing
    observer.observe(document.body, { childList: true, subtree: true });

    // Handle button click
    $(document).on('click', '#generate-alt-text-btn', function(e) {
        e.preventDefault();

        var $wrapper = $('.alt-generate-alt-text-wrapper');
        $wrapper.find('span.spinner').addClass('is-active');
        $wrapper.find('.error-message').text('').hide();
        $('#generate-alt-text-btn').prop('disabled', true);

        // Get the image ID from the media modal or URL
        let attachmentId = null;
        let imageUrl = null;

        // Check if we're in the list/edit view
        const urlParams = new URLSearchParams(window.location.search);

        if (urlParams.has('post') && urlParams.has('action') && urlParams.get('action') === 'edit') {
            // We're in the media edit page
            if ($('.media-modal.wp-core-ui').length) {
                // Get the current image from the modal
                const $img = $('.embed-media-settings .image img, .column-image .image img').first();
                if ($img.length) {
                    imageUrl = $img.attr('src');
                    
                    // Try to get the attachment ID from the URL
                    if (imageUrl) {
                        const matches = imageUrl.match(/wp-content\/uploads\/\d+\/\d+\/([^/]+)$/);
                        if (matches) {
                            // Try to get the attachment ID from the frame
                            const frame = wp.media.frame || wp.media.frames.image_details;
                            if (frame && frame.state()) {
                                const state = frame.state();
                                const selection = state.get && state.get('selection');
                                if (selection && selection.first) {
                                    const attachment = selection.first();
                                    if (attachment) {
                                        attachmentId = attachment.get('id');
                                    }
                                }
                            }
                            
                            // If we still don't have the ID, try to find it from the filename
                            if (!attachmentId) {
                                const filename = matches[1];
                                
                                // Try to get the ID from the image details modal
                                const $modal = $('.media-modal:visible');
                                const $img = $modal.find('.column-image img, .embed-media-settings img').first();
                                if ($img.length) {
                                    const imgSrc = $img.attr('src');
                                    if (imgSrc && imgSrc.includes(filename)) {
                                        // Try to get ID from the modal's data
                                        const modalId = $modal.find('[data-id]').data('id');
                                        if (modalId) {
                                            attachmentId = modalId;
                                        }
                                    }
                                }
                                
                                // If still no ID, try the media library
                                if (!attachmentId) {
                                    const models = wp.media.model.Attachments.all?.models;
                                    if (models) {
                                        const attachment = models.find(model => {
                                            const url = model.get('url');
                                            return url && url.includes(filename);
                                        });
                                        if (attachment) {
                                            attachmentId = attachment.get('id');
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            } else {
                // Get the ID directly from the URL
                attachmentId = urlParams.get('post');
                
                // Get the image URL from the preview image
                const $img = $('.wp_attachment_image .thumbnail, .wp_attachment_image img').first();
                if ($img.length) {
                    imageUrl = $img.attr('src');
                }
                
                // If no preview image, try to get from the filename
                if (!imageUrl) {
                    const $filename = $('#filename');
                    if ($filename.length) {
                        const filename = $filename.text();
                        const matches = filename.match(/(\d{4}\/\d{2}\/[^/]+)$/);
                        if (matches) {
                            imageUrl = `${window.location.protocol}//${window.location.host}/wp-content/uploads/${matches[1]}`;
                        }
                    }
                }
            }
        }
        // Check if we're in the regular media modal
        else if ($('.media-modal.wp-core-ui').length) {
            // For Classic Editor's image details modal
            if ($('.image-details').length) {
                const $img = $('.column-image .image img');
                imageUrl = $img.attr('src');

                if (imageUrl) {
                    // Extract post ID from the image URL
                    const matches = imageUrl.match(/wp-content\/uploads\/\d+\/\d+\/([^/]+)$/);
                    if (matches) {
                        const filename = matches[1];
                        const models = wp.media.model.Attachments.all.models;
                        const attachment = models?.find(model => {
                            const url = model.get('url');
                            return url && url.includes(filename);
                        });
                        if (attachment) {
                            attachmentId = attachment.get('id');
                        }
                    }
                }
            }
            // For regular media modal
            else if ($('.attachment-details').length) {
                attachmentId = $('.attachment-details').data('id');
                imageUrl = $('.details-image').attr('src');
            }
        }

        if (!attachmentId && !imageUrl) {
            showError($wrapper, 'Could not find image');
            $wrapper.find('span.spinner').removeClass('is-active');
            $('#generate-alt-text-btn').prop('disabled', false);
            return;
        }

        $.ajax({
            url: aiAltTextGenerator.ajax_url,
            type: 'POST',
            data: {
                action: 'generate_alt_text',
                nonce: aiAltTextGenerator.nonce,
                post_id: attachmentId || '',
                image_url: imageUrl || ''
            },
            success: function(response) {
                if (response.success && response.data) {
                    var altText = response.data;
                    
                    // Try all possible alt text field selectors
                    const altTextFields = [
                        'textarea[name="_wp_attachment_image_alt"]',
                        '.alt-text textarea',
                        '#attachment-details-two-column-alt-text',
                        '#image-details-alt-text',
                        'textarea[data-setting="alt"]',
                        '.setting.alt-text textarea',
                        '.setting.alt-text.has-description textarea'
                    ];

                    let altTextUpdated = false;
                    altTextFields.forEach(selector => {
                        const $field = $(selector);
                        if ($field.length) {
                            $field.val(altText);
                            // Trigger change event to ensure WordPress picks up the change
                            $field.trigger('change');
                            // For Classic Editor, also set the data-setting
                            if ($field.attr('data-setting')) {
                                $field.trigger('input');
                            }
                            altTextUpdated = true;
                        }
                    });

                    if (altTextUpdated) {
                        showSuccess($wrapper, 'Alt text generated successfully');
                    } else {
                        showError($wrapper, 'Could not update alt text field');
                    }
                } else {
                    showError($wrapper, response.data?.message || 'Failed to generate alt text');
                }
            },
            error: function(xhr, status, error) {
                let message = 'Server error occurred';
                try {
                    const response = JSON.parse(xhr.responseText);
                    message = response.data?.message || message;
                } catch(e) {
                    if (error === 'Not Found') {
                        message = 'Could not find the image attachment';
                    }
                }
                showError($wrapper, message);
            },
            complete: function() {
                $wrapper.find('span.spinner').removeClass('is-active');
                $('#generate-alt-text-btn').prop('disabled', false);
            }
        });
    });

    function showSuccess($wrapper, message) {
        var $successMessage = $wrapper.find('.success-message');
        if (!$successMessage.length) {
            $wrapper.append('<span class="success-message" style="color: green; margin-left: 10px; width: auto;"></span>');
            $successMessage = $wrapper.find('.success-message');
        }
        $successMessage.text(message).show();
        setTimeout(function() {
            $successMessage.fadeOut();
        }, 5000);
    }

    function showError($wrapper, message) {
        $wrapper.find('.error-message').text(message).show();
        setTimeout(function() {
            $wrapper.find('.error-message').fadeOut();
        }, 5000);
    }
});



