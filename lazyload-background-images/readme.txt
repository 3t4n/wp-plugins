=== LazyLoad Background Images ===

Contributors: proloybhaduri
Donate link: https://www.buymeacoffee.com/proloybhaduri/
Tags: lazybg, lazyload-bg,lazyload,speed-optimization,backgound-images-lazyload
Requires at least: 5.2
Tested up to: 6.5
Stable tag: 1.0.7
Requires PHP: 7.2
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Helps deferring offscreen background images and improves website speed by reducing HTTP requests . 

== Description ==

This plugin will delay the loading of  background images in your website and thus helps boosting the website loading time by reducing total number of HTTP requests.

### Quick Notes & Links

1. Do not lazyload background images which are peresent above the fold because this will increase time to First Contentful Paint(FCP)  metric and affect the speed of your website . 
2. Background images that are added using inline CSS e.g, ` <p style=" background-image: url( path/to/background-img.jpg )" > </p> ` are lazyloaded by this plugin by default . 
3. No dependencies required  for this plugin  to work. 
4. No extra HTTP request 
5. Add the selectors of the elements that have background images in the plugin settings page  or add `lazyload-bg` class to the element .
6. [WordPress Tips and Tricks By Proloy Bhaduri](https://proloybhaduri.com/ "WordPress Tips and Tricks by Proloy Bhaduri")
7. [Buy me a Coffee](https://www.buymeacoffee.com/proloybhaduri/ "Support Proloy Bhaduri")

#### Works smoothly with almost every page builders 

### Exclude certain inline background images from lazy loading using filter hook `lazyload_inline_bg_excludes`

 add_filter('lazyload_inline_bg_excludes',function($exclude_keywords){
    $exclude_keywords = [
        'bg-image.jpg',
        'class-name',
        'id',
        'or any unique keyword that the element with background image has'
    ];
 },10,1);

##### Note: Add the above code to the `functions.php` file of your active theme/child theme or using a code snippets plugin.  

== Installation ==

This section describes the way you can install the plugin 

*  You can directly install the plugin from wordpress admin screen of your site **Plugins > Add New** and search For *Lazyload Background Images* . 
*  Alternatively you can download the plugin file from the WordPress.org  and upload to your site via  **Plugins > Add New > Upload Plugin**  
*  Go to **Settings > Lazy Backgrounds** 

== Changelog ==

= 1.0.7 =

* Enhancement: Filter hook `lazyload_inline_bg_excludes` to exclude certain inline background images from lazy loading
* Fix: A deprecated notice while matching selectors

= 1.0.6 =

* Fixed some compatibility issues 

= 1.0.5 =

* Fix: Error Notice 

= 1.0.4 =

* Feature : Added support for Beaver , WP Bakery , Avada , Block editor 

= 1.0.3 =

* Fixed page builders issue 

= 1.0.2 =

* Added support for different page builders viz. Oxygen , Divi, Bricks and  Breakdance 

= 1.0.1 = 

* Updated readme.txt

= 1.0.0 =

* Initial release


== Upgrade Notice ==

= 1.0.2 = 

Upgrade the plugin to the latest 1.0.2 version to get  all the bug fixes and new features .

= 1.0.1 =

Upgrade the plugin to the latest 1.0.1 to get most of the fixes

= 1.0.0 =

Update to the latest version


