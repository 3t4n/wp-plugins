<?php

/** init actions */
require_once('pages/eplm_p_init.php');
function eplm_init_plugin()
{
    register_activation_hook(eplm_PLUGIN_MAIN_FILE, 'eplm_create_tables');
    register_activation_hook(eplm_PLUGIN_MAIN_FILE, 'eplm_create_template_tables');
    register_uninstall_hook(eplm_PLUGIN_MAIN_FILE, 'eplm_delete_tables');
    add_action('admin_menu', 'eplm_add_menu_pages');
    add_action('admin_enqueue_scripts', 'eplm_admin_scripts');
    add_action('admin_head', 'eplm_admin_head');
    add_action('wp_ajax_eplm_delete_popup', 'eplm_delete_popup');
    add_action('wp_ajax_eplm_setcookie', 'eplm_setcookie');
    add_shortcode('eplm_popup', 'eplm_do_shortcode');
    add_action('wp_footer', 'eplm_create_shortcode_function');
    add_action('eplm_admin_enqueue_scripts', 'eplm_enqueue_color_picker');
    add_filter('mce_buttons_3', 'eplm_editor_options_enable_more_buttons');
    add_filter('tiny_mce_before_init', 'eplm_editor_options_myformatTinyMCE');
    add_filter('plugin_row_meta', 'eplm_row_meta', 10, 4);

    add_action('wp_ajax_update_pop_status', 'update_pop_status_callback');
    add_action('wp_ajax_nopriv_update_pop_status', 'update_pop_status_callback');
}


function eplm_row_meta($meta_fields, $file)
{

    if (strpos($file, 'easy_popup_lightbox_maker.php') == false) {

        return $meta_fields;
    }

    echo "<style>.pluginrows-rate-stars { display: inline-block; color: #ffb900; position: relative; top: 3px; }.pluginrows-rate-stars svg{ fill:#ffb900; } .pluginrows-rate-stars svg:hover{ fill:#ffb900 } .pluginrows-rate-stars svg:hover ~ svg{ fill:none; } </style>";

    $plugin_rate   = "https://wordpress.org/support/plugin/easy-popup-lightbox-maker/reviews/?rate=5#new-post";
    $plugin_filter = "https://wordpress.org/support/plugin/easy-popup-lightbox-maker/reviews/?filter=5";
    $svg_xmlns     = "https://www.w3.org/2000/svg";
    $svg_icon      = '';

    for ($i = 0; $i < 5; $i++) {
        $svg_icon .= "<svg xmlns='" . esc_url($svg_xmlns) . "' width='15' height='15' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-star'><polygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2'/></svg>";
    }

    $meta_fields[] = '<a href="' . esc_url($plugin_filter) . '" target="_blank"><span class="dashicons dashicons-thumbs-up"></span>' . __('Vote!', 'pluginrows') . '</a>';
    $meta_fields[] = "<a href='" . esc_url($plugin_rate) . "' target='_blank' title='" . esc_html__('Rate', 'pluginrows') . "'><i class='pluginrows-rate-stars'>" . $svg_icon . "</i></a>";

    return $meta_fields;
}




function eplm_delete_tables()
{
    global $wpdb;

    $wpdb->query("DROP TABLE {$wpdb->prefix}eplm_popups");

    $wpdb->query("DROP TABLE {$wpdb->prefix}eplm_popups_template");
}
/** menu pages */
function eplm_add_menu_pages()
{
    add_menu_page('All Popups', 'WP Popup Maker', 'manage_options', 'eplm_popups', 'eplm_create_main_page', 'dashicons-format-gallery', '40.258');
    add_submenu_page('eplm_popups', 'Add\Edit Popup', 'Add New', 'manage_options', 'eplm_popups_template', 'eplm_create_template_page');
    add_submenu_page('non_existent_parent', 'Edit Popup', 'Edit Popup', 'manage_options', 'eplm_popups_edit', 'eplm_create_edit_page');
    add_submenu_page('non_existent_parent', 'Save Popup', 'Save Popup', 'manage_options', 'eplm_save', 'eplm_save_popup');
    add_submenu_page('non_existent_parent', 'Add\Edit Popup', 'Add\Edit Popup', 'manage_options', 'eplm_popups_template', 'eplm_create_template_page');
}
/** main pugin page */
function eplm_create_main_page()
{
    if (!current_user_can('administrator')) {
        wp_die(__('You do not have permissions to access this page!', 'eplm_popups'));
    }
    include_once('pages/view_popups.php');
}
//---------------------------------------------------
/** Deletes a slider*/
function eplm_delete_popup()
{
    global $wpdb;
    $pop_id = (isset($_POST['pop_id'])) ? intval($_POST['pop_id']) : 0;
    $wpdb->query("START TRANSACTION");
    $success = ($wpdb->delete($wpdb->prefix . 'eplm_popups', array('pop_id' => $pop_id), array('%d')) > 0);
    if ($success) {
        $success = (false !== $wpdb->delete($wpdb->prefix . 'eplm_popups', array('pop_id' => $pop_id), array('%d')));
    }
    if ($success) {
        $wpdb->query("COMMIT");
        echo '1';
    } else {
        $wpdb->query("ROLLBACK");
        echo '0';
    }
    exit;
}
//---------------------------------------------------
/** database table creation*/
function eplm_create_tables()
{
    global $wpdb;
    $table_name = $wpdb->prefix . "eplm_popups";
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        pop_id int(11) unsigned NOT NULL AUTO_INCREMENT,
        pop_name varchar(200) NOT NULL,
        pop_shcode varchar(200) NOT NULL,
        pop_type varchar(200) NOT NULL,
        template_id int(11) NOT NULL,
        pop_visability_type int(11) NOT NULL,
        pop_visability_type_category int(11) NOT NULL,
        pop_text TEXT NOT NULL,
        pop_yot_url TEXT NOT NULL,
        pop_options TEXT NOT NULL,
        pop_date timestamp  ,
        pop_Siteid int(10),
        blog_id   int(10),
        pop_created_by  varchar(200) NOT NULL,
        pop_status int default '1' NOT NULL ,
        PRIMARY KEY (pop_id)
    ) $charset_collate;";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
