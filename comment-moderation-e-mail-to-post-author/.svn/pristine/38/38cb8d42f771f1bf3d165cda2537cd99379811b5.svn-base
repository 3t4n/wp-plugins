=== Comment Moderation/Notification Recipients ===
Contributors: RavanH
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=ravanhagen%40gmail%2ecom&item_name=Comment%20Moderation%20Notification%20Recipients&item_number=0%2e7&no_shipping=0&tax=0&bn=PP%2dDonationsBF&charset=UTF%2d8&lc=us
Tags: comments, moderation, comment, comment notification, comment moderation, comment moderation notification, comment moderation recipients, comment_moderation_recipients, comment notification recipients, comment_notification_recipients, comment moderation email, comment moderation e-mail, moderation queue
Requires at least: 3.7
Tested up to: 6.4
Stable tag: 0.6

Control who will receive new comment and moderation notifications. Light weight, simple, safe and effective.

== Description ==

Normally, when a comment gets submitted to a particular post, the author of that post gets a notification about it. And when a comment is held for moderation (which depends on your sites comment settings) then the moderation notification is sent to *both* the post **Author** (if he/she has moderation rights) *and* the site's **Administration E-mail Address** as configured under **Settings > General** at the same time.

On **colaboration sites** or sites managed by a webmaster or designer where the client is the post author, the site admin, with enough on his/her mind already, is bothered with each and every new comment in the moderation queue.

This plugin can change that.

Just install and activate it: All post comment moderation notifications will be sent **only** to each respective **Post Author**. If, by any chance, the post author has no moderation rights (Contributor level) *or* there is no valid author e-mail set then the default site e-mail address will still get the notification.

WordPress Multisite compatible, per-site or network activated or as a must-use plugin.

**Plugin Settings**

Options will be added in the future but for now, you can only change the plugin behavior via constants in your wp-config.php file.

Add them on a new line in your wp-config.php file, just above the line that sais: `/* That's all, stop editing! Happy publishing. */`.

These constants are currently available:

| Constant | Description |
| -------- | ----------- |
| COMMENT_NOTIFICATION_RECIPIENTS | Controls the New Comment recipients. Default: "wp_default" corresponds with "post_author_only" WordPress default. |
| COMMENT_MODERATION_RECIPIENTS | Controls the Comment is waiting for Moderation message recipients. Default: "post_author_only". |

These options are currently available:

| Option | Description |
| ------ | ----------- |
| wp_default | The WordPress default behavior. Plugin does nothing. |
| post_author_only | Send notifications only to the Post Author e-mail address. |
| site_admin_only | Send notifications only to the Administration Email Address as configured on Settings > General. |

**Examples:**

Use `define( 'COMMENT_NOTIFICATION_RECIPIENTS', 'site_admin_only' );` to make new comment notifications go to the site admin e-mail address, and no longer the post author.

Use `define( 'COMMENT_MODERATION_RECIPIENTS', 'post_author_only' );` to make comment moderation notifications only go to the authors e-mail address, and no longer the site administrator address (unless the post author does not have moderation rights).

== Installation ==

Hit [install now](http://coveredwebservices.com/wp-plugin-install/?plugin=comment-moderation-e-mail-to-post-author), provide your site home address and continue to log in on your own site. Easy, by Covered Web Service :)

== Frequently Asked Questions ==

= I see no settings page =
There is no settings page. See the plugin Description for instructions.

= Nothing looks different. Is it working at all? =
To test if it is working:

1. Check your Settings > Discussion settings and make sure that (I) at **E-mail me whenever** at least *A comment is held for moderation* and (II) at **Before a comment appears** at least *Comment author must have a previously approved comment* are checked.
1. Open an incognito browser window, go to your site as an anonymous visitor and post a comment to a post from anyone with at least author level (contributor has no moderation rights!) other than the main site administrator.
1. Switch back to your normal browser window, verify that comment went into the moderation queue, verify that you as site administrator did not receive any moderation e-mail and then ask the post author if he/she did receive the moderation notification correctly :)

= I get no messages =
This plugin does not send any messages. It only changes the addressee of the comment moderation queue notifications that are sent by WordPress.

If nobody get any of these notifications, disable the plugin and test again. You will probably still not get any notifications and the problem lies with WordPress not being able to send emails via PHP. There are other plugins or tutorials about server configuration that can help you with that...

= Does this plugin work on WPMU / Multisite mode? =
Yep, it was made for Multisite :)

You can install it in /plugins/ and activate it *site-by-site* or *network wide*. Or you can upload it to /mu-plugins/ for automatic (must-use) inclusion.

== Upgrade Notice ==

= 0.7 =
New options, see https://wordpress.org/plugins/comment-moderation-e-mail-to-post-author/.

== Changelog ==

= 0.7 =
20240119
* NEW: set Site Amdin only recipient with constant in wp-config.php
* NEW: set New Comment Notification recipients with constant in wp-config.php
* WordPress Coding Standards

= 0.6 =
20210511
* FIX: allow for other `comment_moderation_recipients` filters running before this one

= 0.5 =
20170717
* WP 4.8+ compatibility

= 0.4 =
20140904
* New concept: filter comment_moderation_recipients available since WP 3.7

= 0.3 =
20130627
* WP 3.1+ compatibility

= 0.1 =
20101123
* First concept: replace function wp_notify_moderator()
