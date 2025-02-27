=== Healthy filename ===
Contributors: whodunitagency, leprincenoir
Tags: sanitize, upload, filenames, files, images, media, healthy
Requires at least: 3.5
Tested up to: 5.9
Stable tag: 1.0.0
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Automatically clean the filenames.

== Description ==

The plugin uses the hook "wp_handle_upload_prefilter" and modifies the filename to remove all special characters.

FEATURES
- Remove accents
- Remove special characters
- Change the filename to lowercase

Examples : 
- filename : rick & morty.png > rick-morty.png
- filename : finaL fantasy / (Copié) (Copié).jpg > final-fantasy-copie-copie.jpg



== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/healthy-filenames` directory, or install the plugin through the WordPress plugins screen directly.
1. Activate the plugin through the 'Plugins' screen in WordPress

== Frequently Asked Questions ==

(soon)

== Screenshots ==

1. Example

== Changelog ==

= 1.0.0 =
* 02 October 2017
* Initial release \o/