=== Admin Bar Hover Intent ===
Contributors: ryanimel
Donate link: http://wpcandy.com/is/powered
Tags: admin, bar, hover, intent
Requires at least: 3.1
Tested up to: 3.1
Stable tag: 0.2.2

If you use the WordPress Admin Bar you might have noticed the dropdowns are a bit quick on the draw. This plugin enables the jQuery hoverIntent plugin on the menu for logged in users.

== Description ==

This plugin slows down the dropdown effect of the WordPress Admin Bar. By default (as of WordPress 3.1.x) the WordPress Admin Bar reacts to any mouseover by dropping down menu items. With this plugin you have to hover over the menu items deliberately in order for them to display.

No configuration necessary -- just enable it and you're good to go.

== Installation ==

Visit the Add New Plugin page from the WordPress Dashboard, search for "Admin Bar Hover Intent", and click install.

== Changelog ==

=0.2.2=
* Fixed timeout bug that caused a delay in the hover class leaving. Should have been fixed earlier, sorry!
* Trimmed up CSS comments a tad.

=0.2.1=
* Added missing add_action(). Forget it before because I'm dumb.

= 0.2 =
* Updated CSS to reset default behavior for second level down and beyond. hoverIntent is only active on first level of admin bar now.
* Standardized file and function names.
* Adopted Austin Passy's improved class in rwi-admin-bar-hover-intent.php. Thanks Austin! 
(http://austinpassy.com/snippet/plugin/applying-the-hover-intent-javascript-to-chill-out-the-admin-bar/)

= 0.1 =
* Original version