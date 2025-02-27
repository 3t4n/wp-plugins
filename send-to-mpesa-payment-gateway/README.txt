=== Send to Mpesa Payment Gateway ===
Contributors: Njengah
Donate link: https://joe.co.ke/about
Tags: woocommerce, mpesa, woocommerce mpesa payment gateway, mpesa woocommerce payment
Requires at least: 4.3
Tested up to: 6.7.1
Stable tag: 1.0.12
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A simple Mpesa WooCommerce payment gateway that allows customers to send the shop owner payments to a mobile phone number.
It's useful for vendors without the Safaricom Paybill or Till Number or those who have not integrated the MPESA payment API.

== Description ==

Most WooCommerce users who want to receive payment via Mpesa do not have the PayBill or Till number. 
This plugin is designed to allow such users to receive payments from customers who want to send the payment to the business or personal phone number.

In the settings page, you can add the instructions to your customers to allow them to make payments by sending to the store number or your Safaricom number. 

The checkout provides the three important fields (customer name, customer mobile number, and the Mpesa transaction code) for manual confirmation of the payment.

**Note:** This is a MANUAL payment method — Send Money to Mpesa. This plugin does not have API verification.

== Installation ==

Instructions on how to install the plugin and get it working:

1. Upload `send-to-mpesa-payment.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Go to WooCommerce Settings > Payments tab and set the default values for your Mpesa number and the name that customers see on the transaction. 

== Frequently Asked Questions ==

= Does this plugin work with WooCommerce only? =
Yes, this is a custom WooCommerce payment gateway that will not work without WooCommerce.

= How do you change the phone number displayed on the checkout form? =
You can change the phone number displayed on the checkout form by editing the Mpesa Recipient Number in the settings.

= Does it support Mpesa Till and Paybill API? =
No, this plugin is for direct payments by sending money from one customer number to the store owner number or business phone number. The most basic way to send payment using the Mpesa send money feature.

== Changelog ==

= 1.0.12 =
* Fixed deprecated usage of `WC_Order::reduce_order_stock`. Replaced with `wc_reduce_stock_levels` as of WooCommerce 3.0.
* Fixed issues related to incorrectly called `payment_method`. Order properties should no longer be accessed directly.
* Tested with WordPress 6.7.1 and WooCommerce 9.4.1.

= 1.0.11 =
* Added support for WooCommerce 6.2.2.
* Minor bug fixes and improvements.

= 1.0.10 =
* Tested with WooCommerce 6.1.0.
* Minor code enhancements for better compatibility with recent WooCommerce versions.

= 1.0.1 =
Tested with WooCommerce Version 7.7.2 and updated to version 1.0.1.

= 1.0.0 =
Initial release.

== Disclaimer ==

This plugin does not have any relation with WooCommerce or M-PESA trademarks or brands. It is provided for the sole purpose of connecting WooCommerce to the Mpesa payment.

== Screenshots ==

1. Checkout Send Payment to Mpesa frontend - details and form. 
2. Send to Mpesa payment gateway enable settings page. 
3. Customizable options for Send to Mpesa payment gateway. 
4. Validation errors for empty fields for the Mpesa payment. 
5. Disabled option for the Send to Mpesa payment gateway on payments gateway page. 
6. Frontend illustration of payment gateway
7. Order page with the payment details from Mpesa Transaction.

