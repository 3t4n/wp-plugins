rkns_js.pages_chart_meta_box = {

    placeholder: function () {
        return rkns_js.rectangle_placeholder();
    },

    view: function (args = []) {
        return '<div class="o-wrap"><canvas id="' + rkns_js.chart_id('pages-chart') + '" height="80"></canvas></div>';
    },

    meta_box_init: function (args = []) {

        // Show chart
        this.show_chart(rkns_js.chart_id('pages-chart'), args);

        // Set Total For Hits Page
        if(rkns_js.exist_tag("span[id=number-total-visits]")) {
            jQuery("span[id=number-total-visits]").html(args.total);
        }
        if(rkns_js.exist_tag("span[id=number-total-chart-visits]")) {
            jQuery("span[id=number-total-chart-visits]").html(args.total_dates);
        }
    },

    show_chart: function (tag_id, args = []) {
        rkns_js.line_chart(tag_id, args['title'], args['date'], [{
            label: rkns_js._('visits'),
            data: args['stat'],
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1,
            fill: true,
            tension: 0.4
        }]);
    }
};