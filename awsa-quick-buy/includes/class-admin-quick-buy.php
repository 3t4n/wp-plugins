<?php
/**
 * Plugin Admin Core File
 *
 * @package           AWSA_Quick_Buy
 * @author            Sajjad Aslani
 * @copyright         2020 Sajjad Aslani
 * @license           GPL-2.0-or-later
 * @version           1.0.0
 */

/**
 * Core Admin Class in plugin
 */
final class AWSA_Admin_Quick_Buy {
	/**
	 * Session instance
	 *
	 * @var bool
	 */
	protected static $_instance = null;

	/**
	 * AWSA_Admin_Quick_Buy Costructor
	 */
	public function __construct() {
		$this->define();
		$this->includes();
		$this->init_hooks();
	}

	/**
	 * AWSA_Admin_Quick_Buy Instance
	 *
	 * @return self()
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	/**
	 * Set Constants
	 *
	 * @return void
	 */
	public function define() {
		define( 'AWSA_QUICK_BUY_PDA', AWSA_QUICK_BUY_PD );
		define( 'AWSA_QUICK_BUY_PDAI', AWSA_QUICK_BUY_PDI );
		define( 'AWSA_QUICK_BUY_PUA_JS', AWSA_QUICK_BUY_PU_JS );
		define( 'AWSA_QUICK_BUY_PUA_CSS', AWSA_QUICK_BUY_PU_CSS );
	}

	/**
	 * Include Files
	 *
	 * @return void
	 */
	public function includes() {
		require_once AWSA_QUICK_BUY_PDAI . 'admin-functions.php';
		// Include Files
	}

	/**
	 * Add Hooks - Actions and Filters
	 *
	 * @return void
	 */
	public function init_hooks() {
		add_action( 'admin_init', array( __CLASS__, 'init' ), 10 );
		add_action( 'admin_post_awsa_quick_buy_settings', array( __CLASS__, 'update_quick_buy_settings' ) );
		add_action( 'admin_menu', array( __CLASS__, 'menu' ), 10 );
		add_action( 'add_meta_boxes', array( __CLASS__, 'meta_boxes' ), 10 );
	}

	/**
	 * Init AWSA_Admin_Quick_Buy after WordPress
	 *
	 * @return void
	 */
	public static function init() {

	}

	/**
	 * Update Quick Buy Settings
	 *
	 * @return void
	 */
	public static function update_quick_buy_settings() {
		if ( isset( $_POST['awsa-save-quick-buy-settings'] ) && wp_verify_nonce( $_POST['_wpnonce'] ) ) {
			$a      = new AWSA_Quick_Buy_Settings_Page_Fields();
			$values = $a->sanitize_fields( $_POST );
			$errors = $a->has_error( $values );
			if ( ! $errors ) {
				$a->update_settings( $values );
			}
		}

		wp_redirect( $_SERVER['HTTP_REFERER'] );
	}

	/**
	 * Add Actions Menu
	 *
	 * @return void
	 */
	public static function menu() {

		if ( function_exists( 'awsa_admin_menus' ) ) {
			awsa_admin_menus()->add_node(
				array(
					'parent_slug' => 'awsa',
					'page_title'  => __( 'Quick buy Settings', 'awsa-quick-buy' ),
					'menu_title'  => __( 'Quick buy', 'awsa-quick-buy' ),
					'capability'  => 'administrator',
					'menu_slug'   => 'awsa-quick-buy-settings',
					'function'    => 'awsa_admin_quick_buy_settings',
					'icon_url'    => '',
					'position'    => 103,
				)
			);
		} else {
			add_menu_page(
				__( 'Quick buy Settings', 'awsa-quick-buy' ),
				__( 'Quick buy', 'awsa-quick-buy' ),
				'administrator',
				'awsa-quick-buy-settings',
				'awsa_admin_quick_buy_settings'
			);
		}
	}

	/**
	 * Add action Menu
	 *
	 * @return void
	 */
	public static function meta_boxes() {

	}

}
