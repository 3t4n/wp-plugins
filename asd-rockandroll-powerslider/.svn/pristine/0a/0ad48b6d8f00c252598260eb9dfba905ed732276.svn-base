=== ASD RockAndRoll PowerSlider ===
Contributors: michaelfahey
Donate link: https://paypal.me/artisanmichaelfahey
Tags: slider, slick.js, shortcode, woocommerce
Requires PHP: 5.6
Requires at least: 3.6
Tested up to: 5.0.3
Stable tag: 2.201902051
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
Plugin URI:  https://artisansitedesigns.com/plugins/asd-rockandroll-powerslider/
Author URI:  https://artisansitedesigns.com/staff/michael-h-fahey/

Is it just another WordPress slider? 
Or is it the single most powerful slider in any WordPress builder's arsenal?

=== Description ===
"RockAndRoll PowerSlider"
That's a pretty tall claim to make. So what's so great about this particular slider? 
There are a lot of good WordPress slider plugins to choose from.
What makes this one special?

Inherently responsive, mobile friendly, but still excellent on the desktop.

Touch-sensitive for touchscreen devices, plus all the usual arrows and dots.

Lots of slider options.

Powered in the browser by the awesome Slick.JS.

Can use any type of Page/Post/Media as a slide, including WooCommerce products.

PowerSliders and Powerslides have the ability to embed JavaScript code, so that an animated slideshow presentation can easily be built. The plugin automatically creates the JavaScript framework so that each slide's BeforeSlide and AfterSlide scripts are implemented as callbacks to the Slick.JS instance.

PowerSliders are easily embedded as shortcodes, example shortcodes are listed in the Edit PowerSlider screen.

All code in the RockAndRoll PowerSlider plugin (and ALL ASD plugins) has been audited through CodeSniffer, and contains proper escaping and sanitizing calls to prevent against hack attempts such as "SQL injection" and "cross site scripting."

Supports custom slide templates, and includes templates for PowerSlides and WooCommerce products.


== Installation ==
= Manual installation =
At a command prompt or using a file manager, unzip the .ZIP file in the WordPress plugins directory, usually ~/public_html/wp-content/plugins . In the In the WordPress admin Dashboard (usually http://yoursite.foo/wp-admin ) click Plugins, scroll to ASD RockAndRoll PowerSliders, and click "activate".

= Upload in Dashboard =
Download the ZIP file to your workstation.  In the WordPress admin Dashboard (usually http://yoursite.foo/wp-admin ) Select Plugins, Add New, click Upload Plugin, Choose File and navigate to the downloaded ZIP file. After that, click Install Now, and when the installer finishes, click Activate Plugin.

= After Install =

Create Some Slides
   In the Dashboard: 
   Select the Dashboard PowerSlides item, Add New
   Give the PowerSlide a name. (this won't show up in the slide when the default template is used.)
   You can put a little text in the editor.
   Click Featured Image to set an image.
   In the right column, click "+Add New Powerslidergroups", and add a new entry, something like "My PowerSlide Group"
   Publish the first slide.

   Click Add New to create another PowerSlide.
   Add text and Featured Image as before, but this time just check the Powerslidegroups entry "My PowerSlide Group", no need to create it again, and Publish the Slide.

   Two slides is enough for a slider to work.

Create A Slider
   Select the Dashboard PowerSliders item, Add New
   Give the PowerSlider a name.
   The default settings work fine, but you can set options as you like.
   Click Update.
   After the PowerSlider is Updated, the list of Shortcode Examples will grow
   
Insert the Shortcode.
   In the Edit PowerSlider screen, copy the first of the Shortcode Examples to a page in your site.
   [insert_powerslider powersliderslug="my-test-powerslider" powerslidegroups="my-powerslide-group"]
   (You might have to edit the powerslideslug or powerslidegroups fields if you used different names.)
   Click Update and you have a working PowerSlider.
   

= Using the Shortcode =
The base shortcode is [insert_powerslider]

Powersliders can be selected using the attributes 
   powersliderslug   (ex)   powersliderslug="my-powerslider"
   powerslidername   (ex)   powerslidername="My PowerSlider"
   powersliderid     (ex)   powersliderid="778"

Slides can be selected using:
*	The included "powerslidegrous" taxonomy 
   (ex) powerslidegroups="my-powerslide-group"

*  Any other defined taxonomy
   (ex) sometaxonomy="my-taxonomy"

*  Category
   (ex) category="my-category"

*  Post ID's
   (ex) ids="2345,2367"

*  Media Library ID's
   (ex) image_ids="3023,3027"

*  WooCommerce Product Category
   (ex) product_cat="my-woo-product-group"

Custom templates can be selected using the "template" attribute
   (ex) template="my-slide-template.php"
   (ex) template="woo-products-template.php"
If no template is specified, the default template powerslides-template.php is used.


== Frequently Asked Questions ==

[Q: How can I create and use a custom slide template?](https://artisansitedesigns.com/asdproducts/asd-rockandroll-powerslider/#faq-custom-template)

[Q: How can I add JavaScript to PowerSliders and PowerSlides to animate/automate?](https://artisansitedesigns.com/asdproducts/asd-rockandroll-powerslider/#faq-add-javascript)

[Q: How can I embed code that is automatically executed with jQuery(document).ready() ?](https://artisansitedesigns.com/asdproducts/asd-rockandroll-powerslider/#faq-automatic-execute)

[Q: How can I put a time delay on a function?](https://artisansitedesigns.com/asdproducts/asd-rockandroll-powerslider/#faq-time-delay)

[Q: Why does my PowerSlider/Powerslide embedded JavaScript code that contains a greater-than (>) or less-than (<) symbol crash?](https://artisansitedesigns.com/asdproducts/asd-rockandroll-powerslider/#faq-gt-lt-crash)

= Components =
* [Cuztom WordPress Library](https://github.com/gizburdt/cuztom)
* [Slick.JS](https://github.com/kenwheeler/slick/)

== Screenshots ==
1. Adding a PowerSlider
2. Adding a PowerSlide
3. Adding a ShortCode

== Changelog ==
= 2.201902051 2019-02-05 =
bugfix: global $this_asd_rockandroll_powerslider_version, so that it's in scope

= 2.201901281 2019-01-28 =
Submodule update and updated codesniffer audit.

= 2.201812101 2018-12-10 =
Submodule update.

= 1.201808221 2018-08-22 =
First release Candidate

== Upgrade Notice ==
= 2.201901281 2019-01-28 =

= 1.201808221 2018-08-22 =
First release, no upgrade notice.
