=== Pinterest Pin It Button For Images ===
Contributors: iamdangavin
Tags: pinterest, pin-it, button, image, images, pinit, social media, hover, click, pinterest, pin images
Requires at least: 3.2.1
Tested up to: 3.4.1
Stable tag: 0.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Add a Pin It! button over your images! CSS3 Fade In/Out with the ability to upload your own custom image!

== Description ==

Want the ability to add a Pinterest Pin It button to your images? This plugin will add a Pin It button over images on your site with simple CSS3 fade transitions. You can activate the plugin and use the default Pin It image, or go to Settings > Pin It! to upload your own custom image! Simple as that. Enjoy!
	
*Please use the forum for any issues you might have.*

(This is an unofficial plugin and is not related to, or endorsed by, Pinterest or it's affiliates)

== Installation ==

1. Upload the folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Optional: Head to Settings > Pin It! to upload your own image
4. Enjoy!

== Frequently Asked Questions ==

= The Pin It! Button isn't placed in the correct area =

This plugin comes with minimal CSS that gets added to your site. You can always override these CSS settings by adding your own custom styles and placing them in your stylesheet.

= Where do I send my question to? =

Please avoid sending me e-mails or contacting me through the website - the safest and most reliable place to contact me is through the forum at http://wordpress.org/support/plugin/pin-it-button

Understand that this is a way too keep all plugin-related information in one place, and to help others find any problem you might have had and solved.

= What features do you intend on releasing in the near future? =

The option to control the placement of the Pin It Button over your images.

== Screenshots ==

1. Pin It! Settings page for uploading your custom image.
2. Pin It! Settings page showing the media upload box.

= Known bugs: =

1. If your image has padding, borders, or any additional placement styles. The Pin It! Default styles will need to be overwritten. 

== Changelog ==

= 0.3.1 =
* Released 2012-8-17
* Removed the height attribute from the wrapper and image. Changed it to auto. Was having issues with the wrong height being pulled in and causing images to be out of proportion.

= 0.3 =
* Released 2012-8-3
* fixed issue with new pattern being returned. If the image was wrapped in a link, I am now removing the link to the image, and removing the stray links it would leave in the template file. 
* Changed from div. to span so it would stay within the <p> tags. If you are using DIV tags, please update your CSS!
* Added the option to disable the fade in/out on the button

= 0.2 =
* Released 2012-8-1
* fixed issue with new pattern being returned. Was breaking short codes within the_content

= 0.1 =
* Released 2012-7-31
* Open beta test

== Upgrade Notice ==

= 0.2 =
Plays nice with short codes that are within your posts
= 0.1 = 
The ability to upload your own image. Aditional styling for alignleft, aligncenter, alignright.