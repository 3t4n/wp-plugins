<?php
/**
 * Enqueue all styles and scripts of Konfirmi Plugin
 * 
 * @package Konfirmi Plugin
 */

namespace Konfirmi\Base;

use \Konfirmi\Base\BaseController;

class Enqueue extends BaseController
{
    public function register()
    {
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue') );
    }

    /**
     * Enqueue all styles and scripts of Konfirmi Plugin
     */
    public function enqueue()
    {
        wp_enqueue_style('mypluginstyle', $this->plugin_url . 'assets/css/konfirmi.min.css');
        wp_enqueue_script( 'mypluginscriptconfig', $this->plugin_url . 'assets/js/Config.js');
        wp_enqueue_script( 'mypluginscript', $this->plugin_url . 'assets/js/konfirmi.js');
    }
}