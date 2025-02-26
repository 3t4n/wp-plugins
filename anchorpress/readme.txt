=== AnchorPress ===
Contributors: jmlapam
Tags: anchor, content, title, tag, share
Requires at least: 2.8
Tested up to: 4.7.2
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

A VERY simple plugin to add link to each title tag of your posts

== Description ==

It targets all h1, h2, etc... used in WP post content editor and add an automatic link
to each part.

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/anchorpress` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress

== Screenshots ==

1. final results

== Changelog ==

= 0.4 =

* 10 Feb 2017
* use now html code instead of unicode copy/paste

= 0.3 =

* 09 Feb 2017
* delete trim words on title

= 0.1 =

* 04 Feb 2017
* initial

== For developers : Using filters ==

Filters :

* anchorpress_want_anchors_condition
* anchorpress_href_classes
* anchorpress_unicode

`add_filter( 'anchorpress_href_classes', 'custom_anchorpress_href_classes' );
 function custom_anchorpress_href_classes( $classes ) {
 	$classes[] = 'test';
 	return $classes;
 } `
