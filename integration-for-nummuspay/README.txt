=== Integrartion for Nummuspay ===
Contributors: sgsoftwaresolutions
Donate link: https://www.facebook.com/sahilgulati007/
Tags: nummuspay, payment gateway, woocommerce payment gateway, nummuspay integration
Requires at least: 4.5
Tested up to: 5.9
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin helps you in the connecting WooCommerce with Nummuspay

== Description ==

Nummuspay provides you with everything you need to sell online. Use our all-in-one payment gateway in order to accept payments worldwide and this plugin is providing you the inteface to integrate numuspay with woocommerce

Serve your end Customers efficiently with a higher level of service:

Easily configure and manage subscription renewals, add-ons and more without any programming.
Communicate with automated emails throughout the subscription lifecycle.
Customizable Add-ons, trials and advance coupon system for marketing purposes.
Allow Customers to manage their subscriptions with self-service tools.

** Steps to follow: **

The next step will be to go to: WooCommerce > Settings > Payments in order to install a payment method. From this screen enable Check Payments and click on Set up button.

Through this screen you will be able to confiqure your settings: 
* Enable/Disable – Enable to use. Disable to turn off.
* Title – Choose the title shown to customers during checkout
* Description –Add info shown to customers if they choose Check
* Instructions – Explain how to pay by Check

Please make the proper amendments and save changes.

The next step is to navigate to WooCommerce > Settings > Advanced > REST API > Click "Add key button" in order to create an api key. Choose Read/Write on permissions options and click on "Generate API key"
    
And a screen you will automatically obtain your credentials.

The next step is to navigate to Nummuspay > Settings > Plugin Settings in order to activate WooCommerce. You have to enter your Woocommerce api credentials and your site url

== Installation ==

1. Upload `integration-nummuspay` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. add the nummuspay id in settign  section.

== Frequently Asked Questions ==

= Where to add nummuspay id =

add nummuspay id in setting-> nummuspay.

== Screenshots ==

/integration-for-nummuspay/assets/screenshot-1.png
/integration-for-nummuspay/assets/screenshot-2.png
/integration-for-nummuspay/assets/screenshot-3.png
/integration-for-nummuspay/assets/screenshot-4.png
/integration-for-nummuspay/assets/screenshot-5.png
/integration-for-nummuspay/assets/screenshot-6.png

== Changelog ==

= 1.0 =
* Final working code

= 0.5 =
* testing version 

== Upgrade Notice ==

= 1.0 =
final stable version

= 0.5 =
This version fixes a security related bug.  Upgrade immediately.

