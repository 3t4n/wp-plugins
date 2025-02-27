=== PayPal Checkout Payment for WooCommerce in Japan ===
Contributors: artisan-workshop-1, shohei.tanaka, automattic
Tags: ecommerce, e-commerce, commerce, woothemes, wordpress ecommerce, store, sales, sell, shop, shopping, cart, checkout, configurable, paypal
Requires at least: 4.4
Tested up to: 5.4
Requires PHP: 5.5
Stable tag: 2.0.3
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Accept PayPal, Credit Cards and Debit Cards on your WooCommerce store.

== Description ==

This is a PayPal Checkout Payment Gateway for WooCommerce.

PayPal Checkout allows you to securely sell your products and subscriptions online using In-Context Checkout to help you meet security requirements without causing your theme to suffer.  In-Context Checkout uses a modal window, hosted on PayPal's servers, that overlays the checkout form and provides a secure means for your customers to enter their account information.

Also, with Integrated PayPal Setup (Easy Setup), connecting to PayPal is as simple as clicking a button - no complicated API keys to cut and paste.

== Installation ==

= Minimum Requirements =

* WordPress 4.4 or greater

= Automatic installation =

Automatic installation is the easiest option as WordPress handles the file transfers itself and you don’t need to leave your web browser. To do an automatic install of, log in to your WordPress dashboard, navigate to the Plugins menu and click Add New.

In the search field type "WooCommerce PayPal Checkout" and click Search Plugins. Once you’ve found our plugin you can view details about it such as the point release, rating and description. Most importantly of course, you can install it by simply clicking “Install Now”.

= Manual installation =

The manual installation method involves downloading our plugin and uploading it to your webserver via your favorite FTP application. The
WordPress codex contains [instructions on how to do this here](http://codex.wordpress.org/Managing_Plugins#Manual_Plugin_Installation).

= Updating =

Automatic updates should work like a charm; as always though, ensure you backup your site just in case.

If on the off-chance you do encounter issues with the shop/category pages after an update you simply need to flush the permalinks by going to WordPress > Settings > Permalinks and hitting 'save'. That should return things to normal.

== Frequently Asked Questions ==

= Does this plugin work with credit cards or just PayPal? =

This plugin supports payments using both credit and debit cards as well as PayPal. The new Smart Payment Buttons feature dynamically displays PayPal, Venmo (US Only), PayPal Credit, or other local payment options* in a single stack—without needing to leave the merchant's website.

*PayPal Checkout features may not be available in all countries.

= Does this support Checkout with PayPal from the cart view? =

Yes!

= Does this support both production mode and sandbox mode for testing? =

Yes it does - production and sandbox mode is driven by how you connect.  You may choose to connect in either mode, and disconnect and reconnect in the other mode whenever you want.

= Where can I find documentation? =

For help setting up and configuring, please refer to our [user guide](https://docs.woocommerce.com/document/paypal-express-checkout/)

= Where can I get support or talk to other users? =

If you get stuck, you can ask for help in the Plugin Forum.

= Will this plugin work with my theme? =

Yes, this plugin will work with any theme, but may require some styling to make it match nicely. If you're
looking for a theme with built in WooCommerce integration we recommend [Storefront](http://www.woothemes.com/storefront/).

= Where can I request new features or report bugs? =

New feature requests and bugs reports can be made in the plugin forum.

= How to remove 'Proceed to Checkout' button from cart page? =

If PayPal Checkout is the only enabled payment gateway and you want to remove the 'Proceed to Checkout' button from the cart, you can use this snippet:

https://gist.github.com/mikejolley/ad2ecc286c9ad6cefbb7065ba6dfef48

= Where can I contribute? =

The GitHub repository for PayPal Checkout is here:

https://github.com/woocommerce/woocommerce-gateway-paypal-express-checkout

Please use this to inform us about bugs, or make contributions via PRs.

== Screenshots ==

1. Click the "Setup or link an existing PayPal account" button. If you want to test before going live, you can switch the Environment, above the button, to Sandbox.
2. API credentials will be set after linking, or you can set them manually.
3. See PayPal button settings below.
4. Checkout with PayPal directly from the Cart.
5. And without leaving the store.
6. Confirm details after clicking "Continue".
7. Choose PayPal from regular checkout page.
8. Choose PayPal from single product page.
9. Initiate checkout from mini-cart.

== Changelog ==

= 2.0.3 - 2020-07-01 =
* Fix - Records the proper refunded_amount to _woo_pp_txnData in the database PR#764
* Fix - Redirect customers back to the original page they left on after closing PayPal modal PR#765
* Fix - Preserve horizontal layout style setting when using standalone buttons PR#774
* Fix - Smart payment buttons compatibility with older browsers PR#778
* Tweak - Update the Require Phone Number field description PR#772
* Dev - Make the SDK script args filterable PR#763

= 2.0.2 - 2020-05-28 =
* Fix - Javascript errors during checkout when the Payment Action is set to Authorize. PR#754
* Fix - Style the Smart Payment Buttons according to the chosen button size setting. PR#753
* Tweak - Change the "or" separator used on the cart page to be consistent with other payment gateways (uppercase and 100% opacity). PR#755

= 2.0.1 - 2020-05-26 =
* Fix - PayPal buttons not loading on the page, accompanied with the javascript/console error: "paypal.getFundingSources (or paypal.Buttons) is not a function". PR#740

= 2.0.0 - 2020-05-25 =
* New - Upgrade to the latest PayPal Checkout Javascript SDK. PR#668
* Add - New setting found under Button Styles for choosing a Smart Payment Button label. PR#666
* Add - Support for more locales. PR#658
* Fix - Display Smart Payment Buttons on Product pages built from a shortcode. PR#665
* Fix - Send the product SKU to PayPal so it's displayed in the order/transaction details and reports on PayPal. PR#664
* Fix - Show an error when saving incomplete/missing API credentials. PR#712
* Fix - Remove PHP warnings in later versions of PHP when a PayPal Session doesn't exist. PR#727
* Fix - Error when processing refunds (Already Refunded. No Amount to Refund). PR#710
* Fix - Required state field errors on the "Confirm your PayPal Order" page when returning from PayPal. PR#725
* Fix - Display WC Add To Cart validation errors on the product page when clicking the PayPal Smart Payment Buttons. PR#707
* Update - Smart Payment Buttons are enabled by default and settings to toggle these on/off have been removed and replaced with a filter. PR#660
* Update - Deprecate unused/incomplete function `WC_Gateway_PPEC_Client::update_billing_agreement()`. PR#602
* Update - Move inline javascript found in `settings-ppec.php` to `ppec-settings.js`. PR#676
* Update - Move Support and Documentation links from the plugin actions to plugin meta section on the Plugin activation/deactivation page. PR#735
* Update - WooCommerce 4.1 and WordPress 5.4 compatibility. PR#732

[See changelog for all versions](https://raw.githubusercontent.com/woocommerce/woocommerce-gateway-paypal-express-checkout/master/changelog.txt).
