=== My Downloads Shortcode for WooCommerce ===
Contributors: mattpramschufer,emoxie
Tags: woocommerce, downloads, shortcode
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=mattpram%40gmail%2ecom
Tested up to: 5.8
Requires at least: 3.8
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Creates a shortcode which can be displayed on any page to show users WooCommerce available downloads.

== Description ==
This plugin requires WooCommerce.

When developing a WooCommerce site I realized there was not a shortcode for displaying the logged in users available downloads outside of the My Account page.  So I developed this simple plugin which adds the short code [woocommerce-my-downloads].  It is simple and effective.  It displays the Date of the order and the file name in an unordered list.

** Note: WooCommerce 5.8.x Compatible


###Usage

= Shortcode for displaying all downloads =
`[woocommerce-my-downloads]`

= Shortcode for single product download button =
`[woocommerce-my-downloads-button id=PRODUCT_ID]`

== Installation ==
1. Search for plugin and install it
1. Activate the plugin through the \"Plugins\" menu in WordPress.
1. Place the shortcode [woocommerce-my-downloads] on any page you would like.

== Frequently Asked Questions ==
= Can I change the template? =
For right now, you can change the template by editing the /tpl/my-downloads.php file.
= How do I put my downloads shortcode in my template with PHP? =
Open your template file and the put in `<?php do_shortcode('[woocommerce-my-downloads]'); ?>`


== Changelog ==
= 1.8.0 =
* BUGFIX - Updated templates to make it so it would use the specific download name instead of just the download label.

= 1.7.0 =
* UPDATE - Removed PHP Warnings when downloads were unlimited
* UPDATE - Confirmed working with WooCommerce 4.5x and Wordpress 5.5x
* UPDATE - Added in infinity symbol to indicate unlimited downloads.

= 1.6.0 =
* General Code Cleanup
* Insured compatibility with latest versions of WooCommerce and Wordpress
* Added in defaults when just setting up
* Change name to adhere to trademark guidelines

= 1.5 =
* Wrapped $woocommerce in check statement for corner cases when woocommerce is not loaded and fatal error occurs when saving page/post with shortcode.

= 1.4 =
* Fixed php warnings for undefined variables
* Fixed deprecated calls
* Moved away from the global $woocommerce and changed to WC()
* Cleaned up various parts of code.

= 1.3 =
* Added in new shortcode for single download button
* Options Include:
** Toggle Show Date on Template
** Ability to specify label on button
** Ability to add specific classes to button
= 1.2 =
* Confirmed working with Wordpress 4.3 and WooCommerce 2.4.5
* Added in a setting panel.  Go into Admin->Settings->WooCommerce My Downloads
* Options Include:
** Available Downloads Heading
** Content if user has no downloads.
** Show Downloads Remaining on Template
** Show Available Download Count on Template
= 1.1 =
* Wordpress 3.9 Compatible
* WooCommerce 2.1 Compatible
= 1.0 =
* Initial release.

