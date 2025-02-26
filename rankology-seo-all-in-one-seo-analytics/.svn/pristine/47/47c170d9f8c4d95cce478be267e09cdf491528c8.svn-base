rkns_js.post_meta_box = {

    params: function () {
        return {'ID': rkns_js.global['page']['ID']};
    },

    view: function (args = []) {
        return (args.hasOwnProperty('content') ? '<div class="rkns-center" style="padding: 15px;"> ' + args['content'] + '</div>' : '<canvas id="' + rkns_js.chart_id('post') + '" height="85"></canvas>') + '<div class="rkns-wrap rkns-meta-box-footer">' + args['visitors'] + '</div>';
    },

    meta_box_init: function (args = []) {
        if (!args.hasOwnProperty('content')) {
            this.post_hits_chart(rkns_js.chart_id('post'), args);
        } else {
            jQuery("#" + rkns_js.getMetaBoxKey('post') + " button[onclick]").remove();
        }
    },

    post_hits_chart: function (tag_id, args = []) {
        rkns_js.line_chart(tag_id, args['title'], args['date'], [{
            label: args['post_title'],
            data: args['state'],
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1,
            fill: true,
            tension: 0.4
        }]);
    }
};