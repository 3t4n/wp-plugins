<?php
namespace ShopCred;

use ShopCred\Dashboard as Dashboard;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Define Data_Manager class
 */
class Data_Manager {

	/**
	 * [__construct description]
	 */
	public function __construct() {
	
	}

	/**
	 * [get_dashboard_config description]
	 * @return [type] [description]
	 */
	public function get_dashboard_config( $key = '' ) {

		$all_config_data = get_site_transient( 'shopcred-dashboard-all-config-data' );
		//$all_config_data = false;

		if ( ! empty( $key ) && isset( $all_config_data[ $key ] ) ) {
			return $all_config_data[ $key ];
		}

		return $all_config_data;
	}

	/**
	 * [get_dashboard_page_config description]
	 * @param  boolean $page [description]
	 * @return [type]        [description]
	 */
	public function get_dashboard_page_config( $page = false, $subpage = false ) {

		$dashboard_config = $this->get_dashboard_config();

		if ( ! isset( $dashboard_config['pagesConfig'] ) ) {
			return false;
		}

		$page_config = false;

		if ( is_array( $dashboard_config['pagesConfig'] ) ) {

			if ( $subpage ) {

				foreach( $dashboard_config['pagesConfig'] as $page_data ) {

					if ( $subpage === $page_data['slug'] && $page === $page_data['parent-slug'] ) {
						$page_config = $page_data;

						break;
					}
				}
			}

			if ( ! $page_config ) {
				foreach( $dashboard_config['pagesConfig'] as $page_data ) {
					if ( $page === $page_data['slug'] ) {
						$page_config = $page_data;

						break;
					}
				}
			}
		}

		return $page_config;
	}

}
