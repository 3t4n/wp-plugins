=== Auto-Fill Infusionsoft Forms ===
Contributors: Geek Goddess
Tags: infusionsoft, auto-fill, auto-populate, autofill, pre-fill, pre fill, Infusionsoft forms
Requires at least: 4.00
Tested up to: 6.5.5
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Automatically Pre-Fill Infusionsoft Web Forms and Legacy Order Forms with data passed to the form in the URL

== Description ==

This plugin automatically fills in basic contact data into the matching fields of the Infusionsoft form embedded on the page.

It works for...

* Infusionsoft Web Forms from Campaign Builder
* Legacy Web Forms (including those made by the Classic Web Form Builder)
* Legacy Order Forms
* Any form you manually create as long as it uses the Infusionsoft form field names
* All versions of the embed code, including the javascript snippet

In addition it...

* Automatically makes first name, last name, email REQUIRED fields (using HTML5 form validation)
* Adds placeholders for first name, last name, email, phone, phone5 (or whatever phone field you're using for cell) if you don't want to use labels on your forms (web forms only)
* Optionally adds in the Infusionsoft Web Tracking Code site-wide for you to help with lead tracking

For more details, go to https://www.geekgoddess.com/auto-fill-infusionsoft-forms

== Installation ==

1. Upload the `auto-fill-infusionsoft-forms` directory to the `/wp-content/plugins/` directory OR upload the auto-fill-infusionsoft-forms.zip file into your plugins through the WordPress dashboard
2. Activate the plugin through the 'Plugins' menu in WordPress or immediately after upload
3. Use the `Settings->Auto-Fill Infusionsoft Forms` screen to configure the plugin

== Frequently Asked Questions ==

= Which types of embed code does this work for? =

All types, including the javascript snippet.

= Which fields will it automatically pre-fill? =

It will automatically pre-fill the following Infusionsoft fields either in the form of `Contact0FirstName` or `inf_field_FirstName`:

* FirstName
* LastName
* Email
* Phone1
* StreetAddress1
* StreetAddress2
* City
* State
* PostalCode
* Country

In addition, if you want to capture cell phone separately, you can specify which phone field you are using for that (Phone2, Phone3, Phone4, Phone5) and it will then auto-fill that field also if the data is sent.

= There's already an official plugin to add the web tracking code. Can I remove that if I use this? =

Yes. You can set your web tracking code in this plugin, then remove the other one.

= How do I get it to show the placeholder text instead of showing labels? =

To add the placeholders and automatically HIDE the labels on all web forms (other than those created in the classic builder), simply add the *nolabel* class to the form. For example, where it says class="infusion-form", change it to say class="infusion-form nolabel".


== Screenshots ==


== Changelog ==


= 1.0.4 =

* Updated Infusionsoft tracking code to remove tracking ID (no longer required)


= 1.0.3 =

* Fixed error in autoinf.js file that was throwing an error in Safari/iOS (thank you to Robert Calise for finding this bug)


= 1.0.2 =

* Renamed javascript function to fix conflict with infusionsoft web tracking code


= 1.0.1 =

* Fixed email field so it will stay hidden if initially set that way


= 1.0.0 =

* Initial release
