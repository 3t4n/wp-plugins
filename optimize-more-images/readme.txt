=== Optimize More! - Images ===
Contributors: aryadhiratara, thinkwebdev
Tags: lazyload, lazy load, core web vitals, pagespeed, performance, preload, web vitals, image
Requires at least: 5.8
Tested up to: 6.2
Requires PHP: 7.4
Stable tag: 1.1.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A lightweight yet powerful image, iframe, and video optimization plugin. Lazy load, preload, and more. No jquery dependency.


== Description ==

A lightweight yet powerful image, iframe, and video optimization plugin. Lazy load, preload, and more. No jquery dependency.

## Features

- **Lazy Load** - Lazy loading images, iframes, and videos, using the high performant `lazysizes.js`. No jquery dependency.
- **Preload Featured Images** - Automatically preloading featured image from common page/post (homepage, pages except homepage, single post, and woocommerce single product pages).
- **Use CDN for Images** - HTML rewrite if you want to serve images from your favorite CDN.
- **Add Missing Image Dimensions** - Add missing width and height attributes from your images.

**New** (since 1.1.1)

- Add `no-lazy` and `skip-lazy` class as default exclude class for lazyloading images.
- Enable `loading eager` to also target `no-lazy` and `skip-lazy` class.
- Automatically exclude featured image (add `no-lazy` class) from lazyloading if `Preload Featured Images` feature is enabled (useful to avoid `Largest Contentful Paint image was lazily loaded` warning in Google Pagespeed Insights ).
- Add `webp` extension to CDN HTML rewrite regex.

**New** (since 1.0.7)

