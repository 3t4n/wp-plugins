=== Easy Digital Downloads Https ===
Contributors: ulih
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=KJ4K2X953H8CC
Tags: payment gateway, gateway, secure, https, PCI compliance, ssl, gateway ssl, gateway https, checkout, secure checkout, edd checkout, easy digital downloads, edd, easy digital downloads checkout, edd secure checkout, easy digital downloads secure checkout
Requires at least: Wordpress 3.4
Tested up to: 3.9.0
Stable tag: 0.3.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A lightweight https checkout switcher for Easy Digital Downloads

== Description ==

This project is discontinued as Easy Digital Downloads published ssl support a few days after the first release of this plugin. Nevertheless others may find this code interesting to see how ssl support can be set up and what it needs behind the scenes to make it work.

Easy Digital Downloads does not include an option to load the checkout page using https (ssl). Easy Digital Downloads support recommends to use a third party https plugin. 
This plugin is one of those and automatically switches your checkout and other system pages of Easy Digital Downloads to https. This helps you to make your online store PCI-compliant.
And customers feel better about your store, too. It's their sensitive data and they want to be sure that it's handled correctly. Credit card payment gateways for
Paypal, Stripe or others have to use https (ssl), otherwise a store does not fulfill the requirements requested by credit card companies like VISA, AMEX, MasterCard and
others.

How does it work? Simple. If checkout is what the customers asks for, Easy Digital Downloads HTTPS will redirect the client browser to use https. If the customer navigates back to a 
page or entry not controlled by Easy Digital Downloads HTTPS the same thing happens the other way around. 

As a special add-on you may use this plugin to offer more pages via https. To do so:

You can add page and post ids into dedicated field in the settings page of the plugin or

* Duplicate the page.php file in your template directory and rename it to page-ssl.php
* Edit your new page-ssl.php file and assure that the file includes a template name in the comment section at the start of the file directly after `<?php`:
Example: 
`<?php
/**
 * Template Name: HTTPS Page
 */`
* Now you can assign this page template to your pages in the editor of each page.
* Pages that use the page-ssl.php file are served via https://



== Usage ==

Your website has to be configured to support https. Once you can assure this: Activate inside the gateway configuration and you're done.

== Installation ==

= Minimum Requirements =

* WordPress 3.4 or greater (may work on versions below but not tested)
* PHP version 5.2.4 or greater
* WooCommerce 2.0 or greater

= Manual installation on server =

1. Download
2. Upload to your '/wp-contents/plugins/' directory.
3. Activate the plugin through the 'Plugins' menu in WordPress.

= Installation on hosted site =
1. Download the plugin file to your computer, unzip preserving directory names and structure
2. Using an FTP program, or your hosting control panel, upload the unzipped plugin folder to your WordPress installation's wp-content/plugins/ directory.
3. Activate the plugin from the Plugins menu within the WordPress admin.

== Upgrade Notice ==

Automatic updates should work without problems, but, like always, backup your site and you'll feel better.

== Frequently Asked Questions ==

= Is this plugin compatible with other https plugins? =
If you use a plugin like WordPress HTTPS (SSL), no. You should use WordPress HTTPS (SSL) to configure all your https needs.

= I'm also running WooCommerce. Are there any conflicts with the HTTPS handling of WooCommerce =
This plugin can co-operate with HTTPS enabled in the WooCommerce settings. If you run other plugins that handle HTTPS for some pages and you encounter conflicts,
please report. Nevertheless, we cannot guarentee to include compatibility checks for all plugins reported. 

= Do I need this plugin if my whole site already runs using https? =
No.

= Why not configure the whole site to run under https? =
That's possible, but https comes at a price, it has some cons, e.g.,
it consumes server and client resources to encrypt and decrypt the communication
and your whole site has to avoid mixed content which sometimes is hard to achieve.

= Other https plugins conflict with WooCommerce, does this? = 
No, this plugin prevents https incompatibility problems with WooCommerce

= Do I have to configure checkout page, etc.? = 
No, this plugin will detect EDD pages automatically and offer these pages through https and fallback to http afterwards.

= Does this plugin interfere with Wordpress updates and cause problems like other https plugins? =
No, this plugin should not cause any problmes in the context of the administration of your Wordpress site.

= What do I need to use this plugin? =
You will need a valid ssl certificate. To install and use this certificate with your site you will normally need a dedicated IP.
Please understand that we cannot offer support to implement https and ssl certificates on your server.

== Screenshots ==

1. EDD Extension Settings for Easy Digital Downloads HTTPS.

== Changelog ==

= 0.3.1 =

* Bugfix: Correct plugin url filter which caused https protocol on external files under http 

= 0.3.0 =

* Allow to add additional pages controlled by https apart from Easy Digital Downloads checkout, failure and success page. 

= 0.2.0 =

* First official release

= 0.1.0 =

* Development start

== Links ==
* [Easy Digial Downloads Secure](http://takebarcelona.com/easy-digital-downloads-https): The home page of this plugin.
* [Stripe for Easy Digital Downloads](http://takebarcelona.com/downloads/stripe-for-easy-digital-downloads): A Stripe payment gateway for Easy Digital Downloads.
* [TakeBarcelona](http://takebarcelona.com): the home of "Tessa Authorship" and more plugins and themes.
* [WooCommerce Poor Guys Swiss Knife](http://takebarcelona.com/woocommerce-poor-guys-swiss-knife/): More than 50.000 downloads and counting on wordpress.org.
* [WooCommerce Rich Guys Swiss Knife](http://takebarcelona.com/woocommerce-rich-guys-swiss-knife/): The big brother of this plugin. Most of you will have enough with the little one...
* [Tessa Authorship](http://takebarcelona.com/tessa-authorship/): A tool to reflect WordPress user independent authorship information, biographies.
* [Tessa Theme](http://takebarcelona.com/tessa-theme/): Tessa maximizes content and scales gracefully from mobile devices to desktop fullscreen. Tessa is ideal for photography, art and design presentation. "Tessa" has builtin WooCommerce Support and plays nicely with WPML as well.
* [Tessa Powerpack](http://www.takebarcelona.com/tessa_powerpack/): A Jetpack by Wordpress.com fork which does not rely on wordpress.com. Continues the discontinued SlimJetpack plugin.
* [Nicestay](http://www.nicestay.net): Sponsor website that offers short term rentals of apartments for holidays and business in Barcelona, Madrid, Catalonia and the rest of Spain. 

== Updates ==

Updates are available via WordPress plugin directory. Additional information about the plugin is available on [Easy Digital Downloads Secure homepage](http://takebarcelona.com/easy-digital-downloads-secure/).

== Thanks ==
To family and friends for support

== Collaboration ==
Everybody invited

== Credits ==
Your name?