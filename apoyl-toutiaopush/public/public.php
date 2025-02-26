<?php

/*
 * @link http://www.girltm.com/
 * @since 1.0.0
 * @package Apoyl_Toutiaopush
 * @subpackage Apoyl_Toutiaopush/public
 * @author 凹凸曼 <jar-c@163.com>
 *
 */
class Apoyl_Toutiaopush_Public
{

    private $plugin_name;

    private $version;

    public function __construct($plugin_name, $version)
    {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    public function footer()
    {
        $arr = get_option('apoyl-toutiaopush-settings');
        
        if (isset($arr['opentoutiao']) && $arr['opentoutiao'] > 0) {
            require_once plugin_dir_path(__FILE__) . 'partials/public-display.php';
        }
    }
}