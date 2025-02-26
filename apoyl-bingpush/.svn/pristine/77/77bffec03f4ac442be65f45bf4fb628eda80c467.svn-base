<?php

/*
 * @link http://www.girltm.com/
 * @since 1.0.0
 * @package Apoyl_Bingpush
 * @subpackage Apoyl_Bingpush/public
 * @author 凹凸曼 <jar-c@163.com>
 *
 */
class Apoyl_Bingpush_Public
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
        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/apoyl-bingpush-public.css', array(), $this->version, 'all');
    }

    public function enqueue_scripts()
    {
        wp_enqueue_script('jquery');
    }

    public function footer()
    {

        $arr = get_option('apoyl-bingpush-settings');
        if (isset($arr['site']) && isset($arr['secret'])) {
            $a = explode('/', home_url());
            $url = $a[2] . sanitize_url($_SERVER["REQUEST_URI"]);
            $aid = get_the_ID();            
            $ajaxurl = admin_url('admin-ajax.php');
            $nonce = wp_create_nonce('ajaxpush_nonce');
            require_once plugin_dir_path(__FILE__). 'partials/apoyl-bingpush-public-display.php';
            $file=apoyl_bingpush_file('autopush');
            if($file){
            	include $file;
            }
        }
    }
    


    public function apoyl_bingpush_ajaxpush()
    {
        global $wpdb;
        if (! check_ajax_referer('ajaxpush_nonce'))
            exit();
        $aid = isset ( $_POST ['aid'] ) ? ( int ) sanitize_key ( $_POST ['aid'] ) :  0;
        $subject = sanitize_text_field($_POST['subject']);
        $url = sanitize_url(urldecode($_POST['url']));
        
        if ($aid <= 0)
            exit();
        $arr = get_option('apoyl-bingpush-settings');
        
        if (! $arr['site'])
            exit();
        if (! $arr['secret'])
            exit();
        
        $row = (array) $wpdb->get_row('SELECT * FROM ' . $wpdb->prefix . 'apoyl_bingpush WHERE aid=' . $aid);


        require_once plugin_dir_path(__FILE__). 'api/BingPush.php';
        $bingpush = new BingPush();
        echo $bingpush->push($row, $aid, $subject, $url);
        exit();
    }

    public function push_btn($content)
    {
        global $wpdb;
        $str="";
        $aid = isset ( $_POST ['aid'] ) ? ( int ) sanitize_key ( $_POST ['aid'] ) :  0;
        if (is_single() && is_user_logged_in()) {
            $aid = get_the_ID();
            $row = (array) $wpdb->get_row('SELECT * FROM ' . $wpdb->prefix . 'apoyl_bingpush WHERE aid=' . $aid);
            if ($row && $row['ispush'] == 1)
                $str = '<img src="' . plugin_dir_url(__FILE__) . 'img/bing.png" width=20 height=20 style="vertical-align:text-bottom;" title="' . __('pushsuccess', 'apoyl-bingpush') . '"/>';
            else
                $str = '<div><a class="apoyl_bingpush_btn" style="cursor:pointer;" attraid="'.$aid.'">' . __('pushping', 'apoyl-bingpush') . '</a>  <span class="apoyl_bingpush_tips" style="color:red;"></span></div>';
        }
        return $str . $content;
    }
}