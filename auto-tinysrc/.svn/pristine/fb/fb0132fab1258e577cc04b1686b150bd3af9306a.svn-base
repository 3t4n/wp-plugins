=== Plugin Name ===
Contributors: Mark Kirby, ribot
Plugin Name: Sencha.io Src for WordPress
Plugin URI: http://mark-kirby.co.uk/2011/auto-tinysrc-wordpress-plugin
Tags: mobile, responsive web design, tinysrc, images, sencha.io src
Author URI: http://ribot.co.uk/
Author: Ribot
Requires at least: 2.7
Tested up to: 3.4
Stable tag: 1.1
Version: 1.1

Passes all images through the tinysrc service, optimising all your images for mobile.

== Description ==

[Sencha.io src](http://src.sencha.io/) is a service provided by Sencha which dynamically shrinks your images according to the device accessing them. This helps shrink images for mobile, and will cut down the size of a site with a [responsive design](http://www.alistapart.com/articles/responsive-web-design/). 

This plugin replaces all image tag src's within your content with the tinysrc src (http://mysite.com/myimage.png becomes http://src.sencha.io/http://mysite.com/myimage.png), and provides a function to call in your themes to optimise those images.

== Installation ==

1. Upload `auto-tinysrc.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Place `<?php 
if (function_exists('get_tinysrc_image')) { 
  get_tinysrc_image('image_url'); 
} else { 
  echo image_url;
} ?>` in your templates to display any template images optimised, e.g. 
   `<?php 
   $image_url = get_bloginfo('template_url').'/images/bonsai_404_error.png';
   if (function_exists('get_tinysrc_image')) { 
      get_tinysrc_image($image_url); 
   } else {
      echo $image_url;
   } ?>`
1. To get a variable containing the url of an image with the tinysrc url use `<?php 
if (function_exists('get_tinysrc_image')) { 
   get_tinysrc_image(get_bloginfo('template_url').'/images/bonsai_404_error.png', false); 
} ?>`

== Frequently Asked Questions ==

= What happens if sencha.io src goes down =

If the service goes down (which as its backed by Sencha, it shouldn't for long), simply deactivate the plugin to serve all the images from your server again. If you use the template code, be sure to use the `<?php if (function_exists('get_tinysrc_image'))` code so that you serve the original image again when deactivating the plugin.

= What happens if I want to replace Sencha.io Src for WordPress with another similar service, or Sencha.io src change their url again=

Go to the settings (Settings -> Sencha) and change the url for your desired replacement.

== Changelog ==

= 1.0 =
* First release

= 1.1 =
* Updated name to reflect tinysrc's change in branding to Sencha.io Src
* Updated URL to latest http://src.sencha.io/

== Upgrade Notice ==

= 1.0 =
First release

= 1.1 =
Moves to use the latest version of tinysrc, rebranded as Sencha.io Src

== Screenshots == 

None

== Donations ==

None