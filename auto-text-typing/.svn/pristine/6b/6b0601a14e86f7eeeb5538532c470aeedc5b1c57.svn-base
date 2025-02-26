
jQuery(document).ready(function ($) {

    var myOptions = {
        defaultColor: false,
        change: function (event, ui) {
            melibu_colorpicker_set_color();
        },
        clear: function () {
        },
        hide: true,
        palettes: true
    };

    if (typeof jQuery.wp === 'object' && typeof jQuery.wp.wpColorPicker === 'function') {

        jQuery('.melibu-plugin-typing-color-txt').wpColorPicker(myOptions);

    } else {

        jQuery('.melibu-plugin-typing-colorpicker-txt').farbtastic('.melibu-plugin-typing-color-txt');

    }
});

function melibu_colorpicker_set_color() {

    var color = jQuery('.wp-color-result.wp-picker-open').css('backgroundColor');
    
    jQuery('.typing-letters > div').css('color', color);
    jQuery('.typing-letters > div p').css('color', color);
    jQuery('.typing-letters > div small').css('color', color);
    jQuery('.typing-letters > div ul').css('color', color);
    jQuery('.typing-letters > div ul li').css('color', color);
    jQuery('.typing-letters > div p').css('color', color);
    jQuery('.typing-letters > div h1').css('color', color);
    jQuery('.typing-letters > div h2').css('color', color);
    jQuery('.typing-letters > div h3').css('color', color);
    jQuery('.typing-letters > div h4').css('color', color);
    jQuery('.typing-letters > div h5').css('color', color);
    jQuery('.typing-letters > div h6').css('color', color);
}

jQuery(document).ready(function ($) {

    var myOptions = {
        defaultColor: false,
        change: function (event, ui) {
            melibu_colorpicker_set_bgc();
        },
        clear: function () {
        },
        hide: true,
        palettes: true
    };

    if (typeof jQuery.wp === 'object' && typeof jQuery.wp.wpColorPicker === 'function') {

        jQuery('.melibu-plugin-typing-color-bgc').wpColorPicker(myOptions);

    } else {

        jQuery('.melibu-plugin-typing-colorpicker-bgc').farbtastic('.melibu-plugin-typing-color-bgc');

    }
});

function melibu_colorpicker_set_bgc() {

    jQuery('.typing-letters > div').css('background-color', jQuery('.wp-color-result.wp-picker-open').css('backgroundColor'));
}

var padding, paddingOut, borderRadius, borderRadiusOut, borderWidth, borderWidthOut, borderStyle;

/**
 * On Document ready set all eventhandler
 * 
 * @returns {undefined}
 */
document.addEventListener('DOMContentLoaded', function () {

    padding = document.querySelector('.melibu-plugin-typing-padding');
    paddingOut = document.querySelector('.melibu-plugin-typing-padding-out');
    melibu_plugin_event.addEvent(padding, 'change', melibu_colorpicker_set_pad);

    borderRadius = document.querySelector('.melibu-plugin-typing-border-radius');
    borderRadiusOut = document.querySelector('.melibu-plugin-typing-border-radius-out');
    melibu_plugin_event.addEvent(borderRadius, 'change', melibu_colorpicker_set_rad);

    borderWidth = document.querySelector('.melibu-plugin-typing-border-width');
    borderWidthOut = document.querySelector('.melibu-plugin-typing-border-width-out');
    melibu_plugin_event.addEvent(borderWidth, 'change', melibu_colorpicker_set_wid);
    
    borderStyle = document.querySelector('.melibu-plugin-typing-border-style');
    melibu_plugin_event.addEvent(borderStyle, 'change', melibu_colorpicker_set_widsty);
});

function melibu_colorpicker_set_pad(e) {

    paddingOut.value = e.target.value;
    jQuery('.typing-letters > div').css('padding', e.target.value + 'px');
}

function melibu_colorpicker_set_wid(e) {

    borderWidthOut.value = e.target.value;
    jQuery('.typing-letters > div').css('border-width', e.target.value + 'px');
}

function melibu_colorpicker_set_rad(e) {

    borderRadiusOut.value = e.target.value;
    jQuery('.typing-letters > div').css('border-radius', e.target.value + 'px');
}

function melibu_colorpicker_set_widsty(e) {

    jQuery('.typing-letters > div').css('border-style', e.target.value);
}