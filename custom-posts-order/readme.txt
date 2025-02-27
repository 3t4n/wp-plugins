=== Custom Posts Order  ===
Contributors: hiren1612,hikebranding 
Donate link: https://hikebranding.com
Tags: order, reorder, ordering, orderby, manage, display,  custom,  listing, list, drag, drop, easy, simple, widget, page, post, sortable
Requires at least: 3.0.1
Tested up to: 5.6
Stable tag: 4.5
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A plugin which allows you to order the posts with simple Drag and Drop Sortable capability.

== Description ==
Custom Posts Order plugin will order posts with simple Drag and Drop Sortable capability. Place a shortcode in page, post, text widget or template files to display in front-end. It's that simple. 

1. Quick and easy drag and drop for rearranging of posts.
2. Set the number of posts to display in front-end.
3. User can add different list of sections of particular posts.

= Usage =

Place this shortcode in page, post or text widget where you'd like to display posts.

`
[posts_order posts=2 section=porder_name]
`
= Parameters =

Custom Posts Order plugin supports the "posts" parameter where you can pass the number of posts you want to display in frontend and "section" parameter where you can pass the name of the section to be displayed in frontend. For example if you want to display 3 posts from Section1 at a time then place the following code:

`
[posts_order posts=3 section=Section1]
`
By default it displays 5 posts.


= Templates =

Place this shortcode in any template parts of your theme.

`
<?php echo do_shortcode('[posts_order posts=3 section="Section1"]'); ?>
`

== Installation ==
= Installation =
1. Upload "custom_posts_order" to the "/wp-content/plugins/" directory.
2. Activate the plugin through the "Plugins" menu in WordPress.

= How to Use =
1. Place shortcode [posts_order posts=3 section=porder_name] in wordpress page, post or text widget, where in the "posts" parameter you can pass the number of posts and name of the section in "section" parameter you want to display in frontend. 5 posts will be displayed by default .
2. Place the code `<?php echo do_shortcode('[posts_order posts=3 section=porder_name]'); ?>` in template files, where in the "posts" parameter you pass the number of posts and name of the section in "section" parameter you want to display in frontend. 5 posts will be displayed by default .

== Frequently Asked Questions ==

= Having problems, questions, bugs & suggestions =
Contact us at http://www.satvikinfotech.com/


== Screenshots ==
1. After activating the plugin it will be hooked in Settings Menu.
2. Section Listing. Here you can Add/Edit and Delete the sections.
3. Posts Listing. Here you can change the post order by simple drag and drop functionality.
4. Frontend display.

== Changelog ==
= v1.0 =
* Initial release version.

= v4.0 =
* Tested up to latest version.

= v4.1 =
* fixed some bugs.

= v4.2 =
* fixed some bugs.

= v4.3 =
* fixed some bugs.