=== Payment Wompi For Woocomerce - Colombia ===
Contributors: vlipco, ssinuco
Tags: commerce,ecommerce,wordpress ecommerce,woocommerce
Requires at least: 5.6
Tested up to: 5.8
Stable tag: 0.1.2
Requires PHP: 7.0
License: GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html

The official Wompi Plugin for WooCommerce adds payment via the Wompi payment method to your WooCommerce Shop.

== Description ==

The official Wompi plugin for WooCommerce adds payment via the Wompi payment method to your WooCommerce Shop.

Check our [official documentation](https://docs.wompi.co/en/) from our developer website.

### What to do with the Wompi Plugin?

* Integrate Wompi Widget and allow payment with any available methods enabled for your merchant account.
* Allow real (*Production*) and test  (*Sandbox*) payments.
* Include translations for WordPress in three languages: spanish, english and portuguese.

== Installation ==

### Minimum Requirements

WordPress 4.4 or greater
WooCommerce 3.5 or greater

### Automatic Plugin Installation

This is the easiest method of installing this plugin:

1. On WordPress Admin navigate to **Plugins** > **Add New**.
2. In the search field type “WooCommerce Wompi Plugin” and click Search Plugins.
3. On the search results that appear, find our plugin and check its details.
4. Click the **Install Now** button to install the plugin.
5. When installation is complete, it will be in the “Installed Plugins” section and from there you can activate it.

### Manual Upload via WordPress Admin

If automatic plugin installation does not work you can try the following procedure:

1. Download the most recent version of the plugin [here](https://github.com/vlipco/woocommerce-wompi-plugin/releases)

2. On WordPress Admin navigate to **Plugins** > **Add New**.

3. Click the **Upload Plugin** button at the top of the screen.

4. Select the zip file from your local filesystem.

5. Click the **Install Now** button.

6. When installation is complete, you’ll see “Plugin installed successfully.” 
Click the **Activate Plugin** button at the bottom of the page.

### Manual Plugin Installation

The manual installation method involves downloading our plugin and uploading it to your web server via your favorite FTP application. The WordPress codex contains instructions on how to do this [here](https://wordpress.org/support/article/managing-plugins/#manual-plugin-installation).

### Plugin Configuration

Once installed, you have to configure the plugin:

1. Go to **Plugins** > **Wompi WooCommerce** and click on Settings. 
You can also get there by going to **WooCommerce** > **Settings** > **Payments** and clicking on **Wompi**.

2. Copy the **Webhook endpoint URL** shown there and paste it in the [My account](https://comercios.wompi.co/my-account/) section of your Wompi merchants dashboard, under the setting **Events URL**. 

Do the same for the Sandbox environment by clicking on **"Enable test mode"** below that section.

3. Back in the WooCommerce settings, paste each trio of keys (public, private and event) that you can find on [My account](https://comercios.wompi.co/my-account/) in the Wompi merchants dashboard. 

Remember it is a trio of keys for each environment (*Sandbox* and *Production*).

4. **IMPORTANT**: Check or uncheck the **Enable Test Mode** checkbox to decide whether you want to make test (*Sandbox*) or **real** (*Production*) transactions.

5. Lastly, you have to enable Wompi payment method on WooCommerce. 

On WordPress Admin navigate to **WooCommerce** > **Settings** > **Payments**. 
Then, locate **Wompi** on **Payment methods** table and enable it by checking its checkbox.

6. Done! Now you can do some transactions!

### Updating

Automatic updates should work; as always though, ensure you backup your site just in case.

== Frequently Asked Questions ==

= For what countries does this plugin support?  =

This plugin supports merchants from Colombia, but end customers from anywhere in the world.

= What WooCommerce versions does this plugin support? =

This plugin was tested on WooCommerce Version 4.9.2

= What currencies does this plugin support? =

Currently, this plugin only supports COP (Colombian pesos).

== Screenshots ==

1. Configure easily public, private and event keys for test (Sandbox) and real (*Production*) environments.
2. Allow payment with any available methods enabled for your merchant account.
3. Integrate Wompi Widget

== Changelog ==

= 0.1.2 =

* Add events webhook private key configuration on admin settings
* Add checksum validation on events webhook
* Set customer's phone_number and full_name as non mandatory fields on incoming events webhook
* Fix minimun amount flag error message

= 0.1.1 =

* APPROVED transactions now set Orders' status as processing
* Billing information is no longer filled by Wompi
* Spanish and English translations were updated
* Void checks were fixed
* Sets WooCommerce minimum version to 3.5

== Upgrade Notice ==
 
= 0.1.2 =

Events webhook private key and checksum added.

= 0.1.1 =

Some bugs related to order status and billing information were fixed.
