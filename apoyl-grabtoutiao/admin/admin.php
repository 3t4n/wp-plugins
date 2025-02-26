<?php

/*
 * @link http://www.girltm.com/
 * @since 1.0.0
 * @package APOYL_GRABTOUTIAO
 * @subpackage APOYL_GRABTOUTIAO/admin
 * @author 凹凸曼 <jar-c@163.com>
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
class Apoyl_Grabtoutiao_Admin
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
        $links[] = '<a href="' . esc_url(get_admin_url(null, 'options-general.php?page=apoyl-grabtoutiao-settings')) . '">' . __('settingsname', 'apoyl-grabtoutiao') . '</a>';
        $alinks = array_merge($links, $alinks);
        
        return $alinks;
    }

    public function menu()
    {
        add_options_page(__('settings', 'apoyl-grabtoutiao'), __('settings', 'apoyl-grabtoutiao'), 'manage_options', 'apoyl-grabtoutiao-settings', array(
            $this,
            'settings_page'
        ));
    }

    public function settings_page()
    {
        global $wpdb;
        $options_name = 'apoyl-grabtoutiao-settings';
        require_once plugin_dir_path(__FILE__) . 'partials/setting.php';
    }

    public function post_editor_meta_box()
    {
        $options_name = 'apoyl-grabtoutiao-settings';
        $arr = get_option($options_name);
        if ($arr['open'])
            add_meta_box('apoyl-grabtoutiao-editor-url', __('editor-url-title', 'apoyl-grabtoutiao'), array(
                $this,
                'editor_url'
            ), 'post');
    }

    public function editor_url()
    {
        require_once plugin_dir_path(__FILE__) . 'partials/editorsetting.php';
    }

    public function apoyl_grabtoutiao_ajax()
    {

        $toutiaourl = sanitize_url($_POST['toutiaourl']);

        $data = $this->httpGet($toutiaourl);
  
        preg_match_all('/\<div\s*class=\"article-content\"\s*\>\s*\<h1\>(.*?)\<\/h1\>/i', $data, $matchs);

        if (isset($matchs[1][0]))
            $title = trim($matchs[1][0]);

        preg_match_all('/\<article\s*class\=\"syl-article-base.*?\"\>(.*)\<\/article\>/i', $data, $gmatchs);
        if (isset($gmatchs[1][0])) {
            $content = trim($gmatchs[1][0]);
            $file = apoyl_grabtoutiao_file('grabpicajax');
            if ($file)
            	include $file;

        }
        if ($title || $content) {
        	echo wp_json_encode(array(
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
    	$res='';
    	$file = apoyl_grabtoutiao_file('grabhttp');
    	if ($file){
    		include $file;
    	}else{
	        $res = wp_remote_retrieve_body(wp_remote_get($url, array(
	            'timeout' => 120,
	            'body' => $param
	        )));
    	}
        
        return $res;
    }
}
