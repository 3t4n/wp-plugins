;jQuery(document).ready(function($){
    $('.sirve_color-picker').wpColorPicker();
    //Meta Fields Feature
    const  sirveSinglePageUrl = function(elem) {
        if (elem.is(":checked")) {
            $("#htSirveFeatureText").removeAttr("disabled");          
        } else {
            $("#htSirveFeatureText").attr("disabled", "disabled");
        }
    }
    
    sirveSinglePageUrl($("#htSirveFeaturePost"))
    $("#htSirveFeaturePost").click(function () {
        sirveSinglePageUrl($(this));
    });
});