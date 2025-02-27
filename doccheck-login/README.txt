=== DocCheck Login ===
Contributors: antwerpes
Tags: DocCheck, login, medical, authentication, hcp, hwg, healthcare, OAuth2
Requires at least: 5.5
Tested up to: 6.4
Stable tag: 1.1.5
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

The open source DocCheck plug-in enables the authentication of certified healthcare professionals and facilitates the integration of the DocCheck login.

== Description ==

This open source plugin provides a solution for the technical implementation of the DocCheck login onto WordPress websites and authenticates verified healthcare professionals, thus securing your website according to the German Health Services and Products Advertising Act.

Features:

* Login-iFrame in 4 different sizes and 6 languages (GER, EN, FR, NL, IT, ES)
* DocCheck login integration with shortcode
* Protected websites in your navigation bar can be hidden from non-authorised users
* Information on public websites that is subject to the German Health Services and Products Advertising Act can be hidden from non-authorised users
* User authentication with OAuth2

User authentication with OAuth2 provides a high security standard and is part of the paid DocCheck [Economy](https://more.doccheck.com/fileadmin/user_upload/files/industry/b2b-landingpage/industry-erste-hilfe-kasten-login_licences_en.pdf#page=4) and [Business](https://more.doccheck.com/fileadmin/user_upload/files/industry/b2b-landingpage/industry-erste-hilfe-kasten-login_licences_en.pdf#page=5) license. This is why the WordPress plugin is not available for Basic login clients.

DocCheck is not the author and can therefore not provide support for this plugin.

If you have questions regarding the plugin, please direct them to the support forum.

If you have any questions regarding the DocCheck login service and the DocCheck licenses, you can contact the DocCheck support.

== Installation ==

1. Upload folder `doccheck-login` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Check out the "first steps" help tab on the settings page for further guidance

== Frequently Asked Questions ==

= What do I need for the plugin to run properly?

* A DocCheck user account. You can register [here](https://www.doccheck.com/register).
* A company account in DocCheck's login administration, which can be created [here](https://crm.doccheck.com/com/index/). This is where you can set up a Basic login client. See also their technical manual.
* An Economy or Business License. In order to get an individual quote, please write a mail to industry[at]doccheck[dot]com
* The Client Secret for the OAuth2 communication. Once you’ve accepted a quote. DocCheck will assign the license features and provide the Client Secret.

= Can I test the plugin?

* DocCheck offers you a free 14-day trial for a license of your choice. If you are interested, you can reach out to industry[at]doccheck[dot]com. Beforehand, you will have to set up the company account and the Basic login in DocCheck's login administration.
* As test licenses are designed for use with test users only, please make sure to not use a live environment for testing.
* Test users can be created in CReaM. Click [here](https://more.doccheck.com/fileadmin/user_upload/files/industry/b2b-landingpage/industry-erste-hilfe-kasten-technical_manual_en.pdf#page=15) to learn how.

= What can I check if the authentication fails?

* Check if Client Secret and Login ID are set correctly
* Check the logs for any suspicious entries
* Check the if any caching prevents correct session handling
* Check if the OAuth2 communication with the DocCheck server can be established successfully
* Check if the main target URL is set correctly in the login settings in the DocCheck login administration CReaM

== Screenshots ==

1. Backend: Plugin settings
2. Backend: Icon to indicate which pages are access restricted
3. Backend: Checkbox to access restrict page
4. Backend: Shortcode to hide content if user is not logged in via DocCheck
5. Backend: Shortcode to display login iframe

== Changelog ==
= 1.1.5 =
* Fixing the return_uri and escaping, replace wp_remote_get with wp_remote_post.

= 1.1.4 =
* add support for "php": "<=7.4"

= 1.1.3 =
* Fix security issues

== Changelog ==
= 1.1.2 =
* add wp_remote_get instead of CURL and add UTM parameters after redirect

* Tested up to 6.2
= 1.1.1 =
* add more details of CURL request in error messages
* Tested up to 6.2

= 1.1.0 =
* Update Help First Step Tab, add cookie lifetime option to new session
* Tested up to 5.9

= 1.0.9 =
* Fix active session detecting by WordPress Site Health
* Tested up to 5.7.1

= 1.0.8 =
* Bug fix profession routing and profession access management

= 1.0.7 =
* Added profession routing and profession access management
* Tested up to 5.4.2

= 1.0.6 =
* Added option to auto set language with WPML Plugin
* Tested up to 5.2.3

= 1.0.5 =
* Added Support of Custom Post Types
* Tested up to 5.2.3

= 1.0.4 =
* Added cache helper for cache plugin compatibility
* Tested up to 5.2.3

= 1.0.3 =
* Replaced internal redirect handling with return_uri parameter from DocCheck Login.
* Tested up to 5.2.2

= 1.0.2 =
* Fixed cookie handling. 
* Tested up to 5.2.1

= 1.0.1 =
* Adjusted plugin textdomain to match plugin slug.

= 1.0.0 =
* Plugin release.
