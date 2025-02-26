//Request Google Page Speed
jQuery(document).ready(function ($) {
    $('.rankology-request-page-speed').on('click', function () {
        var data_permalink = $(this).attr('data_permalink');
        $.ajax({
            method: 'POST',
            url: rankologyAjaxRequestPageSpeed.rankology_request_page_speed,
            data: {
                action: 'rankology_request_page_speed',
                data_permalink: data_permalink,
                rankology_ps_api_key: $('#rankology_ps_api_key').val(),
                rankology_ps_url: $('#rankology_ps_url').val(),
                _ajax_nonce: rankologyAjaxRequestPageSpeed.rankology_nonce,
            },
            success: function () {
                window.location.reload();
            },
        });
    });

    $('.rankology-request-page-speed').on('click', function () {
        $(this).attr("disabled", "disabled");
        $('.spinner').css("visibility", "visible");
        $('.spinner').css("float", "none");
    });

    //Clear Google Page Speed Transient
    $('#rankology-clear-page-speed-cache').on('click', function () {
        $.ajax({
            method: 'GET',
            url: rankologyAjaxClearPageSpeedCache.rankology_clear_page_speed_cache,
            data: {
                action: 'rankology_clear_page_speed_cache',
                _ajax_nonce: rankologyAjaxClearPageSpeedCache.rankology_nonce,
            },
            success: function () {
                window.location.reload(true);
            },
        });
    });
    $('#rankology-clear-page-speed-cache').on('click', function () {
        $(this).attr("disabled", "disabled");
        $('.spinner').css("visibility", "visible");
        $('.spinner').css("float", "none");
    });

    //Accordion PS audits
    $('.ps-audits').accordion({
        header: 'h4',
        collapsible: true,
        animate: false,
        classes: {
            'ui-accordion': 'rankology-ui-accordion',
            'ui-accordion-header': 'rankology-ui-corner-top',
            'ui-accordion-header-collapsed': 'rankology-ui-corner-all',
            'ui-accordion-content': 'rankology-ui-corner-bottom',
            'ui-accordion-header-active': 'is-open'
        }
    });
});
