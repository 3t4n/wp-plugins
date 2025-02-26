=== Admin Menu Filter ===
Contributors: alejandromorenomvd
Donate link: https://paypal.me/amorenomvd
Tags: admin, menu
Requires at least: 4.6
Tested up to: 6.7.2
Stable tag: trunk
Requires PHP: 5.2.4
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Admin Menu Filter it's a plugin that put a textbox in the admin interfase and allow filter top menu items and child items. Useful with extensive admin menu interfases .

== Description ==

Sometimes you may have a lot of admin menu items based on your Wordpress installation, with this plugin you only need to type a few letters of the item name that you look and voila! Using a custom jQuery expression that turns 'contains' to case insensitive, the plugin adds a class 'filtered' for non-match elements and performs actions based on 2 simple rules:

1. For parent menu item matching the item keeps visible. 
2. For child menu item matching the item keeps highlighted and their parent visible, keeping the rule #1 for the rest of parent menu items.

Credit for the expression: 
https://stackoverflow.com/questions/187537/is-there-a-case-insensitive-jquery-contains-selector/36392273

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/admin-menu-filter` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress

== Frequently Asked Questions ==

= How about mobile devices? =

Could be added support on future versions. Currently it's thinking for desktop users

== Screenshots ==

1. Textbox filter
2. Match primary items
3. Match child items

== Changelog ==

= 0.2.4 =
* WP 6.7.2 compat

= 0.2.3 =
* WP 6.1 compat

= 0.2.2 =
* Improve script init

= 0.2.1 =
* Remove Doc Ready wrapper

= 0.2 =
* Check compatibility WP 5.6

= 0.1 =
* First release