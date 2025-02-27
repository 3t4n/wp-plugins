(function($) {

    // USE STRICT
    "use strict";

    var hmlsColorPicker = ['#hmls_slide_border_color', '#hmls_slide_bg_color', '#hmls_slide_container_bg_color', '#hmls_slide_container_border_color',
        '#hmls_slide_focus_bg_color', '#hmls_slide_progress_bar_color', '#hmls_grid_container_border_color', '#hmls_grid_container_bg_color',
        '#hmls_grid_item_border_color', '#hmls_grid_item_bg_color', '#hmls_grid_item_brdr_clr_hvr', '#hmls_grid_item_bg_clr_hvr',
        '#hmls_slider_arrow_color',
        '#hmls_slider_arrow_color_hvr',
        '#hmls_slider_dots_color',
        '#hmls_slider_dots_active_color'
    ];

    $.each(hmlsColorPicker, function(index, value) {
        $(value).wpColorPicker();
    });

    $('.hmls-closebtn').on('click', function() {
        this.parentElement.style.display = 'none';
    });

})(jQuery);