function eplm_create_template_tables()
{

    global $wpdb;
    $table_name = $wpdb->prefix . "eplm_popups_template";

    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        temp_id int(11) unsigned NOT NULL AUTO_INCREMENT,
        temp_name varchar(200) NOT NULL,
        temp_options TEXT NOT NULL,
        temp_date timestamp  ,
        temp_status int default '1' NOT NULL ,
        PRIMARY KEY (temp_id)
    ) $charset_collate;";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);

    $notemlate = 'a:113:{s:18:"popup_type_sellect";s:4:"HTML";s:15:"rolbackradioval";s:1:"1";s:16:"popup_theam_type";s:5:"Light";s:9:"dimension";s:10:"responsive";s:34:"popup_responsive_dimension_measure";s:4:"auto";s:12:"di_width_val";i:0;s:16:"di_max_width_val";i:0;s:12:"di_hight_val";i:0;s:16:"di_max_hight_val";i:0;s:10:"title_text";s:1:"q";s:18:"title_posi_sellect";s:4:"Left";s:9:"titlesize";s:4:"17px";s:23:"title_font_color_picker";s:0:"";s:18:"Background_options";s:1:"1";s:12:"color_picker";s:0:"";s:19:"footer_color_picker";s:0:"";s:19:"header_color_picker";s:0:"";s:10:"margin_val";s:3:"0px";s:21:"popup_Opacity_myRange";s:1:"1";s:20:"Opacity_color_picker";s:0:"";s:15:"Opacity_myRange";s:3:"0.5";s:18:"backround_position";s:6:"center";s:14:"pop_back_image";s:0:"";s:20:"Border_Style_sellect";s:4:"none";s:17:"Thickness_myRange";s:1:"1";s:26:"header_Border_color_picker";s:0:"";s:26:"fotter_Border_color_picker";s:0:"";s:25:"slide_Border_color_picker";s:0:"";s:26:"border_shadow_color_picker";s:0:"";s:16:"Bottom_Top_Right";i:0;s:15:"Bottom_Top_Lift";i:0;s:17:"radious_Top_Right";i:0;s:16:"radious_Top_Lift";i:0;s:10:"img_repeat";s:1:"1";s:12:"header_p_top";s:4:"20px";s:15:"header_p_bottom";s:4:"20px";s:14:"header_p_right";s:4:"20px";s:13:"header_p_left";s:4:"20px";s:13:"content_p_top";s:4:"20px";s:16:"content_p_bottom";s:4:"20px";s:15:"content_p_right";s:4:"20px";s:14:"content_p_left";s:4:"20px";s:12:"footer_p_top";s:4:"20px";s:15:"footer_p_bottom";s:4:"20px";s:14:"footer_p_right";s:4:"20px";s:13:"footer_p_left";s:4:"20px";s:14:"Closingsellect";s:5:"Right";s:12:"closebtntext";s:5:"Close";s:28:"btnclose_Shadow_color_picker";s:0:"";s:26:"font_btnclose_color_picker";s:0:"";s:21:"btnclose_color_picker";s:0:"";s:12:"closebtnsize";s:4:"13px";s:15:"close_btn_width";s:5:"100px";s:16:"close_btn_height";s:4:"30px";s:15:"closebtnpadding";s:1:"3";s:30:"close_btn_Border_Style_sellect";s:5:"solid";s:16:"closebtnb_radius";s:1:"0";s:13:"cancelbtntext";s:0:"";s:19:"booton_color_picker";s:0:"";s:16:"closeiconsellect";s:5:"Right";s:17:"Icon_color_picker";s:0:"";s:8:"iconsize";s:2:"30";s:14:"escbtncheckbox";s:1:"1";s:10:"outerclose";s:1:"1";s:11:"closingtime";N;s:10:"post_types";s:1:"1";s:21:"popup_vesability_post";a:1:{i:0;s:4:"post";}s:3:"aaa";s:4:"post";s:6:"aaacat";s:0:"";s:11:"cookioption";s:3:"all";s:7:"loading";s:1:"1";s:11:"loadingtime";s:1:"1";s:4:"bday";i:0;s:4:"eday";i:0;s:15:"usetemplate_y_n";s:1:"0";s:16:"edittemplate_y_n";s:1:"0";s:15:"current_emplate";s:6:"temp_1";s:12:"showclosebtn";i:0;s:14:"showtitlecheck";i:0;s:12:"window_close";i:0;s:13:"showcloseicon";i:0;s:14:"closingtimebtn";i:0;s:13:"overlay_color";i:0;s:20:"Overlay_color_picker";s:4:"blue";s:16:"Background_Color";i:0;s:20:"Content_custom_class";i:0;s:18:"custom_css_Content";s:0:"";s:20:"Overlay_custom_class";i:0;s:16:"custom_css_class";s:0:"";s:19:"border_shadow_check";i:0;s:16:"Background_Image";i:0;s:24:"Background_Opacity_Color";i:0;s:24:"Background_trncfer_check";i:0;s:13:"slideoptradio";s:0:"";s:30:"slide-Border-colorpicker_value";i:0;s:9:"Animation";i:1;s:15:"animate_sellect";s:0:"";s:15:"old_animate_val";s:0:"";s:11:"animate_val";s:0:"";s:12:"Opacity_demo";d:0.5;s:11:"pading_demo";i:10;s:15:"$pading_myRange";i:10;s:14:"pading_myRange";i:10;s:9:"use_cooki";i:0;s:14:"Thickness_demo";s:1:"1";s:8:"st_types";i:0;s:25:"popup_vesability_category";a:1:{i:0;s:0:"";}s:10:"Categories";i:0;s:9:"scrolling";i:0;s:6:"mobile";i:0;s:9:"daterange";i:0;s:7:"theames";s:3:"non";s:13:"showcancelbtn";i:0;}';
    $defualttemp = 'a:119:{s:18:"popup_type_sellect";s:4:"HTML";s:7:"theames";s:1:"1";s:15:"rolbackradioval";s:1:"1";s:9:"dimension";s:10:"responsive";s:34:"popup_responsive_dimension_measure";s:3:"40%";s:12:"di_width_val";i:0;s:16:"di_max_width_val";i:0;s:12:"di_hight_val";i:0;s:16:"di_max_hight_val";i:0;s:16:"popup_theam_type";s:5:"Light";s:14:"showtitlecheck";s:1:"1";s:10:"title_text";s:10:"Title Here";s:9:"titlesize";s:4:"17px";s:18:"title_posi_sellect";s:4:"Left";s:23:"title_font_color_picker";s:7:"#000000";s:28:"title_font_colorpicker_value";s:0:"";s:12:"showclosebtn";s:1:"1";s:14:"Closingsellect";s:5:"Right";s:12:"closebtntext";s:5:"Close";s:21:"btnclose_color_picker";s:7:"#1e73be";s:26:"btnclose_colorpicker_value";s:0:"";s:28:"btnclose_Shadow_color_picker";s:0:"";s:33:"btnclose_Shadow_colorpicker_value";s:0:"";s:26:"font_btnclose_color_picker";s:7:"#ffffff";s:31:"font_btnclose_colorpicker_value";s:1:" ";s:30:"close_btn_Border_Style_sellect";s:5:"solid";s:12:"closebtnsize";s:4:"13px";s:15:"close_btn_width";s:5:"100px";s:16:"close_btn_height";s:4:"30px";s:15:"closebtnpadding";s:1:"3";s:16:"closebtnb_radius";s:1:"0";s:13:"showcancelbtn";s:1:"1";s:19:"booton_color_picker";s:7:"#db2323";s:22:"Icon_colorpicker_value";s:0:"";s:13:"cancelbtntext";s:6:"Cancel";s:13:"showcloseicon";s:1:"1";s:16:"closeiconsellect";s:5:"Right";s:17:"Icon_color_picker";s:7:"#b5b5b5";s:8:"iconsize";s:2:"26";s:14:"escbtncheckbox";s:1:"1";s:10:"outerclose";s:1:"1";s:11:"closingtime";N;s:18:"Background_options";s:1:"1";s:19:"header_color_picker";s:5:"white";s:19:"footer_color_picker";s:5:"white";s:12:"color_picker";s:4:"#fff";s:18:"backround_position";s:6:"center";s:15:"Opacity_myRange";s:3:"0.5";s:20:"Opacity_color_picker";s:0:"";s:17:"colorpicker_value";s:0:"";s:14:"pop_back_image";s:0:"";s:19:"border_shadow_check";s:1:"1";s:17:"Thickness_myRange";s:1:"1";s:26:"border_shadow_color_picker";s:0:"";s:24:"shadow_colorpicker_value";s:0:"";s:25:"slide_Border_color_picker";s:7:"#f2f2f2";s:30:"slide-Border-colorpicker_value";s:0:"";s:26:"header_Border_color_picker";s:7:"#e0e0e0";s:26:"fotter_Border_color_picker";s:7:"#e0e0e0";s:20:"Border_Style_sellect";s:5:"solid";s:16:"radious_Top_Lift";i:0;s:17:"radious_Top_Right";i:0;s:15:"Bottom_Top_Lift";i:0;s:16:"Bottom_Top_Right";i:0;s:12:"header_p_top";s:3:"5px";s:15:"header_p_bottom";s:3:"5px";s:14:"header_p_right";s:3:"5px";s:13:"header_p_left";s:3:"5px";s:13:"content_p_top";s:4:"20px";s:16:"content_p_bottom";s:4:"20px";s:15:"content_p_right";s:4:"20px";s:14:"content_p_left";s:4:"20px";s:12:"footer_p_top";s:4:"10px";s:15:"footer_p_bottom";s:3:"5px";s:14:"footer_p_right";s:3:"5px";s:13:"footer_p_left";s:4:"10px";s:10:"img_repeat";s:1:"1";s:10:"margin_val";s:2:"px";s:10:"post_types";s:1:"1";s:21:"popup_vesability_post";a:1:{i:0;s:4:"post";}s:3:"aaa";s:4:"post";s:6:"aaacat";s:0:"";s:11:"cookioption";s:3:"all";s:7:"loading";s:1:"1";s:11:"loadingtime";s:1:"1";s:4:"bday";i:0;s:4:"eday";i:0;s:15:"usetemplate_y_n";s:1:"0";s:16:"edittemplate_y_n";s:1:"0";s:15:"current_emplate";s:6:"temp_1";s:12:"window_close";i:0;s:14:"closingtimebtn";i:0;s:13:"overlay_color";i:0;s:20:"Overlay_color_picker";s:4:"blue";s:16:"Background_Color";i:0;s:20:"Content_custom_class";i:0;s:18:"custom_css_Content";s:0:"";s:20:"Overlay_custom_class";i:0;s:16:"custom_css_class";s:0:"";s:16:"Background_Image";i:0;s:24:"Background_Opacity_Color";i:0;s:24:"Background_trncfer_check";i:0;s:13:"slideoptradio";s:0:"";s:9:"Animation";i:1;s:15:"animate_sellect";s:0:"";s:15:"old_animate_val";s:0:"";s:11:"animate_val";s:0:"";s:12:"Opacity_demo";d:0.5;s:11:"pading_demo";i:10;s:15:"$pading_myRange";i:10;s:14:"pading_myRange";i:10;s:9:"use_cooki";i:0;s:14:"Thickness_demo";s:1:"1";s:8:"st_types";i:0;s:25:"popup_vesability_category";a:1:{i:0;s:0:"";}s:10:"Categories";i:0;s:9:"scrolling";i:0;s:6:"mobile";i:0;s:9:"daterange";i:0;}';
    $Privacy = 'a:119:{s:18:"popup_type_sellect";s:4:"HTML";s:7:"theames";s:1:"2";s:15:"rolbackradioval";s:1:"2";s:9:"dimension";s:10:"responsive";s:34:"popup_responsive_dimension_measure";s:3:"40%";s:12:"di_width_val";i:0;s:16:"di_max_width_val";i:0;s:12:"di_hight_val";i:0;s:16:"di_max_hight_val";i:0;s:16:"popup_theam_type";s:5:"Light";s:14:"showtitlecheck";s:1:"1";s:10:"title_text";s:10:"Title Here";s:9:"titlesize";s:4:"17px";s:18:"title_posi_sellect";s:4:"Left";s:23:"title_font_color_picker";s:7:"#000000";s:28:"title_font_colorpicker_value";s:0:"";s:12:"showclosebtn";s:1:"1";s:14:"Closingsellect";s:5:"Right";s:12:"closebtntext";s:5:"Close";s:21:"btnclose_color_picker";s:7:"#1e73be";s:26:"btnclose_colorpicker_value";s:0:"";s:28:"btnclose_Shadow_color_picker";s:0:"";s:33:"btnclose_Shadow_colorpicker_value";s:0:"";s:26:"font_btnclose_color_picker";s:7:"#ffffff";s:31:"font_btnclose_colorpicker_value";s:1:" ";s:30:"close_btn_Border_Style_sellect";s:5:"solid";s:12:"closebtnsize";s:4:"13px";s:15:"close_btn_width";s:5:"100px";s:16:"close_btn_height";s:4:"30px";s:15:"closebtnpadding";s:1:"3";s:16:"closebtnb_radius";s:1:"0";s:19:"booton_color_picker";s:7:"#db2323";s:22:"Icon_colorpicker_value";s:0:"";s:13:"cancelbtntext";s:6:"Cancel";s:13:"showcloseicon";s:1:"1";s:16:"closeiconsellect";s:5:"Right";s:17:"Icon_color_picker";s:7:"#b5b5b5";s:8:"iconsize";s:2:"26";s:14:"escbtncheckbox";s:1:"1";s:10:"outerclose";s:1:"1";s:11:"closingtime";N;s:18:"Background_options";s:1:"1";s:19:"header_color_picker";s:5:"white";s:19:"footer_color_picker";s:5:"white";s:12:"color_picker";s:4:"#fff";s:18:"backround_position";s:6:"center";s:15:"Opacity_myRange";s:3:"0.5";s:20:"Opacity_color_picker";s:0:"";s:17:"colorpicker_value";s:0:"";s:14:"pop_back_image";s:0:"";s:19:"border_shadow_check";s:1:"1";s:17:"Thickness_myRange";s:1:"1";s:26:"border_shadow_color_picker";s:0:"";s:24:"shadow_colorpicker_value";s:0:"";s:25:"slide_Border_color_picker";s:7:"#f2f2f2";s:30:"slide-Border-colorpicker_value";s:0:"";s:26:"header_Border_color_picker";s:7:"#e0e0e0";s:26:"fotter_Border_color_picker";s:7:"#e0e0e0";s:20:"Border_Style_sellect";s:5:"solid";s:16:"radious_Top_Lift";i:0;s:17:"radious_Top_Right";i:0;s:15:"Bottom_Top_Lift";i:0;s:16:"Bottom_Top_Right";i:0;s:12:"header_p_top";s:3:"5px";s:15:"header_p_bottom";s:3:"5px";s:14:"header_p_right";s:3:"5px";s:13:"header_p_left";s:3:"5px";s:13:"content_p_top";s:4:"20px";s:16:"content_p_bottom";s:4:"20px";s:15:"content_p_right";s:4:"20px";s:14:"content_p_left";s:4:"20px";s:12:"footer_p_top";s:4:"10px";s:15:"footer_p_bottom";s:3:"5px";s:14:"footer_p_right";s:3:"5px";s:13:"footer_p_left";s:4:"10px";s:10:"img_repeat";s:1:"1";s:10:"margin_val";s:2:"px";s:10:"post_types";s:1:"1";s:21:"popup_vesability_post";a:1:{i:0;s:4:"post";}s:3:"aaa";s:4:"post";s:6:"aaacat";s:0:"";s:11:"cookioption";s:3:"all";s:7:"loading";s:1:"1";s:11:"loadingtime";s:1:"1";s:4:"bday";i:0;s:4:"eday";i:0;s:15:"usetemplate_y_n";s:1:"0";s:16:"edittemplate_y_n";s:1:"0";s:15:"current_emplate";s:6:"temp_1";s:12:"window_close";i:0;s:14:"closingtimebtn";i:0;s:13:"overlay_color";i:0;s:20:"Overlay_color_picker";s:4:"blue";s:16:"Background_Color";i:0;s:20:"Content_custom_class";i:0;s:18:"custom_css_Content";s:0:"";s:20:"Overlay_custom_class";i:0;s:16:"custom_css_class";s:0:"";s:16:"Background_Image";i:0;s:24:"Background_Opacity_Color";i:0;s:24:"Background_trncfer_check";i:0;s:13:"slideoptradio";s:0:"";s:9:"Animation";i:1;s:15:"animate_sellect";s:0:"";s:15:"old_animate_val";s:0:"";s:11:"animate_val";s:0:"";s:12:"Opacity_demo";d:0.5;s:11:"pading_demo";i:10;s:15:"$pading_myRange";i:10;s:14:"pading_myRange";i:10;s:9:"use_cooki";i:0;s:14:"Thickness_demo";s:1:"1";s:8:"st_types";i:0;s:25:"popup_vesability_category";a:1:{i:0;s:0:"";}s:10:"Categories";i:0;s:9:"scrolling";i:0;s:6:"mobile";i:0;s:9:"daterange";i:0;s:13:"showcancelbtn";i:0;}';
    $policy = 'a:113:{s:18:"popup_type_sellect";s:4:"HTML";s:15:"rolbackradioval";s:1:"4";s:16:"popup_theam_type";s:5:"Light";s:9:"dimension";s:10:"responsive";s:34:"popup_responsive_dimension_measure";s:3:"30%";s:12:"di_width_val";i:0;s:16:"di_max_width_val";i:0;s:12:"di_hight_val";i:0;s:16:"di_max_hight_val";i:0;s:14:"showtitlecheck";s:1:"1";s:10:"title_text";s:10:"Title Here";s:18:"title_posi_sellect";s:4:"Left";s:9:"titlesize";s:4:"17px";s:23:"title_font_color_picker";s:5:"white";s:18:"Background_options";s:1:"1";s:12:"color_picker";s:7:"#ffffff";s:19:"footer_color_picker";s:7:"#ffffff";s:19:"header_color_picker";s:7:"#2077c3";s:10:"margin_val";s:3:"0px";s:21:"popup_Opacity_myRange";s:1:"1";s:20:"Opacity_color_picker";s:5:"black";s:15:"Opacity_myRange";s:3:"0.4";s:18:"backround_position";s:6:"center";s:14:"pop_back_image";s:0:"";s:19:"border_shadow_check";s:1:"1";s:20:"Border_Style_sellect";s:4:"none";s:17:"Thickness_myRange";s:1:"1";s:26:"header_Border_color_picker";s:0:"";s:26:"fotter_Border_color_picker";s:7:"#f2f2f2";s:25:"slide_Border_color_picker";s:7:"#f2f2f2";s:26:"border_shadow_color_picker";s:0:"";s:16:"Bottom_Top_Right";i:0;s:15:"Bottom_Top_Lift";i:0;s:17:"radious_Top_Right";i:0;s:16:"radious_Top_Lift";i:0;s:10:"img_repeat";s:1:"1";s:12:"header_p_top";s:3:"5px";s:15:"header_p_bottom";s:3:"5px";s:14:"header_p_right";s:3:"5px";s:13:"header_p_left";s:3:"5px";s:13:"content_p_top";s:4:"20px";s:16:"content_p_bottom";s:4:"20px";s:15:"content_p_right";s:4:"20px";s:14:"content_p_left";s:4:"20px";s:12:"footer_p_top";s:4:"10px";s:15:"footer_p_bottom";s:3:"5px";s:14:"footer_p_right";s:3:"5px";s:13:"footer_p_left";s:4:"10px";s:12:"showclosebtn";s:1:"1";s:14:"Closingsellect";s:3:"50%";s:12:"closebtntext";s:5:"Close";s:28:"btnclose_Shadow_color_picker";s:0:"";s:26:"font_btnclose_color_picker";s:7:"#ffffff";s:21:"btnclose_color_picker";s:7:"#1e73be";s:12:"closebtnsize";s:4:"13px";s:15:"close_btn_width";s:5:"100px";s:16:"close_btn_height";s:4:"30px";s:15:"closebtnpadding";s:1:"3";s:30:"close_btn_Border_Style_sellect";s:5:"solid";s:16:"closebtnb_radius";s:1:"0";s:13:"cancelbtntext";s:6:"Cancel";s:19:"booton_color_picker";s:7:"#db2323";s:16:"closeiconsellect";s:5:"Right";s:17:"Icon_color_picker";s:7:"#b5b5b5";s:8:"iconsize";s:2:"26";s:14:"escbtncheckbox";s:1:"1";s:10:"outerclose";s:1:"1";s:11:"closingtime";N;s:10:"post_types";s:1:"1";s:21:"popup_vesability_post";a:1:{i:0;s:4:"post";}s:3:"aaa";s:4:"post";s:6:"aaacat";s:0:"";s:11:"cookioption";s:3:"all";s:7:"loading";s:1:"1";s:11:"loadingtime";s:1:"1";s:4:"bday";i:0;s:4:"eday";i:0;s:15:"usetemplate_y_n";s:1:"0";s:16:"edittemplate_y_n";s:1:"0";s:15:"current_emplate";s:6:"temp_1";s:12:"window_close";i:0;s:13:"showcloseicon";i:0;s:14:"closingtimebtn";i:0;s:13:"overlay_color";i:0;s:20:"Overlay_color_picker";s:4:"blue";s:16:"Background_Color";i:0;s:20:"Content_custom_class";i:0;s:18:"custom_css_Content";s:0:"";s:20:"Overlay_custom_class";i:0;s:16:"custom_css_class";s:0:"";s:16:"Background_Image";i:0;s:24:"Background_Opacity_Color";i:0;s:24:"Background_trncfer_check";i:0;s:13:"slideoptradio";s:0:"";s:30:"slide-Border-colorpicker_value";i:0;s:9:"Animation";i:1;s:15:"animate_sellect";s:0:"";s:15:"old_animate_val";s:0:"";s:11:"animate_val";s:0:"";s:12:"Opacity_demo";d:0.5;s:11:"pading_demo";i:10;s:15:"$pading_myRange";i:10;s:14:"pading_myRange";i:10;s:9:"use_cooki";i:0;s:14:"Thickness_demo";s:1:"1";s:8:"st_types";i:0;s:25:"popup_vesability_category";a:1:{i:0;s:0:"";}s:10:"Categories";i:0;s:9:"scrolling";i:0;s:6:"mobile";i:0;s:9:"daterange";i:0;s:7:"theames";s:3:"non";s:13:"showcancelbtn";i:0;}';
    $faceBook = 'a:112:{s:18:"popup_type_sellect";s:4:"HTML";s:15:"rolbackradioval";s:1:"3";s:16:"popup_theam_type";s:5:"Light";s:9:"dimension";s:10:"responsive";s:34:"popup_responsive_dimension_measure";s:3:"30%";s:12:"di_width_val";i:0;s:16:"di_max_width_val";i:0;s:12:"di_hight_val";i:0;s:16:"di_max_hight_val";i:0;s:14:"showtitlecheck";i:1;s:10:"title_text";s:10:"Title Here";s:18:"title_posi_sellect";s:4:"Left";s:9:"titlesize";s:4:"17px";s:23:"title_font_color_picker";s:5:"white";s:18:"Background_options";s:1:"1";s:12:"color_picker";s:7:"#ffffff";s:19:"footer_color_picker";s:7:"#ffffff";s:19:"header_color_picker";s:7:"#2077c3";s:10:"margin_val";s:3:"0px";s:21:"popup_Opacity_myRange";d:1;s:20:"Opacity_color_picker";s:5:"black";s:15:"Opacity_myRange";d:0.4;s:18:"backround_position";s:6:"center";s:14:"pop_back_image";s:0:"";s:19:"border_shadow_check";i:1;s:20:"Border_Style_sellect";s:4:"none";s:17:"Thickness_myRange";s:1:"1";s:26:"header_Border_color_picker";s:0:"";s:26:"fotter_Border_color_picker";s:7:"#f2f2f2";s:25:"slide_Border_color_picker";s:7:"#f2f2f2";s:26:"border_shadow_color_picker";s:0:"";s:16:"Bottom_Top_Right";i:0;s:15:"Bottom_Top_Lift";i:0;s:17:"radious_Top_Right";i:0;s:16:"radious_Top_Lift";i:0;s:10:"img_repeat";i:1;s:12:"header_p_top";s:3:"5px";s:15:"header_p_bottom";s:3:"5px";s:14:"header_p_right";s:3:"5px";s:13:"header_p_left";s:3:"5px";s:13:"content_p_top";s:4:"20px";s:16:"content_p_bottom";s:4:"20px";s:15:"content_p_right";s:4:"20px";s:14:"content_p_left";s:4:"20px";s:12:"footer_p_top";s:4:"10px";s:15:"footer_p_bottom";s:3:"5px";s:14:"footer_p_right";s:3:"5px";s:13:"footer_p_left";s:4:"10px";s:14:"Closingsellect";s:3:"50%";s:12:"closebtntext";s:5:"Close";s:28:"btnclose_Shadow_color_picker";s:0:"";s:26:"font_btnclose_color_picker";s:7:"#ffffff";s:21:"btnclose_color_picker";s:7:"#1e73be";s:12:"closebtnsize";s:4:"13px";s:15:"close_btn_width";s:5:"100px";s:16:"close_btn_height";s:4:"30px";s:15:"closebtnpadding";s:1:"3";s:30:"close_btn_Border_Style_sellect";s:5:"solid";s:16:"closebtnb_radius";s:1:"0";s:13:"cancelbtntext";s:6:"Cancel";s:19:"booton_color_picker";s:7:"#db2323";s:16:"closeiconsellect";s:5:"Right";s:17:"Icon_color_picker";s:7:"#b5b5b5";s:8:"iconsize";s:2:"26";s:14:"escbtncheckbox";i:1;s:10:"outerclose";i:1;s:11:"closingtime";N;s:10:"post_types";i:1;s:21:"popup_vesability_post";a:1:{i:0;s:4:"post";}s:3:"aaa";s:4:"post";s:6:"aaacat";s:0:"";s:11:"cookioption";s:3:"all";s:7:"loading";i:1;s:11:"loadingtime";i:1;s:4:"bday";N;s:4:"eday";N;s:15:"usetemplate_y_n";i:0;s:16:"edittemplate_y_n";s:1:"0";s:15:"current_emplate";s:6:"temp_1";s:12:"showclosebtn";i:0;s:13:"showcloseicon";i:0;s:14:"closingtimebtn";i:0;s:13:"overlay_color";i:0;s:20:"Overlay_color_picker";s:4:"blue";s:16:"Background_Color";i:0;s:20:"Content_custom_class";i:0;s:18:"custom_css_Content";s:0:"";s:20:"Overlay_custom_class";i:0;s:16:"custom_css_class";s:0:"";s:16:"Background_Image";i:0;s:24:"Background_Opacity_Color";i:0;s:24:"Background_trncfer_check";i:0;s:13:"slideoptradio";s:0:"";s:30:"slide-Border-colorpicker_value";i:0;s:9:"Animation";i:1;s:15:"animate_sellect";s:0:"";s:15:"old_animate_val";s:0:"";s:11:"animate_val";s:0:"";s:12:"Opacity_demo";d:0.5;s:11:"pading_demo";i:10;s:15:"$pading_myRange";i:10;s:14:"pading_myRange";i:10;s:9:"use_cooki";i:0;s:14:"Thickness_demo";s:1:"1";s:8:"st_types";i:0;s:25:"popup_vesability_category";a:1:{i:0;s:0:"";}s:10:"Categories";i:0;s:9:"scrolling";i:0;s:6:"mobile";i:0;s:9:"daterange";i:0;s:7:"theames";s:3:"non";s:13:"showcancelbtn";i:0;}';
    $liskslide = 'a:116:{s:18:"popup_type_sellect";s:4:"HTML";s:7:"theames";s:1:"5";s:15:"rolbackradioval";s:1:"5";s:9:"dimension";s:10:"responsive";s:34:"popup_responsive_dimension_measure";s:4:"100%";s:12:"di_width_val";i:0;s:16:"di_max_width_val";i:0;s:12:"di_hight_val";i:0;s:16:"di_max_hight_val";i:0;s:16:"popup_theam_type";s:5:"Slide";s:13:"slideoptradio";s:9:"Slide_box";s:10:"title_text";s:11:"Title Heare";s:9:"titlesize";s:4:"17px";s:18:"title_posi_sellect";s:4:"Left";s:23:"title_font_color_picker";s:7:"#000000";s:28:"title_font_colorpicker_value";s:0:"";s:12:"showclosebtn";s:1:"1";s:14:"Closingsellect";s:3:"50%";s:12:"closebtntext";s:5:"Close";s:21:"btnclose_color_picker";s:7:"#1e73be";s:26:"btnclose_colorpicker_value";s:0:"";s:28:"btnclose_Shadow_color_picker";s:0:"";s:33:"btnclose_Shadow_colorpicker_value";s:0:"";s:26:"font_btnclose_color_picker";s:7:"#ffffff";s:31:"font_btnclose_colorpicker_value";s:1:" ";s:30:"close_btn_Border_Style_sellect";s:5:"solid";s:12:"closebtnsize";s:4:"13px";s:15:"close_btn_width";s:5:"100px";s:16:"close_btn_height";s:4:"30px";s:15:"closebtnpadding";s:1:"3";s:16:"closebtnb_radius";s:1:"3";s:19:"booton_color_picker";s:7:"#db2323";s:22:"Icon_colorpicker_value";s:0:"";s:13:"cancelbtntext";s:6:"Cancel";s:13:"showcloseicon";s:1:"1";s:16:"closeiconsellect";s:4:"Left";s:17:"Icon_color_picker";s:7:"#b5b5b5";s:8:"iconsize";s:2:"26";s:14:"escbtncheckbox";s:1:"1";s:10:"outerclose";s:1:"1";s:11:"closingtime";N;s:18:"Background_options";s:1:"1";s:19:"header_color_picker";s:5:"white";s:19:"footer_color_picker";s:5:"white";s:12:"color_picker";s:4:"#fff";s:18:"backround_position";s:6:"center";s:15:"Opacity_myRange";s:3:"0.5";s:20:"Opacity_color_picker";s:0:"";s:17:"colorpicker_value";s:0:"";s:14:"pop_back_image";s:0:"";s:19:"border_shadow_check";s:1:"1";s:17:"Thickness_myRange";s:1:"1";s:26:"border_shadow_color_picker";s:0:"";s:24:"shadow_colorpicker_value";s:0:"";s:25:"slide_Border_color_picker";s:7:"#f2f2f2";s:30:"slide-Border-colorpicker_value";s:0:"";s:26:"header_Border_color_picker";s:7:"#ffffff";s:26:"fotter_Border_color_picker";s:7:"#ffffff";s:20:"Border_Style_sellect";s:5:"solid";s:16:"radious_Top_Lift";i:0;s:17:"radious_Top_Right";i:0;s:15:"Bottom_Top_Lift";i:0;s:16:"Bottom_Top_Right";i:0;s:12:"header_p_top";s:3:"5px";s:15:"header_p_bottom";s:3:"5px";s:14:"header_p_right";s:3:"5px";s:13:"header_p_left";s:3:"5px";s:13:"content_p_top";s:4:"10px";s:16:"content_p_bottom";s:4:"10px";s:15:"content_p_right";s:4:"10px";s:14:"content_p_left";s:4:"10px";s:12:"footer_p_top";s:3:"5px";s:15:"footer_p_bottom";s:3:"5px";s:14:"footer_p_right";s:3:"5px";s:13:"footer_p_left";s:3:"5px";s:10:"img_repeat";s:1:"1";s:10:"margin_val";s:2:"px";s:10:"post_types";s:1:"1";s:21:"popup_vesability_post";a:1:{i:0;s:4:"post";}s:3:"aaa";s:4:"post";s:6:"aaacat";s:0:"";s:11:"cookioption";s:3:"all";s:7:"loading";s:1:"1";s:11:"loadingtime";s:1:"1";s:4:"bday";i:0;s:4:"eday";i:0;s:15:"usetemplate_y_n";s:1:"0";s:16:"edittemplate_y_n";s:1:"0";s:15:"current_emplate";s:6:"temp_1";s:14:"showtitlecheck";i:0;s:12:"window_close";i:0;s:14:"closingtimebtn";i:0;s:13:"overlay_color";i:0;s:20:"Overlay_color_picker";s:4:"blue";s:16:"Background_Color";i:0;s:20:"Content_custom_class";i:0;s:18:"custom_css_Content";s:0:"";s:20:"Overlay_custom_class";i:0;s:16:"custom_css_class";s:0:"";s:16:"Background_Image";i:0;s:24:"Background_Opacity_Color";i:0;s:24:"Background_trncfer_check";i:0;s:15:"animate_sellect";s:0:"";s:12:"Opacity_demo";d:0.5;s:11:"pading_demo";i:10;s:15:"$pading_myRange";i:10;s:14:"pading_myRange";i:10;s:9:"use_cooki";i:0;s:14:"Thickness_demo";s:1:"1";s:8:"st_types";i:0;s:25:"popup_vesability_category";a:1:{i:0;s:0:"";}s:10:"Categories";i:0;s:9:"scrolling";i:0;s:6:"mobile";i:0;s:9:"daterange";i:0;s:13:"showcancelbtn";i:0;}';
    $youtupe = 'a:111:{s:18:"popup_type_sellect";s:4:"HTML";s:15:"rolbackradioval";s:1:"6";s:16:"popup_theam_type";s:5:"Light";s:9:"dimension";s:10:"responsive";s:34:"popup_responsive_dimension_measure";s:4:"auto";s:12:"di_width_val";i:0;s:16:"di_max_width_val";i:0;s:12:"di_hight_val";i:0;s:16:"di_max_hight_val";i:0;s:10:"title_text";s:4:"test";s:18:"title_posi_sellect";s:4:"Left";s:9:"titlesize";s:4:"17px";s:23:"title_font_color_picker";s:0:"";s:12:"color_picker";s:0:"";s:19:"footer_color_picker";s:0:"";s:19:"header_color_picker";s:0:"";s:10:"margin_val";s:2:"px";s:21:"popup_Opacity_myRange";d:1;s:20:"Opacity_color_picker";s:0:"";s:15:"Opacity_myRange";d:0.5;s:18:"backround_position";s:6:"center";s:14:"pop_back_image";s:0:"";s:20:"Border_Style_sellect";s:4:"none";s:17:"Thickness_myRange";s:1:"1";s:26:"header_Border_color_picker";s:0:"";s:26:"fotter_Border_color_picker";s:0:"";s:25:"slide_Border_color_picker";s:0:"";s:26:"border_shadow_color_picker";s:0:"";s:16:"Bottom_Top_Right";i:0;s:15:"Bottom_Top_Lift";i:0;s:17:"radious_Top_Right";i:0;s:16:"radious_Top_Lift";i:0;s:12:"header_p_top";s:2:"px";s:15:"header_p_bottom";s:2:"px";s:14:"header_p_right";s:2:"px";s:13:"header_p_left";s:2:"px";s:13:"content_p_top";s:2:"px";s:16:"content_p_bottom";s:2:"px";s:15:"content_p_right";s:2:"px";s:14:"content_p_left";s:2:"px";s:12:"footer_p_top";s:2:"px";s:15:"footer_p_bottom";s:2:"px";s:14:"footer_p_right";s:2:"px";s:13:"footer_p_left";s:2:"px";s:14:"Closingsellect";s:5:"Right";s:12:"closebtntext";s:5:"Close";s:28:"btnclose_Shadow_color_picker";s:0:"";s:26:"font_btnclose_color_picker";s:0:"";s:21:"btnclose_color_picker";s:0:"";s:12:"closebtnsize";s:4:"13px";s:15:"close_btn_width";s:5:"100px";s:16:"close_btn_height";s:4:"30px";s:15:"closebtnpadding";s:1:"3";s:30:"close_btn_Border_Style_sellect";s:5:"solid";s:16:"closebtnb_radius";s:1:"0";s:13:"cancelbtntext";s:0:"";s:19:"booton_color_picker";s:0:"";s:16:"closeiconsellect";s:5:"Right";s:17:"Icon_color_picker";s:0:"";s:8:"iconsize";s:2:"30";s:14:"escbtncheckbox";i:1;s:10:"outerclose";i:1;s:11:"closingtime";N;s:3:"aaa";s:0:"";s:6:"aaacat";s:0:"";s:11:"loadingtime";i:1;s:4:"bday";N;s:4:"eday";N;s:15:"usetemplate_y_n";i:0;s:16:"edittemplate_y_n";s:1:"0";s:15:"current_emplate";s:6:"temp_1";s:12:"showclosebtn";i:0;s:14:"showtitlecheck";i:0;s:13:"showcloseicon";i:0;s:10:"img_repeat";i:0;s:14:"closingtimebtn";i:0;s:13:"overlay_color";i:0;s:20:"Overlay_color_picker";s:4:"blue";s:16:"Background_Color";i:0;s:20:"Content_custom_class";i:0;s:18:"custom_css_Content";s:0:"";s:20:"Overlay_custom_class";i:0;s:16:"custom_css_class";s:0:"";s:19:"border_shadow_check";i:0;s:16:"Background_Image";i:0;s:24:"Background_Opacity_Color";i:0;s:24:"Background_trncfer_check";i:0;s:13:"slideoptradio";s:0:"";s:30:"slide-Border-colorpicker_value";i:0;s:9:"Animation";i:1;s:15:"animate_sellect";s:0:"";s:15:"old_animate_val";s:0:"";s:11:"animate_val";s:0:"";s:12:"Opacity_demo";d:0.5;s:11:"pading_demo";i:10;s:15:"$pading_myRange";i:10;s:14:"pading_myRange";i:10;s:9:"use_cooki";i:0;s:14:"Thickness_demo";s:1:"1";s:8:"st_types";i:0;s:21:"popup_vesability_post";a:1:{i:0;s:0:"";}s:25:"popup_vesability_category";a:1:{i:0;s:0:"";}s:10:"Categories";i:0;s:9:"scrolling";i:0;s:7:"loading";i:1;s:6:"mobile";i:0;s:9:"daterange";i:0;s:7:"theames";s:3:"non";s:11:"cookioption";s:3:"all";s:13:"showcancelbtn";i:0;s:10:"post_types";i:0;}';
    $image = 'a:113:{s:18:"popup_type_sellect";s:4:"HTML";s:15:"rolbackradioval";s:1:"7";s:16:"popup_theam_type";s:5:"Light";s:9:"dimension";s:10:"responsive";s:34:"popup_responsive_dimension_measure";s:4:"auto";s:12:"di_width_val";i:0;s:16:"di_max_width_val";i:0;s:12:"di_hight_val";i:0;s:16:"di_max_hight_val";i:0;s:10:"title_text";s:11:"Title Heare";s:18:"title_posi_sellect";s:4:"Left";s:9:"titlesize";s:4:"17px";s:23:"title_font_color_picker";s:7:"#000000";s:18:"Background_options";s:1:"1";s:12:"color_picker";s:4:"#fff";s:19:"footer_color_picker";s:7:"#ffffff";s:19:"header_color_picker";s:7:"#ffffff";s:10:"margin_val";s:3:"0px";s:21:"popup_Opacity_myRange";s:1:"1";s:20:"Opacity_color_picker";s:7:"#000000";s:15:"Opacity_myRange";s:4:"0.46";s:18:"backround_position";s:6:"center";s:14:"pop_back_image";s:0:"";s:19:"border_shadow_check";s:1:"1";s:20:"Border_Style_sellect";s:4:"none";s:17:"Thickness_myRange";s:1:"1";s:26:"header_Border_color_picker";s:7:"#e0e0e0";s:26:"fotter_Border_color_picker";s:7:"#ffffff";s:25:"slide_Border_color_picker";s:7:"#f2f2f2";s:26:"border_shadow_color_picker";s:0:"";s:16:"Bottom_Top_Right";i:0;s:15:"Bottom_Top_Lift";i:0;s:17:"radious_Top_Right";i:0;s:16:"radious_Top_Lift";i:0;s:10:"img_repeat";s:1:"1";s:12:"header_p_top";s:3:"0px";s:15:"header_p_bottom";s:3:"0px";s:14:"header_p_right";s:3:"0px";s:13:"header_p_left";s:3:"0px";s:13:"content_p_top";s:3:"0px";s:16:"content_p_bottom";s:3:"0px";s:15:"content_p_right";s:3:"0px";s:14:"content_p_left";s:3:"0px";s:12:"footer_p_top";s:3:"0px";s:15:"footer_p_bottom";s:3:"0px";s:14:"footer_p_right";s:3:"0px";s:13:"footer_p_left";s:3:"0px";s:14:"Closingsellect";s:4:"Left";s:12:"closebtntext";s:8:"Got It!!";s:28:"btnclose_Shadow_color_picker";s:0:"";s:26:"font_btnclose_color_picker";s:7:"#ffffff";s:21:"btnclose_color_picker";s:7:"#000000";s:12:"closebtnsize";s:4:"13px";s:15:"close_btn_width";s:5:"100px";s:16:"close_btn_height";s:4:"30px";s:15:"closebtnpadding";s:1:"3";s:30:"close_btn_Border_Style_sellect";s:5:"solid";s:16:"closebtnb_radius";s:1:"3";s:13:"cancelbtntext";s:6:"Cancel";s:19:"booton_color_picker";s:7:"#db2323";s:16:"closeiconsellect";s:5:"Right";s:17:"Icon_color_picker";s:7:"#b5b5b5";s:8:"iconsize";s:2:"26";s:14:"escbtncheckbox";s:1:"1";s:10:"outerclose";s:1:"1";s:11:"closingtime";N;s:10:"post_types";s:1:"1";s:21:"popup_vesability_post";a:1:{i:0;s:4:"post";}s:3:"aaa";s:4:"post";s:6:"aaacat";s:0:"";s:11:"cookioption";s:3:"all";s:7:"loading";s:1:"1";s:11:"loadingtime";s:1:"1";s:4:"bday";i:0;s:4:"eday";i:0;s:15:"usetemplate_y_n";s:1:"0";s:16:"edittemplate_y_n";s:1:"0";s:15:"current_emplate";s:6:"temp_1";s:12:"showclosebtn";i:0;s:14:"showtitlecheck";i:0;s:12:"window_close";i:0;s:13:"showcloseicon";i:0;s:14:"closingtimebtn";i:0;s:13:"overlay_color";i:0;s:20:"Overlay_color_picker";s:4:"blue";s:16:"Background_Color";i:0;s:20:"Content_custom_class";i:0;s:18:"custom_css_Content";s:0:"";s:20:"Overlay_custom_class";i:0;s:16:"custom_css_class";s:0:"";s:16:"Background_Image";i:0;s:24:"Background_Opacity_Color";i:0;s:24:"Background_trncfer_check";i:0;s:13:"slideoptradio";s:0:"";s:30:"slide-Border-colorpicker_value";i:0;s:9:"Animation";i:1;s:15:"animate_sellect";s:0:"";s:15:"old_animate_val";s:0:"";s:11:"animate_val";s:0:"";s:12:"Opacity_demo";d:0.5;s:11:"pading_demo";i:10;s:15:"$pading_myRange";i:10;s:14:"pading_myRange";i:10;s:9:"use_cooki";i:0;s:14:"Thickness_demo";s:1:"1";s:8:"st_types";i:0;s:25:"popup_vesability_category";a:1:{i:0;s:0:"";}s:10:"Categories";i:0;s:9:"scrolling";i:0;s:6:"mobile";i:0;s:9:"daterange";i:0;s:7:"theames";s:3:"non";s:13:"showcancelbtn";i:0;}';

    $eplm_template = array();
    $eplm_template['No Template'][1] = $notemlate;
    $eplm_template['Default'][2] = $defualttemp;
    $eplm_template['Privacy'][3] = $Privacy;
    $eplm_template['Privacy Ploicy'][4] = $policy;
    $eplm_template['facebook'][5] = $faceBook;
    $eplm_template['Youtupe'][6] = $youtupe;
    $eplm_template['Image'][7] = $image;

    $templates_id = eplm_temp_id();
    // @unserialize($templates_id);

    $wpdb->query("Delete from $table_name");

    foreach ($eplm_template as $name => $v) {
        foreach ($v as $id => $option) {
            if (!@in_array($id, $templates_id)) {
                // echo $option." >".$name.">  ".$id;
                $query  = "INSERT INTO  $table_name( ";
                $query .= "temp_id,temp_name,temp_options";
                $query .= ") VALUES ( ";
                $query .= " $id ,";
                $query .= " '" . $name . "' ,";
                $query .= " '";
                $query .= $option;
                $query .= "' ";
                $query .= ")";
                $wpdb->query($query);
            } else {
                /// do nothing ///
            }
        }
    }
}
/**  add style links*/
function eplm_enqueue_color_picker($hook_suffix)
{
    wp_enqueue_style('wp-color-picker');
    wp_enqueue_script('cp_bootstrap', plugins_url('includes/bootstrap/bootstrap.min.css', __FILE__), false, true);
    wp_enqueue_script('my-script-handle', plugins_url('includes/my-script.js', __FILE__), array('wp-color-picker'), false, true);
    wp_enqueue_script('bootstrap-handle', plugins_url('includes/bootstrap.min.js', __FILE__), false, true);
}
function eplm_admin_head()
{
    global $pagenow;
?>
    <script type="text/javascript">
        var eplm_admin_url = '<?php echo admin_url('admin-ajax.php'); ?>';
        var eplm_wordpress_ver = '<?php echo get_bloginfo('version'); ?>';
        var eplm_you_sure = '<?php _e('Are you sure?', 'eplm_popups'); ?>';
    </script>
    <?php
}
function eplm_admin_scripts()
{
    global $current_screen;
    $popups = preg_match('/^.*eplm_popups$/', $current_screen->id);
    $edit_pop = preg_match('/^.*eplm_popups_template$/', $current_screen->id);
    $edit_pop2 = preg_match('/^.*eplm_popups_edit$/', $current_screen->id);
    if ($popups || $edit_pop || $edit_pop2) {
        wp_enqueue_style('bootstrap', plugins_url('includes/bootstrap/bootstrap.min.css', __FILE__), false, true);
        wp_enqueue_style('eplm_style', plugins_url('includes/bootstrap/eplm_style.css', __FILE__), array(), '1.6');
        wp_enqueue_style('animate', plugins_url('includes/animate.min.css', __FILE__), false, true);
        wp_enqueue_style('spectrum_css', plugins_url('includes/spectrum.css', __FILE__), false, true);
        wp_enqueue_script('spectrum_js', plugins_url('includes/spectrum.js', eplm_PLUGIN_MAIN_FILE), false, true);
        wp_enqueue_style('my_sellect2_css', plugins_url('includes/select2.min.css', __FILE__), false, true);
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_script('my_js_script', plugins_url('includes/bootstrap/js/my_js_script.js', eplm_PLUGIN_MAIN_FILE), false, true);
        wp_enqueue_script('jquery');
        wp_enqueue_script('wp-color-picker');
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');
        wp_enqueue_media();
        wp_enqueue_script('my_sellect2_js', plugins_url('includes/select2.min.js', eplm_PLUGIN_MAIN_FILE), false, true);
        wp_enqueue_script('encode_js_library', plugins_url('includes/bootstrap/js/base64.js', eplm_PLUGIN_MAIN_FILE), false, true);
    }
}
/** read data function */
function eplm_read_popups($filters = '', $limit = 0, $offset = 0)
{
    global $wpdb;
    $wheCnd = " WHERE 1 = 1";
    $wheCnd .= (isset($filters['pop_name'])) ? " AND pop_name = {$filters['pop_name']}" : "";
    $response = array('data' => array());
    $conSql = "SELECT COUNT(pop_id) cnt FROM {$wpdb->prefix}eplm_popups {$wheCnd}";
    $response['total'] = $wpdb->get_var($conSql);
    $sql = "SELECT *
			FROM {$wpdb->prefix}eplm_popups {$wheCnd} order by pop_id desc ";
    $sql .= (!empty($limit)) ? " LIMIT {$limit} OFFSET {$offset}" : "";
    $results = $wpdb->get_results($sql);
    if (false !== $results) {
        $response['data'] = $results;
    }
    return $response;
}
function eplm_read_template_popups($filters = '', $limit = 0, $offset = 0)
{
    global $wpdb;
    $wheCnd = " WHERE 1 = 1";
    $wheCnd .= (isset($filters['temp_name'])) ? " AND pop_name = {$filters['temp_name']}" : "";
    $response = array('data' => array());
    $conSql = "SELECT COUNT(temp_id) cnt FROM {$wpdb->prefix}eplm_popups_template {$wheCnd}";
    $response['total'] = $wpdb->get_var($conSql);
    $sql = "SELECT *
			FROM {$wpdb->prefix}eplm_popups_template {$wheCnd} order by temp_id asc ";
    $sql .= (!empty($limit)) ? " LIMIT {$limit} OFFSET {$offset}" : "";
    $results = $wpdb->get_results($sql);
    if (false !== $results) {
        $response['data'] = $results;
    }
    return $response;
}
function eplm_read_template_options($temp_id)
{
    global $wpdb;
    $sql = "SELECT * FROM `{$wpdb->prefix}eplm_popups_template` WHERE temp_id = %d";
    return $wpdb->get_row($wpdb->prepare($sql, $temp_id), OBJECT);
}
function eplm_temp_id()
{
    global $wpdb;
    $results = $wpdb->get_results("SELECT temp_id FROM {$wpdb->prefix}eplm_popups_template", OBJECT);
    return $results;
}
/** read data id function */
function eplm_read_popups_slide_id($filters = '', $limit = 0, $offset = 0)
{
    global $wpdb;
    $wheCnd = '';
    $wheCnd .= (isset($filters['pop_name'])) ? " AND pop_name = {$filters['pop_name']}" : "";
    $response = array('data' => array());
    $conSql = "SELECT COUNT(pop_id) cnt FROM {$wpdb->prefix}eplm_popups {$wheCnd}";
    $response['total'] = $wpdb->get_var($conSql);
    $sql = "SELECT * FROM {$wpdb->prefix}eplm_popups  WHERE 1 =1{$wheCnd} and  pop_type= 'Slide'  and (pop_visability_type =1 OR pop_visability_type_category = 1) AND pop_status = 1 ORDER BY pop_id DESC LIMIT 1";
    $sql .= (!empty($limit)) ? " LIMIT {$limit} OFFSET {$offset}" : "";
    $results = $wpdb->get_results($sql);
    if (false !== $results) {
        $response['data'] = $results;
    }
    return $response;
}
function eplm_read_popups_light_id($filters = '', $limit = 0, $offset = 0)
{
    global $wpdb;
    $wheCnd = '';
    $wheCnd .= (isset($filters['pop_name'])) ? " AND pop_name = {$filters['pop_name']}" : "";
    $response = array('data' => array());
    $conSql = "SELECT COUNT(pop_id) cnt FROM {$wpdb->prefix}eplm_popups {$wheCnd}";
    $response['total'] = $wpdb->get_var($conSql);
    $sql = "SELECT * FROM {$wpdb->prefix}eplm_popups  WHERE 1 =1{$wheCnd} and pop_type= 'Light' and (pop_visability_type =1 OR pop_visability_type_category = 1)  AND pop_status = 1 ORDER BY pop_id DESC LIMIT 1";
    $sql .= (!empty($limit)) ? " LIMIT {$limit} OFFSET {$offset}" : "";
    $results = $wpdb->get_results($sql);
    if (false !== $results) {
        $response['data'] = $results;
    }
    return $response;
}
function eplm_read_popups_theam_light_id($filters = '', $limit = 0, $offset = 0)
{
    global $wpdb;
    $wheCnd .= (isset($filters['pop_name'])) ? " AND pop_name = {$filters['pop_name']}" : "";
    $response = array('data' => array());
    $conSql = "SELECT COUNT(pop_id) cnt FROM {$wpdb->prefix}eplm_popups {$wheCnd}";
    $response['total'] = $wpdb->get_var($conSql);
    $sql = "SELECT  pop_id , pop_options FROM {$wpdb->prefix}eplm_popups  WHERE 1 =1{$wheCnd}  AND pop_status = 2 ORDER BY pop_id DESC ";
    $sql .= (!empty($limit)) ? " LIMIT {$limit} OFFSET {$offset}" : "";
    $results = $wpdb->get_results($sql);
    if (false !== $results) {
        $response['data'] = $results;
    }
    return $response;
}
/** use to create edit page  */
function eplm_create_edit_page()
{
    if (!current_user_can('administrator')) {
        wp_die(__('You do not have permissions to access this page!', 'eplm_popups'));
    }
    $pop_id = (isset($_GET['id'])) ? intval($_GET['id']) : 0;
    $popups = NULL;
    if (!empty($pop_id)) {
        $popups = eplm_read_popups($pop_id);
    }
    $options = array();
    $pop_name = '';
    if (is_object($popups) && !is_wp_error($popups)) {
        $options = unserialize($popups->pop_options);
        $pop_name = $popups->pop_name;
    }
    $options = wp_parse_args($options, '1');
    extract($options);
    include_once('pages/c_add_edit_popup.php');
}
function eplm_create_template_page()
{
    include_once('pages/template_page.php');
}
/** save popup function */
function eplm_save_popup()
{
    global $wpdb;
    $popup = array();
    $pop_id = (isset($_POST['pop_id'])) ? intval($_POST['pop_id']) : 0;
    $newSlider = $pop_id;
    if (isset($_POST['pop_name']) && !empty(sanitize_text_field($_POST['pop_name']))) {
        $popup['pop_name'] = sanitize_text_field($_POST['pop_name']);
    }


    if (isset($_POST['pop_status']) && (intval($_POST['pop_status']) == 1)) {
        $popup['pop_status'] = intval(intval($_POST['pop_status']));
    } else {
        $popup['pop_status'] = 0;
    }
    if (intval($_POST['temp_id']) == 6) {
        if (strpos(esc_html($_POST['pop_text']), 'start=') !== false) {

            $parsed = eplm_get_youtupe_start_time_string_between(wp_kses_post($_POST['pop_text']), 'start=', '"');
            $contentval = wp_kses_post($_POST['pop_text']);
            $video_id = '';

            if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $contentval, $match)) {
                $video_id = $match[1];
            }

            $popup['pop_yot_url'] = '<div class="embed-container"><iframe  src="https://www.youtube.com/embed/' . $video_id . '?start=' . $parsed . '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen ></iframe></div>';
            $eett = $popup['pop_yot_url'];
            //$popup['pop_text']= base64_encode($eett);
            $popup['pop_text'] = ($eett);
        } else {
            $contentval = wp_kses_post($_POST['pop_text']);
            $video_id = '';
            if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $contentval, $match)) {
                $video_id = $match[1];
            }
            $popup['pop_yot_url'] = '<div class="embed-container"><iframe  src="https://www.youtube.com/embed/' . $video_id . '" frameborder="0" allowfullscreen></iframe></div>';
            $eett = $popup['pop_yot_url'];
            // $popup['pop_text']= base64_encode($eett);
            $popup['pop_text'] = ($eett);
        }
    } else {
        if (isset($_POST['pop_text']) && !empty(esc_html($_POST['pop_text']))) {
            $popup['pop_text'] = wp_kses_post($_POST['pop_text']);
        }
    }

    if (isset($_POST['pop_shcode'])) {
        $popup['pop_shcode'] =  '[eplm_popup pop_id=';
    }
    if (isset($_POST['temp_id']) && !empty(intval($_POST['temp_id']))) {
        $popup['template_id'] =  intval($_POST['temp_id']);
    }
    $popup['pop_type'] =  sanitize_text_field($_POST['options']['popup_theam_type']);
    $popup['pop_visability_type'] = (isset($_POST['options']['post_types'])) ? intval($_POST['options']['post_types']) : 0;
    //1 = post type , 0 = sgortcode
    $popup['pop_options']['post_types'] = (isset($_POST['options']['post_types'])) ? intval($_POST['options']['post_types']) : 0;
    $popup['pop_visability_type_category'] = (isset($_POST['options']['Categories'])) ? intval($_POST['options']['Categories']) : 0;
    //1 = category type , 0 = sgortcode
    ///////////////////////// start dimension options ///////////////////////////////
    $popup['pop_options'] = (isset($_POST['options'])) ? $_POST['options'] : array();
    $popup['pop_options']['dimension'] = (isset($_POST['options']['dimension'])) ? sanitize_text_field($_POST['options']['dimension']) : 'responsive';
    if (sanitize_text_field($_POST['options']['popup_theam_type']) == 'Light') {
        $popup['pop_options']['popup_responsive_dimension_measure'] = (isset($_POST['options']['popup_responsive_dimension_measure'])) ? sanitize_text_field($_POST['options']['popup_responsive_dimension_measure']) : '50%';
    } else if (sanitize_text_field($_POST['options']['popup_theam_type']) == 'Slide') {
        $popup['pop_options']['popup_responsive_dimension_measure'] = (isset($_POST['options']['popup_responsive_dimension_measure'])) ? sanitize_text_field($_POST['options']['popup_responsive_dimension_measure']) : '100%';
    }
    $popup['pop_options']['di_width_val'] = (isset($_POST['options']['di_width_val']) && (!empty($_POST['options']['di_width_val']))) ? intval($_POST['options']['di_width_val']) : 0;
    $popup['pop_options']['di_hight_val'] = (isset($_POST['options']['di_hight_val']) && (!empty($_POST['options']['di_hight_val']))) ? intval($_POST['options']['di_hight_val']) : 0;
    $popup['pop_options']['di_max_width_val'] = (isset($_POST['options']['di_max_width_val']) && (!empty($_POST['options']['di_max_width_val']))) ? intval($_POST['options']['di_max_width_val']) : 0;
    $popup['pop_options']['di_max_hight_val'] = (isset($_POST['options']['di_max_hight_val']) && (!empty($_POST['options']['di_max_hight_val']))) ? intval($_POST['options']['di_max_hight_val']) : 0;
    ///////////////////////// end dimension options ////////////////////////////
    ///////////////////////// start Closing options ////////////////////////////
    $popup['pop_options']['showclosebtn'] = (isset($_POST['options']['showclosebtn'])) ? intval($_POST['options']['showclosebtn']) : 0;
    $popup['pop_options']['showtitlecheck'] = (isset($_POST['options']['showtitlecheck'])) ? intval($_POST['options']['showtitlecheck']) : 0;
    $defult_titel = sanitize_text_field($_POST['pop_name']);
    $popup['pop_options']['title_text'] = (isset($_POST['options']['title_text']) && (!empty(sanitize_text_field($_POST['options']['title_text'])))) ? sanitize_text_field($_POST['options']['title_text']) : $defult_titel;
    $popup['pop_options']['title_posi_sellect'] = (isset($_POST['options']['title_posi_sellect'])) ? sanitize_text_field($_POST['options']['title_posi_sellect']) : 'Left';
    $popup['pop_options']['title_font_color_picker'] = (isset($_POST['options']['title_font_color_picker'])) ? sanitize_text_field($_POST['options']['title_font_color_picker']) : 'black';
    $popup['pop_options']['Closingsellect'] = (isset($_POST['options']['Closingsellect'])) ? sanitize_text_field($_POST['options']['Closingsellect']) : 'Right';
    $popup['pop_options']['closebtntext'] = (isset($_POST['options']['closebtntext']) && (!empty($_POST['options']['closebtntext']))) ? sanitize_text_field($_POST['options']['closebtntext']) : 'Close';
    $popup['pop_options']['btnclose_color_picker'] = (isset($_POST['options']['btnclose_color_picker'])) ? sanitize_text_field($_POST['options']['btnclose_color_picker']) : "white";
    $popup['pop_options']['font_btnclose_color_picker'] = (isset($_POST['options']['font_btnclose_color_picker'])) ? sanitize_text_field($_POST['options']['font_btnclose_color_picker']) : 'white';
    $popup['pop_options']['showcloseicon'] = (isset($_POST['options']['showcloseicon'])) ? intval($_POST['options']['showcloseicon']) : 0;
    $popup['pop_options']['img_repeat'] = (isset($_POST['options']['img_repeat'])) ? intval($_POST['options']['img_repeat']) : 0;
    $popup['pop_options']['closeiconsellect'] = (isset($_POST['options']['closeiconsellect'])) ? sanitize_text_field($_POST['options']['closeiconsellect']) : 'Right';
    $popup['pop_options']['Icon_color_picker'] = (isset($_POST['options']['Icon_color_picker'])) ? sanitize_text_field($_POST['options']['Icon_color_picker']) : 'darkgray';
    $popup['pop_options']['iconsize'] = (isset($_POST['options']['iconsize']) && (!empty($_POST['options']['iconsize']))) ? sanitize_text_field($_POST['options']['iconsize']) : '30';
    $popup['pop_options']['escbtncheckbox'] = (isset($_POST['options']['escbtncheckbox'])) ? intval($_POST['options']['escbtncheckbox']) : 0;
    $popup['pop_options']['outerclose'] = (isset($_POST['options']['outerclose'])) ? intval($_POST['options']['outerclose']) : 0;
    $popup['pop_options']['closingtimebtn'] = (isset($_POST['options']['closingtimebtn'])) ? intval($_POST['options']['closingtimebtn']) : 0;
    $popup['pop_options']['closingtime'] = (isset($_POST['options']['closingtime']) && (!empty(intval($_POST['options']['closingtime'])))) ? intval($_POST['options']['closingtime']) : null;
    ///////////////////////// end Closing options ////////////////////////////
    ///////////////////////// start Styling options ////////////////////////////
    $popup['pop_options']['overlay_color'] = (isset($_POST['options']['overlay_color'])) ? intval($_POST['options']['overlay_color']) : 0;
    $popup['pop_options']['close_btn_Border_Style_sellect'] = (isset($_POST['options']['close_btn_Border_Style_sellect'])) ? sanitize_text_field($_POST['options']['close_btn_Border_Style_sellect']) : 'none';
    $popup['pop_options']['btnclose_Shadow_color_picker'] = (isset($_POST['options']['btnclose_Shadow_color_picker'])) ? sanitize_text_field($_POST['options']['btnclose_Shadow_color_picker']) : 'transparent';
    $popup['pop_options']['closebtnsize'] = (isset($_POST['options']['closebtnsize'])) ? sanitize_text_field($_POST['options']['closebtnsize'] . 'px') : '20px';
    $popup['pop_options']['titlesize'] = (isset($_POST['options']['titlesize'])) ? sanitize_text_field($_POST['options']['titlesize'] . 'px') : '17px';
    $popup['pop_options']['margin_val'] = (isset($_POST['options']['margin_val'])) ? sanitize_text_field($_POST['options']['margin_val'] . 'px') : '0px';
    $popup['pop_options']['closebtnpadding'] = (isset($_POST['options']['closebtnpadding'])) ? $_POST['options']['closebtnpadding'] : 3;
    $popup['pop_options']['closebtnb_radius'] = (isset($_POST['options']['closebtnb_radius'])) ? $_POST['options']['closebtnb_radius'] : 5;
    $popup['pop_options']['Overlay_color_picker'] = (isset($_POST['options']['Overlay_color_picker'])) ? sanitize_text_field($_POST['options']['Overlay_color_picker']) : 'blue';
    $popup['pop_options']['Background_Color'] = (isset($_POST['options']['Background_Color'])) ? intval($_POST['options']['Background_Color']) : 0;



    $popup['pop_options']['Content_custom_class'] = (isset($_POST['options']['Content_custom_class'])) ? intval($_POST['options']['Content_custom_class']) : 0;
    $popup['pop_options']['custom_css_Content'] = (isset($_POST['options']['custom_css_Content']) && (!empty($_POST['options']['custom_css_Content']))) ?  sanitize_text_field($_POST['options']['custom_css_Content']) : '';
    $popup['pop_options']['Overlay_custom_class'] = (isset($_POST['options']['Overlay_custom_class'])) ? intval($_POST['options']['Overlay_custom_class']) : 0;
    $popup['pop_options']['custom_css_class'] = (isset($_POST['options']['custom_css_class']) && (!empty($_POST['options']['custom_css_class']))) ?  sanitize_text_field($_POST['options']['custom_css_class']) : '';
    $popup['pop_options']['border_shadow_check'] = (isset($_POST['options']['border_shadow_check'])) ? intval($_POST['options']['border_shadow_check']) : 0;
    $popup['pop_options']['border_shadow_color_picker'] = (isset($_POST['options']['border_shadow_color_picker'])) ?  sanitize_text_field($_POST['options']['border_shadow_color_picker']) : 'rgb(255, 255, 255,0)';
    $popup['pop_options']['Background_Image'] = (isset($_POST['options']['Background_Image'])) ? intval($_POST['options']['Background_Image']) : 0;
    $popup['pop_options']['Background_Opacity_Color'] = (isset($_POST['options']['Background_Opacity_Color'])) ? intval($_POST['options']['Background_Opacity_Color']) : 0;
    $popup['pop_options']['Opacity_color_picker'] = (isset($_POST['options']['Opacity_color_picker'])) ?  sanitize_text_field($_POST['options']['Opacity_color_picker']) : 'black';
    $popup['pop_options']['pop_back_image'] = (isset($_POST['options']['pop_back_image'])) ? sanitize_text_field($_POST['options']['pop_back_image']) : '';

    $popup['pop_options']['color_picker'] = (isset($_POST['options']['color_picker'])) ? sanitize_text_field($_POST['options']['color_picker']) : "#ffffff";
    $popup['pop_options']['popup_Opacity_myRange'] = (isset($_POST['options']['popup_Opacity_myRange'])) ? doubleval($_POST['options']['popup_Opacity_myRange']) : 1;
    $popup['pop_options']['header_color_picker'] = (isset($_POST['options']['header_color_picker'])) ? sanitize_text_field($_POST['options']['header_color_picker']) : '#ffffff';
    $popup['pop_options']['footer_color_picker'] = (isset($_POST['options']['footer_color_picker'])) ? sanitize_text_field($_POST['options']['footer_color_picker']) : '#ffffff';


    $popup['pop_options']['Background_trncfer_check'] = (isset($_POST['options']['Background_trncfer_check'])) ? intval($_POST['options']['Background_trncfer_check']) : 0;
    ///////////////////////// end Styling options ////////////////////////////
    ///////////////////////// start Appearance options ////////////////////////////
    $popup['pop_options']['popup_theam_type'] = (isset($_POST['options']['popup_theam_type'])) ? sanitize_text_field($_POST['options']['popup_theam_type']) : 'Light';
    if ($_POST['options']['popup_theam_type'] == 'Slide') {
        $popup['pop_options']['slideoptradio'] = (isset($_POST['options']['slideoptradio'])) ? sanitize_text_field($_POST['options']['slideoptradio']) : 'Slide_box';
    } else {
        $popup['pop_options']['slideoptradio'] = '';
    }
    $popup['pop_options']['slide_Border_color_picker'] = (isset($_POST['options']['slide_Border_color_picker'])) ? sanitize_text_field($_POST['options']['slide_Border_color_picker']) : 0;
    $popup['pop_options']['slide-Border-colorpicker_value'] = (isset($_POST['options']['slide-Border-colorpicker_value'])) ? sanitize_text_field($_POST['options']['slide-Border-colorpicker_value']) : 0;
    if ($_POST['options']['popup_theam_type'] == 'Light') {
        $popup['pop_options']['Animation'] = (isset($_POST['options']['Animation'])) ? intval($_POST['options']['Animation']) : 1;
        $popup['pop_options']['animate_sellect'] = (isset($_POST['options']['animate_sellect'])) ? sanitize_text_field($_POST['options']['animate_sellect']) : '';
        $popup['pop_options']['old_animate_val'] = (isset($_POST['options']['old_animate_val'])) ?  sanitize_text_field($_POST['options']['old_animate_val']) : '';
        $popup['pop_options']['animate_val'] = (isset($_POST['options']['animate_val'])) ?  sanitize_text_field($_POST['options']['animate_val']) : '';
    } else if ($_POST['options']['popup_theam_type'] == 'Slide') {
        $popup['pop_options']['animate_sellect'] = '';
    }
    $popup['pop_options']['Opacity_demo'] = (isset($_POST['options']['Opacity_demo'])) ? intval($_POST['options']['Opacity_demo']) : 0.5;
    $popup['pop_options']['Opacity_myRange'] = (isset($_POST['options']['Opacity_myRange'])) ? doubleval($_POST['options']['Opacity_myRange']) : 0.5;
    $popup['pop_options']['pading_demo'] = (isset($_POST['options']['pading_demo'])) ? intval($_POST['options']['pading_demo']) : 10;
    $popup['pop_options']['$pading_myRange'] = (isset($_POST['options']['$pading_myRange'])) ? intval($_POST['options']['$pading_myRange'])  : 10;
    $popup['pop_options']['pading_myRange'] = (isset($_POST['options']['pading_myRange'])) ? intval($_POST['options']['pading_myRange']) : 10;
    $popup['pop_options']['use_cooki'] = (isset($_POST['options']['use_cooki'])) ? intval($_POST['options']['use_cooki']) : 0;
    $popup['pop_options']['radious_Top_Lift'] = (isset($_POST['options']['radious_Top_Lift']) && (!empty($_POST['options']['radious_Top_Lift']))) ? intval($_POST['options']['radious_Top_Lift']) : 0;
    $popup['pop_options']['radious_Top_Right'] = (isset($_POST['options']['radious_Top_Right']) && (!empty($_POST['options']['radious_Top_Right']))) ? intval($_POST['options']['radious_Top_Right']) : 0;
    $popup['pop_options']['Bottom_Top_Lift'] = (isset($_POST['options']['Bottom_Top_Lift']) && (!empty($_POST['options']['Bottom_Top_Lift']))) ? intval($_POST['options']['Bottom_Top_Lift']) : 0;
    $popup['pop_options']['Bottom_Top_Right'] = (isset($_POST['options']['Bottom_Top_Right']) && (!empty($_POST['options']['Bottom_Top_Right']))) ? intval($_POST['options']['Bottom_Top_Right']) : 0;
    $popup['pop_options']['Border_Style_sellect'] = (isset($_POST['options']['Border_Style_sellect'])) ? sanitize_text_field($_POST['options']['Border_Style_sellect']) : 'solid';
    $popup['pop_options']['Thickness_demo'] = (isset($_POST['options']['Thickness_demo'])) ? sanitize_text_field($_POST['options']['Thickness_demo']) : '1';
    $popup['pop_options']['Thickness_myRange'] = (isset($_POST['options']['Thickness_myRange'])) ? sanitize_text_field($_POST['options']['Thickness_myRange']) : '1';
    /// ///////////////////////// end Appearance options ////////////////////////////
    ///////////////////////// start Visibility options ////////////////////////////
    $popup['pop_options']['st_types'] = (isset($_POST['options']['st_types'])) ? intval($_POST['options']['st_types']) : 0;
    $vis_p_type = sanitize_text_field($_POST['options']['aaa']);
    $vis_p_type_array = explode(',', $vis_p_type);
    $popup['pop_options']['popup_vesability_post'] =  $vis_p_type_array;
    $vis_cat_type = sanitize_text_field($_POST['options']['aaacat']);
    $vis_p_category_array = explode(',', $vis_cat_type);
    $popup['pop_options']['popup_vesability_category'] =  $vis_p_category_array;
    $popup['pop_options']['Categories'] = (isset($_POST['options']['Categories'])) ? intval($_POST['options']['Categories']) : 0;
    $popup['pop_options']['scrolling'] = (isset($_POST['options']['scrolling'])) ? intval($_POST['options']['scrolling']) : 0;
    $popup['pop_options']['loading'] = (isset($_POST['options']['loading'])) ? intval($_POST['options']['loading']) : 1;
    $popup['pop_options']['loadingtime'] = (isset($_POST['options']['loadingtime']) && (!empty($_POST['options']['loadingtime']))) ? intval($_POST['options']['loadingtime']) : 1;
    $popup['pop_options']['mobile'] = (isset($_POST['options']['mobile'])) ? intval($_POST['options']['mobile']) : 0;
    $popup['pop_options']['daterange'] = (isset($_POST['options']['daterange'])) ? intval($_POST['options']['daterange']) : 0;
    $popup['pop_options']['bday'] = (isset($_POST['options']['bday']) && (!empty($_POST['options']['bday']))) ? date("Y-m-d", strtotime($_POST['options']['bday'])) : null;
    $popup['pop_options']['eday'] = (isset($_POST['options']['eday']) && (!empty($_POST['options']['eday']))) ? date("Y-m-d", strtotime($_POST['options']['eday'])) : null;
    ///////////////////////// end Visibility options ////////////////////////////
    //////////////////////// start popup type ///////////////////////////////////
    $popup['pop_options']['popup_type_sellect'] = (isset($_POST['options']['popup_type_sellect'])) ? sanitize_text_field($_POST['options']['popup_type_sellect']) : 'HTML';
    $popup['pop_options']['theames'] = (isset($_POST['options']['theames'])) ? sanitize_text_field($_POST['options']['theames']) : 'non';
    $popup['pop_options']['cookioption'] = (isset($_POST['options']['cookioption'])) ? sanitize_text_field($_POST['options']['cookioption']) : 'all';
    $popup['pop_options']['header_Border_color_picker'] = (isset($_POST['options']['header_Border_color_picker'])) ? sanitize_text_field($_POST['options']['header_Border_color_picker']) : '';
    $popup['pop_options']['fotter_Border_color_picker'] = (isset($_POST['options']['fotter_Border_color_picker'])) ? sanitize_text_field($_POST['options']['fotter_Border_color_picker']) : '';
    $popup['pop_options']['usetemplate_y_n'] = (isset($_POST['options']['usetemplate_y_n'])) ? intval($_POST['options']['usetemplate_y_n']) : 0;
    $popup['pop_options']['current_emplate'] = (isset($_POST['options']['current_emplate'])) ? sanitize_text_field($_POST['options']['current_emplate']) : 'temp_1';
    $popup['pop_options']['showcancelbtn'] = (isset($_POST['options']['showcancelbtn'])) ? intval($_POST['options']['showcancelbtn']) : 0;
    $popup['pop_options']['cancelbtntext'] = (isset($_POST['options']['cancelbtntext'])) ? sanitize_text_field($_POST['options']['cancelbtntext']) : 'Cancel';
    $popup['pop_options']['booton_color_picker'] = (isset($_POST['options']['booton_color_picker'])) ? sanitize_text_field($_POST['options']['booton_color_picker']) : '#ef3737';
    $popup['pop_options']['post_types'] = (isset($_POST['options']['post_types'])) ? intval($_POST['options']['post_types']) : 0;
    $popup['pop_options']['header_p_top'] = (isset($_POST['options']['header_p_top'])) ? sanitize_text_field($_POST['options']['header_p_top'] . 'px') : '0px';
    $popup['pop_options']['header_p_bottom'] = (isset($_POST['options']['header_p_bottom'])) ? sanitize_text_field($_POST['options']['header_p_bottom'] . 'px') : '0px';
    $popup['pop_options']['header_p_right'] = (isset($_POST['options']['header_p_right'])) ? sanitize_text_field($_POST['options']['header_p_right'] . 'px') : '0px';
    $popup['pop_options']['header_p_left'] = (isset($_POST['options']['header_p_left'])) ? sanitize_text_field($_POST['options']['header_p_left'] . 'px') : '0px';
    $popup['pop_options']['content_p_top'] = (isset($_POST['options']['content_p_top'])) ? sanitize_text_field($_POST['options']['content_p_top'] . 'px') : '0px';
    $popup['pop_options']['content_p_bottom'] = (isset($_POST['options']['content_p_bottom'])) ? sanitize_text_field($_POST['options']['content_p_bottom'] . 'px') : '0px';
    $popup['pop_options']['content_p_right'] = (isset($_POST['options']['content_p_right'])) ? sanitize_text_field($_POST['options']['content_p_right'] . 'px') :  '0px';
    $popup['pop_options']['content_p_left'] = (isset($_POST['options']['content_p_left'])) ? sanitize_text_field($_POST['options']['content_p_left'] . 'px') : '0px';
    $popup['pop_options']['footer_p_top'] = (isset($_POST['options']['footer_p_top'])) ? sanitize_text_field($_POST['options']['footer_p_top'] . 'px') : '0px';
    $popup['pop_options']['footer_p_bottom'] = (isset($_POST['options']['footer_p_bottom'])) ? sanitize_text_field($_POST['options']['footer_p_bottom'] . 'px') : '0px';
    $popup['pop_options']['footer_p_right'] = (isset($_POST['options']['footer_p_right'])) ? sanitize_text_field($_POST['options']['footer_p_right'] . 'px') :  '0px';
    $popup['pop_options']['footer_p_left'] = (isset($_POST['options']['footer_p_left'])) ? sanitize_text_field($_POST['options']['footer_p_left'] . 'px') : '0px';
    $popup['pop_options']['close_btn_height'] = (isset($_POST['options']['close_btn_height'])) ? sanitize_text_field($_POST['options']['close_btn_height'] . 'px') : '30px';
    $popup['pop_options']['close_btn_width'] = (isset($_POST['options']['close_btn_width'])) ? sanitize_text_field($_POST['options']['close_btn_width'] . 'px') : '100px';

    //////////////////////// end popup type ///////////////////////////////////
    $popup['pop_options'] = serialize($popup['pop_options']);
    // $popup['pop_options']= base64_encode( $popup['pop_options']);
    $success = false;
    $wpdb->query("START TRANSACTION");
    if ($pop_id > 0) {
        $success = (false !== $wpdb->update($wpdb->prefix . 'eplm_popups', $popup, array('pop_id' => $pop_id), array('%s', '%s'), array('%d')));
    } else {
        $success = $wpdb->insert($wpdb->prefix . 'eplm_popups', $popup, array('%s', '%s'));
        $pop_id = $wpdb->insert_id;
    }
    if (isset($_POST['image_attachment_id'])) {
        update_option('media_selector_attachment_id' . $pop_id, absint($_POST['image_attachment_id']));
    }
    $idParam = "";
    if ($success) {
        $wpdb->query("COMMIT");
        // url(' . plugins_url('images/success_24.png', eplm_PLUGIN_MAIN_FILE) .') 
        echo '<div style="padding: 10px 10px 10px 40px; margin: 20px 10px; background: #CCEBC9 no-repeat 10px 10px; border: solid 1px #B0DEA9; color: #508232;">' .
            __('Popup has been saved successfully') . '</div>';
        echo '<script type="text/javascript">
            setTimeout(function() {
                window.location.href = "' . esc_url(get_admin_url(null, 'admin.php?page=eplm_popups')) . '";
            }, 1500);
        </script>';
        $idParam = "&id=" . $pop_id;
    } else {
        $wpdb->query("ROLLBACK");
        echo '<div style="padding: 10px 10px 10px 40px; margin: 20px 10px; background: #EACBC9 url(' .
            plugins_url('images/error_24.png', eplm_PLUGIN_MAIN_FILE) .
            ') no-repeat 10px 10px; border: solid 1px #DDB0AA; color: #7F3331;">' .
            __('Saving process has failed') . '</div>';
        $idParam = ($newSlider) ? "" : "&id=" . $pop_id;
    }
    $prevval = $_POST['hreflocation2'];
    $saveval = $_POST['hreflocation'];
    if ($prevval == 1 && $saveval == 0) {
        echo '<script type="text/javascript">
	 window.location.href = "' . get_admin_url(NULL, "admin.php?page=eplm_popups_edit" . $idParam) . '";
		</script>';
    } else if ($prevval == 0 && $saveval == 0) {
        echo '<script type="text/javascript">
	 window.location.href = "' . get_admin_url(NULL, "admin.php?page=eplm_popups") . '";
		</script>';
    }
}
function eplm_read_popup($pop_id)
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'eplm_popups';
    $popup = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE pop_id = %d AND pop_status = 1", $pop_id));
    return $popup;
}
function eplm_read_template_name($temp_id)
{
    global $wpdb;
    $sql = "SELECT temp_name FROM `{$wpdb->prefix}eplm_popups_template` WHERE temp_id = %d";
    return $wpdb->get_row($wpdb->prepare($sql, $temp_id), OBJECT);
}
function eplm_read_popup_id_by_active($pop_status)
{
    global $wpdb;
    $sql = "SELECT * FROM `{$wpdb->prefix}eplm_popups` WHERE pop_status = %d";
    return $wpdb->get_row($wpdb->prepare($sql, $pop_status), OBJECT);
}
function eplm_render_popup($pop_id)
{

    $pop_id = (int)$pop_id;
    $popup = NULL;
    if (!empty($pop_id)) {
        $popup = eplm_read_popup($pop_id);
    }
    $options = array();
    if (!is_object($popup) || is_wp_error($popup)) {
        return;
    }
    $options = $popup->pop_options;
    //  $options = base64_decode($options);
    //  $options = html_entity_decode($options, ENT_QUOTES);
    $options = unserialize($options);
    extract((array)$popup);
    extract((array)$options);
    if (!is_admin()) {
        wp_enqueue_style('eplm_style', plugins_url('includes/bootstrap/eplm_style.css', eplm_PLUGIN_MAIN_FILE), array(), '1.6');
        wp_enqueue_style('bootstrap', plugins_url('includes/bootstrap/bootstrap.min.css', eplm_PLUGIN_MAIN_FILE));
        wp_enqueue_script('my_js_script', plugins_url('includes/bootstrap/js/my_js_script.js', eplm_PLUGIN_MAIN_FILE));
    }
    if ((isset($post_types) && $post_types == 1) || (isset($Categories) && $Categories == 1)) {
        if (isset($categories)) {
            $categories = get_the_category();
            $category_id = $categories[0]->cat_ID;
        } else {
            $category_id = null;
        }
        if (in_array(get_post_type(get_the_ID()), $popup_vesability_post) || is_front_page() || in_array($category_id, $popup_vesability_category)) {
            if ($popup_type_sellect == 'I Frame') {
                $content = $iframe;
            } else if ($popup_type_sellect == 'HTML') {
                $content = ($pop_text);
                // $content = base64_decode($pop_text);
            } else if ($popup_type_sellect == 'Video') {
                $content = $video;
            }

            $datecondition = eplm_isToday($bday);
            $dateconditionend = eplm_isToday($eday);
            $body_back_ground_color = eplm_conver_hex_to_rgba($color_picker, $popup_Opacity_myRange);
            $footer_back_ground_color = eplm_conver_hex_to_rgba($footer_color_picker, $popup_Opacity_myRange);
            $header_back_ground_color = eplm_conver_hex_to_rgba($header_color_picker, $popup_Opacity_myRange);
            if ($template_id == 7) {
                if (!empty($pop_id)) {
                    $popups = wp_get_attachment_url(get_option('media_selector_attachment_id' . $pop_id));
                }
                $content = '<img id="' . $pop_id . '"  src="';
                $content .= $popups;
                $content .= '"  class="eplm_image_thumbnial">';
            } else {
                //$content = base64_decode($pop_text);
                $content = ($pop_text);
            }
            $Background_options = $Background_options ?? 0;
            $backround_position = $backround_position ?? '';
            $mystring = <<<EOT
<div class="eplm_popupmodal   " id="popup_modal_$pop_id" >
<div id="popup_header_$pop_id" class="eplm_popup_header col-lg-12 col-md-12 col-sm-12 col-xs-12 wpoc-field">
<div class="eplm_popup_header col-lg-12 col-md-12 col-sm-12 col-xs-12 wpoc-field"  ">
<div class="cn">
<b class="innertitle" style="display: inline;" id="title_tag_$pop_id"> $title_text</b>
<span class="closepopup_icon innerx" id="closepopup_$pop_id"> &times; </span>        
</div>
</div>
</div>
<div id="popup_content_$pop_id" class="eplm_popup_content col-lg-12 col-md-12 col-sm-12 col-xs-12 wpoc-field">
  
 $content
</div>
<div class="eplm_popup_footer  col-lg-12 col-md-12 col-sm-12 col-xs-12 wpoc-field" id="popup_footer_$pop_id">
<div id="bottoncenterdiv_$pop_id" class="">
<button id="close_popup_$pop_id" class="eplm_closepopup">Close</button>
<button id="cancel_popup_$pop_id" class="eplm_closepopup ">Close</button>
</div>
</div>
</div>
<div class="coverpopup" id="pop_cover_$pop_id"></div>
<script> 
var $ = jQuery;
if ('$use_cooki' == 1) {
    if ('$cookioption' == 'all') {
        jQuery('#close_popup_$pop_id').attr('onClick', 'eplm_set_cookie($pop_id);');
        jQuery('#closepopup_$pop_id').attr('onClick', 'eplm_set_cookie($pop_id);');
    } else if ('$cookioption' == 'icon') {
        jQuery('#closepopup_$pop_id').attr('onClick', 'eplm_set_cookie($pop_id);');
    } else if ('$cookioption' == 'button') {
        jQuery('#close_popup_$pop_id').attr('onClick', 'eplm_set_cookie($pop_id);');
    }
}
var eplm_cooki_name = 'eplm_' + $pop_id;
if (localStorage.getItem(eplm_cooki_name) != 1) {
    /* start_dimension_block*/
    if ('$dimension' == 'responsive') {
        jQuery("#responsive_options").show('fast');
        jQuery("#custom_options").hide();
        if ('$popup_responsive_dimension_measure' == 'auto') {
            if ('$template_id' == 6 || '$template_id' == 7) {
                jQuery("#popup_modal_$pop_id").css('width', '560px');
            } else {
                jQuery("#popup_modal_$pop_id").css('width', '$popup_responsive_dimension_measure');
            }
        } else {
            jQuery("#popup_modal_$pop_id").css('width', '$popup_responsive_dimension_measure');
        }
    }
    else if ('$dimension' == 'Custom') {
        jQuery("#responsive_options").hide();
        jQuery("#custom_options").show('fast');
        jQuery("#popup_modal_$pop_id").css('width', '$di_width_val%');
        jQuery("#popup_content_$pop_id").css('height', '$di_hight_val%');
        if ('$di_max_hight_val' != 0) {
            jQuery("#popup_modal_$pop_id").css('max-height', '$di_max_hight_val%');
        }
        if ('$di_max_width_val' != 0) {
            jQuery("#popup_modal_$pop_id").css('max-width', '$di_max_width_val%');
        }
    }
    /* end_dimension_block*/
    /*start_closing_block*/
    jQuery("#title_tag_$pop_id").css("color", "$title_font_color_picker");
    jQuery("#title_tag_$pop_id").css("float", "$title_posi_sellect");
    if ('$showclosebtn' == '1') {
        if ('$Closingsellect' == '50%') {
            jQuery("#bottoncenterdiv_$pop_id").addClass("d-flex justify-content-center");
            jQuery("#close_popup_$pop_id").addClass("d-flex justify-content-center");
        }
        else {
            jQuery("#close_popup_$pop_id").css({float: '$Closingsellect'});
        }
        jQuery("#close_popup_$pop_id").text('$closebtntext');
        jQuery("#close_popup_$pop_id").css({backgroundColor: '$btnclose_color_picker'});
        jQuery("#close_popup_$pop_id").css({color: '$font_btnclose_color_picker'});
    } else {
        jQuery('#close_popup_$pop_id').hide();
    }
    if ('$showcancelbtn' == '1' || '$showcancelbtn' == 1) {
        if ('$Closingsellect' == '50%') {
            jQuery("#cancel_popup_$pop_id").css({marginLeft: '0px'});
        } else {
            jQuery("#cancel_popup_$pop_id").css({marginLeft: '$Closingsellect'});
        }
        jQuery("#cancel_popup_$pop_id").css({float: '$Closingsellect'});
        jQuery("#cancel_popup_$pop_id").text('$cancelbtntext');
        jQuery("#cancel_popup_$pop_id").css({backgroundColor: '$booton_color_picker'});
        jQuery("#cancel_popup_$pop_id").css({color: '$font_btnclose_color_picker'});
    } else {
        jQuery('#cancel_popup_$pop_id').hide();
    }
    if ('$showclosebtn' == '0' && '$showcancelbtn' == '0') {
        jQuery('#popup_footer_$pop_id').hide();
    }
    jQuery('#close_popup_$pop_id').click(function () {
        jQuery("#pop_cover_$pop_id").hide();
        jQuery("#popup_modal_$pop_id").hide();
    });
    jQuery('#cancel_popup_$pop_id').click(function () {
        jQuery("#pop_cover_$pop_id").hide();
        jQuery("#popup_modal_$pop_id").hide();
    });
    if ('$showcloseicon' == 1) {
        jQuery("#closepopup_$pop_id").css("float", "$closeiconsellect");
        jQuery("#closepopup_$pop_id").css({color: '$Icon_color_picker'});
        jQuery("#closepopup_$pop_id").css("fontSize", $iconsize);
    }
    jQuery('#closepopup_$pop_id').click(function () {
        jQuery("#pop_cover_$pop_id").hide();
        jQuery("#popup_modal_$pop_id").hide();
    });
    if ('$escbtncheckbox' == 1) {
        jQuery(document).keydown(function (event) {
            if (event.keyCode == 27) {
               
                jQuery("#pop_cover_$pop_id").css("display", "none");
                jQuery("#popup_modal_$pop_id").css("display", "none");
                 document.getElementById("popup_content_$pop_id").innerHTML = "";
            }
        });
    }
     jQuery("#popup_modal_$pop_id").css({backgroundColor: 'transparent'});
    if ('$outerclose' == 1) {
        jQuery("#pop_cover_$pop_id").click(function () {
            jQuery("#pop_cover_$pop_id").css("display", "none");
            jQuery("#popup_modal_$pop_id").css("display", "none");
            document.getElementById("popup_content_$pop_id").innerHTML = "";
        });
    }
    /*end_closing_block*/
    /*start_styling_block*/
    if ('$color_picker' == "") {
        jQuery("#popup_content_$pop_id").css({backgroundColor: 'transparent'});
       
    } else {
        jQuery("#popup_content_$pop_id").css({backgroundColor: '$body_back_ground_color'});
       
    }
     jQuery("#popup_header_$pop_id").css({backgroundColor: '$header_back_ground_color'});
        jQuery("#popup_footer_$pop_id").css({backgroundColor: '$footer_back_ground_color'});
    jQuery("#pop_cover_$pop_id").css({backgroundColor: '$Opacity_color_picker'});
    jQuery("#popup_modal_$pop_id").css('border-style', '$Border_Style_sellect');
     if('$slide_Border_color_picker'!==''){
    jQuery("#popup_modal_$pop_id").css('border-color', '$slide_Border_color_picker');
    }else{
     jQuery("#popup_modal_$pop_id").css('border-color', 'transparent');
    }
     if('$header_Border_color_picker'!=='')
     { jQuery("#popup_header_$pop_id").css('border-bottom', 'solid 1px $header_Border_color_picker');
     }
      if('$fotter_Border_color_picker'!==''){
    jQuery("#popup_footer_$pop_id").css('border-top', 'solid 1px $fotter_Border_color_picker');
    }
  
   
    if ('$border_shadow_check' == 1) {
       
        
    if('$border_shadow_color_picker' == '' )
{
     jQuery("#popup_modal_$pop_id").css('box-shadow', 'unset');
}else
{
 jQuery("#popup_modal_$pop_id").css('box-shadow', ' 0px 0px 10px $border_shadow_color_picker');
}
    }
    
    if ('$border_shadow_check' == 0) {
        jQuery("#popup_modal_$pop_id").css('border', 'none');
    }
    if ('$img_repeat' == 1) {
        jQuery("#popup_modal_$pop_id").css({'background-repeat': 'repeat'});
    } else {
        jQuery("#popup_modal_$pop_id").css({'background-repeat': 'no-repeat'});
    }
    jQuery("#popup_modal_$pop_id").css('background-position', '$backround_position');
    jQuery("#pop_cover_$pop_id").css('opacity', '$Opacity_myRange');
    /* border raduas option*/
    jQuery("#popup_modal_$pop_id").css({
        BorderTopRightRadius: $radious_Top_Right,
        BorderBottomRightRadius: $Bottom_Top_Right,
        BorderTopLeftRadius: $radious_Top_Lift,
        BorderBottomLeftRadius: $Bottom_Top_Lift
    }); 
     jQuery("#popup_header_$pop_id").css({
        BorderTopRightRadius: $radious_Top_Right,
        BorderTopLeftRadius: $radious_Top_Lift,
    });
    jQuery("#popup_footer_$pop_id").css({
         BorderBottomRightRadius: $Bottom_Top_Right,
         BorderBottomLeftRadius: $Bottom_Top_Lift
    });
    jQuery("#popup_modal_$pop_id").css('border-width', '$Thickness_myRange');
    if ('$slideoptradio' == 'Top_bottom') {
        jQuery("#popup_modal_$pop_id").removeClass("eplm_popupmodal").addClass("popupmodalslidedwon");
        jQuery("#popup_modal_$pop_id").addClass("slideInDown");
        jQuery("#pop_cover_$pop_id").hide();
    }
    else if ('$slideoptradio' == 'Slide_box') {
        jQuery("#popup_modal_$pop_id").removeClass("eplm_popupmodal").addClass("popupmodalslide");
        jQuery("#pop_cover_$pop_id").hide();
    }
    else if ('$slideoptradio' == 'Left_Right') {
        jQuery("#popup_modal_$pop_id").removeClass("eplm_popupmodal").addClass("popupmodalslidedwon");
        jQuery("#popup_modal_$pop_id").addClass("slideInLeft");
        jQuery("#popup_modal_$pop_id").css({left: 0});
    } else if ('$slideoptradio' == 'Right_Left') {
        jQuery("#popup_modal_$pop_id").removeClass("eplm_popupmodal").addClass("popupmodalslidedwon");
        jQuery("#popup_modal_$pop_id").addClass("slideInRight");
        jQuery("#popup_modal_$pop_id").css({top: 10});
        jQuery("#popup_modal_$pop_id").css({right: 0});
    }
    var runpoptime = '$loadingtime';
    setTimeout(function () {
        jQuery("#popup_modal_$pop_id").show('fast');
        jQuery("#pop_cover_$pop_id").show('fast');
    }, runpoptime * 1000);
  
    if ('$scrolling' == 1) {
        window.onscroll = function () {
            jQuery("#popup_modal_$pop_id").show('fast');
            jQuery("#pop_cover_$pop_id").show('fast');
        };
    }
    /*end_visibilty_block*/
    if ('$closingtimebtn' == 1) {
        var closetime = '$closingtime';
        setTimeout(function () {
            jQuery("#pop_cover_$pop_id").hide();
            jQuery("#popup_modal_$pop_id").hide();
        }, closetime * 1000);
    }
    if ('$showtitlecheck' == 0) {
        jQuery('#title_tag_$pop_id').css("display", "none");
    }
    if ('$showcloseicon' == 0 && $showtitlecheck == 0) {
        jQuery('#popup_header_$pop_id').hide();
    }
    if ('$showcloseicon' == 0 || '$showcloseicon' == '0') {
        jQuery("#closepopup_$pop_id").css("display", "none");
    }
    if ('$popup_theam_type' == 'Slide') {
        jQuery("#pop_cover_$pop_id").css('opacity', '0');
    }

    jQuery("#title_tag_$pop_id").css("font-size", "$titlesize");
    jQuery("#title_tag_$pop_id").css('padding', '0px');
    jQuery("#title_tag_$pop_id").css('padding-top', '5px');

if('$btnclose_Shadow_color_picker' == '' )
{
 jQuery("#close_popup_$pop_id").css('box-shadow', 'unset');
    jQuery("#cancel_popup_$pop_id").css('box-shadow', 'unset');
}else
{
jQuery("#close_popup_$pop_id").css('box-shadow', ' 0px 0px 10px  $btnclose_Shadow_color_picker');
jQuery("#cancel_popup_$pop_id").css('box-shadow', ' 0px 0px 10px  $btnclose_Shadow_color_picker');
}
    
    jQuery("#close_popup_$pop_id").css('border-style', '$close_btn_Border_Style_sellect');
    jQuery("#cancel_popup_$pop_id").css('border-style', '$close_btn_Border_Style_sellect');
    jQuery("#close_popup_$pop_id").css('padding', '$closebtnpadding');
    jQuery("#cancel_popup_$pop_id").css('padding', '$closebtnpadding');

    jQuery("#close_popup_$pop_id").css("font-size", "$closebtnsize");
    jQuery("#cancel_popup_$pop_id").css("font-size", "$closebtnsize");
    jQuery("#close_popup_$pop_id").css("width", '$close_btn_width');
    jQuery("#cancel_popup_$pop_id").css("width", '$close_btn_width');
    jQuery("#close_popup_$pop_id").css("height", '$close_btn_height');
    jQuery("#cancel_popup_$pop_id").css("height", '$close_btn_height');
    var line_hight = parseInt('$close_btn_height')-(parseInt('$closebtnpadding')*2);
     jQuery("#close_popup_$pop_id").css("line-height", line_hight+'px');
    jQuery("#cancel_popup_$pop_id").css("line-height", line_hight+'px');
    jQuery("#close_popup_$pop_id").css({
        BorderTopRightRadius: $closebtnb_radius,
        BorderBottomRightRadius: $closebtnb_radius,
        BorderTopLeftRadius: $closebtnb_radius,
        BorderBottomLeftRadius: $closebtnb_radius
    });
    jQuery("#cancel_popup_$pop_id").css({
        BorderTopRightRadius: $closebtnb_radius,
        BorderBottomRightRadius: $closebtnb_radius,
        BorderTopLeftRadius: $closebtnb_radius,
        BorderBottomLeftRadius: $closebtnb_radius
    });
    jQuery("#popup_modal_$pop_id").css({marginRight: '$margin_val'});
    jQuery("#popup_modal_$pop_id").css({marginLeft: '$margin_val'});
    jQuery("#popup_modal_$pop_id").css('margin-top', '$margin_val');
    jQuery("#popup_modal_$pop_id").css('margin-bottom', '$margin_val');
    if ('$daterange' == 1) {
        if ('$datecondition' == 'content') {
            jQuery("#popup_modal_$pop_id").css("display", "block");
            jQuery("#pop_cover_$pop_id").css("display", "block");
        } else if ('$datecondition' == 'rolback') {
            jQuery("#pop_cover_$pop_id").addClass("daterangetime");
            jQuery("#popup_modal_$pop_id").addClass("daterangetime");
        }
        if ('$dateconditionend' == 'content') {
            jQuery("#pop_cover_$pop_id").addClass("daterangetime");
            jQuery("#popup_modal_$pop_id").addClass("daterangetime");
        }
    }
      if('$pop_back_image'!=='')
    {
     jQuery("#popup_modal_$pop_id").css('background-image', 'url("$pop_back_image")');
      jQuery("#popup_content_$pop_id").css({backgroundColor: 'transparent'});
jQuery("#popup_header_$pop_id").css({backgroundColor: 'transparent'});
  jQuery("#popup_footer_$pop_id").css({backgroundColor: 'transparent'});
    }
    jQuery("#popup_header_$pop_id").css('padding-top', '$header_p_top');
    jQuery("#popup_header_$pop_id").css('padding-bottom', '$header_p_bottom');
    jQuery("#popup_header_$pop_id").css('padding-right', '$header_p_right');
    jQuery("#popup_header_$pop_id").css('padding-left', '$header_p_left');
    jQuery("#popup_content_$pop_id").css('padding-top', '$content_p_top');
    jQuery("#popup_content_$pop_id").css('padding-bottom', '$content_p_bottom');
    jQuery("#popup_content_$pop_id").css('padding-right', '$content_p_right');
    jQuery("#popup_content_$pop_id").css('padding-left', '$content_p_left');
    jQuery("#popup_footer_$pop_id").css('padding-top', '$footer_p_top');
    jQuery("#popup_footer_$pop_id").css('padding-bottom', '$footer_p_bottom');
    jQuery("#popup_footer_$pop_id").css('padding-right', '$footer_p_right');
    jQuery("#popup_footer_$pop_id").css('padding-left', '$footer_p_left');
    if(('$Background_options' == '0') || ('$Background_options' == 0))
    {
    jQuery("#popup_footer_$pop_id").css({backgroundColor: 'white'});
    jQuery("#popup_content_$pop_id").css({backgroundColor: 'white'});
    jQuery("#popup_header_$pop_id").css({backgroundColor: 'white'});
    jQuery("#pop_cover_$pop_id").css('opacity', '0.4');
    jQuery("#pop_cover_$pop_id").css({backgroundColor: 'black'});
    jQuery("#popup_modal_$pop_id").css('background-image', 'none');
    jQuery("#popup_modal_$pop_id").css({marginRight: '0px'});
    jQuery("#popup_modal_$pop_id").css({marginLeft: '0px'});
    jQuery("#popup_modal_$pop_id").css({marginTop: '0px'});
    jQuery("#popup_modal_$pop_id").css('margin-bottom', '0px'); 
    jQuery("#popup_modal_$pop_id").css('background-position', 'center');
    }
      var w = window,
    d = document,
    e = d.documentElement,
    g = d.getElementsByTagName('body')[0],
    x = w.innerWidth || e.clientWidth || g.clientWidth,
    y = w.innerHeight|| e.clientHeight|| g.clientHeight;
    var ye = 760;
     if (x <= ye) 
     {
        var size = '$popup_responsive_dimension_measure';
         jQuery("#popup_modal_$pop_id").css('width', '87%');
     }
     else
     {
     }
}  
</script>
EOT;
            return $mystring;
        }
    } else {
        if ($popup_type_sellect == 'I Frame') {
            $content = $iframe;
        } else if ($popup_type_sellect == 'HTML') {
            //$content = base64_decode($pop_text);
            $content = ($pop_text);
        } else if ($popup_type_sellect == 'Video') {
            $content = $video;
        }
        $datecondition = eplm_isToday($bday);
        $dateconditionend = eplm_isToday($eday);
        $body_back_ground_color = eplm_conver_hex_to_rgba($color_picker, $popup_Opacity_myRange);
        $footer_back_ground_color = eplm_conver_hex_to_rgba($footer_color_picker, $popup_Opacity_myRange);
        $header_back_ground_color = eplm_conver_hex_to_rgba($header_color_picker, $popup_Opacity_myRange);
        if ($template_id == 7) {
            $content = '<img id="' . $pop_id . '"   src="';
            $content .= $pop_text;
            $content .= '"  class="">';
        } else {
            // $content = base64_decode($pop_text);
            $content = ($pop_text);
        }
        $Background_options = $Background_options ?? 0;
        $backround_position = $backround_position ?? '';
        $mystring = <<<EOT
<div class="eplm_popupmodal   " id="popup_modal_$pop_id" >
<div id="popup_header_$pop_id" class="eplm_popup_header col-lg-12 col-md-12 col-sm-12 col-xs-12 wpoc-field">
<div class="eplm_popup_header col-lg-12 col-md-12 col-sm-12 col-xs-12 wpoc-field"  ">
<b style="display: inline;" id="title_tag_$pop_id"> $title_text</b>
<span class="closepopup_icon" id="closepopup_$pop_id"> &times; </span>        
</div>
</div>
<div class="eplm_popup_content col-lg-12 col-md-12 col-sm-12 col-xs-12 wpoc-field">

$content
     
</div>
<div class="eplm_popup_footer col-lg-12 col-md-12 col-sm-6 col-xs-12 wpoc-field" id="popup_footer_$pop_id">
   <button id="close_popup_$pop_id"  class="eplm_closepopup">Close</button>
   <button id="cancel_popup_$pop_id"  class="eplm_closepopup">Cancel</button>
</div>
</div>
<div class="coverpopup" id="pop_cover_$pop_id">
</div>
<script> 
 var $ = jQuery;
if ('$use_cooki' == 1) {
    if ('$cookioption' == 'all') {
        jQuery('#close_popup_$pop_id').attr('onClick', 'eplm_set_cookie($pop_id);');
        jQuery('#closepopup_$pop_id').attr('onClick', 'eplm_set_cookie($pop_id);');
    } else if ('$cookioption' == 'icon') {
        jQuery('#closepopup_$pop_id').attr('onClick', 'eplm_set_cookie($pop_id);');
    } else if ('$cookioption' == 'button') {
        jQuery('#close_popup_$pop_id').attr('onClick', 'eplm_set_cookie($pop_id);');
    }
}
var eplm_cooki_name = 'eplm_' + $pop_id;
if (localStorage.getItem(eplm_cooki_name) != 1) {
    if ('$dimension' == 'responsive') {
        jQuery("#responsive_options").show('fast');
        jQuery("#custom_options").hide();
        if ('$popup_responsive_dimension_measure' == 'auto') {
            if ('$template_id' == 6 || '$template_id' == 7) {
                jQuery("#popup_modal_$pop_id").css('width', '560px');
            } else {
                jQuery("#popup_modal_$pop_id").css('width', '$popup_responsive_dimension_measure');
            }
        } else {
            jQuery("#popup_modal_$pop_id").css('width', '$popup_responsive_dimension_measure');
        }
    }
    else if ('$dimension' == 'Custom') {
        jQuery("#responsive_options").hide();
        jQuery("#custom_options").show('fast');
        jQuery("#popup_modal_$pop_id").css('width', '$di_width_val%');
        jQuery("#popup_content_$pop_id").css('height', '$di_hight_val%');
        if ('$di_max_hight_val' != 0) {
            jQuery("#popup_modal_$pop_id").css('max-height', '$di_max_hight_val%');
        }
        if ('$di_max_width_val' != 0) {
            jQuery("#popup_modal_$pop_id").css('max-width', '$di_max_width_val%');
        }
    }
    /* end_dimension_block*/
    /*start_closing_block*/
    jQuery("#title_tag_$pop_id").css("color", "$title_font_color_picker");
    jQuery("#title_tag_$pop_id").css("float", "$title_posi_sellect");
    if ('$showclosebtn' == '1') {
        if ('$Closingsellect' == '50%') {
            jQuery("#bottoncenterdiv_$pop_id").addClass("d-flex justify-content-center");
            jQuery("#close_popup_$pop_id").addClass("d-flex justify-content-center");
        }
        else {
            jQuery("#close_popup_$pop_id").css({float: '$Closingsellect'});
        }
        jQuery("#close_popup_$pop_id").text('$closebtntext');
        jQuery("#close_popup_$pop_id").css({backgroundColor: '$btnclose_color_picker'});
        jQuery("#close_popup_$pop_id").css({color: '$font_btnclose_color_picker'});
    } else {
        jQuery('#close_popup_$pop_id').hide();
    }
    if ('$showcancelbtn' == '1' || '$showcancelbtn' == 1) {
        if ('$Closingsellect' == '50%') {
            jQuery("#cancel_popup_$pop_id").css({marginLeft: '0px'});
        } else {
            jQuery("#cancel_popup_$pop_id").css({marginLeft: '$Closingsellect'});
        }
        jQuery("#cancel_popup_$pop_id").css({float: '$Closingsellect'});
        jQuery("#cancel_popup_$pop_id").text('$cancelbtntext');
        jQuery("#cancel_popup_$pop_id").css({backgroundColor: '$booton_color_picker'});
        jQuery("#cancel_popup_$pop_id").css({color: '$font_btnclose_color_picker'});
    } else {
        jQuery('#cancel_popup_$pop_id').css("display", "none");
    }
    if ('$showclosebtn' == '0' && '$showcancelbtn' == '0') {
        jQuery('#popup_footer_$pop_id').hide();
    }
    jQuery('#cancel_popup_$pop_id').click(function () {
        jQuery("#pop_cover_$pop_id").hide();
        jQuery("#popup_modal_$pop_id").hide();
    });
    if ('$showtitlecheck' == '1') {
        jQuery('#title_tag_$pop_id').fadeIn('slow');

    } else {
        jQuery('#title_tag_$pop_id').hide();
    }
    if ('$showcloseicon' == 0 && $showtitlecheck == 0) {
        jQuery('#popup_header_$pop_id').hide();
    }
    if ('$showcloseicon' == 0) {
        jQuery("#closepopup_$pop_id").css("display", "none");
    }
    jQuery('#close_popup_$pop_id').click(function () {
        jQuery("#pop_cover_$pop_id").hide();
        jQuery("#popup_modal_$pop_id").hide();
    });
    if ('$showcloseicon' == 1) {
        jQuery("#closepopup_$pop_id").css({float: '$closeiconsellect'});
        jQuery("#closepopup_$pop_id").css({color: '$Icon_color_picker'});
        jQuery("#closepopup_$pop_id").css("fontSize", $iconsize);
    }
    jQuery('#closepopup_$pop_id').click(function () {
        jQuery("#pop_cover_$pop_id").hide();
        jQuery("#popup_modal_$pop_id").hide();
    });
    if ('$escbtncheckbox' == 1) {
        jQuery(document).keydown(function (event) {
            if (event.keyCode == 27) {
            jQuery("#pop_cover_$pop_id").css("display", "none");
                jQuery("#popup_modal_$pop_id").css("display", "none");
                jQuery('#popup_content_$pop_id').attr("src", jQuery("#popup_content_$pop_id").attr("src"));
               
            }
        });
    }
     const popupModal = jQuery(`#popup_modal_$pop_id`);
const popCover = jQuery(`#pop_cover_$pop_id`);
const iframeElement = document.querySelector(`#popup_modal_$pop_id iframe`);

// Set the background color to transparent
popupModal.css({ backgroundColor: 'transparent' });

if ('$outerclose' == 1) {
    popCover.click(function () {
        // Check if there's an iframe element and clear its src attribute
        if (iframeElement) {
            iframeElement.src = '';
        }
        
        // Hide the modal and cover
        popCover.hide();
        popupModal.hide();
    });
}

	
    /*end_closing_block*/
    /*start_styling_block*/
    if ('$color_picker' == "") {

        jQuery("#popup_modal_$pop_id").css({backgroundColor: 'transparent'});
        jQuery("#popup_header_$pop_id").css({backgroundColor: '$header_back_ground_color'});
        jQuery("#popup_footer_$pop_id").css({backgroundColor: '$footer_back_ground_color'});
    } else {
        jQuery("#popup_modal_$pop_id").css({backgroundColor: '$body_back_ground_color'});
        jQuery("#popup_header_$pop_id").css({backgroundColor: '$header_back_ground_color'});
        jQuery("#popup_footer_$pop_id").css({backgroundColor: '$footer_back_ground_color'});
    }
    jQuery("#pop_cover_$pop_id").css({backgroundColor: '$Opacity_color_picker'});
    jQuery("#popup_modal_$pop_id").css('border-style', '$Border_Style_sellect');
     if('$slide_Border_color_picker'!==''){
    jQuery("#popup_modal_$pop_id").css('border-color', '$slide_Border_color_picker');
    }else{
     jQuery("#popup_modal_$pop_id").css('border-color', 'transparent');
    }
    if('$header_Border_color_picker'!=='')
     { jQuery("#popup_header_$pop_id").css('border-bottom', 'solid 1px $header_Border_color_picker');
     }
      if('$fotter_Border_color_picker'!==''){
    jQuery("#popup_footer_$pop_id").css('border-top', 'solid 1px $fotter_Border_color_picker');
    }
    jQuery("#popup_modal_$pop_id").css('background-image', 'url("$pop_back_image")');
    if ('$border_shadow_check' == 1) {
    if('$border_shadow_color_picker' == '' )
{

     jQuery("#popup_modal_$pop_id").css('box-shadow', 'unset');
}else
{
 jQuery("#popup_modal_$pop_id").css('box-shadow', ' 0px 0px 10px $border_shadow_color_picker');
}
       
    }
    if ('$border_shadow_check' == 0) {
        jQuery("#popup_modal_$pop_id").css('border', 'none');
    }
    if ('$img_repeat' == 1) {
        jQuery("#popup_modal_$pop_id").css({'background-repeat': 'repeat'});
    } else {
        jQuery("#popup_modal_$pop_id").css({'background-repeat': 'no-repeat'});
    }
    jQuery("#popup_modal_$pop_id").css('background-position', '$backround_position');
    /*end_styling_block*/
    /*start_aperance_block*/
    jQuery("#pop_cover_$pop_id").css('opacity', '$Opacity_myRange');
    jQuery("#popup_modal_$pop_id").css({
        BorderTopRightRadius: $radious_Top_Right,
        BorderBottomRightRadius: $Bottom_Top_Right,
        BorderTopLeftRadius: $radious_Top_Lift,
        BorderBottomLeftRadius: $Bottom_Top_Lift
    }); 
     jQuery("#popup_header_$pop_id").css({
        BorderTopRightRadius: $radious_Top_Right,
        BorderTopLeftRadius: $radious_Top_Lift,
    });
    jQuery("#popup_footer_$pop_id").css({
         BorderBottomRightRadius: $Bottom_Top_Right,
         BorderBottomLeftRadius: $Bottom_Top_Lift
    });
    jQuery("#popup_modal_$pop_id").css('border-width', '$Thickness_myRange');
    if ('$slideoptradio' == 'Top_bottom') {
        jQuery("#popup_modal_$pop_id").css({top: 0});
        jQuery("#popup_modal_$pop_id").css({marginTop: 0});
        jQuery("#pop_cover_$pop_id").hide();
        jQuery("#popup_modal_$pop_id").addClass('slideInDown');
    }
    else if ('$slideoptradio' == 'Slide_box') {
        jQuery("#popup_modal_$pop_id").removeClass("eplm_popupmodal").addClass("popupmodalslide");
        jQuery("#pop_cover_$pop_id").hide();
    }
    else if ('$slideoptradio' == 'Left_Right') {
        jQuery("#popup_modal_$pop_id").addClass('slideInLeft');
        jQuery("#popup_modal_$pop_id").css({left: 0});
        jQuery("#popup_modal_$pop_id").css({marginLeft: 0});
        jQuery("#popup_modal_$pop_id").css({bottom: 0});
    } else if ('$slideoptradio' == 'Right_Left') {
        jQuery("#popup_modal_$pop_id").addClass('slideInRight');
        jQuery("#popup_modal_$pop_id").css({right: 0});
        jQuery("#popup_modal_$pop_id").css({bottom: 0});
    }
    var runpoptime = '$loadingtime';
    setTimeout(function () {
        jQuery("#popup_modal_$pop_id").show('fast');
        jQuery("#pop_cover_$pop_id").show('fast');
    }, runpoptime * 1000);
    if ('$scrolling' == 1) {
        window.onscroll = function () {
            jQuery("#popup_modal_$pop_id").show('fast');
            jQuery("#pop_cover_$pop_id").show('fast');
        };
    }
    if ('$closingtimebtn' == 1) {
        var closetime = '$closingtime';
        setTimeout(function () {
            jQuery("#pop_cover_$pop_id").hide();
            jQuery("#popup_modal_$pop_id").hide();
        }, closetime * 1000);
    }
    if ('$popup_theam_type' == 'Slide') {
        jQuery("#pop_cover_$pop_id").css('opacity', '0');
    }
    if ('$post_types' == 0 || '$Categories' == 0) {
        jQuery("#pop_cover_$pop_id").css("display", "block");
        jQuery("#popup_modal_$pop_id").css("display", "block");
    }
    jQuery("#title_tag_$pop_id").css('padding', '0px');
    jQuery("#title_tag_$pop_id").css('padding-top', '5px');
    jQuery("#title_tag_$pop_id").css("font-size", "$titlesize");
   if('$btnclose_Shadow_color_picker' == '' )
{
     jQuery("#close_popup_$pop_id").css('box-shadow', 'unset');
    jQuery("#cancel_popup_$pop_id").css('box-shadow', 'unset');
}else
{
jQuery("#close_popup_$pop_id").css('box-shadow', ' 0px 0px 10px  $btnclose_Shadow_color_picker');
jQuery("#cancel_popup_$pop_id").css('box-shadow', ' 0px 0px 10px  $btnclose_Shadow_color_picker');
}
    jQuery("#close_popup_$pop_id").css('border-style', '$close_btn_Border_Style_sellect');
    jQuery("#cancel_popup_$pop_id").css('border-style', '$close_btn_Border_Style_sellect');
    jQuery("#close_popup_$pop_id").css('padding', '$closebtnpadding');
    jQuery("#cancel_popup_$pop_id").css('padding', '$closebtnpadding');
    jQuery("#close_popup_$pop_id").css("font-size", "$closebtnsize");
    jQuery("#cancel_popup_$pop_id").css("font-size", "$closebtnsize");
    jQuery("#close_popup_$pop_id").css("width", '$close_btn_width');
    jQuery("#cancel_popup_$pop_id").css("width", '$close_btn_width');
    jQuery("#close_popup_$pop_id").css("height", '$close_btn_height');
    jQuery("#cancel_popup_$pop_id").css("height", '$close_btn_height');
    var line_hight = parseInt('$close_btn_height')-(parseInt('$closebtnpadding')*2);
     jQuery("#close_popup_$pop_id").css("line-height", line_hight+'px');
    jQuery("#cancel_popup_$pop_id").css("line-height", line_hight+'px');
    jQuery("#close_popup_$pop_id").css({
        BorderTopRightRadius: $closebtnb_radius,
        BorderBottomRightRadius: $closebtnb_radius,
        BorderTopLeftRadius: $closebtnb_radius,
        BorderBottomLeftRadius: $closebtnb_radius
    });
    jQuery("#cancel_popup_$pop_id").css({
        BorderTopRightRadius: $closebtnb_radius,
        BorderBottomRightRadius: $closebtnb_radius,
        BorderTopLeftRadius: $closebtnb_radius,
        BorderBottomLeftRadius: $closebtnb_radius
    });
    jQuery("#popup_modal_$pop_id").css({marginRight: '$margin_val'});
    jQuery("#popup_modal_$pop_id").css({marginLeft: '$margin_val'});
    jQuery("#popup_modal_$pop_id").css({marginTop: '$margin_val'});
    jQuery("#popup_modal_$pop_id").css('margin-bottom', '$margin_val');
    if ('$daterange' == 1) {
        if ('$datecondition' == 'content') {
            jQuery("#popup_modal_$pop_id").css("display", "block");
            jQuery("#pop_cover_$pop_id").css("display", "block");
        } else if ('$datecondition' == 'rolback') {
            jQuery("#pop_cover_$pop_id").addClass("daterangetime");
            jQuery("#popup_modal_$pop_id").addClass("daterangetime");
        }
        if ('$dateconditionend' == 'content') {
            jQuery("#pop_cover_$pop_id").addClass("daterangetime");
            jQuery("#popup_modal_$pop_id").addClass("daterangetime");
        }
    }
          if('$pop_back_image'!=='')
    {
     jQuery("#popup_modal_$pop_id").css('background-image', 'url("$pop_back_image")');
      jQuery("#popup_content_$pop_id").css({backgroundColor: 'transparent'});
jQuery("#popup_header_$pop_id").css({backgroundColor: 'transparent'});
  jQuery("#popup_footer_$pop_id").css({backgroundColor: 'transparent'});
    }
    jQuery("#popup_header_$pop_id").css('padding-top', '$header_p_top');
    jQuery("#popup_header_$pop_id").css('padding-bottom', '$header_p_bottom');
    jQuery("#popup_header_$pop_id").css('padding-right', '$header_p_right');
    jQuery("#popup_header_$pop_id").css('padding-left', '$header_p_left');
    jQuery("#popup_content_$pop_id").css('padding-top', '$content_p_top');
    jQuery("#popup_content_$pop_id").css('padding-bottom', '$content_p_bottom');
    jQuery("#popup_content_$pop_id").css('padding-right', '$content_p_right');
    jQuery("#popup_content_$pop_id").css('padding-left', '$content_p_left');
    jQuery("#popup_footer_$pop_id").css('padding-top', '$footer_p_top');
    jQuery("#popup_footer_$pop_id").css('padding-bottom', '$footer_p_bottom');
    jQuery("#popup_footer_$pop_id").css('padding-right', '$footer_p_right');
    jQuery("#popup_footer_$pop_id").css('padding-left', '$footer_p_left');
      if(('$Background_options' == '0') || ('$Background_options' == 0))
    {
     jQuery("#popup_footer_$pop_id").css({backgroundColor: 'white'});
     jQuery("#popup_content_$pop_id").css({backgroundColor: 'white'});
     jQuery("#popup_header_$pop_id").css({backgroundColor: 'white'});
     jQuery("#pop_cover_$pop_id").css('opacity', '0.4');
       jQuery("#pop_cover_$pop_id").css({backgroundColor: 'black'});
       jQuery("#popup_modal_$pop_id").css('background', 'unset');
    jQuery("#popup_modal_$pop_id").css({marginRight: '0px'});
    jQuery("#popup_modal_$pop_id").css({marginLeft: '0px'});
    jQuery("#popup_modal_$pop_id").css({marginTop: '0px'});
    jQuery("#popup_modal_$pop_id").css('margin-bottom', '0px'); 
     jQuery("#popup_modal_$pop_id").css('background-position', 'center');
    }
        var w = window,
    d = document,
    e = d.documentElement,
    g = d.getElementsByTagName('body')[0],
    x = w.innerWidth || e.clientWidth || g.clientWidth,
    y = w.innerHeight|| e.clientHeight|| g.clientHeight;
    var ye = 760;
     if (x <= ye) {
        var size = '$popup_responsive_dimension_measure';
         jQuery("#popup_modal_$pop_id").css('width', '87%');
          }
          else
          {
    }
} 
    </script>
EOT;
        return $mystring;
    }
}
function eplm_pagination($link, $total, $per_page, $current_page, $total_links = 7)
{
    $total_pages = (int)ceil($total / $per_page);
    $half_links = (int)ceil(($total_links - 1) / 2);
    $links = array();
    if ($total_pages <= $total_links) {
        for ($c = 1; $c <= $total_pages; $c++) {
            $links[] = $c;
        }
    } else {
        $start = $current_page - $half_links;
        $end = $current_page + $half_links;
        if ($start < 1) {
            $end += (-$start) + 1;
            $start = 1;
        } else if ($end > $total_pages) {
            $start -= $total_links - $end;
            $end = $total_links;
        }
        if ($start > 1) {
            $links[] = '';
        }
        for ($c = $start; $c <= $end; $c++) {
            $links[] = $c;
        }
        if ($end < $total_pages) {
            $links[] = '';
        }
    }
    $out = '<nav>
        <ul class="pagination">
            <li ' . (($current_page == 1) ? ' class="disabled"' : '') . '>
            <a href="' . (($current_page == 1) ? 'javascript:void(0)' : $link . ($current_page - 1)) . '" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
            </li>';
    foreach ($links as $l) {
        $out .= '<li ' . (($current_page == $l) ? ' class="active"' : '') . '>';
        if (!empty($l)) {
            $out .= '<a href="' . $link . $l . '">' . $l . (($current_page == $l) ? ' <span class="sr-only">(current)</span>' : '') . '</a>';
        } else {
            $out .= '<a href="javascript:void(0);">..</span></a>';
        }
        $out .= '</li>';
    }
    $out .= '<li' . (($current_page == $total_pages) ? ' class="disabled"' : '') . '>
            <a href="' . (($current_page == $total_pages) ? 'javascript:void(0)' : $link . ($current_page + 1)) . '" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
            </li>
        </ul>
    </nav>';
    $out .= '<div>' . __('Page', 'shs_lang') . ' ' . $current_page . ' ' . __('of', 'shs_lang') . ' ' . $total_pages . ' ' . __('pages', 'shs_lang') . '</div>';
    return $out;
}

