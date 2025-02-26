=== Add TinyMCE Blockquote Cite ===
Contributors: cyberian90
Donate link: http://webdesign.bartzik.net/
Tags: tinymce, editor, blockquote, cite, bartzik webdesign, Add TinyMCE Blockquote Cite
Requires at least: 4.6
Tested up to: 6.1.1
Stable tag: 1.0.1
Requires PHP: 5.2.4
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

A plugin that adds cite attribute feature to TinyMCE

== Description ==

This plugin adds a simple function to the TinyMCE editor that allows editing the `cite` attribute of a `blockquote` element.

To call the editing window, just double-click or right-click on the `blockquote` element.


== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/add-tinymce-blockquote-cite` directory, or install the plugin through the WordPress plugins screen directly.
1. Activate the plugin through the 'Plugins' screen in WordPress


== Frequently Asked Questions ==

= How can I display the cite attribute at my theme? =

You can display the value from `cite` attribute by adding the following code to your theme style.css:
` /* css */
blockquote[cite]:after {
    content: "\2014\00a0" attr(cite) "";
    display: block;
}`


== Screenshots ==

1. Screenshot 1
2. Screenshot 2


== Changelog ==

= 1.0.1 =
* minor updates.

= 1.0.0 =
* first stable version.

= 0.1 =
* first version.


== Upgrade Notice ==

= 1.0.0 =
* first stable version.