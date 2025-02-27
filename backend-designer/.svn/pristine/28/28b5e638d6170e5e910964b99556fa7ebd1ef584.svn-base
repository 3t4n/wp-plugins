<?php

/*
Plugin Name: Backend Designer
Plugin URI: https://wordpress.org/plugins/backend-designer/
Description: Create your own design for the Wordpress Backend and customize the Login screen with your logo and awesome color styles.
Version:     1.4
Author:      Daniele De Rosa
Author URI:  http://www.danielederosa.de
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: backend-designer
Domain Path: /languages
*/

/**
 * Safety first :-)
 */

defined('ABSPATH') or die();

/**
 * Translations
 */

function ddbd_plugin_init_locales()
{
    load_plugin_textdomain('backend-designer', false, plugin_basename(dirname(__FILE__)) . '/languages');
}
add_action('plugins_loaded', 'ddbd_plugin_init_locales');


/**
 * Loading Options Panel
 */

require_once('admin/options.php');


/**
 * Output
 */

require_once('output/styles.php');
