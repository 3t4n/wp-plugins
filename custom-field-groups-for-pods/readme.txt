=== CIO Custom Field Groups for PODS  ===
Contributors: VisualData
Donate link: http://vipp.com.au/cio-custom-fields-importer/custom-field-groups-for-pods/
Tags: pods custom field groups, custom field groups, custom fields, pods group, custom field sections, custom field headers, custom field footers, group location rules, pods, ACF, advanced custom fields
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Requires at least: 3.9.0
Tested up to: 4.9
Stable tag: 1.0.0

Copy, drag, drop, done. This plugin extends PODS to group custom fields quickly. Support location rules, pods shortcode and magic tags.

== Description ==

Are you already using the awesome [PODS](https://wordpress.org/plugins/pods/) plugin to manage your custom content types and fields? 

Are you switching from Advanced Custom Fields to PODS but missing the groups and location rules found in Advanced Custom Fields? 

Are you looking for a simple and easy way to present your custom field data on your website in logical blocks? 

CIO Custom Field Groups for PODS may be the solution you are looking for. It makes PODS even more awesome.

PODS is a powerful and flexible framework to manage custom content types and custom fields. Some of PODS's unique features include 

* extending WordPress's builtin content types (user, page, post, media, taxonomy)

* table storage, which is essential for high performance as the number of custom fields increase.

CIO Custom Field Groups for PODS extends PODS to organize your custom fields into groups quickly and intuitively. This is similar to reading a table of contents from a printed book, when we see a line starting with the word "Chapter" we KNOW it is a chapter and treat it as such. We can instruct the computer to do the same.

The group headers are pods custom fields named with a prefix "cio_section_". Groups are defined by the relevant position of custom fields in pods setting page, so grouping and re-grouping can be done quickly by dragging and dropping meta boxes.

The free version of CIO Custom Field Groups hooks into PODS form to automatically generate a row with label and description only, without input cells. Output of group header fields in the front end is optional depending on your pods field setting, page template and pods template.

Custom fields used as group headers are field definition only without any data saved to these fields. If you use pods table storage, you may set up group header fields as relationship fields so that such fields will not be created in your data table.

PHP code is not required to use this plugin. However if you are comfortable with PHP code, you may instantiate the class in this plugin and use class methods to get a multi dimensional array of groups and fields with all the pods field settings. You can then manipulate the custom fields and groups in your page template. 

= CIO Custom Field Groups Premium Version =

The premium version of CIO Custom Field Groups has the following additional features:

* Dividing custom fields into groups (under headers) and sub-groups (above footers). 

* Configuring the header and footer field prefix, if you need to name the fields in a certain way for the database to integrate with other plugins/programs.

* Configuring the header and footer field background in the admin panel, so you will work with your favourite colours.

* Configuring the header and footer field css for frontend display.

* Setting up restriction access and display conditions similar to location rules of Advanced Custom Fields (ACF). So a group of fields can be displayed on a specified page or post, or pages or posts meeting certain criteria,

* Supporting pods-form short code and field based magic tags enclosed in short code or included in pods template, such as {@my_header}. 

* Displaying sections of custom fields according to user roles or capabilities. For example, you may collect and display different information if the users are wholesalers.  

* Display sections of custom fields on specified pages only. 

* Admin only custom fields.


CIO Custom Fields and Groups is an add-on to PODS but can be used to group custom fields created with other plugins. You simply expend the post type or custom post type with pods, create custom fields using the same name. Then you can use the features from Pods or this plugin to present your data already stored. This is achieved by sharing the stored data between your plugin and PODS, thanks to the great work of PODS team.

Both the free and professional edition works in multisite environment.


PS: I am releasing the professional edition to the public to raise fund for a long time friend who runs a charity from Australia called [Captivating](http://captivating.org/). Captivating has a dedicated team to help victimised children in developing countries. CIO Custom Fields and Groups Professional Edition is bundled with extra features and is freely available to supporters of Captivating. If you are willing and able financially, please consider giving to Captivating. Any amount is appreciated. Tax deductible receipts are available if you are giving from Australia, US or Hong Kong. Please check with Captivating about receipts if you are giving from other countries.

[CIO Custom Fields and Groups Professional Edition](http://vipp.com.au/cio-custom-fields-importer/custom-field-groups-for-pods/) is also available for immediate download for a small once-off fee.

= How does it work =

We believe things should be as simple and easy as it could be. We embrace this philosophy in our code and business model.

CIO Custom Fields and Groups defines groups by the position of custom fields relevant to a group header, in the same way as groups are displayed in forms or on paper. Fields beneath a group header belongs to this group. Similarly, fields above the group footer belongs to the group.  You can use either headers or footers, or both to define groups.


CIO Custom Fields and Groups professional edition hooks into Pods core files so you can use PODS short code to display an edit form by specifying header or footer names.

`[pods-form name="mypod" id="321" headers="0, myheader1, myheader2" footers="myfooter1, myfooter2, 0" ]`

Grouping is optional with CIO Custom Fields and Groups. If some fields are grouped and some are not, you can access these ungrouped fields by using a dummy header or footer name "0" (zero), as shown in the example above.

Note headers and footers are used in the short code instead of groups. This is to avoid confusion with the "group" functionality under development and testing by pods team. 

CIO Custom Fields and Groups professional edition filters the parameters in the short code, identifies the fields in the group, and passes the field names to PODS to generate a form. 

Similarly, CIO Custom Fields and Groups professional edition hooks into Pods to display a header and footer label only without an input cell. 

CIO Custom Fields and Groups uses builtin table structures of WordPress and PODS to define groups. No extra taxonomy or data is created. The professional edition of CIO Custom Fields and Groups supports PODS shortcode and magic tags in shortcode template, and in the template component.

To display a group defined by the header field "my_header" from a custom post type called "product" with id 123, you would use the following short code. 

`[pods name="product" id=123] {@my_header} [/pods]`

Alternatively if you enable the component template, you can create a template containing the following line for example

`<div class="my-custom-group-class"> {@my_header}  </div> `

Let's assume the template is called "my header template", and then you may use the following short code to display the group.

`[pods name="product" id=123 template="my header template"]`

= Output from pods functions =

$pod->field($my_header): null

$pod->fields(): all the fields including header fields

$pod->display($my_header): null

If you are using PODS and in some web pages looping through all fields to display content or form, after you have activated this plugin and created header fields, your existing code should still work without modification. The header fields will simply display a label for human comprehension.

When CIO Custom Fields and Groups professional edition is activated, and preset display conditions are met, the custom fields belong to this group will be displayed. 

When CIO Custom Fields and Groups professional edition is deactivated, the above shortcode simply displays nothing, as no data is ever stored in the special relationship field "my_header". 


Please see screen shots for more examples. 


CIO Custom Fields and Groups Professional Edition comes with 

* unlimited site license. you can use it on as many websites as you like, either owned by you or your clients, or your neighbors, or your friends.

* life time free support, if you have paid an one-off fee to upgrade to professional edition

* life time free upgrade, if you have paid an one-off fee to upgrade to professional edition

* 30 day money back guarantee. no questions to ask.



== Installation ==


To install the CIO Custom Fields and Groups, unzip the downloaded zip file and upload the folder to /wp-content/plugins/, and then activate the plugin from the Plugins page in WordPress.

If you are using the free plugin and bought the professional edition, please remove the free plugin before installing the professional edition.


== Frequently Asked Questions ==

To update later.


== Changelog ==



= 1.0.0 =
* Initial release.


== Upgrade Notice == 

to update later.


== Screenshots == 

1. define groups by field sequence. color coded group headers ($head -> sky => blue) and footers ($foot -> grass => green). configurable settings.

2. location rules to display (display on posts only)

3. location rules to display (display when post name contains "demo" ) 

4. shortcode and magic tags.

5. location rules not met. (pods magic tag should disappear if conditions are not met. the magic tag shown here does not follow pods magic tag syntax and is treated as ordinary text. PODS does not allow space between { and @)

6. location rules met. magic tags on post with "demo" in post title 

7. example of headers and footers in generated display of grouped fields. You may customise the display of headers and footers with CSS.   

8. access control of field groups. 

9. cio field group settings page. choose your favoriate name and colours. 

10. use header field in magic tag in template. You need to activate a pods component called "Template" to create templates. 

11. example of using template name in pods short code.

12. location rules met. magic field of header is replaced with group fields. 

13. use the same short code in a page, the location rules are not met. 

14. location rules not met. a space was inserted between { and @ on purpose so the code will stay here for comparison. 



== Support ==


We do try to handle support at the following e-mail address:

E-mail: support@vipp.com.au


