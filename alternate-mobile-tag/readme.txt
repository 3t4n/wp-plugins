=== Alternate Mobile Tag ===
Contributors: Asif2BD, onetarek
Donate link: http://wpdeveloper.net/
Tags: mobile-friendly, mobile tag, alternate tag, rel=alternate, handheld, mobile site, Google Search, Mobile Friendly
Requires at least: 3.5.0
Tested up to: 4.2
Stable tag: 1.1
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Add mobile site url in HEAD sectiomn as Link tag with rel=alternate. Mobile url example http://m.example.com

== Description ==

Mobile is important, now about 40% of Google Search coming from mobile device. Google is very serious about Mobile now.

**Starting April 21, 2015** Google Search will be expanding its use of *mobile-friendliness* as a ranking signal.

Google described what you need to for your website. If your website has a separate *m.domain.com* type site this plugin will take care of Google's recommendation, described [here](https://developers.google.com/webmasters/mobile-sites/mobile-seo/configurations/separate-urls?hl=en).


This is very simple plugin without any setting or configuartion. It assumes your desktop and mobile site url is same just mobile site is on a subdomain **"m"**, it adds the following tags

    <link rel="alternate" media="only screen and (max-width: 640px)" href="http://m.example.com/page-1" >
    
    <link rel="alternate" media="handheld" href="http://m.example.com/page-1" >

**[Take Mobile-Friendly Test](https://www.google.com/webmasters/tools/mobile-friendly/)**


**Check Our Other Plugins:**

* **[Twitter Cards Meta](https://wordpress.org/plugins/twitter-cards-meta/)** 
* **[Facebook Secret Meta](https://wordpress.org/plugins/facebook-secret-meta/)** 
* **[WP Author Report Free](https://wordpress.org/plugins/wp-author-report-free/)** 
* **[Analytify - Ultimate Google Analytics Dashboard](https://wordpress.org/plugins/wp-analytify/)**
* **[WP Scheduled Posts](https://wordpress.org/plugins/wp-scheduled-posts/)**


== Installation ==

= Modern Way: =
1. Go to the WordPress Dashboard "Add New Plugin" section.
2. Search For "Alternate Mobile Tag". 
3. Install, then Activate it.

= Old Way: =
1. Upload the `alternate-mobile-tag` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress.


You are good to go!



== Frequently Asked Questions ==

= Does it need any theme customization or anything? =

No, just activate the plugin you will see the alternate link tag in HEAD section.


= How can I get Support? =

Use plugin support button in WordPress.org extended listing.


== Screenshots ==

1. Example Mobile-Friendly result in Google Search



== Changelog ==

= 1.1 - 2015-04-21 =
* Initial release



== Upgrade Notice ==

= 1.1 =
* Initial release


== Donation ==

Check our other plugin

http://wpdeveloper.net/