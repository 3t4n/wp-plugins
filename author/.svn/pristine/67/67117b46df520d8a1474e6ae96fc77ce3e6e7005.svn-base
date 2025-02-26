=== Plugin Name ===
Plugin Name:  Author+ (Lite)
Plugin URI:   http://bloggingdojo.com/wordpress-plugins/authorplus/
Donate link:  http://bloggingdojo.com/wordpress-plugins/author-plus-premium-wordpress-plugin/
Description:  Framework for multi author Websites to allow extended author descriptions for author pages, separate from the author information at the bottom of posts.
Version:      1.9
Author:       Rhys Wynne @ The Blogging Dojo
Author URI:   http://bloggingdojo.com/

Contributors: The Blogging Dojo (@bloggingdojo), Rhys Wynne (@rhyswynne)
Link: 
Tags: multi author, author, bio
Requires at least: 3.0
Tested up to: 3.3.1
Stable tag: 1.9

== Description ==

This plugin adds to Profile Pages an extended "Author Bio". This allows users to add more information to what they'd feel comfortable adding underneath the post. This Author Bio can be displayed on the author page, as opposed to the standard "Author Description".

This plugin is a framework, so requires a bit of PHP skill and experience in template editing to make it work.

* For more features including Google Rich Snippet Integration, check out [**Author+ Premium Wordpress Plugin**](http://bloggingdojo.com/wordpress-plugins/author-plus-premium-wordpress-plugin/)
* Blogging Tutorials and Wordpress Plugins at [The Blogging Dojo](http://bloggingdojo.com/)

== Installation ==

To install, please do the following:-

1. Click Download on the below file and download the file to your local hard drive.
2. Unzip the files and upload them to your wp-plugins folder, making sure they are in a sub folder.
3. Go to Plugins > Installed Plugins and activate "Author+".

== Changelog ==
= 1.9 = 
* General bug fixes.
= 1.5 =
* Changed it so that users can only see the box if they are contributors or above.
= 1.3 =
* Fixed a display bug that cropped up in the latest version of Wordpress.
= 1.2 =
* Bug Fixes and closing a security hole.

= 1.1 =
* Bug Fixes.

= 1.0 =
* First Release.

== Usage Instructions ==

The best place to use this plugin is on the author.php page. I have included a framework for using this plugin.

To begin with, on `author.php`, add this line. This will get the information on the author.

`$author = wp_authorplus_get_user_on_author_page();`

You can then use the standard `echo $author->display_name;` and similar notation as shown in (The Wordpress Codex)[http://codex.wordpress.org/Author_Templates#Using_Author_Information].

To call the extended author descriptions, use `<?php wp_authorplus_extended_author_bio($author->ID); ?>` anywhere outside the Wordpress Loop, but after you declare $author on wp_authorplus_get_user_on_author_page().

Any questions, please [Contact Me](http://bloggingdojo.com/contact-us/)