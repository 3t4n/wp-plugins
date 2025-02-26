=== Plugin Name ===
Contributors: halgatewood,ghuger,richardgabriel
Donate link: https://halgatewood.com/donate/
Tags: colors, color, color palettes, colour, colour palettes, palettes, shortcode
Requires at least: 3.5
Tested up to: 5.7
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A cool way to display color palettes on your WordPress site.

== Description ==

Finally a cool way to display color palettes on your site. This tiny little plugin gives you a cool way to display color palette on your pages.

Example of what it looks like:
http://halgatewood.com/palettes/

Use the shortcode to and pass in a list of colors:

`[awe_palette colors="434858,5886c5,#f2674a,c6006d"]`

Or you can call it directly with PHP in your theme:

`<?php awesome_color_palettes( array('#cccccc', 'efefef', '666') ); ?>`

You can include the # or not, it doesn't care what you do. 

Wait, there's more. Create an `awesome-color-palette.php` file and put it in your theme folder and you can custom palettes for whatever you need.

It can handle 10 colors out of the box. To add more, simply create some CSS like below and add it to your style.css file in your theme.

`.awe-color-palette.count-20 .color { width: 5%; }`


== Installation ==

1. Add plugin to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Use shortcode mention in the main page to display the goods


== Screenshots ==

1. When the user hovers over the palette expands to show the hex values

== Changelog ==

= 1.0 =
* July 20th, 2014
* Built with love