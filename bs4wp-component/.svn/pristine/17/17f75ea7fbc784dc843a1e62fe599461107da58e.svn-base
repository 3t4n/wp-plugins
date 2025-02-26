=== BS4WP Component ===
Contributors: hakik
Tags: carousel, slider, bootstrap slider, bootstrap carousel, bootstrap4 carousel, custom css field
Requires at least: 4.6
Tested up to: 5.6
Stable tag: 1.1
Requires PHP: 5.2.4
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

This is a plugin to display your favorite Bootstrap4 Slider. When activated you can add slider in any place using shortcode.

== Description ==

This is a lightweight plugin to display carousel in any screen.

Just install the plugin and you will get options of this plugin in Settings > General > Bootstrap 4 Component Settings Section

If you are running a theme which is built with Bootstrap4 then you don't need to change the settings. But if your theme is not
built with Bootstrap4 and you want to use Bootstrap4 Carousel you have to change it to "Yes".


== Usage ==
1. First Upload the images, which you want to show as slides
1. Each image has unique id copy that id and set it in `[bs4slide id="IMAGE_UNIQUE_ID"]`

**Basic Slider [No dots, No arrows, No Caption]**

`[bs4slider id="test_slider"]
[bs4slide id="26" active="active" alt="first" /]
[bs4slide id="26" alt="second" /]
[bs4slide id="26" alt="third" /]
[/bs4slider]`

**Slider With Arrow [No dots, No Caption]**

`[bs4slider id="test_slider" arrow="yes"]
[bs4slide id="26" active="active" alt="first" /]
[bs4slide id="26" alt="second" /]
[bs4slide id="26" alt="third" /]
[/bs4slider]`

**Slider With Arrow and Dots [No Caption]**

`[bs4slider id="test_slider" arrow="yes" dot="2"] // If 3 images then dot 2 it counts from 0
[bs4slide id="26" active="active" alt="first" /]
[bs4slide id="26" alt="second" /]
[bs4slide id="26" alt="third" /]
[/bs4slider]`

**Slider With Arrow, Dots and Caption**

`[bs4slider id="test_slider" arrow="yes" dot="2"]
[bs4slide id="26" active="active" alt="first" cap_title="First slide label" cap_subtitle="Nulla vitae elit libero, a pharetra augue mollis interdum." /]
[bs4slide id="26" alt="second" cap_title="First slide label" cap_subtitle="Nulla vitae elit libero, a pharetra augue mollis interdum." /]
[/bs4slider]`

**Usage in PHP Code**

`<?php echo do_shortcode('
[bs4slider id="test_slider"]
[bs4slide id="26" active="active" alt="first" /]
[bs4slide id="26" alt="second" /]
[bs4slide id="26" alt="third" /]
[/bs4slider]
'); ?>`

**N.B. Don't press enter after each slides[bs4slide] otherwise the shortcode will be broken.**


== More Attributes ==

**[bs4slider]**

1. [bs4slider class="YOUR_OWN_CLASS"] if you want
1. [bs4slider id="YOUR_OWN_ID"] for making unique each slider
1. [bs4slider arrow="yes/no"] by default it is "no"
1. [bs4slider left_icon="fas fa-angle-left"] If you are using Fontawesom
1. [bs4slider right_icon="fas fa-angle-right"] If you are using Fontawesom
1. [bs4slider dot="3"] by default it is null. If you have 4 slide it will be "3"


**[bs4slide]**

1. [bs4slide class="YOUR_OWN_CLASS"] by default it is "d-block w-100"
1. [bs4slide id="YOUR_UPLOADED_IMG_ID"]
1. [bs4slide size="YOUR_DESIRED_IMG_SIZE"] by default it is "large"
1. [bs4slide alt="YOUR_IMG_ALT"] by default it is null
1. [bs4slide active="active"] from this image you want to start the slider
1. [bs4slide cap_class="YOUR_OWN_CLASS"] It will help your for responsive control. By default "d-none d-md-block"
1. [bs4slide cap_title="YOUR_TITLE_TO_DISPLAY"] By default it is null. If you have no need to display caption no need to use it.
1. [bs4slide cap_subtitle="YOUR_SUB_TITLE_TO_DISPLAY"] By default it is null. If you have no need to display caption subtitle no need to use it.


== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/bs4wp-component` directory, or install the plugin through the WordPress plugins screen directly.
1. Activate the plugin through the 'Plugins' screen in WordPress
1. Use the Settings >General > Bootstrap 4 Component Settings Section to configure the plugin
1. (Make your instructions match the desired user flow for activating and installing your plugin. Include any steps that might be needed for explanatory purposes)


== Frequently Asked Questions ==

= What the purpose of this plugin? =

To show a carousel/slider in any place of a WordPress site.

= Can I use the shortcode in widget? =

Yes, absolutely you can.


== Screenshots ==

1. Settings of Plugin
2. Upload your image to media library
3. Get the ID of the image from browser address bar
4. Paste the shortcode in any page you want
5. Write your own CSS here

== Changelog ==

= 1.1 =
* CSS editor added for this plugin to write more styles.
* More property added for extreme control on your component.

= 1.0 =
* Initial version.


== Upgrade Notice ==

= 1.1 =
A CSS editor has been added for customize the look of the component BS4WP is providing. You can write here your own CSS and after deleting the plugin all the settings and css will be removed.

= 1.0 =
Initial version.

