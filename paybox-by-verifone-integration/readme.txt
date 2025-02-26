=== Wordpress Paybox Payment plugin ===
Contributors: Paybox
Donate link: none
Tags: Payment Gateway, Orders, woocommerce, wp-ecommerce, e-commerce, payment, Paybox by Verifone
Requires at least: 3.0.1
Tested up to: 4.7
Stable tag: 1.0.0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
This plugin is a Paybox payment gateway for Wordpress

== Description ==

WARNING: this plugin is still  considered a BETA version of the plugin. *
we do not guarantee full functionality. 
We advise not to use this plugin in production.

ATTENTION: ce plugin est considéré comme une version BETA.
Nous ne pouvons pas garantir un fonctionnement complet. 
Nous recommandons de ne pas utiliser ce plugin en production.

This module adds a Paybox Payment Gateway to your Installation of Wordpress.

Paybox is a Payment Services Provider in Europe, part of the Verifone Group.

plugin actions in wordpress:

this plugin offers an admin panel from the order section to the settings of wordpress.

it provides shortcodes that allow to create teh necessary form to call the payment page, and adds a script to receive incoming payment notifications.
it provides a page that lists all received payments.

The plugin checks for availability of the Paybox platform, through a call to our servers.
It then submits with javascript the form to the first available server.

the customer is then presented with a payment page, hosted on the Paybox Platform (urls above).

The Paybox Platform sends an Instant Payment Notification (IPN) to the server when the customer actually made the payment, indicating to the merchant the status of the payment.

the plugin generates a url that can catch the IPN call from Paybox's server, and checks the cryptographic signature of the message.

This plugin is required by:
- the woocommerce paybox payment gateway
- the wp-ecommerce paybox payment plugin

== Installation ==

1. Upload the entire folder `paybox` to the `/wp-content/plugins/` directory
or through WordPress's plugin upload/install mecanism.

2. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

= What is the HMAC key in the admin panel for ? =

The HMAC key is generated on paybox server through your paybox back office. it is used to authenticate your calls to Paybox Server. it is generated on the platform you choose: Production (live) or Pre-Production (test)

= Something is not working for me, how can i get help ? =

Contact [Paybox WordPress Support](mailto:wordpress-paybox@verifone.com "WordPress support at paybox@verifone"), we will be glad to help you out !

== Screenshots ==

1. The administration panel: payment configuration
2. The administration panel: Paybox Account parameters

== Changelog ==
= 1.0.0.1 =
- Auto installation WooCommerce and Wp-E-Commerce Paybos plugins
- Shortcode
- Externalisation des configurations pour les modules requis
= 1.0.0.0 =
initial release!.


== Upgrade Notice ==

= 1.0 =
This is the first major Release.

