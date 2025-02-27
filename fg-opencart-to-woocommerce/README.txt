=== FG OpenCart to WooCommerce ===
Contributors: Kerfred
Plugin Uri: https://wordpress.org/plugins/fg-opencart-to-woocommerce/
Tags: opencart, woocommerce, importer, migrator, converter
Requires at least: 4.5
Tested up to: 6.7
Stable tag: 1.44.0
Requires PHP: 5.6
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=fred%2egilles%40free%2efr&lc=FR&item_name=fg-opencart-to-woocommerce&currency_code=EUR&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted

A plugin to migrate OpenCart e-commerce solution to WooCommerce

== Description ==

This plugin migrates products, categories, images and information pages from OpenCart to WooCommerce/WordPress.

It has been tested with **OpenCart versions 1 to 4** and the latest version of WordPress. It is compatible with multisite installations.

Major features include:

* migrates OpenCart products
* migrates OpenCart product images
* migrates OpenCart product categories
* migrates OpenCart product tags
* migrates OpenCart information pages

No need to subscribe to an external web site.

= Premium version =

The **Premium version** includes these extra features:

* migrates OpenCart attributes
* migrates OpenCart filters
* migrates OpenCart options
* migrates OpenCart downloads
* migrates OpenCart users
* migrates OpenCart customers
* migrates OpenCart orders
* migrates OpenCart reviews
* migrates OpenCart tax classes
* migrates OpenCart related products
* migrates OpenCart coupons
* SEO: Redirect the OpenCart URLs to the new WordPress URLs
* SEO: Import meta data (meta title, description, keywords) to WordPress SEO
* the users and customers can authenticate to WordPress using their OpenCart passwords
* ability to update existing products
* ability to do a partial import
* ability to run the import automatically from the cron (for dropshipping for example)
* ability to run the import by WP CLI

