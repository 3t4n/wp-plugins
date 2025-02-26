=== Affiliate Easel for Amazon ===
Contributors: gmdavis
Donate link: http://bookspree.com/easel/
Tags: amazon, affiliate, associate
Requires at least: 2.8
Tested up to: 3.1
Stable tag: trunk
 
== Description ==
Affiliate Easel for Amazon helps add affiliate links, images, prices and related data to your WordPress site. 
 
== Description ==
Affiliate Easel for Amazon is a tool to help you include affiliate links, images, prices and related data easily in your WordPress site. In addition to inserting quickly within posts, you can install a search widget to search Amazon from any page. You can create multi-page categories or featured product pages, with varying levels of details. 
 
*Verison 1 supports only the US Locale of the Product Advertising API. Future versions will add more Locales.*
 
**Join fellow Affiliate Easel users in funding this plug-in**
Most Affiliate Easel users contribute affiliate links for a few minutes each hour to fund this plug-in. (Thank you!)
It's an effortless way to fund further development of this plug-in.
 
== Installation ==
See the [official widget site](http://bookspree.com/easel/) for more complete installation instructions.

1. Upload the Affiliate Easel plugin to your WordPress site. (Use the "Plugins" - "Add New" in your WordPress dashboard or unzip it in your /wp-content/plugins/ folder)
1. Activate the plugin through the "Plugins" menu in WordPress 
1. Enter your Amazon affiliate ID and developer keys through the "Settings" / "Affiliate Easel for Amazon" menu in your dashboard. 
 
Now you are ready to use [shortcodes](http://codex.wordpress.org/Shortcode) to create links and categories. To add data about a single item:

1. Open a post in your Wordpress dashboard and choose the "HTML" tab.
1. Where you want the item, type a shortcode like this: \[az_easel item="0789746344"\] (The item number is the Amazon ASIN code from the item's page on Amazon.)
 
= Add the search widget to search Amazon from all pages. =

1. Create a new Page (not a post but a page) using your dashboard and add the shortcode: \[az_easel node="1000" index="Books"\] (There are other categories/pages you can use but this is a good start.)
1. Go to the dashboard Appearance/Widgets screen. 
1. Drag the "Affilaite Easel Search" Widget to a widget area and choose the name of the page you just created. Add a title if you wish.
1. Be sure to choose "Save" in the widget. The search widget will now appear on every page and search results will display on the page you created and chose.

= Add a search form to any individual post or page. =

1. Create a new page (not post) in wordpress and and choose the "HTML" tab.
1. Type \[easel_search\] where you want the search bar (usually the first thing in the page)
1. You can type a node-shortcode on the same page like \[az_easel node="1000" index="Books"\] to provide a default results container.
1. Alternately, you can type \[easel_search page=http://myblog.com/shop/\] to show results on a different page. 
1. You can optionally type  \[easel_search select=Books\] to cause a specific category to be selected in the search bar.

== Frequently Asked Questions ==

= Is there a version of the widget for Amazon in my locale? =

Currently, we support only Amazon.com in the US. We have plans to support other locales if the widget is popular and funded.

= How is the widget funded? =

Most Affiliate Easel users contribute affiliate links for a few minutes each hour to fund this plug-in. (Thank you!) That way, if the widget doesn't help you make money, the widget isn't funded by you. Affiliate Easel links will credit your account but *you can specify up to 18 minutes of each hour the links will credit bookspree.com as an effortless way to fund further development of this plug-in.*

= I don't have an Amazon Access Key ID. Can I use yours?  =

Sorry, I wanted to avoid requiring access keys but Amazon limits the number of requests so I couldn't use one set of keys for a widely distributed plug-in. You can get Access Keys from your [Product Advertising API Account](https://affiliate-program.amazon.com/gp/flex/advertising/api/sign-in.html). 

== Screenshots ==
 
1. You can easily add Amazon images, data and prices to any blog post using simple shortcodes.
2. Dynamically create multi-page search results.
3. Individual items can be featured on their own pages complete with images, product information reviews, prices and links to related items.
 
== Changelog ==

= 1.1.3 =
* The sole purpose of this release is to attempt to fix a problem with Wordpress Plug-in site. No changes to the plug-in function.

= 1.1.2 =
* Errors caused by [Amazon's Efficiency Guidelines](https://affiliate-program.amazon.com/gp/advertising/api/detail/main.html) (hourly request limits) are now handled gracefully.
* New attribute (only=image) will hide all other data and show only the product image.

= 1.1.1 =
* Related and Similar items links now also can have nofollow and _blank attributes
* Added a Donate button to the admin page

= 1.1.0 =
* Search bar shortcode now can optionally specify a results page and default search category
* Search bar shortcode now shows in the correct loation

= 1.0.5.1 =
* Minor bug fix involving search immediately after release

= 1.0.5 =
* New feature adds audio previews for MP3 downloads (MP3 Downloads only)
* New feature permits nofollow links for outbound links
* New feature permits option to have outbound links open in new window
* Revisions to admin panel

= 1.0.4 =
* Revised admin panel UI
* Improved stylesheet applies only to amazon sections without affecting anything else.
* Upgrading is highly reccomended if you want to incorporate search

= 1.0.3 =
* Fixed a problem with the search widget. It now will return better, more complete results.
* Upgrading is highly reccomended if you want to incorporate search

= 1.0.2 =
* Form security improvements.
* Will now work before any affiliate info is added. This enables a demo mode to try it quickly without additional set-up
* Can now be used with Affiliate ID but without API keys

= 1.0.1 =
* Minor change to address css issues.

= 1.0.0 =
* The initial version of Affiliate Easel.
 
== Upgrade Notice ==
 
= 1.0.2 =
* Form security improvements.
* With this release, the plug-in will work before any affiliate info is added. This enables a demo mode to try it quickly without additional set-up.
* Can now be used with Affiliate ID but without API keys
 
== Shortcodes ==
 
Affiliate Easel for Amazon uses shortcodes to insert data in posts. At it's simplest, simply type \[az_easel item="0789746344"\] into a post where you want the amazon item to appear. (The item within quotes is the Amazon ASIN number found on the Amazon page or within the URL.) If you want to show more than one item, separate the item numbers with a ",' and no spaces. E.g.: \[az_easel item="B004A8ZRB0,B004A8ZRBA"\]
 
To show a page from a particular category with up to 10 items, the shortcode would look like this:
\[az_easel node="1000" index="Books"\]
The node comes from an Amazon URL. The Category is also required. See [http://bookspree.com/easel/](http://bookspree.com/easel/) for a complete list of categories.
 
Shortcodes have a default appearance set in the the "Settings" / "Affiliate Easel for Amazon" menu in your dashboard. You can customize the appearance and inclusion of various elements by using additional parameters in the shortcode. See [http://bookspree.com/easel/](http://bookspree.com/easel/) for complete information and additional shortcodes.