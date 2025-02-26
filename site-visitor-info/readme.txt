=== Site visitor Information ===
Contributors: Usman Altaf
Donate link: usmanaltafwp@gmail.com
Tags: IP based redirection, IP based Block Visitor, targeted content, ip address,
Requires at least: 3.0
Tested up to: 4.9
Stable tag: 1.13.2

Block Visitor to Access the Website and Redirects visitors to a predefined URL using IP address.

== Description ==

Enables Administrator to easily Block Speciif Visitor to Access the website and redirect visitors to a predefined URL using IP address.

Key Features

* Block Specific Visitor
* Redirects Specific visitors to a predefined URL


= More Information =
Please Connect me at <a href="mailto:usmanaltafwp@gmail.com">usmanaltafwp@gmail.com</a>

== Frequently Asked Questions ==

== Screenshots ==

1. Redirect visitor from Nigeria to http://google.com.

== Changelog ==
* 1.13.2 Fix bug which prevented rules from being saved.
* 1.13.1 Fix rule insertion bug.
* 1.13.0 Multiple countries redirection is now available with single rule.
* 1.12.0 Domain redirection will now remain the path and query string. Fine tuned rule validations.
* 1.11.2 Minor fixes.
* 1.11.1 Ignore "www." when redirect domain.
* 1.11.0 Added debug log.
* 1.10.2 Minor bugs fixed.
* 1.10.1 Fixed notice dismiss issue.
* 1.10.0 Added domain redirection.
* 1.9.3 Fixed rule validation bugs.
* 1.9.2 Fixed bugs.
* 1.9.1 Minor changes.
* 1.9.0 IP2Location database update changed to use download token.
* 1.8.0 Added option to enable redirection for first time only. Custom URL allowed in "From" page.
* 1.7.6 Prevent duplicated cart items during redirection.
* 1.7.5 Fixed bots detection.
* 1.7.4 Minor changes.
* 1.7.3 Fixed checkbox issues in configuration page.
* 1.7.2 Bug fixes.
* 1.7.1 Minor update.
* 1.7.0 Added exclude option to redirect all countries except a specified country.
* 1.6.0 Added option to stop redirection when bots / crawlers detected. Fixed inifinite loop bug with some pages.
* 1.5.0 Refined GUI and performance improvements.
* 1.4.1 Fixed checkbox issue.
* 1.4.0 Added home page as redirection source.
* 1.3.3 Fixed infinite loop when redirect within same domain using URL mode.
* 1.3.2 Fixed conflicts when multiple IP2Location plugins installed.
* 1.3.1 Added support for custom GET parameter.
* 1.3.0 Use IP2Location PHP 8.0.2 library for lookup.
* 1.2.7 Use latest IP2Location library for lookup.
* 1.2.6 Fixed close sticky information panel issue.
* 1.2.5 Redirections has been disabled on adminsitrator.
* 1.2.4 Fix uninstall function.
* 1.2.3 Prevent settings lost when deactivate/activate the plugin.
* 1.2.2 Use latest IP2Location library and updated the setting page.
* 1.2.1 The redirection source and destination will list out all possible posts & pages now.
* 1.2.0 Multiple country selection added.
* 1.1.15 Tested with WordPress 4.4.
* 1.1.14 Ignore redirection in admin page.
* 1.1.13 Fixed linking issue to database file. Prevent infinite loop if wildcard chosen.
* 1.1.12 Fixed save issues.
* 1.1.11 Fixed warning message in WordPress 4.3.
* 1.1.10 Fixed redirection issues. Fixed errors with earlier version of PHP.
* 1.1.9 Fixed compatible issues with PHP 5.3 or earlier.
* 1.1.8 Fixed errors with PHP 5.3 or earlier.
* 1.1.7 Fixed class name issue when upgrade from previous version.
* 1.1.6 Fixed redirection issue in iOS devices. Use latest IP2Location library.
* 1.1.5 Remain query string after redirected to external URL.
* 1.1.4 Fix redirect issue when URL rewrite is using.
* 1.1.3 Will remain query string in URL after redirection.
* 1.1.0 Added supports for IP2Location Web Service.
* 1.0.1 Fixed issue on activation.
* 1.0.0 First public release.


== Installation ==
### Using WordPress Dashboard
1. Select **Plugins -> Add New**.
1. Search for "IP2Location Redirection".
1. Click on *Install Now* to install the plugin.
1. Click on *Activate* button to activate the plugin.
1. Download IP2Location database from http://lite.ip2location.com (Free) or http://www.ip2location.com (Commercial).
1. Decompress the .BIN file and upload to `wp-content/plugins/ip2location-redirection`.
1. If you have IP2Location Web service purchased at http://www.ip2location.com/web-service, insert your API key in the Settings tab.
1. You can now start using IP2Location Redirection to block visitors.

### Manual Installation
1. Upload the plugin to `/wp-content/plugins/ip2location-redirection` directory.
1. Activate the plugin through the 'Plugins' menu in WordPress.
1. Download IP2Location database from http://lite.ip2location.com (Free) or http://www.ip2location.com (Commercial).
1. Decompress the .BIN file and upload to `wp-content/plugins/ip2location-redirection`.
1. If you have IP2Location Web service purchased at http://www.ip2location.com/web-service, insert your API key in the Settings tab.
1. You can now start using IP2Location Redirection to redirect visitors.

Please take note that this plugin requires minimum **PHP version 5.4**.