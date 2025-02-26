<?php
/*
* Plugin Name: Avatar Project
* Description: Custom default avatars for your WordPress site!
* Plugin URI: https://colormelon.com/plugins/avatar-project
* Author: Colormelon
* Author URI: https://colormelon.com
* Version: 1.0.2
* License: GPL-3.0
* License URI: http://www.gnu.org/licenses/gpl-3.0.txt
* Text Domain: avatar-project
*/

define( 'AVPROJECT_BASE', dirname( __FILE__ ) );
define( 'AVPROJECT_PLUGIN_DIR_URL', plugin_dir_url( __FILE__ ) );
define( 'AVPROJECT_AVATAR_BASE_URL', AVPROJECT_PLUGIN_DIR_URL . 'avatars/' );


require_once AVPROJECT_BASE . '/inc/avatar_config.php';
require_once AVPROJECT_BASE . '/inc/functions.php';

function avproject_init() {

	avproject_initialize_config();

	// Load plugin text domain
	load_plugin_textdomain( 'avatar-project', false, basename( dirname( __FILE__ ) ) . '/languages/' );

	// Attach filters
	add_filter( 'avatar_defaults', 'avproject_avatar_defaults' );
	add_filter( 'get_avatar', 'avproject_get_avatar', 10, 6 );
}


add_action( 'init', 'avproject_init' );
