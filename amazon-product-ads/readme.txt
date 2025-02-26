=== Amazon Product Ads ===
Contributors: ProactiveWebDesign
Tags: widgets, amazon, advertising, affiliate
Requires at least: 2.8
Tested up to: 2.9.2
Stable tag: 1.3

A multi-instance WP widget that displays Amazon UK/US Affiliate Ads.

== Description ==

A multi-instance WP widget that displays Amazon UK/US Self Optimizing Ads or if a post contains a custom field ASIN or ISBN it will display an ad for that specific product.

To use it simply drop the widget into one (or more) of your sidebars and you're good to go.

The widget has the following configuration options:

* **Title**:  The title displayed at the top of the widget, just leave it empty to disable the title.
* **Amazon Store**: Choose which Amazon store to provide the ads to.
* **Tracking ID**: Your Amazon Associate Tracking ID, this can be found in the upper left when you log into the Amazon Associates site.
* **Link Colour**: The RGB colour you want to use for the text links within the ads.
* **Self-optimising Ads Only**: When checked the widget will only display self optimizing link and will ignore any ASIN/ISBN in the post.
* **Self-optimising Ads Logo**: When checked the Self Optimizin Ads will have the Amazon logo displayed at the top, if not a text link to Amazon will show.
* **Self-optimising Ads Size**: Allows you to choose the size of the self opimising ads (note: specific product ads are a fixed size)
* **Fixed Product ID**: Use this to specify a specific Amazon product that will always be displayed by the widget, setting this will force the widget to ignore the Self-Optimising only flag.

== Installation ==

This section describes how to install the plugin and get it working.

1. Upload `amazon-product-ads` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Add the widget to your sidebar and configure
4. (Optional) Add a custom field called ASIN in any post to display a specific amazon product or a comma seperated list for many

== Frequently Asked Questions ==

None as yet, but feel free to ask...

== Screenshots ==

1. Widget configuration panel
2. Example product ad
3. Example self optimizing ad

== Changelog ==

= 1.3 =
* Added the ability to change the size of the self optimising ads
* WP 2.9.2

= 1.2.1 =
* WP 2.9

= 1.2 =
* Updated Amazon.com product links iframe parameter to remove bug that stoped some items from displaying (thanks Irving for pointing this out)
* Removed references to self for PHP4 compatability
* WP 2.8.5 tested

= 1.1.1 =
* Added functionality to support comma seperated ASIN list for posts

= 1.1.0 =
* Added ability to specify product displayed in the widget itself using Fixed Product ID

= 1.0.1 =
* minor code tidying and WP 2.8.2 tested


= 1.0.0 =
* Initial release