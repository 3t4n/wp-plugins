=== 404 Notify ===
Contributors:       mikeyott
Tags:               404, notify, link, checker, email, notification, dead, links
Requires at least:  1.5.1
Tested up to:       6.0
Stable tag:         trunk

Get a notification whenever a 404 is encountered on your web site.

== Description ==

It's often too easy to make edits to your web site that result in a broken link. This plugin will automatically email the web site administrator (or a specified email address) whenever a 404 is encountered, along with a link to the page the 404 originated from. With this knowledge in hand, you can search the page for the problem and either remove or fix it.

Notifications are also triggered by missing media, such as images, video, CSS files and more.

== Installation ==

Install, activate, done.

== Screenshots ==

1. screenshot-1.png

== FAQ ==

<strong>Getting persistant notifications?</strong>

You've probably got a missing asset on your page, most likely an image but it could be something else. It's important to remember that a 404 can be instigated not only by a missing page, but also a missing asset such as an image, video, CSS file, JS file or anything else that can usually be directly accessed by a URL.

For example, if you've got a missing image in header.php (which gets called every time a page is loaded), then you'll receive a notification every time a page is loaded until you fix the problem.

<strong>How can you find the path of a missing asset?</strong>

The eastest way is to open the website in <strong>Chrome</strong>, right click somewhere on the page and select <strong>Inspect</strong>, then click the <strong>Console</strong> tab and look for any mention of a 404. Any 404 errors will appear in red as demonstrated in the screenshot above.

Once you can see the missing asset, you can fix the problem and the email notification will stop.

== Support ==

Report any issues at the official <a href="https://wordpress.org/support/plugin/404-notify/">404 Notify Support</a> WordPress page.

== How to use ==

Once activated, notifications are automatially sent to the site administrator, or, you can specify an alternative email address in <strong>Settings</strong> -> <strong>General</strong> and look for the <strong>404 Notify email address</strong> field.

== Uninstall ==

Deactivate the plugin, delete if desired.

== Changelog ==

= 1.2.0 =

* Included visible URL in the email notification.

= 1.1.0 =

* Added custom email address notification field.

= 1.0.0 =

* Initial release.