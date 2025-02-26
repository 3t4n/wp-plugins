=== Amazon Product Feeder ===
Contributors: susantabeura
Donate link: http://susantaslab.com/
Tags: associate, affiliate, money, amazon, ebay, adsense, alternate, money, advertisement, advertising, amazon rss feed, amazon rss, amazon affiliate, adsense alternate, amazon advertising, amazon affiliate, amazon product feed, amazon product rss feed
Requires at least: 2.8
Tested up to: 4.0
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Amazon Product Feeder is a WordPress plugin which will help you to create amazon product pages on your website with your amazon affiliate link.

== Description ==

What is Amazon Product Feeder?
Amazon Product Feeder (APF) is a Plugin from <a href="http://susantaslab.com" target="_blank">Susanta's Lab</a>, which creates shoppable amazon products content on your blog page/post using a shortcode.

More interestingly, as APF plugin uses the RSS feeds from Amazon, your page content will always changes with source at Amazon. So every time a search engine will crawl you site/page will get an updated site/page.

It makes your Amazon Associate affiliate marketing easy and more shoppable while boosting revenue. Adding APF to your site enhances your content by showcasing the products marked with News or Popular or Recent tags, making it easier for readers to buy and you to earn revenue.

Flexible
Unlike traditional banner ads that interrupt, distract, and clutter, APF creates content that makes it easier for visitors to buy what they're reading about. It’s native advertising that adapts to your site’s look and feel. Place it anywhere on the page.

= Live Demo Pages: =
<ul>
<li><a href="http://susantaslab.com/20-popular-laptops-and-accessories-at-amazon/" target="_blank">20 Popular Laptops & Accessories at Amazon</a></li>
<li><a href="http://susantaslab.com/20-popular-wifi-routers-at-amazon/" target="_blank">20 Popular WiFi Routers at Amazon</a></li>
<li><a href="http://susantaslab.com/20-all-time-most-popular-chromebooks/" target="_blank">20 All Time Most Popular ChromeBooks</a></li>
</ul>

= Usages =
`[apf domain="com|au|br|ca|cn|fr|de|in|it|jp|mx|es|uk" kw="Keyword" type="new|popular|recent" tag="AssociateTag-20" length="20" details="true|false" target="_blank|_self|_top"]`
<br />

**Where**
<br />
<ul>
<li>`domain` = Specify your domain
<ul>
<li>`com` : for Amazon.com (default)</li>
<li>`au` : for Australian domain of Amazon</li>
<li>`br` : for Brazilian domain of Amazon</li>
<li>`ca` : for Canadian domain of Amazon</li>
<li>`cn` : for Chaneese domain of Amazon</li>
<li>`fr` : for French domain of Amazon</li>
<li>`de` : for Germany's domain of Amazon</li>
<li>`in` : for Indian domain of Amazon</li>
<li>`it` : for Italian domain of Amazon</li>
<li>`jp` : for Japaneese domain of Amazon</li>
<li>`mx` : for Mexico's domain of Amazon</li>
<li>`es` : for Spanish domain of Amazon</li>
<li>`uk` : for United Kingdom's domain of Amazon</li></ul></li>
<li>`kw` = Keyword related to your product serach. This is the key of your page. Try to be specific for better results. For example, "Router", "Wireless Router" and "WiFi Router" produces different results on pages.</li>
<li>`type` = Specify listing type for your keywords
<ul>
<li>`new` : Lists all products tagged with **NEW** for your keywords</li>
<li>`popular` : Lists all products tagged with **POPULAR** for your keywords</li>
<li>`recent` : Lists all products tagged with **RECENT** for your keywords</li></ul></li>
<li>`tag` = Your Amazon associate tag</li>
<li>`length` = Number of products to be listed. Default = `20`</li>
<li>`details` = Include listing details. Default = `true`</li>
<li>`target` = Specify target for link. Use `_blank` to open links in new window.</li>
</ul>

== Installation ==

1. Upload plugin's `.zip` file to the `/wp-content/plugins/` directory
1. Unzip `.zip` file
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Place `[apf domain="com|au|br|ca|cn|fr|de|in|it|jp|mx|es|uk" kw="Keyword" type="new|popular|recent" tag="AssociateTag-20" length="20" details="true|false" target="_blank|_self|_top"]` in your page/post where you want to display amazon products with your associate tag.

== Frequently Asked Questions ==

= What is Amazon Product Feeder? =

Amazon Product Feeder (APF) is a Plugin from <a href="http://susantaslab.com" target="_blank">Susanta's Lab</a>, which creates shoppable amazon products content on your blog page/post using a shortcode.

= How to use it? =

Simply you can use `[apf domain="com|au|br|ca|cn|fr|de|in|it|jp|mx|es|uk" kw="Keyword" type="new|popular|recent" tag="AssociateTag-20" length="20" details="true|false" target="_blank|_self|_top"]` to place an Amazon Product list on your page with your associate tag embeded.


= Is there any example of shortcode =
`[apf domain="com" kw="chromebook" type="popular" tag="YourAmazonTag-20" length="20" details="true" target="_blank"]`
It will create a page like  <a href="http://susantaslab.com/20-all-time-most-popular-chromebooks/" target="_blank">20 All Time Most Popular ChromeBooks</a>

`[apf kw="lcd projector" type="new" tag="YourAmazonTag-20" length="20" details="true" target="_blank"]`
It will create a page like  <a href="http://susantaslab.com/20-all-time-most-popular-lcd-projectors/" target="_blank">20 All Time Most Popular LCD Projectors</a>


== Screenshots ==
1. A screentshot of result page
2. Code to create page above
3. Another screentshot of result page
4. Code to create page above


== Upgrade Notice ==
1. Please consider to make a full backup of your website before making any upgrade.

== Changelog ==

= 1.2 =
* Call to undefined method WP_Error::enable_order_by_date() solved

= 1.1.b =
* correction to rss building function

= 1.1.a =
* Amazon associate tag missing problem solved.
* Added own SimplePie function to read Amazon RSS feed.

= 1.0.a =
Initial release