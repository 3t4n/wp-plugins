=== User role based shipping methods ===
Contributors: techsarai
Donate link: 
Tags: hide woocommerce shipping method, hide woocommerce shipping method based on user role, role based shipping method, woocommerce shipping method, shipping method based on country
Requires PHP: 7.0
Requires at least: 5.0
Tested up to: 6.4
Stable tag: 3.1.0
License: GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html

Display WooCommerce shipping methods based on User Role and Country. Globally compatible.

== Introduction ==

Display WooCommerce shipping methods based on User Role and country, Option to hide all other shipping methods when Free Shipping is available.

== Description ==
It will allow you to hide WooCommerce Shipping methods based on user role and country. It is globally compatible i.e. You can use it with Flat Rate / Free Shipping / Local Pickup or any other third party shipping plugin.
It also provides you an option to show only Free Shipping when Free Shipping is available during checkout by removing all other shipping methods.

Do you want to show shipping methods based on user role?
Do you want to show shipping methods based on shipping country?
Are you still struggling to set up the Woocommerce Shipping Cost based on User Role and Destination Country ?

Here's the solution for your requirement. Setup Flat Rate / Free Shipping or Shipping Cost using any third Party Plugin and Manage them Which Shipping Cost need to be shown to which user and for which country.

= Features =
 * Display shipping methods based on user role
 * Display shipping methods based on shipping country
 * Option to hide all other shipping methods and shown only Free Shipping when Free Shipping is available during checkout

== Installation ==

Follow the below instructions to install the plugin on your website: 
1. Download and unzip the latest release zip file.
2. Upload the entire plugin directory to your /wp-content/plugins/ directory.
3. Activate the plugin through the Plugins menu in WordPress Administration.

You can also use WordPress uploader to upload plugin zip file in menu Plugins -> Add New -> Upload Plugin. There you can Activate the plugin once it is uploaded successfully.

== Frequently Asked Questions ==

= Compatibility? =

Globally Compatible. It is compatible with all the shipping methods offered by WooCommerce and third party plugins.

= How to display Free Shipping only? =

Go to General section in plugin settings page.
Enable the plugin and under Hide shipping methods select option to Show Free Shipping Only, hide other shipping methods.
Note It's independent of rule matrix.
It will only work when Free Shipping is available during checkout.

= How to setup the plugin? =

Go to plugin settings page. You can navigate it from plugin page.

I will try to explain it by taking a sample case?

Woocommerce store info: Assume our store offer three shipping methods - Standard Delivery, Express Shipping, One Day Shipping. 

Case 1: I want to show One Day Shipping method to Administrator user role in the USA.

To achieve it add a new rule in Rules settings page.
* Select Administrator in User Role field.
* Select United States in Countries field.
* Select Label in Action On Shipping Method field.
* Add Standard Delivery and Express Shipping methods in Shipping Methods field seperated by semicolon like - Standard Delivery ; Express Shipping.
* Click on save changes.
* Now go to shop page add any product and recalculate the shipping cost by changing the address, Standard Delivery and Express Shipping method won't be shown.

Case 2: I want to show Standard Delivery, Express Shipping method to Guest user role in the USA.

To achieve it add a new rule in Rules settings page.
* Select Guest in User Role field.
* Select United States in Countries field.
* Select Label in Action On Shipping Method field.
* Add One Day Shipping in Shipping Methods field.
* Click on save changes.
* Now go to shop page add any product and recalculate the shipping cost by changing the address, One Day Shipping method won't be shown.

https://www.youtube.com/watch?v=uFEXQKPS0nM

Here's the video showing the above cases.

= Plugin not working after setting the plugin? =
If you have done the plugin setup, and you still don't see any change in cart/checkout page then please try to recalculate the shipping cost by changing the address because
by default woocommerce will show you the cached shipping methods.

= Sample Video =

https://www.youtube.com/watch?v=uFEXQKPS0nM

== Screenshots ==

1. General Settings
2. Rules Settings
3. Value of Shipping Method to hide
4. Shipping method hidden
5. Multiple shipping method rule configuration for single user role
6. Shipping method hidden based on label / name

== Changelog ==

= 1.0.0 =
 * Initial release.

= 1.0.1 =
 * Content Updated

= 1.0.2 =
 * Guest user support added in rule

= 1.0.3 =
 * Compatibility with WordPress 5.3.2 & WooCommerce 4.0

= 1.0.4 =
 * Improved security

= 1.0.5 =
 * Compatibility with WordPress 5.7.2 & WooCommerce 5.3.0

= 2.0.0 =
 * Compatibility with WordPress 5.9
 * Compatibility with WooCommerce 6.1.1
 * New option to hide shipping method based on shipping method name / title / label

= 2.0.1 =
 * Handled PHP compatibility issue
 * Compatibility with WordPress 6.1.1
 * Compatibility with WooCommerce 7.5.1
 * Improved plugin page readme content
 * Tested with WordPress 6.4.3
 * Tested with WooCommerce 8.5.2

= 3.0.0 =
 * Feature to hide all the shipping methods, and show only free shipping method, when free shipping is available during checkout
 * Readme content change
 * Tested with WooCommerce 8.6.1

= 3.1.0 =
 * Compatibility with WooCommerce high performance order storage feature
 * Tested with WooCommerce 8.7.0

== Upgrade Notice ==

= 3.1.0 =
 * Compatibility with WooCommerce high performance order storage feature
 * Tested with WooCommerce 8.7.0