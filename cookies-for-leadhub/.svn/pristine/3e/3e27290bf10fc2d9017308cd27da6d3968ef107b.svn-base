jQuery(document).ready(function ($) {
    var value = clh_get_param("utm_leadhub");
    if (value) {
        var date = new Date();
        date.setTime(date.getTime() + (15 * 24 * 60 * 60 * 1000));
        $.cookie("utm_leadhub", "");
        $.cookie("utm_leadhub", value, { expires: date });
    }
    var campaign_code = $.cookie('utm_leadhub');
    var landing_page = window.location.href;

    jQuery('input[name="campaign_code"]').val(campaign_code);
    jQuery('input[name="landing_page"]').val(landing_page);
});

function clh_get_param(param) {
    return new URLSearchParams(window.location.search).get(param);
}
