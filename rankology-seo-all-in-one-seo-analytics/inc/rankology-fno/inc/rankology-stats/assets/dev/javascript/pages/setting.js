/**
 * Get Parameter value
 *
 * @param name
 * @returns {*}
 */
function rankology_stats_getParameterValue(name) {
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    if (results) {
        return results[1];
    }
}

/**
 * Enable Tab
 *
 * @param tab_id
 */
function rankology_stats_enableTab(tab_id) {
    jQuery('.rankology-stats-settings ul.tabs li').removeClass('current');
    jQuery('.rankology-stats-settings .tab-content').removeClass('current');

    jQuery("[data-tab=" + tab_id + "]").addClass('current');
    jQuery("#" + tab_id).addClass('current');

    if (jQuery('#rankology-stats-settings-form').length) {
        var click_url = jQuery(location).attr('href') + '&tab=' + tab_id;
        jQuery('#rankology-stats-settings-form').attr('action', click_url).submit();
    }
}

/**
 * Check has setting page
 */
if (jQuery('.rankology-stats-settings').length) {
    var current_tab = rankology_stats_getParameterValue('tab');
    if (current_tab) {
        rankology_stats_enableTab(current_tab);
    }

    jQuery('.rankology-stats-settings ul.tabs li').click(function () {
        var tab_id = jQuery(this).attr('data-tab');
        rankology_stats_enableTab(tab_id);
    });
}

// Check the Condition Require Setting Api
function rankology_stats_check_condition_view_option(selector, field) {
    jQuery(document).on("change", selector, function (e) {
        e.preventDefault();
        let option_field = jQuery(field);
        if (this.checked) {
            option_field.show("slow");
        } else {
            option_field.hide("slow");
            option_field.find("input[type=checkbox]").prop('checked', false);
        }
    });
}

// Check the visitor log is checked
rankology_stats_check_condition_view_option("input[name=rkns_visitors]", "tr[data-view=visitors_log_tr]");

// Check the Spam List
rankology_stats_check_condition_view_option("input[name=rkns_referrerspam]", "tr.referrerspam_field");
