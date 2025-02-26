if (rkns_js.isset(rkns_js.global, 'request_params', 'page') && rkns_js.global.request_params.page === "visitors") {

    // TickBox
    jQuery(document).on('click', "div#visitors-filter", function (e) {
        e.preventDefault();

        // Show
        tb_show('', '#TB_inline?&width=430&height=668&inlineId=visitors-filter-popup');

        // Add Content
        setTimeout(function () {

            var tickBox_DIV = "#rkns-visitors-filter-form";
            if (!rkns_js.exist_tag(tickBox_DIV + " input[type=submit]")) {

                // Set PlaceHolder
                jQuery(tickBox_DIV).html('<div style="height: 50px;"></div>' + rkns_js.line_placeholder(5));

                // Check Use Cached Data
                var filter_data = localStorage.getItem('rankology-stats-visitors-filter') ? JSON.parse(localStorage.getItem('rankology-stats-visitors-filter')) : {};
                if (!rkns_js.isset(filter_data, 'timestamp') || !rkns_js.isset(filter_data, 'value') || (rkns_js.isset(filter_data, 'timestamp') && rkns_js.isset(filter_data, 'value') && (new Date().getTime().toString() > parseInt(filter_data.timestamp)))) {

                    // Create Params
                    let params = {
                        'rkns_nonce': rkns_js.global.rest_api_nonce,
                        'action': 'rankology_stats_visitors_page_filters'
                    };
                    params = Object.assign(params, rkns_js.global.request_params);

                    // Create Ajax
                    jQuery.ajax({
                        url: rkns_js.global.admin_url + 'admin-ajax.php',
                        type: 'GET',
                        dataType: "json",
                        data: params,
                        timeout: 30000,
                        success: function (data) {

                            // Set LocalStorage , Cached for 3 Hour
                            localStorage.setItem('rankology-stats-visitors-filter', JSON.stringify({
                                value: data,
                                timestamp: (new Date().getTime() + (6 * 60 * 60 * 1000))
                            }));

                            // Load function
                            rankology_stats_show_visitors_filter(tickBox_DIV, data);
                        },
                        error: function (xhr, status, error) {
                            jQuery("span.tb-close-icon").click();
                        }
                    });
                } else {
                    rankology_stats_show_visitors_filter(tickBox_DIV, filter_data['value']);
                }

            }
        }, 500);

    });

    // submit and disable empty value
    var FORM_ID = '#rankology_stats_visitors_filter_form';
    jQuery(document).on('submit', FORM_ID, function () {

        //Validate DatePicker
        var FROM_DATE = jQuery(FORM_ID + " input[name=date-from]");
        var TO_DATE = jQuery(FORM_ID + " input[name=date-to]");
        if ((FROM_DATE.val().length > 0 && TO_DATE.val().length < 1) || (FROM_DATE.val().length < 1 && TO_DATE.val().length > 1)) {
            alert(rkns_js._('er_datepicker'));
            return false;
        }

        // Check IS IP
        var Input_IP = jQuery(FORM_ID + " input[name=ip]").val();
        if (Input_IP.length > 0 && rkns_js.isIP(Input_IP) === false) {
            alert(rkns_js._('er_valid_ip'));
            return false;
        }

        // Disable DatePicker
        jQuery("input[data-rkns-date-picker]").prop('disabled', true);

        // Remove Empty Parameter
        let forms = {
            'input': ['date-from', 'date-to', 'ip'],
            'select': ['agent', 'platform', 'location', 'referrer', 'user_id']
        };
        Object.keys(forms).forEach(function (type) {
            forms[type].forEach((name) => {
                let input = jQuery(FORM_ID + " " + type + "[name=" + name + "]");
                if (input.val().length < 1) {
                    input.prop('disabled', true);
                    ['from', 'to'].forEach((key) => {
                        if (name == "date-" + key) {
                            jQuery(FORM_ID + " input[name=" + key + "]").prop('disabled', true);
                        }
                    });
                }
            });
        });

        // Set Order
        let order = rkns_js.getLinkParams('order');
        if (order != null) {
            jQuery(this).append('<input type="hidden" name="order" value="' + order + '" /> ');
        }

        // Show Loading
        jQuery("span.filter-loading").html(rkns_js._('please_wait'));

        return true;
    });

    // Show Filter form
    function rankology_stats_show_visitors_filter(tickBox_DIV, data) {

        // Create Table
        let html = '<table class="o-table">';

        // Show List Select
        let select = {
            /**
             * Key: global i18n
             * [0]: select name
             * [1]: data key from ajax
             */
            'browsers': ['agent', 'browsers'],
            'country': ['location', 'location'],
            'platform': ['platform', 'platform'],
            'referrer': ['referrer', 'referrer'],
            'user': ['user_id', 'users']
        };

        Object.keys(select).forEach((key) => {
            html += `<tr><td>${rkns_js._(key)}</td></tr>`;
            html += `<tr><td><select name="${select[key][0]}" class="select2 rkns-width-100" data-type-show="select2">`;
            html += `<option value=''>${rkns_js._('all')}</option>`;
            let current_value = rkns_js.getLinkParams(select[key][0]);
            Object.keys(data[select[key][1]]).forEach(function (item) {
                html += `<option value='${item}' ${((current_value != null && current_value == item) ? `selected` : ``)}>${data[select[key][1]][item]}</option>`;
            });
            html += `</select></td></tr>`;
        });

        // Add IP
        html += `<tr><td>${rkns_js._('ip')}</td></tr>`;
        html += `<tr><td><input name="ip" value="${(rkns_js.getLinkParams('ip') != null ? rkns_js.getLinkParams('ip') : ``)}" class="rkns-width-100" placeholder='xxx.xxx.xxx.xxx' autocomplete="off"></td></tr>`;

        // Add Date
        html += `<tr><td>${rkns_js._('date')}</td></tr>`;
        let input_date_style = 'width: calc(50% - 5px);display: inline-block;';
        html += `<tr>
                            <td>
                                <div style="${input_date_style}">${rkns_js._('from')}: <input name="date-from" data-rkns-date-picker="from" value="${(rkns_js.getLinkParams('from') != null ? rkns_js.getLinkParams('from') : ``)}" style="width: calc(100% - 5px);" placeholder="YYYY-MM-DD" autocomplete="off"></div>
                                <div style="${input_date_style}">${rkns_js._('to')}: <input name="date-to" data-rkns-date-picker="to" value="${(rkns_js.getLinkParams('to') != null ? rkns_js.getLinkParams('to') : ``)}" style="width: 100%;" placeholder="YYYY-MM-DD" autocomplete="off"></div>
                                <input type="hidden" name="from" id="date-from" value="${(rkns_js.getLinkParams('from') != null ? rkns_js.getLinkParams('from') : ``)}">
                                <input type="hidden" name="to" id="date-to" value="${(rkns_js.getLinkParams('to') != null ? rkns_js.getLinkParams('to') : ``)}">
                            </td>
                            </tr>`;

        // Submit Button
        html += `<tr><td></td></tr>`;
        html += `<tr><td><input type="submit" value="${rkns_js._('filter')}" class="button-primary"> &nbsp; <span class="filter-loading"></span></td></tr>`;
        html += `</table>`;
        jQuery(tickBox_DIV).html(html);

        // Set datePicker and Select 2
        setTimeout(function () {
            rkns_js.date_picker();
            rkns_js.select2();
        }, 200);
    }
}

// When close TickBox
//jQuery(window).bind('tb_unload', function () {});
