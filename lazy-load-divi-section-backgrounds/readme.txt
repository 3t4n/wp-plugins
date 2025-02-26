=== Lazy Load Divi Section Backgrounds ===
	Contributors: emandiev
	Tags:  Lazy Load, Divi, Divi Theme, Divi Optimization
	Requires PHP: 5.0
	Stable tag: 1.2
	Requires at least: 4.1
	Tested up to: 5.3
	License: GPLv2 or later
	License URI: https://www.gnu.org/licenses/gpl-3.0.html

	Improve your website performance by lazy loading section backgrounds. This plugin works only with the Divi Builder.

== Description ==

Improve your website performance by lazy loading section backgrounds! 
This plugin works only with the <a href="https://www.elegantthemes.com/plugins/divi-builder/">Divi Builder</a>, usually part of the Divi Theme.<br />
No configuration required.<br />
If you are looking to optimize your Divi-based website even further, check out my other plugins:<br /><a href="https://wordpress.org/plugins/lazy-load-divi-slider-backgrounds/">Lazy Load Divi Slider Backgrounds</a><br />
<a href="https://wordpress.org/plugins/responsive-divi-backgrounds/">Responsive Divi Backgrounds</a>

== Installation ==

1. Visit <strong>Plugins > Add New</strong>
2. Search for "<strong>Lazy Load Divi Section Backgrounds</strong>"
3. Download and Activate the plugin.

== Frequently Asked Questions ==

= What are the requirements? =

The Divi Builder by Elegant Themes.

= Something else? =

jQuery, but chances are you already load it. Most popular themes use it.

= What is Lazy Loading and why should I care? =

Lazy loading is a technique that defers loading of non-critical resources at page load time. Instead, these non-critical resources are loaded at the moment of need. Where images are concerned, "non-critical" is often synonymous with "off-screen". By lazy loading images, you improve your website's load speed. If you've used Google's PageSpeed Insights tool, you may have seen an opportunity called "Defer offscreen images". Google basically tells us to lazy load our images.

= I already have a lazy loading plugin! =

Most lazy loading plugins handle only the `<img>` elements from your pages.
Lazy loading background images requires a different approach and this plugin is specially designed to handle Divi Builder section backgrounds.

= What about browser support? =

All modern browsers are supported.

= What about users without JavaScript? =

If a visitor has disabled their JavaScript, they will still see the background images as normal.
However, they won't benefit from lazy loading.

= Will this plugin affect the performance in a bad way? =

The plugin should not cause any slowdown.
It's designed to help improve your website's performance.
The plugin won't load any additional files.
Instead, it prints CSS and JS inline in the <head> section and after the main content respectively.

Unlike most plugins, the required resources will only be included on the pages which need them.
The plugin checks the current page's content and if there is a section with a background image the CSS and JS get printed.
All other posts/pages won't be affected to maximize performance.

= It doesn't work on my website. Do you know why? =

1. Check if the Divi Builder (or Divi Theme) is updated.
2. Check if the browser's console (F12) shows any errors. jQuery should be loaded and if it's not you will see an error.

== Changelog ==

= 1.0.0 =
* 02/12/2018:
Initial release.
= 1.1.0 =
* 04/12/2018:
The plugin will now handle parallax backgrounds as well.
= 1.2.0 =
* 05/12/2018:
Improved performance.
The plugin will now only print CSS and JS when the page contains a Divi Builder section with a background image.