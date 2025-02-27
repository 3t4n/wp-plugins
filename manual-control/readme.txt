=== Manual Control for Jetpack ===
Contributors: markjaquith
Donate link: http://txfx.net/wordpress-plugins/donate
Tags: jetpack, control
Requires at least: 3.3
Tested up to: 3.9
Stable tag: 0.2

Jetpack auto-activates new modules, without asking your permission. This plugin stops that.

== Description ==

The [Jetpack](http://wordpress.org/extend/plugins/jetpack/) plugin by Automattic does something sneaky: it auto-activates new Jetpack modules. Instead of allowing you to opt in to new modules, Jetpack cheerfully activates some of them without your permission. These modules can change how your site works and looks.

Manual Control puts a stop to that unwanted behavior. It prevents auto-activation of new Jetpack modules.

Metal texture in the plugin header image by [Urban Dirty](http://urbandirty.com/gallery/photo/2568483179-m).

== Installation ==

1. Upload the `manual-control` folder to your `/wp-content/plugins/` directory

2. Activate the "Manual Control for Jetpack" plugin on your site

== Frequently Asked Questions ==

= Why don't you just ask them to stop doing this? =

I did.

= Will this continue to work in the future? =

Probably. There is a hook for it now (version 0.1 used a crazy hack), so if they keep that hook in place, we're good.

== Upgrade Notice ==

= 0.2 =

Fixes issue causing dummy Jetpack error notices.

== Changelog ==

= 0.3 =

* The plugin is now one line of code

= 0.2 =

* Much simpler method of suppressing auto activation of modules

= 0.1 =

* Initial version
