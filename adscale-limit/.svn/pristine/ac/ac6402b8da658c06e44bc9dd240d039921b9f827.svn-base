=== Optimize AdScale Calls For WooCommerce ===
Contributors: eddr,secretchord
Tags: adscale, XHR, performance, woocommerce
Requires at least: 5.9
Requires PHP: 7.0
Tested up to: 6.4.2
Stable Tag: 0.3.1
License: GPLv3 or later License
URI: http://www.gnu.org/licenses/gpl-3.0.html

===

UPDATE: The plugin is no longer needed as Adscale fixed the issue. Please use the official adscale plugin


TL;DR : Reduces the excess of AJAX calls that the official adscale plugins generates.

Adscale official WooCommerce plugin creates an ajax call on every page load, to get cart data. The AJAX call is run every time, no matter if the cart is empty or hasn't changed at all and thus, many multiple unneccesarry AJAX calls are run and server resources are used.

This plugin checks if the woocommerce_cart_hash changed and if not, prevents the XHR from running.

At this point, the plugin has no options, nor does it return the previous cart contents for the XHR, only blocks the new XHR calls.

Please check : https://adscale.com/integrations/woocommerce/ 

== Changelog ==

= 0.1 =
* First release

= 0.2 =
* Support for latest WP/WC version

= 0.3 =
* Update regarding the main adscale plugin