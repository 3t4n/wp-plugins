=== Post Read Time ===
Contributors: popeating, popland
Tags: reading time, words per minute, time to read, post read time
Requires at least: 3.0.1
Requires PHP: 5.2.4
Tested up to: 5.6
Stable tag:  1.2.6
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Post Read Time calculate the time it would take to the user to read an article, including watching the images, and display the value in the post

== Description ==

Post Read Time will automatically add a reading time in minutes at the beginning of a post. It is fully configurable both on the way it calculates the reading time,it allow to choose reading words per minutes, the ability to take post images in consideration, and in the look and feel, allowing total control of CSS and text to display. It also offer the ability to be inserted as a code in a theme for a full customization or as shortcode

== Installation ==

1. Upload the 'post-read-time' folder to the '/wp-content/plugins/' directory.
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Tweak preferences in WP Settings.

== Frequently Asked Questions ==

= How do I add reading time to posts? =

After plugin activation the reading time is automatically added just before the content of the posts

= Can i control the look of Reading Time text? =

Yes, you can remove the CSS or use a custom one, also you can change the "Reading time:" sentence and the "Minutes" text. 

= Can i have even more control? =

Of course, just disable "Add time to read to posts" from the plugin settings and use one of the function we provide in your theme:
`<?php get_time_in_minutes($id_of_post); ?>`
will retrive the time in minute of a post, so you can print and format to fit your needs
`<?php time_in_minutes($id_of_post); ?>`
will print out the time in minutes for a post

Shortcode
`['post_read_time]`
It can also be used as a shortcode inside any post or page, and it will return the time to read in minute of the current post or page


= How is time to read evaluate? =

First of all the content of the post is cleand up an 'converted' to text, next the word are counted and divided by the reading word per minutes specified in settings (usually 230/260 words per minutes, depending on language, complexity of text, age of reader and so on).
If you selected "Calculate images", the images in the post are counted and 12 seconds are added for the first image, 11 for the second, subtracting a second until the 10th image, from there all images count 3 seconds, the result is converted to minutes and added to word reading time. Of cours it is rounded to an integer.


== Screenshots ==

1. Available options.
2. Example of Post Read Time default output.

== Changelog ==

= 1.2.6 =
* Updated to latest Wordpress

= 1.2.5 =
* Code cleanup

= 1.2 =
* Added redirect to options page on activation
* Added shortcode support

= 1.1.1 =
* Fixed deactivation bug.

= 1.1.0 =
* Added a setting option to choose to show (or hide) reading time from pages

= 1.0.0 =
* Initial release

== Upgrade Notice ==

= 1.1.0 =
* New option to remove reading time from pages

= 1.0.0 =
* Initial release

