(function($){
	$(function(){
		ams_psbtt_IconTypeLoaded();
		$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[image_preset]"]').on('change', ams_psbtt_IconTypeLoaded);
		$('[name="msv_amspsbtt_page_scroll_back_to_top_style[image_bg_color_choice]"]').on('change', ams_psbtt_IconTypeLoaded);
		$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[preset_image_width]"]').on('change', ams_psbtt_IconTypeLoaded);
		$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[preset_image_height]"]').on('change', ams_psbtt_IconTypeLoaded);
		
		$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[text_font_family]"]').on('change', ams_psbtt_IconTypeLoaded);
		
		$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[icon_preset]"]').on('change', ams_psbtt_IconTypeLoaded);
		$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[icon_size]"]').on('change', ams_psbtt_IconTypeLoaded);
		$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[icon_margin_top]"]').on('change', ams_psbtt_IconTypeLoaded);
		$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[icon_bg_width]"]').on('change', ams_psbtt_IconTypeLoaded);
		$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[icon_bg_height]"]').on('change', ams_psbtt_IconTypeLoaded);
		$('[name="msv_amspsbtt_page_scroll_back_to_top_style[border_box]"]').on('change', ams_psbtt_IconTypeLoaded);
		
		$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[image_upload]"]').on('change', ams_psbtt_IconTypeLoaded);
		$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[upload_image_width]"]').on('change', ams_psbtt_IconTypeLoaded);
		$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[upload_image_height]"]').on('change', ams_psbtt_IconTypeLoaded);
		
		$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[text_font_size]"]').on('change', ams_psbtt_IconTypeLoaded);
		$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[text_font_style]"]').on('change', ams_psbtt_IconTypeLoaded);
		$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[text_bg_width]"]').on('change', ams_psbtt_IconTypeLoaded);
		$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[text_bg_height]"]').on('change', ams_psbtt_IconTypeLoaded);
		$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[text_margin_top]"]').on('change', ams_psbtt_IconTypeLoaded);
		$('[name="msv_amspsbtt_page_scroll_back_to_top_icon[icon_type]"]').on('change', ams_psbtt_IconTypeLoaded);
		$('[name="msv_amspsbtt_page_scroll_back_to_top_style[image_margin_top]"]').on('change', ams_psbtt_IconTypeLoaded);
		$('[name="msv_amspsbtt_page_scroll_back_to_top_style[image_bg_width]"]').on('change', ams_psbtt_IconTypeLoaded);
		$('[name="msv_amspsbtt_page_scroll_back_to_top_style[image_bg_height]"]').on('change', ams_psbtt_IconTypeLoaded);
		$('[name="msv_amspsbtt_page_scroll_back_to_top_style[image_opacity]"]').on('change', ams_psbtt_IconTypeLoaded);
		
		$('[name="msv_amspsbtt_page_scroll_back_to_top_layout[position]"]').on('change', ams_psbtt_IconPosition);
		$('[name="msv_amspsbtt_page_scroll_back_to_top_style[border_radius]"]').on('change', ams_psbtt_IconTypeLoaded);
		$('[name="msv_amspsbtt_page_scroll_back_to_top_layout[bottom]"]').on('change', ams_psbtt_IconTypeLoaded);
		$('[name="msv_amspsbtt_page_scroll_back_to_top_layout[padding_side]"]').on('change', ams_psbtt_IconTypeLoaded);
		$('[name="msv_amspsbtt_page_scroll_back_to_top_style[border_box]"]').on('change', ams_psbtt_IconTypeLoaded);
		
		$('[name="msv_amspsbtt_page_scroll_back_to_top_style[box_shadow]"]').on('click', ams_psbtt_IconTypeLoaded);
		$('[name="msv_amspsbtt_page_scroll_back_to_top_style[drop_shadow]"]').on('click', ams_psbtt_IconTypeLoaded);
		
		$('[name="msv_amspsbtt_page_scroll_back_to_top_style[h_length]"]').on('change', ams_psbtt_IconTypeLoaded);
		$('[name="msv_amspsbtt_page_scroll_back_to_top_style[v_length]"]').on('change', ams_psbtt_IconTypeLoaded);
		$('[name="msv_amspsbtt_page_scroll_back_to_top_style[blur_radius]"]').on('change', ams_psbtt_IconTypeLoaded);
		$('[name="msv_amspsbtt_page_scroll_back_to_top_style[spread_radius]"]').on('change', ams_psbtt_IconTypeLoaded);
		
		$('[name="msv_amspsbtt_page_scroll_back_to_top_style[drop_h_length]"]').on('change', ams_psbtt_IconTypeLoaded);
		$('[name="msv_amspsbtt_page_scroll_back_to_top_style[drop_v_length]"]').on('change', ams_psbtt_IconTypeLoaded);
		$('[name="msv_amspsbtt_page_scroll_back_to_top_style[drop_blur_radius]"]').on('change', ams_psbtt_IconTypeLoaded);
		
		
	});

	function ams_psbtt_IconTypeLoaded() {
		var icon_type = $('[name="msv_amspsbtt_page_scroll_back_to_top_icon[icon_type]"]:checked').val();
		if ( 'preset' == icon_type ) {
			ams_psbtt_presetImageLoaded();
		} else if ( 'icon' == icon_type ) {
			ams_psbtt_IconLoaded();
		} else if ( 'text' == icon_type ) {
			ams_psbtt_txtButton();
		} else if ( 'upload' == icon_type ) {
			ams_psbtt_uploadImageLoaded();
		}
	}
	
	function ams_psbtt_presetImageLoaded(){
			var image_preset = $('[name="msv_amspsbtt_page_scroll_back_to_top_icon[image_preset]"]:checked').val();
			var preset_image_width = $('[name="msv_amspsbtt_page_scroll_back_to_top_icon[preset_image_width]"]').val();
			var preset_image_height = $('[name="msv_amspsbtt_page_scroll_back_to_top_icon[preset_image_height]"]').val();
			var border_color = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[border_color]"]').val();
			var border_box = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[border_box]"]').val();
			var image_margin_top = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[image_margin_top]"]').val();
			var border_radius = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[border_radius]"]').val();
			var image_bg_width = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[image_bg_width]"]').val();
			var image_bg_height = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[image_bg_height]"]').val();
			var image_opacity = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[image_opacity]"]').val();
			
			$('.ams-page-scroll-back-to-top-wrapper').html('<img class="live-image" src="'+ image_preset +'" alt="">');
			$('.ams-page-scroll-back-to-top-wrapper').attr('style', '');
			$('.live-image').css('width', preset_image_width + 'px', 'important');
			$('.live-image').css('height', preset_image_height);
			$('.live-image').css('margin-top', image_margin_top + 'px');
			$('.live-image').css('opacity', image_opacity);
			$('.ams-page-scroll-back-to-top-wrapper').css('cursor', 'pointer');
			$('.ams-page-scroll-back-to-top-wrapper').css('text-align', 'center');
			$('.ams-page-scroll-back-to-top-wrapper').css('border-radius', border_radius + 'px');
			$('.ams-page-scroll-back-to-top-wrapper').css({'border': border_box + 'px ' + 'solid ' + border_color, 'width': image_bg_width + 'px', 'height': image_bg_height });
			
			var image_bg_color_choice = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[image_bg_color_choice]"]:checked').val();
			if ( 'enabled' == image_bg_color_choice ) {
				var image_bg_color = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[image_bg_color]"]').val();
				$('.ams-page-scroll-back-to-top-wrapper').css("background", image_bg_color);
			} else {
				$('.ams-page-scroll-back-to-top-wrapper').css("background", '');
			}
			
			ams_psbtt_IconPosition();
			ams_psbtt_Bottom();
			boxShadow();
			dropShadow();
			setHeight();
			ams_psbtt_ColorLoaded();
	}
	
	function ams_psbtt_IconLoaded(){
			
			var icon_preset = $('[name="msv_amspsbtt_page_scroll_back_to_top_icon[icon_preset]"]:checked').val();
			var icon_size = $('[name="msv_amspsbtt_page_scroll_back_to_top_icon[icon_size]"]:checked').val();
			var icon_bg_width = $('[name="msv_amspsbtt_page_scroll_back_to_top_icon[icon_bg_width]"]').val();
			var icon_bg_height = $('[name="msv_amspsbtt_page_scroll_back_to_top_icon[icon_bg_height]"]').val();
			var icon_margin_top = $('[name="msv_amspsbtt_page_scroll_back_to_top_icon[icon_margin_top]"]').val();
			var icon_bg_color = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[icon_bg_color]"]').val();
			var icon_fg_color = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[icon_fg_color]"]').val();
			
			var border_radius = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[border_radius]"]').val();
			var border_color = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[border_color]"]').val();
			var border_box = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[border_box]"]').val();
			$('.ams-page-scroll-back-to-top-wrapper').css({'border': border_box + 'px ' + 'solid ' + border_color});
			$('.ams-page-scroll-back-to-top-wrapper').html('<i class="fa ' + icon_preset + ' ' + icon_size + '"></i>');
			$('.ams-page-scroll-back-to-top-wrapper').css('width', icon_bg_width);
			$('.ams-page-scroll-back-to-top-wrapper').css('height', icon_bg_height);
			$('.ams-page-scroll-back-to-top-wrapper').css('background', icon_bg_color);
			$('.ams-page-scroll-back-to-top-wrapper i.fa').css('color', icon_fg_color);
			$('.ams-page-scroll-back-to-top-wrapper .fa').css('margin-top', icon_margin_top + 'px', 'important');
			$('.ams-page-scroll-back-to-top-wrapper').css('text-align', 'center');
			$('.ams-page-scroll-back-to-top-wrapper').css('border-radius', border_radius + 'px', 'important');
			$('.ams-page-scroll-back-to-top-wrapper').css({'border': border_box + 'px ' + 'solid ' + border_color});
			
			
			
			ams_psbtt_IconPosition();
			ams_psbtt_Bottom();
			boxShadow();
			setHeight();
			ams_psbtt_ColorLoaded();
			
	}
	
	function ams_psbtt_txtButton(){
			var text_button = $('[name="msv_amspsbtt_page_scroll_back_to_top_icon[text_button]"]').val();
			var text_bg_width = $('[name="msv_amspsbtt_page_scroll_back_to_top_icon[text_bg_width]"]').val();
			var text_bg_height = $('[name="msv_amspsbtt_page_scroll_back_to_top_icon[text_bg_height]"]').val();
			var text_font_size = $('[name="msv_amspsbtt_page_scroll_back_to_top_icon[text_font_size]"]').val();
			var text_margin_top = $('[name="msv_amspsbtt_page_scroll_back_to_top_icon[text_margin_top]"]').val();
			var text_bg_color = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[text_bg_color]"]').val();
			var text_fg_color = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[text_fg_color]"]').val();
			var border_radius = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[border_radius]"]').val();
			var text_font_style = $('[name="msv_amspsbtt_page_scroll_back_to_top_icon[text_font_style]"] option:selected').text();
			var text_font_family = $('[name="msv_amspsbtt_page_scroll_back_to_top_icon[text_font_family]"] option:selected').text();
			var border_color = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[border_color]"]').val();
			var border_box = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[border_box]"]').val();
			
			$('.ams-page-scroll-back-to-top-wrapper').attr('style', '');
			$('.ams-page-scroll-back-to-top-wrapper').html('<p>' + text_button + '</p>');
			$('.ams-page-scroll-back-to-top-wrapper').css('width', text_bg_width + 'px', 'important');
			$('.ams-page-scroll-back-to-top-wrapper').css('height', text_bg_height);
			$('.ams-page-scroll-back-to-top-wrapper').css('text-align', 'center');
			$('.ams-page-scroll-back-to-top-wrapper p').css('line-height', '1.5em');
			$('.ams-page-scroll-back-to-top-wrapper p').css('font-size', text_font_size + 'px', 'important');
			$('.ams-page-scroll-back-to-top-wrapper p').css('margin-top', text_margin_top + 'px', 'important');
			$('.ams-page-scroll-back-to-top-wrapper').css("background", text_bg_color);
			$('.ams-page-scroll-back-to-top-wrapper p').css("color", text_fg_color);
			$('.ams-page-scroll-back-to-top-wrapper').css('border-radius', border_radius + 'px', 'important');
			if ( 'Normal' == text_font_style ) {
				$('.ams-page-scroll-back-to-top-wrapper p').css('font-weight', 'normal');
			} else if ( 'Bold' == text_font_style ) {
				$('.ams-page-scroll-back-to-top-wrapper p').css('font-weight', 'bold');
			} else if ( 'Italic' == text_font_style ) {
				$('.ams-page-scroll-back-to-top-wrapper p').css('font-style', 'italic');
			} else if ( 'Bold Italic' == text_font_style ) {
				$('.ams-page-scroll-back-to-top-wrapper p').css({'font-weight': 'bold', 'font-style': 'italic'});
				
			}
			switch(text_font_family) {
				case 'Open Sans':
					$('.ams-page-scroll-back-to-top-wrapper p').css("font-family", text_font_family);
					break;
				case 'Oswald':
					$('.ams-page-scroll-back-to-top-wrapper p').css("font-family", text_font_family);
					break;
				case 'Permanent Marker':
					$('.ams-page-scroll-back-to-top-wrapper p').css("font-family", text_font_family);
					break;
				case 'Roboto':
					$('.ams-page-scroll-back-to-top-wrapper p').css("font-family", text_font_family);
					break;
				case 'Shrikhand':
					$('.ams-page-scroll-back-to-top-wrapper p').css("font-family", text_font_family);
					break;
				case 'Teko':
					$('.ams-page-scroll-back-to-top-wrapper p').css("font-family", text_font_family);
					break;
				case 'Cabin':
					$('.ams-page-scroll-back-to-top-wrapper p').css("font-family", text_font_family);
					break;
				case 'Anton':
					$('.ams-page-scroll-back-to-top-wrapper p').css("font-family", text_font_family);
					break;
				case 'Poiret One':
					$('.ams-page-scroll-back-to-top-wrapper p').css("font-family", text_font_family);
					break;
				case 'Courgette':
					$('.ams-page-scroll-back-to-top-wrapper p').css("font-family", text_font_family);
					break;
					
				default:
					$('.ams-page-scroll-back-to-top-wrapper p').css("font-family", 'Open Sans');
			}
			
			$('.ams-page-scroll-back-to-top-wrapper').css({'border': border_box + 'px ' + 'solid ' + border_color});
			
			ams_psbtt_IconPosition();
			ams_psbtt_Bottom();
			boxShadow();
			setHeight();
			ams_psbtt_ColorLoaded();
			
	}
	
	function ams_psbtt_uploadImageLoaded(){
			var image_upload = $('[name="msv_amspsbtt_page_scroll_back_to_top_icon[image_upload]"]').val();
			var upload_image_width = $('[name="msv_amspsbtt_page_scroll_back_to_top_icon[upload_image_width]"]').val();
			var upload_image_height = $('[name="msv_amspsbtt_page_scroll_back_to_top_icon[upload_image_height]"]').val();
			var border_color = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[border_color]"]').val();
			var border_box = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[border_box]"]').val();
			var border_radius = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[border_radius]"]').val();
			var image_margin_top = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[image_margin_top]"]').val();
			var image_bg_width = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[image_bg_width]"]').val();
			var image_bg_height = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[image_bg_height]"]').val();
			var image_opacity = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[image_opacity]"]').val();
			
			$('.ams-page-scroll-back-to-top-wrapper').html('<img class="live-image" src="'+ image_upload +'" alt="">');
			$('.ams-page-scroll-back-to-top-wrapper').attr('style', '');
			$('.ams-page-scroll-back-to-top-wrapper img').css('width', upload_image_width + 'px', 'important');
			$('.ams-page-scroll-back-to-top-wrapper img').css('height', upload_image_height);
			$('.live-image').css('margin-top', image_margin_top + 'px');
			$('.live-image').css('opacity', image_opacity);
			$('.ams-page-scroll-back-to-top-wrapper').css('text-align', 'center');
			$('.ams-page-scroll-back-to-top-wrapper').css('border-radius', border_radius + 'px');
			$('.ams-page-scroll-back-to-top-wrapper').css('cursor', 'pointer');
			$('.ams-page-scroll-back-to-top-wrapper').css({'border': border_box + 'px ' + 'solid ' + border_color, 'width': image_bg_width + 'px', 'height': image_bg_height });
			
			var image_bg_color_choice = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[image_bg_color_choice]"]:checked').val();
			if ( 'enabled' == image_bg_color_choice ) {
				var image_bg_color = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[image_bg_color]"]').val();
				$('.ams-page-scroll-back-to-top-wrapper').css("background", image_bg_color);
			} else {
				$('.ams-page-scroll-back-to-top-wrapper').css("background", '');
			}
			
			ams_psbtt_IconPosition();
			ams_psbtt_Bottom();
			boxShadow();
			dropShadow();
			setHeight();
			ams_psbtt_ColorLoaded();
	}
	
	function ams_psbtt_IconPosition() {
	
		var position = $('[name="msv_amspsbtt_page_scroll_back_to_top_layout[position]"]:checked').val();
		var padding_side = $('[name="msv_amspsbtt_page_scroll_back_to_top_layout[padding_side]"]').val();
		
		if ( 'left' == position ) {
			$('.ams-page-scroll-back-to-top-wrapper').css('position', 'absolute');
			
			$('.ams-page-scroll-back-to-top-wrapper').css('left', padding_side + 'px');
			$('.ams-page-scroll-back-to-top-wrapper').css('right', '');
		} else if ( 'right' == position ) {
		$('.ams-page-scroll-back-to-top-wrapper').css('position', 'absolute');
			$('.ams-page-scroll-back-to-top-wrapper').css('right', padding_side + 'px');
			$('.ams-page-scroll-back-to-top-wrapper').css('left', '');
		}
	
	}
	
	function ams_psbtt_Bottom() {
	
		var bottom = $('[name="msv_amspsbtt_page_scroll_back_to_top_layout[bottom]"]').val();
		$('.ams-page-scroll-back-to-top-wrapper').css('position', 'absolute');
		$('.ams-page-scroll-back-to-top-wrapper').css('bottom', bottom + 'px');
	}
	
	function boxShadow() {
			var box_shadow = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[box_shadow]"]:checked').val();
			var h_length = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[h_length]"]').val();
			var v_length = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[v_length]"]').val();
			var blur_radius = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[blur_radius]"]').val();
			var spread_radius = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[spread_radius]"]').val();
			var sh_color = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[sh_color]"]').val();
			if ( 'on' == box_shadow ) {
				$('#ams-box-shadow').removeAttr('disabled');
				$('.ams-page-scroll-back-to-top-wrapper').css('box-shadow', h_length + 'px ' + v_length + 'px ' + blur_radius + 'px ' + spread_radius + 'px ' + sh_color );
			} else {
				$('#ams-box-shadow').attr('disabled',true);
				$('.ams-page-scroll-back-to-top-wrapper').css('box-shadow', "");
			}
	}
	
	function dropShadow() {
			var drop_shadow = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[drop_shadow]"]:checked').val();
			var h_length = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[drop_h_length]"]').val();
			var v_length = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[drop_v_length]"]').val();
			var blur_radius = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[drop_blur_radius]"]').val();
			var sh_color = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[drop_sh_color]"]').val();
			if ( 'on' == drop_shadow ) {
				$('#ams-drop-shadow').removeAttr('disabled');
				$('.ams-page-scroll-back-to-top-wrapper img').css('filter', 'drop-shadow(' + h_length + 'px ' + v_length + 'px ' + blur_radius + 'px ' + sh_color + ')');
			} else {
				$('#ams-drop-shadow').attr('disabled',true);
				$('.ams-page-scroll-back-to-top-wrapper img').css('filter', "");
			}
	}
	
	
	function ams_psbtt_ColorLoaded() {
		var icon_type = $('[name="msv_amspsbtt_page_scroll_back_to_top_icon[icon_type]"]:checked').val();
		if ( 'icon' == icon_type ) {
			ams_psbtt_IconColorLoaded();
		} else if ( 'text' == icon_type ) {
			ams_psbtt_txtColorLoaded();
		} else if ( 'preset' == icon_type ) {
			ams_psbtt_imageColorLoaded();
		
		}
	}
	
	function ams_psbtt_IconColorLoaded() {
		var icon_bg_color = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[icon_bg_color]"]').val();
		var icon_fg_color = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[icon_fg_color]"]').val();
			$('.ams-page-scroll-back-to-top-wrapper').css("background", icon_bg_color);
			$('.ams-page-scroll-back-to-top-wrapper i.fa').css("color", icon_fg_color);
	}
	
	function ams_psbtt_txtColorLoaded() {
		var text_bg_color = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[text_bg_color]"]').val();
		var text_fg_color = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[text_fg_color]"]').val();
			$('.ams-page-scroll-back-to-top-wrapper').css("background", text_bg_color);
			$('.ams-page-scroll-back-to-top-wrapper i.fa').css("color", text_fg_color);
	}
	
	function ams_psbtt_imageColorLoaded() {
				var image_bg_color_choice = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[image_bg_color_choice]"]:checked').val();
				if ( 'enabled' == image_bg_color_choice ) {
					var image_bg_color = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[image_bg_color]"]').val();
					$('.ams-page-scroll-back-to-top-wrapper').css("background", image_bg_color);
				} else {
					$('.ams-page-scroll-back-to-top-wrapper').css("background", '');
				}
	}
	
	
	$( "#contextual-help-link" ).click(function() {
		if ($(window).scrollTop() > 50 && $("#contextual-help-wrap").is(":hidden") ) {
			$('.inner-sidebar').css('position', 'fixed');
			$('.inner-sidebar').css('top', '150px');
			$('.inner-sidebar').css('right', '20px');
		} else {
			$('.inner-sidebar').css('top', '');
		}
		
		setHeight();
	});
	
	
	$(".ams-page-scroll-back-to-top-wrapper").hover(function(){
		
			var icon_type = $('[name="msv_amspsbtt_page_scroll_back_to_top_icon[icon_type]"]:checked').val();
			
			if ( 'icon' == icon_type ) {
				var icon_bg_hover_color = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[icon_bg_hover_color]"]').val();
				var icon_fg_hover_color = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[icon_fg_hover_color]"]').val();
				$(".ams-page-scroll-back-to-top-wrapper").css('background', icon_bg_hover_color);
				$(".ams-page-scroll-back-to-top-wrapper i").css('color', icon_fg_hover_color);
			} else if ( 'text' == icon_type ) {
			
				var text_bg_hover_color = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[text_bg_hover_color]"]').val();
				var text_fg_hover_color = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[text_fg_hover_color]"]').val();
				$(".ams-page-scroll-back-to-top-wrapper").css('background', text_bg_hover_color);
				$(".ams-page-scroll-back-to-top-wrapper p").css('color', text_fg_hover_color);
			
			} else if ( 'preset' == icon_type ) {
				image_mouse_enter();
			} else if ( 'upload' == icon_type ) {
				image_mouse_enter();
			}
		}, function(){
			var icon_type = $('[name="msv_amspsbtt_page_scroll_back_to_top_icon[icon_type]"]:checked').val();
			if ( 'icon' == icon_type ) {
				var icon_bg_color = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[icon_bg_color]"]').val();
				var icon_fg_color = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[icon_fg_color]"]').val();
				$(".ams-page-scroll-back-to-top-wrapper").css('background', icon_bg_color);
				$(".ams-page-scroll-back-to-top-wrapper i").css('color', icon_fg_color);
			} else if ( 'text' == icon_type ) {
				var text_bg_color = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[text_bg_color]"]').val();
				var text_fg_color = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[text_fg_color]"]').val();
				$(".ams-page-scroll-back-to-top-wrapper").css('background', text_bg_color);
				$(".ams-page-scroll-back-to-top-wrapper p").css('color', text_fg_color);
			} else if ( 'preset' == icon_type ) {
				image_mouse_leave();
			} else if ( 'upload' == icon_type ) {
				image_mouse_leave();
			}
		});
		
		function image_mouse_enter() {
			var image_hover_opacity = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[image_hover_opacity]"]').val();
			$('.ams-page-scroll-back-to-top-wrapper img').css('opacity', image_hover_opacity);
		}
		function image_mouse_leave() {
			var image_opacity = $('[name="msv_amspsbtt_page_scroll_back_to_top_style[image_opacity]"]').val();
			$('.ams-page-scroll-back-to-top-wrapper img').css('opacity', image_opacity);
		}
		
		$("#msv_amspsbtt_page_scroll_back_to_top_icon-tab").click( function(){
			setHeight();
		   
		});
		
		$("#msv_amspsbtt_page_scroll_back_to_top_style-tab").click( function(){
			setHeight();
		   
		});
		
		$("#msv_amspsbtt_page_scroll_back_to_top_advanced-tab").click( function(){
			setHeight();
		   
		});
		
		
		$('[name="msv_amspsbtt_page_scroll_back_to_top_style[image_bg_color_choice]').click(function() {

			ams_psbtt_ColorLoaded();
    
		});
	
	$(window).resize(function(){
		var newwidth = $(window).width();
		newwidth = newwidth/2.6;
		
		$(".field_radio").width(newwidth);
		newwidth = newwidth/1.1;
		$(".inner-sidebar").width(newwidth);
		$(".postbox").css('min-width', newwidth);
		
		setHeight();
			
	});
	
	$(window).scroll( function() {
		
		//alert($('.wrap').offset().top);
		if ($(window).scrollTop() > 100) {
			$('.inner-sidebar').css('position', 'fixed');
			$('.inner-sidebar').css('top', '50px');
			$('.inner-sidebar').css('right', '20px');
		} else {
			$('.inner-sidebar').css('top', '');
		}
		var wrap = $('.wrap').offset().top;
		var inner = $('.inner-sidebar').offset().top;
		if( $("#contextual-help-wrap").is(":visible") ) {
			$('.inner-sidebar').css('top', wrap + 100);
			$('.inner-sidebar').css('position', 'absolute');
		} else {
			$('.inner-sidebar').css('top', '');
		}
		
		if ( wrap <= inner - 150 ) {
			$('.inner-sidebar').css('position', 'fixed');
			$('.inner-sidebar').css('top', '');
			$('.inner-sidebar').css('right', '20px');
		}
		
		setHeight();
	});
	
	function setHeight() {
		windowHeight = $(window).height();
		offset_top = $('.postbox').offset().top;
		$('.inside').css('height', windowHeight - 239);
	};
})(jQuery);