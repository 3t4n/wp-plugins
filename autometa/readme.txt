=== autometa ===
Contributors: JorgeAmVF
Donate link: https://quaestio.org/
Tags: pack, shortcode, automation, metadata, replication, publication, author, url, date, thumbnail, taxonomy, comment, search, time 
Requires at least: 4.4.0
Tested up to: 4.9.2
Stable Tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

It reproduces metadata information and it generates taxonomy clouds and comment and search forms to publications simply via shortcodes.
== Description ==

**autometa** is a complete plugin that uses the following shortcodes:

* `[titul]`      = to reproduce the publication title;
* `[titulink]`   = to reproduce the publication link;
* `[autua]`      = to reproduce the author name;
* `[autualink]`  = to reproduce the author link;
* `[autuaguest]` = to reproduce the guest link;
* `[dated]`      = to reproduce the publication date;
* `[urlug]`      = to reproduce the URL slug;
* `[urlink]`     = to reproduce the URL permalink;
* `[urlinked]`   = to reproduce the URL link;
* `[thumb]`      = to reproduce the featured image;
* `[sumus]`      = to reproduce the publication excerpt;
* `[cats]`       = to reproduce post categories;
* `[tags]`       = to reproduce post tags;
* `[catag]`      = to generate a post taxonomies cloud;
* `[pfcats]`     = to reproduce portfolio categories;
* `[pfatts]`     = to reproduce portfolio attributes;
* `[folio]`      = to generate a portfolio taxonomies cloud;
* `[woocats]`    = to reproduce product categories;
* `[wootags]`    = to reproduce product tags;
* `[woodo]`      = to generate a product taxonomies cloud;
* `[tagcloud]`   = to generate a full mixed taxonomies cloud;
* `[cloud]`      = to generate a mixed taxonomies cloud;
* `[ments]`      = to reproduce all comments;
* `[recents]`    = to reproduce recents comments;
* `[forma]`      = to generate a comment form;
* `[loupe]`      = to generate a search form;
* `[nowon]`      = to generate the current time;
* `[nowadays]`   = to generate the current date.

