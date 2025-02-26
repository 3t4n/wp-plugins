<?php
/**
 * Plugin Name: Social Pug: Author Box
 * Plugin URI: http://www.devpups.com/social-pug/
 * Description: Add a simple and beautiful author box with social media profile buttons after your posts and pages
 * Version: 1.0.0
 * Author: DevPups, Mihai Iova
 * Author URI: http://www.devpups.com/
 * License: GPL2
 *
 * == Copyright ==
 * Copyright 2016 DevPups (www.devpups.com)
 *	
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 */

Class Social_Pug_Author_Box {

	/*
	 * Constructor
	 *
	 */
	public function __construct() {

		define( 'SPAB_VERSION', '1.0.0' );
		define( 'SPAB_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
		define( 'SPAB_PLUGIN_DIR_URL', plugin_dir_url( __FILE__ ) );

		$this->load_resources();

		add_action( 'admin_init', array( $this, 'update_database' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'front_end_enqueue_scripts' ) );

	}


	/*
	 * Loads files needed for the plugin to work properly
	 *
	 */
	public function load_resources() {

		if( file_exists( SPAB_PLUGIN_DIR . 'inc/functions.php' ) )
			include SPAB_PLUGIN_DIR . 'inc/functions.php';

		if( file_exists( SPAB_PLUGIN_DIR . 'inc/class-admin-settings-page.php' ) )
			include SPAB_PLUGIN_DIR . 'inc/class-admin-settings-page.php';

		if( file_exists( SPAB_PLUGIN_DIR . 'inc/class-admin-user-fields.php' ) )
			include SPAB_PLUGIN_DIR . 'inc/class-admin-user-fields.php';

		if( file_exists( SPAB_PLUGIN_DIR . 'inc/class-user-social-profiles.php' ) )
			include SPAB_PLUGIN_DIR . 'inc/class-user-social-profiles.php';		

		if( file_exists( SPAB_PLUGIN_DIR . 'inc/class-author-box-outputter.php' ) )
			include SPAB_PLUGIN_DIR . 'inc/class-author-box-outputter.php';

		if( file_exists( SPAB_PLUGIN_DIR . 'inc/class-shortcodes.php' ) )
			include SPAB_PLUGIN_DIR . 'inc/class-shortcodes.php';

	}


	/*
	 * Fallback for setting defaults when updating the plugin,
	 * as register_activation_hook does not fire for automatic updates
	 *
	 */
	public function update_database() {

		$spab_db_version = get_option( 'spab_version', '' );

		if( $spab_db_version != SPAB_VERSION ) {

			update_option( 'spab_version', SPAB_VERSION );

			// Add first time activation
			if( get_option( 'spab_first_activation', '' ) == '' )
				update_option( 'spab_first_activation', time() );

		}

	}


	/*
	 * Enqueue admin scripts
	 *
	 */
	public function admin_enqueue_scripts( $hook ) {

		wp_enqueue_script( 'spab-admin-script', SPAB_PLUGIN_DIR_URL . 'assets/js/dashboard.js', array( 'jquery', 'jquery-ui-core' ) );
		wp_enqueue_style( 'spab-admin-style', SPAB_PLUGIN_DIR_URL . 'assets/css/style-dashboard.css', array() );

	}


	/*
	 * Enqueue front-end scripts
	 *
	 */
	public function front_end_enqueue_scripts() {

		wp_enqueue_style( 'spab-front-end-style', SPAB_PLUGIN_DIR_URL . 'assets/css/style-front-end.css', array() );

	}

}

// Let's get the party started
new Social_Pug_Author_Box;