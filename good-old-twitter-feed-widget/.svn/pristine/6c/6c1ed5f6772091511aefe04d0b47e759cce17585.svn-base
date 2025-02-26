=== Good Old Twitter Feed Widget ===
Contributors: whiletrue
Donate link: https://www.whiletrue.it/
Tags: twitter, twitter sidebar, sidebar, social, social sidebar, widget, twitter widget, twitter feed, simple twitter, twitter oauth
Requires at least: 2.9+
Tested up to: 6.3
Stable tag: 1.2.6

Shows the latest tweets from a Twitter account in a sidebar widget.

== Description ==
This plugin displays the latest posts from a Twitter account in a sidebar widget. 
Easy customization of style, replies, retweets, links, dates, thumbnails and a lot more.

The plugin is based on Twitter API version 1.1. 
In order to use it, you have to create a personal Twitter Application on the [dev.twitter.com](https://dev.twitter.com/apps "dev.twitter.com") website.
Within your Application, Twitter provides two strings: the Consumer Key and the Consumer Secret.
You also need two other strings, the Access Token and the Access Token Secret, that you can get
following [this guide](https://dev.twitter.com/docs/auth/tokens-devtwittercom "this guide").
Finally, enter all the Authorization string in the widget options box, along with your favorite display settings: your Twitter Widget is now ready and active!

You can use the same Authorization strings for several widgets and multiple website. 
Just remember to store them in a safe place!

You also need CURL and OPENSSL extensions enabled in your PHP environment (don't worry, almost every hosting service provides that).

= Shortcode =

If you want to put your recent tweets other than in a widget, you can use the [good_old_twitter] shortcode. 
The shortcode support is experimental. 

At the moment at least the twitter username and the 4 authentication attributes are mandatory. The shortcode minimal configuration is (with all fields filled):

[good_old_twitter username="" consumer_key="" consumer_secret="" access_token="" access_token_secret=""]

You can specify other optional attributes, e.g.:

* num (number of tweets to show, e.g. num="10")
* skip_retweets (if set to true, retweets are skipped, e.g. skip_retweets="true")

The full list of available options is available in the plugin FAQ.

= Reference =

For more informations: [www.whiletrue.it](https://www.whiletrue.it/really-simple-twitter-feed-widget-for-wordpress/ "www.whiletrue.it")

Do you like this plugin? Give a chance to our other works:

* [Good Old Share](https://www.whiletrue.it/really-simple-share-wordpress-plugin/ "Good Old Share")
* [Most and Least Read Posts](https://www.whiletrue.it/most-and-least-read-posts-widget-for-wordpress/ "Most and Least Read Posts")
* [Tilted Tag Cloud Widget](https://www.whiletrue.it/tilted-tag-cloud-widget-per-wordpress/ "Tilted Tag Cloud Widget")
* [Reading Time](https://www.whiletrue.it/reading-time-for-wordpress/ "Reading Time")

= Credits =

Some plugin code is based on work by Max Steel (Web Design Company, Pro Web Design Studios), Frank Gregor and Jim Durand.

The Codebird library by J.M. ( me@mynetx.net - https://github.com/mynetx/codebird-php ) is used for Twitter OAuth Authentication.

= Translators =

* Branco, Slovak translation (WebHostingGeeks.com)
* WhileTrue, Italian translation (www.whiletrue.it)
* Inspirats, French translation (rysk-x.com)
* Aleksandra Czuba, Polish translation (www.olaczuba.com)
* Alexandre Janini, Brazilian Portuguese translation (www.asterisko.com.br)
* Andrew Kurtis, Spanish translation (www.webhostinghub.com)

= Reference =
This plugin gives you the features of the former 2.5.16 release of the "Really simple Twitter Feed Widget" plugin.

== Installation ==
Best is to install directly from WordPress. If manual installation is required, please make sure to put all of the plugin files in a folder named `good-old-twitter-widget` (not two nested folders) in the plugin directory, then activate the plugin through the `Plugins` menu in WordPress.

== Frequently Asked Questions == 

= Does the widget show my tweets in real time? =
Yes they're shown in real time, although you have to refresh the page for them to appear.

= How can I modify the styles? =

The plugin follows the standard rules for "ul" and "li" elements in the sidebar. You can set your own style modifying or overriding these rules:
.good_old_twitter_widget { /* your stuff */ }
.good_old_twitter_widget li { /* your stuff */ }

As for the linked username on the bottom (if enabled), you can customize it this way:
div.gotw_link_user { /* your stuff */ }

= I've enable user thumbnails. How can I make them look better? =

You can use some CSS rules like these:
`.good_old_twitter_widget     { margin-left:0; }`
`.good_old_twitter_widget li  { margin-bottom:6px; clear:both; list-style:none;   }`
`.good_old_twitter_widget img { margin-right :6px; float:left; border-radius:4px; }`

= What filters are available? =

* The "gotw_link_user" filter applies to the link to the Twitter user profile
* The "gotw_button_follow" filter applies to the Twitter "Follow Me" button
* The "gotw_output" filter applies to the final widget frontend output

All the filters are provided with the plugin's complete array of options.

= What options are available for the shortcode? =

This is the complete option list. The boolean options can be set writing "true" or "false" as values.

*TWITTER AUTHENTICATION* 

*consumer_key*	: Consumer Key

*consumer_secret*	: Consumer Secret

*access_token*	: Access Token

*access_token_secret*	: Access Token Secret

*TWITTER DATA* 

*username*	: Twitter Username

*num*	: Show # of Tweets

*skip_text*	: Skip tweets containing this text

*skip_replies*	: Skip replies (value: true or false)

*skip_retweets*	: Skip retweets (value: true or false)

*WIDGET TITLE*

*title*	: Title

*title_icon*	: Show Twitter icon on title (value: true or false)

*title_thumbnail*	: Show account thumbnail on title (value: true or false)

*link_title*	: Link above Title with Twitter user (value: true or false)

*WIDGET FOOTER*

*link_user*	: Show a link to the Twitter user profile (value: true or false)

*link_user_text*	: Link text

*button_follow*	: Show a Twitter "Follow Me" button (value: true or false)

*ITEMS AND LINKS*

*linked*	: Show this linked text at the end of each Tweet

*thumbnail*	: Include thumbnail before tweets (value: true or false)

*thumbnail_retweets* : Use author thumb for retweets (value: true or false)

*images*	: Show tweet images (value: true or false)

*hyperlinks*	: Find and show hyperlinks (value: true or false)

*replace_link_text*	: Replace hyperlinks text with fixed text (e.g. "-->")

*twitter_users*	: Find Replies in Tweets (value: true or false)

*link_target_blank*	: Create links on new window / tab (value: true or false)

*TIMESTAMP*

*update*	: Show timestamps (value: true or false)

*date_link*	: Link timestamp to the actual tweet (value: true or false)

*date_format*	: Timestamp format (e.g. M j )

*DEBUG*

*debug* :	Show debug info (value: true or false)

*erase_cached_data*	: Erase cached data (value: true or false)

*encode_utf8*	: Force UTF8 Encode (value: true or false)

== Screenshots ==
1. Sample content, using default options (e.g. no active links)  
2. Options available in the Settings menu 

== Changelog ==

= 1.2.6 =
* Fixed: PHP8 warnings 
* Plugin tested up to WordPress 6.1

= 1.2 =
* Changed: switch to the WP HTTP API

= 1.0.9 =
* Added: Support for long tweets
* Added: Show tweet images
* Changed: Account thumbnail served over HTTPS
* Changed: If any skip options is active, now gets 2x items

= 1.0 =
* Initial release


== Upgrade Notice ==

= 1.0.0 =
Initial release
