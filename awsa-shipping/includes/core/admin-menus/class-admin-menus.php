<?php
/**
 * Class AWSA Admin Menu Manager
 *
 * @version           1.0.0
 * @author            Sajjad Aslani
 * @copyright         2020 Sajjad Aslani
 * @license           GPL-2.0-or-later
 * @package           AWSA_Core
 */

namespace AWSA_Core\Admin_Menus;

/**
 * Class AWSA Admin Menu Manager
 *
 * @version 1.0.0
 */
class Admin_Menus {

	/**
	 * Public Variable for Menus in Class
	 *
	 * @since 1.0.0
	 * @var array
	 */
	protected $menus;


	/**
	 * Session instance
	 *
	 * @since 1.0.0
	 * @var bool|self
	 */
	protected static $instance;

	/**
	 * AWSA_Shipping Instance
	 *
	 * @since 1.0.0
	 * @return self()
	 */
	public static function instance() {

		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
			self::$instance->init();
		}

		return self::$instance;
	}

	/**
	 * Init
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function init(): void {

		add_action( 'admin_menu', [ $this, 'add_menus' ], 99 );
	}

	/**
	 * Get Primary AWSA Admin Menus
	 *
	 * @since 1.0.0
	 * @return array
	 */
	public function _get_menus(): array {

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
	 * @since 1.0.0
	 * @return void
	 */
	public function add_node( array $menu ): void {

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

			'has_child' => !empty( $this->menus[ $menu_id ]['has_child'] ) ? $this->menus[ $menu_id ]['has_child'] : 0,
		);

	}

	/**
	 * Get Menu Args for Add to WP Admin Menus by Group
	 *
	 * @since 1.0.0
	 * @return array
	 */
	public function get_menus(): array {

		$menus = array();
		foreach ( (array) $this->menus as $menu_id => $menu ) {

			$parent    = $menu['parent_slug'];
			$has_child = $menu['has_child'];
			if ( $parent && !$has_child ) {

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
	 * @since 1.0.0
	 * @return string menu_hook
	 */
	public function add_menu_page( array $menu ): string {

		$parent = $menu['parent_slug'];
		if ( !$parent ) {

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
	 * @since 1.0.0
	 * @return void
	 */
	public function add_menus(): void {

		$menus = $this->_get_menus();

		if ( !is_array( $menus ) ) {

			return;
		}

		foreach ( $menus as $menu ) {

			if ( empty( $menu ) || !is_array( $menu ) ) {

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
