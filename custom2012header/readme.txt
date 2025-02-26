=== Custom 2012 Header ===
Contributors: paulwp (code) & leejosepho (plugin)
Donate link:
Tags: 2012 header, broken header in child theme, child theme 2012, custom header
Requires at least: 3.5
Tested in: 3.5
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin defines and implements any .png image named `custom-head1000.png` first placed within your Twenty Twelve Child Theme's `images` folder.

== Description ==
After you have placed any header image named `custom-head1000.png` within an `images` folder inside your Twenty Twelve Child Theme, simply activate this plugin and your new "Custom 2012 Header" will appear.

Note: There is a `custom-head1000.png` image inside an `images` folder inside this plugin's folder, and you can copy that `custom-head1000.png` image into your Twenty Twelve Child Theme's `images` folder to get started here, if you wish.

Here are this plugin's inital settings for the `custom-head1000.png` image it expects to find within `images` inside your Twenty Twelve Child Theme:
`	// Set height and width, with a maximum value for the width.
		'height'                 => 250, // enter your own desired height here
		'width'                  => 1000, // enter your own desired width here
		'max-width'              => 2000,`

Here are some additional settings you can change by editing this plugin's `custom-2012-header.php` file:
// Change color for site name and tagline
// change `custom-head1000.png` to any other file name as long as you do the same in your Child Theme's `images` folder.

Note: Any future update to this plugin will remind you to make a backup of your edited settings prior to accepting the plugin update. Or, if you wish, just change this plugin's name and you will never be prompted for an update.

If you might want to know beforehand, here is how this plugin works:

`// action: first remove a default action from Twenty Twelve
remove_action( 'after_setup_theme', 'twentytwelve_custom_header_setup' );
// action: next define new $args
function nny_custom_header_setup() {` // (and more in that area of code)
// action: now add it the same way Twenty Twelve does
add_action( 'after_setup_theme', 'nny_custom_header_setup' );`

And for that, many thanks to coder `paulwp` in the `wordpress.org` forums:
http://wordpress.org/support/topic/setting-default-header-image-in-child-theme?replies=12

== Changelog ====
= 0.1 =

== Installation ==
Assuming you already have a Twenty Twelve Child Theme:
1. Go to `Plugins > Add New` on your Dashboard and search for this `Custom 2012 Header` plugin;*
2. Click "Install Now" to install `Custom 2012 Header`;
** Alternative: Upload `Custom 2012 Header` to your `/wp-content/plugins/` directory;
3. Do whatever you must to be sure you have `custom-head1000.png` inside `images` within your Twenty Twelve Child Theme folder;
4. Activate `Custom 2012 Header`.

== Frequently Asked Questions ==
None so far.

== Screenshots ==

1. `1-custom-header-no-title.png`
2. `2-custom-header-with-title.png`
3. `3-live-site-with-this-plugin.png`