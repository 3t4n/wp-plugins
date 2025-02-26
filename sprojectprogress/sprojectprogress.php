<?php
	/*
	Plugin Name: sProjectProgress
	Plugin URI: http://wordpress.org/plugins/sprojectprogress/
	Description: Create progress bars for your projects.
	Version: 1.0
	Author: Simon Knittel
	Author URI: http://simonknittel.de/

	Copyright 2013 Simon Knittel  (email : sprojectprogress@simonknittel.de)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
	*/

	require_once dirname( __FILE__ ) . '/widget.php';
	require_once dirname( __FILE__ ) . '/admin.php';

	register_uninstall_hook( __FILE__, 'sPP_uninstall' );
	register_activation_hook( __FILE__, 'sPP_activate' );
	register_deactivation_hook( __FILE__, 'sPP_deactivate' );

	function sPP_uninstall() {
		delete_option( 'sPP_default_title' );
		delete_option( 'sPP_default_progress' );
		delete_option( 'sPP_default_layout' );
		delete_option( 'sPP_default_primarycolor' );
		delete_option( 'sPP_default_secondarycolor' );
	}

	function sPP_activate() {
		if( ! get_option( 'sPP_default_title' ) ) add_option( 'sPP_default_title', '' );
		if( ! get_option( 'sPP_default_preogress' ) ) add_option( 'sPP_default_progress', 0 );
		if( ! get_option( 'sPP_default_layout' ) ) add_option( 'sPP_default_layout', 0 );
		if( ! get_option( 'sPP_default_primarycolor' ) ) add_option( 'sPP_default_primarycolor', '' );
		if( ! get_option( 'sPP_default_secondarycolor' ) ) add_option( 'sPP_default_secondarycolor', '' );
	}

	function sPP_deactivate() {

	}
?>