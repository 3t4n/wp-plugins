=== Advanced Page Template ===
Contributors: xingxing
Tags: page, template, advanced, custom, field, custom field
Requires at least: 3.0.0
Tested up to: 3.9
License: GPLv2 or later




== Description ==

Advanced Page Template is a nice new approach to custom fields by page template.
Please try to configure the custom fields easily in the template file itself using this plugin.

It doesn't require to save any configuration data to database, just config the custom fields in template file itself as how wordpress recognize the templates - Its just wordpress way!

I think that it makes developing and deploying more easy and more sense for the developers. :)

Note: I highly recommend you to install and activate Advanced Custom Fields plugin so as to get its perfect benefit. Field Types only works with Advanced Custom Fields plugin.

= Usage =
Open a template file with any text editor and add some additional templating comment lines starting with @custom_field keyword:

Example 1:
<pre>
/*
* Template Name: 2column-layout
*
* @custom_field main, type: wysiwyg, label: Main content
* @custom_field sidebar, type: wysiwyg, label: Sidebar
*/
</pre>

Example 2:
<pre>
/*
* Template Name: Contact Page
*
* @custom_field photo, type: image, label: Photo of manager
* @custom_field phone, type: text
* @custom_field map, type: google_map
* 
* Note: The photo, phone, map are the custom field names in each '@custom_field' line,
* therefore use wordpress's 'get_post_meta' or ACF's 'get_field' method with those custom field names to get the values in this template. :)
*/
</pre>

Please bring the page edit link up in the backend and select the template which you just edited and hit 'Update' or 'Save' button.
After page refreshing, You can't miss new custom fields block from this template file.

Available Types and options with Advanced Custom Fields plugin are:
<pre>
/*
* @custom_field tab1, type: tab, instructions: Tab

* @custom_field field1, type: checkbox, choices: (1|2|3), label: Checkbox
* @custom_field field2, type: color_picker, label: Color Picker
* @custom_field field3, type: email, label: Email
* @custom_field field4, type: file, label: File
* @custom_field field5, type: google_map, label: Google map
* @custom_field field6, type: image, label: Image
* @custom_field field7, type: message, message: Message goes right here, label: Message
* @custom_field field8, type: number, label: Number
* @custom_field field9, type: page_link, label: Page link
* @custom_field field10, type: password, label: Password

* @custom_field tab2, type: tab, label: Tab

* @custom_field field11, type: post_object, label: Post object
* @custom_field field12, type: radio, choices: (1|2|3), label: Radio
* @custom_field field13, type: relationship, label: Relationship
* @custom_field field14, type: select, choices: (1|2|3), label: Select
* @custom_field field15, type: taxonomy, label: Taxonomy
* @custom_field field16, type: text, label: Text
* @custom_field field17, type: textarea, label: Textarea
* @custom_field field18, type: true_false, label: True/False
* @custom_field field19, type: user, label: User
* @custom_field field20, type: wysiwyg, label: Wysiwyg
*/
</pre>

== Installation ==

1. Upload 'advanced-page-template' to the '/wp-content/plugins/' directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Add some templating comment lines to a template source code.
4. Specify that template which has templating comment lines to a page and save, then new custom fields block will appear on the bottom.


== Screenshots ==

1. Configuring the Custom Fields in the template file

2. Check custom fields out on the backend




== Changelog ==
= 1.1.3 =
* description update

= 1.1.2 =
* refactor

= 1.1.1 =
* a bug fix when save page.

= 1.1.0 =
* enabled array options.

= 1.0.0 =
* Advanced Page Template.