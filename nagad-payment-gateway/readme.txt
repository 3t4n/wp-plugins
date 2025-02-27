=== Nagad Payment Gateway ===

Plugin Name: Nagad Payment Gateway
Plugin URI: https://gitlab.com/NagadExternal/pgw/ng_pgw_wp_plugin/-/blob/main/nagad-pay.zip
Author: Nagad Limited
Author URI: https://nagad.com.bd/bn/
Tags: nagad payment gateway, Nagad, Nagad Bangladesh
Requires at least: 4.0
Tested up to: 6.3.1
Requires PHP: 5.6
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Stable Tag: 1.1.4

This is official Nagad Payment Gateway plugin for woocommerce websites.

== Description ==

After getting merchant account from Nagad simply activate the plugin and go to woocommerce setting option. Select payments and manage options for Nagad Payment Gateway.

There you will find a form to put merchant id, merchant private key , Nagad gateway public key and other necessary fields.

Simply fill up the form and click save to get Nagad payment option in your website.

You need to add the callback url 'your_website_url/nagad-pay/payment/confirmation/' to Nagad merchant panel and let Nagad know the callback url in order to whitelist this in their server.
Also if your website is hosted from a foreign server you need to inform Nagad the server's main IP address to whitelist from their end.

== Installation ==

This section describes how to install the plugin and get it working.

e.g.

1. Install the Nagad Payment Gateway plugin in your website.
2. Make sure woocommerce is active.
3. Activate the plugin through the 'Plugins' screen in WordPress
4. Use the Woocommerce->Settings->Payments->Nagad Payment Gateway to configure the plugin. 



== Screenshots ==

1. In the Merchant Integration Details menu after generating keys you will get merchant private and merchant public key. Download these keys along with the Nagad Gateway Server Public Key from the same page.


2. This is your Merchant Id and Nagad Gateway Server public key which you will use in the payment settings form.


3. In the payment settings form you need to add Merchant id, Merchant Private Key, Nagad Gateway Server public key and other necessary infos.


4. After saving the form you will get a callback url in the notice panel.


5. In the Merchant Integration menu you need to add the callback url and upload the downloaded merchant public key 