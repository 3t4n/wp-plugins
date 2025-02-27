=== Stock Exporter for WooCommerce ===
Contributors: webdados, ptwooplugins
Tags: woocommerce, ecommerce, e-commerce, stock, webdados
Requires at least: 5.4
Tested up to: 6.7
Requires PHP: 7.0
Stable tag: 1.4

Export a simple CSV file report with the current WooCommerce products stock.

== Description ==

This plugin allows you to export a simple report, in a CSV file, with all the products, or only the ones where stock is managed, and its current stock on WooCommerce.
The file is UTF-16, comma-separated and the values are enclosed in double quotes.

= Features: =

* Generates a simple CSV file report with the current WooCommerce products stock;
* It’s also possible to see the report as a HTML table directly on the plugin’s admin page;
* WPML compatible;

= Other (premium) plugins =

Already know our other WooCommerce (premium) plugins?

* [Simple Custom Fields for WooCommerce Blocks Checkout](https://ptwooplugins.com/product/simple-custom-fields-for-woocommerce-blocks-checkout/) - Add custom fields to the new WooCommerce Block-based Checkout
* [Simple WooCommerce Order Approval](https://ptwooplugins.com/product/simple-woocommerce-order-approval/) - The hassle-free solution for WooCommerce order approval before payment
* [Shop as Client for WooCommerce](https://ptwooplugins.com/product/shop-as-client-for-woocommerce-pro-add-on/) - Quickly create orders on behalf of your customers
* [Taxonomy/Term and Role based Discounts for WooCommerce](https://ptwooplugins.com/product/taxonomy-term-and-role-based-discounts-for-woocommerce-pro-add-on/) - Easily create bulk discount rules for products based on any taxonomy terms (built-in or custom)
* [DPD / SEUR / Geopost Pickup and Lockers network for WooCommerce](https://ptwooplugins.com/product/dpd-seur-geopost-pickup-and-lockers-network-for-woocommerce/) - Deliver your WooCommerce orders on the DPD and SEUR Pickup network of Parcelshops and Lockers in 21 European countries

== Installation ==

* Use the included automatic install feature on your WordPress admin panel and search for “WooCommerce Stock Exporter”.
* Go to Products > Stock Exporter and click on “Export WooCommerce Stock” to generate the report.

== Frequently Asked Questions ==

= When using the "HTML table on new window" output option how can I format the table? =

Use the `wse_screen_new_header` action, with a priority higher than 10, to add your own CSS. Example here: https://gist.github.com/webdados/574704ecf877a18a8923af78e61f821b

You can also add any HTML using the `wse_screen_new_header` and `wse_screen_new_footer` filters. We are using priority 10 to add the HTML file structure, so you should use a value higher than 10 for the header and lower than 10 for the footer.

= Can this plugin also...? =

Nop! WooCoomerce Stock Report on a CSV file or HTML table. That’s it.

= Is this plugin compatible with the new WooCommerce High-Performance Order Storage? =

Yes.

= Is this plugin compatible with the new WooCommerce block-based Cart and Checkout? =

Yes.

= Can I contribute with a translation? =

Sure. Go to [GlotPress](https://translate.wordpress.org/projects/wp-plugins/stock-exporter-for-woocommerce/) and help us out.

= I need help, can I get technical support? =

This is a free plugin. It’s our way of giving back to the wonderful WordPress community.

There’s a support tab on the top of this page, where you can ask the community for help. We’ll try to keep an eye on the forums but we cannot promise to answer support tickets.

If you reach us by email or any other direct contact means, we’ll assume you need, premium, and of course, paid-for support.

= Where do I report security vulnerabilities found in this plugin? =  
 
You can report any security bugs found in the source code of this plugin through the [Patchstack Vulnerability Disclosure Program](https://patchstack.com/database/vdp/stock-exporter-for-woocommerce). The Patchstack team will assist you with verification, CVE assignment and take care of notifying the developers of this plugin.

== Changelog ==

= 1.4 - 2024-10-16 =
* [FIX] Load text domain at the right time to avoid PHP notices on WordPress 6.7 and above
* [DEV] Deprecated: Creation of dynamic property in PHP 8.3
* [DEV] Tested with 6.7-beta2-59198 and WooCommerce 9.4.0-beta.2

= 1.3 - 2022-12-12 =
* New filters to to manipulate the output: `wse_output_header` and `wse_output_line`
* Tested and confirmed WooCommerce block-based Cart and Checkout compatibility
* Requires WooCommerce 5.0 and WordPress 5.6
* Tested with WordPress 6.5-alpha-57159 and WooCommerce 8.5.1

= 1.2.0 - 2023-04-13 =
* Security update
* Tested and confirmed WooCommerce HPOS compatibility
* Apply WordPress Coding Standards wherever possible
* Tested with WordPress 6.3-alpha-55644 and WooCommerce 7.6.0-rc.2

= 1.1.0 - 2022-06-30 =
* New brand: PT Woo Plugins 🥳
* Requires WordPress 5.0, WooCommerce 3.0 and PHP 7.0
* Tested with WordPress 6.1-alpha-53556 and WooCommerce 6.7.0-beta.2

= 1.0.0 - 2021-11-08 =
* Fixed excluding stock ">= 0" or "<= 0" (thanks for the heads up @allbrandsmatter)
* Added "=" and "!=" to the stock exclusion possibilities
* Moved the "Stock Exporter" option under the "Products" menu option instead of "WooCommerce"
* Removed support for WooCommerce below 3.0 and PHP below 7.0
* Tested with WordPress 5.9-alpha-52030 and WooCommerce 5.9.0-RC.2

= 0.8.2 - 2021-03-10 =
* Tested with WordPress 5.8-alpha-50516 and WooCommerce 5.1.0

= 0.8.1 =
* Bugfix: show categories for variations
* Technical support clarification
* Tested with WordPress 5.5-beta4-48649 and WooCommerce 4.3.1

= 0.8.0 =
* New `wse_sort_field` filter to set the sort field for the exported products (defaults to "product" title)
* Tested with WordPress 5.5-alpha-47923 and WooCommerce 4.3.0-rc.2

= 0.7.2 =
* Tested with WooCommerce 4.0.1

= 0.7.1 =
* Changes on the InvoiceXpress banner
* Tested with WordPress 5.3.3-alpha-46995 and WooCommerce 3.9.0-rc.2

= 0.7 =
* Hide the InvoiceXpress nag if the invoicing is already installed and active
* Tested with WordPress 5.3.1-alpha-46798 and WooCommerce 3.8.1

= 0.6 =
* Change InvoiceXpress nag interval from 30 to 90 days
* Tested with WordPress 5.2.4-alpha-46074 and WooCommerce 3.8.0-beta.1
* Requires PHP 5.6

= 0.5 =
* New output option to be able to export as an HTML table on a new clean window
* Exclude products by stock (more and less than value)
* Exclude products by meta key (equal to value)
* ID, SKU and product type fields are now optional
* Better performance when choosing to export only products with managed stock
* New field: image (thumbnail)
* Better coding standards
* Tested with WooCommerce 3.5.2

= 0.4.2.1 =
* Tested with WooCommerce 3.3
* Bumped `Tested up to` tag

= 0.4.2 =
* Fixed a PHP notice due to WooCommerce 3.0 changes
* Removed the translation files from the plugin `lang` folder (the translations are now managed on WordPress.org’s GlotPress tool and will be automatically downloaded from there)
* Tested with WooCommerce 3.2
* Added `WC tested up to` tag on the plugin main file
* Bumped `Tested up to` tag

= 0.4.1 =
* Fixes a bug introduced on 0.4 that wouldn’t allow to export on WooCommerce older than 3.0

= 0.4 =
* Tested and adapted to work with WooCommerce 3.0.0-rc.2
* New WC_Product_Stock_Exporter and WC_Product_Variation_Stock_Exporter classes (extends WC_Product and WC_Product_Variation) to be used by the plugin to get and product details
* Added ID to the list of fixed fields to export
* Changed all product/variation and categories separator to `|`
* Bumped `Tested up to` tag

= 0.3.1 =
* Bumped `Tested up to` and `Requires at least` tags

= 0.3 =
* Release date: 2016-05-11
* You can now choose aditional fields to include on the report: Categories, Regular Price and any custom field from any plugin
* The options are saved to be used as default next time
* Update sponsored by ideiahomedesign.pt


= 0.2 =
* Release date: 2016-04-05
* Added the product price to the report
* readme.txt fixes

= 0.1.1 =
* Release date: 2015-11-19
* Fix: Translations were not loaded correctly
* Plugin URI added to readme.txt

= 0.1 =
* Release date: 2015-11-19
* Initial release, sponsored by ideiahomedesign.pt