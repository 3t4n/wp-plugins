=== Plugin Name ===
Contributors: DPDPlugins
Tags: cart, ecommerce, dpd, sell downloads
Requires at least: 4.9.0
Tested up to: 5.1
Requires PHP: 7.2
Stable tag: trunk
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html
 
Adds a store page to your Wordpress site that connects to your account with DPD.  Adds a context menu to the post/page editors to insert DPD buttons.
 
== Description ==
 
The DPD-Cart Plugin is an eCommerce and content delivery solution to sell downloads with DPD from your WordPress blog. This plugin requires an active DPD account to use.

To get a DPD account visit: [http://getdpd.com](http://getdpd.com)

**How it Works:**

The DPD-Cart plugin connects via an API to the DPD system to automatically pull your available storefronts and storefront products in to your WordPress blog. From there, you can specify which storefront to associate with your WordPress blog, add a add a shop and optionally product pages to your site, and insert DPD add-to-cart buttons to any WordPress post or page by simply selecting the product you want from your list of configured and available products.

**Features:**

* Communicates automatically via a DPD API
* Selectable DPD Store to associate with your blog
* Easy add-to-cart button insertion on posts and pages using a DPD-Cart editor button and simple dropdown list
* Customizable shortcode templates allow you to modify the design and layout of the shop and product pages.
* Customizable button display colors, sizes, and price/position in the plugin admin.

 
== Installation ==

##Getting Started
 
1. Add plugin to wordpress using the plugin browser or uploading the zip.
1. Activate the plugin through the 'Plugins' menu in WordPress
1. In the WordPress admin go to Settings > DPD Cart Plugin.
1. Enter DPD username and API Key, found in DPD on your user profile page.
1. Save Changes.
1. Stores will load once you've connected to the DPD API. Now, select the store you want to use and other preferences.
1. Save Changes.
1. Create the shop and product pages as outlined below.

### Creating Shop page
1. From Wordpress Dashboard go to Pages > Add New
1. Use shortcode that meets your requirements.
    * Grid Layout - [dpdcart-store layout=grid]
    * List Layout - [dpdcart-store layout=list]
1. From Wordpress Dashboard Go to Settings > DPD Cart Plugin.
1. Select newly created page as shop page.
1. Save Changes.

### Creating (optional) Product Page
1. From Wordpress Dashboard go to Pages > Add New
1. Use shortcode-  [dpdcart-product-page]
1. From Wordpress Dashboard Go to Settings > DPD Cart Plugin.
1. Select newly created page as product page.
1. Save Changes.

### Manually editing buttons used in posts and pages editors
1. Use shortcode [dpdcart id='xxxxxxx']
    * id (required) - DPD Product ID (Found in the DPD admin)
    * text (optional) - Text on Button (Default- Settings for button text on store page.)
    * size (optional) - 'small', 'medium' or, 'large' (Default- Settings for button size on store page.)
    * color (optional) - HexColor eg. #000000  (Default- Settings for button color on store page.)
    * hover_color (optional) - HexColor eg. #000000  (Default- Settings for button hover color on store page.)
    * text_color (optional) - HexColor eg. #000000  (Default- Settings for button text color on store page.)
    * lightbox (optional) - 1 or 0  (Default- Settings for use lightbox?.)
    * price_position (optional) - 'none','top','left','right'  (Default- Settings for store page price position.)
    * price_color (optional) - HexColor eg. #000000  (Default- Settings for store page price color.)
    * price_bg_color (optional) - HexColor eg. #000000  (Default- Settings for store page price background color.)

2. Use Gutenberg Block to insert button
    * Select the DPD Button block type and choose your options
 
== Frequently Asked Questions ==
 
= Can I customize the display of the store or product pages? =
 
Yep! Edit the template files in the plugin /shortcodes/ directory.  You can edit the css in the plugin /css/ directory.
 
= Can I insert DPD buttons in to posts or pages? =
 
Yep! This plugin adds a context menu item to the WYSIWYG post and page editors.

= My theme has multiple page templates.  Can I use a full width template for the shop and product pages? =
 
Yep! Thats why we used shortcodes for the pages- so you can create a new page and select whatever theme template you want

= Can I put content on the page above or below the shop or product pages? =
 
Yep! Thats why we used shortcodes for the pages- you can put whatever content you want above and below them in the editor.
 
== Screenshots ==
 
1. Adds a store page to your Wordpress site with (optional) product pages.

2. Options panel lets you configure what DPD store to use, display options, and what page(s) to use for your shop and product pages.

3. Adds a Gutenberg block type to editor in Wordpress to add products to posts and pages.
 
== Changelog ==

= 2.1 =
* Updated for Wordpress v5.x.
* Added Gutenberg block type for DPD buttons.

= 2.0.5 =
* Bugfix:  Fixed "buy now" button URLs to use correct price point code.
 
= 2.0 =
* New Hotness
* Total Rewrite of plugin.
* Added shop page and product page
* Added post and page editor menu to insert products in to posts.
 
= 1.6 =
* Everything older than 2.0 is just plain broke.  Don't use it.