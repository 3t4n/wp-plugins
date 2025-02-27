<?php
/*
Plugin Name: Force Update Check for Plugins and Themes
Description: Force WordPress to run a check for plugin and themes updates.
Version:           1.0.1
Author:            WP Zone
Author URI:        https://wpzone.co/?utm_source=force-update-check-for-plugins-and-themes/&utm_medium=link&utm_campaign=wp-plugin-author-uri
License: GNU General Public License version 3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.en.html
GitLab Plugin URI: https://gitlab.com/aspengrovestudios/force-update-check-for-plugins-and-themes/
Text Domain: ags-forceupdate
*/

/*
"Force Update Check for Plugins and Themes" plugin
Copyright (C) 2024  WP Zone

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <https://www.gnu.org/licenses/>.


=====

See ./license.txt for copyright and licensing information for this plugin
and third-party code used in it.
*/

class AGSForceUpdates {
	private static $pluginName;

	static function setup() {
		self::$pluginName = __( 'Force Update Check for Plugins and Themes', 'ags-forceupdate' );

		add_action( 'admin_init', array(
			__CLASS__,
			'onAdminInit'
		) );
	}

	static function onAdminInit() {
		if ( isset( $GLOBALS['pagenow'] ) && $GLOBALS['pagenow'] == 'update-core.php' ) {

			add_action( 'admin_notices', array(
				__CLASS__,
				'showUpdatesPageNotice'
			) );

			// wp-includes\update.php
			wp_clean_update_cache();

			// wp-includes\update.php
			wp_update_themes();

			// wp-includes\update.php
			wp_update_plugins();

		}

	}

	static function showUpdatesPageNotice() {
		echo(
			'<div class="notice notice-warning"><p>'
			// translators: %s = plugin name (in strong tags), strong+link tag open, link+strong tag close
			. sprintf(
				esc_html__( 'The update checks for themes and plugins will run each time this page is loaded because the %s plugin by %sWP Zone%s is active. Update statuses may still be cached by third-party updaters.', 'ags-forceupdate' ),
				'<strong>' . esc_html( self::$pluginName ) . '</strong>',
				'<strong><a href="https://wpzone.co/" target="_blank">',
				'</a></strong>'
			)
			. '</p></div>'
		);
	}


}

AGSForceUpdates::setup();
