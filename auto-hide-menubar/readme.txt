=== Auto-Hide Menubar ===
Contributors: Punkfish
Donate link: http://www.punkfish.com/
Tags: menubar, menu, bar, admin, wpadminbar, wpmenubar, autohide, auto, hide, auto-hide
Requires at least: 3.1
Tested up to: 3.1
Stable tag: 1.0.1

Auto-hide the WordPress admin menubar when viewing your website.

== Description ==

This plugin will auto-hide the new WordPress 3.1 administrator menubar seen when logged in
and viewing the website.

= FEATURES =

* Enable/disable auto-hide feature.
* Enable/disable auto-loading of jQuery from Google Libraries.

== Installation ==

Follow the simple steps below to install this plugin:

1. Upload the plugin folder to the `/wp-content/plugins/` directory.
1. Activate the plugin through the 'Plugins' menu in WordPress.
1. Add `wp_head()` between the `<head>` tag in your template.
1. Go to `Appearances > Auto-Hide Menubar` to configure settings.

== Frequently Asked Questions ==

= Why is the menubar not auto-hiding? =

Make sure that `wp_head()` is present in your template's header file between the `<head>` tag

== Changelog ==

= 1.0 =
* Initial development