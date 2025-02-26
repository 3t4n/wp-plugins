=== Advanced Email Filter for Elementor Forms ===
Contributors: muktoapb
Tags: email validation, spam protection, elementor form eamil filter, business email, disposable email
Requires at least: 5.6
Tested up to: 6.7
Requires PHP: 7.4
Stable tag: 1.1.0
License: GPL-2.0-or-later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Enhance Elementor Pro Forms with advanced email filtering capabilities including global blocklists/whitelist and per-form controls.

== Description ==

Advanced Email Filter for Elementor Forms adds enterprise-grade email validation to your Elementor pro forms. Protect against spam submissions while maintaining flexibility for legitimate users.

== Features ==

* Global Blocklist/Whitelist management
* Per-form email filtering rules
* Wildcard support for domains and patterns
* Business email only filter (new feature)
* Disposable / temporary email blocking (new feature)
* Compatible with Elementor Pro forms only

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/advanced-email-filter-for-elementor-forms` directory
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Configure global settings under Email Filter -> Settings
4. Set form-specific rules in Elementor Form widget settings

== Configuration ==
There is two place where you can control email filter. 
= Global Settings =
Navigate to `Email Filter -> Settings` to configure:

* **Blocklist**: @spamdomain.com, *.ru, fake-user@

* **Whitelist**: @yourcompany.com, admin@, *.trusted.org

= Form-Specific Settings =
1. Edit Elementor Form widget
2. Open *Email Filtering* section
3. Add patterns:
    * Blocklist (form-specific)
    @temp-domain.com, *.xyz
    * Whitelist (form-specific)
    @client-domain.com, manager@

== Frequently Asked Questions ==

= Is Elementor Pro require to use this plugin? =
Yes, This plugin extand Elementor pro form features. So you need install & active Elementor pro.

= How do multiple patterns work? =
Separate patterns with commas. Both global and form rules apply cumulatively.

= Which takes priority - global or form settings? =
Allowlist rules always override blocklist. Form-specific settings combine with global rules using AND logic.

== Hooks & Filters ==

Customize validation behavior using these hooks:

`
// Modify validation error message
add_filter('aefe_validation_error', function($message, $email) {
    return sprintf(__('Error: %s is blocked', 'text-domain'), $email);
}, 10, 2);
`
== Screenshots ==

1. Global Blocklist/Whitelist management
2. Per-form email filtering rules

== Changelog ==

= 1.1.0 =
* Added Business Email filter
* Added Disposable / temporary email blocking
* Improved validation error message

= 1.0.0 =
* Initial release with core filtering features
* Global blocklist/Whitelist functionality
* Elementor Form widget integration
