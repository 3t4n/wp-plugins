<?php

/*
 * @link http://www.girltm.com/
 * @since 1.0.0
 * @package Apoyl_Videoctrl
 * @subpackage Apoyl_Videoctrl/public
 * @author 凹凸曼 <jar-c@163.com>
 *
 */
class Apoyl_Videoctrl_Public
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

    public function apoyl_videoctrl_the_content($content)
    {
        if (is_single()) {
            $arr = get_option('apoyl-videoctrl-settings');
   
            if ($arr['open']) {
                include plugin_dir_path(__FILE__) . 'partials/public-display.php';
            }
        }
        return $content;
    }
}