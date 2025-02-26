jQuery(document).ready(function ($) {

    var get_hash = window.location.hash;
    var clean_hash = get_hash.split('$');

    if (typeof sessionStorage != 'undefined') {
        var rankology_bot_tab_session_storage = sessionStorage.getItem("rankology_scan_tab");

        if (clean_hash[1] == '1') { //Scan Tab
            $('#tab_rankology_scan-tab').addClass("nav-tab-active");
            $('#tab_rankology_scan').addClass("active");
        } else if (clean_hash[1] == '2') { //Scan settings Tab
            $('#tab_rankology_scan_settings-tab').addClass("nav-tab-active");
            $('#tab_rankology_scan_settings').addClass("active");
        } else if (rankology_bot_tab_session_storage) {
            $('#rankology-tabs').find('.nav-tab.nav-tab-active').removeClass("nav-tab-active");
            $('#rankology-tabs').find('.rankology-tab.active').removeClass("active");

            $('#' + rankology_bot_tab_session_storage.split('#tab=') + '-tab').addClass("nav-tab-active");
            $('#' + rankology_bot_tab_session_storage.split('#tab=')).addClass("active");
        } else {
            //Default TAB
            $('#tab_rankology_scan-tab').addClass("nav-tab-active");
            $('#tab_rankology_scan').addClass("active");
        }
    };
    $("#rankology-tabs").find("a.nav-tab").click(function (e) {
        e.preventDefault();
        var hash = $(this).attr('href').split('#tab=')[1];

        $('#rankology-tabs').find('.nav-tab.nav-tab-active').removeClass("nav-tab-active");
        $('#' + hash + '-tab').addClass("nav-tab-active");

        if (clean_hash[1] == 1) {
            sessionStorage.setItem("rankology_scan_tab", 'tab_rankology_scan');
        } else if (clean_hash[1] == 2) {
            sessionStorage.setItem("rankology_scan_tab", 'tab_rankology_scan_settings');
        } else {
            sessionStorage.setItem("rankology_scan_tab", hash);
        }

        $('#rankology-tabs').find('.rankology-tab.active').removeClass("active");
        $('#' + hash).addClass("active");
    });

    //Ajax
    $('#rankology_launch_bot').on('click', function (e) {
        e.preventDefault();
        self.process_offset(0, self);
    });
    process_offset = function (offset, self) {
        $.ajax({
            method: 'POST',
            url: rankologyAjaxBot.rankology_request_bot,
            data: {
                action: 'rankology_request_bot',
                _ajax_nonce: rankologyAjaxBot.rankology_nonce,
                offset: offset,
            },
            success: function (data) {
                if ('done' == data.data.offset) {
                    window.location.reload(true);
                } else {
                    if ($('#rankology_bot_log').val().length > 0) {
                        prev = $('#rankology_bot_log').val();
                    } else {
                        prev = '';
                    }
                    $('#rankology_bot_log').text(data.data.post_title + '\n' + prev);
                    self.process_offset(parseInt(data.data.offset), self);
                }
            },
        });
    };
    $('#rankology_launch_bot').on('click', function () {
        $('#rankology_bot_log').show();
        $(this).attr("disabled", "disabled");
        $('.spinner').css("visibility", "visible");
        $('.spinner').css("float", "none");
    });
});
