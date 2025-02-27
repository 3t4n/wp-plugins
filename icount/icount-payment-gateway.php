<?php

namespace WC_Gateway_ICount;

/**
 * Plugin Name: iCount Payment Gateway
 * Description: WooCommerce integration for iCount Payment Gateway.
 * Version: 2.0.3
 * RequiresPHP: 7.4
 * Author: iCount Systems
 * Author URI: https://www.icount.co.il/
 * License: GPLv2 or later
 * License URL: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: woocommerce-icount
 */

use Automattic\Jetpack\Constants;
use Automattic\WooCommerce\{
	Blocks\Assets\Api,
	Blocks\Domain\Package,
	Blocks\Domain\Services\FeatureGating,
	Blocks\Payments,
	Blocks\Payments\Integrations\AbstractPaymentMethodType,
	Blocks\Registry\Container,
	Utilities\FeaturesUtil
};

defined('ABSPATH') or die('You can\'t access this file!'); // Exit if accessed directly

define(
	'ICOUNT_PAYMENT_PLUGIN_URL',
	untrailingslashit(
		plugins_url(
			basename(plugin_dir_path(__FILE__)),
			basename(__FILE__)
		)
	)
);

define(
	'ICOUNT_PAYMENT_PLUGIN_WC_DOMAIN',
	wp_parse_url(site_url(),PHP_URL_HOST)
);

const
PLUGIN_ID = 'wc_gateway_icount-wc_icount_gateway',
PLUGIN_SLUG = 'icount-payment-gateway';

function __(string $text): string
{
	//return \__($text, PLUGIN_SLUG);

    return sprintf( 
		/* translators: %s: Dynamic variable */
		esc_html__('&nbsp; %s', 'woocommerce-icount'), 
		$text
	);	
}



add_filter('plugin_action_links_' . plugin_basename(__FILE__),
	static function ($links) {
		return array_merge(
			[
				'settings_payment' =>
					'<a href="'
					. admin_url(
						'admin.php?page=wc-settings&tab=checkout&section=' . PLUGIN_ID
					)
					. '" aria-label="'
					. __('View', 'woocommerce-icount')
					. ' '
					. __('Settings', 'woocommerce-icount')
					. '">'
					. __('Settings', 'woocommerce-icount')
					. '</a>',

				'help' => '<a href="' . esc_url('http://www.icount.co.il/help/integration/woocommerce') . '" title="' . esc_attr(__('View iCount Documentation','woocommerce-icount')) . '">' . __('Help','woocommerce-icount') . '</a>',
				'support' => '<a href="' . esc_url('https://app.icount.co.il/support/?action=newissue') . '" title="' . esc_attr(__('Open Support Ticket','woocommerce-icount')) . '">' . __('Support','woocommerce-icount') . '</a>',
			],
			$links
		);
	});



add_action('plugins_loaded',
	static function () {
		if (class_exists('WooCommerce')) {
			require_once(__DIR__ . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'WC_ICount_Gateway.php');

			load_plugin_textdomain(PLUGIN_SLUG, false, plugin_basename(__DIR__) . DIRECTORY_SEPARATOR . 'languages');
			add_filter(
				'woocommerce_payment_gateways',
				static function (array $methods) {
					$methods[] = WC_ICount_Gateway::class;
					return $methods;
				}
			);
		}
	}
);

add_action(
	'before_woocommerce_init',
	static function () {
		global $wp_version;
		define(
			'ICOUNT_PAYMENT_PLUGIN_WOOCO_INFO',
			[
				'wc_domain' => ICOUNT_PAYMENT_PLUGIN_WC_DOMAIN,
				'wc_version' => Constants::get_constant('WC_VERSION'),
				'wp_siteurl' => site_url(),
				'wp_version' => $wp_version,
				'ic_version' => get_plugin_data(__FILE__)['Version'],
			]
		);
		if (class_exists(FeaturesUtil::class)) {
			FeaturesUtil::declare_compatibility('cart_checkout_blocks', __FILE__, true);
		}
	});

add_action(
	'woocommerce_blocks_loaded',
	static function () {
		if (class_exists(AbstractPaymentMethodType::class)) {
			require_once __DIR__ . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'WC_ICount_PaymentMethodType.php';

			$container = new Container();

			$container
				->register(
					WC_ICount_PaymentMethodType::class,
					static fn(Container $container) => new WC_ICount_PaymentMethodType ($container->get(Api::class)
					)
				);

			$container
				->register(
					Api::class,
					static fn(Container $container) => new Api($container->get(Package::class))
				);

			$container
				->register(
					Package::class,
					static fn(Container $container) => new Package(
						'1.0.0',
						__DIR__,
						new FeatureGating
					)
				);

			add_action(
				'woocommerce_blocks_payment_method_type_registration',
				static function (Payments\PaymentMethodRegistry $payment_method_registry) use ($container) {
					$payment_method_registry->register(
						$container
							->get(WC_ICount_PaymentMethodType::class)
					);
				}
			);
			



		}
	});


add_action( 'wp_enqueue_scripts', 
	static function () {
		if ( is_checkout() ) {
			wp_enqueue_script('wpi-modal-script', plugin_dir_url( __FILE__ ) . 'assets/js/checkout.js', array('jquery'), '1.0.1', true);
			wp_enqueue_style('wpi-modal-style', plugin_dir_url( __FILE__ ) . 'assets/css/admin_settings.css');
		}		
	});

add_action( 'wp_footer', 
	static function () {
		if ( is_checkout() ) {			
			echo '<div id="paymentModal" class="modal" style="display: none; z-index: 99999;"><div class="modal-content"><iframe allow="fullscreen; payment" class="icount-loader" id="paymentIframe" src="" style="width: 100%;  border:0; position:relative; border-radius: 6px !important;"></iframe></div>';
		}		
	});




