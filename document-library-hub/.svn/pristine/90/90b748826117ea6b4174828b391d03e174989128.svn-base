jQuery(function($) {
    $(document).ready(function() {
        // Toggle fields based on file source selection
        $('input[name="dlhp_document_file_source"]').on('change', function() {
            if ($(this).val() === 'media') {
                $('#media-file-fields').show();
                $('#external-file-fields').hide();
            } else {
                $('#media-file-fields').hide();
                $('#external-file-fields').show();
            }
        });

        // Media uploader for the "Upload File" button
        $('#upload_file_button').on('click', function(e) {
            e.preventDefault();

            let fileFrame = wp.media({
                title: 'Select or Upload Document File',
                button: {
                    text: 'Use this file'
                },
                multiple: false
            });

            // When a file is selected, get the URL
            fileFrame.on('select', function() {
                const attachment = fileFrame.state().get('selection').first().toJSON();
                $('#dlhp_document_file_url').val(attachment.url);
            });

            // Open the media uploader
            fileFrame.open();
        });
    });
});
