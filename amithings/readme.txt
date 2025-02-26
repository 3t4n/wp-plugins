=== Amithings ===
Contributors: Amithings
Tags: amithings, information, view, upl, vspace, orbit, web id, webname
Requires at least: 3.0.1
Tested up to: 4.0
Stable tag: 1.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Displays Information from Amithings in your Blog by using shortcodes inside Posts and Pages.

== Description ==

The Amithings WordPress Plugin was created to help publishers display Information from Amithings in their blogs using shortcodes within Posts and Pages.

In Amithings, you have the ability to view any Information in many standards, shapes and formats, such as HTML pages, HTML tables and web controls, XML, JSON, Excel, PDF, DOC, Charts, Graphics, Videos, Music, Playlists, Books, Slideshows, Gallery Pages, Todo lists, and much more.

Just use the shortcode below in your HTML editor in Admin Panel:

[amithings upl="{list of UPL functions separated by dots}"]

Examples:

[amithings upl="information(world-english-bible)"]

[amithings address="yes" border="yes" upl="information(world-english-bible)"]

For those who doesn't know what is UPL, it is a kind of URL Programming Language, a set of functions to be used in the browser URL in order to retrieve, transform and visualize Information from Amithings.

You will find more info about UPL at Amithings website in the Help section, here: http://app.amithings.com/help(upl).

Parameters

address - Shows the address bar with the UPL. Accepts only "yes" and "no". Default: "no".

border - Shows a border outside the contents. Accepts only "yes" and "no". Default: "no".

container - HTML element used as container to the contents. The only parameter accepted is "iframe". Default: "iframe".

height - Sets the height of the contents. Integer values will be assigned in pixels but you may try using one of these units: em, cm, ex, in, mm, pc, pt and px. Default: "auto".

scrolling - Specifies whether or not to display scrollbars around the contents. Accepts "auto", "yes" and "no". Default: "auto".

upl - List of UPL functions separated by dots.

width - Sets the width of the contents. Integer values will be assigned in pixels but you may try using one of these units: em, cm, ex, in, mm, pc, pt and px. Default: "100%".

== Installation ==

1. Download the plugin and unzip it.

2. Upload the folder /amithings/ to your /wp-content/plugins/ folder.

3. Activate the plugin from your WordPress Admin Panel.

4. Installation finished.

OR

Upload the Amithings plugin to your Blog in your WordPress Admin Panel, and then activate it.

== Changelog ==

= 1.1 (The first update of this plugin) =

* Changing the address of the new UPL server from "www.amithings.com" to "app.amithings.com".

* Revised and updated for WordPress 4.0.

= 1.0 (The first release of this plugin) =

* NEW: Added shortcode [amithings upl="{list of upl functions}"] to be inserted inside Posts and Pages.
