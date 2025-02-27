=== Disqus Latest Comments Addon ===
Contributors: ovann86
Donate link: https://www.itsupportguides.com/donate/
Tags: comments, disqus, latest, shortcode, recent
Requires at least: 5.1
Tested up to: 5.2
Requires PHP: 5.6
Stable tag: 2.3.1
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Display latest Disqus comments in a page, post or widget

== Description ==

Display your latest Disqus comments in a page, post or widget.

**How do I use it?**

Step 1: register for an API key

To use this plugin you need to register for an API key.

1. Go to the [Disqus applications website](https://disqus.com/api/applications/) and log in
1. Click on the 'registering an application' link
1. Enter the required information - label, description and website
1. Click the 'Register my application' button
1. Click on the 'Details' link at the top of the page
1. Scroll down to the 'API Key' field and copy the value into the setting above

Step 2: install and setup the plugin

1. Install and activate the plugin
1. Browse to the 'Settings' -> 'Disqus Latest Comments' menu
1. Add in your Disqus shortname and API key
1. Include the [disqus-latest] shortcode in the page, post or widget where you want the latest comments displayed

**What options are there?**

* Number of comments listed
* Show or hide avatar images
* Show or hide moderator comments
* Size of avatar images
* Use relative (1 day ago) or absolute (1/1/2000) time
* Comment length to show
* A choice of three pre-configured styles - grey, blue and green or the ability to use your own custom CSS
* Ability to bypass caching (for debugging)
* Ability to bypass page level caching - lets you display new comments when using a caching plugin
* Ability to make linked Disqus usernames open in a new window (target='_blank')

You can see a working example of the plugin at [www.itsupportguides.com](http://www.itsupportguides.com/latest-comments/ "www.itsupportguides.com latest comments").

== Installation ==

Step 1: register for an API key

To use this plugin you need to register for an API key.

1. Go to the [Disqus applications website](http://disqus.com/api/applications/) and log in
1. Click on the 'registering an application' link
1. Enter the required information - label, description and website
1. Click the 'Register my application' button
1. Click on the 'Details' link at the top of the page
1. Scroll down to the 'API Key' field and copy the value into the setting above

Step 2: install and setup the plugin

1. Install and activate the plugin
1. Browse to the 'Settings' -> 'Disqus Latest Comments' menu
1. Add in your Disqus shortname and API key
1. Include the [disqus-latest] shortcode in the page, post or widget where you want the latest comments displayed

== Frequently Asked Questions ==

= How does this work? =

This plugin uses the Disqus API to get the latest comments for the given Disqus account.

= Example custom CSS style =

The below can be used as a template when creating your own custom style. This can be pasted into the 'Custom CSS' option when the custom style is selected.

`/* the entire list */

.dsq-widget-list {
display: block;
}

/* each comment item */

.dsq-widget-item {
position: relative;
}

/* hover over style for each comment item */

.dsq-widget-item:hover {
background: #f6f6f6;
}

/* the avatar image in each comment item */

.dsq-widget-avatar {
display:block;
}

/* the Disqus user name */

.dsq-widget-user {
display:block;
}

/* the comment */

.dsq-widget-comment {
display: block;
}

/* paragraph that contains the link to the post and day */

.dsq-widget-meta {
display:block;
}

/* make the post title bold */

.dsq-widget-meta a:nth-child(1) {
font-weight:800;
}`

== Screenshots ==

1. This screenshot shows the comments that are displayed on the front end with the 'Grey' style applied.
2. This screenshot shows the options for configuring the plugin.

== Changelog ==

= 2.3.1 =
* Maintenance: only enqueue jQuery when 'cache buster' feature is being used
* Maintenance: ensure 'cache buster' feature doesnt fire before jQuery is ready

= 2.3.0 =
* Feature: added 'cache buster' feature to circumvent page caching plugins

= 2.2.1 =
* Fix: resolve undefined index notices
* Fix: adjust how "configuration required" admin prompt appears so it doesnt show when you're on the config page

= 2.2.0 =
* Feature: add 'itsg_dlc_skip_thread' filter to allow custom rules for excluding threads from being displayed.

= 2.1.0 =
* Feature: add shortcode parameters - 'forum_name' and 'api_key'. Allows for different forums to be displayed on the same site.

= 2.0.2 =
* Fix: resolve issue with comments repeating where no author profile picture.

= 2.0.1 =
* Security: fix XSS vulnerability by encoding messages.

= 2.0.0 =
* Feature: Major update to use Disqus application API (previously used JavaScript API)
* Maintenance: Complete rewrite of code base

= 1.9.0 =
* Feature: add minified JavaScript and CSS

= 1.8.0 =
* Feature: add option to hide moderator comments. See settings page (wp-admin -> Comments -> Disqus Latest Comments page – “Hide moderator comments”)

= 1.7.0 =
* Maintenance: update instructions on how to find Disqus shortname on Disqus website
* Maintenance: improve internationalisation (i18n) for translating plugin to other languages
* Maintenance: move JavaScript to external file
* Maintenance: move CSS to external files
* Maintenance: add plugin 'Settings' link in WordPress administration plugins page
* Maintenance: improve input and output sanitisation

= 1.6 =
* Feature: Improve support for HTTPS websites.

= 1.5 =
* Feature: Add 'Custom' option for styles. Allows you to enter your own CSS styles from the configuration screen.
* Maintenance: Moved CSS load in page footer using wp_footer action.
* Maintenance: General formatting of plugin code to make it more readable.

= 1.4.1 =
* Fix: Resolve issue introduced in version 1.4.1.

= 1.4 =
* Feature: Added ability to make linked Disqus usernames open in a new window (target='_blank'). Enabled from options by ticking 'Open Disqus usernames in new window'.

= 1.3 =
* Feature: Added translation options to translate Disqus time terms (for example 'days ago').

= 1.2 =
* Fix: Resolved issue with using shortcode in widget areas - where comments would appear before the widget title.
* Maintenance: Tidy plugin code.

= 1.1 =
* Feature: Added 'Bypass Cache' option in case website caches Disqus API requests.
* Fix: Resolved issue with Avatar Size and Excerpt Length not working.
* Fix: Changed Avatar Size to use only the three supported Disqus avatar sizes - 35px, 34px and 92px.

= 1.0 =
* First public release.