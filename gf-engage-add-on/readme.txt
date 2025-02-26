=== Integration for Salsa Engage and Gravity Forms ===
Contributors: kenjigarland, xavierserranoa, rxnlabs, harmoney
Tags: forms, crm, integration
Requires at least: 3.6
Tested up to: 6.7.1
Requires PHP: 5.6.38
Stable tag: trunk
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html

A Gravity Forms Add-On to feed submission data into the Salsa "Engage" CRM/fundraising/advocacy platform.

== Description ==

If you're using the [Gravity Forms](http://www.gravityforms.com/) plugin, you can now integrate it with the [Salsa Labs](https://www.salsalabs.com/) "Engage" platform. This Add-On supports creating or updating supporter records.

To use this Add-On, you'll need to:

1. Have an licensed, active version of Gravity Forms >= 1.9.3
2. Have a working Engage instance, as well as credentials for at least one administrative or api-level user

If you meet those requirements, this plugin is for you, and should make building new forms and passing supporter data into Salsa much easier than manually mucking with HTML provided by Salsa.


== Installation ==

1. Log into your Wordpress account and go to Plugins > Add New. Search for "Gravity Forms Engage" in the "Add plugins" section, then click "Install Now". Once it installs, it will say "Activate". Click that and it should say "Active". Alternatively, you can upload the directory directly to your plugins directory (typically /wp-content/plugins/)
2. Navigate to Forms > Settings in the WordPress admin
3. Click on "Engage API" in the lefthand column of that page
4. Enter your organization's Engage API token, which you can get by visiting Organization Settings -> API tab of your Salsa Engage account
5. Once you've entered your Engage account details, create a form or edit an existing form's settings. You'll see an "Engage API" tab in settings where you can create a "Engage API Feed". This allows you to pick and choose which form fields you'll send over to Engage from the form. You also have the option of automatically putting form signers into segments, or setting some conditional logic to pick and choose which information gets sent.


== Frequently Asked Questions ==

= Does this work with Ninja Forms, Contact Form 7, Jetpack, etc? =

Nope. This is specifically an Add-On for Gravity Forms and will not have any effect if installed an activated without it.

= What version of Gravity Forms do I need? =

You must be running at least Gravity Forms 1.9.3.

= What kinds of data can this pass to Engage? =

Right now, this Add-On is strictly for passing *constituent data* to Engage. It does not support advocacy or other forms.


== Changelog ==

= 1.1.4 =
* Added a note to the Donation checkbox, explaining that checking the box but not making payments will prevent the feed from being processed.

= 1.1.3 =
* Removed user-facing warning about ending support, because Bonterra has announced that they're continuing support for Salsa Engage after all.

= 1.1.1 - 1.1.2 =
* Added a user-facing warning that support is ending for this plugin.

= 1.1.0 =
* There is now a button on the add-on settings screen that allows users to clear locally cached Engage data (i.e. the list of available segments/groups)
* When editing an Engage feed, segments/groups will now be sorted alphabetically by name
* Engage feeds can now be configured to add donation data to Engage, for form entries that contain payment data

= 1.0 =
* Initial release.
