=== GamiPress - Formidable Forms integration ===
Contributors: gamipress, tsunoa, rubengc, eneribs
Tags: forms, contact form, gamipress, gamification, points, achievements, ranks, badges, awards, rewards, credits, engagement, contact, formidable, formidable forms, submit, submission
Requires at least: 4.4
Tested up to: 6.2
Stable tag: 1.0.7
License: GNU AGPLv3
License URI:  http://www.gnu.org/licenses/agpl-3.0.html

Connect GamiPress with Formidable Forms

== Description ==

Gamify your [Formidable Forms](https://wordpress.org/plugins/formidable/ "Formidable Forms") submissions thanks to the powerful gamification plugin, [GamiPress](https://wordpress.org/plugins/gamipress/ "GamiPress")!

This plugin automatically connects GamiPress with Formidable Forms adding new activity events.

= New Events =

* Submit a form: When an user submits a form.
* Submit a specific form: When an user submits a specific form.
* Submit a specific field value: When an user submits a specific field value on a form.
* Submit a specific field value on a specific form: When an user submits a specific field value on a specific form.

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

== Screenshots ==

== Changelog ==

= 1.0.7 =

* **Improvements**
* Performance improvement excluding all requirements that does not meets the conditions to get checked by the GamiPress awards engine.

= 1.0.6 =

* **Improvements**
* Correctly detect the number of times the user submits a specific field value for fields with multiples options.

= 1.0.5 =

* **Bug Fixes**
* Fixed specific field value submission listener.
* **Developer Notes**
* Added new parameters to the exclude field filter.

= 1.0.4 =

* **New Features**
* Added support for checking array field values.
* Added extra information of field name and value attached to the event log.
* Added filters to exclude fields from trigger the events.

= 1.0.3 =

* **New Features**
* New event: Submit a specific field value.
* New event: Submit a specific field value on a specific form.

= 1.0.2 =

* **New Features**
* Added support to GamiPress 1.4.8 multisite features.

= 1.0.1 =

* **Bug Fixes**
* Fixed specific form title display on requirements UI.

= 1.0.0 =

* Initial release.
