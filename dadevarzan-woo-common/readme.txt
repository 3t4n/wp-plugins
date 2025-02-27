=== Dadevarzan Common for Woocommerce ===

Contributors:      dadevarzan
Plugin Name:       Dadevarzan Common for WooCommerce
Tags: Dadevarzan, Dadehvarzan, WordPress, Woocommerce, wp, wc, woo, common
Requires at least: 5.0.0
Tested up to: 6.1.1
Requires PHP: 7.2
Stable tag: trunk
License: GNU General Public License v2.0 or later

== Description ==

Dadevarzan custom shortcodes and common functionalites for Woocommerce.

- Displaying Woocommerce Product Gallery images
[dv_wc_product_images count='1' size='medium']

- Displaying Woocommerce sorting product selectbox
[dv_display_product_sorting]

- Displaying Woocommerce variation swatches based on <a href="https://wordpress.org/plugins/woo-variation-swatches/" target="_blank">Variation Swatches for WooCommerce</a>,
[dv_wc_product_variation_swatches term='ATTRIBUTE-SLUG' type='color|image|button']

- Displaying Attribute Table outside of default WooCommerce tabs
[dv_product_additional_information]

- Displaying Product Review outside of default WooCommerce tabs
[dv_display_product_review]

- Displaying Woocommerce Compaire based on <a href="https://wordpress.org/plugins/woo-smart-compare/" target="_blank">WPC Smart Compare for WooCommerce</a>,
[dv_product_compaire]

- Displaying Woocommerce Wishlist based on <a href="https://wordpress.org/plugins/woo-smart-wishlist/" target="_blank">WPC Smart Wishlist for WooCommerce</a>,
[dv_product_wishlist]

- Displaying Woocommerce Product Discount budge if os sales,
[dv_display_product_discount]

- Displaying Woocommerce stock status based on <a href="https://docs.wpbeaverbuilder.com/beaver-themer/field-connections/use-conditional-shortcode-to-test-for-presence-of-content-themer/" target="_blank">this article</a>,
[wpbb-if  post:custom_field key='_stock_status' exp='equals' value='outofstock']
	&#x3C;div class=&#x22;dv-stock_status dv-outofstock&#x22;&#x3E;ناموجود&#x3C;/div&#x3E;
[wpbb-else]
	&#x3C;div class=&#x22;dv-stock_status dv-instock&#x22;&#x3E;موجود&#x3C;/div&#x3E;
[/wpbb-if]

- Added <a href="https://wordpress.org/plugins/woo-variation-swatches/" target="_blank">Variation and Swatches</a> to <a href="https://searchandfilter.com/" target="_blank">Search & Filter Pro</a>

== Installation ==
1. Install Dadevarzan Common for WooCommerce either via the WordPress.org plugin repository or by uploading the files to your server. (See instructions on <a href="http://www.wpbeginner.com/beginners-guide/step-by-step-guide-to-install-a-wordpress-plugin-for-beginners/" rel="friend">how to install a WordPress plugin</a>)
2. Activate Dadevarzan Common for WooCommerce.
