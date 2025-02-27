=== Daisycon WooCommerce Pixel ===
Contributors: Daisycon
Donate link: https://www.daisycon.com
Tags: Daisycon, Daisycon WooCommerce Pixel, WooCommerce, Pixel, Conversion Pixel
Requires at least: 4.8
Tested up to: 6.5.4
Stable tag: 6.0
Requires PHP: 7.0
License: Daisycon

Adding Daisycon conversion pixel to WooCommerce

== Description ==
Daisycon offers a plugin to install the conversion pixel to advertisers who use WordPress with WooCommerce.
This plugin adds the conversion pixel to WooCommerce without changing any code.
General information about the WooCommerce / Daisycon conversion pixel can be found in our [FAQ](https://faq-advertiser.daisycon.com/hc/en-us/articles/360014540054-Explanation-Implement-Daisycon-conversion-pixel-in-WordPress-WooCommerce)

== Installation ==
**Installation using the WordPress plugin page**
Navigate in the WordPress menu to "Plugins -> Add New". In the search field, in the upper right corner, type "Daisycon WooCommerce" and wait until the plugin shows up in the list below. You can now install and activate the plugin.

**Manual installation**
To install the plugin manually, you have to download it first.  Navigate in the WordPress menu to "Plugins -> Add New". In the upper left corner, press the "Upload Plugin" button and select the downloaded plugin.
Press the "Install Now" button and finish it up by pressing the "Activate Plugin" button.

== Frequently Asked Questions ==
To set or change the settings of the plugin, navigate in the WordPress menu to "Settings -> Daisycon WooCommerce Pixel". Click the 'Connect' button. You will be redirected to the Daisycon OAuth login. Login with your Daisycon user account and select the advertiser account to grant access to. After succesful connecting your Daisycon account, you will be redirected back to the Daisycon WooCommerce pixel settings page.

Below you can find a more detailed description of the fields and values on the settings page.

= Advertiser =
The advertiser is already set. Selected the wrong advertiser? Click disconnect and then connect again with your Daisycon account and select the advertiser in the following step.

= Campaign ID =
Select the correct campaign. If you have multiple campaigns in your advertiser account, for different GEO's for example, you can add these at the bottom of the settings by clicking 'Add custom language setting'.

= Matching Domain =
The matching domain is automatically set.

= Use LCC cookie =
The plugin has an LCC (Last Click Count) functionality, which can be used to deduplicate transactions on other affiliate networks. This setting requires some adjustments in the Daisycon campaign settings and can only be set in consultation with your contact at Daisycon. Incorrect setting of this functionality will cause incorrect measurements. Most importantly, never use a UTM tag for the "LCC Network" parameter!
You can read more about LCC in our [FAQ](https://faq-advertiser.daisycon.com/hc/en-us/articles/208742425-Network-filtering-implementing-an-LCC-script)

= LCC `network` url parameter =
This setting requires some adjustments in the Daisycon campaign settings and can only be set in consultation with your contact at Daisycon. Incorrect setting of this functionality will cause incorrect measurements. Most importantly, never use a UTM tag for the "LCC Network" parameter!
You can read more about LCC in our [FAQ](https://faq-advertiser.daisycon.com/hc/en-us/articles/208742425-Network-filtering-implementing-an-LCC-script)

= Commission VAT =
Do you want the commission to be paid based on the product prices including or excluding VAT?

= Extra field 1 to 4 =
You can add extra product data to the pixel, to enrich the statistics of your campaign within the Daisycon interface. These extra fields are E1 to E4. E5 is used for the product ID. Enriching the statistics gives you the option to optimize your campaign. Using the extra fields is not required.

= Optional: Configuring product-specific commissions =
Each product will get an extra field, once the Daisycon WooCommerce plugin is installed. If you look at "Product data -> General" on a WooCommerce product page, you can find a new field called "Daisycon Pixel Commission Code". Only configure this field if you want the product to have a variable commission. The value of this field will be matched with the Commission Code configured in the Daisycon interface. If it matches the Commission Code in the Daisycon interface it will assign the commission matching the Commission Code to the product. If it doesn't match, it will fall back to the default commission value for the campaign.

= Auto validation of transactions =
With auto approval you will be able to automatically approve transactions to Daisycon. To use auto approval, it's required to set up an integration for your store so it can communicate (in the background) with the Daisycon system via the Daisycon API.
Set status on 'Enabled'. Days: Fill in the number of days after you would like to run the automatic order approval. Take the number of days into account the customer can return their order.
Click on 'Generate keys here'. You will be redirected to the WooCommerce REST API settings page. Click on 'Add key'. Give the new key a description and then click the 'Generate API key' button. Copy both the consumer key and consumer secret and fill them in the designated fields of the Daisycon WooCommerce pixel plugin settings.

= Questions & more information =
If you have any questions regarding the installation of this plugin, don't hesitate to contact us by submitting a support ticket from your Daisycon account.

== Screenshots ==
1. Settings overview

== Changelog ==

= 2.2.1 =
* Latest changelog back to readme

= 2.2.0 =
* We now support automatic transaction validation
* You can no longer use Extra 5, for this is needed for the transaction validation. It will contain the product ID

= 2.1.0 =
* Reduced complexity of multi-language stores and campaign configuration

= 2.0.0 =
* Added authentication with the Daisycon platform for simpler configuration

= 1.6.2 =
* Updated configuration settings of the pixel

= 1.6.1 =
* Updated configuration regarding languages and names

= 1.6 =
* WordPress 6 support
* PHP 8 support
* Updated design

= 1.5.4 =
* Rollback to 1.5 to investigate and solve new issues properly. Very sorry for the inconvenience

= 1.5.2 / 1.5.3 =
* Code improvement

= 1.5.1 =
* Multi language support
* Multi site support
* Added new matching domains

= 1.5 =
* Replaced deprecated get_used_coupons function
* Fixed 'include_once' issue
* Added matching domain
* Translated README to English
