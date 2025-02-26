// Change TinyMCE background
// Ensures that the background of Carbon Fields' rich text editor (TinyMCE) panels
// and editor content is set to white, including dynamically loaded elements like tabs.
document.addEventListener('DOMContentLoaded', function () {
    // Set the background color of the entire panel to white
    document.querySelectorAll('.cf-rich-text').forEach(function (richTextContainer) {
        richTextContainer.style.backgroundColor = '#FFFFFF'; // Force panel background to white
    });

    // Set the background color of the TinyMCE editor content to white
    document.querySelectorAll('.cf-rich-text textarea').forEach(function (textarea) {
        var editor = tinymce.get(textarea.id);
        if (editor) {
            editor.on('init', function () {
                var iframe = editor.iframeElement;
                if (iframe) {
                    var iframeDoc = iframe.contentDocument || iframe.contentWindow.document;
                    var tinymceBody = iframeDoc.querySelector('body.mce-content-body');
                    if (tinymceBody) {
                        tinymceBody.style.backgroundColor = '#FFFFFF'; // Force TinyMCE content background to white
                    }
                }
            });
        }
    });

    // Apply background color when tabs are clicked
    document.querySelectorAll('.cf-complex__tabs-item').forEach(function (tab) {
        tab.addEventListener('click', function () {
            document.querySelectorAll('.cf-rich-text').forEach(function (richTextContainer) {
                richTextContainer.style.backgroundColor = '#FFFFFF'; // Force panel background to white
            });

            document.querySelectorAll('.cf-rich-text textarea').forEach(function (textarea) {
                var editor = tinymce.get(textarea.id);
                if (editor) {
                    var iframe = editor.iframeElement;
                    if (iframe) {
                        var iframeDoc = iframe.contentDocument || iframe.contentWindow.document;
                        var tinymceBody = iframeDoc.querySelector('body.mce-content-body');
                        if (tinymceBody) {
                            tinymceBody.style.backgroundColor = '#FFFFFF'; // Force TinyMCE content background to white
                        }
                    }
                }
            });
        });
    });
});

// Translate tooltips for pro features
// Replaces the message attribute of pro-feature tooltips with localized strings.
document.addEventListener('DOMContentLoaded', function() {
    var tooltipElements = document.querySelectorAll('.pro-feature-tooltip');

    tooltipElements.forEach(function(element) {
        var message = element.getAttribute('data-pro-feature-message');
        if (message) {
            element.setAttribute('data-pro-feature-message', __(message, 'ad-block-guard'));
        }
    });
});

// Remove action buttons for usergroups (add/remove)
// Hides the action buttons for complex groups when the number of groups exceeds a specified threshold.
document.addEventListener('DOMContentLoaded', function() {
    // Select all complex groups within the specified container
    const complexGroups = document.querySelectorAll("#carbon_fields_container_adblock_guard_settings .cf-complex__group-actions");

    // Loop through all complex groups
    complexGroups.forEach((group) => {
        // Check if the group matches certain criteria (e.g., having specific parent or index)
        const parent = group.closest('.cf-complex__groups');
        if (parent && parent.children.length > 5) { // Adjust the condition based on your needs
            // Hide the specific complex group's actions
            group.style.display = 'none';
        }
    });
});

// Fix TinyMCE Text to Visual tab switch
(function ($) {
    $(document).ready(function () {

        // Bind to both Visual and Text switch buttons
        $(document).on('click', '.wp-switch-editor', function () {

            // If TinyMCE is available and there is an active editor, trigger a save
            if (typeof tinyMCE !== 'undefined' && tinyMCE.activeEditor) {
                // Use a timeout to let the click event propagate a little before saving
                setTimeout(function () {
                    tinyMCE.activeEditor.save();
                }, 50);
            }
        });

        // Optionally, if your editor textarea itself is blurred, trigger a save.
        // This might catch some cases where the change isn't registered on switch.
        $('textarea.wp-editor-area').on('blur', function () {
            if (typeof tinyMCE !== 'undefined' && tinyMCE.activeEditor) {
                tinyMCE.activeEditor.save();
            }
        });

        // For form submissions, ensure the TinyMCE content is saved.
        $(document).on('submit', 'form', function () {
            if (typeof tinyMCE !== 'undefined' && tinyMCE.activeEditor) {
                tinyMCE.activeEditor.save();
            }
        });
    });
})(jQuery);


