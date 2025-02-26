=== Plugin Name ===
Contributors: snippetfactory
Donate link: https://www.buymeacoffee.com/snippetfactory
Tags: woocommerce analytics, analytics, reports, reporting, woocommerce reports, woocommerce admin, wc admin
Requires at least: 5.0
Tested up to: 5.4
Requires PHP: 7.0
Stable tag: 1.0.0
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html

This plugin disables the new WooCommerce Admin feature that previously was a plugin which was, with 4.0.0, merged into core.

== Description ==

There are no steps to follow. Simple install and activate. When activated, the WooCommerce Admin (the new reporting system) will be disabled. The previous reporting system will still work.

== Installation ==

1. Upload the entire disable-woocommerce-admin to the /wp-content/plugins/ directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. The new reporting system that was merged from the plugin WooCommerce Admin into core has now been disabled.

= Minimum Requirements =

* PHP 7.2 or greater is recommended
* MySQL 5.6 or greater is recommended

== Screenshots ==

1. Overview of the admin menu where the new report system is no longer active.

== Frequently Asked Questions ==

= What does this plugin do? =

Before WooCommerce 4.0.0, there was a plugin called WooCommerce Admin. That plugin was, with WooCommerce 4.0.0, merged into the WooCommerce core. This plugin disables the new reporting and analytics tool, going back to how it used to be.

= Will this increase the speed of my overall WooCommerce admin area? =

Most likely, yes. The new reporting and analytics tool is known to cause unnecessary bloat (it slows down the "system").

= What do I do if I want to revert back to using the new reporting and analytics tool? =

Simple deactivate this plugin and you're good to go.

= Can I not do this from my theme's functions.php file using the same filter? =

No, that won't work. This filter has to run as a plugin.

== Changelog ==

= 1.0.0 =
* Initial release.