=== AzonPost ===
Contributors: moch. a
Donate link: http://www.mochamir.com/
Tags: amazon, auto post, auto poster, auto posting, autoblog, auto blog, auto store, amazon auto store, auto blogging, amazon associate
Requires at least: 3.2
Tested up to: 3.5.1
Stable tag: 1.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Simple Amazon auto poster. Atomatically search Amazon products and post to your blog.. 

== Description ==

AzonPost uses Amazon Product Advertising API (Public and Private Key) and Amazon Associates ID to make an access and request for searching Amazon products information and features, so you will need them before using this plugin.

When you have saved your Amazon Product Advertising API, you can create posting campaigns as you want.

Features:
`* Edit, copy, and delete campaigns.
* Auto create Post Categories.
* Unlimited campaigns.
* Posting status of each individual campaign.
* Built-in shortcodes.
* Free to create your own post templates.`

Additional features:
`* Auto insert Read More link after your specified words count.
* Auto insert post Tags (sorted by high to low density).
* Auto create Meta Description.
* Auto create Meta Keywords (sorted by high to low density).
* Facebook Comments Box.`


== Installation ==

1. Copy this file into the plugins directory in your WordPress installation (wp-content/plugins).
2. Log in to WordPress Admin. Go to the Plugins section and click Activate for this plugin.
3. Take a look at the Admin Panel section, click `"AzonPost"`.
4. Insert your Amazon Product Advertising API and save your settings.
5. Create post template and click save.
6. Customize your options at the Tools page.
7. Copy your cron url and add to your cronjob.


== Usage ==

**Shortcode for Category Setting:**
Use `][` as separator if you want publish post under sub categories.

ex: Women][Shoes, where Women is parent category and Shoes is sub-category of Woman category.
`1 deep level only.`

**Shortcodes for post title:**
`^asin^ = ASIN code
^title^ = Product title`

**Shortcodes for post content:**
`^asin^ = ASIN code
^title^ = Product title
^url^ = Url product page
^brand^ = Product brand
^price^ = Product price
^simgurl^ = Small product image URL
^mimgurl^ = Medium product image URL
^limgurl^ = Large product image URL
^simage^ = Small product image
^mimage^ = Medium product image
^limage^ = Large product image
^simagel^ = Small image with link
^mimagel^ = Medium image with link
^limagel^ = Large image with link
^lowprice^ = Low price offer
^offerprice^ = Offer price
^ybuys^ = Yellow small buy button
^ybuym^ = Yellow medium buy button
^ybuyl^ = Yellow large buy button
^wbuys^ = White small buy button
^wbuym^ = White medium buy button
^wbuyl^ = White large buy button
^features^ = Product features
^description^ = Product description
^iframereview^ = Product reviews on iframe
^fbcomments^ = Facebook Comments Box`

	
== Development Notes ==

Tested  3.5, 3.4.2, 3.0.4, 3.2.1.



== Upgrade Notice ==

None


== Frequently Asked Questions ==

= How to find the node ids? =
Please visit http://browsenodes.com/

= Where I can get the amazon's public and private keys? =
Go to https://affiliate-program.amazon.com/gp/advertising/api/detail/main.html

= How to execute cronurl on scheduled task? =
Copy and save your campaign cron url then add to your cronjob and create sceduled task there. 


== Screenshots ==

1. AzonPost Admin Panel
2. AzonPost Menu Page
3. AzonPost Campaign Page
4. AzonPost Tools Page
5. AzonPost Categories


== Changelog ==

= 1.3 =
* Code name "Kabongan Kidul"  [Feb 07, 2013]
* stripslashes added.
* Iframe added to default template.
* Facebook Comments Box added.
* Plugin files renamed.

= 1.2.4 =
* Code name "Kleco"  [Jan 23, 2013]
* Error fixed.

= 1.2.3 =
* Code name "Kentingan"  [Jan 06, 2013]
* Strip and remove useless html tags from product description.

= 1.2.2 =
* Code name "Cengklik"  [Jan 04, 2013]
* HTML entities for converting title inserted in post content added.
* Bad words filter improved.
* Shortcode for iframe fixed.

= 1.2.1 =
* Code name "Gonilan"  [Dec 23, 2012]
* "PHP Warning: Missing argument 2 for wpdb::prepare()" on WordPress 3.5 fixed. 

= 1.2 =
* Code name "Leongan"  [Dec 19, 2012]
* New UI.
* Move Tags option from individual template campaign to global setting.
* Auto Meta Keywords added.
* Auto Meta description added.
* Posts result status added.

= 1.1 =
* Code name "Karanggandul"  [Dec 04, 2012]
* Enable to create posts in sub categories 1 deep level.
* Database data validation updated.
* Sanitize content for allowed HTML tags for post content (wp_kses_post) added.
* rel="nofollow" string to all HTML entities (wp_rel_nofollow) added.
* Sanitize a string from user input (sanitize_text_field) added.
* Sanitize HTTP Redirect (wp_redirect) added.
* Balance HTML Tags (balanceTags) added.

= 1.0 =
* Code name "Bledeg"  [Dec 01, 2012]
* Initial release.