=== autometa's AUTUA ===
Contributors: JorgeAmVF
Donate link: https://quaestio.org/
Tags: shortcode, automation, metadata, author, guest, link
Requires at least: 4.4.0
Tested up to: 4.9.2
Stable Tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

It reproduces author names and links and guest links in pages, posts, portfolios or products simply via: `[autua]` and `[autualink]` and `[autuaguest]`.
== Description ==

**autometa's AUTUA** is a simple plugin that uses the following shortcodes:

* `[autua]`      = to reproduce the author name;
* `[autualink]`  = to reproduce the author link;
* `[autuaguest]` = to reproduce the guest link.

**autometa's AUTUA** is a standalone component of **[autometa](https://wordpress.org/plugins/autometa/)** shortcodes pack.

== Installation ==

1. Install it from *Dashboard*/*Plugins*/*Add Plugins* or download it to your plugin folder;
2. Activate it from *Dashboard*/*Plugins*/*Installed Plugins*;
3. Write the following shortcodes in text fields: `[autua]`, `[autualink]`, `[autuaguest]`.

== Frequently Asked Questions ==

= Plugin Features =

**[autometa](https://wordpress.org/plugins/autometa/)** reproduces metadata information automatically via shorcodes in general, **autometa's TITUL** reproduces author-related data in special.

= How To =

Just write one or more of the following shortcodes inside a text field and between brackets as usual: `[autua]` and/or `[autualink]` and/or `[autuaguest]`.

= CSS Style Selectors =

* `#autua`      = `[autua]` ID;
* `#autualink`  = `[autualink]` ID;
* `#autuaguest` = `[autuahuest]` ID;
* `.autometa`   = **autometa** class.

= PHP Functions Reference =

* [`add_shortcode()`](https://developer.wordpress.org/reference/functions/add_shortcode/)
* [`get_the_author()`](https://developer.wordpress.org/reference/functions/get_the_author/)
* [`get_the_author_link()`](https://developer.wordpress.org/reference/functions/get_the_author_link/)
* [`get_the_author_posts_link()`](https://developer.wordpress.org/reference/functions/get_the_author_posts_link/)
