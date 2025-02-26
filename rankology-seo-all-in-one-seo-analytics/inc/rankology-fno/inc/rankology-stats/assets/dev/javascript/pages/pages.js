if (rkns_js.isset(rkns_js.global, 'request_params', 'page') && rkns_js.global.request_params.page === "pages") {

    // Check has Custom Page
    if (rkns_js.isset(rkns_js.global, 'request_params', 'ID') && rkns_js.isset(rkns_js.global, 'request_params', 'type')) {

        // Create Params
        let params;

        // Check Days ago or Between
        if (rkns_js.isset(rkns_js.global, 'request_params', 'from') && rkns_js.isset(rkns_js.global, 'request_params', 'to')) {
            params = {'from': rkns_js.global.request_params.from, 'to': rkns_js.global.request_params.to};
        } else {
            params = {'ago': 30};
        }

        // Add Page ID and type
        params = Object.assign(params, {
            'ID': rkns_js.global.request_params.ID,
            'type': rkns_js.global.request_params.type
        });

        // Check page_id parameter
        let page_id = null;
        if (rkns_js.isset(rkns_js.global, 'request_params', 'page_id')) {
            page_id = rkns_js.global.request_params.page_id;
        }

        // Add page_id to Params
        if (page_id !== null) {
            params = Object.assign(params, {'page_id': page_id});
        }

        // Run MetaBox
        rkns_js.run_meta_box('pages-chart', params, false);

        // Set Select2 For List
        if (rkns_js.exist_tag("form#rankology-stats-select-pages")) {
            rkns_js.select2();
        }

        // Submit Change Page Select Form
        jQuery(document).on('change', 'select[name=ID]', function () {
            jQuery("span.submit-form").html(rkns_js._('please_wait'));
            jQuery(this).closest('form').trigger('submit');
        });

        // Display Top Browsers Chart
        if (rkns_js.exist_tag("div[data-top-browsers-chart='true']")) {
            let browsersEl = jQuery("div[data-top-browsers-chart='true']");
            // Get Names
            let browserNames = jQuery(browsersEl).data('browsers-names');
            // Get Values
            let browserValues = jQuery(browsersEl).data('browsers-values');
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
                data: browserValues,
                backgroundColor: backgroundColor
            }];
            // Add html after browsersEl
            jQuery(browsersEl).after('<div class="o-wrap"><div class="c-chart c-chart--limited-height"><canvas id="' + rkns_js.chart_id('browsers') + '" height="220"></canvas></div></div>');
            // Remove browsersEl
            jQuery(browsersEl).remove();
            // Check Data
            if (browserNames.length && browserValues.length) {
                // Show Chart
                rkns_js.pie_chart(rkns_js.chart_id('browsers'), browserNames, data);
            } else {
                jQuery('#rankology-stats-browsers-widget').empty().html(rkns_js.no_meta_box_data());
            }
        }

        // Display Top Platforms Chart
        if (rkns_js.exist_tag("div[data-top-platforms-chart='true']")) {
            let platformsEl = jQuery("div[data-top-platforms-chart='true']");
            // Get Names
            let platformsNames = jQuery(platformsEl).data('platforms-names');
            // Get Values
            let platformsValues = jQuery(platformsEl).data('platforms-values');
            // Get Background Color
            let backgroundColor = [];
            let color;
            for (let i = 0; i <= 10; i++) {
                color = rkns_js.random_color(i);
                backgroundColor.push('rgba(' + color[0] + ',' + color[1] + ',' + color[2] + ',' + '0.4)');
            }
            // Prepare Data
            let data = [{
                label: rkns_js._('platforms'),
                data: platformsValues,
                backgroundColor: backgroundColor
            }];
            // Add html after browsersEl
            jQuery(platformsEl).after('<div class="o-wrap"><div class="c-chart c-chart--limited-height"><canvas id="' + rkns_js.chart_id('platforms') + '" height="220"></canvas></div></div>');
            // Remove browsersEl
            jQuery(platformsEl).remove();
            // Check Data
            if (platformsNames.length && platformsValues.length) {
                // Show Chart
                rkns_js.pie_chart(rkns_js.chart_id('platforms'), platformsNames, data);
            } else {
                jQuery('#rankology-stats-platforms-widget').empty().html(rkns_js.no_meta_box_data());
            }
        }

        // Display Visitors Map
        if (rkns_js.exist_tag("div[data-visitors-map='true']")) {
            let mapEl = jQuery("div[data-visitors-map='true']");
            // Get Response
            let args = jQuery(mapEl).data('response');
            // Add html after mapEl
            jQuery(mapEl).after('<div class="o-wrap"><div id="rankology-stats-visitors-map"></div></div>');
            // Remove mapEl
            jQuery(mapEl).remove();
            // Prepare Data
            let pin = Array();
            if (args.hasOwnProperty('country')) {
                Object.keys(args['country']).forEach(function (key) {
                    let t = `<div class='map-html-marker'><div class="map-country-header"><img src='${args['country'][key]['flag']}' alt="${args['country'][key]['name']}" title='${args['country'][key]['name']}' class='log-tools rkns-flag'/> ${args['country'][key]['name']} (${args['total_country'][key]})</div>`;

                    // Get List visitors
                    Object.keys(args['visitor'][key]).forEach(function (visitor_id) {
                        t += `<p><img src='${args['visitor'][key][visitor_id]['browser']['logo']}' alt="${args['visitor'][key][visitor_id]['browser']['name']}" class='rkns-flag log-tools' title='${args['visitor'][key][visitor_id]['browser']['name']}'/> ${args['visitor'][key][visitor_id]['ip']} ` + (["Unknown", "(Unknown)"].includes(args['visitor'][key][visitor_id]['city']) ? '' : '- ' + args['visitor'][key][visitor_id]['city']) + `</p>`;
                    });
                    t += `</div>`;

                    pin[key] = t;
                });

                jQuery('#rankology-stats-visitors-map').vectorMap({
                    map: 'world_en',
                    backgroundColor: '#fff',
                    borderColor: '#7e7e7e',
                    borderOpacity: 0.60,
                    color: '#e6e5e2',
                    selectedColor: '#9DA3F7',
                    hoverColor: '#bc690a',
                    colors: args['color'],
                    onLabelShow: function (element, label, code) {
                        if (pin[code] !== undefined) {
                            label.html(pin[code]);
                        } else {
                            label.html(label.html() + ' [0]<hr />');
                        }
                    },
                });
            } else {
                jQuery('#rankology-stats-visitors-map-widget').empty().html(rkns_js.no_meta_box_data());
            }
        }

    } else {

        // Create Params
        let params = {};

        // Check Pagination
        if (rkns_js.isset(rkns_js.global, 'request_params', 'pagination-page')) {
            params['paged'] = rkns_js.global.request_params['pagination-page'];
        }

        // Check Days ago or Between
        if (rkns_js.isset(rkns_js.global, 'request_params', 'from') && rkns_js.isset(rkns_js.global, 'request_params', 'to')) {
            params['from'] = rkns_js.global.request_params.from;
            params['to'] = rkns_js.global.request_params.to;
        } else {
            params['ago'] = 30;
        }

        // Check Post Type
        if (rkns_js.isset(rkns_js.global, 'request_params', 'type')) {
            params['type'] = rkns_js.global.request_params['type'];
        }

        // Run Pages list MetaBox
        //rkns_js.run_meta_box('pages', params, false);

        // Run Top Pages chart Meta Box
        rkns_js.run_meta_box('top-pages-chart', params, false);
    }
}