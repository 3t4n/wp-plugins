=== Elegant Custom Fonts ===
Contributors: louisreingold
Requires at least: 4.1
Tested up to: 6.3
Stable tag: 1.0.1
Tags: font, custom fonts, typography, font face, woff, webfont

A simple solution for self-hosted custom fonts.

== Description ==

This plugin appears at Settings -> Fonts.

For each @font-face, specify .woff URL, weight, style, and a font family name.

Appropriate @font-face rules will be saved to a CSS file and enqueued with wp_enqueue_stylesheet, so that you can use the font with the font-family CSS property.

No nonsense. No API keys. No font conversion. No bloat.

= Integration Instructions for Plugin & Theme Developers =

Use ECF_Plugin::get_font_families() to get a list of font families added with Elegant Custom Fonts. Then add these to any “Font” dropdowns in your plugin or theme.

Example:

if (class_exists('ECF_Plugin')) {
    $font_family_list = ECF_Plugin::get_font_families();
} else {
    $font_family_list = null;
}

/* loop through the $font_family_list array and add each family to your ‘Font’ dropdowns */


== Frequently Asked Questions ==

**Does this plugin work with Joomla?**
No.

== Changelog ==

= 1.0.1 =
* Fix CSRF vulnerability
* Fix PHP warnings
* Update Author URI

= 1.0 =
* Initial release
