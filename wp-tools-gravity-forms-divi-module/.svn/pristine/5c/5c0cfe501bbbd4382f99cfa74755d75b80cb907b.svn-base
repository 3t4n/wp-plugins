jQuery(document).ready(function($) {
    $(document).on('click', '.notice-dismiss', function() {
        var notice = $(this).parent();
        var noticeData = notice.data('notice');
        
        if (noticeData === 'wpt_divi_gf_default_theme_check_notice') {
            $.ajax({
                url: wptGfDiviAjax.ajax_url,
                type: 'post',
                data: {
                    action: 'wpt_divi_gf_default_theme_check_notice'
                },
                success: function() {}
            });
        }
    });
});
