<?php

/*
 * @link http://www.girltm.com/
 * @since 1.0.0
 * @package APOYL_GRABWEIXIN
 * @subpackage APOYL_GRABWEIXIN/admin
 * @author 凹凸曼 <3201361925@qq.com>
 *
 */
class Apoyl_Grabweixin_Admin
{

    private $plugin_name;

    private $version;

    public function __construct($plugin_name, $version)
    {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    public function enqueue_styles()
    {
        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/admin.css', array(), $this->version, 'all');
    }

    public function enqueue_scripts()
    {
        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/admin.js', array(
            'jquery'
        ), $this->version, false);
    }

    public function links($alinks)
    {
        $links[] = '<a href="' . esc_url(get_admin_url(null, 'options-general.php?page=apoyl-grabweixin-settings')) . '">' . __('settingsname', 'apoyl-grabweixin') . '</a>';
        $alinks = array_merge($links, $alinks);
        
        return $alinks;
    }

    public function menu()
    {
        add_options_page(__('settings', 'apoyl-grabweixin'), __('settings', 'apoyl-grabweixin'), 'manage_options', 'apoyl-grabweixin-settings', array(
            $this,
            'settings_page'
        ));
    }

    public function settings_page()
    {
        global $wpdb;
        $options_name = 'apoyl-grabweixin-settings';
        require_once plugin_dir_path(__FILE__) . 'partials/setting.php';
    }

    public function post_editor_meta_box()
    {
        $options_name = 'apoyl-grabweixin-settings';
        $arr = get_option($options_name);
        if ($arr['open'])
            add_meta_box('apoyl-grabweixin-editor-url', __('editor-url-title', 'apoyl-grabweixin'), array(
                $this,
                'editor_url'
            ), 'post');
    }

    public function editor_url()
    {
        require_once plugin_dir_path(__FILE__) . 'partials/editorsetting.php';
    }

    public function apoyl_grabweixin_ajax()
    {

        $weixinurl = sanitize_url($_POST['weixinurl']);
        
        $data = $this->httpGet($weixinurl);
        preg_match_all('/id=\"activity-name\".*>(.*)<\/h1>/isU', $data, $matchs);
        if (isset($matchs[1][0]))
            $title = trim($matchs[1][0]);
        
        preg_match_all('/id=\"js_content\".*>(.*)<\/div>.*<script/isU', $data, $gmatchs);
        if (isset($gmatchs[1][0])) {
            $content = trim($gmatchs[1][0]);
            $file = apoyl_grabweixin_file('grabpicajax');
            if ($file)
                include $file;
        }
        if ($title || $content) {
            echo json_encode(array(
                'post_title' => esc_attr($title),
                'content' => wp_kses_post($content)
            ));
            exit();
        }
    }

    private function get_title($matchs)
    {
        if (isset($matchs[1]))
            return trim($matchs[1]);
        return '';
    }

    private function httpGet($url, $param = array())
    {
        $res = wp_remote_retrieve_body(wp_remote_get($url, array(
            'timeout' => 120,
            'body' => $param
        )));
        
        return $res;
    }
}
