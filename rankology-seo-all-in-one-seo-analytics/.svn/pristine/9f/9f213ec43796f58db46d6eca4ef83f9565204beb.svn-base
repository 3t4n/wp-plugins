rkns_js.devices_meta_box = {

    placeholder: function () {
        return rkns_js.circle_placeholder();
    },

    view: function (args = []) {

        // Create Html
        let html = '';

        // Add Chart
        html += '<div class="o-wrap"><div class="c-chart c-chart--limited-height"><canvas id="' + rkns_js.chart_id('devices') + '" height="220"></canvas></div></div>';

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
            label: rkns_js._('device'),
            data: args['device_value'],
            backgroundColor: backgroundColor,
            tension: 0.4
        }];

        // Show Chart
        rkns_js.pie_chart(rkns_js.chart_id('devices'), args['device_name'], data);
    }

};
