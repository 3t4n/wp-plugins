//Save htaccess
jQuery(document).ready(function ($) {
    $('#rankology-save-htaccess').on('click', function () {
        $.ajax({
            method: 'POST',
            url: rankologyAjaxSaveHtaccess.rankology_save_htaccess,
            data: {
                action: 'rankology_save_htaccess',
                htaccess_content: $('textarea#rankology_htaccess_file').val(),
                _ajax_nonce: rankologyAjaxSaveHtaccess.rankology_nonce,
            },
            success: function (data) {
                setTimeout(function () { window.location.reload() }, 4000);
                $("#tab_rankology_htaccess .log").css('display', 'block');
                $("#tab_rankology_htaccess .log").html("<div class='rankology-notice " + data.data.class + "'><p>" + data.data.msg + "</p></div>");
            },
        });
    });
    //htaccess rules
    $('#rankology-tag-htaccess-1').click(function () {
        $("#rankology_htaccess_file").val($("#rankology_htaccess_file").val() + '\n' + $('#rankology-tag-htaccess-1').attr('data-tag'));
    });
    $('#rankology-tag-htaccess-2').click(function () {
        $("#rankology_htaccess_file").val($("#rankology_htaccess_file").val() + '\n' + $('#rankology-tag-htaccess-2').attr('data-tag'));
    });
    $('#rankology-tag-htaccess-3').click(function () {
        $("#rankology_htaccess_file").val($("#rankology_htaccess_file").val() + '\n' + $('#rankology-tag-htaccess-3').attr('data-tag'));
    });

    $('#rankology-save-htaccess').on('click', function () {
        $(this).attr("disabled", "disabled");
        $('.spinner').css("visibility", "visible");
        $('.spinner').css("float", "none");
    });
});
