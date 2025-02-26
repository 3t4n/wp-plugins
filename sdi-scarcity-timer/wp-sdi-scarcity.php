<?php
/**
 * @package sdi-scarcity
 * @version 0.1
 */
/*
Plugin Name: SDI Scarcity Timer
Plugin URI: http://wordpress.org/plugins/sdi-scarcity/
Description: A new scarcity timer that is easily be integrated in your wordpress website
Author: Rex Bengil
Version: 0.1
Author URI: https://sparkdigitalinfluence.com/
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  sdiscarcity
Domain Path:  /languages
*/

define('SDI_PLUGIN_PATH',dirname(__FILE__));

require_once(dirname(__FILE__).'/includes/bootstrap.php');

// register hooks
register_activation_hook( __FILE__, array( 'SdiScarcity', 'activatePlugin' ) );
register_deactivation_hook( __FILE__,  function(){
	ClassRegistry('SdiScarcity')->deactivatePlugin();
} );

// init add
ClassRegistry('SdiScarcity')->init();