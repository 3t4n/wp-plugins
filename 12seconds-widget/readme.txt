=== 12seconds Widget ===
Tags: 12seconds,12,seconds,sidebar,widget,video,status,social networks,blogging,video blogging,micro blogging
Requires at least: 2.5
Tested up to: 2.7.1
Stable tag: 0.3.1

Display 12seconds video status updates on your WordPress blog.

== Description ==

Adds a sidebar widget to display [12seconds](http://12seconds.tv) video status updates. For those of you who are familiar with Twitter; 12seconds is like Twitter, but with video instead of text updates. You can also embed the widget in WordPress posts and pages using shortcodes.

**Features**

* Displays the latest video status for a 12seconds user.
* You can choose to display a "skinny" (175 X 290) or "fat" (380 X 440) version of the widget.
* Can navigate to and view previous status updates in the "fat" widget using a thumbnail carousel.
* You can embed the widget in posts and pages using shortcodes.

For more info (options, screenshots, etc.) visit [the plugin homepage](http://www.turingtarpit.com/2009/03/12seconds-widget/ "12seconds Widget").

== Installation ==

1. Verify that you have PHP5, which is required for this plugin.
1. Download the whole *12seconds-widget* folder into the */wp-content/plugins/* directory.
1. Activate the plugin through the Plugins menu in WordPress.

**Use as a sidebar widget**

After activating the plugin, go to the Widgets section and drag the *12seconds-widget* into your chosen sidebar and configure.  You must enter a 12seconds *username*.

**Use as an embedded widget in a post or page**

Using the "shortcodes" system in WordPress 2.5 and up, this plugin will allow you to embed the widget into your WordPress pages and posts. 

Use the `[12suser]` shortcode to display updates for an individual user:

     `[12suser username="some_user" size="fat/skinny"]`
	 
* The *username* attribute is required and is the login/user name to the 12seconds site. 
* The *size* attribute is optional and can be "fat" or "skinny" (default).

Use the `[12svideo]` shortcode to display a single video:

     `[12svideo id="123456"]`
	 
* The *id* attribute is required. 
* The *id* is the last set of digits of the URL when viewing a video on the 12seconds.tv site. The URLs takes the form `http://12seconds.tv/channel/username/123456` . The *id* in this case would be "123456".

 == Frequently Asked Questions ==

= What is 12seconds? =
12seconds is a place online for video status updates. It allows you to share what you're doing with your friends and family using short video clips.

= How do I record status updates? =
Using your browser, mobile phone or any other video recording device you can record and upload 12 seconds of video to [12seconds.tv](http://12seconds.tv). Your videos will be displayed in the public stream and in the streams of your followers.

== Styling Guidelines ==

The widget embed code <iframe> tag is assigned CSS class `twelve-s-widget`.

`<iframe class="twelve-s-widget" ........... ></iframe>`

The caption for individual videos ( when you use the `12svideo` shortcode ) is assinged CSS class `twelve-s-caption` to the <span> tag.

`<span class="twelve-s-caption"><br/> ........... </span>`

== Release Notes ==

**0.3** : Substituted [12s] shortcode with [12suser]; Deprecated [12s] shortcode; Added [12svideo] shortcode to display individual videos; Added style classes to embed code for custom styling;

**0.2.1** : Cleaned up readme.txt formatting problems;

**0.2** : First official public release; Added [12s] shortcode to embed widget in posts and pages;

**0.1** : First internal release; with sidebar widget;