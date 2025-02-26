<?php
/*
* Plugin Name: 	Admin Toolbar Menus
* Plugin URI: 	http://gowebben.com
* Description: 	Seamlessly adds 3 new menu locations to the admin toolbar.
* Version: 		1.0.4
* Author: 		Benbodhi
* Author URI: 	http://benbodhi.com
* Text Domain: 	admin-toolbar-menus
* Domain Path:	/languages
* License: 		GPL2
*/
/*  Copyright 2013  Benbodhi  (email : wp@benbodhi.com)

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

/**
* internationalization / localization
*/
load_plugin_textdomain( 'admin-toolbar-menus', false, basename( dirname( __FILE__ ) ) . '/languages/' );

/**
 *
 */
define( 'BODHI_ATM_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );	// define the absolute plugin path for includes
include( BODHI_ATM_PLUGIN_PATH . 'new-features-2.0.php' );         		// initialize new features
//include( BODHI_ATM_PLUGIN_PATH . 'new-features.php' );         		// initialize new features

/**
* register menus
*/
function bodhi_atm_reg_admin_menus() {
	register_nav_menus(
		array(
		'bodhi_admin_menu' 		=> __( 'Toolbar Menu (Site Name)', 'admin-toolbar-menus' ),
		'bodhi_admin_menu2' 	=> __( 'Toolbar Menu (Main)', 'admin-toolbar-menus' ),
		'bodhi_admin_menu3' 	=> __( 'Toolbar Menu (My Account)', 'admin-toolbar-menus' )
		)
	);
}
add_action( 'init', 'bodhi_atm_reg_admin_menus' );

/**
* build out the menus
*/
function bodhi_atm_add_admin_menus() {

	global $wp_admin_bar;

	$menu_name 	= 'bodhi_admin_menu';
	$menu_name2 = 'bodhi_admin_menu2';
	$menu_name3 = 'bodhi_admin_menu3';

	// start menu1 - site-name menu
	if( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {

		$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );

		if (false != $menu) {

			$menu_items = wp_get_nav_menu_items( $menu->term_id );

			foreach( (array) $menu_items as $key => $menu_item ) {

				if( $menu_item->classes ) {

					$classes = implode( ' ', $menu_item->classes );

				} else {

					$classes = "";

				}

				$meta = array(
					'class' 	=> $classes,
					'onclick' 	=> '',
					'target' 	=> $menu_item->target,
					'title' 	=> $menu_item->attr_title
				);

				if( $menu_item->menu_item_parent ) {

					$wp_admin_bar->add_menu(
						array(
						'id' 		=> $menu_item->ID,
						'parent' 	=> $menu_item->menu_item_parent,
						'title' 	=> $menu_item->title,
						'href' 		=> $menu_item->url,
						'meta' 		=> $meta
						)
					);

				} else {

					$wp_admin_bar->add_menu(
						array(
						'id' 		=> $menu_item->ID,
						'parent' 	=> 'site-name',
						'title' 	=> $menu_item->title,
						'href' 		=> $menu_item->url,
						'meta' 		=> $meta
						)
					);
				}
			} // end foreach
		} // end if
	} // end menu1 - site-name menu

	// start menu2 - toolbar menu
	if( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name2 ] ) ) {

		$menu2 = wp_get_nav_menu_object( $locations[ $menu_name2 ] );

		if (false != $menu2) {

			$menu_items = wp_get_nav_menu_items( $menu2->term_id );

			foreach( (array) $menu_items as $key => $menu_item ) {

				if( $menu_item->classes ) {

					$classes = implode( ' ', $menu_item->classes );

				} else {

					$classes = "";

				}

				$meta = array(
					'class' 	=> $classes,
					'onclick' 	=> '',
					'target' 	=> $menu_item->target,
					'title' 	=> $menu_item->attr_title
				);

				if( $menu_item->menu_item_parent ) {

					$wp_admin_bar->add_menu(
						array(
						'id' 		=> $menu_item->ID,
						'parent' 	=> $menu_item->menu_item_parent,
						'title' 	=> $menu_item->title,
						'href' 		=> $menu_item->url,
						'meta' 		=> $meta
						)
					);

				} else {

					$wp_admin_bar->add_menu(
						array(
						'id' 		=> $menu_item->ID,
						'title' 	=> $menu_item->title,
						'href' 		=> $menu_item->url,
						'meta' 		=> $meta
						)
					);
				}
			} // end foreach
		} // end if
	} // start menu2 - toolbar menu

	// start menu3 - my-account menu
	if( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name3 ] ) ) {

		$menu3 = wp_get_nav_menu_object( $locations[ $menu_name3 ] );

		if (false != $menu3) {

			$menu_items = wp_get_nav_menu_items( $menu3->term_id );

			foreach( (array) $menu_items as $key => $menu_item ) {

				if( $menu_item->classes ) {

					$classes = implode( ' ', $menu_item->classes );

				} else {

					$classes = "";

				}

				$meta = array(
					'class' 	=> $classes,
					'onclick' 	=> '',
					'target' 	=> $menu_item->target,
					'title' 	=> $menu_item->attr_title
				);

				if( $menu_item->menu_item_parent ) {

					$wp_admin_bar->add_menu(
						array(
						'id' 		=> $menu_item->ID,
						'parent' 	=> $menu_item->menu_item_parent,
						'title' 	=> $menu_item->title,
						'href' 		=> $menu_item->url,
						'meta' 		=> $meta
						)
					);

				} else {

					$wp_admin_bar->add_menu(
						array(
						'id' 		=> $menu_item->ID,
						'parent'	=> 'my-account',
						'title' 	=> $menu_item->title,
						'href' 		=> $menu_item->url,
						'meta' 		=> $meta
						)
					);
				}
			} // end foreach
		} // end if
	} // start menu3 - my-account menu
}
add_action( 'admin_bar_menu', 'bodhi_atm_add_admin_menus', 35 );

