<?php
/**
 * Plugin Name: Default Media Library View
 * Description: Adds a media library view selection to the user profile page.
 * Plugin URI:
 * Version: 1.0
 * Author: Martin Miller
 * Author URI:
 *
 * License: GPLv3
 * License URI: http://gnu.org/licenses/gpl-3.0-standalone.html
 * Text Domain: default-media-view
 */

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

// todo: 	allow for all sites if multisite?
// todo:   internationalization, namespace

add_action('plugins_loaded', array( MLVD::get_instance(), 'plugin_setup'));

class MLVD {

	protected static $instance = NULL;

	public static function get_instance() {
		NULL === self::$instance AND self::$instance = new self;
		return self::$instance;
	}

	public function plugin_setup() {
		add_action ('show_user_profile', array ( &$this, 'media_lib_view_defaults' ) );
		add_action( 'edit_user_profile', array ( &$this, 'media_lib_view_defaults' ) );
		add_action( 'personal_options_update', array ( &$this, 'update_media_lib_view_default' ) );
		//load_default_textdomain();
	}

 	public function media_lib_view_defaults ( ) {
		$modes = array( 'list', 'grid' );
		// follow wp default behavior...
		$mode = get_user_option( 'media_library_mode', get_current_user_id() ) ? get_user_option( 'media_library_mode', get_current_user_id() ) : $modes[0];
		?>
		<hr />
		<table class="form-table">
			<tr>
				<th>
					<label for="media_view"><?php _e( 'Default Media Library View', 'default-media-view' ); ?></label>
				</th>
				<td>
					<input type="radio" name="mode1"  value="list"  <?php  checked ( $mode, $modes[0] ); ?> /><?php _e( 'List', 'default-media-view'); ?>&nbsp;
					<input type ="radio" name="mode1"  value="grid" <?php checked ( $mode, $modes[1] ); ?> /><?php _e( 'Grid', 'default-media-view' );?>
				</td>
			</tr>
		</table>
		<hr />
		<?php

	}

 	public function update_media_lib_view_default () {
		if (current_user_can('edit_user', get_current_user_id() )) {
			update_user_option(get_current_user_id(), 'media_library_mode', $_POST['mode1'] );
		}
	}

} // end class MLVD