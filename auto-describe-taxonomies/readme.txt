=== Auto Describe Taxonomies ===
Contributors: itscoolreally
Donate link: http://www.cafepress.com/SupportHypershock
Tags: tag, auto, describe, taxonomy, category, description, automatic, administration, freebase, metaweb, entities, words
Requires at least: 3.0.1
Tested up to: 3.4
Stable tag: 1.1.4

Using freebase, this plugin will auto describe tags and categories. 

== Description ==

This plugin will auto-describe your post tags or your wordpress categories using freebase.

All you have to do after enabling it is to watch it work!

If you dont see any tag description or category description in your frontend tag/category pages, make sure your wordpress theme is displaying them!

= Note =
*With no word from Dan Fratean since February, I have decided to clone his script and fix it. Having added some sanity checks and a missing array expansion, the plugin now works. Near as I can tell, he was working on an upgrade when something "happened" and he suddenly dropped development. I'd hate to imagine what it was. So this is version 1.0.4.
*If you have Dan Frateans Auto Describe Tags, I suggest uninstalling it prior to installing Auto Describe Taxonomies as it will do the same thing and there is no sense in having two describing engines running on your installation.
== Installation ==
1. Download the plugin zip archive.
1. Extract it in your 'wp-content/plugins' folder or upload via admin panel.
1. Browse to your plugins section and activate the plugin.

- OR -

Install it via the plugin manager.
== Screenshots ==
1. Setting Admin Panel

== Changelog ==
= 1.1.4 =
Updated donate link

= 1.1.3 =
[Brian Brown, Ph.D.](http://wordpress.org/support/profile/brianbrown "Very Helpful Geek") found a small syntax issue that caused problems on servers not running the latest php. I have applied his patch.

= 1.1.2 =
*made the name space for variables more unique, suspected possible collisions with Dan Fratean's original version.
*added a check for a null array when running one of the new features I added in version 1.1.1

= 1.1.1 =
Updated the readme file to properly reflect the name of the plugin and to properly display its various sections according to wordpress standards.

= 1.1 =
Added links to all of the words under categories and tags to make it easier to jump to those pages and see what was pulled in from freebase.

= 1.0.4 =
Fixed error issues with Dan Fratean's 1.0.3 version of the script. Forcibly taking up the torch on what appears to be an abandoned project.

== Upgrade Notice ==
= 1.1.3 =
This version has syntax issues with php correct such than more archaic versions of php will not complain about unescaped strings.

= 1.1.2 =
Upgrade to this version if version 1.1.1 caused an issue for you on install.

= 1.1.1 =
You don't need this. I only made cosmetic changes to the readme and some comments in the source file for the plugin.

= 1.1 =
Update now to get an extra feature in your settings panel that allows you to quickly jump to the described pages for your taxonomies. That's the only change for now.

== Frequently Asked Questions ==
= Why did you do this? =
Dan Fratean was working on an upgrade that broke and he dropped off the face of the Earth. After much attempt to get an answer I decided to pick up the torch and continue from where he left off.
== TODO ==
*automatic language conversions of described taxonomies Status: researching ...
