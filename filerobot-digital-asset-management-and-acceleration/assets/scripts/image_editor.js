window.wp = window.wp || {};

(function (exports, $) {
    wp.media.view.Attachment.Details.prototype.attributes = function () {
        return {
            'tabIndex': 0,
            'data-id': this.model.get('id')
        };
    };

    // Add media dialog
    $.initialize(".attachment-actions", function () {
        var attachment_actions = $(this);
        attachment_actions.empty();

        var attachment_details = attachment_actions.parents('.attachment-details');
        var attachment_id = attachment_details.data('id');

        var filerobot_edit_attachment_button = attachment_details.parent().find('.filerobot-edit-attachment');

        if (!attachment_id || attachment_details.length < 1 || filerobot_edit_attachment_button.length > 0) {
            return;
        }

        var filerobot_edit_attachment_button = jQuery('<a href="javascript:void(0);" class="button filerobot-edit-attachment" data-attachment-id="' + attachment_id + '">Filerobot Editor</a>');
        attachment_actions.append(filerobot_edit_attachment_button);

        filerobot_edit_attachment_button.click(function () {
            var $self = $(this);
            var attachment_id = $self.data('attachmentId');

            window.filerobot_open_editor(attachment_id);
        });
    });

    window.filerobot_open_editor = function (attachment_id) {
        var filerobot_edit_attachment_frame = wp.media.frames.filerobot_edit_attachment_frame = wp.media({
            button: {},
            title: filerobot_image_editor_params.title,
            toolbar: null
        });

        filerobot_edit_attachment_frame.on('open', function () {

            var $el = filerobot_edit_attachment_frame.$el;
            var $attachment_frame = $el.parent().parent();

            $attachment_frame.find('.edit-media-header').hide();
            $attachment_frame.find('.media-frame-router').remove();
            $attachment_frame.find('.media-frame-toolbar').remove();
            $attachment_frame.find('.media-frame-content').css({
                'overflow': 'hidden',
                'top': '50px',
                'bottom': '0px'
            });

            $attachment_frame.find('.media-frame-content').html('<iframe src="' + filerobot_image_editor_params.wp_admin_url + 'admin.php?page=scaleflex-dam-image-edit&id=' + attachment_id + '" id="filerobot-editor-frame" frameborder="0" style="width: 100%; height: 100%; border: none;"></iframe>');
        });

        filerobot_edit_attachment_frame.on('close', function () {
            console.log('On close FR IMG Editor');
            //if ($('#post_type').length > 0 && $('#post_type').val() == "attachment") {
                window.location.reload();
            //}
            // jQuery('.media-modal .media-modal-close').trigger('click');
        });
        filerobot_edit_attachment_frame.open();
    }

    // Edit media, Replace dialog
    $.initialize(".media-frame-content .embed-media-settings .actions", function () {
        var attachment_actions = $(this);
        var edit_button = jQuery(attachment_actions).find('.edit-attachment.button');
        var replace_button = jQuery(attachment_actions).find('.replace-attachment.button');

        if (edit_button.length > 0) {
            edit_button.remove();
        }

        if (replace_button.length > 0) { //@Todo: Do this the easy way now as so
            replace_button.remove();
        }
        console.log('edit image');

        // if (attachment_actions.find('.filerobot-edit-attachment').length === 0)
        // { // Imitate wp-includes\js\media-models.php::sync -> includes/ajax-actions.php::wp_ajax_get_attachment
        //   attachment_id = 1809; //@Todo: Dont hardcode
        //   var filerobot_edit_attachment_button = jQuery('<a href="javascript:void(0);" class="button filerobot-edit-attachment" data-attachment-id="'+attachment_id+'">Filerobot Editor</a>');
        //   attachment_actions.append(filerobot_edit_attachment_button);
        // }
        //@Todo: Finish Properly
        // filerobot_edit_attachment_button.click(function () {
        //   window.filerobot_open_editor(attachment_id);
        // });
    });

    // Add media, Edit Image link
    $.initialize(".media-sidebar.visible .attachment-details.save-ready", function () {
        jQuery('.edit-attachment').hide();//@Todo: Do this the easy way now as so. Replace this Edit Image link with FR Image Editor later if really preferred.
    });
})(wp, jQuery);
