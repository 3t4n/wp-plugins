=== Civic Cookie Control ===
Contributors: aperperis, ralliaf, tasoscivicuk 
Plugin Name: Civic Cookie Control
Plugin URI: https://www.civicuk.com/cookie-control 
Tags: cookie, cookies, cookie legislation, eu cookie law, GDPR
Author URI: https://www.civicuk.com
Author: Civicuk
Requires at least: 3.0
Tested up to: 6.5.2
Requires PHP: 5.6
Stable tag: 1.52
Version: 1.52
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html


This plugin enables you to comply with the UK and EU law on cookies.

== Description ==

This Wordpress plugin simplifies the implementation and customization process of Cookie Control by [Civic UK](https://www.civicuk.com/).

With an elegant user-interface that doesn't hurt the look and feel of your site, Cookie Control is a mechanism for controlling user consent for the use of cookies on their computer.

There are several license types available, including:

**Community edition** - Provides all of the core functionality of Cookie Control, and is of course GDPR compliant. You can use it to test Cookie Control, or if you don't require any of its pro features.

**Pro edition** - Includes all of the pro features for use on a single website, priority support and updates during your subscription. 

**Multisite Pro Edition** - Offers all of the pro features for use on up to ten websites, priority support and updates during your subscription.

**Pro edition** and **Multisite Pro Edition** support IAB (TCF v2.0).

To find out more about Cookie Control please visit [Civic's Cookie Control home page](https://www.civicuk.com/cookie-control).


**Please Note**:

You will need to obtain an API KEY from [Civic UK](https://www.civicuk.com/cookie-control/download) in order to use this plugin.

Cookie Control is simply a mechanism to enable you to comply with UK and EU law on cookies. **You need to determine** which elements of your website are using cookies (this can be done via a Cookie Audit, and ensure they are connected to Cookie Control.

**Important Note**:

Plugin Updated to support both version 8 and version 9 api keys. [Read more](https://www.civicuk.com/cookie-control/documentation)

== Installation ==

1. Obtain an API Key from [Civic UK](https://www.civicuk.com/cookie-control/download) for the site that you wish to deploy Cookie Control.*
2. Upload the entire plugin  folder to the /wp-content/plugins/ directory.
3. Activate the plugin through the 'Plugins' menu in WordPress.
4. Configure the plugin by selecting 'Cookie Control 8' on your admin menu.
5. All done. Good job!

* If you already have an API Key and are wanting to update your domain records with CIVIC, please visit [Civic UK]( https://www.civicuk.com/cookie-control/download)

* Integration with the [WP Consent API](https://wordpress.org/plugins/wp-consent-api)

To find out more about integrating Cookie Control with WP Consent API read our blogpost [here](https://www.civicuk.com/blog-item/integrating-cookie-control-wp-consent-api)

== Frequently Asked Questions ==

= API Key Error =

If you are using the free version your API key relates to a specific host domain.

So www.mydomain.org might work, but mydomain.org (without the www) might not.

Be sure that you enter the correct host domain when registering for your API key.

The recommended way of avoiding this problem is to create a 301 redirect so all requests to mydomain.org get forwarded to www.mydomain.org

This may have [SEO benefits](http://www.mattcutts.com/blog/seo-advice-url-canonicalization/) too as it makes it very clear to search engines which is the canonical (one true) domain. 

Be sure that you enter the correct version for your API key

= Is installing and configuring the plugin enough for compliance? =

Only if the only cookies your site uses are the Google Analytics ones. 
If other plugins set cookies, it is possible that you will need to write additional JavaScript.
To determine what cookies your site uses do a a Cookie Audit. You will need to do this in any case in order to have a compliant privacy policy.
It is your responsibility as a webmaster to know what cookies your site sets, what they do and when they expire. If you don't you may need to consult whoever put your site together.

= I'm getting an error message Cookie Control isn't working? =

Support for Cookie Control is available via the forum: [https://groups.google.com/forum/#!forum/cookiecontrol](https://groups.google.com/forum/#!forum/cookiecontrol/) or open a support ticket in [Support](https://www.civicuk.com/support)

= Update from previous version =

Users with plugin versions prior to 1.10 (downloaded directly from civicuk.com website) should backup their data, delete the older plugin version and download the latest version from Wordpress repository. Your data will remain intact, however you will have to re assign the third party cookies inside each cookie category and then save your settings. Users with version prior to 1.6 should review all settings and select values for newly created configuration options.

= GOVUK banner =

GOVUK consent banner is displayed the first time a service is used and persists on every page of the service until the user selects an option and updates their settings.
After the user accepts or rejects the use of cookies a confirmation message is displayed until they select “hide” or navigate away from the page.
Read more about this pattern here https://design-system.dwp.gov.uk/patterns/consent-to-cookies
The shortcode [ccc_gov_uk_block] builds a form with all cookie category configured so that users can change their consent.  You can add the parameter layout="single" to display all categories in one form, ex. [ccc_gov_uk_block layout="single"]

== Changelog ==
= 1.52 =
* Integration with the WP Consent API plugin.

= 1.51 =
* Added the "Wrap Inner HTML" field. The title on the Cookie Control banner has become an H1 title for accessibility reasons. In some cases this might affect SEO. If you want to change it to another heading level, set "Wrap InnerHTML" to True and it will set all semantic markup like h1 or p to div elements.

= 1.50 =
* General fixes to GOVUK layout.

= 1.49 =
* General improvements to GOVUK layout.
* Added GOVUK Form necessary cookie title field.
* Added GOVUK Form necessary cookie message field.

= 1.48 =
* Updated new GOVUK banner and cookies form layout.
* Added layout="single" το [ccc_gov_uk_block layout="single"] 
* GOVUK frontend texts compatibility with WPML (civic_cookiecontrol_settings_v9).
* Added Iab includeVendors within the iabConfig object and filter tool.
* Added iabCMP properties: vendorDataUses, dataRetention, privacy, liClaims, vendorCount, illustrationsDescription

= 1.47 =
* Added iabCMP Google vendors.
* Added iabCMP Google vendor informations.

= 1.46 =
* Change manual link.

= 1.45 =
* Added new property rejectButton in the object ccpaConfig.

= 1.44 =
* Typo correction (Additional Settings)

= 1.43 =
* Added disabled site scrolling option.

= 1.42 =
* Prefix all placeholders text with eg.
* Marked the required fields (under the Cookie category section)

= 1.41 =
* Added Custom Lisence product type.

= 1.40 =
* Removed some warning messages.

= 1.39 =
* Fixed Third party cookies bug.

= 1.38 =
* Fixed IE11 GOVUK Banner bug.

= 1.37 =
* PHP 7.4 Notice fixed.

= 1.36 =
* Added GOVUK Banner Layout based on this pattern https://design-system.dwp.gov.uk/patterns/consent-to-cookies.
* Bug fixes.

= 1.35 =
* Added support for TCF v2.0 Policies and Technical Specification changes to require disclosrue of storage duration (Planet49 ruling).
* Bug fixes.

= 1.34 =
* Fixed Same Site Value.

= 1.33 =
* Fixed Initial State 'Closed' value.

= 1.32 =
* Added support for LGPD legislation, by adding the vendors property to list vendors individually for each category.
* Added new text properties for vendors: showVendors, thirdPartyCookies and readMore
* Added outline property in the Accessibility Object to allow users to use the default browser outline.
* Added closeText and closeBackground options within the Branding Object to allow changing the styling of the "Close" button (if used).
* Added notifyFontColor and notifyBackgroundColor options within the Branding Object to allow changing the styling of notify interface (if used).
* Added fullLegalDescriptions and dropDowns properties in the iabConfig object to make the IAB view more concise.
* Added legalDescription text property for the updated IAB interface.
* Added saveOnlyOnClose property in the iabConfig object.

= 1.31 =
* Bug fix in cookie control script version.

= 1.30 =
* Update cookie control script version to latest stable version.
* Bug fix in "On load callback funtion".

= 1.29 =
* Removed iabCMP language field.
* Removed wp_kses() from "On accept callback function" and "On Revoke callback function" inside Cookie Category.

= 1.28 =
* Changed labels text for CCPA.

= 1.27 =
* Added new ccpaConfig Fields
* Fix statement , ccpaConfig and general improvements for plugin users.

= 1.26 =
* Added overlay option within Accessibility Object to accentuate the presence of an open notification bar or panel and discourage use of the main site while these elements are open.
* Added setInnerHTML to allow HTML content within text properties.
* Removed from IAB panel the objectPurposeLegitimateInterestObject, VendorLegitimateInterest, On, Off as they are no longer used.

= 1.25 =
* Added notifyDismissButton option to hide the X close icon on the notify bar.
* Added sameSiteValue property to control the value of the SameSite flag for the CookieControl cookie.
* Added some legal texts required by IAB TCFv2.0

= 1.24 =
* Fixed Close on global change.
* Fixed same Site Cookie.
* Added Accept All settings button text.

= 1.23 =
* Plugin Updated to support both version 8 and version 9 api keys.
* Support for IAB TCF v2.0. Support for v1.1 has been dropped since it is to be depreciated by IAB at the end of March 2020; certain IAB related public methods have been removed and the iabCMP text object has been updated accordingly. It is no longer necessary to set optionalCookies when in iab mode since IAB purposes will be the first panel settings.
* Support for California Consumer Privacy Act (CCPA).  - Cookie Control can work in either GDPR or CCPA mode based on the user's location.
* Added new box option for the initialState property.
* Added sameSiteCookie property, to control whether SameSite:Strict is set to the CookieControl cookie. Setting this to false would mean Cookie Control can only work over HTTPS.
* Added acceptBehaviour property to control the behaviour of "Accept" buttons. They now default to accepting all cookies. Please note that this is different from the behaviour of v8 where only recommended cookies were accepted.
* Added locale property so that the selected locale is customisable. It still defaults to the user's browser language.
* Added closeOnGlobalChange property so that the there is control on whether the window should close or remain open when the user accepts/rejects cookies.
* Added settingsStyle that Determines the appearance of the settings button on the notification bar.
* Added branding sub-properties that control the styling of the reject buttons
* Accessibility improvements and bug fixes.
* All apikeys now work under the following local adresses: localhost, 127.0.0.0/8, 10.0.0.0/8, 192.168.0.0/16, 172.16.0.0/12

= 1.22 =
* Added Reject Button Text for Notify bar.

= 1.21 =
* Fixed Third Party Description.

= 1.20 =
* Added top option for the initialState property, which is similar to notify but will display a bar at the top of the page ( Pro Edition ).
* Plugin updated to use CookieControl 8.3.

= 1.19 =
* Cookies field quotes fixed

= 1.18 =
* Fix error messages

= 1.17 =
* Fix notices

= 1.16 =
* Added alternative appearance styles for the notify bar's settings button.
* Added encodeCookie property to better support RFC standards and certain types of server processing.
* Added subDomains property to offer more flexibility on how user consent is recorded.
* IAB support (TCF v1.1)

= 1.15 =
* Fix trim Api Key

= 1.14 =
* Fix single quote bug for Privacy or cookie policy intro text

= 1.13 =
* Fix some css for radio buttons

= 1.12 =
* Fix visibility tabs for Pro License

= 1.11 =
* New Restructure core files
* Redesign user interface on settings page
* Auto Check API KEY from Civic Server so you don't have to choose manually the license type
* Fix General Bugs

= 1.10 =
* Fix php7.2 warning

= 1.9 =
* Fix necessary cookies bug

= 1.8 =
* Fix lawful basis bug

= 1.7 =
* Added alternative styles for closing the module (closeStyle property) and toggling consent to a cookie category (toggleType property).
* Improved accessibility support (accessibility property).
* Renamed initialConsentState to recommendedState so that it is more intuitive.
* Extended the branding options available.
* Simplified the module\'s Cookie Footprint, and removed the need for localStorage. Everything Cookie Control needs is now stored in a single cookie, named CookieControl.
* Automatically convert invalid cookie names from user settings to valid alternatives.
* Added onLoad callback property to execute custom code when Cookie Control is fully loaded.
* Extended public methods with saveCookie() and geoInfo().
* Fix backward compatibility for logConsent variable

= 1.6 =
* Fix bug when removing catgories and add new ones

= 1.5 =
* Fix logConsent bug
* Remove privacy link icon if url is empty
* Remove some console warnings

= 1.4 =
* Add wp session cookies to necessary cookies by default
* Bar and pop up option for pro version
* More options changing default text strings
* Statement array to add privacy link

= 1.3 =
* Multiple objects support for third party cookies

= 1.2 =
* Consent cookie expiry option added

= 1.1 =
* Third party cookies on acceptance functionality added

= 1.0 =
* Initial Release
