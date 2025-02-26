rkns_js.hits_meta_box = {

    placeholder: function () {
        return rkns_js.rectangle_placeholder();
    },

    view: function (args = []) {

        // Check Hit Chart size in Different Page
        let height = rkns_js.is_active('overview_page') ? 300 : 210;
        if (rkns_js.isset(rkns_js.global, 'request_params', 'page') && rkns_js.global.request_params.page === "hits") {
            height = 80;
        }

        // Create Html
        let html = '';

        // // Check Show Button Group
        // if (rkns_js.is_active('overview_page')) {
        //     html += rkns_js.btn_group_chart('hits', args);
        //     setTimeout(function(){ rkns_js.date_picker(); }, 1000);
        // }

        // Add Chart
        html += '<div class="o-wrap"><canvas id="' + rkns_js.chart_id('hits') + '" height="' + height + '"></canvas></div>';

        // show Data
        return html;
    },

    meta_box_init: function (args = []) {

        // Show chart
        this.hits_chart(rkns_js.chart_id('hits'), args);

        // Set Total For Hits Page
        if (rkns_js.isset(rkns_js.global, 'request_params', 'page') && rkns_js.global.request_params.page === "hits") {
            ["visits", "visitors"].forEach(function (key) {
                let tag = "span[id^='number-total-chart-" + key + "']";
                if (rkns_js.exist_tag(tag)) {
                    jQuery(tag).html(args.total[key]);
                }
            });
        }
    },

    hits_chart: function (tag_id, args = []) {

        // Check Hit-chart for Quick State
        let params = args;
        if ('hits-chart' in args) {
            params = args['hits-chart'];
        }

        // Prepare Chart Data
        let datasets = [];
        if (rkns_js.is_active('visitors')) {
            datasets.push({
                label: rkns_js._('visitors'),
                data: params['visitors'],
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1,
                fill: true,
                tension: 0.4
            });
        }
        if (rkns_js.is_active('visits')) {
            datasets.push({
                label: rkns_js._('visits'),
                data: params['visits'],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1,
                fill: true,
                tension: 0.4
            });
        }

        // Set Options for Chart only for overview page
        let options = {};
        if (rkns_js.is_active('overview_page')) {
            options = {
                options: {
                    maintainAspectRatio: false,
                    interaction: {
                        intersect: false,
                        mode: 'index',
                    }
                }
            }
        }

        rkns_js.line_chart(tag_id, params['title'], params['date'], datasets, options);
    }
};
