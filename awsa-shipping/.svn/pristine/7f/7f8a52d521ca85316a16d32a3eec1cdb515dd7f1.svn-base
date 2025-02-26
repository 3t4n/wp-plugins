<?php
/**
 * Class AWSA Admin Menu Manager
 *
 * @package           AWSA_Core
 * @author            Sajjad Aslani
 * @copyright         2020 Sajjad Aslani
 * @license           GPL-2.0-or-later
 * @version           1.0.0
 */

namespace AWSA_Core;

use AWSA_Shipping\Admin;

/**
 * Class AWSA Admin Menu Manager
 *
 * @version 1.0.0
 */
class Admin_Menus {

	/**
	 * Public Variable for Menus in Class
	 *
	 * @var array
	 */
	protected $menus;


	/**
	 * Session instance
	 *
	 * @var bool|self
	 */
	protected static $instance;

	/**
	 * AWSA_Shipping Instance
	 *
	 * @return self()
	 */
	public static function instance() {

		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
			self::$instance->init();
		}

		return self::$instance;
	}

	public function init() {

		add_action( 'admin_menu', [ $this, 'add_menus' ], 99 );
	}

	/**
	 * Get Primary AWSA Admin Menus
	 *
	 *
	 * @return array
	 */
	public function _get_menus() {

		/**
		 * Children position
		 *  reports     80
		 *  settings    100
		 */
		$menus = is_array( $this->menus ) ? $this->menus : array();

		return apply_filters( 'awsa_admin_menus', $menus );
	}

	/**
	 * Add Node to Admin Menus
	 *
	 * @param array $menu
	 *
	 * @return void
	 */
	public function add_node( array $menu ) {

		if ( empty( $menu ) ) {

			return;
		}

		$menu_id = $menu['menu_slug'];
		$parent  = false;
		if ( array_key_exists( 'parent_slug', $menu ) ) {

			$parent = $menu['parent_slug'];
			if ( $parent ) {

				$this->menus[ $parent ]['has_child'] = 1;
			}
		}

		$this->menus[ $menu_id ] = array(
			'parent_slug' => $parent,
			'page_title'  => $menu['page_title'],
			'menu_title'  => $menu['menu_title'],
			'capability'  => $menu['capability'],
			'menu_slug'   => $menu['menu_slug'],
			'function'    => $menu['function'] ?? '',
			'icon_url'    => $menu['icon_url'] ?? '',
			'position'    => $menu['position'] ?? null,

			'has_child' => ! empty( $this->menus[ $menu_id ]['has_child'] ) ? $this->menus[ $menu_id ]['has_child'] : 0,
		);

	}

	/**
	 * Get Menu Args for Add to WP Admin Menus by Group
	 *
	 * @return array
	 */
	public function get_menus() {

		$menus = array();
		foreach ( (array) $this->menus as $menu_id => $menu ) {
			$parent    = $menu['parent_slug'];
			$has_child = $menu['has_child'];
			if ( $parent && ! $has_child ) {
				$menus[ $parent ]['children'][ $menu_id ] = $menu;
			} else {
				$menu['parent_slug'] = false;
				$menus[ $menu_id ]   = $menu;
			}
		}

		return $menus;
	}

	/**
	 * Add submenu or menu from $menu
	 *
	 * @param array $menu
	 *
	 * @return string menu_hook
	 */
	public function add_menu_page( array &$menu ) {

		$parent = $menu['parent_slug'];
		if ( ! $parent ) {
			return add_menu_page(
				$menu['page_title'],
				$menu['menu_title'],
				$menu['capability'],
				$menu['menu_slug'],
				$menu['function'],
				$menu['icon_url'],
				$menu['position']
			);
		}

		return add_submenu_page(
			$parent,
			$menu['page_title'],
			$menu['menu_title'],
			$menu['capability'],
			$menu['menu_slug'],
			$menu['function'],
			$menu['position']
		);
	}


	/**
	 * Add Menus to WP Admin Menus by Group
	 *
	 * @return void
	 */
	public function add_menus() {

		$menus = $this->_get_menus();

		foreach ( $menus as $menu ) {
			if ( empty( $menu ) || ! is_array( $menu ) ) {
				continue;
			}
			$this->add_node( $menu );
		}
		foreach ( $this->get_menus() as $menu ) {
			$has_child = $menu['has_child'];
			global $awsa_menus_hook;
			$awsa_menus_hook[ $menu['menu_slug'] ] = $this->add_menu_page( $menu );

			if ( $has_child ) {
				foreach ( (array) $menu['children'] as $submenu ) {
					// $submenu['parent_slug'] = 'toplevel_page_'.$submenu['parent_slug'];
					$awsa_menus_hook[ $submenu['menu_slug'] ] = $this->add_menu_page( $submenu );
				}
			}
		}
	}

}

/*
function awsa_admin_menus() {
	global $awsa_admin_menus;
	if ( ! is_a( $awsa_admin_menus, 'awsa_admin_menus' ) ) {
		$awsa_admin_menus = new AWSA_Admin_Menus();
	}

	return $awsa_admin_menus;
}
*/
