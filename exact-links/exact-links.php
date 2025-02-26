<?php 

defined('ABSPATH') or die;

/*
Plugin Name: Exact Links
Plugin URI: https://wordpress.org/plugins/exact-links/
Description: The Most Sophisticated URL Shortener And Conversion Tracking For WordPress  
Version: 3.0.7
Author: ExactLinks
Author URI: https://exactlinks.com
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: exact-links
Domain Path: /language
*/

define('EXACTLINKS_VERSION', '3.0.7');
define('EXACTLINKS', 'exactlinks');
define('EXACTLINKS_UPLOAD_DIR', 'exactlinks');
define('EXACTLINKS_PLUGIN_URL', plugin_dir_url(__FILE__));
define('EXACTLINKS_PLUGIN_FILE_PATH', plugin_basename(__FILE__));

require __DIR__.'/vendor/autoload.php';

call_user_func(function($bootstrap) {
    $bootstrap(__FILE__);
}, require(__DIR__.'/boot/app.php'));
