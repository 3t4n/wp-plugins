if (rkns_js.isset(rkns_js.global, 'request_params', 'page') && rkns_js.global.request_params.page === "browser") {

    // Check Pagination
    let params = {};

    // Check Extra Parameter [Days ago or Between ..]
    ['from', 'to'].forEach((key) => {
        if (rkns_js.isset(rkns_js.global, 'request_params', key)) {
            params[key] = rkns_js.global.request_params[key];
        }
    });

    // Set Equal Height
    ['browsers-table', 'browsers'].forEach((key) => {
        jQuery("#" + rkns_js.getMetaBoxKey(key) + " .inside").css('height', '430px');
    });

    // Set Loading Table-List
    jQuery("#rankology-stats-browsers-table-widget .inside").html(rkns_js.placeholder());
    jQuery(".rkns-ph-picture").attr("style", "height: 310px;");

    // Run Browsers Meta Box
    rkns_js.run_meta_box('browsers', params, false);
}