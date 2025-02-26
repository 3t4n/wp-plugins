jQuery(function ($) {
    $('body').on('click', '.socialmark_overlay_image_button', function (e) {
        e.preventDefault();
        let button = $(this),
            sm_uploader = wp.media({
                title: 'Select Overlay/Watermark Image',
                library: {
                    type: 'image'
                },
                button: {
                    text: 'Use this image'
                },
                multiple: false
            }).on('select', function () {
                var attachment = sm_uploader.state().get('selection').first().toJSON();
                $('#sm_overlay_image').val(attachment.url);
            })
                .open();
    });
    $('body').on('click', '.socialmark_post_image_button', function (e) {
        e.preventDefault();
        let button = $(this),
            sm_uploader = wp.media({
                title: 'Select Custom Social Image',
                library: {
                    type: 'image'
                },
                button: {
                    text: 'Use this image'
                },
                multiple: false
            }).on('select', function () {
                var attachment = sm_uploader.state().get('selection').first().toJSON();
                $('#socialmark_post_image').val(attachment.url);
            })
                .open();
    });

    $('body').on('click', '#socialmark_post_test', function (e) {
        let data = {
            'action': 'socialmark_post_test',
            'url': jQuery("#socialmark_post_test_url").val()
        };

        jQuery.ajax({
            type: "post", url: ajaxurl, data: data,
            success: function (response) {
                if (response == "failed" || response=="") {
                    jQuery("#socialmark_test_result").html('Failed: No og:image found for this post');
                    jQuery("#socialmark_test_result_url").val("");
                } else {
                    //response.replace(/\\/g, "");
                    obj = JSON.parse(response);
                    if(obj.length===1 && obj[0].includes("socialmark")){
                    jQuery("#socialmark_test_result").html("Passed: SocialMark is installed and working properly.");
                    }else{
                        jQuery("#socialmark_test_result").html("Failed: More than one or wrong og:image meta tags detected.");
                    }
                }
            },
            error: function (request, status, error) {
                jQuery("#socialmark_test_result").html('Failed: Something unexpected happened. Please try again');
                jQuery("#socialmark_test_result_url").val("");
            }
        });

    });
});
function smov_remove(id) {
    let data = {
        'action': 'socialmark_delete_overlay',
        'id': id,
        'socialmark_overlay_nonce': jQuery("#socialmark_overlay_nonce").val()
    };

    // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
    jQuery.post(ajaxurl, data, function (response) {
        if (response === "success") {
            jQuery(".sm-overlay-add-notice").html('<div class="notice notice-success is-dismissible"><p>Overlay/Watermark delete successfully.</p></div>');
            jQuery("#smov_" + id).remove();
        } else {
            jQuery(".sm-overlay-add-notice").html('<div class="notice notice-error is-dismissible"><p>Delete operation failed!</p></div>');
        }
    });

}
