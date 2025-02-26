<?php
/*
Plugin Name: 3D Snow
Plugin Script: 3d-snow.php
Plugin URI: http://www.vanmeerdervoort.nl/3d-snow-wordpress-plugin.html
Description: An awesome 3D snow effect for your website! Just install and activate to make it snow.
Version: 0.3
License: GPL
Author: vanMeerdervoort
Author URI: http://www.vanmeerdervoort.nl/

=== RELEASE NOTES ===
2014-12-18 - v0.3 - bug fixes and compatibility with wordpress 4.0.1
2013-12-16 - v0.2.1 - bug fixes
2013-12-16 - v0.2 - bug fixes
2013-12-10 - v0.1 - first version
*/

/* 
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
Online: http://www.gnu.org/licenses/gpl.txt
*/


function threeDsnow_add_scripts() {
	
	wp_register_script('three', plugins_url('/js/Three.js', __FILE__), array('jquery'),'1.1', true);
	wp_register_script('snow', plugins_url('/js/Snow.js', __FILE__), array('jquery'),'1.1', true);
	wp_register_script('snowinit', plugins_url('/js/SnowInit.js', __FILE__), array('jquery'),'1.1', true);

	wp_enqueue_script('three');
	wp_enqueue_script('snow');
	wp_enqueue_script('snowinit');
}



function threeDsnow_add_enddiv(){

	echo "</div><!-- 3D Snow by vanMeerdervoort.nl -->";

}

if ( !is_admin() ) {
	
	add_action( 'wp_enqueue_scripts', 'threeDsnow_add_scripts' );  

	echo"<!-- 3D Snow by vanMeerdervoort.nl --><div id='showBox' style='position: absolute; top: -10px; left: 0px; z-index: 0; width: 100%; height: 1px;background-color:#fff'>
	<canvas width='1' height='1' style='z-index:-1;'></canvas>";


	add_action('wp_footer', 'threeDsnow_add_enddiv');

}
