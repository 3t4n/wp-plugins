if (rkns_js.isset(rkns_js.global, 'request_params', 'page') && rkns_js.global.request_params.page === "searches") {

    // Create Params
    let params;

    // Check Days ago or Between
    if (rkns_js.isset(rkns_js.global, 'request_params', 'from') && rkns_js.isset(rkns_js.global, 'request_params', 'to')) {
        params = {'from': rkns_js.global.request_params.from, 'to': rkns_js.global.request_params.to};
    } else {
        params = {'ago': 30};
    }

    // Run MetaBox
    rkns_js.run_meta_box('search', params, false);
}