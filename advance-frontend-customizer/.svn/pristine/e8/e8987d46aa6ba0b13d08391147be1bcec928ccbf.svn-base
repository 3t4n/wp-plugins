/*Admin side script */

(function ($) {
            jQuery.fn.wpMediaModal = function (options) {
                options = $.extend({
                    preview: false,
                    ids: false,
                    multiSelect: false,
                    modalTitle: "Select Image",
                    modalButton: "Select",

                    attachment_ids: ""
                }, options);

                var make = function () {
                    var slideshow_frame;
                    var $ids = jQuery('#' + options.ids);
                    var $preview = jQuery('#' + options.preview);

                    // Uploading files
                    jQuery(this).live('click', function (event) {

                        event.preventDefault();
                        // If the media frame already exists, reopen it.
                        if (slideshow_frame) {
                            slideshow_frame.open();
                            return;
                        }
                        // Create the media frame.
                        slideshow_frame = wp.media.frames.downloadable_file = wp.media({
                            title: options.modalTitle,
                            button: {
                                text: options.modalButton,
                            },
                            multiple: options.multiSelect
                        });

                        options.attachment_ids = $ids.val();
                        // When an image is selected, run a callback.
                        slideshow_frame.on('select', function () {
                            options.attachment_ids = $ids.val();
                            var selection = slideshow_frame.state().get('selection');
                            selection.map(function (attachment) {
                                attachment = attachment.toJSON();
                                if (attachment.id) {
                                    if (options.multiSelect) {
                                        options.attachment_ids = options.attachment_ids ? options.attachment_ids + "," + attachment.id : attachment.id;
                                    } else {
                                        options.attachment_ids = attachment.id;
                                        $preview.children('li.image').remove();
                                    }
                                    ;


                                    $preview.append('\<li class="image" data-attachment_id="' + attachment.id + '">\<img src="' + attachment.url + '" />\<span><a href="#" class="delete_slide" title="Delete image">Delete</a></span>\
                                                                            </li>');
                                }
                                $ids.trigger('selection');
                            });
                            $ids.val(options.attachment_ids);
                        });
                        // Finally, open the modal
                        slideshow_frame.open();
                    });
                    // Remove files
                    $preview.on('click', 'a.delete_slide', function () {

                        jQuery(this).closest('.image').remove();
                        options.attachment_ids = '';

                        $preview.find('.image')
                                .css('cursor', 'default')
                                .each(function () {
                                    var attachment_id = jQuery(this).attr('data-attachment_id');
                                    options.attachment_ids = options.attachment_ids + attachment_id + ',';
                                });

                        $ids.val(options.attachment_ids);
                        return false;
                    });

                };

                return this.each(make);
            };
        })(jQuery);

        jQuery(document).ready(function ($) {
            jQuery('.wpmediamodal').each(
                    function (index, element) {
                        jQuery(element).wpMediaModal({
                            ids: jQuery(this).attr("wpmediamodal-ids"),
                            //ids			: "extra_ct_img_ids",
                            preview: jQuery(this).attr("wpmediamodal-preview"),
                            multiSelect: jQuery(this).attr("wpmediamodal-multiSelect"),
                            modalTitle: jQuery(this).attr("wpmediamodal-modalTitle"),
                            modalButton: jQuery(this).attr("wpmediamodal-modalButton")
                        });
                    }
            );
        });