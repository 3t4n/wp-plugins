=== Media Library File Size ===
Contributors: SS88_UK
Donate link: https://paypal.me/SS88/
Tags: file size, media library, image size, library size
Requires at least: 4.1
Tested up to: 6.7
Stable tag: 1.6.4
Requires PHP: 5.6
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Displays the Media Library file sizes, including collective variants, and adds the ability to view/download each variant image!

== Description ==

Update in 2024: We're thrilled to announce the latest upgrade to our acclaimed Media Library File Size plugin for WordPress – Version 1.6! 🎉 This powerful update takes your media management to new heights, offering an unparalleled level of detail and control over your image variants. Now you can simply click the button 'View Variants' to show a modal with all the listed variants of an image. Details include, full URL, file name, and file size.

Improve your Media Library functionality by introducing a new column that showcases the sizes of files, including collective variants efficiently. This lightweight plugin empowers you to effortlessly sort files based on their respective file sizes. Click the 'Index Media' button after installation.

https://youtu.be/Tt5kdo8NH70

Images and videos play a crucial role in engaging visitors and making a website visually appealing. However, managing these files can become a daunting task, especially when you have a large number of media files on your website. WordPress does offer a media library that allows users to upload and manage media files, but it falls short when it comes to providing information about file sizes. This is where the “Media File Sizes” plugin comes in.

* By default sizes may show without the need to run an index however, indexing the Media Library is highly recommended.
* If sizes do not show, you can click the Index Media button within the Media Library to index/re-index items.
* Shows file size of primary file, plus combined sized for variants (images).
* Ability to order the media items by file size.

== Installation ==

Use the automatic installer via WordPress or download the plugin and:

1. Upload the plugin files to the `/wp-content/plugins/media-library-file-size` directory.
1. Activate the plugin through the 'Plugins' screen in WordPress.
1. Navigate to the Media Library and click the Index Media button.

== Screenshots ==

1. The Media Library view with the new File Size column and 'Index Media' button.
2. Pressing this button indexes your Media Library file sizes.

== Frequently Asked Questions ==

= The file size does not show for an attachment in the media library? =

First try to index the Media Library by pressing the button 'Index Media' (when viewing the Media Library in list view mode). If this fails, it usually means that the file does not exist locally on the server.

The most common reason is because the file has been offloaded onto a CDN. 

= I do not see a Index Media button? =

Make sure you are looking at your Media Library, and you are in List view. Grid mode does not work with this plugin.

= What is the additional file size e.g. ‘(+27 KB)’ in the file size column? =

This is a collective size of your thumbnails (and other sized images).

== Changelog ==

= 1.6.4 =
* Fix: Remove 'View Variants' link if no variants exist on images
* Fix: Index/Reindex populates the total size correctly
* Fix: Translation code fix + prep for later release

= 1.6.3 =
* Added prior version to trunk for rollback compatibility
* Minor fixes to code and readme.txt
* Rate us link

= 1.6.2 =
* Fix visibility of button on Activation of plugin

= 1.6.1 =
* File size fix in modal

= 1.6 =
* Many thanks for 2,000 active installations!
* This new version includes a 'View Variants' button, which opens a minimalist modal to show you all the different variants WordPress has for the selected image. This information includes filename, file size, width, height, and the wordpress size name use. You can also click the box to load that individual variant in a new tab!

= 1.5.1 =
* Potential memory issue fix for large libraries

= 1.5 =
* Added a 'Reindex Media' button to admin sidebar under Media
* Extra hooks for better count of file sizes

= 1.4 =
* This update requires pressing the Index Media button again
* Size of entire Media Library now shows next to title

= 1.3 =
* Spelling fix
* When uninstalling the plugin, it removes the post meta we use to index the files.
* Readme.txt updates
* Index check -- do not show 'Index Media' button if the library is already indexed (also fixes first time arrow).

= 1.2 =
* Added arrow and redirect when plugin activated to help users press the Index Media button

= 1.1 =
* Updated to work with WordPress 4.1+

= 1.0 =
* Initial release.

== Upgrade Notice ==
