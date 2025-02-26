=== Advanced Author Exposed ===
Contributors: clsigor, b-lame
Tags: author, info
Requires at least: 2.0
Tested up to: 2.9.2
Stable tag: 1.0

The plugin links a hidden DIV (layer) with information about the author to any item on a page. 

== Description ==

The plugin links a hidden DIV (layer) with information about the author to any item on a page (i.e. the author's name or the author's gravatar image). Once you click the item the hidden div layer will show up, displaying the full name of the author, a bigger version of the gravatar image, the author's e-mail address and a short description (from the author's user-profile-page) and a link to the author's posts-archive. Any other information can be easily added by editing the included php file. It offers a simple and elegant way to show author info.

ADVANCED Author Exposed plugin is an extended version of the original Author Exposed Plugin written by Igor Penjivrag of Color Light Studio (clsigor). For credits and questions regarding the original script please see the link to original's author's page (Other Notes).

Advanced Author Exposed solves two problems I had with the original Plugin:

1) AE can now be used multiple times on the same page and the generated code will still validate.
The original Plugin was meant to be used once per page only. If you used it multiple times within the same page, it would create HTML DIVs that all had the same ID - thus leading to invalid code when testing it with the W3 validator. Advanced AE creates random DIV IDs on the fly, thereby eliminating this problem.

2) Can now be linked to ANY item, image or text
The original Plugin automatically output the post author's name as a link and linked the hidden DIV to it. But what if you wanted to link the hidden DIV to something else? I.e. the authors gravatar-image? 
Advanced AE introduces a PHP variable called $the_link_item - which can basically be anything you want - and attaches the hidden DIV to that specified item.


== Installation ==

Installation is simple and should not take you more than 2 minutes.

1. Upload whole `advanced_author_exposed` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Place `<?php if (function_exists('author_exposed')) {author_exposed($the_link_item);} ?>` inside the loop, where you want the author info to appear.
4. The variable $the_link_item can be the post author's name, his gravatar image or anything else you might want it to be. The plugin will return the specified item with the hidden DIV attached to it.
5. For code-examples regarding the usage of the_link_item see FAQ

== Frequently Asked Questions == 

= How do I generate the post author's first name and attach the AE info DIV to it? =
`<?php if (function_exists('author_exposed')) {author_exposed(get_the_author_meta('first_name'));} ?>`

= How do I generate the author's gravatar image and attach AE info DIV to it? =
`<?php 
$authorimage = get_avatar( get_the_author_email(), '32' );
if (function_exists('author_exposed')) {author_exposed($authorimage);}
?>`

== Screenshots ==

1. This is what the DIV layer popup looks like - looks can be customized easily by editing the included CSS file

== Changelog ==

= 1.1 =
Fixed a bug that prevented AAE from working properly

== Documentation ==

For questions regarding Advanced Author Exposed please refer and reply to this thread:
[Junge Roemer - Advanced Author Exposed](http://www.jungeroemer.net/2010/05/24/wordpress-plugin-advanced-author-exposed/)

The original plugin Author Exposed can be found at [Color Light Studio](http://colorlightstudio.com/2008/03/14/wordpress-plugin-author-exposed/)
