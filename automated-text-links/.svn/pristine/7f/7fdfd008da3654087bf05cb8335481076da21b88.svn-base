<?php
/*
Plugin Name: Automated Text Links
Description: Plugin is inactive and does not work any longer.
Version: 2.0.0
Author: kontextR
Author URI: https://www.kontextr.com/access-technology
*/

// no outside access
if (!defined('WPINC')) die('No access outside of wordpress.');

define('KTR_PLUGIN_NAME', 'Automated Text Links');
define('KTR_PLUGIN_VERSION', '2.0.0');
define('KTR_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('KTR_PLUGIN_URL', plugins_url('/', __FILE__));
define('KTR_PLUGIN_BASENAME', plugin_basename(__FILE__));
define('KTR_REQ_ACCESS_URL', 'https://kontextr.typeform.com/to/WRFQdK');


foreach (glob(KTR_PLUGIN_DIR . "includes/*.php") as $filename) {
    include($filename);
}
include(KTR_PLUGIN_DIR . 'admin/settings.php');

