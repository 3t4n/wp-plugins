=== Outdooractive Embed ===
Contributors: Outdooractive AG
Tags: Biking, Mountaineering, Hiking, Trekking, Hut, Refuge, Outdoor, Tour, Outdooractive
Requires at least: 5.0
Tested up to: 6.7.1
Stable Tag: 1.6
License: GPL v3

Embed any kind of content from outdooractive.com into your WordPress site.

== Description ==

After installing the plugin, the button editor for the plugin will appear in the page editor of WordPress. Use it to add your Outdooractive content to your website.
For programmers: The plugin uses the shortcode oaembed. The only required parameter is url, all others are optional.
= For example: = paste `[oaembed url = "http://www.outdooractive.com/en/serviced-hut/graubuenden/tschiervahuette/15280962/"]` into "text mode" of the editor and click Preview. Your embedded content will appear.

The following options are supported:
*Maximum width*
Specify a maximum pixel width for incorporating your content. The maximum width must not be less than 260 pixels.
Example: `[oaembed url = "http://www.outdooractive.com/en/serviced-hut/graubuenden/tschiervahuette/15280962/" maxwidth = "400"]`

= Include content in the sidebar, footer, etc. =
You can embed your content in sidebars and footers using WordPress widgets. For more information on WordPress widgets, visit: https://codex.wordpress.org/WordPress_Widgets
= Tip: white label embedding with Pro+ =
With Pro+ you have even better opportunities to integrate tours and interesting points on your website. [Learn more about Pro+](https://www.outdooractive.com/en/pro-business.html)
To use Pro+ Embedding, follow the instructions on the settings page of the plugin (*Settings* → *Outdooractive Embed*).


In the new Gutenberg Editor you can find a "Outdooractive Embed" block under the category "Embed". It has the same options as mentioned above. Additionally it will show you a live preview in the editor.


= Please note: =

Only published Contents can be embeded

== Installation ==

To install the plugin, log in to your WordPress page. Go to plugins  install.
Search now for Outdooractive Embed and select it. There you can install the plugin.

== Frequently Asked Questions ==

Please [visit our Help Center](http://support.outdooractive.com/hc/) if you have questions.

== Screenshots ==

1. Embedded POI with Pro+
2. Embedded Tour with Pro+
3. Embedded POI with standard account
4. Embedded Tour with standard account
5. Live Preview in the Gutenberg Editor

== Changelog ==

= 1.6 =
* fix user input sanitation

= 1.5.2 =
* update supported wordpress versions

= 1.5.1 =
* update supported wordpress versions

= 1.5 =
* fix php warnings shown on websites with enabled warning output

= 1.4 =
* adjust supported wordpress version
* adjust some legal information
* change changelog order

= 1.3 =
* added Gutenberg support

= 1.2 =
* removed parameters "displaymap", "showheader" and "list" from shortcode
* Now all kind of contents are using the same parameters
* added Outdooractive Pro-Features

= 1.1.1 =
* bugfix for lists

= 1.1 =
* new shortcode "oaembed" to embed any kind of outdooractive content
* if you already use the shortcodes or widgets "tour2go", "list2go" or "hut2go", please update them to "oaembed". For lists you have to extend the shortcode with the parameter 'list="true"'

= 1.0 =
* Initial release