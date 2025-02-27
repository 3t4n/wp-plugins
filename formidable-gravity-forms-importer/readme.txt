=== Contact Form Migrator from Gravity Forms to Formidable ===
Contributors: formidableforms, sswells
Tags:  contact form, forms, gravity forms, gravity form, gravityview
Requires at least: 4.7
Tested up to: 5.7
Stable tag: trunk
Requires PHP: 5.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Migrate your WordPress contact forms automatically from Gravity Forms to Formidable Forms.

== Description ==
Switch your contact forms easily from Gravity Forms to <a href="https://formidableforms.com/">Formidable Forms</a>. We'll automatically build and import your forms and email notifications for you. Once you've migrated, you'll have access to the most advanced form builder for WordPress forms.

== Why Switch From Gravity Forms to Formidable? ==
Both Formidable and Gravity Forms are advanced drag and drop form builders. While Gravity Forms offers more direct integrations, Formidable offers a full-featured solution. If you are relying on third-party Gravity add-ons, it may lead to trouble. Not all extensions are reliably supported or are limited because they aren't written by the Gravity team.

With Formidable, you get a modern form builder, integrated Views, surveys with visual reports, and form styling. We've built our forms and Views to work together seamlessly for the most flexibility imaginable. If you're using Gravity Views, you can save a lot by switching to just one plugin. We offer one plugin to rule them all! Build directories, listings, data tables, calendars, and other form-based applications.

Get front-end editing, form styling options, entry relationships, star ratings, range slider fields, embedded forms, preview before submit, prebuilt form templates, custom reports, and customizable form HTML. But that's not all. Get read only fields, the option to hide a field label, conditional content in email notifications, pass values from one field to another, field visibility for logged in users, blackout dates, unique entry ids, import entries, and more!

You get the idea: Formidable allows you to do more. Still need some examples to show you what you can do? Here are a few things the Formidable community has built, without any third-party add-ons:

* Real estate listings
* Job boards
* Property management systems
* Journaling platforms
* Classified ads
* User directories
* Business directories
* Community recipes
* Event calendars and signups
* Auto dealer systems
* Crime reporting
* Grant applications
* Membership directories
* Data warehouse apps
* Distributor contact systems
* Rating systems
* Auto part directories
* Polls and surveys
* Newsletter subscriptions
* Ski rentals
* Search forms
* Library catalogs
* Goal tracking
* Photo competitions
* Workout planning
* Weight tracking
* Church management
* Contact forms
* School management systems
* Lead capture forms
* Student enrollment
* Ski club events
* Order forms
* Warranty claims
* Mortgage calculators
* Quizzes
* Quality management system
* Basketball championship stats
* Dance studio management
* Patient & doctor management
* Student worksheets
* College applications
* Health care plans

Cool, huh? You really can build whatever form-based application you have in mind. Plus, if you get stuck, we offer tons of code examples we've amassed over the past 10 years.

Have questions? <a href="https://formidableforms.com/new-topic/">Our support team</a> is awesome and waiting to help.

== Which parts of my Gravity forms will automatically import to Formidable? ==
The Formidable to Gravity Forms Importer currently migrates all of the features in the core Gravity Forms plugin. The following field types will be migrated for you:

* Single line text
* Paragraph text
* Dropdown
* Multi select
* Number
* Checkboxes
* Radio button
* Hidden
* HTML
* Section heading
* Page break
* Name
* Date
* Time
* Phone
* Address
* Website/URL
* Email
* File Upload
* Captcha
* List
* Consent
* Post title
* Post body
* Post excerpt
* Post tags
* Post category
* Post image and featured image
* Post custom field
* Product
* Quantity
* Option
* Shipping
* Total

Each field will be created in Formidable along with the settings. The settings that will be imported include:

* Field label
* Field description
* Placeholder
* Default value
* Dynamically populated default values
* Custom CSS classes
* Email confirmation
* Required
* No duplicates
* Input mask
* Conditional logic
* Custom validation message
* Label position
* Field calculation

