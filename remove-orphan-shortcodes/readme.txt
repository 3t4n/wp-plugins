=== Remove Orphan Shortcodes ===
Contributors: mekshq
Donate link: https://mekshq.com/
Tags: shortcodes, shortcode, php, content, tag, tags, automatic, editor, simple, text
Requires at least: 3.0
Tested up to: 6.6
Stable tag: 1.2
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl.html

Quickly remove unused (orphan) shortcode tags from your content.

== Description ==

This is a simple plugin which automatically hides inactive (orphan) shortcode tags you have used for previous themes and/or plugins. It uses the_content filter to search for shortcode tags which are not active and simply removes them from your post/page content (note the shortode tags won't be deleted form your content, they will just be removed temporarily on your website frontend). It is a great solution if you want to avoid manual removal of old shortcode tags from your entire content.

Remove Orphan Shortcodes plugin is created by [Meks](https://mekshq.com)

== Installation ==

- Upload remove-orphan-shortcodes.zip to plugins, like any other plugin, or upload unzipped folder remove to wp-content/plugins/
- Activate the plugin through the "Plugins" menu in WordPress

== Frequently Asked Questions ==

- For any questions, error reports and suggestions please visit https://mekshq.com/contact

== Changelog ==

= 1.2 =
* Fixed: PHP notice thrown in specific versions

= 1.1 =
* Optimization improvements
* Fixed an issue with breaking image captions

= 1.0 =
* Initial release
