=== Download Count for WooCommerce ===
Contributors: Katsushi Kawamori
Donate link: https://shop.riverforest-wp.info/donate/
Tags: count, download, product, woocommerce
Requires at least: 4.6
Requires PHP: 8.0
Tested up to: 6.7
Stable tag: 1.20
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Displays the number of products downloaded by customers.

== Description ==

Displays the number of products downloaded by customers.

= Products =
* The download count is displayed below the price of the product.
* The count is the total number of products downloaded.

= Admin panel for products =
* The download count is displayed in the "Downloads" column of the "All products" page in the admin page.
* The count is the total number of products downloaded.

= Admin panel for orders =
* The download count is displayed in the "Products : Downloads" column of the "Orders" page in the admin page.
* The count will be narrowed down by the product id and order id.

= Option =
* There is an option to "Displayed on the administration screen only", which can be set from the management screen.

= Filter =
* Provide a filter to download count html for product.

= Filter sample =
* Modifies the HTML for All Products.
~~~
/** ==================================================
 * Download Count for WooCommerce
 *
 * download_count_woo
 * @param string $html  html.
 * @param int    $count  count.
 */
function download_countproduct( $html, $count ) {

	$html = '<br /><span style="color: green;">' . $count . ' ' . __( 'Downloads', 'woocommerce' ) . '</span>';

	return $html;

}
add_filter( 'download_count_woo', 'download_countproduct', 10, 2 );
~~~

* Modifies the HTML for Product ID 331.
~~~
/** ==================================================
 * Download Count for WooCommerce
 *
 * download_count_woo_
 * @param string $html  html.
 * @param int    $count  count.
 */
function download_countproduct_331( $html, $count ) {

	$html = '<br /><span style="color: red;">' . $count . ' ' . __( 'Downloads', 'woocommerce' ) . '</span>';

	return $html;

}
add_filter( 'download_count_woo_331', 'download_countproduct_331', 10, 2 );
~~~

== Installation ==

1. Upload `download-count-for-woocommerce` directory to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

none

== Screenshots ==

1. Products
2. Admin panel for products
3. Admin panel for orders
4. Management screen

== Changelog ==

= [1.20] 2024/05/28 =
* Remove - customers download count list to management screen.

= [1.19] 2024/03/03 =
* Fix - Added nonce when sorting.
* Fix - Order Downloadable Item Checking Issues.

= 1.18 =
Supported WordPress 6.4.
PHP 8.0 is now required.

= 1.17 =
Fixed a problem of 'woocommerce_get_price_html' filter.

= 1.16 =
Supported High Performance Order Storage(COT).

= 1.15 =
Fixed a problem of 'woocommerce_get_price_html' filter.

= 1.14 =
Fixed a problem that caused an error when there was no count.

= 1.13 =
Fixed a problem that caused an error when there was no count.

= 1.12 =
Fixed a problem in displaying the number of downloads in the administration screen for multiple products.

= 1.11 =
Supported woocommerce 6.5.

= 1.10 =
Fixed a problem with customer data load.

= 1.09 =
Supported WordPress 5.7.

= 1.08 =
Improved the list table in the admin page.

= 1.07 =
Fixed display problem in the admin panel.

= 1.06 =
Fixed problem of download count for orders page.
Changed text of dropdown list for sort by product page.
Added customers download count list to management screen.

= 1.05 =
Added support for sorting by the number of downloads.

= 1.04 =
Added downloads column for admin product page.

= 1.03 =
Added management screen.

= 1.02 =
Change readme.txt.

= 1.01 =
Added filter for all products.

= 1.00 =
Initial release.

== Upgrade Notice ==

= 1.00 =
Initial release.

