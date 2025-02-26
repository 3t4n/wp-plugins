=== Disable Post Comments ===
Contributors: sumitsingh, iihglobal
Donate link: https://wplovers.co.uk/
Tags: comments, disable, , specific post, global
Requires at least: 5.0
Tested up to: 6.0.1
Stable tag: trunk

This plugin allows administrators can disable wordpress all post type comments on their site and also can be disabled specific post type.

== Description ==

This plugin allows administrators to globally disable comments on any post type (posts, pages, attachments, etc.) so that these settings cannot be overridden for individual posts. It also removes all comment-related fields from edit and quick-edit screens. On multisite installations, it can be used to disable comments on the entire network.

Additionally, post-comment-related items can be removed from the Dashboard, Widgets, the Admin Menu and the Admin Bar.

**Important note**: Use this plugin if you don't want comments at all on your site (or on certain post types). Don't use it if you want to selectively disable comments on individual posts - WordPress lets you do that anyway. If you don't know how to disable comments on individual posts, there are instructions in [the FAQ](https://wordpress.org/plugins/disable-post-comments/faq/).

If you come across any bugs or have suggestions, please use the plugin support forum. I can't fix it if I don't know it's broken! Please check the [FAQ](https://wordpress.org/plugins/disable-post-comments/faq/) for common issues.

Want to contribute? Here's the [GitHub development repository](https://github.com/sssumitsingh/disable-post-comments).

A [must-use version](https://github.com/sssumitsingh/disable-post-comments) of the plugin is also available.

== Frequently Asked Questions ==

= Nothing happens after I disable comments on all posts - comment forms still appear when I view my posts. =

This is because your theme is not checking the comment status of posts in the correct way.

= How can I remove the text that says "comments are closed" at the bottom of articles where comments are disabled? =

The plugin tries its very best to hide this (and any other comment-related) messages.

If you still see the message, then it means your theme is overriding this behaviour, and you will have to edit its files manually to remove it. Two common approaches are to either delete or comment out the relevant lines in `wp-content/your-theme/comments.php`, or to add a declaration to `wp-content/your-theme/style.css` that hides the message from your visitors. In either case, make you you know what you are doing!

= I only want to disable comments on certain posts, not globally. What do I do? =

Don't install this plugin!

Go to the edit page for the post you want to disable comments on. Scroll down to the "Discussion" box, where you will find the comment options for that post. If you don't see a "Discussion" box, then click on "Screen Options" at the top of your screen, and make sure the "Discussion" checkbox is checked.

You can also bulk-edit the comment status of multiple posts from the [posts screen](https://codex.wordpress.org/Posts_Screen).

= I want to delete comments from my database. What do I do? =

Go to the tools page for the Disable Post Comments plugin and utlize the Delete Comments tool to delete all comments or according to the specified post types from your database.

== Details ==

The plugin provides the option to **completely disable the commenting feature in WordPress**. When this option is selected, the following changes are made:

* All "Comments" links are hidden from the Admin Menu and Admin Bar;
* All comment-related sections ("Recent Comments", "Discussion" etc.) are hidden from the WordPress Dashboard;
* All comment-related widgets are disabled (so your theme cannot use them);
* The "Discussion" settings page is hidden;
* All comment RSS/Atom feeds are disabled (and requests for these will be redirected to the parent post);
* The X-Pingback HTTP header is removed from all pages;
* Outgoing pingbacks are disabled.

**Please delete any existing comments on your site before applying this setting, otherwise (depending on your theme) those comments may still be displayed to visitors. You can use the Delete Comments tool to delete any existing comments on your site.**

== Advanced Configuration ==

Some of the plugin's behaviour can be modified by site administrators and plugin/theme developers through code:

* Define `DISABLE_COMMENTS_REMOVE_COMMENTS_TEMPLATE` and set it to `false` to prevent the plugin from replacing the theme's comment template with an empty one.

* Define `DISABLE_POST_COMMENTS_ALLOW_DISCUSSION_SETTINGS` and set it to `true` to prevent the plugin from hiding the Discussion settings page.

These definitions can be made either in your main `wp-config.php` or in your theme's `functions.php` file.

== Changelog ==
= 1.0.3 =
* Fix some issue with latest wordpress version
* Tested with latest version
= 1.0.2 =
* Fix some issue with Major version Wordpress 6.0
* Tested with latest version
= 1.0.1 =
* Fix some security issue
* Tested with latest version
= 1.0.0 =

== Installation ==

1. Upload the plugin folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. The plugin settings can be accessed via the 'Settings' menu in the administration area (either your site administration for single-site installs, or your network administration for network installs).
