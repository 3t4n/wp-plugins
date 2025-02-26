=== Antispam for Elementor Forms ===
Contributors: madebygreyhound
Tags: elementor, forms, antispam, honeypot
Requires at least: 5.2
Tested up to: 6.7.1
Requires PHP: 8.0
Stable tag: 2.2.4
License: GPL v3
License URI: https://www.gnu.org/licenses/gpl-3.0.en.html

Practical spam prevention for Elementor Forms, without relying on third-party services.

== Description ==

Antispam for Elementor Forms adds two methods of preventing spam submissions to Elementor Pro forms - checking the form contents against the WordPress comment blocklist, which is automatically synced daily, and a JavaScript-based honeypot field, with an optional minimum time to fill out the form.

**Privacy disclaimer**

This plugin uses the WordPress comment blocklist from GitHub (https://github.com/splorp/wordpress-comment-blacklist, via the raw.githubusercontent.com domain). It is synced daily. Your server's IP address will be shared with GitHub when this happens. Their terms of use can be found here: https://docs.github.com/en/site-policy/github-terms/github-terms-of-service and their privacy statement can be found here: https://docs.github.com/en/site-policy/privacy-policies/github-general-privacy-statement No data about your users is shared.

== Installation ==
1) Install the plugin from the WordPress Plugin Directory.
2a) Checks against the comment blocklist are performed automatically, but further configuration can be done in Elementor -> Settings, in the Antispam for Elementor Forms tab.
2b) The JS Honeypot field must be manually added to forms which require it.

== Changelog ==
1.0.0
- First release

2.0.0
- JS Honeypot field added.

2.1.0
- Corrections in preparation for uploading the plugin to the WordPress Plugin Directory.

2.2.0
- Add Delay setting to JS Honeypot field.

2.2.1
- Update Tested up to value for WordPress.
- Explicitly add Elementor dependency.

2.2.2
- Actually update Tested up to value for WordPress.

2.2.3
- Update Tested up to value for WordPress.
- Fix JS errors when used with multiple forms.
- Update readme to fix Short Description length error.

2.2.4
- Fix versioning to allow the plugin to update.
