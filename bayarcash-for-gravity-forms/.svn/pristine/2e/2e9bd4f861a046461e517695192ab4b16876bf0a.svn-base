=== Bayarcash for Gravity Forms ===
Contributors: bayarcash
Tags: payment gateway, gravity forms, bayarcash, fpx, malaysia payment
Requires at least: 5.0
Tested up to: 6.7
Requires PHP: 7.4
Stable tag: 1.0.0
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html

Integrate Bayarcash payment gateway with Gravity Forms to accept payments in Malaysia via FPX, DuitNow, and other local payment methods.

== Description ==

Bayarcash for Gravity Forms allows you to accept payments through Malaysia's popular payment methods. This plugin integrates Bayarcash payment gateway with Gravity Forms Pro, enabling you to collect payments easily and securely.

= Features =
* Easy integration with Gravity Forms
* Accept payments via FPX (Malaysian online banking)
* Simple setup process
* Secure payment processing

= Requirements =
* WordPress 5.0 or higher
* PHP 7.4 or higher
* Gravity Forms Pro installed and activated
* Bayarcash merchant account
* Valid Bayarcash API credentials

== Installation ==

1. Install and activate Gravity Forms if you haven't already
2. Upload the plugin files to `/wp-content/plugins/bayarcash-for-gravity-forms`
3. Activate the plugin through the 'Plugins' screen in WordPress
4. Go to Gravity Forms > Bayarcash Settings to configure your API credentials
5. Configure your payment form in Gravity Forms and select Bayarcash as the payment method

For API integration, you'll need:
* Personal Access Token
* Portal Key

== External Services ==
This plugin connects to Bayarcash's payment processing service to handle payment transactions. This connection is essential for processing payments through the supported payment methods (FPX, DuitNow Online Banking, and DuitNow QR).

= Data Transmission =
The following data is sent to Bayarcash's servers when processing payments:

Payment information (amount, currency, payment method)
Transaction details (order ID, description)
Customer information provided in the form (name, email, phone number if collected)
Merchant authentication credentials (API tokens)

Data is transmitted:

When creating a new payment intent (when a customer submits the payment form)
When checking payment status
When processing webhook notifications for payment updates

All data is transmitted securely via HTTPS to Bayarcash's API endpoints (https://console.bayar.cash/).

= Service Provider Information =

Service Website: https://bayarcash.com
Terms of Service: https://bayarcash.com/terms-conditions/
Privacy Policy: https://bayarcash.com/privacy-policy/
API Documentation: https://api.webimpian.support/bayarcash

These can be obtained from your Bayarcash merchant dashboard.

== Frequently Asked Questions ==

= Do I need a Bayarcash account? =

Yes, you need to sign up for a Bayarcash merchant account at [https://console.bayar.cash/register-merchant](https://console.bayar.cash/register-merchant)

= Is Gravity Forms required? =

Yes, this plugin requires Gravity Forms to be installed and activated.

= Which currencies are supported? =

Currently, only Malaysian Ringgit (MYR) is supported.

= Where do I get my API credentials? =

You can find your API credentials in your Bayarcash merchant dashboard under the API settings section.

= How does the API integration work? =

The plugin uses Bayarcash's Payment Intents API (v2) to create and process payments. When a form is submitted with payment, the plugin:
1. Creates a payment intent via the API
2. Redirects the customer to the payment page
3. Processes webhook notifications for payment status updates

For detailed API documentation, visit [https://api.webimpian.support/bayarcash](https://api.webimpian.support/bayarcash)


== Changelog ==

= 1.0.0 =
* Initial release

== Upgrade Notice ==

= 1.0.0 =
Initial release of Bayarcash for Gravity Forms

== Support ==

For support, please visit [https://bayarcash.com](https://bayarcash.com) or email support@bayarcash.com

For API documentation and technical reference, visit [https://api.webimpian.support/bayarcash](https://api.webimpian.support/bayarcash)

== Privacy Policy ==

This plugin integrates with Bayarcash payment gateway and processes payment information. All payment processing is handled securely by Bayarcash. No sensitive payment data is stored on your WordPress site.

For more information about how Bayarcash handles payment data, please visit their privacy policy at [https://bayarcash.com/privacy-policy/](https://bayarcash.com/privacy-policy/).