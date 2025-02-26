=== Advanced Custom Fields: WPML Language Selector Field ===
Contributors: ivan_paulin
Tags: acf, custom field, wpml, language, language select
Requires at least: 4.0
Tested up to: 4.4.1
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html


== Description ==

Custom field addon for Advanced Custom Fields plugin which provides a list of used WPML languages on website.
Possibility to have multiple choices, or just one.

It will not work if WPML plugin is not activated.

Return type is array which holds the language code(it, en, fr, de, etc..).

= Compatibility =

This ACF field type is compatible with:
* ACF 4
* ACF 5

== Installation ==

1. Copy the `acf-wpml-language-selector` folder into your `wp-content/plugins` folder
2. Activate the WPML Language Selector plugin via the plugins admin page
3. Create a new field via ACF and select the WPML Language Selector type
4. Choose type of select (select, radio, or checkbox for multiple selections)

== Changelog ==

= 1.1.0 =
* Initial Release.
= 1.1.1 =
* Change plugin URI in header comment
= 1.2.0 =
* Support for ACF 4 version (free version of ACF)
= 1.2.1 =
* Remove ACF5 function from V4 file
