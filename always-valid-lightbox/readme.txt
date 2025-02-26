=== Plugin Name ===
Contributors: jaykyuu
Donate link: http://www.joffrey-quillet.fr/
Tags: lightbox, shadowbox
Requires at least: 3.0
Tested up to: 3.4.1
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Always Valid Lightbox is a Lightbox plugin whose markup adapts to the WP site's Doctype, in order to always provide valid HTML markup.

== Description ==

Always Valid Lightbox is a Lightbox plugin which can automatically add the HTML attributes needed to trigger the effect on content image links, so that
the user never has to add a class or an attribute to his content images in order to make the lightbox work.

Also, AVL allows the user to chose the attributes he wants inserted on his image links, depending on the Doctype declaration used in the website header.php template.
This way, the lightbox never generates markup validation errors at the W3C Validator test.

The jQuery lightbox effect is an adaptation based on David Ryan's jQuery lightbox tutorial : http://dryan.com/articles/jquery-lightbox-tutorial/

== Installation ==

1. Unzip the plugin and upload the 'always-valid-lightbox' directory to your `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Configure the plugin in the Always Valid Lightbox configuration section of your administration panel.


== Frequently Asked Questions ==

= I do not understand the plugin configuration page =

Here's an explanation for each option :

"Automatically include the jQuery library in your HTML document" : Always Valid Lightbox needs the jQuery library to work. If the jQuery script is already embedded in the <head> section of your documents, or if one of the plugins you're using automatically includes the jQuery library, you should check the "No" button. However, if there is no active instance of jQuery running on the front-end part of your website, you should check "Yes" in order for the plugin to work.

"Automatically detect the image links in your posts and apply the lightbox attribute to them" : "Yes" allows the plugin to work in automatic mode. This means the plugin will automatically detect your images and trigger the lightbox effect when you click on them. If you choose "No", you will have to manually edit your site contents and mark all the links which should trigger a lightbox effect with the 'data-lightbox="true"' or the 'rel="lightbox"' attributes.

"If you chose yes, select which attribute should be inserted in your code (choose accordingly with your doctype declaration)" :  only available if you chose 'Yes' to the previous option. It allows you to choose the kind of markup the plugin will automatically insert in your page to trigger the lightbox effect. No matter what choice you make, the lightbox will work. However, the W3C validity of your page will depend on it, so you should choose your markup in accordance with the DOCTYPE declaration found in your site header.

"Lightbox skin" : choose the appearance of your lightbox effect

For more information about HTML validation and Doctypes, please consult the following page : http://validator.w3.org/docs/help.html#validation_basics

= How do I display an image title under my lightbox images ? =

The lightbox effect automatically takes the HTML "title" attribute on your images in order to display image titles. So when uploading your images in your Wordpress posts, do not forget to fill the "Title" field.

== Changelog ==

= 1.1.3 =
* CSS modifications for better caption readability

= 1.1.2 =
* Replaced all "$" signs by "jQuery" in the "lightbox.js" file in order to avoid conflicts
* Added skins preview on the configuration page
* Added "title" attribute support

= 1.1.1 =
* Added jpeg to the recognized image types
* Changed the version of jQuery included to 1.7.2 minified

= 1.1 =
* Added skin selection in the admin panel
* New CSS style : black
* Fixed jQuery bug in the admin
* Fixed AJAX loader image bug

= 1.0 =
* Automatic image links detection and automatic addition of the necessary markup
* 2 different kinds of markups can be added to the page
* 1 skin available
* Plugin text is internationalized (all strings can be extracted and localized)