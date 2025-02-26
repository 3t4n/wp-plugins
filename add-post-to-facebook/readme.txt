=== Plugin Name ===
Contributors: Pedro Maia
Tags: facebook
Requires at least: 2.0
Tested up to: 2.9.2
Stable tag: trunk

This plugin adds a footer link to add the current post or page to a Facebook Mini-Feed.

== Description ==
This plugin will add a link or an image below your posts, allowing your visitors to share your posts with their friends, on FaceBook.  While the plugin is activated a link will appear after the content of the post with the text "Share on Facebook" or the Facebook icon or both. Clicking this link will bring the user to the Facebook site.  If the user isn't logged in they will be prompted to do so. Once logged into Facebook the post will be added to the Mini-Feed of the account.

For a demo, visit [Detox Diet](http://www.detoxdietabc.com "Detox Diet"), where you will find it, fully funcional.

This plugin is tested up to 2.9.2 version of WordPress.

== Installation ==
1. Add a directory called 'add-post-to-facebook-plugin' (without the quotes) to your '/wp-content/plugins/' directory.
1. Upload addposttofacebook.php and facebook_share_icon.gif to the '/wp-content/plugins/add-post-to-facebook-plugin/' directory.
1. Activate the plugin through the 'Plugins' menu in WordPress.
1. Go to 'Options->Add to Facebook' in your admin interface to select you options.

== CSS ==
The CSS for this plugin is found in the included facebook.css file.  This file may be edited to change the style of the link.

== Options ==
There are two options on the options page: Link Type and Insertion Type.

Link Type - This option sets if you want your Facebook link to be text, image or both.

Insertion Type - This option sets how you want to insert the link into your posts/pages.  There are two choices: auto or template.

* Auto - When insertion type is set to auto the Facebook link will automatically be inserted right after the post.
* Template - When insertion type is set to template the Facebook link will appear wherever the template tag for the plugin is added to your theme. This option requires a template tag to be added to your theme.

== Template Tag ==
The following template tag must be added to your theme in the location you want the link to appear when insertion type is set to template:

`<?php if(function_exists(addposttofacebook)) : addposttofacebook(); endif; ?>`