The Premium version can be purchased on: [https://www.fredericgilles.net/fg-opencart-to-woocommerce/](https://www.fredericgilles.net/fg-opencart-to-woocommerce/)

= Add-ons =

The Premium version allows the use of add-ons that enhance functionality:

* Brands: imports the manufacturers
* Attachments: imports the downloads
* Internationalization: imports the translations to WPML or Polylang
* Custom order numbers
* Custom order statuses
* Product Options
* Product Bundles

== Installation ==

= Requirements =
WooCommerce must be installed and activated before running the migration.

= Installation =
1.  Install the plugin in the Admin => Plugins menu => Add New => Upload => Select the zip file => Install Now
2.  Activate the plugin in the Admin => Plugins menu
3.  Run the importer in Tools > Import > OpenCart
4.  Configure the plugin settings. You can find the OpenCart database parameters in the OpenCart file config.php
5.  Test the database connection
6.  Click on the import button

== Frequently Asked Questions ==

= I get the message: "[fgoc2wc] Couldn't connect to the OpenCart database. Please check your parameters. And be sure the WordPress server can access the OpenCart database. SQLSTATE[28000] [1045] Access denied for user 'xxx'@'localhost' (using password: YES)" =

* First verify your login and password to your OpenCart database.
* If OpenCart and WordPress are not installed on the same host, you can do this:
- export the OpenCart database to a SQL file (with phpMyAdmin for example)
- import this SQL file on the same database as WordPress
- run the migration by using WordPress database credentials (host, user, password, database) instead of the OpenCart ones in the plugin settings.

= The import is not complete =

* You can run the migration again and it will continue where it left off.
* You can add: `define('WP_MEMORY_LIMIT', '2G');` in your wp-config.php file to increase the memory allowed by WordPress
* You can also increase the memory limit in php.ini if you have write access to this file (ie: memory_limit = 2G).

= The images aren't being imported =

* Please check the URL field. It must contain the URL of the OpenCart home page

= Are the product attributes and options imported? =

* This is a Premium feature available on: https://www.fredericgilles.net/fg-opencart-to-woocommerce/

Don't hesitate to let a comment on the [forum](https://wordpress.org/support/plugin/fg-opencart-to-woocommerce) or to report bugs if you found some.

== Screenshots ==

1. Parameters screen

== Translations ==
* English (default)
* French (fr_FR)
* other can be translated

== Changelog ==

= 1.44.0 =
* New: Add the hook "fgoc2wc_product_types"

= 1.43.0 =
* New: Compatible with customized version of OpenCart 2.3
* Tested with WordPress 6.7.1

= 1.42.1 =
* Tested with WordPress 6.7

= 1.42.0 =
* New: Import the EAN field into the WooCommerce field GTIN, UPC, EAN or ISBN
* Fixed: [ERROR] Error:SQLSTATE[HY000]: General error: 1525 Incorrect DATE value: '0000-00-00 00:00:00'

= 1.40.0 =
* New: Add the function wp_table_exists()
* Tested with WordPress 6.6.1

= 1.38.0 =
* Tested with WordPress 6.6

= 1.37.3 =
* Fixed: Sale prices not imported if the default customer group ID is different from 0 or 1
* Fixed: Images whose filename starts with "image" were not imported
* Fixed: Deprecated: trim(): Passing null to parameter #1 ($string) of type string is deprecated
* Tested with WordPress 6.5.4

= 1.37.2 =
* Fixed: Files whose filename is longer than 255 characters were not imported
* Fixed: Images were not imported by File System method
* Tested with WordPress 6.5.2

= 1.37.1 =
* Fixed: Translations missing
* Tweak: Replace rand() by wp_rand()
* Tested with WordPress 6.5

= 1.37.0 =
* New: Run the plugin during the hook "plugins_loaded"

= 1.36.1 =
* Fixed: Call to undefined function wp_rand()

= 1.36.0 =
* Fixed: Unsafe SQL calls
* Tweak: Replace file_get_contents() by wp_remote_get()
* Tweak: Replace file_get_contents() + json_decode() by wp_json_file_decode()
* Tweak: Replace json_encode() by wp_json_encode()
* Tweak: Replace rand() by wp_rand()
* Tweak: Remove the deprecated argument of get_terms() and wp_count_terms()

= 1.35.0 =
* New: Compatible with OpenCart 4
* Fixed: Rename the log file with a random name to avoid a Sensitive Data Exposure

= 1.34.1 =
* Fixed: Mix of the slugs between the attachment pages, the product categories and the products

= 1.34.0 =
* Change: Set backorder = "notify" instead of "yes"

= 1.30.0 =
* New: Check if we need the Attachments add-on

= 1.29.0 =
* New: Import the EAN field to "EAN for WooCommerce"
* Tested with WordPress 6.4.3

= 1.28.0 =
* New: Don't import the images in duplicate
* Fixed: Plugin log can be deleted with a CSRF
* Fixed: Found 2 elements with non-unique id #fgoc2wc_nonce
* Tested with WordPress 6.4.2

= 1.27.3 =
* Tested with WordPress 6.4.1

= 1.27.1 =
* Tested with WordPress 6.4

= 1.27.0 =
* New: Compatibility with WooCommerce HPOS

= 1.26.0 =
* Tested with WordPress 6.3.2

= 1.25.3 =
* Fixed: Warning: preg_match(): Compilation failed: quantifier does not follow a repeatable item
* Tested with WordPress 6.3.1

= 1.25.2 =
* Tested with WordPress 6.3

= 1.25.0 =
* New: Import the short description managed by the OpenCart plugin Product Short Description Pro
* Fixed: FTP connection failed with password containing special characters
* Tested with WordPress 6.2.2

= 1.24.0 =
* Tweak: Clear WooCommerce Analytics cache

= 1.22.4 =
* Fixed: Product and category URLs were wrong in the translated languages

= 1.22.2 =
* Fixed: Constant FILTER_SANITIZE_STRING is deprecated on PHP 8

= 1.22.1 =
* Fixed: [ERROR] Error:SQLSTATE[42S22]: Column not found: 1054 Unknown column 'o.invoice_id' in 'field list'
* Tested with WordPress 6.2

= 1.22.0 =
* New: Compatibility with PHP 8.2

= 1.20.0 =
* New: Import the OpenCart 1.5 tags

= 1.19.0 =
* New: Compatibility with OpenCart 1.4
* Fixed: The option "Import the media with duplicate names" didn't work anymore (regression from 1.10.0). So wrong images were imported.

= 1.18.1 =
* Fixed: Files containing "+" were not imported
* Fixed: Files starting with /image were not imported
* Fixed: Files starting with ./image were not imported

= 1.17.0 =
* New: Import the OpenCart 1.5 URLs

= 1.16.0 =
* New: Compatibility with OpenCart 1.5

= 1.13.0 =
* New: Import the products SEO URLs
* New: Import the product categories SEO URLs
* Tested with WordPress 6.1.1

= 1.12.0 =
* New add-on: Brands

= 1.11.0 =
* Fixed: Missing parent category for some categories
* Change: Don't add the product name at the end of the image filename

= 1.10.0 =
* New: Add the functions "get_wp_post_ids_from_meta" and "get_wp_term_ids_from_meta"
* Tweak: Shorten the filenames if the option "Import the media with duplicate names" is selected
* Tested with WordPress 6.1.0

= 1.9.0 =
* New add-on: Custom order numbers

= 1.8.0 =
* New add-on: Internationalization
* Fixed: [ERROR] Error:SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'option' at line 1
* Tested with WordPress 6.0.2

= 1.7.0 =
* Tested with WordPress 6.0.1

= 1.6.0 =
* New: Add the WordPress path in the Debug Info
* Fixed: The widget "Filter Products by Attribute" was empty on the front-end
* Tested with WordPress 6.0

= 1.3.1 =
* Fixed: Products imported with wrong special price when there is a tax rate

= 1.3.0 =
* New: Don't delete the theme's customizations (WP 5.9) when removing all WordPress content
* Tested with WordPress 5.9

= 1.2.1 =
* Fixed: [ERROR] Error:SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'order o'

= 1.0.2 =
* Tested with OpenCart 2
* Tested with WordPress 5.8.1

= 1.0.1 =
* Fixed: Progress bar exceeds 100% when running the import again
* Fixed: Decode HTML entities in the product title
* Update README.txt
* Translations

= 1.0.0 =
* Initial version: Import OpenCart products, categories, images and CMS

== Upgrade Notice ==

= 1.44.0 =
New: Add the hook "fgoc2wc_product_types"
