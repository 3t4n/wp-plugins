=== FancyBox for Multimedia Blocks ===
Contributors: stanislawru
Donate link: https://chart.googleapis.com/chart?chs=512x512&cht=qr&chl=1PXFe9Yc6KhQGJc7WrFNCoJZGeTgUJo8FD
Tags: fancybox, multimedia, block
Requires at least: 4.7
Tested up to: 6.5
Stable tag: 1.4.3
Requires PHP: 7.4
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

The plugin automatically makes standard blocks of the WordPress Block Editor using the latest FancyBox without any additional actions of a web master.

== Description ==

This plugin automatically makes standard blocks of the [WordPress Block Editor](https://wordpress.org/documentation/article/wordpress-block-editor/) (particularly, [images](https://wordpress.org/documentation/article/image-block/) and [galleries](https://wordpress.org/documentation/article/gallery-block/)) using the latest [FancyBox](https://fancyapps.com/fancybox/) without any additional actions of a web master.

== Frequently Asked Questions ==

No such for the moment.

== Screenshots ==

1. The options page in English.
2. An example of the result of the plugin's work.

== Changelog ==

= 1.4.3 =

* The support for single images (wrapped with links to media files) without alignment was fixed again.

= 1.4.2 =

* The “Tested up to” parameter value was increased as the plugin is ready for the coming WordPress version (6.5).
* The support for single images (wrapped with links to media files) without alignment was fixed.

= 1.4.1 =

* The support for single images (wrapped with links to media files) was fixed.

= 1.4 =

* The Russian translation of the first paragraph on the plugin's options page was fixed.
* The order of the supported multimedia blocks on the plugin's options page was changed.

After the 2nd round or the plugin's review by WordPress Plugin Review Team:

* This ReadMe.txt file was completed to become valid according to https://wordpress.org/plugins/developers/readme-validator/.
* The only one function in the main plugin's PHP file (fancybox-multimedia-blocks.php) had no plugin's prefix (fancybox_multimedia_blocks_) in its name so it was fixed.
* The main plugin's PHP file (fancybox-multimedia-blocks.php) was protected from direct access to it.

= 1.3 =

After the 1st round or the plugin's review by WordPress Plugin Review Team:

* The “Tested up to” parameter was added to this ReadMe.txt file with the value of the current WordPress version (6.4).
* The value of the “Stable tag” parameter was fixed (it reflected the WordPress' version instead of the plugin's one).
* Calling the FancyBox files remotely was replaced with local, inside-the-plugin versions (fancybox.css and scripts/fancybox.umd.js).

= 1.2 =

* The list of the supported image formats (bmp|dib|gif|heic|ico|jfif|jpe|jpeg|jpg|png|svg|tif|tiff|webp) was added to the plugin's initialization script to make its work more precise.

= 1.1 =

* Additional CSS conditions (a:not([rel="noreferrer noopener"]) and a[data-fancybox^="wp-block-gallery"]) were added to the plugin's initialization script to make its work more precise.

= 1.0 =

* The initial implementation of the simple idea due to the absense of it in the WordPress' plugins directory.

== Upgrade Notice ==

No such for the moment.
