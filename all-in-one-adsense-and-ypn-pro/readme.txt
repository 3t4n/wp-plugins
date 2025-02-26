=== All in One Adsense and YPN Pro ===
Contributors: animon
Donate link: http://www.linewbie.com/wordpress-plugins/all-in-one-adsense-and-ypn
Website link: http://www.linewbie.com/wordpress-plugins/all-in-one-adsense-and-ypn
Tags: adsense, plugin, post, posts, admin, ypn, ads, google, yahoo, ad, ad manager, adsense insertion, ad insertion
Requires at least: 1.5
Tested up to: 3.3
Stable tag: 2.11

Automatically insert Google Adsense ads or YPN ads in to your posts on the fly.

== Description ==

All in One Adsense and YPN is a Free and Open Source Wordpress plugin which is able to **automatically** insert google adsense ads or yahoo publisher network (YPN) ads in to your posts on the fly. It doesn't matter if you have 1 post or 100,000 posts, it will insert your ad code into all of them automatically. You can control all aspects of your ad's display and position. Just specify ad color and position in the plugin options, your ad code is **automatically generated and inserted**. Advanced users can add html and css code before and after the ad to have total control of the ad display.

This release a fork of the [one in the directory](http://wordpress.org/extend/plugins/all-in-one-adsense-and-ypn/ "Original version"), with the "forced-donation" aspects removed.

Features:

* **Automatically** insert Google Adsense or YPN ads in to your blog posts.
* No manual work required, ad code is **dynamically inserted** into your existing and new posts.
* You could optionally specify not to show ads in a post by using tag <!--noadsense-->
* You could optionally specify where to start the ads in a post by using tag <!--adsensestart-->
* You could optionally specify where to stop the ads in a post by using tag <!--adsensestop-->
* Decrease ad blindness by giving you the option to **randomly** place your ad within your posts.
* You could optionally define absolute ad position instead of random position.
* You could optionally define random ad network to maximize earnings from both networks.
* Allow you to pick how many total ads to show on one page.
* Allow you to pick how many ads to show in one post.
* Compatible with the new WP MU mode.

* [Support](http://www.linewbie.com/sf-forum?forum=6&page=1)
* [Version History](http://www.linewbie.com/wordpress-plugins/all-in-one-adsense-and-ypn)
* [FAQ](http://wordpress.org/extend/plugins/all-in-one-adsense-and-ypn/faq/)
* [Installation](http://wordpress.org/extend/plugins/all-in-one-adsense-and-ypn/installation/)
* [Screen Shots](http://wordpress.org/extend/plugins/all-in-one-adsense-and-ypn/screenshots/)


== Installation ==

1. Upload "all-in-one-adsense-and-ypn" directory to the "/wp-content/plugins/" directory
2. Activate the plugin through the "Plugins" menu in WordPress
3. Configure the plugin in the "Settings"->"Adsense" menu (the plugin must be configured with your adsense or ypn publisher id to start working).

== Frequently Asked Questions ==

= Do I need to get adcode from yahoo or google? =

No, the plugin will automatically generate the ad code for you, you just need to put in your publisher id and optionally a channel id.

= Do I need to insert any tags into my posts to make it work? =

No, the plugin will automatically insert adsense or ypn ads into ALL your posts by default, there is nothing to be done manually, you only need to insert tags when you do not want ads to appear in a certain post or if you want to specify a certain point where the ad should not appear.

= Does this plugin change my post content in the database? =

No, this plugin inserts the ad code only after the content has been retrieved from the database by wordpress, your content is not changed. So you could just disable this plugin and all the in-post ads would be gone from your blog.

= Why does my page only show white blocks but not ads? =

First make sure you put only numbers in the adsense account number field, meaning there should be no ca-pub- or pub-, only numbers. If it still doesn't work, then make sure you have less than 3 google ads on your entire page or else google will automatically turn your ads into white block.

= How do I disable donation? =

Put 0 in the donation option.

== Screenshots ==

1. Options screen.

== Changelog ==

= 2.01 =
* added WP MU compatiblility
* various minor error fix

= 1.92 =
* made clarification to instructions

= 1.90 =
* made some UI changes
* added colorpicker to the settings page to pick color directly

= 1.84 =
* start to use wordpress.org changelog function
* added function to recognize client id with pub- in front of the number

= 1.83 =
* tidy up some code to avoid confusion.
