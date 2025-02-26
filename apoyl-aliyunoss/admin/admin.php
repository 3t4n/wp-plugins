<?php

/*
 * @link http://www.girltm.com/
 * @since 1.0.0
 * @package APOYL_ALIYUNOSS
 * @subpackage APOYL_ALIYUNOSS/admin
 * @author 凹凸曼 <3201361925@qq.com>
 *
 */
class Apoyl_Aliyunoss_Admin
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
        $links[] = '<a href="' . esc_url(get_admin_url(null, 'options-general.php?page=apoyl-aliyunoss-settings')) . '">' . __('settingsname', 'apoyl-aliyunoss') . '</a>';
        $alinks = array_merge($links, $alinks);
        
        return $alinks;
    }

    public function menu()
    {
        add_options_page(__('settings', 'apoyl-aliyunoss'), __('settings', 'apoyl-aliyunoss'), 'manage_options', 'apoyl-aliyunoss-settings', array(
            $this,
            'settings_page'
        ));
    }

    public function region_select($selected = '')
    {
        $r = '';
        $arr = array(
            'oss-cn-hangzhou',
            'oss-cn-shanghai',
            'oss-cn-nanjing',
            'oss-cn-fuzhou',
            'oss-cn-qingdao',
            'oss-cn-beijing',
            'oss-cn-zhangjiakou',
            'oss-cn-huhehaote',
            'oss-cn-wulanchabu',
            'oss-cn-shenzhen',
            'oss-cn-heyuan',
            'oss-cn-guangzhou',
            'oss-cn-chengdu',
            'oss-cn-hongkong',
            'oss-us-west-1',
            'oss-us-east-1',
            'oss-ap-northeast-1',
            'oss-ap-northeast-2',
            'oss-ap-southeast-1',
            'oss-ap-southeast-2',
            'oss-ap-southeast-3',
            'oss-ap-southeast-5',
            'oss-ap-southeast-6',
            'oss-ap-southeast-7',
            'oss-ap-south-1',
            'oss-eu-central-1',
            'oss-eu-west-1',
            'oss-me-east-1',
        );
        foreach ($arr as $v) {
            if ($selected === $v) {
                $r .= "\n\t<option selected='selected' value='" . esc_attr($v) . "'>" . __(esc_attr($v), 'apoyl-aliyunoss') . "</option>";
            } else {
                $r .= "\n\t<option value='" . esc_attr($v) . "'>" . __(esc_attr($v), 'apoyl-aliyunoss') . "</option>";
            }
        }
        echo $r;
    }
    public function settings_page()
    {
        global $wpdb;
  
        $options_name = 'apoyl-aliyunoss-settings';
        isset($_GET['do'])?$do=$_GET['do']:$do='';
        if($do=='syn'){
            require_once APOYL_ALIYUNOSS_DIR . 'admin/partials/synsetting.php';
        }else{
            require_once APOYL_ALIYUNOSS_DIR . 'admin/partials/setting.php';
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

    public function aliyunoss_wp_generate_attachment_metadata($metadata){
        $arr = get_option('apoyl-aliyunoss-settings');

        if($arr['open']&&$arr['accessid']&&$arr['secretkey']&&$arr['bucket']&&$arr['openauto']){
            $file=apoyl_aliyunoss_file('addattachmentall');
            if($file){
                include $file;
            }
        }

        return $metadata;
    }
}
