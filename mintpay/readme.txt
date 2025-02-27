=== Mintpay ===
Contributors: mintpay
Tags: bnpl, mintpay, online, payments, sri lanka
Requires at least: 4.6
Tested up to: 6.5.5
WC tested up to: 8.9.2
Stable tag: 2.0.6
Requires PHP: 7.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
 
Mintpay, Sri Lanka's first buy now, pay later platform offers 0% interest and no hidden fees.

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/plugin-name` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Use the WooCommerce->Settings->Payments->Mintpay screen to configure the plugin with your Mintpay Merchant Account
4. Make sure you tick the Enable Test Mode checkbox if you want to test the plugin with Mintpay test credentials

== Screenshots ==

1. Mintpay payment gateway in Woocommerce checkout page
2. Mintpay login page
3. Mintpay Customer portal
4. Mintpay Payment gateway settings (sandbox credentials)

== Frequently Asked Questions ==

= How to sign up for a Mintpay Merchant Account? =

Go to Mintpay website & apply for a Merchant Account.
https://www.mintpay.lk

= Does the plugin support WooCommerce Subscriptions? =

Yes. Supported Subscription products can be checked out with the gateway.

= The screen redirects to cart page after clicking on place order =

Go to Mintpay settings, and disable the Test Mode checkbox.

== Changelog ==

= 1.0.1 =
* [Fix] - Fixed issue with displaying `Product type not identified` under product price
= 1.0.2 =
* [Fix] - Made changes to work seamlessly with `Mintpay Price Breakdown` plugin (Old version)
= 1.0.3 =
* [Fix] - Moved price breakdown inline styles to classes
= 1.0.4 =
* [Fix] - Moved price breakdown classes to inline styles
= 1.0.5 =
* [Fix] - Fixed issue with Admin Panel crashing when Mintpay plugin is activated
= 2.0.0 =
* [New] - Added support for WooCommerce Blocs
* [New] - Added auto Cashback Value / Pay Later Value on Product Page
* [Fix] - Fixed issue with the plugin using old get price function
= 2.0.1 =
* [Fix] - File Cleanup
= 2.0.2 =
* [Fix] - Css Warning fix
= 2.0.3 =
* [Fix] - Fix then price is null or empty 
= 2.0.4 =
* [New] - Added dynamic price and cashback parameters to education URL
= 2.0.5 =
* [Fix] - Same URL Generation on Shopify and Wordpress
= 2.0.6 =
* [Fix] - Fix on 0 cashback stores

== External Services ==

Mintpay WordPress plugin uses the Mintpay API service for processing payments. Please follow the below links for more information.

Website: https://mintpay.lk/
Terms & Conditions: https://app.mintpay.lk/terms/
Privacy Policy: https://app.mintpay.lk/privacy/