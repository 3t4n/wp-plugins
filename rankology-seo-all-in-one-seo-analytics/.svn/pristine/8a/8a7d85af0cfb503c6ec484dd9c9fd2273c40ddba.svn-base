if (rkns_js.isset(rkns_js.global, 'request_params', 'page') && rkns_js.global.request_params.page === "taxonomies") {
    // Create Params
    let params = {
        'ago': 0,
        'type': rkns_js.global.request_params.taxonomy,
        'ID': 0
    };

    // Check Extra Parameter [Days ago or Between ..]
    ['from', 'to', 'ID'].forEach((key) => {
        if (rkns_js.isset(rkns_js.global, 'request_params', key)) {
            params[key] = rkns_js.global.request_params[key];
        }
    });

    // Set PlaceHolder For Total
    jQuery("span[id^='number-total-']").html(rkns_js.rectangle_placeholder('rkns-text-placeholder'));

    // Run Meta Box
    rkns_js.run_meta_box('pages-chart', params, false);
}