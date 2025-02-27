=== scrollToTop ===
Contributors: rom4i
Plugin Site: https://about.me/sarvaroff
Donate link: https://paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=LNVRV7LL39E2E&source=url
Tags: scroll to top, back to top, scroll, to top, scroll up, bar, button
Requires at least: 3.0.1
Tested up to: 5.4.2
Stable tag: 1.16
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Create your own back to top button or full-height bar and simple customize it as you want.

== Description ==
scrollToTop is a small plug-in that will help you to make a nice looking back to top button or full-height bar on your Wordpress website. You don't need any knowledge in HTML, CSS or JS: the plug-in has many settings which you can change in just one click.

= Features =
* Bar and Button mode
* Choose 1 of 15+ arrow icons (which are merged in a font)
* Change position, size, color, opacity and other styles
* Enable/disable/change back to top text
* Change animation effects (none/fade/slide)
* Enable/disable async & defer script loading
* Mobile friendly

== Screenshots ==

1. Bar and Button mode.
2. A small demonstration of what can be done in 1 minute.
3. Settings page

== Installation ==

**Through Dashboard**

1. Log in to your WordPress admin panel.
2. Go to Plugins -> Add New and type **scrollToTop** in the search box.
3. Find scrollToTop and click on Install Now, after that activate the plugin.
4. Go to Settings -> scrollToTop and customize back to top button as you want!

**Installing Via FTP**

1. Download the plugin to your hardisk and unzip it.
2. Upload the **scrollToTop** folder into your plugins directory.
3. Log in to your WordPress admin panel and activate the plugin.
4. Go to Settings -> scrollToTop and customize back to top button as you want!

== Frequently Asked Questions ==

= Will scrollToTop work on any template? =

The plug-in can be installed and will work on any template, however full-height bar may not fit horizontally. Do you have enough space for that?

= I'm a template developer =

Use 'scrolltotop_default_settings' filter to change default plugin settings. 
You can see available settings in 'includes/scrolltotop-functions.php'.

= I have a question/I'm need support =

I will help you on any question on our [support forum](https://wordpress.org/support/plugin/scrolltotop).

== Changelog ==

= 1.16 =
* Hotfix for 1.15

= 1.15 =
* Wrap all js to `$(document).ready(/* ... */)` to make plugin work, if its scripts loaded after creating container
* Add new options "scroll to value/element", what can set top scroll position (it was `0` always before)

= 1.14 =
* WordPress 5.4.x support
* Code refactoring

= 1.13 =
* Stop animation when user manually scroll
* Added minified files
* New admin page settings

= 1.12 =
* Global fixes

= 1.11 =
* Fixed scrollToTop bar with admin-bar height issue.

= 1.1 =
* Added .pot file for translation in future
* Fixed js file `async` loading

= 1.09 =
*Optimized for faster work*

* Add inline javascript caching (via transient creation)
* Less javascript in html
* Optimized js file
* Add `id` attribute to a container

= 1.08 =

* New option: transform bar into button instead of hide

= 1.07 =
*WordPress 5.2 support*

* Tested up to 5.2
* Background with 0 opacity like `background: rgba(255,255,255,0)` to just `background: transparent`
* Add some cross browser codes

= 1.06 =
*WordPress 5.1 support*

* Tested up to 5.1

= 1.05 =
* New options for CSS files & inline styles output

= 1.04 =
* Global fixes

= 1.03 =
*WordPress 4.9 support*

* Tested up to 4.9.1
* Fix WP Color Picker plugin

= 1.02 =
*Added a lot of new features*

* Bar and Button mode.
* Advanced background.
* Sticky width.
* New arrow icons.
* New animations.

= 1.01 =
* Bug fix.

= 1.0 =
* Initial release.


