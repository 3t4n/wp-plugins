<?php
/*
 * Plugin Name: AddonSuite for WPAdverts
 * Plugin URI: https://wpextend.net/
 * Description: Extend your WPAdverts classifieds page with new features and options in less than a minute.
 * Author: WPExtend
 * Text Domain: addonsuite-for-wpadverts
 * Version: 1.0.9
 *
 * The AddonSuite is free software under the terms of the GNU General Public License as 
 * published by the Free Software Foundation, either version 2 of the License, or any later 
 * version.
 *
 * The AddonSuite is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * <http://www.gnu.org/licenses/>
 *
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Exit if accessed directly.
	}
	
	// AddonSuite Framework
	function adosui_check_wpadverts () {		
		if ( function_exists('adverts_init') ) {			
			include('includes/plugin-functions.php'); 
			include('includes/plugin-admin.php');
			include('includes/plugin-admin-extendedoptions.php');		
			include('includes/plugin-scripts.php');		
		} else {			
			function adosui_no_wpadverts_notice() { ?>				
				<div class="error notice">
					<p><?php _e( 'Please note that you have to install and activate WPAdverts to use the <strong>AddonSuite Framework</strong>.', 'addonsuite-for-wpadverts' ); ?>
					<a href="plugin-install.php?s=wpadverts.com&tab=search&type=term" title="<?php _e('Install or activate WPAdverts', 'addonsuite-for-wpadverts'); ?>" style="text-decoration: none; float: right;"> <span class="dashicons dashicons-plus-alt"></span></a>
					</p>
				</div>			
			<?php }
			add_action( 'admin_notices', 'adosui_no_wpadverts_notice' );
		}
	} add_action( 'plugins_loaded', 'adosui_check_wpadverts' );
			
	// Load Textdomain
	function adosui_load_textdomain() {
		load_plugin_textdomain( 'addonsuite-for-wpadverts', false, basename( dirname( __FILE__ ) ) . '/languages' ); 
	}
	add_action( 'plugins_loaded', 'adosui_load_textdomain' );
	