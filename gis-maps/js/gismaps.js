jQuery(document).ready(function ($) {
    $("#test-button").on("click", function (e) {
        e.preventDefault();
        if($("input[name=gismapsdir]").attr('value') == ''){
            $("#test-box").html("<br>"+loc.titl+"<br>").css("display", "block");
            $("#gismaps-short").text('No shortcode for this map');
            setTimeout(function () {
                    $("#test-box").fadeOut("slow");
            }, 3000);
            return;
        }
        var valuedir = $("input[name=gismapsdir]").attr('value');
        $("#qgis2web2wp_dir").text(valuedir);
        $("#test-box").html("<br>"+loc.test+"<br>").css("display", "block");
        $.ajax({
            url: ajaxurl,
            data: {
                action: "test_button",
                mapdir: valuedir,
                sec: loc.nonce
            },
            type: "POST",
            dataType: "json",
            success: function (json) {
                $("#test-box").html("<br>" + json.response + "<br>").css("display", "block");
                if(json.success == '1'){
                    $("#gismaps-short").text('[gis-maps name="'+valuedir+'" width="100" min-height="400"]');
                } else {
                    $("#gismaps-short").text('No shortcode for this map');
                }
            },
            error: function (xhr, status) {
                $("#test-box").html("<br>error<br>").css("display", "block");
            },
            complete: function (xhr, status) {
                setTimeout(function () {
                    $("#test-box").fadeOut("slow");
                }, 3000);
            }
        });
    });
});