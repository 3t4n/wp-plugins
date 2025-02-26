=== 360 Photo Spheres ===
Contributors: MrGoodfellow
Donate link: https://www.paypal.me/360proserv/20
Tags: 360Production.Services, 360, sphere, 360 photos, 360 images, equirectangular, 360 sphere,
Requires at least: 4.6
Tested up to: 5.3.2
Stable tag: 1.3
Requires PHP: 5.2.4
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

This plugin was created by 360Production.Services to display 360 photos in a simple but interesting way.  

== Description ==
This plugin was created by [360Production.Services](http://360Production.Services) to display 360 photos in a simple but interesting way. The plugin is designed to be simple to load and use and allows multiple spheres containing 360 equirectangular photographs to be displayed on each page.

[Thank you to CssAnimation.Rocks for this sphere CSS tutorial!](https://cssanimation.rocks/spheres/)
== Installation ==
1. Upload the plugin files to the `/wp-content/plugins/360-sphere-images` directory, or install the plugin through the WordPress plugins screen directly.
1. Activate the plugin through the 'Plugins' screen in WordPress

Upload an equirectangular 360 image to your Media Library and copy the URL for the uploaded image.

Insert a simple sphere into a post or page using the following shortcode:

    [sphere size="300" url="Your 360 Image URL"]
	
Typically you want the height of your 360 image to be the same size as your sphere for faster image loading.  
If you are using a 300px sphere you will want your equirectangular image to be 600px x 300px for optimal loading.  
360 images should be in a 2:1 ratio and stitch smoothly on both sides for best results.
Using an image that fits your sphere size will ensure faster page loading time.
	
Further customization comes with Speed, Direction, Hover, and Title Options:

    [sphere size="300" url="Your 360 Image URL" speed="30" direction="right" hover="pause" Title="360 Photo Spheres"]
	
To link to another page:

    [sphere size="300" url="Your 360 Image URL" link="target link"]
	
To use PopUp:  The 'popup' parameter works with the 'link' parameter when the pop-up has a value, the external link no longer functions
All link parameters are designed to make embedding popups for those platforms easier.  Copy the src value from <iframe src='.... when embedding your content from these platforms.
Use the iframe SRC along with the popup value for the target.  For vr be sure to link to the highest quality image available.
The 'embed' option allows for any standard formatted HTML or iframe tags to be embedded in the popup window.

vr option requires that Jetpack be enabled and the VR plugin for Jetpack enabled in settings.

  VR:  Set link="High Quality 360 Image URL" and add: popup="vr" to your shortcode.
  IFRAME: Set link="any website SRC" and add: popup="iframe" to your shortcode.
  YOUTUBE:  Set link="YouTube embed SRC" and add: popup="youtube" to your shortcode.
  MAPS: Set link="Google Maps embed SRC" and add: popup="maps" to your shortcode.
  VEER:  Set link="Veer embed SRC" and add: popup="veer" to your shortcode. 
  ROUNDME:  Set link="RoundMe embed SRC" and add: popup="roundme" to your shortcode.
  EMBED:  set link="Any HTML formatted content or code" and add: popup="embed" to your shortcode.
  
PopUp VR Image Example:

    [sphere size="300" url="Your 360 Image URL" link="High Quality 360 Image URL" popup="vr"]
	
PopUp YouTube Video Example:

    [sphere size="300" url="Your 360 Image URL" link="YouTube Embed SRC" popup="youtube"]
	
PopUp Veer Video or Photo Example:

    [sphere size="300" url="Your 360 Image URL" link="Veer Embed SRC" popup="veer"]
	
ALL OPTIONS:

* Size= the dimensions of the sphere in pixels
  DEFAULT= 300  |  OPTIONS= 1 to ???
* URL= the URL of the 360 image
  DEFAULT= 360sample.jpg  |  OPTIONS= any equirectangular 360 image
* Speed= the amount of time for the image to rotate a complete 360 in seconds
  DEFAULT= 30  |  OPTIONS= 1 to ???
* Direction= direction of the movement for the image (OPTIONAL)
  DEFAULT= right  |  OPTIONS=  left, right
* Hover= pause image rotation on hover (OPTIONAL)
  DEFAULT= none  |  OPTIONS= none, pause
* Title= the title of the popup (OPTIONAL)
  DEFAULT= none  |  OPTIONS= text string
* Link= URL for image to link to (OPTIONAL)
  DEFAULT= none  |  OPTIONS= any hyperlink url, iframe URL, ect (see PopUp)
* PopUp= the type of Link to embed  (OPTIONAL)
  DEFAULT= not used  |  OPTIONS= vr, iframe, youtube, maps, veer, roundme, embed,

== Frequently Asked Questions ==

= How can I help? =

Feel free to [donate](https://www.paypal.me/360proserv/20) to this plugin development.

== Screenshots ==

1. screenshot1.jpg
2. screenshot2.jpg

== Changelog ==

= 1.0 = 
5/2/2018 – Updated compatibility for multiple spheres to be posted on a single page. Fixed Bug with container div.

= 1.1 =
5/10/2018 - Add support for Link, Direction, Hover

== Upgrade Notice ==

= 1.0 =
5/2/2018 – Updated compatibility for multiple spheres to be posted on a single page. Fixed Bug with container div.

= 1.1 =
5/10/2018 - Add support for Link, Direction, Hover

= 1.2 =
5/12/2018 - Add additional shortcode options including:  Title, PopUp Functionality, Rewrite Instructions

= 1.3 =
2/19/2020 - Test WordPress 5.3.2 Compatibility

== ToDo ==
* click and drag to change image direction.
* shadow around image to create more of a globe effect.
* shadow below image to create a floating effect.


