jQuery(document).ready(function($) {
    /*
     * create search bar in show event option
     */
    $('tr.enba_countdown_event select').select2();

    /*
     *  Show Specific Page option only when specific page selected in apply on option
     */
    var apply_on = $('tr.enba_apply_on select').val();
    if (apply_on == 'specific_page') {
        $('tr.enba_specific_page').show();
    } else {
        $('tr.enba_specific_page').hide();
    }
    $('tr.enba_countdown_event .select2-container').css('width', '25em');
    $('tr.enba_apply_on select').change(function() {
        var apply_on = $('tr.enba_apply_on select').val();
        if (apply_on == 'specific_page') {
            $('tr.enba_specific_page').show();
        } else {
            $('tr.enba_specific_page').hide();
        }

    })

    /*
     *  Show Date format option only when show date is true
     */
    var enba_show_date = $("input[name='enba_general_settings[enba_show_date]']:checked").val();
    if (enba_show_date == 'yes') {
        $('tr.enba_date_format').show();
    } else {
        $('tr.enba_date_format').hide();
    }
    $('tr.enba_show_date').change(function() {
        var enba_show_date = $("input[name='enba_general_settings[enba_show_date]']:checked").val();
        if (enba_show_date == 'yes') {
            $('tr.enba_date_format').show();
        } else {
            $('tr.enba_date_format').hide();
        }

    })

    /*
     * Show Scroll Height option only when behavior is Scroll 
     */
    var apply_on = $('tr.enba_behavior select').val();
    if (apply_on == 'scroll') {
        $('tr.enba_scroll_height').show();
    } else {
        $('tr.enba_scroll_height').hide();
    }
    $('tr.enba_behavior select').change(function() {
            var apply_on = $('tr.enba_behavior select').val();
            if (apply_on == 'scroll') {
                $('tr.enba_scroll_height').show();
            } else {
                $('tr.enba_scroll_height').hide();
            }

        })
        /*
         *  END Scroll option
         */

    /*
     *  Disable Banner Layout option
     */
    $("tr.enba_layout option[value!='style-1']").attr("disabled", "disabled");

    $("tr.enba_position option").filter("[value='left'], [value='right']").attr('disabled', 'disabled');

    $("tr.enba_apply_on option[value!='everywhere'][value!='specific_page']").attr("disabled", "disabled");

    $('tr.enba_layout select').css("cursor", 'pointer');

    $("tr.enba_show_event option[value!='select_event_to_show']").attr("disabled", "disabled");



});