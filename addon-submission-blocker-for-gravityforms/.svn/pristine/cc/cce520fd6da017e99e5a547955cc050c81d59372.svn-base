<?php 
/**
 * Plugin Name: Addon Submission Blocker for Gravityforms
 * Plugin URI: https://github.com/magarishor/
 * Description: Block submissions from specific IPs, email addresses, and email domains in Gravity Forms.
 * Version: 1.4.0
 * Requires at least: 5.2
 * Requires PHP: 7.4
 * Author: Ishor Ale Magar
 * Author URI: https://github.com/magarishor
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: addon-submission-blocker-for-gravityforms
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// Load dependencies.
require_once plugin_dir_path( __FILE__ ) . 'includes/validation.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/admin-settings.php';

// Initialize the plugin.
new ASBFG_Submission_Blocker();