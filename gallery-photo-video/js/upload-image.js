jQuery(function(jQuery) {
    
    var file_frame,
            GPV_gallery = {
        admin_thumb_ul: '',
        init: function() {
            this.admin_thumb_ul = jQuery('#GPV-gallery');
            this.admin_thumb_ul.sortable({
                placeholder: '',
				revert: true,
            });
            this.admin_thumb_ul.on('click', '#GPV-remove-image', function() {
                if (confirm('Are you sure you want to delete this?')) {
                    jQuery(this).parent().fadeOut(1000, function() {
                        jQuery(this).remove();
                    });
                }
                return false;
            });
            
            jQuery('#GPV-add-new').on('click', function(event) {
                event.preventDefault();
                if (file_frame) {
                    file_frame.open();
                    return;
                }

                file_frame = wp.media.frames.file_frame = wp.media({
                    title: jQuery(this).data('uploader_title'),
                    button: {
                        text: jQuery(this).data('uploader__content'),
                    },
                    multiple: true
                });

                file_frame.on('select', function() {
                    var images = file_frame.state().get('selection').toJSON(),
                            length = images.length;
                    for (var i = 0; i < length; i++) {
                        GPV_gallery.get_thumbnail(images[i]['id']);
                    }
                });
                file_frame.open();
            });
			
			jQuery('#GPV-all-images-trash').on('click', function() {
                if (confirm('Are you sure you want to delete all the image slides?')) {
                    GPV_gallery.admin_thumb_ul.empty();
                }
                return false;
            });
           
        },
        get_thumbnail: function(id, cb) {
            cb = cb || function() {
            };
            var data = {
                action: 'GPV_get_thumbnail',
                IMAGEARRAY: id
            };
            jQuery.post(ajaxurl, data, function(response) {
                GPV_gallery.admin_thumb_ul.prepend(response);
                cb();
            });
        },
        get_all_thumbnails: function(post_id, included) {
            var data = {
                action: 'rpggallery_get_all_thumbnail',
                post_id: post_id,
                included: included
            };
            jQuery('#rpggallery_spinner').show();
            jQuery.post(ajaxurl, data, function(response) {
                GPV_gallery.admin_thumb_ul.prepend(response);
                jQuery('#rpggallery_spinner').hide();
            });
        }
    };
    GPV_gallery.init();
});