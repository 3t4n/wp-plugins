(function ($, w) {
    'use strict';

    //console.log('backend')
    function ajax_preview_wp_loading() {
        let duration = $(document).find('[name="carbon_fields_compact_input[_wp_loading_duration]"]').val() || 1000
        let layout = $(document).find('[name="carbon_fields_compact_input[_wp_loading_select_layout]"]').val()
        $.ajax({
            type: "post",
            url: WP_PL_OBJ.ajax_url,
            dataType: 'json',
            data: {
                action: "wp_loading_get_data_preview",
                layout: layout
            },
            beforeSend() {
            },
            success(result) {
                $('.wp-loader-preview').html(result.data).show();
                setTimeout(function () {
                    $('.wp-loader-preview .loader-wrap').addClass('available');
                }, parseInt(duration));
            },
            error(e) {
                console.error(e)
            },
            complete() {
                //console.log('complete')
            }
        });
    }

    $(w).on('load', function () {
        $(document).find('.toplevel_page_wp_loading_page_options #publishing-action #publish')
        .before('<button type="button" id="preview" class="button button-large"><abbr title="Currently, preview only works with the default color style.">Preview</abbr></button> ');
        $(document).find('.toplevel_page_wp_loading_page_options #publishing-action #preview')
        .on('click', function (e) {
            //console.log(e)
            ajax_preview_wp_loading();
        });

    })
})(jQuery, window);
