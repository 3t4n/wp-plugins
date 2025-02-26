=== Plugin Name ===
Contributors: paulgregory
Donate link: http://paulgregory.org.uk/donate
Tags: widget, conditional, login, register
Requires at least: 2.8
Tested up to: 3.8
Stable tag: 0.9.3

Adds text/list widgets - one only shows if user is logged in, and the other only shows if a user is not logged in. A third shows regardless.

== Description ==

Adds three widgets - “Text/List”, “Text/List (If Logged In)” and “Text/List (Not Logged In)”. These can be used much like the normal Text widget, except two of them only display if the condition is met.

Potential Uses:
* Add a link to a Register page, along with some text promoting registration (for example on a site with the bbPress plugin)
* Display adverts to users who are not logged in
* Display useful links to users who are logged in.
* Display a nice list to everyone.

Because the widgets are separate, you can have the logged-in widget in a different place to a logged-out widget. You don’t even have to have pairs of widgets.

Unlike the normal Text widget which just has a toggle for paragraph on/off, this widget has four display options:

*  No formatting
*  Add paragraphs
*  Bullet list (ul)
*  Numbered list (ol)

The list options are useful if you are adding a number of links - simply add each one on a new line and they'll be turned into a bullet. Please note that this plugin adds no CSS. Often themes style the lists within a widget to make menus look nice, so your theme may (for example) prevent numbers from showing. See FAQ.

You may find that the Text/List widget is useful even without the logged-in / logged-out conditional.

== Installation ==

There isn't much to do.

1. Upload `logged-in-conditional-text-widget.php` to the `/wp-content/plugins/` directory (or install via Add Plugins - search for Logged In Conditional Text Widget or author Paul Gregory)
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Go to Widgets where you'll see three new widgets: "Text/List (If Logged In)”, "Text/List (Not Logged In)”, “Text/List”.
1. Add and configure widget instances in the normal way.
1. You may need to tweak your theme’s CSS to get numbered lists to show as desired. See FAQ. The UL and OL have a class of ‘textlistconditional’ which you can target if required.

== Frequently Asked Questions ==

= Why doesn’t my numbered list have numbers? =

Most likely, your theme is overriding the default styling of the LI (list item) element so that the number/bullet is hidden. This plugin does not include any CSS. However, the UL and OL have a class of ‘textlistconditional’ which you can target if required in your theme’s CSS.

= What about internationalisation? =

All text strings are in the pgloggedintext domain. If you’d like to submit a translation, please do.

== Screenshots ==

1. The "Text (If Logged In)" widget

== Changelog ==

= 0.9.3 =
* Readme changes

= 0.9.2 =
* Logged in and Logged Out reuse same widget code, actually from the new third type which is a text widget without conditions.
* Shows title in editor when widget minimised
* Some labelling changes, e.g. now “Text/List”.
* Allows shortcodes
* Class on the UL and OL to assist CSS targeting

= 0.9.1 =
* Bugfix release (2014).

= 0.9 =
* First release (2011)

== Upgrade Notice ==

= 0.9.2 =
Extra widget, better compliance with standards, shortcodes, more.

= 0.9.1 =
Potentially fixes an issue with call-user-func-array reported by some users. If it doesn’t, please let me know what version of WordPress and PHP you’re using.