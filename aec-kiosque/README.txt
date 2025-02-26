=== AEC Kiosque ===
Contributors: atlsoftware
Tags: aec, atl, atl-software, webapps
Requires at least: 5.7
Tested up to: 6.7
Requires PHP: 5.4
Stable tag: 1.8.2
License: UNLICENSED

This plugin allows you to connect your website to your AEC application. You can then display components such as the lists of courses open to registration on your web pages. For more information on how to use this plugin, email us at <a href="mailto:support@atl-software.net">support@atl-software.net</a>.

== Description ==

This plugin allows you to connect your website to your AEC application. You can then display components such as the lists of courses open to registration on your web pages. For more information on how to use this plugin, email us at <a href="mailto:support@atl-software.net">support@atl-software.net</a>.

== Installation ==

= Get it working =

How to get AEC plugin up and running.

1. Activate the plugin through the 'Plugins' menu in WordPress
2. Place your API secret key and setup settings available at the plugin settings `/wp-admin/admin.php?page=aec-settings`
3. Maybe start adding a Class list to your website

= Add a webapp to a page =

1. Generate a desired component shortcode through the Shortcode Generator available at `/wp-admin/admin.php?page=aec-shortcode-generator`
2. Place the shortcode in you page content
3. Enjoy!

== Frequently Asked Questions ==

= Where do I get my secret key? =

Contact support if you lost your key at <a href="mailto:support@atl-software.net">support@atl-software.net</a>

== Screenshots ==
1. This screenshot shows where you can find the plugin settings.
2. This screenshot shows the shortcode generator start page.
3. This screenshot shows a search you can do inside the shortcode generator search bar.
4. This screenshot shows the Help Center of the plugin which contains the shortcodes parameters.

== Changelog ==
= 1.8.2 =
* Error handling when retrieving the current WPML language

= 1.8.1 =
* Web application with a new private tuition view added

= 1.8.0 =
* New period filter for the exam webapp

= 1.7.9 =
* Fixed problem with webapp private tuition

= 1.7.8 =
* Removed deprecated webapp aec_google_maps, instead use aec_contact_map

= 1.7.7 =
* New option to the webapp 'Course Search Box' to display search options from all establishments (if you have more than one establishment)

= 1.7.6 =
* Fixed issue with webapps styles

= 1.7.5 =
* New option to load webapps with lazy loading and optimization of the plugin's performance

= 1.7.4 =
* Fixed error when loading webapps

= 1.7.3 =
* Fix issue with the js files not loading

= 1.7.2 =
* Optimize plugin's performance

= 1.7.0 =
* Add a new parameter to set the course id in the course details webapp.

= 1.6.9 =
* When selecting the checkbox corresponding to the "data-param-show-all-establishment" parameter, the value "Y"/"N" must be assigned accordingly.

= 1.6.8 =
* Removed options to configure the web applications details page in the plugin settings.

= 1.6.7 =
* Updated Help Center page

= 1.6.6 =
* New versions of the webapps [aec_classes] and [aec_classes_list_with_filters].

= 1.6.5 =
* Remove webapp classes

= 1.6.4 =
* Remove parameters for detail pages in the webapps

= 1.6.3 =
* Add parameter establishment to the events webapp

= 1.6.2 =
* Avoid overwriting "extranet domain" when modifying the main site in WordPress (multisite case).
* Trigger 'add_head' during 'wp_enqueue_scripts' instead of 'wp_head' to adjust style priority.

= 1.6.1 =
* Fixed issues with language ar_MA

= 1.6.0 =
* Add new webapp Classes list

= 1.5.9 =
* Add new event webapp

= 1.5.8 =
* Fixed preview of the shortcode generator

= 1.5.7 =
* Define fields for Exam Webapp builders as non-required

= 1.5.6 =
* Add shortcode of the new exam webapps and remove the shortcode generator of the old exam webapp

= 1.5.5 =
* Remove unnecessary parameters from the shortcode generator

= 1.5.4 =
* Add new option to the course webapps to show the courses of all establishments (if you have more than one establishment)

= 1.5.3 =
* Add new option to the webapp student register

= 1.5.2 =
* Fixed the issue that caused plugin labels to not translate

= 1.5.1 =
* Fixed a problem that caused conflicts with other plugins

= 1.5.0 =
* Fixed warning messages

= 1.4.9 =
* Fixed a problem with AEC API communication

= 1.4.8 =
* Removed ATL logo from wordpress admin bar

= 1.4.7 =
* Fixed a problem with the unsubscribe newsletter webapp

= 1.4.6 =
* Integration of a new unsubscribe newsletter webapp

= 1.4.5 =
* Fixed issues with language nl_NL

= 1.4.4 =
* Integration of the new course webapps

= 1.4.3 =
* Add class format field to classes components

= 1.4.2 =
* Fix Issues with student dashboard component

= 1.4.1 =
* Add parameters to student dashboard

= 1.4.0 =
* Fix establishment loading error

= 1.3.9 =
* Add new classes catalog with filters webapp

= 1.3.6 =
* Add Identify panel webapp
* Improve performance

= 1.3 =
* Add support to extranet subdomains

= 1.2.4 =
* Fix styles issues and class detail field added in settings

= 1.2.3 =
* Fix issues with rtl languages and default values loading

= 1.2.2 =
* Fix issues with settings

= 1.2.1 =
* Fix issues with shortcode generator and add support to multiple subdomain

= 1.2.0 =
* Fix issues with language and Exam shortcodes
