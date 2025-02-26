<?php
/**
 * Adding TGM Plugin Activation to require Mstoic Shortcodes Plugin
 */

include_once ('class-tgm-plugin-activation.php');

/**
 * Using TGMPA activation library to require the plugin: Redux Framework
 */
function mstoic_shortcodes_register_required_plugins () {

	$plugins = array (

		array(
			'name'              => 'Redux Framework',
			'slug'              => 'redux-framework',
			'required'          => TRUE,
			'force_activation'  => TRUE
		),

	);

	$config = array (
		'capability'   => 'manage_options',
		'default_path' => '',                                               // Default absolute path
		'dismissable'  => FALSE,                                            // The notices are NOT dismissable
		'dismiss_msg'  => esc_html__('You need to install the Redux Framework plugin. This is required by the Mstoic Shortcodes plugin.', 'mstoic-shortcodes'),   // This message will be output at the top of nag
		'id'           => 'mstoic-shortcodes-tgmpa',                              // A unique TGMPA ID
		'has_notices'  => TRUE,                                             // Show admin notices
		'is_automatic' => TRUE,                                             // Automatically activate plugins after installation
		'menu'         => 'mstoic-shortcodes-install-required-plugins',           // Menu slug
		'message'      => '',                                               // Message to output right before the plugins table

	);

	tgmpa( $plugins, $config );

}
add_action( 'tgmpa_register', 'mstoic_shortcodes_register_required_plugins' );

?>