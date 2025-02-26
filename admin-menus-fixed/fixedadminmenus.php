<?php
/*
Plugin Name: Admin Menus Fixed
Plugin URI: https://blog.imperialearth.com/wordpress/fixed-admin-menus-the-plugin-condensed/
Description: All admin menus available in a stacked, compressed, fixed configuration. Saves even more screen real estate and a lot of scrolling!
Version: 1.4
Author: Spherical (B.E. "BJ" Johnson)
Author URI: https://sphericalmagic.com/
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

    Copyright 2010 B.E.Johnson  (email: bj-wpplugins@spherical.org)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// Make sure it's WP 3.5+ only
function wp_fixedadmin_check(){
	global $wp_version;
	if ( version_compare($wp_version, '3.5', '<') ) {
		deactivate_plugins( basename(__FILE__) );
		wp_die("Sorry, this plugin requires at least WordPress 3.5");
	}
}

if ( is_admin() ){
	function fixedadmin_enqueue_scripts() {
		wp_register_script( 'fixedadmin-bar-delay', plugins_url('admin-menus-fixed') . '/js/fixedadmin-bar-delay.js', array( 'jquery', 'hoverIntent' ), '1.4', true );
		wp_enqueue_script( 'fixedadmin-bar-delay' );
	}
	add_action( 'admin_enqueue_scripts', 'fixedadmin_enqueue_scripts' );

  function fixedadmin_enqueue_css() {
		global $wp_version, $bj_ozh_adminmenu;
		$bj_ozh_adminmenu = (array)get_option('ozh_adminmenu');
		if (function_exists('wp_ozh_adminmenu')) {
			if ($bj_ozh_adminmenu['compact']) {
				if ( version_compare($wp_version, '4.0-beta1', '>=') ) {
					if ($bj_ozh_adminmenu['minimode']|get_option('agca_header')==true) {
						wp_enqueue_style( 'fixedadminmenusc-nb', plugins_url('admin-menus-fixed') . '/css/fixedadminmenusc-nb.css', array( 'admin-bar', 'wp-admin' ), '1.4' );
					} else {
						wp_enqueue_style( 'fixedadminmenusc', plugins_url('admin-menus-fixed') . '/css/fixedadminmenusc.css', array( 'admin-bar', 'wp-admin' ), '1.4' );
					}
				} else {
					if ( version_compare($wp_version, '3.8-beta1', '>=') ) {
						if ($bj_ozh_adminmenu['minimode']|get_option('agca_header')==true) {
							wp_enqueue_style( 'fixedadminmenus38c-nb', plugins_url('admin-menus-fixed') . '/css/fixedadminmenus38c-nb.css', array( 'admin-bar', 'wp-admin' ), '1.4' );
						} else {
							wp_enqueue_style( 'fixedadminmenus38c', plugins_url('admin-menus-fixed') . '/css/fixedadminmenus38c.css', array( 'admin-bar', 'wp-admin' ), '1.4' );
						}
					} else {
						if ( version_compare($wp_version, '3.5-beta1', '>=') ) {
							if ($bj_ozh_adminmenu['minimode']|get_option('agca_header')==true) {
								wp_enqueue_style( 'fixedadminmenus35c-nb', plugins_url('admin-menus-fixed') . '/css/fixedadminmenus35c-nb.css', array( 'admin-bar', 'wp-admin' ), '1.4' );
							} else {
								wp_enqueue_style( 'fixedadminmenus35c', plugins_url('admin-menus-fixed') . '/css/fixedadminmenus35c.css', array( 'admin-bar', 'wp-admin' ), '1.4' );
							}
						}
					}
				}
			} else {
				if ( version_compare($wp_version, '4.0-beta1', '>=') ) {
					if ($bj_ozh_adminmenu['minimode']|get_option('agca_header')==true) {
						wp_enqueue_style( 'fixedadminmenus-nb', plugins_url('admin-menus-fixed') . '/css/fixedadminmenus-nb.css', array( 'admin-bar', 'wp-admin' ), '1.4' );
					} else {
						wp_enqueue_style( 'fixedadminmenus', plugins_url('admin-menus-fixed') . '/css/fixedadminmenus.css', array( 'admin-bar', 'wp-admin' ), '1.4' );
					}
				} else {
					if ( version_compare($wp_version, '3.8-beta1', '>=') ) {
						if ($bj_ozh_adminmenu['minimode']|get_option('agca_header')==true) {
							wp_enqueue_style( 'fixedadminmenus38-nb', plugins_url('admin-menus-fixed') . '/css/fixedadminmenus38-nb.css', array( 'admin-bar', 'wp-admin' ), '1.4' );
						} else {
							wp_enqueue_style( 'fixedadminmenus38', plugins_url('admin-menus-fixed') . '/css/fixedadminmenus38.css', array( 'admin-bar', 'wp-admin' ), '1.4' );
						}
					} else {
						if ( version_compare($wp_version, '3.5-beta1', '>=') ) {
							if ($bj_ozh_adminmenu['minimode']|get_option('agca_header')==true) {
								wp_enqueue_style( 'fixedadminmenus35-nb', plugins_url('admin-menus-fixed') . '/css/fixedadminmenus35-nb.css', array( 'admin-bar', 'wp-admin' ), '1.4' );
							} else {
								wp_enqueue_style( 'fixedadminmenus35', plugins_url('admin-menus-fixed') . '/css/fixedadminmenus35.css', array( 'admin-bar', 'wp-admin' ), '1.4' );
							}
						}
					}
				}
			}
		} else {
			if ( get_option('agca_header')==true ) {
				wp_enqueue_style( 'fixedadminmenus35-nob', plugins_url('admin-menus-fixed') . '/css/fixedadminmenus35-nob.css', array( 'admin-bar', 'wp-admin' ), '1.4' );
			} else {
				wp_enqueue_style( 'fixedadminmenus35-no', plugins_url('admin-menus-fixed') . '/css/fixedadminmenus35-no.css', array( 'admin-bar', 'wp-admin' ), '1.4' );
			}
		}
	}
	add_action( 'admin_enqueue_scripts', 'fixedadmin_enqueue_css' );
}
?>