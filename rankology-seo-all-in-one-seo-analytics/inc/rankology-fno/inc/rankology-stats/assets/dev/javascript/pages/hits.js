if (rkns_js.isset(rkns_js.global, 'request_params', 'page') && rkns_js.global.request_params.page === "hits") {

    // Create Params
    let params = {};

    // Check Days ago or Between
    if (rkns_js.isset(rkns_js.global, 'request_params', 'from') && rkns_js.isset(rkns_js.global, 'request_params', 'to')) {
        params = {'from': rkns_js.global.request_params.from, 'to': rkns_js.global.request_params.to};
    } else {
        params = {'ago': 30};
    }

    // Set PlaceHolder For Total
    jQuery( "span[id^='number-total-chart-']").html(rkns_js.rectangle_placeholder('rkns-text-placeholder'));

    // Run MetaBox
    rkns_js.run_meta_box('hits', params, false);
}