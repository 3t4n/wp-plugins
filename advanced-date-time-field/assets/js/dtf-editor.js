jQuery(document).ready(function ($) {

    var ADTF_Editor = {
        init: function () {
            ADTF_Editor.form_editor_init();
        },
        form_editor_init: function(){
            fieldSettings.ad_date_time += ", .adtf_format";
            fieldSettings.ad_date_time += ", .adtf_type";
            fieldSettings.ad_date_time += ", .adtf_icon";

            jQuery(document).bind( "gform_load_field_settings", function (event, field, form) {

                jQuery("#adtf_format").val(field['adtf_Format']);
                jQuery("#adtf_type").val(field['adtf_Type']);
                jQuery("#adtf_icon").val(field['adtf_Icon']);

            });
        }
    };

    ADTF_Editor.init();
});