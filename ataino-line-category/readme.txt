===  Ataino Line Category ===
Contributors: kanetamru@ishii
Tags: category, layout, category layout, template layout, template category
Requires at least: 4.1
Tested up to: 1.1
Stable tag: 1.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

line category layout for your theme.

== Description ==

line type category layout.
it's easy to use and like Sticker.

**Place**
`<?php
	$variable = new ataino_line_category("main");
	$variable = new ataino_line_category("sub");
?>`
**in your templates.**

*example*

show top level category.
`<?php
	$variable = new ataino_line_category("main");
?>`
show second level category and breadcrumbs. 
`<?php 
	$variable = new ataino_line_category("sub");
?>`

*check browsers*

Chrome 41.0+,
FireFox(Firebug) 36.0+,
IE 8.0+(non table),
Safari 5.0+,
Opera 28.0+

== Installation ==

1. Upload folder `ataino-line-category` to the `/wp-content/plugins/` directory
2. Activate the plugin through the ‘Plugins’ menu in WordPress

== Screenshots ==

1. screenshot-1.png is the example.

== Arbitrary section ==

https://twitter.com/kyanetamaru

== Changelog ==

*1.01*
fix: load css file in head.
