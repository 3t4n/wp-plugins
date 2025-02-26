<?php

/*
 * @link http://www.girltm.com/
 * @since 1.0.0
 * @package APOYL_ALIYUNVIDEO
 * @subpackage APOYL_ALIYUNVIDEO/admin
 * @author 凹凸曼 <3201361925@qq.com>
 *
 */
class Apoyl_Aliyunvideo_Admin
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
        $links[] = '<a href="' . esc_url(get_admin_url(null, 'options-general.php?page=apoyl-aliyunvideo-settings')) . '">' . __('settingsname', 'apoyl-aliyunvideo') . '</a>';
        $alinks = array_merge($links, $alinks);
        
        return $alinks;
    }

    public function menu()
    {
        add_options_page(__('settings', 'apoyl-aliyunvideo'), __('settings', 'apoyl-aliyunvideo'), 'manage_options', 'apoyl-aliyunvideo-settings', array(
            $this,
            'settings_page'
        ));
    }

    public function region_select($selected = '')
    {
        $r = '';
        $arr = array(

            'cn-shanghai',
            'cn-beijing',
            'cn-shenzhen',
            'cn-hongkong',
            'ap-northeast-1',
            'ap-southeast-1',
            'ap-southeast-5',
            'eu-central-1',
            'us-west-1'

        );
        foreach ($arr as $v) {
            $a=sprintf(esc_html__( "%s", "apoyl-aliyunvideo" ),esc_html($v));
            if ($selected === $v) {

                $r .= "\n\t<option selected='selected' value='" . esc_attr($v) . "'>$a</option>";
            } else {
                $r .= "\n\t<option value='" . esc_attr($v) . "'>$a</option>";
            }
        }
        echo $r;
    }
    public function settings_page()
    {
        global $wpdb;
  
        $options_name = 'apoyl-aliyunvideo-settings';
        isset($_GET['do'])?$do=sanitize_text_field($_GET['do']):$do='';
        if($do=='syn'){
            require_once APOYL_ALIYUNVIDEO_DIR . 'admin/partials/synsetting.php';
        }else{
            require_once APOYL_ALIYUNVIDEO_DIR . 'admin/partials/setting.php';
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

    public function aliyunvideo_wp_generate_attachment_metadata($metadata,$attachment_id){

        $arr = get_option('apoyl-aliyunvideo-settings');

        if($arr['open']&&$arr['accessid']&&$arr['secretkey']&&$arr['openauto']){
            $file=apoyl_aliyunvideo_file('addvideo');
            if($file){
                include $file;
            }
        }
        return $metadata;
    }

}
