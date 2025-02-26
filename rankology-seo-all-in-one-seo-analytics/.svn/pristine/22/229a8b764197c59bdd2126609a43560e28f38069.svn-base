rkns_js.browsers_meta_box = {

    placeholder: function () {
        return rkns_js.circle_placeholder();
    },

    view: function (args = []) {

        // Create Html
        let html = '';

        // // Check Show Button Group
        // if (rkns_js.is_active('overview_page')) {
        //     html += rkns_js.btn_group_chart('browsers', args);
        //     setTimeout(function () {
        //         rkns_js.date_picker();
        //     }, 1000);
        // }

        // Add Chart
        html += '<div class="o-wrap"><div class="c-chart c-chart--limited-height"><canvas id="' + rkns_js.chart_id('browsers') + '" height="220"></canvas></div></div>';

        // show Data
        return html;
    },

    meta_box_init: function (args = []) {

        // Get Background Color
        let backgroundColor = [];
        let color;
        for (let i = 0; i <= 10; i++) {
            color = rkns_js.random_color(i);
            backgroundColor.push('rgba(' + color[0] + ',' + color[1] + ',' + color[2] + ',' + '0.4)');
        }

        // Prepare Data
        let data = [{
            label: rkns_js._('browsers'),
            data: args['browsers_value'],
            backgroundColor: backgroundColor
        }];

        // Show Chart
        rkns_js.pie_chart(rkns_js.chart_id('browsers'), args['browsers_name'], data);

        // Check Table information
        if (rkns_js.exist_tag('#' + rkns_js.getMetaBoxKey('browsers-table'))) {

            // Reset All Height
            ['browsers-table', 'browsers'].forEach((key) => {
                jQuery("#" + rkns_js.getMetaBoxKey(key) + " .inside").removeAttr("style");
            });

            // Show Table information
            let tbl = `<div class="title-center">${args.title}</div>
                    <table width="100%" class="o-table">
                        <tr>
                            <td class="rkns-text-muted">${rkns_js._('browser')}</td>
                            <td class="rkns-text-muted">${rkns_js._('visitor_count')}</td>
                            <td class="rkns-text-muted">${rkns_js._('percentage')}</td>
                        </tr>`;

            for (let i = 0; i < args.browsers_name.length; i++) {
                tbl += `
                 <tr>
                        <td>${args.browsers_name[i]}</td>
                        <td>${(parseInt(args.browsers_value[i]) > 0 ? `${args.info.agent[i] !== "other" ? `<a href="` + args.info.visitor_page + `&agent=` + args.info.agent[i] + `&from=` + args.from + `&to=` + args.to + `" target="_blank">` : ``} ${rkns_js.number_format(args.browsers_value[i])} ${(args.info.agent[i] !== "other") ? `</a>` : ``}` : args.browsers_value[i])}</td>
                        <td>${rkns_js.number_format((args.browsers_value[i] / args.total) * 100)}%</td>
                 </tr>
                `;
            }

            // Set Total
            tbl += ` <tr><td>${rkns_js._('total')}</td><td>${rkns_js.number_format(args.total)}</td><td></td></tr>`;
            tbl += `</table>`;
            jQuery("#" + rkns_js.getMetaBoxKey('browsers-table') + " .inside").html(tbl);

            // Set Equal Height
            rkns_js.set_equal_height('.postBox-table .inside', '.postBox-chart .inside');

            // Add Extra Browser List Version
            let html = '';
            for (let i = 0; i < args.browsers_name.length; i++) {
                if (parseInt(args.browsers_value[i]) > 0 && args.info.agent[i]) {
                    html += `<div class="rkns-title-group"><img src="${args.info.logo[i]}" alt="${args.browsers_name[i]}" style="vertical-align: -3px;" class="rkns-flag log-tools"> ${args.browsers_name[i]}</div><div class="wp-clearfix"></div>`;
                    html += rkns_js.Create_Half_PostBox('postBox-chart-' + args.info.agent[i], 'browser-' + args.info.agent[i] + '-chart');
                    html += rkns_js.Create_Half_PostBox('postBox-table-' + args.info.agent[i], 'browser-' + args.info.agent[i] + '-table');
                    html += `<div class="wp-clearfix"></div>`;
                }
            }

            // Set Html in Page
            jQuery(html).insertAfter("#browsers-table");

            // Load function to Get Meta Box
            for (let i = 0; i < args.browsers_name.length; i++) {
                if (parseInt(args.browsers_value[i]) > 0 && args.info.agent[i]) {
                    this.run_custom_browser(args.info.agent[i]);
                }
            }
        }
    },

    run_custom_browser: function (agent) {

        // Show Placeholder
        ['browser-' + agent + '-chart', 'browser-' + agent + '-table'].forEach((key) => {
            jQuery("#" + key + " .inside").css('height', '430px');
        });
        jQuery("#browser-" + agent + "-table .inside").html(rkns_js.placeholder());
        jQuery("#browser-" + agent + "-chart .inside").html(rkns_js.circle_placeholder());
        jQuery(".rkns-ph-picture").attr("style", "height: 310px;");

        //Prepare Params
        let params = {'name': 'browsers', 'browser': agent};
        ['from', 'to'].forEach((key) => {
            if (rkns_js.isset(rkns_js.global, 'request_params', key)) {
                params[key] = rkns_js.global.request_params[key];
            }
        });

        // Send Request
        rkns_js.ajaxQ(rkns_js.global.meta_box_api, params, 'show_custom_agent', 'error_custom_agent', 'GET', false);
    }
};

