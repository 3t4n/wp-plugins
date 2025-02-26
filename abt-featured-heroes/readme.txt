=== Featured Heroes Slideshow ===
Contributors: atlanticbt, zaus, heyoka
Donate link: http://atlanticbt.com
Tags: heroes, slides, slideshow, hero slider, featured, featured slides, featured heroes, cycle, jQuery cycle
Requires at least: 2.8
Tested up to: 3.3.3
Stable tag: trunk
License: GPLv2 or later

Put a slideshow on any page with a shortcode; provides a new content type "Heroes" to manage your featured slides.

== Description ==

Provides a new content type "Heroes" to manage your featured slides.  You can then add a slideshow to any page using the shortcode `abt_slider_hero`.  The slideshow is automatically configured using [jQuery Cycle] and the options you specify in the shortcode.

One of the options `postType` allows you to use other content than the provided "Heroes", effectively allowing a slideshow of almost anything in Wordpress.

[jQuery Cycle]: http://jquery.malsup.com/cycle/ "Cycle Homepage with option reference"

== Installation ==

1. Unzip, upload plugin folder to your plugins directory (`/wp-content/plugins/`)
2. Activate plugin
3. Add slideshow shortcode anywhere you need it.
4. If you want to put the widget (shortcode) in a Widget, you'll need to allow shortcodes in widgets
5. You can call the slideshow in code using `abt_featured_heroes::embed( array $atts )`

== Frequently Asked Questions ==

= How do I insert an image? =

Set the image you wish to use as the featured image for your Hero

= What is the shortcode? =

Use the following format (defaults indicated here):

    [abt_slider_hero
        fx="fade"
        width="100%"
        height="400px"
        order="asc"
        orderby="menu_order"
        speed="600"
        timeout="7000"
        classes=""
        postType="heroes"
        style="photo"]

where

* *fx* = the cycle transition effect (fade, scrollUp, shuffle, etc) - see [jQuery Cycle][] homepage for more information
* *width* = width of the slide
* *height* = height of the slide
* *order* = sorting order (asc/desc) for the fetched items
* *orderby* = how to sort the fetched items
* *speed* = transition speed from one slide to the next
* *timeout* = delay between slide changes
* *classes* = optional classes to apply to the slideshow
* *postType* = you can retrieve other content types than "heroes" if desired
* *style* = normally the thumbnail navigation just reuses the full-size image, but if you want to "control" the quality of the shrunken thumb specify an alternate image size (like "thumbnail")

Pretty much all of the attributes are optional, so all you need is:

    [abt_slider_hero]

= How do I put a slideshow in code? =

You can call the slideshow in code using `abt_featured_heroes::embed( array $atts )`, where `$atts` is an array matching the shortcode attribute list.

= Can I change the defaults? =

Only one simple hook available:

* `add_filter('abt_featured_heroes_localize', YOURFN);`
    change the base javascript variables used by the flipwall init script:
    * `stylesheet`: replace the default stylesheet with your own to change the default appearance of slides
    * `speed`: change the transition speed (from 600 ms)
    * `timeout`: change the slide delay (from 7000 ms)
    * `fx`: change the slide transition (from 'fade')
    * `style`: optionally use actual thumbnail photos for navigation, instead of reusing full-size images (default 'photo', alt 'thumbnail')
    * `width`: default width (from 100%)
    * `height`: default height (from 400px)

= How to put shortcode in widget? =

Use a filter to apply shortcode processing to widgets.

[Filter](http://digwp.com/2010/03/shortcodes-in-widgets/): `<?php add_filter('widget_text', 'do_shortcode'); ?>`

= Developer Bonus =

Includes a WP "content type" class to make creating content types easier.  Not as generic/refined as the one in the [WP-Dev-Library][] plugin, but feel free to use it as a starting point.

Suggestions/improvements welcome!


[jQuery Cycle]: http://jquery.malsup.com/cycle/ "Cycle Homepage with option reference"
[WP-Dev-Library]: http://wordpress.org/extend/plugins/wp-dev-library/ "WP Developer Library - the plugin with the mostest"

== Screenshots ==

1. Basic slideshow, 3 samples; all defaults
2. Same slideshow as #1, but 'thumbnail' style instead (notice how nav images scaled); also pointing out some issues to remember when setting up

== Changelog ==

= 0.2.3 =

* Additional Documentation

= 0.2.1 =

* Name change for clarity

= 0.2 =

* cleanup for plugin release
* query change
* template reconfigure
* readme

= 0.1.1 =

* encapsulated "featured content"
* converted to shortcode

= 0.1 =

* split from theme, encapsulated as plugin

== Upgrade Notice ==

None


== About AtlanticBT ==

From [About AtlanticBT][].

= Our Story =

> Atlantic Business Technologies, Inc. has been in existence since the relative infancy of the Internet.  Since March of 1998, Atlantic BT has become one of the largest and fastest growing web development companies in Raleigh, NC.  While our original business goal was to develop new software and systems for the medical and pharmaceutical industries, we quickly expanded into a business that provides fully customized, functional websites and Internet solutions to small, medium and larger national businesses.

> Our President, Jon Jordan, founded Atlantic BT on the philosophy that Internet solutions should be customized individually for each client's specialized needs.  Today we have expanded his vision to provide unique custom solutions to a growing account base of more than 600 clients.  We offer end-to-end solutions for all clients including professional business website design, e-commerce and programming solutions, business grade web hosting, web strategy and all facets of internet marketing.

= Who We Are =

> The Atlantic BT Team is made up of friendly and knowledgeable professionals in every department who, with their own unique talents, share a wealth of industry experience.  Because of this, Atlantic BT always has a specialist on hand to address each client's individual needs.  Due to the fact that the industry is constantly changing, all of our specialists continuously study the latest trends in all aspects of internet technology.   Thanks to our ongoing research in the web designing, programming, hosting and internet marketing fields, we are able to offer our clients the most recent and relevant ideas, suggestions and services.

[About AtlanticBT]: http://www.atlanticbt.com/company "The Company Atlantic BT"

