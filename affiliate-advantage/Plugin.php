<?php

namespace Level_Wp\Affiliate_Advantage;

use Freemius;
use Level_Wp\Affiliate_Advantage\Models\Affiliate_Link;

/**
 * Main plugin class, responsible for managing all service providers and freemius integration
 *
 * Class Plugin
 * @package Level_Wp\Bit_Links
 *
 * @since 1.0.0
 */
class Plugin {
	private static $instance = null;

	/**
	 * Plugin version
	 * @var string
	 *
	 * @since 1.0.0
	 */
	public $version = '1.0.0';

	/**
	 * Plugin unique prefix
	 * @var string
	 *
	 * @since 1.0.0
	 */
	public $prefix = 'affiliate_advantage_';

	/**
	 * Plugin CPT name
	 * @var string
	 *
	 * @since 1.0.0
	 */
	public $cpt = 'affiliate_link';
	public $click_cpt = 'affiliate_link_click';

	/**
	 * Plugin Service providers that hook plugin into wordpress via action hooks and filters
	 * @var array
	 *
	 * @since 1.0.0
	 */
	protected $providers = [
		Providers\CPT_Service_Provider::class,
		Providers\Meta_Boxes_Service_Provider::class,
		Providers\Menus_Service_Provider::class,
		Providers\Settings_Service_Provider::class,
		Providers\Assets_Service_Provider::class,
		Providers\Init_Service_Provider::class,

	];

	private $bootstrapper;

	/**
	 * Plugin constructor.
	 *
	 * @access private
	 * @since 1.0.0
	 */
	private function __construct() {

		if ( $this->has_valid_licence() ) {
			$providers = [
				Providers\Short_Codes_Service_Provider::class,
				Providers\Widgets_Service_Provider::class,
				Providers\Form_Service_Provider::class,
			];
			$this->providers = array_merge( $this->providers, $providers );
		}

		$this->bootstrapper = new Bootstrapper( $this->providers );
	}

	/**
	 * Init plugin and instantiate all service providers
	 *
	 * @return void
	 *
	 * @since 1.0.0
	 */
	public function init() {
		$this->bootstrapper->run();
	}

	/**
	 * Get the plugin's absolute path
	 *
	 * @return string
	 *
	 * @since 1.0.0
	 */
	public function get_path() {
		return plugin_dir_path( __FILE__ );
	}

	/**
	 * Get the plugin's absolute url
	 *
	 * @return string
	 *
	 * @since 1.0.0
	 */
	public function get_url() {
		return plugin_dir_url( __FILE__ );
	}

	/**
	 * Checks if the user has a valid pro licence
	 *
	 * @return bool
	 *
	 * @since 1.0.0
	 */
	public function has_valid_licence() {
		return $this->freemius()->can_use_premium_code__premium_only();
	}

	/**
	 * Get the freemius instance
	 *
	 * @return Freemius
	 *
	 * @access private
	 * @since 1.0.0
	 */
	public function freemius() {
		return affiliate_advantage_freemuis();
	}

	/**
	 * Checks if the user is not paying
	 *
	 * @return bool
	 *
	 * @since 1.0.0
	 */
	public function is_not_paying() {
		return $this->freemius()->is_not_paying();
	}

	public function upgrade_link() {
		return $this->freemius()->get_upgrade_url();
	}

	/**
	 * Checks if the user is on trial
	 *
	 * @return bool
	 *
	 * @since 1.0.0
	 */
	public function is_trial() {
		return $this->freemius()->is_trial();
	}

	public function activate() {
		$prefix = self::get_instance()->prefix;

		update_option( $prefix . 'link_prefix', 'r', true );
		update_option( $prefix . 'is_custom_link_prefix', '0', true );
		update_option( $prefix . 'redirection_type', '302', true );
		update_option( $prefix . 'should_open_new_tab', '1', true );
		update_option( $prefix . 'add_no_follow', '1', true );
		update_option( $prefix . 'keep_data_on_uninstall', '0', true );
		update_option( $prefix . 'uncloak', '0', true );
		update_option( $prefix . 'forward_parameters', '1', true );

		flush_rewrite_rules();
	}

	/**
	 * Get current instance of plugin
	 *
	 * @return Plugin|null
	 *
	 * @since 1.0.0
	 */
	public static function get_instance() {
		if ( self::$instance == null ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	public function deactivate() {
		flush_rewrite_rules();
	}

	public function uninstall() {
//		foreach (Affiliate_Link::all() as $bit_link ) {
//			wp_delete_post( $bit_link->ID, true );
//		}
//
//		$prefix = self::get_instance()->prefix;
//
//		delete_option( $prefix . 'link_prefix' );
//		delete_option( $prefix . 'is_custom_link_prefix' );
//		delete_option( $prefix . 'redirection_type' );
//		delete_option( $prefix . 'should_open_new_tab' );
//		delete_option( $prefix . 'add_no_follow' );
//		delete_option( $prefix . 'keep_data_on_uninstall' );
//		delete_option( $prefix . 'uncloak' );
//		delete_option( $prefix . 'forward_parameters' );

		flush_rewrite_rules();
	}
}