/**
 * Show Custom Browser Report
 *
 * @param args
 */
rkns_js.show_custom_agent = function (args) {

    // Get Browser Key
    var BrowserKey = args.info.agent[0];

    // Set Canvas Chart
    jQuery('#browser-' + BrowserKey + '-chart .inside').html(`<canvas id="` + rkns_js.chart_id('browser-' + BrowserKey) + `" height="220"></canvas>`);

    // After Second Run Chart JS
    setTimeout(function () {

        // Get Background Color
        let backgroundColor = [];
        let color;
        for (let i = 0; i <= 10; i++) {
            color = rkns_js.random_color(i);
            backgroundColor.push('rgba(' + color[0] + ',' + color[1] + ',' + color[2] + ',' + '0.4)');
        }

        // Prepare Data
        let data = [{
            label: rkns_js._('browsers'),
            data: args['browsers_value'],
            backgroundColor: backgroundColor
        }];

        // Show Chart
        rkns_js.pie_chart(rkns_js.chart_id('browser-' + BrowserKey), args['browsers_name'], data);

        // Reset All Height
        ['browser-' + BrowserKey + '-chart', 'browser-' + BrowserKey + '-table'].forEach((key) => {
            jQuery("#" + key + " .inside").removeAttr("style");
        });

        // Show Table information
        let tbl = `<div class="title-center">${args.title}</div>
                    <table width="100%" class="o-table">
                        <tr>
                            <td class="rkns-text-muted">${rkns_js._('version_list')}</td>
                            <td class="rkns-text-muted">${rkns_js._('visitor_count')}</td>
                            <td class="rkns-text-muted">${rkns_js._('percentage')}</td>
                        </tr>`;

        for (let i = 0; i < args.browsers_name.length; i++) {
            tbl += `
                 <tr>
                    <td>${args.browsers_name[i]}</td>
                    <td>${parseInt(args.browsers_value[i]) > 0 ? rkns_js.number_format(args.browsers_value[i]) : args.browsers_value[i]}</td>
                    <td>${rkns_js.number_format((args.browsers_value[i] / args.total) * 100)}%</td>
                </tr>
                `;
        }

        // Set Total
        tbl += ` <tr><td>${rkns_js._('total')}</td><td>${rkns_js.number_format(args.total)}</td><td></td></tr>`;
        tbl += `</table>`;
        let tbl_inside = "#browser-" + BrowserKey + "-table .inside";
        jQuery(tbl_inside).html(tbl);

        // Set Equal Height
        rkns_js.set_equal_height(tbl_inside, "#browser-" + BrowserKey + "-chart .inside");
    }, 500);
};

rkns_js.error_custom_agent = function (data) {
    // Do Stuff
};
