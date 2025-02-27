<?php
/**
 * Plugin Name: Debloat for WooCommerce
 * Version: 0.8.6
 * Description: Remove some things from WooCommerce installation.
 * Author: KGM Servizi
 * Author URI: https://kgmservizi.com
 * Text Domain: kgmwcbloat
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * 
 * GLOBALS
 * 
 */
$GLOBALS['hfff_version'] = '0.8.6';

/**
 * Load all on admin
 */
if ( is_admin() ) {
	if ( kgmwcbloat_check_woocommerce_enabled() ) {
		include( plugin_dir_path( __FILE__ ) . 'includes/options-page.php' );
		add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'kgmwcbloat_action_links' );
		add_action( 'admin_enqueue_scripts', 'kgmwcbloat_admin_styles' );
	}
}

if ( kgmwcbloat_check_woocommerce_enabled() ) {
	
	/**
	 * Retrieve options
	 */
	$kgmwcbloat_options = get_option( 'kgmwcbloat_option_name' );

	/**
	 * Home, Analytics, Notifications Bar
	 */
	if ( isset( $kgmwcbloat_options['kgm_analytics_wc'] ) && $kgmwcbloat_options['kgm_analytics_wc'] == 'kgm_analytics_wc' ) {
		/**
		 * Disable all WooCommerce admin features
		 * @first filter seems in deprecation
		 * @second filter seems in deprecation
		 */
		add_filter( 'woocommerce_admin_disabled', '__return_true' );
		add_filter( 'woocommerce_marketing_menu_items', '__return_empty_array' );
		add_filter( 'woocommerce_admin_features', function (array $features): array {
			$features = [];
			return $features;
		}, 90 );

		/**
		 * Disable report text
		 */
		add_action( 'admin_head', 'kgmwcbloat_remove_reports_text' );
		function kgmwcbloat_remove_reports_text() {
		?>
			<script type="text/javascript">
				jQuery(document).ready(function($) {
					if (window.location.search.includes('wc-reports')) {
						$("strong:contains('WooCommerce 4.0')")
							.parents('#message').remove();
					}
				});
			</script>
		<?php
		}

		/**
		 * Dequeue admin styles
		 */
		add_action('admin_enqueue_scripts', 'kgmwcbloat_disable_wc_admin_styles', 99);
		function kgmwcbloat_disable_wc_admin_styles() {
			wp_dequeue_style('wc-admin-app');
			wp_dequeue_style('wc-onboarding');
		}

		/**
		 * Stripe incompatibility notice (if Stripe plugin is enabled we need to set API and can be made only with this option disable, you can enable it after save API)
		 */
		add_action( 'admin_notices', 'kgmwcbloat_stripe_incompatibility_notice' );
		function kgmwcbloat_stripe_incompatibility_notice() {
			/**
			 * Check if Stripe is in use
			 */
			$check_stripe = false;

			if ( ! function_exists('is_plugin_active_for_network') ) {
				require_once(ABSPATH . '/wp-admin/includes/plugin.php');
			}

			/**
			 * Check for multisite activation
			 */
			if ( is_multisite() && is_plugin_active_for_network( plugin_basename(__FILE__) ) ) {
				/**
				 * Stripe active on multisite 
				 */
				$check_stripe = is_plugin_active_for_network( 'woocommerce-gateway-stripe/woocommerce-gateway-stripe.php' ) ? false : true;
			} else {
				/**
				 * Stripe active on single site
				 */
				$check_stripe = is_plugin_active('woocommerce-gateway-stripe/woocommerce-gateway-stripe.php') ? false : true;
			}

			/**
			 *  Stripe is active, add admin notice
			 */
			if ( $check_stripe === false ) {

				$current_screen = get_current_screen();
				if ( $current_screen->id === 'woocommerce_page_wc-settings' && isset($_GET['section']) && strpos($_GET['section'], 'stripe') !== false && isset($_GET['tab']) && $_GET['tab'] === 'checkout' ) {
					$stripe_notice = sprintf( __( 'WooCommerce Admin is turned off by Debloat for WooCommerce. The Stripe plugin needs the WooCommerce Admin ON for setting up API keys. You can temporarily enable the WooCommerce Admin in the <a href="%s">Debloat for WooCommerce options</a>. You can disable it after configuring Stripe API keys.', 'kgmwcbloat'), esc_url(admin_url('tools.php?page=kgmwcbloat' ) ) );
					echo '<div class="notice notice-error"><p>' . $stripe_notice . '</p></div>';
				}

			}
		}
	}

	/**
	 * Disable single admin feature if all isn't enabled
	 */
	if ( !empty ( get_option( 'kgmwcbloat_option_name' ) ) && ! isset( $kgmwcbloat_options['kgm_analytics_wc'] ) ) {
		$all_non_clean_options = get_option('kgmwcbloat_option_name');
		$disabled_features     = array_intersect( kgmwcbloat_wc_features_array(), $all_non_clean_options );

		/**
		 * Dequeue style of onboarding if disabled
		 */
		if ( !empty( $disabled_features ) && in_array( "onboarding", $disabled_features ) ) {
			add_action('admin_enqueue_scripts', 'kgmwcbloat_disable_onboarding_admin_styles', 99);
			function kgmwcbloat_disable_onboarding_admin_styles() {
				wp_dequeue_style('wc-onboarding');
			}
		}

		/**
		 * Dequeue style of admin-app if homescreen and marketing are disabled
		 */
		if ( !empty( $disabled_features ) && ( in_array( "homescreen", $disabled_features ) && in_array( "marketing", $disabled_features ) ) ) {
			add_action('admin_enqueue_scripts', 'kgmwcbloat_disable_admin_app_styles', 99);
			function kgmwcbloat_disable_admin_app_styles() {
				wp_dequeue_style('wc-onboarding');
			}
		}

		if ( !empty( $disabled_features ) ) {

			add_filter('woocommerce_admin_get_feature_config', function ( $features ) use ( $disabled_features ) {

				$disabled_features_keys = array_flip( $disabled_features );

				foreach ( $features as $key => $value ) {
					if ( isset( $disabled_features_keys[$key] ) ) {
						$features[$key] = false;
					}
				}

				return $features;
			});
		}
	}

	/**
	 * Marketing Hub
	 */
	if ( isset( $kgmwcbloat_options['kgm_marketing_wc'] ) && $kgmwcbloat_options['kgm_marketing_wc'] == 'kgm_marketing_wc' ) {
		add_filter( 'woocommerce_marketing_menu_items', '__return_empty_array' );
		add_filter( 'woocommerce_admin_features', 'kgmwcbloat_disable_wc_marketing' );

		function kgmwcbloat_disable_wc_marketing( $features ) {
			$marketing = array_search('marketing', $features);
			unset( $features[$marketing] );
			return $features;
		}
	}

	/**
	 * Connection to WooCoommerce.com notifications
	 */
	if ( isset( $kgmwcbloat_options['kgm_connect_to_woocommerce_dot_com_wc'] ) && $kgmwcbloat_options['kgm_connect_to_woocommerce_dot_com_wc'] == 'kgm_connect_to_woocommerce_dot_com_wc' ) {
		add_filter('woocommerce_helper_suppress_admin_notices', '__return_true');
	}

	/**
	 * Marketplace Suggestions
	 */
	if ( isset( $kgmwcbloat_options['kgm_suggestion_wc'] ) && $kgmwcbloat_options['kgm_suggestion_wc'] == 'kgm_suggestion_wc' ) {
		add_filter('woocommerce_allow_marketplace_suggestions', '__return_false', 999);
	}

	/**
	 * Extensions submenu
	 */
	if ( isset( $kgmwcbloat_options['kgm_extensions_wc'] ) && $kgmwcbloat_options['kgm_extensions_wc'] == 'kgm_extensions_wc' ) {
		add_action( 'admin_menu', 'kgmwcbloat_remove_extensions_submenu', 999 );
		function kgmwcbloat_remove_extensions_submenu() {
			remove_submenu_page('woocommerce', 'wc-addons');
			remove_submenu_page('woocommerce', 'wc-addons&section=helper');
			/* From new WC version */
			remove_submenu_page('woocommerce', 'wc-admin&path=/extensions');
		}
	}

	/**
	 * WooCommerce styles
	 */
	if ( isset( $kgmwcbloat_options['kgm_styles_wc'] ) && $kgmwcbloat_options['kgm_styles_wc'] == 'kgm_styles_wc' ) {
		add_action('wp_enqueue_scripts', 'kgmwcbloat_disable_wc_styles', 99);
		function kgmwcbloat_disable_wc_styles() {
			if ( function_exists( 'is_woocommerce' ) ) {
				if ( !is_woocommerce() && !is_cart() && !is_checkout() && !is_account_page() && !is_product() && !is_product_category() && !is_shop() ) {
					
					wp_dequeue_style( 'woocommerce-general' );
					wp_dequeue_style( 'woocommerce-layout' );
					wp_dequeue_style( 'woocommerce-smallscreen' );
					wp_dequeue_style( 'woocommerce_frontend_styles' );
					wp_dequeue_style( 'woocommerce_fancybox_styles' );
					wp_dequeue_style( 'woocommerce_chosen_styles' );
					wp_dequeue_style( 'woocommerce_prettyPhoto_css' );

				}
			}
		}
	}

	/**
	 * WooCommerce scripts
	 */
	if ( isset( $kgmwcbloat_options['kgm_scripts_wc'] ) && $kgmwcbloat_options['kgm_scripts_wc'] == 'kgm_scripts_wc' ) {
		add_action('wp_enqueue_scripts', 'kgmwcbloat_disable_wc_scripts', 99);
		function kgmwcbloat_disable_wc_scripts() {
			if ( function_exists( 'is_woocommerce' ) ) {
				if ( !is_woocommerce() && !is_cart() && !is_checkout() && !is_account_page() && !is_product() && !is_product_category() && !is_shop() ) {
					
					wp_dequeue_script( 'wc_price_slider' );
					wp_dequeue_script( 'wc-single-product' );
					wp_dequeue_script( 'wc-add-to-cart' );
					wp_dequeue_script( 'wc-checkout' );
					wp_dequeue_script( 'wc-add-to-cart-variation' );
					wp_dequeue_script( 'wc-single-product' );
					wp_dequeue_script( 'wc-cart' );
					wp_dequeue_script( 'wc-chosen' );
					wp_dequeue_script( 'woocommerce' );
					wp_dequeue_script( 'prettyPhoto' );
					wp_dequeue_script( 'prettyPhoto-init' );
					wp_dequeue_script( 'jquery-blockui' );
					wp_dequeue_script( 'jquery-placeholder' );
					wp_dequeue_script( 'fancybox' );
					wp_dequeue_script( 'jqueryui' );

					if ( isset( $kgmwcbloat_options['kgm_cart_frag_wc']) && $kgmwcbloat_options['kgm_cart_frag_wc'] == 'kgm_cart_frag_wc' ) {
						wp_dequeue_script( 'wc-cart-fragments' );
					}
				}
			}
		}
	}

	/**
	 * Styles and scripts Gutenberg Blocks
	 */
	if ( isset( $kgmwcbloat_options['kgm_styles_wc_gutenberg_blocks'] ) && $kgmwcbloat_options['kgm_styles_wc_gutenberg_blocks'] == 'kgm_styles_wc_gutenberg_blocks' ) {
		add_action('wp_enqueue_scripts', 'kgmwcbloat_disable_wc_gutenberg_blocks', 99);
		function kgmwcbloat_disable_wc_gutenberg_blocks() {
			if ( function_exists( 'is_woocommerce' ) ) {
				$all_styles = array(
					'wc-blocks-style',
					'wc-all-blocks-style',
					'wc-blocks-vendors-style',
					'wc-blocks-style-active-filters',
					'wc-blocks-style-add-to-cart-form',
					'wc-blocks-packages-style',
					'wc-blocks-style-all-products',
					'wc-blocks-style-all-reviews',
					'wc-blocks-style-attribute-filter',
					'wc-blocks-style-breadcrumbs',
					'wc-blocks-style-catalog-sorting',
					'wc-blocks-style-customer-account',
					'wc-blocks-style-featured-category',
					'wc-blocks-style-featured-product',
					'wc-blocks-style-mini-cart',
					'wc-blocks-style-price-filter',
					'wc-blocks-style-product-add-to-cart',
					'wc-blocks-style-product-button',
					'wc-blocks-style-product-categories',
					'wc-blocks-style-product-image',
					'wc-blocks-style-product-image-gallery',
					'wc-blocks-style-product-query',
					'wc-blocks-style-product-results-count',
					'wc-blocks-style-product-reviews',
					'wc-blocks-style-product-sale-badge',
					'wc-blocks-style-product-search',
					'wc-blocks-style-product-sku',
					'wc-blocks-style-product-stock-indicator',
					'wc-blocks-style-product-summary',
					'wc-blocks-style-product-title',
					'wc-blocks-style-rating-filter',
					'wc-blocks-style-reviews-by-category',
					'wc-blocks-style-reviews-by-product',
					'wc-blocks-style-product-details',
					'wc-blocks-style-single-product',
					'wc-blocks-style-stock-filter',
					'wc-blocks-style-cart',
					'wc-blocks-style-checkout',
					'wc-blocks-style-mini-cart-contents'
				);

				foreach ( $all_styles as $style ) {
					wp_deregister_style( $style );
					wp_dequeue_style( $style );
				}
			}
		}
	}

	/**
	 * Remove all widgets
	 */
	if ( isset( $kgmwcbloat_options['kgm_wc_widgets_remove'] ) && $kgmwcbloat_options['kgm_wc_widgets_remove'] == 'kgm_wc_widgets_remove' ) {
		add_action('widgets_init', 'kgmwcbloat_wc_widgets_remove', 99);
		function kgmwcbloat_wc_widgets_remove() {
			unregister_widget('WC_Widget_Cart');
			unregister_widget('WC_Widget_Products');
			unregister_widget('WC_Widget_Layered_Nav');
			unregister_widget('WC_Widget_Price_Filter');
			unregister_widget('WC_Widget_Rating_Filter');
			unregister_widget('WC_Widget_Recent_Reviews');
			unregister_widget('WC_Widget_Product_Search');
			unregister_widget('WC_Widget_Recently_Viewed');
			unregister_widget('WC_Widget_Product_Tag_Cloud');
			unregister_widget('WC_Widget_Product_Categories');
			unregister_widget('WC_Widget_Top_Rated_Products');
			unregister_widget('WC_Widget_Layered_Nav_Filters');
		}
	}

	/**
	 * Cart fragmentation
	 */
	if ( isset( $kgmwcbloat_options['kgm_cart_frag_wc'] ) && $kgmwcbloat_options['kgm_cart_frag_wc'] == 'kgm_cart_frag_wc' ) {
		add_action('wp_enqueue_scripts', 'kgmwcbloat_disable_wc_cart_fragmentation', 99);
		function kgmwcbloat_disable_wc_cart_fragmentation() {
			if ( function_exists( 'is_woocommerce' ) ) {
				wp_dequeue_script( 'wc-cart-fragments' );
			}
		}
	}

	/**
	 * Add order to WordPress admin main menù
	 */
	if ( isset( $kgmwcbloat_options['kgm_order_main_menu'] ) && $kgmwcbloat_options['kgm_order_main_menu'] == 'kgm_order_main_menu' ) {
		add_action( 'admin_menu', 'kgmwcbloat_add_order_on_main_menu' );
		function kgmwcbloat_add_order_on_main_menu() {
			add_menu_page( 'shop_order', __('Orders', 'woocommerce'), 'manage_woocommerce', 'edit.php?post_type=shop_order', '', 'dashicons-cart', 2 );
		}
	}
// Else WooCommerce is not enabled
} else {
	add_action( 'admin_notices', 'kgmwcbloat_woocommerce_disabled_notices' );
	function kgmwcbloat_woocommerce_disabled_notices() {
		$wc_notice = __( 'You need WooCommerce for use Debloat for WooCommerce.', 'kgmwcbloat');
		echo '<div class="notice notice-error"><p>' . $wc_notice . '</p></div>';
	}
}

