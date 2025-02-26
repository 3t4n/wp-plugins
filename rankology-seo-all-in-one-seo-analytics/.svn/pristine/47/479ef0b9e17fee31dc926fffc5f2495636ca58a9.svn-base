/** Set AjaxQ Option */
rkns_js.ajax_queue = {
    key: 'rankology-stats',
    time: 400 // millisecond
};

/**
 * Base AjaxQ function For All request
 *
 * @param url
 * @param params
 * @param callback
 * @param error_callback
 * @param type
 * @param internal
 */
rkns_js.ajaxQ = function (url, params, callback, error_callback, type = 'GET', internal = true) {

    // Check Url
    if (url === false || url === "metabox") {
        url = rkns_js.global.meta_box_api;
    }

    // prepare Ajax Parameter
    let ajaxQ = {
        url: url,
        type: type,
        dataType: "json",
        crossDomain: true,
        cache: false,
        data: params,
        success: function (data) {

            // Check Meta Box URL
            if (url === rkns_js.global.meta_box_api && internal === true) {

                // Check is NO Data Meta Box
                if (data['no_data']) {

                    jQuery(rkns_js.meta_box_inner(params.name)).empty().html(rkns_js.no_meta_box_data());

                    if (rkns_js.is_active('overview_page') || rkns_js.global.page.file === "index.php") {
                        rkns_js.meta_box_footer(params.name, data);
                    }
                } else {

                    // Show Meta Box
                    jQuery(rkns_js.meta_box_inner(params.name)).empty().html(rkns_js[callback]['view'](data));

                    // Check After Load Hook
                    if (rkns_js[callback]['meta_box_init']) {
                        setTimeout(function () {
                            rkns_js[callback]['meta_box_init'](data);
                        }, 150);
                    }

                    if (rkns_js.is_active('overview_page') || rkns_js.global.page.file === "index.php") {
                        rkns_js.meta_box_footer(params.name, data);
                    }
                }
            } else {

                // If Not Meta Box Ajax
                rkns_js[callback](data);
            }
        },
        error: function (xhr, status, error) {

            // Check Meta Box Error
            if (url === rkns_js.global.meta_box_api && internal === true) {
                jQuery(rkns_js.meta_box_inner(params.name)).empty().html(rkns_js[error_callback](xhr.responseText));
            } else {

                // Global Call Back Error
                rkns_js[error_callback](xhr.responseText)
            }
        }
    };

    // Check WordPress REST-API Nonce [https://developer.wordpress.org/rest-api/using-the-rest-api/authentication/  ]
    if (url === rkns_js.global.meta_box_api) {
        ajaxQ.beforeSend = function (xhr) {
            xhr.setRequestHeader('X-WP-Nonce', rkns_js.global.rest_api_nonce);
            xhr.setRequestHeader('Access-Control-Allow-Origin', '*');
        };
    }

    // Send Request and Get Response
    jQuery.ajaxq(rkns_js.ajax_queue.key, ajaxQ);
};