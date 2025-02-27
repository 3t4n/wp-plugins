jQuery(document).ready(function($) {
	//
	// ColorPickers
	//
	if( typeof($.fn.ColorPicker) === 'function' ){
		$('.cisiw-colorpckr').ColorPicker({
			onSubmit: function(hsb, hex, rgb, el) {
				$(el).val('#'+hex);
				$(el).ColorPickerHide();
			},
			onBeforeShow: function () {
				$(this).ColorPickerSetColor(this.value);
			}
		}).bind('keyup', function(){
			$(this).ColorPickerSetColor(this.value);
		});
	}

	if( typeof($.fn.wpColorPicker) === 'function' ){
		$('.cisiw-colorpckr').wpColorPicker();
	}

});
