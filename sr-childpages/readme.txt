=== SR-ChildPages ===
Contributors: mickelsn1
Tags: list, pages, shortcode
Requires at least: 2.5
Tested up to: 2.5.1
Stable tag: 0.2

This plugin allows page authors to easily list any child pages of a given page by simply using a new `[childpages]` shortcode.

== Description ==

This plugin allows page authors to easily list any child pages of a given page by simply using a new `[childpages]` shortcode.  A basic list of the children to the page you're editing will be returned with the shortcode `[childpages]`.  More-complex versions of the shortcode, as described in the Usage section, give you additional control over the output results.

== Usage ==

The basic shortcode to get a page list is `[childpages]`. Wherever you have a need to drop of a list of child pages for the page you're currently authoring, just enter that code in either the Visual or HTML editor. The list that results will not be shown with a title, will be one level deep, will not exclude any child pages or authors, and will be sorted by page order and then by title.

To list the child pages with a title, use the enclosing form of the shortcode, like this:

>    [childpages]List Title[/childpages]

The text between the opening and closing shortcodes will be the title of the resulting list. It is being passed to the `title_li` attribute in the `wp_list_pages()` template tag.

To change the defaults used to format the list, pass the appropriate parameters in your shortcode, like this:

>    [childpages depth=2 sort_column=ID]

The parameters you provide are passed to `wp_list_pages()`. The following parameters are supported; usage details for these parameters can be found in the WordPress Codex.

* `depth`
* `child_of`
* `exclude`
* `echo`
* `authors`
* `sort_column`

For more information, visit the plugin's home page at <http://scottierocket.com/wordpress-stuff/sr-childpages>.

== Installation ==

To start using the `[childpages]` shortcode, install it by uploading the sr-childpages folder to your wp-content/plugins directory and then activate the plugin through the 'Plugins' menu in WordPress.  Then just start using the shortcode in your pages!

== Frequently Asked Questions ==

= Why did you do this? =

Because none of the other plugins I've found that enabled similar functionality were exactly what I wanted.  They either didn't give me the control I wanted over things like sort order, or used comment tags that weren't visible in the Visual editor, or both.
