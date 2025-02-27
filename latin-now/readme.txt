=== Latin Now! ===
Contributors: ilovecats7
Tags: cyrillic, latin, serbian, transliteration, admin panel, admin
Requires at least: 5.0
Tested up to: 6.1.1
Requires PHP: 7.0
Stable tag: 2.1.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Converts Serbian Cyrillic characters into the Latin alphabet. No configuration required.

== Description ==

Latin Now! is a simple plugin that works as soon as it's activated. It filters through all translatable text found in the WordPress installation and converts Cyrillic characters into the Latin alphabet.

There are no additional settings for this plugin. To go back to Cyrillic, simply deactivate it.

Latin Now! works only if the WordPress language is set to Serbian ("Српски језик").

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/latin-now` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.

== Changelog ==

= 1.0.0 =
* Initial release

= 2.0.0 =
* Expanded filtered text to include all translatable text, including text from themes and plugins

= 2.1.0 =
* Fixed bug where not all cyrillic characters were replaced

== Upgrade Notice ==

= 2.1.0 =
This version fixes a bug where not all cyrillic characters were replaced.

= 2.0.0 =
Warning: This upgrade might affect Cyrillic text on your site's front end. The plugin will now filter all translatable text, including text from themes and plugins.
