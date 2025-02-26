if (rkns_js.isset(rkns_js.global, 'request_params', 'page') && rkns_js.global.request_params.page === "countries") {

    // Check Params
    let params = {'limit': 0};

    // Check Extra Parameter [Days ago or Between ..]
    ['from', 'to'].forEach((key) => {
        if (rkns_js.isset(rkns_js.global, 'request_params', key)) {
            params[key] = rkns_js.global.request_params[key];
        }
    });

    // Run Pages list MetaBox
    rkns_js.run_meta_box('countries', params, false);
}