=== Add Watermarks ===
Contributors: michael.zangl
Tags: watermark, media, htaccess
Requires at least: 4.0.0
Tested up to: 4.9.8
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Adds watermarks to selected images without changing the original image.

== Description ==


This plugin allows you to add a watermark images on all images that were uploaded in your wordpress. The watermark is generated on-the-fly and cached for faster access.

To see the plugin in action, select "Add watermark to all images", chose a watermark image and and submit the settings page. You should then see the watermark appearing on your site. You might need to reload the page (F5 in most browsers) to bypass the browser cache.

The plugin does not change your source images. To disable all watermarks, simply disable the plugin, and everything is back to normal.

If you encounter errors (especially syntax errors), check your PHP version. It should be at least 7.0. This plugin requires Apache and mod_rewrite.

== Installation ==


You need an apache Server with mod_rewrite installed and a recent php version with gd enabled. ~90% of the web hosting providers out there provide this by default.

Install and activate this plugin.

Then go to Settings->Add watermark. You can upload or chose your watermark image there. For a first test, you can leave the position settings as they are.

= Manual uninstall =

Mind that the plugin adds a .htaccess file for processing the images.

If you deactivate / uninstall it, the hooks will automatically be deleted.

If that fails (or you want to uninstall manually), delete:

* The plugin directory (as you would with every other plugin)
* Delete wp-content/uploads/.htaccess
* Delete wp-content/uploads/watermark-cache/

== Frequently Asked Questions ==


= Will this plugin need extra space =

Yes. since all images are cached with a watermark, you need twice the space for images on your server.

= Does this plugin reduce performance = 
Not much. You might experience a longer loading time on the first access to the image (normally when you upload it or on your first view of the post). But afterwards there will be no speed impact, since all logic is encoded in a htaccess-File and not in PHP.

= How can I remove a watermark =
Go to the media library, switch to list view (not gallery). Select the checkbox next to the image and then chose "Remove watermark" from the dropdown on the top of the page.

== Screenshots ==

1. You can select an image to use as watermark and to which images watermarks should be applied.
2. The settings to adjust the position of the watermark. Those are lots of numbers, but there is a (resizeable) live preview area ;-). If you are familiar with CSS, you should have no problem with this.
3. You can add or remove watermarks from individual images in the media library.

