=== Ashtabula ===
Contributors: mlchaves
Donate link: https://ko-fi.com/marklchaves
Tags: slider, swiper, responsive
Requires at least: 5.3.2
Tested up to: 6.1.1
Stable tag: 1.0.0
Requires PHP: 7.2
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Ashtabula - A Swiper Slider Plugin for WordPress

== Description ==

This plugin allows you to use of the popular [Swiper.js](https://swiperjs.com/) library in WordPress. 

This is a minimalist plugin that is for displaying responsive cards in a slide. 

- On a large screen device, the slide will show a horizontal card (image on the left and text on the right). 
- On a small device, the slide becomes a stacked card with the image on the top and text on the bottom.

See the screengrabs below to get a visual or visit the [live demo](https://streetphotography.blog/ashtabula-swiper-slider/).

**Note**: You should be comfortable with HTML and CSS to use this plugin.

== Installation ==

1. Upload the contents of plugin zip file to the `/wp-content/plugins/ashtabula` directory, or install the plugin through the WordPress plugins page directly.
1. Activate the plugin through the 'Plugins' page.

== Usage ==

1. Use the [demo HTML file](https://github.com/marklchaves/ashtabula/blob/master/ashtabula-demo.html) as a starter template. Add this HTML to a HTML or code block/element to your page or post.
2. To add the images, use the example CSS below as a template. Add the CSS to your **Appearance** > **Customize** > **Additional CSS** or your child theme's `style.css` file.

CSS example to specify the background image for the responsive card in a slide.

`
/**
 * Swiper Slider Plugin Custom Styles
 */

#my-swiper-slide-1 {
 background-image: url(mybgimg-1.png);
}
#my-swiper-slide-2 {
 background-image: url(mybgimg-2.png);
}
#my-swiper-slide-3 {
 background-image: url(mybgimg-3.png);
}
`

== Frequently Asked Questions ==

= How can I change the Swiper.js settings? = 

You can override the `ashtabula.js` file. Here's an example.

Add this to your child theme's functions.php file.

`
/** Override Swiper Slider Plugin JS */
function override_ssp_js()
{
    wp_dequeue_script('ashtabula');
    wp_enqueue_script('swiper-slider-custom-js', get_stylesheet_directory_uri().'/js/swiper-slider-custom.js', '', '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'override_ssp_js', 100);
`

Create this file: `/js/swiper-slider-custom.js`. Add this code to the file. It will override the default plugin settings for Swiper.js.

`
/**
 * Make the slides:
 * 1. Slide up instead of 
 * to the right.
 * 2. Loop instead of rewind.
 * 3. Speed up to 3 seconds.
 */
(function () {
  let swiper = new Swiper(".swiper-container", {
    autoplay: {
      delay: 3000,
    },
    direction: "vertical",
    loop: true,
  });
})();
`

== Screenshots ==

1. Example slider card on large devices.
1. Example slider card on small devices.

== Changelog ==

= 1.0.0 =
* First release. Tested on the Twenty Twenty and GeneratePress themes.

== Upgrade Notice ==

= 1.0.0 =
* Now using a local copy of the Swiper 6.1.1 JS and CSS libraries.
* Changed plugin directory structure to follow [WordPress best practices](https://developer.wordpress.org/plugins/plugin-basics/best-practices/).

== Credits ==

Powered by [Swiper.js](https://swiperjs.com/).
