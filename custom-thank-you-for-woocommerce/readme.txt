=== Custom Thank You for WooCommerce ===

Contributors: Artiosmedia, steveneray, repon.wp
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=E7LS2JGFPLTH2
Tags: thank you, thank you page, order confirmation, checkout, social share
Requires at least: 4.6
Tested up to: 6.6.1
Version: 1.1.2
Stable tag: 1.1.2
Requires PHP: 7.4.33
License: GPLv3 or later license and included
URI: http://www.gnu.org/licenses/gpl-3.0.html

A popular WooCommerce extension which redirects a buyer to a custom Wordpress thank you page, that includes social share features.

== Description ==

This plugin is a simple yet popular WooCommerce extension which redirects a buyer to a custom Wordpress page created by the administrator. Simply create a blank page using the template in your theme, naming it anything like "Thank You Page" and then select that page from the plugin settings dropdown as the Thank You page. You must then add these short codes in your page to display content where you want in your template (see example graphic below using a builder):

<strong>[ctyw_order_review]</strong> - Displays order details (Normally at top)
<strong>[ctyw_socialbox]</strong> - Displays responsive social box (Normally at bottom)

This valued redirect customization allows the user to embellish the purchase verification page with more suggested items and even the WooCommerce user console short code if desired. This plugin allows maximum design options!

A new global shortcode was added in version 1.0.5. The shortcode is [ctyw_order_information data="key"]. This addition extends the plugin to make provision for users to be able to access 40 different data fields from orders by replacing the "key" entry with what they want to retrieve. For example [ctyw_order_information data="order_billing_first_name"] will output order customer billing first name and [ctyw_order_information data="order_billing_address_1"] will output customer billing address. This shortcode allows an infinite combination of results, limited to only what WooCommerce or other third-party plugins include.

The highly valued social share box can appear on the custom thank you page after a finished purchase.  A customer can select any one of the items purchased and post the product on Facebook, Pinterest or Twitter. They can also choose to email the purchase to anyone. This is an effective and proven method of content marketing through social sharing.

While some 'Thank You' plugins entail complex setups and functions which result in extra memory usage, system conflicts and frequent updates, this plugin eliminates all the hurdles by providing a simple solution without excessive size or options. This plugin too supports Google Analytics tracking. The hook “woocommerce_is_order_received_page” is added to line 33 and returning true. Tests confirms that Google Analytics can track the dynamic page and record it both historically and in real-time.

In summary, at the conclusion of a purchase, your buyer will be redirected to your custom 'Thank You' page instead of WooCommerce's default 'Thank You' page. You can create your own Thank You message due to this plugin's flexibility.

== Installation ==

1. Upload the plugin files to the '/wp-content/plugins/plugin-name' directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. Access the 'Admin Panel > WooCommerce > settings' screen or click Settings from plugin install. Under settings Go to Advanced tab and you can find the Custom Thank You page settings. Scroll to the bottom to find the Thank You page configuration dropdown. Choose from the list of pages the one you created to use as the custom thank you page. Optionally deactivate any social share options if you desire.

== Technical Details for Release 1.1.2 ==

Load time: 0.263 s; Memory usage: 3.54 MiB
PHP up to tested version: 8.3.11
MySQL up to tested version: 8.0.39
MariaDB up to tested version: 11.5.2
cURL up to tested version: 8.9.1, OpenSSL/3.3.1
PHP 7.4, 8.0, 8.1, 8.2, and 8.3 compliant.

== Frequently Asked Questions ==

= Is this plugin frequently updated to Wordpress compliance? =
Yes, attention is given on a staged installation with many other plugins via debug mode.

= Is the plugin as simple to use as it looks? =
Yes. No other plugin exists that adds an additional custom product code so simply.

= Has there ever any compatibility issues? =
To date, none have ever been reported.

= Does this plugin work with Google Analytics Tracking? =
Yes, it has been tested rigoriously to meeting Googles requirements.

= Can I customize the templates? =
This plugin uses the default WooCommerce templates. You can customize them, learn how here: https://docs.woocommerce.com/document/template-structure/

= Is the code in the plugin proven stable? =
Please click the following link to check the current stability of this plugin:
<a href="https://plugintests.com/plugins/custom-thank-you-for-woocommerce/latest" rel="nofollow ugc">https://plugintests.com/plugins/custom-thank-you-for-woocommerce/latest</a>

== Screenshots ==

1. The settings found under WooCommerce Advanced tab.
2. Page in a builder with short codes combined with text.
3. Buyer can choose to share purchase on select social networks.

== Upgrade Notice ==

None to report as of the release version

== Changelog ==

1.1.2 09/01/24
- Minor edits to language files
- Assure compliance with WordPress 6.6.1
- Assure compliance with WooCommerce 9.2.3

1.1.1 04/06/24
- Minor adjustments and edits
- Assure compliance with WordPress 6.5
- Assure compliance with WooCommerce 8.7.0

1.1.0 08/11/23
- Added compatibility with WooCommerce HPOS
- Assure compliance with WordPress 6.3.0
- Assure compliance with WooCommerce 8.0.0

1.0.7 04/16/23
- Optimize for PHP 8.1 and WordPress 6.2
- Assure compliance with WooCommerce 7.6.0
- Assure current stable PHP 8.1 and 8.2 use

1.0.6 05/23/22
- Text edits along with translations
- Assure compliance with WordPress 6.0
- Assure compliance with WooCommerce 6.5.1

1.0.5 02/01/22
- Added: New shortcode with 40 possible sources
- Updates for Wordpress 5.9
- Update: All language files
- Assure current stable PHP 8.1.1 use
- Assure compliance with WooCommerce 6.1.1

1.0.4 05/14/21
- Improvement: removed Font Awesome for better speed
- Improvement: resources load only on required pages
- Updates for Wordpress 5.7.2
- Assure compliance with WooCommerce 5.3.0

1.0.3 08/28/20
- Fixed: Unable to uninstall error.
- Update: Compatibility fixes for WordPress 5.5.
- Update: Compliance with WooCommerce 4.4.1

1.0.2 07/02/20
- Work on code to assure Google Analytics Tracking.
- Update: Font Awesome 4.6.2 to 4.7.0.
- Update: Assure compatibility with Wordpress 5.4.2.

1.0.0 02/26/20
- First release!
