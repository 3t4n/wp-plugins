=== African Flag Widget ===
Contributors: iandstanley
Tags: image widget, widget, sidebar, image, photo, picture
Requires at least: 3.5
Tested up to: 3.6
Stable tag: 1.1
License: GPL-2.0+
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A simple image widget to display a category specific image.

== Description ==

A Widget that can be included into sidebar to display flags depending on the category slug

Displays appropriate national flag for the african country based upon the '<category slug>.jpg' found in the child theme directory 
using get_stylesheet_directory_uri() 

== Installation ==

Installation is just like installing most other plugins. [Check out the codex] (http://codex.wordpress.org/Managing_Plugins#Installing_Plugins) if you have any questions.

Create a 'flags' directory in your theme (or child theme if you are using a child theme) and upload a bunch of jpg files one per category slug named using the categoryslug.gif format

<plugin_dir>/flags contains a set of african flags ready to use that can be copied to your <theme_dir>/flags for use

I have kept this flags directory separate so you can easily replace the flags. For example, if you want american state flags, <themedir>/flags and upload your state flags to that location.

== Screenshots == 

1. Sample screen shot of plugin in use showing national flag in installed sidebar widget.

== Frequently Asked Questions ==

= Can I use different images? =

Yes just add them to the flags subdirectory that you create in your theme or child theme directory

= Can I use different image types? =

Yes, but you will need to edit the source code to match your file types

== Upgrade Notice ==

= 1.0 =
Issue with displaying on single post page now fixed (does not display ... due to likelehood of multiple category posts)

= 0.7 = 
Modified plugin to use jpgs

= 0.5 =
Initial GPL'd Version

== Development Notes ==

Developed by iandstanley for a custom project, GPL'd and released to the world.

Feel free to fork

== Changelog ==

= 1.1 = 
* Corrected description

= 1.0 =
* Issue with displaying on single post page now fixed (does not display ... due to likelehood of multiple category posts).
* Centred images in block

= 0.9 =
* Inline CSS tweaks

= 0.8 =
* Fixes to bottom margin

= 0.7 =
* Converted gifs to jpgs
* Ammended widget to use jpgs instead of gifs

= 0.6 =
* Added banner-772x250.jpg in assets for wordpress widget site 

= 0.5 = 
* Initial Release
