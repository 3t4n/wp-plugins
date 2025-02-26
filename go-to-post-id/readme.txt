=== Plugin Name ===
Contributors: kravco
Donate link: https://wp.kravjar.sk/?donate=go-to-post-id
Tags: post, ease-of-access
Requires at least: 4.4
Tested up to: 4.6
Stable tag: 0.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Provide input in admin bar to jump to edit post page by post ID. Only users that can "edit_posts" will see it.

== Installation ==

1. Upload entire `go-to-post-id` directory to the `/wp-content/plugins/` directory, or install the plugin through the "Plugins" screen directly.
1. Activate the plugin through the "Plugins" screen in WordPress

== Frequently Asked Questions ==

= I enter a post ID but all I get is an error. Why? =

Either the post with given ID does not exist or post ID contains some invalid and/or invisible characters. Entered post ID is used as is, without any filtering. 

== Changelog ==

= 0.2 =
* Display input in admin bar. Input is displayed only to users that can "edit_posts"

