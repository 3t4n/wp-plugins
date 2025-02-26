=== AutomatorWP - Contact Form 7 integration ===
Contributors: automatorwp, rubengc, eneribs
Tags: contact, form, forms, automatorwp, submission
Requires at least: 4.4
Tested up to: 5.9
Stable tag: 1.0.6
License: GNU AGPLv3
License URI: http://www.gnu.org/licenses/agpl-3.0.html

Connect AutomatorWP with Contact Form 7

== Description ==

> **Important:** Now all free integrations are included in [AutomatorWP](https://wordpress.org/plugins/automatorwp/ "AutomatorWP") so you no longer need to install them one by one!
>
> We will continue working to improve AutomatorWP and make it easier, faster and more accessible to everyone.

[Contact Form 7](https://wordpress.org/plugins/contact-form-7/ "Contact Form 7") is a free form-builder plugin that allows you to easily build contact forms for your WordPress-powered website.

This plugin automatically connects [AutomatorWP](https://wordpress.org/plugins/automatorwp/ "AutomatorWP") with Contact Form 7 adding new triggers that you can use to connect with other plugins and automate workflows letting you save time and get focused on your most important work.

= Triggers =

* User submits any/specific form.

= Anonymous Triggers =

* Guest submits any/specific form.

= Tags =

* Field value tag to use any form field submitted value on actions.

= Pro version =

[Pro version](https://automatorwp.com/add-ons/contact-form-7/ "AutomatorWP - Contact Form 7") available that let's you expand the integration between AutomatorWP and Contact Form 7 bringing you more ways to automatize your website forms.

== Installation ==

= From WordPress backend =

1. Navigate to Plugins -> Add new.
2. Click the button "Upload Plugin" next to "Add plugins" title.
3. Upload the downloaded zip file and activate it.

= Direct upload =

1. Upload the downloaded zip file into your `wp-content/plugins/` folder.
2. Unzip the uploaded zip file.
3. Navigate to Plugins menu on your WordPress admin area.
4. Activate this plugin.

== Frequently Asked Questions ==

= Form submission triggers don't get completed =

Forms submitted through ajax (the default workflow of Contact Form 7) can't determine which current user is logged in causing that triggers from this integration won't be completed. There are 2 ways to fix this issue:

1) On the form(s) you want to connect with an AutomatorWP trigger you need to activate the subscribers-only mode:
Contact Form -> Additional Settings -> subscribers_only: true

2) Enable the subscribers-only mode to all forms placing the following code on your `functions.php`:

	add_filter( 'wpcf7_verify_nonce', '__return_true' );


[Official post](https://contactform7.com/2017/08/18/contact-form-7-49/) about subscribers-only mode from the Contact Form 7 team.

Important: Forms with subscribers-only mode enabled will require to your users to stay logged-in in order to be able to submit the form, it means that visitors can't submit the form.

= How to handle values of fields with multiples inputs? =

Here is a quick explanation about how to meet the fields handled in a submission:

1) Create a test automation with the trigger "User submits any/specific form".
2) Save and activate the automation.
3) Submit the form to force AutomatorWP handle it.
4) Go to AutomatorWP > Logs > Check the trigger entry for the "User submits any/specific form".
5) On this entry, you will find the section "Fields Submitted" on the "Log Data" box.
6) Here you are able to see all the fields and sub-fields handled.
7) Copy the field or sub-field identifier to use it on the AutomatorWP "form_field" tag to use the field value on the AutomatorWP actions.

== Screenshots ==

== Changelog ==

= 1.0.6 =

* **Improvements**
* Prevent use of undefined constant

= 1.0.5 =

* **New Features**
* Added support for nested fields (requires AutomatorWP 1.4.4).

= 1.0.4 =

* **New Features**
* Added support to anonymous automations.
* New anonymous trigger: Guest submits any/specific form.

= 1.0.3 =

* **Improvements**
* Added information of all fields values sent on the form submission.
* Prevent to override other integration tags replacements.

= 1.0.2 =

* **New Features**
* Added the field value tag to use any form field submitted value on actions.

= 1.0.1 =

* **Bug Fixes**
* Fixed typo on integration icon URL.

= 1.0.0 =

* Initial release.
