=== Alert Me! ===
Contributors: crispunk
Tags: alert, bar, warning, info, success, error, note
Requires at least: 4.3
Tested up to: 4.6
Stable tag: 0.4.0
License: GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html

== Description ==

Alert generator plugin. Generates a slick alert bar (info, warning, success, error or note).

Use it by inserting a simple shortcode, or directly into the template files by using:

`<?php echo do_shortcode('[alert type="type"]Type here![/alert]'); ?>`

Alert types:

`[alert type="info"]Info here![/alert]`
`[alert type="success"]Success here![/alert]`
`[alert type="warning"]Warning here![/alert]`
`[alert type="error"]Error here![/alert]`
`[alert type="note"]Note here![/alert]`

== Installation ==

1. Upload the plugin folder to your `/wp-content/plugins/` directory
2. Activate the plugin via the Plugins menu in WordPress
3. Create and publish a new page and add this shortcode: `[alert type="type"]your alert text here[/alert]`

== Changelog ==

= 0.4.0 =
* UPDATE: Adopted plugin, new owner
* UPDATE: Updated tags and URLs
* UPDATE: Updated FontAwesome to 4.6.3
* UPDATE: Updated WordPress compatibility

= 0.3.0 =
* UPDATE: Updated tags and URLs
* UPDATE: Updated FontAwesome to 4.5.0

= 0.2.9 =
* UPDATE: Updated FontAwesome to 4.4.0
* UPDATE: Updated WordPress compatibility

= 0.2.8 =
* UPDATE: Updated plugin URL
* UPDATE: Updated action order

= 0.2.7 =
* Updated FontAwesome to 4.3.0

= 0.2.6 =
* Changed icon size
* Tweaked style

= 0.2.5 =
* Added FontAwesome icons
* Added new alert type (note)
* Added better help text to readme.txt
* Enqueued CSS file (and removed it from the head)
* Changed colours to FlatUI colours
* Removed all images

= 0.2.4 =
* Added plugin icon
* Optimized image size

= 0.2.3 =
* Minified scoped CSS
* Updated WordPress compatibility

= 0.2.2 =
* Added license link
* Added donate link

= 0.2.1 =
* CSS adjustments

= 0.2.0 =
* First public release
