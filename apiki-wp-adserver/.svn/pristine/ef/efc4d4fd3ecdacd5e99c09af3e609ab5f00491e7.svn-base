// JavaScript Document
( function($) {

    $(function() {
        APIKI_WP_ADSERVER.init();
    });

    APIKI_WP_ADSERVER = {

        init : function() {
            APIKI_WP_ADSERVER.define_ad_type();
            APIKI_WP_ADSERVER.date_picker();
        },

        define_ad_type : function() {
            $('#ad_file').click(function() {
                $('#ad_type_file').attr('checked', 'checked');
            });
            $('#ad_text').click(function() {
                $('#ad_type_text').attr('checked', 'checked');
            });
            $('#ad_remote').click(function() {
                $('#ad_type_remote').attr('checked', 'checked');
            });
            $('#ad_type_text').click(function() {
                $('#ad_text').focus();
            });
            $('#ad_type_remote').click(function() {
                $('#ad_remote').focus();
            });
        },

        date_picker : function() {
            $('#ad_expiration_date').datePicker({startDate:'01/01/2007'});
        },

        delete_group : function(group_id, confirm_message) {
            var delete_group = confirm(confirm_message);
            if ( delete_group ) {
                $.post(apiki_wp_adserver_admin_ajax_url, { ajax_action : 'delete_group', group_id : group_id }, function(ajaxReturn) {
                    $('#group-' + group_id).fadeOut('slow', function() {
                        $(this).remove();
                    });
                });
            }
        },

        delete_ad : function(ad_id, confirm_message) {
            var delete_group = confirm(confirm_message);
            if ( delete_group ) {
                $.post(apiki_wp_adserver_admin_ajax_url, { ajax_action : 'delete_ad', ad_id : ad_id }, function(ajaxReturn) {
                    $('#ad-' + ad_id).fadeOut('slow', function() {
                        $(this).remove();
                    });
                });
            }
        }

    };

})(jQuery);