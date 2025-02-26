jQuery(document).ready(function ($) {
    function awsa_post_action_change_handler(e) {
        var el = typeof e.currentTarget !== 'undefined' ? e.currentTarget : e;
        var v_id = $(el).val();
        if (v_id.length === 0) return;
        var p = jQuery(el).parents('.aw-form');

        $('.awsa-post-actions-box-properties > p', p).addClass('hidden');
        $('.awsa-post-actions-box-properties', p).find('input').prop('disabled', true);
        $('.awsa-post-actions-box-properties', p).find('p#' + v_id).removeClass('hidden');
        $('.awsa-post-actions-box-properties', p).find('p#' + v_id + ' input').prop('disabled', false);

    }

    $('.awsa-post-action').on('change', awsa_post_action_change_handler);
    $.each($('.awsa-post-action'), function (i, v) {
        awsa_post_action_change_handler(v);
    });

    $('.awsa-post-ajax-actions').on('click', function (e) {
        var btn = e.currentTarget;
        var form = jQuery(btn).parents('.aw-form');
        var p = jQuery(btn).parents('form');

        var post_action = $('.awsa-post-action', form).val();
        if (post_action.length === 0) {
            alert('لطفا یک عملیات را انتخاب کنید');
            return false;
        }

        var post_id = $('.awsa-post-action', form).data('post-id');
        var inputs = $('.awsa-post-actions-box-properties #' + post_action + ' [name^="awsa-actions-properties"]', form);
        var ddata = {};
        $.each(inputs, function (i, v) {
            var tagName = $(v).prop('tagName');
            if (tagName === 'INPUT') {
                var inputType = $(v).prop('type');
                switch (inputType) {
                    case 'checkbox':
                        ddata[$(v).data('id')] = $(v).is(':checked') ? 1 : 0;
                        break;
                    default:
                        ddata[$(v).data('id')] = $(v).val();
                        break;
                }
            } else {
                ddata[$(v).data('id')] = $(v).val();
            }
        });

        ddata['nonce'] = $('#_awpanonce', form).val();
        ddata['post_id'] = post_id;

        $.post(
            awsa_script_data.awsa_ajaxurl,
            {
                action: 'aw-admin-actions-ajax-process',
                post_action: post_action,
                data: ddata
            },
            function (r) {
                awsa_ajax_process(p, form, r);
                /*
                if(r.success == true){
                    switch(post_action){
                        case 'update-post-status':
                            $("#"+r.target+" .inside").html(r.html);
                               window.scrollTo($("#"+r.target), 1000);									
                        break;
                    }
                }
                */
            }
        );
        return false;
    });
});
