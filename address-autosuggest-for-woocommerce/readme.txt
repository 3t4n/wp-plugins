Contributors: webv8
Donate link: https://webv8.net/donate/
Tags: WooCommerce, address, autocomplete, Google Places, checkout
Tested up to: 6.7
Stable tag: 1.4.1
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Enable Google Places API on the checkout page to make address fields in WooCommerce checkout autofill automatically.

== Description ==

Enable Google Places Autocomplete for WooCommerce checkout address fields. This plugin simplifies the checkout process, reduces errors, and enhances the user experience by autofilling address details in real time.

This plugin uses the Google Places API to provide address autocomplete functionality. It requires a valid Google API key.

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/address-autosuggest-for-woocommerce/` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. Navigate to WooCommerce > Settings > Address AutoSuggest to configure the plugin.
4. Enter your Google API key to enable the autocomplete functionality.

== External Services ==

This plugin relies on the Google Places API for address autocomplete functionality. 

- Data sent: Address search queries entered by the user during checkout.
- Purpose: To fetch address suggestions from the Google Places API and autofill the WooCommerce address fields.
- Terms of Service: [Google Cloud Terms of Service](https://cloud.google.com/terms/)
- Privacy Policy: [Google Privacy Policy](https://policies.google.com/privacy)

== Frequently Asked Questions ==

= How do I obtain a Google API key? =

Follow these steps to obtain your API key:

1. Go to the [Google Cloud Console](https://console.cloud.google.com/google/maps-apis/home;onboard=true).
2. Create or select a project.
3. Enable the "Places API".
4. Generate an API key under "Credentials".
5. Restrict the API key to prevent unauthorized use.

= Does this plugin support both billing and shipping address fields? =

Yes, the plugin supports autocompletion for both billing and shipping address fields on the WooCommerce checkout page.

== Screenshots ==

1. **Checkout Page with Autocomplete**: Demonstrates the address autocomplete feature in action on the checkout page.
2. **Settings Page**: Shows the plugin settings where you configure the Google API key and other options.

== Changelog ==

= 1.4.1 =
* Added Step-by-Step Guide in the Settings Page.

= 1.4 =
* Replaced hardcoded country list with WooCommerce’s built-in country list.
* Improved performance by removing redundant file reads.
* Enhanced security with stricter URL escaping.
* Converted JavaScript API wait logic into a Promise-based function.
* Minified JavaScript for faster execution.
* Fixed frontend issue where Google Places list was not appearing.

== Upgrade Notice ==

= 1.4.1 =
Added a Step-by-Step Guide in the Settings Page to improve user onboarding.

= 1.4 =
Performance and security improvements, along with a switch to WooCommerce’s built-in country list. Ensure your settings are configured correctly after updating.
