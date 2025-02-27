<?php
/**
 * The file responsible for starting the Easy Wysiwyg Style plugin
 *
 * The Easy Wysiwyg Style is a plugin that allows you to view the styling
 * of your theme in the Wysiwyg editor. This particular file is
 * responsible for including the dependencies and starting the plugin.
 *
 * @package EWS
 *
 * Plugin Name: Easy Wysiwyg Style
 * Plugin URI: http://wordpress.org/plugins/easy-wysiwyg-style/
 * Description: Allows you to view the styling of your theme in the Wysiwyg editor. Enhances your Wysiwyg and adds the insert table functionality
 * Version: 1.2
 * Author: Joaquin Ruiz
 * Author URI: http://jokiruiz.com
 */

// If this file is called directly, then abort execution.
if ( ! defined( 'WPINC' ) ) {
    die;
}

/**
 * Include the core class responsible for loading all necessary components of the plugin.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-easy-wysiwyg-style.php';

/**
 * Instantiates the Easy Wysiwyg Style class and then
 * calls its run method officially starting up the plugin.
 */
function run_easy_wysiwyg_style() {

    $ews = new Easy_Wysiwyg_Style();
    $ews->run();

}

run_easy_wysiwyg_style();

