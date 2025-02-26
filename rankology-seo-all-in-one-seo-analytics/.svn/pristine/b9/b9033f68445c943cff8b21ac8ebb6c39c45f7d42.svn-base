rkns_js.exclusions_meta_box = {

    placeholder: function () {
        return rkns_js.rectangle_placeholder();
    },

    view: function (args = []) {

        // Check Chart size in Different Page
        let height = rkns_js.is_active('overview_page') ? 110 : 210;
        if (rkns_js.isset(rkns_js.global, 'request_params', 'page') && rkns_js.global.request_params.page === "exclusions") {
            height = 80;
        }

        // Create Html
        let html = '';

        // Add Chart
        html += '<canvas id="' + rkns_js.chart_id('exclusions') + '" height="' + height + '"></canvas>';

        // show Data
        return html;
    },

    meta_box_init: function (args = []) {

        // Show chart
        this.show_chart(rkns_js.chart_id('exclusions'), args);

        // Set Total For Hits Page
        if (rkns_js.isset(rkns_js.global, 'request_params', 'page') && rkns_js.global.request_params.page === "exclusions") {
            let tag = "span[id='number-total-chart-exclusions']";
            if (rkns_js.exist_tag(tag)) {
                let sum = rkns_js.sum(Object.values(args.total));
                jQuery(tag).html(rkns_js.number_format(sum));
            }
        }
    },

    show_chart: function (tag_id, args = []) {

        // Prepare Chart Data
        let html = '';
        let datasets = [];
        let i = 0;
        Object.keys(args['exclusions']).forEach(function (key) {
            // Check Has Item
            let sum = rkns_js.sum(Object.values(args['value'][key]));
            if (sum > 0) {

                // Push To Chart
                let item_name = args['exclusions'][key];
                let color = rkns_js.random_color(i);
                datasets.push({
                    label: item_name,
                    data: args['value'][key],
                    backgroundColor: 'rgba(' + color[0] + ',' + color[1] + ',' + color[2] + ',' + '0.3)',
                    borderColor: 'rgba(' + color[0] + ',' + color[1] + ',' + color[2] + ',' + '1)',
                    borderWidth: 1,
                    fill: true,
                    tension: 0.4
                });

                // Push to Table List
                html += `<tr><th>${item_name}</th> <th class="th-center"><span style="color: #9a9494 !important;">${rkns_js.number_format(sum)}</span></th></tr>`;
                i++;
            }
        });

        if (rkns_js.exist_tag("table[data-table=exclusions]")) {
            jQuery(html).insertAfter("table[data-table=exclusions] tr:first");
        }
        rkns_js.line_chart(tag_id, args['title'], args['date'], datasets);
    }
};