=== LH Copy Media File ===
Contributors: shawfactor
Donate link: https://lhero.org/portfolio/lh-copy-media-file/
Tags: media, download, attachment, upload, media manager, files, images, backup 
Tested up to: 6.6
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Allows you to create duplicate images in the media library.

== Description ==
This plugin allows you to create duplicate images in the media library, rather than having to create a new copy of the image and upload it to WordPress again.

It works by copying the post and its metadata into a totally new file in the media manager. Any changes you make to the new copy of the attachment -- updating the caption or cropping, for example, will only be applied to the new attachment, not to the original.

This is useful if you want to edit or crop an existing image without effecting the original 

To use, go to the Library tab and you will see a copy file link below each media (this will only appear in list view, see faq)

== Frequently Asked Questions ==

= Why can't I see the copy file link in the media library? =

You are probably in the grid view in the media library.  To toggle the view from grid to list click the mode button in (usually in the top left hand corner). Then under each item you will see a Copy file link next to view.

= What is something does not work?  =

LH Copy Media File, and all [https://lhero.org](LocalHero) plugins are made to WordPress standards. Therefore they should work with all well coded plugins and themes. However many plugins and themes are not well coded or don't follow standards (and this includes many popular ones). 

If something does not work properly, firstly deactivate ALL other plugins and switch to one of the themes that come with core, e.g. twentyfifteen, twentysixteen etc.

If the problem persists please leave a post in the support forum: [https://wordpress.org/support/plugin/lh-copy-media-file/](https://wordpress.org/support/plugin/lh-copy-media-file/). I look there regularly and resolve most queries.

= What if I need a feature that is not in the plugin?  =

Please contact me for custom work and enhancements here: [https://shawfactor.com/contact/](https://shawfactor.com/contact/)

== Installation ==

== Installation ==

1. Upload the entire `lh-copy-media-file` folder to the `/wp-content/plugins/` directory.
1. Activate the plugin through the 'Plugins' menu in WordPress.


== Changelog ==

**1.00 March 27, 2016**  
Initial release.

**1.01 January 04, 2017**  
Better documentation and translation ready.

**1.02 July 30, 2017**  
Moved uploader to separate class.

**1.03 August 02, 2017**  
Now separate file.

**1.04 August 05, 2017**  
Updated copy url class.

**1.05 December 23, 2017**  
Better translation support.

**1.06 March 12, 2021**  
Singleton pattern.

**1.07 April 09, 2021**  
Updated plugin core class.

**1.08 April 16, 2021**  
Bug Fix.

**1.09 September 30, 2024**  
Escape url and minor code improvements.

**1.10 September 30, 2024**  
Further logic improvements.

**1.11 September 30, 2024**  
Added nonced protection and other checks.