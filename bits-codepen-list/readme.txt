=== Bits CodePen List ===
Plugin Name: Bits CodePen List
Plugin URI: http://themebits.me/plugins/codepen-list/
Author: themebits
Author URI: http://themebits.me
Donate link: http://themebits.me
Tags: codepen, oembed, widget, shortcode, cache, rss
Requires at least: 4.5
Tested up to: 4.6
Stable tag: 1.0.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

List your pens or posts from CodePen in a painless way.

== Description ==

CodePen is one of the best tools for front-end developers to experiment, test out some new code, compile and reorganize your stuff, and of course to share them as well. This plugin offers a little help to share your pens in WordPress.

= Display type settings =
Use shortcode, widget or insert into the post editor with a TinyMCE button.

= Clean and simple =
No formatting from the plugin side. The list will be a simple unordered list, which get the values from your site CSS. To customize the plugin just reference the the unordered list's `.bits-codepen-list` class in your CSS and style it however you want. No defaults or presets included.

= Pens and posts =
You can list your posts and pens too!

= Cache enabled =
To fetch we use RSS and you can set the cache value easily!

== Installation ==
1. Upload the plugin files to the `/wp-content/plugins/plugin-name` directory, or install the plugin through the WordPress plugins screen directly.
1. Activate the plugin through the 'Plugins' screen in WordPress

== Frequently Asked Questions ==
= Do I need a CodePen API key for this plugin? =
No, there is no need for any API credentials.

= Has this plugin access for my private pens? =
No, this plugin lists your public posts and pens only.

= Does this plugin have any dependency? =
No, it's a depencency-free plugin.

== Screenshots ==
1. A pen's link inserted in the editor and the plugin automatically coverts it to an embed pen.
1. The CodePen list widget editor.
1. The TinyMCE extension for easy list insertion. Fill the fields and ready to go.
1. The activated CodePen list as a widget.
1. The inserted shortcode converted to a list in a post.

== Changelog ==
= 1.0.2 =
* Implementing a common module interface
* Fix some typo

= 1.0.1 =
* Use strings instead Something::class notation to support older PHP versions

= 1.0.0 =
* Fix some typo
* Fix some minor bugs
* Some refactoring

= 0.9 =
* Fix WP Roket cache conflict
* Fix some minor bugs

== Upgrade Notice ==
= 1.0.2 =
Upgrade to fix some minor bugs.

= 1.0.1 =
Upgrade to fix some minor bugs.

= 1.0.0 =
Initial release, please upgrade to fix some minor bugs.

= 0.9 =
WP Rocket conflict can break your site, upgrade immediately.