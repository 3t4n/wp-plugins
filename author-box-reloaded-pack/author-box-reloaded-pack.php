<?php
/*
Plugin Name: Author Box Reloaded Pack - External Contact Addons
Plugin URI: http://wordpress.org/extend/plugins/author-box-reloaded-pack/
Description: Adds External Contact fields to your profile. Just need to insert your UserID. Requires Author Box Reloaded 2.0 or greater.
Version: 1.1.2
Author: Lopo Lencastre de Almeida - iPublicis.com
Author URI: http://www.ipublicis.com
Donate link: http://smsh.me/7kit
License: GNU GPL v3 or later

    Copyright (C) 2010, 2012 iPublicis!COM

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
*/
/*
$abr2pack_dirname = plugin_basename( dirname(__FILE__) );
$abr2pack_name = basename( __FILE__ );

//load translation file if any for the current language
load_plugin_textdomain( 'abr2pack', PLUGINDIR . '/' . $abr2pack_dirname . '/i18n' );

add_action('wp','abr2PackPluginTool');

function abr2PackPluginTool() {
	global $abr2pack_dirname, $abr2pack_name;
	
	if( is_admin() || is_single() || is_page() || is_home() || is_archive() || is_category() || is_tag() ) {

		$sDir = dirname( __FILE__ );
		$sDir = rtrim( $sDir, '/' );
		$sDir = str_replace( '/author-box-reloaded-pack', '', $sDir ); // myplugin was folder name of current plugin
		$sDir = rtrim( $sDir, '/' );

		require_once( $sDir . '/../../wp-admin/includes/plugin.php' );

		// DEACTIVATE
		if (is_plugin_active($sDir . '/author-box-2/authorbox.php')) {
			$n = file_list( PLUGINDIR . '/' . $abr2pack_dirname, ".php");
			var_dump($n);
			if( $n ) {
				foreach( $n as $f ) {
					if( $f <> $abr2pack_name ) {
						require_once( $abr2pack_dirname . '/' . $f );
						// activate_plugin( $sDir . '/' . $abr2pack_dirname . '/' . $f );
						$r = array( '.php' => '', '_' => ' ' );
						$f = ucwords( str_replace( array_keys($r), $r, $f ) ); 
						$m .= $f . ', ';
					}	
				}
				$m = rtrim( $f, ', ' );
				$m  = sprintf( __( '%s add-ons are loaded and <b>active</b>.', 'abr2pack' ), $m );
				$notice = "<div id=\"message\" class=\"updated fade\"><p><strong>Author Box Reloaded Pack</strong></p>" . 
								"<p>" . $m . "</p></div>\n";
				add_action('admin_notices', create_function( '', "echo '$notice';" ) );
			}
		}

		/*
		// ACTIVATE
		if (!is_plugin_active($sDir . '/partnerplugin/partner.php')) {
			activate_plugin($sDir . '/partnerplugin/partner.php');
		}
		*/
/*	}
}
*/

$plugins = get_option( 'active_plugins' );
$required_plugin = 'author-box-2/authorbox.php';
if ( !in_array( $required_plugin , $plugins ) ) {
	$wpfr = '<a href="http://wordpress.org/extend/plugins/author-box-2/" target="_blank">Author Box Reloaded</a>';
	$dieMessage  = sprintf( __( 'The %s plugin must be installed and active.', 'abr2pack' ), $wpfr );
	$notice = "<div id=\"message\" class=\"error fade\"><p><strong>Author Box Reloaded Pack</strong></p>".
					"<p>".$dieMessage."</p></div>\n";
	add_action( 'admin_notices', create_function( '', "echo '$notice';" ) );
} 

/*else {
	add_action( 'wp', 'load_abr2pack' );
}

function load_abr2pack() {
	global $abr2pack_dirname, $abr2pack_name;
	
	require_once( PLUGINDIR . '/../../wp-admin/includes/plugin.php' );

	// Include all add-on files
	$m = __( 'No Add-ons found!', 'abr2pack' );
	$n = file_list( PLUGINDIR . '/' . $abr2pack_dirname, ".php");
	var_dump($n);
	if( $n ) {
		foreach( $n as $f ) {
			if( $f <> $abr2pack_name ) {
				activate_plugin( $abr2pack_dirname . '/' . $f );
				$r = array( '.php' => '', '_' => ' ' );
				$f = ucwords( str_replace( array_keys($r), $r, $f ) ); 
				$wpfr .= $f . ', ';
			}	
		}
		$m  = sprintf( __( '%s add-ons are loaded and <b>active</b>.', 'abr2pack' ), $wpfr );
		$notice = "<div id=\"message\" class=\"updated fade\"><p><strong>Author Box Reloaded Pack</strong></p>" . 
						"<p>" . $m . "</p></div>\n";
		add_action('admin_notices', create_function( '', "echo '$notice';" ) );
	}
}

function file_list($d,$x){
       foreach(array_diff(scandir($d),array('.','..')) as $f)if(is_file($d.'/'.$f)&&(($x)?ereg($x.'$',$f):1))$l[]=$f;
       return $l;
} 
*/
?>