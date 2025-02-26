<?php
/*
Plugin Name: Advanced Google Translate
Version: 2.1.0
Plugin URI: https://wordpress.org/plugins/advanced-google-translate/
Description: Advanced google translate is the best, 100% free wordpress plugin to translate wordpress website to diffent language. <a href="https://wptranslate.net/">Advanced google translate Support</a>
Author: happy-box
Author URI:
Text Domain: advanced-google-translate
Domain Path:
License: GPL v3
*/

/**
 * Required plugin files
 */
require_once 'agt-main.php';
require_once 'agt-ui.php';


/**
 * Plugin Activation
 */
function agt_activate() {

	$ssb_options = get_option( 'agt_settings' );

	$default_options = array(
		'show_on_frontpage' => 1,
		'show_on_posts' => 1,
		'show_on_pages' => 1
	);

	$new_settings = array_merge($ssb_options, $default_options);

	update_option( 'agt_settings', $new_settings );

	/** @var  $default_options_showoncpt intializing empty array */
	$default_options_showoncpt = array();
	/** @var  $registered_cpts getting registered CPTs */
	$registered_cpts = get_post_types(array('_builtin' => false), 'objects');
	foreach ($registered_cpts as $registered_cpt){

		$default_options_showoncpt[] = $registered_cpt->name;

	}

	update_option('ssb_showoncpt', $default_options_showoncpt);

}

register_activation_hook( __FILE__, 'agt_activate' );


/**
 * SSB Instance
 */
$ssb = new agt_main;
