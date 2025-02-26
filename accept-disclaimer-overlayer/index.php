<?php
/**
 * @package Mindloop_Disclaimer
 * @version 1.6
 */
/*
Plugin Name: Disclaimer
Plugin URI: http://www.mindloop.be/disclaimer
Description: Disclaimer plugin that forces your visitor to accept a disclaimer before viewing a page or post.
Author: Andy Mathys
Version: 1.0
Author URI: http://www.mindloop.be
*/

/**
 * Main function that initializes the plugin
 *
 * @return void
 */
function __mindloopDisclaimerMain()
{
    require_once plugin_dir_path( __FILE__ ) .'includes/disclaimer.php';
    $disclaimer = new Mindloop_Disclaimer( plugin_dir_path( __FILE__ ) );
}

register_activation_hook( __FILE__, array( 'Mindloop_Disclaimer', 'installation' ) );
__mindloopDisclaimerMain();
