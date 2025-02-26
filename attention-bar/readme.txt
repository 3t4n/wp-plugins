=== Attention bar ===
Contributors: pdreissen
Donate link: http://pascal.dreissen.nl
Tags: attention, popup, attention grabber, notifications
Requires at least: 3.0
Tested up to: 3.2.1
Stable tag: 0.7.2.1

In need of a nice attention grabber on top of your wordpress site without disturbing the users browsing your site ? 

== Description ==

If you need to grab the attention of your users to display an important message on your wordpress site, you could go
with an alert message ar a styled div in grabbing the attention of your users. However this is very annoying, and the
users of your site will not appreciate this.

This plugin solves this issue by displaying a nice bar on top of the page, inspired by the Hello Bar (http://www.hellobar.com).
Users won't be disturbed in browsing as the bar is sitting on top of the screen and can be displayed inline, or fixed on top.

This plugin is WPMU / WP Network compatible. You can activate it site wide (network activation) or seperate on every blog.

= Available languages =

Attention bar is multilingual, if you want to contribute a translation for Attention bar, please contact me or put a message on the <a href="http://wordpress.org/tags/attention-bar?forum_id=10">forum</a>

* Nederlands / Nederland (Dutch)
* Español / España (Spanish) contributed by <a href="http://gabrielgil.es/">Garbiel Gil</a>
* Arabic contributed by Qamdad Abdull

== Installation ==

= FTP =
1. Download the zipfile from http://wordpress.org/extend/plugins/attention-bar/
2. Unzip it in your plugins directory (/wp-content/plugins)

= DASHBOARD =
1. Search for: Attention bar in the plugin page
2. Activate the plugin

== Frequently Asked Questions ==

= Does this work with all themes ? =

Yes it should be, if your theme loads jquery, the plugin makes sure that the latests jquery will be loaded. You can disable the jquery loading from the settings page, if you run into any conflicts.

= Is this plugin WPMU / WP Network compatible ? =

All the tests we did worked without any issue. You can activate it sitewide (network activation) or on a per blog basis.

= Is this plugin BuddyPress compatible ? =

It is, however there are some issue's with the BuddyPress bar. We are currently investigating this, and make the appropiate changes.

= Is this plugin compatible with the 3.2 version of WordPress ? =

Yes it is, we are running a WP3.2 version on http://pascal.dreissen.nl you can take a look there, for a working installation!

= What to do when it is not working ? =

Go to the forum (http://wordpress.org/tags/attention-bar?forum_id=10) and ask a question, i am willing to help.
Keep in mind that due to the fact this plugin uses jquery, it is possible that there are plugin conflicts. Where possible i will fix those conflicts. If a plugin conflicts with my plugin, and the conflicting plugin is not actively being developped anymore, please check first if there is a replacement for the conflicting plugin. It is undoable to check every plugin.

== Screenshots ==

1. Admin interface screenshot-1.png
2. Frontend display screenshot-2.png

== Changelog ==

= 0.7.2.2 (bugfix) =
* Update: Dutch translation
* Added: Author displayed in entries page
* Changed: Database structure to include author field

= 0.7.2.1 (bugfix) =
* Fixed: Small bugfix with custom roles!

= 0.7.2.0 (feature release) =
* Added: Adjustable scroll speed
* Added: Access control settings, you can select which user type (role) can add / edit or delete notifications
* Added: Meta box in posts and pages to exclude attention-bar on selected posts or pages. This is only available when header as insert type has been selected.

= 0.7.1.1 (bugfixes) =
* Fixed: Relative URL: in case WordPress is installed in a subdirectory some links were not correctly generated. Fixed this for the admin notification for example (reported and fixed/contributed by: Lee Maguire .. thanks!).

= 0.7.1.0 =
* Added: Richtext content editor, you can now easily link to your existing content (uses core WordPress MCE Editor).
* Fixed: Fixed bug with relative links. This should fix WordPress installations which are not installed in root dir. (Reported by: Lee Maguire).
* Changed: Switched to epoch timing, for more reliably timing. Uses WordPress timezone settings, make sure they are correct and reflect your situation. You need to check your timings and make sure they are correctly displayed and entered.
* Added: Messages turn red automaticly when the schedule has passed or not started, a status message gives information what is happening!
* Changed: Content is not displayed anymore in the entries table, instead if you hover over the name of your message, the message is preview.
* Added: If you leave the start time empty, the message will be displayed always and not accordingly to schedule.
* Updated: Database structure, added field for epochtiming.
* Added: Posibility for adding admin notices, when major changes have been made to development which need user attention
* Added setting: Possibility to change the editor when creating new or changing notifications. Default is a normal text area
* Compatability: Changed minor fixed for Compatability for WordPress 3.2 (editor changed)
* Added: Arabic translation (contributed by Qamdad Abdull)
* UI Cleaning
* Code Cleaning

= 0.7.0.2 (bugfixes) =
* Typo: Colapsed -> Collapsed

= 0.7.0.1 (bugfixes) =
* Changed: Default insert type to Header. This does not interfere with people who chose Widget.
* Changed: Menu items reorder
* Changed: Minor UI changes to get a better look & feel with the initial result.
* Changed: jQuery access. Should now be more compatible with older jQuery implementations, also compatible with the included core WordPress jQuery library
* Added setting: Possible to disable included the jQuery loading of the Plugin.

= 0.7.0.0 (feature release) =
* Changed version numbering
* Added: notification types.
	* Add setting: icons before the announcement text
	* Add setting: Adjust size of the announcement text
	* Add setting: Adjust backgroundcolor / Fontcolor per notification type
* Add setting: Bar announcement text size, will be default if no notification type is selected in the message
* Updated: Dutch translation
* Updated: Spanish translation
* Updated database
* Removed: jquery-easing library
* Fixed install: Adding of example notifications. If you upgrade there will be an example notification added to your existing notifications, please read Upgrade notice!
* Code cleanup

= 0.6.3 =
* Spanish translation added, contributed by <a href="http://gabrielgil.es">Gabriel Gil</a>.
* Added setting: New message new Cookie. With this setting enabled, the bar will always expand when a new notification is enabled / scheduled, deleted or changed.
* Added setting: Cookie expire time
* Added setting: Debug option

= 0.6.2 =
* Added setting: Possibility for selecting how the attention bar will be insert into the page, via widget or direct insert in header. Inserting in header will also mean that the attention bar will be vissible on all pages / posts, the theme needs to be using wp_head() for this to work. With the widget you can control on what page or post you want to insert the attention bar, if using a 3th party plugin like Widget Logic
* Fixed several time-zone related issues. Please be aware that the server time is used for enabling / disabling the messages, your local computer time can differ for a few minutes. Time zone used is the WordPress time zone setting in: Settings -> General
* Displaying the date times to reflect the WordPress setting (Settings -> General)
* Updated dutch language, to include new options.

= 0.6.1 =
* Added setting: Bar text (announcement) configurable
* Added support for W3 Total Cache, when editing / deleting / changing status or inserting a new message, the cache will be flushed.

= 0.6.0 =
* Edited documentation for WPMU compatibility and WordPress 3.2.
* Fixed begin / end timing of messages, should work now!
* It is now possible to add HTML to the content field, for ex. links can be added now. Be carefull this can break your design, use with care.
* Cleanup of code
* Cleanup of unused images

= 0.5.4 =
* Bumped version because of missing jquery.easing library

= 0.5.3 =
* Fixed depedencies of the several used jquery libraries, to manage better dependency loading
* Added jquery.easing as several installation are missing this.

= 0.5.2 =
* Fixed the unexpected output error when activating plugin (sorry!)

= 0.5.0 =
* Added a settings page, to give you more control about the look & feel of the plugin
* Updated the loading of the several jquery libs, should be non-interfering with other plugins now
* Updated all the multi language tags
* Updated dutch translation

= 0.4.2 =
* Added all the translation tags.
* Added dutch translation

= 0.4.1 =
Fixed translation.

= 0.3.0 =
First release considered to be stable

= 0.2.0 =
Fixed some dependencies, should all work now

= 0.1.1 =
Fixed typo in paths, date selector should be visible now.

= 0.1 =
Initial release

== Upgrade Notice ==

= 0.7.0.0 =
If upgrading to 0.7.0.0 + it is possible that there will be a example notification added to your database. This is because this was broken since the initial release, sorry!. You can remove that notification off course, the example notification is not enabled by default, so this should not interfere with your existing notifications!
