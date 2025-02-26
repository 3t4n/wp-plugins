=== zipMoney(Zip Co) Payments Plugin for WooCommerce ===
Contributors: Zip Co Limited
Tags: zipmoney payments woocommerce, zipmoney payments module for woocommerce, zipmoney woocommerce addon , zipmoney payment gateway for woocommerce, zipmoney for woocommerce, zipmoney payment gateway for wordpress, buy now pay later, zippay woocommerce plugin, Own it now, pay later, Zip Co, Zip
Requires at least: WP 4.0
Tested up to: 6.5
Stable tag: 2.3.24
License: GPLv2 or later License http://www.gnu.org/licenses/gpl-2.0.html


== Description ==
Sell more online & in-store with Zip.
Give your customers the power to pay later, interest free and watch your sales grow.
Take advantage of our fast-growing customer base, proven revenue uplift, fast and simple integration.

== Installation ==

= Automatic Installation =
*   Login to your WordPress Admin area
*   Go to "Plugins > Add New" from the left hand menu
*   In the search box type "zipMoney WooCommerce Plugin"
* From the search result you will see "zipMoney WooCommerce Plugin" click on "Install Now" to install the plugin
* A popup window will ask you to confirm your wish to install the Plugin.

= Note: =
If this is the first time you've installed a WordPress Plugin, you may need to enter the FTP login credential information. If you've installed a Plugin before, it will still have the login information. This information is available through your web server host.

* Click "Proceed" to continue the installation. The resulting installation screen will list the installation as successful or note any problems during the install.
* If successful, click "Activate Plugin" to activate it, or "Return to Plugin Installer" for further actions.

= Manual Installation =
1.  Download the plugin zip file
2.  Login to your WordPress Admin. Click on "Plugins > Add New" from the left hand menu.
3.  Click on the "Upload" option, then click "Choose File" to select the zip file from your computer. Once selected, press "OK" and press the "Install Now" button.
4.  Activate the plugin.
5.  Open the Settings page for WooCommerce and click the "Checkout" tab.
6.  Click on the sub tab for "Zip".
7.  Configure your "ZipMoney" settings. See below for details.

= Configure the plugin =
To configure the plugin, go to __WooCommerce > Settings__ from the left hand menu, then click "Checkout" from the top tab menu. You should see __"Zip"__ as an option at the top of the screen. Click on it to configure the payment gateway.

* __Active__ - check the box to enable zipMoney WooCommerce Plugin.
* __Environment__ - check the box to run the plugin in sandbox mode. Unchecking this option will put It in production mode.You will need sandbox private and public keys to test it in sandbox mode.
* __Sandbox Public Key/Public Key__   - enter your zipMoney Merchant Public Key.
* __Public Key/Private Key__   - enter your zipMoney Merchant Private Key.
* __Capture Type__ - set whether to capture immediately or authorise now and capture later.
* __Log Setting__   - select the logging level.
* __In-Context Checkout__   - check the box to enable iframe checkout which will enable in-context checkout process in a popup window without leaving the store.
* __Minimum Order Value__  - set the minimum order amount to be used for zipMoney.
* __Marketing Widgets__   - check the box to enable marketing images and buttons below the Add To Cart button in product page and below Process To Checkout  button in cart pages.
  * __Display on product page__ -Enables widget in the product page below Add to Cart button.
  * __Display on cart page__ -Enables widget in the cart page below  Process To Checkout.
* __Marketing Banners__   - check the box to enable marketing banners in different sections of the website.
  * __Display Marketing Banners__ -Displays other options to render the banners in shop, product , category and cart pages.
  * __Display on Shop__ -Enables banner in the Shop/Store page.
  * __Display on Product Page__ -Enables banner in Product page.
  * __Display on Category page__ -Enables banner in the Category page.
  * __Display on Cart page__ -Enables banner in the Cart page.
* __Tagline__ -Option to display the tagline in product and cart pages
  * __Display on product page__ -Enables the tagline in the product page below the price.
  * __Display on cart page__ -Enables the tagline in the cart page below  the total.
* Click on __Save Changes__ for the changes you made to be effected.

== Changelog ==

