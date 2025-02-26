=== Beans Simple Shortcodes ===
Contributors: Deftly
Tags: Beans, Beans Framework, Beans HTML API, Shortcodes
Donate link: https://www.paypal.me/jeffcleverley
Requires at least: 4.6
Tested up to: 4.9.6
Requires PHP: 5.6
Stable tag: trunk
License: GPL v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

A useful companion tool for theme development with the Beans Framework.

Provides a library of Shortcodes that can more easily display information about your website, theme, post authors and more.

== Description ==
A Plugin tool to aid theme development with the innovative, flexible, and incredibly powerful [Beans](https://www.getbeans.io/) Framework.

The Beans Simple Shortcodes plugin provides a library of Shortcodes to allow site owners to easily display information about their website, author and more.

Shortcodes include:

[beans_date_posted]
[beans_date_updated]
[beans_time_posted]
[beans_time_updated]
[beans_post_author]
[beans_post_author_link]
[beans_post_comments]
[beans_post_tags]
[beans_post_categories]
[beans_post_terms]
[beans_post_edit]
[beans_copyright]
[beans_childtheme_link]
[beans_theme_link]
[beans_wordpress_link]
[beans_site_title]
[beans_home_link]
[beans_loginout]

All Shortcodes:

* Output HTML content using the Beans HTML API and include Beans Dynamic Hooks
* Include default attribute filters
* Include output filters
* Can be individually enabled or disabled to maintain leanness

This plugin is under active development and will be updated to include Gutenblocks format soon. Please feel free to contribute at the [Beans Simple Shortcode Github page](https://github.com/JeffCleverley/BeansSimpleShortcodes).

The Beans logo and Beans name are being used with kind permission from the amazing people behind the Beans Framework.

== Installation ==
1. Upload the plugin files to the `/wp-content/plugins/plugin-name` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress

== Frequently Asked Questions ==
= I installed the plugin, now what? =

Visit the Beans Simple Shortcodes settings page and inspect the available attributes and instructions.

= Does this plugin require the Beans Framework to work =

Yes

If a Beans Framework Child theme is not the active theme, the plugin will not activate.

Even if it did activate it would be useless.

= What happens if I deactivate the Beans Framework =

If you swap themes to a non-Beans framework theme while the plugin is active then it will just harmlessly disable itself.




== Screenshots ==
1. Shortcode settings - displays attributes and enable/disable checkbox
2. Use shortcakes anywhere in post or page content areas and widgets (if shortcakes are enabled)
3. Site data is displayed using the Beans HTML API with dynamic hooks.