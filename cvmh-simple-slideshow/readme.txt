=== Simple Slideshow ===
Contributors: cvmh,nicolasrenard
Developer: CVMH solutions (contact@cvmhsolutions.com)
Tags: slideshow, jquery
Requires at least: 3.6
Tested up to: 5.9
Stable tag: trunk
License: GPLv2 or later

Add a slideshow on your site.


== Description ==
A very simple slideshow.

= Current features =
* Easy to use
* Only fade effect
* Customizable (duration, description fields, slide link …)
* Arrows / dots navigation
* Slide description with add/delete fields
* Slide categories option
* Drag & drop ordering
* Shortcode
* Widget

Looking for a WordPress agency? Contact us: [agence web WordPress](http://www.agence-web-cvmh.fr)


== Installation ==
1. Unzip the plugin and upload the "cvmh-simple-slideshow" folder to your "/wp-content/plugins/" directory
2. Activate the plugin through the "Plugins" administration page in WordPress
3. Use the shortcode or the widget
4. Enjoy.


== Changelog ==

= 1.2.15 =
* Changed: WordPress tested up version

= 1.2.14 =
* Fixed: slideshow height on initialisation

= 1.2.13 =
* Changed: WordPress test up version
* Fixed: javascript interval variable

= 1.2.12 =
* Added: height calculation on window resize

= 1.2.11 =
* Fixed: height calculation

= 1.2.10 =
* Fixed: error in filter call

= 1.2.9 =
* Added: filter for slide content: cvmh_slide_content

= 1.2.8 =
* Changed: settings menu label

= 1.2.7 =
* Changed: replaced constant text domain by real string
* Changed: widget name

= 1.2.6 =
* Added: post id in cvmh_slide_content_field_{key} filer
* Changed: tested up version

= 1.2.5 =
* Fixed: slideshow height

= 1.2.4 =
* Fixed: slide-content markup
* Added: "cvmh_slide_content_field_{$index}" filter for each content field. Use index for target field (eg.: "cvmh_slide_content_field_0" for target first field).

= 1.2.3 =
* Added: contributor

= 1.2.2 =
* Added: Minor changes in default front css

= 1.2.1 =
* Changed: Hide categories in widget if option is disabled

= 1.2 =
* Added: New option for choose between background or image
* Added: Minify scripts and styles
* Added: Load front js and css only if required
* Changed: useless classes in functions
* Complete code review

= 1.1.3 =
* Changed: image size in admin table

= 1.1.2 =
* Added: Disable cvmh_slideshow post type in navigations menus
* Added: Translations

= 1.1.1 =
* Added: div when there is no description for styling improvement

= 1.1 =
* Added: categories
* Added: Delete auto drafts on uninstall if option is selected

= 1.0.3 =
* Fixed: add image bug

= 1.0.2 =
* Fixed: end of slide animation on chrome

= 1.0.1 =
* Added: plugin data delete on uninstall

= 1.0 =
* Initial Release.


== How to uninstall CVMH Simple Slideshow ==
To uninstall CVMH Simple Slideshow, you just have to de-activate the plugin from the plugins list.
