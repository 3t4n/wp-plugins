=== Admin Menu Position Expander ===
Contributors: jhorowitz
Donate link: bitcoin:13D2Pdo85S2yfqpNUsnQbwPvUCAHsTg4Xn?label=Admin%20Menu%20Position%20Expander%20Donation%20Address&message=Donation%20to%20Admin%20Menu%20Position%20Expander%20WordPress%20Plugin
Tags: admin menu, admin, menu, menu position, position, developers, developer, register admin menu position
Requires at least: 3.0
Tested up to: 4.4.2
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Add 1,000x the menu positions between admin menu entries, to allow fine-grain control of the position of your additional admin menu items.

== Description ==

Add 1,000x the menu positions between admin menu entries, to allow fine-grain control of the position of your additional admin menu items.

To preserve compatibility with existing admin menu items, including those added by plugins and themes, the expanded positions are only available after the admin_menu_position_expander action is fired.

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/admin-menu-position-expander` directory, or install the plugin through the WordPress plugins screen directly.
1. Activate the plugin through the 'Plugins' screen in WordPress
1. You're Done! Three new actions will now fire once the admin menu positions have been expanded: network_admin_menu_position_expander, user_admin_menu_position_expander, and admin_menu_position_expander.

== Frequently Asked Questions ==

= I installed the plugin and activated it, but nothing changed! What else do I need to do? =

The plugin simply changes the values for menu position, so that that are widely spaced.

Normally, a developer would register their admin menu items (new options pages, etc.) within a hook attached to either the network_admin_menu, user_admin_menu, or admin_menu action.

With this plugin, you may instead register your admin menu items within a hook attached to the network_admin_menu_position_expander, user_admin_menu_position_expander, or admin_menu_position_expander actions respectively.

In order to help your code know where things are in relation to where they would have been, the plugin also passes a `$multiplier` variable to those action hooks, which is the number by which all positions were multiplied (where said multiplication would not have either A: changed the order of the existing menu items to that point, or B: exceeded PHP_INT_MAX).

== Screenshots ==

1. No Screenshots

== Changelog ==

= 1.0.0 =
* Initial Release.

== Upgrade Notice ==

= 1.0.0 =
Initial Release
