=== osTicket Connector ===
Contributors: scandltd
Tags: scandltd, support, osticket, connector, http, api, rest api, json, tracker
Requires at least: 4.3
Tested up to: 6.6.2
Stable tag: 1.0.9
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Create tickets in osTicket support system via the existing contact form.

== Description ==
This WordPress plugin supports the creation of new tickets in the osTicket system by using osTicket API. Only contact forms, which send emails, are supported as our plugin hooks the wp_mail function to get the forms’ data.
= Important =
The contact form must contain "Email", "Full Name", "Subject" and "Message" fields at least.

= osTicket API =
The osTicket API is used as simple XML or JSON over HTTP. Ticket creation is supported only.

= Authentication =
Authentication via the API is done via API keys configured inside the osTicket admin panel. API keys are created and tied to a source IP address, which will be checked against the source IP of requests to the HTTP API.

API keys can be created and managed via the admin panel. Navigate to Manage -> API keys. Use Add New API Key to create a new API key. Currently, no special configuration is required to allow the API key to be used for the HTTP API. All API keys are valid for the HTTP API.
See more details [here](https://github.com/osTicket/osTicket/blob/master/setup/doc/api.md).

= Deployment =
1. Configure osTicket support system to enable the access via API for your WordPress (see "Authentication" section).
1. Set up the contact form and input the attribute value of the tag name exactly as given in the settings form of the plugin. This will let the data map to osTicket API data template correctly.
1. Add a hidden input with a name specified in ‘Form Identifier’ while using the contact form.

== Installation ==

= WordPress installation =
1. Go to Plugins > Add New > search for "scand-osticket-connector"
1. Press "Install Now" button for the "osTicket Connector" plugin
1. Press "Activate" button

= Manual installation =
1. Upload the "scand-osticket-connector" directory to the "/wp-content/plugins/" directory
1. Activate the plugin through the "Plugins" menu in WordPress

== Frequently Asked Questions ==

= How to use this plugin with the contact form ? =
1. Specify all required fields in the settings (Admin -> Settings -> osTicket Connector).
1. The name of fields should be the same as on your form.
1. Sometimes it is necessary to use a hidden field on your contact form. The name of the input should be the same as the one you have specified in "Form Identifier" option for "osTicket Connector" and set the value equal to "1". By the way, it can be any unique field name which the form sent.
1. Enjoy the new functionality you got!

= How to configure Contact Form 7 ? =
1. Create a new form with all necessary fields.
1. Add a hidden input to your contact form (see "Example of Contact Form 7" screenshot).
1. Indicate fields matching (see "Contact Form 7 fields settings" screenshot)

= How to configure Formidable ? =
1. Create a new form with all necessary fields and remember IDs of form fields (see "Example of Formidable form" screenshot, green arrow).
1. If you use the free version of Formidable, add the real ID of the Help Topic to the beginning of the selected option. The possible variant shown on "Example of Formidable form" screenshot (red arrow).
1. Indicate fields matching (see "Formidable fields settings" screenshot). For "Form Identifier" option set the "form_key" value. For other fields, you should use the following format "item_meta|&lt;filed_ID&gt;", where filed_ID is real ID of field on your contact form.

= How to configure WPForms ? =
1. Create a new form with all necessary fields and remember IDs of form fields (see "Example of WPForms form" screenshot).
1. Indicate fields matching (see "WPForms fields settings" screenshot). For "Form Identifier" option set the "wpforms" value or, if you have several forms, "wpforms|&lt;form_ID&gt;", where form_ID is the real ID of your form. For other fields, you should always use the following format "fields|&lt;filed_ID&gt;", where filed_ID is real ID of field on your contact form.

== Screenshots ==

1. API settings
2. Contact Form 7 fields settings
3. Example of Contact Form 7
4. Formidable fields settings
5. Example of Formidable form
6. WPForms fields settings
7. Example of WPForms form

== Changelog ==

= 1.0.9 (2023-04-13) =
Added ability to define the specific WPForm for processing.

= 1.0.8 (2022-07-26) =
Fixed comma validation for multiple fields.
Logs the $_REQUEST when creation of ticket fails.

= 1.0.7 (2021-09-23) =
Added ability to handle uploaded files for Formidable.

= 1.0.6 (2021-08-27) =
WPForms support added.

= 1.0.5 (2021-01-12) =
Changed list of required fields (topic has become optional).

= 1.0.4 (2020-11-11) =
Added ability to processing of form requests for plugins which send form's fields as array (for example, Formidable).

= 1.0.3 (2020-09-17) =
If the phone extension is not provided, do not add a capital "X" as part of the phone.

= 1.0.2 (2017-12-04) =
Changed validation rules for attribute names.
Added Russian translation.

= 1.0.1 (2017-03-14) =
Added filter to process option values for drop-down when Contact Form 7 is used.

= 1.0.0 (2017-02-20) =
Release of the plugin.
