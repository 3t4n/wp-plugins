<?php

namespace Level_Wp\Affiliate_Advantage\Providers;

use Level_Wp\Affiliate_Advantage\Controllers\Menus_Controller;
use Level_Wp\Affiliate_Advantage\Plugin;

/**
 * Undocumented class
 */
class Menus_Service_Provider extends Base_Service_Provider {

	/**
	 * Controller class responsible for display menus.
	 *
	 * @var Menu_Controller
	 */
	private $menus_controller;

	/**
	 * Construction function.
	 */
	public function __construct() {
		$this->menus_controller = new Menus_Controller();
	}

	/**
	 * Registers WordPress action hooks and filters.
	 *
	 * @return mixed|void
	 *
	 * @since 1.0.0
	 */
	public function register() {

		add_action( 'admin_menu', array( $this, 'run' ) );

	}

	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	public function run() {

		if ( ! Plugin::get_instance()->has_valid_licence() ) {
			add_submenu_page(
				'edit.php?post_type=' . Plugin::get_instance()->cpt,
				'Link Groups',
				'Link Groups',
				'manage_options',
				'link_groups',
				array(
					$this->menus_controller,
					'show_upgrade_page',
				),
				2
			);
		}

		add_submenu_page(
			'edit.php?post_type=' . Plugin::get_instance()->cpt,
			'Stats - Bit Links',
			'Link Stats',
			'manage_options',
			'stats',
			array(
				$this->menus_controller,
				'show_stats_page',
			)
		);

		add_submenu_page(
			'edit.php?post_type=' . Plugin::get_instance()->cpt,
			'Bit Links Settings',
			'Settings',
			'manage_options',
			'settings',
			array(
				$this->menus_controller,
				'show_settings_page',
			),
			null
		);

		/*
		Show account page on premium or show pricing page on free version.
		*/
		if ( Plugin::get_instance()->has_valid_licence() ) {
			add_submenu_page(
				'edit.php?post_type=' . Plugin::get_instance()->cpt,
				'Account',
				'Account',
				'manage_options',
				'affiliate-advantage-account',
				array(
					$this->menus_controller,
					'show_accounts_page',
				)
			);
		} else {
			add_submenu_page(
				'edit.php?post_type=' . Plugin::get_instance()->cpt,
				'Account',
				'Account',
				'manage_options',
				'affiliate-advantage-pricing',
				array(
					$this->menus_controller,
					'show_accounts_page',
				)
			);
		}

		/**
		 * Removes account submenu on freemius pages
		 */
		if ( ! empty( $_GET['page'] ) ) {
			if ( 'affiliate-advantage-account' === $_GET['page'] || 'affiliate-advantage-contact' === $_GET['page'] ) {
				remove_submenu_page( 'edit.php?post_type=' . Plugin::get_instance()->cpt, 'affiliate-advantage-account' );
			}
		}

	}
}