= 1.0.0 =
* Initial release
= 1.0.1 =
* Fixes an issue with product variation stocks where the stocks were not getting updated.
* Compatibility with Sequentials Order Numbers plugin.
* Passes order id as a part of the charge request.
= 1.0.2 =
* Version bump
= 1.0.3 =
* More compatibility with older and new WooCommerce versions as well as with other plugins
= 1.0.4 =
* Added fees as a line item
= 1.0.5 =
* Fix for shipping rate array incomptability while using a custom shipping plugin.
* Fix for rounding issue at product level
= 1.0.8 =
* Bug fix for missing shipping info in the order.
= 2.0.0 =
* This release contains a major change to the way plugin works. The aim is to reduce incomptabilities with other plugins during checkout. We have attempted to achieve this by using the default XHR route Woocomerce uses to do the checkout which would execute the hooks defined for the checkout process.
* Fix for number of issues related to tax and rounding.
* Fix for number of minor bugs and inconsistencies.
= 2.0.1 =
* Fix for missing GST for order fee
= 2.0.2 =
* Fix for an issue where Shopper's phone number was causing issues during the checkout
= 2.0.3 =
* Fixed an issue with woocommerce update.
* Error message displayed when no SSL certificate installed.
= 2.0.4 =
* Brand release changes
* Removed zip product options
* Field names changed in the zip admin configuration page
* Renamed zip checkout title
* Bug fixed for checking virtual products for simple and variable products

= 2.0.5 =
* Checkout process issue fixed
* Billing Address record into Merchant dashboard
* adjust marketing widgets in product page
* Cleaned zip log file

= 2.0.6 =
* Fixed woocommerce checkout issues for downloadable and virtual products
* Added new zip marketing asset JS library

= 2.0.8 =
* Fixed virtual product issue
* Change timeout to 30 seconds
* New Config UI is implemented

= 2.0.9 =
* Tested plugin on Wordpress 5.0 version

= 2.1.0 =
* Implemented new Zip payment configuration page
* Implemented action links for plugin
* Fixed the duplicate charge issue
* Implemented exception for order without shipping, which may be not required for order.

= 2.1.1 =
* Change the plugin action link to avoid conflict

= 2.1.2 =
* Fixed post charge issue
* Avoid zip payment cookie to load on all pages, expect checkout page.

= 2.1.3 =
* Rewrite zip log files
* Fix zip login direction.

= 2.1.4 =
* Fix return charge Uri.

= 2.2.0 =
* Fix woocommerce beackward compatibility.

= 2.2.1 =
* Fixed zip widget loading performance issue.

= 2.2.2 =
* Fixed some bugs.
* Fixed Zip widget issue.

= 2.2.3 =
* Fixed some common bug.
* SMI api supported
* Changed zip widget block for supporting globally
* Added function in admin to check zip private key is valid or not

= 2.3.0 =
* Fixed iframe issue for partpay and Quadpay
* Improved SMI api integration
* Improved zip api key valid check

= 2.3.1 =
* Fixed api key validation issue
* Fixed case sensitive file call

= 2.3.2 =
* Fixed auto loader issue zip library
* Fixed 302 redirect issue for key validation route when wordpress site under subdirectory
* Fixed auth and capture for Partpay and Quadpay

= 2.3.3 =
* Removed git related folders and files

= 2.3.4 =
* removed currency validation
* added translation for mexico
* fixed some widget related issue

= 2.3.5 =
* Fixed broken html issue in admin order details page

= 2.3.6 =
* checked our plugin in WC 5.5.1
* fixed check private key validity issue
* fixed issue All orders from all payment methods marked as Paid via Zip.

= 2.3.7 =
* Rebranding copy text change

= 2.3.8 =
* Fixed order details broken html issue
* Tested plugin under wordpress version 5.8
* Tested plugin under WC version 5.6

= 2.3.9 =
* Change Mexico payment title

= 2.3.10 =
* Fixed api key validity issue for Twisto and UK

= 2.3.11 =
* Fixed shopper bug
* Added new region for zip widget

= 2.3.12 =
* Support woocommerce block

= 2.3.13 =
* Plugin tested under wordpress version 5.9
* fixed Divi plugin Interfering issue

= 2.3.14 =
* Plugin tested under wordpress version 6.0.1
* Plugin tested under woocommerce version 6.7.0
* Added tokenisation feature

= 2.3.15 =
* Fixed currency issue when charge is creating
* Fixed active plugin issue

= 2.3.16 =
* Fixed some security related

= 2.3.17 =
* Test plugin with wordpress 6.2 and woocommerce 7.5.1

= 2.3.18 =
* fixed php notification issue for wc-zipmoney-checkout-js

= 2.3.20 =
* fixed php notification issue for wc-zipmoney-checkout-js

= 2.3.21 =
* Changed an api endpoint

= 2.3.22 =
* Removed legacy changes. Updated region logic

= 2.3.24 = 
* updated merchantapi-php
