<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://elvez.co.jp
 * @since      1.0.0
 *
 * @package    Elvez_WC_Stripe_Card_Icon
 * @subpackage Elvez_WC_Stripe_Card_Icon/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Elvez_WC_Stripe_Card_Icon
 * @subpackage Elvez_WC_Stripe_Card_Icon/admin
 * @author     Elvez, Inc. <info@elvez.co.jp>
 */
class Elvez_WC_Stripe_Card_Icon_Admin {
	/**
	 * 翻訳ファイルのドメイン
	 */
	const TEXT_DOMAIN = Elvez_WC_Stripe_Card_Icon::TEXT_DOMAIN;

	/**
	 * トップレベルメニューのスラグ
	 */
	const ELVEZ_TOP_LEVEL_ADMIN_MENU = 'elvez_admin';

	/**
	 * 設定メニューの権限
	 */
	const CAPABILITY = 'manage_options';

	/**
	 * 設定ページのURLスラグ
	 */
	const MENU_SLUG = 'elvez-wc-stripe-card-icon';

	/**
	 * 設定メニューのアイコン
	 * https://developer.wordpress.org/resource/dashicons/
	 */
	const ICON_URL = 'dashicons-edit-large';

	/**
	 * 設定メニューの表示位置
	 */
	const POSITION = 99;

	/**
	 * オプションのグループ名
	 */
	const OPTION_GROUP = 'elvez-wc-stripe-card-icon';

	/**
	 * オプションフィールド名のプレフィックス
	 */
	const OPTION_PREFIX = 'elvez_wc_stripe_card_icon_';

	/**
	 * 表示するカードのプレフィックス
	 * @since	1.0.0
	 */
	const OPTION_DISPLAY_ICONS = self::OPTION_PREFIX . 'display_icons';

	/**
	 * プレミアム機能のアイコン
	 * @since	1.0.1
	 */
	const PREMIUM_ICONS = array( 'jcb' );

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		add_action('admin_init', [$this, 'register_settings']);
		add_action('admin_menu', [$this, 'set_menu_page']);

		add_filter( 'elvez_wc_stripe_card_icon_get_option_display_icons', [$this, 'filter_premium_icons' ] );

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Elvez_WC_Stripe_Card_Icon_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Elvez_WC_Stripe_Card_Icon_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		//wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/elvez-wc-stripe-card-icon-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Elvez_WC_Stripe_Card_Icon_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Elvez_WC_Stripe_Card_Icon_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		//wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/elvez-wc-stripe-card-icon-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Register setting fields.
	 *
	 * @since    1.0.0
	 */
	public function register_settings() {
		$icons = array(
			'visa' => 1,
			'amex' => 1,
			'mastercard' => 1,
			'discover' => 1,
			'jcb' => 0, // PREMIUM FEATURE
			'diners' => 1,
		);
        add_option(self::OPTION_DISPLAY_ICONS, $icons);
        register_setting( self::OPTION_GROUP, self::OPTION_DISPLAY_ICONS);

		/**
		 * Subscriptions
		 */
		add_option(Elvez_WC_Stripe_Card_Icon::OPTION_SUBSCRIBE_EMAIL, '');
		register_setting( self::OPTION_GROUP, Elvez_WC_Stripe_Card_Icon::OPTION_SUBSCRIBE_EMAIL );
		add_option(Elvez_WC_Stripe_Card_Icon::OPTION_SUBSCRIPTION_ID, '');
		register_setting( self::OPTION_GROUP, Elvez_WC_Stripe_Card_Icon::OPTION_SUBSCRIPTION_ID );

	}

	/**
	 * Register top-level menu.
	 *
	 * @since    1.0.0
	 */
	public function register_top_level_menu() {
		global $menu;
		if ( !isset($menu[self::ELVEZ_TOP_LEVEL_ADMIN_MENU]) ) {
			// FIXME: Use icon image.
			// $icon = plugin_dir_url( __FILE__ ) . 'img/menu_icon.svg';

			add_menu_page(
				__( 'Elvez', self::TEXT_DOMAIN ),  // Page title
				__( 'Elvez', self::TEXT_DOMAIN ),  // Menu title
				self::CAPABILITY,
				self::ELVEZ_TOP_LEVEL_ADMIN_MENU,
				[$this, 'render_menu_page'], // Display first submenu page
				self::ICON_URL,
				self::POSITION
			);
		}
	}
	/**
	 * Set menu page.
	 *
	 * @since    1.0.0
	 */
	public function set_menu_page() {
		$this->register_top_level_menu();

		add_submenu_page(
			self::ELVEZ_TOP_LEVEL_ADMIN_MENU,
			__( 'WC Stripe Card Icon', self::TEXT_DOMAIN ),  // Page title
			__( 'WC Stripe Card Icon', self::TEXT_DOMAIN ),  // Menu title
			self::CAPABILITY,
			self::MENU_SLUG,
			[$this, 'render_menu_page'],  // Callback functions to render menu page
		);
		remove_submenu_page(self::ELVEZ_TOP_LEVEL_ADMIN_MENU, self::ELVEZ_TOP_LEVEL_ADMIN_MENU);
	}

