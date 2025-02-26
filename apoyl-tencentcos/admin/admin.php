<?php

/*
 * @link http://www.girltm.com/
 * @since 1.0.0
 * @package APOYL_TENCENTCOS
 * @subpackage APOYL_TENCENTCOS/admin
 * @author 凹凸曼 <3201361925@qq.com>
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
class Apoyl_Tencentcos_Admin
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
        $links[] = '<a href="' . esc_url(get_admin_url(null, 'options-general.php?page=apoyl-tencentcos-settings')) . '">' . __('settingsname', 'apoyl-tencentcos') . '</a>';
        $alinks = array_merge($links, $alinks);
        
        return $alinks;
    }

    public function menu()
    {
        add_options_page(__('settings', 'apoyl-tencentcos'), __('settings', 'apoyl-tencentcos'), 'manage_options', 'apoyl-tencentcos-settings', array(
            $this,
            'settings_page'
        ));
    }

    public function settings_page()
    {
        global $wpdb;
  
        $options_name = 'apoyl-tencentcos-settings';
        isset($_GET['do'])?$do = sanitize_key($_GET['do']):$do='';
        if($do=='syn'){
            require_once APOYL_TENCENTCOS_DIR . 'admin/partials/synsetting.php';
        }else{
            require_once APOYL_TENCENTCOS_DIR . 'admin/partials/setting.php';
        }
    }

    public function get_attachs($number,$page=1) {


        $page   = (int) $page;
    
        $post_query = new WP_Query(
            array(

                'posts_per_page' => $number,
                'paged'          => $page,
                'post_type'      => 'attachment',
                'post_status'    => 'any',
                'orderby'        => 'ID',
                'order'          => 'ASC',
            )
            );
    
        $done = $post_query->max_num_pages <= $page;

        return array(
            'data' => (array) $post_query->posts,
            'done' => $done,
        );
    }

    private function httpGet($url, $param = array())
    {
        $res = wp_remote_retrieve_body(wp_remote_get($url, array(
            'timeout' => 60,
            'body' => $param
        )));
        
        return $res;
    }
    public function tencentcos_wp_generate_attachment_metadata($metadata){
        $arr = get_option('apoyl-tencentcos-settings');

        if($arr['open']&&$arr['accessid']&&$arr['secretkey']&&$arr['bucket']&&$arr['openauto']){

            $file=apoyl_tencentcos_file('addattachmentall');
            if($file){
                include $file;
            }
        }
        return $metadata;
    }
}
