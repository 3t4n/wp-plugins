=== Plugin Name ===
Contributors: chrisfromthelc
Donate link: http://www.bringyourowndesign.net/plugins/
Tags: genesis, jetpack, infinite scroll, html5
Requires at least: 4.1
Tested up to: 4.3.1
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Easily enable Genesis to use Jetpack's Infinite Scroll feature.

== Description ==

This plugin enables themes that use the StudioPress Genesis Framework to use JetPack's Infinite Scrolling functionality. The current version uses the Jetpack default settings.

== Installation ==

1. Upload `genesis-jetpack-infinite-scroll.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. You should be able to see the Jetpack options under Settings > Reading.

== Frequently Asked Questions ==

= Can I change the default Jetpack settings? =

It's possible, but not without manually integrating it into your theme. The next version should have a settings panel to insert these options.

= Can I use this on other themes that don't use the Genesis Framework? =

Probably not.

= What version of Genesis does this work on? =

As of now, Genesis 2.x (HTML5) is required to use this plugin. Other versions *might* work, but they are not supported (nor should you be using those anyhow).

= How does this work? =

The plugin assigns an ID to `<content>` and the footer widgets widget area (if that exists), which is what Jetpack looks for to work properly. It also uses the `genesis_do_loop` instead of the standard WordPress loop that Jetpack normally looks for, and removes pagination to keep errant clicks from breaking the functionality.

== Screenshots ==

== Changelog ==

= 1.0 =
* This is the first version.

= 1.01 =
* Fixed single-quote issue in response to https://wordpress.org/support/topic/code-needs-a-small-tweak

