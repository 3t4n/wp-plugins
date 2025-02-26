jQuery(function ($) {

    let copyPasteHTML = '<div class="tnpc-row-mbtnp-copy" title="Copy block"><img src="/wp-content/plugins/mbtnp-blocks/images/icon-copy.png" width="32"></div><div class="tnpc-row-mbtnp-paste" title="Paste block"><img src="/wp-content/plugins/mbtnp-blocks/images/icon-paste.png" width="32"></div>';

    function showToast(message, type = 'info') {
        let backgroundColor = '#000'; // Default color for 'info'
        if (type === 'success') {
            backgroundColor = '#234567'; // MBTNP blue for success
        } else if (type === 'error') {
            backgroundColor = '#dc3545'; // Red for error
        }

        Toastify({
            text: message,
            backgroundColor: backgroundColor,
            duration: 3000,
            gravity: 'top', // 'top' or 'bottom'
            position: 'center', // 'left', 'center' or 'right'
        }).showToast();
    }

    function addCopyPasteButtons() {
        // add new copy/paste buttons
        $('.tnpc-row .tnpc-row-clone').each(function () {
            console.log($(this).parents('table').find('.tnpc-row-mbtnp-copy').length);
            if ($(this).parents('table').find('.tnpc-row-mbtnp-copy').length < 1) {
                $(this).after(copyPasteHTML);
            }
        });
        // remove any instances not in a table element
        $('.tnpc-row-mbtnp-copy.ui-sortable-handle, .tnpc-row-mbtnp-paste.ui-sortable-handle').each(function () {
            $(this).remove();
        });
    }

    function initializeCopyPasteFunctionality() {
        $(document).delegate('.tnpc-row-mbtnp-copy', 'click', function (e) {
            e.preventDefault();

            let row = $(this).closest('.tnpc-row');
            let new_row = row.clone();
            let row_operations = new_row.find('.tnpc-row-delete, .tnpc-row-edit-block, .tnpc-row-clone, .tnpc-row-mbtnp-copy, .tnpc-row-mbtnp-paste');

            // remove row operations
            row_operations.remove();

            // save row outer HTML to localStorage
            localStorage.setItem('mbtnp-row-ops-copy', row_operations[0].outerHTML);
            localStorage.setItem('mbtnp-row-copy', new_row[0].outerHTML);

            showToast('Block copied!', 'success');
        });

        $(document).delegate('.tnpc-row-mbtnp-paste', 'click', function (e) {
            e.preventDefault();

            let row = $(this).closest('.tnpc-row');
            let row_copy = localStorage.getItem('mbtnp-row-copy');
            let row_ops = localStorage.getItem('mbtnp-row-ops-copy');

            if (row_copy) {
                // Create a jQuery object from the copied HTML string
                let new_row = $(row_copy);

                // Append the new row after the current row
                row.after(new_row);

                // Add row operations inside the new row
                new_row.append(row_ops);

                // Re-add delete, edit, and clone functionality
                new_row.add_delete();
                new_row.add_block_edit();
                new_row.add_block_clone();

                // Add copy/paste buttons to new block
                new_row.find('.tnpc-row-clone').after(copyPasteHTML);

                // Scroll to the new row within the tnpb-content div
                $('#tnpb-content').animate({
                    scrollTop: new_row.offset().top - $('#tnpb-content').offset().top + $('#tnpb-content').scrollTop()
                }, 500);

                showToast('Block pasted successfully!', 'success');
            } else {
                showToast('No copied block found. Please copy a block first.', 'error');
            }
        });
    }

    function customInitBuilderArea() {
        init_builder_area(); // Call the original builder initialization
        addCopyPasteButtons(); // Add custom copy/paste buttons
        initializeCopyPasteFunctionality(); // Initialize copy/paste functionality

        // Add copy/paste buttons to any new blocks inserted into the editor
        $(document).on('DOMNodeInserted', '.tnpc-row', function () {
            addCopyPasteButtons();
        });
    }

    // Override the original start_composer function
    function customStartComposer() {
        customInitBuilderArea();

        // The rest of the original start_composer code
        // Closes the block options layer (without saving)
        jQuery("#tnpc-block-options-cancel").click(function () {
            tnpc_hide_block_options();
            var _target = target;
            jQuery.post(ajaxurl, start_options, function (response) {
                _target.html(response);
                jQuery("#tnpc-block-options-form").html("");
            });
        });

        // Fires the save event for block options
        jQuery("#tnpc-block-options-save").click(function (e) {
            e.preventDefault();
            var _target = target;

            // fix for Codemirror
            if (typeof templateEditor !== 'undefined') {
                templateEditor.save();
            }

            if (window.tinymce)
                window.tinymce.triggerSave();

            var data = jQuery("#tnpc-block-options-form").serializeArray();
            tnpc_add_global_options(data);
            tnpc_hide_block_options();

            jQuery.post(ajaxurl, data, function (response) {
                _target.html(response);
                jQuery("#tnpc-block-options-form").html("");
            });
        });

        jQuery('#tnpc-block-options-form').change(function (event) {
            var data = jQuery("#tnpc-block-options-form").serializeArray();
            var _container = tnp_container;
            var _target = target;
            tnpc_add_global_options(data);

            jQuery.post(ajaxurl, data, function (response) {
                _target.html(response);
                if (event.target.dataset.afterRendering === 'reload') {
                    _container.find(".tnpc-row-edit-block").click();
                }
            }).fail(function () {
                showToast("Block rendering failed", 'error');
            });
        });
    }

    // Assign the new start_composer function to be called
    window.start_composer = customStartComposer;

    // Call the new start_composer function on document ready
    $(document).ready(function () {
        start_composer();
    });


    // when hovering over tnpc-button[value="Save"], remove copy/paste buttons
    $(document).on('mouseenter', '.tnpc-button', function () {
        $('.tnpc-row-mbtnp-copy, .tnpc-row-mbtnp-paste').remove();
    });

});
