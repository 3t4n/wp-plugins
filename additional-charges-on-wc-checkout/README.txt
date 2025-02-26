=== Additional Charges on WC Checkout ===
Contributors: Deepak
Tags: woocommerce, extra fee, minimum order, service charge, e-commerce, payment, shipping, product, additional fee, shipping fee, dynamic fee
Requires at least: 3.0.1
Tested up to: 6.7.1
Stable tag: 2.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Additional Charges on WC Checkout allow administrators to add custom fees to a customer's order total conditionally and easily.

== Description ==



Additional Charges on WC Checkout is a powerful extension plugin for WooCommerce that allows administrators to add fees to a customer's order total dynamically. These charges can be configured based on various flexible conditions, including product categories, specific products, and cart totals. With advanced search functionality and customizable settings, this plugin simplifies fee management for diverse business needs.


### Key Features

1. Custom Fee Titles and Amounts: Define unique titles and amounts for the additional charges displayed during checkout.
2. Dynamic Fee Conditions:
    • Apply charges based on product categories or specific products.
    • Easily search and select products using names or SKUs.
    • Automatically apply a default fee when no categories or products are selected.
3. Advanced Calculation Options:
   • Set conditions for cart totals or include/exclude shipping charges in percentage-based calculations.
4. Seamless WooCommerce Integration: Fully integrates into WooCommerce settings for a smooth configuration process.
5. Searchable Product Selection: Use WooCommerce's Select2 library for enhanced search and multiple selections, making locating products by name or SKU simple.
6. User-Friendly Interface: Manage additional charges easily under WooCommerce >> Products >> Additional Charges.

### How It Works

Once configured, the plugin automatically calculates and adds the defined fees to the customer's order total during checkout. Whether you need a default fee for all products or a tailored charge for specific categories or products, Additional Charges on WC Checkout adapt to your business requirements.


The settings are under **WooCommerce >> Products >> Additional Charges**. Once configured, the defined fee will automatically be added to the customer's order total during checkout.

== Installation ==

1. Upload the `additional-charges-on-wc-checkout` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.

== Frequently Asked Questions ==

= Can I change the title of the additional fee from the admin panel? =
Yes, you can change the title of the additional fee from the WooCommerce settings under **WooCommerce >> Products >> Additional Charges**.

= Will changing the fee amount affect my existing orders? =
No, changing the fee amount will not affect existing orders. It will only apply to orders placed after the changes have been saved.

= Can I apply the additional fee conditionally? =
Yes, you can apply the additional fee based on conditions like the cart total, type of fee (fixed or percentage), and whether to include shipping charges in the calculation.

= Does the fee include tax? =
The fee amount you set is added to the order total before tax calculations. If you want to apply tax to the fee, you need to configure it in WooCommerce settings.

== Screenshots ==

1. Admin interface for defining the additional fee "Title" and "Fixed Amount."
2. Checkout page where the admin-defined fee is added to the customer's order total amount.

== Changelog ==

= 1.0.0 =
* Initial release of Additional Charges on WC Checkout.

= 2.0.0 =
* Add functionality for products and category options.
