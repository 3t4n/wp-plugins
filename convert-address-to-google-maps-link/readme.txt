=== Convert Address to Google Maps Link ===
Contributors: themightymo,llamaman
Donate link: http://www.themightymo.com/donate
Tags: address,google,maps,map,convert
Requires at least: 2.8
Tested up to: 4.4.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Converts addresses in the "&lt;address&gt;&lt;/address&gt;" tags into links that open a Google Map in a new window.

== Description ==

NORMAL LINKS: 
This simple plugin converts addresses in "`<address></address>`" tags into links that open a Google Map in a new window.  It also converts any address in a “.address” class into a Google Map link that opens in a new window.

NOTE: You need to put the address inside the `<address></address>` html tag or within an html element with the `.address` class for this plugin to work. For example, you would need to write the following into your code: `<address>3 Abbey Rd, London NW8 9AY, United Kingdom</address>` OR `<span class=“address”>3 Abbey Rd, London NW8 9AY, United Kingdom</span>` OR `<div class=“address”>3 Abbey Rd, London NW8 9AY, United Kingdom</div>`

IFRAME LINKS: 
If you want to display the Google Map in an iframe, just use the `.address-iframe` class in your markup.  For example, `<div class=“address-iframe”>3 Abbey Rd, London NW8 9AY, United Kingdom</div>`  (Thanks to [Mike Jasper](http://www.mikedoesweb.com/) for this idea and code!)

FYI: This plugin is great for themes with custom fields that supply the address, but is probably not too useful for themes that don’t, because you’ll need to enter the text view to add the appropriate html markup.  Thanks!

Finally, many many thanks to [Mike Jasper](http://www.mikedoesweb.com/) , who wrote the javascript that powers this plugin.  I merely repackaged his code.

== Installation ==

1. Unzip and upload the php file to your wordpress plugin directory
1. Activate the plugin

== Frequently Asked Questions ==
= Where is the settings page? =

There are no settings for this plugin.

= This isn't working. =

Make sure you put the address inside the `<address></address>` html tag or inside an html element with the `address` class.  This is required.

== Changelog ==
= 1.2 =
* Added support for ‘.address-iframe’ class

= 1.1 =
* Added support for ‘.address’ class

= 1.0 =
* Initial release


== Screenshots ==

1. Using the ‘address-iframe’ class
2. Using the html5 ‘<address>’ markup
3. Using the inline ‘.address’ class
