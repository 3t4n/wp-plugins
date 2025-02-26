if (rkns_js.isset(rkns_js.global, 'request_params', 'page') && rkns_js.global.request_params.page === "settings") {
    // Set Active Tab
    jQuery('#rankology-stats-settings-form ul.tabs li').click(function (e) {
        e.preventDefault();
        let _tab = $(this).attr('data-tab');
        if (typeof (localStorage) != 'undefined') {
            localStorage.setItem("rankology-stats-settings-active-tab", _tab);
        }
    });

    // Set Current Tab
    if (typeof (localStorage) != 'undefined' && rkns_js.isset(rkns_js.global, 'request_params', 'save_setting') && rkns_js.global.request_params.save_setting === "yes") {
        let ActiveTab = localStorage.getItem("rankology-stats-settings-active-tab");
        if (ActiveTab && ActiveTab.length > 0) {
            $('#rankology-stats-settings-form ul.tabs li[data-tab=' + ActiveTab + ']').click();
        }
    }
}