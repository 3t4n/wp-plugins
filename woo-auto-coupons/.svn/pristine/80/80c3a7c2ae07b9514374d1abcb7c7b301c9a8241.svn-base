=== Auto Coupons for WooCommerce ===
Contributors: rermis
Tags: woocommerce, coupons, auto apply, discount, duplicate
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html
Requires at least: 4.6
Tested up to: 6.7
Stable tag: 3.0.22

Apply WooCommerce Coupons automatically with a fast, lightweight plugin. Set minimum product quantities, apply coupons by URL or automatically.

== Description ==
Apply WooCommerce Coupons automatically with a simple, fast and lightweight plugin.

## Features
&#9745; **Unlimited Auto Apply Coupons** using native WooCommerce coupon conditions
 
&#9745; **Set Minimum Product Quantities** for coupons

&#9745; **Apply Coupons by URL** when a specific page is visited

&#9745; **Coupon Troubleshooting** by itemized coupon on the cart page

&#9745; **WooCommerce Blocks** Compatible

## PRO Features
&#9989;  **Auto-Apply Defaults** - Default future coupons to auto-apply automatically.

&#9989;  **Bulk Updates** - Update auto-apply on active coupons in bulk.

&#9989;  **Copy Coupons & More** - Duplicate coupons, products, posts and pages.

&#9989;  **Streamline Email** Restrictions - Prompt for customer email in cart when a coupon with email restrictions is applied.

&#9989;  **Coupon Defaults** - Set default verbiage for new coupons.


== Installation ==
1. Upload the plugin files to the `/wp-content/plugins/woo-auto-coupons` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the \'Plugins\' screen in WordPress
3. Go to Marketing > Coupons
4. Create a coupon or visit an existing coupon
5. Auto Coupon options are found on individual WooCommerce coupon settings.

== Screenshots ==
1. Coupon Applied
2. Minimum Quantity for discount
3. Admin Settings
4. Troubleshooting mode

== Changelog ==
= 3.0.22 = * Compatibility with WC 9.6
= 3.0.19 = * Automate checks for future-auto-apply.
= 3.0.18 = * Bug fix to cart refresh on update.
= 3.0.17 = * Bug fix to min items qty in cart.
= 3.0.15 = * Compatibility with WC 8.9, Added sanitization to setting tabs.
= 3.0.14 = * Compatibility checks, additional input sanitization.
= 3.0.12 = * Minor css improvements.
= 3.0.11 = * Bug fix to admin cache-clear.
= 3.0.9 = * Minor setup improvements.
= 3.0.7 = * Minor bug fixes.
= 3.0.0 = * Redesigned interface. Improvements to native WC email restriction behavior. Dependencies for future features.
= 2.4.0 = * Compatibility with WC 8.3. Improvements to cart blocks. Removed cache logic for coupon links.
= 2.3.8 = * Added conditionals to prevent ajax conflict possibilities.
= 2.3.6 = * Bug fix to session check returning undefined array key 1.
= 2.3.5 = * Improvement to cart modal processing. Bug fix for nulls passed to unserialize().
= 2.3.4 = * Improvement to line item persistency when cart is reloaded by ajax
= 2.3.3 = * Bug fix where coupon code line items contains in-line styling. Improvements to triggering with cart URL in any language.
= 2.3.2 = * Moved Coupon Status button (formerly troubleshoot button) to admin bar on cart page.
= 2.3.1 = * Added troubleshoot button to cart page when logged in as admin. Improvements to triggering with cart URL in any language.
= 2.2.16 = * Line Item Name, update to allow any language.
= 2.2.15 = * Add output buffering for coupon notifications.
= 2.2.12 = * Compatibility with WC 7.9 and WC HPOS.
= 2.2.9 = * Allow removal of auto applied coupons in cart.
= 2.2.7 = * Fix to cache and apply coupon code on subsequent page loads when apply via URL is used in combination with ?add-to-cart variable in some environments.
= 2.2.6 = * Add logic when multiple auto apply coupons are eligible without individual use designation. Prioritize apply via URL over Auto Apply. Improve logic when both apply via URL and auto apply coupons are eligible.
= 2.2.5 = * Improved language and examples for Apply via URL option. Tweak logic if both apply methods are enabled.
= 2.2.4 = * Bug fix for cart count when $woocommerce variable not set.
= 2.2.3 = * Potential fix for wp-db bug for WP<6.1.1.
= 2.2.2 = * WC Custom orders table compatibility check.
= 2.2.1 = * WooCommerce Blocks compatibility. Update db dependency from wp-db.php to class-wpdb.php. 
= 2.1.20 = * Custom quantity notifications fix for some scenarios.
= 2.1.19 = * Allow custom quantity notifications in cart. Support for variables.
= 2.1.18 = * Fix around UNIXTIME nulls in MySQL 8 - thanks @mattiamaragno!
= 2.1.17 = * Bug fix for category restrictions when products not specified.
= 2.1.15 = * Refined caching behavior for manually removed auto-applied coupons vs auto applied coupons that do not qualify.
= 2.1.14 = * WC tested up 6.4. Added contraints before converted dates from unix.
= 2.1.7 = * Delete removed coupon cache when coupon no longer qualifies. Cache a coupon when manually removed and still valid.
= 2.1.6 = * Improved checks for cart page
= 2.1.2 = * Removed sessions for compatibility with block editors. Added caching via wac_sess().
= 2.1 = * Allow manual removal of auto-applied coupon code, and cache preference.
= 2.0.12 = * Fixed bug when counting cart quantities.
= 2.0.7 = * Added comma separated product or category names to min quantity requirement verbiage (if specified).
= 2.0.5 = * Only show quantity related notifications in cart.
= 2.0.2 = * Consolidate all styling into one function. Bug fix for echo on line 196.
= 2.0.1 = * Improvement: Add option to disable cart notifications (e.g. if quantity in cart is less than min quantity of auto-apply coupon).
= 2.0.0 = * Line item name option in cart. Bug fix to minimum coupon quantity if not restricted to a product. Improvements to troubleshooting coupon min/max quantity. Reduction of js dependencies. Eliminated warnings for unset post vars.  Improved validation on coupon quantities.


== Frequently Asked Questions ==

= Does this plugin have a coupon limit? =
This plugin works with an unlimited number of coupons.

= Why isn't my coupon auto-applying? =
The coupon will apply only when conditions are met and the coupon has not been previously removed from the cart.  If a previously auto-applied coupon is manually removed from the cart, it will not auto apply again unless another coupon has been added and removed.

= How can I troubleshoot? =
Visit WooCommerce > Auto Coupons > Status to see troubleshooting options.  This page provides a button to reset the coupon cache, and the 'Troubleshoot' button will output a status for all coupons. You may also test coupons using your browser's private/incognito feature to bypass the cache.

= My cart page name is not '/cart', will the plugin still work? =
Auto Coupons will work with a non-standard cart page name.  Just open or save any coupon for the change to take effect.

= How can I troubleshoot my coupons? =
To troubleshoot, you must be logged in as an administrator.  Visit the cart page and press the 'Auto Coupons Status' button to list all coupons with status.