Form settings and email notifications will also be imported to Formidable. Here's what will be imported:

* Each email notification along with the recipient, from name and email, reply to, CC, BCC, subject, message, and conditional logic.
* The first Confirmation.
* Form title
* Form description
* Submit button label and conditional logic
* Save and continue for logged-on users
* Form scheduling
* Form permissions
* Total number of entries allowed

= WordPress User Registration =
In addition to the core features, the most popular add-ons are also imported. When you have the Formidable User Registration add-on installed, Gravity registration settings will be imported. The user registration fields for username, first name, last name, email, custom user meta, and password are all imported for you. A User Registration form action will also be created in Formidable to match the Gravity Forms registration settings.

= Advanced Post Creation =
In Formidable Forms, the advanced post creation options are not an add-on. As long as you have any premium version of Formidable installed, your post settings will be set up in Formidable. This includes custom post types, custom fields, and conditional logic. If you have post fields in your form, they'll be merged in too. No more mess. Mischief managed.

== Frequently Asked Questions ==
= Which Gravity Forms settings will need manual migration? =
This plugin doesn't yet cover every Gravity Forms add-on plugin. Let us know what you need most and we'll work on adding them.

* Gravity Forms entries. The migrator doesn't currently import entries automatically. This can be done manually after the form is migrated by exporting the Gravity Forms entries and importing them on the Formidable -> Import/Export page.
* Gravity Forms repeaters. This is a beta feature in Gravity Forms. If you already have Gravity Forms repeaters, you will need to manually add them to your imported Formidable form.
* Integrations. The following add-ons will need to me set up manually in Formidable: ActiveCampaign, AWeber, Authorize.net, Campaign Monitor, Constant Contact, GetResponse, HubSpot, MailChimp, PayPal Payments Standard, Quiz, Signature, Stripe, Twilio, Zapier, Chained Selects, Polls, Survey, User Registration, Webhooks, Partial Entries.
* Integrations through Zapier. The Gravity Forms integrations Formidable doesn't yet offer can be set up through Zapier after the form is imported. These integrations include: Agile CRM, Breeze, Campfire, Capsule CRM, CleverReach, EmailOctopus, Emma, Freshbooks, iContact, Mad Mimi, Mailgun, Postmark, SendGrid, Slack, Square, Trello, and Zoho CRM.
* Gravity Views. After a form is migrated, any Gravity Views you have will need to be created manually. Let us know if you need this!
* Other 3rd party add-ons. With so many 3rd-party add-ons available, it's hard for us to know which ones are needed most. Many of these features are included in Formidable Forms or our add-ons like WooCommerce, Salesforce, range slider fields, form styling, auto login in after registration, limit dates, limit choices and checkboxes selected, unique ids for entries, nested forms, preview submissions, read only fields, conditional notifications, field visibility for logged in users, populating fields from existing entries, hide labels, and many more.

= What will happen to my Gravity Form after importing? =
Nothing! Your forms will be created in Formidable when you import. Your existing Gravity Forms won't change.

= I made changes to my Gravity Form. Can I import it again? =
Yes. That's no problem. Each time you import, a new form will be created in Formidable Forms.

== Changelog ==
= 1.02 =
* Fix issue with two post actions created with some forms.
* Added support for importing post custom fields with a static value.

= 1.01 =
* Remove extra composer.lock file

== Installation ==
1. Go to your Plugins -> Add New page in your WordPress admin
2. Search for 'Gravity Forms Importer'
3. Click the 'Install Now' button
4. Activate the plugin through the 'Plugins' menu
5. If you don't have [Formidable Forms](https://wordpress.org/plugins/formidable/ "Formidable Forms") installed, install it now.
6. Go to the Formidable -> Import/Export page
7. Click the 'Start Import' button to migrate from Gravity Forms to Formidable
