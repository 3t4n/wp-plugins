const filerobot_loader = jQuery('.filerobot__loader');
const filerobot_message = jQuery('.filerobot__message');
const filerobot_test_connection = jQuery('.filerobot__test__connection');
const filerobot_sync_status = jQuery('.filerobot__sync__status');
const filerobot_sync_force = jQuery('.filerobot__sync__force');

const close_message = jQuery('.filerobot_notices .close .dashicons');
const notice_message = jQuery('.filerobot_notices');

jQuery(function () {

    var total_up       = 0;
    var total_down     = 0;
    var done_up        = 0;
    var done_down      = 0;
    var up_succeeded   = 0;
    var down_succeeded = 0;

    filerobot_test_connection.on('click', function () {

        const data = {
            filerobot_token: jQuery('input[name=filerobot_token]').val(),
            filerobot_sec_id: jQuery('input[name=filerobot_sec_id]').val(),
            filerobot_endpoint: jQuery('input[name=filerobot_endpoint]').val(),
            filerobot_container: jQuery('input[name=filerobot_container]').val(),
            action: 'filerobot_test_connection'
        };

        filerobot_loader.hide();
        filerobot_test_connection.prop('disabled', true);

        jQuery.ajax({
            type: 'POST',
            url: ajaxurl,
            data: data,
            dataType: 'html'
        }).done(function (res) {
            res = JSON.parse(res);
            reinit_message();
            jQuery('.filerobot_notices .message p').text(res.message);
            jQuery('.filerobot_notices .icon .dashicons').addClass(res.type);
            notice_message.show();
            filerobot_test_connection.prop('disabled', false);
        });
    });

    filerobot_sync_status.on('click', function () {

        const data = {
            action: 'filerobot_sync_status'
        };

        filerobot_loader.hide();
        filerobot_sync_status.prop('disabled', true);

        jQuery.ajax({
            type: 'POST',
            url: ajaxurl,
            data: data,
            dataType: 'html'
        }).done(function (res) {
            res = JSON.parse(res);
            reinit_message();
            jQuery('.filerobot_notices .message p').text(res.message);
            jQuery('.filerobot_notices .icon .dashicons').addClass(res.type);
            notice_message.show();
            filerobot_sync_status.prop('disabled', false);
        });
    });

    filerobot_sync_force.on('click', function () {

        sync_init();
        filerobot_sync_force.prop('disabled', true);

        jQuery.ajax({
            type: 'POST',
            url: ajaxurl,
            data: {action: 'filerobot_get_totals_to_sync'},
        }).done(function (res) {
            var res = JSON.parse(res);

            if (res.unready)
            {
                sync_reinit();
                return;
            }

            total_up   = res.up;
            total_down = res.down;

            sync_down(Date.now());
        });
    });

    function sync_down(timestamp)
    {
        jQuery.ajax({
            type: 'POST',
            url: ajaxurl,
            data: {action: 'filerobot_sync_down', timestamp: timestamp},
            async: true,
            success: function(res) {

                var res         = JSON.parse(res);
                done_down      += parseInt(res.done);
                down_succeeded += parseInt(res.succeeded);

                if (done_down < total_down) 
                {
                    jQuery("#down_progress .bar").width( done_down/total_down * jQuery("#down_progress").width() );
                    sync_down(timestamp);
                }

                if (done_down >= total_down) 
                {
                    jQuery("#down_progress .bar").width( jQuery("#down_progress").width() );
                    jQuery("#down_succeeded").text('Succeeded ' + down_succeeded + '/' + done_down);

                    sync_up(Date.now());
                    sync_reinit();
                }
            }
        });
    }
    function sync_up(timestamp)
    {
        jQuery.ajax({
            type: 'POST',
            url: ajaxurl,
            data: {action: 'filerobot_sync_up', timestamp: timestamp},
            async: true,
            success: function(res) {

                var res       = JSON.parse(res);
                done_up      += parseInt(res.done);
                up_succeeded += parseInt(res.succeeded);

                if (done_up < total_up) 
                {
                    jQuery("#up_progress .bar").width( done_up/total_up * jQuery("#up_progress").width() );
                    sync_up(timestamp);
                }

                if (done_up >= total_up) 
                {
                    jQuery("#up_progress .bar").width( jQuery("#up_progress").width() );
                    jQuery("#up_succeeded").text('Succeeded ' + up_succeeded + '/' + done_up);

                    sync_reinit();
                }
            }
        });
    }
    function sync_init()
    {
        filerobot_sync_force.prop('disabled', false);

        total_up       = 0;
        total_down     = 0;
        done_up        = 0;
        done_down      = 0;
        up_succeeded   = 0;
        down_succeeded = 0;

        jQuery(".progress .bar").width(0);
        jQuery("#up_succeeded").text('');
        jQuery("#down_succeeded").text('');
    }
    function sync_reinit()
    {
        if (done_up >= total_up && done_down >= total_down)
        {
            total_up       = 0;
            total_down     = 0;
            done_up        = 0;
            done_down      = 0;
            up_succeeded   = 0;
            down_succeeded = 0;

            filerobot_sync_force.prop('disabled', false);
        }
    }

    jQuery(window).on("resize", function() {

        var down_progress = 0;
        var up_progress   = 0;

        if (done_down == 0 && total_down == 0)
        {
            down_progress = 1;
        }
        else
        {
            down_progress = done_down/total_down;
        }

        if (done_up == 0 && total_up == 0)
        {
            up_progress = 1;
        }
        else
        {
            up_progress = done_up/total_up;
        }

        jQuery("#down_progress .bar").width( down_progress*jQuery("#down_progress").width() );
        jQuery("#up_progress .bar").width( up_progress*jQuery("#up_progress").width() );
    });

    close_message.on('click', function () {
        reinit_message();

        notice_message.hide();
    });
    function reinit_message()
    {
        if ( jQuery('.filerobot_notices .icon .dashicons').hasClass('dashicons-yes-alt') )
        {
            jQuery('.filerobot_notices .icon .dashicons').removeClass('dashicons-yes-alt');
        }

        if ( jQuery('.filerobot_notices .icon .dashicons').hasClass('dashicons-no') )
        {
            jQuery('.filerobot_notices .icon .dashicons').removeClass('dashicons-no');
        }

        jQuery('.filerobot_notices .message p').empty();
    }
});

