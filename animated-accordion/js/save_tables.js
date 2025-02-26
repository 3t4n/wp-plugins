jQuery(document).ready(function() {
    jQuery("#animated_Accordion_submit").click(function() {
        var name = jQuery("#animated_Accordion_Name").val();
        jQuery.ajax({
            type: 'POST',
            url: ajaxurl,
            data: {"action": "save_new_animated_Accordion", "animated_Accordion_Name": name},
            success: function(data) {

            }
        });
    });
    /*jQuery("#animated_Accordion_Name").blur(function() {
        var name = jQuery("#animated_Accordion_Name").val();
        jQuery.ajax({
            type: 'POST',
            url: ajaxurl,
            data: {"action": "check_name", "animated_Accordion_Name": name},
            success: function(data) {
                if (data == "ok") {
                    jQuery("#checked-true").show();
                    jQuery("#checked-false").hide();
                }
                else
                {
                    jQuery("#checked-false").show();
                    jQuery("#checked-true").hide();
                }
            }
        });

    });
    jQuery("#aTitle").blur(function() {
        var title = jQuery("#aTitle").val();
        jQuery.ajax({
            type: 'POST',
            url: ajaxurl,
            data: {"action": "check_title", "aTitle": title},
            success: function(data) {
                if (data == "ok") {
                    jQuery("#checked-true").show();
                    jQuery("#checked-false").hide();
                }
                else
                {
                    jQuery("#checked-false").show();
                    jQuery("#checked-true").hide();
                }

            }
        });

    });*/
});