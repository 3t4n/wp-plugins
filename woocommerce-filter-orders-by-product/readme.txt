=== WooCommerce Filter Orders by Product ===
Contributors: kowsar89
Tags: woocommerce, filter, order, product, admin
Requires at least: 3.0.1
Tested up to: 6.5.3
Requires PHP: 5.6
Stable tag: 4.1
License: GNU General Public License v3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Simplify order management by filtering WooCommerce orders by any specific product or product category using this plugin

== Description ==

Have you ever wanted to filter your order page results by a specific product? With this plugin, now you can!

Once installed, a new filter dropdown will appear on the WooCommerce Orders screen, displaying a list of all products. Simply select a product and click the "Filter" button to view orders containing only that product.

This plugin supports filtering orders by:

- Product Name
- Product Category

Note: This plugin is compatible with both WooCommerce's new HPOS (High-Performance Order Storage) and the legacy WordPress posts storage. Whether you're using HPOS or the traditional storage method, this plugin will work seamlessly.

== Installation ==

There are three different ways to install this plugin, as well as any other plugin from the WordPress.org repository.

= Automatic Installation via WordPress Dashboard =

1. Log in to your WordPress admin dashboard.
2. Navigate to `Plugins` > `Add New`.
3. Search for "WooCommerce Filter Orders by Product".
4. Click `Install Now` next to the plugin.
5. Once installed, click `Activate`.

= Manual Upload through WordPress Dashboard =

1. Download the "WooCommerce Filter Orders by Product" plugin ZIP file.
2. Log in to your WordPress admin dashboard.
3. Navigate to `Plugins` > `Add New`.
4. Click `Upload Plugin`.
5. Click `Choose File`, select the plugin ZIP file you downloaded, and click `Install Now`.
6. Once the installation is complete, click `Activate Plugin`.

= Installation via FTP =

1. Download the "WooCommerce Filter Orders by Product" plugin ZIP file and extract it to your computer.
2. Using an FTP client, connect to your web server.
3. Navigate to `/wp-content/plugins/`.
4. Upload the extracted plugin folder to the `/wp-content/plugins/` directory on your server.
5. Log in to your WordPress admin dashboard.
6. Navigate to `Plugins`.
7. Locate "WooCommerce Filter Orders by Product" in the list and click `Activate`.

After the installation is complete, a new filter will appear on the WooCommerce Orders page.

== Frequently Asked Questions ==

= Does this plugin work for all product statuses (public, draft, etc.)? =

Currently, this plugin only works for published products. To make it work for all product statuses (e.g., draft, private), add the following code to your theme's `functions.php` file:

	add_action( 'wfobp_product_status', 'filter_order_by_product_status' );
	function filter_order_by_product_status(){
		return 'any';
	}

== Screenshots ==

1. From admin panel, Click on "WooCommerce>Orders" to visit the Orders screen. There you'll see a new dropdown filter.
2. Click on that dropdown and you'll see a list of all products. Select a product and click on "Filter" button. It'll show up the orders which contains only that specific product.

== Changelog ==

= 4.1 - May 20, 2024 =
* Tweak: Readme updated

= 4.0 - Dec 31, 2023 =
* Tweak: Added WooCommerce HPOS support

= 3.3 - Aug 20, 2023 =
* Fix: Resolved PHP notice caused by incorrect use of the `is_search()` function

= 3.1 =
* Readme updated

= 3.0 =
* New: Now it's possible to filter by Product Category
* Code refactored

= 2.0.7 =
* Fix: Products with same name only appeared once before

= 2.0.6 =
* Added hook for changing product status

= 2.0.5 =
* Fixed SQL injection bug

= 2.0.4 =
* Improved code

= 2.0.3 =
* Fix: Language

= 2.0.2 =
* Fixed translation bug (Thanks to Kasperta)

= 2.0.1 =
* Fixed a minor bug

= 2.0.0 =
* New: search dropdown
* Fixed a major bug

= 1.0.0 =
* Initial release