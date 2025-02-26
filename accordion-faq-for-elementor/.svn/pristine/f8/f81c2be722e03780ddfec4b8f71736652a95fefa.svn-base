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

    if ($style_name == 'template-01') {
      $css = "_wp_http_referer,id,animation_duration,afaq_faq_mode,enable_show_hide,icon_show_hide,head_icon_width_number,head_icon_font_size_number,title_icon_color,icon_hover_color,icon_background_color,icon_background_hover_color,title_active_icon,title_inactive_icon,indicator_width_number,indicator_font_size_number,indicator_color,indicator_hover_color,indicator_background_color,indicator_background_hover_color,title_line_height_number,title_font_color,title_text_hover_color,title_bg_color,title_bg_hover_color,top_border_height_number,title_border_top_color,title_font_family,title_font_size_number,title_font_weight,title_text_transform,title_text_align,title_padding_top_number,title_padding_bottom_number,title_padding_left_number,title_padding_right_number,description_scroll,description_font_family,description_font_size_number,description_line_height_number,description_font_weight,description_text_transform,description_text_align,description_font_color,description_text_hover_color,description_font_background_color,description_background_hover_color,description_padding_left_number,description_padding_right_number,description_padding_top_number,description_padding_bottom_number,activate_default_category,selected_category_template,category_per_row,category_01_title_font_family,category_01_title_font_size_number_number,category_01_title_line_height_number,category_01_title_font_weight,category_01_title_color,category_01_title_hover_color,category_01_title_background_hover_color,category_01_border_size_number,category_01_border_color,category_01_icon_font_size_number,category_01_icon_color,category_icon_hover_color,category_01_description_font_family,category_01_description_font_size_number_number,category_01_description_line_height_number_number,category_01_description_font_weight,category_01_description_color,category_01_description_hover_color,category_02_title_font_size_number,category_02_title_color,category_02_title_hover_color,category_02_title_background_color,category_02_title_background_hover_color,category_02_height,category_02_icon_font_size,category_02_icon_height,category_02_First_icon_color,category_02_First_icon_backgrond_color,category_02_Second_icon_color,category_02_Second_icon_backgrond_color,category_02_third_icon_color,category_02_third_icon_backgrond_color,category_02_Fourth_icon_color,category_02_Fourth_icon_backgrond_color,category_03_title_font_size_number,category_03_title_color,category_03_title_hover_color,category_03_title_padding_size,category_03_title_background_hover_color,category_03_height,category_03_icon_font_size,category_03_icon_circle_size,category_03_icon_color,category_03_icon_hover_color,category_03_icon_backgrond_color,category_03_icon_backgrond_hover_color,place_holder_text,searce_font_family,search_font_size_number,search_box_height_number,search_width,search_box_align,search_icon_size_number,search_icon_color,search_icon_hover_color,search_background_color,search_border_width_number,search_border_radious_number,search_border_color,template_button,button_font_color,button_font_family,button_font_size_number,button_font_weight,button_text_transform,button_height_number,button_width_number,button_align,button_background_color,button_background_hover_color,button_border_width,button_border_radius_number,button_border_color,button_border_hover_color,button_margin_top_number,button_margin_bottom_number,custom_css,update_style_change!!##!!/wordpress/wp-admin/admin.php?page=afaq-6310-faq-01-10&styleid=1||##||1||##||0.8||##||1||##||1||##||1||##||50||##||16||##||rgb(255, 255, 255)||##||rgb(255, 255, 255)||##||rgb(6, 46, 59)||##||rgb(1, 102, 133)||##||fas fa-angle-up||##||fas fa-angle-down||##||50||##||16||##||rgb(255, 255, 255)||##||rgb(255, 255, 255)||##||rgb(6, 46, 59)||##||rgb(1, 102, 133)||##||22||##||rgb(41, 37, 22)||##||rgb(255, 255, 255)||##||rgb(163, 192, 198)||##||rgb(163, 192, 198)||##||1||##||rgb(252, 252, 252)||##||Arimo||##||16||##||300||##||none||##||flex-start||##||15||##||15||##||10||##||5||##||150||##||Arimo||##||14||##||20||##||100||##||none||##||left||##||rgb(28, 27, 26)||##||rgb(28, 27, 26)||##||rgb(237, 237, 237)||##||rgba(232, 232, 232, 1)||##||10||##||10||##||10||##||10||##||1||##||||##||2||##||Cuprum||##||20||##||20||##||900||##||rgb(26, 26, 26)||##||rgb(41, 39, 39)||##||rgba(240, 240, 240, 0.91)||##||1||##||rgb(140, 140, 140)||##||40||##||rgb(1, 102, 133)||##||rgb(13, 72, 92)||##||Roboto||##||14||##||20||##||500||##||rgb(122, 117, 117)||##||#4f676e||##||13||##||#dbf0e4||##||#dbf0e4||##||#ededed||##||#ededed||##||40||##||35||##||70||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#228a8e||##||#00b4b3||##||#228a8e||##||13||##||#dbf0e4||##||#eef0e4||##||10||##||#ededed||##||2||##||25||##||50||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||Enter Keywords eg: Foods, Blogs...||##||Ubuntu||##||14||##||30||##||35||##||flex-end||##||14||##||rgb(6, 46, 59)||##||rgb(1, 102, 133)||##||rgb(255, 255, 255)||##||1||##||20||##||rgb(6, 46, 59)||##||1||##||rgb(240, 240, 240)||##||Roboto||##||14||##||100||##||none||##||30||##||100||##||right||##||rgb(97, 161, 176)||##||rgb(69, 135, 150)||##||1px||##||0||##||rgb(59, 121, 135)||##||rgb(26, 72, 82)||##||10||##||0||##||||##||Save";
    } else if ($style_name == 'template-02') {
      $css = "_wp_http_referer,id,animation_duration,afaq_faq_mode,icon_show_hide,head_icon_width_number,head_icon_font_size_number,title_icon_color,icon_hover_color,angle_width_number,angle_from_left_number,title_active_icon,title_inactive_icon,indicator_width_number,indicator_font_size_number,indicator_color,indicator_hover_color,indicator_background_color,indicator_background_hover_color,title_line_height_number,title_font_color,title_text_hover_color,title_bg_color,title_bg_hover_color,top_border_height_number,title_border_top_color,title_font_family,title_font_size_number,title_font_weight,title_text_transform,title_text_align,title_padding_top_number,title_padding_bottom_number,title_padding_left_number,title_padding_right_number,description_scroll,description_font_family,description_font_size_number,description_line_height_number,description_font_weight,description_text_transform,description_text_align,description_font_color,description_text_hover_color,description_font_background_color,description_background_hover_color,description_padding_left_number,description_padding_right_number,description_padding_top_number,description_padding_bottom_number,activate_default_category,selected_category_template,category_per_row,category_01_title_font_family,category_01_title_font_size_number_number,category_01_title_line_height_number,category_01_title_font_weight,category_01_title_color,category_01_title_hover_color,category_01_title_background_hover_color,category_01_border_size_number,category_01_border_color,category_01_icon_font_size_number,category_01_icon_color,category_icon_hover_color,category_01_description_font_family,category_01_description_font_size_number_number,category_01_description_line_height_number_number,category_01_description_font_weight,category_01_description_color,category_01_description_hover_color,category_02_title_font_size_number,category_02_title_color,category_02_title_hover_color,category_02_title_background_color,category_02_title_background_hover_color,category_02_height,category_02_icon_font_size,category_02_icon_height,category_02_First_icon_color,category_02_First_icon_backgrond_color,category_02_Second_icon_color,category_02_Second_icon_backgrond_color,category_02_third_icon_color,category_02_third_icon_backgrond_color,category_02_Fourth_icon_color,category_02_Fourth_icon_backgrond_color,category_03_title_font_size_number,category_03_title_color,category_03_title_hover_color,category_03_title_padding_size,category_03_title_background_hover_color,category_03_height,category_03_icon_font_size,category_03_icon_circle_size,category_03_icon_color,category_03_icon_hover_color,category_03_icon_backgrond_color,category_03_icon_backgrond_hover_color,place_holder_text,searce_font_family,search_font_size_number,search_box_height_number,search_width,search_box_align,search_icon_size_number,search_icon_color,search_icon_hover_color,search_background_color,search_border_width_number,search_border_radious_number,search_border_color,template_button,button_font_color,button_font_family,button_font_size_number,button_font_weight,button_text_transform,button_height_number,button_width_number,button_align,button_background_color,button_background_hover_color,button_border_width,button_border_radius_number,button_border_color,button_border_hover_color,button_margin_top_number,button_margin_bottom_number,custom_css,update_style_change!!##!!/wordpress/wp-admin/admin.php?page=afaq-6310-faq-01-10&styleid=2||##||2||##||0.5||##||1||##||1||##||50||##||16||##||rgb(46, 51, 50)||##||rgb(255, 255, 255)||##||20||##||40||##||fas fa-angle-up||##||fas fa-angle-double-down||##||50||##||16||##||rgb(255, 255, 255)||##||rgb(255, 255, 255)||##||rgb(1, 102, 133)||##||rgb(7, 86, 112)||##||22||##||rgb(28, 29, 26)||##||rgb(255, 255, 255)||##||rgb(63, 152, 184)||##||rgb(90, 190, 224)||##||1||##||rgb(255, 255, 255)||##||Arimo||##||16||##||300||##||none||##||flex-start||##||15||##||15||##||10||##||5||##||150||##||Arimo||##||14||##||20||##||100||##||none||##||left||##||rgb(31, 26, 26)||##||rgb(31, 26, 26)||##||rgba(240, 240, 240, 1)||##||rgba(252, 252, 252, 1)||##||10||##||10||##||10||##||10||##||1||##||||##||2||##||Cuprum||##||20||##||20||##||900||##||rgb(26, 26, 26)||##||rgb(41, 39, 39)||##||rgba(240, 240, 240, 0.91)||##||1||##||rgb(140, 140, 140)||##||40||##||rgb(63, 152, 184)||##||rgb(7, 86, 112)||##||Roboto||##||14||##||20||##||500||##||rgb(122, 117, 117)||##||rgb(75, 99, 107)||##||13||##||#dbf0e4||##||#dbf0e4||##||#ededed||##||#ededed||##||40||##||35||##||70||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#228a8e||##||#00b4b3||##||#228a8e||##||13||##||#dbf0e4||##||#eef0e4||##||10||##||#ededed||##||2||##||25||##||50||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||Enter Keywords eg: Foods, Blogs...||##||Ubuntu||##||14||##||30||##||35||##||flex-end||##||14||##||rgb(63, 152, 184)||##||rgb(90, 190, 224)||##||rgb(255, 255, 255)||##||1||##||20||##||rgb(46, 97, 95)||##||1||##||rgb(255, 255, 255)||##||Roboto||##||14||##||100||##||none||##||30||##||100||##||right||##||rgb(75, 179, 214)||##||rgb(63, 152, 184)||##||1px||##||0||##||rgb(97, 91, 91)||##||rgb(97, 91, 91)||##||10||##||0||##||||##||Save";
    } else if ($style_name == 'template-03') {
      $css = "_wp_http_referer,id,animation_duration,afaq_faq_mode,icon_show_hide,head_icon_width_number,head_icon_font_size_number,title_icon_color,icon_hover_color,icon_background_color,icon_background_hover_color,title_active_icon,title_inactive_icon,indicator_width_number,indicator_font_size_number,indicator_color,indicator_hover_color,indicator_background_color,indicator_background_hover_color,title_line_height_number,title_font_color,title_text_hover_color,title_bg_color,title_bg_hover_color,top_border_height_number,title_border_top_color,title_empty_space,title_font_family,title_font_size_number,title_font_weight,title_text_align,title_text_transform,title_padding_top_number,title_padding_bottom_number,title_padding_left_number,title_padding_right_number,description_scroll,description_font_family,description_font_size_number,description_line_height_number,description_font_weight,description_text_transform,description_text_align,description_margin_bottom,description_border_height,description_border_color,description_font_color,description_text_hover_color,description_font_background_color,description_background_hover_color,description_padding_left_number,description_padding_right_number,description_padding_top_number,description_padding_bottom_number,description_border_hover_color,activate_default_category,selected_category_template,category_per_row,category_01_title_font_family,category_01_title_font_size_number_number,category_01_title_line_height_number,category_01_title_font_weight,category_01_title_color,category_01_title_hover_color,category_01_title_background_hover_color,category_01_border_size_number,category_01_border_color,category_01_icon_font_size_number,category_01_icon_color,category_icon_hover_color,category_01_description_font_family,category_01_description_font_size_number_number,category_01_description_line_height_number_number,category_01_description_font_weight,category_01_description_color,category_01_description_hover_color,category_02_title_font_size_number,category_02_title_color,category_02_title_hover_color,category_02_title_background_color,category_02_title_background_hover_color,category_02_height,category_02_icon_font_size,category_02_icon_height,category_02_First_icon_color,category_02_First_icon_backgrond_color,category_02_Second_icon_color,category_02_Second_icon_backgrond_color,category_02_third_icon_color,category_02_third_icon_backgrond_color,category_02_Fourth_icon_color,category_02_Fourth_icon_backgrond_color,category_03_title_font_size_number,category_03_title_color,category_03_title_hover_color,category_03_title_padding_size,category_03_title_background_hover_color,category_03_height,category_03_icon_font_size,category_03_icon_circle_size,category_03_icon_color,category_03_icon_hover_color,category_03_icon_backgrond_color,category_03_icon_backgrond_hover_color,place_holder_text,searce_font_family,search_font_size_number,search_box_height_number,search_width,search_box_align,search_icon_size_number,search_icon_color,search_icon_hover_color,search_background_color,search_border_width_number,search_border_radious_number,search_border_color,template_button,button_font_color,button_font_family,button_font_size_number,button_font_weight,button_text_transform,button_height_number,button_width_number,button_align,button_background_color,button_background_hover_color,button_border_width,button_border_radius_number,button_border_color,button_border_hover_color,button_margin_top_number,button_margin_bottom_number,custom_css,update_style_change!!##!!/wordpress/wp-admin/admin.php?page=afaq-6310-faq-01-10&styleid=3||##||3||##||0.5||##||1||##||1||##||60||##||16||##||rgb(253, 255, 254)||##||rgb(246, 253, 253)||##||rgb(16, 166, 106)||##||rgb(20, 122, 81)||##||fas fa-angle-up||##||fas fa-angle-down||##||50||##||16||##||rgb(255, 255, 255)||##||rgb(246, 253, 253)||##||rgb(26, 164, 108)||##||rgb(20, 122, 81)||##||25||##||rgb(253, 255, 254)||##||rgb(246, 253, 253)||##||rgb(26, 164, 108)||##||rgb(20, 122, 81)||##||1||##||rgb(255, 255, 255)||##||4||##||Amaranth||##||20||##||500||##||flex-start||##||uppercase||##||10||##||10||##||10||##||10||##||150||##||Droid+Sans||##||16||##||20||##||400||##||none||##||left||##||5||##||1||##||rgb(20, 122, 81)||##||rgb(69, 69, 69)||##||rgb(69, 69, 69)||##||rgba(252, 252, 252, 1)||##||rgba(255, 252, 252, 1)||##||10||##||10||##||10||##||10||##||rgb(20, 122, 81)||##||1||##||||##||2||##||Amaranth||##||20||##||20||##||900||##||rgb(0, 0, 0)||##||rgb(0, 0, 0)||##||rgba(240, 240, 240, 0.91)||##||1||##||rgb(140, 140, 140)||##||40||##||rgb(26, 164, 108)||##||rgb(20, 122, 81)||##||Ubuntu||##||13||##||20||##||500||##||rgb(122, 117, 117)||##||rgb(71, 95, 102)||##||13||##||#dbf0e4||##||#dbf0e4||##||#ededed||##||#ededed||##||40||##||35||##||70||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#228a8e||##||#00b4b3||##||#228a8e||##||13||##||#dbf0e4||##||#eef0e4||##||10||##||#ededed||##||2||##||25||##||50||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||Enter Keywords eg: Foods, Blog...||##||Ubuntu||##||14||##||30||##||35||##||flex-end||##||14||##||rgb(29, 92, 67)||##||rgb(26, 164, 108)||##||rgb(255, 255, 255)||##||1||##||20||##||rgb(29, 92, 67)||##||1||##||rgb(255, 255, 255)||##||Ubuntu||##||14||##||100||##||capitalize||##||30||##||100||##||right||##||rgb(26, 164, 108)||##||rgb(21, 122, 81)||##||1px||##||40||##||rgb(201, 175, 175)||##||rgb(201, 175, 175)||##||10||##||0||##||||##||Save";
    } else if ($style_name == 'template-04') {
      $css = "_wp_http_referer,id,animation_duration,afaq_faq_mode,icon_show_hide,head_icon_width_number,head_icon_font_size_number,title_icon_color,icon_hover_color,title_active_icon,title_inactive_icon,indicator_width_number,indicator_font_size_number,indicator_color,indicator_hover_color,title_line_height_number,title_font_family,title_font_size_number,title_font_weight,title_font_color,title_text_hover_color,title_bg_color,title_text_transform,title_text_align,title_padding_top_number,title_padding_bottom_number,title_padding_left_number,title_padding_right_number,description_scroll,description_font_family,description_font_size_number,description_line_height_number,description_font_weight,description_text_transform,description_text_align,description_font_color,description_padding_left_number,description_padding_right_number,description_padding_top_number,description_padding_bottom_number,activate_default_category,selected_category_template,category_per_row,category_01_title_font_family,category_01_title_font_size_number_number,category_01_title_line_height_number,category_01_title_font_weight,category_01_title_color,category_01_title_hover_color,category_01_title_background_hover_color,category_01_border_size_number,category_01_border_color,category_01_icon_font_size_number,category_01_icon_color,category_icon_hover_color,category_01_description_font_family,category_01_description_font_size_number_number,category_01_description_line_height_number_number,category_01_description_font_weight,category_01_description_color,category_01_description_hover_color,category_02_title_font_size_number,category_02_title_color,category_02_title_hover_color,category_02_title_background_color,category_02_title_background_hover_color,category_02_height,category_02_icon_font_size,category_02_icon_height,category_02_First_icon_color,category_02_First_icon_backgrond_color,category_02_Second_icon_color,category_02_Second_icon_backgrond_color,category_02_third_icon_color,category_02_third_icon_backgrond_color,category_02_Fourth_icon_color,category_02_Fourth_icon_backgrond_color,category_03_title_font_size_number,category_03_title_color,category_03_title_hover_color,category_03_title_padding_size,category_03_title_background_hover_color,category_03_height,category_03_icon_font_size,category_03_icon_circle_size,category_03_icon_color,category_03_icon_hover_color,category_03_icon_backgrond_color,category_03_icon_backgrond_hover_color,place_holder_text,searce_font_family,search_font_size_number,search_box_height_number,search_width,search_box_align,search_icon_size_number,search_icon_color,search_icon_hover_color,search_background_color,search_border_width_number,search_border_radious_number,search_border_color,template_button,button_font_color,button_font_family,button_font_size_number,button_font_weight,button_text_transform,button_height_number,button_width_number,button_align,button_background_color,button_background_hover_color,button_border_width,button_border_radius_number,button_border_color,button_border_hover_color,button_margin_top_number,button_margin_bottom_number,custom_css,update_style_change!!##!!/wordpress/wp-admin/admin.php?page=afaq-6310-faq-01-10&styleid=17||##||17||##||0.5||##||1||##||1||##||50||##||16||##||rgb(96, 196, 181)||##||rgb(255, 255, 255)||##||fas fa-angle-double-left||##||fas fa-arrow-up||##||50||##||16||##||rgb(66, 24, 24)||##||rgb(255, 255, 255)||##||22||##||Arimo||##||16||##||300||##||rgb(242, 83, 29)||##||rgb(255, 255, 255)||##||rgb(22, 17, 36)||##||none||##||flex-start||##||15||##||15||##||10||##||5||##||150||##||Arimo||##||14||##||20||##||300||##||none||##||left||##||rgb(255, 255, 255)||##||10||##||10||##||10||##||10||##||1||##||||##||2||##||PT+Sans||##||20||##||20||##||800||##||rgb(0, 0, 0)||##||rgb(0, 0, 0)||##||rgb(240, 240, 240, 0.91)||##||1||##||rgb(22, 17, 36)||##||40||##||rgb(22, 17, 36)||##||rgb(22, 17, 36)||##||Droid+Sans||##||13||##||20||##||300||##||rgb(143, 140, 140)||##||rgb(78, 104, 112)||##||13||##||#dbf0e4||##||#dbf0e4||##||#ededed||##||#ededed||##||40||##||35||##||70||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#228a8e||##||#00b4b3||##||#228a8e||##||13||##||#dbf0e4||##||#eef0e4||##||10||##||#ededed||##||2||##||25||##||50||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||Enter Keywords eg: Foods, Blog...||##||Roboto||##||14||##||30||##||35||##||flex-end||##||14||##||rgb(41, 23, 17)||##||rgb(46, 20, 11)||##||rgb(255, 255, 255)||##||1||##||0||##||rgb(22, 17, 36)||##||1||##||rgb(214, 19, 87)||##||Droid+Sans||##||14||##||100||##||capitalize||##||30||##||100||##||right||##||rgb(255, 255, 255, 0)||##||rgb(255, 255, 255, 0.02)||##||1px||##||0||##||rgb(255, 255, 255)||##||rgb(255, 255, 255)||##||10||##||0||##||||##||Save";
    } else if ($style_name == 'template-05') {
      $css = "_wp_http_referer,id,animation_duration,afaq_faq_mode,icon_show_hide,head_icon_width_number,head_icon_font_size_number,title_icon_color,icon_hover_color,before_effect_color,before_effect_hover_color,angle_width_number,angle_from_left_number,title_active_icon,title_inactive_icon,indicator_width_number,indicator_font_size_number,indicator_color,indicator_hover_color,indicator_background_color,indicator_background_hover_color,title_line_height_number,title_font_size_number,title_font_color,title_text_hover_color,title_bg_color,title_bg_hover_color,top_border_height_number,title_border_top_color,title_font_family,title_font_weight,title_text_transform,title_text_align,title_padding_top_number,title_padding_bottom_number,title_padding_left_number,title_padding_right_number,description_scroll,description_font_family,description_font_size_number,description_line_height_number,description_font_weight,description_text_transform,description_text_align,description_margin_bottom,description_font_color,description_text_hover_color,description_font_background_color,description_background_hover_color,description_padding_left_number,description_padding_right_number,description_padding_top_number,description_padding_bottom_number,activate_default_category,selected_category_template,category_per_row,category_01_title_font_family,category_01_title_font_size_number_number,category_01_title_line_height_number,category_01_title_font_weight,category_01_title_color,category_01_title_hover_color,category_01_title_background_hover_color,category_01_border_size_number,category_01_border_color,category_01_icon_font_size_number,category_01_icon_color,category_icon_hover_color,category_01_description_font_family,category_01_description_font_size_number_number,category_01_description_line_height_number_number,category_01_description_font_weight,category_01_description_color,category_01_description_hover_color,category_02_title_font_size_number,category_02_title_color,category_02_title_hover_color,category_02_title_background_color,category_02_title_background_hover_color,category_02_height,category_02_icon_font_size,category_02_icon_height,category_02_First_icon_color,category_02_First_icon_backgrond_color,category_02_Second_icon_color,category_02_Second_icon_backgrond_color,category_02_third_icon_color,category_02_third_icon_backgrond_color,category_02_Fourth_icon_color,category_02_Fourth_icon_backgrond_color,category_03_title_font_size_number,category_03_title_color,category_03_title_hover_color,category_03_title_padding_size,category_03_title_background_hover_color,category_03_height,category_03_icon_font_size,category_03_icon_circle_size,category_03_icon_color,category_03_icon_hover_color,category_03_icon_backgrond_color,category_03_icon_backgrond_hover_color,place_holder_text,searce_font_family,search_font_size_number,search_box_height_number,search_width,search_box_align,search_icon_size_number,search_icon_color,search_icon_hover_color,search_background_color,search_border_width_number,search_border_radious_number,search_border_color,template_button,button_font_color,button_font_family,button_font_size_number,button_font_weight,button_text_transform,button_height_number,button_width_number,button_align,button_background_color,button_background_hover_color,button_border_width,button_border_radius_number,button_border_color,button_border_hover_color,button_margin_top_number,button_margin_bottom_number,custom_css,update_style_change!!##!!/wordpress/wp-admin/admin.php?page=afaq-6310-faq-01-10&styleid=4||##||4||##||0.5||##||1||##||1||##||50||##||16||##||rgb(255, 255, 255)||##||rgb(255, 255, 255)||##||rgb(53, 79, 148)||##||rgb(53, 79, 148)||##||20||##||40||##||fas fa-minus||##||fas fa-plus||##||50||##||16||##||rgb(255, 255, 255)||##||rgb(255, 255, 255)||##||rgb(0, 17, 71)||##||rgb(0, 17, 71)||##||22||##||16||##||rgb(245, 245, 245)||##||rgb(255, 255, 255)||##||rgb(87, 77, 77)||##||rgb(138, 116, 116)||##||1||##||rgb(252, 252, 252)||##||Arimo||##||300||##||uppercase||##||flex-start||##||15||##||15||##||10||##||5||##||150||##||Arimo||##||15||##||20||##||400||##||none||##||left||##||2||##||rgb(23, 17, 17)||##||rgb(23, 17, 17)||##||rgba(4, 79, 219, 0.08)||##||rgba(3, 78, 219, 0.19)||##||10||##||10||##||10||##||10||##||1||##||||##||2||##||Amaranth||##||20||##||20||##||900||##||rgb(26, 26, 26)||##||rgb(41, 39, 39)||##||rgba(240, 240, 240, 0.91)||##||1||##||rgb(140, 140, 140)||##||40||##||rgb(53, 79, 148)||##||rgb(87, 77, 77)||##||Roboto||##||13||##||20||##||500||##||#8a8a8a||##||#4f676e||##||13||##||#dbf0e4||##||#dbf0e4||##||#ededed||##||#ededed||##||40||##||35||##||70||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#228a8e||##||#00b4b3||##||#228a8e||##||13||##||#dbf0e4||##||#eef0e4||##||10||##||#ededed||##||2||##||25||##||50||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||Enter Keywords eg: Foods, Blog...||##||Ubuntu||##||14||##||30||##||35||##||flex-end||##||14||##||rgb(87, 77, 77)||##||rgb(138, 116, 116)||##||rgb(255, 255, 255)||##||1||##||0||##||rgb(87, 77, 77)||##||1||##||rgb(255, 255, 255)||##||Roboto||##||14||##||100||##||none||##||30||##||100||##||right||##||rgb(138, 116, 116)||##||rgb(53, 79, 148)||##||1px||##||0||##||rgb(138, 116, 116)||##||rgb(87, 77, 77)||##||10||##||0||##||||##||Save";
    } else if ($style_name == 'template-06') {
      $css = "_wp_http_referer,id,animation_duration,afaq_faq_mode,icon_show_hide,head_icon_width_number,head_icon_font_size_number,title_icon_color,icon_hover_color,icon_background_color,icon_background_hover_color,indicator_width_number,indicator_font_size_number,indicator_color,indicator_hover_color,indicator_background_color,indicator_background_hover_color,title_line_height_number,title_font_color,title_text_hover_color,title_bg_color,title_bg_hover_color,top_border_height_number,title_border_top_color,title_font_family,title_font_size_number,title_font_weight,title_text_transform,title_text_align,title_padding_top_number,title_padding_bottom_number,title_padding_left_number,title_padding_right_number,description_scroll,description_font_family,description_font_size_number,description_line_height_number,description_font_weight,description_text_transform,description_text_align,description_border_height,description_border_color,description_border_hover_color,description_font_color,description_text_hover_color,description_font_background_color,description_background_hover_color,description_padding_left_number,description_padding_right_number,description_padding_top_number,description_padding_bottom_number,description_margin_bottom,activate_default_category,selected_category_template,category_per_row,category_01_title_font_family,category_01_title_font_size_number_number,category_01_title_line_height_number,category_01_title_font_weight,category_01_title_color,category_01_title_hover_color,category_01_title_background_hover_color,category_01_border_size_number,category_01_border_color,category_01_icon_font_size_number,category_01_icon_color,category_icon_hover_color,category_01_description_font_family,category_01_description_font_size_number_number,category_01_description_line_height_number_number,category_01_description_font_weight,category_01_description_color,category_01_description_hover_color,category_02_title_font_size_number,category_02_title_color,category_02_title_hover_color,category_02_title_background_color,category_02_title_background_hover_color,category_02_height,category_02_icon_font_size,category_02_icon_height,category_02_First_icon_color,category_02_First_icon_backgrond_color,category_02_Second_icon_color,category_02_Second_icon_backgrond_color,category_02_third_icon_color,category_02_third_icon_backgrond_color,category_02_Fourth_icon_color,category_02_Fourth_icon_backgrond_color,category_03_title_font_size_number,category_03_title_color,category_03_title_hover_color,category_03_title_padding_size,category_03_title_background_hover_color,category_03_height,category_03_icon_font_size,category_03_icon_circle_size,category_03_icon_color,category_03_icon_hover_color,category_03_icon_backgrond_color,category_03_icon_backgrond_hover_color,place_holder_text,searce_font_family,search_font_size_number,search_box_height_number,search_width,search_box_align,search_icon_size_number,search_icon_color,search_icon_hover_color,search_background_color,search_border_width_number,search_border_radious_number,search_border_color,template_button,button_font_color,button_font_family,button_font_size_number,button_font_weight,button_text_transform,button_height_number,button_width_number,button_align,button_background_color,button_background_hover_color,button_border_width,button_border_radius_number,button_border_color,button_border_hover_color,button_margin_top_number,button_margin_bottom_number,custom_css,update_style_change!!##!!/wordpress/wp-admin/admin.php?page=afaq-6310-faq-01-10&styleid=5||##||5||##||0.5||##||1||##||1||##||50||##||25||##||rgb(255, 255, 255)||##||rgb(255, 255, 255)||##||rgb(0, 17, 71)||##||rgb(0, 17, 71)||##||55||##||30||##||rgb(255, 255, 255)||##||rgb(255, 255, 255)||##||rgb(0, 17, 71)||##||rgb(0, 17, 71)||##||22||##||rgb(5, 5, 5)||##||rgb(250, 250, 250)||##||rgb(179, 72, 72)||##||rgb(128, 23, 23)||##||1||##||rgb(255, 255, 255)||##||Arimo||##||16||##||300||##||none||##||flex-start||##||15||##||15||##||10||##||5||##||150||##||Arimo||##||14||##||20||##||400||##||none||##||left||##||1||##||rgb(0, 17, 71)||##||rgb(0, 17, 71)||##||rgb(41, 34, 34)||##||rgb(41, 34, 34)||##||rgba(255, 255, 255, 0.99)||##||rgba(255, 255, 255, 0.66)||##||10||##||10||##||10||##||10||##||5||##||1||##||||##||2||##||Roboto||##||20||##||20||##||900||##||rgb(0, 0, 0)||##||rgb(0, 0, 0)||##||rgba(240, 240, 240, 0.91)||##||1||##||rgb(135, 135, 135)||##||40||##||rgb(0, 17, 71)||##||rgb(9, 42, 150)||##||Ubuntu||##||13||##||20||##||500||##||rgb(135, 135, 135)||##||rgb(79, 104, 112)||##||13||##||#dbf0e4||##||#dbf0e4||##||#ededed||##||#ededed||##||40||##||35||##||70||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#228a8e||##||#00b4b3||##||#228a8e||##||13||##||#dbf0e4||##||#eef0e4||##||10||##||#ededed||##||2||##||25||##||50||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||Enter Keywords eg: Foods, Blog...||##||Ubuntu||##||14||##||30||##||35||##||flex-end||##||14||##||rgb(0, 17, 71)||##||rgb(9, 42, 150)||##||rgb(255, 255, 255)||##||1||##||0||##||rgb(0, 17, 71)||##||1||##||rgb(255, 255, 255)||##||Ubuntu||##||14||##||100||##||capitalize||##||30||##||100||##||right||##||rgb(128, 23, 23)||##||rgb(179, 72, 72)||##||1px||##||0||##||rgb(179, 72, 72)||##||rgb(128, 23, 23)||##||10||##||0||##||||##||Save";
    } else if ($style_name == 'template-07') {
      $css = "_wp_http_referer,id,animation_duration,afaq_faq_mode,icon_show_hide,head_icon_width_number,head_icon_font_size_number,title_icon_color,icon_hover_color,icon_background_color,icon_background_hover_color,angle_width_number,angle_from_left_number,title_active_icon,title_inactive_icon,indicator_width_number,indicator_font_size_number,indicator_color,indicator_hover_color,indicator_background_color,indicator_background_hover_color,title_line_height_number,title_font_color,title_text_hover_color,title_bg_color,title_bg_hover_color,top_border_height_number,title_border_top_color,title_font_family,title_font_size_number,title_font_weight,title_text_transform,title_text_align,title_padding_top_number,title_padding_bottom_number,title_padding_left_number,title_padding_right_number,description_scroll,description_font_family,description_font_size_number,description_line_height_number,description_font_weight,description_text_transform,description_text_align,description_font_color,description_text_hover_color,description_font_background_color,description_background_hover_color,description_padding_left_number,description_padding_right_number,description_padding_top_number,description_padding_bottom_number,description_margin_bottom,activate_default_category,selected_category_template,category_per_row,category_01_title_font_family,category_01_title_font_size_number_number,category_01_title_line_height_number,category_01_title_font_weight,category_01_title_color,category_01_title_hover_color,category_01_title_background_hover_color,category_01_border_size_number,category_01_border_color,category_01_icon_font_size_number,category_01_icon_color,category_icon_hover_color,category_01_description_font_family,category_01_description_font_size_number_number,category_01_description_line_height_number_number,category_01_description_font_weight,category_01_description_color,category_01_description_hover_color,category_02_title_font_size_number,category_02_title_color,category_02_title_hover_color,category_02_title_background_color,category_02_title_background_hover_color,category_02_height,category_02_icon_font_size,category_02_icon_height,category_02_First_icon_color,category_02_First_icon_backgrond_color,category_02_Second_icon_color,category_02_Second_icon_backgrond_color,category_02_third_icon_color,category_02_third_icon_backgrond_color,category_02_Fourth_icon_color,category_02_Fourth_icon_backgrond_color,category_03_title_font_size_number,category_03_title_color,category_03_title_hover_color,category_03_title_padding_size,category_03_title_background_hover_color,category_03_height,category_03_icon_font_size,category_03_icon_circle_size,category_03_icon_color,category_03_icon_hover_color,category_03_icon_backgrond_color,category_03_icon_backgrond_hover_color,place_holder_text,searce_font_family,search_font_size_number,search_box_height_number,search_width,search_box_align,search_icon_size_number,search_icon_color,search_icon_hover_color,search_background_color,search_border_width_number,search_border_radious_number,search_border_color,template_button,button_font_color,button_font_family,button_font_size_number,button_font_weight,button_text_transform,button_height_number,button_width_number,button_align,button_background_color,button_background_hover_color,button_border_width,button_border_radius_number,button_border_color,button_border_hover_color,button_margin_top_number,button_margin_bottom_number,custom_css,update_style_change!!##!!/wordpress/wp-admin/admin.php?page=afaq-6310-faq-01-10&styleid=6||##||6||##||0.5||##||1||##||1||##||50||##||20||##||rgb(237, 237, 237)||##||rgb(255, 255, 255)||##||rgb(11, 81, 117)||##||rgb(11, 81, 117)||##||20||##||40||##||fas fa-folder-minus||##||fas fa-folder-plus||##||50||##||20||##||rgb(250, 250, 250)||##||rgb(245, 245, 245)||##||rgb(11, 81, 117)||##||rgb(35, 98, 130)||##||22||##||rgb(255, 255, 255)||##||rgb(255, 255, 255)||##||rgba(84, 133, 158, 0.98)||##||rgba(59, 115, 144, 0.98)||##||1||##||rgb(255, 255, 255)||##||Arimo||##||16||##||300||##||uppercase||##||flex-start||##||15||##||15||##||26||##||5||##||150||##||Arimo||##||14||##||20||##||400||##||capitalize||##||left||##||rgb(23, 17, 17)||##||rgb(23, 17, 17)||##||rgba(252, 252, 252, 1)||##||rgba(252, 252, 252, 1)||##||10||##||10||##||10||##||10||##||0||##||1||##||||##||2||##||Roboto||##||20||##||20||##||700||##||rgb(26, 26, 26)||##||rgb(41, 39, 39)||##||rgba(240, 240, 240, 0.91)||##||1||##||rgb(140, 140, 140)||##||40||##||rgb(11, 81, 117)||##||rgb(35, 98, 130)||##||Ubuntu||##||13||##||20||##||500||##||#8a8a8a||##||#4f676e||##||13||##||#dbf0e4||##||#dbf0e4||##||#ededed||##||#ededed||##||40||##||35||##||70||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#228a8e||##||#00b4b3||##||#228a8e||##||13||##||#dbf0e4||##||#eef0e4||##||10||##||#ededed||##||2||##||25||##||50||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||Enter Keywords eg: Foods, Blog...||##||Ubuntu||##||14||##||30||##||35||##||flex-end||##||14||##||rgb(59, 115, 144)||##||rgb(59, 115, 144)||##||rgb(255, 255, 255)||##||1||##||20||##||rgb(59, 115, 144)||##||1||##||rgb(255, 255, 255)||##||Ubuntu||##||14||##||100||##||capitalize||##||30||##||100||##||right||##||rgba(84, 133, 158, 0.98)||##||rgba(59, 115, 144, 0.98)||##||1px||##||40||##||rgb(84, 133, 158)||##||rgb(59, 115, 144)||##||10||##||0||##||||##||Save";
    } else if ($style_name == 'template-08') {
      $css = "_wp_http_referer,id,animation_duration,afaq_faq_mode,icon_show_hide,head_icon_width_number,head_icon_font_size_number,title_icon_color,icon_hover_color,icon_background_color,icon_background_hover_color,title_active_icon,title_inactive_icon,indicator_width_number,indicator_font_size_number,indicator_color,indicator_hover_color,indicator_background_color,indicator_background_hover_color,title_line_height_number,title_font_color,title_text_hover_color,title_bg_color,title_bg_hover_color,title_empty_space,top_border_height_number,title_border_top_color,title_font_family,title_font_size_number,title_font_weight,title_text_transform,title_text_align,title_padding_top_number,title_padding_bottom_number,title_padding_left_number,title_padding_right_number,description_scroll,description_font_family,description_font_size_number,description_line_height_number,description_font_weight,description_text_transform,description_text_align,description_font_color,description_text_hover_color,description_font_background_color,description_background_hover_color,description_padding_left_number,description_padding_right_number,description_padding_top_number,description_padding_bottom_number,description_margin_bottom,activate_default_category,selected_category_template,category_per_row,category_01_title_font_family,category_01_title_font_size_number_number,category_01_title_line_height_number,category_01_title_font_weight,category_01_title_color,category_01_title_hover_color,category_01_title_background_hover_color,category_01_border_size_number,category_01_border_color,category_01_icon_font_size_number,category_01_icon_color,category_icon_hover_color,category_01_description_font_family,category_01_description_font_size_number_number,category_01_description_line_height_number_number,category_01_description_font_weight,category_01_description_color,category_01_description_hover_color,category_02_title_font_size_number,category_02_title_color,category_02_title_hover_color,category_02_title_background_color,category_02_title_background_hover_color,category_02_height,category_02_icon_font_size,category_02_icon_height,category_02_First_icon_color,category_02_First_icon_backgrond_color,category_02_Second_icon_color,category_02_Second_icon_backgrond_color,category_02_third_icon_color,category_02_third_icon_backgrond_color,category_02_Fourth_icon_color,category_02_Fourth_icon_backgrond_color,category_03_title_font_size_number,category_03_title_color,category_03_title_hover_color,category_03_title_padding_size,category_03_title_background_hover_color,category_03_height,category_03_icon_font_size,category_03_icon_circle_size,category_03_icon_color,category_03_icon_hover_color,category_03_icon_backgrond_color,category_03_icon_backgrond_hover_color,place_holder_text,searce_font_family,search_font_size_number,search_box_height_number,search_width,search_box_align,search_icon_size_number,search_icon_color,search_icon_hover_color,search_background_color,search_border_width_number,search_border_radious_number,search_border_color,template_button,button_font_color,button_font_family,button_font_size_number,button_font_weight,button_text_transform,button_height_number,button_width_number,button_align,button_background_color,button_background_hover_color,button_border_width,button_border_radius_number,button_border_color,button_border_hover_color,button_margin_top_number,button_margin_bottom_number,custom_css,update_style_change!!##!!/wordpress/wp-admin/admin.php?page=afaq-6310-faq-01-10&styleid=7||##||7||##||0.5||##||1||##||1||##||50||##||20||##||rgb(255, 255, 255)||##||rgb(255, 255, 255)||##||rgb(255, 123, 84)||##||rgb(217, 84, 43)||##||fas fa-angle-up||##||fas fa-angle-double-down||##||50||##||20||##||rgb(255, 255, 255)||##||rgb(255, 255, 255)||##||rgb(255, 123, 84)||##||rgb(217, 84, 43)||##||22||##||rgb(255, 255, 255)||##||rgb(41, 38, 38)||##||rgb(163, 173, 104)||##||rgb(147, 155, 98)||##||1||##||2||##||rgb(255, 255, 255)||##||Arimo||##||16||##||300||##||none||##||flex-start||##||15||##||15||##||10||##||5||##||150||##||Arimo||##||16||##||20||##||100||##||none||##||left||##||rgb(48, 43, 43)||##||rgb(48, 43, 43)||##||rgba(232, 227, 227, 0.98)||##||rgba(232, 227, 227, 0.98)||##||10||##||10||##||10||##||10||##||10||##||1||##||||##||2||##||Ubuntu||##||20||##||20||##||700||##||rgb(0, 0, 0)||##||rgb(0, 0, 0)||##||rgba(240, 240, 240, 0.91)||##||1||##||rgb(140, 140, 140)||##||40||##||rgb(255, 123, 84)||##||rgb(217, 84, 43)||##||Open+Sans:600||##||13||##||20||##||400||##||#8a8a8a||##||#4f676e||##||13||##||#dbf0e4||##||#dbf0e4||##||#ededed||##||#ededed||##||40||##||35||##||70||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#228a8e||##||#00b4b3||##||#228a8e||##||13||##||#dbf0e4||##||#eef0e4||##||10||##||#ededed||##||2||##||25||##||50||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||Enter Keywords eg: Foods, Blog...||##||Open+Sans||##||14||##||30||##||35||##||flex-end||##||12||##||rgb(255, 123, 84)||##||rgb(217, 84, 43)||##||rgb(255, 255, 255)||##||1||##||20||##||rgb(217, 84, 43)||##||1||##||rgb(255, 255, 255)||##||Open+Sans:600||##||14||##||100||##||capitalize||##||30||##||100||##||right||##||rgba(255, 123, 84, 0.96)||##||rgb(217, 84, 43)||##||1px||##||40||##||rgb(194, 128, 128)||##||rgb(237, 90, 90)||##||10||##||0||##||||##||Save";
    } else if ($style_name == 'template-09') {
      $css = "_wp_http_referer,id,animation_duration,afaq_faq_mode,icon_show_hide,head_icon_width_number,head_icon_font_size_number,title_icon_color,icon_hover_color,icon_background_color,icon_background_hover_color,title_active_icon,title_inactive_icon,indicator_width_number,indicator_font_size_number,indicator_color,indicator_hover_color,indicator_background_color,indicator_background_hover_color,title_font_family,title_font_size_number,title_font_weight,title_line_height_number,title_font_color,title_text_hover_color,title_bg_color,title_bg_hover_color,title_empty_space,title_text_transform,title_text_align,top_border_height_number,title_border_top_color,title_padding_top_number,title_padding_bottom_number,title_padding_left_number,title_padding_right_number,description_scroll,description_font_family,description_font_size_number,description_line_height_number,description_font_weight,description_text_transform,description_text_align,description_border_color,description_border_hover_color,description_font_color,description_text_hover_color,description_font_background_color,description_background_hover_color,description_margin_bottom,description_padding_left_number,description_padding_right_number,description_padding_top_number,description_padding_bottom_number,description_border_height,activate_default_category,selected_category_template,category_per_row,category_01_title_font_family,category_01_title_font_size_number_number,category_01_title_line_height_number,category_01_title_font_weight,category_01_title_color,category_01_title_hover_color,category_01_title_background_hover_color,category_01_border_size_number,category_01_border_color,category_01_icon_font_size_number,category_01_icon_color,category_icon_hover_color,category_01_description_font_family,category_01_description_font_size_number_number,category_01_description_line_height_number_number,category_01_description_font_weight,category_01_description_color,category_01_description_hover_color,category_02_title_font_size_number,category_02_title_color,category_02_title_hover_color,category_02_title_background_color,category_02_title_background_hover_color,category_02_height,category_02_icon_font_size,category_02_icon_height,category_02_First_icon_color,category_02_First_icon_backgrond_color,category_02_Second_icon_color,category_02_Second_icon_backgrond_color,category_02_third_icon_color,category_02_third_icon_backgrond_color,category_02_Fourth_icon_color,category_02_Fourth_icon_backgrond_color,category_03_title_font_size_number,category_03_title_color,category_03_title_hover_color,category_03_title_padding_size,category_03_title_background_hover_color,category_03_height,category_03_icon_font_size,category_03_icon_circle_size,category_03_icon_color,category_03_icon_hover_color,category_03_icon_backgrond_color,category_03_icon_backgrond_hover_color,place_holder_text,searce_font_family,search_font_size_number,search_box_height_number,search_width,search_box_align,search_icon_size_number,search_icon_color,search_icon_hover_color,search_background_color,search_border_width_number,search_border_radious_number,search_border_color,template_button,button_font_color,button_font_family,button_font_size_number,button_font_weight,button_text_transform,button_height_number,button_width_number,button_align,button_background_color,button_background_hover_color,button_border_width,button_border_radius_number,button_border_color,button_border_hover_color,button_margin_top_number,button_margin_bottom_number,custom_css,update_style_change!!##!!/wordpress/wp-admin/admin.php?page=afaq-6310-faq-01-10&styleid=8||##||8||##||0.5||##||1||##||1||##||69||##||20||##||rgb(255, 255, 255)||##||rgb(255, 255, 255)||##||rgb(12, 49, 92)||##||rgb(13, 51, 93)||##||fas fa-angle-up||##||fas fa-angle-down||##||50||##||15||##||rgb(255, 255, 255)||##||rgb(255, 255, 255)||##||rgb(13, 51, 93)||##||rgb(13, 51, 93)||##||Arimo||##||20||##||300||##||24||##||rgb(255, 255, 255)||##||rgb(255, 255, 255)||##||rgb(25, 78, 138)||##||rgb(26, 80, 139)||##||2||##||none||##||flex-start||##||1||##||rgb(255, 255, 255)||##||10||##||10||##||10||##||10||##||150||##||Open+Sans:300||##||14||##||20||##||500||##||capitalize||##||left||##||rgb(25, 78, 138)||##||rgb(25, 78, 138)||##||rgb(56, 51, 51)||##||rgb(56, 51, 51)||##||rgba(231, 227, 232, 1)||##||rgba(231, 227, 232, 1)||##||10||##||10||##||10||##||10||##||10||##||1||##||1||##||||##||2||##||Ubuntu||##||20||##||20||##||700||##||rgb(38, 40, 41)||##||rgb(0, 0, 0)||##||rgb(237, 237, 237)||##||0||##||rgb(235, 235, 235)||##||40||##||rgb(13, 51, 93)||##||rgb(26, 80, 139)||##||Open+Sans:300||##||13||##||20||##||400||##||rgb(138, 138, 138)||##||rgb(75, 99, 107)||##||13||##||#dbf0e4||##||#dbf0e4||##||#ededed||##||#ededed||##||40||##||35||##||70||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#228a8e||##||#00b4b3||##||#228a8e||##||13||##||#dbf0e4||##||#eef0e4||##||10||##||#ededed||##||2||##||25||##||50||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||Enter Keywords eg: Foods, Blog...||##||Open+Sans:300||##||14||##||30||##||35||##||flex-end||##||14||##||rgb(12, 49, 92)||##||rgb(26, 80, 139)||##||rgb(255, 255, 255)||##||1||##||0||##||rgb(12, 49, 92)||##||1||##||rgb(255, 255, 255)||##||Open+Sans||##||14||##||300||##||capitalize||##||30||##||100||##||right||##||rgb(25, 78, 138)||##||rgb(12, 49, 92)||##||1px||##||0||##||rgb(25, 78, 138)||##||rgb(12, 49, 92)||##||10||##||10||##||||##||Save";
    } else if ($style_name == 'template-10') {
      $css = "_wp_http_referer,id,animation_duration,afaq_faq_mode,icon_show_hide,head_icon_width_number,head_icon_font_size_number,title_icon_color,icon_hover_color,title_active_icon,title_inactive_icon,indicator_width_number,indicator_font_size_number,indicator_color,indicator_hover_color,title_line_height_number,title_font_size_number,title_font_color,title_text_hover_color,title_bg_color,title_bg_hover_color,top_border_height_number,title_border_top_color,title_font_family,title_font_weight,title_text_transform,title_text_align,title_padding_top_number,title_padding_bottom_number,title_padding_left_number,title_padding_right_number,description_scroll,description_font_family,description_font_size_number,description_line_height_number,description_font_weight,description_text_transform,description_text_align,description_margin_top,description_font_color,description_text_hover_color,description_font_background_color,description_background_hover_color,description_padding_left_number,description_padding_right_number,description_padding_top_number,description_padding_bottom_number,description_margin_bottom,activate_default_category,selected_category_template,category_per_row,category_01_title_font_family,category_01_title_font_size_number_number,category_01_title_line_height_number,category_01_title_font_weight,category_01_title_color,category_01_title_hover_color,category_01_title_background_hover_color,category_01_border_size_number,category_01_border_color,category_01_icon_font_size_number,category_01_icon_color,category_icon_hover_color,category_01_description_font_family,category_01_description_font_size_number_number,category_01_description_line_height_number_number,category_01_description_font_weight,category_01_description_color,category_01_description_hover_color,category_02_title_font_size_number,category_02_title_color,category_02_title_hover_color,category_02_title_background_color,category_02_title_background_hover_color,category_02_height,category_02_icon_font_size,category_02_icon_height,category_02_First_icon_color,category_02_First_icon_backgrond_color,category_02_Second_icon_color,category_02_Second_icon_backgrond_color,category_02_third_icon_color,category_02_third_icon_backgrond_color,category_02_Fourth_icon_color,category_02_Fourth_icon_backgrond_color,category_03_title_font_size_number,category_03_title_color,category_03_title_hover_color,category_03_title_padding_size,category_03_title_background_hover_color,category_03_height,category_03_icon_font_size,category_03_icon_circle_size,category_03_icon_color,category_03_icon_hover_color,category_03_icon_backgrond_color,category_03_icon_backgrond_hover_color,place_holder_text,searce_font_family,search_font_size_number,search_box_height_number,search_width,search_box_align,search_icon_size_number,search_icon_color,search_icon_hover_color,search_background_color,search_border_width_number,search_border_radious_number,search_border_color,template_button,button_font_color,button_font_family,button_font_size_number,button_font_weight,button_text_transform,button_height_number,button_width_number,button_align,button_background_color,button_background_hover_color,button_border_width,button_border_radius_number,button_border_color,button_border_hover_color,button_margin_top_number,button_margin_bottom_number,custom_css,update_style_change!!##!!/wordpress/wp-admin/admin.php?page=afaq-6310-faq-01-10&styleid=9||##||9||##||0.5||##||1||##||1||##||50||##||20||##||rgb(255, 255, 255)||##||rgb(255, 255, 255)||##||fas fa-terminal||##||fas fa-chevron-right||##||50||##||16||##||rgb(255, 255, 255)||##||rgb(255, 255, 255)||##||22||##||16||##||rgb(245, 245, 245)||##||rgb(255, 255, 255)||##||rgb(255, 70, 70)||##||rgb(255, 133, 133)||##||1||##||rgb(255, 255, 255)||##||Arimo||##||300||##||none||##||flex-start||##||15||##||15||##||10||##||5||##||150||##||Arimo||##||14||##||20||##||400||##||capitalize||##||left||##||10||##||rgb(61, 54, 54)||##||rgb(61, 54, 54)||##||rgba(255, 179, 150, 1)||##||rgba(255, 179, 150, 1)||##||20||##||10||##||10||##||10||##||10||##||1||##||||##||2||##||Cuprum||##||20||##||14||##||600||##||rgb(0, 0, 0)||##||rgb(0, 0, 0)||##||rgba(240, 240, 240, 0.91)||##||1||##||rgb(140, 140, 140)||##||40||##||rgb(255, 70, 70)||##||rgb(235, 87, 87)||##||Roboto||##||13||##||20||##||300||##||rgb(133, 130, 130)||##||rgb(76, 104, 112)||##||13||##||#dbf0e4||##||#dbf0e4||##||#ededed||##||#ededed||##||40||##||35||##||70||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#228a8e||##||#00b4b3||##||#228a8e||##||13||##||#dbf0e4||##||#eef0e4||##||10||##||#ededed||##||2||##||25||##||50||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||#00b4b3||##||Enter Keywords eg: Foods, Blog...||##||Roboto||##||14||##||30||##||35||##||flex-end||##||14||##||rgb(255, 70, 70)||##||rgb(242, 34, 34)||##||rgb(255, 255, 255)||##||1||##||40||##||rgb(255, 70, 70)||##||1||##||rgb(255, 255, 255)||##||Roboto||##||14||##||100||##||capitalize||##||30||##||100||##||right||##||rgba(255, 70, 70, 0.97)||##||rgba(242, 114, 114, 0.97)||##||1px||##||40||##||rgb(242, 114, 114)||##||rgb(255, 70, 70)||##||5||##||0||##||||##||Save";
    }

    $allData = $wpdb->get_results('SELECT * FROM ' . $faq_table . ' ORDER BY title ASC', ARRAY_A);
    if ($allData) {
      foreach ($allData as $value) {
        if ($templateids != '') {
          $templateids .= ',';
        }
        $templateids .= esc_attr( $value['id'] );
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
      $url = admin_url("admin.php?page=afaq-6310-faq-01-10&styleid=$redirect_id");
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
      template1 start
    ****************************************** -->
  <div class="afaq-6310-row afaq-6310-faq-for-elementor-style-boxed">
    <div 
      class="afaq-6310-padding-15 afaq-6310-templates" 
      data-database-id='01'
      data-icon-class='afaq-6310-faq-template-01-head-right-icon'
      data-up-arrow='fas fa-angle-up'
      data-down-arrow='fas fa-angle-down'
    >
      <div class="afaq-6310-template-01">
        <div class="afaq-6310-faq-template-01">
          <div class="afaq-6310-faq-template-01-label-head afaq-6310-faq-template-common-head afaq-6310-active">
            <div class="afaq-6310-faq-template-01-head-left-icon"><i class="fab fa-twitter"></i>
            </div>
            <div class="afaq-6310-faq-template-01-head-title">What is your favorite family vacation?</div>
            <div class="afaq-6310-faq-template-01-head-right-icon"><i class="fas fa-angle-down right-icon"></i></div>
          </div>

          <div class="afaq-6310-faq-template-01-content">        
            <div class="afaq-6310-faq-template-01-content-feature">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed est
              accusamus placeat quas vero dolores quis officia ullam autem nostrum delectus architecto
              sunt magnam, porro magni animi, illum aperiam. Consectetur hic, et sequi facere adipisci
              quisquam repudiandae! Labore deserunt et distinctio dignissimos facere, fuga reprehenderit
              quibusdam ad repudiandae aliquid. Perspiciatis. mm
            </div>
          </div>
        </div>
      </div>
      <div class="afaq-6310-template-01">
        <div class="afaq-6310-faq-template-01">
          <div class="afaq-6310-faq-template-01-label-head afaq-6310-faq-template-common-head">
            <div class="afaq-6310-faq-template-01-head-left-icon"><i class="fab fa-linkedin"></i>
            </div>
            <div class="afaq-6310-faq-template-01-head-title">What is your favorite family vacation?</div>
            <div class="afaq-6310-faq-template-01-head-right-icon"><i class="fas fa-angle-down right-icon"></i></div>
          </div>
          <div class="afaq-6310-faq-template-01-content">
            <div class="afaq-6310-faq-template-01-content-feature">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed est
                accusamus placeat quas vero dolores quis officia ullam autem nostrum delectus architecto
                sunt magnam, porro magni animi, illum aperiam. Consectetur hic, et sequi facere adipisci
                quisquam repudiandae! Labore deserunt et distinctio dignissimos facere, fuga reprehenderit
                quibusdam ad repudiandae aliquid. Perspiciatis. mm
            </div>
          </div>
        </div>
      </div>
      <div class="afaq-6310-template-01">
        <div class="afaq-6310-faq-template-01">
          <div class="afaq-6310-faq-template-01-label-head afaq-6310-faq-template-common-head">
            <div class="afaq-6310-faq-template-01-head-left-icon"><i class="fab fa-instagram"></i>
            </div>
            <div class="afaq-6310-faq-template-01-head-title">What is your favorite family vacation?</div>
            <div class="afaq-6310-faq-template-01-head-right-icon"><i class="fas fa-angle-down right-icon"></i></div>
          </div>
          <div class="afaq-6310-faq-template-01-content">
            <div class="afaq-6310-faq-template-01-content-feature">
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
      Template 01
      <button type="button" class="afaq-6310-btn-success afaq_6310_choosen_style" id="template-01">Create Template</button>
    </div>
    <br class="afaq-6310-clear" />
  </div>
  <!-- ******************************************
      template1 end
    ****************************************** -->

  <!-- ******************************************
      template 2 start
    ****************************************** -->
  <div class="afaq-6310-row afaq-6310-faq-for-elementor-style-boxed">
    <div 
        class="afaq-6310-padding-15 afaq-6310-templates" 
        data-database-id='02'
        data-icon-class='afaq-6310-faq-template-02-left-icon'
        data-up-arrow='fas fa-minus'
        data-down-arrow='fas fa-plus'
      >
      <div class="afaq-6310-template-02">
        <div class="afaq-6310-faq-template-02">
          <div class="afaq-6310-faq-template-02-label-head afaq-6310-faq-template-common-head afaq-6310-active">
            <div class="afaq-6310-faq-template-02-left-icon"><i class="fas fa-minus"></i></div>
            <div class="afaq-6310-faq-template-02-right-icon"><i class="fas fa-trophy"></i></div>
            <div class="afaq-6310-faq-template-02-head-title">What is your favorite family vacation?</div>
          </div>
          <div class="afaq-6310-faq-template-02-content">
            <div class="afaq-6310-faq-template-02-content-feature">
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Expedita, deserunt. Aspernatur fuga, molestias
              iste obcaecati voluptatem officiis laudantium error quae consequatur accusantium. Tenetur atque nemo
              nostrum placeat aspernatur at, maiores alias reprehenderit sunt sed possimus labore magni numquam optio,
              fuga velit. Neque quasi aliquid, dolor ullam porro quo laboriosam ipsa?
            </div>
          </div>
        </div>
        <div class="afaq-6310-faq-template-02">
          <div class="afaq-6310-faq-template-02-label-head afaq-6310-faq-template-common-head">
            <div class="afaq-6310-faq-template-02-left-icon"><i class="fas fa-plus"></i></div>
            <div class="afaq-6310-faq-template-02-right-icon"><i class="fas fa-briefcase"></i></div>
            <div class="afaq-6310-faq-template-02-head-title">What motivates you to work hard?</div>
          </div>
          <div class="afaq-6310-faq-template-02-content">
            <div class="afaq-6310-faq-template-02-content-feature">
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Expedita, deserunt. Aspernatur fuga, molestias
              iste obcaecati voluptatem officiis laudantium error quae consequatur accusantium. Tenetur atque nemo
              nostrum placeat aspernatur at, maiores alias reprehenderit sunt sed possimus labore magni numquam optio,
              fuga velit. Neque quasi aliquid, dolor ullam porro quo laboriosam ipsa?
            </div>
          </div>
        </div>
        <div class="afaq-6310-faq-template-02">
          <div class="afaq-6310-faq-template-02-label-head afaq-6310-faq-template-common-head">
            <div class="afaq-6310-faq-template-02-left-icon"><i class="fas fa-plus"></i></div>
            <div class="afaq-6310-faq-template-02-right-icon"><i class="fas fa-satellite-dish"></i></div>
            <div class="afaq-6310-faq-template-02-head-title">What is your favorite thing about your career?</div>
          </div>
          <div class="afaq-6310-faq-template-02-content">
            <div class="afaq-6310-faq-template-02-content-feature">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Expedita, deserunt. Aspernatur fuga, molestias
              iste obcaecati voluptatem officiis laudantium error quae consequatur accusantium. Tenetur atque nemo
              nostrum placeat aspernatur at, maiores alias reprehenderit sunt sed possimus labore magni numquam optio,
              fuga velit. Neque quasi aliquid, dolor ullam porro quo laboriosam ipsa?
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="afaq-6310-faq-list">
      Template 02
      <button type="button" class="afaq-6310-btn-success afaq_6310_choosen_style" id="template-02">Create Template</button>
    </div>
    <br class="afaq-6310-clear" />
  </div>

  <!-- ******************************************
      template 2 end
    ****************************************** -->
  <!-- ******************************************
      template 3 start
    ****************************************** -->
  <div class="afaq-6310-row afaq-6310-faq-for-elementor-style-boxed">
  <div 
      class="afaq-6310-padding-15 afaq-6310-templates" 
      data-database-id='03'
      data-icon-class='afaq-6310-faq-template-03-left-icon'
      data-up-arrow='fas fa-angle-up right-icon'
      data-down-arrow='fas fa-angle-down right-icon'
    >   
      <div class="afaq-6310-template-03">
        <div class="afaq-6310-faq-template-03">
          <div class="afaq-6310-faq-template-03-label-head afaq-6310-faq-template-common-head afaq-6310-active">
            <div class="afaq-6310-faq-template-03-left-icon"><i class="fas fa-angle-up right-icon"></i></div>
            <div class="afaq-6310-faq-template-03-head-title">What past project or job have you had that is most like this one and why?</div>
          </div>
          <div class="afaq-6310-faq-template-03-content">
            <div class="afaq-6310-faq-template-03-content-feature">
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Expedita, deserunt. Aspernatur fuga, molestias
              iste obcaecati voluptatem officiis laudantium error quae consequatur accusantium. Tenetur atque nemo </div>
          </div>
        </div>
        <div class="afaq-6310-faq-template-03">
          <div class="afaq-6310-faq-template-03-label-head afaq-6310-faq-template-common-head">
            <div class="afaq-6310-faq-template-03-left-icon"><i class="fas fa-angle-down right-icon"></i></div>
            <div class="afaq-6310-faq-template-03-head-title"> Do you have suggestions to make this project run successfully?</div>
          </div>
          <div class="afaq-6310-faq-template-03-content">
            <div class="afaq-6310-faq-template-03-content-feature">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Expedita, deserunt. Aspernatur fuga, molestias
              iste obcaecati voluptatem officiis laudantium error quae consequatur accusantium. Tenetur atque nemo
            </div>
          </div>
        </div>
        <div class="afaq-6310-faq-template-03">
          <div class="afaq-6310-faq-template-03-label-head afaq-6310-faq-template-common-head">
            <div class="afaq-6310-faq-template-03-left-icon"><i class="fas fa-angle-down right-icon"></i></div>
            <div class="afaq-6310-faq-template-03-head-title">Which part of this project do you think will take the most time?</div>
          </div>
          <div class="afaq-6310-faq-template-03-content">
            <div class="afaq-6310-faq-template-03-content-feature">
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Expedita, deserunt. Aspernatur fuga, molestias
              iste obcaecati voluptatem officiis laudantium error quae consequatur accusantium. Tenetur atque nemo
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="afaq-6310-faq-list">
      Template 03
      <button type="button" class="afaq-6310-btn-success afaq_6310_choosen_style" id="template-03">Create Template</button>
    </div>
    <br class="afaq-6310-clear" />
  </div>

  <!-- ******************************************
      template 3 end
    ****************************************** -->

  <!-- ******************************************
      template 4 start
    ****************************************** -->
    <div class="afaq-6310-row afaq-6310-faq-for-elementor-style-boxed">
      <div 
        class="afaq-6310-padding-15 afaq-6310-templates" 
        data-database-id='04'
        data-icon-class='afaq-6310-faq-template-04-head-right-icon'
        data-up-arrow='fas fa-angle-up'
        data-down-arrow='fas fa-angle-down'
      >
        <div class="afaq-6310-template-04">
          <div class="afaq-6310-faq-template-04">
            <div class="afaq-6310-faq-template-04-label-head afaq-6310-faq-template-common-head afaq-6310-active">
              <div class="afaq-6310-faq-template-04-head-left-icon"><i class="fab fa-twitter"></i>
              </div>
              <div class="afaq-6310-faq-template-04-head-title">What is your favorite family vacation?</div>
              <div class="afaq-6310-faq-template-04-head-right-icon"><i class="fas fa-angle-down right-icon"></i></div>
            </div>

            <div class="afaq-6310-faq-template-04-content">        
              <div class="afaq-6310-faq-template-04-content-feature">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed est
                accusamus placeat quas vero dolores quis officia ullam autem nostrum delectus architecto
                sunt magnam, porro magni animi, illum aperiam. Consectetur hic, et sequi facere adipisci
                quisquam repudiandae! Labore deserunt et distinctio dignissimos facere, fuga reprehenderit
                quibusdam ad repudiandae aliquid. Perspiciatis. mm
              </div>
            </div>
          </div>
        </div>
        <div class="afaq-6310-template-04">
          <div class="afaq-6310-faq-template-04">
            <div class="afaq-6310-faq-template-04-label-head afaq-6310-faq-template-common-head">
              <div class="afaq-6310-faq-template-04-head-left-icon"><i class="fab fa-linkedin"></i>
              </div>
              <div class="afaq-6310-faq-template-04-head-title">What is your favorite family vacation?</div>
              <div class="afaq-6310-faq-template-04-head-right-icon"><i class="fas fa-angle-down right-icon"></i></div>
            </div>
            <div class="afaq-6310-faq-template-04-content">
              <div class="afaq-6310-faq-template-04-content-feature">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed est
                  accusamus placeat quas vero dolores quis officia ullam autem nostrum delectus architecto
                  sunt magnam, porro magni animi, illum aperiam. Consectetur hic, et sequi facere adipisci
                  quisquam repudiandae! Labore deserunt et distinctio dignissimos facere, fuga reprehenderit
                  quibusdam ad repudiandae aliquid. Perspiciatis. mm
              </div>
            </div>
          </div>
        </div>
        <div class="afaq-6310-template-04">
          <div class="afaq-6310-faq-template-04">
            <div class="afaq-6310-faq-template-04-label-head afaq-6310-faq-template-common-head">
              <div class="afaq-6310-faq-template-04-head-left-icon"><i class="fab fa-instagram"></i>
              </div>
              <div class="afaq-6310-faq-template-04-head-title">What is your favorite family vacation?</div>
              <div class="afaq-6310-faq-template-04-head-right-icon"><i class="fas fa-angle-down right-icon"></i></div>
            </div>
            <div class="afaq-6310-faq-template-04-content">
              <div class="afaq-6310-faq-template-04-content-feature">
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
        Template 04
        <button type="button" class="afaq-6310-btn-success afaq_6310_choosen_style" id="template-04">Create Template</button>
      </div>
      <br class="afaq-6310-clear" />
  </div>

  <!-- ******************************************
      template 4 end
    ****************************************** -->

  <!-- ******************************************
      template 5 start
    ****************************************** -->
  <div class="afaq-6310-row afaq-6310-faq-for-elementor-style-boxed">
      <div 
        class="afaq-6310-padding-15 afaq-6310-templates" 
        data-database-id='05'
        data-icon-class='afaq-6310-faq-template-05-left-icon'
        data-up-arrow='fas fa-minus'
        data-down-arrow='fas fa-plus'
      >
      <div class="afaq-6310-template-05">
        <div class="afaq-6310-faq-template-05">
          <div class="afaq-6310-faq-template-05-label-head afaq-6310-faq-template-common-head afaq-6310-active">
            <div class="afaq-6310-faq-template-05-left-icon"><i class="fas fa-minus"></i></div>
            <div class="afaq-6310-faq-template-05-title-left-icon"><i class="fas fa-bell"></i></div>
            <div class="afaq-6310-faq-template-05-head-title">What part of this project most appeals to you?</div>
          </div>
          <div class="afaq-6310-faq-template-05-content afaq-6310-active ">
            <div class="afaq-6310-faq-template-05-content-feature ">
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Expedita, deserunt. Aspernatur fuga, molestias
              iste obcaecati voluptatem officiis laudantium error quae consequatur accusantium. Tenetur atque nemo
              nostrum placeat aspernatur at, maiores alias reprehenderit sunt sed possimus labore magni numquam optio,
              fuga velit. Neque quasi aliquid, dolor ullam porro quo laboriosam ipsa?
            </div>
          </div>
        </div>
        <div class="afaq-6310-faq-template-05">
          <div class="afaq-6310-faq-template-05-label-head afaq-6310-faq-template-common-head">
            <div class="afaq-6310-faq-template-05-left-icon"><i class="fas fa-plus"></i></div>
            <div class="afaq-6310-faq-template-05-title-left-icon"><i class="far fa-user"></i></div>
            <div class="afaq-6310-faq-template-05-head-title">Which part of this project do you think will take the most time?</div>
          </div>
          <div class="afaq-6310-faq-template-05-content">
            <div class="afaq-6310-faq-template-05-content-feature">
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Expedita, deserunt. Aspernatur fuga, molestias
              iste obcaecati voluptatem officiis laudantium error quae consequatur accusantium. Tenetur atque nemo
              nostrum placeat aspernatur at, maiores alias reprehenderit sunt sed possimus labore magni numquam optio,
              fuga velit. Neque quasi aliquid, dolor ullam porro quo laboriosam ipsa?
            </div>
          </div>
        </div>
        <div class="afaq-6310-faq-template-05">
          <div class="afaq-6310-faq-template-05-label-head afaq-6310-faq-template-common-head">
            <div class="afaq-6310-faq-template-05-left-icon"><i class="fas fa-plus"></i></div>
            <div class="afaq-6310-faq-template-05-title-left-icon"><i class="fas fa-umbrella"></i></div>
            <div class="afaq-6310-faq-template-05-head-title">Can you tell me, example landing pages are related to what?</div>
          </div>
          <div class="afaq-6310-faq-template-05-content">
            <div class="afaq-6310-faq-template-05-content-feature">
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Expedita, deserunt. Aspernatur fuga, molestias
              iste obcaecati voluptatem officiis laudantium error quae consequatur accusantium. Tenetur atque nemo
              nostrum placeat aspernatur at, maiores alias reprehenderit sunt sed possimus labore magni numquam optio,
              fuga velit. Neque quasi aliquid, dolor ullam porro quo laboriosam ipsa?
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="afaq-6310-faq-list">
      Template 05
      <button type="button" class="afaq-6310-btn-success afaq_6310_choosen_style" id="template-05">Create Template</button>
      <button type="button" class="afaq-6310-pro-only">Pro Only</button>
    </div>
    <br class="afaq-6310-clear" />
  </div>
  <!-- ******************************************
      template 5 end
    ****************************************** -->
  <!-- ******************************************
      template 6 start
    ****************************************** -->
  <div class="afaq-6310-row afaq-6310-faq-for-elementor-style-boxed">
  <div 
      class="afaq-6310-padding-15 afaq-6310-templates" 
      data-database-id='06'
      data-icon-class='afaq-6310-faq-template-06-head-right-icon'
      data-up-arrow='far fa-minus-square'
      data-down-arrow='far fa-plus-square'
    >
      <div class="afaq-6310-template-06">
        <div class="afaq-6310-faq-template-06">
          <div class="afaq-6310-faq-template-06-label-head afaq-6310-faq-template-common-head afaq-6310-active">
            <div class="afaq-6310-faq-template-06-head-left-icon"><i class="far fa-user"></i></div>
            <div class="afaq-6310-faq-template-06-head-title">What part of this project most appeals to you?</div>
            <div class="afaq-6310-faq-template-06-head-right-icon"><i class="far fa-minus-square"></i></div>

          </div>
          <div class="afaq-6310-faq-template-06-content">
            <div class="afaq-6310-faq-template-06-content-feature">
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Expedita, deserunt. Aspernatur fuga, molestias
              iste obcaecati voluptatem officiis laudantium error quae consequatur accusantium. Tenetur atque nemo
              nostrum placeat aspernatur at, maiores alias reprehenderit sunt sed possimus labore magni numquam optio,
              fuga velit. Neque quasi aliquid, dolor ullam porro quo laboriosam ipsa?
            </div>
          </div>
        </div>
        <div class="afaq-6310-faq-template-06">
          <div class="afaq-6310-faq-template-06-label-head afaq-6310-faq-template-common-head">
            <div class="afaq-6310-faq-template-06-head-left-icon"><i class="fas fa-umbrella"></i></div>
            <div class="afaq-6310-faq-template-06-head-title">What part of this project most appeals to you?</div>
            <div class="afaq-6310-faq-template-06-head-right-icon"><i class="far fa-plus-square"></i></div>

          </div>
          <div class="afaq-6310-faq-template-06-content">
            <div class="afaq-6310-faq-template-06-content-feature">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Expedita, deserunt. Aspernatur fuga, molestias
              iste obcaecati voluptatem officiis laudantium error quae consequatur accusantium. Tenetur atque nemo
              nostrum placeat aspernatur at, maiores alias reprehenderit sunt sed possimus labore magni numquam optio,
              fuga velit. Neque quasi aliquid, dolor ullam porro quo laboriosam ipsa?
            </div>
          </div>
        </div>
        <div class="afaq-6310-faq-template-06">
          <div class="afaq-6310-faq-template-06-label-head afaq-6310-faq-template-common-head">
            <div class="afaq-6310-faq-template-06-head-left-icon"><i class="fas fa-gem "></i></div>
            <div class="afaq-6310-faq-template-06-head-title">What part of this project most appeals to you?</div>
            <div class="afaq-6310-faq-template-06-head-right-icon"><i class="far fa-plus-square"></i></div>

          </div>
          <div class="afaq-6310-faq-template-06-content">
            <div class="afaq-6310-faq-template-06-content-feature">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Expedita, deserunt. Aspernatur fuga, molestias
              iste obcaecati voluptatem officiis laudantium error quae consequatur accusantium. Tenetur atque nemo
              nostrum placeat aspernatur at, maiores alias reprehenderit sunt sed possimus labore magni numquam optio,
              fuga velit. Neque quasi aliquid, dolor ullam porro quo laboriosam ipsa?
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="afaq-6310-faq-list">
      Template 06
      <button type="button" class="afaq-6310-btn-success afaq_6310_choosen_style" id="template-06">Create Template</button>
      <button type="button" class="afaq-6310-pro-only">Pro Only</button>
    </div>
    <br class="afaq-6310-clear" />
  </div>
  <!-- ******************************************
      template 6 end
    ****************************************** -->

  <!-- ******************************************
      template 7 start
    ****************************************** -->
  <div class="afaq-6310-row afaq-6310-faq-for-elementor-style-boxed">
  <div 
      class="afaq-6310-padding-15 afaq-6310-templates" 
      data-database-id='07'
      data-icon-class='afaq-6310-faq-template-07-right-icon'
      data-up-arrow='fas fa-minus'
      data-down-arrow='fas fa-plus'
    >
      <div class="afaq-6310-template-07">
        <div class="afaq-6310-faq-template-07">
          <div class="afaq-6310-faq-template-07-label-head afaq-6310-faq-template-common-head afaq-6310-active">
            <div class="afaq-6310-faq-template-07-left-icon"><i class="fas fa-trophy"></i></div>
            <div class="afaq-6310-faq-template-07-head-title">What part of this project most appeals to you?</div>
            <div class="afaq-6310-faq-template-07-right-icon"><i class="fas fa-minus"></i></div>
          </div>
          <div class="afaq-6310-faq-template-07-content">
            <div class="afaq-6310-faq-template-07-content-feature">
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Expedita, deserunt. Aspernatur
              fuga, molestias
              iste obcaecati voluptatem officiis laudantium error quae consequatur accusantium. Tenetur
              atque nemo
              nostrum placeat aspernatur at, maiores alias reprehenderit sunt sed possimus labore magni
              numquam optio,
              fuga velit. Neque quasi aliquid, dolor ullam porro quo laboriosam ipsa?
            </div>
          </div>
        </div>
        <div class="afaq-6310-faq-template-07">
          <div class="afaq-6310-faq-template-07-label-head afaq-6310-faq-template-common-head ">
            <div class="afaq-6310-faq-template-07-left-icon"><i class="fab fa-artstation"></i></div>
            <div class="afaq-6310-faq-template-07-head-title">What part of this project most appeals to you?</div>
            <div class="afaq-6310-faq-template-07-right-icon"><i class="fas fa-plus"></i></div>
          </div>
          <div class="afaq-6310-faq-template-07-content">
            <div class="afaq-6310-faq-template-07-content-feature">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Expedita, deserunt. Aspernatur
              fuga, molestias
              iste obcaecati voluptatem officiis laudantium error quae consequatur accusantium. Tenetur
              atque nemo
              nostrum placeat aspernatur at, maiores alias reprehenderit sunt sed possimus labore magni
              numquam optio,
              fuga velit. Neque quasi aliquid, dolor ullam porro quo laboriosam ipsa?
            </div>
          </div>
        </div>
        <div class="afaq-6310-faq-template-07">
          <div class="afaq-6310-faq-template-07-label-head afaq-6310-faq-template-common-head ">
            <div class="afaq-6310-faq-template-07-left-icon"><i class="fas fa-umbrella"></i></div>
            <div class="afaq-6310-faq-template-07-head-title">What part of this project most appeals to you?</div>
            <div class="afaq-6310-faq-template-07-right-icon"><i class="fas fa-plus"></i></div>
          </div>
          <div class="afaq-6310-faq-template-07-content">
            <div class="afaq-6310-faq-template-07-content-feature">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Expedita, deserunt. Aspernatur
              fuga, molestias
              iste obcaecati voluptatem officiis laudantium error quae consequatur accusantium. Tenetur
              atque nemo
              nostrum placeat aspernatur at, maiores alias reprehenderit sunt sed possimus labore magni
              numquam optio,
              fuga velit. Neque quasi aliquid, dolor ullam porro quo laboriosam ipsa?
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="afaq-6310-faq-list">
      Template 07
      <button type="button" class="afaq-6310-btn-success afaq_6310_choosen_style" id="template-07">Create Template</button>
      <button type="button" class="afaq-6310-pro-only">Pro Only</button>  
    </div>
    <br class="afaq-6310-clear" />
  </div>
  <!-- ******************************************
      template 7 end
    ****************************************** -->
  <!-- ******************************************
      template 8 start
    ****************************************** -->
  <div class="afaq-6310-row afaq-6310-faq-for-elementor-style-boxed">
  <div 
      class="afaq-6310-padding-15 afaq-6310-templates" 
      data-database-id='08'
      data-icon-class='afaq-6310-faq-template-08-right-icon'
      data-up-arrow='fas fa-minus'
      data-down-arrow='fas fa-plus'
    >
      <div class="afaq-6310-template-08">
        <div class="afaq-6310-faq-template-08">
          <div class="afaq-6310-faq-template-08-label-head afaq-6310-faq-template-common-head afaq-6310-active">
            <div class="afaq-6310-faq-template-08-left-icon"><i class="fas fa-umbrella"></i></div>
            <div class="afaq-6310-faq-template-08-head-title">What part of this project most appeals to you?</div>
            <div class="afaq-6310-faq-template-08-right-icon"><i class="fas fa-minus"></i></div>

          </div>
          <div class="afaq-6310-faq-template-08-content">
            <div class="afaq-6310-faq-template-08-content-feature">
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Expedita, deserunt. Aspernatur fuga, molestias
              iste obcaecati voluptatem officiis laudantium error quae consequatur accusantium. Tenetur atque nemo
              nostrum placeat aspernatur at, maiores alias reprehenderit sunt sed possimus labore magni numquam optio,
              fuga velit. Neque quasi aliquid, dolor ullam porro quo laboriosam ipsa?
            </div>
          </div>
        </div>
        <div class="afaq-6310-faq-template-08">
          <div class="afaq-6310-faq-template-08-label-head afaq-6310-faq-template-common-head">
            <div class="afaq-6310-faq-template-08-left-icon"><i class="fas fa-gem"></i></div>
            <div class="afaq-6310-faq-template-08-head-title">What part of this project most appeals to you?</div>
            <div class="afaq-6310-faq-template-08-right-icon"><i class="fas fa-plus"></i></div>

          </div>
          <div class="afaq-6310-faq-template-08-content">
            <div class="afaq-6310-faq-template-08-content-feature">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Expedita, deserunt. Aspernatur fuga, molestias
              iste obcaecati voluptatem officiis laudantium error quae consequatur accusantium. Tenetur atque nemo
              nostrum placeat aspernatur at, maiores alias reprehenderit sunt sed possimus labore magni numquam optio,
              fuga velit. Neque quasi aliquid, dolor ullam porro quo laboriosam ipsa?
            </div>
          </div>
        </div>
        <div class="afaq-6310-faq-template-08">
          <div class="afaq-6310-faq-template-08-label-head afaq-6310-faq-template-common-head">
            <div class="afaq-6310-faq-template-08-left-icon"><i class="fas fa-hourglass-end"></i></div>
            <div class="afaq-6310-faq-template-08-head-title">What part of this project most appeals to you?</div>
            <div class="afaq-6310-faq-template-08-right-icon"><i class="fas fa-plus"></i></div>

          </div>
          <div class="afaq-6310-faq-template-08-content">
            <div class="afaq-6310-faq-template-08-content-feature">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Expedita, deserunt. Aspernatur fuga, molestias
              iste obcaecati voluptatem officiis laudantium error quae consequatur accusantium. Tenetur atque nemo
              nostrum placeat aspernatur at, maiores alias reprehenderit sunt sed possimus labore magni numquam optio,
              fuga velit. Neque quasi aliquid, dolor ullam porro quo laboriosam ipsa?
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="afaq-6310-faq-list">
      Template 08
      <button type="button" class="afaq-6310-btn-success afaq_6310_choosen_style" id="template-08">Create Template</button>
      <button type="button" class="afaq-6310-pro-only">Pro Only</button>
    </div>
    <br class="afaq-6310-clear" />
  </div>
  <!-- ******************************************
      template 8 end
    ****************************************** -->
  <!-- ******************************************
      template 9 start
    ****************************************** -->
    <div class="afaq-6310-row afaq-6310-faq-for-elementor-style-boxed">
    <div 
      class="afaq-6310-padding-15 afaq-6310-templates" 
      data-database-id='09'
      data-icon-class='afaq-6310-faq-template-09-head-title-icon-section'
      data-up-arrow='fas fa-angle-up right-icon'
      data-down-arrow='fas fa-angle-down right-icon'
    >
      <div class="afaq-6310-template-09">
        <div class="afaq-6310-faq-template-09">
          <div class="afaq-6310-faq-template-09-label-head afaq-6310-faq-template-common-head afaq-6310-active">
            <div class="afaq-6310-faq-template-09-left-icon"><i class="fas fa-trophy"></i></div>
            <div class="afaq-6310-faq-template-09-head-title">
              <div class="afaq-6310-faq-template-09-head-title-section"> What past project or job have you had that is most like this one and why?</div>
              <div class="afaq-6310-faq-template-09-head-title-icon-section"><i class="fas fa-angle-down right-icon"></i></div>              
           </div>
          </div>
          <div class="afaq-6310-faq-template-09-content ">
            <div class="afaq-6310-faq-template-09-content-feature">
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Expedita, deserunt. Aspernatur fuga, molestias
              iste obcaecati voluptatem officiis laudantium error quae consequatur accusantium. Tenetur atque nemo </div>
          </div>
        </div>
        <div class="afaq-6310-faq-template-09">
          <div class="afaq-6310-faq-template-09-label-head afaq-6310-faq-template-common-head">
            <div class="afaq-6310-faq-template-09-left-icon"><i class="fas fa-umbrella"></i></div>
            <div class="afaq-6310-faq-template-09-head-title">
              <div class="afaq-6310-faq-template-09-head-title-section"> What past project or job have you had that is most like this one and why?</div>
              <div class="afaq-6310-faq-template-09-head-title-icon-section"><i class="fas fa-angle-down right-icon"></i></div>              
           </div>
          </div>
          <div class="afaq-6310-faq-template-09-content">
            <div class="afaq-6310-faq-template-09-content-feature">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Expedita, deserunt. Aspernatur fuga, molestias
              iste obcaecati voluptatem officiis laudantium error quae consequatur accusantium. Tenetur atque nemo
            </div>
          </div>
        </div>
        <div class="afaq-6310-faq-template-09">
          <div class="afaq-6310-faq-template-09-label-head afaq-6310-faq-template-common-head">
            <div class="afaq-6310-faq-template-09-left-icon"><i class="fab fa-artstation"></i></div>
            <div class="afaq-6310-faq-template-09-head-title">
              <div class="afaq-6310-faq-template-09-head-title-section"> What past project or job have you had that is most like this one and why?</div>
              <div class="afaq-6310-faq-template-09-head-title-icon-section"><i class="fas fa-angle-down right-icon"></i></div>              
           </div>
          </div>
          <div class="afaq-6310-faq-template-09-content">
            <div class="afaq-6310-faq-template-09-content-feature">
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Expedita, deserunt. Aspernatur fuga, molestias
              iste obcaecati voluptatem officiis laudantium error quae consequatur accusantium. Tenetur atque nemo </div>
          </div>
        </div>
      </div>
    </div>
    <div class="afaq-6310-faq-list">
      Template 09
      <button type="button" class="afaq-6310-btn-success afaq_6310_choosen_style" id="template-09">Create Template</button>
      <button type="button" class="afaq-6310-pro-only">Pro Only</button>
    </div>
    <br class="afaq-6310-clear" />
  </div>
  <!-- ******************************************
      template 9 end
    ****************************************** -->

  <!-- ******************************************
      template 10 start
    ****************************************** -->
  <div class="afaq-6310-row afaq-6310-faq-for-elementor-style-boxed">
  <div 
      class="afaq-6310-padding-15 afaq-6310-templates" 
      data-database-id='10'
      data-icon-class='afaq-6310-faq-template-10-head-right-icon'
      data-up-arrow='fas fa-angle-up right-icon'
      data-down-arrow='fas fa-angle-down right-icon'
    >
      <div class="afaq-6310-template-10">
        <div class="afaq-6310-faq-template-10">
          <div class="afaq-6310-faq-template-10-label-head afaq-6310-faq-template-common-head afaq-6310-active">
            <div class="afaq-6310-faq-template-10-head-left-icon"><i class="fab fa-twitter"></i>
            </div>
            <div class="afaq-6310-faq-template-10-head-title">What part of this project most appeals to you?</div>
            <div class="afaq-6310-faq-template-10-head-right-icon"><i class="fas fa-angle-down right-icon"></i></div>
          </div>

          <div class="afaq-6310-faq-template-10-content">
            <div class="afaq-6310-faq-template-10-content-feature">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed est
              accusamus placeat quas vero dolores quis officia ullam autem nostrum delectus architecto
              sunt magnam, porro magni animi, illum aperiam. Consectetur hic, et sequi facere adipisci
              quisquam repudiandae! Labore deserunt et distinctio dignissimos facere, fuga reprehenderit
              quibusdam ad repudiandae aliquid. Perspiciatis. mm
            </div>
          </div>
        </div>
      </div>
      <div class="afaq-6310-template-10">
        <div class="afaq-6310-faq-template-10">
          <div class="afaq-6310-faq-template-10-label-head afaq-6310-faq-template-common-head">
            <div class="afaq-6310-faq-template-10-head-left-icon"><i class="fab fa-linkedin"></i>
            </div>
            <div class="afaq-6310-faq-template-10-head-title">What part of this project most appeals to you?</div>
            <div class="afaq-6310-faq-template-10-head-right-icon"><i class="fas fa-angle-down right-icon"></i></div>
          </div>
          <div class="afaq-6310-faq-template-10-content">
          <div class="afaq-6310-faq-template-10-content-feature">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed est
              accusamus placeat quas vero dolores quis officia ullam autem nostrum delectus architecto
              sunt magnam, porro magni animi, illum aperiam. Consectetur hic, et sequi facere adipisci
              quisquam repudiandae! Labore deserunt et distinctio dignissimos facere, fuga reprehenderit
              quibusdam ad repudiandae aliquid. Perspiciatis. mm
            </div>
          </div>
        </div>
      </div>
      <div class="afaq-6310-template-10">
        <div class="afaq-6310-faq-template-10">
          <div class="afaq-6310-faq-template-10-label-head afaq-6310-faq-template-common-head">
            <div class="afaq-6310-faq-template-10-head-left-icon"><i class="fab fa-instagram"></i>
            </div>
            <div class="afaq-6310-faq-template-10-head-title">What part of this project most appeals to you?</div>
            <div class="afaq-6310-faq-template-10-head-right-icon"><i class="fas fa-angle-down right-icon"></i></div>
          </div>
          <div class="afaq-6310-faq-template-10-content">
          <div class="afaq-6310-faq-template-10-content-feature">
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
      Template 10
      <button type="button" class="afaq-6310-btn-success afaq_6310_choosen_style" id="template-10">Create Template</button>
      <button type="button" class="afaq-6310-pro-only">Pro Only</button>
    </div>
    <br class="afaq-6310-clear" />
  </div>
  <!-- ******************************************
      template 10 end
    ****************************************** -->
</div>
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
            <td width="150"><label class="afaq-6310-form-label" for="icon_name">Template Name:</label></td>
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