<?php
/**
 * @package 2mee Human Hologram
 * @version 0.0.1
 * @email: abhi.prateek@2mee.com
 */
/*
Plugin Name: 2mee Human Hologram
Plugin URI: http://wordpress.org/plugins/2mee/
Description: A shortcode based wordpress plugin to enable 2mee Human Hologram player on the webpage
Author: 2mee
Version: 0.0.1
Author URI: https://2mee.com/
*/

define( 'APPEAR2ME_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once(APPEAR2ME_PLUGIN_DIR .'appear2me_init.php');
require_once(APPEAR2ME_PLUGIN_DIR .'appear2me_settings.php');
require_once(APPEAR2ME_PLUGIN_DIR .'appear2me_shortcode.php');
