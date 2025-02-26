jQuery(document).ready(function($) {
    // Check if the page is loaded in the Thickbox overlay
    $(document).on('tb_show', function() {
        var url = $('#TB_iframeContent').attr('src');
        if (url && url.indexOf('overlay=1') !== -1) {
            // Hide the WordPress admin navigation and header
            $('#TB_iframeContent').on('load', function() {
                var iframe = $(this).contents();
                iframe.find('#wpadminbar, #adminmenuback, #adminmenuwrap, #adminmenushadow').hide();
                iframe.find('#wpcontent').css('margin-left', '0');
                iframe.find('#wpcontent, #wpfooter').css('padding-left', '0');
            });
        }
    });
});



jQuery(document).on('thickbox', function() {
    var iframe = jQuery('iframe#TB_iframeContent');
    if (iframe.length) {
        iframe.css({
            'width': '1028px',
            'height': '768px'
        });
    }
});