/**
 * Add link on plugin list page
 */
function kgmwcbloat_action_links( $actions ) {
	$mylinks = array( '<a href="'. esc_url( get_admin_url(null, 'admin.php?page=kgmwcbloat') ) .'">' . __( 'Settings', 'default') . '</a>' );
	$actions = array_merge( $mylinks, $actions );
	return $actions;
}

/**
 * Load admin styles
 */
function kgmwcbloat_admin_styles() {
	/**
	 * Check if in plugin options page
	 */
	$screen = get_current_screen();
	if ( $screen->base == 'woocommerce_page_kgmwcbloat' ) {
		wp_enqueue_script( 'kgmwcbloat_admin', plugins_url( 'includes/admin.js', __FILE__ ), array( 'jquery' ), $GLOBALS['hfff_version'] );
		wp_enqueue_style( 'kgmwcbloat_admin', plugins_url( 'includes/admin.css', __FILE__ ), array(), $GLOBALS['hfff_version'] );
	} else {
		return;
	}
}

/**
 * Array of current WooCommerce features
 */
function kgmwcbloat_wc_features_array() {
	return array(
		'activity-panels',
		'analytics',
		'product-block-editor',
		'coupons',
		'core-profiler',
		'customer-effort-score-tracks',
		'import-products-task',
		'experimental-fashion-sample-products',
		'shipping-smart-defaults',
		'shipping-setting-tour',
		'homescreen',
		'marketing',
		'mobile-app-banner',
		'navigation',
		'onboarding',
		'onboarding-tasks',
		'remote-inbox-notifications',
		'remote-free-extensions',
		'payment-gateway-suggestions',
		'shipping-label-banner',
		'subscriptions',
		'store-alerts',
		'transient-notices',
		'woo-mobile-welcome',
		'wc-pay-promotion',
		'wc-pay-welcome-page'
	);
}