	/**
	 * Re render menu page html.
	 *
	 * @since    1.0.0
	 */
	public function render_menu_page() {
		$icons = array(
			'visa' => __( 'Visa', self::TEXT_DOMAIN ),
			'amex' => __( 'American Express', self::TEXT_DOMAIN ),
			'mastercard' => __( 'MasterCard', self::TEXT_DOMAIN ),
			'discover' => __( 'Discover', self::TEXT_DOMAIN ),
			'diners' => __( 'Diners Club', self::TEXT_DOMAIN ),
			'jcb' => __( 'JCB', self::TEXT_DOMAIN ),
		);
		?>
		<div class="wrap">
			<h1 class=""><?php esc_html_e( 'Settings for Elvez WC Stripe Card Icon' , self::TEXT_DOMAIN ); ?></h1>

			<form method="post" action="options.php">
				<?php settings_fields(self::OPTION_GROUP); ?>
				<?php do_settings_sections(self::OPTION_GROUP); ?>

				<!-- Subscription Settings -->
				<?php Elvez_WC_Stripe_Card_Icon::render_subscription_form() ?>

				<h2><?php esc_html_e( 'Display Credit Card Icon', self::TEXT_DOMAIN ); ?></h2>
				<table class="form-table">
					<?php
					$opt_name = self::OPTION_DISPLAY_ICONS;
					$values = get_option( $opt_name, array() );
					foreach( $icons as $name => $label_text ) {
						$label = esc_html( $label_text );
						$checked = isset( $values[$name] ) && 1 === intval( $values[$name] ) ? 'checked="checked"' : '';
						$class = in_array( $name, self::PREMIUM_ICONS, true ) ? 'elv-need-subscribe' : '';
						$this->render_check_box( $label, $opt_name, $name, $checked, $class );
					}
					?>
				</table>
				<p class="description"><?php esc_html_e( 'You can select credit card icons to be displayed on the checkout form.', self::TEXT_DOMAIN ); ?></p>
				<p class="description"><?php esc_html_e( 'This setting only toggles the icon display. The availability of payment processing depends on your Stripe settings.', self::TEXT_DOMAIN ); ?></p>

				<?php submit_button(); ?>
			</form>
		</div>
		<?php
	}
	/**
	 * Render menu page html.
	 *
	 * @since	1.0.0
	 * @since	1.0.1	Add class attribute
	 * @param	string	$label		A string of input form label.
	 * @param	string	$opt_name	A name of input form that should be option name.
	 * @param	string	$name		A key of card brand in options.
	 * @param	string	$checked	A string of checked attribute.
	 * @param	string	$class		A string of class attribute.
	 */
	public function render_check_box($label, $opt_name, $name, $checked, $class) {
		$tr = <<< EOT
		<tr valign="top">
			<th scope="row">$label</th>
			<td>
				<input type="checkbox" name="${opt_name}[${name}]" class="$class" value="1" $checked/>
			</td>
		</tr>
		EOT;
		echo $tr;
	}

	/**
	 * Return option values of display icons
	 *
	 * @since	1.0.1
	 * @return	array	$icons	An array of OPTION_DISPLAY_ICONS
	 */
	static public function get_option_display_icons() {
		$icons = get_option( self::OPTION_DISPLAY_ICONS, array() );
		return apply_filters( 'elvez_wc_stripe_card_icon_get_option_display_icons', $icons );
	}
	/**
	 * Filter display icons if not subscribed.
	 *
	 * @since	1.0.1
	 * @param	array	$icons	An array of param 'elvez_wc_stripe_card_icon_get_option_display_icons'.
	 * @return	array	$icons	An filtered array
	 */
	static public function filter_premium_icons( $icons ) {
		$icons = get_option( self::OPTION_DISPLAY_ICONS, array() );
		$is_subscribed = Elvez_WC_Stripe_Card_Icon::is_subscribed();
		if ( !$is_subscribed ) {
			foreach( self::PREMIUM_ICONS as $key ) {
				if ( isset( $icons[$key] ) ) {
					unset($icons[$key]);
				}
			}
		}
		return $icons;
	}

}
