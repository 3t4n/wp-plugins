jQuery(document).ready(function($){
    var myOptions = {
    // you can declare a default color here,
    // or in the data-default-color attribute on the input
    defaultColor: true,
    // a callback to fire whenever the color changes to a valid color
    change: function(event, ui){
		$('.ams-page-scroll-back-to-top-wrapper').css("background", this.value);
	
	},
    // a callback to fire when the input is emptied or an invalid color
    clear: function() {},
    // hide the color picker controls on load
    hide: true,
    // show a group of common colors beneath the square
    // or, supply an array of colors to customize further
    palettes: true
};
 
	$('[name="msv_amspsbtt_page_scroll_back_to_top_style[icon_bg_color]"]').wpColorPicker(myOptions);
	
var myOptions = {
    // you can declare a default color here,
    // or in the data-default-color attribute on the input
    defaultColor: true,
    // a callback to fire whenever the color changes to a valid color
    change: function(event, ui){
		$('.ams-page-scroll-back-to-top-wrapper i.fa').css("color", this.value);
	
	},
    // a callback to fire when the input is emptied or an invalid color
    clear: function() {},
    // hide the color picker controls on load
    hide: true,
    // show a group of common colors beneath the square
    // or, supply an array of colors to customize further
    palettes: true
};
 
	$('[name="msv_amspsbtt_page_scroll_back_to_top_style[icon_fg_color]"]').wpColorPicker(myOptions);
	
var myOptions = {
    // you can declare a default color here,
    // or in the data-default-color attribute on the input
    defaultColor: true,
    // a callback to fire whenever the color changes to a valid color
    change: function(event, ui){
		$('.ams-page-scroll-back-to-top-wrapper').css("background", this.value);
	
	},
    // a callback to fire when the input is emptied or an invalid color
    clear: function() {},
    // hide the color picker controls on load
    hide: true,
    // show a group of common colors beneath the square
    // or, supply an array of colors to customize further
    palettes: true
};
 
	$('[name="msv_amspsbtt_page_scroll_back_to_top_style[text_bg_color]"]').wpColorPicker(myOptions);
	
var myOptions = {
    // you can declare a default color here,
    // or in the data-default-color attribute on the input
    defaultColor: true,
    // a callback to fire whenever the color changes to a valid color
    change: function(event, ui){
		$('.ams-page-scroll-back-to-top-wrapper p').css("color", this.value);
	},
    // a callback to fire when the input is emptied or an invalid color
    clear: function() {},
    // hide the color picker controls on load
    hide: true,
    // show a group of common colors beneath the square
    // or, supply an array of colors to customize further
    palettes: true
};
 
	$('[name="msv_amspsbtt_page_scroll_back_to_top_style[text_fg_color]"]').wpColorPicker(myOptions);


	


var myOptions = {
    // you can declare a default color here,
    // or in the data-default-color attribute on the input
    defaultColor: true,
    // a callback to fire whenever the color changes to a valid color
    change: function(event, ui){
	
		var h_length = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[h_length]"]').val();
		var v_length = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[v_length]"]').val();
		var blur_radius = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[blur_radius]"]').val();
		var spread_radius = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[spread_radius]"]').val();
		$('.ams-page-scroll-back-to-top-wrapper').css('box-shadow', h_length + 'px ' + v_length + 'px ' + blur_radius + 'px ' + spread_radius + 'px ' + this.value );
	},
    // a callback to fire when the input is emptied or an invalid color
    clear: function() {},
    // hide the color picker controls on load
    hide: true,
    // show a group of common colors beneath the square
    // or, supply an array of colors to customize further
    palettes: true
};
 
	$('[name="msv_amspsbtt_page_scroll_back_to_top_style[sh_color]"]').wpColorPicker(myOptions);	
	
	
 
	//$('[name="msv_amspsbtt_page_scroll_back_to_top_style[icon_bg_hover_color]"]').wpColorPicker();

var myOptions = {
    // you can declare a default color here,
    // or in the data-default-color attribute on the input
    defaultColor: true,
    // a callback to fire whenever the color changes to a valid color
    change: function(event, ui){
		var border_box = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[border_box]"]').val();
		$('.ams-page-scroll-back-to-top-wrapper').css({'border': border_box + 'px ' + 'solid ' + this.value});
	
	},
    // a callback to fire when the input is emptied or an invalid color
    clear: function() {},
    // hide the color picker controls on load
    hide: true,
    // show a group of common colors beneath the square
    // or, supply an array of colors to customize further
    palettes: true
};
	$('[name="msv_amspsbtt_page_scroll_back_to_top_style[border_color]"]').wpColorPicker(myOptions);
	
var myOptions = {
    // you can declare a default color here,
    // or in the data-default-color attribute on the input
    defaultColor: true,
    // a callback to fire whenever the color changes to a valid color
    change: function(event, ui){
	
	var image_bg_color_choice = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[image_bg_color_choice]"]:checked').val();
		if ( 'enabled' == image_bg_color_choice ) {
			$('.ams-page-scroll-back-to-top-wrapper').css("background", this.value);
		}
		
	
	},
    // a callback to fire when the input is emptied or an invalid color
    clear: function() {},
    // hide the color picker controls on load
    hide: true,
    // show a group of common colors beneath the square
    // or, supply an array of colors to customize further
    palettes: true
};
 
	$('[name="msv_amspsbtt_page_scroll_back_to_top_style[image_bg_color]"]').wpColorPicker(myOptions);
	
var myOptions = {
    // you can declare a default color here,
    // or in the data-default-color attribute on the input
    defaultColor: true,
    // a callback to fire whenever the color changes to a valid color
    change: function(event, ui){
		var h_length = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[drop_h_length]"]').val();
		var v_length = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[drop_v_length]"]').val();
		var blur_radius = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[drop_blur_radius]"]').val();
		$('.ams-page-scroll-back-to-top-wrapper img').css('filter', 'drop-shadow(' + h_length + 'px ' + v_length + 'px ' + blur_radius + 'px ' + this.value + ')');
	
	},
    // a callback to fire when the input is emptied or an invalid color
    clear: function() {},
    // hide the color picker controls on load
    hide: true,
    // show a group of common colors beneath the square
    // or, supply an array of colors to customize further
    palettes: true
};
 
	$('[name="msv_amspsbtt_page_scroll_back_to_top_style[drop_sh_color]"]').wpColorPicker(myOptions);

});


