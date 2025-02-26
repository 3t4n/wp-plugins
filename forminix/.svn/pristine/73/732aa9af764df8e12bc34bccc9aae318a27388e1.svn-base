/* Developed by Ferdousur Rahman Sarker for Forminix */

function forminix_double_range_slider_fill_color(slider_id){
    var slider = jQuery(slider_id);
    var slider_track = jQuery(slider).find(".slider-track");
    var max_val = jQuery(slider).find(".slider_1").attr("max");
    var min_val = jQuery(slider).find(".slider_1").attr("min");
    var slider_1 = jQuery(slider).find(".slider_1");
    var slider_1_tooltip = jQuery(slider).find(".tooltip_1");
    var slider_2 = jQuery(slider).find(".slider_2");
    var slider_2_tooltip = jQuery(slider).find(".tooltip_2");

    slider_1_tooltip.text(slider_1.val());
    slider_2_tooltip.text(slider_2.val());


    var diff_val = max_val - min_val;
    percent1 = ((slider_1.val() - min_val) / diff_val) * 100;
    percent2 = ((slider_2.val() - min_val) / diff_val) * 100;

    if(percent1 <= 50){
        slider_1_tooltip.css("right", "auto").css("left", percent1+"%");
    }else{
        slider_1_tooltip.css("left", "auto").css("right", (100 - percent1)+"%");
    }

    if(percent2 <= 50){
        slider_2_tooltip.css("right", "auto").css("left", percent2+"%");
    }else{
        slider_2_tooltip.css("left", "auto").css("right", (100 - percent2)+"%");
    }

    slider_track.css("background", "linear-gradient(to right, var(--forminix_field_range_slider_bg_color) "+percent1+"% , var(--forminix_field_range_slider_selected_color) "+percent1+"% , var(--forminix_field_range_slider_selected_color) "+percent2+"%, var(--forminix_field_range_slider_bg_color) "+percent2+"%)")

}
function forminix_init_double_range_slider(slider_id) {
    var slider = jQuery(slider_id);
    var slider_1 = jQuery(slider).find(".slider_1");
    var slider_2 = jQuery(slider).find(".slider_2");
    var min_gap = 0;

    slider_1.on("input", function(){
        if(parseInt(slider_2.val()) - parseInt(slider_1.val()) <= min_gap){
            slider_1.val(parseInt(slider_2.val()) - min_gap)
        }
        forminix_double_range_slider_fill_color(slider_id);
    });

    slider_2.on("input", function(){
        if(parseInt(slider_2.val()) - parseInt(slider_1.val()) <= min_gap){
            slider_2.val(parseInt(slider_1.val()) + min_gap)
        }
        forminix_double_range_slider_fill_color(slider_id);
    });

    slider_1.trigger("input");
    slider_2.trigger("input");

}


function forminix_single_range_slider_fill_color(slider_id){
    var slider = jQuery(slider_id);
    var slider_track = jQuery(slider).find(".slider-track");
    var max_val = jQuery(slider).find(".slider_1").attr("max");
    var min_val = jQuery(slider).find(".slider_1").attr("min");
    var slider_1 = jQuery(slider).find(".slider_1");
    var slider_1_tooltip = jQuery(slider).find(".tooltip_1");

    slider_1_tooltip.text(slider_1.val());

    var diff_val = max_val - min_val;
    percent1 = ((slider_1.val() - min_val) / diff_val) * 100;

    if(percent1 <= 50){
        slider_1_tooltip.css("right", "auto").css("left", percent1+"%");
    }else{
        slider_1_tooltip.css("left", "auto").css("right", (100 - percent1)+"%");
    }

    slider_track.css("background", "linear-gradient(to right, var(--forminix_field_range_slider_bg_color) 0% , var(--forminix_field_range_slider_selected_color) 0% , var(--forminix_field_range_slider_selected_color) "+percent1+"%, var(--forminix_field_range_slider_bg_color) "+percent1+"%)")

}
function forminix_init_single_range_slider(slider_id) {
    var slider = jQuery(slider_id);
    var slider_1 = jQuery(slider).find(".slider_1");

    slider_1.on("input", function(){
        slider_1.val(parseInt(slider_1.val()))
        forminix_single_range_slider_fill_color(slider_id);
    });
    slider_1.trigger("input");
}


