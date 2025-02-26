=== Associate Gravity Forms with WooCommerce ===
Contributors: emoxie, mattpramschufer
Donate link: https://emoxie.com
Tags: gravity forms, woocommerce gravity forms, gravity forms checkout
Requires at least: 3.8
Requires PHP: 7.2
Tested up to: 6.1.1
Stable tag: 1.2.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Quickly and easily add a Gravity Form to your WooCommerce order complete / thank you page based on specific products.

== Description ==

With this plugin you can associate any Gravity Form with any WooCommerce product.  This will then display the Gravity Form AFTER the user has completed the purchase on the Order Confirmation Screen.

= How It Works =
Getting everything setup will take you less than 1 minute with these simple steps.

- **Step 1** Install and Activate Plugin
- **Step 2** Navigate to WooCommerce Products
- **Step 3** Edit a product and in the meta box where you set your product details, there will be a tab called Associate Gravity Form.

**It's that simple.**


== Installation ==

1. Upload `associate-gravity-forms-woocommerce` zip file to the `/wp-content/plugins/` directory and unzip folder
1. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

= Do you offer installation and customization services? =
Yes, if you need help with installation and/or would like additional customization work done for your website, you can fill out a request form at [https://emoxie.com/contact](https://emoxie.com/contact)

= I wish this plugin had XZY feature =

While we try to do our best to incorporate new features all the time, if you have a feature request please fill out a request form at [https://emoxie.com/contact](https://emoxie.com/contact)


== Screenshots ==

1. Admin Panel
2. Example Checkout Screen

== Changelog ==

= 1.2.0 =
* FEATURE - Added in filter to allow for programmatically displaying the form on the thank you page.  Filter agfwcp-show-form-FORM_ID, default returns true.  Can override to display False.
* FEATURE - Added in before form and after form actions to programmatically add content above and below form.  add_action('agfwcp-before-form-FORM_ID') and add_action('agfwcp-after-form-FORM_ID')
* UPDATE - Added in translation support for all string

= 1.1.0 =
* UPDATE - Reduced required PHP version to 7.2


= 1.0.1 =
* FEATURE - Added in ability make Gravity Form submit buttons animated.

= 1.0.0 =
* Initial release