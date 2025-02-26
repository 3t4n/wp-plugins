<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://elvez.co.jp
 * @since      1.0.0
 *
 * @package    Elvez_WC_Stripe_Card_Icon
 * @subpackage Elvez_WC_Stripe_Card_Icon/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Elvez_WC_Stripe_Card_Icon
 * @subpackage Elvez_WC_Stripe_Card_Icon/includes
 * @author     Elvez, Inc. <info@elvez.co.jp>
 */
class Elvez_WC_Stripe_Card_Icon {
	/**
	 * 翻訳ファイルのドメイン
	 *
	 * @since    1.0.0
	 */
	const TEXT_DOMAIN = 'elvez-wc-stripe-card-icon';
	/**
	 * オプションフィールド名のプレフィックス
	 * @since 1.0.1
	 */
	const OPTION_PREFIX = 'elvez_wc_stripe_card_icon_';
	/**
	 * Subscription product id.
	 * @since 1.0.1
	 */
	//const SUBSCRIPTION_PRODUCT_ID = 18; // developpment
	const SUBSCRIPTION_PRODUCT_ID = 506;
	/**
	 * Subscribe page url.
	 * @since 1.0.1
	 */
	const SUBSCRIPTION_SUBSCRIBE_URL = 'https://shop.elvez.co.jp/product/wc-stripe-card-icon/';
	/**
	 * サブスクリプションの登録状況を記録（有償機能の判定に利用）
	 * @since 1.0.1
	 */
	const OPTION_SUBSCRIBED = self::OPTION_PREFIX . 'subscribed';
	/**
	 * サブスクリプション購読したemail
	 * @since 1.0.1
	 */
	const OPTION_SUBSCRIBE_EMAIL = self::OPTION_PREFIX . 'subscribe_email';
	/**
	 * 購読したサブスクリプションID
	 * @since 1.0.1
	 */
	const OPTION_SUBSCRIPTION_ID = self::OPTION_PREFIX . 'subscription_id';


	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Elvez_WC_Stripe_Card_Icon_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'ELVEZ_WC_STRIPE_CARD_ICON_VERSION' ) ) {
			$this->version = ELVEZ_WC_STRIPE_CARD_ICON_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'elvez-wc-stripe-card-icon';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();
		/**
		 * サブスクリプション設定
		 */
		$this->subscription_api = Elvez\SubscriptionAPI::get_instance();
		add_action( Elvez\SubscriptionAPI::GET_STATUS_ACTION_HOOK, [$this, 'update_subscribed_status'] );
		add_action( Elvez\SubscriptionAPI::REGISTER_DOMAIN_ACTION_HOOK, [$this, 'update_subscribe_info'] );
		//add_action( Elvez\SubscriptionAPI::DEREGISTER_DOMAIN_ACTION_HOOK, [$this, 'handle_deregister_domain'] );
		add_action( Elvez\SubscriptionAPI::GET_STATUS_SCHEDULE_EVENT, [$this, 'get_subscribed_status'] );

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Elvez_WC_Stripe_Card_Icon_Loader. Orchestrates the hooks of the plugin.
	 * - Elvez_WC_Stripe_Card_Icon_i18n. Defines internationalization functionality.
	 * - Elvez_WC_Stripe_Card_Icon_Admin. Defines all hooks for the admin area.
	 * - Elvez_WC_Stripe_Card_Icon_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-elvez-wc-stripe-card-icon-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-elvez-wc-stripe-card-icon-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-elvez-wc-stripe-card-icon-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-elvez-wc-stripe-card-icon-public.php';

		/**
		 * Load Elvez sdks.
		 * @since 1.0.0
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'vendor/Elvez/elvez-autoloader.php';

		$this->loader = new Elvez_WC_Stripe_Card_Icon_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Elvez_WC_Stripe_Card_Icon_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Elvez_WC_Stripe_Card_Icon_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Elvez_WC_Stripe_Card_Icon_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Elvez_WC_Stripe_Card_Icon_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Elvez_WC_Stripe_Card_Icon_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

	/**
	 * Get registered version of script or style.
	 * 指定キーのスクリプトまたはスタイルが登録されていたらそのバージョン番号を返す
	 * 登録されていない場合は '0' を返す
	 *
	 * @since	1.0.0
	 * @param	$key	string
	 * @param	$type	string	'scripts' | 'styles'
	 * @return	$ver	string	Version string
	 */
	public static function get_registered_version( $key, $type='scripts') {

		$not_registerd_ver = '0';

		if ( $type == 'scripts' ) {
			$dependencies = wp_scripts();
		} else if ( $type == 'styles' ) {
			$dependencies = wp_styles();
		} else {
			return $not_registerd_ver;
		}

		if ( isset( $dependencies->registered[$key] ) ) {
			$registerd = $dependencies->registered[$key];
			return $registerd->ver;
		} else {
			return $not_registerd_ver;
		}
	}

	/**
	 * Update subscription status
	 *
	 * @since 1.0.1
	 */
	public static function update_subscribed_status( $args ) {
		if ( isset( $args['product_id'] ) && $args['product_id'] == self::SUBSCRIPTION_PRODUCT_ID ) {
			$value = $args['is_registered'];
			update_option( self::OPTION_SUBSCRIBED, $value );
		}
	}
	/**
	 * Update subscribe email
	 *
	 * @since 1.0.1
	 */
	public static function update_subscribe_info( $args ) {
		if ( isset( $args['product_id'] ) && $args['product_id'] == self::SUBSCRIPTION_PRODUCT_ID ) {
			$email = $args['email'];
			update_option( self::OPTION_SUBSCRIBE_EMAIL, $email );
			$subscription_id = $args['subscription_id'];
			update_option( self::OPTION_SUBSCRIPTION_ID, $subscription_id );
		}
	}
	/**
	 * Update subscription status
	 *
	 * @since 1.0.1
	 */
	public static function get_subscribed_status( $args ) {
		$email = get_option( self::OPTION_SUBSCRIBE_EMAIL, '' );
		$product_id = self::SUBSCRIPTION_PRODUCT_ID;
		$subscription_id = get_option( self::OPTION_SUBSCRIPTION_ID, '' );

		$client = Elvez\SubscriptionAPI::get_instance();
		$client->get_subscription_status( $email, $product_id, $subscription_id );
	}
	/**
	 * Return subscribe status
	 *
	 * @since 1.0.1
	 */
	public static function is_subscribed() {
		return get_option( self::OPTION_SUBSCRIBED, false );
	}
	/**
	 * Render subscription register form
	 *
	 * @since 1.0.1
	 */
	public static function render_subscription_form() {
		$email = get_option( self::OPTION_SUBSCRIBE_EMAIL, '' );
		$product_id = self::SUBSCRIPTION_PRODUCT_ID;
		$subscription_id = get_option( self::OPTION_SUBSCRIPTION_ID, '' );

		$args = array(
			'email' => $email,
			'email_opt_name' => self::OPTION_SUBSCRIBE_EMAIL,
			'product_id' => $product_id,
			'subscription_id_opt_name' => self::OPTION_SUBSCRIPTION_ID,
			'subscription_id' => $subscription_id,
			'subscribe_url' => self::SUBSCRIPTION_SUBSCRIBE_URL,
		);
		Elvez\SubscriptionAPI::get_instance()->render_register_form( $args );
	}
}
