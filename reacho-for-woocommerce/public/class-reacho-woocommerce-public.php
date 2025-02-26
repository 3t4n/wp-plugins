<?php

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    ReachoWooCommerce
 * @subpackage ReachoWooCommerce/public
 * @author     Reacho <support@reacho.com>
 */
class Reacho_WooCommerce_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $plugin_name The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $version The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @param string $plugin_name The name of this plugin.
	 * @param string $version The version of this plugin.
	 *
	 * @since    1.0.0
	 */
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * An instance of this class should be passed to the run() function
		 * defined in Reacho_WooCommerce_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Reacho_WooCommerce_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/reacho-woocommerce-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * An instance of this class should be passed to the run() function
		 * defined in Reacho_WooCommerce_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Reacho_WooCommerce_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		$this->insert_analytics();
		$this->identify_browser();
		$this->load_viewed_product();
		$this->load_add_to_cart();
		$this->load_started_checkout();
	}

	public function insert_analytics() {
		$reachowc_public_api_key = ReachoWC()->options->get_reacho_option( 'reachowc_public_api_key' );
		$reachowc_mode           = ReachoWC()->options->get_reacho_option( 'reachowc_mode' );

		if ( ! $reachowc_public_api_key || $this->is_woocommerce_checkout_page() ) {
			return;
		}

		$reacho_src = 'https://site-tracking.reacho.com/onsite/js/reacho.js?company_id=' . $reachowc_public_api_key . '&mode=' . $reachowc_mode;
		wp_enqueue_script( $this->plugin_name, $reacho_src, array( 'jquery' ), $this->version, true );
	}

	public function identify_browser() {
		global $current_user;

		$commenter       = wp_get_current_commenter();
		$commenter_email = ! empty( $commenter['comment_author_email'] ) ? $commenter['comment_author_email'] : '';

		wp_enqueue_script(
			$this->plugin_name . '-identify-browser',
			plugins_url( 'js/reacho-woocommerce-identify-browser.js', __FILE__ ),
			array( $this->plugin_name ),
			false,
			true
		);

		$reacho_user = array(
			'current_user_email' => $current_user->user_email,
			'commenter_email'    => $commenter_email,
		);

		wp_localize_script( $this->plugin_name . '-identify-browser', 'reachoUser', $reacho_user );
	}

	/**
	 * If on product page, get properties for Viewed Product metric. Enqueue viewed product
	 * javascript and pass event data to script.
	 */
	public function load_viewed_product() {
		if ( is_product() ) {
			$product           = wc_get_product();
			$parent_product_id = $product->get_parent_id();
			if ( $product->get_parent_id() === 0 ) {
				$parent_product_id = $product->get_id();
			}

			$categories_array = get_the_terms( $product->get_id(), 'product_cat' );
			if ( false === $categories_array ) {
				$categories_array = array();
			}
			$categories = (array) wp_list_pluck( $categories_array, 'name' );

			$item = array(
				'title'      => (string) $product->get_name(),
				'product_id' => (int) $parent_product_id,
				'variant_id' => (int) $product->get_id(),
				'url'        => (string) get_permalink( $product->get_id() ),
				'image_url'  => (string) wp_get_attachment_url( get_post_thumbnail_id( $product->get_id() ) ),
				'price'      => (float) $product->get_price(),
				'categories' => $categories,
			);

			wp_enqueue_script( $this->plugin_name . '-viewed_product', plugins_url( '/js/reacho-woocommerce-viewed-product.js', __FILE__ ), null, Reacho_WooCommerce_Rest_Api::VERSION, true );

			wp_localize_script( $this->plugin_name . '-viewed_product', 'item', $item );
		}
	}

	public function load_started_checkout() {
		// Override whether a page is a checkout page for purposes of whether to load the started checkout js.
		$should_add_started_checkout = apply_filters( 'reachowc_should_add_started_checkout', is_checkout() );
		if ( $should_add_started_checkout ) {
			$token = ReachoWC()->options->get_reacho_option( 'reachowc_public_api_key' );

			wp_enqueue_script( $this->plugin_name . '_started_checkout', plugins_url( '/js/reacho-woocommerce-started-checkout.js', __FILE__ ), null, Reacho_WooCommerce_Rest_Api::VERSION, true );
			wp_localize_script( $this->plugin_name . '_started_checkout', 'public_key', array( 'token' => $token ) );
			wp_localize_script( $this->plugin_name . '_started_checkout', 'plugin_meta_data', array( 'data' => reachowc_get_plugin_usage_meta_data() ) );
			// Build started checkout event data and add inline script to html.
			$this->reachowc_started_checkout_tracking();
		}
	}

	/**
	 * Insert tracking code for tracking started checkout.
	 *
	 * @return void
	 */
	public function reachowc_started_checkout_tracking() {
		global $current_user;
		wp_reset_postdata();
		wp_get_current_user();
		$cart       = WC()->cart;
		$event_data = ( new Reacho_WooCommerce_Cart_Rebuild() )->reachowc_build_cart_data( $cart );
		if ( empty( $event_data['$extra']['Items'] ) ) {
			return;
		}
		$event_data['$service'] = 'woocommerce';
		// Remove top level properties to maintain consistent Started Checkout event data in 2.5.0.
		unset( $event_data['Tags'] );
		unset( $event_data['Quantity'] );
		$email = $this->get_email( $current_user );

		/** Adding apply_filter hook to modify the $event_data array which is passed to wck-started-checkout.js
		 *
		 * The `reachowc_started_checkout` filter allows you to add additional top level properties to the
		 * [Started Checkout](https://help.reacho.com/hc/en-us/articles/360030732832#started-checkout1) event.
		 *
		 * The example below will add a "ReferralCode" property to the Started Checkout event
		 *
		 * add_filter('reachowc_started_checkout','reachowc_modify_started_checkout', 1, 2);
		 *
		 * function reachowc_modify_started_checkout($checkout_data, $cart){
		 *        $referrer = htmlspecialchars($_COOKIE['referral_code']);
		 *        if(isset($referrer)){
		 *            $referrer = "Direct";
		 *        }
		 *        $checkout_data['ReferralCode'] = $referrer;
		 *     return $checkout_data;
		 * }
		 *
		 * @param array $event_data
		 * @param WC_Cart $cart
		 *
		 * @since 3.0.12
		 *
		 */
		$event_data = apply_filters( 'reachowc_started_checkout', $event_data, $cart );

		$started_checkout_data = array(
			'email'      => $email,
			'event_data' => $event_data,
		);
		// Pass Started Checkout event data to javascript attaching to 'wck_started_checkout' handle.
		wp_localize_script( $this->plugin_name . '_started_checkout', 'reachowc_checkout', $started_checkout_data );
	}

	public function load_add_to_cart() {
		$cart = WC()->cart;
		if ( ! $cart->is_empty() ) {
			wp_enqueue_script( $this->plugin_name . '-add_to_cart', plugins_url( '/js/reacho-woocommerce-add-to-cart.js', __FILE__ ), null, Reacho_WooCommerce_Rest_Api::VERSION, true );

			$data = $cart->get_cart_contents();
			wp_localize_script( $this->plugin_name . '-add_to_cart', 'reachowcCartInfo', $data );
		}
	}

	/**
	 * Check WooCommerce plugin status, and run is_checkout() function.
	 */
	public function is_woocommerce_checkout_page() {
		if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
			return is_checkout();
		}
	}

	/**
	 * Gets email of current user or commenter.
	 *
	 * @param WP_User $current_user The current WordPress user.
	 *
	 * @return mixed|string
	 */
	public function get_email( $current_user ) {
		$email = '';
		if ( $current_user->user_email ) {
			$email = $current_user->user_email;
		} else {
			// See if current user is a commenter.
			$commenter = wp_get_current_commenter();
			if ( $commenter['comment_author_email'] ) {
				$email = $commenter['comment_author_email'];
			}
		}

		return $email;
	}

}