if (rkns_js.isset(rkns_js.global, 'request_params', 'page') && rkns_js.global.request_params.page === "overview") {

    // Show ADS
    if (rkns_js.isset(rkns_js.global, 'overview', 'ads') && rkns_js.is_active('overview_ads')) {
        let PostBox = `
            <div id="rkns_overview_ads_postbox" class="postbox">
            <div class="inside">
                <div class="close-overview-ads">
                <span class="dashicons dashicons-dismiss"></span>
                </div>
                    <a href="${rkns_js.global.overview.ads['link']}" title="${rkns_js.global.overview.ads['title']}" ${(rkns_js.global.overview.ads['_target'] == "yes" ? ' target="_blank"' : '')}>
                    <img src="${rkns_js.global.overview.ads['image']}" id="rkns_overview_ads_image" alt="${rkns_js.global.overview.ads['title']}">
                    </a>
                </div>
            </div>`;
        jQuery(PostBox).insertAfter("#rkns-postbox-container-2 #normal-sortables div.postbox:first");

        // Add Click Close Event
        jQuery(document).on('click', '.close-overview-ads', function () {
            jQuery("#rkns_overview_ads_postbox").fadeOut("normal");
            jQuery.ajax({
                url: rkns_js.global.admin_url + 'admin-ajax.php',
                type: 'get',
                data: {
                    'action': 'rankology_stats_close_overview_ads',
                    'ads_id': '' + rkns_js.global.overview.ads["ID"] + '',
                    'rkns_nonce': '' + rkns_js.global.rest_api_nonce + ''
                },
                datatype: 'json'
            });
        });

        // Add Click Close Donate Notice
        jQuery('#rkns-donate-notice').on('click', '.notice-dismiss', function () {
            jQuery.ajax({
                url: rkns_js.global.admin_url + 'admin-ajax.php',
                type: 'get',
                data: {
                    'action': 'rankology_stats_close_notice',
                    'notice': 'donate',
                    'rkns_nonce': '' + rkns_js.global.rest_api_nonce + ''
                },
                datatype: 'json',
            });
        });

        // Fix Show Image Ads
        jQuery('#rkns_overview_ads_image').on('error', function () {
            jQuery('#rkns_overview_ads_postbox').remove();
        });
    }

}