jQuery(document).ready(function($) {
    // Wait for editors to be initialized
    if (typeof tinymce !== 'undefined') {
        tinymce.on('AddEditor', function(e) {
            setTimeout(function() {
                if (e.editor.id === 'content') {
                    addMainDescriptionButton();
                } else if (e.editor.id === 'excerpt') {
                    addShortDescriptionButton();
                }
            }, 500);
        });
    }

    // Store generated descriptions
    let generatedDescriptions = {
        main: '',
        short: ''
    };

    // Store initialization state
    const initialized = {
        main: false,
        short: false
    };

    // Add loading indicator HTML using WordPress spinner for both generators
    $('body').append(`
        <div id="main-description-generating" class="description-generating" style="display: none;">
            <span class="spinner is-active"></span>
            <span>Generating product description...</span>
        </div>
        <div id="short-description-generating" class="description-generating" style="display: none;">
            <span class="spinner is-active"></span>
            <span>Generating short description...</span>
        </div>
    `);

    // Generate description function
    function generateDescription(type) {
        const postId = wcProdDescGen.postId;
        const tone = $(`#${type}-description-tone`).val();
        const previewContainer = $(`#${type}-description-preview-container`);
        const previewContent = $(`#${type}-description-preview-content`);
        const loadingDiv = $(`#${type}-description-generating`);
        const editorContainer = $(`#wp-${type === 'main' ? 'content' : 'excerpt'}-wrap`);

        if (!previewContainer.length || !previewContent.length) return;

        // Hide preview and show loading
        previewContainer.hide();
        loadingDiv.insertAfter(editorContainer).show();

        $.ajax({
            url: wcProdDescGen.ajaxurl,
            type: 'POST',
            data: {
                action: type === 'main' ? 'generate_product_description' : 'generate_product_short_description',
                post_id: postId,
                nonce: wcProdDescGen.nonce,
                tone: tone
            },
            success: function(response) {
                // Hide loading
                loadingDiv.hide();

                if (response.success) {
                    generatedDescriptions[type] = response.data.description;
                    previewContent.html(response.data.description);
                    previewContainer.show();
                    previewContainer.find('button').show();
                } else {
                    alert(response.data.message || 'Failed to generate description');
                }
            },
            error: function(xhr, status, error) {
                // Hide loading
                loadingDiv.hide();
                alert('Error: ' + error);
            }
        });
    }

    // Apply description function
    function applyDescription(type) {
        const description = generatedDescriptions[type];
        if (!description) return;

        const editor = tinymce.get(type === 'main' ? 'content' : 'excerpt');
        if (editor) {
            editor.setContent(description);
        } else {
            // Fallback for text mode
            const textarea = $(`#${type === 'main' ? 'content' : 'excerpt'}`);
            textarea.val(description);
        }

        // Hide preview container
        $(`#${type}-description-preview-container`).hide();
    }

    // Add function to add main description button
    function addMainDescriptionButton() {
        const $editorTools = $('#wp-content-media-buttons');
        if (!$editorTools.length || initialized.main) return;

        const $container = $('<span class="description-generator-container"></span>');
        const $toneSelector = createToneSelector('main-description-tone');
        const $button = $('<button type="button" class="button">Generate Description</button>')
            .on('click', function() { generateDescription('main'); });

        $container.append($toneSelector, $button);
        $editorTools.append($container);

        addPreviewContainer('main');
        initialized.main = true;
    }

    // Add function to add short description button
    function addShortDescriptionButton() {
        const $editorTools = $('#wp-excerpt-media-buttons');
        if (!$editorTools.length || initialized.short) return;

        const $container = $('<span class="description-generator-container"></span>');
        const $toneSelector = createToneSelector('short-description-tone');
        const $button = $('<button type="button" class="button">Generate Short Description</button>')
            .on('click', function() { generateDescription('short'); });

        $container.append($toneSelector, $button);
        $editorTools.append($container);

        addPreviewContainer('short');
        initialized.short = true;
    }

    // Add function to create tone selector
    function createToneSelector(id) {
        return $('<select></select>')
            .attr('id', id)
            .addClass('components-select-control__input')
            .append(
                $('<option value="formal">Formal & Professional</option>'),
                $('<option value="casual">Casual & Friendly</option>'),
                $('<option value="persuasive">Persuasive & Sales-focused</option>'),
                $('<option value="technical">Technical & Detailed</option>'),
                $('<option value="luxury">Luxury & Premium</option>'),
                $('<option value="creative">Creative & Engaging</option>')
            );
    }

    // Add function to create preview container
    function addPreviewContainer(type) {
        const $editorTools = $(`#wp-${type === 'main' ? 'content' : 'excerpt'}-editor-tools`);
        if (!$editorTools.length) return;

        const $previewContainer = $('<div></div>')
            .attr('id', `${type}-description-preview-container`)
            .addClass('description-preview-container');

        const $previewContent = $('<div></div>')
            .attr('id', `${type}-description-preview-content`);

        const $actionContainer = $('<div></div>')
            .addClass('description-action-container');

        const $applyButton = $('<button type="button" class="button button-primary">Apply Description</button>')
            .on('click', function() { applyDescription(type); });

        const $regenerateButton = $('<button type="button" class="button">Generate Another</button>')
            .on('click', function() { generateDescription(type); });

        $actionContainer.append($applyButton, $regenerateButton);
        $previewContainer.append($previewContent, $actionContainer);
        $editorTools.after($previewContainer);
    }

    // Initialize description buttons when document is ready
    $(document).ready(function() {
        // Remove any existing buttons first
        $('.description-generator-container').remove();
        $('.description-preview-container').remove();
        
        // Reset initialization state
        initialized.main = false;
        initialized.short = false;

        // Add buttons
        addMainDescriptionButton();
        addShortDescriptionButton();
    });

    // Also handle TinyMCE editor initialization
    if (typeof tinymce !== 'undefined') {
        tinymce.on('AddEditor', function(e) {
            if (e.editor.id === 'content') {
                addMainDescriptionButton();
            } else if (e.editor.id === 'excerpt') {
                addShortDescriptionButton();
            }
        });
    }

    // Add this function to handle image generation
    function generateProductImage(postId) {
        const loadingDiv = $('#featured-image-generation-status');
        const previewContainer = $('#featured-image-preview-container');
        const imageGrid = $('#featured-image-grid');

        loadingDiv.html('<span class="spinner is-active"></span><span>Generating images...</span>').show();
        previewContainer.hide();

        $.ajax({
            url: wcProdDescGen.ajaxurl,
            type: 'POST',
            data: {
                action: 'generate_product_image',
                post_id: postId,
                nonce: wcProdDescGen.nonce,
                preview_only: '1'
            },
            success: function(response) {
                // Hide loading div after successful generation
                loadingDiv.hide();

                if (response.success && response.data.image_urls) {
                    imageGrid.empty();
                    response.data.image_urls.forEach(function(url) {
                        const wrapper = $('<div></div>').css({
                            position: 'relative',
                            border: '1px solid #ddd',
                            padding: '5px'
                        });

                        const img = $('<img>').attr('src', url).css({
                            width: '100%',
                            display: 'block'
                        });

                        const useButton = $('<button></button>')
                            .addClass('button button-primary use-as-featured')
                            .text('Use as Featured')
                            .css({
                                margin: '5px 0 0 0',
                                width: '100%'
                            })
                            .attr('data-image-url', url)
                            .attr('data-post-id', postId);

                        wrapper.append(img, useButton);
                        imageGrid.append(wrapper);
                    });
                    previewContainer.show();
                } else {
                    // Show error message if generation failed
                    loadingDiv.html(response.message || 'Failed to generate images').show();
                    setTimeout(() => loadingDiv.fadeOut(), 3000);
                }
            },
            error: function(xhr, status, error) {
                // Show error message and hide after delay
                loadingDiv.html('Error: ' + error).show();
                setTimeout(() => loadingDiv.fadeOut(), 3000);
            }
        });
    }

    // Add this function to handle successful image attachment
    function handleImageAttachSuccess(response, imageUrl, isGallery) {
        if (isGallery) {
            // Gallery image handling...
        } else {
            // Update featured image preview
            const previewContainer = $('#featured-image-preview-container');
            const imageGrid = $('#featured-image-grid');
            
            // Create success message
            const successMessage = $('<div class="notice notice-success"></div>')
                .text('Featured image set successfully')
                .css('margin', '10px 0');
            
            // Create image container
            const imageContainer = $('<div></div>')
                .addClass('featured-image-container')
                .css({
                    'border': '1px solid #ddd',
                    'padding': '10px',
                    'margin-top': '10px'
                });
            
            // Add image
            const img = $('<img>')
                .attr('src', imageUrl)
                .css({
                    'width': '100%',
                    'height': 'auto',
                    'display': 'block'
                });
            
            imageContainer.append(img);
            
            // Clear and update the preview
            imageGrid.empty()
                .append(successMessage)
                .append(imageContainer);
            
            previewContainer.show();
            
            // Update the WP featured image area if it exists
            const wpFeaturedImage = $('#postimagediv');
            if (wpFeaturedImage.length) {
                // Trigger WP's featured image update
                if (typeof wp !== 'undefined' && wp.media && wp.media.featuredImage) {
                    wp.media.featuredImage.set(response.data.attachment_id);
                }
            }
        }
    }

    // Update the attachImage function
    function attachImage(imageUrl, postId, isGallery = false) {
        const loadingDiv = isGallery ? 
            $('#gallery-generation-status') : 
            $('#featured-image-generation-status');
        const previewContainer = isGallery ? 
            $('#gallery-image-preview-container') : 
            $('#featured-image-preview-container');

        loadingDiv.html('<span class="spinner is-active"></span><span>Attaching image...</span>').show();

        const data = new FormData();
        data.append('action', 'attach_generated_image');
        data.append('nonce', wcProdDescGen.nonce);
        data.append('post_id', postId);
        data.append('image_url', imageUrl);
        data.append('is_gallery', isGallery ? '1' : '0');

        jQuery.ajax({
            url: wcProdDescGen.ajaxurl,
            type: 'POST',
            data: data,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.success) {
                    loadingDiv.html(`<div class="notice notice-success">${response.data.message}</div>`);
                    
                    // Update UI with new image
                    handleImageAttachSuccess(response, imageUrl, isGallery);
                    
                    // Update WordPress media frame if it exists
                    if (wp.media && wp.media.frame) {
                        wp.media.frame.setState('library').get('selection').reset();
                        wp.media.frame.content.get().collection.props.set({ignore: (+ new Date())});
                        wp.media.frame.content.get().options.selection.reset();
                    }
                } else {
                    loadingDiv.html(`<div class="notice notice-error">${response.data.message}</div>`);
                }
                previewContainer.show();
            },
            error: function(xhr, status, error) {
                loadingDiv.html(`<div class="notice notice-error">Error: ${error}</div>`);
                previewContainer.show();
            }
        });
    }

    // Update the click handler
    $(document).on('click', '.use-as-featured', function(e) {
        e.preventDefault();
        e.stopPropagation(); // Prevent event bubbling
        
        const imageUrl = $(this).attr('data-image-url');
        const postId = $(this).attr('data-post-id');
        
        if (!imageUrl || !postId) {
            console.error('Missing image URL or post ID');
            return;
        }
        
        // Disable the button while processing
        $(this).prop('disabled', true).text('Setting...');
        
        attachImage(imageUrl, postId, false);
    });

    // Update the click handler for "Add to gallery" buttons
    jQuery(document).on('click', '.add-to-gallery', function(e) {
        e.preventDefault();
        const imageUrl = jQuery(this).data('image-url');
        const postId = jQuery(this).data('post-id');
        attachImage(imageUrl, postId, true);
    });

    // Add event listener for the Generate Featured Image button
    $(document).on('click', '#generate-product-image', function() {
        const postId = $(this).data('post-id');
        generateProductImage(postId);
    });

    // Add event listener for the Generate Gallery Images button
    $(document).on('click', '#generate-gallery-images', function() {
        const postId = $(this).data('post-id');
        generateGalleryImages(postId);
    });

    // Update the generateGalleryImages function to handle multiple images properly
    function generateGalleryImages(postId) {
        const loadingDiv = $('#gallery-generation-status');
        const previewContainer = $('#gallery-image-preview-container');
        const imageGrid = $('#gallery-image-grid');

        loadingDiv.html('<span class="spinner is-active"></span><span>Generating gallery images...</span>').show();
        previewContainer.hide();

        $.ajax({
            url: wcProdDescGen.ajaxurl,
            type: 'POST',
            data: {
                action: 'generate_product_image',
                post_id: postId,
                nonce: wcProdDescGen.nonce,
                preview_only: '1',
                is_gallery: '1'
            },
            success: function(response) {
                loadingDiv.hide();

                if (response.success && response.data.image_urls) {
                    imageGrid.empty();

                    // Add select all container
                    const selectAllContainer = $('<div></div>')
                        .addClass('select-all-container')
                        .css({
                            'margin-bottom': '10px',
                            'padding': '10px',
                            'background': '#f9f9f9',
                            'border': '1px solid #ddd'
                        });

                    const selectAllCheckbox = $('<input type="checkbox" id="select-all-images">')
                        .on('change', function() {
                            $('.gallery-image-checkbox').prop('checked', this.checked);
                        });

                    selectAllContainer.append(
                        selectAllCheckbox,
                        $('<label for="select-all-images">').text(' Select All Images')
                    );

                    // Add "Add Selected to Gallery" button
                    const addSelectedButton = $('<button></button>')
                        .addClass('button button-primary')
                        .text('Add Selected to Gallery')
                        .css('margin-left', '10px')
                        .on('click', function(e) {
                            e.preventDefault();
                            const selectedUrls = [];
                            $('.gallery-image-checkbox:checked').each(function() {
                                selectedUrls.push($(this).attr('data-url'));
                            });
                            if (selectedUrls.length > 0) {
                                attachMultipleGalleryImages(selectedUrls, postId);
                            }
                        });

                    selectAllContainer.append(addSelectedButton);
                    imageGrid.before(selectAllContainer);

                    // Generate image grid with checkboxes
                    response.data.image_urls.forEach(function(url) {
                        const wrapper = $('<div></div>').css({
                            position: 'relative',
                            border: '1px solid #ddd',
                            padding: '5px'
                        });

                        const checkbox = $('<input type="checkbox">')
                            .addClass('gallery-image-checkbox')
                            .attr('data-url', url)
                            .css({
                                position: 'absolute',
                                top: '10px',
                                left: '10px',
                                zIndex: '1'
                            });

                        const img = $('<img>').attr('src', url).css({
                            width: '100%',
                            display: 'block'
                        });

                        wrapper.append(checkbox, img);
                        imageGrid.append(wrapper);
                    });
                    previewContainer.show();
                } else {
                    loadingDiv.html(response.message || 'Failed to generate images').show();
                }
            },
            error: function(xhr, status, error) {
                loadingDiv.html('Error: ' + error).show();
            }
        });
    }

    // Update the attachMultipleGalleryImages function
    function attachMultipleGalleryImages(imageUrls, postId) {
        const loadingDiv = $('#gallery-generation-status');
        const previewContainer = $('#gallery-image-preview-container');
        const imageGrid = $('#gallery-image-grid');
        
        loadingDiv.html('<span class="spinner is-active"></span><span>Adding images to gallery...</span>').show();

        // First, get existing gallery images
        $.ajax({
            url: wcProdDescGen.ajaxurl,
            type: 'POST',
            data: {
                action: 'get_product_gallery',
                post_id: postId,
                nonce: wcProdDescGen.nonce
            },
            success: function(existingGallery) {
                let completedUploads = 0;
                const totalUploads = imageUrls.length;
                const successfulUploads = [];
                const existingIds = existingGallery.data || [];

                imageUrls.forEach(function(imageUrl) {
                    const data = new FormData();
                    data.append('action', 'attach_generated_image');
                    data.append('nonce', wcProdDescGen.nonce);
                    data.append('post_id', postId);
                    data.append('image_url', imageUrl);
                    data.append('is_gallery', '1');
                    data.append('existing_gallery', JSON.stringify(existingIds));

                    $.ajax({
                        url: wcProdDescGen.ajaxurl,
                        type: 'POST',
                        data: data,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            completedUploads++;
                            if (response.success) {
                                successfulUploads.push({
                                    url: imageUrl,
                                    id: response.data.attachment_id
                                });
                            }
                            
                            if (completedUploads === totalUploads) {
                                // Show success message
                                loadingDiv.html(`<div class="notice notice-success">
                                    <p>${successfulUploads.length} of ${totalUploads} images added to gallery successfully!</p>
                                    <p>Refreshing page to show updated gallery...</p>
                                </div>`);
                                
                                // Update the grid with success indicators
                                $('.gallery-image-checkbox:checked').each(function() {
                                    const checkbox = $(this);
                                    const wrapper = checkbox.closest('div');
                                    checkbox.prop('disabled', true);
                                    
                                    $('<div></div>')
                                        .addClass('image-status')
                                        .css({
                                            'text-align': 'center',
                                            'margin-top': '5px',
                                            'color': '#1e8cbe'
                                        })
                                        .text('Added to gallery')
                                        .appendTo(wrapper);
                                });

                                // Reload the page after a short delay to show the updated gallery
                                setTimeout(function() {
                                    window.location.reload();
                                }, 2000);
                            }
                        },
                        error: function(xhr, status, error) {
                            completedUploads++;
                            if (completedUploads === totalUploads) {
                                loadingDiv.html(`<div class="notice notice-error">
                                    <p>Some images failed to upload. Error: ${error}</p>
                                </div>`);
                            }
                        }
                    });
                });
            },
            error: function(xhr, status, error) {
                loadingDiv.html(`<div class="notice notice-error">
                    <p>Failed to get existing gallery. Error: ${error}</p>
                </div>`);
            }
        });
    }
}); 