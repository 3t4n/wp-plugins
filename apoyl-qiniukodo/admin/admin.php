<?php

/*
 * @link http://www.girltm.com/
 * @since 1.0.0
 * @package APOYL_QINIUKODO
 * @subpackage APOYL_QINIUKODO/admin
 * @author 凹凸曼 <jar-c@163.com>
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
class Apoyl_Qiniukodo_Admin
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
        $links[] = '<a href="' . esc_url(get_admin_url(null, 'options-general.php?page=apoyl-qiniukodo-settings')) . '">' . __('settingsname', 'apoyl-qiniukodo') . '</a>';
        $alinks = array_merge($links, $alinks);
        
        return $alinks;
    }

    public function menu()
    {
        add_options_page(__('settings', 'apoyl-qiniukodo'), __('settings', 'apoyl-qiniukodo'), 'manage_options', 'apoyl-qiniukodo-settings', array(
            $this,
            'settings_page'
        ));
    }

    public function region_select($selected = '')
    {
        $r = '';
        $arr = array(
            'z0',
            'cn-east-2',
            'z1',
            'z2',
            'na0',
            'as0',
            'ap-northeast-1',
        
        );
        foreach ($arr as $v) {
            if ($selected === $v) {
                $r .= "\n\t<option selected='selected' value='" . esc_attr($v) . "'>" . __(esc_attr($v), 'apoyl-qiniukodo') . "</option>";
            } else {
                $r .= "\n\t<option value='" . esc_attr($v) . "'>" . __(esc_attr($v), 'apoyl-qiniukodo') . "</option>";
            }
        }
        echo $r;
    }
    public function settings_page()
    {
        global $wpdb;
  
        $options_name = 'apoyl-qiniukodo-settings';
        isset($_GET['do'])?$do = sanitize_key($_GET['do']):$do='';
        if($do=='syn'){
            require_once APOYL_QINIUKODO_DIR . 'admin/partials/synsetting.php';
        }else{
            require_once APOYL_QINIUKODO_DIR . 'admin/partials/setting.php';
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
            'timeout' => 120,
            'body' => $param
        )));
        
        return $res;
    }

    public function  qiniu_add_attachment($post_id){
 
    		$arr = get_option('apoyl-qiniukodo-settings');
    	
    		if($arr['open']&&$arr['accessid']&&$arr['secretkey']&&$arr['bucket']&&$arr['openauto']){
    
			    	$file=apoyl_qiniukodo_file('addattachment');
			    	if($file){
			    		include $file;
			    	}
    		}
    }
}
