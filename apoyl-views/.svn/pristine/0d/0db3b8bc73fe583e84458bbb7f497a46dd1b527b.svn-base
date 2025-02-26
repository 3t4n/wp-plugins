<?php
/*
 * @link  
 * @since 1.0.0
 * @package APOYL_VIEWS
 * @subpackage APOYL_VIEWS/admin
 * @author 凹凸曼 <jar-c@163.com>
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
class Apoyl_Views_Admin
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
        $links[] = '<a href="' . esc_url(get_admin_url(null, 'options-general.php?page=apoyl-views-settings')) . '">' . __('settingsname', 'apoyl-views') . '</a>';
        $alinks = array_merge($links, $alinks);
        
        return $alinks;
    }

    public function menu()
    {
        add_options_page(__('settings', 'apoyl-views'), __('settings', 'apoyl-views'), 'manage_options', 'apoyl-views-settings', array(
            $this,
            'settings_page'
        ));
    }

    public function settings_page()
    {
        global $wpdb;
        $options_name = 'apoyl-views-settings';
        isset($_GET['do'])?$do = sanitize_text_field($_GET['do']):$do='';
        if ($do == 'list') {
            require_once plugin_dir_path(__FILE__) . 'partials/list.php';
        } else {
            require_once plugin_dir_path(__FILE__) . 'partials/setting.php';
        }
    }
    public function columns($columns)
    {

        $columns['apoyl_views_count'] =__('viewscount','apoyl-views');
        return $columns;
    }
    public function columns_value($column)
    {
        global $post;
        if($column=='apoyl_views_count'&& isset($post)){
            $count = get_post_meta($post->ID, 'apoyl_views_count', true);
            if(!$count){
                $count = 0;
            }
            echo $count;
        }
    }
    private function randStr($rangeString) {

        if (preg_match('/^(\d+)\~(\d+)$/', $rangeString, $matches)) {
            $min = intval($matches[1]);
            $max = intval($matches[2]);
            if ($min > $max) {
                list($min, $max) = [$max, $min];
            }

            return mt_rand($min, $max);
        } else {
            return mt_rand(0, 100);
        }
    }
    public function my_first_save($post_id, $post, $update) {

        if ( ! $update ) {
            $file=apoyl_views_file('initialize');
            if($file){
                include $file;
            }
        }

    }
}
