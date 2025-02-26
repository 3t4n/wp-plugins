=== Marketplace Items ===
Contributors: butterflymedia, getbutterfly
Tags: envato, envato api, themeforest, codecanyon, graphicriver, recent, items
License: GPLv3
Requires at least: 3.3
Tested up to: 3.6-beta2
Stable tag: 1.3

== Description ==

Display your Envato marketplace portfolio inside a post or a page.

Shortcode parameters:

* **type** ('compact' or 'loose') - show or hide name and price (use the 'loose' type on a full-width page)
* **username** ('your-username')
* **market** ('codecanyon' or 'themeforest' or 'graphicriver')
* **price** (true) - show or hide price
* **ref** ('your-referral-username')
* **currency** ('$')
* **count** (0) - set to 0 to display all

`[envato type="compact" username="butterflymedia" market="codecanyon" price="false" ref="butterflymedia" currency="$" count=0]`

Style `.envato-container` class to override the current loose style.

== Installation ==

1. Upload the plugin folder to your `/wp-content/plugins/` directory
2. Activate the plugin via the Plugins menu in WordPress
3. Create and publish a new page and add the shortcode

Note: Your server must support the php `file_get_contents()` function.

== Changelog ==

= 1.3 =
* GENERAL: Renamed the plugin in order to comply with Envato's terms of service
* GENERAL: Fixed the readme.txt file

= 1.2 =
* UI: Moved CSS style to separate file
* UI: Added a 5px padding to thumbnails
* FRAMEWORK: Added path variables

= 1.1 =
* First public release
