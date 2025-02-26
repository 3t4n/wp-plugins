(function($){
	$(function(){
		msv_amspsbtt_IconType();
		$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[icon_type]"]').on('change', msv_amspsbtt_IconType);
	});

	function msv_amspsbtt_IconType(){
		
		if ( $('[name="msv_amspsbtt_page_scroll_back_to_top_icon[icon_type]"]:checked').val() == 'icon'){                             // Icon
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[icon_preset]"]').parent().parent().parent().parent().show();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[icon_size]"]').parent().parent().parent().parent().show();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[icon_bg_width]"]').parent().parent().show();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[icon_bg_height]"]').parent().parent().show();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[icon_margin_top]"]').parent().parent().show();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[icon_bg_color]"]').parent().parent().parent().parent().show();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[icon_fg_color]"]').parent().parent().parent().parent().show();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[icon_bg_hover_color]"]').parent().parent().parent().parent().show();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[icon_fg_hover_color]"]').parent().parent().parent().parent().show();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[border_radius]"]').parent().parent().show();
			
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[image_upload]"]').parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[text_button]"]').parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[preset_image_width]"]').parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[preset_image_height]"]').parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[image_preset]"]').parent().parent().parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[upload_image_width]"]').parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[upload_image_height]"]').parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[text_font_family]"]').parent().parent().hide();
			
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[text_font_size]"]').parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[text_bg_width]"]').parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[text_bg_height]"]').parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[text_bg_color]"]').parent().parent().parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[text_fg_color]"]').parent().parent().parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[text_margin_top]"]').parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[text_font_style]"]').parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[text_bg_hover_color]"]').parent().parent().parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[text_fg_hover_color]"]').parent().parent().parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[image_bg_width]"]').parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[image_bg_height]"]').parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[image_margin_top]"]').parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[image_opacity]"]').parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[image_hover_opacity]"]').parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[image_bg_color]"]').parent().parent().parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[image_bg_color_choice]"]').parent().parent().parent().parent().hide();
			$('.ams-drop-shadow-style').parent().parent().hide();
			
			
			
			
		} else if ($('[name="msv_amspsbtt_page_scroll_back_to_top_icon[icon_type]"]:checked').val() == 'text') {                             // Text
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[text_button]"]').parent().parent().show();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[text_font_size]"]').parent().parent().show();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[text_bg_width]"]').parent().parent().show();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[text_bg_height]"]').parent().parent().show();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[text_bg_color]"]').parent().parent().parent().parent().show();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[text_fg_color]"]').parent().parent().parent().parent().show();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[text_bg_hover_color]"]').parent().parent().parent().parent().show();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[text_fg_hover_color]"]').parent().parent().parent().parent().show();
			
			
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[text_margin_top]"]').parent().parent().show();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[text_font_family]"]').parent().parent().show();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[text_font_style]"]').parent().parent().show();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[border_radius]"]').parent().parent().show();
			
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[preset_image_width]"]').parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[preset_image_height]"]').parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[image_preset]"]').parent().parent().parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[icon_preset]"]').parent().parent().parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[icon_size]"]').parent().parent().parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[image_upload]"]').parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[icon_bg_width]"]').parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[icon_bg_height]"]').parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[icon_margin_top]"]').parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[icon_bg_color]"]').parent().parent().parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[icon_fg_color]"]').parent().parent().parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[icon_bg_hover_color]"]').parent().parent().parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[icon_fg_hover_color]"]').parent().parent().parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[upload_image_width]"]').parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[upload_image_height]"]').parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[image_bg_width]"]').parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[image_bg_height]"]').parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[image_margin_top]"]').parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[image_opacity]"]').parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[image_hover_opacity]"]').parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[image_bg_color]"]').parent().parent().parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[image_bg_color_choice]"]').parent().parent().parent().parent().hide();
			$('.ams-drop-shadow-style').parent().parent().hide();
			
			
		} else if ($('[name="msv_amspsbtt_page_scroll_back_to_top_icon[icon_type]"]:checked').val() == 'upload') {                             // Upload
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[upload_image_width]"]').parent().parent().show();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[upload_image_height]"]').parent().parent().show();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[image_bg_width]"]').parent().parent().show();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[image_bg_height]"]').parent().parent().show();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[border_radius]"]').parent().parent().show();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[image_margin_top]"]').parent().parent().show();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[image_bg_color]"]').parent().parent().parent().parent().show();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[image_bg_color_choice]"]').parent().parent().parent().parent().show();
			$('.ams-drop-shadow-style').parent().parent().show();
			
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[icon_preset]"]').parent().parent().parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[icon_size]"]').parent().parent().parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[image_upload]"]').parent().parent().show();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[text_button]"]').parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[preset_image_width]"]').parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[preset_image_height]"]').parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[icon_bg_width]"]').parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[icon_bg_height]"]').parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[icon_bg_color]"]').parent().parent().parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[icon_fg_color]"]').parent().parent().parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[icon_margin_top]"]').parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[image_preset]"]').parent().parent().parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[text_font_style]"]').parent().parent().hide();
			
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[text_font_family]"]').parent().parent().hide();
			
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[text_font_size]"]').parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[text_bg_width]"]').parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[text_bg_height]"]').parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[text_bg_color]"]').parent().parent().parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[text_fg_color]"]').parent().parent().parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[icon_bg_hover_color]"]').parent().parent().parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[icon_fg_hover_color]"]').parent().parent().parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[text_margin_top]"]').parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[text_bg_hover_color]"]').parent().parent().parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[text_fg_hover_color]"]').parent().parent().parent().parent().hide();
			
			
		} else if ($('[name="msv_amspsbtt_page_scroll_back_to_top_icon[icon_type]"]:checked').val() == 'preset') {                             // Preset
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[preset_image_width]"]').parent().parent().show();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[image_bg_width]"]').parent().parent().show();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[image_bg_height]"]').parent().parent().show();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[preset_image_height]"]').parent().parent().show();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[image_preset]"]').parent().parent().parent().parent().show();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[border_radius]"]').parent().parent().show();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[image_margin_top]"]').parent().parent().show();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[image_bg_color]"]').parent().parent().parent().parent().show();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[image_bg_color_choice]"]').parent().parent().parent().parent().show();
			$('.ams-drop-shadow-style').parent().parent().show();

			
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[icon_preset]"]').parent().parent().parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[icon_size]"]').parent().parent().parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[image_upload]"]').parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[icon_bg_width]"]').parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[icon_bg_height]"]').parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[icon_margin_top]"]').parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[icon_bg_color]"]').parent().parent().parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[icon_fg_color]"]').parent().parent().parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[icon_bg_hover_color]"]').parent().parent().parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[icon_fg_hover_color]"]').parent().parent().parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[text_button]"]').parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[upload_image_width]"]').parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[upload_image_height]"]').parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[text_font_family]"]').parent().parent().hide();
			
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[text_font_size]"]').parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[text_font_style]"]').parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[text_bg_width]"]').parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[text_bg_height]"]').parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[text_bg_color]"]').parent().parent().parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[text_fg_color]"]').parent().parent().parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[text_margin_top]"]').parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[text_bg_hover_color]"]').parent().parent().parent().parent().hide();
			$('[name="msv_amspsbtt_page_scroll_back_to_top_style[text_fg_hover_color]"]').parent().parent().parent().parent().hide();
			
			
		}
		
	}
	
})(jQuery);

