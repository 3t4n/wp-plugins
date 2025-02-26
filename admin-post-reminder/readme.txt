=== Admin Post Reminder ===
Contributors: Shawn Scammahorn / Es Developed
Donate link: http://esdev.net/wordpress-plugins/admin-post-reminder/
Tags: admin, security, Post
Requires at least: 2.8
Tested up to: 2.8.6
Stable tag: 1.0.1

You should never publish posts from your admin account. An alert is displayed, informing the user they're logged in as admin and not to write posts.

== Description ==
If you've changed the default admin username for security reasons, publishing posts from your admin account will reveal your new admin username to unscrupulous folk.

You can [read more about this on our blog](http://esdev.net/wordpress-security-tip-dont-post-from-your-admin-account/).

When the admin is logged in, *Admin Post Reminder* displays an unobtrusive reminder; informing the user they're logged in as the admin.

This lets the admin log out and log back in as an editor or user with lesser permissions before writing or publishing a post.

Normal logged in users will **not** see the alert.

== Installation ==
Installing *Admin Post Reminder* is a piece of cake--just install and activate. There are no settings or code to edit.

Once activated, only logged in admin users will see the alert. Everyone else won't notice anything different.

== Frequently Asked Questions ==

= How does the plugin know if the current logged in user is the admin? =

Admin Post Reminder checks to see if the current user has the ability to manage (add/edit/delete) users. If so, they are considered an admin and the reminder is displayed.

= How does this plugin work with role-manager plugins? =

Some plugins allow for custom user roles. This allows people besides just an admin to manage various parts of a site that are usually not allowed by their WordPress user level.

*Admin Post Reminder* should still work with these types of plugins. If a user has the ability to manage other users information, they are viewed as an admin user and the message is displayed.

= Why doesn't the alert only show on the Write Post page? =

For 2 main reasons:

1. An admin can create a new post from any page in the backend by using the admin bar and choosing 'New Post'. 

1. Some WordPress plugins provide other places where new posts can be added or edited (*Flutter*, for example, has the option of writing posts in a custom write panel).

Instead of trying to guess where a user's going to be writing their posts or what other plugins are installed, *Admin Post Reminder* simply displays an alert on all backend pages.

= Does this plugin work on versions of WordPress prior to 2.8? =

Possibly. But since this plugin is targeted to security-conscious people, it's always best to use the most recent versions of WordPress.

= Does this plugin work on WordPress MU? =

I've heard from others that it does indeed work in WordPress MU (version 2.8.5 and up). Since this plugin is targeted to security-conscious people, it's always best to use the most recent versions of WordPress.


To read more about this plugin and why you might want to use it, visit the author's site:

[Admin Post Reminder](http://esdev.net/wordpress-plugins/admin-post-reminder/)

== Screenshots ==

1. An *Admin Post Reminder* reminder alert.

== Changelog ==

= 1.0.1 =
* Mainly changes to documentation--the supported WordPress versions and addition of WordPress MU 2.8.5+ support.

= 1.0.0 =
* This is the initial version of the plugin.