function eplm_do_shortcode($atts)
{
    static $shortcode_executed = false;
    if ($shortcode_executed) {
        return '';
    }
    $shortcode_executed = true;

    ob_start();
    echo eplm_render_popup($atts['pop_id']);
    return ob_get_clean();
}
function eplm_read_popup_type_id($pop_type)
{
    global $wpdb;
    $sql = "SELECT * FROM `{$wpdb->prefix}eplm_popups` WHERE pop_type= '$pop_type'  ORDER BY pop_id DESC LIMIT 1";
    return $wpdb->get_row($wpdb->prepare($sql, $pop_type), OBJECT);
}
function eplm_create_shortcode_function()
{
    $fgf = eplm_read_popups_slide_id(array(), '', '');
    $lighttype = eplm_read_popups_light_id(array(), '', '');
    foreach ($lighttype['data']  as $value) {
        echo  do_shortcode('[eplm_popup pop_id="' . $value->pop_id . '"]');
    }
    foreach ($fgf['data']  as $value) {
        echo  do_shortcode('[eplm_popup pop_id="' . $value->pop_id . '"]');
    }
}
function eplm_isToday($time)
{
    if (!$time) {
        return;
    }
    if (strtotime($time) === strtotime('today')) {
        return 'content';
    } else {
        return 'rolback';
    }
    exit();
}
function eplm_editor_options_enable_more_buttons($buttons)
{
    $buttons[] = 'fontselect';
    $buttons[] = 'fontsizeselect';
    $buttons[] = 'styleselect';
    $buttons[] = 'backcolor';
    $buttons[] = 'newdocument';
    $buttons[] = 'cut';
    $buttons[] = 'copy';
    $buttons[] = 'charmap';
    $buttons[] = 'hr';
    $buttons[] = 'visualaid';
    return $buttons;
}
function eplm_editor_options_myformatTinyMCE($in)
{
    $in['wordpress_adv_hidden'] = FALSE;
    return $in;
}
function eplm_conver_hex_to_rgba($color, $opacity = false)
{

    $default = 'transparent';

    //Return default if no color provided
    if (empty($color))
        return $default;

    //Sanitize $color if "#" is provided
    if ($color[0] == '#') {
        $color = substr($color, 1);
    }

    //Check if color has 6 or 3 characters and get values
    if (strlen($color) == 6) {
        $hex = array($color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5]);
    } elseif (strlen($color) == 3) {
        $hex = array($color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]);
    } else {
        return $default;
    }

    //Convert hexadec to rgb
    $rgb =  array_map('hexdec', $hex);

    //Check if opacity is set(rgba or rgb)
    if ($opacity) {
        if (abs($opacity) > 1)
            $opacity = 1.0;
        $output = 'rgba(' . implode(",", $rgb) . ',' . $opacity . ')';
    } else {
        $output = 'rgb(' . implode(",", $rgb) . ')';
    }

    //Return rgb(a) color string
    return $output;
}
function eplm_media_selector_settings_page_callback()
{
    $pop_id = (isset($_GET['id'])) ? intval($_GET['id']) : 0;
    $popups = NULL;
    if (!empty($pop_id)) {
        $popups = get_option('media_selector_attachment_id' . $pop_id);
    }

    if (isset($popups) && !empty($popups)) {
    ?>
        <div class="misha-upl" id="misha-upl-show-image"><img id='image-preview' src='<?php echo wp_get_attachment_url($popups); ?>' style="max-width: 500px;"></div>
        <button style="margin-top: 20px; font-size: 30px;background-color: #353738; " type="button" name="" class="btn btn-primary misha-upl">Upload image</button>
        <button style="margin-top: 20px; font-size: 30px;background-color: red;display:none " type="button" name="" class="btn btn-primary misha-rmv">Remove image</button>
        <input type="hidden" id="misha_img" name="image_attachment_id" value="<?php echo intval($popups); ?>">
    <?php } else { ?>
        <div class="misha-upl" id="misha-upl-show-image"></div>
        <button style="margin-top: 20px; font-size: 30px;background-color: #353738; " type="button" name="" class="btn btn-primary misha-upl">Upload image</button>
        <button style="margin-top: 20px; font-size: 30px;background-color: red;display:none " type="button" name="" class="btn btn-primary misha-rmv">Remove image</button>

        <input type="hidden" id="misha_img" name="image_attachment_id" value="">
<?php
    }
}
add_action('admin_enqueue_scripts', 'misha_include_js');
function misha_include_js()
{
    if (!did_action('wp_enqueue_media')) {
        wp_enqueue_media();
    }
    wp_enqueue_script('eplm_uploud_image', plugins_url('includes/eplm_uploud_image.js', __FILE__), array('jquery'));
}

function eplm_get_youtupe_start_time_string_between($string, $start, $end)
{
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}




function update_pop_status_callback() {
    check_ajax_referer('pop_status_nonce', 'security'); 

    if (isset($_POST['popId']) && isset($_POST['isChecked'])) {
        $pop_id = intval($_POST['popId']);
        $pop_status = intval($_POST['isChecked']);

        global $wpdb;
        $table_name = $wpdb->prefix . 'eplm_popups';
        $wpdb->update(
            $table_name,
            array('pop_status' => $pop_status),
            array('pop_id' => $pop_id),
            array('%d'), 
            array('%d')  
        );

        echo 'Status updated successfully';
        exit;
    }
    wp_die(); 
}


?>