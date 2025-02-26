=== atec Database ===
Contributors: DocJoJo
Tags: Optimize WP database tables.
Requires at least:4.9
Tested up to: 6.7
Requires PHP: 7.4
Requires CP: 1.7
Tested up to PHP: 8.4.1
Stable tag: 1.0.28
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Optimize WP database tables.

== Description ==

Manage, clean up and optimize the WP tables.

- List all tables with table info (size, type, engine and number of items).
- Optimize, truncate or drop tables.
- Delete SPAM in comments, trashed pages/posts, revisions and timed out transients.
- List all options, selectively remove options and set autoload value.

=== Specifications ===

Size: only 115 KB
CPU footprint (idle): <5 ms.

== 3rd party as a service ==

Once, when activating the plugin, an integrity check is requested from our server (https://atecplugins.com/) – if you give your permission.
Privacy policy: https://atecplugins.com/privacy-policy/

== Installation ==

1. Upload the plugin folder to the `/wp-content/plugins/` directory or through the `Plugins` menu.
2. Activate the plugin through the `Plugins` menu in WordPress.
3. Click "atec Database" link in admin menu bar.

== Frequently Asked Questions ==

== Screenshots ==

1. Dashboard

== Notes ==

== Changelog ==

= 1.0.28 [2025.02.15] =
* (function() {

= 1.0.27 [2025.02.10] =
* New atec-fs filesystem

= 1.0.26 [2025.02.03] =
* Updated atec-check.js

= 1.0.25 [2025.02.02] =
* Framework changes (atec-check)

= 1.0.24 [2025.01.29] =
* define(\'ATEC_TOOLS_INC\',true); // just for backwards compatibility

= 1.0.23 [2025.01.26] =
* switched require_once -> require

= 1.0.22 [2025.01.17] =
* Check button replaced

= 1.0.21 [2025.01.16] =
* SVN cleanup

= 1.0.20 [2025.01.08] =
* Added \"delete\" for table row

= 1.0.19 [2024.12.24] =
* Fixed style sheet

= 1.0.18 [2024.12.21] =
* Fixed: atec-wpdb-del-timedout.php not found

= 1.0.17 [2024.12.21] =
* Clean up

= 1.0.16 [2024.12.21] =
* Clean up

= 1.0.15 [2024.12.21] =
* New styles, cleaned up .svg

= 1.0.14 [2024.12.17] =
* Fixed sanitize_text_field($id)

= 1.0.13 [2024.12.07] =
* Framework update

= 1.0.12 [2024.12.01] =
* New Column CHECK TABLE

= 1.0.11 [2024.11.27] =
* Improved plugin activation routine

= 1.0.10 [2024.11.22] =
* Optimized atec-*-install.php routine

= 1.0.9 [2024.11.24] =
* remove options with plugin selection

= 1.0.6, 1.0.7, 1.0.8 [2024.10.19] =
* review - license

= 1.0.5 [2024.10.16] =
* review - license

= 1.0.4 [2024.10.10] =
* review

= 1.0.3 [2024.09.08] =
* Options
* Tables_in_wordpress fix

= 1.0.2 [2024.08.09] =
* review

= 1.0.1 [2024.08.03] =
* Pagination

= 1.0 [2024.08.02] =
* Initial Release

