jQuery(document).ready(function ($) {
    let disabledBtn = false

    $("#rankology_launch_bot_search_console").on('click', function (e) {
        e.preventDefault()
        if (disabledBtn) {
            return
        }

        disabledBtn = true
        $(this).attr("disabled", "disabled");
        $("#tab_rankology_inspect_url .spinner").css(
            "visibility",
            "visible"
        );
        $("#tab_rankology_inspect_url .log").css("display", "block");
        $('#tab_rankology_inspect_url .spinner').css("float", "none");

        $.ajax({
            method: 'POST',
            url: rankologyAjaxGSC.rankology_request_bot,
            data: {
                action: 'rankology_request_data_search_console',
                _ajax_nonce: rankologyAjaxGSC.rankology_nonce_search_console,
            },
            success: function (response) {
                const { data } = response
                const { status } = data

                // Is not null data.error
                if(status === 'error' && data.error !== null ) {
                    try {
                        const { error } = JSON.parse(data.error)

                        if(error.message){
                            $("#tab_rankology_inspect_url .log").html("<div class='rankology-notice is-error'><p>" + error.message + "</p></div>");
                            $("#tab_rankology_inspect_url .spinner").css("visibility", "hidden");
                            $("#rankology_launch_bot_search_console").attr('disabled', '');
                            disabledBtn = false
                        }
                    } catch (error) {

                    }

                }
                else{
                    saveDataResultSearchConsole(data.data)

                }
            },
        });

    })


    async function saveDataResultSearchConsole(rows) {

        let totalMatches = 0;
        let current = 0
        const totalRows = rows.length
        while (rows.length > 0) {
            const progress = Number((current * 100) / totalRows).toFixed(2)

            $("#tab_rankology_inspect_url .log").html("<div class='rankology-notice'><p>" + progress + "% " + rankologyAjaxGSC.i18n.progress_matches.replace('%s', totalMatches) + "</p></div>");

            const chunk = rows.splice(0, rankologyAjaxGSC.rankology_search_console_batch_process)
            current += Number(rankologyAjaxGSC.rankology_search_console_batch_process)


            const { data } = await ajaxSaveDataBotSearchConsole(chunk)
            if (data.total_matches) {
                totalMatches += data.total_matches
            }
        }

        $("#tab_rankology_inspect_url .spinner").css("visibility", "hidden");
        $("#tab_rankology_inspect_url .log").css("display", "block");
        $("#tab_rankology_inspect_url .log").html("<div class='rankology-notice is-success'><p>" + rankologyAjaxGSC.i18n.finish_matches.replace('%s', totalMatches) + "</p></div>");
        $("#rankology_launch_bot_search_console").attr('disabled', '');
        disabledBtn = false
    }


    function ajaxSaveDataBotSearchConsole(rows) {
        return new Promise((resolve, reject) => {
            $.ajax({
                method: 'POST',
                url: rankologyAjaxGSC.rankology_request_bot,
                data: {
                    action: 'rankology_request_save_search_console',
                    _ajax_nonce: rankologyAjaxGSC.rankology_nonce_search_console,
                    rows: rows,
                },
                success: function (data) {
                    resolve(data)
                },
            });
        })
    }
});
