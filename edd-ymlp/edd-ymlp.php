<?php

/*
Plugin Name: Easy Digital Downloads - YMLP checkout checkbox
Plugin URI: http://dannyvankooten.com/wordpress-plugins/easy-digital-downloads-ymlp/
Description: Adds a newsletter sign-up checkbox to your checkout form
Version: 1.0
Author: Danny van Kooten
Author URI: http://dannyvanKooten.com

YMLP for Easy Digital Downloads
*/

defined( 'ABSPATH' ) OR exit;

define('EDD_YMLP_VERSION', "1.0");
define('EDD_YMLP_PLUGIN_FILE', __FILE__);
define("EDD_YMLP_PLUGIN_DIR", plugin_dir_path(__FILE__));

require EDD_YMLP_PLUGIN_DIR . '/includes/EDD_YMLP.php';
new EDD_YMLP();