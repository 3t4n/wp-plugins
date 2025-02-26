=== Painless Analytics ===
Contributors: amandato, painlessanalytics
Tags: analytics, statistics, stats, metrics, traffic
Donate link: https://www.painlessanalytics.com
Requires at least: 5.5
Tested up to: 6.7.1
Requires PHP: 5.4
Stable tag: 0.9.12
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Simplified web analytics focused on the metrics that matter most.

== Description ==

**[Painless Analytics](https://www.painlessanalytics.com/)** is a new web analytics service that reports the metrics that matter the most.

**Note:** This plugin interacts with the **[Painless Analytics](https://www.painlessanalytics.com/)** API to retrieve and include analytics tracking code on your website. By using this plugin, your site communicates with the Painless Analytics service. Please refer to their [Privacy Policy](https://www.painlessanalytics.com/company/legal/privacy/) and [Terms of Use](https://www.painlessanalytics.com/company/legal/terms/) to learn more.

**An account (FREE or paid) from [Painless Analytics](https://www.painlessanalytics.com/) is required to use this plugin** 

== Additional Info ==

This plugin simplifies the implementation of Painless Analytics web analytics service onto a website. This plugin requires a valid Painless Analytics *link code* in order to function.

Painless Analytics does not track personal identifiable information (PII) or use cookies. Painless Analytics JavaScript code is loaded asynchronously, it does not interfere with other page operations or cause page loading delays.

== Installation ==

= Automatic Plugin Installation =
Install using the [built-in plugin installer](https://codex.wordpress.org/Administration_Screens#Add_New_Plugins):

1. Go to Plugins > Add New. 
2. Type in "Painless Analytics" in *Search* Plugins box. 
3. Find "Painless Analytics" in the search results.
4. Click *Install Now* to install the WordPress Plugin.
5. Click Activate to activate it.
6. Go to Painless Analytics settings page to setup tracking.

= Manual Plugin Installation =

1. Download this plugin to your computer.
2. Extract the plugin zip file (or compressed folder).
3. With your FTP program, upload the plugin folder to the wp-content/plugins folder in your WordPress directory online.
4. Go to Plugins screen and find "Painless Analytics" plugin in the list.
5. Click Activate to activate it.
6. Go to Painless Analytics settings page to setup tracking.

== Frequently Asked Questions ==

= Does Painless Analytics replace or conflict with Google Analytics? =
No, you can use Google Analytics with Painless Analytics.

= Does Painless Analytics work with Google Tag Manager? =
Yes. Instead of installing this plugin you could add Painless Analytics to GTM, though we do not recommend that. 

= Where do I get a Painless Analytics embed code? =
Painless Analytics embed codes are available at [painlessanalytics.com](https://www.painlessanalytics.com/). FREE and paid plans are available. Each embed code is unique to each website registered at Painless Analytics.

= Does this replace other web analytics? =
No! If you already have analytics setup with other tools or services we strongly suggest you them in place. 
Painless Analytics is intended to make your life easier, but if it doesn't help you, no worries. 

== Screenshots ==
1. Painless Analytics initial setup
2. Painless Analytics setup, enter your embed code and click 'Save Changes'
3. Painless Analytics is now enabled on your site

== Changelog ==

= 0.9.12 =
* 02/09/2025
* Tested with 6.7.1

= 0.9.9 =
* 11/07/2024
* Setup GitHub to deploy to svn

= 0.9.5 =
* 11/06/2024
* Added banner and icon images for the assets folder.

= 0.9.4 =
* 10/03/2024
* Added `wp_unslash()` when sanitizing `HTTP_HOST` per instruction from the official Plugin Check plugin

= 0.9.3 =
* 10/03/2024
* Added documentation of use of a 3rd Party or external service (Painless Analytics)
* Moved API url to be a private member variable of the Painless Analytics class
* Fixed Internationalization issue: text domain not set in the header.php
* Made `sanitizeSettings()` a member function (no longer static) to reference member variables of object
* Added `sanitize_text_field()` to `$_SERVER['HTTP_HOST']`
* Standardized on `painlessanalytics_` prefix for functions and global object names
* For security, all files now `exit()` if they are accessed directly
* Confirmed the settings page form is using appropriate nonce code
* Replaced `dirname(__FILE__)` calls to use defines `PAINLESSANALYTICS_PLUGIN_PATH` and `PAINLESSANALYTICS_PLUGIN_URL` in the core plugin file

= 0.9.2 =
* 08/26/2024
* Updated the text-domain to match new slug name _painless-analytics_

= 0.9.1 =
* 08/26/2024
* Added new logic to setup embed code by using a Link Code available from Painless Analytics

= 0.9.0 =
Initial release of Painless Analytics plugin

= Full Version History =
Please see the changelog on Github.

== Upgrade Notice ==
None at this time.

== Contributors ==
Angelo Mandato, Founder and CTO of [Painless Analytics](https://www.painlessanalytics.com) - Plugin author
