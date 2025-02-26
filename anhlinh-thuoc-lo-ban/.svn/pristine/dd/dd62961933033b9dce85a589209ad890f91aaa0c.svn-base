<?php

/*
Plugin Name: Anhlinh Thuoc Lo Ban
Plugin URI: https://thanhansoft.com/anhlinh-thuoc-lo-ban
Description: Anh Linh Thuoc Lo Ban, Thuoc Lo Ban wordpress, Thước lỗ ban plugin
Author: Thanhansoft
Text Domain: thuoc-lo-ban
Version: 1.0.0
Author URI: https://thanhansoft.com
*/

if (is_admin()) {
    add_filter('plugin_row_meta', 'altlb_add_settings_link', 10, 2);

    function altlb_add_settings_link($plugin_meta, $plugin_file_name)
    {
        if ($plugin_file_name == "anhlinh-thuoc-lo-ban/anhlinh-thuoc-lo-ban.php") {
            $plugin_meta[] = '<a href="https://thanhansoft.com/anhlinh-thuoc-lo-ban" target="_blank" class="uk-text-danger uk-text-bold">' . __('Upgrade to Pro', 'thuoc-lo-ban') . '</a>';
        }
        return $plugin_meta;
    }
} else {
    define('ALTLB_URL', esc_url(plugins_url('views/', __FILE__)));

    add_shortcode('thuoc-lo-ban', 'altlb_html');
    function altlb_html()
    {
        ob_start();
        require_once plugin_dir_path(__FILE__) . '/views/index.php';
        $content = ob_get_clean();
        return $content;
    }

    add_filter('wp_head', 'altlb_shortcode_css');
    function altlb_shortcode_css()
    {
        global $post;
        if (is_a($post, 'WP_Post') && has_shortcode($post->post_content, 'thuoc-lo-ban')) {
            echo "<style type=\"text/css\">.loban-content{margin:0 auto;position:relative;width:100%;padding-top:50px}.box_huongdan{background:#fff6d3;border:1px solid #f7e7a9;padding:10px;margin-top:30px}.tdbox_hd{border-bottom:1px solid #f7e7a9;font-family:arial;font-size:14px;font-weight:700;line-height:30px}.noidung_boxhd{color:#333;font-size:13px;line-height:24px;margin-top:10px;font-family:arial}.noidung_boxhd p{margin:2px 0}.tdbox_hd{color:#d40001}#loban-thelist{padding:0;margin:0;list-style:none}#loban-wrapper{position:absolute;z-index:1;top:0;bottom:0;left:0;width:100%;height:412px;background:#fff;overflow:hidden}#lobanOuter{width:100%;position:relative;height:400px}#loban-scroller{width:10100px;height:100%;float:left;padding:0;transition-property:transform;transform-origin:0 0 0;transition-timing-function:cubic-bezier(.33,.66,.66,1);transform:translate(0,0) translateZ(0)}#loban-scroller li{display:block;float:left;width:10000px;height:100%}#loban-scroller li img{margin-top:30px}#pullLeft,#pullRight{display:block;width:50px;float:left;height:100%}#sodoLoban{display:none;position:absolute;z-index:2;top:5px;left:400px;text-align:center;width:100px;font-size:16px;font-weight:700;color:red}#container-sodo{position:absolute;z-index:2;top:-48px;display:flex;justify-content:center;left:0;right:0}#sodo{text-align:center;font-size:20px;font-weight:700;color:red;border:2px solid orange;padding:2px;height:50px;width:100px}.enter-number{position:absolute;top:-35px;right:0;left:202px;display:flex;justify-content:center;z-index:10}#thanhdo{width:2px;height:384px;background:orange;position:absolute;z-index:2;top:10px;left:240px}#abc{position:absolute;top:-20px;display:none}.loban-note{position:absolute;z-index:2;top:0;right:0;background:url(" . ALTLB_URL . "images/help.gif) no-repeat;padding-left:18px;height:20px;margin:0 0 10px}.loban-t{position:absolute;z-index:2;left:0}.loban-522{top:2px;margin:0 0 10px}.loban-429{top:129px;margin:5px 0 10px}.loban-388{top:260px;margin:5px 0 10px}.loban-touch-left{position:absolute;left:0;top:31px;height:358px;width:50px;z-index:2}.loban-touch-right{position:absolute;right:0;top:31px;height:358px;width:50px;z-index:2}.loban-clear:after,.loban-clear:before{content:' ';display:table}.loban-clear:after{loban-clear:both}.loban-dvt{text-align:right;padding-top:20px}@media (min-width:320px) and (max-width:768px){.loban-t{left:0;font-size:10px!important}.loban-522{margin:0;top:13px}.loban-note{top:8px;height:20px;margin:0}.loban-388{top:270px}.loban-note{display:none}}</style>";
        }
    }

    function altlb_shortcode_js()
    {
        global $post;
        if (is_a($post, 'WP_Post') && has_shortcode($post->post_content, 'thuoc-lo-ban')) {
            altlb_register_scripts();
        }
    }
    add_filter('wp_enqueue_scripts', 'altlb_shortcode_js');

    function altlb_register_scripts()
    {
        wp_register_script('thuocloban-iscroll', ALTLB_URL . 'js/thuocloban-iscroll.js', ['jquery'], false, true);
        wp_register_script('thuocloban-functions', ALTLB_URL . 'js/thuocloban-functions.js', ['thuocloban-iscroll'], false, true);

        wp_enqueue_script('thuocloban-iscroll');
        wp_enqueue_script('thuocloban-functions');
    }
}
