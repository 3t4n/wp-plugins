=== Automatic Comment SPAM Disable ===
Contributors: Valik Rudd
Donate link: http://bit.ly/A3SfBN
Tags: comment, spam
Requires at least: 3.0
Tested up to: 4.5
Stable tag: 4.1
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Detects comment SPAM and deletes it automatically.

== Description ==

Detects a link in the body of the comment and warns the commenter that their comment will be destroyed on sight. At this point a real legitimate commenter can make a decision to not include a link in their comment. An automatic spam bot will not care about that message and will just submit the message anyway. This is when the destruction begins, the plugin filters the message and obliterates it if it detects a link.

== Installation ==

1. Unzip the archive and put the `spam-disable` folder into your plugins folder (/wp-content/plugins/).
2. Activate the plugin through the 'Plugins' menu in WordPress.

= Usage =

After installation, the SPAM guard is on without any interaction from the administrator. To customize the alert message you can go to the SPAM Disable settings page. You can also change the deletion option there.

== Frequently Asked Questions ==

How does this detect SMAP messages?
It is very simple, any comment message that contains a link is deemed SPAM and is removed.

== Screenshots ==

1. Real-time link detection.

== Changelog ==

= 1.2 =
Update and check.
