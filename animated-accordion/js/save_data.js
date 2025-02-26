jQuery(document).ready(function() {
    jQuery("#submit").click(function() {
        var id = jQuery("#panel_id").val();
        var ataID = jQuery("#ata_id").val();
        var aaction = jQuery("#aaction").val();
        var name = jQuery("#aName").val();
        var title = jQuery("#aTitle").val();
        var text = jQuery("#aText").val();
        var img = jQuery("#aImage").val();
        var imgfloat = jQuery("#imgfloat:checked").val();
        var titleBgColor = jQuery("#titleBgColor").val();
        var contentBgColor = jQuery("#contentBgColor").val();
        var ImageSize = jQuery("#ImageSize").val();
        var titleFontSize = jQuery("#titleFontSize").val();
        var contentFontSize = jQuery("#contentFontSize").val();
        var titleSectionHeight = jQuery("#titleSectionHeight").val();
        var titleFontColor = jQuery("#titleFontColor").val();
        var contentFontColor = jQuery("#contentFontColor").val();
        var titleBorderWidth = jQuery("#titleBorderWidth").val();
        var titleBorderStyle = jQuery("#titleBorderStyle").val();
        var titleBorderColor = jQuery("#titleBorderColor").val();
        var contentBorderWidth = jQuery("#contentBorderWidth").val();
        var contentBorderStyle = jQuery("#contentBorderStyle").val();
        var contentBorderColor = jQuery("#contentBorderColor").val();
        jQuery.ajax({
            type: 'POST',
            url: ajaxurl,
            beforeSend: function() {
                jQuery("#sending_data").show();
            },
            complete: function() {
                jQuery("#sending_data").hide();
            },
            data: {"action": "save_accordion_parameters", "id": id, "ataID": ataID, "aaction": aaction,
                "name": name, "title": title, "text": text, "img": img, "imgfloat": imgfloat, "titleBgColor": titleBgColor, "contentBgColor": contentBgColor,
                "ImageSize": ImageSize, "titleFontSize": titleFontSize, "contentFontSize": contentFontSize, "titlePadding": titleSectionHeight,
                "titleFontColor": titleFontColor, "contentFontColor": contentFontColor,
                "titleBorderWidth": titleBorderWidth, "titleBorderStyle": titleBorderStyle,
                "titleBorderColor": titleBorderColor, "contentBorderWidth": contentBorderWidth,
                "contentBorderStyle": contentBorderStyle, "contentBorderColor": contentBorderColor},
            success: function(data) {

            }
        });
    });
   
});
