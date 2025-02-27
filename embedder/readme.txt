=== Embedder ===
Contributors: Mike Walker
Donate link: http://moztools.com/wordpress/embedder-plugin/ 
Tags: embed, html, embedder, embed html, imbed, include, shortcode, shortcodes, macros, macro, substitution, moztools, comments, widgets, better shortcodes, bbcode, shortcode fixes
Requires at least: 2.6
Tested up to: 4.9.6
Stable tag: 1.3.5

Embed HTML content into your blog's posts, pages, titles, comments, and widgets with this powerful, easy-to-use plugin. 
 
== Description ==

If you are looking for an easier way to create and manage embedded HTML and shortcodes then this is it. Embedder allows you 
to create as many HTML embeds as you like without writing a single line of PHP code (though if you need to 
do it, Embedder allows you to do that too).

Create **local HTML embeds** for blog post simply by adding one or more **custom fields**. Any custom field
name enclosed in square brackets **[]** will be recognized as an embed when used in the post.

For example, you can quickly create your own tag language for posts (and comments) by adding
custom fields like **[b]**, **[i]**, **[quote]**, **[link]**, etc. 

And embed YouTube videos, Google Maps, Facebook and Twitter buttons, and much more in a matter of a few seconds.   

Embed attributes makes it easy to add much more flexibility to your embeds.
For example, to highlight any text in your posts (and comments), just add the following custom field:

		Name: [color]
		Value: <span style="color:%col%">%content%</style>


Then, in your posts, you can use the embed like this:

		The quick [color col="brown"]brown[color] fox 
		jumps over the [color col="yellow"]lazy dog[/color].


The **%col%** attribute is replaced by the value you set, and the special **%content%** 
attribute is replaced by the text between the open and close embed tags.
  
If you want to use your embeds in all your posts, or use them in your sidebar widgets, 
you can create **global HTML embeds** using the *Manage Embeds* settings page,
and take advantage of the following advanced features:

* Use embed attributes to increase the flexibility of your embedded HTML.
* Nested embeds (including a workaround to WordPress's nested shortcode problems)
* Set default values for your attributes.
* Use embeds in titles and comments too.
* Auto-embed HTML at the top and bottom of blog posts and pages.
* Include or exclude auto-embeds from posts/pages based on tags, categories, or parent pages.
* Wrap your embeds in a *div* or *span* to modify an embed's position or appearance.
* Call out to a user-specified PHP function to generate the embed's HTML for you.
* Use global embeds in sidebar widgets too, including widget titles. 
* Embed groups -- group your global embeds to keep them organized
* Import and export embeds. Share your embeds with others, or make backups for safekeeping.
* Support for embedding all unicode characters (e.g. Chinese, Arabic, Hebrew, etc). 
* Wrap embeds with individual CSS styles.
* **NEW!!** Ajaxified Embedder Manager makes managing your embeds much easier and faster.
* **NEW!!** Powerful new Embedder parser that solves WordPress shortcode problems.
 
For more information, go to the [Embedder Plugin's Home Page](http://moztools.com/wordpress/embedder-plugin/)
where you will find extensive documentation for the plugin, and the 
[Embedder Plugin Support Forum](http://moztools.com/wordpress/embedder-plugin/support-forum/).

If you decide the Embedder a whirl, please let me know how you get on by
leaving feedback in the [Embedder Plugin Support Forum](http://moztools.com/wordpress/embedder-plugin/support-forum/).
There is no need to register, just go there and post your comments.

== Installation ==

Installation Instructions:

1. Navigate to the **Plugins** >> **Add New** page in your blog's administration section.
1. Search for **Embedder**.
1. Locate the plugin in the list then click **Install** and follow the on-screen instructions. 

Getting Started:   
   
[Click here](http://moztools.com/wordpress/embedder-plugin/quick-start-local-embeds/) for a quick start guide to creating your first embed.

== Frequently Asked Questions ==

= If I put two embeds right next to each other in a post (e.g. [myvid][mylink]) the second embed doesn't work. Why not? =

By default, the plugin uses the WordPress shortcode feature to do the embedding, and there is a long-standing
bug in the shortcode parser where it skips past the first character after the end of a embed tag, so
it misses the second embed completely.

To fix this problem, simply select the option to use the new Embedder parser 
at the top of the **Settings** >> **Embeds** administration page.

= Using an embed nested inside the another instance of the same embed didn't work as I expected. What happened? =

By default, the plugin relies on WordPress's shortcode parser to find the start and end tags of embeds, but the
parser fails when you put one copy of an embed inside another with the same name. This is a well known 
WordPress limitation.

To fix this problem, simply select the option to use the new Embedder parser 
at the top of the **Settings** >> **Embeds** administration page.
  
= What are the minimum versions of software the plugin has been tested with? =

* WordPress 2.5 is the known minimum required (will definitely not work with older versions of WordPress)
* WordPress 3.0.1 is the minimum version the plugin has been tested on
* PHP5 5.2.6 (will probably work with earlier versions of PHP4 and PHP5)
* MYSQL 5.0.5 (will probably work with earlier versions of MYSQL 4.0 and 5.0)

== Screenshots ==

[Click here](http://moztools.com/wordpress/embedder-plugin/quick-start-local-embeds/) and
[here](http://moztools.com/wordpress/embedder-plugin/quick-start-global-embeds/) 
for screenshots of the creation and use of local and global embeds.
== Known issues ==
 
None so far.

== Changelog ==

= Version 1.3.5 =

* Fixed PHP depracation warning that was going to turn into an error one day. 

= Version 1.3.4 =

* Fixed bug with new parser caused by changes to WordPress sometime in the last four years(!)

= Version 1.3.3 =

* Minor fixes to use new WordPress APIs. No new function.
* Tested with WordPress 3.9 (should work with earlier 3.x releases)

= Version 1.3.2 =

* Another bug fix release. No new function.

= Version 1.3.1 =

* Fix bugs causing problems with PHP4 and Windows

= Version 1.3 =

* Ajaxified the Embed Manager page.
* Add a new parser for embedding to replace the limited and buggy shortcode feature.
* A couple of minor fixes.
* Refactoring the source code.

= Version 1.2 =

* Add support for embedding unicode (UTF8) characters in embeds.
* Add support for wrapping embeds with individual CSS styles.

= Version 1.1.1 =

Minor but important bug fixes to import and enable/disable embeds.

= Version 1.1 =

* Fixed the Contextual Help
* Renamed the export tag to prevent clash with WordPress's built-in [embed] shortcode (oops)
* A couple of other cosmetic changes.

= Version 1.0 =

* Overhauled the Embed Manager admin pages to add groups and an import/export capability.

= Version 0.5 =

* Added support for embeds in widget text and titles.

= Version 0.4 =

* Added support for embeds in titles and (optionally) in comments.

= Version 0.3 =

* Added support for attribute defaults.

= Version 0.2 =

* Added support for nested embeds.

= Version 0.1 =

* This was the first version.

== Upgrade Notice ==
  
This version is compatible with all previous versions.

However, if you select the option to use the new parser, there are some minor, but significant
changes you should be aware of, if you have already created some embeds with a previous version 
of the plugin.

For more information please see the [New Embedder Parser](http://moztools.com/wordpress/embedder-plugin/new-embed-parser/) page.

Finally, a lot of source code has been changed in this release (1.3). Care has been taken to 
test everything thoroughly, but there is always a chance that a couple of things might
not work as expected. Please check to make sure your embeds are working properly once
you have installed this version.