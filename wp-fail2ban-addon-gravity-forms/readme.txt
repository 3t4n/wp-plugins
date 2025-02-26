=== WP fail2ban Add-on for Gravity Forms ===
Contributors: invisnet
Author URI: https://invis.net/?utm_source=wordpress.org&utm_medium=readme&utm_campaign=wp-fail2ban-addon-gravity-forms-2.0.0
Plugin URI: https://addons.wp-fail2ban.com/gravity-forms/?utm_source=wordpress.org&utm_medium=readme&utm_campaign=wp-fail2ban-addon-gravity-forms-2.0.0
Tags: fail2ban, security, spam, gravity forms, classicpress
Requires at least: 4.9
Tested up to: 6.1
Stable tag: 2.0.0
Requires PHP: 7.4
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html

[*WP fail2ban*](https://wp-fail2ban.com/?utm_source=wordpress.org&utm_medium=readme&utm_campaign=wp-fail2ban-addon-gravity-forms-2.0.0) integration with Gravity Forms to log spam form submissions.

== Description ==

No matter how good your anti-spam measures, some will get past. This add-on logs spam form submissions via [*WP fail2ban*](https://wordpress.org/plugins/wp-fail2ban/), and provides a new filter for `fail2ban`.

== Installation ==

1. Ensure [*WP fail2ban*](https://wordpress.org/plugins/wp-fail2ban/) is installed.
1. Install via the Plugin Directory, or upload to your plugins directory.
1. Activate the plugin through the 'Plugins' menu in WordPress.
1. Add `wordpress-gravityforms-extra.conf` to your `fail2ban` configuration.

== Changelog ==

= 2.0.0 =
* Update support links.
* Compatibility changes for upcoming `WPf2b` release.

= 1.3.1 =
* Fix type error with 4.4.0.

= 1.3.0 =
* Compatibility changes for latest `WPf2b` release.
* Bump minimum PHP version to 7.4.

= 1.2.0 =
* Compatibility changes for upcoming `WPf2b` release.

= 1.1.0 =
* Bug-fix.
* Bump minimum PHP version to 7.3.
* Multisite: change to network-only activation.
* Complete refactoring.

= 1.0.2 =
* Use correct activation landing page.

= 1.0.1 =
* Fix Freemius slug.

= 1.0 =
* Initial release.

== Upgrade Notice ==

= 2.0.0 =
Compatibility release. You do not need to update your `fail2ban` filters.

= 1.3.1 =
Important (not security) bug-fix release. You do not need to update your `fail2ban` filters.

= 1.3.0 =
Compatibility release; requires *WP fail2ban* **4.4.0** or later. You do not need to update your `fail2ban` filters.

= 1.2.0 =
Compatibility release. You do not need to update your `fail2ban` filters.

= 1.1.0 =
You will need to re-activate the plugin after upgrading. You do not need to update your `fail2ban` filters.

= 1.0.2 =
This is a cosmetic bug-fix. You do not need to update your filters.

