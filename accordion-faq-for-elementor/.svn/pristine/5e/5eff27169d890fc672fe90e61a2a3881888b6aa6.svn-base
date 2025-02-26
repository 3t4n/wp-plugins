<?php
if (!defined('ABSPATH'))
  exit;
if (!empty($_POST['submit']) && $_POST['submit'] == 'Save' && $_POST['style'] != '') {
  $nonce = $_REQUEST['_wpnonce'];
  if (!wp_verify_nonce($nonce, 'afaq-6310-nonce-field')) {
    die('You do not have sufficient permissions to access this page.');
  } else {

    $name = sanitize_text_field($_POST['style_name']);
    $style_name = sanitize_text_field($_POST['style']);

    //$members = $wpdb->get_results('SELECT * FROM ' . $faq_table . ' ORDER BY name ASC', ARRAY_A);
    $templateids = "";
    $templateList = [];

    if ($style_name == 'template-11') {
      $css = "_wp_http_referer,id,animation_duration,afaq_faq_mode,icon_show_hide,head_icon_width_number,head_icon_font_size_number,title_icon_color,icon_hover_color,title_active_icon,title_inactive_icon,indicator_width_number,indicator_font_size_number,indicator_color,indicator_hover_color,after_effect_background_color,angle_width_number,title_font_size_number,title_line_height_number,title_font_weight,title_text_align,title_text_transform,title_font_family,title_font_color,title_text_hover_color,title_bg_color,title_bg_hover_color,title_padding_top_number,title_padding_bottom_number,title_padding_left_number,title_padding_right_number,body_margin_bottom,description_scroll,description_font_family,description_font_size_number,description_line_height_number,description_font_weight,description_text_transform,description_text_align,description_font_color,description_text_hover_color,description_font_background_color,description_background_hover_color,description_padding_left_number,description_padding_right_number,description_padding_top_number,description_padding_bottom_number,description_margin_bottom,activate_default_category,selected_category_template,category_per_row,category_01_title_font_family,category_01_title_font_size_number_number,category_01_title_line_height_number,category_01_title_font_weight,category_01_title_color,category_01_title_hover_color,category_01_title_background_hover_color,category_01_border_size_number,category_01_border_color,category_01_icon_font_size_number,category_01_icon_color,category_icon_hover_color,category_01_description_font_family,category_01_description_font_size_number_number,category_01_description_line_height_number_number,category_01_description_font_weight,category_01_description_color,category_01_description_hover_color,category_02_title_font_size_number,category_02_title_color,category_02_title_hover_color,category_02_title_background_color,category_02_title_background_hover_color,category_02_height,category_02_icon_font_size,category_02_icon_height,category_02_First_icon_color,category_02_First_icon_backgrond_color,category_02_Second_icon_color,category_02_Second_icon_backgrond_color,category_02_third_icon_color,category_02_third_icon_backgrond_color,category_02_Fourth_icon_color,category_02_Fourth_icon_backgrond_color,category_03_title_font_size_number,category_03_title_color,category_03_title_hover_color,category_03_title_padding_size,category_03_title_background_hover_color,category_03_height,category_03_icon_font_size,category_03_icon_circle_size,category_03_icon_color,category_03_icon_hover_color,category_03_icon_backgrond_color,category_03_icon_backgrond_hover_color,place_holder_text,searce_font_family,search_font_size_number,search_box_height_number,search_width,search_box_align,search_icon_size_number,search_icon_color,search_icon_hover_color,search_background_color,search_border_width_number,search_border_radious_number,search_border_color,template_button,button_font_color,button_font_family,button_font_size_number,button_font_weight,button_text_transform,button_height_number,button_width_number,button_align,button_background_color,button_background_hover_color,button_border_width,button_border_radius_number,button_border_color,button_border_hover_color,button_margin_top_number,button_margin_bottom_number,custom_css,update_style_change!!##!!/wordpress/wp-admin/admin.php?page=afaq-6310-faq-11-20&styleid=10||##||10||##||0.5||##||1||##||1||##||50||##||20||##||rgb(255, 255, 255)||##||rgb(255, 255, 255)||##||fas fa-angle-down||##||fas fa-angle-up||##||50||##||16||##||rgb(255, 255, 255)||##||rgb(255, 255, 255)||##||rgb(255, 255, 255)||##||20||##||16||##||22||##||500||##||flex-start||##||uppercase||##||Arimo||##||rgb(255, 255, 255)||##||rgb(255, 255, 255)||##||rgb(26, 80, 139)||##||rgb(17, 29, 94)||##||15||##||15||##||10||##||5||##||8||##||150||##||Arimo||##||14||##||20||##||400||##||none||##||left||##||rgb(48, 45, 45)||##||rgb(0, 0, 0)||##||rgba(193, 161, 211, 1)||##||rgba(193, 161, 211, 1)||##||10||##||10||##||10||##||10||##||10||##||1||##||||##||2||##||Cuprum||##||20||##||20||##||700||##||rgb(0, 0, 0)||##||rgb(0, 0, 0)||##||rgba(240, 240, 240, 0.91)||##||1||##||rgb(140, 140, 140)||##||40||##||rgb(26, 80, 139)||##||rgb(17, 29, 94)||##||Amaranth||##||13||##||20||##||100||##||#8a8a8a||##||#4f676e||##||13||##||#dbf0e4||##||#dbf0e4||##||#ededed||##||#ededed||##||40||##||35||##||70||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#228a8e||##||#00b4b3||##||#228a8e||##||13||##||#dbf0e4||##||#eef0e4||##||10||##||#ededed||##||2||##||25||##||50||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||Enter Keywords eg: Foods, Blog...||##||Roboto||##||14||##||30||##||35||##||flex-end||##||14||##||rgb(26, 80, 139)||##||rgb(23, 64, 97)||##||rgb(255, 255, 255)||##||1||##||23||##||rgb(23, 64, 97)||##||1||##||rgb(255, 255, 255)||##||Roboto||##||14||##||300||##||capitalize||##||30||##||100||##||right||##||rgb(17, 29, 94)||##||rgb(26, 80, 139)||##||1px||##||40||##||rgb(26, 80, 139)||##||rgb(17, 29, 94)||##||10||##||0||##||||##||Save";
    } else if ($style_name == 'template-12') {
      $css = "_wp_http_referer,id,animation_duration,afaq_faq_mode,head_icon_width_number,head_icon_font_size_number,title_icon_color,icon_hover_color,icon_background_color,icon_background_hover_color,head_icon_border_size,title_active_icon,title_inactive_icon,indicator_width_number,indicator_font_size_number,indicator_color,indicator_hover_color,indicator_background_color,indicator_background_hover_color,title_icon_border_color,title_icon_border_hover_color,title_font_size_number,title_line_height_number,title_font_weight,title_font_color,title_text_hover_color,title_bg_color,title_bg_hover_color,title_text_align,title_text_transform,title_font_family,title_padding_top_number,title_padding_bottom_number,title_padding_left_number,title_padding_right_number,title_margin_bottom,description_scroll,description_font_size_number,description_line_height_number,description_font_weight,description_font_color,description_text_hover_color,description_font_family,description_text_transform,description_text_align,description_padding_left_number,description_padding_right_number,description_padding_top_number,description_padding_bottom_number,description_margin_bottom,description_border_bottom,description_border_bottom_color,description_bg_color,description_bg_hover_color,activate_default_category,selected_category_template,category_per_row,category_01_title_font_family,category_01_title_font_size_number_number,category_01_title_line_height_number,category_01_title_font_weight,category_01_title_color,category_01_title_hover_color,category_01_title_background_hover_color,category_01_border_size_number,category_01_border_color,category_01_icon_font_size_number,category_01_icon_color,category_icon_hover_color,category_01_description_font_family,category_01_description_font_size_number_number,category_01_description_line_height_number_number,category_01_description_font_weight,category_01_description_color,category_01_description_hover_color,category_02_title_font_size_number,category_02_title_color,category_02_title_hover_color,category_02_title_background_color,category_02_title_background_hover_color,category_02_height,category_02_icon_font_size,category_02_icon_height,category_02_First_icon_color,category_02_First_icon_backgrond_color,category_02_Second_icon_color,category_02_Second_icon_backgrond_color,category_02_third_icon_color,category_02_third_icon_backgrond_color,category_02_Fourth_icon_color,category_02_Fourth_icon_backgrond_color,category_03_title_font_size_number,category_03_title_color,category_03_title_hover_color,category_03_title_padding_size,category_03_title_background_hover_color,category_03_height,category_03_icon_font_size,category_03_icon_circle_size,category_03_icon_color,category_03_icon_hover_color,category_03_icon_backgrond_color,category_03_icon_backgrond_hover_color,place_holder_text,searce_font_family,search_font_size_number,search_box_height_number,search_width,search_box_align,search_icon_size_number,search_icon_color,search_icon_hover_color,search_background_color,search_border_width_number,search_border_radious_number,search_border_color,template_button,button_font_color,button_font_family,button_font_size_number,button_font_weight,button_text_transform,button_height_number,button_width_number,button_align,button_background_color,button_background_hover_color,button_border_width,button_border_radius_number,button_border_color,button_border_hover_color,button_margin_top_number,button_margin_bottom_number,custom_css,update_style_change!!##!!/wordpress/wp-admin/admin.php?page=afaq-6310-faq-11-20&styleid=11||##||11||##||0.5||##||1||##||50||##||20||##||rgb(179, 29, 71)||##||rgb(179, 29, 71)||##||rgb(248, 248, 248)||##||rgb(248, 248, 248)||##||2||##||fas fa-angle-down||##||fas fa-angle-up||##||50||##||16||##||rgb(179, 29, 71)||##||rgb(179, 29, 71)||##||rgb(248, 248, 248)||##||rgb(248, 248, 248)||##||rgb(179, 29, 71)||##||rgb(179, 29, 71)||##||16||##||22||##||500||##||rgb(179, 29, 71)||##||rgb(179, 29, 71)||##||rgb(248, 248, 248)||##||rgb(248, 248, 248)||##||flex-start||##||uppercase||##||Arimo||##||15||##||15||##||10||##||5||##||10||##||150||##||14||##||20||##||400||##||rgb(48, 45, 45)||##||rgb(0, 0, 0)||##||Arimo||##||none||##||left||##||10||##||10||##||10||##||10||##||10||##||2||##||rgb(204, 8, 64)||##||rgba(240, 240, 240, 0.08)||##||rgba(252, 252, 252, 0.08)||##||1||##||||##||2||##||Cuprum||##||20||##||20||##||700||##||rgb(0, 0, 0)||##||rgb(0, 0, 0)||##||rgba(240, 240, 240, 0.91)||##||1||##||rgb(140, 140, 140)||##||40||##||rgb(26, 80, 139)||##||rgb(17, 29, 94)||##||Amaranth||##||13||##||20||##||100||##||#8a8a8a||##||#4f676e||##||13||##||#dbf0e4||##||#dbf0e4||##||#ededed||##||#ededed||##||40||##||35||##||70||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#228a8e||##||#00b4b3||##||#228a8e||##||13||##||#dbf0e4||##||#eef0e4||##||10||##||#ededed||##||2||##||25||##||50||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||Enter Keywords eg: Foods, Blog...||##||Roboto||##||14||##||30||##||35||##||flex-end||##||14||##||rgb(26, 80, 139)||##||rgb(23, 64, 97)||##||rgb(255, 255, 255)||##||1||##||23||##||rgb(23, 64, 97)||##||1||##||rgb(255, 255, 255)||##||Roboto||##||14||##||300||##||capitalize||##||30||##||100||##||right||##||rgb(17, 29, 94)||##||rgb(26, 80, 139)||##||1px||##||40||##||rgb(26, 80, 139)||##||rgb(17, 29, 94)||##||10||##||0||##||||##||Save";
    } else if ($style_name == 'template-13') {
      $css = "_wp_http_referer,id,animation_duration,afaq_faq_mode,icon_show_hide,head_icon_width_number,head_icon_font_size_number,title_icon_color,icon_hover_color,title_active_icon,title_inactive_icon,indicator_width_number,indicator_font_size_number,indicator_color,indicator_hover_color,angle_width_number,angle_rotated,title_font_size_number,title_line_height_number,title_font_weight,title_font_color,title_text_hover_color,title_bg_color,title_bg_hover_color,title_text_align,title_text_transform,title_font_family,title_padding_top_number,title_padding_bottom_number,title_padding_left_number,title_padding_right_number,title_margin_bottom,description_scroll,description_font_size_number,description_line_height_number,description_font_color,description_text_hover_color,description_font_background_color,description_background_hover_color,description_font_family,description_content_section_margin_top,description_content_section_margin_bottom,description_font_weight,description_text_transform,description_text_align,description_padding_left_number,description_padding_right_number,description_padding_top_number,description_padding_bottom_number,description_border_height,description_border_bottom_color,description_border_position,activate_default_category,selected_category_template,category_per_row,category_01_title_font_family,category_01_title_font_size_number_number,category_01_title_line_height_number,category_01_title_font_weight,category_01_title_color,category_01_title_hover_color,category_01_title_background_hover_color,category_01_border_size_number,category_01_border_color,category_01_icon_font_size_number,category_01_icon_color,category_icon_hover_color,category_01_description_font_family,category_01_description_font_size_number_number,category_01_description_line_height_number_number,category_01_description_font_weight,category_01_description_color,category_01_description_hover_color,category_02_title_font_size_number,category_02_title_color,category_02_title_hover_color,category_02_title_background_color,category_02_title_background_hover_color,category_02_height,category_02_icon_font_size,category_02_icon_height,category_02_First_icon_color,category_02_First_icon_backgrond_color,category_02_Second_icon_color,category_02_Second_icon_backgrond_color,category_02_third_icon_color,category_02_third_icon_backgrond_color,category_02_Fourth_icon_color,category_02_Fourth_icon_backgrond_color,category_03_title_font_size_number,category_03_title_color,category_03_title_hover_color,category_03_title_padding_size,category_03_title_background_hover_color,category_03_height,category_03_icon_font_size,category_03_icon_circle_size,category_03_icon_color,category_03_icon_hover_color,category_03_icon_backgrond_color,category_03_icon_backgrond_hover_color,place_holder_text,searce_font_family,search_font_size_number,search_box_height_number,search_width,search_box_align,search_icon_size_number,search_icon_color,search_icon_hover_color,search_background_color,search_border_width_number,search_border_radious_number,search_border_color,template_button,button_font_color,button_font_family,button_font_size_number,button_font_weight,button_text_transform,button_height_number,button_width_number,button_align,button_background_color,button_background_hover_color,button_border_width,button_border_radius_number,button_border_color,button_border_hover_color,button_margin_top_number,button_margin_bottom_number,custom_css,update_style_change!!##!!/wordpress/wp-admin/admin.php?page=afaq-6310-faq-11-20&styleid=12||##||12||##||0.5||##||1||##||1||##||50||##||20||##||rgb(255, 255, 255)||##||rgb(255, 255, 255)||##||fas fa-cut||##||fas fa-chevron-down||##||50||##||16||##||rgb(255, 255, 255)||##||rgb(255, 255, 255)||##||30||##||17||##||16||##||22||##||300||##||rgb(255, 255, 255)||##||rgb(255, 255, 255)||##||rgb(2, 44, 61)||##||rgb(133, 78, 31)||##||flex-start||##||none||##||Arimo||##||10||##||10||##||10||##||10||##||5||##||150||##||16||##||20||##||rgb(255, 255, 255)||##||rgb(255, 255, 255)||##||rgba(147, 155, 98, 1)||##||rgba(147, 155, 98, 1)||##||Roboto||##||10||##||10||##||100||##||none||##||left||##||8||##||18||##||20||##||20||##||2||##||rgb(255, 255, 255)||##||9||##||1||##||||##||2||##||Cuprum||##||20||##||20||##||800||##||rgb(0, 0, 0)||##||rgb(0, 0, 0)||##||rgba(240, 240, 240, 0.91)||##||1||##||rgb(140, 140, 140)||##||40||##||rgb(2, 44, 61)||##||rgb(133, 78, 31)||##||Roboto||##||13||##||20||##||300||##||rgb(135, 135, 135)||##||rgb(78, 103, 110)||##||13||##||#dbf0e4||##||#dbf0e4||##||#ededed||##||#ededed||##||40||##||35||##||70||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#228a8e||##||#00b4b3||##||#228a8e||##||13||##||#dbf0e4||##||#eef0e4||##||10||##||#ededed||##||2||##||25||##||50||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||Enter Keywords eg: Foods, Blog...||##||Roboto||##||14||##||30||##||35||##||flex-end||##||14||##||rgb(2, 44, 61)||##||rgb(2, 44, 61)||##||rgb(255, 255, 255)||##||1||##||23||##||rgb(2, 44, 61)||##||1||##||rgb(255, 255, 255)||##||Roboto||##||14||##||100||##||capitalize||##||30||##||100||##||right||##||rgb(133, 78, 31)||##||rgb(179, 104, 38)||##||1px||##||40||##||rgb(133, 78, 31)||##||rgb(133, 78, 31)||##||10||##||10||##||||##||Save";
    } else if ($style_name == 'template-14') {
      $css = "_wp_http_referer,id,animation_duration,afaq_faq_mode,icon_show_hide,head_icon_width_number,head_icon_font_size_number,title_icon_color,icon_hover_color,title_active_icon,title_inactive_icon,indicator_width_number,indicator_font_size_number,indicator_color,indicator_hover_color,title_font_size_number,title_line_height_number,title_font_weight,title_font_color,title_text_hover_color,title_bg_color,top_border_height_number,title_border_top_color,title_text_align,title_text_transform,title_font_family,title_padding_top_number,title_padding_bottom_number,title_padding_left_number,title_padding_right_number,description_scroll,description_font_size_number,description_line_height_number,description_font_color,description_text_hover_color,description_font_background_color,description_background_hover_color,description_font_family,description_font_weight,description_text_transform,description_text_align,description_padding_left_number,description_padding_right_number,description_padding_top_number,description_padding_bottom_number,activate_default_category,selected_category_template,category_per_row,category_01_title_font_family,category_01_title_font_size_number_number,category_01_title_line_height_number,category_01_title_font_weight,category_01_title_color,category_01_title_hover_color,category_01_title_background_hover_color,category_01_border_size_number,category_01_border_color,category_01_icon_font_size_number,category_01_icon_color,category_icon_hover_color,category_01_description_font_family,category_01_description_font_size_number_number,category_01_description_line_height_number_number,category_01_description_font_weight,category_01_description_color,category_01_description_hover_color,category_02_title_font_size_number,category_02_title_color,category_02_title_hover_color,category_02_title_background_color,category_02_title_background_hover_color,category_02_height,category_02_icon_font_size,category_02_icon_height,category_02_First_icon_color,category_02_First_icon_backgrond_color,category_02_Second_icon_color,category_02_Second_icon_backgrond_color,category_02_third_icon_color,category_02_third_icon_backgrond_color,category_02_Fourth_icon_color,category_02_Fourth_icon_backgrond_color,category_03_title_font_size_number,category_03_title_color,category_03_title_hover_color,category_03_title_padding_size,category_03_title_background_hover_color,category_03_height,category_03_icon_font_size,category_03_icon_circle_size,category_03_icon_color,category_03_icon_hover_color,category_03_icon_backgrond_color,category_03_icon_backgrond_hover_color,place_holder_text,searce_font_family,search_font_size_number,search_box_height_number,search_width,search_box_align,search_icon_size_number,search_icon_color,search_icon_hover_color,search_background_color,search_border_width_number,search_border_radious_number,search_border_color,template_button,button_font_color,button_font_family,button_font_size_number,button_font_weight,button_text_transform,button_height_number,button_width_number,button_align,button_background_color,button_background_hover_color,button_border_width,button_border_radius_number,button_border_color,button_border_hover_color,button_margin_top_number,button_margin_bottom_number,custom_css,update_style_change!!##!!/wordpress/wp-admin/admin.php?page=afaq-6310-faq-11-20&styleid=13||##||13||##||0.5||##||1||##||1||##||50||##||20||##||rgb(204, 10, 101)||##||rgb(204, 10, 101)||##||fas fa-arrow-up||##||fas fa-arrow-down||##||50||##||16||##||rgb(204, 10, 101)||##||rgb(204, 10, 101)||##||16||##||22||##||300||##||rgb(18, 17, 18)||##||rgb(204, 10, 101)||##||rgb(255, 255, 255)||##||2||##||rgb(235, 73, 148)||##||flex-start||##||none||##||Arimo||##||15||##||15||##||10||##||5||##||150||##||14||##||20||##||rgb(23, 17, 17)||##||rgb(51, 49, 49)||##||rgba(255, 255, 255, 1)||##||rgba(255, 255, 255, 1)||##||Arimo||##||100||##||capitalize||##||left||##||10||##||10||##||10||##||10||##||1||##||||##||2||##||Cuprum||##||20||##||20||##||600||##||rgb(0, 0, 0)||##||rgb(0, 0, 0)||##||rgba(240, 240, 240, 0.91)||##||1||##||rgb(204, 10, 101)||##||40||##||rgb(204, 10, 101)||##||rgb(214, 60, 132)||##||Roboto||##||13||##||20||##||bold||##||rgb(138, 136, 136)||##||rgb(71, 95, 102)||##||13||##||#dbf0e4||##||#dbf0e4||##||#ededed||##||#ededed||##||40||##||35||##||70||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#228a8e||##||#00b4b3||##||#228a8e||##||13||##||#dbf0e4||##||#eef0e4||##||10||##||#ededed||##||2||##||25||##||50||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||Enter Keywords eg: Foods, Blog...||##||Roboto||##||14||##||30||##||35||##||flex-end||##||14||##||rgb(204, 10, 101)||##||rgb(224, 62, 138)||##||rgb(255, 255, 255)||##||1||##||50||##||rgb(204, 10, 101)||##||1||##||rgb(255, 255, 255)||##||Roboto||##||16||##||100||##||capitalize||##||30||##||100||##||right||##||rgb(204, 10, 101)||##||rgb(163, 39, 97)||##||1px||##||40||##||rgb(204, 10, 101)||##||rgb(204, 10, 101)||##||10||##||10||##||||##||Save";
    } else if ($style_name == 'template-15') {
      $css = "_wp_http_referer,id,animation_duration,afaq_faq_mode,icon_show_hide,head_icon_width_number,head_icon_font_size_number,title_icon_color,icon_hover_color,angle_width_number,arrow_sign_top_color,title_active_icon,title_inactive_icon,indicator_width_number,indicator_font_size_number,indicator_color,indicator_hover_color,head_number_size,number_color,number_hover_color,number_background_color,title_font_size_number,title_line_height_number,title_font_weight,title_font_color,title_text_hover_color,title_bg_color,title_bg_hover_color,description_margin_bottom,title_text_align,title_text_transform,title_font_family,title_padding_top_number,title_padding_bottom_number,title_padding_left_number,title_padding_right_number,title_border_size,title_border_color,title_border_hover_color,description_scroll,description_font_size_number,description_line_height_number,description_font_weight,description_font_color,description_font_background_color,description_background_hover_color,description_font_family,description_text_transform,description_text_align,description_padding_left_number,description_padding_right_number,description_padding_top_number,description_padding_bottom_number,activate_default_category,selected_category_template,category_per_row,category_01_title_font_family,category_01_title_font_size_number_number,category_01_title_line_height_number,category_01_title_font_weight,category_01_title_color,category_01_title_hover_color,category_01_title_background_hover_color,category_01_border_size_number,category_01_border_color,category_01_icon_font_size_number,category_01_icon_color,category_icon_hover_color,category_01_description_font_family,category_01_description_font_size_number_number,category_01_description_line_height_number_number,category_01_description_font_weight,category_01_description_color,category_01_description_hover_color,category_02_title_font_size_number,category_02_title_color,category_02_title_hover_color,category_02_title_background_color,category_02_title_background_hover_color,category_02_height,category_02_icon_font_size,category_02_icon_height,category_02_First_icon_color,category_02_First_icon_backgrond_color,category_02_Second_icon_color,category_02_Second_icon_backgrond_color,category_02_third_icon_color,category_02_third_icon_backgrond_color,category_02_Fourth_icon_color,category_02_Fourth_icon_backgrond_color,category_03_title_font_size_number,category_03_title_color,category_03_title_hover_color,category_03_title_padding_size,category_03_title_background_hover_color,category_03_height,category_03_icon_font_size,category_03_icon_circle_size,category_03_icon_color,category_03_icon_hover_color,category_03_icon_backgrond_color,category_03_icon_backgrond_hover_color,place_holder_text,searce_font_family,search_font_size_number,search_box_height_number,search_width,search_box_align,search_icon_size_number,search_icon_color,search_icon_hover_color,search_background_color,search_border_width_number,search_border_radious_number,search_border_color,template_button,button_font_color,button_font_family,button_font_size_number,button_font_weight,button_text_transform,button_height_number,button_width_number,button_align,button_background_color,button_background_hover_color,button_border_width,button_border_radius_number,button_border_color,button_border_hover_color,button_margin_top_number,button_margin_bottom_number,custom_css,update_style_change!!##!!/wordpress/wp-admin/admin.php?page=afaq-6310-faq-11-20&styleid=14||##||14||##||0.5||##||1||##||1||##||50||##||20||##||rgb(148, 162, 16)||##||rgb(148, 162, 16)||##||40||##||rgb(255, 255, 255)||##||fas fa-arrow-up||##||fas fa-arrow-down||##||50||##||16||##||rgb(148, 162, 16)||##||rgb(148, 162, 16)||##||20||##||rgb(255, 255, 255)||##||rgb(255, 255, 255)||##||rgb(148, 162, 16)||##||16||##||22||##||400||##||rgb(33, 21, 21)||##||rgb(33, 21, 21)||##||rgb(255, 255, 255)||##||rgb(255, 255, 255)||##||5||##||flex-start||##||none||##||Arimo||##||15||##||15||##||15||##||5||##||2||##||rgb(148, 162, 16)||##||rgb(148, 162, 16)||##||150||##||14||##||20||##||100||##||rgb(51, 51, 51)||##||rgba(245, 245, 245, 1)||##||rgba(237, 237, 237, 1)||##||Arimo||##||none||##||left||##||10||##||10||##||10||##||0||##||1||##||||##||2||##||Cuprum||##||20||##||20||##||800||##||rgb(0, 0, 0)||##||rgb(0, 0, 0)||##||rgba(240, 240, 240, 0.91)||##||1||##||rgb(148, 162, 16)||##||40||##||rgb(148, 162, 16)||##||rgb(177, 194, 24)||##||Open+Sans:300||##||13||##||20||##||400||##||rgb(112, 108, 108)||##||rgb(81, 109, 117)||##||13||##||#dbf0e4||##||#dbf0e4||##||#ededed||##||#ededed||##||40||##||35||##||70||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#228a8e||##||#00b4b3||##||#228a8e||##||13||##||#dbf0e4||##||#eef0e4||##||10||##||#ededed||##||2||##||25||##||50||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||Enter Keywords eg: Foods, Blog...||##||Roboto||##||14||##||30||##||35||##||flex-end||##||14||##||rgb(148, 162, 16)||##||rgb(182, 199, 26)||##||rgb(255, 255, 255)||##||1||##||23||##||rgb(51, 0, 0)||##||1||##||rgb(255, 255, 255)||##||Ubuntu||##||14||##||200||##||capitalize||##||30||##||100||##||right||##||rgb(148, 162, 16)||##||rgb(107, 117, 19)||##||1px||##||40||##||rgb(148, 162, 16)||##||rgb(122, 130, 47)||##||10||##||10||##||||##||Save";
    } else if ($style_name == 'template-16') {
      $css = "_wp_http_referer,id,animation_duration,afaq_faq_mode,icon_show_hide,head_icon_width_number,head_icon_font_size_number,title_icon_color,icon_hover_color,angel_width_number,title_active_icon,title_inactive_icon,indicator_width_number,indicator_font_size_number,indicator_color,indicator_hover_color,title_font_size_number,title_line_height_number,title_font_weight,title_text_align,title_font_color,title_text_hover_color,title_bg_color,title_bg_hover_color,title_text_transform,title_font_family,title_padding_top_number,title_padding_bottom_number,title_padding_left_number,title_padding_right_number,title_border_size,title_border_color,title_border_hover_color,description_scroll,description_font_size_number,description_line_height_number,description_font_color,description_text_hover_color,description_font_background_color,description_background_hover_color,description_font_family,description_font_weight,description_text_transform,description_text_align,description_padding_left_number,description_padding_right_number,description_padding_top_number,description_padding_bottom_number,description_shadow_color,description_margin_bottom,activate_default_category,selected_category_template,category_per_row,category_01_title_font_family,category_01_title_font_size_number_number,category_01_title_line_height_number,category_01_title_font_weight,category_01_title_color,category_01_title_hover_color,category_01_title_background_hover_color,category_01_border_size_number,category_01_border_color,category_01_icon_font_size_number,category_01_icon_color,category_icon_hover_color,category_01_description_font_family,category_01_description_font_size_number_number,category_01_description_line_height_number_number,category_01_description_font_weight,category_01_description_color,category_01_description_hover_color,category_02_title_font_size_number,category_02_title_color,category_02_title_hover_color,category_02_title_background_color,category_02_title_background_hover_color,category_02_height,category_02_icon_font_size,category_02_icon_height,category_02_First_icon_color,category_02_First_icon_backgrond_color,category_02_Second_icon_color,category_02_Second_icon_backgrond_color,category_02_third_icon_color,category_02_third_icon_backgrond_color,category_02_Fourth_icon_color,category_02_Fourth_icon_backgrond_color,category_03_title_font_size_number,category_03_title_color,category_03_title_hover_color,category_03_title_padding_size,category_03_title_background_hover_color,category_03_height,category_03_icon_font_size,category_03_icon_circle_size,category_03_icon_color,category_03_icon_hover_color,category_03_icon_backgrond_color,category_03_icon_backgrond_hover_color,place_holder_text,searce_font_family,search_font_size_number,search_box_height_number,search_width,search_box_align,search_icon_size_number,search_icon_color,search_icon_hover_color,search_background_color,search_border_width_number,search_border_radious_number,search_border_color,template_button,button_font_color,button_font_family,button_font_size_number,button_font_weight,button_text_transform,button_height_number,button_width_number,button_align,button_background_color,button_background_hover_color,button_border_width,button_border_radius_number,button_border_color,button_border_hover_color,button_margin_top_number,button_margin_bottom_number,custom_css,update_style_change!!##!!/wordpress/wp-admin/admin.php?page=afaq-6310-faq-11-20&styleid=15||##||15||##||0.5||##||1||##||1||##||50||##||20||##||rgb(250, 250, 250)||##||rgb(255, 255, 255)||##||35||##||fas fa-arrow-up||##||fas fa-arrow-down||##||50||##||16||##||rgb(255, 255, 255)||##||rgb(255, 255, 255)||##||16||##||22||##||500||##||flex-start||##||rgb(252, 252, 252)||##||rgb(255, 255, 255)||##||rgb(8, 31, 38)||##||rgba(0, 0, 0, 0.99)||##||none||##||Arimo||##||15||##||15||##||10||##||5||##||1||##||rgb(240, 5, 181)||##||rgb(240, 5, 181)||##||||##||14||##||20||##||rgb(252, 179, 179)||##||rgb(0, 0, 0)||##||rgba(20, 22, 48, 0.88)||##||rgba(163, 163, 163, 1)||##||Arimo||##||100||##||capitalize||##||left||##||10||##||10||##||10||##||10||##||rgb(135, 160, 196)||##||1||##||1||##||||##||2||##||Cuprum||##||20||##||20||##||800||##||rgb(0, 0, 0)||##||rgb(0, 0, 0)||##||rgba(240, 240, 240, 0.91)||##||1||##||rgb(240, 5, 181)||##||40||##||rgb(8, 31, 38)||##||rgb(0, 0, 0)||##||Droid+Sans||##||13||##||20||##||200||##||rgb(140, 132, 132)||##||rgb(79, 104, 112)||##||13||##||#dbf0e4||##||#dbf0e4||##||#ededed||##||#ededed||##||40||##||35||##||70||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#228a8e||##||#00b4b3||##||#228a8e||##||13||##||#dbf0e4||##||#eef0e4||##||10||##||#ededed||##||2||##||25||##||50||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||Enter Keywords eg: Foods, Blog...||##||Ubuntu||##||14||##||30||##||35||##||flex-end||##||14||##||rgb(8, 31, 38)||##||rgb(34, 47, 51)||##||rgb(255, 255, 255)||##||1||##||0||##||rgb(51, 0, 0)||##||1||##||rgb(255, 255, 255)||##||Ubuntu||##||14||##||200||##||capitalize||##||30||##||100||##||right||##||rgb(8, 31, 38)||##||rgb(22, 25, 26)||##||0px||##||0||##||||##||||##||10||##||0||##||||##||Save";
    } else if ($style_name == 'template-17') {
      $css = "_wp_http_referer,id,animation_duration,afaq_faq_mode,indicator_width_number,indicator_font_size_number,indicator_color,indicator_hover_color,indicator_background_color,indicator_background_hover_color,indicator_border_size_number,indicator_border_radius,indicator_border_color,indicator_border_hover_color,title_font_size_number,title_line_height_number,title_font_weight,title_font_color,title_text_hover_color,title_text_align,title_text_transform,title_font_family,title_padding_top_number,title_padding_bottom_number,title_padding_left_number,title_padding_right_number,description_scroll,description_font_size_number,description_line_height_number,description_font_color,description_text_hover_color,description_font_family,description_font_weight,description_text_transform,description_text_align,description_padding_left_number,description_padding_right_number,description_padding_top_number,description_padding_bottom_number,description_border_color,activate_default_category,selected_category_template,category_per_row,category_01_title_font_family,category_01_title_font_size_number_number,category_01_title_line_height_number,category_01_title_font_weight,category_01_title_color,category_01_title_hover_color,category_01_title_background_hover_color,category_01_border_size_number,category_01_border_color,category_01_icon_font_size_number,category_01_icon_color,category_icon_hover_color,category_01_description_font_family,category_01_description_font_size_number_number,category_01_description_line_height_number_number,category_01_description_font_weight,category_01_description_color,category_01_description_hover_color,category_02_title_font_size_number,category_02_title_color,category_02_title_hover_color,category_02_title_background_color,category_02_title_background_hover_color,category_02_height,category_02_icon_font_size,category_02_icon_height,category_02_First_icon_color,category_02_First_icon_backgrond_color,category_02_Second_icon_color,category_02_Second_icon_backgrond_color,category_02_third_icon_color,category_02_third_icon_backgrond_color,category_02_Fourth_icon_color,category_02_Fourth_icon_backgrond_color,category_03_title_font_size_number,category_03_title_color,category_03_title_hover_color,category_03_title_padding_size,category_03_title_background_hover_color,category_03_height,category_03_icon_font_size,category_03_icon_circle_size,category_03_icon_color,category_03_icon_hover_color,category_03_icon_backgrond_color,category_03_icon_backgrond_hover_color,place_holder_text,searce_font_family,search_font_size_number,search_box_height_number,search_width,search_box_align,search_icon_size_number,search_icon_color,search_icon_hover_color,search_background_color,search_border_width_number,search_border_radious_number,search_border_color,template_button,button_font_color,button_font_family,button_font_size_number,button_font_weight,button_text_transform,button_height_number,button_width_number,button_align,button_background_color,button_background_hover_color,button_border_width,button_border_radius_number,button_border_color,button_border_hover_color,button_margin_top_number,button_margin_bottom_number,custom_css,update_style_change!!##!!/wordpress/wp-admin/admin.php?page=afaq-6310-faq-11-20&styleid=21||##||21||##||0.5||##||1||##||60||##||16||##||rgb(3, 44, 99)||##||rgb(3, 44, 99)||##||rgb(184, 194, 177)||##||rgb(192, 201, 185)||##||4||##||60||##||rgb(3, 44, 99)||##||rgb(3, 44, 99)||##||16||##||22||##||800||##||rgb(35, 36, 38)||##||rgb(57, 58, 61)||##||flex-start||##||uppercase||##||PT+Sans||##||15||##||15||##||14||##||5||##||150||##||14||##||20||##||rgb(3, 44, 99)||##||rgb(3, 44, 99)||##||Open+Sans||##||400||##||capitalize||##||left||##||10||##||10||##||10||##||10||##||rgb(3, 44, 99)||##||1||##||||##||2||##||Ubuntu||##||20||##||20||##||500||##||rgb(40, 43, 41)||##||rgb(46, 51, 48)||##||rgb(2, 42, 99, 0.2)||##||1||##||rgb(3, 44, 99)||##||40||##||rgb(3, 44, 99)||##||rgb(6, 38, 82)||##||Droid+Sans||##||13||##||20||##||100||##||rgb(135, 132, 132)||##||rgb(75, 99, 107)||##||13||##||#dbf0e4||##||#dbf0e4||##||#ededed||##||#ededed||##||40||##||35||##||70||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#228a8e||##||#00b4b3||##||#228a8e||##||13||##||#dbf0e4||##||#eef0e4||##||10||##||#ededed||##||2||##||25||##||50||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||Enter Keywords eg: Foods, Blog...||##||Ubuntu||##||14||##||30||##||35||##||flex-end||##||14||##||rgb(3, 44, 99)||##||rgb(14, 83, 179)||##||rgb(255, 255, 255)||##||1||##||40||##||rgb(3, 44, 99)||##||1||##||rgb(255, 255, 255)||##||Open+Sans||##||15||##||100||##||capitalize||##||30||##||100||##||right||##||rgb(3, 44, 99)||##||rgb(25, 25, 26)||##||1px||##||40||##||rgb(3, 44, 99)||##||rgb(3, 44, 99)||##||1||##||1||##||||##||Save";
    } else if ($style_name == 'template-18') {
      $css = "_wp_http_referer,id,animation_duration,afaq_faq_mode,icon_show_hide,head_icon_width_number,head_icon_font_size_number,title_icon_color,icon_hover_color,title_active_icon,title_inactive_icon,indicator_width_number,indicator_font_size_number,indicator_color,indicator_hover_color,body_margin_bottom,title_font_size_number,title_line_height_number,title_font_family,title_font_weight,title_font_color,title_text_hover_color,title_bg_color,title_bg_hover_color,title_text_align,title_text_transform,title_padding_top_number,title_padding_bottom_number,title_padding_left_number,title_padding_right_number,title_border_size,title_border_color,description_scroll,description_font_size_number,description_line_height_number,description_font_color,description_text_hover_color,description_font_background_color,description_background_hover_color,description_font_family,description_font_weight,description_text_transform,description_text_align,description_padding_left_number,description_padding_right_number,description_padding_top_number,description_padding_bottom_number,description_border_height,description_border_color,description_margin_bottom,activate_default_category,selected_category_template,category_per_row,category_01_title_font_family,category_01_title_font_size_number_number,category_01_title_line_height_number,category_01_title_font_weight,category_01_title_color,category_01_title_hover_color,category_01_title_background_hover_color,category_01_border_size_number,category_01_border_color,category_01_icon_font_size_number,category_01_icon_color,category_icon_hover_color,category_01_description_font_family,category_01_description_font_size_number_number,category_01_description_line_height_number_number,category_01_description_font_weight,category_01_description_color,category_01_description_hover_color,category_02_title_font_size_number,category_02_title_color,category_02_title_hover_color,category_02_title_background_color,category_02_title_background_hover_color,category_02_height,category_02_icon_font_size,category_02_icon_height,category_02_First_icon_color,category_02_First_icon_backgrond_color,category_02_Second_icon_color,category_02_Second_icon_backgrond_color,category_02_third_icon_color,category_02_third_icon_backgrond_color,category_02_Fourth_icon_color,category_02_Fourth_icon_backgrond_color,category_03_title_font_size_number,category_03_title_color,category_03_title_hover_color,category_03_title_padding_size,category_03_title_background_hover_color,category_03_height,category_03_icon_font_size,category_03_icon_circle_size,category_03_icon_color,category_03_icon_hover_color,category_03_icon_backgrond_color,category_03_icon_backgrond_hover_color,place_holder_text,searce_font_family,search_font_size_number,search_box_height_number,search_width,search_box_align,search_icon_size_number,search_icon_color,search_icon_hover_color,search_background_color,search_border_width_number,search_border_radious_number,search_border_color,template_button,button_font_color,button_font_family,button_font_size_number,button_font_weight,button_text_transform,button_height_number,button_width_number,button_align,button_background_color,button_background_hover_color,button_border_width,button_border_radius_number,button_border_color,button_border_hover_color,button_margin_top_number,button_margin_bottom_number,custom_css,update_style_change!!##!!/wordpress/wp-admin/admin.php?page=afaq-6310-faq-11-20&styleid=17||##||17||##||0.5||##||1||##||1||##||50||##||20||##||rgb(255, 255, 255)||##||rgb(255, 255, 255)||##||fas fa-arrow-up||##||fas fa-arrow-down||##||50||##||16||##||rgb(255, 255, 255)||##||rgb(255, 255, 255)||##||25||##||16||##||22||##||Arimo||##||300||##||rgb(59, 54, 54)||##||rgb(255, 255, 255)||##||rgba(27, 138, 157, 0.96)||##||rgba(27, 138, 157, 0.96)||##||flex-start||##||uppercase||##||15||##||15||##||10||##||5||##||4||##||rgb(250, 250, 250)||##||150||##||14||##||20||##||rgb(15, 14, 14)||##||rgb(15, 14, 14)||##||rgba(193, 201, 181, 0.98)||##||rgba(193, 201, 181, 0.98)||##||Open+Sans:300||##||500||##||capitalize||##||left||##||10||##||10||##||10||##||10||##||4||##||rgb(24, 72, 79)||##||20||##||1||##||||##||2||##||Cuprum||##||20||##||20||##||700||##||rgb(0, 0, 0)||##||rgb(0, 0, 0)||##||rgba(240, 240, 240, 0.91)||##||1||##||rgb(27, 138, 157)||##||40||##||rgb(27, 138, 157)||##||rgb(27, 138, 157)||##||Droid+Sans||##||13||##||20||##||200||##||#8a8a8a||##||#4f676e||##||13||##||#dbf0e4||##||#dbf0e4||##||#ededed||##||#ededed||##||40||##||35||##||70||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#228a8e||##||#00b4b3||##||#228a8e||##||13||##||#dbf0e4||##||#eef0e4||##||10||##||#ededed||##||2||##||25||##||50||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||Enter Keywords eg: Foods, Blog...||##||Roboto||##||14||##||30||##||35||##||flex-end||##||14||##||rgb(27, 138, 157)||##||rgb(33, 170, 194)||##||rgb(255, 255, 255)||##||1||##||0||##||rgb(27, 138, 157)||##||1||##||rgb(255, 255, 255)||##||Roboto||##||15||##||100||##||capitalize||##||30||##||100||##||right||##||rgb(27, 138, 157)||##||rgb(22, 97, 110)||##||0px||##||0||##||||##||||##||10||##||0||##||||##||Save";
    } else if ($style_name == 'template-19') {
      $css = "_wp_http_referer,id,animation_duration,afaq_faq_mode,icon_show_hide,head_icon_width_number,head_icon_font_size_number,title_icon_color,icon_hover_color,title_active_icon,title_inactive_icon,indicator_width_number,indicator_font_size_number,indicator_color,indicator_hover_color,body_margin_bottom,title_font_size_number,title_line_height_number,title_font_weight,title_font_color,title_text_hover_color,title_bg_color,title_bg_hover_color,title_text_align,title_text_transform,title_font_family,title_padding_top_number,title_padding_bottom_number,title_padding_left_number,title_padding_right_number,description_scroll,description_font_size_number,description_line_height_number,description_font_weight,description_font_color,description_text_hover_color,description_font_background_color,description_font_family,description_text_transform,description_text_align,description_padding_left_number,description_padding_right_number,description_padding_top_number,description_padding_bottom_number,activate_default_category,selected_category_template,category_per_row,category_01_title_font_family,category_01_title_font_size_number_number,category_01_title_line_height_number,category_01_title_font_weight,category_01_title_color,category_01_title_hover_color,category_01_title_background_hover_color,category_01_border_size_number,category_01_border_color,category_01_icon_font_size_number,category_01_icon_color,category_icon_hover_color,category_01_description_font_family,category_01_description_font_size_number_number,category_01_description_line_height_number_number,category_01_description_font_weight,category_01_description_color,category_01_description_hover_color,category_02_title_font_size_number,category_02_title_color,category_02_title_hover_color,category_02_title_background_color,category_02_title_background_hover_color,category_02_height,category_02_icon_font_size,category_02_icon_height,category_02_First_icon_color,category_02_First_icon_backgrond_color,category_02_Second_icon_color,category_02_Second_icon_backgrond_color,category_02_third_icon_color,category_02_third_icon_backgrond_color,category_02_Fourth_icon_color,category_02_Fourth_icon_backgrond_color,category_03_title_font_size_number,category_03_title_color,category_03_title_hover_color,category_03_title_padding_size,category_03_title_background_hover_color,category_03_height,category_03_icon_font_size,category_03_icon_circle_size,category_03_icon_color,category_03_icon_hover_color,category_03_icon_backgrond_color,category_03_icon_backgrond_hover_color,place_holder_text,searce_font_family,search_font_size_number,search_box_height_number,search_width,search_box_align,search_icon_size_number,search_icon_color,search_icon_hover_color,search_background_color,search_border_width_number,search_border_radious_number,search_border_color,template_button,button_font_color,button_font_family,button_font_size_number,button_font_weight,button_text_transform,button_height_number,button_width_number,button_align,button_background_color,button_background_hover_color,button_border_width,button_border_radius_number,button_border_color,button_border_hover_color,button_margin_top_number,button_margin_bottom_number,custom_css,update_style_change!!##!!/wordpress/wp-admin/admin.php?page=afaq-6310-faq-11-20&styleid=23||##||23||##||0.5||##||1||##||1||##||50||##||20||##||rgb(255, 255, 255)||##||rgb(255, 255, 255)||##||fas fa-cut||##||fas fa-angle-down||##||50||##||16||##||rgb(255, 255, 255)||##||rgb(255, 255, 255)||##||1||##||16||##||22||##||400||##||rgb(255, 255, 255)||##||rgb(255, 255, 255)||##||rgb(46, 25, 69, 0.93)||##||rgb(12, 1, 26)||##||flex-start||##||none||##||Arimo||##||15||##||15||##||10||##||5||##||150||##||14||##||20||##||100||##||rgb(255, 255, 255)||##||rgb(255, 255, 255)||##||rgb(138, 113, 166, 0.93)||##||Arimo||##||capitalize||##||left||##||11||##||10||##||10||##||10||##||1||##||||##||2||##||Cuprum||##||20||##||20||##||700||##||rgb(0, 0, 0)||##||rgb(0, 0, 0)||##||rgb(240, 240, 240, 0.91)||##||1||##||rgb(46, 25, 69)||##||40||##||rgb(46, 25, 69)||##||rgb(12, 1, 26)||##||Droid+Sans||##||13||##||20||##||100||##||rgb(138, 135, 135)||##||rgb(77, 102, 110)||##||13||##||#dbf0e4||##||#dbf0e4||##||#ededed||##||#ededed||##||40||##||35||##||70||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#228a8e||##||#00b4b3||##||#228a8e||##||13||##||#dbf0e4||##||#eef0e4||##||10||##||#ededed||##||2||##||25||##||50||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||Enter Keywords eg: Foods, Blog...||##||Droid+Serif||##||14||##||30||##||35||##||flex-end||##||14||##||rgb(46, 25, 69)||##||rgb(68, 8, 133)||##||rgb(255, 255, 255)||##||1||##||0||##||rgb(46, 25, 69)||##||1||##||rgb(255, 255, 255)||##||Droid+Sans||##||14||##||300||##||none||##||30||##||100||##||right||##||rgb(46, 25, 69)||##||rgb(34, 32, 36)||##||1px||##||0||##||rgb(255, 255, 255)||##||rgb(255, 255, 255)||##||1||##||0||##||||##||Save";
    } else if ($style_name == 'template-20') {
      $css = "_wp_http_referer,id,animation_duration,afaq_faq_mode,icon_show_hide,head_icon_width_number,head_icon_font_size_number,title_icon_color,icon_hover_color,body_margin_bottom,indicator_border_size,indicator_width_number,indicator_font_size_number,indicator_color,indicator_hover_color,indicator_background_color,indicator_hover_background_color,title_font_size_number,title_line_height_number,title_font_weight,title_font_color,title_text_hover_color,title_bg_color,title_bg_hover_color,title_text_align,title_text_transform,title_font_family,title_padding_top_number,title_padding_bottom_number,title_padding_left_number,title_padding_right_number,description_scroll,description_font_size_number,description_line_height_number,description_font_color,description_text_hover_color,description_font_background_color,description_background_hover_color,description_font_family,description_font_weight,description_text_transform,description_text_align,description_padding_left_number,description_padding_right_number,description_padding_top_number,description_padding_bottom_number,description_margin_bottom,activate_default_category,selected_category_template,category_per_row,category_01_title_font_family,category_01_title_font_size_number_number,category_01_title_line_height_number,category_01_title_font_weight,category_01_title_color,category_01_title_hover_color,category_01_title_background_hover_color,category_01_border_size_number,category_01_border_color,category_01_icon_font_size_number,category_01_icon_color,category_icon_hover_color,category_01_description_font_family,category_01_description_font_size_number_number,category_01_description_line_height_number_number,category_01_description_font_weight,category_01_description_color,category_01_description_hover_color,category_02_title_font_size_number,category_02_title_color,category_02_title_hover_color,category_02_title_background_color,category_02_title_background_hover_color,category_02_height,category_02_icon_font_size,category_02_icon_height,category_02_First_icon_color,category_02_First_icon_backgrond_color,category_02_Second_icon_color,category_02_Second_icon_backgrond_color,category_02_third_icon_color,category_02_third_icon_backgrond_color,category_02_Fourth_icon_color,category_02_Fourth_icon_backgrond_color,category_03_title_font_size_number,category_03_title_color,category_03_title_hover_color,category_03_title_padding_size,category_03_title_background_hover_color,category_03_height,category_03_icon_font_size,category_03_icon_circle_size,category_03_icon_color,category_03_icon_hover_color,category_03_icon_backgrond_color,category_03_icon_backgrond_hover_color,place_holder_text,searce_font_family,search_font_size_number,search_box_height_number,search_width,search_box_align,search_icon_size_number,search_icon_color,search_icon_hover_color,search_background_color,search_border_width_number,search_border_radious_number,search_border_color,template_button,button_font_color,button_font_family,button_font_size_number,button_font_weight,button_text_transform,button_height_number,button_width_number,button_align,button_background_color,button_background_hover_color,button_border_width,button_border_radius_number,button_border_color,button_border_hover_color,button_margin_top_number,button_margin_bottom_number,custom_css,update_style_change!!##!!/wordpress/wp-admin/admin.php?page=afaq-6310-faq-11-20&styleid=24||##||24||##||0.5||##||1||##||1||##||50||##||16||##||rgb(255, 255, 255)||##||rgb(255, 255, 255)||##||2||##||3||##||40||##||15||##||rgb(255, 255, 255)||##||rgb(255, 255, 255)||##||rgb(135, 138, 194)||##||rgb(66, 70, 138)||##||16||##||22||##||400||##||rgb(35, 38, 97)||##||rgb(255, 255, 255)||##||rgb(135, 138, 194)||##||rgb(66, 70, 138)||##||flex-start||##||uppercase||##||Arimo||##||15||##||15||##||10||##||5||##||150||##||14||##||20||##||rgb(56, 53, 53)||##||rgb(56, 53, 53)||##||rgb(227, 227, 227)||##||rgb(227, 227, 227)||##||Arimo||##||100||##||capitalize||##||left||##||10||##||10||##||10||##||10||##||5||##||1||##||||##||2||##||PT+Sans||##||20||##||20||##||100||##||rgb(0, 0, 0)||##||rgb(0, 0, 0)||##||rgb(240, 240, 240, 0.91)||##||1||##||rgb(6, 12, 163)||##||40||##||rgb(135, 138, 194)||##||rgb(6, 12, 163)||##||Droid+Sans||##||13||##||20||##||100||##||rgb(138, 138, 138)||##||rgb(73, 99, 107)||##||13||##||#dbf0e4||##||#dbf0e4||##||#ededed||##||#ededed||##||40||##||35||##||70||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#228a8e||##||#00b4b3||##||#228a8e||##||13||##||#dbf0e4||##||#eef0e4||##||10||##||#ededed||##||2||##||25||##||50||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||Enter Keywords eg: Foods, Blog...||##||Droid+Sans||##||14||##||30||##||35||##||flex-end||##||14||##||rgb(135, 138, 194)||##||rgb(6, 12, 163)||##||rgb(255, 255, 255)||##||1||##||0||##||rgb(135, 138, 194)||##||1||##||rgb(255, 255, 255)||##||Droid+Sans||##||16||##||500||##||none||##||30||##||100||##||right||##||rgb(135, 138, 194)||##||rgb(58, 63, 201)||##||0px||##||0||##||||##||||##||15||##||0||##||||##||Save";
    }

    $allData = $wpdb->get_results('SELECT * FROM ' . $faq_table . ' ORDER BY title ASC', ARRAY_A);
    if ($allData) {
      foreach ($allData as $value) {
        if ($templateids != '') {
          $templateids .= ',';
        }
        $templateids .= esc_attr($value['id']);
      }
    }

    $categoryids = ""; 
    $allData = $wpdb->get_results('SELECT * FROM ' . $category_table . ' ORDER BY serial ASC', ARRAY_A);
    if ($allData) {
      foreach ($allData as $value) {
        if ($categoryids != '') {
          $categoryids .= ',';
        }
        $categoryids .= esc_attr( $value['id'] );
      }
    }

    $wpdb->query($wpdb->prepare("INSERT INTO {$style_table} (name, style_name, css, templateids, categoryids) VALUES ( %s, %s, %s, %s, %s)", array($name, $style_name, $css, $templateids, $categoryids)));
    $redirect_id = $wpdb->insert_id;
    $templateids = "";
    $categoryids = "";

    if ($redirect_id == 0) {
      $url = admin_url("admin.php?page=afaq-6310-faq-for-elementor");
    } else if ($redirect_id != 0) {
      foreach ($templateList as $list) {
        $insData = '';
        foreach ($list as $lkey => $lvalue) {
          $insData .= "{$lkey} = '{$lvalue}',";
        }
        $wpdb->query("insert into {$faq_table} set {$insData} styleid='{$redirect_id}'");

        $templateids .= "{$wpdb->insert_id},";
        $wpdb->query($wpdb->prepare("UPDATE {$style_table} set 
                            templateids = %s
                            where id = %d", $templateids, $redirect_id));
      }
      $url = admin_url("admin.php?page=afaq-6310-faq-11-20&styleid=$redirect_id");
    }
    echo '<script type="text/javascript"> document.location.href = "' . $url . '"; </script>';
    exit;
  }
}

$icons = array(
  '<li><a href="https://www.linkedin.com" class="open_in_new_tab_class afaq-6310-social-link-linkedin" title="Linkedin" target="_blank" id=""><i class="fab fa-linkedin-in"></i></a></li>',
  '<li><a href="https://www.facebook.com" class="open_in_new_tab_class afaq-6310-social-link-facebook" title="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a></li>',
  '<li><a href="https://www.youtube.com" class="open_in_new_tab_class afaq-6310-social-link-youtube" title="Youtube" target="_blank"><i class="fab fa-youtube"></i></a></li>',
  '<li><a href="https://www.twitter.com" class="open_in_new_tab_class afaq-6310-social-link-twitter" title="Twitter" target="_blank"><i class="fab fa-twitter"></i></a></li>',
  '<li><a href="https://www.google.com" class="open_in_new_tab_class afaq-6310-social-link-google" title="Google Plus" target="_blank"><i class="fab fa-google-plus-g"></i></a></li>',
  '<li><a href="https://www.pinterest.com" class="open_in_new_tab_class afaq-6310-social-link-pinterest" title="Pinterest" target="_blank"><i class="fab fa-pinterest-p"></i></a></li>',
  '<li><a href="https://www.whatsapp.com" class="open_in_new_tab_class afaq-6310-social-link-whatsapp" title="Whatsapp" target="_blank"><i class="fab fa-whatsapp"></i></a></li>'
);
?>
<div class="afaq-6310">
  <h1>Select Template</h1>

  <!-- ******************************************
      template 11 start
    ****************************************** -->
  <div class="afaq-6310-row afaq-6310-faq-for-elementor-style-boxed">
    <div
     class="afaq-6310-padding-15 afaq-6310-templates" 
     data-database-id='11' 
     data-icon-class='afaq-6310-faq-template-11-head-right-icon' 
     data-up-arrow='fas fa-angle-up right-icon' 
     data-down-arrow='fas fa-angle-down right-icon'>
      <div class="afaq-6310-template-11">
        <div class="afaq-6310-faq-template-11">
          <div class="afaq-6310-faq-template-11-label-head afaq-6310-faq-template-common-head afaq-6310-active">
            <div class="afaq-6310-faq-template-11-head-left-icon"><i class="far fa-user"></i></div>
            <div class="afaq-6310-faq-template-11-head-title">Can you tell me, example landing pages are related to what?</div>
            <div class="afaq-6310-faq-template-11-head-right-icon"><i class="fas fa-angle-up right-icon"></i></div>
          </div>
          <div class="afaq-6310-faq-template-11-content">
            <div class="afaq-6310-faq-template-11-content-feature">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed est
              accusamus placeat quas vero dolores quis officia ullam autem nostrum delectus architecto
              sunt magnam, porro magni animi, illum aperiam. Consectetur hic, et sequi facere adipisci
              quisquam repudiandae! Labore deserunt et distinctio dignissimos facere, fuga reprehenderit
              quibusdam ad repudiandae aliquid. Perspiciatis. mm
            </div>
          </div>
        </div>
      </div>
      <div class="afaq-6310-template-11">
        <div class="afaq-6310-faq-template-11">
          <div class="afaq-6310-faq-template-11-label-head afaq-6310-faq-template-common-head">
            <div class="afaq-6310-faq-template-11-head-left-icon"><i class="fas fa-bell"></i></div>
            <div class="afaq-6310-faq-template-11-head-title">What part of this project most appeals to you?</div>
            <div class="afaq-6310-faq-template-11-head-right-icon"><i class="fas fa-angle-down right-icon"></i></div>
          </div>
          <div class="afaq-6310-faq-template-11-content">
            <div class="afaq-6310-faq-template-11-content-feature">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed est
              accusamus placeat quas vero dolores quis officia ullam autem nostrum delectus architecto
              sunt magnam, porro magni animi, illum aperiam. Consectetur hic, et sequi facere adipisci
              quisquam repudiandae! Labore deserunt et distinctio dignissimos facere, fuga reprehenderit
              quibusdam ad repudiandae aliquid. Perspiciatis. mm
            </div>
          </div>
        </div>
      </div>
      <div class="afaq-6310-template-11">
        <div class="afaq-6310-faq-template-11">
          <div class="afaq-6310-faq-template-11-label-head afaq-6310-faq-template-common-head">
            <div class="afaq-6310-faq-template-11-head-left-icon"><i class="fas fa-umbrella"></i></div>
            <div class="afaq-6310-faq-template-11-head-title">What part of this project most appeals to you?</div>
            <div class="afaq-6310-faq-template-11-head-right-icon"><i class="fas fa-angle-down right-icon"></i></div>
          </div>
          <div class="afaq-6310-faq-template-11-content">
            <div class="afaq-6310-faq-template-11-content-feature">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed est
              accusamus placeat quas vero dolores quis officia ullam autem nostrum delectus architecto
              sunt magnam, porro magni animi, illum aperiam. Consectetur hic, et sequi facere adipisci
              quisquam repudiandae! Labore deserunt et distinctio dignissimos facere, fuga reprehenderit
              quibusdam ad repudiandae aliquid. Perspiciatis. mm
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="afaq-6310-faq-list">
      Template 11
      <button type="button" class="afaq-6310-btn-success afaq_6310_choosen_style" id="template-11">Create Template</button>
      <button type="button" class="afaq-6310-pro-only">Pro Only</button>
    </div>
    <br class="afaq-6310-clear" />
  </div>
  <!-- ******************************************
      template 11 end
    ****************************************** -->
  <!-- ******************************************
      template 12 start
    ****************************************** -->
  <div class="afaq-6310-row afaq-6310-faq-for-elementor-style-boxed">
    <div class="afaq-6310-padding-15 afaq-6310-templates" data-database-id='12' data-icon-class='afaq-6310-faq-template-12-head-right-icon' data-up-arrow='fas fa-angle-up right-icon' data-down-arrow='fas fa-angle-down right-icon'>
      <div class="afaq-6310-faq-template-12">
        <div class="afaq-6310-faq-template-12-label-head afaq-6310-faq-template-common-head afaq-6310-active">
          <div class="afaq-6310-faq-template-12-head-left-icon"><i class="fas fa-globe"></i></div>
          <div class="afaq-6310-faq-template-12-head-title">What part of this project most appeals to you?</div>
          <div class="afaq-6310-faq-template-12-head-right-icon"><i class="fas fa-angle-up right-icon"></i></div>
        </div>
        <div class="afaq-6310-faq-template-12-content">
          <div class="afaq-6310-faq-template-12-content-feature">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed est
            accusamus placeat quas vero dolores quis officia ullam autem nostrum delectus architecto
            sunt magnam, porro magni animi, illum aperiam. Consectetur hic, et sequi facere adipisci
            quisquam repudiandae! Labore deserunt et distinctio dignissimos facere, fuga reprehenderit
            quibusdam ad repudiandae aliquid. Perspiciatis. mm
          </div>
        </div>
      </div>
      <div class="afaq-6310-faq-template-12">
        <div class="afaq-6310-faq-template-12-label-head afaq-6310-faq-template-common-head">
          <div class="afaq-6310-faq-template-12-head-left-icon"><i class="fab fa-canadian-maple-leaf"></i></div>
          <div class="afaq-6310-faq-template-12-head-title">What part of this project most appeals to you?</div>
          <div class="afaq-6310-faq-template-12-head-right-icon"><i class="fas fa-angle-down right-icon"></i></div>
        </div>
        <div class="afaq-6310-faq-template-12-content">
          <div class="afaq-6310-faq-template-12-content-feature">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed est
            accusamus placeat quas vero dolores quis officia ullam autem nostrum delectus architecto
            sunt magnam, porro magni animi, illum aperiam. Consectetur hic, et sequi facere adipisci
            quisquam repudiandae! Labore deserunt et distinctio dignissimos facere, fuga reprehenderit
            quibusdam ad repudiandae aliquid. Perspiciatis. mm
          </div>
        </div>
      </div>
      <div class="afaq-6310-faq-template-12">
        <div class="afaq-6310-faq-template-12-label-head afaq-6310-faq-template-common-head">
          <div class="afaq-6310-faq-template-12-head-left-icon"><i class="fas fa-feather"></i></div>
          <div class="afaq-6310-faq-template-12-head-title">Can you tell me, example landing pages are related to what?</div>
          <div class="afaq-6310-faq-template-12-head-right-icon"><i class="fas fa-angle-down right-icon"></i></div>
        </div>
        <div class="afaq-6310-faq-template-12-content">
          <div class="afaq-6310-faq-template-12-content-feature">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed est
            accusamus placeat quas vero dolores quis officia ullam autem nostrum delectus architecto
            sunt magnam, porro magni animi, illum aperiam. Consectetur hic, et sequi facere adipisci
            quisquam repudiandae! Labore deserunt et distinctio dignissimos facere, fuga reprehenderit
            quibusdam ad repudiandae aliquid. Perspiciatis. mm
          </div>
        </div>
      </div>
    </div>
    <div class="afaq-6310-faq-list">
      Template 12
      <button type="button" class="afaq-6310-btn-success afaq_6310_choosen_style" id="template-12">Create Template</button>
      <button type="button" class="afaq-6310-pro-only">Pro Only</button>
    </div>
    <br class="afaq-6310-clear" />
  </div>
  <!-- ******************************************
      template 12 end
    ****************************************** -->

  <!-- ******************************************
      template 13 start
    ****************************************** -->
  <div class="afaq-6310-row afaq-6310-faq-for-elementor-style-boxed">
    <div class="afaq-6310-padding-15 afaq-6310-templates" data-database-id='13' data-icon-class='afaq-6310-faq-template-13-head-right-icon' data-up-arrow='fas fa-minus' data-down-arrow='fas fa-plus'>
      <div class="afaq-6310-faq-template-13">
        <div class="afaq-6310-faq-template-13-label-head afaq-6310-faq-template-common-head afaq-6310-active">
          <div class="afaq-6310-faq-template-13-head-left-icon"><i class="fab fa-pagelines"></i></div>
          <div class="afaq-6310-faq-template-13-head-title">What part of this project most appeals to you?</div>
          <div class="afaq-6310-faq-template-13-head-right-icon"><i class="fas fa-minus"></i></div>
        </div>
        <div class="afaq-6310-faq-template-13-content">
          <div class="afaq-6310-faq-template-13-content-feature">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed est
            accusamus placeat quas vero dolores quis officia ullam autem nostrum delectus architecto
            sunt magnam, porro magni animi, illum aperiam. Consectetur hic, et sequi facere adipisci
            quisquam repudiandae! Labore deserunt et distinctio dignissimos facere, fuga reprehenderit
            quibusdam ad repudiandae aliquid. Perspiciatis. mm
          </div>
        </div>
      </div>
      <div class="afaq-6310-faq-template-13">
        <div class="afaq-6310-faq-template-13-label-head afaq-6310-faq-template-common-head">
          <div class="afaq-6310-faq-template-13-head-left-icon"><i class="fas fa-bell"></i></div>
          <div class="afaq-6310-faq-template-13-head-title">What part of this project most appeals to you?</div>
          <div class="afaq-6310-faq-template-13-head-right-icon"><i class="fas fa-plus"></i></div>
        </div>
        <div class="afaq-6310-faq-template-13-content">
          <div class="afaq-6310-faq-template-13-content-feature">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed est
            accusamus placeat quas vero dolores quis officia ullam autem nostrum delectus architecto
            sunt magnam, porro magni animi, illum aperiam. Consectetur hic, et sequi facere adipisci
            quisquam repudiandae! Labore deserunt et distinctio dignissimos facere, fuga reprehenderit
            quibusdam ad repudiandae aliquid. Perspiciatis. mm
          </div>
        </div>
      </div>
      <div class="afaq-6310-faq-template-13">
        <div class="afaq-6310-faq-template-13-label-head afaq-6310-faq-template-common-head">
          <div class="afaq-6310-faq-template-13-head-left-icon"><i class="fas fa-user-plus"></i></div>
          <div class="afaq-6310-faq-template-13-head-title">What part of this project most appeals to you?</div>
          <div class="afaq-6310-faq-template-13-head-right-icon"><i class="fas fa-plus"></i></div>
        </div>
        <div class="afaq-6310-faq-template-13-content">
          <div class="afaq-6310-faq-template-13-content-feature">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed est
            accusamus placeat quas vero dolores quis officia ullam autem nostrum delectus architecto
            sunt magnam, porro magni animi, illum aperiam. Consectetur hic, et sequi facere adipisci
            quisquam repudiandae! Labore deserunt et distinctio dignissimos facere, fuga reprehenderit
            quibusdam ad repudiandae aliquid. Perspiciatis. mm
          </div>
        </div>
      </div>
    </div>

    <div class="afaq-6310-faq-list">
      Template 13
      <button type="button" class="afaq-6310-btn-success afaq_6310_choosen_style" id="template-13">Create Template</button>
      <button type="button" class="afaq-6310-pro-only">Pro Only</button>
    </div>
    <br class="afaq-6310-clear" />
  </div>
  <!-- ******************************************
      template 13 end
    ****************************************** -->
  <!-- ******************************************
      template 14 start
    ****************************************** -->
  <div class="afaq-6310-row afaq-6310-faq-for-elementor-style-boxed">
    <div 
      class="afaq-6310-padding-15 afaq-6310-templates" 
      data-database-id='14' 
      data-icon-class='afaq-6310-faq-template-14-head-left-icon'
      data-up-arrow='fas fa-arrow-up'
      data-down-arrow='fas fa-arrow-down'
      >
      <div class="afaq-6310-faq-template-14">
        <div class="afaq-6310-faq-template-14-label-head afaq-6310-faq-template-common-head afaq-6310-active">
          <div class="afaq-6310-faq-template-14-head-right-icon"><i class="fab fa-canadian-maple-leaf"></i></div>
          <div class="afaq-6310-faq-template-14-head-title">What part of this project most appeals to you?</div>
          <div class="afaq-6310-faq-template-14-head-left-icon"><i class="fas fa-arrow-up"></i></div>
        </div>
        <div class="afaq-6310-faq-template-14-content">
          <div class="afaq-6310-faq-template-14-content-feature">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed est
            accusamus placeat quas vero dolores quis officia ullam autem nostrum delectus architecto
            sunt magnam, porro magni animi, illum aperiam. Consectetur hic, et sequi facere adipisci
            quisquam repudiandae! Labore deserunt et distinctio dignissimos facere, fuga reprehenderit
            quibusdam ad repudiandae aliquid. Perspiciatis. mm
          </div>
        </div>       
      </div>
      <div class="afaq-6310-faq-template-14">
        <div class="afaq-6310-faq-template-14-label-head afaq-6310-faq-template-common-head">
          <div class="afaq-6310-faq-template-14-head-right-icon"><i class="fas fa-hourglass-end"></i></div>
          <div class="afaq-6310-faq-template-14-head-title">What part of this project most appeals to you?</div>
          <div class="afaq-6310-faq-template-14-head-left-icon"><i class="fas fa-arrow-down"></i></div>
        </div>
        <div class="afaq-6310-faq-template-14-content">
          <div class="afaq-6310-faq-template-14-content-feature">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed est
            accusamus placeat quas vero dolores quis officia ullam autem nostrum delectus architecto
            sunt magnam, porro magni animi, illum aperiam. Consectetur hic, et sequi facere adipisci
            quisquam repudiandae! Labore deserunt et distinctio dignissimos facere, fuga reprehenderit
            quibusdam ad repudiandae aliquid. Perspiciatis. mm
          </div>
        </div>       
      </div>
      <div class="afaq-6310-faq-template-14">
        <div class="afaq-6310-faq-template-14-label-head afaq-6310-faq-template-common-head">
          <div class="afaq-6310-faq-template-14-head-right-icon"><i class="fas fa-bars"></i></div>
          <div class="afaq-6310-faq-template-14-head-title">What part of this project most appeals to you?</div>
          <div class="afaq-6310-faq-template-14-head-left-icon"><i class="fas fa-arrow-down"></i></div>
        </div>
        <div class="afaq-6310-faq-template-14-content">
          <div class="afaq-6310-faq-template-14-content-feature">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed est
            accusamus placeat quas vero dolores quis officia ullam autem nostrum delectus architecto
            sunt magnam, porro magni animi, illum aperiam. Consectetur hic, et sequi facere adipisci
            quisquam repudiandae! Labore deserunt et distinctio dignissimos facere, fuga reprehenderit
            quibusdam ad repudiandae aliquid. Perspiciatis. mm
          </div>
        </div>       
      </div>
    </div>
    <div class="afaq-6310-faq-list">
      Template 14
      <button type="button" class="afaq-6310-btn-success afaq_6310_choosen_style" id="template-14">Create Template</button>
      <button type="button" class="afaq-6310-pro-only">Pro Only</button>
    </div>
    <br class="afaq-6310-clear" />
  </div>
  <!-- ******************************************
      template 14 end
    ****************************************** -->
  <!-- ******************************************
      template 15 start
    ****************************************** -->
  <div class="afaq-6310-row afaq-6310-faq-for-elementor-style-boxed">
    <div 
      class="afaq-6310-padding-15 afaq-6310-templates" 
      data-database-id='15' 
      data-icon-class='afaq-6310-faq-template-15-head-left-icon'
      data-up-arrow='fas fa-arrow-up'
      data-down-arrow='fas fa-arrow-down'
      >
      <div class="afaq-6310-faq-template-15 ">
        <div class="afaq-6310-faq-template-15-left-section ">
          <div class="afaq-6310-faq-template-15-head-arrow">1</div>
        </div>
        <div class="afaq-6310-faq-template-15-right-section">
          <div class="afaq-6310-faq-template-15-label-head afaq-6310-faq-template-common-head afaq-6310-active">
            <div class="afaq-6310-faq-template-15-head-right-icon"><i class="fas fa-bars"></i></div>
            <div class="afaq-6310-faq-template-15-head-title">What part of this project most appeals to you?</div>
            <div class="afaq-6310-faq-template-15-head-left-icon"><i class="fas fa-arrow-up"></i></div>
          </div>
          <div class="afaq-6310-faq-template-15-content">
            <div class="afaq-6310-faq-template-15-content-feature">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed est
              accusamus placeat quas vero dolores quis officia ullam autem nostrum delectus architecto
              sunt magnam, porro magni animi, illum aperiam. Consectetur hic, et sequi facere adipisci
              quisquam repudiandae! Labore deserunt et distinctio dignissimos facere, fuga reprehenderit
              quibusdam ad repudiandae aliquid. Perspiciatis. mm
            </div>
          </div>
        </div>  
      </div>
      <div class="afaq-6310-faq-template-15 ">
        <div class="afaq-6310-faq-template-15-left-section">
          <div class="afaq-6310-faq-template-15-head-arrow">2</div>
        </div>
        <div class="afaq-6310-faq-template-15-right-section">
          <div class="afaq-6310-faq-template-15-label-head afaq-6310-faq-template-common-head">
            <div class="afaq-6310-faq-template-15-head-right-icon"><i class="fas fa-bars"></i></div>
            <div class="afaq-6310-faq-template-15-head-title">What part of this project most appeals to you?</div>
            <div class="afaq-6310-faq-template-15-head-left-icon"><i class="fas fa-arrow-down"></i></div>
          </div>
          <div class="afaq-6310-faq-template-15-content">
            <div class="afaq-6310-faq-template-15-content-feature">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed est
              accusamus placeat quas vero dolores quis officia ullam autem nostrum delectus architecto
              sunt magnam, porro magni animi, illum aperiam. Consectetur hic, et sequi facere adipisci
              quisquam repudiandae! Labore deserunt et distinctio dignissimos facere, fuga reprehenderit
              quibusdam ad repudiandae aliquid. Perspiciatis. mm
            </div>
          </div>
        </div>  
      </div>
      <div class="afaq-6310-faq-template-15 ">
        <div class="afaq-6310-faq-template-15-left-section">
          <div class="afaq-6310-faq-template-15-head-arrow">3</div>
        </div>
        <div class="afaq-6310-faq-template-15-right-section">
          <div class="afaq-6310-faq-template-15-label-head afaq-6310-faq-template-common-head">
            <div class="afaq-6310-faq-template-15-head-right-icon"><i class="fas fa-bars"></i></div>
            <div class="afaq-6310-faq-template-15-head-title">What part of this project most appeals to you?</div>
            <div class="afaq-6310-faq-template-15-head-left-icon"><i class="fas fa-arrow-down"></i></div>
          </div>
          <div class="afaq-6310-faq-template-15-content">
            <div class="afaq-6310-faq-template-15-content-feature">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed est
              accusamus placeat quas vero dolores quis officia ullam autem nostrum delectus architecto
              sunt magnam, porro magni animi, illum aperiam. Consectetur hic, et sequi facere adipisci
              quisquam repudiandae! Labore deserunt et distinctio dignissimos facere, fuga reprehenderit
              quibusdam ad repudiandae aliquid. Perspiciatis. mm
            </div>
          </div>
        </div>  
      </div>
    </div>
    <div class="afaq-6310-faq-list">
      Template 15
      <button type="button" class="afaq-6310-btn-success afaq_6310_choosen_style" id="template-15">Create Template</button>
      <button type="button" class="afaq-6310-pro-only">Pro Only</button>
    </div>
    <br class="afaq-6310-clear" />
  </div>
  <!-- ******************************************
      template 15 end
    ****************************************** -->

  <!-- ******************************************
        template 16 start
      ****************************************** -->
  <div class="afaq-6310-row afaq-6310-faq-for-elementor-style-boxed">
   <div 
      class="afaq-6310-padding-15 afaq-6310-templates" 
      data-database-id='16' 
      data-icon-class='afaq-6310-faq-template-16-head-right-icon'
      data-up-arrow='fas fa-arrow-up'
      data-down-arrow='fas fa-arrow-down'
      >
      <div class="afaq-6310-faq-template-16">
        <div class="afaq-6310-faq-template-16-label-head afaq-6310-faq-template-common-head afaq-6310-active">
          <div class="afaq-6310-faq-template-16-head-left-icon"><i class="fas fa-umbrella"></i></div>
          <div class="afaq-6310-faq-template-16-head-title">What part of this project most appeals to you?</div>
          <div class="afaq-6310-faq-template-16-head-right-icon"><i class="fas fa-arrow-up"></i></div>
        </div>
        <div class="afaq-6310-faq-template-16-content">
          <div class="afaq-6310-faq-template-16-content-feature">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed est
            accusamus placeat quas vero dolores quis officia ullam autem nostrum delectus architecto
            sunt magnam, porro magni animi, illum aperiam. Consectetur hic, et sequi facere adipisci
            quisquam repudiandae! Labore deserunt et distinctio dignissimos facere, fuga reprehenderit
            quibusdam ad repudiandae aliquid. Perspiciatis. mm
          </div>
        </div>     
      </div>
      <div class="afaq-6310-faq-template-16">
        <div class="afaq-6310-faq-template-16-label-head afaq-6310-faq-template-common-head">
          <div class="afaq-6310-faq-template-16-head-left-icon"><i class="fas fa-hourglass-end"></i></div>
          <div class="afaq-6310-faq-template-16-head-title">What part of this project most appeals to you?</div>
          <div class="afaq-6310-faq-template-16-head-right-icon"><i class="fas fa-arrow-down"></i></div>
        </div>
        <div class="afaq-6310-faq-template-16-content">
          <div class="afaq-6310-faq-template-16-content-feature">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed est
            accusamus placeat quas vero dolores quis officia ullam autem nostrum delectus architecto
            sunt magnam, porro magni animi, illum aperiam. Consectetur hic, et sequi facere adipisci
            quisquam repudiandae! Labore deserunt et distinctio dignissimos facere, fuga reprehenderit
            quibusdam ad repudiandae aliquid. Perspiciatis. mm
          </div>
        </div>     
      </div>
      <div class="afaq-6310-faq-template-16">
        <div class="afaq-6310-faq-template-16-label-head afaq-6310-faq-template-common-head">
          <div class="afaq-6310-faq-template-16-head-left-icon"><i class="fas fa-feather"></i></div>
          <div class="afaq-6310-faq-template-16-head-title">What part of this project most appeals to you?</div>
          <div class="afaq-6310-faq-template-16-head-right-icon"><i class="fas fa-arrow-down"></i></div>
        </div>
        <div class="afaq-6310-faq-template-16-content">
          <div class="afaq-6310-faq-template-16-content-feature">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed est
            accusamus placeat quas vero dolores quis officia ullam autem nostrum delectus architecto
            sunt magnam, porro magni animi, illum aperiam. Consectetur hic, et sequi facere adipisci
            quisquam repudiandae! Labore deserunt et distinctio dignissimos facere, fuga reprehenderit
            quibusdam ad repudiandae aliquid. Perspiciatis. mm
          </div>
        </div>     
      </div>
    </div>
    <div class="afaq-6310-faq-list">
      Template 16
      <button type="button" class="afaq-6310-btn-success afaq_6310_choosen_style" id="template-16">Create Template</button>
      <button type="button" class="afaq-6310-pro-only">Pro Only</button>
    </div>
    <br class="afaq-6310-clear" />
  </div>


  <!-- ******************************************
        template 16 end
      ****************************************** -->

  <!-- ******************************************
      template 17start
    ****************************************** -->
  <div class="afaq-6310-row afaq-6310-faq-for-elementor-style-boxed">
    <div 
      class="afaq-6310-padding-15 afaq-6310-templates" 
      data-database-id='17' 
      data-icon-class='afaq-6310-faq-template-17-head-left-icon'
      data-up-arrow='fas fa-minus'
      data-down-arrow='fas fa-plus'
      >
      <div class="afaq-6310-faq-template-17">
        <div class="afaq-6310-faq-template-17-label-head afaq-6310-faq-template-common-head afaq-6310-active">
          <div class="afaq-6310-faq-template-17-head-left-icon"><i class="fas fa-minus"></i></div>
          <div class="afaq-6310-faq-template-17-head-title">What part of this project most appeals to you?</div>
        </div>
        <div class="afaq-6310-faq-template-17-content">
          <div class="afaq-6310-faq-template-17-content-feature">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed est
            accusamus placeat quas vero dolores quis officia ullam autem nostrum delectus architecto
            sunt magnam, porro magni animi, illum aperiam. Consectetur hic, et sequi facere adipisci
            quisquam repudiandae! Labore deserunt et distinctio dignissimos facere, fuga reprehenderit
            quibusdam ad repudiandae aliquid. Perspiciatis. mm
          </div>        
        </div>
      </div>
      <div class="afaq-6310-faq-template-17">
        <div class="afaq-6310-faq-template-17-label-head afaq-6310-faq-template-common-head">
          <div class="afaq-6310-faq-template-17-head-left-icon"><i class="fas fa-plus"></i></div>
          <div class="afaq-6310-faq-template-17-head-title">What part of this project most appeals to you?</div>
        </div>
        <div class="afaq-6310-faq-template-17-content">
          <div class="afaq-6310-faq-template-17-content-feature">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed est
            accusamus placeat quas vero dolores quis officia ullam autem nostrum delectus architecto
            sunt magnam, porro magni animi, illum aperiam. Consectetur hic, et sequi facere adipisci
            quisquam repudiandae! Labore deserunt et distinctio dignissimos facere, fuga reprehenderit
            quibusdam ad repudiandae aliquid. Perspiciatis. mm
          </div>        
        </div>
      </div>
      <div class="afaq-6310-faq-template-17">
        <div class="afaq-6310-faq-template-17-label-head afaq-6310-faq-template-common-head">
          <div class="afaq-6310-faq-template-17-head-left-icon"><i class="fas fa-plus"></i></div>
          <div class="afaq-6310-faq-template-17-head-title">What part of this project most appeals to you?</div>
        </div>
        <div class="afaq-6310-faq-template-17-content">
          <div class="afaq-6310-faq-template-17-content-feature">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed est
            accusamus placeat quas vero dolores quis officia ullam autem nostrum delectus architecto
            sunt magnam, porro magni animi, illum aperiam. Consectetur hic, et sequi facere adipisci
            quisquam repudiandae! Labore deserunt et distinctio dignissimos facere, fuga reprehenderit
            quibusdam ad repudiandae aliquid. Perspiciatis. mm
          </div>        
        </div>
      </div>
    </div>
    <div class="afaq-6310-faq-list">
      Template 17
      <button type="button" class="afaq-6310-btn-success afaq_6310_choosen_style" id="template-17">Create Template</button>
      <button type="button" class="afaq-6310-pro-only">Pro Only</button>
    </div>
    <br class="afaq-6310-clear" />
  </div>
  <!-- ******************************************
      template 17 end
    ****************************************** -->
  <!-- ******************************************
        template 18 start
      ****************************************** -->
  <div class="afaq-6310-row afaq-6310-faq-for-elementor-style-boxed">
    <div 
      class="afaq-6310-padding-15 afaq-6310-templates" 
      data-database-id='18' 
      data-icon-class='afaq-6310-faq-template-18-head-right-icon'
      data-up-arrow='fas fa-arrow-up'
      data-down-arrow='fas fa-arrow-down'
      >
      <div class="afaq-6310-faq-template-18">
        <div class="afaq-6310-faq-template-18-label-head afaq-6310-faq-template-common-head afaq-6310-active">
          <div class="afaq-6310-faq-template-18-head-left-icon"><i class="fas fa-theater-masks"></i></div>
          <div class="afaq-6310-faq-template-18-head-title">What part of this project most appeals to you?</div>
          <div class="afaq-6310-faq-template-18-head-right-icon"><i class="fas fa-arrow-up"></i></div>
        </div>
        <div class="afaq-6310-faq-template-18-content">
          <div class="afaq-6310-faq-template-18-content-feature">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed est
            accusamus placeat quas vero dolores quis officia ullam autem nostrum delectus architecto
            sunt magnam, porro magni animi, illum aperiam. Consectetur hic, et sequi facere adipisci
            quisquam repudiandae! Labore deserunt et distinctio dignissimos facere, fuga reprehenderit
            quibusdam ad repudiandae aliquid. Perspiciatis. mm
          </div>
        </div>       
      </div>
      <div class="afaq-6310-faq-template-18">
        <div class="afaq-6310-faq-template-18-label-head afaq-6310-faq-template-common-head">
          <div class="afaq-6310-faq-template-18-head-left-icon"><i class="fas fa-theater-masks"></i></div>
          <div class="afaq-6310-faq-template-18-head-title">What part of this project most appeals to you?</div>
          <div class="afaq-6310-faq-template-18-head-right-icon"><i class="fas fa-arrow-down"></i></div>
        </div>
        <div class="afaq-6310-faq-template-18-content">
          <div class="afaq-6310-faq-template-18-content-feature">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed est
            accusamus placeat quas vero dolores quis officia ullam autem nostrum delectus architecto
            sunt magnam, porro magni animi, illum aperiam. Consectetur hic, et sequi facere adipisci
            quisquam repudiandae! Labore deserunt et distinctio dignissimos facere, fuga reprehenderit
            quibusdam ad repudiandae aliquid. Perspiciatis. mm
          </div>
        </div>       
      </div>
      <div class="afaq-6310-faq-template-18">
        <div class="afaq-6310-faq-template-18-label-head afaq-6310-faq-template-common-head">
          <div class="afaq-6310-faq-template-18-head-left-icon"><i class="fas fa-theater-masks"></i></div>
          <div class="afaq-6310-faq-template-18-head-title">What part of this project most appeals to you?</div>
          <div class="afaq-6310-faq-template-18-head-right-icon"><i class="fas fa-arrow-down"></i></div>
        </div>
        <div class="afaq-6310-faq-template-18-content">
          <div class="afaq-6310-faq-template-18-content-feature">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed est
            accusamus placeat quas vero dolores quis officia ullam autem nostrum delectus architecto
            sunt magnam, porro magni animi, illum aperiam. Consectetur hic, et sequi facere adipisci
            quisquam repudiandae! Labore deserunt et distinctio dignissimos facere, fuga reprehenderit
            quibusdam ad repudiandae aliquid. Perspiciatis. mm
          </div>
        </div>       
      </div>
    </div>
    <div class="afaq-6310-faq-list">
      Template 18
      <button type="button" class="afaq-6310-btn-success afaq_6310_choosen_style" id="template-18">Create Template</button>
      <button type="button" class="afaq-6310-pro-only">Pro Only</button>
    </div>
    <br class="afaq-6310-clear" />
  </div>
  <!-- ******************************************
        template 18 end
      ****************************************** -->



  <!-- ******************************************
        template 19 start
      ****************************************** -->
  <div class="afaq-6310-row afaq-6310-faq-for-elementor-style-boxed">
    <div 
        class="afaq-6310-padding-15 afaq-6310-templates" 
        data-database-id='19' 
        data-icon-class='afaq-6310-faq-template-19-head-right-title-icon'
        data-up-arrow='fas fa-arrow-up'
        data-down-arrow='fas fa-arrow-down'
        >
      <div class="afaq-6310-faq-template-19">
        <div class="afaq-6310-faq-template-19-label-head afaq-6310-faq-template-common-head afaq-6310-active">
          <div class="afaq-6310-faq-template-19-head-title">
            <div class="afaq-6310-faq-template-19-head-left-title-icon"><i class="fas fa-users"></i></div>
            What part of this project most appeals to you?
            <div class="afaq-6310-faq-template-19-head-right-title-icon"><i class="fas fa-arrow-up"></i></div>
          </div>
        </div>
        <div class="afaq-6310-faq-template-19-content afaq-6310-arrow-active">
          <div class="afaq-6310-faq-template-19-content-feature">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed est
            accusamus placeat quas vero dolores quis officia ullam autem nostrum delectus architecto
            sunt magnam, porro magni animi, illum aperiam. Consectetur hic, et sequi facere adipisci
            quisquam repudiandae! Labore deserunt et distinctio dignissimos facere, fuga reprehenderit
            quibusdam ad repudiandae aliquid. Perspiciatis. mm
          </div>
        </div>
      </div>
      <div class="afaq-6310-faq-template-19">
        <div class="afaq-6310-faq-template-19-label-head afaq-6310-faq-template-common-head">
          <div class="afaq-6310-faq-template-19-head-title">
            <div class="afaq-6310-faq-template-19-head-left-title-icon"><i class="fas fa-bell"></i></div>
            What part of this project most appeals to you?
            <div class="afaq-6310-faq-template-19-head-right-title-icon"><i class="fas fa-arrow-down"></i></div>
          </div>
        </div>
        <div class="afaq-6310-faq-template-19-content afaq-6310-arrow-active">
          <div class="afaq-6310-faq-template-19-content-feature">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed est
            accusamus placeat quas vero dolores quis officia ullam autem nostrum delectus architecto
            sunt magnam, porro magni animi, illum aperiam. Consectetur hic, et sequi facere adipisci
            quisquam repudiandae! Labore deserunt et distinctio dignissimos facere, fuga reprehenderit
            quibusdam ad repudiandae aliquid. Perspiciatis. mm
          </div>
        </div>
      </div>
      <div class="afaq-6310-faq-template-19">
        <div class="afaq-6310-faq-template-19-label-head afaq-6310-faq-template-common-head">
          <div class="afaq-6310-faq-template-19-head-title">
            <div class="afaq-6310-faq-template-19-head-left-title-icon"><i class="fas fa-feather"></i></div>
            What part of this project most appeals to you?
            <div class="afaq-6310-faq-template-19-head-right-title-icon"><i class="fas fa-arrow-down"></i></div>
          </div>
        </div>
        <div class="afaq-6310-faq-template-19-content afaq-6310-arrow-active">
          <div class="afaq-6310-faq-template-19-content-feature">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed est
            accusamus placeat quas vero dolores quis officia ullam autem nostrum delectus architecto
            sunt magnam, porro magni animi, illum aperiam. Consectetur hic, et sequi facere adipisci
            quisquam repudiandae! Labore deserunt et distinctio dignissimos facere, fuga reprehenderit
            quibusdam ad repudiandae aliquid. Perspiciatis. mm
          </div>
        </div>
      </div>
      
    </div>
    <div class="afaq-6310-faq-list">
      Template 19
      <button type="button" class="afaq-6310-btn-success afaq_6310_choosen_style" id="template-19">Create Template</button>
      <button type="button" class="afaq-6310-pro-only">Pro Only</button>
    </div>
    <br class="afaq-6310-clear" />
  </div>
  <!-- ******************************************
        template 19 end
      ****************************************** -->
  <!-- ******************************************
        template 20 start
      ****************************************** -->
  <div class="afaq-6310-row afaq-6310-faq-for-elementor-style-boxed">
    <div 
        class="afaq-6310-padding-15 afaq-6310-templates" 
        data-database-id='20' 
        data-icon-class='afaq-6310-faq-template-20-head-left-icon'
        data-up-arrow='fas fa-minus'
        data-down-arrow='fas fa-plus'
        >
      <div class="afaq-6310-faq-template-20">
        <div class="afaq-6310-faq-template-20-label-head afaq-6310-faq-template-common-head afaq-6310-active">
          <div class="afaq-6310-faq-template-20-head-left-icon"><i class="fas fa-minus"></i></div>
          <div class="afaq-6310-faq-template-20-head-title">
            <div class="afaq-6310-faq-template-20-head-left-title-heading"> What part of this project most appeals to you?</div>           
            <div class="afaq-6310-faq-template-20-head-right-title-icon"><i class="fab fa-canadian-maple-leaf"></i></div>
          </div>
        </div>
        <div class="afaq-6310-faq-template-20-content afaq-6310-active">
          <div class="afaq-6310-faq-template-20-content-feature">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed est
            accusamus placeat quas vero dolores quis officia ullam autem nostrum delectus architecto
            sunt magnam, porro magni animi, illum aperiam. Consectetur hic, et sequi facere adipisci
            quisquam repudiandae! Labore deserunt et distinctio dignissimos facere, fuga reprehenderit
            quibusdam ad repudiandae aliquid. Perspiciatis. mm
          </div>
        </div>   
      </div>
      <div class="afaq-6310-faq-template-20">
        <div class="afaq-6310-faq-template-20-label-head afaq-6310-faq-template-common-head">
          <div class="afaq-6310-faq-template-20-head-left-icon"><i class="fas fa-plus"></i></div>
          <div class="afaq-6310-faq-template-20-head-title">
            <div class="afaq-6310-faq-template-20-head-left-title-heading"> What part of this project most appeals to you?</div>           
            <div class="afaq-6310-faq-template-20-head-right-title-icon"><i class="fas fa-users"></i></div>
          </div>
        </div>
        <div class="afaq-6310-faq-template-20-content afaq-6310-active">
          <div class="afaq-6310-faq-template-20-content-feature">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed est
            accusamus placeat quas vero dolores quis officia ullam autem nostrum delectus architecto
            sunt magnam, porro magni animi, illum aperiam. Consectetur hic, et sequi facere adipisci
            quisquam repudiandae! Labore deserunt et distinctio dignissimos facere, fuga reprehenderit
            quibusdam ad repudiandae aliquid. Perspiciatis. mm
          </div>
        </div>   
      </div>
      <div class="afaq-6310-faq-template-20">
        <div class="afaq-6310-faq-template-20-label-head afaq-6310-faq-template-common-head">
          <div class="afaq-6310-faq-template-20-head-left-icon"><i class="fas fa-plus"></i></div>
          <div class="afaq-6310-faq-template-20-head-title">
            <div class="afaq-6310-faq-template-20-head-left-title-heading"> What part of this project most appeals to you?</div>           
            <div class="afaq-6310-faq-template-20-head-right-title-icon"><i class="fas fa-umbrella"></i></div>
          </div>
        </div>
        <div class="afaq-6310-faq-template-20-content afaq-6310-active">
          <div class="afaq-6310-faq-template-20-content-feature">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed est
            accusamus placeat quas vero dolores quis officia ullam autem nostrum delectus architecto
            sunt magnam, porro magni animi, illum aperiam. Consectetur hic, et sequi facere adipisci
            quisquam repudiandae! Labore deserunt et distinctio dignissimos facere, fuga reprehenderit
            quibusdam ad repudiandae aliquid. Perspiciatis. mm
          </div>
        </div>   
      </div>
    </div>
    <div class="afaq-6310-faq-list">
      Template 20
      <button type="button" class="afaq-6310-btn-success afaq_6310_choosen_style" id="template-20">Create Template</button>
      <button type="button" class="afaq-6310-pro-only">Pro Only</button>
    </div>
    <br class="afaq-6310-clear" />
  </div>
  <!-- ******************************************
        template 20 end
      ****************************************** -->  


  <div id="afaq-6310-modal-add" class="afaq-6310-modal" style="display: none">
    <div class="afaq-6310-modal-content afaq-6310-modal-sm">
      <form action="" method="post">
        <div class="afaq-6310-modal-header">
          Create Template
          <div class="afaq-6310-close">&times;</div>
        </div>
        <div class="afaq-6310-modal-body-form">
          <?php wp_nonce_field("afaq-6310-nonce-field") ?>
          <input type="hidden" name="style" id="afaq-6310-style-hidden" />
          <table border="0" width="100%" cellpadding="10" cellspacing="0">
            <tr>
              <td width="150"><label class="afaq-6310-form-label" for="icon_name">Template Name:</label>
              </td>
              <td><input type="text" required="" name="style_name" id="style_name" value="" class="afaq-6310-form-input" placeholder="Template Name" style="width: 240px" /></td>
            </tr>
          </table>
        </div>
        <div class="afaq-6310-modal-form-footer">
          <button type="button" name="close" class="afaq-6310-btn-danger afaq-6310-pull-right">Close</button>
          <input type="submit" name="submit" class="afaq-6310-btn-primary afaq-6310-pull-right afaq-6310-margin-right-10" value="Save" />
        </div>
      </form>
      <br class="afaq-6310-clear" />
    </div>
  </div>

  <script>
     jQuery(document).ready(function() {
    let templates = jQuery('.afaq-6310-templates');
    templates.each(function(){
      let ids = jQuery(this).attr('data-database-id');
      jQuery(`.afaq-6310-faq-template-${ids}-content:first`).show();
    });

    jQuery("body").on("click", `.afaq-6310-faq-template-common-head`, function() {
      var ids = jQuery(this).closest('.afaq-6310-templates').attr('data-database-id');
      var animation_duration = .5;
      var content = jQuery(`.afaq-6310-faq-template-${ids}-content`);
      let iconClass = jQuery(this).closest('.afaq-6310-templates').attr('data-icon-class');
      let upArrow = jQuery(this).closest('.afaq-6310-templates').attr('data-up-arrow');
      let downArrow = jQuery(this).closest('.afaq-6310-templates').attr('data-down-arrow');

      content.slideUp(animation_duration * 1000);
      if (jQuery(this).hasClass(`afaq-6310-active`)) {
        jQuery(this).removeClass(`afaq-6310-active`);
        jQuery(`.${iconClass} i`).attr('class', downArrow);
      } else {
        jQuery(`.afaq-6310-faq-template-${ids}-label-head`).removeClass(`afaq-6310-active`);
        jQuery(this).addClass(`afaq-6310-active`)
        jQuery(this).next().slideDown(animation_duration * 1000);
        jQuery(`.${iconClass} i`).attr('class', downArrow);
        jQuery(this).find(`.${iconClass} i`).attr('class', upArrow);
      }
    });

    jQuery("body").on("click", ".afaq_6310_choosen_style", function() {
      jQuery("#afaq-6310-modal-add").fadeIn(500);
      jQuery("#afaq-6310-style-hidden").val(jQuery(this).attr("id"));
      jQuery("body").css({
        "overflow": "hidden"
      });
      return false;
    });

    jQuery("body").on("click", ".afaq-6310-close, .afaq-6310-btn-danger", function() {
      jQuery("#afaq-6310-modal-add").fadeOut(500);
      jQuery("body").css({
        "overflow": "initial"
      });
    });
    jQuery(window).click(function(event) {
      if (event.target == document.getElementById('afaq-6310-modal-add')) {
        jQuery("#afaq-6310-modal-add").fadeOut(500);
        jQuery("body").css({
          "overflow": "initial"
        });
      }
    });
  });
  </script>