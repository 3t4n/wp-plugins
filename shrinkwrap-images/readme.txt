=== Shrinkwrap Images  ===
Contributors: EmpireOfLight, joemoto
Tags: image, anti-piracy
Requires at least: 2.8
Tested up to: 6.6.2
Stable tag: 1.3.2


Add a protective coating onto your images to discourage downloading. 

== Description ==

This plugin will automatically add a tiny, invisible image on top of all of the images in your site. If a visitor right-clicks on one of your images, and selects "Save to Disk", they will download the clear tiny image instead of the image that appears. If they select "Copy Image", they will copy the clear tiny image instead of the image that appears.

You shouldn't notice any slowdown on your site after installing the plugin; it has a very low profile.

In no way does the plugin claim to prevent downloads entirely; it is merely an added protective measure for your images.

= Usage =


* Install the plugin through the Install Plugins interface or by uploading the `shrinkwrap_images` folder to your `/wp-content/plugins/` directory.
* Activate the Shrinkwrap Images plugin.
* That's it! Any image on your site is now coated with a clear, protective layer :)


== Installation ==

1. Install the plugin through the Install Plugins interface or by uploading the `shrinkwrap_images` folder to your `/wp-content/plugins/` directory.
2. Activate the Shrinkwrap Images plugin.
3, That's it! Any image on your site is now coated with a clear, protective layer :)


== Frequently Asked Questions  ==

= Does this plugin prevent image downloads? =

No. It is just a preventative step for image authors who want to do whatever they can to prevent downloads.

= My images arent getting shrinkwrapped!

If your images are in a slider, make sure they link to "none" in your slider's settings. Otherwise, let me know and I'll take a look. There are many scenarios that may be overriding the plugin's behavior.

= Why did you make this plugin? =

At my WordCamp Rochester 2017 talk, WordPress for Artists, I was asked if there were any plugins that could do this. Not finding one, I set about writing one myself.
 
 == Changelog ==

 = 1.3.2 =
 * Tested up to WP version 6.6.2 

 = 1.3.1 =
 * Tested up to WP version 6.5. 

 = 1.3 =
 * Tested up to WP version 6.1.3. 
 * Ignores images embedded via Base64, e.g. the flags in the Polylang plugin. 
 * Cleaner css

  = 1.2.9 =
 * Ignores images with a .gif extension, which are rarely if ever used for photos or artwork. Some add-ons use gifs for spacing and shrinkwrapping them can cause layout problems.

 = 1.2.8 =
* Tested up to WP version 6.0.

 = 1.2.7 =
* Tested up to WP version 5.9.

= 1.2.6 =
* fixes an issue with captions in Gutenberg gallery blocks.

= 1.2.5 =
* fixes extra space appearing below images in certain scenarios. Adds better compoatibility with Gutenberg blocks, especially image galleries.

= 1.2.4 =
* fixes image size conflict with Slider Revolution plugin

= 1.2.3 =
* fixed a bug where alignright class images were causing the shrinkwrapping image to be positioned incorrectly

= 1.2.2 =
* optimized php (thanks joemoto)

= 1.2 =
* Bug fixes.
* Added plugin banner.

= 1.1 =
* Now overlays clear.gif onto lightboxed images.
* Added plugin icon.

=1.0 =
* Initial Release.
 
 
== Upgrade Notice ==

Make sure you get the latest version.

== Localization ==

Want to contribute with a translation to your language? Please check at https://translate.wordpress.org/projects/wp-plugins/post-types-order
http://www.nsp-code.com
