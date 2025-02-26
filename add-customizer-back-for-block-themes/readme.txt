=== Add Customizer Back For Block Themes ===
Contributors: alanfuller
Donate Link: https://www.buymeacoffee.com/wpdevalan
Tags: customizer
Tested up to: 6.1
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Simply adds back the hidden customizer for Block Themes such as Twenty Twenty Two and Twenty Twenty Three

== Description ==

The new generation og WordPress themes are known as Block Themes, sometime referred to as Full Site Editing (FSE) or Gurenberg Themes.

These themes disable the older customizer, on the presumption that all styling can be done via the editor.

Unfortunately this is not so, and some styles still need custom CSS if you want to perfect your designs.

There are several plugins that allow you to add additional CSS  however there is no need to add another plugin as the ability is still within Core WordPress, in the form of the customizer.

All it needs is it to be switched back on - no bloat- just a switch and you can then access the customizer and add additional CSS.

This is a really lightweight plugin that adds back the customizer when hidden by block themes.

The customizer is useful for block themes mainly because of Additional CSS.

Whilst it is still available for block themes, it is hidden. This plugin simply brings back the links.


== Installation ==

Install and activate like any plugin

== Frequently Asked Questions ==

= How does it work? =

It switches the customizer back on bythe following actionhook

add_action(
 	'customize_register',
 	function ( $manager ) {
 	},
 	10,
 	1 );
 	
If you want to add the code to your functions.php instead it is simply
This plugin exists so that can be implemented easily.

= Why was customizer removed from Block / FSE themes? =
The customizer is considered the 'old' way and those that control the destiny of WP want to focus effort into Blocks / Gutenberg.
One day, maybe, FSE  will be ready to not need additional CSS, but at the moment many web developers need this.


== Changelog ==
= 1.0 =
* First release
