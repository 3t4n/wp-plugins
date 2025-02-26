=== Content MetaData Widget ===
Contributors: Donna D. Fontenot
Tags: post metadata, sidebar widget
Donate link: http://www.donnafontenot.com/contact-me/
Requires at least: 3.8
Tested up to: 4.2
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Display the current post or page-specific metadata (author, title, date...) in a sidebar widget outside of the loop.

== Description ==
Display the current page or post's metadata (title, author, publication date, categories, tags) in a sidebar widget, outside of "the loop".

== Installation ==
1. Upload the entire content-metadata-widget folder to the /wp-content/plugins/ directory, or upload the .zip package through Plugins->Add New->Upload.

2. Activate the plugin through the 'Plugins' menu in WordPress.

You will find a Custom MetaData Widget in Appearance > Widgets. 

== Frequently Asked Questions ==
Q: Can I change the styles?
A: Yes. Default styles can be overridden with your own custom styles. The following classes are used:
.cmdtitle (the content title)
.cmdauthor (the content author)
.cmddate (the content date)
.cmdcategories (the content categories)
.cmdtags (the content tags)
.content_metadata_widget_box (the surrounding widget box)
.cmdtitle::before
.cmdauthor::before
.cmddate::before
.cmdcategories::before
.cmdtags::before

Uses the CSS ::before pseudo-element to control text before each metadata element. Override the defaults in your own custom css. For example, the default text before the date is "Posted on:" If you wish to change that to "Article Date:", you would add the following style to your custom CSS.

.cmddate::before { 
    content: "Article Date: ";
}

The same concept applies to the other elements.

Q: Can I show it only on pages or only on posts?
A: You should use a plugin such as Conditional Widgets or any similar plugin to control where this widget is displayed. 

== Screenshots ==
1. Widget settings
2. Widget displayed on front end

== Changelog ==

= 1.3 =

* Fix tag issues

= 1.2 =

* Variable bugs fix 

= 1.1 =

* Fixed blank author bug after WordPress 4.1 was released
* Changed the default font sizes in cmdstyles.css from 10px to 12px
* Removed category and tags from outputting on pages. These are post-only outputs.
* Added more descriptive instructions

= 1.0 =
* Initial release

== Upgrade Notice ==

= 1.1 =

* This version fixes the blank author bug introduced when WordPress 4.1 came out and made minor style and documentation changes. You should upgrade if your author name is no longer showing up in the widget.

= 1.0 =
* Initial release

== Additional Info and Usage==
Drag the Content Metadata Widget into your sidebar.

Place a checkmark next to each metadata item that you wish to display in the widget. Leave any unchecked that you do not wish to display in the widget.

For now, the widget displays only when viewing single pages and posts. Future versions may have more fine-grained control over where you wish it displayed.