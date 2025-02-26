=== ARS Affiliate Page Plugin ===
Contributors: arsdeveloper@arscars.com
Requires at least: 3.5.1
Tested up to: 6.7.1
Requires PHP: 5.5
Stable tag: 2.0.6

This plugin allows ARS clients to easily add Sell My Car and Donate My Car content to their wordpress site via shortcodes.

== Description ==
This plugin allows ARS clients to easily add Sell My Car, Donate My Car and Recycle My Car content to their wordpress site via shortcodes. Once the plugin is set up, simply add a shortcode to a page and the html content for the ARS affilaite program will be generated and displayed, including links to https://www.youcallwehaul.com and https://www.cardonationwizard.com.

**Privacy**

__User Data:__ This plugin does not collect any user data. 

__Cookies:__ This plugin does not use any cookies.

__Services:__ This plugin does not connect to any third-party locations or services. It simply generates links that include your referal code to https://www.youcallwehaul.com (sell_car_html shortcode) and https://www.cardonationwizard.com (donate_my_car shortcode).

== Installation ==

**Plugin Setup** (Settings > ARS Affiliate Settings)

1. Enter the *Affiliate Code* and *Reference Code* as provided by ARS
2. Enter *Sell Page Text*
 * This text will be displayed above the links on the **Sell My Car** page
 * Simple HTML tags are allowed
 * ARS provides boilerplate *Sell Page Text*. Adjust, if necessary, for SEO purposes
3. Enter *Donate Page Text*
 * This text will be displayed above the links on the **Donate My Car** page
 * Simple HTML tags are allowed
 * ARS provides boilerplate *Donate Page Text*. Adjust, if necessary, for SEO purposes
4. Enter the following URL for *Donate Page Text*: /donate-my-car/
 * This is the URL for your donate car page. The above URL must match the URL for the donate page you create below

**Sell My Car Page**
1. Create a new page named: Sell My Car
2. Add the Sell My Car shortcode to the page: [sell_my_car]

**Donate My Car Page**
1. Create a new page named: Donate My Car
2. Add the Donate My Car shortcode to the page: [donate_my_car]

**Recycle My Car Page**
1. Create a new page named: Recycle My Car
2. Add the Recycle My Car shortcode to the page: [shift_content]

== Changelog ==
= 1.1 =
* Initial release.
= 1.2 =
* Fix charity links
= 1.3 =
* Update installation instructions, fix duplicate h1 tags
= 1.4 =
* CSS fixes
= 1.5 =
* Add keyword to YCWH URL
= 1.6 =
* Fix notice being thrown due to registering style too early
= 1.7 =
* Update charity URLs/logos. Add new field for customized campaign code
= 1.8 =
* Add alternative shortcodes, instructions were ambiguous as to which one to use
= 1.9 =
* Adjust sanitization to allow microdata attributes on some inline/block level items
= 1.9.1 =
* Removed testing code block
= 2.0.0 =
* Add SHiFT code/images/css to plug-in. Update layout for Sell car page
= 2.0.1 =
* Replace old screenshots for instructions page
= 2.0.2 =
* Minor tweaks to CSS to handle different themes better
= 2.0.3 =
* Update CSS to prevent overriding theme CSS for list itmes
= 2.0.4 =
* Fix potential Reflected Cross-Site Scripting
= 2.0.5 =
* Fix typo
= 2.0.6 =
* CSS tweaks