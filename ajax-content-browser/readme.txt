=== Ajax Content Browser ===
Author URI: https://wordpress.org/plugins/ajax-content-browser/
Plugin URI: https://wordpress.org/plugins/ajax-content-browser/
Contributors: ahmedfouad
Tags: ajax, infinite scroll, woocommerce, easy-digital-downloads, grid
Requires at least: 4.4
Tested up to: 5.2.1
Stable Tag: 1.0.3
License: GNU Version 2 or Any Later Version

Display your WordPress content and products. Beautifully.

== Description ==

Ajax Content Browser is a light-weight WordPress plugin to display your WordPress content in a grid layout, beautifully. It enables your site visitors to browse, search, sort and filter the content using AJAX technology without page refreshing.

Whether you want to show blog posts, WooCommerce products, Easy Digital Downloads products, or just custom post types, this plugin will do the job. Ajax Content Browser integrates seamlessly with WooCommerce and Easy Digital Downloads.

Check out the demo at [Ajax Content Browser](https://ajaxcontentbrowser.com)

= Plugin Features =

* **Infinite scroll** &mdash; Auto loading of new items when user scroll
* Automatic Integration with **WooCommerce** and **Easy Digital Downloads**
* **Shortcode Builder**
* Front-end Ajax **Filtering**
* Front-end Ajax **Sorting**
* **Multiple shortcodes per page** or template are supported
* **URL Queries** &mdash; Filters are remembered in URL and can be accessed directly!
* **Views and Likes Built-In**
* Fully Responsive & Mobile-Ready
* Tons of **shortcode options**

= Shortcode options =

Ajax Content Browser comes with a lot of shortcode options to allow you to fully customize the look and feel of the grid. You can also use the shortcode generator to build your shortcode.

* **id**

Add a unique ID to the displayed grid. By default the plugin will automatically generate a custom ID. Use this If you intend to have multiple grids per page. For example: <code>[acb id="my-grid"]</code>

* **post_type**

A comma separated list of post types to show in the grid. You can combine multiple post types. e.g. show posts and products. <code>[acb post_type="post,product"]</code>

* **posts_per_page**

The number of posts to get on each load. By default this is 10 posts per page. For example, to display 20 posts: <code>[acb posts_per_page="20"]</code>

* **paged**

If this is set, the grid will automatically start from a specific page instead of starting from the first page by default. Example: to make the grid start results from page 2 you would add this: <code>[acb paged="2"]</code>

* **taxonomies**

A comma separated list of custom taxonomies you want to allow the user to filter from. By default this shows categories and post tags but you can explicitly set which custom taxonomies you want to add as filter. <code>[acb taxonomies="product_cat,product_tag"]</code>

* **show_filters**

Show or hide the ajax filters menu. For example you can use the following to hide the filters. <code>[acb show_filters="no"]</code>

* **show_search**

Show or hide the ajax search form. The ajax search form is enabled by default. You can use the following to hide the search box. <code>[acb show_search="no"]</code>

* **search_position**

When search is enabled, you can define where the search form should appear. By default it appears on the top of ajax filters, you can use this to display the search below filters. <code>[acb search_position="bottom"]</code>

* **show_author**

Show or hide the author name who created the post. The author is displayed by default. To hide the author you can use: <code>[acb show_author="no"]</code>

* **show_time**

Show or hide the post time e.g. 1 hr ago. By default the time is displayed on every item. To hide the time, use the following: <code>[acb show_time="no"]</code>

* **show_sortby**

Show or hide the ajax sorting dropdown which appears before the grid and enables you to sort items. By default this is enabled, to hide the sort feature please use: <code>[acb show_sortby="no"]</code>

* **show_counts**

Show or hide the posts count displayed beside ajax filter. e.g. category posts count. By default this is enabled, to disable the counts, you can use: <code>[acb show_counts="no"]</code>

* **show_item_tags**

This is off by default. If you enable this option, item tags and terms will be displayed below the title. To enable this feature, please use the following in your shortcode: <code>[acb show_item_tags="yes"]</code>

* **show_thumbnail**

Show or hide the item featured image. This is enabled by default and shows the item featured image If it exists. To disable featured images, please use: <code>[acb show_thumbnail="no"]</code>

* **date_filter**

Show or hide an ajax date filter to allow users to browse items released over a specific period of time. By default the date filter is enabled. To turn it off you can use: <code>[acb date_filter="no"]</code>

* **price_filter**

Show or hide the price filter (min. and max. price) for WooCommerce and Easy Digital Downloads when they are enabled. By default the price filter will appear. To hide the price filter, you can use: <code>[acb price_filter="no"]</code>

* **toggle_all**

If you set toggle_all to "yes" in the shortcode, the filters will be collapsed on load. By default, filters are expanded. <code>[acb toggle_all="yes"]</code>

* **toggle_{filter}**

You can toggle specific filters by passing the filter as an option and set its value to "yes". For example to toggle the categories filter by default, you would have to add the following to your shortcode: <code>[acb toggle_category="yes"]</code>

== Installation ==

1. Activate the plugin
2. Insert the shortcode <code>[acb]</code> in any page where you want to show a grid
3. Use the shortcode generator or shortcode options to display specific ajax content. e.g. posts, products, and so on.
4. Please see the FAQ section for common questions and answers.
5. Need support? No problem. Start a new [support topic](https://wordpress.org/support/plugin/ajax-content-browser/)

== Frequently Asked Questions ==

= What is the default shortcode? =

The default shortcode which will display your WordPress blog posts is <code>[acb]</code>

= How to display WooCommerce products? =

You can tell the plugin to display WooCommerce products easily by specifying product as a post type. <code>[acb post_type="product"]</code> 

= How to display Easy Digital Downloads products? =

You can show Easy Digital Downloads products by specifying its custom post type as a post type. <code>[acb post_type="download"]</code>

= Can I show more than one post type per grid? =

Sure. The shortcode supports something like this: <code>[acb post_type="post,product,download"]</code>

= What are the available shortcode options? =

You can navigate to your WordPress admin &rarr; ACB &rarr; Docs to explore the various shortcode options and parameters.

= Can I make the ajax results start from a specific page? =

Yes you can. Simply set the **paged** parameter in your shortcode like so <code>[acb paged="2"]</code>

= Can I customize the templates? =

Sure. You can copy the template you want to modify from **/templates** folder to **/your-theme/acb/** folder then apply your changes. This way you will not lose any changed templates when the plugin 
is updated.

== Screenshots ==

1. AJAX content browser in action
2. Single item display
3. Shortcode generator
4. Shortcode options
5. WooCommerce Integration
6. Easy Digital Downloads Integration

== Changelog ==

= 1.0.3: June 30, 2019 =

* Tweak: Updated docs
* Tweak: Updated jQuery tipTip plugin

= 1.0.2: June 28, 2019 =

* New: Added loading spinner and text
* Tweak: Updated POT localisation file

= 1.0.1: June 28, 2019 =

* Fix: Invalid redirect on plugin activation

= 1.0.0: June 28, 2019 =

* First release.