/**
* remove existing menu items
*
* this feature will be built upon in future versions.
* you can simply uncomment any menu items you would like removed for now though ;)
*
*/
function bodhi_atm_remove_admin_menus() {

	global $wp_admin_bar;

	if( current_user_can( 'administrator' ) ) { // remove for administrators

		// links to remove existing items from the toolbar
		$wp_admin_bar->remove_menu('wp-logo'); 			// remove WordPress logo menu
		// $wp_admin_bar->remove_menu('about');			// WordPress about menu
	    // $wp_admin_bar->remove_menu('wporg');			// WordPress website
	    // $wp_admin_bar->remove_menu('documentation');	// WordPress documentation
	    // $wp_admin_bar->remove_menu('support-forums');// WordPress support forums
		// $wp_admin_bar->remove_menu('feedback');		// WordPress feedback
	    // $wp_admin_bar->remove_menu('view-site');		// View current site link
		// $wp_admin_bar->remove_menu('updates');		// Updates button
		// $wp_admin_bar->remove_menu('my-account');	// Links to your account. The ID depends upon if you have avatar enabled or not.
		// $wp_admin_bar->remove_menu('site-name');		// Site name with other dashboard items
		// $wp_admin_bar->remove_menu('my-sites');		// My Sites menu, if you have more than one site
		// $wp_admin_bar->remove_menu('get-shortlink');	// Shortlink to a page/post
		// $wp_admin_bar->remove_menu('edit');			// Post/Page/Category/Tag edit link
		// $wp_admin_bar->remove_menu('new-content');	// Add New menu
		// $wp_admin_bar->remove_menu('comments');		// Comments link
		// $wp_admin_bar->remove_menu('updates');		// Updates link
		// $wp_admin_bar->remove_menu('search');		// Search box

	} else { // remove for all user roles except administrator

		// links to remove existing items from the toolbar
		$wp_admin_bar->remove_menu('wp-logo'); 			// remove WordPress logo menu
		// $wp_admin_bar->remove_menu('about');			// WordPress about menu
	    // $wp_admin_bar->remove_menu('wporg');			// WordPress website
	    // $wp_admin_bar->remove_menu('documentation');	// WordPress documentation
	    // $wp_admin_bar->remove_menu('support-forums');// WordPress support forums
		// $wp_admin_bar->remove_menu('feedback');		// WordPress feedback
	    // $wp_admin_bar->remove_menu('view-site');		// View current site link
		// $wp_admin_bar->remove_menu('updates');		// Updates button
		// $wp_admin_bar->remove_menu('my-account');	// Links to your account. The ID depends upon if you have avatar enabled or not.
		// $wp_admin_bar->remove_menu('site-name');		// Site name with other dashboard items
		// $wp_admin_bar->remove_menu('my-sites');		// My Sites menu, if you have more than one site
		// $wp_admin_bar->remove_menu('get-shortlink');	// Shortlink to a page/post
		// $wp_admin_bar->remove_menu('edit');			// Post/Page/Category/Tag edit link
		// $wp_admin_bar->remove_menu('new-content');	// Add New menu
		// $wp_admin_bar->remove_menu('comments');		// Comments link
		// $wp_admin_bar->remove_menu('updates');		// Updates link
		// $wp_admin_bar->remove_menu('search');		// Search box

	}
}
add_action( 'wp_before_admin_bar_render', 'bodhi_atm_remove_admin_menus' );

?>
