jQuery(document).ready(function () {
    jQuery(document).on("click", "#rankology_ai_generate_seo_meta", function () {
        rkseo_ai_generate_meta();
    });
});

function rkseo_ai_generate_meta() {
    const $ = jQuery;
    //Open AI
    $("#rankology_ai_generate_seo_meta").attr("disabled", "disabled");
    $("#rankology_ai_generate_seo_meta_log").hide();

    jQuery.ajax({
        method: "POST",
        url: rankologyAjaxAIMetaSEO.rankology_ai_generate_seo_meta,
        data: {
            action: "rankology_ai_generate_seo_meta",
            post_id: rankologyElementorBase.post_id,
            _ajax_nonce: rankologyAjaxAIMetaSEO.rankology_nonce,
        },
        success: function (data) {
            $('#rankology_ai_generate_seo_meta').removeAttr("disabled");
            if (data.success === true) {
                $("input[data-setting=_rankology_titles_title]").val(data.data.title);
                $("textarea[data-setting=_rankology_titles_desc]").val(data.data.desc);
                if (data.data.message !== 'Success') {
                    $("#rankology_ai_generate_seo_meta_log").show();
                    $("#rankology_ai_generate_seo_meta_log").html("<div style='margin-top:20px'><p>" + data.data.message + "</p></div>");
                }
            }
        }
    });
}
