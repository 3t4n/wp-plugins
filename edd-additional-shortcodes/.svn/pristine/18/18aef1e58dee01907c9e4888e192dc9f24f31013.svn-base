=== Easy Digital Downloads - Additional Shortcodes ===
Contributors: easydigitaldownloads, am, cklosows, littlerchicken, zkawesome, smub
Tags: easy digital downloads, shortcodes, conditional logic, shopping cart, landing page
Requires at least: 4.9
Tested up to: 6.1
Stable tag: 1.4.2
Requires PHP: 5.6
License: GPLv2 or later

Add powerful conditional page content support to WordPress based on Easy Digital Downloads conditions.

== Description ==

Additional Shortcoddes for Easy Digital Downloads adds powerful condional page logic for your WordPress powered ecommerce store.

=== How to use Additional Shortcodes ===

The shortcodes included all need opening and closing tags:

Show content if shopping cart is *not* empty.

`[edd_cart_has_contents] Content Here [/edd_cart_has_contents]`

Show content if the shopping cart *is empty*.

`[edd_cart_is_empty] Content Here [/edd_cart_is_empty]`

Show the content if the cart contains specific products (supports any, all, and variations)

`[edd_items_in_cart ids="20"] Content Here [/edd_items_in_cart]`

`[edd_items_in_cart ids="20,34,25:1"] Content Here [/edd_items_in_cart]`

`[edd_items_in_cart ids="20,34,25:1" match="all"] Content Here [/edd_items_in_cart]`

`[edd_items_in_cart ids="20,34,25:1" match="any"] Content Here [/edd_items_in_cart]`

Show the content if the cart does *not* contain specific products (supports any, all, and variations)

[edd_items_not_in_cart ids="20"]Content here[/edd_items_not_in_cart]
[edd_items_not_in_cart ids="20,34,25:1"]Content Here[/edd_items_not_in_cart]
[edd_items_not_in_cart ids="20,34,25:1" match="all"]Content Here[/edd_items_not_in_cart]
[edd_items_not_in_cart ids="20,34,25:1" match="any"]Content Here[/edd_items_not_in_cart]

Show the content if the user has made previous purchases (will always be hidden if logged out)

`[edd_user_has_purchases] Content Here [/edd_user_has_purchases]`

Show the content only if the user has no purchases. Includes the 'loggedout' parameter to specify if logged out users
should be included in seeing the content. (Default true)

`[edd_user_has_no_purchases loggedout="true"] Content Here [/edd_user_has_no_purchases]`

Show the content to logged in users

`[edd_is_user_logged_in] Content Here [/edd_is_user_logged_in]`

Show the content only to logged out users

`[edd_is_user_logged_out] Content Here [/edd_is_user_logged_out]`

Show content only if a user has purchased any of the specified download ids.
Supports multiple IDs. If a download has variable pricing, you can pass just the ID for all options, or `<download id>`:`<price id>` for a specific variable pricing option.

`[edd_user_has_purchased ids="20,34,25:1"] Content Here [/edd_user_has_purchased]`

**[Software Licensing Support](https://easydigitaldownloads.com/pricing#professional-pass):**

Show content only if a user has active licenses

`[edd_has_active_licenses] Content Here [/edd_has_active_licenses]`

Show content only if user has expired licenses

`[edd_has_expired_licenses]Content Here[/edd_has_expired_licenses]`

Show content only if user has all expired licenses

`[edd_has_all_expired_licenses]Content Here[/edd_has_all_expired_licenses]`

== Changelog ==

= 1.4.2 - December 13, 2021 =
* New: Added [edd_items_not_in_cart] shortcode, which will only display the content if the cart does not contain some or all of the specified items.
* New: Added [edd_has_all_expired_licenses] shortcode, which will only display content if all of the user's licenses are expired.
* Dev: Requires PHP 5.3.
* Dev: Refactor how plugin is loaded.

= 1.4.1 - September 2, 2021 =
* Fix: Compatibility with Software Licensing 3.8.
* Fix: Use 'maybe_do_shortcode' to allow for nested shortcodes.
* Tweak: Improve readme.txt formatting to make examples more readable.

= 1.4 - February 24, 2017 =
* NEW: Add support for Software Licensing.
* NEW: Add support for specific items in the cart.
* TWEAK: Remove references to extract.

= 1.3 =
* NEW: edd_is_user_logged_out shortcode

= 1.2 =
* NEW: edd_user_has_purchased shortcode

= 1.1 =
* NEW: Added edd_is_user_logged_in shortcode

= 1.0 =
* NEW: Initial Release
