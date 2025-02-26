<?php
/*
Plugin Name: Mobile Gallery
Plugin URI: http://madebyraygun.com/wordpress/plugins/mobile-gallery-pro/
Description: Adds a mobile-friendly slideshow to the WordPress gallery shortcode
Author: Raygun
Version: 1.0.2
Author URI: http://madebyraygun.com

Copyright 2011 Raygun Design LLC (email : contact@madebyraygun.com)
This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.
This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
*/ 

define( 'MOBILE_GALLERY_PATH', plugin_dir_path( __FILE__ ) );

define( 'MOBILE_GALLERY_LOCATION', plugin_basename(__FILE__) );

define( "MOBILE_GALLERY_VERSION", "1.0.2" );

define ( 'MOBILE_GALLERY_URL', plugins_url( '' ,  __FILE__ ) );


//our main functions file
require ( MOBILE_GALLERY_PATH . 'inc/functions.php'); 

// Get the admin page if necessary
if ( is_admin() ) { 
	require( MOBILE_GALLERY_PATH . 'admin/mobile-gallery-admin.php' );
}
?>