- We changed the lazy load library from lozad.js to **lazysizes.js**.
- Add field to modify lazysize default configuration. Read the [docs](https://github.com/aFarkas/lazysizes/#js-api---options).
- Add fields to specify width and height fallback value if the Add Missing Image Dimensions feature failed to get the actual image dimension.

**New** (since 1.0.3)

- **Lazy load CSS Background Images** - Load faster by lazy loading background images from the CSS `background-image` property.  Tested and works well on CSS background image from `GenerateBlocks`, `Elementor`, and `Oxygen Builder`.
- **Noscript Fallback** - Extra option to use &lt;noscript&gt; fallback for lazy images and iframes.
- **Add Loading Eager** - Extra option to Automatically add `loading=eager` to the lazy load excluded list.

This plugin only adds 1 extra row in your database. And it will self delete upon uninstalation.

##About Lazysizes

Lazysizes is highly performant lazy load library, written by Alexander Farkas in pure JS with no dependencies.

**Taken from lazysize's github description**:
*High performance and SEO friendly lazy loader for images (responsive and normal), iframes and more, that detects any visibility changes triggered through user interaction, CSS or JavaScript without configuration.*

## Optimize More!

Need to optimize more? Try our [WordPress Speed Optimization's Service](https://thinkweb.dev/service/speed-optimization/).

## Other USEFUL PLUGINS TO OPTIMIZE YOUR SITE'S SPEED:

- **[Optimize More!](https://wordpress.org/plugins/optimize-more/)** - Selectively Optimize your CSS/JS Delivery: Load CSS Asynchronously, Delay CSS and JavaScripts until User Interaction, Preload Critical CSS and JavaScripts, and Remove Unused CSS and JavaScripts Files.

- **[Lazyload, Preload, and more!](https://wordpress.org/plugins/lazyload-preload-and-more/)** - A simplified version of this plugin. The plugin size is only around 14kb zipped. Without UI for settings, but you can customize the settings using filters.
The default configuration is the best for optimizing images and other media files to speed up your site (just install and activate it and you're good to go):
 - lazyload your below the fold images/iframes/videos,
 - preload your featured images,
 - and add loading=”eager” to your featured image and all images that have `no-lazy` or `skip-lazy` class.

## Other USEFUL PLUGIN:

- **[Shop Extra](https://wordpress.org/plugins/shop-extra/)** - A lightweight plugin to optimize your WooCommerce & Business site: Floating WhatsApp Chat Widget (can be use without WooCommerce), WhatsApp Order Button for WooCommrece, Hide/Disable WooCommerce Elements, WooCommerce Strings Translations, and many more.

- **[Animate on Scroll](https://wordpress.org/plugins/animate-on-scroll/)** - Animate any Elements on scroll using the popular AOS JS library simply by adding class names. This plugin helps you integrate easily with AOS JS library to add any AOS animations to WordPress. Simply add the desired AOS animation to your element class name with "aos-" prefix and the plugin will add the corresponding aos attribute to the element tag.

== Installation ==

#### From within WordPress

1. Visit `Plugins > Add New`
1. Search for `Optimize More Images`
1. Activate Optimize More! Images from your Plugins page
1. Find Optimize More! Images in your sidebar menu to configure settings

#### Manually

1. Download the plugin using the download link in this WordPress plugins repository
1. Upload `optimize-more-images` folder to your `/wp-content/plugins/` directory
1. Activate Optimize More! Images plugin from your Plugins page
1. Find Optimize More! Images in your sidebar menu to configure settings


== Frequently Asked Questions ==

= Why changing the lazy load library from lozad.js to lazysizes.js? =

More configurable.

= How to enable lazy loading CSS background images?  =

Lazy loading css background images requires some effort from your end. Add an extra `lazyload` class to each container which has css background image in your favorite page editor. Or, simply put (one of) the container class in the include list field, the plugin will automatically add an extra `lazyload` class to the container.

= Why is there preload featured image feature? =

This actually a good practice to add extra performance boost to your WordPress site.

On WordPress single post and WooCommerce single product pages, featured images usually appear on above the fold section, so it's better to preload them to avoid render blocking issues, just like any assets which required in above the fold section.

We can adapt this single post and single product behaviour in pages too. Set your hero / above the fold images as featured images to programatically, and automatically, preload them on all pages.

= Preload featured images not working? =

It calls images set as featured image in the native WordPress post/pages, using `get_post_thumbnail_id()` and `wp_get_attachment_image_src()`. Make sure you already adds them.

If you are using Elementor or other Page's builders, simply edit the pages with the native WordPress editor to set the featured image.

= This plugin preload the wrong image size in my post? =

By default, this plugin will be grab the url and preload the `full` image size and `woocommerce_single` for WooCommerce single product pages. You can change that using filter if your theme is uses different `image size`. See example below.

= How to change the image size of featured image when using Preload Featured Images feature? =

Here are some examples:

add_filter( 'preload_featured_images_image_size', function( $image_size, $post ) {
	if ( is_singular( 'post' ) ) { return 'large'; }
	elseif ( is_singular( 'product' ) ) { return 'full'; }
	else { return $image_size; }
}, 10, 2 );

= How to change the image file types for CDN HTML rewrite? =

Example if you want to include svg to your image CDN:

add_filter( 'opm_cdn_file_types', function($opm_cdn_file_types) {
    return $opm_cdn_file_types . '|svg';
} );

Example if you want to completely change the default file types:

add_filter( 'opm_cdn_file_types', function($opm_cdn_file_types) {
    return 'png|webp|svg';
} );

= Add Missing Image Dimensions not working? =

This depends on you theme or overal site's setup and how you upload your images. If it fails to grab the width and height of your images, you can specify the default image width and height fallback values that best suit your website situation in the provided fields.


== Screenshots ==

1. Lazy Loading Media Files (Image Tags, Inline Background Images, CSS Background Images, Iframes, Videos)
2. Preload Featured Images, useful to bypass critical image render blocking issue
3. Use CDN for your images, useful to decrease server load
4. Add missing image dimension (width and height attributes)


== Changelog ==

= 1.1.3 =

- Bug fix: add js pattern to lazyload video poster images
- Refactor the add image dimension class (in my tests, this one succeeded more often in adding image width and height)

= 1.1.2 =

- Enable `no-lazy` and `skip-lazy` class to lazy load background images
- Remove svg extension and only use `jpg|jpeg|png|webp` as the default file types for CDN HTML rewrite regex
- Introduce `opm_cdn_file_types` filter to change the file types of CDN HTML rewrite regex (see FAQ)
- Fix some bugs

= 1.1.1 =

- Add `no-lazy` and `skip-lazy` class as default exclude class for lazyloading images
- Enable `loading eager` to also target `no-lazy` and `skip-lazy` class
- Automatically exclude featured image (add `no-lazy` class) from lazyloading if `Preload Featured Images` feature is enabled (useful to avoid `Largest Contentful Paint image was lazily loaded` warning in Google Pagespeed Insights)
- Introduce `preload_featured_images_image_size` filter to change the `image size` of `featured image` in the plugin's FAQ.
- Add `webp` and `svg` to CDN HTML rewrite regex
- Add `dns-prefetch` for CDN url

= 1.1.0 =

- Enable exclude field to also exclude Lazy Load CSS BG Images class. Useful if we want to put generic class in the Lazy Load CSS BG Images include list

= 1.0.9 =

- Exclude 404 page for Preload Featured Image feature

= 1.0.8 =

- Re-commit to push 1.0.7 update on repo

= 1.0.7 =

- Change the lazy load library from lozad.js to lazysizes.js
- Add field to modify lazysize default configuration
- Add fields to specify width and height fallback value if the Add Missing Image Dimensions feature failed to get the actual image dimension

= 1.0.6 =

- Bug fixes: sometimes images take too long to appear on woocommerce products shortcode display in some themes

= 1.0.5 =

- Bug fixes

= 1.0.4 =

- Minor fixes: simplifying and add structure to the plugin menu name in the sidebar menu to incorporate our new plugin [Optimize More! - CSS](https://wordpress.org/plugins/optimize-more-css/)

= 1.0.3 =

- Added lazy loading CSS background image feature
- Added option to use no-script fallback
- Added option to automatically add loading=eager to the excluded list
- Minor fixes: admin css fixes, typo fixes, and plugin screenshot revision

= 1.0.2 =

- Minor fixes, plugin banner revision, typo fixes, and plugin screenshot revision

= 1.0.1 =

- Initial release