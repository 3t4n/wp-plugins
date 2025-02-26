jQuery(document).ready(function () {
    $body = jQuery("body");



    function gate() {
        $body.addClass("loading");

        var oauth_access_token = jQuery("#oauth_access_token").val();
        var oauth_access_secret = jQuery("#oauth_access_secret").val();
        var consumer_key = jQuery("#consumer_key").val();
        var consumer_secret = jQuery("#consumer_secret").val();
        var feed_item_count = jQuery("#items_returned").val();
        var auxi_tw_username = jQuery("#auxi_tw_username").val();
        var auxi_verif=jQuery("#auxi-verif").val();

        jQuery.ajax({
            type: 'POST',
            url: "/wp-admin/admin-ajax.php",
            data: {
                action: 'auxiadmin',

                oauth_access_token: oauth_access_token,
                oauth_access_secret: oauth_access_secret,
                consumer_key: consumer_key,
                consumer_secret: consumer_secret,
                feed_item_count: feed_item_count,
                auxi_tw_username:auxi_tw_username,
                security:auxi_verif
 //               auxi_string: 'X2F1eGlfdmVyaWZpY2F0aW9uX3N0cmluZ18=!'

            },

            success: function (value) {
                $body.removeClass("loading")
            }
        });
    }


    jQuery('#admin_settings_form').validate({// initialize the plugin
        rules: {
            oauth_access_token: {
                required: true,
                email: false,
                maxlength: 128
            },
            oauth_access_secret: {
                required: true,
                email: false,
                maxlength: 128
            }
            , consumer_key: {
                required: true,
                email: false,
                maxlength: 128
            },
            consumer_secret: {
                required: true,
                email: false,
                maxlength: 128
            },
            auxi_tw_username: {
                required: true,
                email: false,
                maxlength: 128
            },

            submitHandler: function (form) { // for demo

            }

        }
    });
    jQuery('#auxi_submit').click(function () {
        if (jQuery('#admin_settings_form').valid()) {
            gate();
        } else {

        }
    });


});