**autometa** is a shortcode pack composed by standalone components: **[TITUL](https://wordpress.org/plugins/titul/)**, **[AUTUA](https://wordpress.org/plugins/autua/)**, **[DATED](https://wordpress.org/plugins/dated/)**, **[URLUG](https://wordpress.org/plugins/urlug/)**, **[THUMB](https://wordpress.org/plugins/thumb/)**, **[SUMUS](https://wordpress.org/plugins/sumus/)**, **[CATAG](https://wordpress.org/plugins/catag/)**, **[FOLIO](https://wordpress.org/plugins/folio/)**, **[WOODO](https://wordpress.org/plugins/woodo/)**, **[MENTS](https://wordpress.org/plugins/ments/)**, **[FORMA](https://wordpress.org/plugins/forma/)**, **[NOWON](https://wordpress.org/plugins/nowon/)**.

== Installation ==

1. Install it from *Dashboard*/*Plugins*/*Add Plugins* or download it to your plugin folder;
2. Activate it from *Dashboard*/*Plugins*/*Installed Plugins*;
3. Write the following shortcodes in text fields: `[titul]`, `[titulink]`, `[autua]`, `[autualink]`, `[autuaguest]`, `[dated]`, `[urlug]`, `[urlink]`, `[urlinked]`, `[thumb]`, `[sumus]`, `[cats]`, `[tags]`, `[catag]`, `[pfcats]`, `[pfatts]`, `[folio]`, `[woocats]`, `[wootags]`, `[woodo]`, `[tagcloud]`, `[cloud]`, `[ments]`, `[recents]`, `[forma]`, `[loupe]`, `[nowon]`, `[nowadays]`.

== Frequently Asked Questions ==

= Plugin Features =

**[autometa](https://wordpress.org/plugins/autometa/)** reproduces metadata information automatically via shorcodes and it was developed to improve the automation of [Quaestio.org](https://quaestio.org/).

= How To =

Just write one or more of the following shortcodes inside a text field and between brackets as usual: `[titul]` and/or `[titulink]` and/or `[autua]` and/or `[autualink]` and/or `[autuaguest]` and/or `[dated]` and/or `[urlug]` and/or `[urlink]` and/or `[urlinked]` and/or `[thumb]` and/or `[sumus]` and/or `[cats]` and/or `[tags]` and/or `[catag]` and/or `[pfcats]` and/or `[pfatts]` and/or `[folio]` and/or `[woocats]` and/or `[wootags]` and/or `[woodo]` and/or `[tagcloud]` and/or `[cloud]` and/or `[ments]` and/or `[recents]` and/or `[forma]` and/or `[loupe]` and/or `[nowon]` and/or `[nowadays]`.

= CSS Style Selectors =

* `#titul`      = `[titul]` ID;
* `#titulink`   = `[titulink]` ID;
* `#autua`      = `[autua]` ID;
* `#autualink`  = `[autualink]` ID;
* `#autuaguest` = `[autuahuest]` ID;
* `#dated`      = `[dated]` ID;
* `#urlug`      = `[urlug]` ID;
* `#urlink`     = `[urlink]` ID;
* `#urlinked`   = `[urlinked]` ID;
* `#thumb`      = `[thumb]` ID;
* `#sumus`      = `[sumus]` ID;
* `#cats`       = `[cats]` ID;
* `#tags`       = `[tags]` ID;
* `#catag`      = `[catag]` ID;
* `#pfcats`     = `[pfcats]` ID;
* `#pfatts`     = `[pfatts]` ID;
* `#folio`      = `[folio]` ID;
* `#woocats`    = `[woocats]` ID;
* `#wootags`    = `[wootags]` ID;
* `#woodo`      = `[woodo]` ID;
* `#tagcloud`   = `[tagcloud]` ID;
* `#cloud`      = `[cloud]` ID;
* `#ments`      = `[ments]` ID;
* `#recents`    = `[recents]` ID;
* `#forma`      = `[forma]` ID;
* `#loupe`      = `[loupe]` ID;
* `#nowon`      = `[nowon]` ID;
* `#nowadays`   = `[nowadays]` ID;
* `.autometa`   = **autometa** class.

= PHP Functions Reference =

* [`add_shortcode()`](https://developer.wordpress.org/reference/functions/add_shortcode/)
* [`comment_form()`](https://developer.wordpress.org/reference/functions/comment_form/)
* [`current_time()`](https://developer.wordpress.org/reference/functions/current_time/)
* [`get_comment_author_link()`](https://developer.wordpress.org/reference/functions/get_comment_author_link/)
* [`get_comment_link()`](https://developer.wordpress.org/reference/functions/get_comment_link/)
* [`get_comments()`](https://developer.wordpress.org/reference/functions/get_comments/)
* [`get_permalink()`](https://developer.wordpress.org/reference/functions/get_permalink/)
* [`get_post_permalink()`](https://developer.wordpress.org/reference/functions/get_post_permalink/)
* [`get_search_form()`](https://developer.wordpress.org/reference/functions/get_search_form/)
* [`get_the_author()`](https://developer.wordpress.org/reference/functions/get_the_author/)
* [`get_the_author_link()`](https://developer.wordpress.org/reference/functions/get_the_author_link/)
* [`get_the_author_posts_link()`](https://developer.wordpress.org/reference/functions/get_the_author_posts_link/)
* [`get_the_category_list()`](https://developer.wordpress.org/reference/functions/get_the_category_list/)
* [`get_the_date()`](https://developer.wordpress.org/reference/functions/get_the_date/)
* [`get_the_excerpt()`](https://developer.wordpress.org/reference/functions/get_the_excerpt/)
* [`get_the_post_thumbnail()`](https://developer.wordpress.org/reference/functions/get_the_post-thumbnail/)
* [`get_the_term_list()`](https://developer.wordpress.org/reference/functions/get_the_term_list/)
* [`get_the_title()`](https://developer.wordpress.org/reference/functions/get_the_title/)
* [`Walker`](https://developer.wordpress.org/reference/classes/walker/)
* [`wp_list_comments()`](https://developer.wordpress.org/reference/functions/wp_list_comments/)
* [`wp_tag_cloud()`](https://developer.wordpress.org/reference/functions/wp_tag_cloud/)
