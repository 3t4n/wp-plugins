(function( $ ) {
	'use strict';

    jQuery(document).ready(function($) {
        // ---------------------------------------------------------------
        // 1. Define a unified “click” event for both mouse and touch devices.
        //    We use pointer events (if available) for better responsiveness.
        // ---------------------------------------------------------------
        const clickEvent = ('PointerEvent' in window) ? 'pointerup' : 'click';
    
        // ---------------------------------------------------------------
        // 2. Ensure jQuery UI Touch Punch is loaded on touch devices.
        //    This library makes jQuery UI’s sortable (and other interactions)
        //    work smoothly on touch devices. (It is recommended that you enqueue
        //    this script properly in your WordPress admin if it isn’t already.)
        // ---------------------------------------------------------------
        if ('ontouchstart' in document.documentElement) {
            if (typeof jQuery.ui !== 'undefined' && !$.fn.touchPunch) {
                // Update the path to jquery.ui.touch-punch.min.js as needed for your plugin.
                $.getScript(wpData.pluginUrl + '/albatross-audio/admin/js/jquery.ui.touch-punch.min.js')
                .done(function() {
                    console.log('jQuery UI Touch Punch loaded for touch support.');
                })
                .fail(function() {
                    console.warn('Could not load jQuery UI Touch Punch.');
                });
            }
        }
    
        // ---------------------------------------------------------------
        // 3. Define Global Variables.
        // ---------------------------------------------------------------
        const placeholderImg = wpData.pluginUrl + '/albatross-audio/admin/img/placeholder.png';
        let expanded = true; // Initial state: all song field groups are expanded.
    
        // ---------------------------------------------------------------
        // 4. Function: updateTrackNumbers
        //    - Iterates over each song field group.
        //    - Updates the track number in the title handle.
        //    - Updates input element IDs (by replacing any trailing digits with the new index).
        //    - Updates data-index attributes and other IDs for thumbnail previews and postboxes.
        //    - Shows or hides the remove button based on the total count.
        // ---------------------------------------------------------------
        function updateTrackNumbers() {
            $('#albatross-song-fields .song-field-group').each(function(index) {
                const $group = $(this);
                const title = $group.find('input[name="albatross_song_title[]"]').val() || 'New Song';
                $group.find('.albatross-hndle span').text((index + 1) + '. ' + title);
                $group.find('input').each(function() {
                    const $input = $(this);
                    let id = $input.attr('id');
                    if (id) {
                        $input.attr('id', id.replace(/\d+$/, index));
                    }
                });
                $group.find('.albatross-thumb-preview').attr('id', 'albatross_thumb_preview_' + index);
                $group.find('.albatross-upload-thumb-button, .albatross-remove-thumb-button').attr('data-index', index);
                $group.find('.postbox').attr('id', 'albatross-postbox-' + index);
            });
            const songCount = $('#albatross-song-fields .song-field-group').length;
            if (songCount > 1) {
                $('#albatross-song-fields .song-field-group .remove-song-btn').show();
            } else {
                $('#albatross-song-fields .song-field-group .remove-song-btn').hide();
            }
        }
    
        updateTrackNumbers();
    
        // ---------------------------------------------------------------
        // 5. Media Uploader: Image Thumbnail Selection
        //    - Opens the WordPress media uploader (restricted to images).
        //    - When an image is selected, updates the hidden input, image preview,
        //      hides the upload button, and shows the remove button.
        // ---------------------------------------------------------------
        $(document).on(clickEvent, '.albatross-upload-thumb-button', function(e) {
            e.preventDefault();
    
            const button = $(this);
            const index = button.data('index');
            const thumbInput = $('#albatross_song_thumb_' + index);
            const thumbPreview = $('#albatross_thumb_preview_' + index);
    
            const mediaUploader = wp.media({
                title: 'Select an Image',
                button: {
                    text: 'Select Image'
                },
                library: {
                    type: 'image'
                },
                multiple: false
            })
            .on('select', function() {
                const attachment = mediaUploader.state().get('selection').first().toJSON();
                thumbInput.val(attachment.url);
                thumbPreview.find('img').attr('src', attachment.url);
                thumbPreview.show();
                button.hide();
                button.siblings('.albatross-remove-thumb-button').show();
            })
            .open();
        });
    
        // ---------------------------------------------------------------
        // 6. Add a New Song Field Group
        //    - Clones the last song field group.
        //    - Clears input values and resets the thumbnail preview to the placeholder.
        //    - Appends the new group to the container, updates track numbers,
        //      and re-adds the collapse buttons.
        // ---------------------------------------------------------------
        $('#albatross-add-song-field').on(clickEvent, function () {
            const lastFieldGroup = $('.song-field-group').last();
            const newFieldGroup = lastFieldGroup.clone();
    
            // Reset values in the new cloned group.
            newFieldGroup.find('input[name="albatross_song_title[]"]').val('');
            newFieldGroup.find('input[name="albatross_song_file[]"]').val('');
            newFieldGroup.find('input[name="albatross_song_thumb[]"]').val('');
            newFieldGroup.find('input[name="albatross_song_artist[]"]').val('');
            newFieldGroup.find('.albatross-thumb-preview img').attr('src', placeholderImg);
            newFieldGroup.find('.albatross-upload-thumb-button').show();
            newFieldGroup.find('.albatross-remove-thumb-button').hide();
            newFieldGroup.find('.remove-song-btn').show();
    
            $('#albatross-song-fields').append(newFieldGroup);
            updateTrackNumbers();
            addCollapseButtons();
        });
    
        // ---------------------------------------------------------------
        // 7. Live Update of Track Titles
        //    - As the user types in the song title input, update the handle text.
        // ---------------------------------------------------------------
        $(document).on('input', 'input[name="albatross_song_title[]"]', function() {
            const title = $(this).val() || 'New Song';
            const group = $(this).closest('.song-field-group');
            const currentIndex = group.index();
            group.find('.albatross-hndle span').text((currentIndex + 1) + '. ' + title);
        });
    
        // ---------------------------------------------------------------
        // 8. Enable Sorting of Song Field Groups via jQuery UI Sortable.
        // ---------------------------------------------------------------
        $('#albatross-song-fields').sortable({
            update: function(event, ui) {
                updateTrackNumbers();
            }
        }).disableSelection();
    
        // ---------------------------------------------------------------
        // 9. Remove a Song Field Group
        // ---------------------------------------------------------------
        $(document).on(clickEvent, '.remove-song-btn', function() {
            $(this).closest('.song-field-group').remove();
            updateTrackNumbers();
        });
    
        // ---------------------------------------------------------------
        // 10. Add Collapse/Expand Buttons to Each Song Field Group
        //     - These buttons are appended to the header (.albatross-hndle) of each group.
        //     - An ARIA attribute (aria-expanded) is added for accessibility.
        // ---------------------------------------------------------------
        function addCollapseButtons() {
            $('.song-field-group').each(function(index) {
                const $group = $(this);
                if ($group.find('.albatross-collapse-single').length === 0) {
                    const collapseButton = $('<button>', {
                        type: 'button',
                        class: 'button button-secondary albatross-collapse-single',
                        text: 'Collapse',
                        'data-index': index,
                        'aria-expanded': 'true'
                    });
                    $group.find('.albatross-hndle').append(collapseButton);
                }
            });
        }
    
        // ---------------------------------------------------------------
        // 11. Toggle Collapse/Expand for a Single Song Field Group
        //     - Slides up/down the inside section and toggles button text and ARIA state.
        // ---------------------------------------------------------------
        $(document).on(clickEvent, '.albatross-collapse-single', function() {
            const $button = $(this);
            const insideDiv = $button.closest('.song-field-group').find('.albatross-inside');
            if (insideDiv.is(':visible')) {
                insideDiv.slideUp();
                $button.text('Expand').attr('aria-expanded', 'false');
            } else {
                insideDiv.slideDown();
                $button.text('Collapse').attr('aria-expanded', 'true');
            }
        });
    
        // ---------------------------------------------------------------
        // 12. Toggle Collapse/Expand for All Song Field Groups
        //     - When clicking the #albatross-collapse button, all inside sections are either
        //       collapsed or expanded. All individual collapse buttons are updated accordingly.
        // ---------------------------------------------------------------
        $('#albatross-collapse').on(clickEvent, function() {
            const insideDivs = $('.albatross-inside');
            if (expanded) {
                insideDivs.stop(true, true).slideUp();
                $('.albatross-collapse-single').text('Expand').attr('aria-expanded', 'false');
                $(this).text('Expand All');
            } else {
                insideDivs.stop(true, true).slideDown();
                $('.albatross-collapse-single').text('Collapse').attr('aria-expanded', 'true');
                $(this).text('Collapse All');
            }
            expanded = !expanded;
        });
    
        addCollapseButtons();
    
        // ---------------------------------------------------------------
        // 13. Remove Image Thumbnail Functionality
        //     - Resets the thumbnail back to the placeholder image.
        // ---------------------------------------------------------------
        $(document).on(clickEvent, '.albatross-remove-thumb-button', function(e) {
            e.preventDefault();
    
            const button = $(this);
            const index = button.data('index');
            const thumbInput = $('#albatross_song_thumb_' + index);
            const thumbPreview = $('#albatross_thumb_preview_' + index);
    
            thumbInput.val('');
            thumbPreview.find('img').attr('src', placeholderImg);
            button.hide();
            button.siblings('.albatross-upload-thumb-button').show();
        });
    
        // ---------------------------------------------------------------
        // 14. Media Uploader: Audio File Selection
        //     - Opens the media uploader restricted to audio files.
        //     - Updates the corresponding file input with the selected audio URL.
        // ---------------------------------------------------------------
        $(document).on(clickEvent, '.albatross-upload-button', function(e) {
            e.preventDefault();
    
            const button = $(this);
            const index = button.closest('.song-field-group').index();
            const fileInput = $('#albatross_song_file_' + index);
    
            const mediaUploader = wp.media({
                title: 'Select or Upload Audio',
                button: {
                    text: 'Select Audio'
                },
                library: {
                    type: 'audio'
                },
                multiple: false
            })
            .on('select', function() {
                const attachment = mediaUploader.state().get('selection').first().toJSON();
                fileInput.val(attachment.url);
            })
            .open();
        });
    });


})( jQuery );