/**
 * 
 * This retrieve all WooCommerce features and debug in head of settings page if plugin array (above) miss of one of thems
 * 
 */
function kgmwcbloat_for_test_new_wc_features() {
	if ( kgmwcbloat_check_woocommerce_enabled() ) {
		$array = apply_filters( 'woocommerce_admin_features', array() );
		return $array;
	} else {
		return;
	}
}

/**
 * Check if WooCommerce is enabled
 */
function kgmwcbloat_check_woocommerce_enabled() {
	/**
	 * Check if WooCommerce is enabled
	 */
	$check_wc = false;

	if ( ! function_exists('is_plugin_active_for_network') ) {
		require_once(ABSPATH . '/wp-admin/includes/plugin.php');
	}

	/**
	 * Check for multisite activation
	 */
	if ( is_multisite() && is_plugin_active_for_network( plugin_basename(__FILE__) ) ) {
		/**
		 * WooCommerce active on multisite 
		 */
		$check_wc = is_plugin_active_for_network( 'woocommerce/woocommerce.php' ) ? false : true;
	} else {
		/**
		 * WooCommerce active on single site
		 */
		$check_wc = is_plugin_active('woocommerce/woocommerce.php') ? false : true;
	}

	/**
	 *  WooCommerce is active or not?
	 */
	if ( $check_wc === true ) {
		return false;
	} else {
		return true;
	}
}

/**
 * Uninstall
 */
register_uninstall_hook( __FILE__, 'kgmwcbloat_plugin_uninstall' );
function kgmwcbloat_plugin_uninstall() {
	delete_option( 'kgmwcbloat_option_name' );
}
