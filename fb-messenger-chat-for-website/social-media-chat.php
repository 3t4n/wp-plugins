<?php
// Exit if accessed directly
defined( 'ABSPATH' ) or die( 'Na na na na na...' );
/*
Plugin Name: Social Media Chat
Plugin URI: https://iamjagdish.com/wordpress-plugins/
Description: Integrate Social Media Chat on your wordpress website easily without touching any code.
Author: Jagdish Kashyap
Version: 2.0.0
Author URI: https://iamjagdish.com
License: GPL2
*/

/**
 * Non-Static Classes
 */
require __DIR__ . '/main/SMCMain.php';
require __DIR__ . '/frontend/SMCFrontend.php';


/**
 * Plugin activation trigger
 */
require __DIR__ . '/main/SMCActivation.php';
register_activation_hook( __FILE__, array( 'SMCActivation', 'Activate' ) );