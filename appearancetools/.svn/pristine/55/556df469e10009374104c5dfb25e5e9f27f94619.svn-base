<?php

/**
 * Plugin Name: AppearanceTools
 * Plugin URI: https://llamapress.com/
 * Description: If your current theme has deactivated any appearance or style tools in the Block Editor, this small plugin will re-activate them.
 * Requires at least: 6.1
 * Version: 1.0.0
 * Author: James Roberts
 * Author URI: https://profiles.wordpress.org/james-roberts/
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: appearancetools
 *
 * @package appearancetools
 */

/*
AppearanceTools is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

AppearanceTools is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with AppearanceTools. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

require plugin_dir_path( __FILE__ ) . 'inc/class-appearancetools.php';
$appearancetools = new AppearanceTools();

// Set all settings to TRUE
add_filter( 'wp_theme_json_data_theme', array( $appearancetools, 'appearancetools_true' ) );
