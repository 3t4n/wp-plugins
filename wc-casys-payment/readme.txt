=== Payment Gateway for Cpay with WooCommerce ===
Contributors: webpigment, m1tk00
Donate link:
Tags: woocommerce, payment gateway, cpay, casys
Requires at least: 4.0
Requires WooCommerce at least: 3.2
Tested WooCommerce up to: 4.8.0
Tested up to: 5.6
Stable tag: 1.2
Requires PHP: 7.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Implements Cpay payment gateway for your WooCommerce shop

== Description ==

Implements [cPay](https://www.cpay.com.mk/Client/page/default.aspx?xml_id=/mk-MK/) Payment Gateway [CaSys](http://www.casys.com.mk/en.html), for your WooCommerce shop to make payments.
You can check the payment documentation [here](https://www.cpay.com.mk/repository/documents/cPay_Merchant_Params.pdf).

If the transaction is successful, the order status will be changed to processing. If the transaction failed, the order status will be changed to canceled. If something is wrong with the connection between your server and the cPay server the order status will be changed to on-hold. After successful transaction the customer is redirected to the default WP success page.

== Installation ==

This section describes how to install the plugin and get it working.

e.g.

1. Upload the plugin files to the `/wp-content/plugins/plugin-name` directory, or install the plugin through the WordPress plugins screen directly.
1. Activate the plugin through the 'Plugins' screen in WordPress
1. Use the Settings->Plugin Name screen to configure the plugin
1. (Make your instructions match the desired user flow for activating and installing your plugin. Include any steps that might be needed for explanatory purposes)

== Changelog ==
= 1.2 =
* Add support for different currencies through the dashboard
= 1.1 =
* Add filter for Cpay currency `casys_order_currency`
* Add filter for order total `casys_order_total`
* Example `add_filter('casys_order_total', function( $total ) { return $total * 61.5; } );`
* Example `add_filter('casys_order_currency', function( $currency ) { return 'MKD'; } );`
= 1.0.1 =
* Fix wording
* Add filter for Cpay endpoint `cpay_payment_endpoint`
= 1.0.0 =
* Initial version
