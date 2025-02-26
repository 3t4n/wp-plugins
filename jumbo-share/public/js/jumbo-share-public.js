(function ($) {
    'use strict';

    $(window).load(function () {
        $('.jumbo-share-toggle').click(function () {
            $('.js-additional').toggle();
            $('.jumbo-share-toggle').toggle();
        });

        $(".js-button").click(function (e) {
            e.preventDefault();
            var w = 600;
            var h = 400;
            var title = 'Share';
            var href = $(this).attr('href');
            if (typeof(href) != 'undefined') {
                var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;
                var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;

                var width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
                var height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

                var left = ((width / 2) - (w / 2)) + dualScreenLeft;
                var top = ((height / 2) - (h / 2)) + dualScreenTop;
                var newWindow = window.open(href, title, 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);
                //window.open(href, "tweet", "height=300,width=550,resizable=1",'Share',windowFeatures);
            }

        });

        // Read statistics
        $('.jumbo_share_counter').each(function (i, obj) {
            var id = $(obj).data('id');
            $('#jumbo_share_loader_' + id).show();
            $(obj).hide();
            jQuery.ajax({
                url: jumbo_share.ajax_url,
                type: 'post',
                data: {
                    action: 'jumbo_share_stats',
                    post_id: id,
                },
                success: function (response) {
                    //alert(response);
                    $('#jumbo_share_loader_' + id).hide();
                    $(obj).html(response);
                    $(obj).fadeIn();
                },
                error: function (response) {
                    $('#jumbo_share_loader_' + id).hide();
                    $(obj).html(response);
                    $(obj).fadeIn();
                }
            });
        });
        /*$('.jumbo-share-loader').show();
         $('.jumbo_share_counter').hide();
         jQuery.ajax({
         url: jumbo_share.ajax_url,
         type: 'post',
         data: {
         action: 'jumbo_share_stats',
         post_id: jumbo_share.post_id,
         },
         success: function (response) {
         //alert(response);
         $('.jumbo-share-loader').hide();
         $('.jumbo_share_counter').fadeIn();
         $('.jumbo_share_counter').html(response);
         },
         error: function (response) {
         $('.jumbo-share-loader').hide();
         $('.jumbo_share_counter').fadeIn();
         $('.jumbo-share-loader').hide();
         }
         });*/
    });

})(jQuery);
