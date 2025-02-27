=== Security Header Generator ===
Contributors: kevp75
Donate link: https://paypal.me/kevinpirnie
Tags: security, security headers, content security policy, permissions, permissions policy
Requires at least: 6.0.9
Tested up to: 6.8
Requires PHP: 7.4
Stable tag: 5.2.03
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
 
This plugin generates the proper security HTTP response headers to keep your site secured.
 
== Description ==
 
This plugin generates the proper security HTTP response headers, attempts to generate a valid Content Security Policy, and sets browser permissions if configured. 
 
== Installation ==
 
1. Download the plugin, unzip it, and upload to your sites `/wp-content/plugins/` directory
    1. You can also upload it directly to your Plugins admin
2. Activate the plugin through the 'Plugins' menu in WordPress
 
== Frequently Asked Questions ==
 
= What is a Content Security Policy? =
 
A Content Security Policy is an added layer of security that helps to detect and mitigate certain types of attacks, including Cross Site Scripting (XSS) and data injection attacks.
 
== Screenshots ==
 
1. Standard Header Settings
2. Content Security Policy Settings
3. Permissions Settings
4. Documentation
5. Import/Export Settings
6. Headers Set
 
== Changelog ==

= 5.2.03 =
* Requirements: WP Core: 6.0.9
    * Next version will be incompatible with PHP 7.4
* Verify: WP Core 6.8 Compatability
* Verify: PHP 8.4 Compatibility
* Fix: Field Not Found in settings for Report to
* Fix: Removed 'nothing' for unsafe settings
    * literally did nothing anyways, and wasn't actually meant for that
    * the keyword 'none' should be added to "Source" if it is needed
* Fix: "apply_child_override" warnings
* Add: PHP Upgrade Notice for any site under PHP 8.1

= 5.1.31 =
* Fix: Issue where menu would disappear on non-multisite

= 5.1.29 =
* Fix: Some undefined array keys when some settings not set
* Verify: WP Core 6.7 Compatibility
* Fix: Defaults for settings. 
    * Found headers were being applied after turning off setting that should not have been
* Clean Up: Versions older than 4

= 5.0.11 =
* Add: `sandbox` directive for Content Security Policy
    * https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/sandbox
* Fix: Application of CSP headers when there is no value set
    * No longer sets the directive if nothing is configured for it.
* Fix: Some styling in the admin pages
* Remove: Deprecated CLI methods
* Update: JS Libraries for settings framework
* Verified: PHP 8.3 Compatibility

= 4.6.01 =
* Verified: WP Core 6.6 Compatibility
* Updated: settings fw: Fixed: PHP 8.x deprecated notices.
* Updated: Documentation
* Removed: references to implementation to avoid confusion

= 4.1.22 =
* Removed: CLI Generator
* Verified: WP Core 6.5 Compatibility
* Add: Apply CSP to REST API
    * Please be aware, once this is switched on it will also be active for the admin area of the site.
    * Hook: `wpsh_send_restapi_headers`

= 4.0.01 =
* Verified: Core Version 6.4 compliant
* Remove: `navigate-to` directive for Content Security Policy
    * Per: https://docs.w3cub.com/http/headers/content-security-policy/navigate-to no longer supported in any browser
* Add: `report-to` directive for Content Security Policy
    * https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/report-to
    * Please be aware, this directive currently does nothing in Firefox and Safari
* Updated: Wordpress Defaults.  Compliant ONLY with the following:
    * Plugins: Gravity Forms
    * Themes: Twenty Twenty, Twenty Twenty-One, Twenty Twenty-Two, Twenty Twenty-Three
* Updated: Wordpress Core version requirements to 5.6.10
