rkns_js.platforms_meta_box = {

    placeholder: function () {
        return rkns_js.circle_placeholder();
    },

    view: function (args = []) {

        // Create Html
        let html = '';

        // Check Show Button Group
        // if (rkns_js.is_active('overview_page')) {
        //     html += rkns_js.btn_group_chart('platforms', args);
        //     setTimeout(function () {
        //         rkns_js.date_picker();
        //     }, 1000);
        // }

        // Add Chart
        html += '<div class="o-wrap"><div class="c-chart c-chart--limited-height"><canvas id="' + rkns_js.chart_id('platforms') + '" height="220"></canvas></div></div>';

        // show Data
        return html;
    },

    meta_box_init: function (args = []) {

        // Get Background Color
        let backgroundColor = [];
        let color;
        for (let i = 0; i <= 20; i++) {
            color = rkns_js.random_color();
            backgroundColor.push('rgba(' + color[0] + ',' + color[1] + ',' + color[2] + ',' + '0.4)');
        }

        // Prepare Data
        let data = [{
            label: rkns_js._('platform'),
            data: args['platform_value'],
            backgroundColor: backgroundColor,
            tension: 0.4
        }];

        // Show Chart
        rkns_js.pie_chart(rkns_js.chart_id('platforms'), args['platform_name'], data);

        // Check Table information
        if (rkns_js.exist_tag('#' + rkns_js.getMetaBoxKey('platforms-table'))) {

            // Reset All Height
            ['platforms-table', 'platforms'].forEach((key) => {
                jQuery("#" + rkns_js.getMetaBoxKey(key) + " .inside").removeAttr("style");
            });

            // Show Table information
            let tbl = `<div class="title-center">${args.title}</div>
                    <table width="100%" class="o-table">
                        <tr>
                            <td class="rkns-text-muted">${rkns_js._('platform')}</td>
                            <td class="rkns-text-muted">${rkns_js._('visitor_count')}</td>
                            <td class="rkns-text-muted">${rkns_js._('percentage')}</td>
                        </tr>`;

            for (let i = 0; i < args.platform_name.length; i++) {
                tbl += `
                 <tr>
                        <td>${args.platform_name[i]}</td>
                        <td>${(parseInt(args.platform_value[i]) > 0 ? `<a href="` + args.info.visitor_page + `&platform=` + args.platform_name[i] + `&from=` + args.from + `&to=` + args.to + `" target="_blank"> ${rkns_js.number_format(args.platform_value[i])} </a>` : rkns_js.number_format(args.platform_value[i]))}</td>
                        <td>${rkns_js.number_format((args.platform_value[i] / args.total) * 100)}%</td>
                 </tr>
                `;
            }

            // Set Total
            tbl += ` <tr><td>${rkns_js._('total')}</td><td>${rkns_js.number_format(args.total)}</td><td></td></tr>`;
            tbl += `</table>`;
            jQuery("#" + rkns_js.getMetaBoxKey('platforms-table') + " .inside").html(tbl);

            // Set Equal Height
            rkns_js.set_equal_height('.postBox-table .inside', '.postBox-chart .inside');
        }

    }

};
