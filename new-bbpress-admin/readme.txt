=== New bbPress Admin ===
Contributors: rohan_kapoor
Donate link: http://rohan-kapoor.com/donate/
Tags: bbpress, admin. wpmu, wp, buddypress
Requires at least: 2.7
Tested up to: 2.9
Stable tag: 3.1

Provides bbPress admin access from WordPress!

== Description ==

This plugin was created to allow bbPress to be administered from the WordPress and WordPress MU Administration Panels. It is a very basic plugin and uses iframes to provide access to bbPress. It is known to compatible with WordPress and WordPress 2.8.x and bbPress 1.0.x. As it just uses iframes to connect to bbPress, ideally, it will still be compatible with all upcoming versions of bbPress and WordPress. It no longer needs direct editing to set your path to your forums directory!

The login and logout problems have just been fixed as have the problems with header information already being sent. As of now, this is a release with no bugs! Let me know how it works for you!

== Installation ==

1. Upload `bbpress_admin.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. View bbPress Administration Panels in "Tools/bbPress Admin"

== Frequently Asked Questions ==

= What Functions of bbPress Does This Control? =

New bbPress Admin can control all functions of bbPress Administration. It basically loads up bbPress administration within the WordPress adminstration. Think of it like PIP (Picture In Picture) or your television.

== Screenshots ==

1. New bbPress Admin In Action!


== Changelog ==

= 3.1 =
* There was a Problem with the <?php tags that has been resolved. This caused an incompatibility with certain servers. This incompatibility is gone.

= 3.0 =
* Successfully stops the Login/Logout Problem
* Successfully stops the Headers Being Sent Problem
* As Far As I Can Tell, It Is A Bug Free Release
* Works with WP/WPMU 2.8.x and bbPress 1.x

= 2.1 Beta =
* Attempts to solve the Login/Logout Problem
* Attempst to solve the headers Being Sent Problem	

= 2.0 =
* Second Version of bbPress Admin. It has been adapted to have a backend interface to set the forums directory.
* Looks Neater and is much easier to use.
* Works with WP/WPMU 2.8.2 and bbPress 1.0.1

= 1.0 =
* First Version of bbPress Admin. It is very simple and rudimentary at this point.
* Working with WP/WPMU 2.8.1 and bbPress 1.0.1
