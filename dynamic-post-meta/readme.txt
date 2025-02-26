=== Dynamic Post Meta ===
Contributors: bhartlenn
Donate Link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=AF6NPSXMP5AEG
Tags: shortcode, post meta, title, excerpt, date, modified, author, permalink
Requires at least: 4.7
Tested up to: 4.7.3
Stable tag: 1.0
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html

The Dynamic Post Meta Plugin adds 6 shortcodes that allow you to add dynamic post meta data to your post content.

== Description ==

The Dynamic Post Meta Plugin adds 6 shortcodes that allow you to add dynamic post meta information to your post content. Please read the Dynamic Post Meta Plugins readme.txt file for full instructions on using the shortcodes. All shortcodes will default to showing the currently viewed posts meta unless the “id” parameter is set to show a different posts meta information. 

You can use the text editor in WordPress to add html tags around your shortcodes for formatting. For example you could add this in your posts text editor:
&lt;h3&gt;[post-title]&lt;/h3&gt;

Here is a description of the 6 new shortcodes you can use after activating this plugin:

* [post-permalink id=123] >> This shortcode adds a clickable permalink to a post.
* [post-date id=123] >> This shortcode adds a posts published date to your post content.
* [post-modified id=123] >> This shortcode displays the last time a post was edited.
* [post-author id=123] >> This shortcode displays a post author’s nickname(may need to fill this field in).
* [post-title id=123] >> This shortcode adds a post title to your post content.
* [post-excerpt id=123] >> This shortcode adds a post excerpt into your post content.

== Installation ==

1. Upload the ‘dynamic_post_meta’ folder to the `/wp-content/plugins/` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in your WordPress Dashboard
3. Start putting Dynamic Post Meta shortcodes into your posts!

== Frequently Asked Questions ==

= Can I use these shortcodes to show post meta from a different post? =

All shortcodes have an “id” parameter you can use to set which posts information is displayed. For example if you inserted the following short code in your post content:

	[post-title id=375]

Then the short code would dislay the title of the post with ID 375.

== Screenshots ==

1. Descriptions of the Six Shortcodes you gain access to with this plugin.

== Changelog ==

= 1.1 =
* Release Date - March 21, 2017 *
* Updated readme.txt for clarity, and added first most Frequently Asked Question

= 1.0 =
* Release Date - March 12, 2017 *
* Fixed initial bug list

== Upgrade Notice ==

= 1.1 =
Please upgrade to get an updated and more helpful readme.txt file