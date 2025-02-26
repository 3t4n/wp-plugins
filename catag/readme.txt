=== autometa's CATAG ===
Contributors: JorgeAmVF
Donate link: https://quaestio.org/
Tags: shortcode, automation, metadata, taxonomy, cloud, category, tag
Requires at least: 2.5.0
Tested up to: 4.9.2
Stable Tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

It reproduces categories and tags in posts and it generates a cloud mixing categories and tags of posts simply via: `[cats]` and `[tags]` and `[catag]`.
== Description ==
 
**autometa's CATAG** is a simple plugin that uses the following shortcodes:

* `[cats]`  = to reproduce post categories;
* `[tags]`  = to reproduce post tags;
* `[catag]` = to generate a post taxonomies cloud. 

**autometa's CATAG** is a standalone component of **[autometa](https://wordpress.org/plugins/autometa/)** shortcodes pack.

== Installation ==

1. Install it from *Dashboard*/*Plugins*/*Add Plugins* or download it to your plugin folder;
2. Activate it from *Dashboard*/*Plugins*/*Installed Plugins*;
3. Write the following shortcodes in text fields: `[cats]`, `[tags]`, `[catag]`.

== Frequently Asked Questions ==

= Plugin Features =

**[autometa](https://wordpress.org/plugins/autometa/)** reproduces metadata information automatically via shorcodes in general, **autometa's CATAG** reproduces post taxonomy-related data in special.

= How To =

Just write one or more of the following shortcodes inside a text field and between brackets as usual: `[cats]` and/or `[tags]` and/or `[catag]`.

= CSS Style Selectors =

* `#cats`     = `[cats]` ID;
* `#tags`     = `[tags]` ID;
* `#catag`    = `[catag]` ID;
* `.autometa` = **autometa** class.

= PHP Functions Reference =

* [`add_shortcode()`](https://developer.wordpress.org/reference/functions/add_shortcode/)
* [`get_the_category_list()`](https://developer.wordpress.org/reference/functions/get_the_category_list/)
* [`get_the_term_list()`](https://developer.wordpress.org/reference/functions/get_the_term_list/)
* [`wp_tag_cloud()`](https://developer.wordpress.org/reference/functions/wp_tag_cloud/)
