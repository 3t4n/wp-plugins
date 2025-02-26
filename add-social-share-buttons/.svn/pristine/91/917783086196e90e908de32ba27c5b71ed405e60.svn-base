(function($) {
    "use strict";
    $(window).load(function() {

        $("#sortable").sortable({
            opacity: 0.6,
            cursor: 'move'
        });

        var get_post_option_data = get_post_option_share.optionsarray;
        if (get_post_option_data != '') {
            var configpost = {
                '.chosen-select-post': {},
                '.chosen-select-deselect': {allow_single_deselect: true},
                '.chosen-select-no-single': {disable_search_threshold: 10},
                '.chosen-select-no-results': {no_results_text: 'Oops, nothing found!'},
                '.chosen-select-width': {width: "95%"}
            }
            for (var selectorpost in configpost) {
                jQuery(selectorpost).chosen(configpost[selectorpost]);
            }

            var selectedPostArray = JSON.parse(get_post_option_data);
            var selectedPostglobalarr = [];
            for (var p in selectedPostArray) {
                selectedPostglobalarr.push(selectedPostArray[p]);
            }

            var postString = '';
            postString = selectedPostglobalarr.join(",");
            if (postString != '') {
                jQuery.each(postString.split(","), function(p, r) {
                    jQuery(".form-table td select#post_type option[value='" + jQuery.trim(r) + "']").prop("selected", true);
                    jQuery('.form-table td select#post_type').trigger('chosen:updated');
                });
            }
        }



        jQuery("#chosen_button_place").chosen();

        jQuery("#share_icon_size").chosen();

        jQuery("#whatsapp_share_plugin_form_id").validate({
            // Specify the validation rules
            rules: {
                facebook_api_key: "required",
            },
            // Specify the validation error messages
            messages: {
                facebook_api_key: "Please enter your Facebook API key",
            },
            submitHandler: function(form) {
                form.submit();
            }
        });


        var onloadButtonSize = $('.check_button_size').attr('value');

        if (onloadButtonSize == 'small') {
            var get_small_icon_html = $('.button_small_icon_html').html();
            $('.display_added_services').html('');
            $('.display_added_services').html(get_small_icon_html);
        } else if (onloadButtonSize == 'medium') {
            var get_medium_icon_html = $('.button_medium_icon_html').html();
            $('.display_added_services').html('');
            $('.display_added_services').html(get_medium_icon_html);
        } else if (onloadButtonSize == 'large') {
            var get_large_icon_html = $('.button_large_icon_html').html();
            $('.display_added_services').html('');
            $('.display_added_services').html(get_large_icon_html);
        }


        $('body').on('change', '.check_button_size', function() {
            var checkedValue = $(this).attr('value');
            if (checkedValue == 'small') {
                var get_small_icon_html = $('.button_small_icon_html').html();
                $('.display_added_services').html('');
                $('.display_added_services').html(get_small_icon_html);
            } else if (checkedValue == 'medium') {
                var get_medium_icon_html = $('.button_medium_icon_html').html();
                $('.display_added_services').html('');
                $('.display_added_services').html(get_medium_icon_html);
            } else if (checkedValue == 'large') {
                var get_large_icon_html = $('.button_large_icon_html').html();
                $('.display_added_services').html('');
                $('.display_added_services').html(get_large_icon_html);
            }
        });

        $('body').on('click', '#add_share_service', function() {
            $("#display_all_services").dialog({
                width: 700,
                height: 300,
            });
        });
        $('body').on('click', '#reorder_share_service', function() {
            $("#reorder_all_services").dialog({
                width: 700,
                height: 300,
            });
        });
    });

})(jQuery);