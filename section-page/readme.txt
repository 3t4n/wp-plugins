=== Section Page ===
Contributors: Skyree
Donate link: 
Tags: content, shortcode, section, dropdown, page, pages, post, posts
Requires at least: 3.0
Tested up to: 3.5.1
Stable tag: 1.0.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A simple plugin allowing you to insert dropdown sections in your wordpress pages and posts.

== Description ==

Section Page a simple plugin allowing you to insert dropdown sections in your wordpress pages and posts.

= Prerequisite =

This plugin loads wordpress jQuery.

= Options =

* HTML tag for section title : Can be `h1` `h2` (by default) `h3` `h4` `span` `strong` `em` `p`
* HTML classes for section : Additional html classes for each sections (optionnal)
* HTML classes for section title : Addtional html classes for each sections title (optionnal)
* HTML classes for section title wrapper : Addtional html classes for each sections title container (optionnal)
* HTML classes for section content : Additional html classes for each sections content (optionnal)
* Use a char before section title : Add or not html chars at the left of each sections title
* Char when section is closed : Char when a section is closed (default : `&#9658` )
* Char when section is open : Char when a section is open (default : `&#9660` )
* Use animation : Smooth or instant dropdown
* Custom Css : Customize the plugin here (optionnal)

= Usage =

The plugin add a "Add dropdown section" button to your tinymce editor.  
Select your block of text and click the button to wrap the text into a section shortcode.


	[section=Title of my section]
	Your content
	...
	[endsection]

This will be automatically replaced by a dropdown section based on the plugin settings.

= Customization =

Use the Custom Css option with the custom classes options.  
You can also modify your theme css file if you are using wordpress on your ftp.  
Now when a section is open, it receive the css class `owc-sp-active` so you can use it for more customization.

== Installation ==

1. Upload the folder `section-page` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress


== Screenshots ==

1. This is the plugin option panel, available in settings menu.
2. This is the tinymce button added by the plugin and the shortcode generated.
3. This is how your content will look with the plugin activated and shortcodes placed.

== Changelog ==

= 1.0.2 =
* New option `Use animation` *Smooth or instant dropdown*
* Modified option : `HTML classes for section title` *Now targets the title tag*
* New option `HTML classes for section title wrapper`  *Previously "Html classes for section title"*
* New option `Custom css` *Enter your custom css here*
* You can now use the css class owc-sp-active as a callback when a section is open

= 1.0.1 =
* Bug fix on `HTML classes for section title` and `HTML classes for section content`. Please upgrade if you want to use your own classes on these elements. Else you can use `owc-sp-open` and `owc-sp-content` which are the default classes.