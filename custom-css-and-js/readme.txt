=== Custom CSS and JS ===
Contributors: pjdietz
Tags: post, css, stylesheet, javascript
Requires at least: 2.8
Tested up to: 2.9.1
Stable tag: trunk

Custom CSS and JavaScript allows you to add custom internal and external CSS and JavaScripts to individual posts.

== Description ==

[Custom CSS and JS](http://pjdietz.com/wordpress-plugins/custom-css-js/) allows you to add stylesheets and JavaScripts to any individual post by adding custom fields. Both CSS and scripts can be either internal or external. Since this is a plugin, the custom CSS and JavaScript are available to any theme used to display the post, as long as the themes call "wp_head".

== Installation ==

1. Unpack the download package.
2. Upload folder to the “/wp-content/plugins/” directory
3. Activate the plugin through the “Plugins” menu in WordPress


== Using the Plugin ==

To use the plugin, add any combination of the following custom fields to your post.

**custom_css**
Add an external stylesheet by adding a custom field with the name **custom_css**. The value of the field should be the path to your css file.

**cusrom_css_code**
Add an internal stylesheet by adding a custom field with the name **custom_css_code**. Include your CSS code as the value. (Do not include the style tags.)

**custom_js**
Add an external JavaScript by adding a custom field with the name **custom_js**. The value of the field should be the path to your script.

**custom_js_code**
Add an internal JavaScript by adding a custom field with the name **custom_js_code**. Include your JavaScript code as the value. (Do not include the script tags.)


== Custom Fields Order ==

1. The external styles and scripts are included before the internal ones.
2. If you include multiple entries for a given field, the entries will be included in order.


== Okay, but what if I don’t like those tags? ==

Just edit custom-css-js.php and change the constants defined near the top of the file.

== Note ==
This plugin only works with individual posts and pages. It does not work for list pages (e.g., the index page, search results).
