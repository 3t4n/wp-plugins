=== Featured Image Zoom ===
Contributors: numeeja
Donate link: https://cubecolour.co.uk/wp
Tags: magnify, zoom, featured image, thumbnail, image, responsive
Requires at least: 4.7
Tested up to: 6.5
Stable tag: 2.1.0
License: GPL / MIT

Add a [zoom] shortcode to display a zoomable featured image.

== Description ==

Add the **[zoom]** shortcode to a page, post or custom post-type post. If the post has a featured image it will displayed on the page, and when you move the cursor over the image, the image will be magnified with the image viewport remains constrained to the dimensions of the original image.

on a mobile/touch device the image will also be zoomable, but as there is no hover state this is achieved by means of a pinch & zoom action.

On my site you can see a [demo](https://cubecolour.co.uk/featured-image-zoom/ "demo of Featured Image Zoom") of the plugin.

= Usage: =

Ensure that your post/page has a featured image defined.

Use a **[zoom]** shortcode to your page.

Some optional shortcode parameters can also be used.

=size=
The **large** image is used by default for the unzoomed image. Use the size parameter to use a different defined image size.

eg '[zoom size=thumbnail]'

=zoomsize=
The **full** image is used for the zoomed overlay. This can be changed using the **zoomsize** shortcode parameter.

eg '[zoom zoomsize=large]'

The image size definitions used for the the unzoomed and zoomed images should have the same aspect ratio and cropping.

=zoomin=
This can be used to tweak the level of zoom. The value must be a positive integer. The default is 6 so if the zoom level results in too much magnification on hover, try a lower value.

eg '[zoom zoomin=2]'

== Installation ==

1. Upload the plugin folder to your '/wp-content/plugins/' directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

= Where is the plugin's admin page? =

There isn't one. This is a lightweight plugin with no options apart from the shortcode parameters so there is no need for an admin page.

= How can I use this in a theme template =

You can call the shortcode within the template:

`echo do_shortcode( '[zoom]' );`

Or you can directly use the shortcode's function, passing an empty value for the parameter values to use the defaults. You can confirm that the plugin is active by first checking that the function exists:

`
	if ( function_exists('cc_zoom_featured_image') ) {
		echo cc_zoom_featured_image('');
	}
`
To use this with different values for any of the parameters, the parameter/value can be included in an array:

`
	echo cc_zoom_featured_image( array( 'zoomin' => '2') );
`

= I am using the plugin on my site and I love it, how can I show my appreciation? =

You can make a donation via [my donation page](https://cubecolour.co.uk/wp/ "cubecolour donation page")

I would also appreciate a review on the [plugin review page](https://wordpress.org/support/view/plugin-reviews/featured-image-zoom/ "Featured Image Zoom plugin reviews") if you enjoy the plugin.

If it isn't working for you, please refer to the documentation and existing posts on the plugin's forum. If the existing answers do not address your issue, please post a question on the [plugin support forum](https://wordpress.org/support/plugin/featured-image-zoom "Featured Image Zoom forum"). If you have problems and leave a negative review before asking for support, that is very unhelpful and actually tells people more about you than about the plugin. Please don't be **that guy**.

== Screenshots ==

1. Featured Image at Large size shown on the page.
2. Zoomed Full Size Featured image.

== Changelog ==

= 2.1.0 =
* Added 'zoomin' parameter to give more control over the zoom level

= 2.0.0 =
* Totally new version. Completely rewritten
* Now uses imagezoom instead of elevatezoom
* Featured image can now be placed anywhere in the page
* Different image size can be specified in the shortcode (defaults to large as in previous versions)
* No forced reloads on browser resize
* No experimental loupe mode

= 1.1.2 =

* Loupe mode is designated as experimental and unsupported due to issues with the script on IOS devices

= 1.1.1 =

* Added jQuery resize event script - so scrolling events in IOS do not trigger resize
* Additional zoom type: Loupe

= 1.1.0 =

* After resizing the browser, refreshes from cache rather than fetching from server
* Fixed iPhone continuous reload
* Only loads js files on pages that call the shortcode function

= 1.0.1 =

* Fix notices seen with WP_DEBUG enabled


== Upgrade Notice ==

= 2.1.0 =

* This version adds a new optional 'zoomin' parameter to give more control over the zoom level

= 2.0.0 =

* Totally new version. Completely rewritten
* Now uses imagezoom instead of elevatezoom
* Featured image can now be placed anywhere in the page
* Different image size can be specified in the shortcode (defaults to large as in previous versions)
* No forced reloads on browser resize

= 1.1.1 =

* Improved responsive functionality

= 1.1.0 =

* Improved responsive functionality

= 1.0.1 =

* Fix notices seen with WP_DEBUG enabled

= 1.0.0 =

* Initial Version