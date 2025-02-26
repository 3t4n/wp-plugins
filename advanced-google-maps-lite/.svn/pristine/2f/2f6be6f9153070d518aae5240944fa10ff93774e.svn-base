/* Get regions by select option */
jQuery(document).ready(function () {
    /* Values of Sub-Continents */
    jQuery("#map_continents").change(function () {
        var val = jQuery(this).val();
        var nounce = ajax_region.region_nonce;
        jQuery.ajax({
            url: ajax_region.ajax_url,
            type: 'POST',
            data: {
                action: 'wl_agm_lite_ajax_continent',
                val: val,
                nounce: nounce,
            },
            success: function (response) {
                if (response) {
                    jQuery("#map_subcontinents").empty();
                    var optionn = document.createElement("option");
                    optionn.text = '- For more detail: Select subcontinent -';
                    optionn.value = '';
                    var select = document.getElementById("map_subcontinents");
                    select.appendChild(optionn);
                    for (var key in response) {
                        var option = document.createElement("option");
                        option.text = response[key];
                        option.value = key;
                        var select = document.getElementById("map_subcontinents");
                        select.appendChild(option);
                    }
                    //console.log(response);
                }
            }
        });
    });

    /* Values of Countries */
    jQuery("#map_subcontinents").change(function () {
        var val = jQuery(this).val();
        var nounce = ajax_region.region_nonce;
        jQuery.ajax({
            url: ajax_region.ajax_url,
            type: 'POST',
            data: {
                action: 'wl_agm_lite_ajax_country',
                val: val,
                nounce: nounce,
            },
            success: function (response) {
                if (response) {
                    jQuery("#map_country").empty();
                    var optionn = document.createElement("option");
                    optionn.text = '- For more detail: Select Country -';
                    optionn.value = '';
                    var select = document.getElementById("map_country");
                    select.appendChild(optionn);
                    for (var key in response) {
                        var option = document.createElement("option");
                        option.text = response[key];
                        option.value = key;
                        var select = document.getElementById("map_country");
                        select.appendChild(option);
                    }
                    //console.log(response);
                }
            }
        });
    });
});