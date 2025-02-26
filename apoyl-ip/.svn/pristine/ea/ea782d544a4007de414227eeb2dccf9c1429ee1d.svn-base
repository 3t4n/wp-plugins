<?php

/*
 * @link http://www.girltm.com/
 * @since 1.0.0
 * @package APOYL_IP
 * @subpackage APOYL_IP/public
 * @author 凹凸曼 <jar-c@163.com>
 *
 */
class Apoyl_Ip_Public
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
        if (is_single()) {
            wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/public.css', array(), $this->version, 'all');
        }
    }

    public function apoyl_ip_get_comment_author($author)
    {
        global $comment;
        $arr = get_option('apoyl-ip-settings');
        if ($arr['open']) {
            $file = apoyl_ip_file('getiplocationcomment');
            if ($file) {
                include $file;
            }
        }
        return $author;
    }

    public function apoyl_ip_the_author($author)
    {
        global $wpdb;
        if (is_single()) {
            
            $arr = get_option('apoyl-ip-settings');
            
            if ($arr['open']) {
                include plugin_dir_path(__FILE__) . 'partials/public-display.php';
            }
        }
        return $author;
    }
}