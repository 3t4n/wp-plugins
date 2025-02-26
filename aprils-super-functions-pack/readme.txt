=== April's Super Functions Pack ===
Contributors: springthistle
Tags: shortcodes, template functions
Requires at least: 2.9.1
Tested up to: 3.5
Stable tag: 1.4.8
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A collection of shortcodes that can be used for laying out and formatting text. Also some useful template functions, js, and widgets.

== Description ==

This plugin contains a large number of shortcodes that makes it easy to lay out text on your site in more exciting ways than simply paragraphs, headers, and lists. There are also some template functions and useful javascript that theme developers may find useful.

Shortcodes:

* Columns - 2, 3, or 4
* Boxes with particular color, height, title
* Tabs (js-driven)
* Expand/Hide (js-driven)
* Buttons and icons
* Pull-quotes
* Dropcaps
* ... and more

Other Functions:

* Template function for displaying pages 'in the current section'
* Template function for displaying the image that belongs to a post
* JS to remove 'title' tags from WP-generated menus
* JS to allow pre-selecting a recipient from certain CForms forms
* JS to make suckerfish menus work in IE

Widgets:

* A replacement Text widget that lets you specify a class


== Installation ==

1. Upload the 'aprils-super-functions-pack' folder to the '/wp-content/plugins/' directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Study the documentation so you understand the options
1. Start using the shortcodes

== Upgrade Notice ==

There are no special instructions for upgrading.

== Frequently Asked Questions ==

= The shortcode is working, but looks weird =

If a shortcode isn't working as expected (e.g. tabs), try putting `[noformat][/noformat]` around the shortcode. This will prevent WordPress from putting in unwanted `<br/>` tags.

== Screenshots ==

1. Columns
2. Dynamic Elements
3. Messages
4. Pull-Quotes

== Changelog ==

= 1.4.8 =
* Fixed a XSS vulnerability

= 1.4.7 =
* Tweaked tabs css to remove bullet from slides
* Fixed minor nonfatal javascript error
* Added mysteriously missing [asfp_tabs] shortcode

= 1.4.6 =
* Updated tabs shortcode
* Added [asfp_tabs] shortcode option to resolve conflict with some themes over [tabs] shortcode

= 1.4.5 =
* Added a template function for get_latest_tweet
* Replaced remaining eregs with pregs
* Added do_shortcode to ASFP text widget (text with class)

= 1.4.4 =
* Fixed %%CONTENTNOIMG%% template tag so that table tags aren't stripped out
* Expanded asfp_subpages_nav() so that great-grandparents are included
* Minor tweaks including added donate button at your request

= 1.4.3 =
* Fixed minor bug in readme.php

= 1.4.2 =
* New! Added [asfp_submenu] shortcode

= 1.4.1 =
* Updated compatibility with built-in WordPress-included jQuery

= 1.4 =
* New! Added the option to include Facebook-recognizable meta tags in the site <head>
* Added option to disable tabs and toggle shortcodes
* Re-organized file structure of plugin files

= 1.3.8 =
* Fixed additional problem with the subpages shortcode displaying the incorrect permalink in a second location

= 1.3.7 =
* Fixed problem with the subpages shortcode displaying the incorrect permalink

= 1.3.6 =
* Fixed [tabs] problem introduced in 1.3.3
* Added [noformat] option.

= 1.3.5 =
* Fixed a URL mistake introduced in 1.3.3.

= 1.3.4 =
* Fixed a problem with the subpages shortcode.

= 1.3.3 =
* Removed code that was causing formatting issues with cformsII and other things.
* Moved admin page from Settings to Tools

= 1.3.2 =
* New! Added document type styles

= 1.3.1 =
* New! Added [asfp_photostack] shortcode
* Enhanced! You can now specify a class on lists
* Enhanced! You can now specify a target for all icon links
* Fixed a problem where divs inside of tabs were being hidden
* Corrected instruction error for shortcode [asfp_subpages]

= 1.3 =
* New! The [bigbutton] shortcode now lets you specify a background color
* New! asfp_subpages_nav() function now takes an argument which allows you to make the section title a link
* New! A widget (Text with Class) is now included
* Enhanced! You can now specify a class on all buttons
* Enhanced documentation of [asfp_preselect_recipient] shortcode
* Renamed a method that wasn't unique enough
* Renamed a few classes to make them more unique

= 1.2.1 =
* Fixed instructions for 'email' icon.

= 1.2 =
* Made three Javascript items optional via 'Settings'.

= 1.1.2 =
* Readme cleanup.

= 1.1.1 =
* Typos fixed.

= 1.1 =
* Plugin released into the WordPress Plugins Directory.

= 1.0 =
* Plugin in use on some sites.