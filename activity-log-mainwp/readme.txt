	=== Activity Log For MainWP ===
Contributors: Melapress
Plugin URI: https://melapress.com/wordpress-activity-log/
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl.html
Tags: activity log for mainwp, mainwp extension, mainwp user tracking, mainwp admin, mainwp dashboard log
Requires at least: 5.0
Tested up to: 6.6.2
Stable tag: 2.1.3
Requires PHP: 7.2

## Important message

**This plugin extension has now been merged into [WP Activity Log](https://wordpress.org/plugins/wp-security-audit-log/). All functionality and features previously offered in Activity Log for MainWP are now available in WP Activity Log straight out of the box. As such, this plugin extension has now been closed and is no longer receiving updates.**

## Next steps

If you haven’t installed WP Activity Log yet, you can go ahead and install the plugin by following the instructions in the Installation section below.

If you have WP Activity Log installed, uninstall the extension and make sure you are running the latest version of the plugin to ensure you can log MainWP activities. For more information, refer to the FAQs section below.

## More about WP Activity Log

[WP Activity Log](https://melapress.com/wordpress-activity-log/?utm_source=wp+repo&utm_medium=repo+link&utm_campaign=wordpress_org&utm_content=mainwp) is the most comprehensive real-time activity log plugin for WordPress. It helps thousands of administrators and security professionals keep an eye on what is happening on their websites and multisite networks.

WP Activity Log is also the most highly rated WordPress activity log plugin and is trusted by small website owners and large corporations alike. It has been featured on popular sites such as GoDaddy, ManageWP, Pagely, Shout Me Loud, and WPKube.


## Upgrade to WP Activity Log premium

Upgrade to [WP Activity Log premium](https://melapress.com/wordpress-activity-log/pricing/?utm_source=wp+repo&utm_medium=repo+link&utm_campaign=wordpress_org&utm_content=mainwp) and get even more out of your activity log for MainWP, including:

* Advanced search filters
* Email and SMS notifications
* User session management
* Scheduled and ad-hoc reports
* Integration with SIEM and log management systems
* And much more!


== Installation ==

=== Install WP Activity Log on Child sites  ===

1. Navigate to Plugins > Add New Plugin
3. Search for 'WP Activity Log'
4. Install and activate the plugin
5. Follow the wizard to set up the plugin

== Frequently Asked Questions ==

= What MainWP dashboard and child sites activities can WP Activity Log track? =
Below are some of the MainWP-specific changes you can keep a log of when you install WP Activity Log:
* Keep a log of all Child site changes done via the MainWP dashboard
* Keep a log of changes in the MainWP dashboard and extensions
* See all activity logs from one central location – the MainWP Dashboard site
* Know what your clients change on their business site without logging in to each site
* Add search and filters to the activity log (requires premium))
* Search in the child sites’ activity log from the MainWP dashboard
* Generate any type of user, site, and MainWP activity report
* Generate any type of report from the child sites’ activity log (requires premium)
* Configure daily, weekly, monthly, and quarterly reports that are sent automatically to you via email

Refer to the [list of activity log event IDs](https://melapress.com/support/kb/wp-activity-log-list-event-ids/?utm_source=wp+repo&utm_medium=repo+link&utm_campaign=wordpress_org&utm_content=mainwp) for a complete list of the changes the plugin can keep a log of.

= How can I confirm WP Activity Log is tracking MainWP and child sites activities? =
WP Activity Log will automatically enable activity logging of third-party plugins it supports out of the box. To confirm this, navigate to WP Activity Log > Enable/Disable Events and choose the plugin from the Choose a category drop-down menu. You'll see all the changes and user actions the plugin can keep a log of. You can also try to make a minor change and confirm the change is recorded in the activity log.

== Changelog ==

= 2.1.3 (2024-05-22) =

* **Fixed**
	* Fixed the WP Activity Log 5 update notice to appear only in the activity log page.

= 2.1.2 (2024-05-21) =

* **Improvements & changes**
	* Added WP Activity Log 5 update notice.

= 2.1.1 (2023-8-22) =

* **Improvements & changes**
	* Updated plugin so it is compatable with WP Activity Log 4.6.0.
	* Applied a number of fixes and improvemtns so plugin is compatable with MainWP 4.5+.
	* Rebranded to Melapress.
	* Better contrast on some buttons in the settings.
	* Removed Grid view - activity log now only has one standard view.
	
* **Bug fixes**
	* Fixed: "Synced" event reported insted of other events during some changes.
	* Fixed: A number of PHP warnings (ensuring plugin is compatable with PHP 8.2).
	
= 2.1.0 (2022-12-1) =

* **Improvements & changes**
	* Added CSS to support MainWP's 'Dark mode' UI.
	* Improved compatability with PHP 8.0 - now this extension can run on environments where PHP 8 is used.
	* Updated the method used to sync event IDs metadata from WP Activity Log to this extension.
	* Compatability improvements for [WP Activity Log](https://melapress.com/wordpress-activity-log/?utm_source=wp+repo&utm_medium=repo+link&utm_campaign=wordpress_org&utm_content=mainwp) 4.4.3.

* **Bug fixes**
	* Fixed: HTML tags showing in the message of event ID 7715 and 7716.
	* Fixed: Error reported when logging in to the MainWP dashboard using a "Temporary Login" plugin link.
	* Fixed: login page activity log notification not showing in certain environments.

= 2.0.0 (2022-03-24) =

* **New features**
	* Plugin now automatically retrieves list of event IDs from the WP Activity Log plugin installed on child sites. Therefore when there are new event IDs there is no need to release an update.

* **Improvements & changes**
	* From this version onward there will only be the free edition of Activity Log for MainWP. To enable premium features on child sites, for example searching in the child sites' activity log you need WP Activity Log Premium installed on the child site.
	* Removed the Freemius SDK from the plugin - no longer needed because now there is only the free edition.
	* Added compatibility for standard severity codes used in WP Activity Log.
	* Improved the process and functiona that is used to add the activity log of new child sites to the central MainWP activity log.
	* Events severity is now stored on the MainWP database, allowing users to filter events by severity level.
	* Removed the statistics report from this plugin - we will include an improved reporting engine in future updates.
	* Event ID description shown upon hovering over an event ID in the activity log viewer.

= 1.7.0 (2021-03-17) =

Release Notes: [More activity log settings can be centrally manged from the MainWP dashboard](https://melapress.com/wordpress-activity-log/releases/?utm_source=wp+repo&utm_medium=repo+link&utm_campaign=wordpress_org&utm_content=mainwp)

* **New Feature**
	* Support for any date and time format WordPress support.
	* "Hide plugin in plugins page" child site setting can now be centrally.
	* "Login page notification" can now be centrally configured on all child sites.

* **Improvement**
	* Updated Freemius SDK to the latest version - 2.4.2.
	* Updated third party libraries used in the plugin.
	* Improved CSS of the extension's settings page.
	* Centrally managed activity log settings for child sites moved in plugin menu.
	* Improved the text & metadata of some of the activity log events.
	
* **Bug fixes**
	* Child site selection drop down menu disappears when running a search.
	* Event ID 1000 was reported whenever a change was pushed from MainWP to child sites.

= 1.6.1 (2020-11-24) =

* **Improvements**
	* Updated the Freemius SDK to the latest version.

= 1.6 (2020-11-02) =

* **New Feature**
	* [Configure the settings of the WP Activity Log plugin installed on the child sites from the MainWP dashboard](https://melapress.com/support/kb/wp-activity-log-configure-child-sites-activity-log-settings-mainwp/).
	
* **New event IDs*
	* 7713: Changed the enforcement configuration of the child sites activity log settings.
	* 7714: Added or removed a child site from the enforced child sites activity log settings.
	* 7715: Modified the child sites activity log settings.
	* 7716: Started or finished propagating the child sites activity log settings.
	* 7717: Failed to propagate the child sites activity log settings to a child site.

* **Improvement**
	* Changed the old logo with a new and more modern one.
	
* **Bug fixes**
	* In some edge cases, the username was being shown in the activity log instead of the configured display name.
	* Addressed a number of HTML code issues in the activity log viewer (reported in the developer tools console).

= 1.5.2 (2020-09-21) =

* **Improvement**
	* Renamed all filters / hooks. Now using the new naming convention used in MainWP 4.1.
	
= 1.5.1 (2020-05-20) =

* **Improvement**
	* Updating links to reflect name change.

* **Bug fix**
	* Ensure extension title is only shown in the extensions pages.

= 1.5.0 (2020-02-19) =

* **New Features**
	* New activity log search & filters module with much better UX.

* **Improvement**
	* Reports module now supports the latest data format changes used in MainWP.
	* Plugin is now fully translatable.
	* Added the new [activity log objects](https://melapress.com/support/kb/wp-activity-log-objects-event-types-wordpress-activity-log/) which are used by the main plugin.
	* Improved the responsiveness and UI of the activity log viewer.
	* Added a confirmation for when the activity log is purged from the MainWP database.

* **Bug fixes**
	* Consolidated the Text Domain throughout the plugin.
	* List of child sites in plugin settings incorrectly displaying sites on some setups.
	* Correct plugin name is now displayed in the extention page.
	* Rewritten some of the settings page text.
	* After activating the plugin user is redirected to the wrong page.
	* Fixed some rendering issues in the plugin's pages.

= 1.4.2 (2020-02-21) =

* **Improvement**
	* Improved the add/remove child sites function to handle the new data types.

* **Bug fix**
	* Plugin not processing properly the retrieved list of child sites.

= 1.4.1 (2020-01-21) =

 * **Improvement**
	* Updated the plugin to support the latest version of MainWP updates.

= 1.4 (2020-01-14) =

* **New functionality**
	* Support for [activity logs of WP Activity Log version 4](https://melapress.com/wordpress-activity-log/).

= 1.3 (2019-12-11) =

* **New Features**
	* New activity logs retention setting for MainWP dashboard logs.
	* Plugin now automatically fetches logs from child sites upon install (optional).

* **Improvement**
	* Added new compatibility check & notification for WP Activity Log v4 (new activity log).

* **Bug fixes**
	* Plugin tries to retrieve logs from removed child sites.
	* First install wizard not firing in some edge cases.
	* Premium promo banner showing in premium edition.
	* Close link on premium promo banner was not working in some cases.
	* Addressed a compatibility error with PHP 7.4.
	* Removed the Upgrade to Premium button in the extensions page when using premium edition.


= 1.2 (2019-10-29) =

* **Improvement**
	* Plugin retrieves list of child sites in batches to better handle large number of sites on bigger networks.

* **Bug fixes**
	* Child site not removed from activity log database even after being removed by user.
	* Removed unnecessary code for navtabs which was causing a console error.

= 1.1 (2019-09-18) =

* **New Feature**
	* Added activity log tab in individual site child overview dashboard.
	* Added support for Activity Log for MainWP Premium.

* **Improvement**
	* Improved support for MainWP4.

= 1.0.5 (2019-07-03) =

* **Improvement**
	* Updated the Freemius SDK

* **Bug fix**
	* Plugin no longer crashes website when MainWP is deactivated.

= 1.0.4 (2019-06-11) =

* **New Feature**
	* New pruning setting for MainWP dashboard & network activity log events.
	* Settings to disable / enable specific MainWP dashboard & network event IDs.

* **Improvement**
	* Fixed UI issues to support MainWP 4.

= 1.0.3 (2019-03-19) =

* **New Feature**
	* Infinite Scroll in the activity log viewer (switch between pagination and infinite scroll in the extension settings).
	* Integrated Freemius SDK (preparation for the premium features).

* **Performance Update**
	* Improved several queries and improved activity log viewer performance.

* **Improvement**
	* New setting to retrieve activity logs when MainWP syncs website data (default: Off).

= 1.0.2 (2019-02-08) =

* **Security Fix**
	* Updated npm dev-dependency because used version had a low severity issue ([CVE-2018-16491](https://nvd.nist.gov/vuln/detail/CVE-2018-16491))

= 1.0.1 (2019-01-07) =

* **Improvements**
	* Improved wizard for when WP Activity Log is not installed on any child sites.
	* Improved the retrieving events process for when child sites have no activity log events.
	* Updated the help text in the extension settings.

* **Bug Fixes**
	* Handling an error for when Activity Log for MainWP is installed on a WordPress site without MainWP.

= 1.0 (2018-11-15) =

	* First release - everything is new!