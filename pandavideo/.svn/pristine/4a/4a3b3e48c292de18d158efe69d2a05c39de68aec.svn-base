<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for plugin Panda Player
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */
require_once WP_PLUGIN_DIR . PANDAVIDEO_PLUGIN_PATH . '/vendor/autoload.php';

add_action( 'tgmpa_register', 'pandavideo_activateRequiredPlugins' );

function pandavideo_activateRequiredPlugins()
{
	$plugins = array(
		array(
			'name'        => 'Elementor',
			'slug'        => 'elementor',
			'required'    => true,
			'force_activation' => true
		)
	);

	$config = array(
		'id'           => 'panda_player_tgm',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'parent_slug'  => 'plugins.php',
		'capability'   => 'manage_options',
		'has_notices'  => true,
		'dismissable'  => false,
		'dismiss_msg'  => '',
		'is_automatic' => true,
		'message'      => '',
		'strings'      => array(
			'page_title'                      => __( 'Install needed plugins', 'pandavideo' ),
			'menu_title'                      => __( 'Install plugins', 'pandavideo' ),
			'install_link'                    => _n_noop(
				'Install needed plugin',
				'Install needed plugins',
				'pandavideo'
			),
			'installing'                      => __( 'Installing plugin: %s', 'pandavideo' ),
			'updating'                        => __( 'Updating: %s', 'pandavideo' ),
			'oops'                            => __( 'An error has occurred while installing the plugin %s.', 'pandavideo' ),
			'notice_can_install_required'     => _n_noop(
				'The plugin Panda Player needs the following plugin: %1$s.',
				'The plugin %s needs the following plugins: %1$s.',
				'pandavideo'
			),
			'notice_can_activate_required'    => _n_noop(
				'The needed plugin %1$s is deactivated.',
				'The needed plugins are deactivated.: %1$s.',
				'pandavideo'
			),
			'return'                          => __( 'Go back to necessary plugins panel', 'pandavideo' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'pandavideo' ),
			'activated_successfully'          => __( 'The plugin was activated successfully.', 'pandavideo' ),
			'complete'                        => __( 'All plugins have been installed successfully. %1$s', 'pandavideo' ),
			'dismiss'                         => __( 'Ignore warning', 'pandavideo' ),
			'notice_cannot_install_activate'  => __( 'There is one or more plugins that need to be installed.', 'pandavideo' ),
			'contact_admin'                   => __( 'Contact the admin to request help.', 'pandavideo' ),
			'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
		),
	);

	tgmpa( $plugins, $config );
}