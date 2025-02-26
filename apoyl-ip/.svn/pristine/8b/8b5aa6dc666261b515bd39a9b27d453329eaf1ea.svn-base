<?php

/*
 * @link http://www.girltm.com/
 * @since 1.0.0
 * @package APOYL_IP
 * @subpackage APOYL_IP/admin
 * @author 凹凸曼 <jar-c@163.com>
 *
 */
class Apoyl_Ip_Admin
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
        $links[] = '<a href="' . esc_url(get_admin_url(null, 'options-general.php?page=apoyl-ip-settings')) . '">' . __('settingsname', 'apoyl-ip') . '</a>';
        $alinks = array_merge($links, $alinks);
        
        return $alinks;
    }

    public function menu()
    {
        add_options_page(__('settings', 'apoyl-ip'), __('settings', 'apoyl-ip'), 'manage_options', 'apoyl-ip-settings', array(
            $this,
            'settings_page'
        ));
    }
    
    public function save_ip($post_ID)
    {
        global $wpdb;
        $arr = get_option('apoyl-ip-settings');
        $ip=$_SERVER['REMOTE_ADDR'];
        $row=$wpdb->get_results('SELECT id FROM '.$wpdb->prefix.'apoyl_ip WHERE postid='.$post_ID);
        if(!$row){
            $data=array('userid'=>get_current_user_id(), 'postid'=>$post_ID,'ip'=>$ip,'addtime'=>time());
            $wpdb->insert($wpdb->prefix.'apoyl_ip', $data);
        }
    }
    
    public function settings_page()
    {
        global $wpdb;
        $options_name = 'apoyl-ip-settings';
        isset($_GET['do'])?$do = sanitize_key($_GET['do']):$do='';
        require_once plugin_dir_path(__FILE__) . 'partials/setting.php';
    }



}
