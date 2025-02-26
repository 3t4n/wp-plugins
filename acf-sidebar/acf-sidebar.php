<?php
/* 
Plugin Name: Advanced Custom Fields Sidebar
Description: Add new field for Sidebar list.
Version: 1.0.0
Author: Webman Technologies
Text Domain : WMAMC_acf_sidebar
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Advanced Custom Fields Sidebar is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

Advanced Custom Fields Sidebar is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with this program.  If not, see <https://www.gnu.org/licenses/>
 Copyright (C) 2018  Webman Technologies
*/

// exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;

$active_plugins = get_option( 'active_plugins', array() );
if( !in_array( 'advanced-custom-fields/acf.php',$active_plugins ) )
{
	add_action('admin_notices', 'WMAMC_acf_sidebar_self_deactivate_notice');
	require_once( ABSPATH . 'wp-admin/includes/plugin.php' ); 
	deactivate_plugins('acf-sidebar/acf-sidebar.php');	
	if( isset( $_GET['activate'] ))
      unset( $_GET['activate'] );
}
function WMAMC_acf_sidebar_self_deactivate_notice(){	
	?>
	<div class="notice notice-error">
		<?php    echo "<h2>" . __( 'Please install and activate Advanced Custom Fields plugin before activating this plugin.', 'WMAMC_acf_sidebar' ) . "</h2>"; ?>
	</div>
	<?php
}
// check if class already exists
if( !class_exists('WMAMC_acf_plugin_sidebar') ) :
class WMAMC_acf_plugin_sidebar {
	// vars
	var $settings;
	/*
	*  __construct
	*
	*  This function will setup the class functionality
	*/	
	function __construct() {		
		// settings
		// - these will be passed into the field class.
		$this->settings = array(
			'version'	=> '1.0.0',
			'url'		=> plugin_dir_url( __FILE__ ),
			'path'		=> plugin_dir_path( __FILE__ )
		);
		// include field
		add_action('acf/include_field_types', 	array($this, 'WMAMC_include_field')); // v5
		add_action('acf/register_fields', 		array($this, 'WMAMC_include_field')); // v4
	}

	/*
	*  WMAMC_include_field
	*
	*  This function will include the field type class
	*
	*  @param	$version (int) major ACF version. Defaults to 4
	*  @return	void
	*/
	function WMAMC_include_field( $version = 4 ) {		
		// load textdomain		load_plugin_textdomain( 'acf_sidebar', false, plugin_basename( dirname( __FILE__ ) ) . '/lang' ); 	
		// include
		include_once('fields/class-WMAMC-acf-field-sidebar-v' .$version. '.php');
	}	
}
// initialize
new WMAMC_acf_plugin_sidebar();

// class_exists check
endif;
?>