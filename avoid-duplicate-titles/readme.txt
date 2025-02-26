=== Avoid Duplicate Titles ===
Tags: duplicate title,title duplicate checker, avoid title duplication,duplicate
Requires at least: 5.0.1
Tested up to: 6.6
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Requires PHP: 6.0.0
Contributors: Venutius
Donate Link: https://paypal.me/GeorgeChaplin
Plugin URI: www.wordpress.org/plugins/avoid-duplicate-titles/
Stable tag: 2.2.0

This plugin detects duplicate post titles and displays a warning when it detects an exact match, at the same time it disables the Publish button to prevent publication.

It supports custom post types and has the ability to enforce uniqueness accross all post types or just within each individual post type. 
 
== Description ==
 
This plugin allows duplicate titles to be detected and avoided across all public post types. The post types that it works on can be selected in the settings page.

This means that you can enforce unique titles across all types of posts, not just the standard blog pages. 

Posts with duplicate titles to existing published posts can be prevented from publication and instead saved as draft.

There is a settings page which allows these behaviors to be changed:

1. Uniqueness can be detected across all post types or only for the type of post being created.
2. The post types to be checked can be selected.
3. You can choose to warn about title duplication whilst still allowing publication.

Avoid Duplicate Titles now also supports BP Post Status custom BuddyPress post statuses, so it will check all available post statuses.

Note: With WordPress 5.0 and higher Avoid Duplicate titles only works with the Classic Editor, it does not support the Block Editor currently.

== Installation ==

Option 1.

1. From the Admin>>Plugins>>Add New page, search for Avoid Duplicate Titles.
2. When you have located the plugin, click on "Install" and then "Activate".
3. Visit the Admin>>Settings>>Avoid Duplicate Titles page to review and choose your preferred setup.

With the zip file:

Option 2

1. Upzip the plugin into it's directory/file structure
2. Upload Avoid Duplicate Titles structure to the /wp-content/plugins/ directory.
3. Activate the plugin through the Admin>>Plugins menu.
4. Go to Admin>>Settingss>>Avoid Duplicate Titles to configure the plugin.

Option 3

1. Go to Admin>>Plugins>>Add New>>Upload page.
2. Select the zip file and choose upload.
3. Activate the plugin.
4. Go to Admin>>Settings>>Avoid Duplicate Titles to configure the plugin.
 
== Frequently Asked Questions ==
Q. Does this plugin support Custom Post-Types?

A. Yes, this plugin supports custom post types that are edited in the back end. The custom post must use the WP $title for it's title as it is this that is checked.

Q. Can I check for duplicate titles across all post types?

A. Yes, this is what Avoid Duplicate Titles was designed to do, it will check for duplication of post titles across also public post types loaded on your WP install. You can select the types of posts to be checked.

Q. Can I check for duplicates within individual post types?

A. Yes, there is an option to check only the same post types for duplicates.

Q. Can I choose to allow posts with duplicate titles to be published? 

A. Yes, you can set it to warning only mode, where a warning is given prior to post publication but publication will not be prevented.

Q. Where are the settings?

A. The settings are in the Admin>>Settings menu in the back-end, it can only be accessed by Administrators.

Q. What about testing for duplicate categories?

A. I'm considering this, however categories work differently to posts and that may require a separate plugin.

Q. Can you disable checking for Custom Post-Types?

A. Yes, you can chose exactly which types of posts that will be checked.

Q. Does it work with Gutenberg?

A. Not at present, might do soon!
 
== Translators ==
 
== Screenshots ==
 
1. screenshot-1.jpg showing Settings page
2. Screenshot-2.png Showing duplicate title warning

== Upgrade Notice == 

** Version 2.0.0 Deprecates on Publish duplicate title enforcement. 

== Changelog ==

= 2.1.0 =

*

* New: Added support for BP Post Status BuddyPress post statuses.

== 2.2.0 ==

* Upgrade: Updated security with added santization and nonce checks.

== 2.0.0 ==

* Upgrade: Completely changed the way this plugin works, instead of changing the post status to draft after it is published the plugin now prevents a post with a duplicate title from being published in the first place. The option to publish duplicates with a warning is retained. *Translators string length limitations on warning messages. 

== 1.1.2 ==

* 28/05/2018

* Fix: revised logic

== 1.1.1 == 08/02/2018

* Fix for Settings Link.

= 1.1.0 = 07/02/2018

* Added post type selection in the Settings menu.
* Revised plugin structure to make it more understandable.
* Moved Settings page into Settings menu in Dashboard.

= 1.0.5 = 20/01/2018

* Updated FAQ's in Readme.txt
* Added fix for Gutenberg Installations
* Added Review link

= 1.0.4 =

* Revised option names for uniqueness.

= 1.0.3 =

* Updated code with correct escape sequences and sanitization

= 1.0.2 =

* Added settings saved confirmation.

= 1.0.1 =

* Added uninstall.php.

= 1.0.0 =

* Initial release.
