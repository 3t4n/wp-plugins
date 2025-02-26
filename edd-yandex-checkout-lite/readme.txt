=== Gateway for Yandex.Checkout and Easy Digital Downloads Lite ===

Contributors: aleksandrx
Author: WacoMart
Plugin URI: https://wordpress.org/plugins/edd-yandex-checkout-lite
Author URI: https://wacomart.ru
Tags: edd, easy digital downloads, ecommerce, e-commerce, sell, downloads, store, yandex checkout, checkout, shop, payment gateway
Requires at least: 4.4
Tested up to: 5.5
Requires PHP: 5.4
Stable tag: 1.0.7
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html


== Description ==

This plugin adds the [Yandex.Checkout](https://checkout.yandex.com/) payment gateway for the Easy Digital Downloads digital product plugin. Smart payment is used. All payment methods except WeChat and Sberbank Business Online are supported. Saving of payment methods for recurring payments is not supported.

= Securely accept payments with Yandex.Checkout =
The customer is redirected from your EDD enabled website to a customizable payment form on the Yandex.Checkout Gateway’s secure servers. After payment, the client is redirected back to the URL specified in the URL settings in your site.

== Features ==

*  API is used to connect to the checkout
*  Allows you to pay using bank cards, e-wallets, etc.
*  Instant notifications
*  Support function Buy now [Learn more about the feature.](https://docs.easydigitaldownloads.com/article/1080-buy-now-buttons)
*  Available currencies: Russian rubles, US dollars, euros, Belarus rubles, tenges, yuans.
*  Setup payment name label
*  Accept international transactions from customers worldwide

= Want More? =
Check out the pro version of [Gateway for Yandex.Checkout and Easy Digital Downloads Pro](https://wacomart.ru/downloads/edd-yandex-checkout-pro/)

= Pro Version Features =
* Card & Wallets Management - Customers can save/update/delete credit cards and wallets from their accounts
* Payment method Yandex.Checkout widget allows you to make payments on the website - Customers stay on the merchants site, no payment forms or redirects
* Recurring Payments - Payment methods bank cards and Yandex.Money wallets support the Easy Digital Downloads Recurring Payments plugin. This allows you to create a store that offers recurring subscriptions and licensing products.
* Two-stage payments
* Refunds
* FZ-54
* Priority Support

== Credits ==

* The project uses official [SDKs](https://github.com/yandex-money/yandex-checkout-sdk-php/blob/master/README.en.md)


== Installation ==

1. Upload the 'edd-yandex-checkout-lite' folder to the '/wp-content/plugins/' directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Go to Downloads > Settings and configure the options


= Translations =

If you wish to check available translations or help with plugin translation to your language visit this link
https://translate.wordpress.org/projects/wp-plugins/edd-yandex-checkout-lite/


== Screenshots ==

1. screenshot-1.jpg


== Frequently Asked Questions ==

= Are recurring payments supported? =

No.

= Can I test the plugin? =

Yes. Just create a demo store and conduct the necessary tests. [Learn more about testing in the instructions.](https://checkout.yandex.com/developers/using-api/testing)


== Changelog ==

= 1.0.7 =
* SDK update and added shortcut for payment method

= 1.0.6 =
* added pro version info

= 1.0.5 =
* disables for guests Buy Now
* minor fixes

= 1.0.4 =
* added price rounding
* ssl notification added
* minor fixes

= 1.0.1 =
* added function to change the interface language

= 1.0.0 =
* initial relese
