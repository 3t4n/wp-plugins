=== atec web-map-service ===
Contributors: DocJoJo
Tags: Incorporated the atecmap.com web map into any page, fully GDPR conform.
Requires at least:4.9
Tested up to: 6.7
Requires PHP: 7.4
Requires CP: 1.7
Tested up to PHP: 8.4.1
Stable tag: 1.6.24
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

The atecmap.com web map can be incorporated into any page. The map comes with a customizable location icon and is fully GDPR conform.

== Description ==

This plugin integrates a NO cookies, NO logging, NO Tracking web map into a designated page.

=== Specifications ===

Size: only 466 KB
CPU footprint (idle): <5 ms.

== 3rd party as a service ==

Once, when activating the plugin, an integrity check is requested from our server (https://atecplugins.com/) – if you give your permission.
Privacy policy: https://atecplugins.com/privacy-policy/

To configure and show the map on your site, this plugin requests a map data from https://atecmap.com/.
Privacy policy: https://atecmap.com/docs_en.php

== Installation ==

1. Upload the plugin folder to the `/wp-content/plugins/` directory or through the `Plugins` menu.
2. Activate the plugin through the `Plugins` menu in WordPress.
3. Click "atec Web Map Service" link in admin menu bar.
4. Set your location.
4. Choose a designated page and embed a shortcode.
5. Type the placeholder `[atec_wms_shortcode]` to include the map.

== Frequently Asked Questions ==

== Screenshots ==

1. Map with marker
2. Settings section

== Notes ==

If you want to place a marker on your map, please visit https://atecmap.com/docs_en.php and get an APIkey.

== Changelog ==

= 1.6.24 [2025.02.15] =
* (function() {

= 1.6.23 [2025.02.10] =
* New atec-fs filesystem

= 1.6.22 [2025.02.03] =
* Updated atec-check.js

= 1.6.21 [2025.02.02] =
* Framework changes (atec-check)

= 1.6.20 [2025.02.01] =
* Added settings sanitizing

= 1.6.19 [2025.01.29] =
* define(\'ATEC_TOOLS_INC\',true); // just for backwards compatibility

= 1.6.18 [2025.01.26] =
* switched require_once -> require

= 1.6.17 [2025.01.17] =
* Check button replaced

= 1.6.16 [2025.01.16] =
* SVN cleanup

= 1.6.15 [2024.12.24] =
* Fixed style sheet

= 1.6.14 [2024.12.21] =
* Favicon

= 1.6.13 [2024.12.21] =
* Clean up

= 1.6.12 [2024.12.21] =
* Clean up

= 1.6.11 [2024.12.17] =
* Minor framework changes

= 1.6.10 [2024.12.12] =
* style sheet changes

= 1.6.9 [2024.12.07] =
* Framework update

= 1.6.8 [2024.11.27] =
* Improved plugin activation routine

= 1.6.7 [2024.11.22] =
* Optimized atec-*-install.php routine

= 1.0.6 [2024.11.15] =
* .htaccess E- issue fixed – if mod_env is not installed 

= 1.0.5 [2024.11.06] =
* removed anim-GIF support

= 1.0.4 [2024.10.29] =
* review, replaced RecursiveIteratorIterator

= 1.0.3 [2024.09.13] =
* BMP & GIF support

= 1.0.2 [2024.09.06] =
* new .htaccess

= 1.0.1 [2024.09.06] =
* ImageMagick support

= 1.0 [2024.08.12] =
* fix

= 1.0 [2024.08.03] =
* Initial Release