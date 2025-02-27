<?php /*

**************************************************************************

Plugin Name:  Disable Trackbacks
Plugin URI:   http://www.viper007bond.com/wordpress-plugins/disable-trackbacks/
Description:  Globally disables trackbacks to cut down on spam. Very, very few people legitimately use trackbacks and spammers love them, so it's worthy tradeoff.
Version:      1.0.0
Author:       Viper007Bond
Author URI:   http://www.viper007bond.com/

**************************************************************************

Copyright (C) 2008 Viper007Bond

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.

**************************************************************************/

class DisableTrackbacks {

	// Plugin initialization
	function DisableTrackbacks() {
		add_action( 'pings_open', array(&$this, 'pings_open') );
	}


	// If we're doing a trackback, say the pings are closed
	function pings_open( $open ) {
		return ( '1' == get_query_var( 'tb' ) ) ? FALSE : $open;
	}
}

// Start this plugin once all other plugins are fully loaded
add_action( 'plugins_loaded', create_function( '', 'global $DisableTrackbacks; $DisableTrackbacks = new DisableTrackbacks();' ) );

?>