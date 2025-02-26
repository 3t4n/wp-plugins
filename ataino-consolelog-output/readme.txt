=== Ataino Consolelog Output ===
Contributors: kanetamru@ishii
Tags: debug,console,console.log,consolelog,javascript
Requires at least: 4.1
Tested up to: 1.03
Stable tag: 1.03
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Output variable in your Web browser console.

== Description ==

This is Development support tool.
it's easy to use.

**Place**
`<?php
	$myout = new ataino_console();
	$myout->log( $variable, $variable, more variable );
?>`
**in your templates.**
**$variable is text,Array,Object.**

*example*

output the Character.
`<?php
	$myout = new ataino_console();
	$myout->log( "Hello World." );
?>`
output the Array or Object.
`<?php
	$myout = new ataino_console();
	$myout->log( get_queried_object( $args ) );
?>`
output the Array or Object in table.
`<?php
	$myout = new ataino_console();
	$myout->table( get_queried_object( $args ) );
?>`
output the Array or Object by json.
`<?php
	$myout = new ataino_console();
	$myout->json( get_queried_object( $args ) );
?>`
output the how long time an operation takes.
time and timeEnd methods.
`<?php
	$myout = new ataino_console();
	$myout->time();
		/* processing */
	$myout->timeEnd();
?>`

**Apply css styling.**
Result is different by the browser.
[check example.](http://jsfiddle.net/kanetamaru/qub2uvok/9/ "Title")

*check browsers.*

Chrome 41.0+,
FireFox(Firebug) 36.0+,
IE 8.0+(non table),
Safari 5.0+,
Opera 28.0+

== Installation ==

1. Upload folder `ataino-consolelog-output` to the `/wp-content/plugins/` directory
2. Activate the plugin through the ‘Plugins’ menu in WordPress

== Screenshots ==

1. screenshot-1.png is the console out.

== Arbitrary section ==

https://twitter.com/kyanetamaru

== Changelog ==
**1.01**

add more Argument and function table()
add json() is test now.

**1.02**

typo old code clear add_action()

**1.03**

add time and timeEnd Methods.