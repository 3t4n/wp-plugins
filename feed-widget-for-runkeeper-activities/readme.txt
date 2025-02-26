=== Runkeeper Recent Activities ===
Contributors: ginchen
Donate link: https://www.paypal.me/ginchen
Tags: runkeeper, activity, activities, feed, widget
Requires at least: 4.6.3
Tested up to: 4.6.3
Stable tag: trunk
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Displays a widget showing your latest Runkeeper activities.
May also be called from a shortcode.

== Description ==

This widget shows your latest activities from [Runkeeper](https://runkeeper.com/). The number of activities can be configured, as can the values that are being displayed *(distance, speed, duration, calories burned)*. The widget may also be called using the **[runkeeper]** shortcode.

A little bit of effort is required to set it up, but it's worth it, because this way, **no third party** will ever get access to your data. **Everything stays between your WordPress site and Runkeeper.**

== Installation ==
**You need to create a Runkeeper Application first.** It's worth it, because this way, no third party will ever get access to your data. Everything stays between your WordPress site and Runkeeper. **Don't worry, it's easy!**

1. Visit the **[Runkeeper Partner Portal](https://runkeeper.com/partner)**.
1. If asked, log in with your Runkeeper credentials.
1. Click **"Connect To Our API"**, or click "Applications" at the top.
1. Click **"Register a New Application"**.
1. Fill in **"Application Name"**, **"Description"**, and **"Organization"**. It doesn't really matter what values you enter, but it's best to use sensible values anyway.
*(**Example:** Application Name: "Runkeeper Feed Widget", Description: "A WordPress plugin that displays a Runkeeper activity feed.", Organization: [Your blog title])*.
Then scroll down and click **"Register Application"**.
1. In the "My Applications" overview, click **"Keys and URLs"** below your WordPress application.
1. Leave this window open, you will soon need the **"Client ID"** and **"Client Secret"**.

**Now you are ready to enable and connect the plugin:**

1. **Extract** the plugin folder to your "wp-content/plugins" directory.
1. **Activate** the plugin *("Feed Widget for Runkeeper activities")* through the "Plugins" menu in WordPress.
1. Go to "Widgets" in your WordPress backend and **add the "Runkeeper Feed Widget" to your page**.
Alternatively, you may insert the widget in a page or post using the **[runkeeper]** shortcode.
1. **Visit the page on your website where the widget is supposed to show up.** Follow the instructions there to connect the widget to your Runkeeper account, using the "Client ID" and "Client Secret" from step 8.
*(You need to be logged into your WordPress as admin in order to complete this last step.)*

== Frequently Asked Questions ==

= How to configure the widget when called from the shortcode? =

If you only use the **[runkeeper]** shortcode without any options, a widget with default settings will be displayed. However, if you'd like to customize it, the shortcode offers all the same options that are available when adding the widget from the "Widgets" page. You can use them like this *(the values given here are the defaults)*:

**[runkeeper title="" numposts=5 unit="miles" showlogo=true showdate=true showtime=true showdistance=true showduration=true showspeed=false showcalories=false dateformat="n/j/Y" timeformat="g:i a"]**

Notes:

* **numposts** defines how many recent activities to display.
* **unit** can be *"miles"* or *"km"*.
* **showtime=true** will only display the time, if *showdate* is true as well.
* **dateformat** and **timeformat** take a [PHP date format](http://php.net/manual/en/function.date.php).

== Screenshots ==

1. Widget with default settings.
2. Different values can be selected for display, and the plugin is translation-ready.
3. Backend widget options.

== Changelog ==

= 1.0 =

* Initial release.