// Fix Media Library, List view mode, Image thumbnail display size
jQuery(document).ready(function() {
    var list_view_images = jQuery("table.wp-list-table span.media-icon.image-icon img");

    if (list_view_images.length > 0)
    {
        list_view_images.each(function() {
            var img_class = jQuery(this).attr("class");
            var size_definition = '';

            if ( match1 = img_class.match(/attachment-(\w+)x(\w+)/g) )
            {
                size_definition = match1[0].replace('attachment-', '').split('x');
            }
            else if ( match2 = img_class.match(/size-(\w+)x(\w+)/g) ) 
            {
                size_definition = match2[0].replace('attachment-', '').split('x');
            }

            if (size_definition !== '')
            {
                jQuery(this).attr("width", size_definition[0]);
                jQuery(this).attr("height", size_definition[1]);
            }
        });
    }

    if (window.location.href.indexOf("page=scaleflex-dam") > -1)
    {
        jQuery('#toplevel_page_filerobot .wp-submenu-wrap li').removeClass('current');
        jQuery('#toplevel_page_filerobot .wp-submenu-wrap li:nth-child(2)').addClass('current');
    }

    if (window.location.href.indexOf("page=scaleflex-dam&tab=settings") > -1)
    {
        jQuery('#toplevel_page_filerobot .wp-submenu-wrap li').removeClass('current');
        jQuery('#toplevel_page_filerobot .wp-submenu-wrap li:nth-child(3)').addClass('current');
    }
    
    if (window.location.href.indexOf("page=scaleflex-dam&tab=logs") > -1)
    {
        jQuery('#toplevel_page_filerobot .wp-submenu-wrap li').removeClass('current');
        jQuery('#toplevel_page_filerobot .wp-submenu-wrap li:nth-child(4)').addClass('current');
    }
    
    if (window.location.href.indexOf("page=scaleflex-dam&tab=support") > -1)
    {
        jQuery('#toplevel_page_filerobot .wp-submenu-wrap li').removeClass('current');
        jQuery('#toplevel_page_filerobot .wp-submenu-wrap li:nth-child(5)').addClass('current');
    }
});
