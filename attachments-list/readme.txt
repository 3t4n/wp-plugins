=== Simple News ===
Contributors: ecurtain
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=QG7JF2QUHGF6A
Tags: attachments, widget, shortcode
Requires at least: 3.0
Tested up to: 3.1
Stable tag: 1.1
License: GPLv2
Display a list of the attachments that were added to a post or page by the Attachments plugin. 
 
== Description ==
Display a list of the attachments that were added to a post or page by the [Attachments](http://wordpress.org/extend/plugins/attachments/) plugin.  

The Attachments plugin allows you to easily append items from the media library to posts, pages, etc, but does not directly interact with the theme.   

This plugin will display an list of those items, each as a link to the file.  

== Installation ==
1. Upload the plugin to your blog.
2. Activate it.
3. Use the "Attachments" plugin to add media files to posts and pages.
4. Show the attachments for a post or page using one of the following methods:
	* Add the "Attachments List" widget to the sidebar, 
	* Add the shortcode [attachments-list] to a post or page, or
	* Place `<?php show_attachments_list(); ?>` in your templates

5. You're done!

== Frequently Asked Questions ==

= How do I attach media files to my posts? =

You'll need to install the [Attachments](http://wordpress.org/extend/plugins/attachments/) plugin.  It's awesome.  

This plugin is just to display the attachments.

= How do I show a different icon size using the shortcode? =

Use the "size" parameter.   For example, [attachment-list size="medium"]

Sizes available:
*	default:	46 x 60
*	medium:		34 x 45
*	small:		23 x 30
*	casual:		50 x 55
*	none:		text only

= How about specifying a size using the function? =

Here's an example:  

	`<?php show_attachments_list('small'); ?>`

= Where did the "casual" icons come from ? =

It's a set of images I found at MimeTypes_DroplineEtiquette_mimetypes.  They're cute, right?

== Screenshots ==

1. List of attachments
2. List of attachments with medium icons
3. List of attachments with small icons
4. List of attachments with casual icons
5. Adding a widget 
6. The list of attachments as they were added with the Attachments plugin

== Changelog ==

= 1.1 =
* Added "casual" icon set
* Added Widget support
* Converted images to sprites

== Upgrade Notice ==

= 1.1 =
This version adds the "casual" icon option.

== Compatibility with the Attachments plugin ==

This plugin was developed and tested with version 1.5.2 of the Attachments plugin.  Feedback on success/failure with other versions of the plugin welcome.

Kudos to Jonathan Christopher for the Attachments plugin.