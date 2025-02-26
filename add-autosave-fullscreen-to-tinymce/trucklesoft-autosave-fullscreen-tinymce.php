<?php
/**
* Plugin Name: Add AutoSave | Fullscreen to TinyMCE
* Description: This will install the TinyMCE AutoSave | Fullscreen Plugins (version 4.9.11) and register them with TinyMCE.
* Version: 2.7
* Author: Andrew Truckle
* Author URI: https://www.linkedin.com/in/andrewtruckle/
**/

/**
 * Add the TinyMCE AutoSave and Fullscreen Plugins.
 *
 * @param array $plugins An array of all plugins.
 * @return array
 */
function aaft_custom_plugins( $plugins ) {
     $plugins['autosave'] = plugins_url( 'mce/', __FILE__ ) . 'autosave/plugin.min.js';
     $plugins['fullscreen'] = plugins_url( 'mce/', __FILE__ ) . 'fullscreen/plugin.min.js';
     return $plugins;
}
add_filter( 'mce_external_plugins', 'aaft_custom_plugins' );